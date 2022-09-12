<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('script_tag')) {
    function script_tag($src = '', $index_page = false)
    {
        $CI = &get_instance();
        $script_tag = '<script ';

        $script_tag .= 'src="' . $CI->config->base_url($src) . '" > ';

        $script_tag .= "</script>";

        return $script_tag;
    }
}

// ------------------------------------------------------------------------
/* End of file MY_language_helper.php */
/* Location: ./application/helpers/MY_language_helper.php */