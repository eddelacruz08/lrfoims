<?php namespace Modules\OrderManagement\Models;

use App\Models\BaseModel;

class OrderModel extends BaseModel
{
    protected $table = 'lrfoims_orders';
    protected $allowedFields = [
        'order_number',
        'user_id',
        'menu_id',
        'quantity',
        'order_status_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'];

    public function getDetails($conditions = []){

        $this->select('u.id');
        $this->join('frbs_users as u', 'u.id = lrfoims_orders.user_id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->groupBy('lrfoims_orders.order_number');

        return $this->findAll();
    }

    public function getOrderDetails($conditions = []){

        $this->select('lrfoims_orders.*, os.order_status');
        $this->join('lrfoims_order_status as os', 'lrfoims_orders.order_status_id = os.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->groupBy('lrfoims_orders.order_number');

        return $this->findAll();
    }

}
