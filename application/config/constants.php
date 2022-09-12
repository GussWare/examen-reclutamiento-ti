<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


/*
 |--------------------------------------------------------------------------
| Constantes del sistema
|--------------------------------------------------------------------------
|
| Constantes utilizados para el sistema
|
*/

defined("SI") OR define("SI", 1);
defined("NO") OR define("NO", 0);

defined("DIR_APLICACION") OR define("DIR_APLICACION",  "codeigniter-mundial-football");
defined("DOMINIO_APLICACION") OR define("DOMINIO_APLICACION", getenv("CI_DOMINIO_APLICACION"));


defined("LAYOUT_DEFAULT") OR define("LAYOUT_DEFAULT", "layouts/default/");
defined("LAYOUT_AUTH_SLIDER") OR define("LAYOUT_AUTH_SLIDER", "layouts/default/layout_auth_view");
defined("LAYOUT_AUTH_FORM") or define("LAYOUT_AUTH_FORM", "layouts/default/layout_auth_recuperar_view");
defined("LAYOUT_SISTEMA") OR define("LAYOUT_SISTEMA", "layout_view");

defined("DIR_SERVICES") OR define("DIR_SERVICES", "services/");
defined("DIR_DTO") OR define("DIR_DTO", "dto/");
defined("DIR_VALIDATORS") OR define("DIR_VALIDATORS", "validators/");
defined("FILE_LANGUAGE") OR define("FILE_LANGUAGE", "app");
defined("OUTPUT_CONTENT_TYPE") OR define("OUTPUT_CONTENT_TYPE", 'application/json');

defined("ACTION_DEFAULT") OR define("ACTION_DEFAULT", 'index');
defined("ACTION_CREATE") OR define("ACTION_CREATE", 'create');
defined("ACTION_UPDATE") OR define("ACTION_UPDATE", 'update');
defined("ACTION_REMOVE") OR define("ACTION_REMOVE", 'remove');

defined("NUMBER_FORMAT") OR define("NUMBER_FORMAT", 2);
defined("BUSQUEDA_AVANZADA") OR define("BUSQUEDA_AVANZADA", "advanced-search");

defined("ROLE_REGISTER_DEFAULT") OR define("ROLE_REGISTER_DEFAULT", 2);

defined("MESSAGES_TYPE_SUCCESS") OR define("MESSAGES_TYPE_SUCCESS", "success");
defined("MESSAGES_TYPE_ERROR") OR define("MESSAGES_TYPE_ERROR", "error");
defined("MESSAGES_TYPE_WARNING") OR define("MESSAGES_TYPE_WARNING", "warning");

defined("TEXT_TITLE_SUCCESS") or define("TEXT_TITLE_SUCCESS", "Exíto");
defined("TEXT_TITLE_ERROR") or define("TEXT_TITLE_ERROR", "Error");
defined("TEXT_TITLE_WARNING") or define("TEXT_TITLE_WARNING", "Precaución");


defined("MESSAGES_PLUGIN_TOAST") or define("MESSAGES_PLUGIN_TOAST", "MESSAGES_PLUGIN_TOAST");


defined("MERCADO_LIBRE_URL") or define("MERCADO_LIBRE_URL", "https://api.mercadolibre.com/items/MLM1332597552?include_attributes=all");

defined("REQRES_URL") or define("REQRES_URL", "https://reqres.in/api");
