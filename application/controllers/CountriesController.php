<?php 


class CountriesController extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');      
        $this->load->library('response');
        $this->load->model('CountriesModel');
    }

    public function addCountry(){
        $this->form_validation->set_rules('country_name','Country Name','required');
       
        if($this->form_validation->run() == FALSE){
            return $this->response->status(validation_errors(),400);
        }else{
            //no errors

            $data = array(
                'name' => $this->input->post('country_name')

            );
            $insert = $this->CountriesModel->addCountry($data);

           if($insert == 1){
            return $this->response->status('success',200);
           }else{
            return $this->response->status('error',400);
           }
            
        }
    }


    public function editCountry(){
        $id = $this->input->post('id');
        
        if($id === null || $id === ''){
            return $this->response->status('error_null',400);
        }

        $data = $this->CountriesModel->getCountryById($id);

        if($data != 2){
            echo json_encode($data);
        }else{
            return $this->response->status('error',400);
        }
    }

    public function updateCountry(){
        $this->form_validation->set_rules('upCountryName','Country Name','required');

        if($this->form_validation->run() == FALSE){
            return $this->response->status(validation_errors(),400);
        }
        $id = $this->input->post('upCountryId');

        if($id === null || $id === ''){
            //error
        }else{  

            $data = $this->input->post();

            $update = $this->CountriesModel->updateCountry($data);

            if($update == 1){
                return $this->response->status('success',200);
            }else{
                return $this->response->status('error',400);
            }

        }

       


    }

}