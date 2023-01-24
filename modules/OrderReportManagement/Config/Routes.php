<?php

$routes->group('order-reports',['namespace' => 'Modules\OrderReportManagement\Controllers'],function ($routes) {
    $routes->add('/', 'OrderReport::index');
    $routes->add('v', 'OrderReport::getOrderReports');
    $routes->match(['get', 'post'], 'v/offset', 'OrderReport::getOrderReportsPerPage');
    $routes->add('(:num)', 'OrderReport::index/$1');
    $routes->match(['get', 'post'], 'date-filter', 'OrderReport::indexDateFilter/$1');
    $routes->match(['get', 'post'], 'generate-report', 'OrderReport::generateOrderReport');
});
