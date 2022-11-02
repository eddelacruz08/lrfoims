<?php
$routes->group('orders', ['namespace' => 'Modules\OrderManagement\Controllers'], function ($routes) {
    // orders
    $routes->add('/', 'Order::index');
    $routes->match(['get', 'post'], 'a', 'Order::addOrder'); 
    $routes->match(['get', 'post'], 'add-to-cart/(:num)', 'Order::addToCart');
    $routes->match(['get', 'post'], 'u/(:num)', 'Order::edit/$1');
    // $routes->match(['get', 'post'], 'admin/qty/(:num)', 'Order::editQty/$1');
    $routes->match(['get', 'post'], 'admin/cart/qty/(:num)/(:num)/(:num)/(:num)/(:alphanum)', 'Order::editAdminCartQty/$1/$2/$3/$4/$5');
    $routes->add('d/(:num)', 'Order::delete/$1');
    $routes->add('place-order/u/(:num)/(:num)', 'Order::placeOrder/$1/$2');
    $routes->add('admin/add-payment/u/(:num)/(:num)', 'Order::addAdminPayment/$1/$2');
    $routes->add('cart/d/(:num)/(:num)/(:num)/(:num)', 'Order::deleteCart/$1/$2/$3/$4');
    $routes->add('admin/cart/d/(:num)/(:num)/(:num)/(:num)', 'Order::deleteAdminCart/$1/$2/$3/$4');
    $routes->add('order', 'Order::retrieveOrder');
    $routes->add('place-order', 'Order::retrievePlaceOrder');
    $routes->add('serve-order', 'Order::retrieveServeOrder');
    $routes->add('payment-order', 'Order::retrievePaymentOrder');
    $routes->add('payment-history-order', 'Order::retrievePaymentHistoryOrder');
    // orders/admin-menu
    $routes->add('admin-menu', 'Order::menu'); 
    $routes->match(['get', 'post'], 'admin-menu/add-to-cart/a', 'Order::addOrderToCartInMenuList');
    $routes->match(['get', 'post'], 'admin-menu/submit-orders/(:num)', 'Order::submitAdminOrderCarts/$1');
    $routes->match(['get', 'post'], 'admin-menu/cart/qty/(:num)/(:num)/(:num)/(:num)/(:alphanum)', 'Order::editAdminMenuCartQty/$1/$2/$3/$4/$5');
    $routes->add('admin-menu/cart/d/(:num)/(:num)/(:num)/(:num)', 'Order::deleteAdminCart/$1/$2/$3/$4');
    $routes->add('create-order-number', 'Order::createOrderNumber');
});