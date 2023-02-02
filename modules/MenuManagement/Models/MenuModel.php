<?php namespace Modules\MenuManagement\Models;

use App\Models\BaseModel;

class MenuModel extends BaseModel
{
    protected $table = 'lrfoims_menus';
    protected $allowedFields = [
        'image',
        'menu',
        'description',
        'menu_category_id',
        'price',
        'star_rate',
        'menu_status',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'];

    public function getDetails($conditions = []){

        $this->select('lrfoims_menus.*');
        // $this->join('lrfoims_menu_category as mc', 'mc.id = lrfoims_menus.menu_category_id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        
        // $this->groupBy('lrfoims_menus.id');

        return $this->findAll();
    }
    
}
