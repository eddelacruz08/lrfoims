<?php namespace Modules\OrderManagement\Models;

use App\Models\BaseModel;

class OrderModel extends BaseModel
{
    protected $table = 'lrfoims_orders';
    protected $allowedFields = [
        'number',
        'user_id',
        'quantity',
        'order_status_id',
        'total_amount_order',
        'total_amount',
        'total_amount_vat',
        'c_cash',
        'c_balance',
        'delivery_fee',
        'order_user_discount_id',
        'discount_amount',
        'cust_id_no',
        'coupon_discount',
        'coupon_code',
        'payment_method_id',
        'order_type',
        'rate_status',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'];

    public function getDetails($conditions = [], $takeOut = null, $dineIn = null){

        $this->select('lrfoims_orders.*, u.id, lrfoims_orders.id as order_id');
        $this->join('lrfoims_users as u', 'u.id = lrfoims_orders.user_id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        if($takeOut != null && $dineIn != null){
            $this->whereIn('lrfoims_orders.order_type', [$takeOut, $dineIn]);
        }
        $this->groupBy('lrfoims_orders.number');

        return $this->findAll();
    }

    public function getPendingOrderDetails($conditions = [], $limit = 0, $offset = 0){

        $this->select('lrfoims_orders.id, lrfoims_orders.number, lrfoims_orders.created_at, os.order_status, ot.type');
        $this->join('lrfoims_order_status as os', 'lrfoims_orders.order_status_id = os.id', 'left');
        $this->join('lrfoims_order_type as ot', 'lrfoims_orders.order_type = ot.id', 'left');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->orderBy('lrfoims_orders.updated_at', 'ASC');

        return $this->findAll($limit, $offset);
    }

    public function getCustomerOrderDetails($conditions = []){ 

        $this->select('lrfoims_orders.*');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->whereIn('lrfoims_orders.order_status_id', [1, 2, 3, 4]);

        return $this->findAll();
    }

    public function getCheckOngoingOrder($conditions = []){

        $this->select('lrfoims_orders.*');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->whereIn('order_status_id', [2, 3, 4]);

        return $this->findAll();
    }

    public function getCountPerOrderDetails($dateAndTime = null, $orderStatusID, $takeOut, $dineIn){

        $this->select('COUNT(lrfoims_orders.id) as order_total, u.id');
        $this->join('lrfoims_users as u', 'u.id = lrfoims_orders.user_id');
        if($dateAndTime != null){
            $this->where("CAST(lrfoims_orders.updated_at AS DATE) = '$dateAndTime'");
        }
        $this->where("
            lrfoims_orders.status ='a' AND
            lrfoims_orders.order_status_id ='$orderStatusID'
        ");
        $this->whereIn('lrfoims_orders.order_type', [$takeOut, $dineIn]);

        return $this->findAll();
    }

    public function getOrderTypeDetails($orderStatusId = [], $orderType = null){

        $this->select('lrfoims_orders.*, os.order_status, ot.type');
        $this->join('lrfoims_order_status as os', 'lrfoims_orders.order_status_id = os.id', 'left');
        $this->join('lrfoims_order_type as ot', 'lrfoims_orders.order_type = ot.id', 'left');

        $this->where("lrfoims_orders.status ='a'");
        $this->whereIn("lrfoims_orders.order_type", [$orderType]);
        $this->whereIn('lrfoims_orders.order_status_id', $orderStatusId);

        $this->orderBy('lrfoims_orders.updated_at', 'ASC');

        return $this->findAll();
    }

    public function getOrderTypeInfo($orderId = null, $orderStatusId = [], $userId = null){

        $this->select('lrfoims_orders.*, os.order_status, ot.type');
        $this->join('lrfoims_order_status as os', 'lrfoims_orders.order_status_id = os.id', 'left');
        $this->join('lrfoims_order_type as ot', 'lrfoims_orders.order_type = ot.id', 'left');
        if(!empty($userId)){
            $this->where("lrfoims_orders.user_id ='$userId'");
        }
        $this->where("lrfoims_orders.id ='$orderId'");
        $this->where("lrfoims_orders.status ='a'");
        $this->whereIn('lrfoims_orders.order_status_id', $orderStatusId);

        $this->orderBy('lrfoims_orders.updated_at', 'ASC');

        return $this->findAll();
    }

    public function getOrderDetails($conditions = []){

        $this->select('lrfoims_orders.*, os.order_status, ot.type');
        $this->join('lrfoims_order_status as os', 'lrfoims_orders.order_status_id = os.id', 'left');
        $this->join('lrfoims_order_type as ot', 'lrfoims_orders.order_type = ot.id', 'left');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->orderBy('lrfoims_orders.updated_at', 'ASC');

        return $this->findAll();
    }

    public function getOrderReportsDetails($conditions = [], $limit = null, $offset = null, $searchItem = null){

        $this->select('lrfoims_orders.*, os.order_status, ot.type');
        $this->join('lrfoims_order_status as os', 'lrfoims_orders.order_status_id = os.id', 'left');
        $this->join('lrfoims_order_type as ot', 'lrfoims_orders.order_type = ot.id', 'left');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        if($searchItem != null){
            $this->where('lrfoims_orders.number', $searchItem);
        }
        $this->orderBy('lrfoims_orders.updated_at', 'ASC');

        return $this->findAll($limit, $offset);
    }

    public function getTotalOrderDetails($conditions = []) {
        $this->select('COUNT(lrfoims_orders.id) as total_order_reports');
        foreach($conditions as $field => $value){
            $this->where($field, $value);
        }
        return $this->findAll();
    }

    public function getOrderDeliveryDetails($conditions = []){

        $this->select('lrfoims_orders.*, os.order_status, ot.type');
        $this->join('lrfoims_order_status as os', 'lrfoims_orders.order_status_id = os.id');
        $this->join('lrfoims_order_type as ot', 'lrfoims_orders.order_type = ot.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->whereIn('lrfoims_orders.order_status_id', [2, 3]);
        $this->orderBy('lrfoims_orders.updated_at', 'ASC');

        return $this->findAll();
    }
    
    public function getOrderDeliveryShipmentDetails($conditions = []){

        $this->select('lrfoims_orders.*, os.order_status, ot.type');
        $this->join('lrfoims_order_status as os', 'lrfoims_orders.order_status_id = os.id');
        $this->join('lrfoims_order_type as ot', 'lrfoims_orders.order_type = ot.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->whereIn('lrfoims_orders.order_status_id', [4]);
        $this->orderBy('lrfoims_orders.updated_at', 'ASC');

        return $this->findAll();
    }

    public function getOrderPaymentHistoryDetails($conditions = []){

        $this->select('lrfoims_orders.*, os.order_status, ot.type');
        $this->join('lrfoims_order_status as os', 'lrfoims_orders.order_status_id = os.id');
        $this->join('lrfoims_order_type as ot', 'lrfoims_orders.order_type = ot.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->groupBy('lrfoims_orders.id');

        return $this->findAll();
    }
    
    public function generateOrderNumber(){

        $this->select('FLOOR(RAND() * 9999) AS number');
        $this->where('status', 'a');
        $this->whereNotIn('number', ['SELECT number FROM lrfoims_orders']);
        $this->limit(1);

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
    
    public function getTotalPendingOrders($conditions = []){

        $this->select('lrfoims_orders.*, COUNT(lrfoims_orders.id) as getTotalPendingOrders');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

        return $this->findAll(); 
    }
    
    public function getOrderReports($conditions = []){

        $this->select('lrfoims_orders.*, os.order_status, ot.type, u.first_name, r.role_name');
        $this->join('lrfoims_order_status as os', 'lrfoims_orders.order_status_id = os.id', 'left');
        $this->join('lrfoims_order_type as ot', 'lrfoims_orders.order_type = ot.id', 'left');
        $this->join('lrfoims_users as u', 'lrfoims_orders.user_id = u.id', 'left');
        $this->join('lrfoims_roles as r', 'u.role_id = r.id', 'left');

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
