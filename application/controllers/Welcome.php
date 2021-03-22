<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ClinicModel');
        $this->load->model('AdvertiseModel');
        $this->load->model('YoutubeModel');
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
            $link = substr($youtube[0]->LINK,$pos+1);
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

    public function sendgrid(){
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
