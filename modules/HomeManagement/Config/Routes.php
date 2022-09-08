<?php

$routes->group('',['namespace' => 'Modules\HomeManagement\Controllers'],function ($routes) {
    $routes->add('/', 'Home::index');
    $routes->add('menu', 'Home::menu');
    $routes->add('cart', 'Home::cart');
    $routes->add('profile', 'Home::profile');
    $routes->match(['get', 'post'], 'a', 'Home::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Home::edit/$1');
    $routes->add('d/(:num)', 'Home::delete/$1');
});


$routes->group('/menu',['namespace' => 'Modules\HomeManagement\Controllers'],function ($routes) {
    $routes->add('/', 'Home::menu');
    $routes->match(['get', 'post'], 'a', 'Home::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Home::edit/$1');
    $routes->add('d/(:num)', 'Home::delete/$1');
});


$routes->group('/cart',['namespace' => 'Modules\HomeManagement\Controllers'],function ($routes) {
    $routes->add('/', 'Home::cart');
    $routes->match(['get', 'post'], 'a', 'Home::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Home::edit/$1');
    $routes->add('d/(:num)', 'Home::delete/$1');
});

$routes->group('/profile',['namespace' => 'Modules\HomeManagement\Controllers'],function ($routes) {
    $routes->add('/', 'Home::profile');
    $routes->match(['get', 'post'], 'a', 'Home::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Home::edit/$1');
    $routes->add('d/(:num)', 'Home::delete/$1');
});