<?php

namespace Modules\UserManagement\Models;

use App\Models\BaseModel;

class RolesPermissionsModel extends BaseModel
{
  protected $table = 'lrfoims_roles_permissions';
  protected $allowedFields = [
      'role_id',
      'permission_id',
      'created_at', 
      'updated_at', 
      'deleted_at'
  ];

  public function getDetails($conditions = [])
  {
    $this->select('lrfoims_roles_permissions.*, p.permission, r.role_name');
    $this->join('lrfoims_permissions as p', 'p.id = lrfoims_roles_permissions.permission_id');
    $this->join('lrfoims_roles as r', 'r.id = lrfoims_roles_permissions.role_id');

    foreach($conditions as $field => $value){
        $this->where([$field => $value]);
    }

    return $this->findAll();
  }
    
  public function getSecurityPermissions($conditions = [])
  {
      $this->select('lrfoims_roles_permissions.*, p.slug');
      $this->join('lrfoims_permissions as p', 'p.id = lrfoims_roles_permissions.permission_id');
      $this->join('lrfoims_modules as m', 'm.id = p.module_id');
      
      foreach($conditions as $field => $value){
          $this->where($field, $value);
      }

      return $this->findAll();
  } 

  public function getPermissionsTypes($conditions = []){
    $this->select('pt.type, pt.slug as type_slug, pt.id as type_id');
    $this->join('lrfoims_permissions as p', 'p.id = lrfoims_roles_permissions.permission_id');
    $this->join('lrfoims_permission_types as pt', 'pt.id = p.permission_type');
    foreach ($conditions as $condition => $value) {
      $this->where($condition , $value);
    }
    $this->groupBy('pt.id');
    return $this->findAll();
  }

  public function getModules($conditions = []){

    $this->select('m.id as module_id, m.module, p.permission_type, p.slug, p.icon, p.id, m.button_link_type, p.landing_page_type');
    $this->join('lrfoims_permissions as p', 'p.id = lrfoims_roles_permissions.permission_id');
    $this->join('lrfoims_modules as m', 'm.id = p.module_id');
    foreach ($conditions as $condition => $value) {
      $this->where($condition , $value);
    }
    $this->groupBy('m.id');
    $this->orderBy('m.id', 'ASC');
    return $this->findAll();
  }

  public function getPermissions($conditions = []){
    $this->select('p.id, p.permission, p.module_id, p.permission_type, p.slug, p.icon, p.selection_id, p.landing_page_type');
    $this->join('lrfoims_permissions as p', 'p.id = lrfoims_roles_permissions.permission_id');
    foreach ($conditions as $condition => $value) {
      $this->where($condition , $value);
    }
    $this->groupBy('p.id');
    $this->orderBy('p.id', 'ASC');
    return $this->findAll();
  }

  public function softDeleteByRoleId($id){
    return $this->where('role_id', $id)->delete();
  }
  public function EditByModuleId($data, $id){
    return $this->update(['module_id' => $id], $data);
  }

}
