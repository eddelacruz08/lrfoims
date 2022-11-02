<?php namespace Modules\UserManagement\Models;

use App\Models\BaseModel;

class RolesModel extends BaseModel
{
    protected $table = 'lrfoims_roles';
    protected $allowedFields = [
        'role_name', 
        'description',
        'landing_page_id', 
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];
    
    public function getDetails($condition = []) {
        $this->select('lrfoims_roles.*, lrfoims_permissions.permission');
        $this->join('lrfoims_permissions', ' lrfoims_roles.landing_page_id = lrfoims_permissions.id');
        
        foreach($condition as $field => $value){
            $this->where($field, $value);
        }

        return $this->findAll();  
    }
}
