<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

    public function find_with_page($param)
    {
        $keyword = $param['keyword'];
        $this->db->select('*');

        $condition = "1=1";
        if (!empty($keyword)) {
            $condition .= " and (CUSTOMERNAME like '%{$keyword}%' or PHONE like '%{$keyword}%')";
        }

        $this->db->where($condition);
        $this->db->limit($param['page_size'], $param['start']);
        $this->db->order_by($param['column'], $param['dir']);

        $query = $this->db->get('tbmembers');
        $data = [];
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
        }

        $count_condition = $this->db->from('tbmembers')->where($condition)->count_all_results();
        $count = $this->db->from('tbmembers')->count_all_results();
        $result = array('count'=>$count,'count_condition'=>$count_condition,'data'=>$data,'error_message'=>'');
        return $result;
    }

    public function detailByEmail($mail)
    {
        $query = $this->db->query('SELECT * FROM tbmembers where EMAIL = "' . $mail . '"');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }

    public function detailByEmailActive($mail)
    {
        $query = $this->db->query('SELECT * FROM tbmembers where EMAIL = "' . $mail . '" AND ACTIVATE_STATUS = 1 ');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }

    public function checkDuplicate($email)
    {
        $query = $this->db->query('SELECT MEMBERIDCARD FROM tbmembers where EMAIL = "' . $email . '"');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $item) {
                return $item->MEMBERIDCARD;
            }
        } else {
            return false;
        }
    }

    public function checkDuplicateProfile($email, $userId)
    {
        $query = $this->db->query('SELECT MEMBERIDCARD FROM tbmembers where MEMBERIDCARD != "' . $userId . '" AND EMAIL = "' . $email . '"');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $item) {
                return $item->MEMBERIDCARD;
            }
        } else {
            return false;
        }
    }

    public function checkOldPassword($password, $userId)
    {
        $query = $this->db->query('SELECT MEMBERIDCARD FROM tbmembers where MEMBERIDCARD = "' . $userId . '" AND PASSWORD = "' . $password . '"');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $item) {
                return $item->MEMBERIDCARD;
            }
        } else {
            return false;
        }
    }

    public function login($email, $password)
    {
        $this->db->where('EMAIL', $email);
        $this->db->where('PASSWORD', md5($password));
        $query = $this->db->get('tbmembers');

        if ($query->num_rows() > 0) {
            return $query->row();
        }

        return false;
    }

    public function checkVerify($email, $code)
    {
        $query = $this->db->query('SELECT MEMBERIDCARD FROM tbmembers where EMAIL = "' . $email . '" AND email_verification_code = "' . $code . '"');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $item) {
                $this->db->set('ACTIVATE_STATUS', '1');
                $this->db->where('MEMBERIDCARD', $item->MEMBERIDCARD);
                $this->db->update('tbmembers');
            }
            return true;
        } else {
            return false;
        }
    }

    public function insert($data)
    {
        $this->db->insert('tbmembers', $data);
        return $this->db->insert_id();
    }

    public function update($data, $userId)
    {
        $this->db->where('MEMBERIDCARD', $userId);
        $this->db->update('tbmembers', $data);
        return true;
    }
}
