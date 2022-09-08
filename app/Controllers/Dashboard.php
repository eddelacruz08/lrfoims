<?php namespace App\Controllers;

use App\Models\DashboardDataModel;
use Modules\UniversityManagement\Models as UniversityManagement;
use Modules\UserManagement\Models as UserManagement;
class Dashboard extends BaseController
{
	public function index()
	{
		// $this->usersModel = new UserManagement\UsersModel();
		// $data = [
		// 	'page_title' => 'LRFOIS | Dashboard',
		// 	'title' => 'Lamon Restaurant Food Ordering and Inventory System',
		// 	'users' => $this->usersModel->getUserData()[0],
		// ];
		// return view('Admin/dashboard', $data);
	}
	//--------------------------------------------------------------------
}
