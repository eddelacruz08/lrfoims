<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class OrderLimitModel extends BaseModel
{
    protected $table = 'lrfoims_order_limit';
    protected $allowedFields = [
        'max_limit',
        'order_type',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

}
