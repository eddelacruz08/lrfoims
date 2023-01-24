<?php

$routes->group('extensions',['namespace' => 'Modules\SystemSettings\Controllers'],function ($routes) {
    $routes->add('/', 'Extensions::index');
    $routes->match(['get', 'post'], 'a', 'Extensions::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Extensions::edit/$1');
    $routes->add('d/(:num)', 'Extensions::delete/$1');
});

$routes->group('ingredient-categories', ['namespace' => 'Modules\SystemSettings\Controllers'], function ($routes) {
    $routes->add('/', 'ProductCategory::index');
    $routes->match(['get', 'post'], 'a', 'ProductCategory::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'ProductCategory::edit/$1');
    $routes->add('d/(:num)', 'ProductCategory::delete/$1');
});

$routes->group('menu-categories', ['namespace' => 'Modules\SystemSettings\Controllers'], function ($routes) {
    $routes->add('/', 'MenuCategory::index');
    $routes->match(['get', 'post'], 'a', 'MenuCategory::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'MenuCategory::edit/$1');
    $routes->add('d/(:num)', 'MenuCategory::delete/$1');
});

$routes->group('menu-ingredients', ['namespace' => 'Modules\SystemSettings\Controllers'], function ($routes) {
    $routes->add('/', 'MenuIngredient::index');
    $routes->match(['get', 'post'], 'a/(:num)', 'MenuIngredient::addIngredient/$1');
    $routes->match(['get', 'post'], 'u/(:num)/(:num)', 'MenuIngredient::editIngredient/$1/$2');
    $routes->add('d/(:num)', 'MenuIngredient::delete/$1');
});

$routes->group('ingredient-status', ['namespace' => 'Modules\SystemSettings\Controllers'], function ($routes) {
    $routes->add('/', 'ProductStatus::index');
    $routes->match(['get', 'post'], 'a', 'ProductStatus::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'ProductStatus::edit/$1');
    $routes->add('d/(:num)', 'ProductStatus::delete/$1');
});

$routes->group('ingredient-measures', ['namespace' => 'Modules\SystemSettings\Controllers'], function ($routes) {
    $routes->add('/', 'ProductMeasure::index');
    $routes->match(['get', 'post'], 'a', 'ProductMeasure::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'ProductMeasure::edit/$1');
    $routes->add('d/(:num)', 'ProductMeasure::delete/$1');
});

$routes->group('home-details', ['namespace' => 'Modules\SystemSettings\Controllers'], function ($routes) {
    $routes->add('/', 'HomeInfo::index');
    $routes->match(['get', 'post'], 'u/(:num)', 'HomeInfo::edit/$1');
});

$routes->group('order-status', ['namespace' => 'Modules\SystemSettings\Controllers'], function ($routes) {
    $routes->add('/', 'OrderStatus::index');
    $routes->match(['get', 'post'], 'a', 'OrderStatus::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'OrderStatus::edit/$1');
    $routes->add('d/(:num)', 'OrderStatus::delete/$1');
});

$routes->group('regions', ['namespace' => 'Modules\SystemSettings\Controllers'], function ($routes) {
    $routes->add('/', 'Region::index');
    $routes->match(['get', 'post'], 'a', 'Region::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Region::edit/$1');
    $routes->add('d/(:num)', 'Region::delete/$1');
});

$routes->group('provinces', ['namespace' => 'Modules\SystemSettings\Controllers'], function ($routes) {
    $routes->add('/', 'Province::index');
    $routes->match(['get', 'post'], 'a', 'Province::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Province::edit/$1');
    $routes->add('d/(:num)', 'Province::delete/$1');
});

$routes->group('cities', ['namespace' => 'Modules\SystemSettings\Controllers'], function ($routes) {
    $routes->add('/', 'City::index');
    $routes->match(['get', 'post'], 'a', 'City::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'City::edit/$1');
    $routes->add('d/(:num)', 'City::delete/$1');
});

$routes->group('barangay', ['namespace' => 'Modules\SystemSettings\Controllers'], function ($routes) {
    $routes->add('/', 'Barangay::index');
    $routes->add('v', 'Barangay::getBarangay');
    $routes->match(['get', 'post'], 'v/offset', 'Barangay::getBarangayPerPage');
    $routes->match(['get', 'post'], 'a', 'Barangay::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Barangay::edit/$1');
    $routes->add('d/(:num)', 'Barangay::delete/$1');
});

$routes->group('order-max-limit', ['namespace' => 'Modules\SystemSettings\Controllers'], function ($routes) {
    $routes->add('/', 'OrderLimit::index');
    $routes->match(['get', 'post'], 'a', 'OrderLimit::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'OrderLimit::edit/$1');
    $routes->add('d/(:num)', 'OrderLimit::delete/$1');
});

$routes->group('generate-qrcode-link', ['namespace' => 'Modules\SystemSettings\Controllers'], function ($routes) {
    $routes->add('/', 'QrCode::index');
});

$routes->group('coupons', ['namespace' => 'Modules\SystemSettings\Controllers'], function ($routes) {
    $routes->add('/', 'Coupon::index');
    $routes->match(['get', 'post'], 'a', 'Coupon::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Coupon::edit/$1');
    $routes->add('d/(:num)', 'Coupon::delete/$1');
});

$routes->group('delivery-fee', ['namespace' => 'Modules\SystemSettings\Controllers'], function ($routes) {
    $routes->add('/', 'DeliveryFee::index');
    $routes->match(['get', 'post'], 'a', 'DeliveryFee::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'DeliveryFee::edit/$1');
    $routes->add('d/(:num)', 'DeliveryFee::delete/$1');
});

$routes->group('notifications', ['namespace' => 'Modules\SystemSettings\Controllers'], function ($routes) {
    $routes->add('/', 'Notification::index');
    $routes->match(['get', 'post'], 'a', 'Notification::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Notification::edit/$1');
    $routes->add('d/(:num)', 'Notification::delete/$1');
});

$routes->group('order-user-discounts', ['namespace' => 'Modules\SystemSettings\Controllers'], function ($routes) {
    $routes->add('/', 'OrderDiscount::index');
    $routes->match(['get', 'post'], 'a', 'OrderDiscount::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'OrderDiscount::edit/$1');
    $routes->add('d/(:num)', 'OrderDiscount::delete/$1');
});

$routes->group('payment-methods', ['namespace' => 'Modules\SystemSettings\Controllers'], function ($routes) {
    $routes->add('/', 'PaymentMethod::index');
    $routes->match(['get', 'post'], 'a', 'PaymentMethod::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'PaymentMethod::edit/$1');
    $routes->add('d/(:num)', 'PaymentMethod::delete/$1');
});

$routes->group('vat', ['namespace' => 'Modules\SystemSettings\Controllers'], function ($routes) {
    $routes->add('/', 'VAT::index');
    $routes->match(['get', 'post'], 'a', 'VAT::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'VAT::edit/$1');
    $routes->add('d/(:num)', 'VAT::delete/$1');
});