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
    public function get_user_by_email($email) {
        // Query the database to get user by username
        $query = $this->db->where('email',$email)
            ->get('user');
        if($query->num_rows() > 0){
            #found data
            return $query->row();
        }else{
            return 2;
        }
        
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

    public function updateEmployeesPassword($data){
        $emp_id = $data['emp_id'];
        $newPass = $data['newPass'];

        //unset
        unset($data['emp_id']);
        unset($data['newPass']);

        $update = $this->db->where('employee_id',$emp_id)
            ->update('employees',['password'=>$newPass]);
        if($update){
            return 1;
        }else{
            return 2;
        }
    }

    public function getEmployeeCurrentPassword($emp_id){
        $query = $this->db->where('employee_id',$emp_id)
            ->get('employees');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return 2;
        }
    }

    public function uploadAvatar($data,$id){
        #employee_id
        $emp_id = $id;

        $upload = $this->db->where('employee_id',$emp_id)
            ->update('employees',$data);
        if($upload){
            return 1;
        }else{
            return 2;
        }
    }



    #for admin
    public function getUsernameOFAdmin($email){
        // Query the database to get user by username
        $query = $this->db->get_where('employees', array('email' => $email));
        return $query->row();
    }

    public function addUser($data){
        $query = $this->db->insert('user',$data);

        if($query){
            return 1;
        }

        return 2;
    }

    public function getAllSubUser(){
        $query = $this->db->where('role',2)
            ->where('status',1)
            ->get('user');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return array();
        }
    }
   

    public function getUserByID($id){
        $query = $this->db->select('user_id,name,email,role')
            ->from('user')
            ->where('user_id',$id)
            ->get();
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return 2;
        }
    }

    public function updateUser($data,$id){
        $update = $this->db->where('user_id',$id)
            ->update('user',$data);

        if($update){
            return 1;
        }else{
            return 2;
        }
    }

    //not totally deleted just update the status into 0 
    public function deleteUser($id){
        $query = $this->db->where('user_id',$id)
            ->update('user',['status'=> 0]);
        if($query){
            return 1;
        }else{
            return 2;
        }
    }

}
