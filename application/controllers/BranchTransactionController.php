<?php


class BranchTransactionController extends CI_Controller{


    public function __construct()
    {
        parent::__construct();


    }

    public function render(){

        $page = "allTransaction";

        
           if(!file_exists(APPPATH.'views/user/'.$page.'.php')){
            show_404();

           }
           $data['sample'] = 'data';


        $this->load->view('templates/user-layout/header');
        $this->load->view('user/'.$page,$data);
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