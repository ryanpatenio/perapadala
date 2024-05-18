<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceFeeModel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }

    public function fetchServiceCharge(){

        $query = $this->db->order_by('is_default', 'DESC')
            ->get('charges');

        if($query->num_rows() > 0 ){
            return $query->result();
        }else{
            return array();
        }
    }

    public function checkIfHasDefaultVal(){
        $query = $this->db->where('is_default',1)
            ->get('charges');

        if($query->num_rows() > 0){
            #already has a default set value in the database so that we must update this
            $data = $query->row_array();
            $id = $data['charge_id'];
            return $id;
        }else{
            #no found is Default data is 1
            return 101;
        }
    }

    public function addFee($data,$status,$id,$is_def){

        if($status == 1){
            #has value to update
            #insert new data
            $query   = $this->db->insert('charges',$data);
           
            #update the old default val
            if($is_def == '0'){
                #no need to update

            }else{
                $update = $this->db->where('charge_id',$id)
                ->update('charges',['is_default'=> 0]);
            }
          
            
            return 1; 
        }else{
            #no val to update
            $query   = $this->db->insert('charges',$data);
            return 1;
        }
        return 2;
     
    }

    #(id) of charge table selected data
    public function getFeeById($id){

        $query = $this->db->where('charge_id',$id)
            ->get('charges');

        if($query->num_rows() > 0){
            return $query->row_array();
        }else{
            return 2;
        }
    }

    #update method
    public function updateFeeWithDefault1($data,$id,$old_id){
        $query = $this->db->where('charge_id',$id)
            ->update('charges',$data);

        #update
        $update = $this->db->where('charge_id',$old_id)
            ->update('charges',['is_default'=>0]);
       
        return 1;
      
        
    }
    #no changes in the service charge default select option
    public function updateFeeWithNoDefault($data,$ID){
        $query = $this->db->where('charge_id',$ID)
            ->update('charges',$data);
        if($query){
            return 1;
        }else{
            return 2;
        }
    }

}