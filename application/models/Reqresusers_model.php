<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Reqresusers_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();

        $this->loadTable("reqres_users");
    }

}

/* End of file ReqresUsers_model.php */
