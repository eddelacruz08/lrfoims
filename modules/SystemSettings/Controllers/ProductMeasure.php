<?php

namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class ProductMeasure extends BaseController
{
    function  __construct(){
        $this->productMeasureModel = new SystemSettings\ProductMeasureModel();
        helper(['form']);
    }

    public function index()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Ingredient Measurement',
            'title' => 'Ingredient Measure',
            'view' => 'Modules\SystemSettings\Views\productMeasure\index',
            'productMeasure' => $this->productMeasureModel->get()
        ];
        
        return view('templates/index', $data);
    }

    public function add()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Ingredient Measurement',
            'title' => 'Ingredient Measure',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\productMeasure\form',
            'edit' => false
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('productMeasure')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->productMeasureModel->add($_POST);
                $this->session->setFlashdata('success', 'Ingredient Measure Successfully Added');
                return redirect()->to('/ingredient-measures');
            }
        }

        return view('templates/index', $data);
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Ingredient Measure',
            'title' => 'Ingredient Measure',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\productMeasure\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->productMeasureModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('productMeasure')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->productMeasureModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Ingredient Measure Successfully Updated');
                return redirect()->to('/ingredient-measures');
            }
        }

        return view('templates/index', $data);
    }
    
    public function delete($id)
    {
        $this->productMeasureModel->SoftDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }

}
