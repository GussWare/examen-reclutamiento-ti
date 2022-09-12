<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Producto_Repository_Service
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->model("Producto_model");
    }

    public function find_all()
    {
        $result = $this->CI->Producto_model->findAll();

        return $result;
    }

    public function find_by_id(int $id_producto)
    {
        $result = $this->CI->Producto_model->findByItem('id_producto', $id_producto);

        return $result;
    }

    public function create(Producto_Dto $producto)
    {
        $producto->fecha_registro = date("Y-m-d");

        $result = $this->CI->Producto_model->save($producto);

        return $result;
    }

    public function update(int $id_producto, Producto_Dto $producto)
    {
        $producto_db = $this->find_by_id($id_producto);

        if (!$producto_db) {
            return false;
        }

        $producto->fecha_registro = $producto_db->fecha_registro;
        $producto->fecha_actualizacion = date("Y-m-d H:i:s");

        $result = $this->CI->Producto_model->save($producto, $id_producto);

        return $result;
    }

    public function deleted(int $id_producto)
    {
        $producto_db = $this->find_by_id($id_producto);

        if (!$producto_db) {
            return false;
        }

        $result = $this->CI->Producto_model->remove($id_producto);

        return $result;

    }
}

/* End of file Producto_Repository_Service.php */
