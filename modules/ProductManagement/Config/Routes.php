<?php

$routes->group('products', ['namespace' => 'Modules\ProductManagement\Controllers'], function ($routes) {
    $routes->add('/', 'Product::index');
    $routes->match(['get', 'post'], 'a', 'Product::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Product::edit/$1');
    $routes->match(['get', 'post'], 'status/(:num)', 'Product::editStatus/$1');
    $routes->add('d/(:num)', 'Product::delete/$1');
});

$routes->group('product-category', ['namespace' => 'Modules\ProductManagement\Controllers'], function ($routes) {
    $routes->add('/', 'ProductCategory::index');
    $routes->match(['get', 'post'], 'a', 'ProductCategory::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'ProductCategory::edit/$1');
    $routes->add('d/(:num)', 'ProductCategory::delete/$1');
});

$routes->group('menu-list', ['namespace' => 'Modules\ProductManagement\Controllers'], function ($routes) {
    $routes->add('/', 'Menu::index');
    $routes->match(['get', 'post'], 'a', 'Menu::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Menu::edit/$1');
    $routes->add('d/(:num)', 'Menu::delete/$1');
});

$routes->group('menu-category', ['namespace' => 'Modules\ProductManagement\Controllers'], function ($routes) {
    $routes->add('/', 'MenuCategory::index');
    $routes->match(['get', 'post'], 'a', 'MenuCategory::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'MenuCategory::edit/$1');
    $routes->add('d/(:num)', 'MenuCategory::delete/$1');
});