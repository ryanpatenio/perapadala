<?php

class EmployeesModel extends CI_Model{

    public function __construct(){
        parent::__construct();

        $this->load->database();
        $this->load->library('response');


    }
    
    public function fetchBmEmployeesNotAlreadyAssign(){
        //note JOB = 1 mean BM or Branch Manager
        //if JOB = 2 mean BP or Branch Personnel Position

        $query =$this->db->select('e.employee_id, CONCAT(e.fname, " ", e.lname) AS employee_name, j.job_id, j.name as job_title')
                    ->from('employees e')
                    ->join('job j', 'e.job_id = j.job_id')
                    ->where('j.job_id', 1)
                    ->where('e.bm_status', 0)
                    ->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return array();
        }
    }
}