<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Response
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function send($status, $data = array(), $output = OUTPUT_CONTENT_TYPE)
    {
       $this->CI->output->set_content_type($output) 
            ->set_status_header($status)
            ->set_output(json_encode($data));
    }
}
