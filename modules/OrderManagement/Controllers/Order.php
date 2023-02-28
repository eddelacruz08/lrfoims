<?php namespace Modules\OrderManagement\Controllers;

use Modules\OrderManagement\Models as OrderManagement;
use Modules\MenuManagement\Models as MenuManagement;
use Modules\SystemSettings\Models as SystemSettings;
use Modules\ProductManagement\Models as ProductManagement;
use Modules\UserManagement\Models as UserManagement;
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
        $this->ingredientsModel = new ProductManagement\ProductModel();
		$this->menuIngredientModel = new SystemSettings\MenuIngredientModel();
        $this->ingredientReportModel = new IngredientReportManagement\IngredientReportModel();
		$this->regionModel = new SystemSettings\RegionModel();
		$this->provinceModel = new SystemSettings\ProvinceModel();
		$this->cityModel = new SystemSettings\CityModel();
		$this->usersModel = new UserManagement\UsersModel();
		$this->orderLimitModel = new SystemSettings\OrderLimitModel();
		$this->deliveryFeeModel = new SystemSettings\DeliveryFeeModel();
		$this->paymentMethodModel = new SystemSettings\PaymentMethodModel();
		$this->orderDiscountModel = new SystemSettings\OrderDiscountModel();
		$this->messageModel = new OrderManagement\MessageModel();
		$this->VATModel = new SystemSettings\VATModel();
		$this->couponModel = new SystemSettings\CouponModel();
		helper(['link','form', 'paginater']);
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

	public function addChat() {
		if(!session()->get('username')) return redirect()->to('/');

		if($this->request->getMethod() == 'post') {
			$rules = [
				'message' => 'required'
			];

			if(!$this->validate($rules)) {
				return $this->fail($this->validator->getErrors());
			} else {
				$msg = [
					'username' => session()->get('username'),
					'order_id' => $this->request->getVar('order_id'),
					'user_id' => session()->get('id'),
					'message' => $this->request->getVar('message')
				];
				$this->messageModel->save($msg);
				return $this->response->setJSON($msg);
			}

		}
	}

	public function getMessage($orderId) {
		$data = $this->messageModel->where('order_id', $orderId)->orderBy('id', 'ASC')->findAll();
		return $this->response->setJSON($data);
	}

	public function getPendingOrders(){

		$offset = 0;
		$data['all_items'] = $this->ordersModel->getOrderDetails(['lrfoims_orders.order_status_id'=>2,'lrfoims_orders.status'=>'a']);
		$data['offset'] = $offset;
		$data['limitPerTable'] = $this->limitPerTable;
		$data['getPendingOrders'] = $this->ordersModel->getPendingOrderDetails(['lrfoims_orders.order_status_id'=>2,'lrfoims_orders.status'=>'a'], $this->limitPerTable, $offset);
		
		return view('Modules\DashboardManagement\Views\dashboard\pendingOrders', $data);
	}
	
	public function getPendingOrdersPerPage(){

		$data['all_items'] = $this->ordersModel->getOrderDetails(['lrfoims_orders.order_status_id'=>2,'lrfoims_orders.status'=>'a']);
		$data['offset'] = $_GET['offset'];
		$data['limitPerTable'] = $this->limitPerTable;
		$data['getPendingOrders'] = $this->ordersModel->getPendingOrderDetails(['lrfoims_orders.order_status_id'=>2,'lrfoims_orders.status'=>'a'], $this->limitPerTable, $_GET['offset']);
		
		return view('Modules\DashboardManagement\Views\dashboard\pendingOrders', $data);
	}

    public function orderTypeListData($orderType){
        $data['orderMaxLimit'] = $this->orderLimitModel->get(['status' => 'a'])[0];
        $data['getOrderTypeDetails'] = $this->ordersModel->getOrderTypeDetails([1, 2, 3, 4, 5], $orderType);
        return view('Modules\OrderManagement\Views\order\order_type_list_data', $data);
    }

    public function cartRefreshAndCancelButtons(){
        return view('Modules\OrderManagement\Views\menuList\refreshAndCancelButtons');
    }
    
    public function getInfo(){
		$data['userLists'] = $this->usersModel->get();
		$data['regions'] = $this->regionModel->get(['status'=>'a']); 
		$data['provinces'] = $this->provinceModel->get(['status'=>'a']); 
		$data['cities'] = $this->cityModel->get(['status'=>'a']);
        $data['getPaymentMethod'] = $this->paymentMethodModel->get(['status'=>'a']);
        $data['getVAT'] = $this->VATModel->get(['status'=>'a'])[0];
        $getVatable = $this->VATModel->get(['status'=>'a'])[0];
        $data['getOrderUserDiscount'] = $this->orderDiscountModel->get(['status'=>'a']);
        $data['getDeliveryFee'] = $this->deliveryFeeModel->get(['status'=>'a'])[0];
        $data['orderMaxLimit'] = $this->orderLimitModel->get(['status' => 'a'])[0];
        $data['getCarts'] = $this->cartsModel->getCarts(['lrfoims_carts.status' => 'a']);
        $data['getCartTotalPrice'] = $this->cartsModel->getCartTotalPrice(['lrfoims_carts.status' => 'a'], null, null, $getVatable['divide_vat'], $getVatable['multiply_vat']);
        $data['getOrderTypeDetails'] = $this->ordersModel->getOrderTypeInfo($_GET['id'], [1, 2, 3, 4, 5]);
        return view('Modules\OrderManagement\Views\order\order_type_info', $data);
    }
    
    public function getCartInfoForPrint(){
		$data['userLists'] = $this->usersModel->get();
		$data['regions'] = $this->regionModel->get(['status'=>'a']); 
		$data['provinces'] = $this->provinceModel->get(['status'=>'a']); 
		$data['cities'] = $this->cityModel->get(['status'=>'a']);
        $data['getPaymentMethod'] = $this->paymentMethodModel->get(['status'=>'a']);
        $data['getVAT'] = $this->VATModel->get(['status'=>'a'])[0];
        $getVatable = $this->VATModel->get(['status'=>'a'])[0];
        $data['getOrderUserDiscount'] = $this->orderDiscountModel->get(['status'=>'a']);
        $data['getDeliveryFee'] = $this->deliveryFeeModel->get(['status'=>'a'])[0];
        $data['orderMaxLimit'] = $this->orderLimitModel->get(['status' => 'a'])[0];
        $data['getCarts'] = $this->cartsModel->getCarts(['lrfoims_carts.status' => 'a']);
        $data['getCartTotalPrice'] = $this->cartsModel->getCartTotalPrice(['lrfoims_carts.status' => 'a'], null, null, $getVatable['divide_vat'], $getVatable['multiply_vat']);
        $data['getOrderTypeDetails'] = $this->ordersModel->getOrderTypeInfo($_GET['id'], [1, 2, 3, 4, 5, 7]);
        return $this->response->setJSON($data);
    }

    public function placeOrder($id, $orderStatusId){
        $this->hasPermissionRedirect('orders/place-order/u');

        $getCart = $this->cartsModel->get(['order_id' => $id, 'status'=>'a']);
        if(!empty($getCart)){
            if($orderStatusId == 1 || $orderStatusId == 2 || $orderStatusId == 3 || $orderStatusId == 4){
                $_POST['order_status_id'] = $orderStatusId;
                $this->ordersModel->update($id, $_POST);
                $data =[
                    'status'=> 'Added Successfully',
                    'status_text' => 'Success!',
                    'status_icon' => 'success'
                ];
                return $this->response->setJSON($data);
            } else {
                $ordersData = $this->ordersModel->get(['lrfoims_orders.status' => 'a','lrfoims_orders.id' => $id])[0];
                
                if(empty($ordersData['total_amount']) && $orderStatusId == 5){
                    $data =[
                        'status'=> 'Opss',
                        'status_text' => 'Please add payments!',
                        'status_icon' => 'error'
                    ];
                    return $this->response->setJSON($data);
                }else{
                    $_POST['order_status_id'] = $orderStatusId;
                    $this->ordersModel->update($id, $_POST);
                    $data =[
                        'status'=> 'Added Successfully',
                        'status_text' => 'Success!',
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

    public function addOrderResponse(){
        $this->hasPermissionRedirect('orders/a');

        $isUpdated = 0;
        $checkDuplicateMenuId = $this->cartsModel->get(['order_id' => $_POST['order_id'], 'menu_id' => $_POST['menu_id'], 'status' => 'a']);
        if(empty($checkDuplicateMenuId)){
            if ($this->request->getMethod() == 'post') {
                $menuIngredients = $this->menuIngredientModel->get(['menu_id' => $_POST['menu_id'], 'status' => 'a']);
                if(!empty($menuIngredients)){
                    $orderMaxLimit = $this->orderLimitModel->get(['status' => 'a'])[0];
                    $menuTotal = $this->cartsModel->getCountMenuTypePerOrder(['lrfoims_carts.order_id'=> $_POST['order_id'], 'm.menu_type'=> 'a', 'lrfoims_carts.status'=> 'a'])[0];

                    if($menuTotal['total_menu'] <= $orderMaxLimit['max_limit']){
                        foreach ($menuIngredients as $menuIngredientsValue) {
                            $ingredients = $this->ingredientsModel->get(['id' => $menuIngredientsValue['ingredient_id'], 'status' => 'a'])[0];
                            
                            $ingredientStatus = $ingredients['unit_quantity'] - ($menuIngredientsValue['unit_quantity'] * $_POST['quantity']);
                            $total_unit_quantity = $menuIngredientsValue['unit_quantity'] * $_POST['quantity'];
                            if($ingredients['unit_quantity'] > $total_unit_quantity){
                                $ingredientsData[] = [
                                    'ingredient_id' => $ingredients['id'],
                                    'unit_quantity' => $ingredientStatus,
                                    'product_status_id' => $total_unit_quantity > $ingredients['unit_quantity'] ? 2 : 1,
                                ];
                                $isUpdated = 1;
                            }else{
                                $errorDataIngredients[] = ['product_name' => $ingredients['product_name']];
                                $isUpdated = 0;
                            }
                        }
                        if(empty($errorDataIngredients)){
                            if($isUpdated == 1){
                                foreach ($ingredientsData as $ingredientsDataValue) {
                                    $ingredientInfo = [
                                        'unit_quantity' => $ingredientsDataValue['unit_quantity'],
                                        'product_status_id' => $ingredientsDataValue['product_status_id'],
                                    ];
                                    $this->ingredientsModel->update($ingredientsDataValue['ingredient_id'], $ingredientInfo);
                                }
                                $this->cartsModel->add($_POST);
                                $jdata =[
                                    'status' => 'Success',
                                    'status_text' => 'Menu successfully added!',
                                    'status_icon' => 'success'
                                ];
                                return $this->response->setJSON($jdata);
                            }
                        }else{
                            $message = "These ingredients: ";
                            $cnt = 1;
                            foreach ($errorDataIngredients as $value) {
                                $message .= $cnt.". ".$value['product_name']." -> ";
                                $cnt++;
                            }
                            $message .= "Please check your ingredients.";
                            $jdata =[
                                'status' => 'Out of stocks',
                                'status_text' => $message,
                                'status_icon' => 'error'
                            ];
                            return $this->response->setJSON($jdata);
                        }
                    }else{
                        $jdata =[
                            'status' => 'Added Failed!',
                            'status_text' => 'You\\\'ve reached a maximum order!',
                            'status_icon' => 'error'
                        ];
                        return $this->response->setJSON($jdata);
                    }
                }else{
                    $jdata =[
                        'status' => 'Added Failed!',
                        'status_text' => 'Please apply Menu Ingredients to continue. *(Maintenances/Menu Ingredients/Add) Request to your admin for this site.',
                        'status_icon' => 'error'
                    ];
                    return $this->response->setJSON($jdata);
                }
                return $this->response->setJSON($jdata);
            }
        }else{
            $jdata =[
                'status' => 'Error',
                'status_text' => 'You\'ve already added this menu! Please check your orders to apply changes.',
                'status_icon' => 'error'
            ];
            return $this->response->setJSON($jdata);
        }
    }

    public function menu(){
        $this->hasPermissionRedirect('orders/admin-menu');
        // session()->set('local_admin_menu_order_id', 26);
		$data = [
			'page_title' => 'LRFOIMS | Order Menu',
			'title' => 'Order Menu',
			'view' => 'Modules\OrderManagement\Views\menuList\index',
            'menuLists' => $this->menusModel->getDetails(['lrfoims_menus.status'=>'a']),
            'menuCategory' => $this->menuCategoryModel->get(),
            'orderType' => $this->orderTypeModel->get(),
		];
		return view('templates/menu_order_index', $data);
	}

    public function adminMenu(){
		return view('Modules\OrderManagement\Views\menuList\adminMenu');
	}

    public function menuList(){
        $this->hasPermissionRedirect('orders/admin-menu');

		$data = [
            'menuLists' => $this->menusModel->getDetails(['lrfoims_menus.status'=>'a']),
            'menuCategory' => $this->menuCategoryModel->get(),
            'getCreatedOrderNumber' => $this->ordersModel->get(['id' => session()->get('local_admin_menu_order_id'), 'order_status_id' => 1, 'status'=>'a']),
		];
		return view('Modules\OrderManagement\Views\menuList\menuList', $data);
	}

    public function cartList(){
        $this->hasPermissionRedirect('orders/admin-menu');

        $data['getPaymentMethod'] = $this->paymentMethodModel->get(['status'=>'a']);
        $data['getVAT'] = $this->VATModel->get(['status'=>'a'])[0];
        $getVatable = $this->VATModel->get(['status'=>'a'])[0];
        $data['getOrderUserDiscount'] = $this->orderDiscountModel->get(['status'=>'a']);
        $data['getDeliveryFee'] = $this->deliveryFeeModel->get(['status'=>'a'])[0];
        $data['orderMaxLimit'] = $this->orderLimitModel->get(['status' => 'a'])[0];
        $data['getCarts'] = $this->cartsModel->getCarts(['lrfoims_carts.status' => 'a']);
        $data['getOrderType'] = $this->orderTypeModel->get(['status' => 'a']);
        $data['getCartTotalPrice'] = $this->cartsModel->getCartTotalPrice(['lrfoims_carts.status' => 'a'], null, null, $getVatable['divide_vat'], $getVatable['multiply_vat']);
        $data['getOrderTypeDetails'] = $this->ordersModel->getOrderTypeInfo($_GET['id'], [1, 2, 3, 4, 5]);
		return view('Modules\OrderManagement\Views\menuList\cartList', $data);
	}
    
    public function getOrderTypeListAndPaymentMethodList(){
        
        $data['getPaymentMethod'] = $this->paymentMethodModel->get(['status'=>'a']);
        $data['getOrderType'] = $this->orderTypeModel->get(['status' => 'a']);
        return $this->response->setJSON($data);
	}

    public function applyCouponDiscount(){ 

        if ($this->request->getMethod() == 'post') {
            $couponCode = $this->couponModel->get(['code' => $_POST['coupon_code']]);
            if(!empty($couponCode)){
                foreach ($couponCode as $value) {
                    if($_POST['coupon_code'] == $value['code'] && $value['status'] == 'a'){

                        $couponData = [
                            'status' => 'd'
                        ];
                        if($this->couponModel->update($value['id'], $couponData)){

                            $orderData = [
                                'coupon_code' => $value['code'],
                                'coupon_discount' => $value['amount']
                            ];
                            $this->ordersModel->update($_POST['order_id'], $orderData);

                            $jdata =[
                                'status' => 'Success',
                                'status_text' => 'Successfully added!',
                                'status_icon' => 'success'
                            ];
                            return $this->response->setJSON($jdata);
                        }else{
                            $jdata =[
                                'status' => 'Opss',
                                'status_text' => 'Something went wrong!',
                                'status_icon' => 'warning'
                            ];
                            return $this->response->setJSON($jdata);
                        }
                    }else{
                        $jdata =[
                            'status' => 'Opss',
                            'status_text' => 'Already used code!',
                            'status_icon' => 'warning'
                        ];
                        return $this->response->setJSON($jdata);
                    }
                }

            }else{
                $jdata =[
                    'status' => 'Error',
                    'status_text' => 'Invalid coupon code!',
                    'status_icon' => 'error'
                ];
                return $this->response->setJSON($jdata);
            }
        }
    }

    public function createOrderNumber(){ 
        $this->hasPermissionRedirect('orders/create-order-number');

		function random_string($length) {
			$key = '';
			$keys = range(0, 9);
			for ($i = 0; $i < $length; $i++) {
				$key .= $keys[array_rand($keys)];
			}
			return $key;
		}
		$orderNumberIsTrue = $this->ordersModel->generateOrderNumber();
		if(!empty($orderNumberIsTrue)){
			$orderNumber = $this->ordersModel->generateOrderNumber()[0];
		}else{
			$orderNumber['number'] = random_string(4);
		}
            
        $data['number'] = $orderNumber['number'];
        $data['user_id'] = session()->get('id');
        $data['order_status_id'] = 1;
        if($this->ordersModel->add($data)){
            $orderId = $this->ordersModel->get(['number'=>$orderNumber['number'], 'status'=>'a'])[0];
            $orderIdPerOrder = [
                'local_admin_menu_order_id' => $orderId['id'],
            ];
            session()->set($orderIdPerOrder);

            $jdata =[
                'status' => 'Success!',
                'status_text' => 'Welcome '.session()->get('first_name').'!',
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
    }
    
    public function addOrderToCartInMenuList(){
        $this->hasPermissionRedirect('orders/admin-menu/add-to-cart/a');
        $isUpdated = 0;
        $checkDuplicateMenuId = $this->cartsModel->get(['order_id' => $_POST['order_id'], 'menu_id' => $_POST['menu_id'], 'status' => 'a']);
        if(empty($checkDuplicateMenuId)){
            if ($this->request->getMethod() == 'post') {
                if (!$this->validate('addOrderToCartInMenuList')) {
                    $jdata['errors'] = $this->validation->getErrors();
                    $jdata['value'] = $_POST;
                } else {
                    $menuIngredients = $this->menuIngredientModel->get(['menu_id' => $_POST['menu_id'], 'status' => 'a']);
                    if(!empty($menuIngredients)){
                        $orderMaxLimit = $this->orderLimitModel->get(['status' => 'a'])[0];
                        $menuTotal = $this->cartsModel->getCountMenuTypePerOrder(['lrfoims_carts.order_id'=> $_POST['order_id'], 'm.menu_type'=> 'a', 'lrfoims_carts.status'=> 'a'])[0];

                        if($menuTotal['total_menu'] <= $orderMaxLimit['max_limit']){
                            foreach ($menuIngredients as $menuIngredientsValue) {
                                $ingredients = $this->ingredientsModel->get(['id' => $menuIngredientsValue['ingredient_id'], 'status' => 'a'])[0];
                                
                                $ingredientStatus = $ingredients['unit_quantity'] - ($menuIngredientsValue['unit_quantity'] * $_POST['quantity']);
                                $total_unit_quantity = $menuIngredientsValue['unit_quantity'] * $_POST['quantity'];
                                if($ingredients['unit_quantity'] > $total_unit_quantity){
                                    $ingredientsData[] = [
                                        'ingredient_id' => $ingredients['id'],
                                        'unit_quantity' => $ingredientStatus,
                                        'product_status_id' => $total_unit_quantity > $ingredients['unit_quantity'] ? 2 : 1,
                                    ];
                                    $isUpdated = 1;
                                }else{
                                    $errorDataIngredients[] = ['product_name' => $ingredients['product_name']];
                                    $isUpdated = 0;
                                }
                            }
                            if(empty($errorDataIngredients)){
                                if($isUpdated == 1){
                                    foreach ($ingredientsData as $ingredientsDataValue) {
                                        $ingredientInfo = [
                                            'unit_quantity' => $ingredientsDataValue['unit_quantity'],
                                            'product_status_id' => $ingredientsDataValue['product_status_id'],
                                        ];
                                        $this->ingredientsModel->update($ingredientsDataValue['ingredient_id'], $ingredientInfo);
                                    }
                                    
                                    $this->cartsModel->add($_POST);
                                    $jdata =[
                                        'status' => 'Success',
                                        'status_text' => 'Successfully added!',
                                        'status_icon' => 'success'
                                    ];
                                    return $this->response->setJSON($jdata);
                                }
                            }else{
                                $message = "These ingredients: ";
                                $cnt = 1;
                                foreach ($errorDataIngredients as $value) {
                                    $message .= $cnt.". ".$value['product_name']." -> ";
                                    $cnt++;
                                }
                                $message .= " Please check your ingredients.";
                                $jdata =[
                                    'status' => 'Success',
                                    'status_text' => $message,
                                    'status_icon' => 'success'
                                ];
                                return $this->response->setJSON($jdata);
                            }
                        }else{
                            $jdata =[
                                'status' => 'Added Failed!',
                                'status_text' => 'You\\\'ve reached a maximum order!',
                                'status_icon' => 'warning'
                            ];
                            return $this->response->setJSON($jdata);
                        }
                    }else{
                        $jdata =[
                            'status' => 'Added Failed!',
                            'status_text' => 'Please apply Menu Ingredients to continue. *(Maintenances/Menu Ingredients/Add) Request to your admin for this site.',
                            'status_icon' => 'warning'
                        ];
                        return $this->response->setJSON($jdata);
                    }
                }
                return $this->response->setJSON($jdata);
            }
            return $this->response->setJSON($jdata);
        }else{
            $jdata =[
                'status' => 'Opss!',
                'status_text' => 'You\'ve already added this menu! Please check your orders to apply changes.',
                'status_icon' => 'warning'
            ];
            return $this->response->setJSON($jdata);
        }
    }
    
    public function editAdminCartQty($cartId, $menuId, $orderId, $cartQyt, $routeStatus){
        $this->hasPermissionRedirect('orders/admin/cart/qty');

        $time = new \DateTime();
        $isUpdated = 0;
        $menuIngredients = $this->menuIngredientModel->get(['menu_id' => $menuId, 'status' => 'a']);
        if($_POST['operation'] == 'minus') {
            $quantityCheck = $_POST['quantity'] - 1;
        } else {
            $quantityCheck = $_POST['quantity'] + 1;
        }
        foreach ($menuIngredients as $menuIngredientsValue) {
            $ingredients = $this->ingredientsModel->get(['id' => $menuIngredientsValue['ingredient_id'], 'status' => 'a'])[0];

            if($_POST['operation'] == 'minus') {
                $quantityData = [
                    'quantity' => $_POST['quantity'] - 1
                ];
                $ingredientReturnStatus = $ingredients['unit_quantity'] + $menuIngredientsValue['unit_quantity'];
            } else {
                $quantityData = [
                    'quantity' => $_POST['quantity'] + 1
                ];
                $ingredientReturnStatus = $ingredients['unit_quantity'] - $menuIngredientsValue['unit_quantity'];
            }
            if($ingredients['unit_quantity'] > $menuIngredientsValue['unit_quantity']){
                $ingredientsDataReturn[] = [
                    'ingredient_id' => $ingredients['id'],
                    'unit_quantity' => $ingredientReturnStatus,
                    'product_status_id' => $ingredientReturnStatus > 1 ? 2 : 1,
                ];
                $isUpdated = 1;
            }else{
                $errorDataIngredients[] = ['product_name' => $ingredients['product_name']];
                $isUpdated = 0;
            }
        }
        if(empty($errorDataIngredients)){
            if($isUpdated == 1){
                foreach ($ingredientsDataReturn as $ingredientsDataReturnValue) {
                    $ingredientInfoReturn = [
                        'unit_quantity' => $ingredientsDataReturnValue['unit_quantity'],
                        'product_status_id' => $ingredientsDataReturnValue['product_status_id'],
                    ];
                    $this->ingredientsModel->update($ingredientsDataReturnValue['ingredient_id'], $ingredientInfoReturn);
                }
                $this->cartsModel->update($cartId, $quantityData);
                
				if($_POST['operation'] == 'minus') {
					$quantityCheck = $_POST['quantity'] - 1;
				} else {
					$quantityCheck = $_POST['quantity'] + 1;
				}
				
				if($quantityCheck <= 0){
					$this->cartsModel->softDelete($cartId);
				}

                $jdata =[
                    'status' => 'Success!',
                    'status_text' => 'Food quantity changed!',
                    'status_icon' => 'success'
                ];
                return $this->response->setJSON($jdata);
            }
        }else{
            $message = "These ingredients: ";
            $cnt = 1;
            foreach ($errorDataIngredients as $value) {
                $message .= $cnt.". ".$value['product_name']." -> ";
                $cnt++;
            }
            $message .= " Please check your ingredients!";

            $jdata =[
                'status' => 'Opss',
                'status_text' => $message,
                'status_icon' => 'warning'
            ];
            return $this->response->setJSON($jdata);
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
              
                $total_unit_quantity = $menuIngredientsValue['unit_quantity'] * number_format($_POST['quantity'],2);
                if($ingredients['unit_quantity'] > $total_unit_quantity){
                    $ingredientsDataReturn[] = [
                        'ingredient_id' => $ingredients['id'],
                        'unit_quantity' => $ingredientReturnStatus,
                        'product_status_id' => $ingredientReturnStatus > $total_unit_quantity ? 2 : 1,
                    ];
                    $isUpdated = 1;
                }else{
                    $errorDataIngredients[] = ['product_name' => $ingredients['product_name']];
                    $isUpdated = 0;
                }
            }
            if(empty($errorDataIngredients)){
                if($isUpdated == 1){
                    foreach ($ingredientsDataReturn as $ingredientsDataReturnValue) {
                        $ingredientInfoReturn = [
                            'unit_quantity' => $ingredientsDataReturnValue['unit_quantity'],
                            'product_status_id' => $ingredientsDataReturnValue['product_status_id'],
                        ];
                        $this->ingredientsModel->update($ingredientsDataReturnValue['ingredient_id'], $ingredientInfoReturn);
                    }
                    $this->cartsModel->update($cartId, $_POST);
                    $this->session->setFlashdata('success_no_flash', 'Menu Quantity Updated!');
                    
                    if($routeStatus == '2' || $routeStatus == 2){
                        return redirect()->to('/orders');
                    }else{
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
                
                if($routeStatus == '2' || $routeStatus == 2){
                    return redirect()->to('/orders');
                }else{
                    return redirect()->to('/orders/admin-menu');
                }
            }
        }else{
            $this->session->setFlashdata('warning', 'Have the same value you\\\'ve inputted! If you want changes for your quantity. Please input higher or less than the value.');
            
            if($routeStatus == '2' || $routeStatus == 2){
                return redirect()->to('/orders');
            }else{
                return redirect()->to('/orders/admin-menu');
            }
        }
    }

    public function submitAdminOrderCarts(){
        $this->hasPermissionRedirect('orders/admin-menu/submit-orders');

        if ($this->request->getMethod() == 'post') {
            $getCart = $this->cartsModel->get(['order_id' => $_POST['order_id'], 'status'=>'a']);
            if(!empty($getCart)){
				if($_POST['payment_method_id'] == "" && $_POST['order_user_discount_id'] == "" && $_POST['order_type'] == ""){
					$data =[
						'payment_method_id_and_order_user_discount_id_and_order_type' => '',
						'status' => 'Failed!',
						'status_text' => 'Fields is required!',
						'status_icon' => 'error'
					];
					return $this->response->setJSON($data);
				} elseif($_POST['payment_method_id'] == "") {
					$data =[
						'payment_method_id' => '',
						'status' => 'Failed!',
						'status_text' => 'Payment method field is required!',
						'status_icon' => 'error'
					];
					return $this->response->setJSON($data);
				} elseif($_POST['order_type'] == "") {
					$data =[
						'order_type' => '',
						'status' => 'Failed!',
						'status_text' => 'Order type field is required!',
						'status_icon' => 'error'
					];
					return $this->response->setJSON($data);
				} elseif($_POST['order_user_discount_id'] != "" && $_POST['cust_id_no'] == "") {
					$data =[
						'cust_id_no' => '',
						'status' => 'Failed!',
						'status_text' => 'Id number field is required!',
						'status_icon' => 'error'
					];
					return $this->response->setJSON($data);
				} else {
                    if(!empty($_POST['order_user_discount_id'])){
                        $getOrderUserDiscount = $this->orderDiscountModel->get(['id'=>$_POST['order_user_discount_id'], 'status'=>'a'])[0];
                        $cust_id_no = $_POST['cust_id_no'];
					}else{
						$getOrderUserDiscount['id'] = 0;
						$cust_id_no = "";
					}
                    $data = [
						'payment_method_id' => $_POST['payment_method_id'],
						'order_type' => $_POST['order_type'],
						'order_user_discount_id' => $getOrderUserDiscount['id'],
						'cust_id_no' => $cust_id_no,
						'order_status_id' => 2,
						'status' => 'a',
					];
                    $this->ordersModel->update($_POST['order_id'], $data); 

                    $orderIdPerOrder = [
                        'local_admin_menu_order_id' => null,
                    ];
                    session()->set($orderIdPerOrder);

                    $jdata =[
                        'status' => 'Success',
                        'status_text' => 'Successfully checkout!',
                        'status_icon' => 'success'
                    ];
                    return $this->response->setJSON($jdata);
                }
            }else{
                $jdata =[
                    'status' => 'Error!',
                    'status_text' => 'Empty cart! Please add food before you checkout.',
                    'status_icon' => 'error'
                ];
                return $this->response->setJSON($jdata);
            }
        }
    }
    
    public function addAdminPayment($id, $totalAmount){
        $this->hasPermissionRedirect('orders/admin/add-payment/u');
        
        $orders = $this->ordersModel->get(['id' => $id, 'status' => 'a'])[0];
        $getCart = $this->cartsModel->get(['order_id' => $id, 'status'=>'a']);
        if(!empty($getCart)){
            if ($this->request->getMethod() == 'post') {
                $data = [
                    'total_amount_order' => $_POST['total_amount_order'],
                    'total_amount' =>$_POST['total_amount'],
                    'discount_amount' =>isset($_POST['discount_amount']),
                    'c_cash' => $_POST['c_cash'],
                    'c_balance' => $_POST['c_cash'] - $_POST['total_amount'],
                    'order_status_id' => 5
                ];
                if($this->ordersModel->update($orders['id'], $data)){
                    
                    $jdata =[
                        'status' => 'Success',
                        'status_text' => 'Successfully added!',
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
                'product_status_id' => ($ingredientStatus < 0.01 ? 2 : 1),
            ];
            $isDeleted = 1;
        }
        if($isDeleted == 1){
            foreach ($ingredientsReturnData as $ingredientsDataValue) {
                $ingredientInfo = [
                    'unit_quantity' => $ingredientsDataValue['unit_quantity'],
                    'product_status_id' => $ingredientsDataValue['product_status_id'],
                ];
                $this->ingredientsModel->update($ingredientsDataValue['ingredient_id'], $ingredientInfo);
            }
            $data =[
                'status'=> 'Deleted Successfully',
                'status_text' => 'Successfully Deleted!',
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
        $this->hasPermissionRedirect('orders/admin-menu/cart/d');

        $time = new \DateTime();
        $isDeleted = 0;
        $menuIngredients = $this->menuIngredientModel->get(['menu_id' => $menuId, 'status' => 'a']);
        foreach ($menuIngredients as $menuIngredientsValue) {
            $ingredients = $this->ingredientsModel->get(['id' => $menuIngredientsValue['ingredient_id'], 'status' => 'a'])[0];
            $ingredientStatus = $ingredients['unit_quantity'] + ($menuIngredientsValue['unit_quantity'] * $cartQyt);
            $ingredientsReturnData[] = [
                'ingredient_id' => $ingredients['id'],
                'unit_quantity' => $ingredients['unit_quantity'] + ($menuIngredientsValue['unit_quantity'] * $cartQyt),
                'product_status_id' => ($ingredientStatus < 0.01 ? 2 : 1),
            ];
            $isDeleted = 1;
        }
        if($isDeleted == 1){
            foreach ($ingredientsReturnData as $ingredientsDataValue) {
                $ingredientInfo = [
                    'unit_quantity' => $ingredientsDataValue['unit_quantity'],
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

    public function deleteOrderAdminMenu(){
        $this->hasPermissionRedirect('orders/admin-menu/cart/d');

        $isDeleted = 0;
        $cartDetails = $this->cartsModel->get(['order_id' => $_POST['order_id'], 'status' => 'a']);
        if(!empty($cartDetails)){
            foreach ($cartDetails as $cartDetailsValue) {
                $menuIngredients = $this->menuIngredientModel->get(['menu_id' => $cartDetailsValue['menu_id'], 'status' => 'a']);
                foreach ($menuIngredients as $menuIngredientsValue) {
                    $ingredients = $this->ingredientsModel->get(['id' => $menuIngredientsValue['ingredient_id'], 'status' => 'a'])[0];
                    $ingredientStatus = $ingredients['unit_quantity'] + ($menuIngredientsValue['unit_quantity'] * $cartDetailsValue['quantity']);
                    $ingredientsReturnData[] = [
                        'ingredient_id' => $ingredients['id'],
                        'unit_quantity' => $ingredients['unit_quantity'] + ($menuIngredientsValue['unit_quantity'] * $cartDetailsValue['quantity']),
                        'product_status_id' => ($ingredientStatus < 0.01 ? 2 : 1)
                    ];
                    $isDeleted = 1;
                     
                    $cartId[] = ['id' => $cartDetailsValue['id']];
                }
            }
        }else{
            $orderIdPerOrder = [
                'local_admin_menu_order_id' => null,
            ];
            session()->set($orderIdPerOrder);

            $orderInfo = [
                'order_status_id' => 6,
            ];
            $this->ordersModel->update($_POST['order_id'], $orderInfo);

            $data =[
                'status'=> 'Success!',
                'status_text' => 'Cancelled Order!',
                'status_icon' => 'success'
            ];
            return $this->response->setJSON($data);
        }
        if($isDeleted == 1){
            foreach ($ingredientsReturnData as $ingredientsDataValue) {
                $ingredientInfo = [
                    'unit_quantity' => $ingredientsDataValue['unit_quantity'],
                    'product_status_id' => $ingredientsDataValue['product_status_id'],
                ];
                $this->ingredientsModel->update($ingredientsDataValue['ingredient_id'], $ingredientInfo);
            }
            foreach ($cartId as $cartIdValue) {
                $this->cartsModel->softDelete($cartIdValue['id']);
            }
            
            $orderIdPerOrder = [
                'local_admin_menu_order_id' => null,
            ];
            session()->set($orderIdPerOrder);

            $orderInfo = [
                'order_status_id' => 6,
            ];
            $this->ordersModel->update($_POST['order_id'], $orderInfo);

            $data =[
                'status'=> 'Success!',
                'status_text' => 'Cancelled Order!',
                'status_icon' => 'success'
            ];
            return $this->response->setJSON($data);
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
