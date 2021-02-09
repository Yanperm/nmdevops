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

    public function insert($data)
    {
        $this->db->insert('tbbooking', $data);
        return $this->db->insert_id();
    }
}