<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['todo'] ['get'] = "Todo/todo";
$route['todo'] ['post'] = "Todo/todo";
$route['todo/(:num)/(:any)/(:any)/(:any)'] ['put'] = "Todo/todo/$1/$2/$3/$4";
$route['todo/(:num)'] ['delete'] = "Todo/todo/$1";