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
		$this->rolesModel = new UserManagement\RolesModel();
		$this->ordersModel = new OrderManagement\OrderModel();
		$this->ingredientsModel = new ProductManagement\ProductModel();
		$this->logsModel = new UserManagement\LogsModel();
        $this->rolesPermissionsModel = new UserManagement\RolesPermissionsModel();
		helper(['form','link']);
	}

	public function index() { 
        $this->hasPermissionRedirect('dashboard');

		$data = [
			'page_title' => 'LRFOIMS | Dashboard',
			'title' => 'Dashboard',
			'view' => 'Modules\DashboardManagement\Views\dashboard\index',
			'getTotalUsers' => $this->usersModel->getTotalUsers(['status' => 'a']),
			'getTotalOrders' => $this->ordersModel->getTotalOrders(['order_status_id' => 5, 'status' => 'a']),
			'getTotalIngredients' => $this->ingredientsModel->getTotalIngredients(['status' => 'a']),
			'getTotalLogs' => $this->logsModel->getTotalLogs(['status' => 'a']),
			'getRoles' => $this->rolesModel->get(['status' => 'a']),
			'getUsers' => $this->usersModel->get(['status' => 'a']),
            'getActivities' => $this->logsModel->orderBy('id', 'DESC')->paginate(10),
            'pager' => $this->logsModel->pager
		];
		return view('templates/index', $data);
	}

	//--------------------------------------------------------------------
}
