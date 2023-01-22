<?php namespace Modules\DashboardManagement\Controllers;

use Modules\DashboardManagement\Models as DashboardManagement;
use Modules\UserManagement\Models as UserManagement;
use Modules\OrderManagement\Models as OrderManagement;
use Modules\ProductManagement\Models as ProductManagement;
use Modules\MenuManagement\Models as MenuManagement;
use Modules\IngredientReportManagement\Models as IngredientReportManagement;
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
        	'getIngredientLowQuantityStatus' => $this->ingredientsModel->getIngredientLowQuantityStatus(['lrfoims_products.status'=>'a']),
            'ingredientStockIn' => $this->ingredientReportModel->getIngredientStockIn(['lrfoims_ingredient_out.stock_status'=>3,'lrfoims_ingredient_out.status'=>'a']),
			'getTotalOrders' => $this->ordersModel->getTotalOrders(['order_status_id' => 7, 'status' => 'a']),
			'getTotalPendingOrders' => $this->ordersModel->getTotalPendingOrders(['order_status_id' => 2, 'status' => 'a']),
			'getTotalIngredients' => $this->ingredientsModel->getTotalIngredients(['status' => 'a']),
			'menu' => $this->menuModel->get(),
			'getTotaBestFoods' => $this->cartsModel->getTotalBestFoods(),
			'getPendingOrders' => $this->ordersModel->getOrderDetails(['lrfoims_orders.order_status_id'=>2,'lrfoims_orders.status'=>'a']),
			'getCancelledOrders' => $this->ordersModel->getOrderDetails(['lrfoims_orders.order_status_id'=> 6,'lrfoims_orders.status'=>'a']),
		];
		return view('templates/index', $data);
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
		$data['offset'] = $_GET['id'];
		$data['limitPerTable'] = $this->limitPerTable;
		$data['getPendingOrders'] = $this->ordersModel->getPendingOrderDetails(['lrfoims_orders.order_status_id'=>2,'lrfoims_orders.status'=>'a'], $this->limitPerTable, $_GET['id']);
		
		return view('Modules\DashboardManagement\Views\dashboard\pendingOrders', $data);
	}
}
