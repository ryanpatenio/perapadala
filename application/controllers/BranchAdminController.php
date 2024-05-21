<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BranchAdminController extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    
        // Load necessary helpers and libraries
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper('security');
        $this->load->library('upload');


        #check auth Branch Manager
        $this->auth_library->check_login_USER_BM();
    }
   
   

    public function render(){
        $page = "index";

        
        if(!file_exists(APPPATH.'views/branch-admin/'.$page.'.php')){
         show_404();

        }
      

        $data['transactions'] = $this->BranchManagerReportsModel->recentTransactionThisDayInThisBranch();


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

    public function printMe($transaction_id){
        $page = 'printme';
          
        if(!file_exists(APPPATH.'views/branch-admin/'.$page.'.php')){
            show_404();
   
           }
        
        $transaction_data = $this->BranchTransactionModel->getTransactionData($transaction_id); // Replace 'Your_model' and 'getTransactionData' with appropriate names
    
        if (!$transaction_data || $transaction_data === 2) {
            show_404(); // If no data found for the provided ID, show 404 page
        }
        if($transaction_id === null || $transaction_id === ''){
            show_404(); // If no data found for the provided ID, show 404 page
        }
    
        // Pass the transaction data to the view
        $data['transaction_data'] = $transaction_data;

        
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

   #profile
   public function changePass(){

    $this->form_validation->set_rules('currentPassword','Old Password','required');
    $this->form_validation->set_rules('newPassword','New Password','required');
    $this->form_validation->set_rules('re_Password','Re Enter Password','required');

    if($this->form_validation->run() == FALSE){
        return $this->response->status('validation_error',400);
    }else{
        $data = $this->input->post();
        $emp_id = $this->session->userdata['emp_id'];
        
        $currentPassword = $data['currentPassword'];
        $newPassword = $data['newPassword'];
        $oldPassword = $this->UserModel->getEmployeeCurrentPassword($emp_id);

        if ($oldPassword !== 2 && password_verify($currentPassword, $oldPassword->password)){
           #same Password
            $newData = array(
                'emp_id' => $emp_id,
                'newPass' => password_hash($newPassword,PASSWORD_DEFAULT)
            );
            $update = $this->UserModel->updateEmployeesPassword($newData);
            if($update !== 2){
                #success
                return $this->response->status('success',200);
            }else{
                #failed
                return $this->response->status('error',500);
            }

        }else{
          #not same password
          return $this->response->status('pass_failed',400);
        }
    }


   }
   

    public function uploadAvatar() {

        $this->form_validation->set_rules('fname', 'First Name', 'required|alpha');
        $this->form_validation->set_rules('lname', 'Last Name', 'required|alpha');

        if ($this->form_validation->run() == FALSE) {
            return $this->response->status('validation_errors', 400);
        } else {
            $first_name = $this->input->post('fname');
            $last_name = $this->input->post('lname');
            $emp_id = $this->session->userdata['emp_id'];

            $insert_data = array(
                'fname' => $this->security->xss_clean($first_name),
                'lname' => $this->security->xss_clean($last_name)
            );

                if (!empty($_FILES['my_avatar']['name'])) {
                    # Set up all configuration
                    $config['upload_path'] = './uploads/avatar/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['max_size'] = 5120; // 5MB in KB
                    $config['file_name'] = 'avatar_' . date('YmdHis');

                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('my_avatar')) {
                        # Error in uploading
                        $error = $this->upload->display_errors();
                        return $this->response->status($error, 400);
                    } else {
                        # Get the upload data
                        $data = $this->upload->data();
                        $file_name = $data['file_name'];
                        $insert_data['avatar'] = $file_name;

                        # Update session with new avatar filename
                        $this->session->set_userdata('avatar', $file_name);
                    }
                }

                # Send it into the model
                $upload = $this->UserModel->uploadAvatar($insert_data, $emp_id);
                if ($upload !== 2) {
                    # Success
                    $this->session->set_userdata('fname', $first_name);
                    $this->session->set_userdata('lname', $last_name);
                    $this->session->set_userdata('emp_name', $first_name . ' ' . $last_name);
                    return $this->response->status('success', 200);
                } else {
                    # Failed
                    return $this->response->status('error', 500);
                }
          }

    }


    ##REPORTS
    public function incomeThisDay(){
        #EMPLOYEE ID
        $employee_id = $this->session->userdata('emp_id');

        if(!$employee_id){
            $this->response->status('error',500);
            return;
        }

        $data = $this->BranchManagerReportsModel->branchIncomeToday($employee_id);
        if($data !== 2){
            if($data->branch_income == 'null' || $data->branch_income == null){
                $this->response->status('no_data',200);
                return;
            }
            echo json_encode($data);
            
        }else{
            #error
            return $this->response->status('error',500);
        }

        
    }

    public function incomeThisMonth(){
        #EMPLOYEE ID
        $employee_id = $this->session->userdata('emp_id');

        if(!$employee_id){
            $this->response->status('error',500);
            return;
        }

        $data = $this->BranchManagerReportsModel->branchIncomeThisMonth($employee_id);
        if($data !== 2){
            if($data->branch_income == 'null' || $data->branch_income == null){
                $this->response->status('no_data',200);
                return;
            }
            echo json_encode($data);
            
        }else{
            #error
            return $this->response->status('error',500);
        }

        
    }
    
    
    public function customerCountToday(){
        #EMPLOYEE ID
        $employee_id = $this->session->userdata('emp_id');

        if(!$employee_id){
            $this->response->status('error',500);
            return;
        }

        $data = $this->BranchManagerReportsModel->branchCustomerToday($employee_id);
        if($data !== 2){
            if($data->customer_count == 'null' || $data->customer_count == null){
                $this->response->status('no_data',200);
                return;
            }
            echo json_encode($data);
            
        }else{
            #error
            return $this->response->status('error',500);
        }

        
    }

    
    public function branchEmployeesCount(){
        #EMPLOYEE ID
        $employee_id = $this->session->userdata('emp_id');

        if(!$employee_id){
            $this->response->status('error',500);
            return;
        }

        $data = $this->BranchManagerReportsModel->handleBranchPersonnel($employee_id);
        if($data !== 2){
            if($data->employee_count == 'null' || $data->employee_count == null){
                $this->response->status('no_data',200);
                return;
            }
            echo json_encode($data);
            
        }else{
            #error
            return $this->response->status('error',500);
        }

        
    }

}