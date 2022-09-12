<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reqres_Repository_Service
{

    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->model("Reqresusers_model", "Reqresusers_model");
    }

    public function find_all()
    {
        $result = $this->CI->Reqresusers_model->findAll();

        return $result;
    }

    public function find_by_id(int $id)
    {
        $result = $this->CI->Reqresusers_model->findByItem("id", $id);

        return $result;
    }

    public function create($user)
    {
        $result = $this->CI->Reqresusers_model->save($user);

        return $result;

    }

    public function update($id, $user)
    {
        $user_db = $this->find_by_id($id);

        if (!$user_db) {
            return false;
        }

        $result = $this->CI->Reqresusers_model->save($user, $id);

        return $result;

    }

    public function delete($id)
    {
        $user_db = $this->find_by_id($id);

        if (!$user_db) {
            return false;
        }

        $result = $this->CI->Reqresusers_model->remove($id);

        return $result;

    }

    public function create_batch($data)
    {
        $this->CI->db->empty_table("reqres_users");

        foreach($data as $key => $value) {
            $data[$key]->reqres_id = $value->id;
        }

        $result = $this->CI->db->insert_batch("reqres_users", $data);

        return $result;
    }
}

/* End of file Reqres_Repository_Service.php */
