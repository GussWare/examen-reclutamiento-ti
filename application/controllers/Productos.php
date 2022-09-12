<?php

defined('BASEPATH') or exit('No direct script access allowed');

use Lukasoppermann\Httpstatus\Httpstatuscodes as HttpStatus;

class Productos extends MY_Controller
{
    protected $Producto_Repository_Service;

    public function __construct()
    {
        parent::__construct();

        $this->load->dto("Response_Dto");
        $this->load->dto("Producto_Dto");

        $this->load->service("Producto_Repository_Service", null, "Producto_Repository_Service");
        $this->Producto_Repository_Service = new Producto_Repository_Service();
    }

    public function index()
    {
        $result = $this->Producto_Repository_Service->find_all();

        $this->response->send(HttpStatus::HTTP_OK, $result);
    }

    public function create()
    {
        $this->load->validator("productos/Productos_Create_Validator");


        $response = new Response_Dto();
        $producto_validator = new Productos_Create_Validator();

        if ($producto_validator->validate() === false) {
            $response->code = HttpStatus::HTTP_BAD_REQUEST;
            $response->messages = $producto_validator->to_array();

            $this->response->send(HttpStatus::HTTP_BAD_REQUEST, $response);

            return;
        }

        $producto_dto = $this->input->post_to_dto(new Producto_Dto());
        $producto_dto = $this->Producto_Repository_Service->create($producto_dto);

        $response->code = HttpStatus::HTTP_CREATED;
        $response->messages = array(lang("producto_creado"));

        $this->response->send(HttpStatus::HTTP_CREATED, $response);
    }

    public function update()
    {
        $this->load->validator("productos/Productos_Update_Validator");

        $id_producto = $this->input->post("id_producto");

        $response = new Response_Dto();
        $producto_dto = $this->Producto_Repository_Service->find_by_id($id_producto);

        if (!$producto_dto) {
            $response->code = HttpStatus::HTTP_BAD_REQUEST;
            $response->messages = array(lang("producto_error_producto_no_encontrado"));

            $this->response->send(HttpStatus::HTTP_BAD_REQUEST, $response);

            return;
        }

        $producto_validator = new Productos_Update_Validator();

        if ($producto_validator->validate() === false) {
            $response->code = HttpStatus::HTTP_BAD_REQUEST;
            $response->messages = $producto_validator->to_array();

            $this->response->send(HttpStatus::HTTP_BAD_REQUEST, $response);

            return;
        }

        $producto_dto = $this->input->post_to_dto(new Producto_Dto());
        $producto_dto = $this->Producto_Repository_Service->update($id_producto, $producto_dto);

        $response->code = HttpStatus::HTTP_OK;
        $response->messages = array(lang("producto_actualizado"));

        $this->response->send(HttpStatus::HTTP_OK, $response);
    }

    public function delete()
    {
        $id_producto = $this->input->post("id_producto");

        $response = new Response_Dto();
        $producto_dto = $this->Producto_Repository_Service->find_by_id($id_producto);

        if (!$producto_dto) {
            $response->code = HttpStatus::HTTP_BAD_REQUEST;
            $response->messages = array(lang("producto_error_producto_no_encontrado"));

            $this->response->send(HttpStatus::HTTP_BAD_REQUEST, $response);

            return;
        }

        $this->Producto_Repository_Service->deleted($id_producto);

        $response->code = HttpStatus::HTTP_OK;
        $response->messages = array(lang("producto_eliminado"));

        $this->response->send(HttpStatus::HTTP_OK, $response);
    }
}

/* End of file Tienda.php */
