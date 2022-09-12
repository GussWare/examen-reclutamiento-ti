<?php

class MY_Form_validation extends CI_Form_validation
{
    public function __construct($rules = array())
    {
        parent::__construct();
    }

    public function to_array() 
    {
        $errors = array();
        $error_array = $this->error_array();

        foreach($error_array AS $error) {
            $errors[] = $error;
        }

        return $errors;
    }

    /**
     * Metodo que se encarga de validar una curp 
     * 
     * @access public
     * @example BADD-110313-H-CM-LNS-0-9 curp valida
     * @param string $string
     * @return boolean true|false
     */
    public function validate_curp($string)
    {
        $this->set_message(lang("validate_curp"));
        $string = str_replace("-", "", $string);
        if (strlen($string) != 18) {
            return FALSE;
        }
        $patron = "/[A-Z]{1}[AEIOU][A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$/";
        return $this->regex_match($string, $patron);
    }

    /**
     * Metodo que se encarga de validar unicamente el formato del rfc de una perosona moral,
     * este formato consta de 12 caracteres en total, los primeros 3 caracteres alfabeticos correspondientes a las 
     * letras iniciales de la razon social 6 caracteres numericos correspondientes al año de alta o modificacion de la razon social y
     * y  los ultimos 3 caracteres son compuestos por 2 de la homoclave mas 1 del sello verificador
     * 
     * @access public
     * @example AAS-070817-SPA RFC valido
     * @link http://todoconta.com/que-es-el-rfc-y-como-se-determina/ Descripcion de como se compone un RFC tanto para personas morales como fisicas
     * @return boolean true|false
     */
    public function validate_format_rfc_moral($string)
    {
        $this->set_message(lang("validate_format_rfc_moral"));
        $string = strtoupper(trim($string));

        if (strlen($string) != 14) {
            return false;
        }

        $aString = explode('-', $string);

        if (count($aString) != 3) {
            return false;
        }

        list($razonSocial, $fecha, $homoClaveSello) = $aString;

        if ((!parent::alpha($razonSocial)) || (strlen($razonSocial) != 3)) {
            return false;
        }

        if ((!parent::numeric($fecha)) || (strlen($fecha) != 6)) {
            return false;
        }

        if ((!parent::alpha_numeric($homoClaveSello)) || (strlen($homoClaveSello) != 3)) {
            return false;
        }

        return true;
    }

    /**
     * Metodo que se encarga de validar que solo se pueda usar letras y underscore
     *
     * @access	public
     * @param	string cString
     * @example hola|hola_mundo|hola_mundo_hola casos aceptados
     * @return	boolean true|false
     */
    public function alpha_underscore($string)
    {
        $patron = "/^([a-z_])+$/i";
        return $this->regex_match($string, $patron);
    }

    /**
     * Metodo que se encarga de validar que solo se pueda usar letras, numeos y underscore
     *
     * @access	public
     * @param	string cString
     * @example hola|hola_mundo|hola_mundo_hola casos aceptados
     * @return	boolean true|false
     */
    public function alpha_numeric_underscore($string)
    {
        $patron = "/^([a-z0-9_])+$/i";
        return $this->regex_match($string, $patron);
    }

    /**
     * Metodo que se encarga de validar que el campo sea mayo al campo especificado
     *
     * @access	public
     * @param	string str valor del campo
     * @param string $field campo con el que se va a comparar
     * @return	boolean true|false
     */
    public function greater_than_field($str, $field)
    {
        $field = $this->CI->input->post($field);
        if (!is_numeric($field)) {
            return false;
        }
        return parent::greater_than($str, $field);
    }

    /**
     * Metodo que se encarga de validar que el campo sea mayo al campo especificado
     *
     * @access	public
     * @param	string cString
     * @example hola|hola_mundo|hola_mundo_hola casos aceptados
     * @return	boolean true|false
     */
    public function less_than_field($str, $field)
    {
        $field = $this->CI->input->post($field);
        if (!is_numeric($field)) {
            return false;
        }
        return parent::less_than($str, $field);
    }

    /**
     * Metodo que se encarga de validar si un registro se encuentra repetido, unicamente hace la validacion con registros
     * que no cuentan un borrado logico
     * 
     * @param string $str valor del campo del formulario
     * @param string $field Cadena de texto compuesta por el nombre de la tabla y por el campo a validar
     * @return boolean resultaod de la comparacion
     */
    public function is_unique_no_delete($str, $field)
    {
        $explo = explode('.', $field);

        if (count($explo) == 2) {
            list($table, $field) = $explo;
        }

        if (count($explo) == 3) {
            list($table, $field, $id) = $explo;
        }

        if (count($explo) == 4) {
            list($table, $field, $id, $case) = $explo;

            if ($case === "uppercase") {
                mb_strtoupper(trim($str), 'UTF-8');
            }

            if ($case === "lowercase") {
                mb_strtolower(trim($str), 'UTF-8');
            }
        }


        $this->CI->db->from($table);
        $this->CI->db->where($field, trim($str));
        $this->CI->db->where("bBorradoLogico", NO);

        if (count($explo) >= 3) {
            $idPost = $this->CI->input->post($id, true);
            $this->CI->db->where_not_in($id, $idPost);
        }

        $query = $this->CI->db->get();

        return $query->num_rows() === 0;
    }


    /**
     * Metodo que sobreescribe al is_unique anterior
     * @param type $str
     * @param type $field
     * @return type
     */
    public function is_unique($str, $field)
    {

        $explo = explode('.', $field);

        if (count($explo) == 2) {
            list($table, $field) = $explo;
        }

        if (count($explo) == 3) {
            list($table, $field, $id) = $explo;
        }

        if (count($explo) == 4) {
            list($table, $field, $id, $case) = $explo;

            if ($case === "uppercase") {
                mb_strtoupper(trim($str), 'UTF-8');
            }

            if ($case === "lowercase") {
                mb_strtolower(trim($str), 'UTF-8');
            }
        }


        $this->CI->db->from($table);
        $this->CI->db->where($field, trim($str));

        if (count($explo) >= 3) {
            $idPost = $this->CI->input->post($id, true);
            $this->CI->db->where_not_in($id, $idPost);
        }

        $query = $this->CI->db->get();


        return $query->num_rows() === 0;
    }

    public function is_habilitado_no_borrado($str, $field)
    {
        $explo = explode('.', $field);
        list($table, $id) = $explo;


        $this->CI->db->from($table);
        $this->CI->db->where($id, $str);
        $this->CI->db->where("bHabilitado", SI);
        $this->CI->db->where("bBorradoLogico", NO);

        $query = $this->CI->db->get();

        return $query->num_rows() > 0;
    }

    public function is_habilitado($str, $field)
    {
        $explo = explode('.', $field);
        list($table, $id) = $explo;

        $this->CI->db->from($table);
        $this->CI->db->where($id, $str);
        $this->CI->db->where("bHabilitado", SI);

        $query = $this->CI->db->get();

        return $query->num_rows() > 0;
    }

    public function is_no_borrado($str, $field)
    {
        $explo = explode('.', $field);
        list($table, $id) = $explo;

        $this->CI->db->from($table);
        $this->CI->db->where($id, $str);
        $this->CI->db->where("bBorradoLogico", NO);

        $query = $this->CI->db->get();


        return $query->num_rows() > 0;
    }

    public function is_existe($str, $field)
    {
        $explo = explode('.', $field);
        list($table, $id) = $explo;

        $this->CI->db->from($table);
        $this->CI->db->where($id, $str);

        $query = $this->CI->db->get();

        return $query->num_rows() > 0;
    }

    public function validate_date($str, $field)
    {
        $this->set_message(lang("validate_date"));
        $arr = explode("-", $str);

        if (count($arr) == 3) {
            $y = $arr[0];
            $m = $arr[1];
            $d = $arr[2];

            if (is_numeric($y) && is_numeric($m) && is_numeric($d)) {
                return checkdate($m, $d, $y);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function validate_date_now($str, $field)
    {
        if ($this->validate_date($str, $field)) {
            return (strtotime($str) <= strtotime(date("Y-m-d")));
        } else {
            return false;
        }
    }

    public function validate_date_menor_a($str, $field)
    {
        if ($this->validate_date($str, $field)) {
            return (strtotime($str) < strtotime($this->CI->input->post($field)));
        } else {

            return false;
        }
    }

    public function number_sin_guion($str, $field)
    {
        return (bool)preg_match('/^[0-9]*\.?[0-9]+$/', $str);
    }

    public function number_sin_guion_no_zero($str, $field)
    {
        if (!preg_match('/^[0-9]*\.?[0-9]+$/', $str)) {
            return FALSE;
        }

        if ($str == 0) {
            return FALSE;
        }
    }
}

// END Form Validation Class

/* End of file MY_Form_validation.php */
/* Location: ./application/libraries/MY_Form_validation.php */
