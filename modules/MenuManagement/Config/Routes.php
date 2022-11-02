<?php

$routes->group('menu-list', ['namespace' => 'Modules\MenuManagement\Controllers'], function ($routes) {
    $routes->add('/', 'Menu::index');
    $routes->match(['get', 'post'], 'a', 'Menu::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Menu::edit/$1');
    $routes->match(['get', 'post'], 'menu-status/u/(:num)', 'Menu::editMenuStatus/$1');
    $routes->add('d/(:num)', 'Menu::delete/$1');
});