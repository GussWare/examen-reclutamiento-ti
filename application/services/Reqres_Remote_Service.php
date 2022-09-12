<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reqres_Remote_Service
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library("Curl", null, "Curl");
    }

    public function find_all(array $params)
    {
        $str_params = http_build_query($params);

        $config = array(
            "url" => REQRES_URL . "/users?" . $str_params,
            "method" => "GET",
        );

        $response = $this->CI->Curl->initialize($config)->call();

        return $response;
    }

    public function create($user)
    {
        $user = (array) $user;
        //unset($user["id"]);

        $config = array(
            "url" => REQRES_URL . "/users",
            "method" => "POST",
            "fields" => $user,
        );

        $response = $this->CI->Curl->initialize($config)->call();

        return $response;

    }

    public function update($id, $user)
    {
        $config = array(
            "url" => REQRES_URL . "/users/" . $id,
            "method" => "PUT",
            "fields" => (array) $user,
        );

        $response = $this->CI->Curl->initialize($config)->call();

        return $response;

    }

    public function delete($id)
    {
        $config = array(
            "url" => REQRES_URL . "/users/" . $id,
            "method" => "DELETE",
        );

        $response = $this->CI->Curl->initialize($config)->call();

        return $response;

    }

    public function count()
    {
        $params = array(
            "page" => 1,
            "per_page" => 1,
        );

        $response = $this->find_all($params);

        return $response->total;
    }
}

/* End of file Reqres_Service.php */
