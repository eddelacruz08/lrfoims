
<?php if(!empty(session()->get('local_admin_menu_order_id'))):?>
    <button onclick="cancelOrder('/orders/admin-menu/cancel-order/d','/orders/admin-menu/order-cart-list-data',<?=session()->get('local_admin_menu_order_id')?>);" type="button" class="btn btn-sm btn-outline-danger m-1 float-end">Cancel Order</button>
    <button onclick="refreshCartList('/orders/admin-menu/order-cart-list-data',<?=session()->get('local_admin_menu_order_id')?>);" type="button" class="btn btn-sm btn-info m-1 float-end">Refresh Cart</button>
<?php endif; ?>