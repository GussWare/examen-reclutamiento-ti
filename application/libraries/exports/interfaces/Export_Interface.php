<?php
defined('BASEPATH') or exit('No direct script access allowed');

interface Export_Interface
{
     public function set_columns(Array $columns);
     public function set_data(Array & $data);
     public function make();
}

/* End of file Export_Interface.php */
