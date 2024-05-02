<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Response {

    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
    }

    public function status($message, $statusCode) {
        $this->CI->output
            ->set_content_type('application/json')
            ->set_status_header($statusCode)
            ->set_output(json_encode(['message' => $message]));
    }
}
