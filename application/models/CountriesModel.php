<?php

class CountriesModel extends CI_Model{

    public function __construct(){
        parent::__construct();

        $this->load->database();
        $this->load->library('response');
      

    }  
    public function getCountries(){
        $data = $this->db->select('*')
            ->from('countries')
            ->order_by('name')
            ->get();
        
        if($data->num_rows() > 0 ){
            return $data->result();
        }
        return array();
    }

    public function addCountry($data){
        
        $insert = $this->db->insert('countries',$data);

        if($insert == 1){
            return 1;
        }
        return 2;
    }

    public function getCountryById($id){
        $data = $this->db->where('country_id',$id)
            ->get('countries');
        if($data->num_rows() > 0){
            return $data->row_array();
        }
        return 2;
    }

    public function updateCountry($data){
        $id = $data['upCountryId'];
        unset($data['upCountryId']);

        $update = $this->db->where('country_id',$id)
                ->update('countries',[
                    'name' => $data['upCountryName']

                ]);

            if($update){
                return 1;
            }else{
                return 2;
            }
    }


}