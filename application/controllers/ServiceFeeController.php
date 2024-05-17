<?php


class ServiceFeeController extends CI_Controller{

    public function __construct()
    {
            parent::__construct();
             #check auth
             $this->auth_library->check_login_ADMIN();

       
    }

    public function addFee(){

        $this->form_validation->set_rules('serviceCharge','Service Charge','required');
        $this->form_validation->set_rules('this_def','Default Field','required');

        if($this->form_validation->run() == FALSE){
            return $this->response->status(validation_errors(),400);
        }else{

            $data = $this->input->post();

            $data2 = array(
                'percent' => $data['serviceCharge'],
                'is_default' => $data['this_def']
            );
         

            $checkDefaultVal = $this->ServiceFeeModel->checkIfHasDefaultVal();
            #if 0 means no def val and if 1 has
            $status = 0;
            $is_insert = 0;

            #if the user create new service charge that is not default we will set the "is default" data
            $is_def = $data['this_def'];

            if($checkDefaultVal != 101){
                #has default val get
                #lets update the get default val
                $id = $checkDefaultVal;
                $status = 1;
                $insert = $this->ServiceFeeModel->addFee($data2,$status,$id,$is_def);
                
                if($insert == 1){
                    return $this->response->status('success',200);
                }else{
                    return $this->response->status('error',500);
                }
              
            }else{

                 $id = $checkDefaultVal;
                 $status = 0;
                 $insert = $this->ServiceFeeModel->addFee($data2,$status,$id,$is_def);
                
                if($insert == 1){
                    return $this->response->status('success',200);
                }else{
                    return $this->response->status('error',500);
                }
                
                
            }
           // echo 'Laputs';
            //return $this->response->status('error_lapus',500);

        }

    }

    public function getFee(){
        $id = $this->input->post('id');

        if($id === null || $id === ''){
            return $this->response->status('error_null',400);
        }else{
            
            $data = $this->ServiceFeeModel->getFeeById($id);
            if($data != 2){
                echo json_encode($data);
            }else{
                return $this->response->status('error',500);
            }
        }
    }

    public function updateFee(){
        $this->form_validation->set_rules('serviceCharge','Service Fee','required');
        $this->form_validation->set_rules('is_default','Selected Default','required');

        if($this->form_validation->run() == FALSE){
            return $this->response->status(validation_errors(),400);
        }else{

            $data = $this->input->post();
            $id = $data['id'];

            unset($data['id']);
            $toUpdate = array(
                'percent' => $data['serviceCharge'],
                'is_default' => $data['is_default']
            );

            if($id === null || $id === ''){
                return $this->response('error_null',401);
            }else{

                    
                $old_default = $data['old_default'];
                $selected_default = $data['is_default'];

                    #condition if the same nothing changes only the name or etc.
                    if($selected_default == $old_default){
                            #nothing change
                            #update only the name
                            $update = $this->ServiceFeeModel->updateFeeWithNoDefault($toUpdate,$id);
                            if($update != 2){
                                return $this->response->status('success',200);
                            }
                            
                    }else{
                            #expected theres a changes in the selected default
                            #we must get the ID of the data in the table has a default value of 1
                            $check = $this->ServiceFeeModel->checkIfHasDefaultVal();
                            if($check != 101){
                                #get the ID
                                $old_ID = $check;
                                $update = $this->ServiceFeeModel->updateFeeWithDefault1($toUpdate,$id,$old_ID);
                                if($update == 1){
                                    return $this->response->status('success',200);
                                }
                            }else{
                                #update also 
                                $update = $this->ServiceFeeModel->updateFeeWithNoDefault($toUpdate,$id);
                                if($update != 2){
                                    return $this->response->status('success',200);
                                }
                            }
                    }


            }
         
           
        }
    }
    

}