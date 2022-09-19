<?php namespace Modules\DashboardManagement\Controllers;

use Modules\DashboardManagement\Models as DashboardManagement;
use Modules\UserManagement\Models as UserManagement;
use Modules\OrderManagement\Models as OrderManagement;
use Modules\ProductManagement\Models as ProductManagement;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	function __construct(){
		$this->usersModel = new UserManagement\UsersModel();
		$this->ordersModel = new OrderManagement\OrderModel();
		$this->ingredientsModel = new ProductManagement\ProductModel();
		$this->logsModel = new UserManagement\LogsModel();
		helper(['form']);
	}

	public function index()
	{
		$data = [
			'page_title' => 'LRFOIMS | Dashboard',
			'title' => 'Dashboard',
			'view' => 'Modules\DashboardManagement\Views\dashboard\index',
			'getTotalUsers' => $this->usersModel->getTotalUsers(['status' => 'a']),
			'getTotalOrders' => $this->ordersModel->getTotalOrders(['order_status_id' => 5, 'status' => 'a']),
			'getTotalIngredients' => $this->ingredientsModel->getTotalIngredients(['status' => 'a']),
			'getTotalLogs' => $this->logsModel->getTotalLogs(['status' => 'a']),
			'getActivities' => $this->logsModel->getDetails(['status' => 'a'])
		];

		return view('templates/index', $data);
	}

	//--------------------------------------------------------------------
}
