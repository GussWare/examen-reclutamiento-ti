<?php 

class LanguageHook {

    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }


    public function load() {
        $lang = $this->CI->config->item('language');

        $this->CI->lang->load(FILE_LANGUAGE, $lang);
    }
}