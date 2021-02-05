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

    public function detail($bookingId)
    {
        $query = $this->db->query('
            SELECT * FROM tbbooking as booking 
            left join tbmembers as member on member.MEMBERIDCARD = booking.MEMBERIDCARD
            left join tbclinic as clinic on clinic.CLINICID = booking.CLINICID
            where booking.BOOKINGID like "'.$bookingId.'" ');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getCheckin($clicnicId, $email)
    {
        $query = $this->db->query('
            SELECT * FROM tbbooking as booking 
            left join tbmembers as member on member.MEMBERIDCARD = booking.MEMBERIDCARD
            left join tbclinic as clinic on clinic.CLINICID = booking.CLINICID
            where member.EMAIL like "'.$email.'" AND booking.CLINICID = "' . $clicnicId.'"');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function checkin($bookingId)
    {
        $this->db->set('CHECKIN', '1', FALSE);
        $this->db->where('BOOKINGID', $bookingId);
        $this->db->update('tbbooking');

        return true;
    }
}