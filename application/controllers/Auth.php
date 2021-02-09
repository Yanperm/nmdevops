<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('MembersModel');
    }

    private function logged_in()
    {
        if( ! $this->session->userdata('authenticated')){
            redirect('login');
        }
    }

    public function register()
    {
        $this->load->view('template/header');
        $this->load->view('auth/register');
        $this->load->view('template/footer');
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'required');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run() == false){
            $this->load->view('template/header');
            $this->load->view('auth/login');
            $this->load->view('template/footer');
        }
        else {
            $email = $this->security->xss_clean($this->input->post('email'));
            $password = $this->security->xss_clean($this->input->post('password'));

            $user = $this->MembersModel->login($email, $password);

            if($user){
                $userdata = array(
                    'id' => $user->MEMBERIDCARD,
                    'name' => $user->CUSTOMERNAME,
                    'authenticated' => TRUE
                );

                $this->session->set_userdata($userdata);

                redirect(base_url(''));
            }
            else {
                $this->session->set_flashdata('message', 'Invalid email or password');
                redirect('login');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

//    public function login()
//    {
//        $this->load->view('template/header');
//        $this->load->view('auth/login');
//        $this->load->view('template/footer');
//    }

    public function loginMember()
    {

//        $this->load->view('template/header');
//        $this->load->view('auth/login');
//        $this->load->view('template/footer');
    }

    public function addMember()
    {
        $firstName = $this->input->post('first_name');
        $lastName = $this->input->post('last_name');
        $email = $this->input->post('email');
        $telephone = $this->input->post('phone');
        $lineId = $this->input->post('line_id');
        $password = $this->input->post('password');

        $dateNow = new DateTime();
        $currentTime = $dateNow->getTimestamp();
        $userId = $currentTime;

        $data = [
            'MEMBERIDCARD' => $userId,
            'CUSTOMERNAME' => $firstName . " " . $lastName,
            'LINEID' => $lineId,
            'EMAIL' => $email,
            'PASSWORD' => md5($password),
            'PHONE' => $telephone,
        ];

        $this->MembersModel->insert($data);
        $subject = "ยืนยันการสมัครสมาชิก เว็บไซต์ Nutmor";
        $message = "ยืนยันการสมัครสมาชิก เว็บไซต์ Nutmor\r\nขอบคุณ คุณ " . $firstName . " " . $lastName . " ที่ให้ความไว้วางใจสมัครสมาชิกเพื่อใช้บริการกับเรา\r\n
            ข้อมูลการเช้าระบบ\n
            username : " . $email . "\r\n
            password : " . $password . "\r\n
            \r\n\r\nขอขอบคุณที่ให้ความไว้วางใจเลือกใช้บริการ Nutmor \r\nทีมงาน Nutmor";
        sendMail($email, $subject, $message);

        $this->load->view('template/header');
        $this->load->view('auth/confirm_register');
        $this->load->view('template/footer');
    }

    public function checkEmailAlready(){
        $email = $this->input->post('email');
        $check = $this->MembersModel->checkDuplicate($email);
        if($check == false){
            echo 'true';
        }else{
            echo 'false';
        }
    }
}
