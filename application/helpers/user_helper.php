<?php

if (!function_exists('get_user')) {
    function get_user($item = null)
    {
        $user   = (isset($_SESSION["USER"])) ?  $_SESSION["USER"] : null;

        if(!$item) {
            return $user;
        }

        return isset($user->$item) ? $user->$item : null; 
    }
}


if(!function_exists('set_user')) {
    function set_user($user) {
        user_destroy();

        $_SESSION['user'] = $user;
    }
}


if(!function_exists('user_destroy')) {
    function user_destroy() 
    {
        if(isset($_SESSION['USER'])) {
            unset($_SESSION['USER']);
        }
    }
}