<?php

class EmployeesModel extends CI_Model{

    public function __construct(){
        parent::__construct();

        $this->load->database();
        


    }
    //this fetch data use in the branches sidebar
    public function fetchBmEmployeesNotAlreadyAssign(){
        //note JOB = 1 mean BM or Branch Manager
        //if JOB = 2 mean BP or Branch Personnel Position

        $query =$this->db->select('e.employee_id, CONCAT(e.fname, " ", e.lname) AS employee_name, j.job_id, j.name as job_title')
                    ->from('employees e')
                    ->join('job j', 'e.job_id = j.job_id')
                    ->where('j.job_code', 'BM')
                    ->where('e.bm_status', 0)
                    ->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return array();
        }
    }

    public function checkEmailExist($email){
       
        $query = $this->db->where('email',$email)
        ->get('employees');

        if($query->num_rows() > 0){
            return 1;
        }
        return 2;
    }
    public function emailExistWithID($email,$id){
        $query = $this->db->where('email',$email)
            ->where('employee_id',$id)
            ->get('employees');
        if($query->num_rows() > 0){
            return 1;
        }else{
            return 2;
        }
    }
    public function checkEmployeeIfBMisAlreadyAssigned($id){
        $query = $this->db->select('*')
                  ->from('employees e')
                  ->join('job j', 'e.job_id = j.job_id')
                  ->join('branches b', 'e.employee_id = b.employee_id')
                  ->where('e.employee_id', $id)
                  ->get();
        if($query->num_rows() > 0){
            return 1;
        }else{
            return 2;
        }
    }


    public function fetchEmployees(){
        $query = $this->db->select('e.employee_id,concat(e.fname," ",e.lname) as name,e.branch_id,e.hire_date,j.name as job_title')
            ->from('employees e')
            ->join('job j','j.job_id = e.job_id')
            ->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return array();
        }
    }

    public function addEmployee($data){
        $insert = $this->db->insert('employees',$data);

        if($insert){
            return 1;
        }
        return 2;


    }

    public function checkIfBM($id){
        $query = $this->db
                ->select('*')
                ->from('employees e')
                ->join('job j', 'e.job_id = j.job_id')
                ->where('e.employee_id', $id)
                ->where('j.job_code', 'BM')
                ->get();
        if($query->num_rows() > 0){
            return 1;
        }else{
            return 2;
        }
    }

    public function getEmployeeById($id){


        $query = $this->db->select('e.employee_id, j.job_id, e.fname, e.lname, e.hire_date, e.email, e.contact, e.address,j.job_code, j.name as job_title')
        ->from('employees e')
        ->join('job j', 'e.job_id = j.job_id')
        ->where('e.employee_id', $id)
        ->get();
        
        if($query->num_rows() > 0){
            return $query->row_array();
        }else{
            return 2;
        }
    }

    public function updateEmployee($data,$id){
        $query = $this->db->where('employee_id',$id)
              ->update('employees',$data);

        if($query){
            return 1;
        }else{
            return 2;
        }
    }

    public function assignBPemployee($data){
        $id = $data['id'];
        $branch_id = $data['branch'];
        unset($data['id']);
        unset($data['branch']);

        $update = $this->db->where('employee_id',$id)
            ->update('employees',[
                'branch_id' => $branch_id
            ]);
        if($update){
            return 1;
        }else{
            return 2;
        }

    }

    public function assignBMemployee($data){
        $id = $data['id'];
        $branch_id = $data['branch'];

        unset($data['id']);
        unset($data['branch']);

        $updateEmployee = $this->db->where('employee_id',$id)
                ->update('employees',[
                    'branch_id'=> $branch_id,
                    'bm_status' => 1
                ]);
        $updateBranch = $this->db->where('branch_id',$branch_id)
                    ->update('branches',[
                        'employee_id'=> $id
                    ]);

        return 1;
    }

    public function checkEmployeeJobTitle($id){
        $query = $this->db
            ->select('e.employee_id, CONCAT(e.fname, " ", e.lname) AS employee_name, j.name, j.job_id, j.job_code')
            ->from('employees e')
            ->join('job j', 'e.job_id = j.job_id')
            ->where('e.employee_id', $id)
            ->get();
        if($query->num_rows() > 0){
            $data = $query->row_array();
            return $data['job_code'];
        }else{
            return 2;
        }
    }
    //if return 1 it means the employee has no branch assign yet
    public function checkEmployeeAssignStatus($id){
        $query = $this->db->where('branch_id',0)
                ->where('employee_id',$id)
                ->get('employees');
        if($query->num_rows() > 0){
            return 1;
        }else{
            return 2;
        }
    }
    
    public function getEmployeeByAssignBranch($id){
        $query = $this->db
            ->select('e.employee_id, b.branch_id, j.job_id, CONCAT(e.fname, " ", e.lname) AS emp_name, b.branch_name,j.job_code, j.name AS job_title')
            ->from('employees e')
            ->join('job j', 'e.job_id = j.job_id')
            ->join('branches b', 'e.branch_id = b.branch_id')
            ->where('e.employee_id', $id)
            ->get();
        if($query->num_rows() > 0){
            return $query->row_array();
        }else{
            return 2;
        }
    }
    public function getEmployeeByAssignBranchLeftJoin($id){
        $query = $this->db
            ->select('e.employee_id, b.branch_id, j.job_id,e.email,e.contact,e.address, CONCAT(e.fname, " ", e.lname) AS emp_name, b.branch_name,j.job_code, j.name AS job_title')
            ->from('employees e')
            ->join('job j', 'e.job_id = j.job_id','left')
            ->join('branches b', 'e.branch_id = b.branch_id','left')
            ->where('e.employee_id', $id)
            ->get();
        if($query->num_rows() > 0){
            return $query->row_array();
        }else{
            return 2;
        }
    }


    public function removeBranchAssign($data){
        $code = trim($data['job_code']);
        $job_code = strtolower($code);

        $employee_id = $data['emp_id'];
        $branch_id = $data['branch_id'];

        #unset
        unset($data['job_code']);
        unset($data['emp_id']);
        unset($data['branch_id']);

        if($job_code == 'bm'){
            #for BM
            $updateEmpTable = array(
                'branch_id'=> 0,
                'bm_status'=>0
            );
            $update = $this->db->where('employee_id',$employee_id)
                ->update('employees',$updateEmpTable);
            
            #update the branches table
            $updateBranches = $this->db->where('branch_id',$branch_id)
                ->update('branches',['employee_id'=>0]);

            return 1;
            
        }elseif($job_code == 'bp'){
            #for BP
            $updateBP = $this->db->where('employee_id',$employee_id)
                ->update('employees',['branch_id'=>0]);
                 
            if($updateBP){
                return 1;
            }else{

                return 2;
            }
           
        }else{
            #error
            return 2;
        }

    }
    

}