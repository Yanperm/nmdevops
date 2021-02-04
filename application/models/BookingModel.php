<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookingModel extends CI_Model
{

    public function getData($clicnicId, $date)
    {
        $query = $this->db->query('SELECT * FROM tbbooking where CLINICID = "' . $clicnicId . '" AND BOOKDATE = "' . $date . '" ORDER BY QBER ASC');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
}