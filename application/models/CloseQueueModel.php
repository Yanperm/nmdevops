<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CloseQueueModel extends CI_Model
{
    public function listData($clinicId)
    {
        $query = $this->db->query('SELECT * FROM tbqueueclode where CLOSEDATE >= "'.date('Y-m-d').'" AND CLINICID = "'. $clinicId .'"  ORDER BY CLOSEDATE ASC');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function listDataByDate($clinicId, $date)
    {
        $query = $this->db->query('SELECT * FROM tbqueueclode where CLOSEDATE = "'.$date.'" AND CLINICID = "'. $clinicId .'"  ORDER BY CLOSEDATE ASC');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function insert($data)
    {
        $this->db->insert('tbqueueclode', $data);
        return $this->db->insert_id();
    }

    public function delete($id)
    {
        $this->db->where('closeid', $id);
        $this->db->delete('tbqueueclode');
    }
}
