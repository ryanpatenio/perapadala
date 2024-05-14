<?php

class BranchAdminController extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    
        // Load necessary helpers and libraries
        $this->load->helper('url');
        $this->load->library('session');
    
        // Check if the user is logged in
        if (!$this->session->userdata('logged_in')) {
            // Redirect to login page
            redirect(base_url());
        }
    
        // Check if the user is admin or branch manager
        $user_role = $this->session->userdata('job_title');
        if ($user_role !== 'admin' && $user_role !== 'BM') {
            // Show unauthorized access error or redirect to a different page
            show_error('Unauthorized access', 403);
        }
    }
    

    public function render(){
        $page = "index";

        
        if(!file_exists(APPPATH.'views/branch-admin/'.$page.'.php')){
         show_404();

        }
      

        $data['sample'] = 'data';


     $this->load->view('templates/branch-admin-layout/header');
     $this->load->view('templates/branch-admin-layout/sidebar');
     $this->load->view('branch-admin/'.$page,$data);
     $this->load->view('templates/branch-admin-layout/footer');
    }

    public function branchEmployees_index(){
        $page = "branchEmployees";

        
        if(!file_exists(APPPATH.'views/branch-admin/'.$page.'.php')){
         show_404();

        }
        $branch_id = $this->session->userdata('branch_id');
        if(!$branch_id){
            $data['employees'] = '';
        }
        $data['employees'] = $this->EmployeesModel->fetchMyEmployeesByBranch($branch_id);


        $this->load->view('templates/branch-admin-layout/header');
        $this->load->view('templates/branch-admin-layout/sidebar');
        $this->load->view('branch-admin/'.$page,$data);
        $this->load->view('templates/branch-admin-layout/footer');
     
    }

    public function branchCustomers_index(){
        $page = "branchCustomers";

        
        if(!file_exists(APPPATH.'views/branch-admin/'.$page.'.php')){
         show_404();

        }
        $branch_id = $this->session->userdata('branch_id');

        if(!$branch_id){
            $data['customers'] = '';
        }
        
        $data['customers'] = $this->CustomerModel->fetchCustomersByBranch($branch_id);


        $this->load->view('templates/branch-admin-layout/header');
        $this->load->view('templates/branch-admin-layout/sidebar');
        $this->load->view('branch-admin/'.$page,$data);
        $this->load->view('templates/branch-admin-layout/footer');
     
    }

    public function branchTransactions_index(){
        $page = "branchTransactions";

        
        if(!file_exists(APPPATH.'views/branch-admin/'.$page.'.php')){
         show_404();

        }
        $branch_id = $this->session->userdata('branch_id');

        if(!$branch_id){
            $data['transactions'] = '';
        }
        
        $data['transactions'] = $this->CustomerModel->fetchCustomersByBranch($branch_id);

        $this->load->view('templates/branch-admin-layout/header');
        $this->load->view('templates/branch-admin-layout/sidebar');
        $this->load->view('branch-admin/'.$page,$data);
        $this->load->view('templates/branch-admin-layout/footer');
     
    }

    public function  branchMyProfile_index(){
        $page = "profile";

        
        if(!file_exists(APPPATH.'views/branch-admin/'.$page.'.php')){
         show_404();

        }
        $data['sample'] = 'data';


        $this->load->view('templates/branch-admin-layout/header');
        $this->load->view('templates/branch-admin-layout/sidebar');
        $this->load->view('branch-admin/'.$page,$data);
        $this->load->view('templates/branch-admin-layout/footer');
     
    }

    public function getEmployee(){
        $id = $this->input->post('id');
        if($id === null || $id === ''){
            return $this->response->status('id_null',400);
        }else{
            #validated
            $data = $this->UserModel->getBranchPersonnelProfile($id);
            if($data != 2){
                echo json_encode($data);
            }else{
                return $this->response->status('error',500);
            }
        }
    }

    public function getCustomer(){
        $id = $this->input->post('id');

        if($id === null || $id === ''){
            return $this->response->status('id_null',400);
        }else{
            $data = $this->CustomerModel->getCustomer($id);
            if($data != 2){
                echo json_encode($data);
            }else{
                return $this->response->status('error',500);
            }
        }
    }

    public function updateCustomer(){
        $this->form_validation->set_rules('customer_name','Name','required');
        $this->form_validation->set_rules('address','Address','required');
        $this->form_validation->set_rules('contact','Contact','required');

        if($this->form_validation->run() == FALSE){
            return $this->response->status('validation_error',400);
        }else{
            $data = $this->input->post();
            $customer_id = $data['customer_id'];
            $dataToUpdate = array(
                'name' => $data['customer_name'],
                'contact' => $data['contact'],
                'address' => $data['address']

            );

            $update = $this->CustomerModel->updateCustomer($dataToUpdate,$customer_id);
            if($update != 2){
                #success
                return $this->response->status('success',200);
            }else{
                return $this->response->status('error',500);
            }
        }
    }

    public function addBMTransaction(){
        $this->form_validation->set_rules('nameOfSender','Name Of Sender','required');
        $this->form_validation->set_rules('senderAddress','Sender Address','required');

        $this->form_validation->set_rules('nameOfReceiver','Name of Receiver','required');
        $this->form_validation->set_rules('receiverAddress','Receiver Address','required');

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

    public function getTransaction(){
        $id = $this->input->post('id');

        if($id === null || $id === ''){
            return $this->response->status('id_null');
        }else{
            $branch_id = $this->session->userdata['branch_id'];
            if(!$branch_id){
                #branch id not found
                return $this->response->status('error',500);
            }else{
                #success
                $data = $this->BranchTransactionModel->getBranchTransactionByBranch_ID_trans_ID($branch_id,$id);
                echo json_encode($data);
            }
        }
    }

   public function updateBMTransaction(){
        $this->form_validation->set_rules('name','Sender Name','required');
        $this->form_validation->set_rules('address','Sender Address','required');
        $this->form_validation->set_rules('receiver_name','Receiver Name','required');
        $this->form_validation->set_rules('receiver_address','Receiver Address','required');
        $this->form_validation->set_rules('contact','Sender Contact','required');
        $this->form_validation->set_rules('receiver_contact','Receiver Contact','required');
        $this->form_validation->set_rules('relation','Relation','required');
        $this->form_validation->set_rules('purpose','Purpose Of Transaction','required');
        $this->form_validation->set_rules('amount','Amount','required');

        if($this->form_validation->run() == FALSE){
            return $this->response->status('validation_false',400);
        }else{
            $data = $this->input->post();
            $fee = $this->input->post('fee');
            $trans_id  = $this->input->post('transaction_id');
            $customer_id = $this->input->post('customer_id');
            $td_id = $this->input->post('transaction_details_id');

            if($fee === null || $fee === '' && $trans_id === null || $trans_id === '' && $customer_id === null || $customer_id === '' || $td_id === null || $td_id === ''){
                #fee is null
                return $this->response->status('id_null',400);
            }else{
                #not null
                //echo json_encode($data);
                $update = $this->BranchTransactionModel->updateBranchTransactionBM($data);
                if($update != 2){
                    #success
                    return $this->response->status('success',200);
                }else{
                    return $this->response->status('error',500);
                }
            }
            
        }

   }

}