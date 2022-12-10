<?php

$routes->group('delivery',['namespace' => 'Modules\DeliveryManagement\Controllers'],function ($routes) {
    $routes->add('/', 'Delivery::index');
    $routes->match(['get', 'post'], 'add-chat', 'Delivery::addChat');
    $routes->add('get-message/(:num)', 'Delivery::getMessage/$1');
});
