<?php namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use Modules\MenuManagement\Models as MenuManagement;
use Modules\ProductManagement\Models as ProductManagement;
use App\Controllers\BaseController;

class MenuIngredient extends BaseController
{
	function __construct(){
		$this->menuIngredientModel = new SystemSettings\MenuIngredientModel();
		$this->menuCategoryModel = new SystemSettings\MenuCategoryModel();
		$this->menusModel = new MenuManagement\MenuModel();
        $this->productsModel = new ProductManagement\ProductModel();
        $this->ingredientMeasurementModel = new SystemSettings\ProductMeasureModel();
		helper(['form','link']);
	}

	public function index()
	{
		$data = [
			'page_title' => 'LRFOIMS | Menu Ingredient',
			'title' => 'Menu Ingredient',
			'view' => 'Modules\SystemSettings\Views\menuIngredient\index',
			'menuIngredient' => $this->menuIngredientModel->getDetails(),
			'menuName' => $this->menusModel->get(),
			'menuCategory' => $this->menuCategoryModel->get(),
		];

		return view('templates/index', $data);
	}

    public function addIngredient($id)
    {
        $data = [
            'page_title' => 'LRFOIMS | Menu Ingredient',
            'title' => 'Menu Ingredient',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\menuIngredient\form',
            'edit' => false,
            'id' => $id,
            'menus' => $this->menusModel->get(['id' => $id])[0],
            'ingredients' => $this->productsModel->get(),
            'ingredientDescription' => $this->ingredientMeasurementModel->get(),
        ];
        if ($this->request->getMethod() == 'post') {
            $ingredients = $this->productsModel->get(['id'=>$_POST['ingredient_id']])[0];
            $_POST['product_description_id'] = $ingredients['product_description_id'];
            if (!$this->validate('menuIngredient')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $checkDuplicateMenuIngredients = $this->menuIngredientModel->get(['menu_id' => $id, 'ingredient_id' => $_POST['ingredient_id']]);
                if(!empty($checkDuplicateMenuIngredients)){
                    $this->session->setFlashdata('error', 'Already added ingredient!');
                    return redirect()->to('/menu-ingredients');
                }else{
                    $this->menuIngredientModel->add($_POST);
                    $this->session->setFlashdata('success', 'Successfully added');
                    return redirect()->to('/menu-ingredients');
                }
            }
        }

        return view('templates/index', $data);
    }

    public function editIngredient($id, $menu_id)
    {
        $data = [
            'page_title' => 'LRFOIMS | Menu Ingredient',
            'title' => 'Menu Ingredient',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\menuIngredient\form',
            'edit' => true,
            'id' => $id,
            'menu_id' => $menu_id,
            'value' => $this->menuIngredientModel->get(['id' => $id])[0],
            'menus' => $this->menusModel->get(['id' => $menu_id])[0],
            'ingredients' => $this->productsModel->get(),
            'ingredientDescription' => $this->ingredientMeasurementModel->get(),
        ];
        if ($this->request->getMethod() == 'post') {
            $ingredients = $this->productsModel->get(['id'=>$_POST['ingredient_id']])[0];
            $_POST['product_description_id'] = $ingredients['product_description_id'];
            // die(print_r($_POST));
            if (!$this->validate('menuIngredient')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->menuIngredientModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Successfully updated');
                return redirect()->to('/menu-ingredients');
            }
        }

        return view('templates/index', $data);
    }

    public function delete($id)
    {
        $this->menuIngredientModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
	//--------------------------------------------------------------------
}
