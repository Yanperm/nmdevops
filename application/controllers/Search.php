<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ClinicModel');
        $this->load->model('LikeModel');
        $this->load->library('pagination');

    }

    public function listData()
    {
        $rowno = intval($this->uri->segment('2'));

        $rowperpage = 4;

        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }
        // $rowno = 4;
//echo $rowno;
//exit();
        $textSearch = $this->input->get('text_search');
        $typeSearch = $this->input->get('type_search');
        $sort = $this->input->get('sort');
        if ($sort == '') {
            $sort = 'view';
        }

        $lat = 0;
        $long = 0;

        if ($typeSearch == 'nearby') {
            $lat = $this->input->get('lat');
            $long = $this->input->get('long');
        }

        $clinic = $this->ClinicModel->search($textSearch, $typeSearch, $lat, $long, $sort);

        $allcount = 0;
        if ($textSearch == '' && $typeSearch != 'nearby') {
            $allcount = $this->db->where('MOBILE', 1)->count_all_results('tbclinic');
        } else {
            $allcount = count($clinic);
        }


        $clinic = $this->ClinicModel->searchPage($textSearch, $typeSearch, $lat, $long, $sort, $rowperpage, $rowno);


        $config['base_url'] = base_url() . 'search';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
        $config['reuse_query_string'] = true;

        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '<span aria-hidden="true"></span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';

        $this->pagination->initialize($config);

        $data['listBooking'] = $clinic;
        $data['row'] = $rowno;
        $data['total_rows'] = $allcount;
        $data['pagination'] = $this->pagination->create_links();

        $mapData = [];
        foreach ($clinic as $item) {
            $img = $item->image ? $item->image : 'assets/img/doctor_listing_1.jpg';

            $map = [
                'name' => $item->CLINICNAME,
                'location_latitude' => $item->LAT,
                'location_longitude' => $item->LONG,
                'map_image_url' => $img,
                'type' => $item->PROFICIENT,
                'url_detail' => base_url('clinic/' . $item->CLINICNAME),
                'name_point' => $item->CLINICNAME,
                'description_point' => $item->PROVINCE,
                'get_directions_start_address' => '',
                'phone' => $item->PHONE
            ];

            array_push($mapData, $map);
        }

        $data["map"] = json_encode($mapData);

        $data["like"] = $this->LikeModel->getDataByMember($this->session->userdata('id'));


        $data["textSearch"] = $textSearch;
        $data["typeSearch"] = $typeSearch;
        $data["clinic"] = $clinic;


//        $data = [
//            'textSearch' => $textSearch,
//            'typeSearch' => $typeSearch,
//            'clinic' => $clinic,
//            'map' => json_encode($mapData)
//        ];

        $this->load->view('template/header');

        if (empty($this->input->get('view'))) {
            $this->load->view('search/list', $data);
        } else
            if (!empty($this->input->get('view')) && $this->input->get('view') == 'grid') {
                $this->load->view('search/list_grid', $data);
            } else if (!empty($this->input->get('view')) && $this->input->get('view') == 'map') {
                $this->load->view('search/list_map', $data);
            }

        $this->load->view('template/footer');
    }
}
