<?php 



class AdminController extends CI_Controller{

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
        $data['sample'] = 'data';


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
        $data['sample'] = 'data';


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
        $data['sample'] = 'data';


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
        $data['sample'] = 'data';


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
        $data['sample'] = 'data';


     $this->load->view('templates/admin-layout/header');
     $this->load->view('templates/admin-layout/sidebar');
     $this->load->view('admin/'.$page,$data);
     $this->load->view('templates/admin-layout/footer');
    }

}