<?php namespace Modules\OrderManagement\Models;

use App\Models\BaseModel;

class CartModel extends BaseModel
{
    protected $table = 'lrfoims_carts';
    protected $allowedFields = [
        'order_id',
        'menu_id',
        'quantity',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'];
    
    public function getDetails($conditions = []){

        $this->select('u.id');
        $this->join('lrfoims_orders as u', 'u.id = lrfoims_carts.user_id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        // $this->groupBy('on.number');

        return $this->findAll();
    }
    
    public function getTotalBestFoods(){

        $this->select('lrfoims_carts.*, COUNT(lrfoims_carts.menu_id) as count_per_best_food');

        $this->where('lrfoims_carts.status', 'a');

        $this->orderBy('COUNT(lrfoims_carts.menu_id)', 'DESC');
        $this->groupBy('lrfoims_carts.menu_id');

        return $this->findAll();
    }
    
    public function getCountMenuTypePerOrder($conditions = []){

        $this->select('lrfoims_carts.*, COUNT(lrfoims_carts.id) as total_menu');
        $this->join('lrfoims_orders as o', 'o.id = lrfoims_carts.order_id');
        $this->join('lrfoims_menus as m', 'm.id = lrfoims_carts.menu_id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

        return $this->findAll();
    }

    public function getCarts($conditions = []){

        $this->select('lrfoims_carts.*, m.menu, m.price, m.image, o.user_id, 
                        (lrfoims_carts.quantity * m.price) as subTotal, o.id as orders_id');
        $this->join('lrfoims_orders as o', 'lrfoims_carts.order_id = o.id');
        $this->join('lrfoims_menus as m', 'lrfoims_carts.menu_id = m.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        // $this->groupBy('lrfoims_orders.order_number');

        return $this->findAll();
    }

    public function getCartTotalPrice($conditions = [], $takeOut = null, $dineIn = null){

        $this->select('lrfoims_carts.*, SUM(lrfoims_carts.quantity * m.price) as total_price, o.order_status_id, o.c_cash, o.c_balance, o.total_amount');
        $this->join('lrfoims_orders as o', 'lrfoims_carts.order_id = o.id');
        $this->join('lrfoims_menus as m', 'lrfoims_carts.menu_id = m.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        if($takeOut != null && $dineIn != null){
            $this->whereIn('lrfoims_orders.order_type', [$takeOut, $dineIn]);
        }
        $this->groupBy('lrfoims_carts.order_id');

        return $this->findAll();
    }
    
    public function getCartDeliveryTotalPrice($conditions = []){

        $this->select('lrfoims_carts.*, SUM(lrfoims_carts.quantity * m.price) as total_price, o.order_status_id, o.c_cash, o.c_balance, o.total_amount');
        $this->join('lrfoims_orders as o', 'lrfoims_carts.order_id = o.id');
        $this->join('lrfoims_menus as m', 'lrfoims_carts.menu_id = m.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->whereIn('o.order_status_id', [2,3]);
        $this->groupBy('lrfoims_carts.order_id');

        return $this->findAll();
    }

    public function getCartDeliveryShipmentTotalPrice($conditions = []){

        $this->select('lrfoims_carts.*, SUM(lrfoims_carts.quantity * m.price) as total_price, o.order_status_id, o.c_cash, o.c_balance, o.total_amount');
        $this->join('lrfoims_orders as o', 'lrfoims_carts.order_id = o.id');
        $this->join('lrfoims_menus as m', 'lrfoims_carts.menu_id = m.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->whereIn('o.order_status_id', [4]);
        $this->groupBy('lrfoims_carts.order_id');

        return $this->findAll();
    }
    
    public function getAdminCartLists($conditions = []){

        $this->select('lrfoims_carts.*, m.menu, m.image, m.price, m.menu_category_id');
        $this->join('lrfoims_menus as m', 'lrfoims_carts.menu_id = m.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        // $this->groupBy('lrfoims_carts.order_id');

        return $this->findAll();
    }
    
    public function getAdminCountCartLists($conditions = []){

        $this->select('COUNT(lrfoims_carts.id) as count_unavailable_admin_carts');
        $this->join('lrfoims_orders as o', 'lrfoims_carts.order_id = o.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        // $this->groupBy('lrfoims_carts.order_id');

        return $this->findAll();
    }

}
