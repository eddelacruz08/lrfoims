<?php namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class ProductCategory extends BaseController
{
	function __construct(){
		$this->productCategoryModel = new SystemSettings\ProductCategoryModel();
		helper(['form']);
	}

	public function index()
	{
		$data = [
			'page_title' => 'LRFOIMS | Ingredient Categories',
			'title' => 'Ingredient Categories',
			'view' => 'Modules\SystemSettings\Views\productCategory\index',
			'productCategory' => $this->productCategoryModel->get(),
		];

		return view('templates/index', $data);
	}

	public function add()
    {
        $data = [
            'page_title' => 'LRFOIMS | Add Ingredient Category',
            'title' => 'Ingredient Categories',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\productCategory\form',
            'edit' => false,
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('productCategory')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->productCategoryModel->add($_POST);
                $this->session->setFlashdata('success', 'Ingredient Category Successfully Added');
                return redirect()->to('/ingredient-categories');
            }
        }

        return view('templates/index', $data);
    }

	public function edit($id)
    {
        $data = [
            'page_title' => 'LRFOIMS | Ingredient Category',
            'title' => 'Ingredient Category',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\productCategory\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->productCategoryModel->get(['id' => $id])[0],
        ];
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('productCategory')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->productCategoryModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Ingredient Category Successfully Updated');
                return redirect()->to('/ingredient-categories');
            }
        }

        return view('templates/index', $data);
    }
	public function delete($id)
    {
        $equipment = $this->productCategoryModel->get(['id' => $id])[0];
        $this->productCategoryModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
	//--------------------------------------------------------------------
}
