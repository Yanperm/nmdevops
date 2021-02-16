<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MembersModel extends CI_Model
{
    protected $primaryKey = 'MEMBERIDCARD';

    public function getData()
    {
        $query = $this->db->query('SELECT * FROM tbmembers');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function detail($memberId)
    {
        $query = $this->db->query('SELECT * FROM tbmembers where MEMBERIDCARD = "' . $memberId . '"');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }

    public function detailByEmail($mail)
    {
        $query = $this->db->query('SELECT * FROM tbmembers where EMAIL = "' . $mail . '"');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }

    public function checkDuplicate($email)
    {
        $query = $this->db->query('SELECT MEMBERIDCARD FROM tbmembers where EMAIL = "' . $email . '"');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $item) {
                return $item->MEMBERIDCARD;
            }
        } else {
            return false;
        }
    }

    public function checkDuplicateProfile($email, $userId)
    {
        $query = $this->db->query('SELECT MEMBERIDCARD FROM tbmembers where MEMBERIDCARD != "' . $userId . '" AND EMAIL = "' . $email . '"');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $item) {
                return $item->MEMBERIDCARD;
            }
        } else {
            return false;
        }
    }

    public function checkOldPassword($password, $userId)
    {
        $query = $this->db->query('SELECT MEMBERIDCARD FROM tbmembers where MEMBERIDCARD = "' . $userId . '" AND PASSWORD = "' . $password . '"');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $item) {
                return $item->MEMBERIDCARD;
            }
        } else {
            return false;
        }
    }

    public function login($email, $password)
    {
        $this->db->where('EMAIL', $email);
        $this->db->where('PASSWORD', md5($password));
        $query = $this->db->get('tbmembers');

        if ($query->num_rows() == 1) {
            return $query->row();
        }

        return false;
    }

    public function checkVerify($email, $code)
    {
        $query = $this->db->query('SELECT MEMBERIDCARD FROM tbmembers where EMAIL = "' . $email . '" AND email_verification_code = "' . $code . '"');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $item) {
                $this->db->set('ACTIVATE_STATUS', '1');
                $this->db->where('MEMBERIDCARD', $item->MEMBERIDCARD);
                $this->db->update('tbmembers');
            }
            return true;
        } else {
            return false;
        }
    }

    public function insert($data)
    {
        $this->db->insert('tbmembers', $data);
        return $this->db->insert_id();
    }

    public function update($data, $userId)
    {
        $this->db->where('MEMBERIDCARD', $userId);
        $this->db->update('tbmembers', $data);
        return true;
    }

}