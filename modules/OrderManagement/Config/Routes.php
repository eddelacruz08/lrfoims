<?php
$routes->group('orders', ['namespace' => 'Modules\OrderManagement\Controllers'], function ($routes) {
    $routes->add('/', 'Order::index');
    $routes->add('admin-menu', 'Order::menu');
    $routes->match(['get', 'post'], 'a', 'Order::addOrder');
    $routes->match(['get', 'post'], 'admin/create-order/a', 'Order::addAdminOrderNumber');
    $routes->match(['get', 'post'], 'admin/add-to-cart/a', 'Order::addOrderToCartInMenuList');
    $routes->match(['get', 'post'], 'add-to-cart/(:num)', 'Order::addToCart');
    $routes->match(['get', 'post'], 'u/(:num)', 'Order::edit/$1');
    $routes->match(['get', 'post'], 'admin/submit-orders/(:num)', 'Order::submitAdminOrderCarts/$1');
    $routes->match(['get', 'post'], 'admin/qty/(:num)', 'Order::editQty/$1');
    // $routes->match(['get', 'post'], 'admin/add-payment/u/(:num)', 'Order::addAdminPayment/$1');
    $routes->match(['get', 'post'], 'admin/cart/qty/(:num)', 'Order::editCartQty/$1');
    $routes->add('d/(:num)', 'Order::delete/$1');
    $routes->add('place-order/(:num)/(:num)', 'Order::placeOrder/$1/$2');
    $routes->add('admin/add-payment/u/(:num)', 'Order::addAdminPayment/$1');
    $routes->add('cart/d/(:num)', 'Order::deleteCart/$1');
    $routes->add('admin/cart/d/(:num)', 'Order::deleteAdminCart/$1');
    $routes->add('order', 'Order::retrieveOrder');
    $routes->add('place-order', 'Order::retrievePlaceOrder');
    $routes->add('serve-order', 'Order::retrieveServeOrder');
    $routes->add('payment-order', 'Order::retrievePaymentOrder');
    $routes->add('payment-history-order', 'Order::retrievePaymentHistoryOrder');
});