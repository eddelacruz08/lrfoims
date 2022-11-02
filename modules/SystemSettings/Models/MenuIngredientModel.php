<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class MenuIngredientModel extends BaseModel
{
    protected $table = 'lrfoims_menu_ingredients';
    protected $allowedFields = [
        'menu_id',
        'ingredient_id',
        'unit_quantity',
        'product_description_id',
        'price',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'];
        
    public function getDetails($conditions = []){

        $this->select('lrfoims_menu_ingredients.*, m.menu as menu_name, p.product_name as ingredient_name, m.menu_category_id, pm.name as description');
        $this->join('lrfoims_menus as m', 'lrfoims_menu_ingredients.menu_id = m.id');
        $this->join('lrfoims_products as p', 'lrfoims_menu_ingredients.ingredient_id = p.id');
        $this->join('lrfoims_product_measures as pm', 'lrfoims_menu_ingredients.product_description_id = pm.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        // $this->groupBy('lrfoims_menus.id');

        return $this->findAll();
    }
}
