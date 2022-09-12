<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once  APPPATH . DIR_VALIDATORS . 'interfaces/Validator_Interface.php';

class Productos_Create_Validator implements Validator_Interface
{

    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library("form_validation");
    }

    public function validate()
    {
        $this->CI->form_validation->set_rules("nombre", lang("productos_nombre"), array(
            'required',
            'max_length[45]',
            'is_unique[productos.nombre]',
        ));

        $this->CI->form_validation->set_rules("descripcion", lang("productos_descripcion"), array(
            'required',
            'max_length[255]',
        ));

        $this->CI->form_validation->set_rules("precio", lang("productos_precio"), array(
            'required',
            'max_length[255]',
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
