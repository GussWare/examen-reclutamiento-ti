<?php

defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('spaces_to_character')) {

    function spaces_to_character($str)
    {
        $new_string = replace_all_match($str, "\t");

        return $new_string;
    }
}

if(!function_exists('replace_all_match')) {

    function replace_all_match($str) 
    {
        $str = str_replace('\t', "", $str);
        $str = str_replace('\r', "\r", $str);
        $str = str_replace('\n', "\n", $str);
        $str = str_replace(' ', " ", $str);

        return $str;
    }
}

/* End of file MY_string_helper.php */
