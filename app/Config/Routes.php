<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Security');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//login page
$routes->add('/login', 'Security::index');
$routes->add('/signout', 'Security::signOut');
//for registration
$routes->match(['get','post'],'register', 'Security::register');
$routes->match(['get','post'],'guest-mode', 'Security::guestMode');
$routes->match(['get','post'],'register-email-verification', 'Security::emailVerificationGuestMode');
$routes->match(['get','post'],'register-submit-email-verification', 'Security::emailVerificationGuestMode');
$routes->get('/import', 'Import::index');
$routes->get('/(:alpha)/403', 'Security::fileNotFound/$1');
$routes->get('/get-regions', 'Security::getRegions');
$routes->get('/get-regions/(:num)', 'Security::getRegionsId/$1');
$routes->get('/get-provinces/(:num)', 'Security::getProvinces/$1');
$routes->get('/get-provinces-code/(:num)', 'Security::getProvincesId/$1');
$routes->get('/get-cities/(:num)', 'Security::getCities/$1');
$routes->get('/get-cities-code/(:num)', 'Security::getCitiesId/$1');
$routes->get('/get-barangay/(:num)', 'Security::getBarangay/$1'); 
$routes->get('/submit-email-verification', 'Security::emailVerification');
$routes->match(['get','post'],'submit', 'Security::send');
$routes->match(['get','post'],'register-submit', 'Security::sendRegister');
$routes->match(['get','post'],'email-verification', 'Security::emailVerification');
$routes->match(['get','post'],'forgot-password', 'Security::forgotPassword');
$routes->match(['get','post'],'temporary-password', 'Security::emailTemporaryPassword');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

if(file_exists(ROOTPATH.'modules')){
	$modulesPath = ROOTPATH.'modules/';
	$modules = scandir($modulesPath);

	foreach ($modules as $module){
		if($module === '.' || $module === '..') continue;
		if(is_dir($modulesPath) . '/' . $module){
			$routesPath = $modulesPath . $module . '/Config/Routes.php';
			if(file_exists($routesPath)){
				require($routesPath);
			}else{continue;}
		}
	}
}
