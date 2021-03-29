<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

    public function detail($id)
    {
        $query = $this->db->query('SELECT * FROM advertise  where ADVERTISEID = '.$id);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }

    public function insert($data)
    {
        $this->db->insert('advertise', $data);
        return $this->db->insert_id();
    }

    public function find_with_page($param)
    {
        $keyword = $param['keyword'];
        $this->db->select('*');

        $condition = "1=1";
        if (!empty($keyword)) {
            $condition .= " and (ADVERTISESUBJECT like '%{$keyword}%' or ADVERTISEDETAIL like '%{$keyword}%')";
        }

        $this->db->where($condition);
        $this->db->limit($param['page_size'], $param['start']);
        $this->db->order_by($param['column'], $param['dir']);

        $query = $this->db->get('advertise');
        $data = [];
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
        }

        $count_condition = $this->db->from('advertise')->where($condition)->count_all_results();
        $count = $this->db->from('advertise')->count_all_results();
        $result = array('count'=>$count,'count_condition'=>$count_condition,'data'=>$data,'error_message'=>'');
        return $result;
    }

    public function updateById($data, $id)
    {
        $this->db->where('ADVERTISEID', $id);
        $this->db->update('advertise', $data);
    }

    public function delete($id)
    {
        $this->db->where('ADVERTISEID', $id);
        $this->db->delete('advertise');
    }
}
