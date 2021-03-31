<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InfoModel extends CI_Model
{
    public function listData()
    {
        $query = $this->db->query('SELECT * FROM tbinfo');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function update($data, $key)
    {
        $this->db->where('info_name', $key);
        $this->db->update('tbinfo', $data);
    }
}
