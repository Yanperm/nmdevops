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

        $booking = $this->BookingModel->getData($clinicId, $date);

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

        $clinic = $this->ClinicModel->detailById($clinicId);

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
        $telephone = $this->input->post('telephone');
        $lineId = $this->input->post('line_id');
        $cause = $this->input->post('cause');
        $date = $this->input->post('date');
        $time = $this->input->post('time');
        $clinicId = $this->input->post('clinic_id');
        $ques = $this->input->post('ques');
        $qber = $this->input->post('qber');

        $dateNow = new DateTime();
        $currentTime = $dateNow->getTimestamp();

        //Duplicate email check
        $userId = $this->MembersModel($email);

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
            ข้อมูลการเช้าระบบ\r\n
            username : " . $email . "\r\n
            password : " . $telephone . "\r\n
            \r\n\r\nขอขอบคุณที่ให้ความไว้วางใจเลือกใช้บริการ Nutmor \r\nทีมงาน Nutmor";
            sendMail($email, $subject, $message);
        }

        //insert booking
        $data = [
            'BOOKINGID' => 'VN' . $currentTime,
            'QUES' => $ques,
            'QBER' => $qber,
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
            'time' => $time
        ];
        $subject = "ยืนยันการนัดหมอ";
        $message = $this->load->view('email_template', $dataEmail, true);

        //sendmail
        if ($email != '') {
            sendMail($email, $subject, $message);
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
        $clinic = $this->ClinicModel->getdata();
        $clinicId = '';
        if (!empty($this->input->get('clinic'))) {
            $clinicId = $this->input->get('clinic');
        }

        $data = [
            'clinic' => $clinic,
            'clinicId' => $clinicId
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
            sendMail($booking[0]->EMAIL, $subject, $message);
        }

        $this->load->view('template/header');
        $this->load->view('clinic/confirm_checkin');
        $this->load->view('template/footer');
    }
}
