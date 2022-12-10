<?php

namespace Modules\UserManagement\Models;

use App\Models\BaseModel;

class UsersModel extends BaseModel
{
    protected $table = 'lrfoims_users';
    protected $allowedFields = [
        'role_id', 
        'first_name',
        'last_name',
        'email_address',
        'contact_number',
        'username', 
        'region_id', 
        'province_id', 
        'city_id', 
        'addtl_address', 
        'password', 
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data) {
        $data = $this->passwordHash($data);

        return $data;
    }

    protected function beforeUpdate(array $data) {
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function passwordHash(array $data) {
        if (isset($data['data']['password']))
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

        return $data;
    }

    public function getDetails($condition = []) {
        $this->select('lrfoims_users.*, lrfoims_roles.role_name, lrfoims_permissions.slug');
        $this->join('lrfoims_roles', ' lrfoims_roles.id = lrfoims_users.role_id');
        $this->join('lrfoims_permissions', ' lrfoims_roles.landing_page_id = lrfoims_permissions.id');
        
        foreach($condition as $field => $value){
            $this->where($field, $value);
        }

        return $this->findAll();  
    }

    public function getUserData() {
        $this->select('count(id) as user');
        return $this->findAll();
    }

    public function getTotalUsers($conditions = []) {

        $this->select('lrfoims_users.*, COUNT(lrfoims_users.id) as getTotalUsers');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

        return $this->findAll();
    }
}
