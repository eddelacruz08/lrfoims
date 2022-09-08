<?php

$routes->group('dashboard',['namespace' => 'Modules\DashboardManagement\Controllers'],function ($routes) {
    $routes->add('/', 'Dashboard::index');
    $routes->match(['get', 'post'], 'a', 'Dashboard::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Dashboard::edit/$1');
    $routes->add('d/(:num)', 'Dashboard::delete/$1');
});
