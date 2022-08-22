<?php

namespace Modules\ProductManagement\Controllers;

use Modules\ProductManagement\Models as ProductManagement;
use Modules\UserManagement\Models as UserManagement;
use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class Ingredient extends BaseController
{
    function __construct(){
        $this->productsModel = new ProductManagement\ProductModel();
        $this->productsCategoryModel = new ProductManagement\ProductCategoryModel();
        $this->rolesPermissionsModel = new UserManagement\RolesPermissionsModel();
        $this->equipmentStatusModel = new SystemSettings\EquipmentStatusModel();
        // $this->equipmentCondtionsModel = new SystemSettings\EquipmentConditionsModel();
        helper(['form']);
    }

    public function index()
    {
        $data = [
            'page_title' => 'LRFOIMS | Products',
            'title' => 'Ingredient',
            'view' => 'Modules\ProductManagement\Views\Ingredient\index',
            'products' => $this->productsModel->getProduct()
        ];
        return view('templates/index', $data);
    }
    
    public function add()
    {
        $data = [
            'page_title' => 'LRFOIMS | Add Products',
            'title' => 'Products',
            'view' => 'Modules\ProductManagement\Views\product\form',
            'edit' => false,
            'productCategory' => $this->productsCategoryModel->get(),
            'productCategoryStatus' => $this->equipmentStatusModel->get(),
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('products')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->productsModel->add($_POST);
                $this->session->setFlashdata('success', 'Product Successfully Added');
                return redirect()->to('/products');
            }
        }

        return view('templates/index', $data);
    }
    public function edit($id)
    {
        $data = [
            'page_title' => 'LRFOIMS | Products',
            'title' => 'Products',
            'view' => 'Modules\ProductManagement\Views\product\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->productsModel->get(['id' => $id])[0],
            'productCategory' => $this->productsCategoryModel->get(),
        ];
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('products')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->productsModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Product Successfully Updated');
                return redirect()->to('/products');
            }
        }

        return view('templates/index', $data);
    }

    public function delete($id)
    {
        $equipment = $this->productsModel->get(['id' => $id])[0];
        $this->productsModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
}
