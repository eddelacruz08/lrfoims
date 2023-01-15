<?php

$routes->group('ingredients', ['namespace' => 'Modules\ProductManagement\Controllers'], function ($routes) {
    $routes->add('/', 'Product::index');
    $routes->add('v/(:num)', 'Product::viewStocks/$1');
    $routes->add('list/v', 'Product::getViewStocks');
    $routes->match(['get', 'post'], 'a', 'Product::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Product::edit/$1');
    $routes->match(['get', 'post'], 'expire-date/u/(:num)/(:num)', 'Product::updateStocksByExpirationDate/$1/$2');
    $routes->match(['get', 'post'], 'update-date/u/(:num)', 'Product::updateDateStocks/$1');
    $routes->match(['get', 'post'], 'notify-marked/u/(:num)', 'Product::notificationMarked/$1');
    $routes->match(['get', 'post'], 'notification/a', 'Product::notification');
    $routes->match(['get', 'post'], 'status/(:num)', 'Product::editStatus/$1');
    $routes->add('d/(:num)', 'Product::delete/$1');
    $routes->match(['get', 'post'], 'batch-upload/export', 'Product::exportIngredients');
    $routes->match(['get', 'post'], 'batch-upload/stock-in', 'Product::importCsvFile');
    $routes->add('stocks/(:num)', 'Product::stockReport/$1');
    $routes->add('update-report/(:num)/(:num)', 'Product::updateIngredientReport/$1/$2');
    //get data using ajax
    $routes->add('get-ingredients', 'Product::retrieveIngredients');
    // $routes->add('ingredient-list', 'Product::getIngredientList');
    $routes->match(['get', 'post'], 'ingredient-list-data', 'Product::getIngredientListData');
    // $routes->add('ingredient-list-data', 'Product::getIngredientListData');
});
