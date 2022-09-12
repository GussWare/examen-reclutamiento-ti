<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('lang'))
{
	function lang($line)
	{
		$CI =& get_instance();
		$value = $CI->lang->line($line);
        $value = ($value) ? $value : $line;

		return $value;
	}
}

// ------------------------------------------------------------------------
/* End of file MY_language_helper.php */
/* Location: ./application/helpers/MY_language_helper.php */