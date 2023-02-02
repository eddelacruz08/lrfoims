<?php

$routes->group('',['namespace' => 'Modules\HomeManagement\Controllers'],function ($routes) {
    $routes->add('/', 'Home::index');
    $routes->add('d/(:num)', 'Home::delete/$1');

    $routes->add('menu', 'Home::menu');
    $routes->match(['get', 'post'], '/menu/customer/add-to-cart', 'Home::addToCart');

    $routes->add('order-status-list', 'Home::ongoingOrderStatusList');
    $routes->add('order-status-list/order-update-status-list', 'Home::orderUpdateStatusList');

    $routes->add('cart', 'Home::cart');
    // $routes->match(['get', 'post'], '/cart/qty/(:num)', 'Home::editCartQuantity/$1');
    $routes->match(['get', 'post'], 'cart/customer/qty', 'Home::editCartQuantity');
    $routes->add('cart/d/(:num)', 'Home::deleteCart/$1');
    $routes->match(['get', 'post'], 'cart/place-order', 'Home::placeOrder');
    $routes->match(['get', 'post'], 'cart/add-chat', 'Home::addChat');
    $routes->add('cart/get-message/(:num)', 'Home::getMessage/$1');
    // get using ajax
    $routes->add('cart/customer-order-cart-list-data', 'Home::cartList'); 
    $routes->match(['get', 'post'], 'cart/apply-coupon', 'Home::applyCouponDiscount');

    $routes->add('profile', 'Home::profile');
    $routes->match(['get', 'post'], 'profile/apply-rating/a/(:num)', 'Home::applyRating/$1');
    $routes->match(['get', 'post'], '/edit-profile/u/(:num)', 'Home::editProfile/$1');
    $routes->match(['get', 'post'], '/profile/u', 'Home::editProfile');
});