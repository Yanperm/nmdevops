<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClinicModel extends CI_Model
{

    public function getData()
    {
        $query = $this->db->query('SELECT * FROM tbclinic where MOBILE = 1 ');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function detail($clinicId)
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