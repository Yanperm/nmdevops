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
}
