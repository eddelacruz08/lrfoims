<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class MenuCategoryModel extends BaseModel
{
    protected $table = 'lrfoims_menu_category';
    protected $allowedFields = [
        'name',
        'description',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'];
        
    public function getDetails($conditions = []){

        $this->select('lrfoims_menu_category.*, m.name');
        $this->join('lrfoims_menus as m', 'lrfoims_menu_category.id = m.menu_category_id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        // $this->groupBy('lrfoims_menus.id');

        return $this->findAll();
    }
}
