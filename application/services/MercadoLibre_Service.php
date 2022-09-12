<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MercadoLibre_Service {

    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();  
        
        $this->CI->load->library("Curl", null, "Curl");
    }

    public function find_all()
    {
        $config = array(
            "url" => MERCADO_LIBRE_URL
        );

        $response = $this->CI->Curl->initialize($config)->call();

        return $response;
    }
}

/* End of file MercadoLibre_Service.php */
