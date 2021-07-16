<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ClinicModel');
        $this->load->model('AdvertiseModel');
        $this->load->model('YoutubeModel');
        $this->load->model('BookingModel');
    }
    public function index()
    {
        $advertise = $this->AdvertiseModel->listData();

        $clinic = $this->ClinicModel->getData();

        $data = [
            'clinic' => $clinic,
            'advertise' => $advertise
        ];

        $this->load->view('template/header');
        $this->load->view('welcome_message', $data);
        $this->load->view('template/footer');
    }

    public function showQues()
    {
        $clinicName = $this->uri->segment('2');

        $clinic = $this->ClinicModel->detailByEnName($clinicName);
        $youtube = $this->YoutubeModel->getYoutube($clinic->IDCLINIC);
        $youtubeLink = "https://www.youtube.com/embed/MCJLW8O5-dg?autoplay=1&mute=1&loop=1";
        if (count($youtube) > 0) {
            $pos = strpos($youtube[0]->LINK, '=');
            $link = substr($youtube[0]->LINK, $pos+1);
            // echo $link;
            $youtubeLink = "https://www.youtube.com/embed/".$link."?autoplay=1&mute=1&controls=1&loop=1&playlist=".$link."&amp;showinfo=0";
            //  $youtubeLink = "https://www.youtube.com/embed/".$link."?autoplay=1&mute=1&loop=1";
        }

        $data = [
            'clinic' => $clinic,
            'youtubeLink' => $youtubeLink
        ];

        $this->load->view('physician/show_ques', $data);
    }

    public function getCurrentQueue(){
        $clinic_id = $_GET['clinic_id'];

        $booking = $this->BookingModel->getCurrentQues($clinic_id);
        if (count($booking) > 0) {
            echo $booking[0]->QUES;
        } else {
            echo '';
        }
    }

    public function notificationCheckin()
    {
        $nextTwoDate = date('Y-m-d', strtotime(date("Y-m-d") .' +2 day'));
        $booking = $this->BookingModel->alert($nextTwoDate);

        foreach ($booking as $key => $value) {
            $booking = $this->BookingModel->detail($value->BOOKINGID);

            $dataEmail = [
              'clinicName' => $booking[0]->CLINICNAME,
              'vn' => $booking[0]->BOOKINGID,
              'name' => $booking[0]->CUSTOMERNAME,
              'telephone' => $booking[0]->PHONE,
              'lineId' => $booking[0]->LINEID,
              'cause' => $booking[0]->cause,
              'date' => $booking[0]->BOOKDATE,
              'time' => $booking[0]->BOOKTIME,
              'ques' => $booking[0]->QUES,
            ];
            //$this->load->view('email_checkin', $dataEmail);
            $subject = "แจ้งเตือนการนัดหมอ " . $booking[0]->CLINICNAME;
            $message = $this->load->view('email_checkin', $dataEmail, true);
            $this->sendMail($booking[0]->EMAIL, $subject, $message);
        }
    }

    public function notificationBooking()
    {
        $today = date('Y-m-d');
        $booking = $this->BookingModel->alertBooking($today);

        foreach ($booking as $key => $value) {
            $booking = $this->BookingModel->detail($value->BOOKINGID);

            $dataEmail = [
              'clinicName' => $booking[0]->CLINICNAME,
              'vn' => $booking[0]->BOOKINGID,
              'name' => $booking[0]->CUSTOMERNAME,
              'telephone' => $booking[0]->PHONE,
              'lineId' => $booking[0]->LINEID,
              'cause' => $booking[0]->cause,
              'date' => $booking[0]->BOOKDATE,
              'time' => $booking[0]->BOOKTIME,
              'ques' => $booking[0]->QUES,
            ];
            //$this->load->view('email_checkin', $dataEmail);
            $subject = "แจ้งเตือนวันพบแพทย์ " . $booking[0]->CLINICNAME;
            $message = $this->load->view('email_detail', $dataEmail, true);
            $this->sendMail($booking[0]->EMAIL, $subject, $message);
        }
    }

    public function sendMail($to, $subject, $message)
    {
        //Postmark Service Mail
        $config = array(
            'useragent' => 'nutmor.com',
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.postmarkapp.com',
            'smtp_port' => 25,
            'smtp_user' => $this->config->item('username_email'),
            'smtp_pass' => $this->config->item('password_email'),
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

    public function sendgrid()
    {
        $this->load->library('email');
        $this->email->initialize(array(
        'protocol' => 'smtp',
        'smtp_host' => 'smtp.sendgrid.net',
        'smtp_user' => 'apikey',
        'smtp_pass' => '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',
        'smtp_port' => 587,
        'crlf' => "\r\n",
        'newline' => "\r\n"
        ));

        $this->email->from('no-reply@nutmor.com', 'Nutmor.com');
        $this->email->to('partchayanan.y@gmail.com');
        $this->email->cc('partchayanan.y@outlook.co.th');
        $this->email->bcc('partchayanan@oulook.com');
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');
        $this->email->send();

        echo $this->email->print_debugger();
    }
}
