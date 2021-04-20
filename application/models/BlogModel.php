<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BlogModel extends CI_Model
{
    public function listData()
    {
        $query = $this->db->query('SELECT * FROM tbblog');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function insert($data)
    {
        $this->db->insert('tbblog', $data);
        return $this->db->insert_id();
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbblog', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbblog');
    }

    public function find_with_page($param)
    {
        $keyword = $param['keyword'];
        $this->db->select('*');

        $condition = "1=1";
        if (!empty($keyword)) {
            $condition .= " and (title like '%{$keyword}%' or description like '%{$keyword}%')";
        }

        $this->db->where($condition);
        $this->db->limit($param['page_size'], $param['start']);
        $this->db->order_by($param['column'], $param['dir']);

        $query = $this->db->get('tbblog');
        $data = [];
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
        }

        $count_condition = $this->db->from('tbblog')->where($condition)->count_all_results();
        $count = $this->db->from('tbblog')->count_all_results();
        $result = array('count'=>$count,'count_condition'=>$count_condition,'data'=>$data,'error_message'=>'');
        return $result;
    }

    public function detail($id)
    {
        $query = $this->db->query('SELECT * FROM tbblog  where id = '.$id);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
    public function getLastBlog()
    {
        $query = $this->db->query('
      SELECT * FROM tbblog as blog
      order by created_at DESC
      limit 3');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getBlog($rowperpage, $rowno, $textSearch)
    {
        if ($textSearch != '') {
            $query = $this->db->query('
            SELECT * FROM tbblog as blog
            left join tbadmin as admin on admin.ID = blog.created_by
            where title like "'.$textSearch.'" or description like "'.$textSearch.'"
            order by created_at DESC
            limit ' . $rowno . ',' . $rowperpage);

            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return array();
            }
        } else {
            $query = $this->db->query('
            SELECT * FROM tbblog as blog
            left join tbadmin as admin on admin.ID = blog.created_by
            order by created_at DESC
            limit ' . $rowno . ',' . $rowperpage);

            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return array();
            }
        }
    }
}
