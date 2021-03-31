<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (! function_exists('sendmail')) {
    function sendmail($to, $subject, $message)
    {
        $ci =& get_instance();

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
        $ci->load->library('email', $config);
        $ci->email->set_newline("\r\n");
        $ci->email->from('no-reply@nutmor.com', "Pharmacy Nutmor.com");
        $ci->email->to($to);
        $ci->email->subject($subject);
        $ci->email->message($message);
        $ci->email->send();

        return true;
    }
}


if (! function_exists('getTitle')) {
    function getTitle($id = '')
    {
        return $id;
    }
}
