<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Physician extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->logged_in();
        $this->load->model('ClinicModel');
        $this->load->model('BookingModel');
        $this->load->model('CloseModel');
        $this->load->model('YoutubeModel');
        $this->load->model('LikeModel');
        $this->load->model('StatModel');
        $this->load->library('pagination');
        $this->load->library('S3_upload');
        $this->load->library('S3');
    }

    private function logged_in()
    {
        if (!$this->session->userdata('authenticated')) {
            redirect(base_url('login'));
        } else if ($this->session->userdata('authenticated') && !$this->session->userdata('activate')) {
            if (!$this->session->userdata('activate')) {
                redirect(base_url('verify') . "?email=" . $this->session->userdata('email') . "&type=clinic");
            }
        }
    }

    public function dashboard()
    {
        $allBooking = $this->BookingModel->getDataAllByClinic($this->session->userdata('id'));
        $todayBooking = $this->BookingModel->getDataTodayByClinic($this->session->userdata('id'));
        $like = $this->LikeModel->getCount($this->session->userdata('id'));
        $clinic = $this->ClinicModel->detailById($this->session->userdata('id'));
        $stat = $this->StatModel->stat($this->session->userdata('id'));

        $statData = [];
        for ($i = 1; $i <= 12; $i++) {
            $num = 0;
            foreach ($stat as $item) {
                if (intval($item->MONTH) == $i) {
                    $num = intval($item->NUM);
                }
            }
            array_push($statData, $num);
        }

        $data = [
            'allBooking' => $allBooking[0]->ALLBOOKING,
            'todayBooking' => $todayBooking[0]->TODAYBOOKING,
            'like' => $like,
            'clinic' => $clinic,
            'statData' => $statData
        ];

        $js = [
            base_url() . 'assets/physician/js/admin-charts.js?v=' . time()
        ];

        $this->load->view('template/header_physician');
        $this->load->view('physician/dashboard', $data);
        $this->load->view('template/footer_physician', ['js' => $js]);
    }

    public function manage()
    {
        $rowno = 0;

        if (!empty($this->uri->segment('3'))) {
            $rowno = $this->uri->segment('3');
        }

        $date = date('Y-m-d');
        if (!empty($this->input->get('date'))) {
            $date = $this->input->get('date');
        }

        $data['date'] = $date;

        $rowperpage = 50;

        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }

        $ques = $this->BookingModel->getDataListByDate($this->session->userdata('id'), $date, $rowperpage, $rowno);

        $allcount = $this->db->where('CLINICID', $this->session->userdata('id'))
            ->where('BOOKDATE', $date)
            ->count_all_results('tbbooking');

        $config['base_url'] = base_url() . 'physician/manage';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
        $config['reuse_query_string'] = true;

        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '<span aria-hidden="true"></span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';

        $this->pagination->initialize($config);

        $data['ques'] = $ques;
        $data['row'] = $rowno;
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('template/header_physician');
        $this->load->view('physician/ques_manage', $data);
        $this->load->view('template/footer_physician');
    }

    public function checkin()
    {
        if (!empty($this->input->get('id'))) {
            $this->BookingModel->checkin($this->input->get('id'));
        }
        $url = $_SERVER['HTTP_REFERER'];
        header("location:" . $url);
        exit(0);
    }

    public function cancel()
    {
        if (!empty($this->input->get('vn'))) {
            $booking = $this->BookingModel->getDataById($this->input->get('id'));

            if ($booking->TYPE == 0) {
                $this->BookingModel->delete($this->input->get('id'));
            } else {
                $this->BookingModel->cancel($this->input->get('id'));
            }
        }

        $url = $_SERVER['HTTP_REFERER'];
        header("location:" . $url);
        exit(0);
    }


    public function ques()
    {
        $rowno = 0;

        if (!empty($this->uri->segment('3'))) {
            $rowno = $this->uri->segment('3');
        }

        $rowperpage = 100;

        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }

        $ques = $this->BookingModel->getDataList($this->session->userdata('id'), $rowperpage, $rowno);

        $currentQues = $this->BookingModel->getCurrentQues($this->session->userdata('id'));

        $allcount = $this->db->where('CLINICID', $this->session->userdata('id'))
            ->where('BOOKDATE', date('Y-m-d'))
            ->count_all_results('tbbooking');

        $config['base_url'] = base_url() . 'physician/ques';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;

        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '<span aria-hidden="true"></span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';

        $this->pagination->initialize($config);
//echo "<pre>";
//print_r($ques);
//        echo "</pre>";
//        exit();
        $data['ques'] = $ques;
        $data['row'] = $rowno;
        $data['pagination'] = $this->pagination->create_links();

        $data['currentQues'] = $currentQues;

        $this->load->view('template/header_physician');
        $this->load->view('physician/ques_today', $data);
        $this->load->view('template/footer_physician');
    }


    public function quesCall()
    {
        $this->BookingModel->quesCall($this->input->get('id'), $this->session->userdata('id'));

        redirect(base_url('physician/ques'));
    }

    public function quesReset()
    {
        $this->BookingModel->quesReset($this->session->userdata('id'));

        redirect(base_url('physician/ques'));
    }

    public function time()
    {
        $dateClose = $this->CloseModel->listData($this->session->userdata('id'));
        $time = $this->ClinicModel->detailById($this->session->userdata('id'));
        $day = ["อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์"];

        $data = [
            'day' => $day,
            'time' => (array)$time,
            'dateClose' => $dateClose
        ];
        $this->load->view('template/header_physician');
        $this->load->view('physician/time', $data);
        $this->load->view('template/footer_physician');
    }

    public function timeUpdate()
    {

        $data = [
            'DAYOFF' => $this->input->post('DAYOFF'),
            'TIME_OPEN' => $this->input->post('TIME_OPEN'),
            'TIME_CLOSE' => $this->input->post('TIME_CLOSE'),
            'TIME1' => $this->input->post('TIME1'),
            'CLOSE1' => $this->input->post('CLOSE1'),
            'TIME2' => $this->input->post('TIME2'),
            'CLOSE2' => $this->input->post('CLOSE2'),
            'TIME3' => $this->input->post('TIME3'),
            'CLOSE3' => $this->input->post('CLOSE3'),
            'TIME4' => $this->input->post('TIME4'),
            'CLOSE4' => $this->input->post('CLOSE4'),
            'TIME5' => $this->input->post('TIME5'),
            'CLOSE5' => $this->input->post('CLOSE5'),
            'TIME6' => $this->input->post('TIME6'),
            'CLOSE6' => $this->input->post('CLOSE6'),
        ];

        $this->ClinicModel->updateById($data, $this->session->userdata('id'));

        $this->session->set_flashdata('msg', 'แก้ไขข้อมูลเวลาเรียบร้อย');
        redirect(base_url('physician/time'));
    }

    public function timeHoliday()
    {
        $dateNow = new DateTime();
        $currentTime = $dateNow->getTimestamp();

        $data = [
            'closeid' => $currentTime,
            'CLOSEDATE' => $this->input->post('CLOSEDATE'),
            'CLINICID' => $this->session->userdata('id'),
        ];

        $this->CloseModel->insert($data);

        $this->session->set_flashdata('msg_holiday', 'เพิ่มวันหยุดเรียบร้อย');
        redirect(base_url('physician/time'));
    }

    public function timeHolidayDelete()
    {

        $this->CloseModel->delete($this->input->get('id'));

        $this->session->set_flashdata('msg_holiday', 'ลบวันหยุดเรียบร้อย');
        redirect(base_url('physician/time'));
    }

    public function youtube()
    {
        $youtube = $this->YoutubeModel->listData($this->session->userdata('id'));

        $data = [
            'youtube' => $youtube
        ];
//        print_r($youtube);
//        exit();

        $this->load->view('template/header_physician');
        $this->load->view('physician/youtube', $data);
        $this->load->view('template/footer_physician');
    }

    public function youtubeUpdate()
    {
        $this->YoutubeModel->deleteByClinicId($this->session->userdata('id'));
        $dateNow = new DateTime();

        $linkYoutube = $this->input->post('youtube');
        $select = $this->input->post('status');
        foreach ($linkYoutube as $key => $item) {
            $status = 0;
            if ($select == $key) {
                $status = 1;
            }
            $currentTime = $dateNow->getTimestamp();
            $data = [
                'ID' => $currentTime . $key,
                'CLINICID' => $this->session->userdata('id'),
                'LINK' => $item,
                'STATUS' => $status
            ];
            $this->YoutubeModel->insert($data);
        }

        $this->session->set_flashdata('msg', 'แก้ไขการตั้งค่า Youtube เรียบร้อย');
        redirect(base_url('physician/youtube'));
    }


    public function clinic()
    {
        $clinic = $this->ClinicModel->detailById($this->session->userdata('id'));

        $data = [
            'clinic' => $clinic
        ];

        $this->load->view('template/header_physician');
        $this->load->view('physician/clinic', $data);
        $this->load->view('template/footer_physician');
    }

    public function clinicUpdate()
    {
        $service = '';
        if (count($this->input->post('service')) > 0) {
            $service = implode(",", $this->input->post('service'));
        }

        $data = [
            'CLINICNAME' => $this->input->post('clinic_name'),
            'LINE' => $this->input->post('line_id'),
            'PHONE' => $this->input->post('phone'),
            'USERNAME' => $this->input->post('email'),
            'PROVINCE' => $this->input->post('province'),
            'LAT' => $this->input->post('lat'),
            'LONG' => $this->input->post('long'),
            'SERVICE' => $service,
            'ADDRESS' => $this->input->post('address'),
        ];

        $this->ClinicModel->updateById($data, $this->session->userdata('id'));

        $this->session->set_flashdata('msg', 'แก้ไขข้อมูลคลินิกเรียบร้อย');
        redirect(base_url('physician/clinic'));
    }


    public function doctor()
    {
        $clinic = $this->ClinicModel->detailById($this->session->userdata('id'));

        $data = [
            'clinic' => $clinic
        ];

        $this->load->view('template/header_physician');
        $this->load->view('physician/doctor', $data);
        $this->load->view('template/footer_physician');
    }

    public function doctorUpdate()
    {
        $degree = '';
        if (count($this->input->post('degree')) > 0) {
            $degree = implode(",", $this->input->post('degree'));
        }

        $data = [
            'DOCTORNAME' => $this->input->post('doctor_name'),
            'PROFICIENT' => $this->input->post('proficient'),
            'DIPLOMA' => $this->input->post('diploma'),
            'DEGREE' => $degree,
        ];

        $this->ClinicModel->updateById($data, $this->session->userdata('id'));

        $this->session->set_flashdata('msg', 'แก้ไขข้อมูลแพทย์เรียบร้อย');
        redirect(base_url('physician/doctor'));
    }

    public function showQues()
    {

        // Load package path
        // $this->load->add_package_path(FCPATH.'application/vendor/romainrg/ratchet_client');
        //$this->load->library('ratchet_client');
        // $this->load->remove_package_path(FCPATH.'application/vendor/romainrg/ratchet_client');

        // Run server
        //this->ratchet_client->run();
        //   $youtube = $this->ClinicModel->getYoutube($this->session->userdata('id'));
        $clinic = $this->ClinicModel->detailById($this->session->userdata('id'));
        $youtube = $this->YoutubeModel->getYoutube($this->session->userdata('id'));
        $youtubeLink = "https://www.youtube.com/embed/MCJLW8O5-dg?autoplay=1&mute=1&loop=1";
        if (count($youtube) > 0) {
            $pos = strpos($youtube[0]->LINK, '=');
            $link = substr($youtube[0]->LINK,$pos+1);
           // echo $link;
            $youtubeLink = "https://www.youtube.com/embed/".$link."?autoplay=1&mute=1&loop=1";
        }

        $data = [
            'clinic' => $clinic,
            'youtubeLink' => $youtubeLink
        ];

        $this->load->view('physician/show_ques', $data);
    }

    public function order()
    {
        $booking = $this->BookingModel->getCurrentQues($this->session->userdata('id'));
        if (count($booking) > 0) {
            echo $booking[0]->QUES;
        } else {
            echo '-';
        }
    }


    public function profile()
    {
        $clinic = $this->ClinicModel->detailById($this->session->userdata('id'));

        $data = [
            'clinic' => $clinic,
        ];

        $this->load->view('template/header_physician');
        $this->load->view('physician/profile', $data);
        $this->load->view('template/footer_physician');
    }

    public function profileUpdate()
    {
        $image = $this->input->post('old_image');

        if (!empty($_FILES["file"])) {
            $dir = dirname($_FILES["file"]["tmp_name"]);
            $destination = $dir . DIRECTORY_SEPARATOR . $_FILES["file"]["name"];
            rename($_FILES["file"]["tmp_name"], $destination);
            $image = $this->s3_upload->upload_file($destination);
            $this->session->set_userdata('image', $image);

            //remove old image S3
            if ($this->input->post('old_image') != '') {
                $this->s3_upload->deleteFile(basename($this->input->post('old_image')));
            }
        }

        $data = [
            'image' => $image
        ];

        $this->ClinicModel->updateById($data, $this->session->userdata('id'));

        $this->session->set_flashdata('msg', 'แก้ไขรูปภาพเรียบร้อย');

        redirect(base_url('physician/profile'));
    }

    public function passwordUpdate()
    {
        $password = $this->input->post('password');

        $data = [
            'PASSWORD' => md5($password),
        ];

        $this->ClinicModel->updateById($data, $this->session->userdata('id'));

        $this->session->set_flashdata('msgPwd', 'แก้ไขรหัสผ่านเรียบร้อย');

        redirect(base_url('physician/profile'));
    }


    public function check_old_password()
    {
        $password = $this->input->post('old_password');
        $check = $this->ClinicModel->checkOldPassword(md5($password), $this->session->userdata('id'));
        if ($check == false) {
            echo 'false';
        } else {
            echo 'true';
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('physician/login'));
    }

    public function chat()
    {
        $arr['message'] = "RESPONSE";
        $arr['date'] = date('m-d-Y');
        $arr['msgcount'] = 30;
        $arr['success'] = true;
        echo json_encode($arr);
    }
}
