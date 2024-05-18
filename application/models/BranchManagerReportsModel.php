<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BranchManagerReportsModel extends CI_Model{

    public function __construct()
    {
        parent::__construct();

        #Load Database
        $this->load->database();
    }

    public function branchIncomeToday($employee_id){
        $query = $this->db->select_sum('td.fee as branch_income')
            ->from('transactions t')
            ->join('transaction_details td', 't.transaction_id = td.transaction_id')
            ->join('branches b', 't.branch_id = b.branch_id')
            ->where('b.employee_id', $employee_id)
            ->where('DATE(t.transaction_date)', 'DATE(NOW())', FALSE)
            ->get();

        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return 2;
        }
    }

    public function branchIncomeThisMonth($employee_id){
        $query = $this->db->select_sum('td.fee as branch_income')
        ->from('transactions t')
        ->join('transaction_details td', 't.transaction_id = td.transaction_id')
        ->join('branches b', 't.branch_id = b.branch_id')
        ->where('b.employee_id', $employee_id)
        ->where('MONTH(t.transaction_date)', 'MONTH(CURRENT_DATE())', FALSE)
        ->where('YEAR(t.transaction_date)', 'YEAR(CURRENT_DATE())', FALSE)
        ->get();

        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return 2;
        }
    }

    public function branchCustomerToday(){
        $query = $this->db->select('COUNT(customer_id) as customer_count_today')
            ->from('customer')
            ->where('DATE(cust_date)', 'DATE(NOW())', FALSE)
            ->get();

        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return 2;
        }
    }

    public function handleBranchPersonnel($employee_id){
        $query = $this->db->select('COUNT(e.employee_id) as employee_count')
            ->from('employees e')
            ->join('branches b', 'e.branch_id = b.branch_id')
            ->where('b.employee_id', $employee_id)
            ->get();

        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return 2;
        }

    }
 
    public function recentTransactionThisDayInThisBranch(){
        $query = $this->db->select('t.transaction_id, t.transaction_code, c.name as customer_name, td.amount, td.fee, t.status, t.transaction_date')
            ->from('transactions t')
            ->join('transaction_details td', 't.transaction_id = td.transaction_id')
            ->join('customer c', 'td.sender_customer_id = c.customer_id')
            ->join('branches b', 't.branch_id = b.branch_id')
            ->where('b.employee_id', 11)
            ->where('DATE(t.transaction_date)', 'DATE(NOW())', FALSE)
            ->get();

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return array();
        }

    }


       #TO DO.....
       public function graphReportInThisBranch(){

       }
}