<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_model extends MY_Model 
{
    public function __construct()
    {
        parent::__construct();

        $this->loadTable("productos");
    }
}

/* End of file Producto_model.php */
