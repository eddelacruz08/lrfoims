<?php namespace Modules\HomeManagement\Controllers;

use Modules\HomeManagement\Models as HomeManagement;
use App\Controllers\BaseController;

class Home extends BaseController
{
	function __construct(){
		helper(['form']);
	}

	public function index()
	{
		$data = [
			'page_title' => 'LRFOIMS | LAMON',
			'title' => 'LAMON',
			'view' => 'Modules\HomeManagement\Views\home\index'
		];

		return view('templates/landingPage',$data);
	}

	public function menu()
	{
		$data = [
			'page_title' => 'LRFOIMS | Menu',
			'title' => 'Menu',
			'view' => 'Modules\HomeManagement\Views\home\menu'
		];

		return view('templates/landingPage',$data);
	}

	public function cart()
	{
		$data = [
			'page_title' => 'LRFOIMS | Cart',
			'title' => 'Cart',
			'view' => 'Modules\HomeManagement\Views\home\cart'
		];

		return view('templates/landingPage',$data);
	}

	public function profile()
	{
		$data = [
			'page_title' => 'LRFOIMS | Profile',
			'title' => 'Profile',
			'view' => 'Modules\HomeManagement\Views\home\profile'
		];

		return view('templates/landingPage',$data);
	}
	//--------------------------------------------------------------------
}
