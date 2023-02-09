
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<?php if (!empty($getCustomerOrderDetails)):?>
    <?php foreach ($getCustomerOrderDetails as $orderDetails):?>
        <?php if (session()->get('getCustomerCountCarts') != 0):?>

            <?php if ($orderDetails['order_type'] == 0):?>   

            <?php elseif ($orderDetails['order_type'] == 3):?>   
                <?php if ($orderDetails['order_status_id'] != 1):?>   
                    <div class="row justify-content-center">
                        <div class="col-lg-7 col-md-10 col-sm-11">
                            <div class="horizontal-steps mt-0 mb-2 pb-4" id="tooltip-container">
                                <div class="horizontal-steps-content">
                                    <div class="step-item <?=$orderDetails['order_status_id'] == 2 ? 'current':''?>">
                                        <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom">Order Placed</span>
                                    </div>
                                    <div class="step-item <?=$orderDetails['order_status_id'] == 3 ? 'current':''?>">
                                        <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom">Preparing</span>
                                    </div>
                                    <div class="step-item <?=$orderDetails['order_status_id'] == 4 ? 'current':''?>">
                                        <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom">Shipping</span>
                                    </div>
                                    <div class="step-item <?=$orderDetails['order_status_id'] == 5 ? 'current':''?>">
                                        <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom">Delivered</span>
                                    </div>
                                </div>
                                <?php if ($orderDetails['order_status_id'] == 2):?>   
                                    <div class="process-line" style="width: 0%;"></div>
                                <?php elseif ($orderDetails['order_status_id'] == 3):?>  
                                    <div class="process-line" style="width: 33%;"></div>
                                <?php elseif ($orderDetails['order_status_id'] == 4):?>  
                                    <div class="process-line" style="width: 66%;"></div>
                                <?php elseif ($orderDetails['order_status_id'] == 5):?>  
                                    <div class="process-line" style="width: 99%;"></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php else: ?>   
                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-10 col-sm-11">
                        <div class="horizontal-steps mt-0 mb-2 pb-4" id="tooltip-container">
                            <div class="horizontal-steps-content">
                                <div class="step-item <?=$orderDetails['order_status_id'] == 2 ? 'current':''?>">
                                    <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom">Order Placed</span>
                                </div>
                                <div class="step-item <?=$orderDetails['order_status_id'] == 3 ? 'current':''?>">
                                    <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom">Preparing</span>
                                </div>
                                <div class="step-item <?=$orderDetails['order_status_id'] == 4 ? 'current':''?>">
                                    <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom">Serving</span>
                                </div>
                                <div class="step-item <?=$orderDetails['order_status_id'] == 5 ? 'current':''?>">
                                    <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom">Served</span>
                                </div>
                            </div>
                            <?php if ($orderDetails['order_status_id'] == 2):?>   
                                <div class="process-line" style="width: 0%;"></div>
                            <?php elseif ($orderDetails['order_status_id'] == 3):?>  
                                <div class="process-line" style="width: 33%;"></div>
                            <?php elseif ($orderDetails['order_status_id'] == 4):?>  
                                <div class="process-line" style="width: 66%;"></div>
                            <?php elseif ($orderDetails['order_status_id'] == 5):?>  
                                <div class="process-line" style="width: 99%;"></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- end row --> 
            <?php endif; ?>

            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="table-responsive">
                                        <span class="badge badge-outline-danger rounded-pill m-1 h3">*Limit of <?=$orderMaxLimit['max_limit']?> orders only.</span>
                                        <table class="table table-sm table-borderless table-centered mb-0 text-center">
                                            <thead class="bg-dark text-white">
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>SubTotal</th>
                                                    <th>Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($getCustomerCartDetails)):?>
                                                    <?php foreach ($getCustomerCartDetails as $carts) : ?>
                                                        <?php if($carts['order_id'] == $orderDetails['id']):?>
                                                            <tr>
                                                                <td>
                                                                    <img src="<?=base_url()?><?= '/assets/uploads/menu/'.$carts['image'] ?>" alt="contact-img"
                                                                        title="contact-img" class="rounded me-3" height="64" />
                                                                </td>
                                                                <td>
                                                                    <p class="m-0 d-inline-block align-middle font-16">
                                                                        <a href="javascript:void(0);"
                                                                            class="text-body"><?=$carts['menu'] ?></a>
                                                                        <br>
                                                                    </p>
                                                                </td>
                                                                <td>₱ <?= number_format($carts['price']); ?></td>
                                                                <td>₱ <?= number_format($carts['sub_total_price']); ?></td>
                                                                <td>
                                                                    <?php if ($orderDetails['order_status_id'] != 1):?>
                                                                        x<?=$carts['quantity'] ?>
                                                                    <?php else: ?>
                                                                        <?php if(user_link('cart/u', session()->get('userPermissionView'))):?>
                                                                            <div class="input-group" id="quantity-resize-contents">
                                                                                <button onclick="plusAndMinusCartQuantity('<?=base_url()?>/cart/customer/qty',<?= $carts['id']; ?>, 'minus',<?= $carts['quantity']; ?>, <?= $carts['menu_id']; ?>);" class="btn btn-sm btn-outline-secondary" type="button" id="minusButton">
                                                                                    <i class="mdi mdi-minus m-0"></i>
                                                                                </button>
                                                                                <input id="inputQuantityValue" type="text" disabled class="form-control form-control-sm text-center" width="50" id="quantityOrderCartAdmin<?= $carts['id']; ?>" value="<?= $carts['quantity'] ?>" width="30">
                                                                                <button onclick="plusAndMinusCartQuantity('<?=base_url()?>/cart/customer/qty',<?= $carts['id']; ?>, 'plus',<?= $carts['quantity']; ?>,<?= $carts['menu_id']; ?>);" class="btn btn-sm btn-outline-secondary" type="button" id="plusButton">
                                                                                    <i class="mdi mdi-plus m-0"></i>
                                                                                </button>
                                                                            </div>
                                                                        <?php else: ?>
                                                                            -
                                                                        <?php endif; ?> 
                                                                    <?php endif; ?>   
                                                                </td>
                                                            </tr>         
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="4">No data</td>
                                                    </tr>
                                                <?php endif; ?> 
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="border p-3 mt-4 mt-lg-0 rounded">
                                        <h4 class="mb-1">Order Summary</h4>
                                        <?php foreach ($getCartTotalPrice as $totalPrice) : ?>
                                            <?php if($totalPrice['order_id'] == $orderDetails['id']):?>
                                                <div class="row" id="resize-contents">
                                                    <div class="row m-1 p-0">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                                            <p class="float-start h5">Order Number:</p>
                                                            <p class="float-end h5">#<?=$orderDetails['number'] ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 p-0">
                                                        <?php if($orderDetails['payment_method_id'] != 0):?>
                                                            <?php if(user_link('cart/add-payment-method', session()->get('userPermissionView'))):?>
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
                                                            <?php if(user_link('cart/add-payment-method', session()->get('userPermissionView'))):?>
                                                                <div class="row m-1 p-0">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                                                        <p class="float-start h5">Select Payment Method: <small class="text-danger">*</small></p>
                                                                        <select class="form-select form-select-sm float-end mb-1" name="payment_method" id="payment_method">
                                                                            <option disabled selected> -- Select payment method-- </option>
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
                                                                            <option value="<?=$orderType['id']?>"><?= ucwords($orderType['type']);?></option>
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
                                                                <p class="float-end h5">&nbsp;₱<?= number_format($totalPrice['total_price'],2);?></p>
                                                            </div>
                                                        </div>
                                                        <div class="row m-1 p-0">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 border-bottom">
                                                                <p class="float-start h5">Coupon:</p>
                                                                <?php if ($orderDetails['order_status_id'] == 1):?> 
                                                                    <?php if(!empty($orderDetails['coupon_discount'])):?>
                                                                        <p class="float-end h5">
                                                                            <?= ucwords($orderDetails['coupon_code'].' : -&nbsp;₱'.$orderDetails['coupon_discount']);?>
                                                                        </p>
                                                                    <?php else:?>
                                                                    <a type="button" class="btn btn-sm btn-link text-danger float-end" onclick="addCodeCouponDiscount('<?=base_url()?>/cart/apply-coupon', <?=$orderDetails['id']?>);">
                                                                            <u> Apply Coupon</u>
                                                                        </a>
                                                                    <?php endif;?>
                                                                <?php else:?>
                                                                    <p class="float-end h5">
                                                                        <?= ucwords($orderDetails['coupon_code'].' : -&nbsp;₱'.$orderDetails['coupon_discount']);?>
                                                                    </p>
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
                                                                <p class="float-end h5">-&nbsp;₱<?= number_format($totalPrice['total_amount_vat'],2);?></p>
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
                                                                <?php if($orderDetails['order_user_discount_id'] == 0):?>
                                                                    <p class="float-end h5">&nbsp;₱&nbsp;<?= number_format($totalPrice['total_amount_bill_no_discount'],2);?></p>
                                                                <?php else: ?>
                                                                    <p class="float-end h5">&nbsp;₱&nbsp;<?= number_format($totalPrice['total_amount_bill'],2);?></p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if ($orderDetails['order_status_id'] == 1):?> 
                                                    <div class="row m-1 p-0">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12">
                                                            <button type="button" onclick="checkout('<?=base_url()?>/cart/place-order',<?= $orderDetails['id'];?>);" class="btn btn-sm btn-danger float-end" id="checkoutAdminCartButton">Checkout</button>
                                                        </div>
                                                    </div> 
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>

                                    <!-- <?php if ($orderDetails['order_status_id'] != 1):?> -->
                                        <?php if ($orderDetails['order_type'] == 3):?>
                                            <div class="card p-0 mt-3">
                                                <div class="card-body p-1 m-1 border-success">
                                                    <ul class="conversation-list p-1" id="conversation-list" data-simplebar style="max-height: 200px">
                                                        <div id="getBotmsg"></div>
                                                        <div id="getmsg<?=$orderDetails['id']?>"></div>
                                                    </ul>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mt-0 bg-light p-2 rounded">
                                                                <form method="POST" class="needs-validation" novalidate="" name="chat-form"
                                                                    id="chat-form">
                                                                    <div class="row">
                                                                        <div class="col mb-2 mb-sm-0">
                                                                            <input type="hidden" name="order_id" id="orderId<?=$orderDetails['id']?>" value="<?=$orderDetails['id']?>">
                                                                            <input type="text" name="message" id="msg<?=$orderDetails['id']?>" class="form-control" placeholder="Enter your message" required=""/>
                                                                            <span id="msg_err<?=$orderDetails['id']?>"></span>
                                                                            <div class="invalid-feedback">
                                                                                Please enter your messsage
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-auto">
                                                                            <div class="btn-group">
                                                                                <div class="d-grid">
                                                                                    <button type="submit" id="send<?=$orderDetails['id']?>" class="btn btn-success chat-send"><i class='uil uil-message'></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                        <?php endif;?>
                                        <script>
                                            $(document).ready(function(){
                                                setInterval(function(){
                                                    showmsg();
                                                }, 1000);
                                                
                                                showmsg();
                                                function showmsg(){
                                                    $.ajax({
                                                        type: "GET",
                                                        url: '<?=base_url()?>/orders/get-message/<?=$orderDetails['id']?>',
                                                        async: true,
                                                        dataType: 'JSON',
                                                        success: function(data){ 
                                                            var html = "";
                                                            var htmlBot = "";
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
                                                                        "<img src='<?=base_url()?>/assets/img/user.jpg' class='rounded-circle' alt='"+data[i].username+"' />"+
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
                                                            var date = new Date();
                                                            var hours = date.getHours();
                                                            var minutes = date.getMinutes();
                                                            var ampm = hours >= 12 ? 'pm' : 'am';
                                                            hours = hours % 12;
                                                            hours = hours ? hours : 12; // the hour '0' should be '12'
                                                            minutes = minutes < 10 ? '0'+minutes : minutes;
                                                            var strTime = hours + ':' + minutes + ' ' + ampm;
                                                            htmlBot += 
                                                            "<li class='clearfix mb-1'>"+
                                                                "<div class='chat-avatar'>"+
                                                                    "<img src='<?=base_url()?>/assets/img/user.jpg' class='rounded-circle' alt='LAMON Restaurant' />"+
                                                                    "<i>"+strTime+"</i>"+
                                                                "</div>"+
                                                                "<div class='conversation-text'>"+
                                                                    "<div class='ctext-wrap'>"+
                                                                        "<i>LAMON Restaurant</i>"+
                                                                        "<p class='text-break'>"+
                                                                            "Please wait for your orders. Thank you!" +
                                                                        "</p>"+
                                                                    "</div>"+
                                                                "</div>"+
                                                                "</li>";
                                                            $("#getBotmsg").html(htmlBot);
                                                            $("#getmsg<?=$orderDetails['id']?>").html(html);
                                                        }
                                                    });
                                                }
                                                $("#send<?=$orderDetails['id']?>").on('click', function(e){
                                                    e.preventDefault();
                                                    var msg = $("#msg<?=$orderDetails['id']?>").val();
                                                    var orderId = $("#orderId<?=$orderDetails['id']?>").val();
                                                    $.ajax({
                                                        type: "POST",
                                                        url: '<?=base_url()?>/cart/add-chat',
                                                        dataType: 'JSON',
                                                        data: {
                                                            message: msg,
                                                            order_id: <?=$orderDetails['id']?>,
                                                        },
                                                        success: function(data){
                                                            $("#msg<?=$orderDetails['id']?>").val("");
                                                            $("#orderId<?=$orderDetails['id']?>").val("");
                                                            showmsg();
                                                        },
                                                        error: function(err){
                                                            $("#msg_err<?=$orderDetails['id']?>").text(err.responseJSON.messages.message);
                                                            $("#msg_err<?=$orderDetails['id']?>").addClass('text-danger');
                                                        }
                                                    });
                                                });
                                            });
                                        </script>
                                    <!-- <?php else: ?>
                                        <div class="row mt-3">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="text-sm-end">
                                                    <?php if(user_link('orders/place-order/u', session()->get('userPermissionView'))):?>
                                                        <button title="Checkout" type="submit" class="btn btn-sm btn-danger"><i class="mdi mdi-cart-plus me-1"></i>&nbsp;Checkout</button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif;?> -->
                                </div>
                            </div> 
                        </div> 
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?> 
<?php else: ?>
    <div class="card rounded mt-4" style="border: 5px dashed gray">
        <h4 class="text-center text-secondary mt-5 mb-5">Empty Cart!</h4>
    </div>
<?php endif; ?>