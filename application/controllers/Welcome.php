<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ClinicModel');
    }
	public function index()
	{
        $clinic = $this->ClinicModel->getData();

        $data = [
            'clinic' => $clinic
        ];

		$this->load->view('template/header');
        $this->load->view('welcome_message', $data);
		$this->load->view('template/footer');
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
