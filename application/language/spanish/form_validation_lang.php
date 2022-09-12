<?php
/**
 * System messages translation for CodeIgniter(tm)
 *
 * @author	CodeIgniter community
 * @author	Iban Eguia
 * @copyright	Copyright (c) 2014-2019, British Columbia Institute of Technology (https://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$lang['form_validation_required']		= 'El campo {field} es obligatorio.';
$lang['form_validation_isset']			= 'El campo {field} debe contener un valor.';
$lang['form_validation_valid_email']		= 'El campo {field} debe contener un email válido.';
$lang['form_validation_valid_emails']		= 'El campo {field} debe contener todos los emails válidos.';
$lang['form_validation_valid_url']		= 'El campo {field} debe contener una URL válida.';
$lang['form_validation_valid_ip']		= 'El campo {field} debe contener una IP válida.';
$lang['form_validation_valid_base64']   = 'El campo {field} debe contener un Base64 válido.';
$lang['form_validation_min_length']		= 'El campo {field} debe ser de al menos {param} caracteres de longitud.';
$lang['form_validation_max_length']		= 'El campo {field} no puede superar los {param} caracteres de longitud.';
$lang['form_validation_exact_length']		= 'El campo {field} debe ser de exactamente {param} caracteres de longitud.';
$lang['form_validation_alpha']			= 'El campo {field} solo puede contener caracteres alfabéticos.';
$lang['form_validation_alpha_numeric']		= 'El campo {field} solo puede contener caracteres alfanuméricos.';
$lang['form_validation_alpha_numeric_spaces']	= 'El campo {field} solo puede contener caracteres alfanuméricos y espacios.';
$lang['form_validation_alpha_dash']		= 'El campo {field} solo puede contener caracteres alfanuméricos, guiones bajos y guiones.';
$lang['form_validation_numeric']		= 'El campo {field} solo puede contener números.';
$lang['form_validation_is_numeric']		= 'El campo {field} solo puede contener caracteres numéricos.';
$lang['form_validation_integer']		= 'El campo {field} debe contener un entero.';
$lang['form_validation_regex_match']		= 'El campo {field} no está en el formato correcto.';
$lang['form_validation_matches']		= 'El campo {field} no coincide con el campo {param}.';
$lang['form_validation_differs']		= 'El campo {field} debe ser distinto al campo {param}.';
$lang['form_validation_is_unique'] 		= 'El campo {field} debe contener un valor único.';
$lang['form_validation_is_natural']		= 'El campo {field} solo puede contener dígitos.';
$lang['form_validation_is_natural_no_zero']	= 'El campo {field} solo puede contener dígitos y debe ser mayor que cero.';
$lang['form_validation_decimal']		= 'El campo {field} debe contener un número decimal.';
$lang['form_validation_less_than']		= 'El campo {field} debe contener un número menor que {param}.';
$lang['form_validation_less_than_equal_to']	= 'El campo {field} debe contener un número menor o igual a {param}.';
$lang['form_validation_greater_than']		= 'El campo {field} debe contener un número mayor que {param}.';
$lang['form_validation_greater_than_equal_to']	= 'El campo {field} debe contener un número mayor o igual a {param}.';
$lang['form_validation_error_message_not_set']	= 'No se ha podido acceder al mensaje de error correspondiente para el campo {field}.';
$lang['form_validation_in_list']		= 'El campo {field} debe contener uno de estos: {param}.';



//agregado para plugin validation
$lang['validate_required'] = "* Este campo es obligatorio.";
$lang['validate_remote'] = "* Por favor, rellena este campo.";
$lang['validate_email'] = "* Por favor, escribe una dirección de correo válida.";
$lang['validate_url'] = "* Por favor, escribe una URL válida.";
$lang['validate_date'] = "* Por favor, escribe una fecha válida.";
$lang['validate_dateISO'] = "* Por favor, escribe una fecha (ISO) válida.";
$lang['validate_number'] = "* Por favor, escribe un número válido.";
$lang['validate_digits'] = "* Por favor, escribe sólo dígitos.";
$lang['validate_creditcard'] = "* Por favor, escribe un número de tarjeta válido.";
$lang['validate_equalTo'] = "* Por favor, escribe el mismo valor de nuevo.";
$lang['validate_extension'] = "* Por favor, escribe un valor con una extensión aceptada.";
$lang['validate_maxlength'] = "* Por favor, no escribas más de {0} caracteres.";
$lang['validate_minlength'] = "* Por favor, no escribas menos de {0} caracteres.";
$lang['validate_rangelength'] = "* Por favor, escribe un valor entre {0} y {1} caracteres.";
$lang['validate_range'] = "* Por favor, escribe un valor entre {0} y {1}.";
$lang['validate_max'] = "* Por favor, escribe un valor menor o igual a {0}.";
$lang['validate_min'] = "* Por favor, escribe un valor mayor o igual a {0}.";
$lang['validate_nifES'] = "* Por favor, escribe un NIF válido.";
$lang['validate_nieES'] = "* Por favor, escribe un NIE válido.";
$lang['validate_cifES'] = "* Por favor, escribe un CIF válido.";

// agregados para validaciones personalizadas
$lang['validate_curp'] = "* El campo curp no cuenta con un formato valido.";
$lang['validate_lettersonly'] = "* El campo solo debe tener letras, sin caracteres especiales.";
$lang['validate_lettersunderscore'] = "* El campo solo puede tener letras o guiones bajos.";
$lang['validate_is_natural_no_cero'] = "* Solo se puede tener numeros mayores que cero, sin decimales ni caracteres especiales.";
$lang['validate_integer'] = "* Solo se permiten números no enteros.";
$lang['validate_is_natural'] = "* Solo se puede tener numeros mayores que cero, sin decimales ni caracteres especiales.";
$lang['validate_number_sin_guion'] = "* El campo solo puede tener numeros enteros o decimales sin caracteres especiales.";

$lang['validate_number_sin_guion_no_zero'] = "* El campo solo puede tener numeros enteros o decimales sin caracteres especiales mayores a cero.";


$lang['is_unique_no_delete'] = "* El campo %s ya se encuentra registrado.";
$lang['is_unique'] = "* El campo %s ya se encuentra registrado.";
$lang['validate_format_rfc_moral'] = "* El campo %s no cumple con un formato valido.";


$lang['validate_rfc_moral'] = "* El campo rfc no cuenta con un formato valido.";
$lang['validate_greater_than'] = "* Por favor, escribe un valor mayor al campo {1}.";
$lang['validate_less_than'] = "* Por favor, escribe un valor menor al campo {1}.";


$lang['validate_date_now'] = "* El campo %s no cuenta con un formato de fecha valido o es mayor al día actual.";
$lang['validate_alphanumeric'] = "* Por favor, escribe solo letras, números y guiones bajos.";

$lang['validate_date_menor_a'] = "* El campo {1} debe contener una fecha menor al campo {2}.";
