<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->logged_in();
        $this->load->model('MembersModel');
        $this->load->model('BookingModel');
        $this->load->library('pagination');
        $this->load->library('S3_upload');
        $this->load->library('S3');
    }

    private function logged_in()
    {
        if (!$this->session->userdata('authenticated')) {
            redirect(base_url('login'));
        } else if($this->session->userdata('authenticated') && !$this->session->userdata('activate')){
            if (!$this->session->userdata('activate')) {
                redirect(base_url('verify') . "?email=" . $this->session->userdata('email') . "&type=member");
            }
        }
    }


    public function profile()
    {
        $member = $this->MembersModel->detail($this->session->userdata('id'));
        $allcount = $this->db->where('MEMBERIDCARD', $this->session->userdata('id'))->count_all_results('tbbooking');

        $data = [
            'member' => $member,
            'countBooking' => $allcount
        ];

        $this->load->view('template/header');
        $this->load->view('member/profile', $data);
        $this->load->view('template/footer');
    }

    public function checkin()
    {
        $this->load->view('template/header');
        $this->load->view('member/checkin');
        $this->load->view('template/footer');
    }

    public function cancelBooking()
    {
        if(!empty($this->input->get('vn'))){
            $booking = $this->BookingModel->getDataById($this->input->get('vn'));

            if($booking->TYPE == 0){
                $this->BookingModel->delete($this->input->get('vn'));
            }else{
                $this->BookingModel->cancel($this->input->get('vn'));
            }
        }

        redirect(base_url('member/profile'));
    }

    public function checkInMember()
    {
        if(!empty($this->input->get('vn'))){
           $this->BookingModel->checkin($this->input->get('vn'));
        }

        $this->session->set_flashdata('msg', 'ทำการเช็คอินเรียบร้อย');

        redirect(base_url('member/profile'));
    }

    public function history()
    {
        $this->load->view('template/header');
        $this->load->view('member/history');
        $this->load->view('template/footer');
    }

    public function profileUpdate()
    {
        $name = $this->input->post('name');
        $birthDate = $this->input->post('birth_date');
        $lineId = $this->input->post('line_id');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $image = $this->input->post('old_image');

        if (!empty($_FILES["file"])) {
            $dir = dirname($_FILES["file"]["tmp_name"]);
            $destination = $dir . DIRECTORY_SEPARATOR . $_FILES["file"]["name"];
            rename($_FILES["file"]["tmp_name"], $destination);
            $image = $this->s3_upload->upload_file($destination);
            $this->session->set_userdata('image', $image);

            //remove old image S3
            if($this->input->post('old_image') != ''){
                $this->s3_upload->deleteFile(basename($this->input->post('old_image')));
            }
        }

        $data = [
            'CUSTOMERNAME' => $name,
            'BIRTHDAY' => $birthDate,
            'LINEID' => $lineId,
            'EMAIL' => $email,
            'PHONE' => $phone,
            'IMAGE' => $image
        ];

        $this->MembersModel->update($data, $this->session->userdata('id'));

        $this->session->set_flashdata('msg', 'แก้ไขบัญชีผู้ใช้เรียบร้อย');
        $this->session->set_flashdata('tab', 'profile');

        redirect(base_url('member/profile'));
    }


    public function profileChangeImage()
    {
        $image = $this->input->post('old_image1');

        if (!empty($_FILES["file1"])) {
            $dir = dirname($_FILES["file1"]["tmp_name"]);
            $destination = $dir . DIRECTORY_SEPARATOR . $_FILES["file1"]["name"];
            rename($_FILES["file1"]["tmp_name"], $destination);
            $image = $this->s3_upload->upload_file($destination);
            $this->session->set_userdata('image', $image);

            //remove old image S3
            if($this->input->post('old_image1') != ''){
                $this->s3_upload->deleteFile(basename($this->input->post('old_image1')));
            }
        }

        $data = [
            'IMAGE' => $image
        ];

        $this->MembersModel->update($data, $this->session->userdata('id'));

        $this->session->set_flashdata('msg', 'แก้ไขรูปภาพเรียบร้อย');

        redirect(base_url('member/profile'));
    }

    public function passwordUpdate()
    {
        $password = $this->input->post('password');

        $data = [
            'PASSWORD' => md5($password),
        ];

        $this->MembersModel->update($data, $this->session->userdata('id'));

        $this->session->set_flashdata('msg', 'แก้ไขรหัสผ่านเรียบร้อย');
        $this->session->set_flashdata('tab', 'password');

        redirect(base_url('member/profile'));
    }

    public function loadBooking()
    {
        $rowno = $this->uri->segment('2');

        $rowperpage = 5;

        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }

        $booking = $this->BookingModel->getBookingByUserId($this->session->userdata('id'), $rowperpage, $rowno);

        $allcount = $this->db->where('MEMBERIDCARD', $this->session->userdata('id'))->count_all_results('tbbooking');

        $config['base_url'] = base_url() . 'loadBooking';
        $config['use_page_numbers'] = TRUE;
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

        $data['listBooking'] = $booking;
        $data['row'] = $rowno;
        $data['pagination'] = $this->pagination->create_links();

        return $this->load->view('member/listBooking', $data);
    }

    public function loadCheckin()
    {
        $rowno = $this->uri->segment('2');

        $rowperpage = 5;

        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }

        $booking = $this->BookingModel->getBookingByUserIdCheckin($this->session->userdata('id'), $rowperpage, $rowno);

        $allcount = $this->db->where('MEMBERIDCARD', $this->session->userdata('id'))
            ->where('CHECKIN != 1')
            ->where('STATUS != 2')
            ->count_all_results('tbbooking');

        $config['base_url'] = base_url() . 'loadBooking';
        $config['use_page_numbers'] = TRUE;
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

        $data['listCheckin'] = $booking;
        $data['row'] = $rowno;
        $data['pagination'] = $this->pagination->create_links();

        return $this->load->view('member/listCheckin', $data);
    }
}
