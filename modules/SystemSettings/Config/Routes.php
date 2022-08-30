<?php

$routes->group('extensions',['namespace' => 'Modules\SystemSettings\Controllers'],function ($routes) {
    $routes->add('/', 'Extensions::index');
    $routes->match(['get', 'post'], 'a', 'Extensions::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Extensions::edit/$1');
    $routes->add('d/(:num)', 'Extensions::delete/$1');
});