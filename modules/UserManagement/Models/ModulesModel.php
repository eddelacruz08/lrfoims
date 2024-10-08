<?php namespace Modules\UserManagement\Models;

use App\Models\BaseModel;

class ModulesModel extends BaseModel
{
    protected $table = 'lrfoims_modules';
    protected $allowedFields = [
        'module', 
        'description',
        'button_link_type',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];
}
