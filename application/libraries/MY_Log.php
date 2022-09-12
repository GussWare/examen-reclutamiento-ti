<?php

class MY_Log extends CI_Log
{
    public function __construct()
    {
        parent::__construct();
    }

    function write_log($level = 'error', $msg, $php_error = FALSE)
    {
        $result = parent::write_log($level, $msg, $php_error);

        if ($result == TRUE && strtoupper($level) == 'ERROR') {
            $this->send_email_admin($level, $msg);
            $this->save_bitacora($level, $msg);
        }

        return $result;
    }

    function send_email_admin($level, $msg) 
    {
        $message = "An error occurred: \n\n";
        $message .= $level . ' - ' . date($this->_date_fmt) . ' --> ' . $msg . "\n";

        $this->CI = &get_instance();
        $to = $this->CI->config->item('email_admin_address');
        $from_name = $this->CI->config->item('email_general_name');
        $from_address = $this->CI->config->item('email_general_address');

        $subject = 'An error has occured';
        
        $headers = "From: $from_name <$from_address>" . "\r\n";
        $headers .= 'Content-type: text/plain; charset=utf-8\r\n';

        @mail($to, $subject, $message, $headers);
    }

    function save_bitacora($level, $msg) 
    {

    }
}
