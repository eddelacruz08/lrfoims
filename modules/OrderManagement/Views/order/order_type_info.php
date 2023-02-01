<?php if(!empty($getOrderTypeDetails)):?>
    <?php foreach($getOrderTypeDetails as $typeInfo):?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12">
                <div class="card border-secondary border m-0">
                    <div class="card-body p-2">
                        <h5 class="card-title">Order#<?=$typeInfo['number']?>
                            <span class="badge bg-success mb-1"><?=ucwords($typeInfo['type'])?></span>
                            <?= (empty($typeInfo['total_amount']))? '<span class="badge badge-outline-danger">Not Paid</span>':'<span class="badge badge-outline-success">Paid</span>' ?>
                        </h5>
                                
                        <?php if($typeInfo['order_type'] == 3):?>
                            <table class="w-100">
                                <?php foreach ($userLists as $user):?>
                                    <?php if($user['id'] == $typeInfo['user_id']):?>
                                        <hr class="mt-1 mb-1">
                                        <tr>
                                            <td><p class="float-start h5"><strong><i class='uil uil-phone'></i><?= $user['contact_number'];?></strong></p></td>
                                            <td><p class="float-end h5"><strong><i class='uil uil-at'></i><?=$user['email_address'];?></strong></p></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <p class="float-start h5"><strong><i class='uil uil-location'></i>
                                                    <?php
                                                        $full_address = '';
                                                        foreach ($cities as $city) {
                                                            if($city['city_code'] == $user['city_id']){
                                                                $full_address .= $user['addtl_address'].', '.$city['city_name'];
                                                            }
                                                        }
                                                        foreach ($provinces as $province) {
                                                            if($province['province_code'] == $user['province_id']){
                                                                $full_address .= ', '.$province['province_name'];
                                                            }
                                                        }
                                                        foreach ($regions as $region) {
                                                            if($region['region_code'] == $user['region_id']){
                                                                $full_address .= ', '.$region['region_name'];
                                                            }
                                                        }
                                                        $str = strtolower($full_address);
                                                        echo ucwords($str);
                                                    ?>
                                                    </strong>
                                                </p>
                                            </td>
                                        </tr>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </table>
                        <?php endif;?>

                        <hr class="mt-1 mb-1">

                        <div class="btn-group d-print-none">
                            <?php if(empty($typeInfo['total_amount'])):?>
                                <?php if($typeInfo['order_status_id'] == 2):?>
                                    <button onclick="getMenuList('/orders/a/response',<?=$typeInfo['id']?>,<?= $typeInfo['number'] ?>,<?=$orderMaxLimit['max_limit']?>,'/orders/get-info')" title="Add Food" class="btn btn-sm btn-dark me-1" type="button">
                                        Menu
                                    </button>
                                <?php endif; ?>  
                                <?php if(user_link('orders/d', session()->get('userPermissionView'))):?>
                                    <?php if($typeInfo['order_status_id'] == 1):?>
                                        <button type="button" onclick="confirmDeleteOrder('/orders/d/',<?=$typeInfo['id']?>,<?= $typeInfo['number'] ?>,<?=$orderMaxLimit['max_limit']?>,'/orders/get-info',<?= $typeInfo['number'] ?>,<?=$orderMaxLimit['max_limit']?>)" class="btn btn-sm btn-outline-danger me-1" title="Remove">
                                            Remove
                                        </button>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if($typeInfo['order_status_id'] == 5):?>
                                <!-- start print invoice -->
                                <?php if($typeInfo['order_status_id'] == 1):?>
                                    <?php $order_status = ucwords($typeInfo['order_status'])?>
                                <?php elseif($typeInfo['order_status_id'] == 2): ?>
                                    <?php $order_status = ucwords($typeInfo['order_status'])?>
                                <?php elseif($typeInfo['order_status_id'] == 3): ?>
                                    <?php $order_status = ucwords($typeInfo['order_status'])?>
                                <?php elseif($typeInfo['order_status_id'] == 4): ?>
                                    <?php $order_status = ucwords($typeInfo['order_status'])?>
                                <?php else: ?>
                                    <?php $order_status = ucwords($typeInfo['order_status'])?>
                                <?php endif;?>

                                <button onclick="printOrders(
                                        <?=$typeInfo['id']?>, <?=$typeInfo['number']?>, '<?=ucwords($typeInfo['type'])?>',
                                        '<?= date('F d, Y - H:i a',strtotime($typeInfo['created_at']));?>', '<?=$order_status;?>',<?=$typeInfo['order_user_discount_id'];?>
                                    );" title="Invoice" class="btn btn-sm btn-outline-dark me-1" type="button">
                                    Invoice
                                </button>

                            <?php endif; ?>   
                            <!-- end print invoice -->

                            <?php if($typeInfo['order_type'] == 3):?>
                                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Messages
                                </button>
                            <?php endif; ?>
                        </div>


                        <?php if(user_link('orders/place-order/u', session()->get('userPermissionView'))):?>
                            <?php if($typeInfo['order_status_id'] == 1):?>
                                <?php if(user_link('orders/orderin', session()->get('userPermissionView'))):?>
                                    <button onclick="confirmPlaceOrder('continue to prepare','/orders/place-order/u',<?=$typeInfo['id']?>, 2,<?= $typeInfo['number'] ?>,<?=$orderMaxLimit['max_limit']?>,'/orders/get-info')" class="btn btn-sm btn-primary float-end" type="button">
                                        Continue to prepare
                                    </button>
                                <?php endif;?>
                            <?php elseif($typeInfo['order_status_id'] == 2): ?>
                                <?php if(user_link('orders/preparing', session()->get('userPermissionView'))):?>
                                    <button onclick="confirmPlaceOrder('continue to serve','/orders/place-order/u',<?=$typeInfo['id']?>, 3,<?= $typeInfo['number'] ?>,<?=$orderMaxLimit['max_limit']?>,'/orders/get-info')" class="btn btn-sm btn-primary float-end" type="button">
                                        Continue to serve
                                    </button>
                                <?php endif;?>
                            <?php elseif($typeInfo['order_status_id'] == 3): ?>
                                <?php if(user_link('orders/serving', session()->get('userPermissionView'))):?>
                                    <button onclick="confirmPlaceOrder('continue to payment','/orders/place-order/u',<?=$typeInfo['id']?>, 4,<?= $typeInfo['number'] ?>,<?=$orderMaxLimit['max_limit']?>,'/orders/get-info')" class="btn btn-sm btn-primary float-end" type="button">
                                        Continue to payment
                                    </button>
                                <?php endif;?>
                            <?php elseif($typeInfo['order_status_id'] == 4): ?>
                                <?php if(user_link('orders/admin-menu/add-payment-method', session()->get('userPermissionView'))):?>
                                    <?php if($typeInfo['order_status_id'] == 4):?>
                                        <?php foreach ($getCartTotalPrice as $totalPrice) : ?>
                                            <?php if($totalPrice['order_id'] == $typeInfo['id']):?>
                                                <?php if($typeInfo['order_user_discount_id'] == 0):?>
                                                    <?php $total_amount_bill = $totalPrice['total_amount_bill_no_discount'];?>
                                                <?php else: ?>
                                                    <?php $total_amount_bill = $totalPrice['total_amount_bill'];?>
                                                <?php endif; ?>
                                                <button type="button" onclick="applyPayment('/orders/admin/add-payment/u/',<?=$typeInfo['id']?>,<?=$totalPrice['total_price']?>,'/orders/get-info',<?= $typeInfo['number'] ?>,<?=$orderMaxLimit['max_limit']?>,<?=$total_amount_bill;?>,<?=$totalPrice['total_amount_vat']?>,<?=$totalPrice['total_amount_user_discount'];?>);" title="Payment" class="btn btn-sm btn-success float-end">
                                                    Payment
                                                </button>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>   
                                <?php endif; ?>  
                            <?php elseif($typeInfo['order_status_id'] == 5): ?>
                                <button onclick="confirmPlaceOrder('send to report','/orders/place-order/u',<?=$typeInfo['id']?>, 7,<?= $typeInfo['number'] ?>,<?=$orderMaxLimit['max_limit']?>,'/orders/get-info')" class="btn btn-sm btn-primary float-end" type="button">
                                    Add to report
                                </button>
                            <?php else: ?>
                                <button disabled class="btn btn-sm btn-secondary float-end d-print-none" type="button">
                                    No status
                                </button>
                            <?php endif;?>
                        <?php endif; ?>

                        <div class="modal fade d-print-none" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header mb-0">
                                        <h5 class="modal-title" id="staticBackdropLabel">Messages</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="conversation-list p-1 border-secondary rounded" data-simplebar style="height: 500px; border: 1px solid gray;">
                                            <div id="getmsg<?=$typeInfo['id']?>" style="height: 500px;">
                                            </div>
                                        </ul>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mt-0 bg-light p-2 rounded">
                                                    <form method="POST" class="needs-validation" novalidate="" name="chat-form"
                                                        id="chat-form">
                                                        <div class="row">
                                                            <div class="col mb-2 mb-sm-0">
                                                                <input type="hidden" name="order_id" id="orderId<?=$typeInfo['id']?>" value="<?=$typeInfo['id']?>">
                                                                <input type="text" name="message" id="msg<?=$typeInfo['id']?>" class="form-control" placeholder="Enter your message" required=""/>
                                                                <span id="msg_err<?=$typeInfo['id']?>"></span>
                                                                <div class="invalid-feedback">
                                                                    Please enter your messsage
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-auto">
                                                                <div class="btn-group">
                                                                    <div class="d-grid">
                                                                        <button type="submit" id="send<?=$typeInfo['id']?>" class="btn btn-success chat-send"><i class='uil uil-message'></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div> 
                                            </div>
                                        </div>
                                        
                                        <script>
                                            $(document).ready(function(){
                                                setInterval(function(){
                                                    showmsg();
                                                }, 1000);
                                                function showmsg(){
                                                    $.ajax({
                                                        type: "GET",
                                                        url: '/delivery/get-message/<?=$typeInfo['id']?>',
                                                        async: true,
                                                        dataType: 'JSON',
                                                        success: function(data){ 
                                                            var html = "";
                                                            var odd = null;
                                                            for(i=0; i<data.length; i++){
                                                                var date = new Date(data[i].created_at);
                                                                var hours = date.getHours();
                                                                var minutes = date.getMinutes();
                                                                var ampm = hours >= 12 ? 'pm' : 'am';
                                                                hours = hours % 12;
                                                                hours = hours ? hours : 12;
                                                                minutes = minutes < 10 ? '0'+minutes : minutes;
                                                                var strTime = hours + ':' + minutes + ' ' + ampm;
                                                                if(data[i].user_id == <?=session()->get('id')?>){
                                                                    odd = 'odd';
                                                                }else{
                                                                    odd = '';
                                                                }
                                                                let msg = data[i].message.toString();
                                                                html += 
                                                                "<li class='clearfix "+ odd +" mb-1'>"+
                                                                    "<div class='chat-avatar'>"+
                                                                        "<img src='/assets/img/user.jpg' class='rounded-circle' alt='"+data[i].username+"' />"+
                                                                        "<i>"+strTime+"</i>"+
                                                                    "</div>"+
                                                                    "<div class='conversation-text'>"+
                                                                        "<div class='ctext-wrap'>"+
                                                                            "<i>"+data[i].username+"</i>"+
                                                                            "<p class='text-break'>"+
                                                                                msg +
                                                                            "</p>"+
                                                                        "</div>"+
                                                                    "</div>"+
                                                                "</li>";
                                                            }
                                                            $("#getmsg<?=$typeInfo['id']?>").html(html);
                                                        }
                                                    });
                                                }
                                                $("#send<?=$typeInfo['id']?>").on('click', function(e){
                                                    e.preventDefault();
                                                    var msg = $("#msg<?=$typeInfo['id']?>").val();
                                                    var orderId = $("#orderId<?=$typeInfo['id']?>").val();
                                                    $.ajax({
                                                        type: "POST",
                                                        url: '/delivery/add-chat',
                                                        dataType: 'JSON',
                                                        data: {
                                                            message: msg,
                                                            order_id: <?=$typeInfo['id']?>,
                                                        },
                                                        success: function(data){
                                                            console.log('sent');
                                                            $("#msg<?=$typeInfo['id']?>").val("");
                                                            $("#orderId<?=$typeInfo['id']?>").val("");
                                                            showmsg();
                                                        },
                                                        error: function(err){
                                                            $("#msg_err<?=$typeInfo['id']?>").text(err.responseJSON.messages.message);
                                                            $("#msg_err<?=$typeInfo['id']?>").addClass('text-danger');
                                                        }
                                                    });
                                                });
                                            });
                                        </script>
                                    </div>
                                </div> 
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <p class="h5">Order Details</p>
        <div class="card border-secondary border m-0">
            <div class="card-body p-1">
                <div class="row m-0 p-0">
                    <?php if(!empty($getCarts)):?>
                        <table class="w-100">
                            <?php foreach ($getCarts as $carts) : ?>
                                <?php if($carts['order_id'] == $typeInfo['id'] && $carts['orders_id'] == $typeInfo['id']):?>
                                    <?php if($typeInfo['order_status_id'] == 2):?>
                                        <tr class="border-bottom border-secondary">
                                            <td class="p-0">
                                                <div class="card border-warning border card-menu-image-style p-0 m-1" style="white-space: nowrap;">
                                                    <div class="card-body p-0">
                                                        <img src="<?= '/assets/uploads/menu/'.$carts['image'] ?>" class="menu-image-style rounded" alt="...">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-0 ps-2">
                                                <?= ucfirst($carts['menu']); ?><br>
                                                x<?= $carts['quantity']; ?><br>
                                                ₱<?= number_format($carts['price']); ?>
                                            </td>
                                            <td class="p-0 pe-2">₱<?= number_format($carts['subTotal']);?></td>
                                            <td class="p-0 pe-2" width="200">
                                                <?php if(user_link('orders/admin/cart/qty', session()->get('userPermissionView'))):?>
                                                    <div class="input-group">
                                                        <button onclick="plusAndMinusCartQuantity('/orders/admin/cart/qty/',<?= $carts['id']; ?>,<?=$carts['menu_id']?>,
                                                            <?=$carts['order_id']?>,<?=$carts['quantity']?>, 1, 'minus','/orders/get-info',<?= $typeInfo['number'] ?>,
                                                            <?=$orderMaxLimit['max_limit']?>);" class="btn btn-md btn-outline-dark" type="button" id="minusButton">
                                                            <i class="mdi mdi-minus m-0"></i>
                                                        </button>
                                                        <input type="text" disabled class="form-control form-control-sm text-center border-dark" width="50" id="quantityOrderCartAdmin<?= $carts['id']; ?>" 
                                                            value="<?= $carts['quantity'] ?>" width="10">
                                                        <button onclick="plusAndMinusCartQuantity('/orders/admin/cart/qty/',<?= $carts['id']; ?>,<?=$carts['menu_id']?>,
                                                            <?=$carts['order_id']?>,<?=$carts['quantity']?>, 1, 'plus','/orders/get-info',<?= $typeInfo['number'] ?>,
                                                            <?=$orderMaxLimit['max_limit']?>);" class="btn btn-md btn-outline-dark" type="button" id="plusButton">
                                                            <i class="mdi mdi-plus m-0"></i>
                                                        </button>
                                                    </div>
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </td>
                                            <td class="p-0">
                                                <?php if(user_link('orders/cart/d', session()->get('userPermissionView'))):?>
                                                    <a onclick="confirmDeleteCart('/orders/cart/d/',<?=$carts['id']?>,<?=$carts['menu_id']?>,
                                                        <?=$carts['order_id']?>,<?=$carts['quantity']?>, 1,'/orders/get-info',<?=$typeInfo['id']?>,
                                                        <?= $typeInfo['number'] ?>,<?=$orderMaxLimit['max_limit']?>);" title="Remove" class="btn btn-md btn-outline-danger">
                                                        <i class="dripicons-trash"></i>
                                                    </a>
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <tr class="border-bottom border-secondary">
                                            <td class="p-0">
                                                <div class="card border-warning border card-menu-image-style p-0 m-1">
                                                    <div class="card-body p-0">
                                                        <img src="<?= '/assets/uploads/menu/'.$carts['image'] ?>" class="menu-image-style rounded" alt="...">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-0"><?= ucfirst($carts['menu']); ?></td>
                                            <td class="p-0">x<?= $carts['quantity']; ?></td>
                                            <td class="p-0">₱<?= number_format($carts['price']); ?></td>
                                            <td class="p-0">₱<?= number_format($carts['subTotal']);?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </table>
                    <?php else: ?>
                        No Data
                    <?php endif; ?>
                </div>
                <?php foreach ($getCartTotalPrice as $totalPrice) : ?>
                    <?php if($totalPrice['order_id'] == $typeInfo['id']):?>
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xxl-6 p-0">
                                <div class="row m-1 p-0">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                        <p class="float-start h5">Payment Method:</p>
                                        <?php foreach ($getPaymentMethod as $method) : ?>
                                            <?php if($method['id'] == $typeInfo['payment_method_id']):?>
                                                <p class="float-end h5"><?= ucwords($method['payment_method']);?></p>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <?php if(!empty($typeInfo['order_user_discount_id'])):?>
                                    <div class="row m-1 p-0">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                            <?php foreach ($getOrderUserDiscount as $discount) : ?>
                                                <?php if($discount['id'] == $typeInfo['order_user_discount_id']):?>
                                                    <p class="float-start h5"><?= ucwords($discount['customer_type']);?>&nbsp; discount:</p>
                                                    <p class="float-end h5"><?= ucwords($discount['discount_amount']);?>%</p>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="row m-1 p-0">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                        <p class="float-start h5"> VAT:</p>
                                        <p class="float-end h5">Less &nbsp;<?= $getVAT['description'];?></p>
                                    </div>
                                </div>
                                <div class="row m-1 p-0">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                        <p class="float-start h5">Coupon discount:</p>
                                        <p class="float-end h5"><?= $typeInfo['coupon_discount'] != 0 ? ucwords($typeInfo['coupon_code'].' : -&nbsp;₱&nbsp;'.$typeInfo['coupon_discount']) : '-&nbsp;₱&nbsp;0';?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xxl-6 p-0">
                                <div class="row m-1 p-0">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                        <p class="float-start h5">Amount Due:</p>
                                        <p class="float-end h5">&nbsp;₱&nbsp;<?= number_format($totalPrice['total_price'],2);?></p>
                                    </div>
                                </div>
                                <?php if($typeInfo['order_type'] == 3):?>
                                    <div class="row m-1 p-0">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                            <p class="float-start h5">Delivery fee:</p>
                                            <p class="float-end h5">+&nbsp;₱&nbsp;<?= number_format($getDeliveryFee['delivery_fee'],2);?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="row m-1 p-0">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                        <p class="float-start h5"> VAT:</p>
                                        <p class="float-end h5">-&nbsp;₱&nbsp;<?= number_format($totalPrice['total_amount_vat'],2);?></p>
                                    </div>
                                </div>
                                <div class="row m-1 p-0">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                        <p class="float-start h5">Discount:</p>
                                        <?php if(!empty($totalPrice['total_amount_user_discount'])):?>
                                            <p class="float-end h5">-&nbsp;₱&nbsp;<?= number_format($totalPrice['total_amount_user_discount'],2);?></p>
                                        <?php else: ?>
                                            <p class="float-end h5">-&nbsp;₱&nbsp;0</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row m-1 p-0">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                        <p class="float-start h5">Cash:</p>
                                        <p class="float-end h5">&nbsp;₱&nbsp;<?= number_format($totalPrice['c_cash'],2);?></p>
                                    </div>
                                </div>
                                <div class="row m-1 p-0">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                        <p class="float-start h5">Change:</p>
                                        <p class="float-end h5">&nbsp;₱&nbsp;<?= number_format($totalPrice['c_balance'],2);?></p>
                                    </div>
                                </div>
                                <div class="row m-1 p-0">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                        <p class="float-start h5">Total bill:</p>
                                        <?php if($typeInfo['order_user_discount_id'] == 0):?>
                                            <p class="float-end h5">&nbsp;₱&nbsp;<?= number_format($totalPrice['total_amount_bill_no_discount'],2);?></p>
                                        <?php else: ?>
                                            <p class="float-end h5">&nbsp;₱&nbsp;<?= number_format($totalPrice['total_amount_bill'],2);?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach;?>
<?php else: ?>
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">No data</h5>
            </div>
        </a>
    </div>
<?php endif;?>