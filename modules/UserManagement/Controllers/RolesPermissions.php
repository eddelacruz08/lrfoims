<?php namespace Modules\UserManagement\Controllers;

use Modules\UserManagement\Models as UserManagement;
use App\Controllers\BaseController;

class RolesPermissions extends BaseController
{
  function __construct(){
      $this->rolesPermissionsModel = new UserManagement\RolesPermissionsModel();
      $this->permissionsModel = new UserManagement\PermissionsModel();
      $this->modulesModel = new UserManagement\ModulesModel();
      $this->rolesModel = new UserManagement\RolesModel();
      $this->time = new \DateTime();
      helper(['form','link']);
  }

  public function index() {
    $this->hasPermissionRedirect('roles-permissions');

    $data = [
        'page_title' => 'LRFOIMS | Roles Permissions',
        'title' => 'Roles Permissions',
        'view' => 'Modules\UserManagement\Views\RolesPermissions\index',
        'roles' => $this->rolesModel->get(),
    ];
    
    return view('templates/index',$data);
  }

  public function edit($id){
    $this->hasPermissionRedirect('roles-permissions/u');

    $data['page_title'] = 'LRFOIMS | Roles Permissions';
    $data['title'] = 'Roles Permissions';
    $data['action'] = 'Submit';
    $data['edit'] = true;
    $data['view'] = 'Modules\UserManagement\Views\RolesPermissions\form';
    $data['id'] = $id;
    $data['roles'] = $this->rolesModel->get();
    $data['modules'] = $this->modulesModel->get();
    $data['permissions'] = $this->permissionsModel->get();
    $data['role_permissions'] = $this->rolesPermissionsModel->getDetails(['r.id' => $id]);

    $data['value'] = $this->rolesModel->get(['id' => $id])[0];
    if(empty($data['value'])){
      die('Some Error Code Here (No Record)');
    }

    if($this->request->getMethod() === 'post'){
        if ($this->rolesPermissionsModel->softDeleteByRoleId($id)) {
          if(!empty($_POST['permission_id'])){
            foreach ($_POST['permission_id'] as $key => $value) {
              $permission = $this->rolesPermissionsModel->get(['role_id' => $id, 'permission_id' => $value]);
              if (!empty($permission)) {
                $this->rolesPermissionsModel->EditByModuleId(['deleted_at' => null],$value);
              } else {
                $this->rolesPermissionsModel->add(['role_id' => $id, 'permission_id' => $value]);
              }
            }
          }
          $this->session->setFlashData('success', 'Successfully edit permission roles!');
        } else {
          $this->session->setFlashData('error', 'Something went wrong!');
        }
        return redirect()->to(base_url('roles-permissions'));
    }
    return view('templates/index', $data);
  }

  public function retrieve(){
    $data['own_permissions'] = $this->rolesPermissionsModel->getPermissions(['lrfoims_roles_permissions.role_id' => $_GET['id']]);
    $data['permission_types'] = $this->rolesPermissionsModel->getPermissionsTypes(['lrfoims_roles_permissions.role_id' => $_GET['id']]);
    $data['modules'] = $this->rolesPermissionsModel->getModules(['lrfoims_roles_permissions.role_id' => $_GET['id']]);
    return view('Modules\UserManagement\Views\RolesPermissions\permissions', $data);
  }
}
