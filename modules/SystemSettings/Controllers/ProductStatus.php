<?php

namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class ProductStatus extends BaseController
{
    function  __construct(){
        $this->productStatusModel = new SystemSettings\ProductStatusModel();
        helper(['form']);
    }

    public function index()
    {
        
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Ingredient Status',
            'title' => 'Ingredient Status',
            'view' => 'Modules\SystemSettings\Views\productStatus\index',
            'productStatus' => $this->productStatusModel->get()
        ];
        
        return view('templates/index', $data);
    }

    public function add()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Ingredient Status',
            'title' => 'Ingredient Status',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\productStatus\form',
            'edit' => false
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('productStatus')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->productStatusModel->add($_POST);
                $this->session->setFlashdata('success', 'Ingredient status Successfully Added');
                return redirect()->to('/ingredient-status');
            }
        }

        return view('templates/index', $data);
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Ingredient Status',
            'title' => 'Ingredient Status',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\productStatus\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->productStatusModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('productStatus')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->productStatusModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Ingredient status Successfully Updated');
                return redirect()->to('/ingredient-status');
            }
        }

        return view('templates/index', $data);
    }
    
    public function delete($id)
    {
        $this->productStatusModel->SoftDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }

}
