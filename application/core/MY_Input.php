<?php  


class MY_Input extends CI_Input {

    public function __construct()
    {
        parent::__construct();
    }

    public function post_to_dto($vm) 
    {
        foreach($vm AS $key => $item){
            if(isset($_POST[$key])) {
                $vm->$key = $this->post($key); 
            }
        }

        return $vm;
    }

    public function get_to_dto($vm) 
    {
        foreach($vm AS $key => $item){
            if(isset($_GET[$key])) {
                $vm->$key = $this->get($key); 
            }
        }

        return $vm;
    }
}