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
        $this->load->model('BlogCommentModel');
        $this->load->model('BlogReplyModel');
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

        $category = "";
        if (!empty($this->input->get('category'))) {
            $category = $this->input->get('category');
        }

        $rowno = $this->uri->segment('2');

        $rowperpage = 5;

        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }

        $blog = $this->BlogModel->getBlog($rowperpage, $rowno, $textSearch, $category);
        $lastBlog = $this->BlogModel->getLastBlog();
        $category = $this->BlogCategoryModel->countBlog();

        $allcount = 0;
        if ($textSearch == '') {
            $allcount = $this->db->count_all_results('tbblog');
        } else {
            $allcount = count($blog);
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
        $data['category'] = $category;
        $data['textSearch'] = $textSearch;
        $data['row'] = $rowno;
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('template/header');
        $this->load->view('blog/index', $data);
        $this->load->view('template/footer');
    }

    public function single()
    {
        $id = $this->uri->segment('3');

        $blog = $this->BlogModel->single($id);

        if (empty($blog)) {
            redirect(base_url('blog/1'));
        }

        $lastBlog = $this->BlogModel->getLastBlog();
        $category = $this->BlogCategoryModel->countBlog();

        $comment = $this->BlogCommentModel->listdata($id);

        $data = [
          'blog' => $blog,
          'lastBlog' => $lastBlog,
          'category' => $category,
          'comment' => $comment
        ];

        $dataHeader = [
          'title' => $blog->title,
          'meta' => $blog->title
        ];

        $this->load->view('template/header', $dataHeader);
        $this->load->view('blog/single', $data);
        $this->load->view('template/footer');
    }

    public function comment()
    {
        if ($this->input->post('comments') != '') {
            $data = [
          'blog_id' => $this->input->post('blog_id'),
          'name' => $this->input->post('name'),
          'description' => $this->input->post('comments'),
          'created_at' => date('Y-m-d')
        ];

            $this->BlogCommentModel->insert($data);
        }
        redirect(base_url('blog/single/'.$this->input->post('blog_id')));
    }

    public function reply()
    {
        $blogId = $this->input->post('blog_id');
        $commentId = $this->input->post('comment_id');
        if ($this->input->post('comment_'.$commentId) != '') {
            $data = [
            'comment_id' => $this->input->post('comment_id'),
            'name' => $this->input->post('name_'.$commentId),
            'description' => $this->input->post('comment_'.$commentId),
            'created_at' => date('Y-m-d')
          ];

            $this->BlogReplyModel->insert($data);
        }

        redirect(base_url('blog/single/'.$this->input->post('blog_id')));
    }

    public function deleteComment()
    {
        $commentId = $this->input->post('id');
        $this->BlogCommentModel->delete($commentId);
    }

    public function deleteReply()
    {
        $replyId = $this->input->post('id');
        $this->BlogReplyModel->delete($replyId);
    }
}
