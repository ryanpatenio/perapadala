<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class LocationModel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('response');
        
    }

    public function fetchLocations(){
        $query = $this->db->select("l.location_id,c.name 'country_name',r.name 'region_name',l.province_name,l.city,l.street_name")
        ->from('locations l')
        ->join('regions r','l.region_id = r.region_id')
        ->join('countries c','r.country_id = c.country_id')
        ->order_by('c.name')
        ->get();

        if($query->num_rows() > 0){
            return $query->result(); 
        }
        return array();
    }

    public function noAssignLocation(){
        $query = $this->db->select("l.location_id,c.name 'country_name',r.name 'region_name',l.province_name,l.city,l.street_name")
        ->from('locations l')
        ->join('regions r','l.region_id = r.region_id')
        ->join('countries c','r.country_id = c.country_id')
        ->where('l.assign',0)
        ->order_by('c.name')
        ->get();

        if($query->num_rows() > 0){
            return $query->result(); 
        }
        return array();
    }

    public function addLocation($data){

        $insert = $this->db->insert('locations',$data);

        if($insert){
            return 1;
        }else{
            return 2;
        }


    }

    public function editLocationById($id){
        $query = $this->db->select('l.location_id, l.province_name, l.city, r.region_id, l.street_name, r.name as region_name')
                ->from('locations l')
                ->join('regions r','l.region_id = r.region_id')
                ->where('l.location_id',$id)
                ->get();
        if($query->num_rows() > 0){
            return $query->row_array();
        }
        return 2;
    }

    public function updateLocation($data){
        $id = $data['locationID'];
        unset($data['locationID']);

        $data =  array(
            'province_name' => $data['province'],
            'city' => $data['city'],
            'street_name' => $data['street'],
            'region_id' => $data['region']
        );

        $update = $this->db->where('location_id',$id)
                ->update('locations',$data);
        if($update){
            return 1;
        }else{
            return 2;
        }
    }
}