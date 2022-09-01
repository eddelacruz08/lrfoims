<?php
namespace Modules\ProductManagement\Controllers;

use Modules\ProductManagement\Models as ProductManagement;
use Modules\UserManagement\Models as UserManagement;
use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class Product extends BaseController
{
    function __construct(){
        $this->productsModel = new ProductManagement\ProductModel();
        $this->productsCategoryModel = new SystemSettings\ProductCategoryModel();
        $this->rolesPermissionsModel = new UserManagement\RolesPermissionsModel();
        $this->productStatusModel = new SystemSettings\ProductStatusModel();
        $this->productDescriptionModel = new SystemSettings\ProductDescriptionModel();
        helper(['form']);
    }

    public function index()
    {
        $data = [
            'page_title' => 'LRFOIMS | Ingredients',
            'title' => 'Ingredients',
            'view' => 'Modules\ProductManagement\Views\ingredient\index',
            'productSortByCategory' => $this->productsCategoryModel->get(),
            'ingredients' => $this->productsModel->getProduct()
        ];
        return view('templates/index', $data);
    }
    
    public function add()
    {
        $data = [
            'page_title' => 'LRFOIMS | Add Ingredients',
            'title' => 'Ingredients',
            'view' => 'Modules\ProductManagement\Views\product\form',
            'edit' => false,
            'productCategory' => $this->productsCategoryModel->get(),
            'productStatus' => $this->productStatusModel->get(),
            'productDescription' => $this->productDescriptionModel->get(),
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('ingredients')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->productsModel->add($_POST);
                $this->session->setFlashdata('success', 'Ingredient Successfully Added');
                return redirect()->to('/ingredients');
            }
        }

        return view('templates/index', $data);
    }
    
    public function editStatus($id)
    {
        $data = [
            'view' => 'Modules\ProductManagement\Views\ingredient\index'
        ];
        if ($this->request->getMethod() == 'post') {
            $this->productsModel->update($id, $_POST);
            $this->session->setFlashdata('success_no_flash', 'Ingredient quantity successfully changed');
            return redirect()->to('/ingredients');
        }

        return view('templates/index', $data);
    }

    public function editQtyProduct($id)
    {
        $data = [
            'page_title' => 'LRFOIMS | Orders',
            'title' => 'Orders',
            'view' => 'Modules\OrderManagement\Views\orders\orders',
            'id' => $id,
        ];
        if ($this->request->getMethod() == 'post') {
            $this->cartsModel->update($id, $_POST);
            $this->session->setFlashdata('success_no_flash', 'Order quantity successfully changed');
            return redirect()->to('/orders');
        }

        return view('templates/index', $data);
    }

    public function edit($id)
    {
        $data = [
            'page_title' => 'LRFOIMS | Ingredients',
            'title' => 'Ingredients',
            'view' => 'Modules\ProductManagement\Views\ingredient\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->productsModel->get(['id' => $id])[0],
            'productCategory' => $this->productsCategoryModel->get(),
            'productStatus' => $this->productStatusModel->get(),
            'productDescription' => $this->productDescriptionModel->get(),
        ];
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('ingredients')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
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
