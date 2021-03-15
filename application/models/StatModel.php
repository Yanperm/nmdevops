<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StatModel extends CI_Model
{


    public function insert($data)
    {
        $this->db->insert('tbstat', $data);
        return $this->db->insert_id();
    }
}
