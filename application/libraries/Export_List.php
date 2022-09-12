<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once 'exports/utils/Export_Factory.php';
require_once 'exports/utils/Export_Implements.php';

class Export_List
{
    protected $CI;
    protected $columns;
    protected $data;
    protected $format;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->Export_Factory = new Export_Factory();
    }

    public function initialize(array $options)
    {
        foreach ($options as $key => $option) {
            if (property_exists($this, $key)) {
                $this->$key = $option;
            }
        }

        return $this;
    }

    public function make()
    {
        $context = $this->Export_Factory->factory($this->format);
        
        $exp_imp = new Export_Implements($context);
        $exp_imp->implement($this->columns, $this->data);
    }
}

/* End of file Export_List.php */
