<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Curl
{
    protected $url;
    protected $method;
    protected $fields;

    protected $status;
    protected $errors;

    public function __construct()
    {
        $this->method = "GET";
        $this->fields = array();
    }

    public function initialize($options = array())
    {
        foreach ($options as $key => $option) {
            if (property_exists($this, $key)) {
                $this->$key = $option;
            }
        }

        return $this;
    }

    public function call()
    {
        $ch = curl_init($this->url);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->method);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if (count($this->fields) > 0) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($this->fields));
        }

        $response = curl_exec($ch);

        curl_close($ch);

        return json_decode($response);
    }
}

/* End of file Curl.php */
