<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class PaymentMethodModel extends BaseModel
{
    protected $table = 'lrfoims_payment_methods';
    protected $allowedFields = [
        'payment_method',
        'description',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

}
