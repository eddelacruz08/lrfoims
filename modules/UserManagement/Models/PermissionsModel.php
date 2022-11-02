<?php namespace Modules\UserManagement\Models;

use App\Models\BaseModel;

class PermissionsModel extends BaseModel
{
    protected $table = 'lrfoims_permissions';
    protected $allowedFields = [
        'module_id',
        'permission',
        'permission_type',
        'slug',
        'icon',
        'selection_id',
        'landing_page_type',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getDetails($conditions = [])
    {
        $this->select('lrfoims_permissions.*, m.module, t.type');
        $this->join('lrfoims_modules as m', 'm.id = lrfoims_permissions.module_id');
        $this->join('lrfoims_permission_types as t', 't.id = lrfoims_permissions.permission_type');
        
        foreach($conditions as $field => $value){
            $this->where($field, $value);
        }

        return $this->findAll();
    }

    public function getPermissionsTypes($conditions = []){
        $this->select('p.id, p.permission, p.module_id, p.permission_type, p.slug');
        $this->join('lrfoims_permissions as p', 'p.id = lrfoims_roles_permissions.permission_id');
        foreach ($conditions as $condition => $value) {
          $this->where($condition , $value);
        }
        // $this->where('lrfoims_roles_permissions.role_id', session()->get('role_id'));
        return $this->findAll();
      }

}
