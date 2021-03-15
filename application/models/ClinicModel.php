<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClinicModel extends CI_Model
{
    public function search($textSearch, $typeSearch, $lat, $long, $sort)
    {
        $query = '';
        if ($typeSearch == 'all') {
            $query = 'SELECT * FROM tbclinic where  MOBILE = 1  AND (CLINICNAME LIKE "%' . $typeSearch . '%" OR DOCTORNAME LIKE "%' . $textSearch . '%")';
        } else if ($typeSearch == 'doctor') {
            $query = 'SELECT * FROM tbclinic where MOBILE = 1  AND DOCTORNAME LIKE "%' . $textSearch . '%"';
        } else if ($typeSearch == 'clinic') {
            $query = 'SELECT * FROM tbclinic where MOBILE = 1  AND CLINICNAME LIKE "%' . $textSearch . '%"';
        } else if ($typeSearch == 'nearby') {
            $query = 'SELECT * FROM (
    SELECT *, 
        (
            (
                (
                    acos(
                        sin(( '.$lat.' * pi() / 180))
                        *
                        sin(( `LAT` * pi() / 180)) + cos(( '.$lat.' * pi() /180 ))
                        *
                        cos(( `LAT` * pi() / 180)) * cos((( '.$long.' - `LONG`) * pi()/180)))
                ) * 180/pi()
            ) * 60 * 1.1515 * 1.609344
        )
    as distance FROM `tbclinic`
) tbclinic
WHERE distance <= 100
AND (CLINICNAME LIKE "%'.$textSearch.'%" OR PROFICIENT LIKE "%'.$textSearch.'%") 
';
        }

        if($sort == 'view'){

            $query .= 'order by view_count desc';
        }
       // $query .= ' limit 1,2';

        $query = $this->db->query($query);
//echo $query;
//exit();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function searchPage($textSearch, $typeSearch, $lat, $long, $sort, $rowperpage, $rowno)
    {
        $query = '';
        if ($typeSearch == 'all') {
            $query = 'SELECT * FROM tbclinic where  MOBILE = 1  AND (CLINICNAME LIKE "%' . $typeSearch . '%" OR DOCTORNAME LIKE "%' . $textSearch . '%")';
        } else if ($typeSearch == 'doctor') {
            $query = 'SELECT * FROM tbclinic where MOBILE = 1  AND DOCTORNAME LIKE "%' . $textSearch . '%"';
        } else if ($typeSearch == 'clinic') {
            $query = 'SELECT * FROM tbclinic where MOBILE = 1  AND CLINICNAME LIKE "%' . $textSearch . '%"';
        } else if ($typeSearch == 'nearby') {
            $query = 'SELECT * FROM (
    SELECT *, 
        (
            (
                (
                    acos(
                        sin(( '.$lat.' * pi() / 180))
                        *
                        sin(( `LAT` * pi() / 180)) + cos(( '.$lat.' * pi() /180 ))
                        *
                        cos(( `LAT` * pi() / 180)) * cos((( '.$long.' - `LONG`) * pi()/180)))
                ) * 180/pi()
            ) * 60 * 1.1515 * 1.609344
        )
    as distance FROM `tbclinic`
) tbclinic

WHERE distance <= 100
AND (CLINICNAME LIKE "%'.$textSearch.'%" OR PROFICIENT LIKE "%'.$textSearch.'%") 
';
        }

        if($sort == 'view'){

            $query .= 'order by view_count desc';
        }
        $query .= ' limit ' . $rowno . ',' . $rowperpage;

       // echo $query;
        $query = $this->db->query($query);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function  getSort(){
        $query = $this->db->query('SELECT distinct(PROFICIENT) FROM tbclinic WHERE MOBILE = 1');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getData()
    {
        $query = $this->db->query('SELECT * FROM tbclinic WHERE MOBILE = 1');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getAll()
    {
        $query = $this->db->query('SELECT * FROM tbclinic');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function detailById($clinicId)
    {
        $query = $this->db->query('SELECT * FROM tbclinic where IDCLINIC = "' . $clinicId . '"');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }

    public function detailByEmail($email)
    {
        $query = $this->db->query('SELECT * FROM tbclinic where USERNAME = "' . $email . '"');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }

    public function detail($clinicName)
    {
        $query = $this->db->query('SELECT * FROM tbclinic where CLINICNAME LIKE "' . $clinicName . '"');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }

    public function ques($clinicId)
    {

        $query = $this->db->query('SELECT * FROM tbclinic where CLINICID = "' . $clinicId . '"');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }

    public function checkDuplicate($email)
    {
        $query = $this->db->query('SELECT IDCLINIC FROM tbclinic where USERNAME = "' . $email . '"');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $item) {
                return $item->IDCLINIC;
            }
        } else {
            return false;
        }
    }

    public function checkVerify($email, $code)
    {
        $query = $this->db->query('SELECT IDCLINIC FROM tbclinic where USERNAME = "' . $email . '" AND email_verification_code = "' . $code . '"');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $item) {
                $this->db->set('ACTIVATE', '1');
                $this->db->where('IDCLINIC', $item->IDCLINIC);
                $this->db->update('tbclinic');
            }
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password)
    {
        $this->db->where('USERNAME', $email);
        $this->db->where('PASSWORD', md5($password));
        $this->db->where('ACTIVATE', 1);
        $query = $this->db->get('tbclinic');

        if ($query->num_rows() == 1) {
            return $query->row();
        }

        return false;
    }

    public function checkOldPassword($password, $clinicId)
    {
        $query = $this->db->query('SELECT IDCLINIC FROM tbclinic where IDCLINIC = "' . $clinicId . '" AND PASSWORD = "' . $password . '"');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $item) {
                return $item->IDCLINIC;
            }
        } else {
            return false;
        }
    }

    public function updateById($data,$clinicId){
        $this->db->where('IDCLINIC', $clinicId);
        $this->db->update('tbclinic', $data);
    }

    public function insertClinic($data)
    {
        $this->db->insert('tbclinic', $data);
        return $this->db->insert_id();
    }

    public function insert($data)
    {
        $this->db->insert('tbbooking', $data);
        return $this->db->insert_id();
    }
}