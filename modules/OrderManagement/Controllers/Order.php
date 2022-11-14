<?php namespace Modules\OrderManagement\Controllers;

use Modules\OrderManagement\Models as OrderManagement;
use Modules\MenuManagement\Models as MenuManagement;
use Modules\SystemSettings\Models as SystemSettings;
use Modules\ProductManagement\Models as ProductManagement;
use Modules\IngredientReportManagement\Models as IngredientReportManagement;
use App\Controllers\BaseController;

class Order extends BaseController
{
	function __construct(){
		$this->ordersModel = new OrderManagement\OrderModel();
		$this->cartsModel = new OrderManagement\CartModel();
        $this->menusModel = new MenuManagement\MenuModel();
        $this->menuCategoryModel = new SystemSettings\MenuCategoryModel();
        $this->orderTypeModel = new SystemSettings\OrderTypeModel();
        $this->orderNumbersModel = new SystemSettings\OrderNumberModel();
        $this->ingredientsModel = new ProductManagement\ProductModel();
		$this->menuIngredientModel = new SystemSettings\MenuIngredientModel();
        $this->ingredientReportModel = new IngredientReportManagement\IngredientReportModel();
		$this->regionModel = new SystemSettings\RegionModel();
		$this->provinceModel = new SystemSettings\ProvinceModel();
		$this->cityModel = new SystemSettings\CityModel();
		helper(['link','form']);
        $this->take_out = 1;
        $this->dine_in = 2;
        $this->delivery = 3;
	}

	public function index() {
        $this->hasPermissionRedirect('orders');
        $time = new \DateTime();
        $dateAndTime = $time->format('Y-m-d');
		$data = [
			'page_title' => 'LRFOIMS | Orders',
			'title' => 'Orders',
			'view' => 'Modules\OrderManagement\Views\order\index',
            'countPlaceOrders' => $this->ordersModel->getCountPerOrderDetails(null, 2, $this->take_out, $this->dine_in),
            'countServeOrders' => $this->ordersModel->getCountPerOrderDetails(null, 3, $this->take_out, $this->dine_in),
            'countPaymentOrders' => $this->ordersModel->getCountPerOrderDetails(null, 4, $this->take_out, $this->dine_in),
            'countPaymentHistoryOrders' => $this->ordersModel->getCountPerOrderDetails($dateAndTime, 5, $this->take_out, $this->dine_in),
            'placeOrders' => $this->ordersModel->getDetails(['lrfoims_orders.status'=>'a', 'lrfoims_orders.order_status_id' => 2], $this->take_out, $this->dine_in),
            'serveOrders' => $this->ordersModel->getDetails(['lrfoims_orders.status'=>'a', 'lrfoims_orders.order_status_id' => 3], $this->take_out, $this->dine_in),
            'paymentOrders' => $this->ordersModel->getDetails(['lrfoims_orders.status'=>'a', 'lrfoims_orders.order_status_id' => 4], $this->take_out, $this->dine_in),
            'paymentHistoryOrders' => $this->ordersModel->getDetails(['CAST(lrfoims_orders.updated_at AS DATE)' => $dateAndTime,'lrfoims_orders.status'=>'a', 'lrfoims_orders.order_status_id' => 5], $this->take_out, $this->dine_in)
		];

		return view('templates/index', $data); 
	}

    public function retrievePlaceOrder(){
        $this->hasPermissionRedirect('orders/place-order');

        $data['menuLists'] = $this->menusModel->get();
        $data['menuCategory'] = $this->menuCategoryModel->get(['status'=>'a']);
        $data['orderType'] = $this->orderTypeModel->get();
        $data['getCarts'] = $this->cartsModel->getCarts(['lrfoims_carts.status' => 'a']);
        $data['getCartTotalPrice'] = $this->cartsModel->getCartTotalPrice(['lrfoims_carts.status' => 'a', 'o.order_status_id' => 2]);
        $data['getOrderDetails'] = $this->ordersModel->getOrderDetails(['lrfoims_orders.status' => 'a','lrfoims_orders.id' => $_GET['id'], 'lrfoims_orders.order_status_id' => 2]);
        return view('Modules\OrderManagement\Views\order\orders', $data);
    }
    
    public function retrieveServeOrder(){
        $this->hasPermissionRedirect('orders/serve-order');

        $data['menuLists'] = $this->menusModel->get();
        $data['menuCategory'] = $this->menuCategoryModel->get(['status'=>'a']);
        $data['orderType'] = $this->orderTypeModel->get();
        $data['getCarts'] = $this->cartsModel->getCarts(['lrfoims_carts.status' => 'a']);
        $data['getCartTotalPrice'] = $this->cartsModel->getCartTotalPrice(['lrfoims_carts.status' => 'a', 'o.order_status_id' => 3]);
        $data['getOrderDetails'] = $this->ordersModel->getOrderDetails(['lrfoims_orders.status' => 'a','lrfoims_orders.id' => $_GET['id'], 'lrfoims_orders.order_status_id' => 3]);
        return view('Modules\OrderManagement\Views\order\serveOrder', $data);
    }
    
    public function retrievePaymentOrder(){
        $this->hasPermissionRedirect('orders/payment-order');

        $data['menuLists'] = $this->menusModel->get();
        $data['orderType'] = $this->orderTypeModel->get();
        $data['getCarts'] = $this->cartsModel->getCarts(['lrfoims_carts.status' => 'a']);
        $data['getCartTotalPrice'] = $this->cartsModel->getCartTotalPrice(['lrfoims_carts.status' => 'a', 'o.order_status_id' => 4]);
        $data['getOrderDetails'] = $this->ordersModel->getOrderDetails(['lrfoims_orders.status' => 'a','lrfoims_orders.id' => $_GET['id'], 'lrfoims_orders.order_status_id' => 4]);
        return view('Modules\OrderManagement\Views\order\paymentOrder', $data);
    }
    
    public function retrievePaymentHistoryOrder(){
        $this->hasPermissionRedirect('orders/payment-history-order');

        $time = new \DateTime();
        $dateAndTime = $time->format('Y-m-d');
        $data['menuLists'] = $this->menusModel->get();
        $data['orderType'] = $this->orderTypeModel->get();
        $data['getCarts'] = $this->cartsModel->getCarts(['lrfoims_carts.status' => 'a']);
        $data['getCartTotalPrice'] = $this->cartsModel->getCartTotalPrice(['lrfoims_carts.status' => 'a', 'o.order_status_id' => 5]);
        $data['getOrderDetails'] = $this->ordersModel->getOrderPaymentHistoryDetails(['CAST(lrfoims_orders.updated_at AS DATE)' => $dateAndTime, 
            'lrfoims_orders.status' => 'a','lrfoims_orders.id' => $_GET['id'], 'lrfoims_orders.order_status_id' => 5]);
        return view('Modules\OrderManagement\Views\order\paymentHistoryOrder', $data);
    }

    public function placeOrder($id, $valueId){
        $this->hasPermissionRedirect('orders/place-order/u');

        $getCart = $this->cartsModel->get(['order_id' => $id, 'status'=>'a']);
        if(!empty($getCart)){
            if($valueId == 1 || $valueId == 2 || $valueId == 3 || $valueId == 4){
                $_POST['order_status_id'] = $valueId;
                $this->ordersModel->update($id, $_POST);
                $data =[
                    'status'=> 'Added Successfully',
                    'status_text' => 'Order has been successfully added!',
                    'status_icon' => 'success'
                ];
                return $this->response->setJSON($data);
            }else{
                $ordersData = $this->ordersModel->get(['lrfoims_orders.status' => 'a','lrfoims_orders.id' => $id, 'lrfoims_orders.order_status_id' => 4])[0];
                
                if(empty($ordersData['total_amount']) && $valueId == 5){
                    $data =[
                        'status'=> 'Opss',
                        'status_text' => 'Please add payments!',
                        'status_icon' => 'error'
                    ];
                    return $this->response->setJSON($data);
                }else{
                    $_POST['order_status_id'] = $valueId;
                    $this->ordersModel->update($id, $_POST);
                    $data =[
                        'status'=> 'Added Successfully',
                        'status_text' => 'Order has been successfully added!',
                        'status_icon' => 'success'
                    ];
                    return $this->response->setJSON($data);
                }
            }
        }else{
            $data =[
                'status' => 'Oops!',
                'status_text' => 'Empty Cart! Please add foods. Thank you!',
                'status_icon' => 'warning'
            ];
            return $this->response->setJSON($data);
        }
    }

    public function addOrder(){
        $this->hasPermissionRedirect('orders/a');

        $data['page_title'] = 'LRFOIMS | Orders';
        $data['title'] = 'Orders';
        $data['view'] = 'Modules\OrderManagement\Views\order\index';
        $time = new \DateTime();

        $isUpdated = 0;
        $checkDuplicateMenuId = $this->cartsModel->get(['order_id' => $_POST['order_id'], 'menu_id' => $_POST['menu_id'], 'status' => 'a']);
        if(empty($checkDuplicateMenuId)){
            if ($this->request->getMethod() == 'post') {
                if (!$this->validate('addToCartAdmin')) {
                    $data['errors'] = $this->validation->getErrors();
                    $data['value'] = $_POST;
                    $this->session->setFlashdata('error', 'Please complete all fields!');
                } else {
                    $menuIngredients = $this->menuIngredientModel->get(['menu_id' => $_POST['menu_id'], 'status' => 'a']);
                    if(!empty($menuIngredients)){
                        foreach ($menuIngredients as $menuIngredientsValue) {
                            $ingredients = $this->ingredientsModel->get(['id' => $menuIngredientsValue['ingredient_id'], 'status' => 'a'])[0];
                            
                            $ingredientStatus = $ingredients['unit_quantity'] - ($menuIngredientsValue['unit_quantity'] * $_POST['quantity']);
                            $total_unit_quantity = $menuIngredientsValue['unit_quantity'] * $_POST['quantity'];
                            if($ingredients['unit_quantity'] > $total_unit_quantity){
                                $ingredientsData[] = [
                                    'ingredient_id' => $ingredients['id'],
                                    'unit_quantity' => $ingredientStatus,
                                    'price' => $ingredients['price'] - ($menuIngredientsValue['price'] * $_POST['quantity']),
                                    'stock_out_date' => $time->format('Y-m-d H:i:s'),
                                    'product_status_id' => $total_unit_quantity > $ingredients['unit_quantity'] ? 2 : 1,
                                ];
                                $ingredientDataReports[] = [
                                    'order_id' => $_POST['order_id'],
                                    'ingredient_id' => $ingredients['id'],
                                    'unit_quantity' => $menuIngredientsValue['unit_quantity'] * $_POST['quantity'],
                                    'unit_price' => $menuIngredientsValue['price'],
                                    'product_description_id' => $ingredients['product_description_id'],
                                    'total_unit_price' => $menuIngredientsValue['price'] * $_POST['quantity'],
                                ];
                                $isUpdated = 1;
                            }else{
                                $errorDataIngredients[] = ['product_name' => $ingredients['product_name']];
                                $isUpdated = 0;
                            }
                        }
                        if(empty($errorDataIngredients)){
                            if($isUpdated == 1){
                                foreach ($ingredientDataReports as $ingredientDataReportsValue) {
                                    $reports = [
                                        'order_id' => $ingredientDataReportsValue['order_id'],
                                        'ingredient_id' => $ingredientDataReportsValue['ingredient_id'],
                                        'unit_quantity' => $ingredientDataReportsValue['unit_quantity'],
                                        'unit_price' => $ingredientDataReportsValue['unit_price'],
                                        'product_description_id' => $ingredientDataReportsValue['product_description_id'],
                                        'total_unit_price' => $ingredientDataReportsValue['total_unit_price'],
                                    ];
                                    $this->ingredientReportModel->add($reports);
                                }
                                foreach ($ingredientsData as $ingredientsDataValue) {
                                    $ingredientInfo = [
                                        'unit_quantity' => $ingredientsDataValue['unit_quantity'],
                                        'price' => $ingredientsDataValue['price'],
                                        'stock_out_date' => $ingredientsDataValue['stock_out_date'],
                                        'product_status_id' => $ingredientsDataValue['product_status_id'],
                                    ];
                                    $this->ingredientsModel->update($ingredientsDataValue['ingredient_id'], $ingredientInfo);
                                }
                                
                                $this->cartsModel->add($_POST);
                                $this->session->setFlashdata('success_no_flash', 'Menu successfully added!');
                            }
                        }else{
                            $message = "These ingredients: <br>";
                            $cnt = 1;
                            foreach ($errorDataIngredients as $value) {
                                $message .= $cnt.". ".$value['product_name']." = low stocks; <br>";
                                $cnt++;
                            }
                            $message .= "<br> Please check your ingredients.";
                            $this->session->setFlashdata('error', $message);
                        }
                    }else{
                        $this->session->setFlashdata('error', 'Added Failed! Please apply Menu Ingredients to continue. <br><small class="text-danger"><em>*(Maintenances/Menu Ingredients/Add)<br>*Request to your admin for this site.<em></small>');
                    }
                    return redirect()->to('/orders');
                }
                return redirect()->to('/orders');
            }
            return redirect()->to('/orders');
        }else{
            $this->session->setFlashdata('error_no_flash', 'You\'ve already added this menu! Please check your orders to apply changes.');
            return redirect()->to('/orders');
        }
        return view('templates/index', $data);
    }

    public function menu(){
        $this->hasPermissionRedirect('orders/admin-menu');

		$data = [
			'page_title' => 'LRFOIMS | Order Menu',
			'title' => 'Order Menu',
			'view' => 'Modules\OrderManagement\Views\menuList\index',
            'menuLists' => $this->menusModel->getDetails(['lrfoims_menus.status'=>'a']),
            'menuCategory' => $this->menuCategoryModel->get(),
            'orderType' => $this->orderTypeModel->get(),
            'adminUnavailableOrders' => $this->ordersModel->get(['user_id' => session()->get('id'), 'order_status_id'=> 1, 'status'=>'a']),
            'adminCartLists' => $this->cartsModel->getAdminCartLists(['lrfoims_carts.status'=>'a']),
            'adminCountCartLists' => $this->cartsModel->getAdminCountCartLists(['o.status'=>'u']),
            'getCreatedOrderNumber' => $this->ordersModel->get(['user_id' => session()->get('id'), 'order_status_id' => 1, 'status'=>'a']),
		];
		return view('templates/index', $data);
	}

    public function createOrderNumber(){ 
        $this->hasPermissionRedirect('orders/create-order-number');

        $orderNumber = $this->ordersModel->generateOrderNumber()[0];
            
        if ($this->request->getMethod() == 'post') {
            if(!empty($orderNumber['number'])){
                $data['number'] = $orderNumber['number'];
                $data['user_id'] = session()->get('id');
                $data['order_status_id'] = 1;
                if($this->ordersModel->add($data)){
                    $jdata =[
                        'status' => 'Success',
                        'status_text' => 'Successfully added an order!',
                        'status_icon' => 'success'
                    ];
                }else{
                    $jdata =[
                        'status' => 'Opss',
                        'status_text' => 'Something went wrong!',
                        'status_icon' => 'warning'
                    ];
                }
                return $this->response->setJSON($jdata);
            }else{
                $jdata =[
                    'status' => 'Opss',
                    'status_text' => 'Try Again!',
                    'status_icon' => 'warning'
                ];
            }
            return $this->response->setJSON($jdata);
        }
        return $this->response->setJSON($jdata);
    }
    
    public function addOrderToCartInMenuList(){
        $this->hasPermissionRedirect('orders/admin-menu/add-to-cart/a');

        $time = new \DateTime();
        $isUpdated = 0;
        $checkDuplicateMenuId = $this->cartsModel->get(['order_id' => $_POST['order_id'], 'menu_id' => $_POST['menu_id'], 'status' => 'a']);
        if(empty($checkDuplicateMenuId)){
            if ($this->request->getMethod() == 'post') {
                if (!$this->validate('addOrderToCartInMenuList')) {
                    $data['errors'] = $this->validation->getErrors();
                    $data['value'] = $_POST;
                } else {
                    $menuIngredients = $this->menuIngredientModel->get(['menu_id' => $_POST['menu_id'], 'status' => 'a']);
                    if(!empty($menuIngredients)){
                        foreach ($menuIngredients as $menuIngredientsValue) {
                            $ingredients = $this->ingredientsModel->get(['id' => $menuIngredientsValue['ingredient_id'], 'status' => 'a'])[0];
                            
                            $ingredientStatus = $ingredients['unit_quantity'] - ($menuIngredientsValue['unit_quantity'] * $_POST['quantity']);
                            $total_unit_quantity = $menuIngredientsValue['unit_quantity'] * $_POST['quantity'];
                            if($ingredients['unit_quantity'] > $total_unit_quantity){
                                $ingredientsData[] = [
                                    'ingredient_id' => $ingredients['id'],
                                    'unit_quantity' => $ingredientStatus,
                                    'price' => $ingredients['price'] - ($menuIngredientsValue['price'] * $_POST['quantity']),
                                    'stock_out_date' => $time->format('Y-m-d H:i:s'),
                                    'product_status_id' => $total_unit_quantity > $ingredients['unit_quantity'] ? 2 : 1,
                                ];
                                $ingredientDataReports[] = [
                                    'order_id' => $_POST['order_id'],
                                    'ingredient_id' => $ingredients['id'],
                                    'unit_quantity' => $menuIngredientsValue['unit_quantity'] * $_POST['quantity'],
                                    'unit_price' => $menuIngredientsValue['price'],
                                    'product_description_id' => $ingredients['product_description_id'],
                                    'total_unit_price' => $menuIngredientsValue['price'] * $_POST['quantity'],
                                ];
                                $isUpdated = 1;
                            }else{
                                $errorDataIngredients[] = ['product_name' => $ingredients['product_name']];
                                $isUpdated = 0;
                            }
                        }
                        if(empty($errorDataIngredients)){
                            if($isUpdated == 1){
                                foreach ($ingredientDataReports as $ingredientDataReportsValue) {
                                    $reports = [
                                        'order_id' => $ingredientDataReportsValue['order_id'],
                                        'ingredient_id' => $ingredientDataReportsValue['ingredient_id'],
                                        'unit_quantity' => $ingredientDataReportsValue['unit_quantity'],
                                        'unit_price' => $ingredientDataReportsValue['unit_price'],
                                        'product_description_id' => $ingredientDataReportsValue['product_description_id'],
                                        'total_unit_price' => $ingredientDataReportsValue['total_unit_price'],
                                    ];
                                    $this->ingredientReportModel->add($reports);
                                }
                                foreach ($ingredientsData as $ingredientsDataValue) {
                                    $ingredientInfo = [
                                        'unit_quantity' => $ingredientsDataValue['unit_quantity'],
                                        'price' => $ingredientsDataValue['price'],
                                        'stock_out_date' => $ingredientsDataValue['stock_out_date'],
                                        'product_status_id' => $ingredientsDataValue['product_status_id'],
                                    ];
                                    $this->ingredientsModel->update($ingredientsDataValue['ingredient_id'], $ingredientInfo);
                                }
                                
                                $this->cartsModel->add($_POST);
                                $this->session->setFlashdata('success_no_flash', 'Menu successfully added!');
                            }
                        }else{
                            $message = "These ingredients: <br>";
                            $cnt = 1;
                            foreach ($errorDataIngredients as $value) {
                                $message .= $cnt.". ".$value['product_name']." = low stocks; <br>";
                                $cnt++;
                            }
                            $message .= "<br> Please check your ingredients.";
                            $this->session->setFlashdata('error', $message);
                        }
                    }else{
                        $this->session->setFlashdata('error', 'Added Failed! Please apply Menu Ingredients to continue. <br><small class="text-danger"><em>*(Maintenances/Menu Ingredients/Add)<br>*Request to your admin for this site.<em></small>');
                    }
                    return redirect()->to('/orders/admin-menu');
                }
                return redirect()->to('/orders/admin-menu');
            }
            return redirect()->to('/orders/admin-menu');
        }else{
            $this->session->setFlashdata('error_no_flash', 'You\'ve already added this menu! Please check your orders to apply changes.');
            return redirect()->to('/orders/admin-menu');
        }
    }
    
    public function editAdminCartQty($cartId, $menuId, $orderId, $cartQyt, $routeStatus){
        $this->hasPermissionRedirect('orders/admin/cart/qty');

        $time = new \DateTime();
        $isUpdated = 0;
        if($cartQyt != $_POST['quantity']) {
            $menuIngredients = $this->menuIngredientModel->get(['menu_id' => $menuId, 'status' => 'a']);
            foreach ($menuIngredients as $menuIngredientsValue) {
                $ingredients = $this->ingredientsModel->get(['id' => $menuIngredientsValue['ingredient_id'], 'status' => 'a'])[0];
                // unit quantity 
                $ingredientStatus = $ingredients['unit_quantity'] - ($menuIngredientsValue['unit_quantity'] * number_format($_POST['quantity'],2));
                $ingredientReturnStatus = $ingredientStatus + ($menuIngredientsValue['unit_quantity'] * $cartQyt);
                // price
                $ingredientPrice = ($ingredients['price'] - ($menuIngredientsValue['price'] * number_format($_POST['quantity'],2)));
                $ingredientReturnPrice = $ingredientPrice + ($menuIngredientsValue['price'] * $cartQyt);
    
                $total_unit_quantity = $menuIngredientsValue['unit_quantity'] * number_format($_POST['quantity'],2);
                if($ingredients['unit_quantity'] > $total_unit_quantity){
                    $ingredientsDataReturn[] = [
                        'ingredient_id' => $ingredients['id'],
                        'unit_quantity' => $ingredientReturnStatus,
                        'price' => $ingredientReturnPrice,
                        'stock_out_date' => $time->format('Y-m-d H:i:s'),
                        'product_status_id' => $ingredientReturnStatus > $total_unit_quantity ? 2 : 1,
                    ];
                    $ingredientDataReports[] = [
                        'order_id' => $orderId,
                        'ingredient_id' => $ingredients['id'],
                        'unit_quantity' => $menuIngredientsValue['unit_quantity'] * number_format($_POST['quantity'],2),
                        'unit_price' => $menuIngredientsValue['price'],
                        'product_description_id' => $ingredients['product_description_id'],
                        'total_unit_price' => $menuIngredientsValue['price'] * number_format($_POST['quantity'],2),
                    ];
                    $isUpdated = 1;
                }else{
                    $errorDataIngredients[] = ['product_name' => $ingredients['product_name']];
                    $isUpdated = 0;
                }
                $ingredientReports = $this->ingredientReportModel->get(['order_id' => $orderId,'ingredient_id' => $ingredients['id'], 'status' => 'a'])[0];
                if(!empty($ingredientReports)){
                    $ingredientReportData[] = ['id' => $ingredientReports['id']];
                }
            }
            if(empty($errorDataIngredients)){
                if($isUpdated == 1){
                    foreach ($ingredientReportData as $ingredientId) {
                        $this->ingredientReportModel->softDelete($ingredientId['id']);
                    }
                    foreach ($ingredientDataReports as $ingredientDataReportsValue) {
                        $reports = [
                            'order_id' => $ingredientDataReportsValue['order_id'],
                            'ingredient_id' => $ingredientDataReportsValue['ingredient_id'],
                            'unit_quantity' => $ingredientDataReportsValue['unit_quantity'],
                            'unit_price' => $ingredientDataReportsValue['unit_price'],
                            'product_description_id' => $ingredientDataReportsValue['product_description_id'],
                            'total_unit_price' => $ingredientDataReportsValue['total_unit_price'],
                        ];
                        $this->ingredientReportModel->add($reports);
                    }
                    foreach ($ingredientsDataReturn as $ingredientsDataReturnValue) {
                        $ingredientInfoReturn = [
                            'unit_quantity' => $ingredientsDataReturnValue['unit_quantity'],
                            'price' => $ingredientsDataReturnValue['price'],
                            'stock_out_date' => $ingredientsDataReturnValue['stock_out_date'],
                            'product_status_id' => $ingredientsDataReturnValue['product_status_id'],
                        ];
                        $this->ingredientsModel->update($ingredientsDataReturnValue['ingredient_id'], $ingredientInfoReturn);
                    }
                    if($routeStatus == '2' || $routeStatus == 2){
                        $this->cartsModel->update($cartId, $_POST);
                        $this->session->setFlashdata('success_no_flash', 'Menu Quantity Updated!');
                        return redirect()->to('/orders');
                    }else{
                        $this->cartsModel->update($cartId, $_POST);
                        $this->session->setFlashdata('success_no_flash', 'Menu Quantity Updated!');
                        return redirect()->to('/orders/admin-menu');
                    }
                }
            }else{
                $message = "These ingredients: <br>";
                $cnt = 1;
                foreach ($errorDataIngredients as $value) {
                    $message .= $cnt.". ".$value['product_name']." = low stocks; <br>";
                    $cnt++;
                }
                $message .= "<br> Please check your ingredients!";
                $this->session->setFlashdata('error', $message);
                return redirect()->to('/orders/admin-menu');
            }
        }else{
            $this->session->setFlashdata('warning', 'Have the same value you\'ve inputted! If you want changes for your quantity. Please input higher or less than the value.');
            return redirect()->to('/orders');
        }
    }

    public function editAdminMenuCartQty($cartId, $menuId, $orderId, $cartQyt, $routeStatus){
        $this->hasPermissionRedirect('orders/admin-menu/cart/qty');

        $time = new \DateTime();
        $isUpdated = 0;
        if($cartQyt != $_POST['quantity']) {
            $menuIngredients = $this->menuIngredientModel->get(['menu_id' => $menuId, 'status' => 'a']);
            foreach ($menuIngredients as $menuIngredientsValue) {
                $ingredients = $this->ingredientsModel->get(['id' => $menuIngredientsValue['ingredient_id'], 'status' => 'a'])[0];
                // unit quantity 
                $ingredientStatus = $ingredients['unit_quantity'] - ($menuIngredientsValue['unit_quantity'] * number_format($_POST['quantity'],2));
                $ingredientReturnStatus = $ingredientStatus + ($menuIngredientsValue['unit_quantity'] * $cartQyt);
                // price
                $ingredientPrice = ($ingredients['price'] - ($menuIngredientsValue['price'] * number_format($_POST['quantity'],2)));
                $ingredientReturnPrice = $ingredientPrice + ($menuIngredientsValue['price'] * $cartQyt);
    
                $total_unit_quantity = $menuIngredientsValue['unit_quantity'] * number_format($_POST['quantity'],2);
                if($ingredients['unit_quantity'] > $total_unit_quantity){
                    $ingredientsDataReturn[] = [
                        'ingredient_id' => $ingredients['id'],
                        'unit_quantity' => $ingredientReturnStatus,
                        'price' => $ingredientReturnPrice,
                        'stock_out_date' => $time->format('Y-m-d H:i:s'),
                        'product_status_id' => $ingredientReturnStatus > $total_unit_quantity ? 2 : 1,
                    ];
                    $ingredientDataReports[] = [
                        'order_id' => $orderId,
                        'ingredient_id' => $ingredients['id'],
                        'unit_quantity' => $menuIngredientsValue['unit_quantity'] * number_format($_POST['quantity'],2),
                        'unit_price' => $menuIngredientsValue['price'],
                        'product_description_id' => $ingredients['product_description_id'],
                        'total_unit_price' => $menuIngredientsValue['price'] * number_format($_POST['quantity'],2),
                    ];
                    $isUpdated = 1;
                }else{
                    $errorDataIngredients[] = ['product_name' => $ingredients['product_name']];
                    $isUpdated = 0;
                }
                $ingredientReports = $this->ingredientReportModel->get(['order_id' => $orderId,'ingredient_id' => $ingredients['id'], 'status' => 'a'])[0];
                if(!empty($ingredientReports)){
                    $ingredientReportData[] = ['id' => $ingredientReports['id']];
                }
            }
            if(empty($errorDataIngredients)){
                if($isUpdated == 1){
                    foreach ($ingredientReportData as $ingredientId) {
                        $this->ingredientReportModel->softDelete($ingredientId['id']);
                    }
                    foreach ($ingredientDataReports as $ingredientDataReportsValue) {
                        $reports = [
                            'order_id' => $ingredientDataReportsValue['order_id'],
                            'ingredient_id' => $ingredientDataReportsValue['ingredient_id'],
                            'unit_quantity' => $ingredientDataReportsValue['unit_quantity'],
                            'unit_price' => $ingredientDataReportsValue['unit_price'],
                            'product_description_id' => $ingredientDataReportsValue['product_description_id'],
                            'total_unit_price' => $ingredientDataReportsValue['total_unit_price'],
                        ];
                        $this->ingredientReportModel->add($reports);
                    }
                    foreach ($ingredientsDataReturn as $ingredientsDataReturnValue) {
                        $ingredientInfoReturn = [
                            'unit_quantity' => $ingredientsDataReturnValue['unit_quantity'],
                            'price' => $ingredientsDataReturnValue['price'],
                            'stock_out_date' => $ingredientsDataReturnValue['stock_out_date'],
                            'product_status_id' => $ingredientsDataReturnValue['product_status_id'],
                        ];
                        $this->ingredientsModel->update($ingredientsDataReturnValue['ingredient_id'], $ingredientInfoReturn);
                    }
                    if($routeStatus == '2' || $routeStatus == 2){
                        $this->cartsModel->update($cartId, $_POST);
                        $this->session->setFlashdata('success_no_flash', 'Menu Quantity Updated!');
                        return redirect()->to('/orders');
                    }else{
                        $this->cartsModel->update($cartId, $_POST);
                        $this->session->setFlashdata('success_no_flash', 'Menu Quantity Updated!');
                        return redirect()->to('/orders/admin-menu');
                    }
                }
            }else{
                $message = "These ingredients: <br>";
                $cnt = 1;
                foreach ($errorDataIngredients as $value) {
                    $message .= $cnt.". ".$value['product_name']." = low stocks; <br>";
                    $cnt++;
                }
                $message .= "<br> Please check your ingredients!";
                $this->session->setFlashdata('error', $message);
                return redirect()->to('/orders/admin-menu');
            }
        }else{
            $this->session->setFlashdata('warning', 'Have the same value you\'ve inputted! If you want changes for your quantity. Please input higher or less than the value.');
            return redirect()->to('/orders');
        }
    }

    public function submitAdminOrderCarts($id){
        $this->hasPermissionRedirect('orders/admin-menu/submit-orders');

        $data = [
            'page_title' => 'LRFOIMS | Order Menu',
            'title' => 'Order Menu',
            'view' => 'Modules\OrderManagement\Views\menuList\index',
            'menuLists' => $this->menusModel->getDetails(['lrfoims_menus.status'=>'a']),
            'menuCategory' => $this->menuCategoryModel->get(),
            'orderType' => $this->orderTypeModel->get(),
            'adminUnavailableOrders' => $this->ordersModel->get(['user_id' => session()->get('id'), 'order_status_id'=> 1, 'status'=>'a']),
            'adminCartLists' => $this->cartsModel->getAdminCartLists(['lrfoims_carts.status'=>'a']),
            'adminCountCartLists' => $this->cartsModel->getAdminCountCartLists(['o.status'=>'u']),
            'getCreatedOrderNumber' => $this->ordersModel->get(['user_id' => session()->get('id'), 'order_status_id' => 1, 'status'=>'a']),
        ];
        $_POST['order_status_id'] = 2;
        $_POST['status'] = 'a';
        if ($this->request->getMethod() == 'post') {
            $getCart = $this->cartsModel->get(['order_id' => $id, 'status'=>'a']);
            if (!$this->validate('submitOrderToCartInMenuList')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                if(!empty($getCart)){
                    $this->ordersModel->update($id, $_POST);
                    $this->session->setFlashdata('success', 'Order successfully submitted!');
                    return redirect()->to('/orders');
                }else{
                    $this->session->setFlashdata('error_no_flash', '<b>Empty Cart!</b> Please add to cart. Thank you.');
                    return redirect()->to('/orders/admin-menu');
                }
            }
        }
        return view('templates/index', $data);
    }
    
    public function addAdminPayment($id, $totalAmount){
        $this->hasPermissionRedirect('orders/admin/add-payment/u');
        
        $orders = $this->ordersModel->get(['id' => $id, 'status' => 'a'])[0];
        $getCart = $this->cartsModel->get(['order_id' => $id, 'status'=>'a']);
        if(!empty($getCart)){
            if ($this->request->getMethod() == 'post') {
                if($totalAmount <= $_POST['c_cash']){
                    $data = [
                        'total_amount' => $totalAmount,
                        'c_cash' => $_POST['c_cash'],
                        'c_balance' => $_POST['c_cash'] - $totalAmount
                    ];
                    if($this->ordersModel->update($orders['id'], $data)){
                        
                        $jdata =[
                            'status' => 'Success',
                            'status_text' => 'Successfully added a payment!',
                            'status_icon' => 'success'
                        ];
                    } else{
                        $jdata =[
                            'status' => 'Oops!',
                            'status_text' => 'Something went wrong!',
                            'status_icon' => 'warning'
                        ];
                    }
                    return $this->response->setJSON($jdata);
                }else{
                    $jdata =[
                        'status' => 'Oops!',
                        'status_text' => 'Please pay higher than your bill!',
                        'status_icon' => 'warning'
                    ];
                }
            }
        }else{
            $jdata =[
                'status' => 'Oops!',
                'status_text' => 'Empty Cart! Please add foods. Thank you!',
                'status_icon' => 'warning'
            ];
        }
		return $this->response->setJSON($jdata);
    }

    public function editQty($id){
        $this->hasPermissionRedirect('');
        $data = [
            'page_title' => 'LRFOIMS | Orders',
            'title' => 'Orders',
            'view' => 'Modules\OrderManagement\Views\orders\orders'
        ];
        if ($this->request->getMethod() == 'post') {
            $this->cartsModel->update($id, $_POST);
            $this->session->setFlashdata('success_no_flash', 'Menu Quantity Updated!');
            return redirect()->to('/orders');
        }

        return view('templates/index', $data);
    }
    
    public function deleteAdminCart($cartId, $menuId, $orderId, $cartQyt){
        $this->hasPermissionRedirect('orders/admin-menu/cart/d');

        $time = new \DateTime();
        $isDeleted = 0;
        $menuIngredients = $this->menuIngredientModel->get(['menu_id' => $menuId, 'status' => 'a']);
        foreach ($menuIngredients as $menuIngredientsValue) {
            $ingredients = $this->ingredientsModel->get(['id' => $menuIngredientsValue['ingredient_id'], 'status' => 'a'])[0];
            $ingredientStatus = $ingredients['unit_quantity'] + ($menuIngredientsValue['unit_quantity'] * $cartQyt);
            $ingredientsReturnData[] = [
                'ingredient_id' => $ingredients['id'],
                'unit_quantity' => $ingredientStatus,
                'price' => $ingredients['price'] + ($menuIngredientsValue['price'] * $cartQyt),
                'stock_out_date' => $time->format('Y-m-d H:i:s'),
                'product_status_id' => ($ingredientStatus < 0.01 ? 2 : 1),
            ];
            $isDeleted = 1;
            $ingredientReports = $this->ingredientReportModel->get(['order_id' => $orderId,'ingredient_id' => $ingredients['id'], 'status' => 'a'])[0];
             
            if(!empty($ingredientReports)){
                $ingredientReportData[] = ['id' => $ingredientReports['id']];
                $isDeleted = 1;
            }
        }
        if($isDeleted == 1){
            foreach ($ingredientReportData as $ingredientId) {
                $this->ingredientReportModel->softDelete($ingredientId['id']);
            }
            foreach ($ingredientsReturnData as $ingredientsDataValue) {
                $ingredientInfo = [
                    'unit_quantity' => $ingredientsDataValue['unit_quantity'],
                    'price' => $ingredientsDataValue['price'],
                    'stock_out_date' => $ingredientsDataValue['stock_out_date'],
                    'product_status_id' => $ingredientsDataValue['product_status_id'],
                ];
                $this->ingredientsModel->update($ingredientsDataValue['ingredient_id'], $ingredientInfo);
            }
            $data =[
                'status'=> 'Deleted Successfully',
                'status_text' => 'Cart Successfully Deleted',
                'status_icon' => 'success'
            ];
            $this->cartsModel->softDelete($cartId);
            return $this->response->setJSON($data);
        }else{
            $data =[
                'status'=> 'Opps',
                'status_text' => 'Error encountered',
                'status_icon' => 'error'
            ];
            return $this->response->setJSON($data);
        }
        return $this->response->setJSON($data);
    }

    public function deleteCart($cartId, $menuId, $orderId, $cartQyt){
        $this->hasPermissionRedirect('orders/cart/d');

        $time = new \DateTime();
        $isDeleted = 0;
        $menuIngredients = $this->menuIngredientModel->get(['menu_id' => $menuId, 'status' => 'a']);
        foreach ($menuIngredients as $menuIngredientsValue) {
            $ingredients = $this->ingredientsModel->get(['id' => $menuIngredientsValue['ingredient_id'], 'status' => 'a'])[0];
            $ingredientStatus = $ingredients['unit_quantity'] + ($menuIngredientsValue['unit_quantity'] * $cartQyt);
            $ingredientsReturnData[] = [
                'ingredient_id' => $ingredients['id'],
                'unit_quantity' => $ingredients['unit_quantity'] + ($menuIngredientsValue['unit_quantity'] * $cartQyt),
                'price' => $ingredients['price'] + ($menuIngredientsValue['price'] * $cartQyt),
                'stock_out_date' => $time->format('Y-m-d H:i:s'),
                'product_status_id' => ($ingredientStatus < 0.01 ? 2 : 1),
            ];
            $isDeleted = 1;
            $ingredientReports = $this->ingredientReportModel->get(['order_id' => $orderId,'ingredient_id' => $ingredients['id'], 'status' => 'a'])[0];
             
            if(!empty($ingredientReports)){
                $ingredientReportData[] = ['id' => $ingredientReports['id']];
                $isDeleted = 1;
            }
        }
        if($isDeleted == 1){
            foreach ($ingredientReportData as $ingredientId) {
                $this->ingredientReportModel->softDelete($ingredientId['id']);
            }
            foreach ($ingredientsReturnData as $ingredientsDataValue) {
                $ingredientInfo = [
                    'unit_quantity' => $ingredientsDataValue['unit_quantity'],
                    'price' => $ingredientsDataValue['price'],
                    'stock_out_date' => $ingredientsDataValue['stock_out_date'],
                    'product_status_id' => $ingredientsDataValue['product_status_id'],
                ];
                $this->ingredientsModel->update($ingredientsDataValue['ingredient_id'], $ingredientInfo);
            }
            $data =[
                'status'=> 'Deleted Successfully',
                'status_text' => 'Cart Successfully Deleted',
                'status_icon' => 'success'
            ];
            $this->cartsModel->softDelete($cartId);
            return $this->response->setJSON($data);
        }else{
            $data =[
                'status'=> 'Opps!',
                'status_text' => 'Error encountered!',
                'status_icon' => 'error'
            ];
            return $this->response->setJSON($data);
        }
        return $this->response->setJSON($data);
    }

    public function delete($id){
        $this->hasPermissionRedirect('orders/d');

        $time = new \DateTime();
        $isDeleted = 0;
        $cartDetails = $this->cartsModel->get(['order_id' => $id, 'status' => 'a']);
        if(!empty($cartDetails)){
            foreach ($cartDetails as $cartDetailsValue) {
                $menuIngredients = $this->menuIngredientModel->get(['menu_id' => $cartDetailsValue['menu_id'], 'status' => 'a']);
                foreach ($menuIngredients as $menuIngredientsValue) {
                    $ingredients = $this->ingredientsModel->get(['id' => $menuIngredientsValue['ingredient_id'], 'status' => 'a'])[0];
                    $ingredientStatus = $ingredients['unit_quantity'] + ($menuIngredientsValue['unit_quantity'] * $cartDetailsValue['quantity']);
                    $ingredientsReturnData[] = [
                        'ingredient_id' => $ingredients['id'],
                        'unit_quantity' => $ingredients['unit_quantity'] + ($menuIngredientsValue['unit_quantity'] * $cartDetailsValue['quantity']),
                        'price' => $ingredients['price'] + ($menuIngredientsValue['price'] * $cartDetailsValue['quantity']),
                        'stock_out_date' => $time->format('Y-m-d H:i:s'),
                        'product_status_id' => ($ingredientStatus < 0.01 ? 2 : 1)
                    ];
                    $isDeleted = 1;
                    $ingredientReports = $this->ingredientReportModel->get(['order_id' => $id,'ingredient_id' => $ingredients['id'], 'status' => 'a'])[0];
                     
                    $cartId[] = ['id' => $cartDetailsValue['id']];
                    if(!empty($ingredientReports)){
                        $ingredientReportData[] = ['id' => $ingredientReports['id']];
                    }
                }
            }
        }else{
            $data =[
                'status'=> 'Deleted Successfully!',
                'status_text' => 'Order Successfully Deleted!',
                'status_icon' => 'success'
            ];
            $this->ordersModel->softDelete($id);
            return $this->response->setJSON($data);
        }
        if($isDeleted == 1){
            foreach ($ingredientReportData as $ingredientId) {
                $this->ingredientReportModel->softDelete($ingredientId['id']);
            }
            foreach ($ingredientsReturnData as $ingredientsDataValue) {
                $ingredientInfo = [
                    'unit_quantity' => $ingredientsDataValue['unit_quantity'],
                    'price' => $ingredientsDataValue['price'],
                    'stock_out_date' => $ingredientsDataValue['stock_out_date'],
                    'product_status_id' => $ingredientsDataValue['product_status_id'],
                ];
                $this->ingredientsModel->update($ingredientsDataValue['ingredient_id'], $ingredientInfo);
            }
            foreach ($cartId as $cartIdValue) {
                $this->cartsModel->softDelete($cartIdValue['id']);
            }
            $data =[
                'status'=> 'Deleted Successfully!',
                'status_text' => 'Order Successfully Deleted!',
                'status_icon' => 'success'
            ];
            $this->ordersModel->softDelete($id);
        }else{
            $data =[
                'status'=> 'Opps',
                'status_text' => 'Error encountered!',
                'status_icon' => 'error'
            ];
        }
        return $this->response->setJSON($data);
    }
	//--------------------------------------------------------------------
}
