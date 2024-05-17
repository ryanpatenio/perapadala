<?php

class locationController extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');      
        $this->load->library('response');
        $this->load->model('LocationModel');

         #check auth
         $this->auth_library->check_login_ADMIN();
    }

    public function addLocation(){
        $this->form_validation->set_rules('province','Province','required');
        $this->form_validation->set_rules('city','City','required');
        $this->form_validation->set_rules('street','Street','required');
        $this->form_validation->set_rules('region','Region','required');

        if($this->form_validation->run() == FALSE){
            return $this->response->status(validation_errors(),400);
        }else{
         
            $data = array(
                'province_name'=> $this->input->post('province'),
                'city'=> $this->input->post('city'),
                'region_id' => $this->input->post('region'),
                'street_name' => $this->input->post('street')
   
            );

            $insert = $this->LocationModel->addLocation($data);

            if($insert == 1){
                return $this->response->status('success',200);
            }else{
                return $this->response->status('error',500);
            }
            
        }
    }

    public function editLocation(){
        $id = $this->input->post('id');

        if($id === null || $id === ''){
            return $this->response->status('error_null',400);
        }else{
           $data = $this->LocationModel->editLocationById($id);

          if($data != 2){
            echo json_encode($data);
          }else{
            return $this->response->status('error',500);
          }
        }
        
    }

    public function updateLocation(){
        $this->form_validation->set_rules('province','Province','required');
        $this->form_validation->set_rules('city','City','required');
        $this->form_validation->set_rules('street','Street Name','required');
        $this->form_validation->set_rules('region','Region','required');

        if($this->form_validation->run() == FALSE){
            return $this->response->status(validation_errors(),400);
        }else{
            $id = $this->input->post('locationID');
            if($id === null || $id === ''){
                return $this->response-status('error_null',401);
            }else{
                $data = $this->input->post();
                
                $update = $this->LocationModel->updateLocation($data);
                
                if($update == 1){
                    return $this->response->status('success',200);
                }else{
                    return $this->response->status('error',500);
                }
            }
        }
    }
}
