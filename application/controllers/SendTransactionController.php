<?php

class SendTransactionController extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

         #check auth Branch Manager
         $this->auth_library->check_login_USER_BP();
    }

    public function render(){

        $page = "sendTransaction";

        
           if(!file_exists(APPPATH.'views/user/'.$page.'.php')){
            show_404();

           }
           $data['sample'] = 'data';


        $this->load->view('templates/user-layout/header');
        $this->load->view('user/'.$page,$data);
        $this->load->view('templates/user-layout/footer');
    }
}