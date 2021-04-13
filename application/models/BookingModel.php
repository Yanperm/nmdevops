<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BookingModel extends CI_Model
{
    public function getData($clicnicId, $date)
    {
        $query = $this->db->query('SELECT * FROM tbbooking where TYPE = 0 AND CLINICID = "' . $clicnicId . '" AND BOOKDATE = "' . $date . '" ORDER BY QBER ASC');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getAll()
    {
        $query = $this->db->query('SELECT * FROM tbbooking');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getAllChecked()
    {
        $query = $this->db->query('SELECT * FROM tbbooking where CHECKIN = 1');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getAllQueueToday()
    {
        $query = $this->db->query("SELECT * FROM tbbooking where BOOKDATE = '".date('Y-m-d')."'");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getAllQueueTomorrow()
    {
        $tomorrow = date('Y-m-d', strtotime(date('Y-m-d') . "+1 days"));
        $query = $this->db->query("SELECT * FROM tbbooking where BOOKDATE = '".$tomorrow."'");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getDataExtra($clicnicId, $date)
    {
        $query = $this->db->query('SELECT * FROM tbbooking where TYPE = 1 AND CLINICID = "' . $clicnicId . '" AND BOOKDATE = "' . $date . '" ORDER BY QBER ASC');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getDataExtraC($clicnicId, $date)
    {
        $query = $this->db->query('SELECT * FROM tbbooking where TYPE = 2  AND CLINICID = "' . $clicnicId . '" AND BOOKDATE = "' . $date . '" ORDER BY QBER ASC');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getMaxQueue($clicnicId, $date)
    {
        $query = $this->db->query('SELECT max(QBER) as max_id FROM tbbooking where  CLINICID = "' . $clicnicId . '" AND BOOKDATE = "' . $date . '" ORDER BY QBER ASC');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }


    public function getDataById($id)
    {
        $query = $this->db->query('SELECT * FROM tbbooking where BOOKINGID = "' . $id . '"');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }


    public function alert($date)
    {
        $query = $this->db->query('SELECT * FROM tbbooking where CHECKIN = 0 AND BOOKDATE = "'.$date.'"');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function alertBooking($date)
    {
        $query = $this->db->query('SELECT * FROM tbbooking where BOOKDATE = "'.$date.'"');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getDataAllByClinic($clicnicId)
    {
        $query = $this->db->query('SELECT count(BOOKINGID) AS ALLBOOKING FROM tbbooking where CLINICID = "' . $clicnicId . '"');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getDataTodayByClinic($clicnicId)
    {
        $query = $this->db->query('SELECT count(BOOKINGID) AS TODAYBOOKING FROM tbbooking where BOOKDATE  = "' . date('Y-m-d') . '" AND CLINICID = "' . $clicnicId . '"');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function detail($bookingId)
    {
        $query = $this->db->query('
            SELECT *,booking.DETAIL as cause FROM tbbooking as booking
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
            return $query->row();
        } else {
            return array();
        }
    }

    public function getCheckinLast($clicnicId, $email)
    {
        $query = $this->db->query('
            SELECT * FROM tbbooking as booking
            left join tbmembers as member on member.MEMBERIDCARD = booking.MEMBERIDCARD
            left join tbclinic as clinic on clinic.CLINICID = booking.CLINICID
            where  booking.BOOKDATE >  "'.date("Y-m-d").'" AND member.EMAIL like "' . $email . '" AND booking.CLINICID = "' . $clicnicId . '"');

        if ($query->num_rows() > 0) {
            return $query->row();
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

    public function getBookingByUserId($userId, $rowperpage, $rowno, $textSearch)
    {
        if ($textSearch != '') {
            $query = $this->db->query('
            SELECT * FROM tbbooking as booking
            left join tbmembers as member on member.MEMBERIDCARD = booking.MEMBERIDCARD
            left join tbclinic as clinic on clinic.CLINICID = booking.CLINICID
            where booking.MEMBERIDCARD = "' . $userId . '"
            AND (clinic.CLINICNAME like "%' . $textSearch . '%"
            OR clinic.DOCTORNAME like "%' . $textSearch . '%"
            OR booking.BOOKINGID like "%' . $textSearch . '%"
            )
            order by booking.BOOKDATE DESC
            limit ' . $rowno . ',' . $rowperpage);

            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return array();
            }
        } else {
            $query = $this->db->query('
            SELECT * FROM tbbooking as booking
            left join tbmembers as member on member.MEMBERIDCARD = booking.MEMBERIDCARD
            left join tbclinic as clinic on clinic.CLINICID = booking.CLINICID
            where booking.MEMBERIDCARD = "' . $userId . '"
            order by booking.BOOKDATE DESC
            limit ' . $rowno . ',' . $rowperpage);

            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return array();
            }
        }
    }

    public function getBookingByUserIdSearch($userId, $textSearch)
    {
        $query = $this->db->query(
            '
            SELECT * FROM tbbooking as booking
            left join tbmembers as member on member.MEMBERIDCARD = booking.MEMBERIDCARD
            left join tbclinic as clinic on clinic.CLINICID = booking.CLINICID
            where booking.MEMBERIDCARD = "' . $userId . '"
            AND (clinic.CLINICNAME like "%' . $textSearch . '%"
            OR clinic.DOCTORNAME like "%' . $textSearch . '%"
            OR booking.BOOKINGID like "%' . $textSearch . '%"
            )
            order by booking.BOOKDATE DESC'
        );
        return $query->num_rows();
    }


    public function getBookingByUserIdCheckin($userId, $rowperpage, $rowno)
    {
        $query = $this->db->query('
            SELECT * FROM tbbooking as booking
            left join tbmembers as member on member.MEMBERIDCARD = booking.MEMBERIDCARD
            left join tbclinic as clinic on clinic.CLINICID = booking.CLINICID
            where booking.MEMBERIDCARD = "' . $userId . '" AND booking.CHECKIN != 1 AND booking.STATUS != 2
            limit ' . $rowno . ',' . $rowperpage);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getDataList($clinicId, $rowperpage, $rowno)
    {
        $query = $this->db->query(
            '
            SELECT * FROM tbbooking as booking
            INNER join tbmembers as member on member.MEMBERIDCARD = booking.MEMBERIDCARD OR member.IDCARD = booking.IDCARD
            where (booking.CLINICID = "' . $clinicId . '" AND booking.BOOKDATE = "' . date('Y-m-d') . '" AND BOOKTIME != "")
            OR (STATUS !=2 AND BOOKTIME = "" AND booking.CLINICID = "' . $clinicId . '" AND booking.BOOKDATE = "' . date('Y-m-d') . '" )
            order by booking.QBER ASC
            limit ' . $rowno . ',' . $rowperpage
        );

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getDataListByDate($clinicId, $date, $rowperpage, $rowno)
    {
        $query = $this->db->query(
            '
            SELECT * FROM tbbooking as booking
            INNER join tbmembers as member on member.MEMBERIDCARD = booking.MEMBERIDCARD OR member.IDCARD = booking.IDCARD
            where booking.CLINICID = "' . $clinicId . '" AND booking.BOOKDATE = "' . $date . '"
            order by booking.QBER ASC
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
        $query = $this->db->query(
            '
            SELECT QUES FROM tbbooking as booking
            where booking.CLINICID = "' . $clinicId . '"
            AND booking.BOOKDATE = "' . date('Y-m-d') . '"
            AND booking.SHOWS = 2
            AND booking.CALLED = 1
            ORDER BY QUES ASC'
        );

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
        //$this->db->where('STATUS', 1);
        $this->db->where('BOOKDATE', date('Y-m-d'));
        $this->db->update('tbbooking');

        return true;
    }


    public function checkin($bookingId)
    {
        $this->db->set('CHECKIN', '1', false);
        $this->db->where('BOOKINGID', $bookingId);
        $this->db->update('tbbooking');

        return true;
    }

    public function quesCall($id, $clinicId)
    {
        $query = $this->db->query(
            '
            SELECT * FROM tbbooking as booking
            where booking.CLINICID = "' . $clinicId . '"
            AND booking.BOOKDATE = "' . date('Y-m-d') . '"
            AND booking.SHOWS = 2
            AND booking.STATUS = 1'
        );
        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach ($result as $item) {
                $this->db->set('SHOWS', 3);
                $this->db->where('BOOKINGID', $item->BOOKINGID);
                $this->db->update('tbbooking');
            }
        }

        $this->db->set('STATUS', 1);
        $this->db->set('SHOWS', 2);
        $this->db->set('CALLED', 1);
        $this->db->where('BOOKINGID', $id);
        $this->db->update('tbbooking');

        return true;
    }

    public function delete($id)
    {
        $this->db->where('BOOKINGID', $id);
        $this->db->delete('tbbooking');
    }


    public function cancel($id)
    {
        $this->db->set('STATUS', 2);
        $this->db->where('BOOKINGID', $id);
        $this->db->update('tbbooking');
    }
}
