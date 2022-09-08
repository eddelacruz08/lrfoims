<?php namespace Modules\DashboardManagement\Controllers;

use Modules\DashboardManagement\Models as DashboardManagement;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	function __construct(){
		// $this->menuCategoryModel = new DashboardManagement\MenuCategoryModel();
		helper(['form']);
	}

	public function index()
	{
		$data = [
			'page_title' => 'LRFOIMS | Dashboard',
			'title' => 'Dashboard',
			'view' => 'Modules\DashboardManagement\Views\dashboard\index'
		];

		return view('templates/index', $data);
	}

	//--------------------------------------------------------------------
}
