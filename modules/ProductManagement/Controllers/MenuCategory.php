<?php namespace Modules\ProductManagement\Controllers;

use Modules\ProductManagement\Models as ProductManagement;
use App\Controllers\BaseController;

class MenuCategory extends BaseController
{
	function __construct(){
		$this->menuCategoryModel = new ProductManagement\MenuCategoryModel();
		helper(['form']);
	}

	public function index()
	{
		$data = [
			'page_title' => 'LRFOIMS | Menu Category',
			'title' => 'Menu Category',
			'view' => 'Modules\ProductManagement\Views\menuCategory\index',
			'menuCategory' => $this->menuCategoryModel->get(),
		];

		return view('templates/index', $data);
	}

    public function add()
    {
        $data = [
            'page_title' => 'LRFOIMS | Menu Category',
            'title' => 'Menu Category',
            'view' => 'Modules\ProductManagement\Views\menuCategory\form',
            'edit' => false,
            'menuCategory' => $this->menuCategoryModel->get()
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('menuCategory')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->menuCategoryModel->add($_POST);
                $this->session->setFlashdata('success', 'Menu Category successfully added');
                return redirect()->to('/menu-category');
            }
        }

        return view('templates/index', $data);
    }

    public function edit($id)
    {
        $data = [
            'page_title' => 'LRFOIMS | Menu Category',
            'title' => 'Menu Category',
            'view' => 'Modules\ProductManagement\Views\menuCategory\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->menuCategoryModel->get(['id' => $id])[0]
        ];
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('menu')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->menuCategoryModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Menu Category successfully updated');
                return redirect()->to('/menu-category');
            }
        }

        return view('templates/index', $data);
    }

    public function delete($id)
    {
        $this->menuCategoryModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
	//--------------------------------------------------------------------
}
