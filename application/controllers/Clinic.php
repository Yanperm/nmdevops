<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clinic extends CI_Controller
{

    public function detail()
    {
        $clinicId = $this->uri->segment('2');

        $this->load->view('template/header');
        $this->load->view('clinic/detail');
        $this->load->view('template/footer');
    }

    public function booking()
    {
        $clinicId = $this->uri->segment('2');

        $date = $this->input->post('booking_date');
        $time = $this->input->post('booking_time');

        $data = [
            'date' => $date,
            'time' => $time
        ];

        $this->load->view('template/header');
        $this->load->view('clinic/booking', $data);
        $this->load->view('template/footer');
    }

    public function confirm()
    {
        $firstName = $this->input->post('firstname_booking');
        $lastName = $this->input->post('lastname_booking');
        $email = $this->input->post('email');
        $idCard = $this->input->post('id_card');
        $telephone = $this->input->post('telephone');
        $lineId = $this->input->post('line_id');
        $cause = $this->input->post('cause');
        $date = $this->input->post('date');
        $time = $this->input->post('time');

        $data = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'idCard' => $idCard,
            'telephone' => $telephone,
            'lineId' => $lineId,
            'cause' => $cause,
            'date' => $date,
            'time' => $time
        ];
        $subject = "ยืนยันการนัดหมอ";
        $message = $this->load->view('email_template', $data, true);

        //sendmail
        if ($email != '') {
            $this->sendMail($email, $subject, $message);
        }

        $this->load->view('template/header');
        $this->load->view('clinic/confirm');
        $this->load->view('template/footer');
    }

    public function sendMail($to, $subject, $message)
    {
        $config = array(
            'useragent' => 'nutmor.com',
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.postmarkapp.com',
            'smtp_port' => 587,
            'smtp_user' => 'ef9badbf-896b-4e89-9c1a-f1fcf540e9f5',
            'smtp_pass' => 'ef9badbf-896b-4e89-9c1a-f1fcf540e9f5',
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
    }
}
