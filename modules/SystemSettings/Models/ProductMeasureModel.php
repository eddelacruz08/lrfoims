<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class ProductMeasureModel extends BaseModel
{
    protected $table = 'lrfoims_product_measures';
    protected $allowedFields = [
        'name', 
        'description',
        'low_stock_minimum_limit',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

}
