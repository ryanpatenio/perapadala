<?php

class AdminBranchController extends CI_Controller{

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('AdminBranchModel');
        $this->load->library('response');
    
    }

    public function addBranch(){
        $this->form_validation->set_rules('branchName','Branch Name','required');
        $this->form_validation->set_rules('location','Location','required');

        if($this->form_validation->run() == FALSE){
            return $this->response->status(validation_errors(),400);
        }else{
           
            $data = $this->input->post();
            $insert = $this->AdminBranchModel->addBranch($data);

            if($insert == 1){
                //success
                return $this->response->status('success',200);
            }else{
                //error
                return $this->response->status('error',500);
            }
           
        }
    }

    public function editBranch(){
        $id = $this->input->post('id');

        //check
        if($id === null || $id === ''){
            //return null error
            return $this->response->status('error_null',400);
        }else{
            $data = $this->AdminBranchModel->getBranchById($id);

            if($data != 2){
                //has Data
                echo json_encode($data);
            }else{
                return $this->response->status('error',500);
            }
           
        }
    }

    public function updateBranch(){
        $this->form_validation->set_rules('branch','Branch Name','required');
        $this->form_validation->set_rules('location','Location','required');

        if($this->form_validation->run() == FALSE){
            return $this->response->status(validation_errors(),400);
        }else{
            $data = $this->input->post();
            //echo json_encode($data);
            $update = $this->AdminBranchModel->updateBranch($data);
            if($update == 1){
                //success
                return $this->response->status('success',200);
            }else{
                return $this->response->status('error',500);
            }
        }

    }


}