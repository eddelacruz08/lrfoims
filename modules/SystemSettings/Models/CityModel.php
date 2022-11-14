<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class CityModel extends BaseModel
{
    protected $table = 'lrfoims_city_municipality';
    protected $allowedFields = [
        'psgcCode', 
        'city_name',
        'regDesc',
        'province_code',
        'city_code',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

}
