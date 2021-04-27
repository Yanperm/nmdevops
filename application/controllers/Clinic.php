<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clinic extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('S3_upload');
        $this->load->library('S3');
        $this->load->model('ClinicModel');
        $this->load->model('BookingModel');
        $this->load->model('MembersModel');
        $this->load->model('StatModel');
        $this->load->model('LikeModel');
        $this->load->model('CloseModel');
    }


    public function index()
    {
        $this->load->view('template/header_doctor');
        $this->load->view('clinic/index');
        $this->load->view('template/footer');
    }

    public function register()
    {
        $type = '2';
        if (!empty($this->input->get('type'))) {
            $type = $this->input->get('type');
        }

        $data = [
            'type' => $type
        ];

        $this->load->view('template/header_doctor');
        $this->load->view('clinic/register', $data);
        $this->load->view('template/footer');
    }

    public function package()
    {
        $this->load->view('template/header_doctor');
        $this->load->view('clinic/package');
        $this->load->view('template/footer');
    }

    public function detail()
    {
        $clinicName = $this->uri->segment('2');

        $clinic = $this->ClinicModel->detailByEnName($clinicName);

        //add stat
        $userId = $_SERVER['REMOTE_ADDR'];
        $data = [
            "IP" => $userId,
            "IDCLINIC" => $clinic->IDCLINIC,
            "CREATEDATE" => date('Y-m-d H:i:s')
        ];
        $this->StatModel->insert($data);

        //add view
        $data = [
            'view_count' => $clinic->view_count + 1
        ];
        $this->ClinicModel->updateById($data, $clinic->IDCLINIC);

        $dataHeader = [
          'title' => $clinic->SEO_TITLE,
          'meta' => $clinic->SEO_META
        ];

        $data = [
            'clinic' => $clinic
        ];

        $this->load->view('template/header', $dataHeader);
        $this->load->view('clinic/detail', $data);
        $this->load->view('template/footer');
    }

    public function like()
    {
        $id = $_POST['id'];

        $check = $this->LikeModel->getDataById($this->session->userdata('id'), $id);
        if (empty($check)) {
            $data = [
                'MEMBERID' => $this->session->userdata('id'),
                'CLINICID' => $id,
                'CREATEDATE' => date('Y-m-d H:i:s')
            ];

            $this->LikeModel->insert($data);
            echo true;
        } else {
            $this->LikeModel->delete($this->session->userdata('id'), $id);
            echo true;
        }
    }

    public function time()
    {
        $clinicId = $this->uri->segment('2');
        $date = $this->input->post('booking_date');
        $datetime = new DateTime($date);
        $today = $datetime->format('D');

        $clinic = $this->ClinicModel->detailById($clinicId);
        //  $today = date('D');
        $startTime = '';
        $endTime = '';

        $close = $this->CloseModel->listData($clinicId);
        $closeStatus = false;
        foreach ($close as $item) {
            if ($item->CLOSEDATE == $date) {
                $closeStatus = true;
            }
        }

        if ($today == 'Sun') {
            $startTime = $clinic->TIME_OPEN;
            $endTime = $clinic->TIME_CLOSE;
        } elseif ($today == 'Mon') {
            $startTime = $clinic->TIME1;
            $endTime = $clinic->CLOSE1;
        } elseif ($today == 'Tue') {
            $startTime = $clinic->TIME2;
            $endTime = $clinic->CLOSE2;
        } elseif ($today == 'Wed') {
            $startTime = $clinic->TIME3;
            $endTime = $clinic->CLOSE3;
        } elseif ($today == 'Thu') {
            $startTime = $clinic->TIME4;
            $endTime = $clinic->CLOSE4;
        } elseif ($today == 'Fri') {
            $startTime = $clinic->TIME5;
            $endTime = $clinic->CLOSE5;
        } elseif ($today == 'Sat') {
            $startTime = $clinic->TIME6;
            $endTime = $clinic->CLOSE6;
        }

        $begin = new DateTime($startTime);
        $end = new DateTime($endTime);

        $interval = DateInterval::createFromDateString($clinic->QUETIME.' min');

        $times = new DatePeriod($begin, $interval, $end);

        $booking = $this->BookingModel->getData($clinic->CLINICID, $date);
        $bookingExtraQues = $this->BookingModel->getDataExtra($clinic->CLINICID, $date);

        if ($clinicId == 'CL299') {
            $bookingExtraQuesC = $this->BookingModel->getDataExtraC($clinic->CLINICID, $date);
        } else {
            $bookingExtraQuesC = null;
        }

        $maxQber = $this->BookingModel->getMaxQueue($clinic->CLINICID, $date);


        //check booked
        $statusBooked = false;
        $queueBooked = "";
        if (!empty($this->session->userdata('id'))) {
            foreach ($booking as $item) {
                if ($item->MEMBERIDCARD == $this->session->userdata('id')) {
                    $statusBooked = true;
                    $queueBooked = $item->QUES;
                }
            }
        }


        $data = [
            'date' => $date,
            'clinic' => $clinic,
            'times' => $times,
            'interval' => $interval,
            'booking' => $booking,
            'bookingExtraQues' => $bookingExtraQues,
            'bookingExtraQuesC' => $bookingExtraQuesC,
            'maxQber' => $maxQber,
            'statusBooked' => $statusBooked,
            'queueBooked' => $queueBooked,
            'closeStatus' => $closeStatus
        ];

        $dataHeader = [
          'title' => $clinic->SEO_TITLE,
          'meta' => $clinic->SEO_META
        ];


        $this->load->view('template/header', $dataHeader);
        $this->load->view('clinic/time', $data);
        $this->load->view('template/footer');
    }

    public function booking()
    {
        $clinicId = $this->uri->segment('2');
        $date = $this->input->get('booking_date');
        $time = $this->input->get('booking_time');
        $ques = $this->input->get('ques');
        $qber = $this->input->get('qber');

        $clinic = $this->ClinicModel->detailById($clinicId);
        $member = [];
        if (!empty($this->session->userdata('authenticated'))) {
            $member = $this->MembersModel->detail($this->session->userdata('id'));
        }

        $data = [
            'date' => $date,
            'clinic' => $clinic,
            'time' => $time,
            'ques' => $ques,
            'qber' => $qber,
            'member' => $member
        ];

        $dataHeader = [
          'title' => $clinic->SEO_TITLE,
          'meta' => $clinic->SEO_META
        ];

        $this->load->view('template/header', $dataHeader);
        $this->load->view('clinic/booking', $data);
        $this->load->view('template/footer');
    }

    public function confirm()
    {
        $firstName = $this->input->post('firstname_booking');
        $lastName = $this->input->post('lastname_booking');
        $email = $this->input->post('email');
        $telephone = $this->input->post('telephone');
        $lineId = $this->input->post('line_id');
        $cause = $this->input->post('cause');
        $date = $this->input->post('date');
        $time = $this->input->post('time');
        $clinicId = $this->input->post('clinic_id');
        $ques = $this->input->post('ques');
        $qber = $this->input->post('qber');

        $type = 0;
        if ($time == '0' && substr($ques, 0, 1) == 'B') {
            $type = 1;
            $time = '';
        }

        if ($time == '0' && substr($ques, 0, 1) == 'C') {
            $type = 2;
            $time = '';
        }

        $dateNow = new DateTime();
        $currentTime = $dateNow->getTimestamp();

        //Duplicate email check
        $userId = $this->MembersModel->checkDuplicate($email);

        if ($userId == false) {
            $userId = $currentTime;
            //insert member
            $data = [
                'MEMBERIDCARD' => $currentTime,
                'CUSTOMERNAME' => $firstName . " " . $lastName,
                'LINEID' => $lineId,
                'EMAIL' => $email,
                'PASSWORD' => md5($telephone),
                'PHONE' => $telephone,
            ];
            $this->MembersModel->insert($data);
            $subject = "ยืนยันการสมัครสมาชิก เว็บไซต์ Nutmor";
            $message = "ยืนยันการสมัครสมาชิก เว็บไซต์ Nutmor\r\nขอบคุณ คุณ " . $firstName . " " . $lastName . " ที่ให้ความไว้วางใจสมัครสมาชิกเพื่อใช้บริการกับเรา\r\n
            ข้อมูลการเข้าสู่ระบบ\r\n
            username : " . $email . "\r\n
            password : " . $telephone . "\r\n
            \r\n\r\nขอขอบคุณที่ให้ความไว้วางใจเลือกใช้บริการ Nutmor \r\nทีมงาน Nutmor";
            $this->sendMail($email, $subject, $message);
        }

        //insert booking
        $data = [
            'BOOKINGID' => 'VN' . $currentTime,
            'QUES' => $ques,
            'QBER' => $qber,
            'TYPE' => $type,
            'MEMBERIDCARD' => $userId,
            'CLINICID' => $clinicId,
            'BOOKDATE' => $date,
            'BOOKTIME' => $time,
            'DETAIL' => $cause
        ];
        $this->ClinicModel->insert($data);

        $clinic = $this->ClinicModel->detailById($clinicId);

        $dataEmail = [
            'clinicName' => $clinic->CLINICNAME,
            'vn' => 'VN' . $currentTime,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'telephone' => $telephone,
            'lineId' => $lineId,
            'cause' => $cause,
            'date' => $date,
            'time' => $time,
            'ques' => $ques
        ];
        $subject = "ยืนยันการนัดหมอ " . $clinic->CLINICNAME;
        $message = $this->load->view('email_template', $dataEmail, true);

        //sendmail
        if ($email != '') {
            $this->sendMail($email, $subject, $message);
        }

        $data = [
            'clinic' => $clinic
        ];

        $dataHeader = [
          'title' => $clinic->SEO_TITLE,
          'meta' => $clinic->SEO_META
        ];

        $this->load->view('template/header', $dataHeader);
        $this->load->view('clinic/confirm', $data);
        $this->load->view('template/footer');
    }

    public function checkIn()
    {
        $vn = '';
        $email = '';
        if (!empty($this->input->get('vn'))) {
            $vn = $this->input->get('vn');
        }
        if (!empty($this->input->get('email'))) {
            $email = $this->input->get('email');
        }

        $clinic = $this->ClinicModel->getdata();
        $clinicId = '';
        if (!empty($this->input->get('clinic'))) {
            $clinicId = $this->input->get('clinic');
        }

        $data = [
            'clinic' => $clinic,
            'clinicId' => $clinicId,
            'vn' => $vn,
            'email' => $email
        ];

        $this->load->view('template/header');
        $this->load->view('clinic/checkin', $data);
        $this->load->view('template/footer');
    }

    public function checkinLast()
    {
        $email = $_GET['email'];
        $clinicId = $_GET['idClinic'];
        $check = $this->BookingModel->getCheckinLast($clinicId, $email);

        header('Content-Type: application/json');
        echo json_encode($check);
    }

    public function checkinFast()
    {
        $id = $_GET['id'];
        $check = $this->BookingModel->checkin($id);

        // $booking = $this->BookingModel->detail($id);
        //
        // $subject = "ยืนยันการเช็คอิน";
        // $message = "ยืนยันการเช็คอิน การจองหมายเลข : " . $booking[0]->BOOKINGID . "\n";
        // $message .= "วันที่ : " . $booking[0]->BOOKDATE . "\n";
        // $message .= "เวลา : " . $booking[0]->BOOKTIME . "\n";
        // $message .= "คิว : " . $booking[0]->QUES . "\n";
        //
        // //sendmail
        // if ($booking[0]->EMAIL != '') {
        //     $this->sendMail($booking[0]->EMAIL, $subject, $message);
        // }
        echo "true";
    }


    public function detailCheckin()
    {
        $email = $this->input->post('email');

        $detail = '';

        $clinicId = '';
        if (!empty($this->input->post('clinic'))) {
            $clinicId = $this->input->post('clinic');
            $detail = $this->BookingModel->getCheckin($clinicId, $email);
        }

        $vnId = '';
        if (!empty($this->input->post('vn'))) {
            $vnId = $this->input->post('vn');
            $detail = $this->BookingModel->getCheckinByVN($vnId, $email);
        }

        $data = [
            'detail' => $detail
        ];

        $this->load->view('template/header');
        $this->load->view('clinic/detail_checkin', $data);
        $this->load->view('template/footer');
    }

    public function confirmCheckin()
    {
        $bookingId = $this->uri->segment('3');

        $this->BookingModel->checkin($bookingId);

        // $booking = $this->BookingModel->detail($bookingId);
        //
        // $subject = "ยืนยันการเช็คอิน";
        // $message = "ยืนยันการเช็คอิน การจองหมายเลข : " . $booking[0]->BOOKINGID . "\n";
        // $message .= "วันที่ : " . $booking[0]->BOOKDATE . "\n";
        // $message .= "เวลา : " . $booking[0]->BOOKTIME . "\n";
        // $message .= "คิว : " . $booking[0]->QUES . "\n";
        //
        // //sendmail
        // if ($booking[0]->EMAIL != '') {
        //     $this->sendMail($booking[0]->EMAIL, $subject, $message);
        // }

        $this->load->view('template/header');
        $this->load->view('clinic/confirm_checkin');
        $this->load->view('template/footer');
    }

    public function profile()
    {
        $clinic = $this->ClinicModel->detailById($this->session->userdata('id'));
        // $allcount = $this->db->where('MEMBERIDCARD', $this->session->userdata('id'))->count_all_results('tbbooking');

        $data = [
            'clinic' => $clinic,
            // 'countBooking' => $allcount
        ];

        $this->load->view('template/header');
        $this->load->view('clinic/profile', $data);
        $this->load->view('template/footer');
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'required');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $type = $this->input->post('type');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header_doctor');
            $this->load->view('clinic/login');
            $this->load->view('template/footer');
        } else {
            $email = $this->security->xss_clean($this->input->post('email'));
            $password = $this->security->xss_clean($this->input->post('password'));

            $user = false;

            if ($type == 'member') {
                $user = $this->MembersModel->login($email, $password);
            }

            if ($type == 'clinic') {
                $user = $this->ClinicModel->login($email, $password);
            }

            if ($user) {
                $userdata = array();

                if ($type == 'member') {
                    $userdata = array(
                        'id' => $user->MEMBERIDCARD,
                        'name' => $user->CUSTOMERNAME,
                        'authenticated' => true,
                        'activate' => $user->ACTIVATE_STATUS,
                        'email' => $user->EMAIL,
                        'type' => 'member',
                        'image' => $user->IMAGE
                    );
                    $this->session->set_userdata($userdata);

                    redirect(base_url(''));
                } else {
                    $userdata = array(
                        'id' => $user->IDCLINIC,
                        'name' => $user->CLINICNAME,
                        'authenticated' => true,
                        'activate' => $user->ACTIVATE,
                        'email' => $user->USERNAME,
                        'type' => 'clinic',
                        'image' => $user->image,
                        'goldMember' => $user->GOLD_MEMBER_STATUS
                    );
                    $this->session->set_userdata($userdata);

                    redirect(base_url('physician/dashboard'));
                }
            } else {
                $this->session->set_flashdata('message', 'อีเมลหรือรหัสผ่านไม่ถูกต้อง');
                redirect(base_url('physician/login'));
            }
        }
    }

    public function currentQueue()
    {
        $clinicId = $_GET["clinic_id"];
        $currentQues = $this->BookingModel->getCurrentQues($clinicId);

        header('Content-type: application/json');
        echo json_encode($currentQues);
    }

    public function sendMail($to, $subject, $message)
    {
        //gmail

        $config['protocol']  = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_user'] = $this->config->item('username_gmail');
        $config['smtp_pass'] = $this->config->item('password_email');
        $config['smtp_port'] = 465;
        $config['charset']   = 'utf-8';
        $config['mailtype']  = 'html';
        $config['newline']   = "\r\n";


        //Postmark Service Mail
        // $config = array(
        //     'useragent' => 'nutmor.com',
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'smtp.postmarkapp.com',
        //     'smtp_port' => 25,
        //     'smtp_user' => $this->config->item('username_email'),
        //     'smtp_pass' => $this->config->item('password_email'),
        //     'smtp_crypto' => 'TLS',
        //     'mailtype' => 'html',
        //     'charset' => 'utf-8',
        // );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('no-reply@nutmor.com', "Nutmor.com");
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();

        return true;
    }

    public function sendgrid($to, $subject, $message)
    {
        $this->load->library('email');
        $this->email->initialize(array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.sendgrid.net',
            'smtp_user' => 'apikey',
            'smtp_pass' => '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',
            'smtp_port' => 587,
            'mailtype' => 'html',
            'crlf' => "\r\n",
            'newline' => "\r\n"
        ));

        $this->email->from('no-reply@nutmor.com', 'Nutmor.com');
        $this->email->to($to);
        // $this->email->cc('partchayanan.y@outlook.co.th');
        // $this->email->bcc('partchayanan@oulook.com');
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();

        echo $this->email->print_debugger();
    }
}
