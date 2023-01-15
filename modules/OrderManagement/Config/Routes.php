<?php
$routes->group('orders', ['namespace' => 'Modules\OrderManagement\Controllers'], function ($routes) {
    // orders
    $routes->add('/', 'Order::index');
    $routes->match(['get', 'post'], 'a', 'Order::addOrder'); 
    $routes->match(['get', 'post'], 'add-to-cart/(:num)', 'Order::addToCart');
    $routes->match(['get', 'post'], 'u/(:num)', 'Order::edit/$1');
    // $routes->match(['get', 'post'], 'admin/qty/(:num)', 'Order::editQty/$1');
    // $routes->add('d/(:num)', 'Order::delete/$1');
    $routes->add('cart/d/(:num)/(:num)/(:num)/(:num)', 'Order::deleteCart/$1/$2/$3/$4');
    $routes->add('admin/cart/d/(:num)/(:num)/(:num)/(:num)', 'Order::deleteAdminCart/$1/$2/$3/$4');
    // get data using ajax
    // update cart method
    $routes->match(['get', 'post'], 'admin/cart/qty/(:num)/(:num)/(:num)/(:num)/(:alphanum)', 'Order::editAdminCartQty/$1/$2/$3/$4/$5');
    $routes->add('admin/add-payment/u/(:num)/(:num)', 'Order::addAdminPayment/$1/$2');
    $routes->add('place-order/u/(:num)/(:num)', 'Order::placeOrder/$1/$2');
    $routes->match(['get', 'post'], 'a/response', 'Order::addOrderResponse');
    // get data using ajax - display divs
    $routes->add('order-type-dine-in-list-data/(:num)', 'Order::orderTypeListData/$1');
    $routes->add('order-type-take-out-list-data/(:num)', 'Order::orderTypeListData/$1');
    $routes->add('order-type-delivery-list-data/(:num)', 'Order::orderTypeListData/$1');
    $routes->add('get-info', 'Order::getInfo');
    $routes->add('get-info-to-print', 'Order::getCartInfoForPrint');
    // orders/admin-menu
    $routes->add('admin-menu', 'Order::menu'); 
    // get using ajax
    $routes->add('admin-menu/admin-menu-page-reload', 'Order::adminMenu'); 
    $routes->add('admin-menu/order-menu-list-data', 'Order::menuList'); 
    $routes->add('admin-menu/order-cart-list-data', 'Order::cartList'); 
    $routes->add('admin-menu/cart-refresh-and-cancel-buttons', 'Order::cartRefreshAndCancelButtons'); 
    $routes->add('admin-menu/get-order-type-and-payment-method-list', 'Order::getOrderTypeListAndPaymentMethodList'); 
    $routes->match(['get', 'post'], 'admin-menu/order-cart-list-data/apply-coupon', 'Order::applyCouponDiscount');
    $routes->match(['get', 'post'], 'admin-menu/place-order', 'Order::submitAdminOrderCarts');
    // common php routes
    $routes->match(['get', 'post'], 'admin-menu/add-to-cart/a', 'Order::addOrderToCartInMenuList');
    // $routes->match(['get', 'post'], 'admin-menu/submit-orders/(:num)', 'Order::submitAdminOrderCarts/$1');
    // $routes->match(['get', 'post'], 'admin-menu/cart/qty/(:num)/(:num)/(:num)/(:num)/(:alphanum)', 'Order::editAdminMenuCartQty/$1/$2/$3/$4/$5');
    $routes->add('admin-menu/cancel-order/d', 'Order::deleteOrderAdminMenu');
    $routes->add('create-order-number', 'Order::createOrderNumber');
});