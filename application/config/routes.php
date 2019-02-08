<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// ===================== ROUTE API =========================
$route['api/users']['GET']           = 'UserController/get_all';
$route['api/user/(:num)']['GET']     = 'UserController/get/$1';
$route['api/register']['POST']       = 'UserController/register';
$route['api/user/(:num)']['PUT']     = 'UserController/update/$1';
$route['api/user/(:num)']['DELETE']  = 'UserController/delete/$1';

$route['api/login']                  = 'UserController/login';

$route['api/check_token']['GET']     = 'UserController/check_token';

/*
eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjEiLCJpYXQiOjE1NDk2MDkyMDUsImV4cCI6MTU0OTYxNjQwNX0.DyebljaZR7Hsf93hmfmhbegKE5RxCW7PyrhMaT4qzdU
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
