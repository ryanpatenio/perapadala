<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BranchTransactionModel extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        date_default_timezone_set('Asia/Manila');
    }

    public function getPercentFee(){
        $query = $this->db->where('is_default',1)
            ->get('charges');

        if($query->num_rows() > 0){
            return $query->row_array();
        }else{
            return array();
        }
    }

    public function createTransaction($data){
      
        #session employee_id 
        $emp_id = $this->session->userdata('emp_id');


        #customer Data To insert
        $dataCustomer = array(
            'name' => $data['nameOfSender'],
            'contact' => $data['senderContact'],
            'address' => $data['senderAddress']
        );

        #generate transaction code
        $transactionCode = $this->generateRandomCodeWithDate();

        #data to insert in transaction Table
        $dataTransaction = array(
            'transaction_code' => $transactionCode,
            'percent' => $data['percent'],
            'transaction_date' => date('Y-m-d H:i:s'),          
            'employee_id'=> $emp_id,
            'branch_id' => $this->session->userdata['branch_id']
        );

       
        $insertCustomer = $this->db->insert('customer',$dataCustomer);
        if($insertCustomer){
            #get the ID
            $customerID = $this->db->insert_id();

            $insertTransaction = $this->db->insert('transactions',$dataTransaction);
            if($insertTransaction){
                #assuming success
                #get the ID of transaction inserted
                $trans_id = $this->db->insert_id();

                #get transData
               
                
                 #data to insert in transaction details
                    $transactionDetailsData = array(
                        'sender_customer_id' => $customerID,
                        'amount' => $data['amount'],
                        'receiver_name' => $data['nameOfReceiver'],
                        'receiver_address' => $data['receiverAddress'],
                        'receiver_contact' => $data['receiverContact'],
                        'fee' => $data['fee'],
                        'sender_relation' => $data['senderRelation'],
                        'purpose' => $data['purpose'],
                        'transaction_id' => $trans_id
                    );
                #insert in transaction details
                $insert_trans_detail = $this->db->insert('transaction_details',$transactionDetailsData);

                $transData = $this->getTransactionData($trans_id);
                    if($insert_trans_detail){
                        return $transData;
                    }else{
                        #fails to insert transaction details
                        return 2;
                    }

                
            }else{
                #fails to insert transaction table
                return 2;
            }


            
        }else{
            #fails to insert customer table
            return 2;
        }
      
       
         
    }

    public function getTransactionData($trans_id){
        $query = $this->db
                ->select('t.transaction_id,td.transaction_details_id,td.sender_customer_id,t.status,t.transaction_claimed, t.transaction_code, t.transaction_date, c.name AS senderName, c.contact AS senderContact, c.address AS senderAddress, td.receiver_name AS receiverName, td.receiver_address AS receiverAddress, td.receiver_contact AS receiverContact, td.amount, td.purpose, td.sender_relation,td.fee')
                ->from('transactions t')
                ->join('transaction_details td', 't.transaction_id = td.transaction_id')
                ->join('customer c', 'c.customer_id = td.sender_customer_id')
                ->where('t.transaction_id', $trans_id)
                ->get();

        if($query->num_rows() > 0){
            return $query->row_array();
        }else{
            return 2;
        }
    }

    public function getTransactionDataByCode($code){
        $query = $this->db
                ->select('t.transaction_id,t.status, t.transaction_code, t.transaction_date, c.name AS senderName, c.contact AS senderContact, c.address AS senderAddress, td.receiver_name AS receiverName, td.receiver_address AS receiverAddress, td.receiver_contact AS receiverContact, td.amount, td.purpose, td.sender_relation')
                ->from('transactions t')
                ->join('transaction_details td', 't.transaction_id = td.transaction_id')
                ->join('customer c', 'c.customer_id = td.sender_customer_id')
                ->where('t.transaction_code', $code)
                ->get();

        if($query->num_rows() > 0){
            return $query->row_array();
        }else{
            return 2;
        }
    }
    #id of transaction table# let set into 1 means claimed
    public function claimTransaction($id){
        $update = $this->db->where('transaction_id',$id)
        ->update('transactions',['status' => 1,'transaction_claimed'=>date('Y-m-d H:i:s')]);
        if($update){
            return 1;
        }
        return 2;
    }

    public function getBranchTransactionsByEmployeeId($emp_id){
        $result = $this->db->select('t.transaction_id, t.transaction_code, c.name, td.amount, t.transaction_date, CONCAT(e.fname, " ", e.lname) AS employee_incharge')
                  ->from('employees e')
                  ->join('branches b', 'e.branch_id = b.branch_id')
                  ->join('transactions t', 'e.employee_id = t.employee_id')
                  ->join('transaction_details td', 't.transaction_id = td.transaction_id')
                  ->join('customer c', 'c.customer_id = td.sender_customer_id')
                  ->where('e.employee_id', $emp_id)
                  ->get();
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return 2;
        }         

    }
    public function updateTransaction($custData,$trans_details_data, $cust_id, $trans_detail_id){
        #update the customer Table First
        $updateCustomer = $this->db->where('customer_id',$cust_id)
                ->update('customer',$custData);
        
                if($updateCustomer){
                    $updateTrans_details = $this->db->where('transaction_details_id',$trans_detail_id)
                    ->update('transaction_details',$trans_details_data);
                    if($updateTrans_details){
                        return 1;
                    }else{
                        #failed to update Transaction
                        return 2;
                    }
                }else{
                    #failed to update customer
                    return 2;
                }
        
       
    }

    public function getBranchTransactionByBranch_ID_trans_ID($branch_id,$transaction_id){
        $query =   $this->db->select([
                      't.transaction_id',
                      't.transaction_code',
                      't.transaction_date',
                      'c.name as customer_name',
                      'c.contact',
                      'c.address',
                      'c.customer_id',
                      'td.receiver_name',
                      'td.receiver_address',
                      'td.receiver_contact',
                      'td.purpose',
                      'td.sender_relation',
                      'b.branch_name',
                      'CONCAT(e.fname, " ", e.lname) as employee_incharge',
                      'td.amount',
                      'td.fee',
                      't.status',
                      'td.transaction_details_id'
                  ])
              ->from('transactions t')
              ->join('transaction_details td', 't.transaction_id = td.transaction_id')
              ->join('branches b', 't.branch_id = b.branch_id')
              ->join('customer c', 'c.customer_id = td.sender_customer_id')
              ->join('employees e', 'e.employee_id = t.employee_id')
              ->where('b.branch_id', $branch_id)
              ->where('t.transaction_id',$transaction_id)
              ->get();

          if($query->num_rows() > 0){
              return $query->row_array();
          }else{
              return array();
          }

    }

    public function updateBranchTransactionBM($data){
        $transaction_id = $data['transaction_id'];
        $customer_id = $data['customer_id'];
        $td_id = $data['transaction_details_id'];

        //unset
        unset($data['transaction_id']);
        unset($data['customer_id']);
        unset($data['transaction_details_id']);

        $customerData = array(
            'name' => $data['name'],
            'address' => $data['address'],
            'contact' => $data['contact']

        );

        $trans_details_Data = array(
            'receiver_name' => $data['receiver_name'],
            'receiver_contact' => $data['receiver_contact'],
            'receiver_address' => $data['receiver_address'],
            'sender_relation' => $data['relation'],
            'purpose' => $data['purpose'],
            'amount' => $data['amount'],
            'fee' => $data['fee']

        );

        $updateCustomer = $this->db->where('customer_id',$customer_id)
                ->update('customer',$customerData);
        if($updateCustomer){
            #success
            $updateTrans_details = $this->db->where('transaction_details_id',$td_id)
                ->update('transaction_details',$trans_details_Data);
            if($updateTrans_details){
                return 1;
            }else{
                return 2;
            }
        }else{
            return 2;
        }

    }


   public function generateRandomCodeWithDate() {
        $code = '';
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $digits = '0123456789';
    
        // Generate three random letters
        for ($i = 0; $i < 3; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        // Add a dash
        $code .= '-';
    
        // Generate three random digits
        for ($i = 0; $i < 3; $i++) {
            $code .= $digits[rand(0, strlen($digits) - 1)];
        }
    
        // Add a dash
        $code .= '-';
    
        // Generate three random letters
        for ($i = 0; $i < 3; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        // Add a dash
        $code .= '-';
    
        // Append current date (YYMMDD) to ensure uniqueness
        $code .= date('ym');

        // Add a dash
        $code .= '-';

        $code .= date('hi');

    
        return $code;
    }
    
 
}