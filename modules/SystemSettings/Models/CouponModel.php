<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class CouponModel extends BaseModel
{
    protected $table = 'lrfoims_coupons';
    protected $allowedFields = [
        'name',
        'description',
        'code',
        'amount',
        'expiration_date',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

}
