<?php

$routes->group('order-reports',['namespace' => 'Modules\OrderReportManagement\Controllers'],function ($routes) {
    $routes->add('/', 'OrderReport::index');
    $routes->add('(:num)', 'OrderReport::index/$1');
    $routes->match(['get', 'post'], 'a', 'OrderReport::add');
    $routes->match(['get', 'post'], 'date-filter', 'OrderReport::indexDateFilter/$1');
    $routes->match(['get', 'post'], 'generate-report', 'OrderReport::generateOrderReport');
    $routes->match(['get', 'post'], 'u/(:num)', 'OrderReport::edit/$1');
    $routes->add('d/(:num)', 'OrderReport::delete/$1');
});
