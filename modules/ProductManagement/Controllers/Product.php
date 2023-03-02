<?php
namespace Modules\ProductManagement\Controllers;

use Modules\ProductManagement\Models as ProductManagement;
use Modules\UserManagement\Models as UserManagement;
use Modules\SystemSettings\Models as SystemSettings;
use Modules\IngredientReportManagement\Models as IngredientReportManagement;
use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Product extends BaseController
{
    function __construct(){
        $this->productsModel = new ProductManagement\ProductModel();
        $this->productsCategoryModel = new SystemSettings\ProductCategoryModel();
        $this->rolesPermissionsModel = new UserManagement\RolesPermissionsModel();
        $this->productStatusModel = new SystemSettings\ProductStatusModel();
        $this->productMeasureModel = new SystemSettings\ProductMeasureModel();
        $this->ingredientReportModel = new IngredientReportManagement\IngredientReportModel();
        $this->notificationModel = new SystemSettings\NotificationModel();
        $this->time = new \DateTime();
        $this->dateAndTime = $this->time->format('Y-m-d');
        helper(['form', 'link']);
    }

    public function index() {
        $this->hasPermissionRedirect('ingredients');

        $data = [
            'page_title' => 'LRFOIMS | Ingredients',
            'title' => 'Ingredients',
            'view' => 'Modules\ProductManagement\Views\ingredient\index',
            'ingredientCategory' => $this->productsCategoryModel->get(),
            'ingredientStockIn' => $this->ingredientReportModel->get(['status'=>'a']),
            'getIngredients' => $this->productsModel->getProduct(),
            'productSortByCategory' => $this->productsCategoryModel->get(),
            'ingredientStockIn' => $this->ingredientReportModel->get(['status'=>'a']),
            'date' => $this->dateAndTime,
            'getIngredients' => $this->productsModel->getProduct(),
            'pager' => $this->productsModel->pager
        ];
        return view('templates/index', $data);
    }
    
    public function viewStocks() {
        $this->hasPermissionRedirect('ingredients');
        $ingredients = $this->productsModel->getProduct(['lrfoims_products.id'=>$_GET['id'], 'lrfoims_products.status'=>'a'])[0];
        $data = [
            'title' => $ingredients['product_name'],
            'category_id' => $_GET['category_id'],
            'ingredientStockIn' => $this->ingredientReportModel->getIngredientStockIn(['lrfoims_ingredient_out.ingredient_id'=>$_GET['id'],
                'lrfoims_ingredient_out.status'=>'a','lrfoims_ingredient_out.stock_status'=>1])
        ];
        return view('Modules\ProductManagement\Views\ingredient\viewStocks', $data);
    }

    public function getIngredientList() {
        $data = [
            'page_title' => 'LRFOIMS | Ingredients',
            'title' => 'Ingredients',
            'ingredientCategory' => $this->productsCategoryModel->get(),
            'ingredientStockIn' => $this->ingredientReportModel->get(['status'=>'a']),
            'getIngredients' => $this->productsModel->getProduct(),
        ];
        return view('Modules\ProductManagement\Views\ingredient\ingredients', $data);
    }

    public function getIngredientListData() {
        $data = [
            'ingredientCategory' => $this->productsCategoryModel->get(['id'=>$_GET['id']]),
            'ingredientStockIn' => $this->ingredientReportModel->get(['status'=>'a']),
            'getIngredients' => $this->productsModel->getProduct(['lrfoims_products.product_category_id'=>$_GET['id']]),
        ];
        return view('Modules\ProductManagement\Views\ingredient\ingredientData', $data);
    }

	public function getViewStocks() {
        $this->hasPermissionRedirect('ingredients');

        $array = array('status' => 'a');
		$data = $this->ingredientReportModel->where($array)->orderBy('id', 'ASC')->findAll();
		return $this->response->setJSON($data);
	}

    public function retrieveIngredients(){
        $this->hasPermissionRedirect('ingredients');

        $data = [
            'ingredientCategory' => $this->productsCategoryModel->get(),
            'ingredientStockIn' => $this->ingredientReportModel->get(['status'=>'a']),
            'getIngredients' => $this->productsModel->getProduct(),
        ];
        return $this->response->setJSON($data);
    }

    public function notifLowQuantityIngredients(){
        $data = [
            'getIngredients' => $this->productsModel->getProductLowIngredients(['lrfoims_products.status'=>'a']),
        ];
        return $this->response->setJSON($data);
    }

    public function updateIngredientsOutOfStock($id){
        $data = [
            'product_status_id' => 2,
        ];
        $this->ingredientsModel->update($id, $data);
    }

    public function insertBatchSpreadsheet() {
        if($this->validate('ingredients_spreadsheet')){
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($this->request->getFile('ingredients'));
            $xlsx = new Xlsx($spreadsheet);
            $array = $spreadsheet->getActiveSheet()->toArray();
            $ctr = 1;
            $is_ok = false;
            for ($i = 1; $i <= count($array); $i++) {
                $ingredients = $this->productsModel->get(['id' => $array[$i][0], 'status' => 'a'])[0];
                $this->dateAndTime = new \DateTime($array[$i][3]);
                $dataStocksIngredients[] = [
                    'ingredient_id' =>  $array[$i][0],
                    'unit_quantity' =>  $array[$i][1],
                    'unit_price' =>  $array[$i][2],
                    'product_description_id' => $ingredients['product_description_id'],
                    'stock_status' =>  1,
                    'date_expiration' => $this->dateAndTime->format('Y-m-d'),
                    'status' =>  'a',
                    'unit_quantity_ingredient' => $ingredients['unit_quantity'] + $array[$i][1],
                    'price_ingredient' => $array[$i][2],
                    'stock_out_date_ingredient' => $this->time->format('Y-m-d'),
                    'product_status_id_ingredient' => 1,
                ]; 
                // if($this->productsModel->inputDetailBulk($dataStocksIngredients)){
                //     $ctr++;
                //     $is_ok = true;
                // } else {
                //     $is_ok = false;
                // }
            }
            return $this->response->setJSON($dataStocksIngredients[]);
            if($is_ok == true){
                $response = [
                  'status' => 'success',
                  'inserted_count' => count($data),
                  'insert_count' => count($array) - 1,
                  'exisiting_count' => $ctr,
                  'data' => json_encode($dataStocksIngredients),
                  'message' => 'Successfully Inserted',
  
                ];
                return $this->response->setJSON($response);
            } else{
                $response = [
                  'status' => 'error',
                  'inserted_count' => 0,
                  'insert_count' => count($array) - 1,
                  'exisiting_count' => $ctr,
                  'data' => $dataStocksIngredients,
                  'message' => 'Please check the format of each data in spreadsheet',
                ];
                return $this->response->setJSON($response);
            }
        } else {
          $response = [
            'status' => 'error',
            'inserted_count' => 0,
            'insert_count' => count($array),
            'exisiting_count' => $ctr,
            'message' => 'Wrong File Format',
            'data' => json_encode($this->validation->getErrors()),
          ];
          return json_encode($response);
        }
    }
    
    public function importBackupSpreadsheet() {
        if($this->validate('ingredients_spreadsheet')){
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($this->request->getFile('ingredients_backup'));
            $xlsx = new Xlsx($spreadsheet);
            $array = $spreadsheet->getActiveSheet()->toArray();
            die(print_r($array));
            $data = [];
            $ctr = 0;
            foreach($array as $key => $value)
            {
                $student = $this->userModel->getCount($value[0], $value[5]);
                if ($student != 0) {
                  $ctr++;
                  continue;
                }
                if($key == 0)
                    continue;
                $temp = [
                    'student_number' =>  $value[0],
                    'firstname' =>  $value[1],
                    'middlename' =>  $value[2],
                    'lastname' =>  $value[3],
                    'suffix' =>  $value[4],
                    'email' =>  $value[5],

                ];
                array_push($data, $temp);
            }
            if($this->userModel->inputDetailBulk($data)){
              $response = [
                'status' => 'success',
                'inserted_count' => count($data),
                'insert_count' => count($array) - 1,
                'exisiting_count' => $ctr,
                'data' => json_encode($data),
                'message' => 'Successfully Inserted',

              ];

              return json_encode($response);
            } else {
              $response = [
                'status' => 'error',
                'inserted_count' => 0,
                'insert_count' => count($array),
                'exisiting_count' => $ctr,
                'data' => $data,
                'message' => 'Please check the format of each data in spreadsheet',
              ];
              return json_encode($response);
            }
        } else {
          $response = [
            'status' => 'error',
            'inserted_count' => 0,
            'insert_count' => count($array),
            'exisiting_count' => $ctr,
            'message' => 'Wrong File Format',
            'data' => json_encode($this->validation->getErrors()),
          ];
          return json_encode($response);
        }
    }

    public function importCsvFile() {
        $this->hasPermissionRedirect('ingredients/batch-upload/stock-in');

        $jdata = [
            'page_title' => 'LRFOIMS | Batch Upload Ingredients',
            'title' => 'Batch Upload Ingredients',
            'view' => 'Modules\ProductManagement\Views\ingredient\batchStockForm'
        ];
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('ingredientBatchUploadFile')) {
                $jdata['errors'] = $this->validation->getErrors();
                $jdata['value'] = $_POST;
            } else {
                $upload_file = $_FILES['upload_file']['name'];
                $extension = pathinfo($upload_file, PATHINFO_EXTENSION);
                if($extension == 'csv'){
                    $reader= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                } else if($extension=='xls'){
                    $reader= new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                }  else if($extension=='xlsx'){
                    $reader= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }else {
                    $this->session->setFlashdata('error', 'Invalid type of file!');
                    return redirect()->to('/ingredients');   
                }

                $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);

                $sheetdata = $spreadsheet->getActiveSheet()->toArray();
                $sheetcount = count($sheetdata);
                $counted = 0; 
                $notCount = 0; 
                if($sheetcount > 1) {
                    $data = array();
                    for ($i = 1; $i < $sheetcount; $i++) { 
                        $id = $sheetdata[$i][0];
                        $unit_quantity = $sheetdata[$i][3];
                        $price = $sheetdata[$i][5];
                        $ingredients = $this->productsModel->get(['id' => $id, 'status' => 'a'])[0];
                        
                        if(!empty($ingredients)){
                            $ingredientData = [
                                'unit_quantity' => $ingredients['unit_quantity'] + $unit_quantity,
                                'price' => $ingredients['price'] + str_replace(',', '', $price),
                            ];
                            $this->productsModel->update($ingredients['id'], $ingredientData);
                            $counted++;
                        }else{
                            $notCount++;
                        }
                        
                        if($counted){
                            $this->session->setFlashdata('success', ($counted > 1 ? $counted.' rows' : $counted.' row').
                            ' out of '.($counted > 1 ? $counted.' rows are' : $counted.' row is').' successfully added and '.
                            ($notCount > 1 ? $notCount.' rows are' : $notCount.' row is').' not added.');
                            return redirect()->to('/ingredients'); 
                        } else {
                            $this->session->setFlashdata('error', 'Batch file are not imported.');
                        }
                    }
                }
            }
        }
        return view('templates/index', $jdata); 
    }

    public function exportIngredients() {
        $this->hasPermissionRedirect('ingredients/batch-upload/export');
		
        $ingredientsData = $this->productsModel->getProduct(['lrfoims_products.status'=>'a']);

		$file_name = 'ingredients_'.date('Ymdhi').'.xlsx';

		$spreadsheet = new Spreadsheet();

		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'Id');
		$sheet->setCellValue('B1', 'Ingredient Name');
		$sheet->setCellValue('C1', 'Ingredient Category Id');
		$sheet->setCellValue('D1', 'Ingredient Category');
		$sheet->setCellValue('E1', 'Unit Quantity');
		$sheet->setCellValue('F1', 'Ingredient Description Id');
		$sheet->setCellValue('G1', 'Measures');
		$sheet->setCellValue('H1', 'Price');
		$sheet->setCellValue('I1', 'Stock Date');
		$sheet->setCellValue('J1', 'Created Date');

		$count = 2;

		foreach($ingredientsData as $row) {
			$sheet->setCellValue('A' . $count, $row['id']);
			$sheet->setCellValue('B' . $count, $row['product_name']);
			$sheet->setCellValue('C' . $count, $row['product_category_id']);
			$sheet->setCellValue('D' . $count, $row['product_description']);
			$sheet->setCellValue('E' . $count, $row['unit_quantity']);
			$sheet->setCellValue('F' . $count, $row['product_description_id']);
			$sheet->setCellValue('G' . $count, $row['name']);
			$sheet->setCellValue('H' . $count, $row['price']);
			$sheet->setCellValue('I' . $count, $row['stock_out_date']);
			$sheet->setCellValue('J' . $count, $row['created_at']);

			$count++;
		}

		$writer = new Xlsx($spreadsheet);
		$writer->save($file_name);

		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length:' . filesize($file_name));
		flush();
		readfile($file_name);
		exit;
    }

    public function add() {
        $this->hasPermissionRedirect('ingredients/a');

        $data = [
            'page_title' => 'LRFOIMS | Add Ingredients',
            'title' => 'Ingredients',
            'action' => 'Submit',
            'view' => 'Modules\ProductManagement\Views\ingredient\form',
            'edit' => false,
            'productCategory' => $this->productsCategoryModel->get(),
            'productStatus' => $this->productStatusModel->get(),
            'productDescription' => $this->productMeasureModel->get(),
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('addIngredients')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                // if($_POST['unit_quantity'] <= 1){
                //     $_POST['product_status_id'] = 2;
                // }else{
                    $_POST['product_status_id'] = 2;
                // }
                $this->productsModel->add($_POST);
                $this->session->setFlashdata('success', 'Ingredient Successfully Added!');
                return redirect()->to('/ingredients');
            }
        }

        return view('templates/index', $data);
    }

    public function updateStocksByExpirationDateSetStockStatus(){
        $dataStatus = [
            'stock_status' => 3,
        ];
        $this->ingredientReportModel->update($_POST['id'], $dataStatus);
    }

    public function updateStocksByExpirationDate($ingredientId, $stockId){

        $ingredients = $this->productsModel->get(['id' => $ingredientId, 'status' => 'a'])[0];

        $quantity = $ingredients['unit_quantity'] - $_POST['unit_quantity'];

        if($quantity <= 0){
            $dataIngredient = [
                'unit_quantity' => 0,
                'product_status_id' => 2,
            ];
        }else{
            $dataIngredient = [
                'unit_quantity' => $ingredients['unit_quantity'] - $_POST['unit_quantity'],
            ];
        }
        $dataStocks = [
            'status' => 'd',
        ];
        $this->ingredientReportModel->update($stockId, $dataStocks);
        $this->productsModel->update($ingredientId, $dataIngredient);

        $data =[
            'status' => 'Success!',
            'status_text' => 'Successfully Updated!',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
    
    public function updateStocksByExpirationDateCancel($stockId){
        $dataStatus = [
            'status' => 'd',
        ];
        $this->ingredientReportModel->update($stockId, $dataStatus);

        $data =[
            'status' => 'Success!',
            'status_text' => 'Successfully Cancelled!',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }

    public function updateDateStocks($stockId){
        $dataStocks = [
            'updated_at' => $this->time->format('Y-m-d H:i:s'),
        ];
        $this->ingredientReportModel->update($stockId, $dataStocks);
    }

    public function notification($id, $routeType){
        $notificationData = [
            'user_id' => $_POST['user_id'],
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'link' => $_POST['link'],
            'notif_date_status' => $this->time->format('Y-m-d'),
        ];
        $this->notificationModel->add($notificationData);
        if($routeType == 1){
            $dataStocks = [
                'updated_at' => $this->time->format('Y-m-d H:i:s'),
            ];
            $this->ingredientReportModel->update($id, $dataStocks);
        }else{
            $dataIngredients = [
                'updated_at' => $this->time->format('Y-m-d H:i:s'),
            ];
            $this->productsModel->update($id, $dataIngredients);
        }
    }

    public function notificationMarked($id){
        $notifyMarked = [
            'status' => 'd',
        ];
        $this->notificationModel->update($id, $notifyMarked);
        return redirect()->to('/'.$_POST['marked_link']);
    }

    public function addStockViewForm() {
        $this->hasPermissionRedirect('ingredients/stocks');
        
        $ingredients = $this->productsModel->get(['id' => $_GET['id'], 'status' => 'a'])[0];

        $data = [
            'title' => 'Add stock in '.$ingredients['product_name'].' ingredient.',
            'category_id' => $_GET['category_id'],
            'id' => $_GET['id']
        ];
        return view('Modules\ProductManagement\Views\ingredient\addStockForm', $data);
    }

    public function addStocks() {
        $this->hasPermissionRedirect('ingredients/stocks');
        
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('addStocks')) {
                $data =[
                    'errors' => $this->validation->getErrors(),
                    'value' => $_POST,
                    'status' => 'Failed!',
                    'status_text' => 'Something missing!',
                    'status_icon' => 'error'
                ];
                return $this->response->setJSON($data);
            } else {
                $ingredients = $this->productsModel->get(['id' => $_POST['ingredient_id'], 'status' => 'a'])[0];

                $this->dateAndTime = new \DateTime($_POST['date_expiration']);
                $dataStocks = [
                    'ingredient_id' => $ingredients['id'],
                    'unit_quantity' => $_POST['unit_quantity'],
                    'unit_price' => $_POST['price'],
                    'product_description_id' => $ingredients['product_description_id'],
                    'stock_status' => 1,
                    'date_expiration' => $this->dateAndTime->format('Y-m-d'),
                ];
                $dataIngredient = [
                    'unit_quantity' => $ingredients['unit_quantity'] + $_POST['unit_quantity'],
                    'price' => $_POST['price'],
                    'stock_out_date' => $this->time->format('Y-m-d H:i:s'),
                    'product_status_id' => 1,
                ];
                if($this->ingredientReportModel->add($dataStocks)){
                    $this->productsModel->update($ingredients['id'], $dataIngredient);
                    $data =[
                        'status' => 'Success!',
                        'status_text' => 'Successfully Added!',
                        'status_icon' => 'success'
                    ];
                    return $this->response->setJSON($data);
                } else{
                    $data =[
                        'status' => 'Oops!',
                        'status_text' => 'Something went wrong!',
                        'status_icon' => 'error'
                    ];
                    return $this->response->setJSON($data);
                }
            }
        }
    }
    
    public function updateIngredientReport($id, $ingredientId) {
        $this->hasPermissionRedirect('ingredients/update-report');

        $ingredients = $this->productsModel->get(['id' => $id, 'status' => 'a'])[0];
        $ingredientReports = $this->ingredientReportModel->get(['id' => $ingredientId, 'status' => 'a'])[0];

        if ($this->request->getMethod() == 'post') 
        {
            if($ingredients['unit_quantity'] >= $_POST['unit_quantity']){
                $quantityReport = $ingredients['unit_quantity'] + $ingredientReports['unit_quantity'];

                $qdata = [
                    'unit_quantity' => $quantityReport - $_POST['unit_quantity'],
                ];

                $data = [
                    'unit_quantity' => $_POST['unit_quantity'],
                    'total_unit_price' => $_POST['unit_quantity'] * $ingredients['price'],
                ];

                if($this->ingredientReportModel->update($ingredientId, $data)){
                    $this->productsModel->update($id, $qdata);
                    $jdata =[
                        'status' => 'Success',
                        'status_text' => 'Successfully added a report to ingredients!',
                        'status_icon' => 'success'
                    ];
                } else{
                    $jdata =[
                        'status' => 'Oops!',
                        'status_text' => 'Something went wrong!',
                        'status_icon' => 'warning'
                    ];
                }
            }else{
                $jdata =[
                    'status' => 'Oops!',
                    'status_text' => 'Please check your stock of ingredients. You have low stock of ingredients.',
                    'status_icon' => 'warning'
                ];
            }
        }
		return $this->response->setJSON($jdata);
    }
    
    public function edit($id) {
        $this->hasPermissionRedirect('ingredients/u');

        $data = [
            'page_title' => 'LRFOIMS | Ingredients',
            'title' => 'Ingredients',
            'action' => 'Submit',
            'view' => 'Modules\ProductManagement\Views\ingredient\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->productsModel->get(['id' => $id])[0],
            'productCategory' => $this->productsCategoryModel->get(),
            'productStatus' => $this->productStatusModel->get(),
            'productDescription' => $this->productMeasureModel->get(),
        ];
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('editIngredients')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                // if($_POST['unit_quantity'] <=1){
                //     $_POST['product_status_id'] = 2;
                // }else{
                    // $_POST['product_status_id'] = 1;
                // }
                $this->productsModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Successfully Updated');
                return redirect()->to('/ingredients');
            }
        }

        return view('templates/index', $data);
    }

    public function delete($id){
        $this->hasPermissionRedirect('ingredients/d');
        
        $this->productsModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
}
