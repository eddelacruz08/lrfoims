<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class DeliveryFeeModel extends BaseModel
{
    protected $table = 'lrfoims_delivery_fees';
    protected $allowedFields = [
        'delivery_fee',
        'description',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

}
