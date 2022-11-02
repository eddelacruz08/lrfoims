<?php

$routes->group('delivery',['namespace' => 'Modules\DeliveryManagement\Controllers'],function ($routes) {
    $routes->add('/', 'Delivery::index');
});
