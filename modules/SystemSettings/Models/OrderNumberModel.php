<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class OrderNumberModel extends BaseModel
{
    protected $table = 'lrfoims_order_numbers';
    protected $allowedFields = [
        'number', 
        'number_status',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

    public function getDetails($conditions = []){

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        // $this->groupBy('lrfoims_orders.order_number');

        return $this->findAll();
    }

}
