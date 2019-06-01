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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Home_Controller';
$route['login'] = 'Login_Controller/sign_in';
$route['sign_up'] = 'Login_Controller/sign_up';
$route['sign_out'] = 'Login_Controller/sign_out';
$route['profile'] = 'User_Controller/profile';
$route['about'] = 'About_Controller';
$route['help'] = 'Help_Controller';
$route['search'] = 'Search_Controller';
$route['dashboard'] = 'User_Controller';
$route['open/(:num)'] = 'Project_Controller/open/$1';
$route['planning/(:num)'] = 'Project_Controller/planning/$1';
$route['conducting/(:num)'] = 'Project_Controller/conducting/$1';
$route['reporting/(:num)'] = 'Project_Controller/reporting/$1';
$route['study_selection/(:num)'] = 'Project_Controller/study_selection/$1';
$route['quality_assessment/(:num)'] = 'Project_Controller/quality_assessment/$1';
$route['data_extraction/(:num)'] = 'Project_Controller/data_extraction/$1';
$route['edit/(:num)'] = 'Project_Controller/edit/$1';
$route['new_project'] = 'Project_Controller/new_project';
$route['add_research/(:num)'] = 'Project_Controller/add_research/$1';
$route['study_selection_adm/(:num)'] = 'Project_Controller/review_study_selection/$1';
$route['quality_adm/(:num)'] = 'Project_Controller/review_qa/$1';
$route['export/(:num)'] = 'Project_Controller/export/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
