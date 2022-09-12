<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


$config["export_format"] = array(
    "pdf" => array(
        "file_name" => 'PDF_Export.php',
        "class_name" => 'PDF_Export'
    ),
    "xml" => array(
        "file_name" => 'XML_Export.php',
        "class_name" => 'XML_Export'
    ),
    "csv" => array(
        "file_name" => 'CSV_Export.php',
        "class_name" => 'CSV_Export'
    )
);


/* End of file exports_format.php */
