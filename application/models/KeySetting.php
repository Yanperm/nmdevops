<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KeySetting extends CI_Model
{
    public function getData($name)
    {
        $query = $this->db->query('SELECT * FROM key_setting where name="'.$name.'"');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
}
