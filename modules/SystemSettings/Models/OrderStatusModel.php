<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class OrderStatusModel extends BaseModel
{
    protected $table = 'lrfoims_order_status';
    protected $allowedFields = [
        'order_status', 
        'description',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

    public function getDetails($conditions = []){

        $this->select('lrfoims_order_status.*');
        $this->join('lrfoims_orders as o', 'o.order_status_id = lrfoims_order_status.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        // $this->groupBy('lrfoims_orders.order_number');

        return $this->findAll();
    }

}
