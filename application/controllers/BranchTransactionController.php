<?php


class BranchTransactionController extends CI_Controller{

    public function render(){

        $page = "allTransaction";

        
           if(!file_exists(APPPATH.'views/user/'.$page.'.php')){
            show_404();

           }
           $data['sample'] = 'data';


        $this->load->view('templates/user-layout/header');
        $this->load->view('user/'.$page,$data);
        $this->load->view('templates/user-layout/footer');
    }

}