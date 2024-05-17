<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class AdminController extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
 
            $this->load->helper('security');
           
        
        }


    public function loginProcess(){
        $this->form_validation->set_rules('email','E-mail','required');
        $this->form_validation->set_rules('password','Password','required');

        if($this->form_validation->run() == FALSE){
            return $this->response->status('validation_errors',400);
        }else{


            // Validation passed, attempt login
            $email = $this->input->post('email');
            $password = $this->input->post('password');
    
            // Retrieve user from the database by email
            $user = $this->UserModel->get_user_by_email($email);

            if($user !== 2){
                
                if ($user && password_verify($password, $user->password)){
                    #login successful
                    #check if this user is not banned or removed
                    if($user->status !== 0){
                        #active user
                        $role = '';
                        if($user->role == 1 || $user->role == '1'){
                            $role = 'SUPER_ADMIN';
                        }else{
                            $role = 'SUB_ADMIN';
                        }
                        
                        #create session array
                        $user_data = array(
                            'user_id' => $user->user_id,
                            'user_email' => $user->email,
                            'user_name'=> $user->name,
                            'role' => $role,
                            'avatar'=> $user->avatar,
                            'logged_in' => TRUE
                        );
                        
                        $this->session->set_userdata($user_data);
                        
                        #return success
                        return $this->response->status('success',200);

                    }else{
                        #status is 0 meant remove or inactive
                        return $this->response->status('inactive',400);
                        
                    }
                }else{
                    #invalid email or password
                    return $this->response->status('invalid_credentials',400);
                }
               
            }else{
                #invalid credentials
                return $this->response->status('invalid_credentials',400);
            }


            
           
        }
    }


    

    public function employee_index(){
        $page = "employees";
         #check auth
         $this->auth_library->check_login_ADMIN();
        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['jobs'] = $this->jobModel->fetchJob();
        $data['employees'] = $this->EmployeesModel->fetchEmployees();
        $data['branches'] = $this->BranchModel->fetchBranch();
        

     $this->load->view('templates/admin-layout/header');
     $this->load->view('templates/admin-layout/sidebar');
     $this->load->view('admin/'.$page,$data);
     $this->load->view('templates/admin-layout/footer');
     
    }

    public function branches_index(){
        $page = "branches";
         #check auth
         $this->auth_library->check_login_ADMIN();

        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['locations'] = $this->LocationModel->noAssignLocation();
        $data['BMemployees'] = $this->EmployeesModel->fetchBmEmployeesNotAlreadyAssign();
        $data['branches'] = $this->AdminBranchModel->fetchBranches();


     $this->load->view('templates/admin-layout/header');
     $this->load->view('templates/admin-layout/sidebar');
     $this->load->view('admin/'.$page,$data);
     $this->load->view('templates/admin-layout/footer');
     
    }

    public function customer_index(){
        $page = "customer";
         #check auth
         $this->auth_library->check_login_ADMIN();

        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['customers'] = $this->CustomerModel->fetchAllCustomers();


     $this->load->view('templates/admin-layout/header');
     $this->load->view('templates/admin-layout/sidebar');
     $this->load->view('admin/'.$page,$data);
     $this->load->view('templates/admin-layout/footer');
    }
    
    public function transaction_index(){
        $page = "transactions";
         #check auth
         $this->auth_library->check_login_ADMIN();

        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['transactions'] = $this->AdminBranchModel->fetchTransactions();


     $this->load->view('templates/admin-layout/header');
     $this->load->view('templates/admin-layout/sidebar');
     $this->load->view('admin/'.$page,$data);
     $this->load->view('templates/admin-layout/footer');
    }
    public function jobs_index(){
        $page = "jobTitle";
         #check auth
         $this->auth_library->check_login_ADMIN();

        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['jobs'] = $this->jobModel->fetchJob();
      

     $this->load->view('templates/admin-layout/header');
     $this->load->view('templates/admin-layout/sidebar');
     $this->load->view('admin/'.$page,$data);
     $this->load->view('templates/admin-layout/footer');
    }

    public function users_index(){
        $page = "users";
         #check auth
         $this->auth_library->check_login_ADMIN();

        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['sub_users'] = $this->UserModel->getAllSubUser();


     $this->load->view('templates/admin-layout/header');
     $this->load->view('templates/admin-layout/sidebar');
     $this->load->view('admin/'.$page,$data);
     $this->load->view('templates/admin-layout/footer');
    }

    public function profile_index(){
        $page = "profile";
         #check auth
         $this->auth_library->check_login_ADMIN();

        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['sample'] = 'data';


     $this->load->view('templates/admin-layout/header');
     $this->load->view('templates/admin-layout/sidebar');
     $this->load->view('admin/'.$page,$data);
     $this->load->view('templates/admin-layout/footer');
    }
    public function serviceCharge_index(){
        $page = "serviceCharges";
         #check auth
         $this->auth_library->check_login_ADMIN();

        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['serviceFees'] = $this->ServiceFeeModel->fetchServiceCharge();
        

     $this->load->view('templates/admin-layout/header');
     $this->load->view('templates/admin-layout/sidebar');
     $this->load->view('admin/'.$page,$data);
     $this->load->view('templates/admin-layout/footer');
    }
    public function countries_index(){
        $page = "countries";
         #check auth
         $this->auth_library->check_login_ADMIN();

        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['countries'] = $this->CountriesModel->getCountries();


     $this->load->view('templates/admin-layout/header');
     $this->load->view('templates/admin-layout/sidebar');
     $this->load->view('admin/'.$page,$data);
     $this->load->view('templates/admin-layout/footer');
    }
    public function regions_index(){
        $page = "regions";
         #check auth
         $this->auth_library->check_login_ADMIN();

        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['countries'] = $this->CountriesModel->getCountries();
        $data['regions'] = $this->RegionModel->fetchRegions();

        
        $this->load->view('templates/admin-layout/header');
        $this->load->view('templates/admin-layout/sidebar');
        $this->load->view('admin/'.$page,$data);
        $this->load->view('templates/admin-layout/footer');
    }
    public function locations_index(){
        $page = "locations";
         #check auth
         $this->auth_library->check_login_ADMIN();

        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['locations'] = $this->LocationModel->fetchLocations();
        $data['countries'] = $this->CountriesModel->getCountries();
        $data['regions'] = $this->RegionModel->fetchRegions();
       

     $this->load->view('templates/admin-layout/header');
     $this->load->view('templates/admin-layout/sidebar');
     $this->load->view('admin/'.$page,$data);
     $this->load->view('templates/admin-layout/footer');
    }

    
    #ADMIN User 
    public function addUser(){

         #check auth
         $this->auth_library->check_login_ADMIN();

        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','E-mail','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('role','Role','required');

        if($this->form_validation->run() == FALSE){
            return $this->response->status('validation_error',400);
        }

        $data = $this->input->post();
        
        $dataToInsert = array(
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => password_hash($data['password'],PASSWORD_DEFAULT),
            'role' => $data['role'],
            'status' => 1

        );

        #check email if exist
        $email_exist  = $this->UserModel->get_user_by_email(trim($data['email']));
        if($email_exist  == 1){
            #email exist
            return $this->response->status('email_exist',400);
        }else{
            #insert the Data
            $insert = $this->UserModel->addUser($dataToInsert);
            if($insert !== 2){
                #success
                return $this->response->status('success',200);
            }else{
                return $this->response->status('error',500);
            }
        }       

       
    }

    public function getUser(){

         #check auth
         $this->auth_library->check_login_ADMIN();

        $id = $this->input->post('id');

        if($id === null || $id === ''){
            return $this->response->status('id_null',400);
        }else{
           

            $data = $this->UserModel->getUserByID($id);
            if($data !== 2){
                #success
                echo json_encode($data);
            }else{
                #failed
                return $this->response->status('error',500);
            }
        }
    }

    public function updateUser() {

         #check auth
         $this->auth_library->check_login_ADMIN();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'E-mail', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            return $this->response->status('validation_errors', 400);
        } else {
            $data = $this->input->post();
            $update_data = array(
                'name' => $data['name'],                
                'role' => $data['role']                
            );
    
            $password = $this->input->post('password');
    
            // Fetch the existing user data from the database based on the user ID
            $existing_user = $this->UserModel->getUserById($data['id']);
            if ($existing_user !== null) {
                // Check if the email is being changed
                if ($existing_user->email != $data['email']) {
                    // Email is being changed, so check if the new email already exists
                    $existing_email = $this->UserModel->get_user_by_email($data['email']);
    
                    if ($existing_email == 1) {
                        // Email already exists in the database for another user
                        // Return error
                        return $this->response->status('email_exist', 400);
                    } else {
                        $update_data['email'] = $data['email'];
                    }
                       
                
                }
    
                // Check if password is provided
                if ($password !== null && $password !== '') {
                    // Password is provided, update it
                    $update_data['password'] = password_hash($password, PASSWORD_DEFAULT);
                }
               
                // Update user data
                $update = $this->UserModel->updateUser($update_data, $data['id']);
                if ($update !== 2) {
                    // Success
                    return $this->response->status('success', 200);
                } else {
                    // Failed to update
                    return $this->response->status('error', 500);
                }
            }
        }
    }

    public function deleteUser(){
         #check auth
         $this->auth_library->check_login_ADMIN();
        
        $user_id = $this->input->post('id');

        if($user_id === null || $user_id === ''){
            return $this->response->status('id_null',400);
        }else{
            $delete = $this->UserModel->deleteUser($user_id);
            if($delete !== 2){
                #success
                return $this->response->status('success',200);
            }else{
                #failed
                return $this->response->status('error',500);
            }
        }
    }
    

    #transaction

    public function getTransaction(){
         #check auth
         $this->auth_library->check_login_ADMIN();

        $id = $this->input->post('id');

        if($id === null || $id === ''){
            return $this->response->status('id_null');
        }else{
 
            $data = $this->AdminBranchModel->getTransactionByID($id);
            if($data !== 2){
                #success
                echo json_encode($data);
            }else{
                return $this->response->status('error',500);
            }
            
            
        }
    }

    #customer
    public function getCustomer(){
         #check auth
         $this->auth_library->check_login_ADMIN();

        $id = $this->input->post('id');

        if($id === null || $id === ''){
            return $this->response->status('id_null',400);
        }else{
            $data = $this->CustomerModel->getCustomer($id);
            if($data != 2){
                echo json_encode($data);
            }else{
                return $this->response->status('error',500);
            }
        }
    }

    public function updateCustomer(){
         #check auth
         $this->auth_library->check_login_ADMIN();

        $this->form_validation->set_rules('customer_name','Name','required');
        $this->form_validation->set_rules('address','Address','required');
        $this->form_validation->set_rules('contact','Contact','required');

        if($this->form_validation->run() == FALSE){
            return $this->response->status('validation_error',400);
        }else{
            $data = $this->input->post();
            $customer_id = $data['customer_id'];
            $dataToUpdate = array(
                'name' => $data['customer_name'],
                'contact' => $data['contact'],
                'address' => $data['address']

            );

            $update = $this->CustomerModel->updateCustomer($dataToUpdate,$customer_id);
            if($update != 2){
                #success
                return $this->response->status('success',200);
            }else{
                return $this->response->status('error',500);
            }
        }
    }



}