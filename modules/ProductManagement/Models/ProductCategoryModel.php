<?php

namespace Modules\ProductManagement\Models;

use App\Models\BaseModel;

class ProductCategoryModel extends BaseModel
{
    protected $table = 'lrfoims_product_categories';
    protected $allowedFields = [
        'product_name',
        'product_description',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getDetails($conditions = []){
        $this->select('lrfoims_product_categories.*');
        $this->join('lrfoims_products as p', 'lrfoims_product_categories.id = p.product_category_id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

	    return $this->findAll();
    }
}
