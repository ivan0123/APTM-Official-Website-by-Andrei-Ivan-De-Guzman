<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('AptmController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'AptmController::index');

// ------------------------------ from tutorial

// use this to shortened the url
// $routes->add('url name', 'Controller_Name::Method_Name');

// use this to shortened the url and past arguments to url
// $routes->add('url name/(:any)', 'Controller_Name::Method_Name/$1');
// $routes->add('product/(:any)', 'User::product/$1');

// create group of URL based on the first segment
//$routes->group('first_segment_url_name', function ($routes){
	//$routes->add('url_name', 'Folder_name/All_user::Method_name');
//});
// $routes->group('admin', function ($routes){
// 	$routes->add('users', 'Admin/All_user::getAllUsers');
// });

// user routes
$routes->post('signUp', 'AptmController::signUp');

// ------------------------------ from tutorial

// AJAX ROUTES
// Controller to handle Ajax Request
// $routes->post("saveAnnouncement", "AptmController::saveAnnouncement"); 

$routes->post('fileUpload', 'AptmController::fileUpload');
$routes->post('saveAnn', 'AptmController::saveAnn');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
