<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
       

    }

    public function index() {
        // Your admin dashboard logic here
  
        $page = "index";

         #check auth
         $this->auth_library->check_login_ADMIN();
        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['recentTransactionsThisDay'] = $this->AdminReportsModel->recentTransactionThisDay();


        $this->load->view('templates/admin-layout/header');
        $this->load->view('templates/admin-layout/sidebar');
        $this->load->view('admin/'.$page,$data);
        $this->load->view('templates/admin-layout/footer');
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


    
}
