<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MembersModel');
        $this->load->model('BlogModel');
        $this->load->model('BlogCategoryModel');
        $this->load->library('pagination');
        $this->load->library('S3_upload');
        $this->load->library('S3');
    }


    public function index()
    {
        $category = $this->BlogCategoryModel->listData();

        $data = [
          'category' => $category
        ];

        $this->load->view('template/header');
        $this->load->view('blog/index', $data);
        $this->load->view('template/footer');
    }

    public function listBlog()
    {
        $textSearch = $this->input->get('textSearch');
        $rowno = $this->uri->segment('2');

        $rowperpage = 5;

        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }

        $blog = $this->BlogModel->getBlog($rowperpage, $rowno, $textSearch);
        $lastBlog = $this->BlogModel->getLastBlog();

        // echo '<pre>';
        // print_r($lastBlog);
        // echo '</pre>';
        // exit();

        $allcount = 0;
        if ($textSearch == '') {
            $allcount = $this->db->count_all_results('tbblog');
        } else {
            $allcount = count($booking);
        }

        $config['base_url'] = base_url() . 'blog';
        $config['use_page_numbers'] = true;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;

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

        $data['blog'] = $blog;
        $data['lastBlog'] = $lastBlog;
        $data['row'] = $rowno;
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('template/header');
        $this->load->view('blog/index', $data);
        $this->load->view('template/footer');
    }

    public function single()
    {
        $this->load->view('template/header');
        $this->load->view('blog/single');
        $this->load->view('template/footer');
    }
}
