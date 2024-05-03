<?php

class RegionController extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');      
        $this->load->library('response');
        $this->load->model('RegionModel');
    }

    public function addRegion(){
        $this->form_validation->set_rules('regionName','Region Name','required');
        $this->form_validation->set_rules('country','Country Name','required');

        if($this->form_validation->run() == FALSE){
            return $this->response->status(validation_errors(),400);
        }else{
           
            $data = array(
                'name' => $this->input->post('regionName'),
                'country_id'=>$this->input->post('country')

            );

            $insert = $this->RegionModel->addRegion($data);

           if($insert == 1){
            return $this->response->status('success',200);
           }else{
            return $this->response->status('error',400);
           }
        }
    }

    public function editRegion(){
      
        $id = $this->input->post('id');

        if($id === null || $id === ''){
            return $this->response->status('error_null',400);

        }else{
           $data = $this->RegionModel->getRegionById($id);
           echo json_encode($data);
        }
    }

    public function updateRegion(){
        $this->form_validation->set_rules('upRegion','Region Name','required');
        $this->form_validation->set_rules('country','Country Name','required');
       
        if($this->form_validation->run() == FALSE){
            return $this->response->status(validation_errors(),400);
        }else{
            $id = $this->input->post('regionID');

            if($id === null || $id === ''){
                return $this->response->status('error_null',401);
            }else{
               $data = $this->input->post();
              
               $update = $this->RegionModel->updateRegion($data);
               
               if($update == 1){
                     return $this->response->status('success',200);
               }else{
                    return $this->response->status('error',500);
               }
            }
        }
    }

}