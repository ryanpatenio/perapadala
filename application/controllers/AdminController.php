<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class AdminController extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
 
            # LOAD NECESSARY HELPERS & LIBRARY
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->helper('security');
            $this->load->library('upload');
           
        
        }

    #ADMIN LOGIN METHOD
    public function loginProcess(){
        $this->form_validation->set_rules('email','E-mail','required');
        $this->form_validation->set_rules('password','Password','required');

        if($this->form_validation->run() == FALSE){
            $this->response->status('validation_errors',400);
            return;
        }else{


            // Validation passed, attempt login
            $email = $this->input->post('email');
            $password = $this->input->post('password');
    
            // Retrieve user from the database by email
            $user = $this->UserModel->get_user_by_email_password($email);

            if($user !== 2){
                #USER FOUND
                
                //echo json_encode($user);
                #VALIDATE PASSWORD
                if ($user && password_verify($password, $user->password)){
                    #PASSWORD MATCH

                    #CHECK USER STATUS 1 ACTIVE 0 NOT ACTIVE OR REMOVED
                    if($user->status !== 0){
                        #ACTIVE USER

                        #SET ROLE
                        $role = '';
                        if($user->role == 1 || $user->role == '1'){
                            $role = 'SUPER_ADMIN';
                        }else{
                            $role = 'SUB_ADMIN';
                        }
                        
                        #CREATE SESSION ARRAY
                        $user_data = array(
                            'user_id' => $user->user_id,
                            'user_email' => $user->email,
                            'user_name'=> $user->name,
                            'role' => $role,
                            'avatar'=> $user->avatar,
                            'logged_in' => TRUE
                        );
                        
                        #SET SESSION
                        $this->session->set_userdata($user_data);
                        
                        #return success
                        return $this->response->status('success',200);

                    }else{
                        #RETURN ERROR INACTIVE USER
                        return $this->response->status('inactive',400);
                        
                    }
                }else{
                    #INVALID CREDENTIALS
                    return $this->response->status('invalid_credentials',400);
                }
               
            }else{
                #INVALID CREDENTIALS
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

    
    #ADMIN USER
    public function addUser(){

         #check auth
         $this->auth_library->check_login_ADMIN();

        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','E-mail','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('role','Role','required');

        if($this->form_validation->run() == FALSE){
             $this->response->status('validation_error',400);
             return;
        }

        $data = $this->input->post();
        $email = trim($data['email']);

         
        $dataToInsert = array(
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => password_hash($data['password'],PASSWORD_DEFAULT),
            'role' => $data['role'],
            'status' => 1

        );
       
        #check email if exist
        $email_exist  = $this->UserModel->get_user_by_email($email);
        if($email_exist == 1){
            #email exist
            $this->response->status('email_exist',400);
            return;             
        }

       #check the image file
        if (!empty($_FILES['my_avatar']['name'])){
             # Set up all configuration
             $config['upload_path'] = './uploads/avatar/';
             $config['allowed_types'] = 'gif|jpg|jpeg|png';
             $config['max_size'] = 5120; // 5MB in KB
             $config['file_name'] = 'avatar_' . date('YmdHis');

             $this->upload->initialize($config);

             
             if (!$this->upload->do_upload('my_avatar')) {
                # Error in uploading
                $error = $this->upload->display_errors();
                 $this->response->status($error, 400);
                 return;
            } else {
                # Get the upload data
                $data = $this->upload->data();
                $file_name = $data['file_name'];
                $dataToInsert['avatar'] = $file_name;
              
            }
        }

          #insert the Data
          $insert = $this->UserModel->addUser($dataToInsert);
          if($insert !== 2){
              #success
              return $this->response->status('success',200);
          }else{
              return $this->response->status('error',500);
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
            #get all form data
            $data = $this->input->post();

            #password
            $password = $this->input->post('password');

            #SET FORM DATA
            $update_data = array(
                'name' => $data['name'],                
                'role' => $data['role']                
            );
            
            #SET ALL NEEDED ID AND EMAIL
            $user_id = $data['id'];
            $email = trim($data['email']);

            #get current avatar
            $current_avatar = $this->UserModel->getUserAvatar($user_id);

            if($current_avatar->avatar == 0 || $current_avatar->avatar == '0'){
                #RETURN ERROR
                $this->response->status('cannot_find_avatar',400);
                return;
            }
          
            // Fetch the existing user data from the database based on the user ID
            $existing_user = $this->UserModel->getUserById($user_id);
            if ($existing_user !== 2) {
                // Check if the email is being changed
                if ($existing_user['email'] != $email) {
                    // Email is being changed, so check if the new email already exists
                    $existing_email = $this->UserModel->get_user_by_email($email);
    
                    if ($existing_email == 1) {
                        // Email already exists in the database for another user
                        // Return error
                        $this->response->status('email_exist', 400);
                        return;
                    } else {
                        #APPEND FORM DATA
                        $update_data['email'] = $email;
                    }
                       
                
                }
    
                # Check if password is provided THEN APPEND PASSWORD IN THE FORM DATA
                if ($password !== null && $password !== '') {
                    // Password is provided, update it
                    $update_data['password'] = password_hash($password, PASSWORD_DEFAULT);
                }


            #GET IMAGE FILE
            if (!empty($_FILES['my_avatar2']['name'])) {
                # Set up all configuration
                $config['upload_path'] = './uploads/avatar/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 5120; // 5MB in KB
                $config['file_name'] = 'avatar_' . date('YmdHis');

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('my_avatar2')) {
                    # Error in uploading
                    $error = $this->upload->display_errors();
                    $this->response->status($error, 400);
                    return;
                   
                } else {
                    # GET THE UPLOAD DATA
                    $data = $this->upload->data();
                    #GET THE FILE NAME 
                    $file_name = $data['file_name'];
                    #APPEND FORM DATA
                    $update_data['avatar'] = $file_name;

                    # DELETE OLD AVATAR PHOTO
                    if ($current_avatar->avatar && file_exists('./uploads/avatar/' . $current_avatar->avatar)) {
                        unlink('./uploads/avatar/' . $current_avatar->avatar);                       
                    }else{
                        $this->response->status('file_not_exist_dir',400);
                        return;
                    }

                }
            }

 
               
                #ALL SET & SUBMIT THE FORM IN THE USER MODEL
                $update = $this->UserModel->updateUser($update_data, $user_id);
                if ($update !== 2) {
                    # SUCCESS
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
    

    #ADMIN TRANSACTION

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

    #ADMIN CUSTOMER
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

    #MY PASSWORD
    public function updatePassword(){
        
        $this->form_validation->set_rules('currentPassword','Old Password','required');
        $this->form_validation->set_rules('newPassword','New Password','required');

        if($this->form_validation->run() == FALSE){
            $this->response->status('error_validation',400);
            return;
        }
        #ALL FORM DATA
        $data = $this->input->post();
        
        $dataToUpdate = array(
            'password' => password_hash($data['newPassword'],PASSWORD_DEFAULT),
            
        );

        #USER ID
        $my_user_id = $this->session->userdata('user_id');

        #Current Password
        $currentPassword = $data['currentPassword'];


        #GET OLD PASSWORD
        $user = $this->UserModel->getUserPasswordByID($my_user_id);

        if($user !== 2){
            #FOUND DATA
            if (!password_verify($currentPassword, $user->password)){
                #OLD PASSWORD NOT MATCH
                $this->response->status('old_password_not_match',400);
                return;
            }
            
            #UPDATE PASSWORD
            $update = $this->UserModel->updateUser($dataToUpdate,$my_user_id);
            if($update !== 2){
                #SUCCESS
                return $this->response->status('success',200);
                
            }else{
                #ERROR
                return $this->response->status('error',500);
            }            

        }
    }

    #ADMIN PROFILE
    public function updateProfile(){
        $this->form_validation->set_rules('name','Full Name','required');

        if($this->form_validation->run() == FALSE){
            $this->response->status('validation_error',400);
            return;
        }
        #ALL FORM DATA
        $data = $this->input->post();

        #name
        $name = $data['name'];

        #UPDATE DATA ARRAY
        $updateData = array(
            'name' => $data['name']
        );

        #USER ID
        $user_id = $this->session->userdata('user_id');


        #get current avatar
        $current_avatar = $this->UserModel->getUserAvatar($user_id);

        if($current_avatar->avatar == 0 || $current_avatar->avatar == '0'){
            #RETURN ERROR
            $this->response->status('cannot_find_avatar',400);
            return;
        }


        #CHECK IF HAS FILE IMG
        if (!empty($_FILES['my_avatar']['name'])) {
            # Set up all configuration
            $config['upload_path'] = './uploads/avatar/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 5120; // 5MB in KB
            $config['file_name'] = 'avatar_' . date('YmdHis');

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('my_avatar')) {
                # Error in uploading
                $error = $this->upload->display_errors();
                $this->response->status($error, 400);
                return;

            }else{
                 # GET THE UPLOAD DATA
                 $data = $this->upload->data();
                 #GET THE FILE NAME 
                 $file_name = $data['file_name'];
                 #APPEND FORM DATA
                 $updateData['avatar'] = $file_name;

                # Update session with new avatar filename
                $this->session->set_userdata('avatar', $file_name);

                 # DELETE OLD AVATAR PHOTO
                 if ($current_avatar->avatar && file_exists('./uploads/avatar/' . $current_avatar->avatar)) {
                    unlink('./uploads/avatar/' . $current_avatar->avatar);                       
                }else{
                    $this->response->status('file_not_exist_dir',400);
                    return;
                }
            }


        }

        #ALL SET & SUBMIT THE FORM IN THE USER MODEL
        $update = $this->UserModel->updateUser($updateData, $user_id);
        if ($update !== 2) {
            # SUCCESS
            # UPDATE SESSION NAME
            $this->session->set_userdata('user_name', $name);
           
            return $this->response->status('success', 200);                   
        } else {
            // Failed to update
            return $this->response->status('error', 500);
        }

    }


}