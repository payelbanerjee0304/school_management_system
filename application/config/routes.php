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
$route['default_controller'] = 'MainController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// $route['/']='MainController/index';
$route['index']="MainController/index";
$route['category/(:num)']="MainController/category/$1";
$route['category']="MainController/category";

$route['class']="MainController/class";
$route['class/(:num)']="MainController/class/$1";

$route['course']="MainController/course";

$route['student']="MainController/student";
$route['student/(:num)']="MainController/student/$1";

$route['staff']="MainController/staff";
$route['staff/(:num)']="MainController/staff/$1";

$route['login']="MainController/login";
$route['logout']="MainController/logout";
$route['loginadmin']="MainController/loginadmin";

$route['do_upload']="MainController/do_upload";
$route['editcategory/(:num)'] = 'MainController/editcategory/$1';
$route['editclass/(:num)'] = 'MainController/editclass/$1';
$route['editcourse/(:num)'] = 'MainController/editcourse/$1';
$route['editstudent/(:num)'] = 'MainController/editstudent/$1';

$route['deletecategory/(:num)']= 'MainController/deletecategory/$1';
$route['deleteclass/(:num)']= 'MainController/deleteclass/$1';
$route['deletecourse/(:num)']= 'MainController/deletecourse/$1';
$route['deletestudent/(:num)']= 'MainController/deletestudent/$1';

$route['test'] = 'MainController/test';
$route['testinsert'] = 'MainController/testinsert';