<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ${1:Controller} extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index() 
    {
        $params = array(
            "title" => lang('auth_title'),
        );

        $this->layout->view("sistema/${1:controller}/index_view", $params);
    }
}

/* End of file filename.php */
