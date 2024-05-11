<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->load->helper('security');
    }

    public function user_login_process() {
        // Form validation rules
        $this->form_validation->set_rules('email', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
    
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload login view with validation errors
            return $this->response->status('error_null_form_validations', 400);
        } else {
            // Validation passed, attempt login
            $email = $this->input->post('email');
            $password = $this->input->post('password');
    
            // Retrieve user from the database by email
            $user = $this->UserModel->get_user_by_username($email);
    
            if ($user && password_verify($password, $user->password)) {
                // Login successful, set session data and redirect to dashboard
                #job title 1=Branch Manager 2 = Branch Personnel
                $user_data = array(
                    'emp_id' => $user->employee_id,
                    'emp_email' => $user->email,
                    'emp_name'=> $user->fname.' '.$user->lname,
                    'job_title'=>$user->job_id,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($user_data);
                return $this->response->status('success', 200);
            } else {
                // Login failed, reload login view with error message
                return $this->response->status('Invalid', 400);
            }
        }
    }
    
    
    
    public function logout() {
        // Destroy session
        $this->session->sess_destroy();
        
        return $this->response->status('success',200);
        
    }
    
}
