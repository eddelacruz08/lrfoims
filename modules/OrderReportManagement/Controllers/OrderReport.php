<?php namespace Modules\OrderReportManagement\Controllers;

use Modules\OrderReportManagement\Models as OrderReportManagement;
use App\Controllers\BaseController;

class OrderReport extends BaseController
{
	function __construct(){
		helper(['form']);
	}

	public function index()
	{
		$data = [
			'page_title' => 'LRFOIMS | Order Reports',
			'title' => 'Order Reports',
			'view' => 'Modules\OrderReportManagement\Views\orderReport\index',
		];

		return view('templates/index', $data);
	}
	//--------------------------------------------------------------------
}
