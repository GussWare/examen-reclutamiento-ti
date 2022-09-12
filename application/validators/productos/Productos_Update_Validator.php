<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . DIR_VALIDATORS . 'interfaces/Validator_Interface.php';

class Productos_Update_Validator implements Validator_Interface
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library("form_validation");
    }

    public function validate()
    {
        $this->CI->form_validation->set_rules("id_producto", lang("productos_id"), array(
            'required',
            'max_length[45]',
        ));

        $this->CI->form_validation->set_rules("nombre", lang("productos_nombre"), array(
            'required',
            'max_length[45]',
            'is_unique[productos.nombre.id_producto]',
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

/* End of file Productos_Update_Validator.php */
