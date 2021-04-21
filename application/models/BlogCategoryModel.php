<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BlogCategoryModel extends CI_Model
{
    public function listData()
    {
        $query = $this->db->query('SELECT * FROM tbblog_category');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function countBlog()
    {
        $query = $this->db->query('SELECT category.*,count(blog.id) as numBlog FROM tbblog_category as category
          left join tbblog as blog on blog.category_id = category.id
          GROUP BY category.id
          ORDER BY category.name asc
        ');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function insert($data)
    {
        $this->db->insert('tbblog_category', $data);
        return $this->db->insert_id();
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbblog_category', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbblog_category');
    }
}
