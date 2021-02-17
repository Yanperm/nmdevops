<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CloseModel extends CI_Model
{
    public function listData($clinicId)
    {
        $query = $this->db->query('SELECT * FROM tbclose where CLOSEDATE >= "'.date('Y-m-d').'" AND CLINICID = "'. $clinicId .'"  ORDER BY CLOSEDATE ASC');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function insert($data)
    {
        $this->db->insert('tbclose', $data);
        return $this->db->insert_id();
    }

    public function delete($id)
    {
        $this->db->where('closeid', $id);
        $this->db->delete('tbclose');
    }
}
