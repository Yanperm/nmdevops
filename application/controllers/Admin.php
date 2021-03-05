<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->logged_in();
        $this->load->model('AdminModel');
        $this->load->model('AdvertiseModel');
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

    public  function clinic(){
        $clinic = $this->ClinicModel->getAll();

        $data = [
            'clinic' => $clinic
        ];

        $this->load->view('template/header_admin');
        $this->load->view('admin/clinic', $data);
        $this->load->view('template/footer_physician');
    }

    public  function patient(){
        $patient = $this->MembersModel->getData();

        $data = [
            'patient' => $patient
        ];

        $this->load->view('template/header_admin');
        $this->load->view('admin/patient', $data);
        $this->load->view('template/footer_physician');
    }

    public function patientData()
    {
        $order_index = $this->input->get('order[0][column]');
        $param['page_size'] = $this->input->get('length');
        $param['start'] = $this->input->get('start');
        $param['draw'] = $this->input->get('draw');
        $param['keyword'] = trim($this->input->get('search[value]'));
        $param['column'] = $this->input->get("columns[{$order_index}][data]");
        $param['dir'] = $this->input->get('order[0][dir]');
        $results = $this->MembersModel->find_with_page($param);
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public  function advertise(){

        $this->load->view('template/header_admin');
        $this->load->view('admin/advertise');
        $this->load->view('template/footer_physician');
    }

    public function advertiseData()
    {
        $order_index = $this->input->get('order[0][column]');
        $param['page_size'] = $this->input->get('length');
        $param['start'] = $this->input->get('start');
        $param['draw'] = $this->input->get('draw');
        $param['keyword'] = trim($this->input->get('search[value]'));
        $param['column'] = $this->input->get("columns[{$order_index}][data]");
        $param['dir'] = $this->input->get('order[0][dir]');
        $results = $this->AdvertiseModel->find_with_page($param);
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}
