<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class YoutubeModel extends CI_Model
{
    public function listData($clinicId)
    {
        $query = $this->db->query('SELECT * FROM tblyoutube where CLINICID = "'. $clinicId .'"');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getYoutube($clinicId)
    {
        $query = $this->db->query('SELECT * FROM tblyoutube where STATUS = 1 AND CLINICID = "'. $clinicId .'"');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function insert($data)
    {
        $this->db->insert('tblyoutube', $data);
        return $this->db->insert_id();
    }

    public function delete($id)
    {
        $this->db->where('ID', $id);
        $this->db->delete('tblyoutube');
    }

    public function deleteByClinicId($clinicId)
    {
        $this->db->where('CLINICID', $clinicId);
        $this->db->delete('tblyoutube');
    }
}
