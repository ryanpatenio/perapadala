<?php 

class CustomerModel extends CI_Model{

    public function __construct(){
        parent::__construct();

        $this->load->database();
     

    }

    public function fetchCustomersByBranch($branch_id){
        $result = $this->db->select('c.customer_id, t.transaction_id, td.transaction_details_id, c.name, t.transaction_date, t.transaction_code, t.status')
                ->from('transactions t')
                ->join('transaction_details td', 't.transaction_id = td.transaction_id')
                ->join('branches b', 't.branch_id = b.branch_id')
                ->join('customer c', 'c.customer_id = td.sender_customer_id')
                ->where('b.branch_id', $branch_id)
                ->get();
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return array();
        }
    }

    public function fetchAllCustomers(){
        $query = $this->db->select('*')
            ->from('customer')
            ->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return array();
        }
    }
  
    public function getCustomer($id){
        $query = $this->db->where('customer_id',$id)
            ->get('customer');
        if($query->num_rows() > 0){
            return $query->row_array();
        }else{
            return 2;
        }
    }

    public function updateCustomer($data,$customer_id){
       
        $query = $this->db->where('customer_id',$customer_id)
            ->update('customer',$data);

        if($query){
            return 1;
        }else{
            return 2;
        }

    }

    



}