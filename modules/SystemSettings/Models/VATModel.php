<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class VATModel extends BaseModel
{
    protected $table = 'lrfoims_vat';
    protected $allowedFields = [
        'divide_vat',
        'multiply_vat',
        'description',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

}
