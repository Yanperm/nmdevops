<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ClinicModel');
    }

    public function listData()
    {
        $textSearch = $this->input->get('text_search');
        $typeSearch = $this->input->get('type_search');

        $clinic = $this->ClinicModel->search($textSearch,$typeSearch);

        $data = [
            'textSearch' => $textSearch,
            'typeSearch' => $typeSearch,
            'clinic' => $clinic
        ];

        $this->load->view('template/header');

        if (empty($this->input->get('view'))) {
            $this->load->view('search/list', $data);
        } else if (!empty($this->input->get('view')) && $this->input->get('view') == 'grid') {
            $this->load->view('search/list_grid', $data);
        } else if (!empty($this->input->get('view')) && $this->input->get('view') == 'map') {
            $this->load->view('search/list_map', $data);
        }

        $this->load->view('template/footer');
    }
}
