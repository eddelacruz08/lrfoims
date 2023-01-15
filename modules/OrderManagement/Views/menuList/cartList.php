<div class="row">

    <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12">
        <div class="card p-2 mb-0 pb-0">
            <div class="card-body p-0 pb-2" id="resize-contents"> 
                <?php foreach ($getOrderTypeDetails as $orderDetails) : ?>
                    <h5 class="text-center">Order#<?= $orderDetails['number']; ?></h5>
                    <?php if(!empty($getCarts)):?>
                        <?php foreach ($getCarts as $carts) : ?>
                            <?php if($carts['order_id'] == $orderDetails['id'] && $carts['orders_id'] == $orderDetails['id']):?>
                                <div class="card p-1 m-1">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-lg-4 col-xxl-4 text-center">
                                            <div class="card border-warning border card-menu-image-style p-0 m-1">
                                                <div class="card-body p-0">
                                                    <img src="<?= '/assets/uploads/menu/'.$carts['image'] ?>" class="menu-image-style rounded" alt="...">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-lg-5 col-xxl-5 text-center pt-2">
                                            <?= ucfirst($carts['menu']); ?><br>
                                            x<?= $carts['quantity']; ?><br>
                                            ₱ <?= number_format($carts['price']); ?>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-lg-3 col-xxl-3 text-center pt-2">
                                            ₱ <?= number_format($carts['subTotal']);?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-8 col-lg-8 col-xxl-8 text-center pt-2">
                                            <?php if(user_link('orders/admin/cart/qty', session()->get('userPermissionView'))):?>
                                                <div class="input-group" id="quantity-resize-contents">
                                                    <button onclick="plusAndMinusCartQuantity('/orders/admin/cart/qty/',<?= $carts['id']; ?>,<?=$carts['menu_id']?>,<?=$carts['order_id']?>,<?=$carts['quantity']?>, 2, 'minus','/orders/admin-menu/order-cart-list-data',<?= $orderDetails['number'] ?>,<?=$orderMaxLimit['max_limit']?>);" class="btn btn-sm btn-outline-secondary" type="button" id="minusButton">
                                                        <i class="mdi mdi-minus m-0"></i>
                                                    </button>
                                                    <input id="inputQuantityValue" type="text" disabled class="form-control form-control-sm text-center" width="50" id="quantityOrderCartAdmin<?= $carts['id']; ?>" value="<?= $carts['quantity'] ?>" width="10">
                                                    <button onclick="plusAndMinusCartQuantity('/orders/admin/cart/qty/',<?= $carts['id']; ?>,<?=$carts['menu_id']?>,<?=$carts['order_id']?>,<?=$carts['quantity']?>, 2, 'plus','/orders/admin-menu/order-cart-list-data',<?= $orderDetails['number'] ?>,<?=$orderMaxLimit['max_limit']?>);" class="btn btn-sm btn-outline-secondary" type="button" id="plusButton">
                                                        <i class="mdi mdi-plus m-0"></i>
                                                    </button>
                                                </div>
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-lg-4 col-xxl-4 text-center pt-2">
                                            <?php if(user_link('orders/cart/d', session()->get('userPermissionView'))):?>
                                                <a id="deletePerCartButton" onclick="confirmDeleteCart('/orders/cart/d/',<?=$carts['id']?>,<?=$carts['menu_id']?>,<?=$carts['order_id']?>,<?=$carts['quantity']?>, 2,'/orders/admin-menu/order-cart-list-data',<?=$orderDetails['id']?>,<?= $orderDetails['number'] ?>,<?=$orderMaxLimit['max_limit']?>);" 
                                                    title="Remove" class="btn btn-sm btn-outline-danger float-end">
                                                    <i class="dripicons-trash"></i>
                                                </a>
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        No Data
                    <?php endif; ?>
                    <hr class="text-gray mb-1">
                    <?php foreach ($getCartTotalPrice as $totalPrice) : ?>
                        <?php if($totalPrice['order_id'] == $orderDetails['id']):?>
                            <div class="row" id="resize-contents">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 p-0">
                                    <?php if($orderDetails['order_user_discount_id'] != 0):?>
                                        <?php if(user_link('orders/admin-menu/add-payment-method', session()->get('userPermissionView'))):?>
                                            <div class="row m-1 p-0">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                                    <p class="float-start h5">Customer Type Discount:</p>
                                                    <?php foreach ($getOrderUserDiscount as $discount) : ?>
                                                        <?php if($discount['id'] == $orderDetails['order_user_discount_id']):?>
                                                            <p class="float-end h5"><?= ucwords($discount['customer_type']);?></p>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php if(user_link('orders/admin-menu/add-payment-method', session()->get('userPermissionView'))):?>
                                            <div class="row m-1 p-0">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                                    <p class="float-start h5">Customer Type Discount: </p>
                                                    <select class="form-select form-select-sm float-end mb-1" name="order_user_discount_id" id="order_user_discount_id">
                                                        <option disabled selected value=""> -- customer type discount-- </option>
                                                        <?php foreach ($getOrderUserDiscount as $discount) : ?>
                                                            <option value="<?=$discount['id']?>"><?= ucwords($discount['customer_type']);?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if($orderDetails['payment_method_id'] != 0):?>
                                        <?php if(user_link('orders/admin-menu/add-payment-method', session()->get('userPermissionView'))):?>
                                            <div class="row m-1 p-0">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                                    <p class="float-start h5">Payment Method:</p>
                                                    <?php foreach ($getPaymentMethod as $method) : ?>
                                                        <?php if($method['id'] == $orderDetails['payment_method_id']):?>
                                                            <p class="float-end h5"><?= ucwords($method['payment_method']);?></p>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php if(user_link('orders/admin-menu/add-payment-method', session()->get('userPermissionView'))):?>
                                            <div class="row m-1 p-0">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                                    <p class="float-start h5">Select Payment Method: <small class="text-danger">*</small></p>
                                                    <select class="form-select form-select-sm float-end mb-1" name="payment_method" id="payment_method">
                                                        <option disabled selected value=""> -- Select payment method-- </option>
                                                        <?php foreach ($getPaymentMethod as $method) : ?>
                                                            <option value="<?=$method['id']?>"><?= ucwords($method['payment_method']);?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="invalid-feedback float-start" id="error_payment_method">
                                                        * Please select payment method.
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if($orderDetails['order_type'] == 0):?>
                                        <div class="row m-1 p-0">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                                <p class="float-start h5">Select Order Type: <small class="text-danger">*</small></p>
                                                <select class="form-select form-select-sm float-end mb-1" name="order_type" id="order_type">
                                                    <option disabled selected value=""> -- Select order type -- </option>
                                                    <?php foreach ($getOrderType as $orderType) : ?>
                                                        <?php if ($orderType['id'] != 3) : ?>
                                                            <option value="<?=$orderType['id']?>"><?= ucwords($orderType['type']);?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="invalid-feedback float-start" id="error_order_type">
                                                    * Please select order type.
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(!empty($orderDetails['order_user_discount_id'])):?>
                                        <div class="row m-1 p-0">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                                <?php foreach ($getOrderUserDiscount as $discount) : ?>
                                                    <?php if($discount['id'] == $orderDetails['order_user_discount_id']):?>
                                                        <p class="float-start h5"><?= ucwords($discount['description']);?>&nbsp; discount:</p>
                                                        <p class="float-end h5">-&nbsp;<?= ucwords($discount['discount_amount']);?>%</p>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="row m-1 p-0">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                            <p class="float-start h5">Amount Due:</p>
                                            <p class="float-end h5">&nbsp;₱<?= number_format($totalPrice['total_price']);?></p>
                                        </div>
                                    </div>
                                    <div class="row m-1 p-0">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                            <p class="float-start h5">Coupon:</p>
                                            <?php if(!empty($orderDetails['coupon_discount'])):?>
                                                <p class="float-end h5">
                                                    <?= ucwords($orderDetails['coupon_code'].' : -&nbsp;₱'.$orderDetails['coupon_discount']);?>
                                                </p>
                                            <?php else:?>
                                                <a type="button" class="btn btn-sm btn-link text-danger float-end" onclick="addCodeCouponDiscount('admin-menu/order-cart-list-data/apply-coupon', <?=$orderDetails['id']?>,'/orders/admin-menu/order-cart-list-data');">
                                                    <u> Apply Coupon</u>
                                                </a>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <?php if($orderDetails['order_type'] == 3):?>
                                        <div class="row m-1 p-0">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                                <p class="float-start h5">Delivery fee:</p>
                                                <p class="float-end h5">+&nbsp;₱<?= number_format($getDeliveryFee['delivery_fee']);?></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="row m-1 p-0">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                            <p class="float-start h5">Less &nbsp;(<?= $getVAT['description'];?>) VAT:</p>
                                            <p class="float-end h5">-&nbsp;₱<?= number_format($totalPrice['total_amount_vat']);?></p>
                                        </div>
                                    </div>
                                    <div class="row m-1 p-0">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                            <p class="float-start h5">Discount:</p>
                                            <?php if(!empty($totalPrice['discount_amount'])):?>
                                                <p class="float-end h5">-&nbsp;₱<?= number_format($totalPrice['discount_amount']);?></p>
                                            <?php else: ?>
                                                <p class="float-end h5">-&nbsp;₱0</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row m-1 p-0">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                            <p class="float-start h5">Cash:</p>
                                            <p class="float-end h5">&nbsp;₱<?= number_format($totalPrice['c_cash']);?></p>
                                        </div>
                                    </div>
                                    <div class="row m-1 p-0">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                            <p class="float-start h5">Change:</p>
                                            <p class="float-end h5">&nbsp;₱<?= number_format($totalPrice['c_balance']);?></p>
                                        </div>
                                    </div>
                                    <div class="row m-1 p-0">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                            <p class="float-start h5">Total bill:</p>
                                            <p class="float-end h5">&nbsp;₱<?= number_format($totalPrice['total_amount_bill']);?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-1 p-0">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12">
                                    <button type="button" onclick="checkout('/orders/admin-menu/place-order',<?= $orderDetails['id'];?>, '/orders/admin-menu/order-cart-list-data');" class="btn btn-sm btn-danger float-end" id="checkoutAdminCartButton">Checkout</button>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</div>