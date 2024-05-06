<?php

class jobModel extends CI_model{

    public function __construct(){
        parent::__construct();

        $this->load->database();
        $this->load->library('response');
      

    }   
    public function fetchJob(){
        $query = $this->db->select('*')
                ->from('job')
                ->get();

        if($query->num_rows() > 0){
            return $query->result();
        }
        return array();
    }

    public function fetchBM(){
        $query = $this->db->select('job_id,name,job_code')
                ->from('job')
                ->where('job_code = "BM"')
                ->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return array();
        }
    }


    public function addJob($data){

       $insert = $this->db->insert('job',$data);

       if($insert){
            return 1;
        }else{
            return 2;
        }
       

    }

    public function getJobById($id){
        $data = $this->db->where('job_id',$id)
        ->get('job');

        if($data->num_rows() > 0){
            return $data->row_array();
        }
        return array();
    }

    public function updateJob($data){
        $id = $data['upJobId'];
        unset($data['upJobId']);

        $update = $this->db->where('job_id',$id)
            ->update('job',
            [
                'name' => $data['upJobName']
                

            ]      
         );
         if($update){
            return 1;
         }else{
            return 2;
         }

    }



}