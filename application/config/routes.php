<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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
// Admin Routes
$route['default_controller'] = 'HomeController';
$route['register'] = 'HomeController/register';
$route['payment/(:any)'] = 'HomeController/payment/$1';
$route['payment/(:any)/confirm'] = 'HomeController/confirm/$1';
$route['payment/(:any)/end'] = 'HomeController/end/$1';

$route['admin/dashboard'] = 'DashboardController';



$route['admin/list/calon_siswa'] = 'Admin/AdminController';
$route['admin/list/calon_siswa/(:num)/approve'] = 'Admin/AdminController/approve/$1';
$route['admin/list/calon_siswa/(:num)/decline'] = 'Admin/AdminController/decline/$1';
$route['admin/list/calon_siswa/(:num)/detail'] = 'Admin/AdminController/detail/$1';

$route['admin/upload/bukti_transaksi'] = 'DashboardController/do_upload';

// End Admin Routes

// Auth Routes
$route['auth'] = 'Auth/AuthController';
$route['auth/logout'] = 'Admin/AdminController/logout';

$route['auth/register'] = 'Auth/AuthController/register';

$route['auth/register/proccess'] = 'Auth/AuthController/registerProccess';
// End Auth Routes
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
