<?php namespace Modules\DashboardManagement\Controllers;

use Modules\DashboardManagement\Models as DashboardManagement;
use Modules\UserManagement\Models as UserManagement;
use Modules\OrderManagement\Models as OrderManagement;
use Modules\ProductManagement\Models as ProductManagement;
use Modules\MenuManagement\Models as MenuManagement;
use Modules\IngredientReportManagement\Models as IngredientReportManagement;
use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	function __construct(){
		$this->usersModel = new UserManagement\UsersModel();
		$this->rolesModel = new UserManagement\RolesModel();
		$this->ordersModel = new OrderManagement\OrderModel();
		$this->cartsModel = new OrderManagement\CartModel();
		$this->ingredientsModel = new ProductManagement\ProductModel();
		$this->logsModel = new UserManagement\LogsModel();
        $this->rolesPermissionsModel = new UserManagement\RolesPermissionsModel();
		$this->menuModel = new MenuManagement\MenuModel();
        $this->ingredientReportModel = new IngredientReportManagement\IngredientReportModel();
        $this->ingredientMeasureModel = new SystemSettings\ProductMeasureModel();
		$this->menuIngredientModel = new SystemSettings\MenuIngredientModel();
		helper(['form','link', 'paginater']);
		$this->limitPerTable = 10;
	}

	public function index($offset = 0) { 
        $this->hasPermissionRedirect('dashboard');

		$data = [
			'page_title' => 'LRFOIMS | Dashboard',
			'title' => 'Dashboard',
			'view' => 'Modules\DashboardManagement\Views\dashboard\index',
        	'ingredients' => $this->ingredientsModel->getProduct(['lrfoims_products.status'=>'a']),
        	'getIngredientMeasures' => $this->ingredientMeasureModel->get(['status'=>'a']),
        	'getIngredientLowQuantityStatus' => $this->ingredientsModel->getIngredientLowQuantityStatus(['lrfoims_products.status'=>'a']),
            'ingredientStockIn' => $this->ingredientReportModel->getIngredientStockIn(['lrfoims_ingredient_out.stock_status'=>3,'lrfoims_ingredient_out.status'=>'a']),
			'getTotalOrders' => $this->ordersModel->getTotalOrders(['order_status_id' => 7, 'status' => 'a']),
			'getTotalPendingOrders' => $this->ordersModel->getTotalPendingOrders(['order_status_id' => 1, 'status' => 'a']),
			'getTotalIngredients' => $this->ingredientsModel->getTotalIngredients(['status' => 'a']),
			'menu' => $this->menuModel->get(),
			'getCartsFoodRates' => $this->cartsModel->getCartFoodRates(),
			'getTotalBestFoods' => $this->cartsModel->getTotalBestFoods(),
			'getPendingOrders' => $this->ordersModel->getOrderDetails(['lrfoims_orders.order_status_id'=>1,'lrfoims_orders.status'=>'a']),
			'getCancelledOrders' => $this->ordersModel->getOrderDetails(['lrfoims_orders.order_status_id'=> 6,'lrfoims_orders.status'=>'a']),
		];
		return view('templates/index', $data);
	}

	public function getPendingOrders(){

		$offset = 0;
		$data['all_items'] = $this->ordersModel->getOrderDetails(['lrfoims_orders.order_status_id'=>1,'lrfoims_orders.status'=>'a']);
		$data['offset'] = $offset;
		$data['limitPerTable'] = $this->limitPerTable;
		$data['getPendingOrders'] = $this->ordersModel->getPendingOrderDetails(['lrfoims_orders.order_status_id'=>1,'lrfoims_orders.status'=>'a'], $this->limitPerTable, $offset);
		
		return view('Modules\DashboardManagement\Views\dashboard\pendingOrders', $data);
	}
	
	public function returnIngredients($id) {
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
						'unit_quantity' => $ingredients['unit_quantity'] + ($menuIngredientsValue['unit_quantity'] * $cartDetailsValue['quantity'])
					];
					$isDeleted = 1;
						
					$cartId[] = ['id' => $cartDetailsValue['id']];
				}
			}
		}else{
			$orderInfo = [
				'order_status_id' => 6,
			];
			$this->ordersModel->update($id, $orderInfo);
			$data = [
				'status'=> 'Success!',
				'status_text' => 'Returned Successfully!',
				'status_icon' => 'success'
			];
			return $this->response->setJSON($data);
		}
		if($isDeleted == 1){
			foreach ($ingredientsReturnData as $ingredientsDataValue) {
				$ingredientInfo = [
					'unit_quantity' => $ingredientsDataValue['unit_quantity']
				];
				$this->ingredientsModel->update($ingredientsDataValue['ingredient_id'], $ingredientInfo);
			}
			foreach ($cartId as $cartIdValue) {
				$this->cartsModel->softDelete($cartIdValue['id']);
			}

			$orderInfo = [
				'order_status_id' => 6,
			];
			$this->ordersModel->update($id, $orderInfo);

			$data = [
				'status'=> 'Success!',
				'status_text' => 'Returned Successfully!',
				'status_icon' => 'success'
			];
			return $this->response->setJSON($data);
		}else{
			$data = [
				'status'=> 'Opss',
				'status_text' => 'Failed to return!',
				'status_icon' => 'error'
			];
			$this->response->setJSON($data);
		}
	}

	public function getPendingOrdersPerPage(){
		if(!empty($_GET['search'])){
			$search = $_GET['search'];
			$data['all_items'] = $this->ordersModel->getOrderDetails(['lrfoims_orders.order_status_id'=>1,'lrfoims_orders.status'=>'a']);
			$data['offset'] = 0;
			$data['limitPerTable'] = $this->limitPerTable;
			$data['getPendingOrders'] = $this->ordersModel->getPendingOrderDetails(['lrfoims_orders.number'=>$search, 'lrfoims_orders.order_status_id'=>2,'lrfoims_orders.status'=>'a']);
		}else{
			$data['all_items'] = $this->ordersModel->getOrderDetails(['lrfoims_orders.order_status_id'=>1,'lrfoims_orders.status'=>'a']);
			$data['offset'] = $_GET['offset'];
			$data['limitPerTable'] = $this->limitPerTable;
			$data['getPendingOrders'] = $this->ordersModel->getPendingOrderDetails(['lrfoims_orders.order_status_id'=>1,'lrfoims_orders.status'=>'a'], $this->limitPerTable, $_GET['offset']);
		}
		return view('Modules\DashboardManagement\Views\dashboard\pendingOrders', $data);
	}
}
