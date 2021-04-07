<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StatModel extends CI_Model
{
    public function stat($clinicId)
    {
        $year = date("Y");
        $query = $this->db->query("SELECT
    COUNT(*) AS NUM, SUBSTRING(CREATEDATE, 6, 2)  AS MONTH
FROM
    dbnutmor.tbstat
WHERE
    IDCLINIC != '' AND IP != '::1'
        AND SUBSTRING(CREATEDATE, 1, 5) LIKE '%" . $year . "%'
        AND IDCLINIC = '" . $clinicId . "'
GROUP BY MONTH , IDCLINIC");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }


    public function statByAdmin()
    {
        $year = date("Y");
        $query = $this->db->query("SELECT
    COUNT(*) AS NUM, SUBSTRING(CREATEDATE, 6, 2)  AS MONTH ,IDCLINIC
    FROM
    dbnutmor.tbstat
    WHERE
    IDCLINIC != '' AND IP != '::1'
        AND SUBSTRING(CREATEDATE, 1, 5) LIKE '%" . $year . "%'
      GROUP BY MONTH ");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }


    public function insert($data)
    {
        $this->db->insert('tbstat', $data);
        return $this->db->insert_id();
    }
}
