<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class ProductStatusModel extends BaseModel
{
    protected $table = 'lrfoims_product_status';
    protected $allowedFields = [
        'name', 
        'description',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

}
