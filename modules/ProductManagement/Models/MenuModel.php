<?php namespace Modules\IngredientManagement\Models;

use App\Models\BaseModel;

class MenuModel extends BaseModel
{
    protected $table = 'lrfoims_menus';
    protected $allowedFields = [
        'image',
        'menu',
        'menu_category_id',
        'price',
        'product_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'];

}
