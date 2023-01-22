<?php

$routes->group('dashboard',['namespace' => 'Modules\DashboardManagement\Controllers'],function ($routes) {
    $routes->add('/', 'Dashboard::index');
    $routes->add('get-pending-orders/v', 'Dashboard::getPendingOrders');
    $routes->match(['get', 'post'], 'get-pending-orders/v/offset', 'Dashboard::getPendingOrdersPerPage');
});
