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
		helper(['form','link']);
	}

	public function index() { 
        $this->hasPermissionRedirect('dashboard');

		// die(print_r($getTotaBestFoods['count_per_best_food']));
		$data = [
			'page_title' => 'LRFOIMS | Dashboard',
			'title' => 'Dashboard',
			'view' => 'Modules\DashboardManagement\Views\dashboard\index',
			// 'getTotalUsers' => $this->usersModel->getTotalUsers(['status' => 'a']),
        	'ingredients' => $this->ingredientsModel->getProduct(['lrfoims_products.status'=>'a']),
            'ingredientStockIn' => $this->ingredientReportModel->getIngredientStockIn(['lrfoims_ingredient_out.stock_status'=>1,'lrfoims_ingredient_out.status'=>'a']),
			'getTotalOrders' => $this->ordersModel->getTotalOrders(['order_status_id' => 5, 'status' => 'a']),
			'getTotalPendingOrders' => $this->ordersModel->getTotalPendingOrders(['order_status_id' => 2, 'status' => 'a']),
			'getTotalIngredients' => $this->ingredientsModel->getTotalIngredients(['status' => 'a']),
			// 'getTotalLogs' => $this->logsModel->getTotalLogs(['status' => 'a']),
			// 'getRoles' => $this->rolesModel->get(['status' => 'a']),
			// 'getUsers' => $this->usersModel->get(['status' => 'a']),
            // 'getActivities' => $this->logsModel->orderBy('id', 'DESC')->paginate(10),
            // 'pager' => $this->logsModel->pager,
			'menu' => $this->menuModel->get(),
			'getTotaBestFoods' => $this->cartsModel->getTotalBestFoods(),
			'getPendingOrders' => $this->ordersModel->getOrderDetails(['lrfoims_orders.order_status_id'=>2,'lrfoims_orders.status'=>'a']),
            // 'getPendingOrdersPager' => $this->ordersModel->pager,
		];
		return view('templates/index', $data);
	}

	//--------------------------------------------------------------------
}
