<?php

$routes->group('ingredient-reports',['namespace' => 'Modules\IngredientReportManagement\Controllers'],function ($routes) {
    $routes->add('/', 'IngredientReport::index');
    $routes->add('(:num)', 'IngredientReport::index/$1');
    $routes->match(['get', 'post'], 'date-filter', 'IngredientReport::indexDateFilter/$1');
    $routes->match(['get', 'post'], 'a', 'IngredientReport::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'IngredientReport::edit/$1');
    $routes->match(['get', 'post'], 'generate-report', 'IngredientReport::generateReport');
    $routes->add('d/(:num)', 'IngredientReport::delete/$1');
});
