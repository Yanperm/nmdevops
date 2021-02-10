<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdvertiseModel extends CI_Model
{
    public function listData()
    {
        $query = $this->db->query('SELECT * FROM advertise  ORDER BY ADVERTISEID ASC');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function insert($data)
    {
        $this->db->insert('advertise', $data);
        return $this->db->insert_id();
    }
}