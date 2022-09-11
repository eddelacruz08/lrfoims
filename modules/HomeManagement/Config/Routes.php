<?php

$routes->group('',['namespace' => 'Modules\HomeManagement\Controllers'],function ($routes) {
    $routes->add('/', 'Home::index');
    $routes->add('menu', 'Home::menu');
    $routes->add('cart', 'Home::cart');
    $routes->match(['get', 'post'], '/cart/qty/(:num)', 'Home::editCartQuantity/$1');
    $routes->add('cart/d/(:num)', 'Home::deleteCart/$1');
    $routes->add('profile', 'Home::profile');
    $routes->match(['get', 'post'], '/menu/customer/add-to-cart', 'Home::addToCart');
    $routes->match(['get', 'post'], '/profile/u', 'Home::editProfile');
    $routes->add('d/(:num)', 'Home::delete/$1');
});