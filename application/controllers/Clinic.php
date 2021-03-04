<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
        if(!empty($this->input->get('type'))){
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

        $clinic = $this->ClinicModel->detail($clinicName);

        $data = [
            'clinic' => $clinic
        ];

        $this->load->view('template/header');
        $this->load->view('clinic/detail', $data);
        $this->load->view('template/footer');
    }

    public function time()
    {
        $clinicId = $this->uri->segment('2');
        $date = $this->input->post('booking_date');

        $clinic = $this->ClinicModel->detail($clinicId);
        $today = date('D');
        $startTime = '';
        $endTime = '';

        if ($today == 'Sun') {
            $startTime = $clinic->TIME_OPEN;
            $endTime = $clinic->TIME_CLOSE;
        } else if ($today == 'Mon') {
            $startTime = $clinic->TIME1;
            $endTime = $clinic->CLOSE1;
        } else if ($today == 'Tue') {
            $startTime = $clinic->TIME2;
            $endTime = $clinic->CLOSE2;
        } else if ($today == 'Wed') {
            $startTime = $clinic->TIME3;
            $endTime = $clinic->CLOSE3;
        } else if ($today == 'Thu') {
            $startTime = $clinic->TIME4;
            $endTime = $clinic->CLOSE4;
        } else if ($today == 'Fri') {
            $startTime = $clinic->TIME5;
            $endTime = $clinic->CLOSE5;
        } else if ($today == 'Sat') {
            $startTime = $clinic->TIME6;
            $endTime = $clinic->CLOSE6;
        }

        $begin = new DateTime($startTime);
        $end = new DateTime($endTime);

        $interval = DateInterval::createFromDateString('15 min');

        $times = new DatePeriod($begin, $interval, $end);

        $booking = $this->BookingModel->getData($clinic->CLINICID, $date);
        $bookingExtraQues = $this->BookingModel->getDataExtra($clinic->CLINICID, $date);

        $data = [
            'date' => $date,
            'clinic' => $clinic,
            'times' => $times,
            'interval' => $interval,
            'booking' => $booking,
            'bookingExtraQues' => $bookingExtraQues
        ];

        $this->load->view('template/header');
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
        if (!empty($this->session->userdata('authenticated'))){
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




        $this->load->view('template/header');
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
        if($time == '0'){
            $type = 1;
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
            $this->sendgrid($email, $subject, $message);
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
        $subject = "ยืนยันการนัดหมอ";
        $message = $this->load->view('email_template', $dataEmail, true);

        //sendmail
        if ($email != '') {
            $this->sendgrid($email, $subject, $message);
        }

        $data = [
            'clinic' => $clinic
        ];

        $this->load->view('template/header');
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

        $booking = $this->BookingModel->detail($bookingId);

        $subject = "ยืนยันการเช็คอิน";
        $message = "ยืนยันการเช็คอิน การจองหมายเลข : " . $booking[0]->BOOKINGID . "\n";
        $message .= "วันที่ : " . $booking[0]->BOOKDATE . "\n";
        $message .= "เวลา : " . $booking[0]->BOOKTIME . "\n";
        $message .= "คิว : " . $booking[0]->QUES . "\n";

        //sendmail
        if ($booking[0]->EMAIL != '') {
            $this->sendgrid($booking[0]->EMAIL, $subject, $message);
        }

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
                        'authenticated' => TRUE,
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
                        'authenticated' => TRUE,
                        'activate' => $user->ACTIVATE,
                        'email' => $user->USERNAME,
                        'type' => 'clinic',
                        'image' => $user->image
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

    public function sendMail($to, $subject, $message){
        //Postmark Service Mail
        $config = array(
            'useragent' => 'nutmor.com',
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.postmarkapp.com',
            'smtp_port' => 25,
            'smtp_user' => 'e4d0462d-b4ff-433b-9f87-fdf266d57c2f',
            'smtp_pass' => 'e4d0462d-b4ff-433b-9f87-fdf266d57c2f',
            'smtp_crypto' => 'TLS',
            'mailtype' => 'html',
            'charset' => 'utf-8',
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('no-reply@nutmor.com', "Nutmor.com");
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();

        return true;
    }

    public function sendgrid($to, $subject, $message){
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
