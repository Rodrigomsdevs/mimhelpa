<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// LOGIN    
$route['default_controller'] = 'API';
$route['cadastrar_usuario'] = 'API/cadastrar_usuario';
$route['validar_login'] = 'API/validar_login';
$route['cadastrar_aparelho'] = 'API/cadastrar_aparelho';




$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
