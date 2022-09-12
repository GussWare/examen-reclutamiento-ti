<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Export_Factory
{
    protected $CI;
    protected $formats;

    public function __construct()
    {
        $this->CI = & get_instance();
        $this->CI->config->load('export_format');

        $this->formats = $this->CI->config->item('export_format');
    }

    public function factory($type)
    {
        if(! isset($this->formats[$type])) {
            throw new Exception('No se encontro el formato a exportar en el archivo de configuración.');
        }

        $file_name  = $this->formats[$type]["file_name"];
        $class_name = $this->formats[$type]["class_name"];

        $path = APPPATH . "libraries/exports/{$file_name}";

        if(!file_exists($path)) {
            throw new Exception('No se encontro el archivo a exportar en la carpeta de librerias.');
        }

        require_once $path;

        $object_factory = new $class_name();
        
        if(!$object_factory || (!$object_factory instanceof $class_name)){
            throw new Exception('La fabrica no pudo crear el objeto de la clase a exportar.');
        } 

        return $object_factory;
    }
}

/* End of file Export_Factory.php */
