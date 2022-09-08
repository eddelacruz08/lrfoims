<?php

$routes->group('ingredients', ['namespace' => 'Modules\ProductManagement\Controllers'], function ($routes) {
    $routes->add('/', 'Product::index');
    $routes->match(['get', 'post'], 'a', 'Product::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Product::edit/$1');
    $routes->match(['get', 'post'], 'status/(:num)', 'Product::editStatus/$1');
    $routes->add('d/(:num)', 'Product::delete/$1');
    $routes->add('apply-report/(:num)', 'Product::addIngredientReport/$1');
    $routes->add('update-report/(:num)/(:num)', 'Product::updateIngredientReport/$1/$2');
});
