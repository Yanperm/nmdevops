<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clinic extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ClinicModel');
        $this->load->model('BookingModel');
        $this->load->model('MembersModel');
    }

    public function detail()
    {
        $clinicId = $this->uri->segment('2');

        $clinic = $this->ClinicModel->detail($clinicId);

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

        $booking = $this->BookingModel->getData($clinicId, $date);
//        echo '<pre>';
//        print_r($booking);
//        echo '</pre>';
//        exit();

        $data = [
            'date' => $date,
            'clinic' => $clinic,
            'times' => $times,
            'interval' => $interval,
            'booking' => $booking
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

        $clinic = $this->ClinicModel->detail($clinicId);

        $data = [
            'date' => $date,
            'clinic' => $clinic,
            'time' => $time,
            'ques' => $ques,
            'qber' => $qber,
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
        $idCard = $this->input->post('id_card');
        $telephone = $this->input->post('telephone');
        $lineId = $this->input->post('line_id');
        $cause = $this->input->post('cause');
        $date = $this->input->post('date');
        $time = $this->input->post('time');
        $clinicId = $this->input->post('clinic_id');
        $ques = $this->input->post('ques');
        $qber = $this->input->post('qber');

        //insert member
        $dateNow = new DateTime();
        $timeId = $dateNow->getTimestamp();
        $data = [
            'MEMBERIDCARD' => $timeId,
            'CUSTOMERNAME' => $firstName . " " . $lastName,
            'IDCARD' => $idCard,
            'LINEID' => $lineId,
            'EMAIL' => $email,
            'PASSWORD' => md5('1234'),
            'PHONE' => $telephone,
        ];
        $this->MembersModel->insert($data);

        //insert booking
        $data = [
            'BOOKINGID' => 'VN' . $timeId,
            'QUES' => $ques,
            'QBER' => $qber,
            'IDCARD' => $idCard,
            'MEMBERIDCARD' => $timeId,
            'CLINICID' => $clinicId,
            'BOOKDATE' => $date,
            'BOOKTIME' => $time,
            'DETAIL' => $cause
        ];
        $this->ClinicModel->insert($data);

        $clinic = $this->ClinicModel->detail($clinicId);


        $dataEmail = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'idCard' => $idCard,
            'telephone' => $telephone,
            'lineId' => $lineId,
            'cause' => $cause,
            'date' => $date,
            'time' => $time
        ];
        $subject = "ยืนยันการนัดหมอ";
        $message = $this->load->view('email_template', $dataEmail, true);

        //sendmail
        if ($email != '') {
            $this->sendMail($email, $subject, $message);
        }

        $data = [
            'clinic' => $clinic
        ];

        $this->load->view('template/header');
        $this->load->view('clinic/confirm', $data);
        $this->load->view('template/footer');
    }

    public function sendMail($to, $subject, $message)
    {
        $config = array(
            'useragent' => 'nutmor.com',
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.postmarkapp.com',
            'smtp_port' => 587,
            'smtp_user' => '7bf89511-c52e-4073-bddd-e878a3f7650c',
            'smtp_pass' => '7bf89511-c52e-4073-bddd-e878a3f7650c',
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
    }

    public function checkIn(){
        $clinic = $this->ClinicModel->getdata();
        $clinicId = '';
        if(!empty($this->input->get('clinic'))){
            $clinicId =$this->input->get('clinic');
        }

        $data = [
            'clinic' => $clinic,
            'clinicId' => $clinicId
        ];

        $this->load->view('template/header');
        $this->load->view('clinic/checkin', $data);
        $this->load->view('template/footer');
    }

    public function detailCheckin(){
        $clinic = $this->input->post('clinic');
        $email = $this->input->post('email');

        $detail = $this->BookingModel->getCheckin($clinic,$email);

        $data = [
            'detail' => $detail
        ];

        $this->load->view('template/header');
        $this->load->view('clinic/detail_checkin', $data);
        $this->load->view('template/footer');
    }

    public function confirmCheckin(){
        $bookingId = $this->uri->segment('3');

        $this->BookingModel->checkin($bookingId);

        $booking = $this->BookingModel->detail($bookingId);

        $subject = "ยืนยันการเช็คอิน";
        $message = "ยืนยันการเช็คอิน การจองหมายเลข : ".$booking[0]->BOOKINGID."\n";
        $message .= "วันที่ : ".$booking[0]->BOOKDATE."\n";
        $message .= "เวลา : ".$booking[0]->BOOKTIME."\n";
        $message .= "คิว : ".$booking[0]->QUES."\n";

        //sendmail
        if ($booking[0]->EMAIL != '') {
            $this->sendMail($booking[0]->EMAIL, $subject, $message);
        }

        $this->load->view('template/header');
        $this->load->view('clinic/confirm_checkin');
        $this->load->view('template/footer');
    }
}
