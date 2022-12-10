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
		helper(['form','link']);
	}

	public function index() {

		$data = [
			'page_title' => 'LRFOIMS | LAMON',
			'title' => 'LAMON',
			'view' => 'Modules\HomeManagement\Views\home\index',
			'menu' => $this->menuModel->get(),
			'menuCategory' => $this->menuCategoryModel->get(),
			'homeDetails' => $this->infoModel->get()[0],
		];
		$dataSession['getCustomerCountCarts'] = $this->cartsModel->getCustomerCountCarts(['o.user_id'=>session()->get('id'),'lrfoims_carts.status'=>'a'
				,'o.order_status_id'=>1]);
		session()->set($dataSession);

		return view('templates/landingPage',$data);
	}

	public function menu() {
        $this->hasPermissionRedirect('menu');

		$data = [
			'page_title' => 'LRFOIMS | Menu',
			'title' => 'Menu',
			'view' => 'Modules\HomeManagement\Views\home\menu',
			'menu' => $this->menuModel->get(),
			'menuCategory' => $this->menuCategoryModel->get(),
			'homeDetails' => $this->infoModel->get()[0],
		];
		$dataSession['getCustomerCountCarts'] = $this->cartsModel->getCustomerCountCarts(['o.user_id'=>session()->get('id'),
										'lrfoims_carts.status'=>'a','o.order_status_id'=>1]);
		session()->set($dataSession);
		return view('templates/landingPage',$data);
	}
	
	public function addToCart() {
        $this->hasPermissionRedirect('menu/a');

        $time = new \DateTime();
		$orderNumber = $this->ordersModel->generateOrderNumber()[0];

        $checkOngoingOrder = $this->ordersModel->getCheckOngoingOrder(['user_id' => session()->get('id'), 'status' => 'a']);
		if(!empty($checkHaveOrders)){
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
											'order_id' => $checkHaveOrderId['id'],
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
										'order_id' => $checkHaveOrderId['id'],
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
					}
					return redirect()->to('/menu');
				}
				return redirect()->to('/menu');
			}
		}else{
			$this->session->setFlashdata('error', 'You have an ongoing order. Wait for current order to finish. Thank you!');
			return redirect()->to('/menu');
		}
		return view('templates/landingPage',$data);
	}

	public function cart() {
        $this->hasPermissionRedirect('cart');

		$data = [
			'page_title' => 'LRFOIMS | Cart',
			'title' => 'Cart',
			'view' => 'Modules\HomeManagement\Views\home\cart',
			'orderType' => $this->orderTypeModel->get(),
			'homeDetails' => $this->infoModel->get()[0],
			'getCustomerCartDetails' => $this->cartsModel->getCustomerCartDetails(['lrfoims_carts.status' => 'a']),
			'getCartTotalPrice' => $this->cartsModel->getCartTotalPrice(['lrfoims_carts.status' => 'a']),
			'getCustomerOrderDetails' => $this->ordersModel->getCustomerOrderDetails(['lrfoims_orders.user_id' => session()->get('id'),'lrfoims_orders.status' => 'a']),
			// 'getOrderDetails' => $this->ordersModel->get(['lrfoims_orders.user_id' => session()->get('id'), 'lrfoims_orders.order_status_id'=> 1, 'lrfoims_orders.status' => 'a']),
		];
		
		$dataSession['getCustomerCountCarts'] = $this->cartsModel->getCustomerCountCarts(['o.user_id'=>session()->get('id'),'lrfoims_carts.status'=>'a'
				,'o.order_status_id'=>1]);
		session()->set($dataSession);

		return view('templates/landingPage',$data);
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
			'orderType' => $this->orderTypeModel->get(),
			'getCustomerCartDetails' => $this->cartsModel->getCustomerCartDetails(['lrfoims_carts.status' => 'a']),
			'getCartTotalPrice' => $this->cartsModel->getCartTotalPrice(['lrfoims_carts.status' => 'a']),
			'getCustomerOrderDetails' => $this->ordersModel->getCustomerOrderDetails(['lrfoims_orders.user_id' => session()->get('id'),'lrfoims_orders.status' => 'a']),
			// 'getOrderDetails' => $this->ordersModel->get(['lrfoims_orders.user_id' => session()->get('id'), 'lrfoims_orders.order_status_id'=> 1, 'lrfoims_orders.status' => 'a']),
		];
        $getCart = $this->cartsModel->get(['order_id' => $id, 'status'=>'a']);
        if(!empty($getCart)){
			if ($this->request->getMethod() == 'post') {
				if (!$this->validate('placeOrderType')) {
					$data['errors'] = $this->validation->getErrors();
					$data['value'] = $_POST;
				} else {
					if($valueId == 1 || $valueId == 2 || $valueId == 3 || $valueId == 4){
						$dataPOST['order_status_id'] = $valueId;
						$dataPOST['order_type'] = $_POST['order_type'];
						$this->ordersModel->update($id, $dataPOST);
						
						$this->session->setFlashdata('success', 'Order has been successfully added!');
						return redirect()->to('/cart');
					}else{
						$ordersData = $this->ordersModel->get(['lrfoims_orders.status' => 'a','lrfoims_orders.id' => $id, 'lrfoims_orders.order_status_id' => 4])[0];
						
						if(empty($ordersData['total_amount']) && $valueId == 5){
							$this->session->setFlashdata('error', 'Please add payment!');
							return redirect()->to('/cart');
						}else{
							$dataPOST['order_status_id'] = $valueId;
							$dataPOST['order_type'] = $_POST['order_type'];
							$this->ordersModel->update($id, $dataPOST);
							
							$this->session->setFlashdata('success', 'Order has been successfully added!');
							return redirect()->to('/cart');
						}
					}
				}
			}
        }else{
            $this->session->setFlashdata('error', 'Empty Cart! Please add foods. Thank you!');
			return redirect()->to('/cart');
        }
		return view('templates/landingPage',$data);
    }

    public function editCartQuantity($id) {
        $this->hasPermissionRedirect('cart/u');

        $data = [
            'page_title' => 'LRFOIMS | Cart',
            'title' => 'Cart',
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

		return view('templates/landingPage',$data);
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
            'roles' => $this->rolesModel->get(),
			'homeDetails' => $this->infoModel->get()[0],
            'regions' => $this->regionModel->get(['status'=>'a']),
            'province' => $this->provinceModel->get(['status'=>'a']),
            'city' => $this->cityModel->get(['status'=>'a']),
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
                // $this->response->setFlashdata('success', 'Record Succesfully Updated');
                return redirect()->to('/profile');
            }
        }
        return view('templates/landingPage', $data);
    }
	//--------------------------------------------------------------------
}
