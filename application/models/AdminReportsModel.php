<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminReportsModel extends CI_Model{

    public function __construct()
    {
        parent::__construct();

        #Load Database
        $this->load->database();
    }

    public function incomeThisDay(){
        $query = $this->db->select_sum('td.fee','income_this_day')
            ->from('transactions t')
            ->join('transaction_details td', 't.transaction_id = td.transaction_id')
            ->where('DATE(t.transaction_date)', 'DATE(NOW())', FALSE)
            ->get();

        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return 2;
        }
    }

    public function incomeThisMonth(){
        $query = $this->db->select_sum('td.fee','income_this_month')
            ->from('transactions t')
            ->join('transaction_details td', 't.transaction_id = td.transaction_id')
            ->where('MONTH(t.transaction_date)', 'MONTH(CURRENT_DATE())', FALSE)
            ->where('YEAR(t.transaction_date)', 'YEAR(CURRENT_DATE())', FALSE)
            ->get();

        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return 2;
        }

        
    }

    public function countOfCustomerThisYear(){
        $query =$this->db->select('COUNT(customer_id) as customer_count')
            ->from('customer')
            ->where('YEAR(cust_date)', 'YEAR(CURRENT_DATE())', FALSE)
            ->get();


            if($query->num_rows() > 0){
                return $query->row();
            }else{
                return 2;
            }
    }
    public function countOfAllEmployees(){
        $query = $this->db->select('COUNT(employee_id) as employees_count')
            ->from('employees')
            ->where('employee_status !=', 0)
            ->get();

        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return 2;
        }
    }

    public function countOfAllBranches(){
        $query = $this->db->select('COUNT(branch_id) as branches_count')
            ->from('branches')
            ->get();
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return 2;
        }
    }


    public function recentTransactionThisDay(){
        $query = $this->db->select('t.transaction_id, t.transaction_code, c.name as customer_name, td.amount, td.fee, b.branch_name, t.status, t.transaction_date')
            ->from('transactions t')
            ->join('transaction_details td', 't.transaction_id = td.transaction_id')
            ->join('customer c', 'td.sender_customer_id = c.customer_id')
            ->join('branches b', 't.branch_id = b.branch_id')
            ->where('DATE(t.transaction_date)', 'DATE(NOW())', FALSE)
            ->get();
            
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return array();
        }
    }

    #TO DO...
    public function graphReports(){
        $query = $this->db->select('COUNT(c.customer_id) AS customer_count, SUM(td.fee) AS income, MONTHNAME(t.transaction_date) AS Month, DATE(t.transaction_date) AS year')
            ->from('transactions t')
            ->join('transaction_details td', 't.transaction_id = td.transaction_id')
            ->join('customer c', 'td.sender_customer_id = c.customer_id')
            ->where('YEAR(t.transaction_date)', 'YEAR(CURRENT_DATE())', FALSE)
            ->group_by('MONTHNAME(t.transaction_date)')
            ->order_by('DATE(t.transaction_date)', 'ASC')
            ->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return array();
        }
    }
}