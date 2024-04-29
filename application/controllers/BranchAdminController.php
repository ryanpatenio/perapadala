<?php

class BranchAdminController extends CI_Controller{

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