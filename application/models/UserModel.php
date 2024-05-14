<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_user_by_username($email) {
        // Query the database to get user by username
        $query = $this->db->get_where('employees', array('email' => $email));
        return $query->row();
    }
    public function getBranch_id_of_emp($id){
        $query  =   $this->db->select('e.employee_id, b.branch_id, b.branch_name')
                ->from('employees e')
                ->join('branches b', 'e.branch_id = b.branch_id')
                ->where('e.employee_id',$id)
                ->get();
                
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return 2;
        }
    }

    public function getBranchPersonnelProfile($id){
        $query = $this->db->select('e.employee_id,e.fname,e.lname,e.email,e.contact,e.address,b.branch_name,j.name as job_title')
            ->from('employees e')
            ->join('branches b','e.branch_id = b.branch_id')
            ->join('job j','e.job_id = j.job_id')
            ->where('e.employee_id',$id)
            ->get();
    
        if($query->num_rows() > 0){
            return $query->row_array();
        }else{
            return 2;
        }
    }

    
    public function updateBpProfile($data,$id){
        $update = $this->db->where('employee_id',$id)
            ->update('employees',$data);

        if($update){
            return 1;
        }else{
            return 2;
        }
    }

}
