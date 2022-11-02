<?php

namespace Modules\UserManagement\Models;

use App\Models\BaseModel;

class LogsModel extends BaseModel
{
    protected $table = 'lrfoims_logs';
    protected $allowedFields = [
        'user_id',
        'description',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getDetails($conditions = []){
        $this->select('lrfoims_logs.*, lrfoims_logs.id as lid, u.first_name, u.last_name, r.role_name, u.username');
        $this->join('lrfoims_users as u',  'lrfoims_logs.user_id = u.id');
        $this->join('lrfoims_roles as r',  'u.role_id = r.id');
        
        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        
        $this->orderBy('lrfoims_logs.id', 'desc');

	    return $this->findAll();
    }
    
    public function getTotalLogs($conditions = []){

        $this->select('lrfoims_logs.*, COUNT(lrfoims_logs.id) as getTotalLogs');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

        return $this->findAll();
    }

}
