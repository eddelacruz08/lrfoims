<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class ProductDescriptionModel extends BaseModel
{
    protected $table = 'lrfoims_product_description';
    protected $allowedFields = [
        'name', 
        'description',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

}
