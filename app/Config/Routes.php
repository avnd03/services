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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
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

    $routes->get('/login', 'Auth::index', ['filter' => 'noauth']);
    $routes->get('/recovery', 'Auth::recovery', ['filter' => 'noauth']);
    $routes->post('/login-check', 'Auth::loginCheck');
    $routes->post('/account-recovery', 'Auth::accountRecovery');
    $routes->get('/recover-my-account/(:any)', 'Auth::recoverMyAccount', ['filter' => 'noauth']);
    $routes->post('/reset-password', 'Auth::resetPassword');
    $routes->group('', ['filter'=>'auth'], function ($routes){
    $routes->get('/logout', 'Auth::logout');
    $routes->get('/', 'Home::index');

    $routes->get('/service-list', 'ServiceRepair::index');
    $routes->get('/new-service', 'ServiceRepair::newService');

    $routes->get('/customers', 'Customer::index');
    $routes->get('/edit-customer', 'Customer::editCustomer');


  //Default Route
    $routes->get('/(:any)', 'Home::root/$1');

  });

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
