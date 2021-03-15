<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LikeModel extends CI_Model
{
    public function getDataById($memberId, $clinicId)
    {
        $query = $this->db->query('SELECT * FROM tblike where MEMBERID = "' . $memberId . '" AND CLINICID = "' . $clinicId . '"');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getCount($clinicId)
    {
        $query = $this->db->query('SELECT count(*) AS NUM_OF_LIKE FROM tblike where CLINICID = "' . $clinicId . '"');
        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach ($result as $item) {
                return $item->NUM_OF_LIKE;
            }
        } else {
            return array();
        }
    }

    public function getDataByMember($memberId)
    {
        $query = $this->db->query('SELECT * FROM tblike where MEMBERID = "' . $memberId . '"');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }


    public function insert($data)
    {
        $this->db->insert('tblike', $data);
        return $this->db->insert_id();
    }

    public function delete($memberId, $clinicId)
    {
        $this->db->where('CLINICID', $clinicId);
        $this->db->where('MEMBERID', $memberId);
        $this->db->delete('tblike');
    }
}
