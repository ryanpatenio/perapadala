<?php

class BranchModel extends CI_Model{

    public function __construct(){
        parent::__construct();

        $this->load->database();
       

    }

    public function fetchBranch() {
        
            $this->db->select('b.branch_id, b.branch_name, CONCAT(l.province_name, " ", l.city, " ", l.street_name) as location, CONCAT(e.fname, " ", e.lname) as BM');
            $this->db->from('branches b');
            $this->db->join('locations l', 'b.location_id = l.location_id', 'left');
            $this->db->join('employees e', 'b.employee_id = e.employee_id', 'left');
            $query = $this->db->get();
    
            if($query->num_rows() > 0){
                return $query->result();
            }
            //return empty array
            return array();
    
    }
    #will use in assigning branches for Branch Manager
    public function fetchBranchNoEmployeeAssignedYet(){
        
        $query = $this->db
            ->select('b.branch_id, b.branch_name, l.province_name, l.city, l.street_name')
            ->from('branches b')
            ->join('locations l', 'b.location_id = l.location_id')
            ->where('b.employee_id', 0)
            ->get();
       if($query->num_rows() > 0){
        return $query->result();
       }else{
        return array();
       }    

    }

    
}