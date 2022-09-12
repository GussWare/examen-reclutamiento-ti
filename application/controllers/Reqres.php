<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Lukasoppermann\Httpstatus\Httpstatuscodes as HttpStatus;

class Reqres extends MY_Controller
{
    protected $Reqres_Service;
    protected $Reqres_Sync_Service;
    protected $Reqres_Repository_Service;

    public function __construct()
    {
        parent::__construct();

        $this->load->dto("Response_Dto");
        $this->load->dto("UserReqres_Dto");

        $this->load->service("Reqres_Service", null, "Reqres_Service");
        $this->load->service("Reqres_Repository_Service", null, "Reqres_Repository_Service");
        $this->load->service("Reqres_Sync_Service", null, "Reqres_Sync_Service");

        $this->Reqres_Service = new Reqres_Service();
        $this->Reqres_Sync_Service = new Reqres_Sync_Service();
        $this->Reqres_Repository_Service = new Reqres_Repository_Service();
    }

    public function index()
    {
        $response = $this->Reqres_Repository_Service->find_all();

        $this->response->send(HttpStatus::HTTP_OK, $response);
    }

    public function create()
    {
        $this->load->validator("reqres/Reqres_Create_Validator");

        $response = new Response_Dto();
        $reqres_validator = new Reqres_Create_Validator();

        if ($reqres_validator->validate() === false) {
            $response->code = HttpStatus::HTTP_BAD_REQUEST;
            $response->messages = $reqres_validator->to_array();

            $this->response->send(HttpStatus::HTTP_BAD_REQUEST, $response);

            return;
        }

        $reqres_dto = $this->input->post_to_dto(new UserReqres_Dto());
        $response = $this->Reqres_Service->create($reqres_dto);

        $this->response->send($response->code, $response);

    }

    public function update()
    {
        $this->load->validator("reqres/Reqres_Update_Validator");

        $id = $this->input->post("id");

        $response = new Response_Dto();
        $reqres_db = $this->Reqres_Repository_Service->find_by_id($id);

        if (!$reqres_db) {
            $response->code = HttpStatus::HTTP_BAD_REQUEST;
            $response->messages = array(lang("reqres_error_reqres_no_encontrado"));

            $this->response->send(HttpStatus::HTTP_BAD_REQUEST, $response);

            return;
        }

        $reqres_validator = new Reqres_Update_Validator();

        if ($reqres_validator->validate() === false) {
            $response->code = HttpStatus::HTTP_BAD_REQUEST;
            $response->messages = $reqres_validator->to_array();

            $this->response->send(HttpStatus::HTTP_BAD_REQUEST, $response);

            return;
        }

        $reqres_dto = $this->input->post_to_dto(new UserReqres_Dto());
        $reqres_dto->reqres_id = $reqres_db->reqres_id;
        $response = $this->Reqres_Service->update($id, $reqres_dto);

        $this->response->send($response->code, $response);

    }

    public function delete()
    {
        $id = $this->input->post("id");

        $response = new Response_Dto();
        $reqres_db = $this->Reqres_Repository_Service->find_by_id($id);

        if (!$reqres_db) {
            $response->code = HttpStatus::HTTP_BAD_REQUEST;
            $response->messages = array(lang("reqres_error_reqres_no_encontrado"));

            $this->response->send(HttpStatus::HTTP_BAD_REQUEST, $response);

            return;
        }

        $response = $this->Reqres_Service->delete($id, $reqres_db);

        $this->response->send($response->code, $response);

    }

    public function sync()
    {
        $response = $this->Reqres_Sync_Service->sync();

        $this->response->send(HttpStatus::HTTP_OK, $response);
    }
}

/* End of file User_Reqres.php */
