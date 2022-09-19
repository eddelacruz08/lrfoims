<?php namespace Modules\HomeManagement\Models;

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

    public function getCustomerCartDetails($conditions = []){

        $this->select('lrfoims_carts.*, m.image, m.menu, m.price, mc.name, (lrfoims_carts.quantity * m.price) as sub_total_price');
        $this->join('lrfoims_menus as m', 'm.id = lrfoims_carts.menu_id');
        $this->join('lrfoims_menu_category as mc', 'mc.id = m.menu_category_id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        // $this->groupBy('on.number');

        return $this->findAll();
    }

    public function getCartTotalPrice($conditions = []){

        $this->select('lrfoims_carts.*, SUM(lrfoims_carts.quantity * m.price) as total_price, o.order_status_id, o.c_cash, o.c_balance, o.total_amount');
        $this->join('lrfoims_orders as o', 'lrfoims_carts.order_id = o.id');
        $this->join('lrfoims_menus as m', 'lrfoims_carts.menu_id = m.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->groupBy('lrfoims_carts.order_id');

        return $this->findAll();
    }
    
    public function getCustomerCountCarts($conditions = []){

        $this->select('COUNT(lrfoims_carts.id) as customer_count_carts');
        $this->join('lrfoims_orders as o', 'lrfoims_carts.order_id = o.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        // $this->groupBy('lrfoims_orders.order_number');

        return $this->findAll();
    }
}
