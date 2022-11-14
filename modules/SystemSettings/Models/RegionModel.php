<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class RegionModel extends BaseModel
{
    protected $table = 'lrfoims_regions';
    protected $allowedFields = [
        'psgcCode', 
        'region_name',
        'region_code',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

}
