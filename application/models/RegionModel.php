<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RegionModel extends CI_Model{

     public function __construct(){
        parent::__construct();

        $this->load->database();
        $this->load->library('response');
      

    }

    public function addRegion($data){
        $insert = $this->db->insert('regions',$data);

        if($insert){
            return 1;
        }else{
            return 2;
        }

    }

    public function fetchRegions(){
      $query = $this->db->select('r.region_id,r.name as region_name, c.name as country_name')
            ->from('regions r')
            ->join('countries c', 'r.country_id = c.country_id')
            ->get();

    if($query->num_rows() > 0){
        return $query->result();
    }
    return array();
       
        
    }

    public function getRegionById($id){
        $query = $this->db->select('r.region_id,c.country_id,r.name as region_name, c.name as country_name')
        ->from('regions r')
        ->join('countries c','r.country_id = c.country_id')
        ->where('r.region_id',$id)
        ->get();

        if($query->num_rows() > 0){
            return $query->row_array();
        }else{
            return array();
        }
    }

    public function updateRegion($data){
        $id = $data['regionID'];
        unset($data['regionID']);

        $data = array(
            'name' => $data['upRegion'],
            'country_id'=> $data['country']

        );

        $update = $this->db->where('region_id',$id)
                ->update('regions',$data);

        if($update){
            return 1;
        }else{
            return 2;
        }
    }
}