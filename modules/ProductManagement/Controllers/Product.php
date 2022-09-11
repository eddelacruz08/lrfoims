<?php
namespace Modules\ProductManagement\Controllers;

use Modules\ProductManagement\Models as ProductManagement;
use Modules\UserManagement\Models as UserManagement;
use Modules\SystemSettings\Models as SystemSettings;
use Modules\IngredientReportManagement\Models as IngredientReportManagement;
use App\Controllers\BaseController;

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
        helper(['form']);
    }

    public function index()
    {
        $data = [
            'page_title' => 'LRFOIMS | Ingredients',
            'title' => 'Ingredients',
            'view' => 'Modules\ProductManagement\Views\ingredient\index',
            'productSortByCategory' => $this->productsCategoryModel->get(),
            'ingredients' => $this->productsModel->getProduct(),
            'ingredientReports' => $this->ingredientReportModel->get(),
            'date' => $this->dateAndTime
        ];
        return view('templates/index', $data);
    }
    
    public function add()
    {
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
                if($_POST['quantity'] == 0){
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

    public function addIngredientReport($id)
	{
        $ingredients = $this->productsModel->get(['id' => $id, 'status' => 'a'])[0];

        if ($this->request->getMethod() == 'post') 
        {
            if($ingredients['quantity'] >= $_POST['quantity']){

                $data = [
                    'ingredient_id' => $id,
                    'quantity' => $_POST['quantity'],
                    'total_unit_price' => $_POST['quantity'] * $ingredients['price'],
                ];

                $quantity = $ingredients['quantity'] - $_POST['quantity'];

                if($quantity == 0){
                    $qdata = [
                        'quantity' => $ingredients['quantity'] - $_POST['quantity'],
                        'stock_out_date' => $this->time->format('Y-m-d H:i:s'),
                        'product_status_id' => 2,
                    ];
                }else{
                    $qdata = [
                        'quantity' => $ingredients['quantity'] - $_POST['quantity'],
                        'stock_out_date' => $this->time->format('Y-m-d H:i:s'),
                    ];
                }

                if($this->ingredientReportModel->add($data)){

                    $this->productsModel->update($ingredients['id'], $qdata);
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
    
    public function updateIngredientReport($id, $ingredientId)
	{
        $ingredients = $this->productsModel->get(['id' => $id, 'status' => 'a'])[0];
        $ingredientReports = $this->ingredientReportModel->get(['id' => $ingredientId, 'status' => 'a'])[0];

        if ($this->request->getMethod() == 'post') 
        {
            if($ingredients['quantity'] >= $_POST['quantity']){
                $quantityReport = $ingredients['quantity'] + $ingredientReports['quantity'];

                $qdata = [
                    'quantity' => $quantityReport - $_POST['quantity'],
                ];

                $data = [
                    'quantity' => $_POST['quantity'],
                    'total_unit_price' => $_POST['quantity'] * $ingredients['price'],
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
    
    public function edit($id)
    {
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
                if($_POST['quantity'] == 0){
                    $_POST['product_status_id'] = 2;
                }
                $this->productsModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Ingredient Successfully Updated');
                return redirect()->to('/ingredients');
            }
        }

        return view('templates/index', $data);
    }

    public function delete($id)
    {
        $this->productsModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
}
