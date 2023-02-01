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

        // file name 
        $filename = 'ingredients_'.date('Ymdhi').'.csv'; 
        header("Content-Description: File Transfer"); 
        header("Content-Disposition: attachment; filename=$filename"); 
        header("Content-Type: application/csv; ");

        $ingredientsData = $this->productsModel->getProduct(['lrfoims_products.status'=>'a']);

        // file creation 
        $file = fopen('php://output', 'w');

        $header = array("ID","Ingredient Name", "Category Name", "Unit of Measure", "Measurement", "Amount", "status", "Created Date"); 
        fputcsv($file, $header);
        foreach ($ingredientsData as $key){ 
            $line = [
                'id' => $key['id'],
                'product_name' => $key['product_name'],
                'product_description' => $key['product_description'],
                'unit_quantity' => $key['unit_quantity'],
                'product_description_id' => $key['description'],
                'price' => number_format($key['price']),
                'name' => $key['name'],
                'created_at' => Date('F d, Y - h:i a', strtotime($key['created_at'])),
            ];
            fputcsv($file,$line); 
        }
        fclose($file); 
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
                    $_POST['product_status_id'] = 1;
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
                    $_POST['product_status_id'] = 1;
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
