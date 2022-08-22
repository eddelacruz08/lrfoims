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
        $this->join('frbs_users as u', 'u.id = lrfoims_carts.user_id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->groupBy('lrfoims_orders.order_number');

        return $this->findAll();
    }

    public function getCarts($conditions = []){

        $this->select('lrfoims_carts.*, m.menu, m.price, m.image, o.user_id, 
                        (lrfoims_carts.quantity * m.price) as subTotal');
        $this->join('lrfoims_orders as o', 'lrfoims_carts.order_id = o.id');
        $this->join('lrfoims_menus as m', 'lrfoims_carts.menu_id = m.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        // $this->groupBy('lrfoims_orders.order_number');

        return $this->findAll();
    }

    public function getCartTotalPrice($conditions = []){

        $this->select('lrfoims_carts.*, SUM(lrfoims_carts.quantity * m.price) as total_price');
        $this->join('lrfoims_orders as o', 'lrfoims_carts.order_id = o.id');
        $this->join('lrfoims_menus as m', 'lrfoims_carts.menu_id = m.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        // $this->groupBy('lrfoims_orders.order_number');

        return $this->findAll();
    }

}
