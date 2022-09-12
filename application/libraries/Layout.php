<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{

    private $layout;
    private $CI;

    public function __construct()
    {
        $this->CI = & get_instance();
        
        $this->layout = LAYOUT_DEFAULT . LAYOUT_SISTEMA;
    }

    public function set_layout($layout = '')
    {
        $this->layout = $layout;

        return $this;
    }

    public function view($view = '', $params = array()) 
    {
        $params_layout = array("content_layout" => '');

        if($view) {
            $params_layout['content_layout'] = $this->CI->load->view($view, $params, true);
        }

        $this->CI->load->view($this->layout, $params_layout);

        return $this;
    }
}
