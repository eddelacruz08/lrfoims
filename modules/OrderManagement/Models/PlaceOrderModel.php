<?php namespace Modules\OrderManagement\Models;

use App\Models\BaseModel;

class PlaceOrderModel extends BaseModel
{
    protected $table = 'lrfois_place_orders';
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
        $this->join('frbs_users as u', 'u.id = lrfois_carts.user_id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->groupBy('lrfois_orders.order_number');

        return $this->findAll();
    }

    public function getCarts($conditions = []){

        $this->select('lrfois_carts.*, m.menu, m.price, m.image, o.user_id, 
                        (lrfois_carts.quantity * m.price) as subTotal');
        $this->join('lrfois_orders as o', 'lrfois_carts.order_id = o.id');
        $this->join('lrfois_menus as m', 'lrfois_carts.menu_id = m.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        // $this->groupBy('lrfois_orders.order_number');

        return $this->findAll();
    }

    public function getCartTotalPrice($conditions = []){

        $this->select('lrfois_carts.*, SUM(lrfois_carts.quantity * m.price) as total_price');
        $this->join('lrfois_orders as o', 'lrfois_carts.order_id = o.id');
        $this->join('lrfois_menus as m', 'lrfois_carts.menu_id = m.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        // $this->groupBy('lrfois_orders.order_number');

        return $this->findAll();
    }

}
