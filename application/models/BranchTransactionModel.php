<?php

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
      
        #change this if we done create a login 
        $emp_id = '2';


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
            'employee_id'=> $emp_id
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
                ->select('t.transaction_id, t.transaction_code, t.transaction_date, c.name AS senderName, c.contact AS senderContact, c.address AS senderAddress, td.receiver_name AS receiverName, td.receiver_address AS receiverAddress, td.receiver_contact AS receiverContact, td.amount, td.purpose, td.sender_relation')
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