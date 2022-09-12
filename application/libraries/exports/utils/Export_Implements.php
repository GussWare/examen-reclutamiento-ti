<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Export_Implements
{

    protected $context;

    public function __construct(Export_Interface $context)
    {
        $this->context = $context;
    }

    public function implement($columns, $data)
    {
        $this->context->set_columns($columns);
        $this->context->set_data($data);
        $this->context->make();
    }
}

/* End of file Export_Implements.php */
