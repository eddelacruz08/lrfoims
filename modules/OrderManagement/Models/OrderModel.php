<?php namespace Modules\OrderManagement\Models;

use App\Models\BaseModel;

class OrderModel extends BaseModel
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
    
    public function getCountPerOrderDetails($conditions = []){

        $this->select('COUNT(lrfoims_orders.id) as order_total, u.id');
        $this->join('lrfoims_users as u', 'u.id = lrfoims_orders.user_id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->groupBy('lrfoims_orders.order_status_id');

        return $this->findAll();
    }

    public function getOrderDetails($conditions = []){

        $this->select('lrfoims_orders.*, os.order_status');
        $this->join('lrfoims_order_status as os', 'lrfoims_orders.order_status_id = os.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->groupBy('lrfoims_orders.id');

        return $this->findAll();
    }

    public function getOrderPaymentHistoryDetails($conditions = []){

        $this->select('lrfoims_orders.*, os.order_status');
        $this->join('lrfoims_order_status as os', 'lrfoims_orders.order_status_id = os.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->groupBy('lrfoims_orders.id');

        return $this->findAll();
    }

    public function getHighestOrderNumber($conditions = []){

        $this->select('lrfoims_orders.*,
                        MIN(lrfoims_orders.number) as min_order_number, 
                        MAX(lrfoims_orders.number) as max_order_number');
        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        // $this->groupBy('lrfoims_orders.order_number');

        return $this->findAll();
    }

}
