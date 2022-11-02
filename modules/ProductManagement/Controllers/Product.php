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
            'productSortByCategory' => $this->productsCategoryModel->get(),
            'ingredients' => $this->productsModel->getProduct(),
            'ingredientReports' => $this->ingredientReportModel->getIngredientReports(),
            'date' => $this->dateAndTime
        ];
        return view('templates/index', $data);
    }

    public function importCsvFile() {
        $this->hasPermissionRedirect('ingredients/batch-upload/stock-in');

        $data = [
            'page_title' => 'LRFOIMS | Ingredients',
            'title' => 'Ingredients',
            'view' => 'Modules\ProductManagement\Views\ingredient\index',
            'productSortByCategory' => $this->productsCategoryModel->get(),
            'ingredients' => $this->productsModel->getProduct(),
            'ingredientReports' => $this->ingredientReportModel->getIngredientReports(),
            'date' => $this->dateAndTime,
        ];
        $upload_file = $_FILES['upload_file']['name'];
        $extension = pathinfo($upload_file, PATHINFO_EXTENSION);
        if($extension == 'csv'){
            $reader= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } else if($extension=='xls'){
            $reader= new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $reader= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
        $sheetdata = $spreadsheet->getActiveSheet()->toArray();
        $sheetcount = count($sheetdata);
        $counted = 0; 
        $notCount = 0; 
        if($sheetcount > 1)
        {
            $data = array();
            for ($i = 1; $i < $sheetcount; $i++) { 
                $id = $sheetdata[$i][0];
                $unit_quantity = $sheetdata[$i][3];
                $price = $sheetdata[$i][5];
                $ingredients = $this->productsModel->get(['id' => $id, 'status' => 'a'])[0];

                
                if(!empty($ingredients)){
                    $ingredientData = [
                        'unit_quantity' => $ingredients['unit_quantity'] - $unit_quantity,
                        'price' => $ingredients['price'] - str_replace(',', '', $price),
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
                } else {
                    $this->session->setFlashdata('error', 'Batch file are not imported.');
                }
            }
        }
        return redirect()->to('/ingredients');   
    }

    public function exportIngredients() {
        $this->hasPermissionRedirect('ingredients/batch-upload/export');

        // file name 
        $filename = 'ingredients_'.date('Ymd').'.csv'; 
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
            if (!$this->validate('ingredients')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                if($_POST['unit_quantity'] == 0){
                    $_POST['product_status_id'] = 2;
                }else{
                    $_POST['product_status_id'] = 1;
                }
                $this->productsModel->add($_POST);
                $this->session->setFlashdata('success', 'Ingredient Successfully Added');
                return redirect()->to('/ingredients');
            }
        }

        return view('templates/index', $data);
    }

    public function stockReport($id) {
        $this->hasPermissionRedirect('ingredients/stocks');

        $data = [
            'page_title' => 'LRFOIMS | Ingredients',
            'title' => 'Ingredients',
            'view' => 'Modules\ProductManagement\Views\ingredient\index',
            'productSortByCategory' => $this->productsCategoryModel->get(),
            'ingredients' => $this->productsModel->getProduct(),
            'ingredientReports' => $this->ingredientReportModel->getIngredientReports(),
            'date' => $this->dateAndTime
        ];
        $ingredients = $this->productsModel->get(['id' => $id, 'status' => 'a'])[0];
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('ingredientStockInAndOut')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                if($_POST['stock_type'] == 'in'){
                    $dataReport = [
                        'ingredient_id' => $id,
                        'unit_quantity' => $_POST['unit_quantity'],
                        'unit_price' => $_POST['price'],
                        'total_unit_price' => $_POST['price'],
                        'product_description_id' => $ingredients['product_description_id'],
                        'stock_status' => 1,
                    ];
                    $quantity = $ingredients['unit_quantity'] + $_POST['unit_quantity'];
                    if($quantity >= 0){
                        $dataIngredient = [
                            'unit_quantity' => $ingredients['unit_quantity'] + $_POST['unit_quantity'],
                            'price' => $ingredients['price'] + $_POST['price'],
                            'stock_out_date' => $this->time->format('Y-m-d H:i:s'),
                            'product_status_id' => 1,
                        ];
                    }else{
                        $dataIngredient = [
                            'unit_quantity' => $ingredients['unit_quantity'] + $_POST['unit_quantity'],
                            'price' => $ingredients['price'] + $_POST['price'],
                            'stock_out_date' => $this->time->format('Y-m-d H:i:s'),
                            'product_status_id' => 2,
                        ];
                    }
                    if($this->ingredientReportModel->add($dataReport)){
                        $this->productsModel->update($ingredients['id'], $dataIngredient);
                        $this->session->setFlashdata('success', 'Successfully Added Ingredient!');
                        return redirect()->to('/ingredients');
                    } else{
                        $this->session->setFlashdata('error', 'Oops! Something went wrong!');
                        return redirect()->to('/ingredients');
                    }
                }else if($_POST['stock_type'] == 'out'){
                    if($ingredients['unit_quantity'] >= $_POST['unit_quantity'] && $ingredients['price'] >= $_POST['price']){
                        $dataReport = [
                            'ingredient_id' => $id,
                            'unit_quantity' => $_POST['unit_quantity'],
                            'unit_price' => $_POST['price'],
                            'total_unit_price' => $_POST['price'],
                            'product_description_id' => $ingredients['product_description_id'],
                            'stock_status' => 0,
                        ];
                        $quantity = $ingredients['unit_quantity'] - $_POST['unit_quantity'];
                        if($quantity >= 0){
                            $dataIngredient = [
                                'unit_quantity' => $ingredients['unit_quantity'] - $_POST['unit_quantity'],
                                'price' => $ingredients['price'] - $_POST['price'],
                                'stock_out_date' => $this->time->format('Y-m-d H:i:s'),
                                'product_status_id' => 1,
                            ];
                        }else{
                            $dataIngredient = [
                                'unit_quantity' => $ingredients['unit_quantity'] - $_POST['unit_quantity'],
                                'price' => $ingredients['price'] - $_POST['price'],
                                'stock_out_date' => $this->time->format('Y-m-d H:i:s'),
                                'product_status_id' => 2,
                            ];
                        }
                        if($this->ingredientReportModel->add($dataReport)){
                            $this->productsModel->update($ingredients['id'], $dataIngredient);
                            $this->session->setFlashdata('success', 'Successfully Added Ingredient!');
                            return redirect()->to('/ingredients');
                        } else{
                            $this->session->setFlashdata('error', 'Oops! Something went wrong!');
                            return redirect()->to('/ingredients');
                        }
                    }else{
                        $this->session->setFlashdata('error', 'Oops! Please check your stock of ingredients. You have no enough stocks of ingredients.');
                        return redirect()->to('/ingredients');
                    }
                }else{
                    $this->session->setFlashdata('error', 'Complete all fields!');
                    return redirect()->to('/ingredients');
                }
            }
        }
        return view('templates/index', $data);
    
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
            if (!$this->validate('ingredients')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                if($_POST['unit_quantity'] == 0){
                    $_POST['product_status_id'] = 2;
                }else{
                    $_POST['product_status_id'] = 1;
                }
                $this->productsModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Ingredient Successfully Updated');
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
