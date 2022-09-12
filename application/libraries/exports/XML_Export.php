<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'interfaces/Export_Interface.php';


class XML_Export implements Export_Interface
{
    protected $columns;
    protected $data;

    public function set_columns($columns)
    {
        $this->columns = $columns;
    }

    public function set_data(&$data)
    {
        $this->data = &$data;
    }

    public function make()
    {
        $domDocument = new DOMDocument('1.0', 'utf-8');
        $domDocument->formatOutput = true;

        $list = $domDocument->createElement('list');
        $domDocument->appendChild($list);

        foreach($this->data as $value) {
            $row = $domDocument->createElement('row');
            $row = $list->appendChild($row);

            foreach($this->columns as $column) {
                if(array_key_exists($column, $value)) {
                    $val = $domDocument->createElement($column, $value[$column]);
                    $row->appendChild($val);
                }
            }
        }
        
        header('Content-disposition: attachment; filename=export.xml');
        header("Content-Type:text/xml");

        echo $domDocument->saveXML();
    }
}

/* End of file XML_export.php */
