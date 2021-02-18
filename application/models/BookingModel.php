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

    public function getDataAllByClinic($clicnicId)
    {
        $query = $this->db->query('SELECT count(BOOKINGID) AS ALLBOOKING FROM tbbooking where CLINICID = "' . $clicnicId.'"');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getDataTodayByClinic($clicnicId)
    {
        $query = $this->db->query('SELECT count(BOOKINGID) AS TODAYBOOKING FROM tbbooking where BOOKDATE  = "'.date('Y-m-d').'" AND CLINICID = "' . $clicnicId.'"');
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
            where booking.BOOKINGID like "' . $bookingId . '" ');

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
            where member.EMAIL like "' . $email . '" AND booking.CLINICID = "' . $clicnicId . '"');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getCheckinByVN($vnId, $email)
    {
        $query = $this->db->query('
            SELECT * FROM tbbooking as booking 
            left join tbmembers as member on member.MEMBERIDCARD = booking.MEMBERIDCARD
            left join tbclinic as clinic on clinic.CLINICID = booking.CLINICID
            where member.EMAIL like "' . $email . '" AND booking.BOOKINGID = "' . $vnId . '"');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getBookingByUserId($userId, $rowperpage, $rowno)
    {
        $query = $this->db->query('
            SELECT * FROM tbbooking as booking 
            left join tbmembers as member on member.MEMBERIDCARD = booking.MEMBERIDCARD
            left join tbclinic as clinic on clinic.CLINICID = booking.CLINICID
            where booking.MEMBERIDCARD = "' . $userId . '"
            limit ' . $rowno . ',' . $rowperpage);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getDataList($clinicId, $rowperpage, $rowno)
    {

        $query = $this->db->query('
            SELECT * FROM tbbooking as booking 
            INNER join tbmembers as member on member.MEMBERIDCARD = booking.MEMBERIDCARD OR member.IDCARD = booking.IDCARD
            where booking.CLINICID = "' . $clinicId . '" AND booking.BOOKDATE = "' . date('Y-m-d') . '"
            order by booking.BOOKTIME ASC
            limit ' . $rowno . ',' . $rowperpage
        );

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getDataListByDate($clinicId,$date, $rowperpage, $rowno)
    {

        $query = $this->db->query('
            SELECT * FROM tbbooking as booking 
            INNER join tbmembers as member on member.MEMBERIDCARD = booking.MEMBERIDCARD OR member.IDCARD = booking.IDCARD
            where booking.CLINICID = "' . $clinicId . '" AND booking.BOOKDATE = "' . $date . '"
            order by booking.BOOKTIME ASC
            limit ' . $rowno . ',' . $rowperpage
        );

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getCurrentQues($clinicId)
    {

        $query = $this->db->query('
            SELECT QUES FROM tbbooking as booking 
            where booking.CLINICID = "' . $clinicId . '" 
            AND booking.BOOKDATE = "' . date('Y-m-d') . '"
            AND booking.SHOWS = 2');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function quesReset($clinicId)
    {
        $this->db->set('SHOWS', 0);
        $this->db->set('STATUS', 0);
        $this->db->set('CALLED', 0);
        $this->db->where('CLINICID', $clinicId);
        $this->db->where('STATUS', 1);
        $this->db->where('BOOKDATE', date('Y-m-d'));
        $this->db->update('tbbooking');

        return true;
    }


    public function checkin($bookingId)
    {
        $this->db->set('CHECKIN', '1', FALSE);
        $this->db->where('BOOKINGID', $bookingId);
        $this->db->update('tbbooking');

        return true;
    }

    public function quesCall($id)
    {
        $this->db->set('STATUS', '1');
        $this->db->set('SHOWS', '2');
        $this->db->where('BOOKINGID', $id);
        $this->db->update('tbbooking');

        return true;
    }
}
