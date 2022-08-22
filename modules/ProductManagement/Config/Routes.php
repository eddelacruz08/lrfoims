<?php

$routes->group('ingredients', ['namespace' => 'Modules\IngredientManagement\Controllers'], function ($routes) {
    $routes->add('/', 'Ingredient::index');
    $routes->match(['get', 'post'], 'a', 'Ingredient::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Ingredient::edit/$1');
    $routes->add('d/(:num)', 'Ingredient::delete/$1');
});

$routes->group('ingredient-category', ['namespace' => 'Modules\IngredientManagement\Controllers'], function ($routes) {
    $routes->add('/', 'IngredientCategory::index');
    $routes->match(['get', 'post'], 'a', 'IngredientCategory::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'IngredientCategory::edit/$1');
    $routes->add('d/(:num)', 'IngredientCategory::delete/$1');
});