<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Lukasoppermann\Httpstatus\Httpstatuscodes as HttpStatus;

class Reqres_Service
{
    protected $CI;
    protected $Reqres_Repository_Service;
    protected $Reqres_Remote_Service;
    protected $Reqres_Sync_Service;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->dto("Response_Dto");

        $this->CI->load->service("Reqres_Repository_Service", null, "Reqres_Repository_Service");
        $this->CI->load->service("Reqres_Remote_Service", null, "Reqres_Remote_Service");
        $this->CI->load->service("Reqres_Sync_Service", null, "Reqres_Sync_Service");

        $this->Reqres_Repository_Service = new Reqres_Repository_Service();
        $this->Reqres_Remote_Service = new Reqres_Remote_Service();
        $this->Reqres_Sync_Service = new Reqres_Sync_Service();
    }

    public function find_all()
    {
        $this->Reqres_Sync_Service->sync();

        $result = $this->CI->Reqres_Repository_Service->find_all();

        return $result;
    }

    public function create(UserReqres_Dto $user)
    {
        $response = new Response_Dto();

        $remote_response = $this->Reqres_Remote_Service->create($user);

        if (!$remote_response) {
            $response->code = HttpStatus::HTTP_BAD_REQUEST;
            $response->messages = array(lang("reqres_error_crear_usuario"));

            return $response;
        }

        $user->reqres_id = $remote_response->id;

        $this->Reqres_Repository_Service->create($user);

        $response->code = HttpStatus::HTTP_CREATED;
        $response->messages = array(lang("reqres_usuario_creado"));

        return $response;
    }

    public function update($id, $user)
    {
        $response = new Response_Dto();

        $remote_response = $this->Reqres_Remote_Service->update($user->reqres_id, $user);

        if (!$remote_response) {
            $response->code = HttpStatus::HTTP_BAD_REQUEST;
            $response->messages = array("reqres_error_editar_usuario");

            return $response;
        }

        $this->Reqres_Repository_Service->update($id, $user);

        $response->code = HttpStatus::HTTP_CREATED;
        $response->messages = array(lang("reqres_usuario_actualizado"));

        return $response;
    }

    public function delete($id, $user)
    {
        $response = new Response_Dto();

        $remote_response = $this->Reqres_Remote_Service->delete($user->reqres_id);

        if (false === $remote_response) {
            $response->code = HttpStatus::HTTP_BAD_REQUEST;
            $response->messages = array(lang("reqres_error_eliminar_usuario"));

            return $response;
        }

        $this->Reqres_Repository_Service->delete($id);

        $response->code = HttpStatus::HTTP_CREATED;
        $response->messages = array(lang("reqres_usuario_eliminado"));

        return $response;

    }
}

/* End of file Reqres_Service.php */
