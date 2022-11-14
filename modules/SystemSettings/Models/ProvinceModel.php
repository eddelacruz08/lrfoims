<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class ProvinceModel extends BaseModel
{
    protected $table = 'lrfoims_provinces';
    protected $allowedFields = [
        'psgcCode', 
        'province_name',
        'region_code',
        'province_code',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

}
