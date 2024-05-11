<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_user_by_username($email) {
        // Query the database to get user by username
        $query = $this->db->get_where('employees', array('email' => $email));
        return $query->row();
    }

}
