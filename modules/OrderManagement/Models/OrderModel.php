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
        'order_type',
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
        // $this->groupBy('lrfoims_orders.id');
        $this->orderBy('lrfoims_orders.updated_at', 'ASC');

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

    public function getCountOrdersHome($conditions = []){

        $this->select('COUNT(lrfoims_orders.id) as customer_count_orders');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        // $this->groupBy('lrfoims_orders.order_number');

        return $this->findAll();
    }

    public function getTotalOrderPerYears($conditions = []){
        
        $this->select('
            SUM(YEAR(created_at) = YEAR(created_at)) AS total_orders
        ');
        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        // $this->orderBy('lrfoims_products.id', 'ASC');

        return $this->findAll();
    }

    public function getCountOrdersPerMonth($conditions = []){
        
        $this->select('
            SUM(MONTH(created_at) = 1) AS Jan, 
            SUM(MONTH(created_at) = 2) AS Feb,
            SUM(MONTH(created_at) = 3) AS Mar, 
            SUM(MONTH(created_at) = 4) AS Apr, 
            SUM(MONTH(created_at) = 5) AS May, 
            SUM(MONTH(created_at) = 6) AS Jun, 
            SUM(MONTH(created_at) = 7) AS Jul, 
            SUM(MONTH(created_at) = 8) AS Aug, 
            SUM(MONTH(created_at) = 9) AS Sept,
            SUM(MONTH(created_at) = 10) AS Oct, 
            SUM(MONTH(created_at) = 11) AS Nov, 
            SUM(MONTH(created_at) = 12) AS December
        ');
        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        // $this->orderBy('lrfoims_products.id', 'ASC');

        return $this->findAll();
    }
    
    public function getSumTotalAmountOrdersPerMonth($conditions = []){
        
        $this->select('SUM(total_amount) AS total_amount_per_month');
        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        // $this->orderBy('lrfoims_products.id', 'ASC');

        return $this->findAll();
    }

    public function getTotalOrders($conditions = []){

        $this->select('lrfoims_orders.*, COUNT(lrfoims_orders.id) as getTotalOrders');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

        return $this->findAll(); 
    }
    
    public function getOrderReports($conditions = []){

        $this->select('lrfoims_orders.*, os.order_status');
        $this->join('lrfoims_order_status as os', 'lrfoims_orders.order_status_id = os.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->groupBy('lrfoims_orders.number');

        return $this->findAll();
    }
    
    public function getTotalAmountOrderReports($conditions = []){

        $this->select('lrfoims_orders.*, SUM(lrfoims_orders.total_amount) as total_amount_price');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

        return $this->findAll();
    }

}
