<?php namespace Modules\UserManagement\Models;

use App\Models\BaseModel;

class PermissionsModel extends BaseModel
{
    protected $table = 'frbs_permissions';
    protected $allowedFields = [
        'module_id',
        'permission',
        'permission_type',
        'slug',
        'icon',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getDetails($conditions = [])
    {
        $this->select('frbs_permissions.*, m.module, t.type');
        $this->join('frbs_modules as m', 'm.id = frbs_permissions.module_id');
        $this->join('frbs_permission_types as t', 't.id = frbs_permissions.permission_type');
        
        foreach($conditions as $field => $value){
            $this->where($field, $value);
        }

        return $this->findAll();
    }

    public function getPermissionsTypes($conditions = []){
        $this->select('p.id, p.permission, p.module_id, p.permission_type, p.slug');
        $this->join('frbs_permissions as p', 'p.id = frbs_roles_permissions.permission_id');
        foreach ($conditions as $condition => $value) {
          $this->where($condition , $value);
        }
        // $this->where('frbs_roles_permissions.role_id', session()->get('role_id'));
        return $this->findAll();
      }

}
