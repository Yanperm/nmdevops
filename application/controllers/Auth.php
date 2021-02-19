<?php
require_once('application/libraries/S3.php');
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('S3_upload');
        $this->load->library('S3');
        $this->load->model('MembersModel');
        $this->load->model('ClinicModel');

    }

    public function register()
    {
        $this->load->view('template/header');
        $this->load->view('auth/register');
        $this->load->view('template/footer');
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $type = $this->input->get('type');

        $data = [
            'email' => $email,
            'type' => $type
        ];

        if ($type == 'clinic') {
            $this->load->view('template/header_doctor');
        }
        if ($type == 'member') {
            $this->load->view('template/header');
        }
        $this->load->view('auth/verify', $data);
        $this->load->view('template/footer');
    }

    public function verifyCheck()
    {
        $email = $this->input->post('email');
        $code = $this->input->post('code');
        $type = $this->input->post('type');


        if ($type == 'member') {
            $result = $this->MembersModel->checkVerify($email, $code);
        }

        if ($type == 'clinic') {
            $result = $this->ClinicModel->checkVerify($email, $code);
        }

//        echo $this->session->userdata('id');
//        $clinic = $this->ClinicModel->getData($this->session->userdata('id'));
//
//        print_r($clinic);
//        exit();

        $msg = '';

        if ($result) {
            $msg = "ยืนยันบัญชีเรียบร้อยแล้ว";
            $this->session->set_userdata('activate', 1);
        } else {
            $msg = "ยืนยันบัญชีไม่สำเร็จกรุณาลองใหม่";
        }

        $data = [
            'msg' => $msg
        ];

        if ($type == 'clinic') {
            $this->load->view('template/header_doctor');
        }
        if ($type == 'member') {
            $this->load->view('template/header');
        }
        $this->load->view('auth/confirm_verify', $data);
        $this->load->view('template/footer');
    }

    public function reSendMail(){
        $email = $this->input->get('email');
        $type = $this->input->get('type');

        $newCode = random_int(111111,999999);

        if($type == 'member'){
            $member = $this->MembersModel->detailByEmail($email);

            $data = [
                'email_verification_code' => $newCode
            ];

            $this->MembersModel->update($data,$member->MEMBERIDCARD);
        }else if($type == 'clinic'){
            $clinic = $this->ClinicModel->detailByEmail($email);

            $data = [
                'email_verification_code' => $newCode
            ];

            $this->ClinicModel->updateById($data,$clinic->IDCLINIC);
        }

        $subject = "โปรดยืนยันอีเมลของคุณ";

        $dataEmail = [
            'email' => $email,
            'code' => $newCode,
            'type' => $type
        ];

        $message = $this->load->view('email_layout_template', $dataEmail,true);
        $this->sendMail($email, $subject, $message);

        $data = [
            'email' => $email,
            'type' => $type
        ];

        $this->load->view('template/header');
        $this->load->view('auth/verify', $data);
        $this->load->view('template/footer');

    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'required');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $type = $this->input->post('type');

        if ($this->form_validation->run() == false) {
            if($type == 'clinic'){
                $this->load->view('template/header_doctor');
                $this->load->view('clinic/login');
            }else{
                $this->load->view('template/header');
                $this->load->view('auth/login');
            }

            $this->load->view('template/footer');
        } else {
            $email = $this->security->xss_clean($this->input->post('email'));
            $password = $this->security->xss_clean($this->input->post('password'));

            $user = false;

            if($type == 'member'){
                $user = $this->MembersModel->login($email, $password);
            }

            if($type == 'clinic'){
                $user = $this->ClinicModel->login($email, $password);
            }

            if ($user) {
                $userdata = array();

                if($type == 'member') {
                    $userdata = array(
                        'id' => $user->MEMBERIDCARD,
                        'name' => $user->CUSTOMERNAME,
                        'authenticated' => TRUE,
                        'activate' => $user->ACTIVATE_STATUS,
                        'email' => $user->EMAIL,
                        'type' => 'member',
                        'image' => $user->IMAGE
                    );
                }else{
                    $userdata = array(
                        'id' => $user->tbclinic,
                        'name' => $user->CLINICNAME,
                        'authenticated' => TRUE,
                        'activate' => $user->ACTIVATE,
                        'email' => $user->USERNAME,
                        'type' => 'clinic'
                    );
                }
                $this->session->set_userdata($userdata);

                redirect(base_url(''));
            } else {
                $this->session->set_flashdata('message', 'อีเมลหรือรหัสผ่านไม่ถูกต้อง');
                redirect(base_url('login'));
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

    public function addMember()
    {
        $image = '';
        if (!empty($_FILES["files"])) {
            $dir = dirname($_FILES["files"]["tmp_name"]);
            $destination = $dir . DIRECTORY_SEPARATOR . $_FILES["files"]["name"];
            rename($_FILES["files"]["tmp_name"], $destination);
            $image = $this->s3_upload->upload_file($destination);
        }

        $firstName = $this->input->post('first_name');
        $lastName = $this->input->post('last_name');
        $email = $this->input->post('email');
        $telephone = $this->input->post('phone');
        $lineId = $this->input->post('line_id');
        $password = $this->input->post('password');

        $dateNow = new DateTime();
        $currentTime = $dateNow->getTimestamp();
        $userId = $currentTime;
        $code = random_int(111111, 999999);

        $data = [
            'MEMBERIDCARD' => $userId,
            'CUSTOMERNAME' => $firstName . " " . $lastName,
            'LINEID' => $lineId,
            'EMAIL' => $email,
            'PASSWORD' => md5($password),
            'PHONE' => $telephone,
            'image' => $image,
            'email_verification_code' => $code
        ];

        $this->MembersModel->insert($data);
        $subject = "ยินดีต้อนรับ! โปรดยืนยันอีเมลของคุณ";

        $dataEmail = [
            'email' => $email,
            'code' => $code,
            'type' => 'member'
        ];

        $message = $this->load->view('email_layout_template', $dataEmail, true);
        $this->sendMail($email, $subject, $message);

        $this->load->view('template/header');
        $this->load->view('auth/confirm_register');
        $this->load->view('template/footer');
    }

    public function addClinic()
    {
        $image = '';
        if (!empty($_FILES["files_clinic"])) {
            $dir = dirname($_FILES["files_clinic"]["tmp_name"]);
            $destination = $dir . DIRECTORY_SEPARATOR . $_FILES['files_clinic']["name"];
            rename($_FILES["files_clinic"]["tmp_name"], $destination);
            $image = $this->s3_upload->upload_file($destination);
        }

        $clinicName = $this->input->post('clinic_name');
        $doctorName = $this->input->post('doctor_name');
        $email = $this->input->post('email_clinic');
        $telephone = $this->input->post('phone_clinic');
        $lineId = $this->input->post('line_id_clinic');
        $password = $this->input->post('password_clinic');
        $website = $this->input->post('website');

        $dateNow = new DateTime();
        $currentTime = $dateNow->getTimestamp();
        $userId = $currentTime;
        $code = random_int(111111, 999999);

        $data = [
            'IDCLINIC' => $userId,
            'CLINICNAME' => $clinicName,
            'DOCTORNAME' => $doctorName,
            'LINE' => $lineId,
            'USERNAME' => $email,
            'PASSWORD' => md5($password),
            'PHONE' => $telephone,
            'image' => $image,
            'email_verification_code' => $code,
            'DOMAIN' => $website,
        ];

        $this->ClinicModel->insertClinic($data);
        $subject = "ยินดีต้อนรับ! โปรดยืนยันอีเมลของคุณ";

        $dataEmail = [
            'email' => $email,
            'code' => $code,
            'type' => 'clinic'
        ];

        $message = $this->load->view('email_layout_template', $dataEmail, true);
        $this->sendMail($email, $subject, $message);

        $this->load->view('template/header_doctor');
        $this->load->view('auth/confirm_register');
        $this->load->view('template/footer');
    }

    public function checkEmailAlready()
    {
        $email = $this->input->post('email');
        $check = $this->MembersModel->checkDuplicate($email);
        if ($check == false) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function checkEmailClinicAlready()
    {
        $email = $this->input->post('email_clinic');
        $check = $this->ClinicModel->checkDuplicate($email);
        if ($check == false) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function checkEmailAlreadyProfile()
    {
        $email = $this->input->post('email');
        $check = $this->MembersModel->checkDuplicateProfile($email, $this->session->userdata('id'));
        if ($check == false) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function checkOldPassword()
    {
        $password = $this->input->post('old_password');
        $check = $this->MembersModel->checkOldPassword(md5($password), $this->session->userdata('id'));
        if ($check == false) {
            echo 'false';
        } else {
            echo 'true';
        }
    }

    public function sendMail($to, $subject, $message){
        //Postmark Service Mail
        $config = array(
            'useragent' => 'nutmor.com',
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.postmarkapp.com',
            'smtp_port' => 25,
            'smtp_user' => 'e4d0462d-b4ff-433b-9f87-fdf266d57c2f',
            'smtp_pass' => 'e4d0462d-b4ff-433b-9f87-fdf266d57c2f',
            'smtp_crypto' => 'TLS',
            'mailtype' => 'html',
            'charset' => 'utf-8',
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('no-reply@nutmor.com', "Pharmacy Nutmor.com");
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();

        return true;
    }
}
