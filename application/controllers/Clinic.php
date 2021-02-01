<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clinic extends CI_Controller {

    public function detail()
    {
        $clinicId = $this->uri->segment('2');

        $this->load->view('template/header');
        $this->load->view('clinic/detail');
        $this->load->view('template/footer');
    }
}
