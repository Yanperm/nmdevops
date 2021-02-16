<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClinicModel extends CI_Model
{
    public function search($textSearch, $typeSearch)
    {
        $query = '';
        if ($typeSearch == 'all') {
            $query = $this->db->query('SELECT * FROM tbclinic where  MOBILE = 1  AND (CLINICNAME LIKE "%' . $typeSearch . '%" OR DOCTORNAME LIKE "%' . $textSearch . '%")');
        } else if ($typeSearch == 'doctor') {
            $query = $this->db->query('SELECT * FROM tbclinic where MOBILE = 1  AND DOCTORNAME LIKE "%' . $textSearch . '%"');
        } else if ($typeSearch == 'clinic') {
            $query = $this->db->query('SELECT * FROM tbclinic where MOBILE = 1  AND CLINICNAME LIKE "%' . $textSearch . '%"');
        }

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getData()
    {
        $query = $this->db->query('SELECT * FROM tbclinic where MOBILE = 1 ');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function detailById($clinicId)
    {
        $query = $this->db->query('SELECT * FROM tbclinic where CLINICID = "' . $clinicId . '"');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }

    public function detailByEmail($email)
    {
        $query = $this->db->query('SELECT * FROM tbclinic where USERNAME = "' . $email . '"');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }

    public function detail($clinicName)
    {
        $query = $this->db->query('SELECT * FROM tbclinic where CLINICNAME LIKE "' . $clinicName . '"');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }

    public function ques($clinicId)
    {

        $query = $this->db->query('SELECT * FROM tbclinic where CLINICID = "' . $clinicId . '"');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }

    public function checkDuplicate($email)
    {
        $query = $this->db->query('SELECT IDCLINIC FROM tbclinic where USERNAME = "' . $email . '"');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $item) {
                return $item->IDCLINIC;
            }
        } else {
            return false;
        }
    }

    public function checkVerify($email, $code)
    {
        $query = $this->db->query('SELECT IDCLINIC FROM tbclinic where USERNAME = "' . $email . '" AND email_verification_code = "' . $code . '"');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $item) {
                $this->db->set('ACTIVATE', '1');
                $this->db->where('IDCLINIC', $item->IDCLINIC);
                $this->db->update('tbclinic');
            }
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password)
    {
        $this->db->where('USERNAME', $email);
        $this->db->where('PASSWORD', md5($password));
        $query = $this->db->get('tbclinic');

        if ($query->num_rows() == 1) {
            return $query->row();
        }

        return false;
    }

    public function insertClinic($data)
    {
        $this->db->insert('tbclinic', $data);
        return $this->db->insert_id();
    }

    public function insert($data)
    {
        $this->db->insert('tbbooking', $data);
        return $this->db->insert_id();
    }
}