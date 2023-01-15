<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class OrderDiscountModel extends BaseModel
{
    protected $table = 'lrfoims_order_user_discounts';
    protected $allowedFields = [
        'customer_type',
        'description',
        'discount_amount',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

}
