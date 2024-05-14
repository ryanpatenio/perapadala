<?php

class BranchAdminController extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    
        // Load necessary helpers and libraries
        $this->load->helper('url');
        $this->load->library('session');
    
        // Check if the user is logged in
        if (!$this->session->userdata('logged_in')) {
            // Redirect to login page
            redirect(base_url());
        }
    
        // Check if the user is admin or branch manager
        $user_role = $this->session->userdata('job_title');
        if ($user_role !== 'admin' && $user_role !== 'BM') {
            // Show unauthorized access error or redirect to a different page
            show_error('Unauthorized access', 403);
        }
    }
    

    public function render(){
        $page = "index";

        
        if(!file_exists(APPPATH.'views/branch-admin/'.$page.'.php')){
         show_404();

        }
      

        $data['sample'] = 'data';


     $this->load->view('templates/branch-admin-layout/header');
     $this->load->view('templates/branch-admin-layout/sidebar');
     $this->load->view('branch-admin/'.$page,$data);
     $this->load->view('templates/branch-admin-layout/footer');
    }

    public function branchEmployees_index(){
        $page = "branchEmployees";

        
        if(!file_exists(APPPATH.'views/branch-admin/'.$page.'.php')){
         show_404();

        }
        $branch_id = $this->session->userdata('branch_id');
        if(!$branch_id){
            $data['employees'] = '';
        }
        $data['employees'] = $this->EmployeesModel->fetchMyEmployeesByBranch($branch_id);


        $this->load->view('templates/branch-admin-layout/header');
        $this->load->view('templates/branch-admin-layout/sidebar');
        $this->load->view('branch-admin/'.$page,$data);
        $this->load->view('templates/branch-admin-layout/footer');
     
    }

    public function branchCustomers_index(){
        $page = "branchCustomers";

        
        if(!file_exists(APPPATH.'views/branch-admin/'.$page.'.php')){
         show_404();

        }
        $branch_id = $this->session->userdata('branch_id');

        if(!$branch_id){
            $data['customers'] = '';
        }
        
        $data['customers'] = $this->CustomerModel->fetchCustomersByBranch($branch_id);


        $this->load->view('templates/branch-admin-layout/header');
        $this->load->view('templates/branch-admin-layout/sidebar');
        $this->load->view('branch-admin/'.$page,$data);
        $this->load->view('templates/branch-admin-layout/footer');
     
    }

    public function branchTransactions_index(){
        $page = "branchTransactions";

        
        if(!file_exists(APPPATH.'views/branch-admin/'.$page.'.php')){
         show_404();

        }
        $branch_id = $this->session->userdata('branch_id');

        if(!$branch_id){
            $data['transactions'] = '';
        }
        
        $data['transactions'] = $this->CustomerModel->fetchCustomersByBranch($branch_id);

        $this->load->view('templates/branch-admin-layout/header');
        $this->load->view('templates/branch-admin-layout/sidebar');
        $this->load->view('branch-admin/'.$page,$data);
        $this->load->view('templates/branch-admin-layout/footer');
     
    }

    public function  branchMyProfile_index(){
        $page = "profile";

        
        if(!file_exists(APPPATH.'views/branch-admin/'.$page.'.php')){
         show_404();

        }
        $data['sample'] = 'data';


        $this->load->view('templates/branch-admin-layout/header');
        $this->load->view('templates/branch-admin-layout/sidebar');
        $this->load->view('branch-admin/'.$page,$data);
        $this->load->view('templates/branch-admin-layout/footer');
     
    }

    public function getEmployee(){
        $id = $this->input->post('id');
        if($id === null || $id === ''){
            return $this->response->status('id_null',400);
        }else{
            #validated
            $data = $this->UserModel->getBranchPersonnelProfile($id);
            if($data != 2){
                echo json_encode($data);
            }else{
                return $this->response->status('error',500);
            }
        }
    }

    public function getCustomer(){
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