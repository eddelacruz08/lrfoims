<?php

$routes->group('ingredient-reports',['namespace' => 'Modules\IngredientReportManagement\Controllers'],function ($routes) {
    $routes->add('/', 'IngredientReport::index');
    $routes->match(['get', 'post'], 'a', 'IngredientReport::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'IngredientReport::edit/$1');
    $routes->add('d/(:num)', 'IngredientReport::delete/$1');
    $routes->add('filter-date', 'IngredientReport::filterDate');
});
