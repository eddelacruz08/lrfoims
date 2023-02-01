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
		$this->cartsModel = new OrderManagement\CartModel();
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
		$this->deliveryFeeModel = new SystemSettings\DeliveryFeeModel();
		$this->paymentMethodModel = new SystemSettings\PaymentMethodModel();
		$this->orderDiscountModel = new SystemSettings\OrderDiscountModel();
		$this->VATModel = new SystemSettings\VATModel();
		$this->couponModel = new SystemSettings\CouponModel();
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
							$data =[
								'status'=> 'Failed!',
								'status_text' => 'Please complete all fields!',
								'status_icon' => 'error'
							];
							return $this->response->setJSON($data);
						} else {
							$menuIngredients = $this->menuIngredientModel->get(['menu_id' => $_POST['menu_id'], 'status' => 'a']);

							$orderMaxLimit = $this->orderLimitModel->get(['status' => 'a'])[0];
							$menuTotal = $this->cartsOrderModel->getCountMenuTypePerOrder(['lrfoims_carts.order_id'=> $checkHaveOrderId['id'], 'm.menu_type'=> 'a', 'lrfoims_carts.status'=> 'a'])[0];
							if($orderMaxLimit['max_limit'] > $menuTotal['total_menu']){
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
											$this->cartsModel->add($_POST);
											$data =[
												'status'=> 'Success!',
												'status_text' => 'Food successfully added!',
												'status_icon' => 'success'
											];
											return $this->response->setJSON($data);
										}
									}else{
										$message = "These ingredients: ";
										$cnt = 1;
										foreach ($errorDataIngredients as $value) {
											$message .= $cnt.". ".$value['product_name']." = low stocks : ";
											$cnt++;
										}
										$message .= "=> Please check your ingredients.";
										$data =[
											'status'=> 'Failed!',
											'status_text' => $message,
											'status_icon' => 'error'
										];
										return $this->response->setJSON($data);
									}
								}else{
									$data =[
										'status'=> 'Failed!',
										'status_text' => 'Added Failed! Please apply Menu Ingredients to continue. *(Maintenances/Menu Ingredients/Add) *Request to your admin for this site.',
										'status_icon' => 'error'
									];
									return $this->response->setJSON($data);
								}
							}else{
								$data =[
									'status'=> 'Failed!',
									'status_text' => 'Added Failed! You\\\'ve reached a maximum order!',
									'status_icon' => 'error'
								];
								return $this->response->setJSON($data);
							}
						}
					}
				}else{
					$data =[
						'status'=> 'Failed!',
						'status_text' => 'You\\\'ve already added this food! Please check your cart to apply changes.',
						'status_icon' => 'error'
					];
					return $this->response->setJSON($data);
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

							if($orderMaxLimit['max_limit'] > $menuTotal['total_menu']){
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
										$this->cartsModel->add($_POST);
										$data =[
											'status'=> 'Success!',
											'status_text' => 'Food successfully added!',
											'status_icon' => 'success'
										];
										return $this->response->setJSON($data);
									}
								}else{
									$message = "These ingredients: ";
									$cnt = 1;
									foreach ($errorDataIngredients as $value) {
										$message .= $cnt.". ".$value['product_name']." = low stocks : ";
										$cnt++;
									}
									$message .= "=> Please check your ingredients.";
									$data =[
										'status'=> 'Failed!',
										'status_text' => $message,
										'status_icon' => 'error'
									];
									return $this->response->setJSON($data);
								}
							}else{
								$data =[
									'status'=> 'Failed!',
									'status_text' => 'Added Failed! You\\\'ve reached a maximum order!',
									'status_icon' => 'error'
								];
								return $this->response->setJSON($data);
							}
						}else{
							$data =[
								'status'=> 'Failed!',
								'status_text' => 'Added Failed! Please apply Menu Ingredients to continue. *(Maintenances/Menu Ingredients/Add) *Request to your admin for this site.',
								'status_icon' => 'error'
							];
							return $this->response->setJSON($data);
						}
					}
				}
			}
		}else{
			$data =[
				'status'=> 'Failed!',
				'status_text' => 'You have an ongoing order. Wait for current order to finish. Thank you!',
				'status_icon' => 'error'
			];
			return $this->response->setJSON($data);
		}
		return view('templates/landingPage_home',$data);
	}

	public function cart() {
        $this->hasPermissionRedirect('cart');

		$data = [
			'page_title' => 'LRFOIMS | Cart',
			'title' => 'Cart',
			'view' => 'Modules\HomeManagement\Views\home\cart',
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
	
    public function cartList(){
        $getVatable = $this->VATModel->get(['status'=>'a'])[0];

		$data = [
			'getPaymentMethod' => $this->paymentMethodModel->get(['status'=>'a']),
			'getVAT' => $this->VATModel->get(['status'=>'a'])[0],
			'getOrderUserDiscount' => $this->orderDiscountModel->get(['status'=>'a']),
			'getDeliveryFee' => $this->deliveryFeeModel->get(['status'=>'a'])[0],
			'getOrderType' => $this->orderTypeModel->get(),
			'orderMaxLimit' => $this->orderLimitModel->get(['status' => 'a'])[0],
			'getCustomerCartDetails' => $this->cartsModel->getCustomerCartDetails(['lrfoims_carts.status' => 'a']),
			// 'getOrderTypeDetails' => $this->ordersModel->getOrderTypeInfo(30, [1, 2, 3, 4, 5], session()->get('id')),
			'getCartTotalPrice' => $this->cartsModel->getCartTotalPrice(['lrfoims_carts.status' => 'a'], null, null, $getVatable['divide_vat'], $getVatable['multiply_vat']),
			'getCustomerOrderDetails' => $this->ordersModel->getCustomerOrderDetails(['lrfoims_orders.user_id' => session()->get('id'),'lrfoims_orders.status' => 'a']),
		];
		return view('Modules\HomeManagement\Views\home\cartList', $data);
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

	public function placeOrder(){
        // $this->hasPermissionRedirect('place-order/u');


        if ($this->request->getMethod() == 'post') {
            $getCart = $this->cartsModel->get(['order_id' => $_POST['order_id'], 'status'=>'a']);
            if(!empty($getCart)){
                if(!empty($_POST['order_user_discount_id'])){
                    $getOrderUserDiscount = $this->orderDiscountModel->get(['id'=>$_POST['order_user_discount_id'], 'status'=>'a'])[0];
                }else{
                    $getOrderUserDiscount['id'] = 0;
                }
                $data = [
                    'payment_method_id' => $_POST['payment_method_id'],
                    'order_type' => $_POST['order_type'],
                    'order_user_discount_id' => $getOrderUserDiscount['id'],
                    'order_status_id' => 2,
                    'status' => 'a',
                ];
                $this->ordersModel->update($_POST['order_id'], $data); 

                $jdata =[
                    'status' => 'Success',
                    'status_text' => 'Successfully checkout!',
                    'status_icon' => 'success'
                ];
                return $this->response->setJSON($jdata);
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

    public function editCartQuantity() {
        $this->hasPermissionRedirect('cart/u');

        $isUpdated = 0;
        $menuIngredients = $this->menuIngredientModel->get(['menu_id' => $_POST['menu_id'], 'status' => 'a']);
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
                $this->cartsModel->update($_POST['cart_id'], $quantityData);

				if($_POST['operation'] == 'minus') {
					$quantityCheck = $_POST['quantity'] - 1;
				} else {
					$quantityCheck = $_POST['quantity'] + 1;
				}
				
				if($quantityCheck <= 0){
					$this->cartsModel->softDelete($_POST['cart_id']);
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
