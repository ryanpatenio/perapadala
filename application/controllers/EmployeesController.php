<?php 

class EmployeesController extends CI_Controller{

    public function __construct()
        {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->library('response');
            
            $this->load->model('EmployeesModel');
                  
           
        }

    public function addEmployee(){
        
        $this->form_validation->set_rules('fname','First Name','required');
        $this->form_validation->set_rules('lname','Last Name','required');
        $this->form_validation->set_rules('email','E-mail','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('contact','Contact','required');
        $this->form_validation->set_rules('address','Address','required');
        $this->form_validation->set_rules('job','Job Title','required');
        $this->form_validation->set_rules('hireDate','Hire Date','required');

       if($this->form_validation->run() == FALSE){

            return $this->response->status(validation_errors(),400);

       }else{

        $data = $this->input->post();


        //check Email
        $exist = $this->EmployeesModel->checkEmailExist(trim($data['email']));
        if($exist == 1){
            //exist
            return $this->response->status('email_exist',401);
        }else{

            //set Data to insert 
            
        $insertData = array(
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'contact' => $data['contact'],
            'address' => $data['address'],
            'job_id' => $data['job'],
            'hire_date' => $data['hireDate']
          
        );


            $insert = $this->EmployeesModel->addEmployee($insertData);

       
            if($insert == 1){
                return $this->response->status('success',200);
            }else{
                return $this->response->status('error',500);
            }

        }
       

       }
    }

    public function editEmployee(){
        $id = $this->input->post('id');
        if($id === null || $id === ''){
            return $this->response->status('error_null',400);
        }else{
          
            $get = $this->EmployeesModel->getEmployeeById($id);
            if($get != 2){
                echo json_encode($get);
            }else{
                return $this->response->status('error',500);
            }
        }
    }
    public function funcUpdateEmployee($data,$id){
        
                    #check the password if null
                    if($data['password'] === '' || $data['password'] === null){
                        #null
                        #update but the password not included
                        #set the data into array
                        $dataToInsert = array(
                            'fname' => $data['fname'],
                            'lname' => $data['lname'],
                            'email' => $data['email'],
                            'contact' => $data['contact'],
                            'address' => $data['address'],
                            'hire_date' => $data['hireDate'],
                            'job_id' => $data['job']
                        );
                        #update Employee
                        $update = $this->EmployeesModel->updateEmployee($dataToInsert,$id);
                        if($update == 1){
                            return $this->response->status('success',200);
                        }else{
                            return $this->response->status('error',500);
                        }

                    }else{
                        #not null
                        #update the password also
                        $dataToInsert = array(
                            'fname' => $data['fname'],
                            'lname' => $data['lname'],
                            'email' => $data['email'],
                            'contact' => $data['contact'],
                            'address' => $data['address'],
                            'hire_date' => $data['hireDate'],
                            'job_id' => $data['job'],
                            'password' => password_hash($data['password'],PASSWORD_DEFAULT)
                        );
                        #update Employee
                         $update = $this->EmployeesModel->updateEmployee($dataToInsert,$id);
                         if($update == 1){
                             return $this->response->status('success',200);
                         }else{
                             return $this->response->status('error',500);
                         }
                    }
                
    }

    public function updateEmployee(){
        $this->form_validation->set_rules('fname','First Name','required');
        $this->form_validation->set_rules('lname','Last Name','required');
        $this->form_validation->set_rules('email','E-mail','required');
        $this->form_validation->set_rules('contact','Contact','required');
        $this->form_validation->set_rules('address','Address','required');
        $this->form_validation->set_rules('hireDate','Hire Date','required');
        $this->form_validation->set_rules('job','Job Title','required');

        if($this->form_validation->run() == FALSE){
            return $this->response(validation_errors(),400);
        }else{
            $data = $this->input->post();
            #get the ID
            $id = $data['id'];

            #check if not null
            if($id === null || $id === ''){
             #id is null
              return $this->response->status('id_null',400);
            }else{
                #id null
                
                #check if email is not exist
                $exist = $this->EmployeesModel->emailExistWithID($data['email'],$id);

                if($exist == 2){
                    #email exist
                    return $this->response->status('email_exist',400);
                }else{
                    #email not exist

                    #check if this user is BM or branch Manager is already assign in the branches so that you cant change his job title into branch personnel
                    $BM_already_assign = $this->EmployeesModel->checkEmployeeIfBMisAlreadyAssigned($id);
                    $employeeJobTitle = $this->EmployeesModel->checkEmployeeJobTitle($id);
                    $hasBranchAssign = $this->EmployeesModel->checkEmployeeAssignStatus($id);

                    #check if the selected Job Title is not the same as the old Job Title
                    if($data['old_job'] == $data['job']){
                        #no changes
                        #no need to check if it is BM or BP
                        $this->funcUpdateEmployee($data,$id);

                    }else{
                        ##theres a changes in Job Title so That we must check if this user is a BM or has branch assigned area so that the user will not automatically change the job title to avoid conflict in the algorithm in the admin branches Page
                        if($employeeJobTitle == 'BP'){
                            if($hasBranchAssign == 1){
                                //has no branch assign
                                $this->funcUpdateEmployee($data,$id);
                            }else{
                                #has branch assign
                                return $this->response->status('BP_hasBranch_assign',400);
                            }
                        }elseif($employeeJobTitle == 'BM'){
                           
                            if($hasBranchAssign == 1){
                                //has No branch assign
                                $this->funcUpdateEmployee($data,$id);
                            }else{
                                #has branch assigned
                                if($BM_already_assign == 1){
                                    return $this->response->status('bm_assigned',400);
                                }
                            }
                        }elseif($employeeJobTitle == 'AS'){
                            if($hasBranchAssign == 1){
                                //has No branch assign
                                $this->funcUpdateEmployee($data,$id);
                            }else{
                                #has branch assign
                                return $this->response->status('AS_hasBranch_assign',400);
                            }
                        }else{
                            echo 'error1';
                        }

                    }


                }


            }
     
        }
    }

    public function getEmployee(){
        $id = $this->input->post('id');
        if($id === null || $id === ''){
            return $this->response->status('error_null');
        }else{
            #get the basic info of employees
            $employee_info = $this->EmployeesModel->getEmployeeById($id);

            #check if this Employee is BM or Not
            $checkIfBm = $this->EmployeesModel->checkIfBM($id);
            if($checkIfBm == 1){
                #BM
                #then let fetch the branches that theres no BM assigned Yet
                $noAssignBranch = $this->BranchModel->fetchBranchNoEmployeeAssignedYet();
                $arr = array(
                    'emp_info'=> $employee_info,
                    'branches' => $noAssignBranch

                );
                echo json_encode($arr);
                
            }else{
                #Regular Employee
                #fetch all branches
                $branches =  $this->BranchModel->fetchBranch();
                
                $arr = array(
                    'emp_info' => $employee_info,
                    'branches' => $branches

                );
                echo json_encode($arr);
            }
        }
    }
    public function assignEmployee(){
        $this->form_validation->set_rules('id','ID','required');
        $this->form_validation->set_rules('job_id','Job ID','required');
        $this->form_validation->set_rules('branch','Branch ID','required');

        if($this->form_validation->run() == FALSE){
            return $this->response->status(validation_errors(),400);
        }else{
            $data = $this->input->post();
            //echo json_encode($data);
            #check if the employee is BM or BP
            #1 for BM and 2 for BP
            $code = strtolower($data['job_code']);
            $job_code = trim($code);

            if($job_code == 'bm'){
               #Branch Manager
               #we update the employees branch id and bm status an also the branches table employee id
               $updateBm = $this->EmployeesModel->assignBMemployee($data);

               if($updateBm == 1){

                return $this->response->status('success',200);
                
               }else{
                #failed
                return $this->response->status('error',500);
               }

            }elseif($job_code == 'bp'){ 
                #Branch Personnel
                #we only update the employees branch id
                $updateBP = $this->EmployeesModel->assignBPemployee($data);

                if($updateBP == 1){
                    return $this->response->status('success',200);
                }else{
                    return $this->response->status('error',500);
                }
            }
        }
    }

    public function getEmployeeAssignBranch(){
        $id = $this->input->post('id');

        if($id === null || $id === ''){
            return $this->response->status('error_null',400);
        }else{
            $data = $this->EmployeesModel->getEmployeeByAssignBranch($id);
            if($data != 2){
                echo json_encode($data);
            }else{
                return $this->response->status('error',500);
            }
        }
    }
    
    public function removeAssignBranch(){
        $this->form_validation->set_rules('emp_id','Employee ID','required');
        $this->form_validation->set_rules('job_code','Job Code','required');
        $this->form_validation->set_rules('branch_id','Branch ID','required');

        if($this->form_validation->run() == FALSE){
            return $this->response->status(validation_errors(),400);
        }else{
            $data = $this->input->post();
            $removeAssignBranch = $this->EmployeesModel->removeBranchAssign($data);

            if($removeAssignBranch != 2){
                return $this->response->status('success',200);
            }else{
                return $this->response->status('error',500);
            }

        }
    }
    
    public function getEmployeeDetails(){
        $id = $this->input->post('id');

        if($id === null || $id === ''){
            return $this->response->status('error_null',400);
        }else{
            $data = $this->EmployeesModel->getEmployeeByAssignBranchLeftJoin($id);
            if($data != 2){
                echo json_encode($data);
            }else{
                return $this->response->status('error',500);
            }
        }
    }
}

