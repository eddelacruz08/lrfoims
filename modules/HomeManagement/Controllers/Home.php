<?php namespace Modules\HomeManagement\Controllers;

use Modules\UserManagement\Models as UserManagement;
use Modules\HomeManagement\Models as HomeManagement;
use Modules\MenuManagement\Models as MenuManagement;
use Modules\OrderManagement\Models as OrderManagement;
use Modules\SystemSettings\Models as SystemSettings;
use Modules\ProductManagement\Models as ProductManagement;
use Modules\IngredientReportManagement\Models as IngredientReportManagement;
use Modules\DeliveryManagement\Models as DeliveryManagement;
use App\Controllers\BaseController;

class Home extends BaseController
{
	function __construct(){
		$this->ordersModel = new OrderManagement\OrderModel();
        $this->orderTypeModel = new SystemSettings\OrderTypeModel();
		$this->cartsModel = new HomeManagement\CartModel();
		$this->cartsOrderModel = new OrderManagement\CartModel();
		$this->menuModel = new MenuManagement\MenuModel();
		$this->menuCategoryModel = new SystemSettings\MenuCategoryModel();
        $this->usersModel = new UserManagement\UsersModel();
        $this->rolesModel = new UserManagement\RolesModel();
		$this->logsModel = new UserManagement\LogsModel();
		$this->regionModel = new SystemSettings\RegionModel();
		$this->provinceModel = new SystemSettings\ProvinceModel();
		$this->cityModel = new SystemSettings\CityModel();
		$this->menuIngredientModel = new SystemSettings\MenuIngredientModel();
        $this->ingredientsModel = new ProductManagement\ProductModel();
        $this->ingredientReportModel = new IngredientReportManagement\IngredientReportModel(); 
		$this->infoModel = new SystemSettings\HomeInfoModel();
		$this->messageModel = new DeliveryManagement\MessageModel();
		$this->regionModel = new SystemSettings\RegionModel();
		$this->provinceModel = new SystemSettings\ProvinceModel();
		$this->cityModel = new SystemSettings\CityModel();
		$this->orderLimitModel = new SystemSettings\OrderLimitModel();
		helper(['form','link']);
	}

	public function index() {

		$data = [
			'page_title' => 'LRFOIMS | LAMON',
			'title' => 'LAMON',
			'view' => 'Modules\HomeManagement\Views\home\index',
			'menu' => $this->menuModel->get(),
			'orderMaxLimit' => $this->orderLimitModel->get(['status' => 'a'])[0],
			'menuCategory' => $this->menuCategoryModel->get(),
			'homeDetails' => $this->infoModel->get()[0],
			'regions' => $this->regionModel->get(['status'=>'a']),
			'provinces' => $this->provinceModel->get(['status'=>'a']),
			'cities' => $this->cityModel->get(['status'=>'a']),
		];
		$dataSession['getCustomerCountCarts'] = $this->cartsModel->getCustomerCountCarts(['o.user_id'=>session()->get('id'),'lrfoims_carts.status'=>'a'
				,'o.order_status_id'=>1]);
		session()->set($dataSession);

		return view('templates/landingPage_home',$data);
	}

	public function ongoingOrderStatusList() {

		$data = [
			'page_title' => 'LRFOIMS | Order Status List',
			'title' => 'Order Status List',
			'view' => 'Modules\HomeManagement\Views\home\orders',
			'menu' => $this->menuModel->get(),
			'menuCategory' => $this->menuCategoryModel->get(),
			'homeDetails' => $this->infoModel->get()[0],
			'orderMaxLimit' => $this->orderLimitModel->get(['status' => 'a'])[0],
			'regions' => $this->regionModel->get(['status'=>'a']),
			'provinces' => $this->provinceModel->get(['status'=>'a']),
			'cities' => $this->cityModel->get(['status'=>'a']),
			'preparingOrders' => $this->ordersModel->get(['order_status_id'=> 2,'status'=>'a']),
			'servingOrders' => $this->ordersModel->get(['order_status_id'=> 3,'status'=>'a']),
		];

		return view('templates/landingPage_home',$data);
	}

	public function menu() {
        $this->hasPermissionRedirect('menu');

		$data = [
			'page_title' => 'LRFOIMS | Menu',
			'title' => 'Menu',
			'view' => 'Modules\HomeManagement\Views\home\menu',
			'menu' => $this->menuModel->get(),
			'menuCategory' => $this->menuCategoryModel->get(),
			'orderMaxLimit' => $this->orderLimitModel->get(['status' => 'a'])[0],
			'homeDetails' => $this->infoModel->get()[0],
			'regions' => $this->regionModel->get(['status'=>'a']),
			'provinces' => $this->provinceModel->get(['status'=>'a']),
			'cities' => $this->cityModel->get(['status'=>'a']),
		];
		$dataSession['getCustomerCountCarts'] = $this->cartsModel->getCustomerCountCarts(['o.user_id'=>session()->get('id'),
										'lrfoims_carts.status'=>'a','o.order_status_id'=>1]);
		session()->set($dataSession);
		return view('templates/landingPage_home',$data);
	} 
	
	public function addToCart() {
        $this->hasPermissionRedirect('menu/a');

        $time = new \DateTime();
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

        $checkOngoingOrder = $this->ordersModel->getCheckOngoingOrder(['user_id' => session()->get('id'), 'status' => 'a']);

		if(empty($checkOngoingOrder)){
			$checkHaveOrders = $this->ordersModel->get(['user_id' => session()->get('id'), 'order_status_id' => 1, 'status' => 'a']);
			if(!empty($checkHaveOrders)){
				$checkHaveOrderId = $this->ordersModel->get(['user_id' => session()->get('id'), 'order_status_id' => 1, 'status' => 'a'])[0];
				$checkDuplicateMenuId = $this->cartsModel->get(['order_id' => $checkHaveOrderId['id'], 'menu_id' => $_POST['menu_id'], 'status' => 'a']);
				if(empty($checkDuplicateMenuId)){
					if ($this->request->getMethod() == 'post') {
						if (!$this->validate('addOrderToCartInMenuList')) {
							$data['errors'] = $this->validation->getErrors();
							$data['value'] = $_POST;
							$this->session->setFlashdata('error', 'Please complete all fields!');
						} else {
							$menuIngredients = $this->menuIngredientModel->get(['menu_id' => $_POST['menu_id'], 'status' => 'a']);

							$orderMaxLimit = $this->orderLimitModel->get(['status' => 'a'])[0];
							$menuTotal = $this->cartsOrderModel->getCountMenuTypePerOrder(['lrfoims_carts.order_id'=> $checkHaveOrderId['id'], 'm.menu_type'=> 'a', 'lrfoims_carts.status'=> 'a'])[0];

							if($menuTotal['total_menu'] <= $orderMaxLimit['max_limit']){
								if(!empty($menuIngredients)){
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
											$_POST['order_id'] = $checkHaveOrderId['id'];
											$logData = [
												'user_id' => session()->get('id'),
												'description' => 'added a food to order#'.$orderNumber['number']
											];
											$this->logsModel->add($logData);
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
							}else{
								$this->session->setFlashdata('error', 'Added Failed! You\\\'ve reached a maximum order!');
							}
						}
						return redirect()->to('/menu');
					}
					return redirect()->to('/menu');
				}else{
					$this->session->setFlashdata('error_no_flash', 'You\\\'ve already added this food! Please check your cart to apply changes.');
					return redirect()->to('/menu');
				}
			}else{
				if ($this->request->getMethod() == 'post') {
					if (!$this->validate('addOrderToCartInMenuList')) {
						$data['errors'] = $this->validation->getErrors();
						$data['value'] = $_POST;
					} else {
						$menuIngredients = $this->menuIngredientModel->get(['menu_id' => $_POST['menu_id'], 'status' => 'a']);
						if(!empty($menuIngredients)){
							$postData = [
								'number' => $orderNumber['number'],
								'user_id' => session()->get('id'),
								'order_status_id' => 1
							];
							$this->ordersModel->add($postData);
							$checkHaveOrderId = $this->ordersModel->get(['number' => $orderNumber['number'], 'user_id' => session()->get('id'), 'order_status_id' => 1, 'status' => 'a'])[0];

							$orderMaxLimit = $this->orderLimitModel->get(['status' => 'a'])[0];
							$menuTotal = $this->cartsOrderModel->getCountMenuTypePerOrder(['lrfoims_carts.order_id'=> $checkHaveOrderId['id'], 'm.menu_type'=> 'a', 'lrfoims_carts.status'=> 'a'])[0];

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
										$_POST['order_id'] = $checkHaveOrderId['id'];
										$logData = [
											'user_id' => session()->get('id'),
											'description' => 'added a food to order#'.$orderNumber['number']
										];
										$this->logsModel->add($logData);
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
								$this->session->setFlashdata('error', 'Added Failed! You\\\'ve reached a maximum order!');
							}
						}else{
							$this->session->setFlashdata('error', 'Added Failed! Please apply Menu Ingredients to continue. <br><small class="text-danger"><em>*(Maintenances/Menu Ingredients/Add)<br>*Request to your admin for this site.<em></small>');
						}
					}
					return redirect()->to('/menu');
				}
				return redirect()->to('/menu');
			}
		}else{
			$this->session->setFlashdata('error', 'You have an ongoing order. Wait for current order to finish. Thank you!');
			return redirect()->to('/menu');
		}
		return view('templates/landingPage_home',$data);
	}

	public function cart() {
        $this->hasPermissionRedirect('cart');

		$data = [
			'page_title' => 'LRFOIMS | Cart',
			'title' => 'Cart',
			'view' => 'Modules\HomeManagement\Views\home\cart',
			'orderType' => $this->orderTypeModel->get(),
			'homeDetails' => $this->infoModel->get()[0],
			'regions' => $this->regionModel->get(['status'=>'a']),
			'provinces' => $this->provinceModel->get(['status'=>'a']),
			'cities' => $this->cityModel->get(['status'=>'a']),
			'orderMaxLimit' => $this->orderLimitModel->get(['status' => 'a'])[0],
			'getCustomerCartDetails' => $this->cartsModel->getCustomerCartDetails(['lrfoims_carts.status' => 'a']),
			'getCartTotalPrice' => $this->cartsModel->getCartTotalPrice(['lrfoims_carts.status' => 'a']),
			'getCustomerOrderDetails' => $this->ordersModel->getCustomerOrderDetails(['lrfoims_orders.user_id' => session()->get('id'),'lrfoims_orders.status' => 'a']),
			// 'getOrderDetails' => $this->ordersModel->get(['lrfoims_orders.user_id' => session()->get('id'), 'lrfoims_orders.order_status_id'=> 1, 'lrfoims_orders.status' => 'a']),
		];
		
		$dataSession['getCustomerCountCarts'] = $this->cartsModel->getCustomerCountCarts(['o.user_id'=>session()->get('id'),'lrfoims_carts.status'=>'a'
				,'o.order_status_id'=>1]);
		session()->set($dataSession);

		return view('templates/landingPage_home',$data);
	}

	public function addChat() {
		if(!session()->get('username'))
			return redirect()->to('/');

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
		// $data = $this->messageModel->getDetails(['lrfoims_user_messages.status'=>'a']);
		return $this->response->setJSON($data);
	}

	public function placeOrder($id, $valueId){
        // $this->hasPermissionRedirect('place-order/u');

		$data = [
			'page_title' => 'LRFOIMS | Cart',
			'title' => 'Cart',
			'view' => 'Modules\HomeManagement\Views\home\cart',
			'homeDetails' => $this->infoModel->get()[0],
			'regions' => $this->regionModel->get(['status'=>'a']),
			'provinces' => $this->provinceModel->get(['status'=>'a']),
			'cities' => $this->cityModel->get(['status'=>'a']),
			'orderType' => $this->orderTypeModel->get(),
			'orderMaxLimit' => $this->orderLimitModel->get(['status' => 'a'])[0],
			'getCustomerCartDetails' => $this->cartsModel->getCustomerCartDetails(['lrfoims_carts.status' => 'a']),
			'getCartTotalPrice' => $this->cartsModel->getCartTotalPrice(['lrfoims_carts.status' => 'a']),
			'getCustomerOrderDetails' => $this->ordersModel->getCustomerOrderDetails(['lrfoims_orders.user_id' => session()->get('id'),'lrfoims_orders.status' => 'a']),
			// 'getOrderDetails' => $this->ordersModel->get(['lrfoims_orders.user_id' => session()->get('id'), 'lrfoims_orders.order_status_id'=> 1, 'lrfoims_orders.status' => 'a']),
		];
        $getCart = $this->cartsModel->get(['order_id' => $id, 'status'=>'a']);
        $checkInsideTheProvinceIsTrue = $this->infoModel->get(['status'=>'a'])[0];
		if(!empty($getCart)){
			if ($this->request->getMethod() == 'post') {
				if (!$this->validate('placeOrderType')) {
					$data['errors'] = $this->validation->getErrors();
					$data['value'] = $_POST;
				} else {
					if($_POST['order_type'] == 3){
						if($checkInsideTheProvinceIsTrue['province_id'] == session()->get('province_id')){
							$dataPOST['order_status_id'] = $valueId;
							$dataPOST['order_type'] = $_POST['order_type'];
							$this->ordersModel->update($id, $dataPOST);
							
							$this->session->setFlashdata('success', 'Order has been successfully added!');
							return redirect()->to('/cart');
						}else{
							$regions = $this->regionModel->get(['status'=>'a']); 
							$provinces = $this->provinceModel->get(['status'=>'a']); 
							$cities = $this->cityModel->get(['status'=>'a']); 

							$full_address = '';
							foreach ($cities as $city) {
								if($city['city_code'] == $checkInsideTheProvinceIsTrue['city_id']){
									$full_address .= $checkInsideTheProvinceIsTrue['addtl_address'].', '.$city['city_name'];
								}
							}
							foreach ($provinces as $province) {
								if($province['province_code'] == $checkInsideTheProvinceIsTrue['province_id']){
									$full_address .= ', '.$province['province_name'];
								}
							}
							foreach ($regions as $region) {
								if($region['region_code'] == $checkInsideTheProvinceIsTrue['region_id']){
									$full_address .= ', '.$region['region_name'];
								}
							}
							$str = strtolower($full_address);
							$strAddress = ucwords($str);
							$this->session->setFlashdata('error', 'Place order failed!<br/> You are too far from the restaurant.<br/> Restaurant Location:<br/> '.$strAddress.'.');
							return redirect()->to('/cart');
						}
					}else{
						$dataPOST['order_status_id'] = $valueId;
						$dataPOST['order_type'] = $_POST['order_type'];
						$this->ordersModel->update($id, $dataPOST);
						
						$this->session->setFlashdata('success', 'Order has been successfully added!');
						return redirect()->to('/cart');
					}
				}
			}
		}else{
			$this->session->setFlashdata('error', 'Empty Cart! Please add foods. Thank you!');
			return redirect()->to('/cart');
		}
		return view('templates/landingPage_home',$data);
    }

    public function editCartQuantity($id) {
        $this->hasPermissionRedirect('cart/u');

        $data = [
            'page_title' => 'LRFOIMS | Cart',
            'title' => 'Cart',
			'orderMaxLimit' => $this->orderLimitModel->get(['status' => 'a'])[0],
            'view' => 'Modules\HomeManagement\Views\home\cart'
        ];
        if ($this->request->getMethod() == 'post') {
            $this->cartsModel->update($id, $_POST);
			$logData = [
				'user_id' => session()->get('id'),
				'description' => 'added a food to order'
			];
			$this->logsModel->add($logData);
            $this->session->setFlashdata('success_no_flash', 'Cart Quantity Updated!');
            return redirect()->to('/cart');
        }

        return view('templates/index', $data);
    }

    public function deleteCart($cartId) {
        $this->hasPermissionRedirect('cart/d');

        $this->cartsModel->softDelete($cartId);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
 
	public function profile() {
        $this->hasPermissionRedirect('profile');

		$data = [
			'page_title' => 'LRFOIMS | Profile',
			'title' => 'Profile',
			'view' => 'Modules\HomeManagement\Views\home\profile',
			'orderMaxLimit' => $this->orderLimitModel->get(['status' => 'a'])[0],
			'homeDetails' => $this->infoModel->get()[0],
			'regions' => $this->regionModel->get(['status'=>'a']),
			'provinces' => $this->provinceModel->get(['status'=>'a']),
			'cities' => $this->cityModel->get(['status'=>'a']),
			'getOrderDetails' => $this->ordersModel->getOrderDetails(['lrfoims_orders.user_id'=>session()->get('id'),'lrfoims_orders.order_status_id'=>5,'lrfoims_orders.status'=>'a']),
		];
		$user = $this->usersModel->getDetails(['lrfoims_users.id'=>session()->get('id'),'lrfoims_users.status'=>'a'])[0];
		$jdata = [
            'role_name' => $user['role_name'],
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'last_name' => $user['last_name'], 
            'username' => $user['username'], 
            'contact_number' => $user['contact_number'],
            'email_address' => $user['email_address'],
            'region_id' => $user['region_id'],
            'province_id' => $user['province_id'],
            'city_id' => $user['city_id'],
            'addtl_address' => $user['addtl_address'],
            'getOrderCounts' => $this->ordersModel->getCountOrdersHome(['user_id' => $user['id'], 'status'=>'a', 'order_status_id'=> 5])[0],
        ];

        session()->set($jdata);

		return view('templates/landingPage_home',$data);
	}
	
    public function editProfile($id) {
        $this->hasPermissionRedirect('profile/u');

        $data = [
            'page_title' => 'LRFOIMS | Edit Profile',
            'title' => 'Edit Profile',
            'action' => 'Submit',
            'view' => 'Modules\HomeManagement\Views\home\editProfile',
            'edit' => true,
            'id' => $id,
			'orderMaxLimit' => $this->orderLimitModel->get(['status' => 'a'])[0],
            'roles' => $this->rolesModel->get(),
			'homeDetails' => $this->infoModel->get()[0],
            'regions' => $this->regionModel->get(['status'=>'a']),
            'provinces' => $this->provinceModel->get(['status'=>'a']),
            'cities' => $this->cityModel->get(['status'=>'a']),
            'value' => $this->usersModel->get(['id' => $id])[0],
			'homeDetails' => $this->infoModel->get()[0],
        ];

        if(empty($data['value'])){
            die('Some Error Code Here (No Record)');
        }

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('editProfile')) {
                $data['value'] = $_POST;
                $data['errors'] = $this->validation->getErrors();
            } else {
                $this->usersModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Record Succesfully Updated');
                return redirect()->to('/profile');
            }
        }
        return view('templates/landingPage_home', $data);
    }
	//--------------------------------------------------------------------
}
