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
        $query = $this->db->select_sum('td.fee','branch_income')
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
        $query = $this->db->select_sum('td.fee','branch_income')
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

    public function branchCustomerToday($employee_id){
       $query = $this->db->select('COUNT(c.customer_id) AS customer_count')
        ->from('transactions t')
        ->join('transaction_details td', 't.transaction_id = td.transaction_id')
        ->join('branches b', 't.branch_id = b.branch_id')
        ->join('customer c', 'td.sender_customer_id = c.customer_id')
        ->where('b.employee_id', $employee_id)
        ->where('DATE(t.transaction_date)', 'DATE(NOW())', FALSE)
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
 
    public function recentTransactionThisDayInThisBranch($employee_id){
        $query = $this->db->select('t.transaction_id, t.transaction_code, c.name as customer_name, td.amount, td.fee, t.status, t.transaction_date')
            ->from('transactions t')
            ->join('transaction_details td', 't.transaction_id = td.transaction_id')
            ->join('customer c', 'td.sender_customer_id = c.customer_id')
            ->join('branches b', 't.branch_id = b.branch_id')
            ->where('b.employee_id',$employee_id)
            ->where('DATE(t.transaction_date)', 'DATE(NOW())', FALSE)
            ->get();

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return array();
        }

    }


    #TO DO.....
    public function graphReportInThisBranch($emp_id){
        $query = $this->db->select('COUNT(c.customer_id) AS customer_count, SUM(td.fee) AS income, MONTHNAME(t.transaction_date) AS Month, DATE(t.transaction_date) AS year')
            ->from('transactions t')
            ->join('transaction_details td', 't.transaction_id = td.transaction_id')
            ->join('branches b', 't.branch_id = b.branch_id')
            ->join('customer c', 'td.sender_customer_id = c.customer_id')
            ->where('b.employee_id', $emp_id)
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