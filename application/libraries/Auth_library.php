<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_library {

    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->library('session');
        $this->CI->load->helper('url');
    }

    public function check_login_ADMIN() {
        // Check if the user is logged in
        if (!$this->CI->session->userdata('logged_in')) {
            redirect(base_url('admin-login'));
            exit();
        }

        // Check if the user has the correct role
        $userRole = $this->CI->session->userdata('role');
        if ($userRole !== 'SUPER_ADMIN' && $userRole !== 'SUB_ADMIN') {
            // Redirect to a different page or show an unauthorized access error
            show_error('Unauthorized access', 403);
        }
    }

    public function check_login_USER_BP(){
         // Check if the user is logged in
         if (!$this->CI->session->userdata('logged_in')) {
            // Redirect to login page
            redirect(base_url());
            exit();
        }
    
        // Check if the user is admin or branch manager
        $user_role =$this->CI->session->userdata('job_title');
        if ($user_role !== 'BP') {
            // Show unauthorized access error or redirect to a different page
            show_error('Unauthorized access', 403);
            exit();
        }
    }

    public function check_login_USER_BM(){
        // Check if the user is logged in
        if (!$this->CI->session->userdata('logged_in')) {
           // Redirect to login page
           redirect(base_url());
           exit();
       }
   
       // Check if the user is admin or branch manager
       $user_role =$this->CI->session->userdata('job_title');
       if ($user_role !== 'BM') {
           // Show unauthorized access error or redirect to a different page
           show_error('Unauthorized access', 403);
       }
   }

}
