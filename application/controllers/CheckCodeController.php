<?php


class CheckCodeController extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        #check auth
         $this->auth_library->check_login_USER_BP();
    }

    public function render($id){

        $page = "checkCode";

        
           if(!file_exists(APPPATH.'views/user/'.$page.'.php')){
            show_404();

           }
           $data['sample'] = 'data';
         
           $data['trans_data'] = $this->BranchTransactionModel->getTransactionData($id);
         
        $this->load->view('templates/user-layout/header');
        
        $this->load->view('user/'.$page,$data);
        $this->load->view('templates/user-layout/footer');
    }

}