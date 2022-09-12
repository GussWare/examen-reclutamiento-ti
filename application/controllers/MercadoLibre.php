<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

use Lukasoppermann\Httpstatus\Httpstatuscodes as HttpStatus;


class MercadoLibre extends MY_Controller {

    protected $MercadoLibre_Service;

    public function __construct()
    {
        parent::__construct();

        $this->load->service('MercadoLibre_Service', null, 'MercadoLibre_Service');

        $this->MercadoLibre_Service = new MercadoLibre_Service();
    }

    public function index()
    {
        $response = $this->MercadoLibre_Service->find_all();

        $this->response->send(HttpStatus::HTTP_OK, $response);
    }
}


/* End of file MercadoLibre.php */
