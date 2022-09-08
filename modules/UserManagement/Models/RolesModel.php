<?php namespace Modules\UserManagement\Models;

use App\Models\BaseModel;

class RolesModel extends BaseModel
{
    protected $table = 'lrfoims_roles';
    protected $allowedFields = [
        'role_name', 
        'description',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];
}
