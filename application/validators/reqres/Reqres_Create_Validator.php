<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . DIR_VALIDATORS . 'interfaces/Validator_Interface.php';

class Reqres_Create_Validator implements Validator_Interface
{

    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library("form_validation");
    }

    public function validate()
    {
        $this->CI->form_validation->set_rules("first_name", lang("reqres_first_name"), array(
            'required',
            'max_length[255]',
        ));

        $this->CI->form_validation->set_rules("last_name", lang("reqres_last_name"), array(
            'required',
            'max_length[255]',
        ));

        $this->CI->form_validation->set_rules("email", lang("reqres_email"), array(
            'required',
            'max_length[255]',
            'is_unique[reqres_users.email]',
        ));

        $this->CI->form_validation->set_rules("avatar", lang("reqres_avatar"), array(
            'required',
            'max_length[255]'
        ));

        $validate = $this->CI->form_validation->run();

        return $validate;

    }

    public function to_array()
    {
        $errors = $this->CI->form_validation->to_array();

        return $errors;
    }

}

/* End of file Validator_Interface.php */
