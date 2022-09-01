<?php

namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class ProductDescription extends BaseController
{
    function  __construct(){
        $this->productDescriptionModel = new SystemSettings\ProductDescriptionModel();
        helper(['form']);
    }

    public function index()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Ingredient Description',
            'title' => 'Ingredient Description',
            'view' => 'Modules\SystemSettings\Views\productDescription\index',
            'productDescription' => $this->productDescriptionModel->get()
        ];
        
        return view('templates/index', $data);
    }

    public function add()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Ingredient Description',
            'title' => 'Ingredient Description',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\productDescription\form',
            'edit' => false
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('productDescription')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->productDescriptionModel->add($_POST);
                $this->session->setFlashdata('success', 'Ingredient Description Successfully Added');
                return redirect()->to('/ingredient-descriptions');
            }
        }

        return view('templates/index', $data);
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Ingredient Description',
            'title' => 'Ingredient Description',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\productDescription\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->productDescriptionModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('productDescription')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->productDescriptionModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Ingredient Description Successfully Updated');
                return redirect()->to('/ingredient-descriptions');
            }
        }

        return view('templates/index', $data);
    }
    
    public function delete($id)
    {
        $this->productDescriptionModel->SoftDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }

}
