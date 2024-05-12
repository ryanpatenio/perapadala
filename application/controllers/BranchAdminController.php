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
        $data['sample'] = 'data';


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
        $data['sample'] = 'data';


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
        $data['sample'] = 'data';


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


}