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
        $this->load->library('pagination');
    }

    private function logged_in()
    {
        if (!$this->session->userdata('authenticated')) {
            redirect(base_url('login'));
        } else if($this->session->userdata('authenticated') && !$this->session->userdata('activate')){
            if (!$this->session->userdata('activate')) {
                redirect(base_url('verify') . "?email=" . $this->session->userdata('email') . "&type=clinic");
            }
        }
    }

    public function dashboard(){
        $this->load->view('template/header_physician');
        $this->load->view('physician/dashboard');
        $this->load->view('template/footer_physician');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('physician/login'));
    }



}
