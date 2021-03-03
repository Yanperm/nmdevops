<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->logged_in();
        $this->load->model('AdminModel');
        $this->load->model('ClinicModel');
        $this->load->model('BookingModel');
        $this->load->model('MembersModel');
        $this->load->model('CloseModel');
        $this->load->model('YoutubeModel');
        $this->load->library('pagination');
        $this->load->library('S3_upload');
        $this->load->library('S3');
    }

    private function logged_in()
    {
        if (!$this->session->userdata('authenticated')) {
            redirect(base_url('login'));
        }
    }

    public function dashboard()
    {
        $countClinic =  count($this->ClinicModel->getAll());
        $countPatient =  count($this->MembersModel->getData());
        $countBooking =  count($this->BookingModel->getAll());
        $countBookingChecked =  count($this->BookingModel->getAllChecked());
        $countQueueToday =  count($this->BookingModel->getAllQueueToday());
        $countQueueTomorrow =  count($this->BookingModel->getAllQueueTomorrow());

//echo 'SELECT * FROM tbbooking where BOOKDATE = "'.date('Y-m-d').'"';
//exit();

//        $allBooking = $this->BookingModel->getDataAllByClinic($this->session->userdata('id'));
//        $todayBooking = $this->BookingModel->getDataTodayByClinic($this->session->userdata('id'));
//
        $data = [
            'countClinic' => $countClinic,
            'countPatient' => $countPatient,
            'countBooking' => $countBooking,
            'countBookingChecked' => $countBookingChecked,
            'countQueueToday' => $countQueueToday,
            'countQueueTomorrow' => $countQueueTomorrow
           // 'todayBooking' => $todayBooking[0]->TODAYBOOKING
        ];

        $this->load->view('template/header_admin');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template/footer_physician');
    }
}
