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

    public function insert($data)
    {
        $this->db->insert('tbmembers', $data);
        return $this->db->insert_id();
    }

}