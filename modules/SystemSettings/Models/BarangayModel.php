<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class BarangayModel extends BaseModel
{
    protected $table = 'lrfoims_barangay';
    protected $allowedFields = [
        'barangay_code',
        'barangay_name',
        'region_code',
        'province_code',
        'city_code',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

}
