<?php 



class AdminController extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('jobModel');
            $this->load->model('CountriesModel');
            $this->load->model('RegionModel');
            $this->load->model('LocationModel');
            $this->load->model('EmployeesModel');
            $this->load->model('AdminBranchModel');
            $this->load->library('response');
        
        }


    public function login_index(){
        $page = "login";

    
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
            show_404();

        }
        $data['sample'] = 'data';
    
    
         $this->load->view('templates/admin-layout/login-templates/header');
   
         $this->load->view('admin/'.$page,$data);
         $this->load->view('templates/admin-layout/login-templates/footer');
    }

    public function loginProcess(){
        $this->form_validation->set_rules('email','E-mail','required');
        $this->form_validation->set_rules('password','Password','required');

        if($this->form_validation->run() == FALSE){
            return $this->response->status('validation_errors',400);
        }else{
            $data = $this->input->post();


            
            echo json_encode($data);
        }
    }



    public function render(){
        $page = "index";

        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['sample'] = 'data';


     $this->load->view('templates/admin-layout/header');
     $this->load->view('templates/admin-layout/sidebar');
     $this->load->view('admin/'.$page,$data);
     $this->load->view('templates/admin-layout/footer');
    }

    

    public function employee_index(){
        $page = "employees";

        
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

        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['sample'] = 'data';


     $this->load->view('templates/admin-layout/header');
     $this->load->view('templates/admin-layout/sidebar');
     $this->load->view('admin/'.$page,$data);
     $this->load->view('templates/admin-layout/footer');
    }
    
    public function transaction_index(){
        $page = "transactions";

        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['sample'] = 'data';


     $this->load->view('templates/admin-layout/header');
     $this->load->view('templates/admin-layout/sidebar');
     $this->load->view('admin/'.$page,$data);
     $this->load->view('templates/admin-layout/footer');
    }
    public function jobs_index(){
        $page = "jobTitle";

        
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
    



}