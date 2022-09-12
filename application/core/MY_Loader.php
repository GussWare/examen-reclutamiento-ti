<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Loader extends CI_Loader
{
    public function __construct()
    {
        parent::__construct();
    }

    public function service($class, $params = array())
    {
        return $this->_load_class(DIR_SERVICES, $class, $params);
    }

    public function dto($class, $params = array())
    {
        return $this->_load_class(DIR_DTO, $class, $params);
    }

    public function validator($class, $params = array())
    {
        return $this->_load_class(DIR_VALIDATORS, $class, $params);
    }

    public function _load_class($dir, $class, $params = NULL, $object_name = NULL)
    {
        // Get the class name, and while we're at it trim any slashes.
        // The directory path can be included as part of the class name,
        // but we don't want a leading slash
        $class = str_replace('.php', '', trim($class, '/'));

        // Was the path included with the class name?
        // We look for a slash to determine this
        if (($last_slash = strrpos($class, '/')) !== FALSE) {
            // Extract the path
            $subdir = substr($class, 0, ++$last_slash);

            // Get the filename from the path
            $class = substr($class, $last_slash);
        } else {
            $subdir = '';
        }

        $class = ucfirst($class);

        // Is this a stock library? There are a few special conditions if so ...
        if (file_exists(BASEPATH . $dir . '/' . $subdir . $class . '.php')) {
            return $this->_ci_load_stock_library($class, $subdir, $params, $object_name);
        }

        // Safety: Was the class already loaded by a previous call?
        if (class_exists($class, FALSE)) {
            $property = $object_name;
            if (empty($property)) {
                $property = strtolower($class);
                isset($this->_ci_varmap[$property]) && $property = $this->_ci_varmap[$property];
            }

            $CI = &get_instance();
            if (isset($CI->$property)) {
                log_message('debug', $class . ' class already loaded. Second attempt ignored.');
                return;
            }

            return $this->_ci_init_library($class, '', $params, $object_name);
        }

        // Let's search for the requested library file and load it.
        foreach ($this->_ci_library_paths as $path) {
            // BASEPATH has already been checked for
            if ($path === BASEPATH) {
                continue;
            }

            $filepath = $path . $dir . '/' . $subdir . $class . '.php';
            // Does the file exist? No? Bummer...
            if (!file_exists($filepath)) {
                continue;
            }

            include_once($filepath);
            return $this->_ci_init_library($class, '', $params, $object_name);
        }

        // One last attempt. Maybe the library is in a subdirectory, but it wasn't specified?
        if ($subdir === '') {
            return $this->_ci_load_library($class . '/' . $class, $params, $object_name);
        }

        // If we got this far we were unable to find the requested class.
        log_message('error', 'Unable to load the requested class: ' . $class);
        show_error('Unable to load the requested class: ' . $class);
    }
}
