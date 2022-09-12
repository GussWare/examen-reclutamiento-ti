<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Reqres_Sync_Service {

    protected $CI;
    protected $Reqres_Repository_Service;
    protected $Reqres_Remote_Service;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->service("Reqres_Remote_Service", null, "Reqres_Remote_Service");
        $this->CI->load->service("Reqres_Repository_Service", null, "Reqres_Repository_Service");

        $this->Reqres_Repository_Service = new Reqres_Repository_Service();
        $this->Reqres_Remote_Service = new Reqres_Remote_Service();
    }

    public function sync()
    {
        $conta = $this->Reqres_Remote_Service->count();

        $response = $this->Reqres_Remote_Service->find_all(array(
            "per_page" => $conta
        ));

        $result = $this->Reqres_Repository_Service->create_batch($response->data);

        return $result;
    }
}

/* End of file Reqres_Sync_Service.php */
