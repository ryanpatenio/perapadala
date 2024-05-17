<?php

class JobController extends CI_controller{

    public function __construct(){

            parent::__construct();
            $this->load->library('response');
            $this->load->library('form_validation');
            $this->load->model('jobModel');

            #check auth
            $this->auth_library->check_login_ADMIN();
        
           
    }


    public function addJob(){
        $this->form_validation->set_rules('jobName', 'Job Name', 'required');
        $this->form_validation->set_rules('jobCode', 'Job Code', 'required');

            // Run form validation
            if ($this->form_validation->run() == FALSE) {
                // Form validation failed
                $this->response->status(validation_errors(),400);
            }

            // Form validation passed, proceed to insert data
            $data = array(
                'name' => $this->input->post('jobName'),
                'job_code' => $this->input->post('jobCode'),
                // Add more fields as needed
            );

           $insert = $this->jobModel->addJob($data);
           if($insert == 1){
            
            return $this->response->status('success',200);
           }else{
            return $this->response->status('error',500);
           }

    }   

    public function getJob(){

        $id = $this->input->post('id');

        if($id === null || $id == ''){
            return $this->response->status('error_null',400);
        }

        $data = $this->jobModel->getJobById($id);

        echo json_encode($data);
    }

    public function updateJob(){
        $this->form_validation->set_rules('upJobName','Job Name','required');
       # $this->form_validation->set_rules('upJobCode','Job COde','required');

        if ($this->form_validation->run() == FALSE) {
            // Form validation failed
            $this->response->status(validation_errors(),400);
        }else{

            $data = $this->input->post();

            $update = $this->jobModel->updateJob($data);

            if($update == 1){
                return $this->response->status('success',200);
            }else{
                return $this->response->status('error',400);
            }
        }

       
    }

}