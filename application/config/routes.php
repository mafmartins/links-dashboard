<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['translate_uri_dashes'] = FALSE;
$route['login/(:any)'] = 'login/$1';
$route['login'] = 'login';
$route['news/p/(:num)'] = 'news/index/$1';
$route['news/p'] = 'news/index';
$route['news/(:num)'] = 'news/view/$1';
$route['news/(:any)'] = 'news/$1';
$route['news'] = 'news';
$route['links/p/(:num)'] = 'links/index/$1';
$route['links/p'] = 'links/index';
$route['links/(:any)'] = 'links/$1';
$route['links'] = 'links';
$route['projetos/p/(:num)'] = 'projetos/index/$1';
$route['projetos/p'] = 'projetos/index';
$route['projetos/(:any)'] = 'projetos/$1';
$route['projetos'] = 'projetos';
$route['users/p/(:num)'] = 'users/index/$1';
$route['users/p'] = 'users/index';
$route['users/(:any)'] = 'users/$1';
$route['users'] = 'users';
$route['stats'] = 'stats';
$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'login';
