<?php namespace Modules\IngredientReportManagement\Controllers;

use Modules\IngredientReportManagement\Models as IngredientReportManagement;
use Modules\ProductManagement\Models as ProductManagement;
use Modules\SystemSettings\Models as SystemSettings;
use TCPDF;
use App\Controllers\BaseController;
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = FCPATH.'assets/img/header-long-lamon.png';
        $this->Image($image_file, 5, 5, '350', '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        // $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        $this->SetX(350);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        $image_file = FCPATH.'assets/img/footer-long-lamon.png';
        $this->Image($image_file, 5, 195, '350', '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Page number
    }
}

class IngredientReport extends BaseController
{
	function __construct(){
        $this->ingredientReportModel = new IngredientReportManagement\IngredientReportModel();
        $this->ingredientCategoryModel = new SystemSettings\ProductCategoryModel();
        $this->ingredientsModel = new ProductManagement\ProductModel();
        $this->ingredientMeasureModel = new SystemSettings\ProductMeasureModel();
        $this->time = new \DateTime();
        $this->dateAndTime = $this->time->format('Y-m-d');
		helper(['form','link']);
	}

	public function index($year = null) {
		$yearNow = $this->time->format('Y');
        $this->hasPermissionRedirect('ingredient-reports');
		if($year != null){
			$dateYear = $year; 
			$data = [
				'page_title' => 'LRFOIMS | Ingredient Reports',
				'title' => 'Ingredient Reports',
				'view' => 'Modules\IngredientReportManagement\Views\ingredientReport\index',
				'dateYear' => $dateYear,
				'getIngredientMeasures' => $this->ingredientMeasureModel->get(['status'=>'a']),
				'getIngredientLowQuantityStatus' => $this->ingredientsModel->getIngredientLowQuantityStatus(['lrfoims_products.status'=>'a']),
				'ingredientStockIn' => $this->ingredientReportModel->getIngredientStockIn(['lrfoims_ingredient_out.stock_status'=>3,'lrfoims_ingredient_out.status'=>'a']),
				'ingredientSortByCategory' => $this->ingredientCategoryModel->get(['status'=>'a']),
				'ingredients' => $this->ingredientsModel->getProduct(['lrfoims_products.status'=>'a']),
				'countIngredientReports' => $this->ingredientReportModel->getCountIngredientReports(['lrfoims_ingredient_out.status'=>'a']),
			];
			session()->set([
				'dateYear' => $dateYear,
				'getTotalStockIngredientPerYears' => $this->ingredientsModel->getTotalStockIngredientPerYears(['YEAR(lrfoims_products.created_at)'=>$dateYear,'lrfoims_products.status'=>'a']),
				'totalIngredientsPerMonth' => $this->ingredientsModel->getTotalIngredientPerMonth(['YEAR(created_at)'=>$dateYear,'status'=>'a']),
				// total count per month Stock Ingredients report
				'totalAmountStockIngredientsJan' => $this->ingredientsModel->getTotalAmountStockIngredientPerMonth(['YEAR(created_at)'=>$dateYear,'MONTH(created_at)'=> 1,'status'=>'a']),
				'totalAmountStockIngredientsFeb' => $this->ingredientsModel->getTotalAmountStockIngredientPerMonth(['YEAR(created_at)'=>$dateYear,'MONTH(created_at)'=> 2,'status'=>'a']),
				'totalAmountStockIngredientsMar' => $this->ingredientsModel->getTotalAmountStockIngredientPerMonth(['YEAR(created_at)'=>$dateYear,'MONTH(created_at)'=> 3,'status'=>'a']),
				'totalAmountStockIngredientsApr' => $this->ingredientsModel->getTotalAmountStockIngredientPerMonth(['YEAR(created_at)'=>$dateYear,'MONTH(created_at)'=> 4,'status'=>'a']),
				'totalAmountStockIngredientsMay' => $this->ingredientsModel->getTotalAmountStockIngredientPerMonth(['YEAR(created_at)'=>$dateYear,'MONTH(created_at)'=> 5,'status'=>'a']),
				'totalAmountStockIngredientsJun' => $this->ingredientsModel->getTotalAmountStockIngredientPerMonth(['YEAR(created_at)'=>$dateYear,'MONTH(created_at)'=> 6,'status'=>'a']),
				'totalAmountStockIngredientsJul' => $this->ingredientsModel->getTotalAmountStockIngredientPerMonth(['YEAR(created_at)'=>$dateYear,'MONTH(created_at)'=> 7,'status'=>'a']),
				'totalAmountStockIngredientsAug' => $this->ingredientsModel->getTotalAmountStockIngredientPerMonth(['YEAR(created_at)'=>$dateYear,'MONTH(created_at)'=> 8,'status'=>'a']),
				'totalAmountStockIngredientsSept' => $this->ingredientsModel->getTotalAmountStockIngredientPerMonth(['YEAR(created_at)'=>$dateYear,'MONTH(created_at)'=> 9,'status'=>'a']),
				'totalAmountStockIngredientsOct' => $this->ingredientsModel->getTotalAmountStockIngredientPerMonth(['YEAR(created_at)'=>$dateYear,'MONTH(created_at)'=> 10,'status'=>'a']),
				'totalAmountStockIngredientsNov' => $this->ingredientsModel->getTotalAmountStockIngredientPerMonth(['YEAR(created_at)'=>$dateYear,'MONTH(created_at)'=> 11,'status'=>'a']),
				'totalAmountStockIngredientsDec' => $this->ingredientsModel->getTotalAmountStockIngredientPerMonth(['YEAR(created_at)'=>$dateYear,'MONTH(created_at)'=> 12,'status'=>'a']),
				
			]);
		}else{
			$dateYears = $yearNow;
			$dateToday = $this->time->format('Y-m-d');
			$data = [
				'page_title' => 'LRFOIMS | Ingredient Reports',
				'title' => 'Ingredient Reports',
				'view' => 'Modules\IngredientReportManagement\Views\ingredientReport\index',
				'dateYear' => $dateYears,
				'getIngredientMeasures' => $this->ingredientMeasureModel->get(['status'=>'a']),
				'getIngredientLowQuantityStatus' => $this->ingredientsModel->getIngredientLowQuantityStatus(['lrfoims_products.status'=>'a']),
				'ingredientStockIn' => $this->ingredientReportModel->getIngredientStockIn(['lrfoims_ingredient_out.stock_status'=>3,'lrfoims_ingredient_out.status'=>'a']),
				'ingredientSortByCategory' => $this->ingredientCategoryModel->get(['status'=>'a']),
				'ingredients' => $this->ingredientsModel->getProduct(['lrfoims_products.status'=>'a']),
				'countIngredientReports' => $this->ingredientReportModel->getCountIngredientReports(['lrfoims_ingredient_out.status'=>'a']),
			];
			session()->set([
				'dateYear' => $dateYears,
				'getTotalStockIngredientPerYears' => $this->ingredientsModel->getTotalStockIngredientPerYears(['lrfoims_products.status'=>'a']),
				'totalIngredientsPerMonth' => $this->ingredientsModel->getTotalIngredientPerMonth(['status'=>'a']),
				// total count per month Stock Ingredients report
				'totalAmountStockIngredientsJan' => $this->ingredientsModel->getTotalAmountStockIngredientPerMonth(['MONTH(created_at)'=> 1,'status'=>'a']),
				'totalAmountStockIngredientsFeb' => $this->ingredientsModel->getTotalAmountStockIngredientPerMonth(['MONTH(created_at)'=> 2,'status'=>'a']),
				'totalAmountStockIngredientsMar' => $this->ingredientsModel->getTotalAmountStockIngredientPerMonth(['MONTH(created_at)'=> 3,'status'=>'a']),
				'totalAmountStockIngredientsApr' => $this->ingredientsModel->getTotalAmountStockIngredientPerMonth(['MONTH(created_at)'=> 4,'status'=>'a']),
				'totalAmountStockIngredientsMay' => $this->ingredientsModel->getTotalAmountStockIngredientPerMonth(['MONTH(created_at)'=> 5,'status'=>'a']),
				'totalAmountStockIngredientsJun' => $this->ingredientsModel->getTotalAmountStockIngredientPerMonth(['MONTH(created_at)'=> 6,'status'=>'a']),
				'totalAmountStockIngredientsJul' => $this->ingredientsModel->getTotalAmountStockIngredientPerMonth(['MONTH(created_at)'=> 7,'status'=>'a']),
				'totalAmountStockIngredientsAug' => $this->ingredientsModel->getTotalAmountStockIngredientPerMonth(['MONTH(created_at)'=> 8,'status'=>'a']),
				'totalAmountStockIngredientsSept' => $this->ingredientsModel->getTotalAmountStockIngredientPerMonth(['MONTH(created_at)'=> 9,'status'=>'a']),
				'totalAmountStockIngredientsOct' => $this->ingredientsModel->getTotalAmountStockIngredientPerMonth(['MONTH(created_at)'=> 10,'status'=>'a']),
				'totalAmountStockIngredientsNov' => $this->ingredientsModel->getTotalAmountStockIngredientPerMonth(['MONTH(created_at)'=> 11,'status'=>'a']),
				'totalAmountStockIngredientsDec' => $this->ingredientsModel->getTotalAmountStockIngredientPerMonth(['MONTH(created_at)'=> 12,'status'=>'a']),
			]);
		}
		return view('templates/index', $data);
	}
	
	public function indexDateFilter() {
        if ($this->request->getMethod() == 'post') {
			return redirect()->to('/ingredient-reports/'.$_POST['date']);
		}
	}

	public function getStockIngredients(){
		$data['getStockIngredients'] = $this->ingredientReportModel->getDetails(['lrfoims_ingredient_out.status' => 'a','lrfoims_ingredient_out.stock_status' => 1]);
        return $this->response->setJSON($data);
	}

	public function generateReport() {
        $this->hasPermissionRedirect('ingredient-reports/generate-report');

        if($this->request->getMethod() == 'post'){
			// die($_POST['date'].' '.$_POST['date_status']);
			if($this->validate('report')){
				$data = [
					'page_title' => 'generate',
					'title' => 'List of Reservations',
					'type' => 'report',
				];

				$pdf = new MYPDF('landscape', PDF_UNIT, 'LEGAL', true, 'UTF-8', false);
				// set default header data
				$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);
				// set margins
				$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
				if($_POST['date_status'] == 1){
					$ingredientDate = explode('/', $_POST['date']);
					$strDate = $ingredientDate[2].'-'.$ingredientDate[0].'-'.$ingredientDate[1];
					$data['ingredients'] = $this->ingredientsModel->getIngredientReports(['CAST(lrfoims_products.created_at AS DATE)' => $strDate, 'lrfoims_products.status' => 'a']);
					$data['date'] = $_POST['date'];
					$data['date_status'] = $_POST['date_status'];
					$pdf->SetTitle('Ingredients Report as of '.$data['date']);
					$pdf->SetSubject('Ingredients Report as of '.$data['date']);
				}else{
					$explodeDate = explode(" - ", $_POST['date']);
					$startDate = explode('/', $explodeDate[0]);
					$strStartDate = $startDate[2].'-'.$startDate[0].'-'.$startDate[1];
					$endDate = explode('/', $explodeDate[1]);
					$strEndDate = $endDate[2].'-'.$endDate[0].'-'.$endDate[1];
					$data['ingredients'] = $this->ingredientsModel->getIngredientReports(['CAST(lrfoims_products.created_at AS DATE) >=' => $strStartDate, 'CAST(lrfoims_products.created_at AS DATE) <=' => $strEndDate, 'lrfoims_products.status' => 'a']);
					$data['date_status'] = $_POST['date_status'];
					$data['strStartDate'] = $strStartDate;
					$data['strEndDate'] = $strEndDate;
					$pdf->SetTitle('Ingredients Report as of '.$data['strStartDate'].' to '.$data['strEndDate']);
					$pdf->SetSubject('Ingredients Report as of '.$data['strStartDate'].' to '.$data['strEndDate']);
				}
				$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
				$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
				// set auto page breaks
				$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
				$pdf->AddPage();

				$html = view('templates/generateIngredientReport', $data);
				$pdf->writeHTML($html, true, false, true, false, '');
				$this->response->setContentType('application/pdf');
				$pdf->Output('Report-'.date("Y-m-d").'.pdf', 'I');
			}else{
				$this->session->setFlashdata('error', 'An error occured. Check the form and try again.');
				return redirect()->to('/ingredient-reports');
			}
		}
	}
	//--------------------------------------------------------------------
}
