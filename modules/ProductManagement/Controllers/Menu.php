<?php namespace Modules\ProductManagement\Controllers;

use Modules\ProductManagement\Models as ProductManagement;
use App\Controllers\BaseController;

class Menu extends BaseController
{
	function __construct(){
		$this->menuModel = new ProductManagement\MenuModel();
		$this->menuCategoryModel = new ProductManagement\MenuCategoryModel();
		helper(['form']);
	}

	public function index()
	{
		$data = [
			'page_title' => 'LRFOIMS | Menu List',
			'title' => 'Menu List',
			'view' => 'Modules\ProductManagement\Views\menu\index',
			'menu' => $this->menuModel->get(),
			'menuCategory' => $this->menuCategoryModel->get(),
		];

		return view('templates/index', $data);
	}

    public function add()
    {
        $data = [
            'page_title' => 'LRFOIMS | Menu List',
            'title' => 'Menu List',
            'view' => 'Modules\ProductManagement\Views\menu\form',
            'edit' => false,
            'menuCategory' => $this->menuCategoryModel->get()
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('menu')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $file = $this->request->getFile('image');
                if ($file->isValid() && !$file->hasMoved()) {
                $imageName = $file->getRandomName();
                $file->move('./assets/uploads/menu', $imageName);
                }

                $_POST['image'] = $imageName;

                $this->menuModel->add($_POST);
                $this->session->setFlashdata('success', 'Menu successfully added');
                return redirect()->to('/menu-list');
            }
        }

        return view('templates/index', $data);
    }

    public function edit($id)
    {
        $data = [
            'page_title' => 'LRFOIMS | Menu List',
            'title' => 'Menu List',
            'view' => 'Modules\ProductManagement\Views\menu\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->menuModel->get(['id' => $id])[0],
            'menuCategory' => $this->menuCategoryModel->get()
        ];
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('menu')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {

                $menu = $this->menuModel->get(['id' => $id])[0];
                $currentImage = $menu['image'];
                $file = $this->request->getFile('image');

                if ($file->isValid() && !$file->hasMoved()) {

                    if(file_exists('./assets/uploads/menu/'.$currentImage)){
                        unlink('./assets/uploads/menu/'.$currentImage);
                    }

                    $imageName = $file->getRandomName();
                    $file->move('./assets/uploads/menu/', $imageName);
                } else {
                    $imageName = $currentImage;
                }

                $_POST['image'] = $imageName;

                $this->menuModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Menu List successfully updated');
                return redirect()->to('/menu-list');
            }
        }

        return view('templates/index', $data);
    }

    public function delete($id)
    {
        $menu = $this->menuModel->get(['id' => $id])[0];
        if(file_exists('./assets/uploads/menu/'.$menu['image'])){
            unlink('./assets/uploads/menu/'.$menu['image']);
        }
        $this->menuModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
	//--------------------------------------------------------------------
}
