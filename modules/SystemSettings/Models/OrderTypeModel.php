<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class OrderTypeModel extends BaseModel
{
    protected $table = 'lrfoims_order_type';
    protected $allowedFields = [
        'type',
        'description',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'];
        
    public function getDetails($conditions = []){

        $this->select('lrfoims_order_type.*, m.name');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        // $this->groupBy('lrfoims_menus.id');

        return $this->findAll();
    }
}
