<?php namespace Modules\OrderReportManagement\Controllers;

use Modules\OrderReportManagement\Models as OrderReportManagement;
use Modules\OrderManagement\Models as OrderManagement;
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

class OrderReport extends BaseController
{
	function __construct(){
		$this->ordersModel = new OrderManagement\OrderModel();
		$this->paymentMethodModel = new SystemSettings\PaymentMethodModel();
        $this->orderTypeModel = new SystemSettings\OrderTypeModel();
        $this->time = new \DateTime();
		$this->limitPerTable = 10;
		helper(['link','form']);
	}

	public function index($year = null){
        $this->hasPermissionRedirect('order-reports');
		if($year != null){
			$dateYear = $year;
			$data = [
				'page_title' => 'LRFOIMS | Order Reports',
				'title' => 'Order Reports',
				'view' => 'Modules\OrderReportManagement\Views\orderReport\index',
				'getOrderType' => $this->orderTypeModel->get(['status'=>'a']),
				'getPaymentMethod' => $this->paymentMethodModel->get(['status'=>'a']),
				'getOrderDetails' => $this->ordersModel->getOrderDetails(['lrfoims_orders.order_status_id'=>7,'YEAR(lrfoims_orders.created_at)'=>$dateYear,'lrfoims_orders.status'=>'a']),
			];
			session()->set([
				'dateYear' => $dateYear,
				'getOrderDetails' => $this->ordersModel->getOrderDetails(['lrfoims_orders.order_status_id'=>7,'YEAR(lrfoims_orders.created_at)'=>$dateYear,'lrfoims_orders.status'=>'a']),
				'getOrderDetailsDineIn' => $this->ordersModel->getOrderDetails(['lrfoims_orders.order_status_id'=>7,'YEAR(lrfoims_orders.created_at)'=>$dateYear,'lrfoims_orders.order_type'=>1,'lrfoims_orders.status'=>'a']),
				'getOrderDetailsTakeOut' => $this->ordersModel->getOrderDetails(['lrfoims_orders.order_status_id'=>7,'YEAR(lrfoims_orders.created_at)'=>$dateYear,'lrfoims_orders.order_type'=>2,'lrfoims_orders.status'=>'a']),
				'getOrderDetailsDelivery' => $this->ordersModel->getOrderDetails(['lrfoims_orders.order_status_id'=>7,'YEAR(lrfoims_orders.created_at)'=>$dateYear,'lrfoims_orders.order_type'=>3,'lrfoims_orders.status'=>'a']),
				'totalOrderPerYears' => $this->ordersModel->getTotalOrderPerYears(['order_status_id'=>7,'YEAR(created_at)'=>$dateYear, 'status'=>'a']),
				'ordersPerMonth' => $this->ordersModel->getCountOrdersPerMonth(['order_status_id'=>7,'YEAR(created_at)'=>$dateYear, 'status'=>'a']),
				'totalAmountOrdersJan' => $this->ordersModel->getSumTotalAmountOrdersPerMonth(['order_status_id'=>7,'MONTH(created_at)'=> 1, 'YEAR(created_at)'=>$dateYear, 'status'=>'a']),
				'totalAmountOrdersFeb' => $this->ordersModel->getSumTotalAmountOrdersPerMonth(['order_status_id'=>7,'MONTH(created_at)'=> 2, 'YEAR(created_at)'=>$dateYear, 'status'=>'a']),
				'totalAmountOrdersMar' => $this->ordersModel->getSumTotalAmountOrdersPerMonth(['order_status_id'=>7,'MONTH(created_at)'=> 3, 'YEAR(created_at)'=>$dateYear, 'status'=>'a']),
				'totalAmountOrdersApr' => $this->ordersModel->getSumTotalAmountOrdersPerMonth(['order_status_id'=>7,'MONTH(created_at)'=> 4, 'YEAR(created_at)'=>$dateYear, 'status'=>'a']),
				'totalAmountOrdersMay' => $this->ordersModel->getSumTotalAmountOrdersPerMonth(['order_status_id'=>7,'MONTH(created_at)'=> 5, 'YEAR(created_at)'=>$dateYear, 'status'=>'a']),
				'totalAmountOrdersJun' => $this->ordersModel->getSumTotalAmountOrdersPerMonth(['order_status_id'=>7,'MONTH(created_at)'=> 6, 'YEAR(created_at)'=>$dateYear, 'status'=>'a']),
				'totalAmountOrdersJul' => $this->ordersModel->getSumTotalAmountOrdersPerMonth(['order_status_id'=>7,'MONTH(created_at)'=> 7, 'YEAR(created_at)'=>$dateYear, 'status'=>'a']),
				'totalAmountOrdersAug' => $this->ordersModel->getSumTotalAmountOrdersPerMonth(['order_status_id'=>7,'MONTH(created_at)'=> 8, 'YEAR(created_at)'=>$dateYear, 'status'=>'a']),
				'totalAmountOrdersSept' => $this->ordersModel->getSumTotalAmountOrdersPerMonth(['order_status_id'=>7,'MONTH(created_at)'=> 9, 'YEAR(created_at)'=>$dateYear, 'status'=>'a']),
				'totalAmountOrdersOct' => $this->ordersModel->getSumTotalAmountOrdersPerMonth(['order_status_id'=>7,'MONTH(created_at)'=> 10, 'YEAR(created_at)'=>$dateYear, 'status'=>'a']),
				'totalAmountOrdersNov' => $this->ordersModel->getSumTotalAmountOrdersPerMonth(['order_status_id'=>7,'MONTH(created_at)'=> 11, 'YEAR(created_at)'=>$dateYear, 'status'=>'a']),
				'totalAmountOrdersDec' => $this->ordersModel->getSumTotalAmountOrdersPerMonth(['order_status_id'=>7,'MONTH(created_at)'=> 12, 'YEAR(created_at)'=>$dateYear, 'status'=>'a']),
				'totalAmountOrdersUsed' => $this->ordersModel->getSumTotalAmountOrdersPerMonth(['order_status_id'=>7,'YEAR(created_at)'=>$dateYear, 'status'=>'a']),
			]);
		}else{
			$time = new \DateTime();
			$dateYears = $time->format('Y');
			$data = [
				'page_title' => 'LRFOIMS | Order Reports',
				'title' => 'Order Reports',
				'view' => 'Modules\OrderReportManagement\Views\orderReport\index',
				'getPaymentMethod' => $this->paymentMethodModel->get(['status'=>'a']),
				'getOrderDetails' => $this->ordersModel->getOrderDetails(['lrfoims_orders.order_status_id'=>7,'lrfoims_orders.status'=>'a']),
			];
			session()->set([
				'dateYear' => $dateYears,
				'getOrderDetails' => $this->ordersModel->getOrderDetails(['lrfoims_orders.order_status_id'=>7,'lrfoims_orders.status'=>'a']),
				'getOrderDetailsDineIn' => $this->ordersModel->getOrderDetails(['lrfoims_orders.order_status_id'=>7,'lrfoims_orders.order_type'=>1,'lrfoims_orders.status'=>'a']),
				'getOrderDetailsTakeOut' => $this->ordersModel->getOrderDetails(['lrfoims_orders.order_status_id'=>7,'lrfoims_orders.order_type'=>2,'lrfoims_orders.status'=>'a']),
				'getOrderDetailsDelivery' => $this->ordersModel->getOrderDetails(['lrfoims_orders.order_status_id'=>7,'lrfoims_orders.order_type'=>3,'lrfoims_orders.status'=>'a']),
				'totalOrderPerYears' => $this->ordersModel->getTotalOrderPerYears(['order_status_id'=>7, 'status'=>'a']),
				'ordersPerMonth' => $this->ordersModel->getCountOrdersPerMonth(['order_status_id'=>7, 'YEAR(created_at)'=>$dateYears, 'status'=>'a']),
				'totalAmountOrdersJan' => $this->ordersModel->getSumTotalAmountOrdersPerMonth(['order_status_id'=>7,'MONTH(created_at)'=> 1, 'YEAR(created_at)'=>$dateYears, 'status'=>'a']),
				'totalAmountOrdersFeb' => $this->ordersModel->getSumTotalAmountOrdersPerMonth(['order_status_id'=>7,'MONTH(created_at)'=> 2, 'YEAR(created_at)'=>$dateYears, 'status'=>'a']),
				'totalAmountOrdersMar' => $this->ordersModel->getSumTotalAmountOrdersPerMonth(['order_status_id'=>7,'MONTH(created_at)'=> 3, 'YEAR(created_at)'=>$dateYears, 'status'=>'a']),
				'totalAmountOrdersApr' => $this->ordersModel->getSumTotalAmountOrdersPerMonth(['order_status_id'=>7,'MONTH(created_at)'=> 4, 'YEAR(created_at)'=>$dateYears, 'status'=>'a']),
				'totalAmountOrdersMay' => $this->ordersModel->getSumTotalAmountOrdersPerMonth(['order_status_id'=>7,'MONTH(created_at)'=> 5, 'YEAR(created_at)'=>$dateYears, 'status'=>'a']),
				'totalAmountOrdersJun' => $this->ordersModel->getSumTotalAmountOrdersPerMonth(['order_status_id'=>7,'MONTH(created_at)'=> 6, 'YEAR(created_at)'=>$dateYears, 'status'=>'a']),
				'totalAmountOrdersJul' => $this->ordersModel->getSumTotalAmountOrdersPerMonth(['order_status_id'=>7,'MONTH(created_at)'=> 7, 'YEAR(created_at)'=>$dateYears, 'status'=>'a']),
				'totalAmountOrdersAug' => $this->ordersModel->getSumTotalAmountOrdersPerMonth(['order_status_id'=>7,'MONTH(created_at)'=> 8, 'YEAR(created_at)'=>$dateYears, 'status'=>'a']),
				'totalAmountOrdersSept' => $this->ordersModel->getSumTotalAmountOrdersPerMonth(['order_status_id'=>7,'MONTH(created_at)'=> 9, 'YEAR(created_at)'=>$dateYears, 'status'=>'a']),
				'totalAmountOrdersOct' => $this->ordersModel->getSumTotalAmountOrdersPerMonth(['order_status_id'=>7,'MONTH(created_at)'=> 10, 'YEAR(created_at)'=>$dateYears, 'status'=>'a']),
				'totalAmountOrdersNov' => $this->ordersModel->getSumTotalAmountOrdersPerMonth(['order_status_id'=>7,'MONTH(created_at)'=> 11, 'YEAR(created_at)'=>$dateYears, 'status'=>'a']),
				'totalAmountOrdersDec' => $this->ordersModel->getSumTotalAmountOrdersPerMonth(['order_status_id'=>7,'MONTH(created_at)'=> 12, 'YEAR(created_at)'=>$dateYears, 'status'=>'a']),
				'totalAmountOrdersUsed' => $this->ordersModel->getSumTotalAmountOrdersPerMonth(['order_status_id'=>7, 'status'=>'a']),
			]);
		}
		return view('templates/index', $data);
	}

	public function getOrderReports(){
		$offset = 0;
		$data['all_items'] = $this->ordersModel->getTotalOrderDetails(['lrfoims_orders.order_status_id'=>7,'lrfoims_orders.status'=>'a'])[0];
		$data['offset'] = $offset;
		$data['limitPerTable'] = $this->limitPerTable;
		$data['getPaymentMethod'] = $this->paymentMethodModel->get(['status'=>'a']);
		$data['getOrderReports'] = $this->ordersModel->getOrderReportsDetails(['lrfoims_orders.order_status_id'=>7,'lrfoims_orders.status'=>'a'], $this->limitPerTable, $offset);
		
		return view('Modules\OrderReportManagement\Views\orderReport\orderReportsData', $data);
	}
	
	public function getOrderReportsPerPage(){
		if(!empty($_GET['search'])){
			$search = $_GET['search'];
			$data['all_items'] = $this->ordersModel->getTotalOrderDetails(['lrfoims_orders.order_status_id'=>7,'lrfoims_orders.status'=>'a'])[0];
			$data['offset'] = 0;
			$data['limitPerTable'] = $this->limitPerTable;
			$data['getPaymentMethod'] = $this->paymentMethodModel->get(['status'=>'a']);
			$data['getOrderReports'] = $this->ordersModel->getOrderReportsDetails(['lrfoims_orders.order_status_id'=>7,'lrfoims_orders.status'=>'a'], $this->limitPerTable, $_GET['offset'], $search);
		}else{
			$data['all_items'] = $this->ordersModel->getTotalOrderDetails(['lrfoims_orders.order_status_id'=>7,'lrfoims_orders.status'=>'a'])[0];
			$data['offset'] = $_GET['offset'];
			$data['limitPerTable'] = $this->limitPerTable;
			$data['getPaymentMethod'] = $this->paymentMethodModel->get(['status'=>'a']);
			$data['getOrderReports'] = $this->ordersModel->getOrderReportsDetails(['lrfoims_orders.order_status_id'=>7,'lrfoims_orders.status'=>'a'], $this->limitPerTable, $_GET['offset']);
		}
		return view('Modules\OrderReportManagement\Views\orderReport\orderReportsData', $data);
	}

	public function indexDateFilter() {
        if ($this->request->getMethod() == 'post') {
			return redirect()->to('/order-reports/'.$_POST['date']);
		}
	}

	public function generateOrderReport() {
        $this->hasPermissionRedirect('order-reports/generate-report');

        if($this->request->getMethod() == 'post'){
			if($this->validate('report')){
				$data = [
					'page_title' => 'generate',
					'title' => 'Order Reports',
					'type' => 'report',
				];

				$pdf = new MYPDF('landscape', PDF_UNIT, 'LEGAL', true, 'UTF-8', false);
				// set default header data
				$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);
				// set margins
				$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
				if($_POST['date_status'] == 1){
					$data['orders'] = $this->ordersModel->getOrderReports(['lrfoims_orders.order_status_id' => 7, 'lrfoims_orders.created_at' => $_POST['date'], 'lrfoims_orders.status' => 'a']);
					$data['ordersTotalAmount'] = $this->ordersModel->getTotalAmountOrderReports(['lrfoims_orders.order_status_id' => 7, 'lrfoims_orders.created_at' => $_POST['date'], 'lrfoims_orders.status' => 'a']);
					$data['date'] = $_POST['date'];
					$data['date_status'] = $_POST['date_status'];
					$pdf->SetTitle('Order Report as of '.$data['date']);
					$pdf->SetSubject('Order Report as of '.$data['date']);
				}else{
					$explodeDate = explode(" - ", $_POST['date']);
					$startDate = explode('/', $explodeDate[0]);
					$strStartDate = $startDate[2].'-'.$startDate[0].'-'.$startDate[1];
					$endDate = explode('/', $explodeDate[1]);
					$strEndDate = $endDate[2].'-'.$endDate[0].'-'.$endDate[1];
					$data['orders'] = $this->ordersModel->getOrderReports(['CAST(lrfoims_orders.created_at AS DATE) >=' => $strStartDate, 'CAST(lrfoims_orders.created_at AS DATE) <=' => $strEndDate, 'lrfoims_orders.order_status_id' => 7, 'lrfoims_orders.status' => 'a']);
					$data['ordersTotalAmount'] = $this->ordersModel->getTotalAmountOrderReports(['CAST(lrfoims_orders.created_at AS DATE) >=' => $strStartDate, 'CAST(lrfoims_orders.created_at AS DATE) <=' => $strEndDate, 'lrfoims_orders.order_status_id' => 7, 'lrfoims_orders.status' => 'a']);
					$data['date_status'] = $_POST['date_status'];
					$data['strStartDate'] = $strStartDate;
					$data['strEndDate'] = $strEndDate;
					$pdf->SetTitle('Order Report as of '.$data['strStartDate'].' to '.$data['strEndDate']);
					$pdf->SetSubject('Order Report as of '.$data['strStartDate'].' to '.$data['strEndDate']);
				}
				$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
				$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
				// set auto page breaks
				$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
				$pdf->AddPage();

				$html = view('templates/generateOrderReport', $data);
				$pdf->writeHTML($html, true, false, true, false, '');
				$this->response->setContentType('application/pdf');
				$pdf->Output('Report-'.date("Y-m-d").'.pdf', 'I');
			}else{
				$this->session->setFlashdata('error', 'An error occured. Check the form and try again.');
				return redirect()->to('/order-reports');
			}
		}
	}
	//--------------------------------------------------------------------
}
