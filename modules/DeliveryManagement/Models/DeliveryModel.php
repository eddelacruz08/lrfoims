<?php namespace Modules\DeliveryManagement\Models;

use App\Models\BaseModel;

class DeliveryModel extends BaseModel
{
    protected $table = 'lrfoims_orders';
    protected $allowedFields = [
        'number',
        'user_id',
        'menu_id',
        'quantity',
        'order_status_id',
        'total_amount',
        'c_cash',
        'c_balance',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'];

    public function getDetails($conditions = []){

        $this->select('lrfoims_orders.*, u.id, lrfoims_orders.id as order_id');
        $this->join('lrfoims_users as u', 'u.id = lrfoims_orders.user_id');
        // $this->join('lrfoims_order_numbers as on', 'on.id = lrfoims_orders.order_number_id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->groupBy('lrfoims_orders.number');

        return $this->findAll();
    }
}
