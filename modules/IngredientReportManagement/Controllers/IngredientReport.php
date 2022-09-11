<?php namespace Modules\IngredientReportManagement\Controllers;

use Modules\IngredientReportManagement\Models as IngredientReportManagement;
use Modules\ProductManagement\Models as ProductManagement;
use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class IngredientReport extends BaseController
{
	function __construct(){
        $this->ingredientReportModel = new IngredientReportManagement\IngredientReportModel();
        $this->ingredientCategoryModel = new SystemSettings\ProductCategoryModel();
        $this->productsModel = new ProductManagement\ProductModel();
        $this->time = new \DateTime();
        $this->dateAndTime = $this->time->format('Y-m-d');
		helper(['form']);
	}

	public function index()
	{
		$date = $this->dateAndTime;
		$data = [
			'page_title' => 'LRFOIMS | Ingredient Reports',
			'title' => 'Ingredient Reports',
			'view' => 'Modules\IngredientReportManagement\Views\ingredientReport\index',
            'ingredientSortByCategory' => $this->ingredientCategoryModel->get(),
            'countIngredientReports' => $this->ingredientReportModel->getCountIngredientReports(['lrfoims_ingredient_out.status'=>'a']),
            'ingredients' => $this->productsModel->getProduct(),
            'totalIngredients' => $this->productsModel->getTotalProduct(['lrfoims_products.status'=>'a'])[0],
            'totalIngredientReports' => $this->ingredientReportModel->getTotalIngredientReports(['lrfoims_ingredient_out.status'=>'a'])[0],
            'totalIngredientReportToday' => $this->ingredientReportModel->getTotalIngredientReports(['lrfoims_ingredient_out.status'=>'a','CAST(lrfoims_ingredient_out.created_at AS DATE)' => $date])[0],
		];

		return view('templates/index', $data);
	}
	
	public function filterDate($date)
	{
		// if ($this->request->getMethod() == 'post') {
			// $data =[
			// 	'status'=> 'Deleted Successfully',
			// 	'status_text' => 'Record Successfully Deleted',
			// 	'status_icon' => 'success'
			// ];
			$data = [
				'page_title' => 'LRFOIMS | Ingredient Reports',
				'title' => 'Ingredient Reports',
				'view' => 'Modules\IngredientReportManagement\Views\ingredientReport\index',
				'ingredientSortByCategory' => $this->ingredientCategoryModel->get(),
				'countIngredientReports' => $this->ingredientReportModel->getCountIngredientReports(['lrfoims_ingredient_out.status'=>'a']),
				'ingredients' => $this->productsModel->getProduct(),
				'totalIngredients' => $this->productsModel->getTotalProduct(['lrfoims_products.status'=>'a','CAST(lrfoims_ingredient_out.created_at AS DATE)' => $date])[0],
				'totalIngredientReports' => $this->ingredientReportModel->getTotalIngredientReports(['lrfoims_ingredient_out.status'=>'a','CAST(lrfoims_ingredient_out.created_at AS DATE)' => $date])[0],
				'totalIngredientReportToday' => $this->ingredientReportModel->getTotalIngredientReports(['lrfoims_ingredient_out.status'=>'a','CAST(lrfoims_ingredient_out.created_at AS DATE)' => $date])[0],
			];
		// }
		// if ($this->request->getMethod() == 'post') {
		// 	$date = $_POST['filteredDate'];
			// $data = [
			// 	'page_title' => 'LRFOIMS | Ingredient Reports',
			// 	'title' => 'Ingredient Reports',
			// 	'view' => 'Modules\IngredientReportManagement\Views\ingredientReport\index',
			// 	'ingredientSortByCategory' => $this->ingredientCategoryModel->get(),
			// 	'countIngredientReports' => $this->ingredientReportModel->getCountIngredientReports(['lrfoims_ingredient_out.status'=>'a']),
			// 	'ingredients' => $this->productsModel->getProduct(),
			// 	'totalIngredients' => $this->productsModel->getTotalProduct(['lrfoims_products.status'=>'a','CAST(lrfoims_ingredient_out.created_at AS DATE)' => $date])[0],
			// 	'totalIngredientReports' => $this->ingredientReportModel->getTotalIngredientReports(['lrfoims_ingredient_out.status'=>'a','CAST(lrfoims_ingredient_out.created_at AS DATE)' => $date])[0],
			// 	'totalIngredientReportToday' => $this->ingredientReportModel->getTotalIngredientReports(['lrfoims_ingredient_out.status'=>'a','CAST(lrfoims_ingredient_out.created_at AS DATE)' => $date])[0],
			// ];
		// }

        // return $this->response->setJSON($data);
		return view('templates/index', $data);
	}
	//--------------------------------------------------------------------
}
