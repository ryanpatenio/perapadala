<?php 


class UserController extends CI_Controller{

public function __construct()
{
    parent::__construct();

    
    
}
    
    public function index(){
           #page Name
           
           $page = "welcome"; 

           if(!file_exists(APPPATH.'views/user/'.$page.'.php')){
            show_404();

           }

           $data['title'] = 'Sample';

           $this->load->view('templates/user-layout/header');
           
           $this->load->view('user/'.$page,$data);
           $this->load->view('templates/user-layout/footer');


    }

}