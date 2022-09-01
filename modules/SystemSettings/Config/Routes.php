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

$routes->group('ingredient-status', ['namespace' => 'Modules\SystemSettings\Controllers'], function ($routes) {
    $routes->add('/', 'ProductStatus::index');
    $routes->match(['get', 'post'], 'a', 'ProductStatus::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'ProductStatus::edit/$1');
    $routes->add('d/(:num)', 'ProductStatus::delete/$1');
});

$routes->group('ingredient-descriptions', ['namespace' => 'Modules\SystemSettings\Controllers'], function ($routes) {
    $routes->add('/', 'ProductDescription::index');
    $routes->match(['get', 'post'], 'a', 'ProductDescription::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'ProductDescription::edit/$1');
    $routes->add('d/(:num)', 'ProductDescription::delete/$1');
});

$routes->group('order-numbers', ['namespace' => 'Modules\SystemSettings\Controllers'], function ($routes) {
    $routes->add('/', 'OrderNumber::index');
    $routes->match(['get', 'post'], 'a', 'OrderNumber::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'OrderNumber::edit/$1');
    $routes->add('d/(:num)', 'OrderNumber::delete/$1');
});

$routes->group('order-status', ['namespace' => 'Modules\SystemSettings\Controllers'], function ($routes) {
    $routes->add('/', 'OrderStatus::index');
    $routes->match(['get', 'post'], 'a', 'OrderStatus::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'OrderStatus::edit/$1');
    $routes->add('d/(:num)', 'OrderStatus::delete/$1');
});