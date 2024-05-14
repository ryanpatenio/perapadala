<?php


class BranchTransactionController extends CI_Controller{


    public function __construct()
    {
        parent::__construct();


         // Check if the user is logged in
         if (!$this->session->userdata('logged_in')) {
            // Redirect to login page
            redirect(base_url());
        }
    
        // Check if the user is admin or branch Personnel
        $job_title = $this->session->userdata('job_title');
        $user_role = $this->session->userdata('role');
        if ($user_role !== 'user' && $job_title !== 'BP') {
            // Show unauthorized access error or redirect to a different page
            show_error('Unauthorized access', 403);
        }


    }

    public function render_transaction_index(){

        $page = "allTransaction";

        
           if(!file_exists(APPPATH.'views/user/'.$page.'.php')){
            show_404();

           }
           $allDataTransactions = $this->BranchTransactionModel->getBranchTransactionsByEmployeeId($this->session->userdata['emp_id']);
           if($allDataTransactions !== 2){
            $data['all_branch_transactions'] = $allDataTransactions;
           }
          $data['sample'] = '';
   

        $this->load->view('templates/user-layout/header');
        $this->load->view('user/'.$page,$data);

        $this->load->view('templates/user-layout/modal');
        
        $this->load->view('templates/user-layout/footer');
    }

    public function printTransaction($id) {
        $page = 'printTransaction';
    
        if (!file_exists(APPPATH.'views/user/'.$page.'.php')) {
            show_404();
        }
    
       
       
        $transaction_data = $this->BranchTransactionModel->getTransactionData($id); // Replace 'Your_model' and 'getTransactionData' with appropriate names
    
        if (!$transaction_data) {
            show_404(); // If no data found for the provided ID, show 404 page
        }
    
        // Pass the transaction data to the view
        $data['transaction_data'] = $transaction_data;
    
        // Load the view
        $this->load->view('templates/user-layout/header');
        $this->load->view('user/'.$page, $data);
        $this->load->view('templates/user-layout/footer');
    }
    
    


    public function getFee(){
        
        $fee = $this->BranchTransactionModel->getPercentFee();
        if(empty($fee)){
            #no data found or theres no default value set in the charges table
            #return json null
            return $this->response->status('fee_null','400');
        }else{
            echo json_encode($fee);
        }
    }

    public function createTransaction(){
        $this->form_validation->set_rules('nameOfSender','Name Of Sender','required');
        $this->form_validation->set_rules('senderAddress','Sender Address','required');
        $this->form_validation->set_rules('nameOfReceiver','Name of Receiver','required');
        $this->form_validation->set_rules('senderAddress','Sender Address','required');

        $this->form_validation->set_rules('senderContact','Sender Contact Number','required');
        $this->form_validation->set_rules('receiverContact','Receiver Contact Number','required');

        $this->form_validation->set_rules('senderRelation','Sender Relation','required');
        $this->form_validation->set_rules('purpose','Purpose of Transaction','required');

        $this->form_validation->set_rules('amount','Amount','required');
        $this->form_validation->set_rules('percent','Percent Or Charges','required');
        $this->form_validation->set_rules('fee','Fees','required');

        $fee = $this->input->post('fee');

        if($fee === '' || $fee === null){
            return $this->response->status('fees_null',400);
        }elseif($this->form_validation->run() == FALSE){
            return $this->response->status(validation_errors(),400);
        }else{
            $data = $this->input->post();
            
            $insert = $this->BranchTransactionModel->createTransaction($data);

            if(!empty($insert)){
            //$this->session->set_flashdata('transaction_data', $data);

               echo json_encode(['message'=> 'success','id'=>$insert['transaction_id']]);
            }else{
                return $this->response->status('error',500);
            }
        }
      
    }

    public function checkMyCode(){
        $this->form_validation->set_rules('code','Transaction Code','required');

        if($this->form_validation->run() == FALSE){
            return $this->response->status('code_null',400);
        }else{
            $code = trim($this->input->post('code'));
            $data = $this->BranchTransactionModel->getTransactionDataByCode($code);

            if($data != 2){
                header('Content-Type: application/json');
                echo json_encode(['message'=> 'success','id'=>$data['transaction_id']]);
            }else{
                header('Content-Type: application/json');
                return $this->response->status('No_data_found',401);
            }
            
            
        }
    }

    public function claimTransaction(){
        $id = $this->input->post('id');
                // Check if ID is null or empty
            if ($id === null || $id === '') {
                // Return a JSON response with a status code of 400
                return $this->response->status('id_null',400);
            } else {
                #req into API MODEL
                $claim = $this->BranchTransactionModel->claimTransaction($id);
                if($claim !== 2){
                    #success
                    return $this->response->status('success',200);
                }else{
                    return $this->response->status('error',500);
                }
             
            }
    }

    public function getTransaction(){
        $id = $this->input->post('id');

        if($id === null || $id === ''){
            return $this->response->status('error_null',400);
        }else{
            #id not empty
            $data = $this->BranchTransactionModel->getTransactionData($id);
            if($data !== 2){
                #success
                echo json_encode($data);
            }else{
                #error
                return $this->response->status('error',400);
            }
        }
    }

    public function updateTransaction(){
        $this->form_validation->set_rules('sender_name','Sender Name','required');
        $this->form_validation->set_rules('sender_address','Sender Address','required');
        $this->form_validation->set_rules('receiver_name','receiver Name','required');
        $this->form_validation->set_rules('receiver_address','receiver address','required');
        $this->form_validation->set_rules('sender_contact','Sender Contact','required');
        $this->form_validation->set_rules('receiver_contact','Receiver Contact','required');

        if($this->form_validation->run() == FALSE){
            return $this->response->status(validation_errors(),400);
        }else{
            $data = $this->input->post();
            $customer_id = $data['customer_id'];
            $transaction_id = $data['trans_id'];
            $trans_detail_id = $data['trans_detail_id'];

            $trans_details_data = array(
                'receiver_name' => $data['receiver_name'],
                'receiver_contact' => $data['receiver_contact'],
                'receiver_address' => $data['receiver_address']

            );

            $customer_data = array(
                'name' => $data['sender_name'],
                'contact' => $data['sender_contact'],
                'address' => $data['sender_address']

            );

            if($customer_id === null || $customer_id === '' && $transaction_id === null || $transaction_id === '' && $trans_detail_id === null || $trans_detail_id == ''){
                #null important ID
                return $this->response->status('error_null',400);
            }else{

               $update = $this->BranchTransactionModel->updateTransaction($customer_data,$trans_details_data, $customer_id, $trans_detail_id);
               if($update != 2){
                return $this->response->status('success',200);
               }else{
                 return $this->response->status('error',500);
               }
            }

           
        }
    }

    public function viewTransaction(){
        $id = $this->input->post('id');

        if($id === null || $id === ''){
            return $this->response->status('id_null',400);
        }else{
            #id not empty
            $data = $this->BranchTransactionModel->getTransactionData($id);
            if($data !== 2){
                #success
                echo json_encode($data);
            }else{
                #error
                return $this->response->status('error',400);
            }
        }
    }

    public function getProfile(){
        $id = $this->input->post('id');

        if($id === null || $id === ''){
            return $this->response->status('id_null',400);
        }else{
           $data = $this->UserModel->getBranchPersonnelProfile($id);
           if($data != 2){
            echo json_encode($data);
           }else{
            return $this->response->status('error',500);
           }
        }
    }

    public function updateProfile(){
        $this->form_validation->set_rules('fname','First Name','required');
        $this->form_validation->set_rules('lname','Last Name','required');
        $this->form_validation->set_rules('email','E-mail','trim|required');
        $this->form_validation->set_rules('contact','Contact Number','required');
        $this->form_validation->set_rules('address','Address','required');

        if($this->form_validation->run() == FALSE){
            return $this->response->status('error_val',400);
        }else{
            #init data array
            $data = $this->input->post();

            #get the employee ID 
            $emp_id = $this->input->post('emp_id');

            #get the password
            $password = $this->input->post('pass');

            #check if not null Both
            if($emp_id === null || $emp_id === ''){
                #return Error
                return $this->response->status('null_id',400);
            }else{
                #not null proceed!
                #check the password if the owner change it
                if($password === null || $password === ''){
                    #user didn't change it
                    #set here a Data to To Insert
                    $dataUpdate = array(
                        'fname' => $data['fname'],
                        'lname' => $data['lname'],
                        'email' => $data['email'],
                        'contact' => $data['contact'],
                        'address' => $data['address']

                    );
                    #update
                    $update = $this->UserModel->updateBpProfile($dataUpdate,$emp_id);
                    if($update != 2){
                        #success
                        return $this->response->status('success',200);
                    }else{
                        #failed
                        return $this->response->status('error',500);
                    }
                }else{
                    #user change the password
                    $dataUpdate = array(
                        'fname' => $data['fname'],
                        'lname' => $data['lname'],
                        'email' => $data['email'],
                        'contact' => $data['contact'],
                        'address' => $data['address'],
                        'password' => password_hash($data['pass'],PASSWORD_DEFAULT)
                    );

                    #update it
                    $update = $this->UserModel->updateBpProfile($dataUpdate,$emp_id);
                    if($update != 2){
                        #success
                        return $this->response->status('success',200);
                    }else{
                        #failed
                        return $this->response->status('error',500);
                    }
                }
            }
        }
       
    }

    // Decryption function
    private function decryptData($encryptedData, $key) {
        // Decode the encrypted data from Base64
        $encryptedDataBinary = base64_decode($encryptedData);
        
        // Extract the IV (Initialization Vector) from the first 16 bytes of the encrypted data
        $iv = substr($encryptedDataBinary, 0, 16);
        
        // Extract the ciphertext (after the IV)
        $ciphertext = substr($encryptedDataBinary, 16);
        
        // Perform decryption using OpenSSL
        $decryptedData = openssl_decrypt($ciphertext, 'aes-128-cbc', $key, OPENSSL_RAW_DATA, $iv);
        
        // Return the decrypted data
        return $decryptedData;
    }
}