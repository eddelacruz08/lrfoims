<?php namespace Modules\OrderManagement\Models;

use App\Models\BaseModel;

class OrderModel extends BaseModel
{
    protected $table = 'lrfoims_orders';
    protected $allowedFields = [
        'order_number_id',
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

        $this->select('u.id, lrfoims_orders.order_number_id');
        $this->join('lrfoims_users as u', 'u.id = lrfoims_orders.user_id');
        // $this->join('lrfoims_order_numbers as on', 'on.id = lrfoims_orders.order_number_id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->groupBy('lrfoims_orders.order_number_id');

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

        $this->select('lrfoims_orders.*, os.order_status, on.number');
        $this->join('lrfoims_order_status as os', 'lrfoims_orders.order_status_id = os.id');
        $this->join('lrfoims_order_numbers as on', 'lrfoims_orders.order_number_id = on.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->groupBy('lrfoims_orders.id');

        return $this->findAll();
    }

    public function getOrderPaymentHistoryDetails($conditions = []){

        $this->select('lrfoims_orders.*, os.order_status, on.number');
        $this->join('lrfoims_order_status as os', 'lrfoims_orders.order_status_id = os.id');
        $this->join('lrfoims_order_numbers as on', 'lrfoims_orders.order_number_id = on.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->groupBy('lrfoims_orders.id');

        return $this->findAll();
    }

    public function getMinMaxOrderNumber($conditions = []){

        $this->select('lrfoims_orders.*,
                        MIN(lrfoims_orders.order_number) as min_order_number, 
                        MAX(lrfoims_orders.order_number) as max_order_number, 
                        os.order_status');
        $this->join('lrfoims_order_status as os', 'lrfoims_orders.order_status_id = os.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        // $this->groupBy('lrfoims_orders.order_number');

        return $this->findAll();
    }

    public function getCreatedOrderNumber($conditions = []){

        $this->select('lrfoims_orders.*, on.number');
        $this->join('lrfoims_order_numbers as on', 'lrfoims_orders.order_number_id = on.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->groupBy('lrfoims_orders.id');

        return $this->findAll();
    }

}
