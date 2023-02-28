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
        'star_rate',
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
    
    public function getCartFoodRates(){

        $this->select('lrfoims_carts.*, SUM(lrfoims_carts.star_rate)/COUNT(lrfoims_carts.star_rate) as sum_per_rating_for_food');

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

    public function getCartsForRating($conditions = []){

        $this->select('lrfoims_carts.created_at, lrfoims_carts.order_id, lrfoims_carts.id, m.menu');
        $this->join('lrfoims_menus as m', 'lrfoims_carts.menu_id = m.id','left');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

        return $this->findAll();
    }

    public function getCarts($conditions = []){

        $this->select('lrfoims_carts.*, m.menu, m.price, m.image, o.user_id, o.number, o.created_at as added_date,
                        (lrfoims_carts.quantity * m.price) as subTotal, o.id as orders_id');
        $this->join('lrfoims_orders as o', 'lrfoims_carts.order_id = o.id','left');
        $this->join('lrfoims_menus as m', 'lrfoims_carts.menu_id = m.id','left');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

        return $this->findAll();
    }

    public function getCartTotalPrice($conditions = [], $takeOut = null, $dineIn = null, $orderDivideVAT = null, $orderMultiplyVAT = null){

        $this->select('lrfoims_carts.*, SUM(lrfoims_carts.quantity * m.price) as total_price, 
                        SUM(lrfoims_carts.quantity * m.price) - (SUM(lrfoims_carts.quantity * m.price) * oud.discount_amount) + o.delivery_fee - o.coupon_discount as total_amount_bill,
                        (SUM(lrfoims_carts.quantity * m.price) + o.delivery_fee) - o.coupon_discount as total_amount_bill_no_discount,
                        (SUM(lrfoims_carts.quantity * m.price) / '.$orderDivideVAT.' * '.$orderMultiplyVAT.') as total_amount_discount_with_vat,
                        (SUM(lrfoims_carts.quantity * m.price) / '.$orderDivideVAT.' * '.$orderMultiplyVAT.') as total_amount_regular_customer_with_vat,
                        SUM(lrfoims_carts.quantity * m.price) * oud.discount_amount as total_amount_user_discount_without_vat,
                        o.order_status_id, o.c_cash, o.c_balance, o.total_amount, o.discount_amount');
        $this->join('lrfoims_orders as o', 'lrfoims_carts.order_id = o.id');
        $this->join('lrfoims_menus as m', 'lrfoims_carts.menu_id = m.id');
        $this->join('lrfoims_order_user_discounts as oud', 'o.order_user_discount_id = oud.id', 'left');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        if($takeOut != null && $dineIn != null){
            $this->whereIn('o.order_type', [$takeOut, $dineIn]);
        }
        $this->groupBy('lrfoims_carts.order_id');

        return $this->findAll();
    }
    
    public function getCustomerCartDetails($conditions = []){

        $this->select('lrfoims_carts.*, m.image, m.menu, m.price, mc.name, (lrfoims_carts.quantity * m.price) as sub_total_price');
        $this->join('lrfoims_menus as m', 'm.id = lrfoims_carts.menu_id');
        $this->join('lrfoims_menu_category as mc', 'mc.id = m.menu_category_id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        return $this->findAll();
    }

    public function getCustomerCountCarts($conditions = []){

        $this->select('COUNT(lrfoims_carts.id) as customer_count_carts');
        $this->join('lrfoims_orders as o', 'lrfoims_carts.order_id = o.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

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
