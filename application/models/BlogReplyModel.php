<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BlogReplyModel extends CI_Model
{
    public function listData($commentId)
    {
        $query = $this->db->query('SELECT * FROM tbblog_reply where blog_id = '.$commentId.' order by created_at desc');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function insert($data)
    {
        $this->db->insert('tbblog_reply', $data);
        return $this->db->insert_id();
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbblog_reply', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbblog_reply');
    }
}
