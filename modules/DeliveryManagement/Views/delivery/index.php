<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active"><?= $title ?></li>
                </ol>
            </div>
            <h4 class="page-title"><?=$title?></h4>
        </div>
    </div>
</div>     
<!-- end page title --> 
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<div class="row">
    <div class="col-lg-12">
        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <a href="#delivery" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                    <i class="mdi mdi-home-variant d-md-none d-block"></i>
                    <span class="d-none d-md-block">Delivery</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#shipping" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                    <i class="mdi mdi-account-circle d-md-none d-block"></i>
                    <span class="d-none d-md-block">Shipment</span>
                </a>
            </li>
        </ul>   
        <div class="tab-content">
            <div class="tab-pane show" id="delivery">
                <div class="card mt-1">
                    <div class="card-body p-1 m-0">
                        <?php if (!empty($getOrderDeliveryDetails)): ?> 
                            <div class="card p-0 m-0">
                                <?php foreach ($getOrderDeliveryDetails as $details): ?>
                                    <div class="accordion custom-accordion p-0 m-0" id="custom-accordion-one<?=$details['id']?>">
                                        <div class="card p-0 m-1">
                                            <div class="card-header m-0 p-0" id="headingFour<?=$details['id']?>">
                                                <h5 class="m-0 p-0 d-flex">
                                                    <a class="btn btn-dark flex-grow-1"
                                                        data-bs-toggle="collapse" href="#collapseFour<?=$details['id']?>"
                                                        aria-expanded="true" aria-controls="collapseFour">
                                                        <p class="h5 float-start m-0 p-0">Order#<?= $details['number'] ?>
                                                            <span class="badge badge-warning-lighten"><?= ucfirst($details['order_status']); ?></span> 
                                                        </p>
                                                    </a>
                                                    <?php if(user_link('orders/d', session()->get('userPermissionView'))):?>
                                                        <button onclick="confirmDelete('/orders/d/',<?=$details['id']?>)" type="button" title="Cancel Order" animation="true" class="btn btn-sm btn-danger d-print-none">
                                                            <i class="dripicons-trash"></i> Remove
                                                        </button>
                                                    <?php endif; ?>
                                                    <?php if(user_link('orders/admin/add-payment/u', session()->get('userPermissionView'))):?>
                                                        <?php foreach ($getCartDeliveryTotalPrice as $totalPrice) : ?>
                                                            <?php if($totalPrice['order_id'] == $details['id']):?>
                                                                <button onclick="applyPayment('/orders/admin/add-payment/u/',<?=$details['id']?>,'/<?=$totalPrice['total_price']?>')" class="btn btn-sm btn-outline-dark d-flex" type="button" <?= (empty($details['total_amount']))? '':'disabled' ?>>
                                                                    <?= (empty($details['total_amount']))? '<i class="dripicons-plus"></i>Add&nbspPayment':'Paid<i class=" dripicons-checkmark text-success"></i>' ?>
                                                                </button>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                    <?php if(user_link('orders/print-order-invoice', session()->get('userPermissionView'))):?>
                                                        <a onclick="printOrders('<?= $details['id'] ?><?= $details['number'] ?>')" class="btn btn-sm btn-info d-print-none"><i class="dripicons-print"></i>&nbspInvoice</a>
                                                    <?php endif; ?>
                                                    <?php if ($details['order_status_id'] == 2): ?>
                                                        <?php if(user_link('orders/place-order/u', session()->get('userPermissionView'))):?>
                                                            <a onclick="confirmPlaceOrder('/orders/place-order/u/',<?=$details['id']?>,'/3')" title="Serve Food" animation="true" class="btn btn-sm btn-success d-flex d-print-none">
                                                                Prepare&nbspthe&nbspfood&nbsp <i class="dripicons-arrow-thin-right"></i> 
                                                            </a>
                                                        <?php endif; ?>
                                                    <?php elseif ($details['order_status_id'] == 3): ?>
                                                        <?php if(user_link('orders/place-order/u', session()->get('userPermissionView'))):?>
                                                            <a onclick="confirmPlaceOrder('/orders/place-order/u/',<?=$details['id']?>,'/4')" title="Serve Food" animation="true" class="btn btn-sm btn-success d-flex d-print-none">
                                                                Add&nbspto&nbspshipping&nbsp <i class="dripicons-arrow-thin-right"></i> 
                                                            </a>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <?php if(user_link('orders/place-order/u', session()->get('userPermissionView'))):?>
                                                            <a onclick="confirmPlaceOrder('/orders/place-order/u/',<?=$details['id']?>,'/5')" title="Serve Food" animation="true" class="btn btn-sm btn-success d-flex d-print-none">
                                                                Apply&nbspshipping&nbspis&nbspdone&nbsp <i class="dripicons-arrow-thin-right"></i> 
                                                            </a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </h5>
                                            </div>
                                            <div id="collapseFour<?=$details['id']?>" class="collapse show p-0 m-0" aria-labelledby="headingFour<?=$details['id']?>"
                                                data-bs-parent="#custom-accordion-one<?=$details['id']?>">
                                                <div class="card-body  p-0 m-0">
                                                    <div class="table-responsive-sm p-0 m-0" id="<?= $details['id'] ?><?= $details['number'] ?>">
                                                        <table class="table-responsive table-sm table-centered m-0 p-0" width="100%">
                                                            <thead>
                                                                <tr class="border-bottom">
                                                                    <th scope="col" class="d-print-none">
                                                                        <center>Image</center>
                                                                    </th>
                                                                    <th scope="col">
                                                                        <center>Food Name</center>
                                                                    </th>
                                                                    <th scope="col">
                                                                        <center>Price</center>
                                                                    </th>
                                                                    <th scope="col" width="18%">
                                                                        <center>Quantity</center>
                                                                    </th>
                                                                    <th scope="col">
                                                                        <center>SubTotal</center>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if(!empty($getCarts)):?>
                                                                    <?php foreach ($getCarts as $carts) : ?>
                                                                        <?php if($carts['order_id'] == $details['id'] && $carts['orders_id'] == $details['id']):?>
                                                                            <tr class="border-bottom">
                                                                                <td class="d-print-none">
                                                                                    <center>
                                                                                        <img src="<?= '/assets/uploads/menu/'.$carts['image'] ?>" width="50" height="50" class="img-fluid rounded-start" alt="...">
                                                                                    </center>
                                                                                </td>
                                                                                <td>
                                                                                    <center><?= ucfirst($carts['menu']); ?></center>
                                                                                </td>
                                                                                <td>
                                                                                    <center>₱ <?= number_format($carts['price']); ?></center>
                                                                                </td>
                                                                                <td>
                                                                                    <center>x<?= $carts['quantity']; ?></center>
                                                                                </td>
                                                                                <td class="table-active">
                                                                                    <center>₱ <?= number_format($carts['subTotal']);?></center>
                                                                                </td>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; ?>
                                                                <?php else: ?>
                                                                    No Data
                                                                <?php endif; ?>
                                                                <?php if ($details['order_status_id'] == 2 || $details['order_status_id'] == 3): ?>
                                                                    <?php foreach ($getCartDeliveryTotalPrice as $totalPrice) : ?>
                                                                        <?php if($totalPrice['order_id'] == $details['id']):?>
                                                                            <tr class="table-active mb-0 border-bottom">
                                                                                <td scope="col" class="p-0">
                                                                                    <center>
                                                                                        <span class="badge badge-outline-success m-0"><?= ucwords($details['type']); ?></span>
                                                                                    </center>
                                                                                </td>
                                                                                <td scope="col" class="p-0">
                                                                                    <center>
                                                                                        <span class="badge badge-outline-secondary m-0"><b>Order#<?= $details['number'] ?>&nbsp|&nbsp<?= (empty($details['total_amount']))? '<span class="badge bg-danger">Not Paid<span>':'<span class="badge bg-success">Paid<span>' ?></b></span>
                                                                                    </center>
                                                                                </td>
                                                                                <td scope="col" class="pb-0">
                                                                                    <center>
                                                                                        <p class="mt-0"><b>Change:</b>&nbsp₱&nbsp<?= number_format($totalPrice['c_balance']);?></p>
                                                                                    </center>
                                                                                </td>
                                                                                <td scope="col" class="pb-0">
                                                                                    <center>
                                                                                        <p class="mt-0"><b>Cash:</b>&nbsp₱&nbsp<?= number_format($totalPrice['c_cash']);?></p>
                                                                                    </center>
                                                                                </td>
                                                                                <td scope="col" class="pb-0">
                                                                                    <center>
                                                                                        <p class="mt-0"><b>Total:</b>&nbsp₱&nbsp<?= number_format($totalPrice['total_price']);?></p>
                                                                                    </center>
                                                                                </td>
                                                                            </tr>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; ?>
                                                                <?php else: ?>
                                                                    -
                                                                <?php endif; ?>
                                                            </tbody>
                                                        </table>
                                                        <div class="row p-0 m-0">
                                                            <!-- chat area -->
                                                            <div class="col-md-6 p-0 m-0">
                                                                <div class="card p-0 m-0">
                                                                    <div class="card-body p-2 m-1">
                                                                        <div class="card-title">Customer Details: </div>
                                                                        <div class="mt-0">
                                                                            <div class="row">
                                                                                <?php foreach ($userLists as $value):?>
                                                                                    <?php if ($value['id'] == $details['user_id']):?>
                                                                                        <div class="col-6">
                                                                                            <p class="mt-0 mb-0"><strong><i class='uil uil-at'></i> Email:</strong></p>
                                                                                            <p><?= $value['email_address'];?></p>
                                                                                        </div>
                                                                                        <div class="col-6">
                                                                                            <p class="mt-0 mb-0"><strong><i class='uil uil-phone'></i> Phone Number:</strong></p>
                                                                                            <p><?= $value['contact_number'];?></p>
                                                                                        </div>
                                                                                        <div class="col-12">
                                                                                            <p class="mt-0 mb-0"><strong><i class='uil uil-location'></i> Location:</strong></p>
                                                                                            <p>
                                                                                                <?php
                                                                                                    $full_address = '';
                                                                                                    foreach ($cities as $city) {
                                                                                                        if($city['city_code'] == $value['city_id']){
                                                                                                            $full_address .= $value['addtl_address'].', '.$city['city_name'];
                                                                                                        }
                                                                                                    }
                                                                                                    foreach ($provinces as $province) {
                                                                                                        if($province['province_code'] == $value['province_id']){
                                                                                                            $full_address .= ', '.$province['province_name'];
                                                                                                        }
                                                                                                    }
                                                                                                    foreach ($regions as $region) {
                                                                                                        if($region['region_code'] == $value['region_id']){
                                                                                                            $full_address .= ', '.$region['region_name'];
                                                                                                        }
                                                                                                    }
                                                                                                    echo $full_address;
                                                                                                ?>
                                                                                            </p>
                                                                                        </div>
                                                                                    <?php endif;?>
                                                                                <?php endforeach;?>
                                                                            </div>
                                                                        </div>
                                                                    </div> <!-- end card-body -->
                                                                </div> <!-- end card -->
                                                            </div>
                                                            <!-- end chat area-->
                                                            <div class="col-md-6 d-print-none p-0 m-0">
                                                                <div class="card p-0 m-0">
                                                                    <div class="card-body p-1 m-1">
                                                                        <ul class="conversation-list p-1" data-simplebar style="max-height: 200px">
                                                                            <div id="getmsg<?=$details['id']?>">
                                                                            </div>
                                                                        </ul>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="mt-0 bg-light p-2 rounded">
                                                                                    <form method="POST" class="needs-validation" novalidate="" name="chat-form"
                                                                                        id="chat-form">
                                                                                        <div class="row">
                                                                                            <div class="col mb-2 mb-sm-0">
                                                                                                <input type="hidden" name="order_id" id="orderId<?=$details['id']?>" value="<?=$details['id']?>">
                                                                                                <input type="text" name="message" id="msg<?=$details['id']?>" class="form-control" placeholder="Enter your message" required=""/>
                                                                                                <span id="msg_err<?=$details['id']?>"></span>
                                                                                                <div class="invalid-feedback">
                                                                                                    Please enter your messsage
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-auto">
                                                                                                <div class="btn-group">
                                                                                                    <div class="d-grid">
                                                                                                        <button type="submit" id="send<?=$details['id']?>" class="btn btn-success chat-send"><i class='uil uil-message'></i></button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div> <!-- end col -->
                                                                                        </div> <!-- end row-->
                                                                                    </form>
                                                                                </div> 
                                                                            </div> <!-- end col-->
                                                                        </div>
                                                                        <!-- end row -->
                                                                    </div> <!-- end card-body -->
                                                                </div> <!-- end card -->
                                                            </div>
                                                        </div>
                                                        <script>
                                                            $(document).ready(function(){
                                                                setInterval(function(){
                                                                    showmsg();
                                                                }, 1000);
                                                                
                                                                showmsg();
                                                                function showmsg(){
                                                                    $.ajax({
                                                                        type: "GET",
                                                                        url: '/delivery/get-message/<?=$details['id']?>',
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
                                                                                hours = hours ? hours : 12; // the hour '0' should be '12'
                                                                                minutes = minutes < 10 ? '0'+minutes : minutes;
                                                                                var strTime = hours + ':' + minutes + ' ' + ampm;
                                                                                if(data[i].user_id == <?=session()->get('id')?>){
                                                                                    odd = 'odd';
                                                                                }else{
                                                                                    odd = '';
                                                                                }
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
                                                                                                data[i].message +
                                                                                            "</p>"+
                                                                                        "</div>"+
                                                                                    "</div>"+
                                                                                "</li>";
                                                                            }
                                                                            $("#getmsg<?=$details['id']?>").html(html);
                                                                        },
                                                                        error: function(err)
                                                                        {
                                                                            console.log(err);
                                                                        }
                                                                    });
                                                                }
                                                                $("#send<?=$details['id']?>").on('click', function(e){
                                                                    e.preventDefault();
                                                                    var msg = $("#msg<?=$details['id']?>").val();
                                                                    var orderId = $("#orderId<?=$details['id']?>").val();
                                                                    $.ajax({
                                                                        type: "POST",
                                                                        url: '/delivery/add-chat',
                                                                        dataType: 'JSON',
                                                                        data: {
                                                                            message: msg,
                                                                            order_id: orderId,
                                                                        },
                                                                        success: function(data){
                                                                            console.log('sent');
                                                                            $("#msg<?=$details['id']?>").val("");
                                                                            $("#orderId<?=$details['id']?>").val("");
                                                                            showmsg();
                                                                        },
                                                                        error: function(err){
                                                                            $("#msg_err<?=$details['id']?>").text(err.responseJSON.messages.message);
                                                                            $("#msg_err<?=$details['id']?>").addClass('text-danger');
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
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                        No Orders
                        <?php endif; ?>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div>
            <div class="tab-pane active" id="shipping">
                <div class="card mt-1">
                    <div class="card-body p-1 m-0">
                        <?php if (!empty($getOrderShipmentDetails)): ?> 
                            <div class="card p-0 m-0">
                                <?php foreach ($getOrderShipmentDetails as $details): ?>
                                    <div class="accordion custom-accordion p-0 m-0" id="custom-accordion-one<?=$details['id']?>">
                                        <div class="card p-0 m-1">
                                            <div class="card-header m-0 p-0" id="headingFour<?=$details['id']?>">
                                                <h5 class="m-0 p-0 d-flex">
                                                    <a class="btn btn-dark flex-grow-1"
                                                        data-bs-toggle="collapse" href="#collapseFour<?=$details['id']?>"
                                                        aria-expanded="true" aria-controls="collapseFour">
                                                        <p class="h5 float-start m-0 p-0">Order#<?= $details['number'] ?>
                                                            <!-- <span class="badge badge-warning-lighten"><?= ucfirst($details['order_status']); ?></span>  -->
                                                        </p>
                                                    </a>
                                                    <?php if(user_link('orders/a', session()->get('userPermissionView'))):?> 
                                                        <?php if (empty($details['total_amount'])): ?>
                                                            <a class="btn btn-primary btn-sm d-print-none" data-bs-toggle="modal" data-bs-target="#addCartModal<?=$details['id']?>" type="button">
                                                                <i class="dripicons-plus"></i> Add&nbspfood
                                                            </a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if(user_link('orders/print-order-invoice', session()->get('userPermissionView'))):?>
                                                        <a onclick="printOrders('<?= $details['id'] ?><?= $details['number'] ?>')" class="btn btn-sm btn-info d-print-none"><i class="dripicons-print"></i>&nbspInvoice</a>
                                                    <?php endif; ?>
                                                    <?php if ($details['order_status_id'] == 2): ?>
                                                        <?php if(user_link('orders/place-order/u', session()->get('userPermissionView'))):?>
                                                            <a onclick="confirmPlaceOrder('/orders/place-order/u/',<?=$details['id']?>,'/3')" title="Serve Food" animation="true" class="btn btn-sm btn-success d-flex d-print-none">
                                                                Prepare&nbspthe&nbspfood&nbsp <i class="dripicons-arrow-thin-right"></i> 
                                                            </a>
                                                        <?php endif; ?>
                                                    <?php elseif ($details['order_status_id'] == 3): ?>
                                                        <?php if(user_link('orders/place-order/u', session()->get('userPermissionView'))):?>
                                                            <a onclick="confirmPlaceOrder('/orders/place-order/u/',<?=$details['id']?>,'/4')" title="Serve Food" animation="true" class="btn btn-sm btn-success d-flex d-print-none">
                                                                Add&nbspto&nbspshipping&nbsp <i class="dripicons-arrow-thin-right"></i> 
                                                            </a>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <?php if(user_link('orders/place-order/u', session()->get('userPermissionView'))):?>
                                                            <a onclick="confirmPlaceOrder('/orders/place-order/u/',<?=$details['id']?>,'/4')" title="Serve Food" animation="true" class="btn btn-sm btn-success d-flex d-print-none">
                                                                Apply&nbspshipment&nbspis&nbspdone&nbsp <i class="dripicons-arrow-thin-right"></i> 
                                                            </a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </h5>
                                            </div>
                                            <div id="collapseFour<?=$details['id']?>" class="collapse show p-0 m-0" aria-labelledby="headingFour<?=$details['id']?>"
                                                data-bs-parent="#custom-accordion-one<?=$details['id']?>">
                                                <div class="card-body  p-0 m-0">
                                                    <div class="table-responsive-sm p-0 m-0" id="<?= $details['id'] ?><?= $details['number'] ?>">
                                                        <table class="table-responsive table-sm table-centered m-0 p-0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col" class="d-print-none">
                                                                        <center>Image</center>
                                                                    </th>
                                                                    <th scope="col">
                                                                        <center>Food Name</center>
                                                                    </th>
                                                                    <th scope="col">
                                                                        <center>Price</center>
                                                                    </th>
                                                                    <th scope="col" width="18%">
                                                                        <center>Quantity</center>
                                                                    </th>
                                                                    <th scope="col">
                                                                        <center>SubTotal</center>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if(!empty($getCarts)):?>
                                                                    <?php foreach ($getCarts as $carts) : ?>
                                                                        <?php if($carts['order_id'] == $details['id'] && $carts['orders_id'] == $details['id']):?>
                                                                            <tr>
                                                                                <td class="d-print-none">
                                                                                    <center>
                                                                                        <img src="<?= '/assets/uploads/menu/'.$carts['image'] ?>" width="50" height="50" class="img-fluid rounded-start" alt="...">
                                                                                    </center>
                                                                                </td>
                                                                                <td>
                                                                                    <center><?= ucfirst($carts['menu']); ?></center>
                                                                                </td>
                                                                                <td>
                                                                                    <center>₱ <?= number_format($carts['price']); ?></center>
                                                                                </td>
                                                                                <td>
                                                                                    <center>x<?= $carts['quantity']; ?></center>
                                                                                </td>
                                                                                <td class="table-active">
                                                                                    <center>₱ <?= number_format($carts['subTotal']);?></center>
                                                                                </td>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; ?>
                                                                <?php else: ?>
                                                                    No Data
                                                                <?php endif; ?>
                                                                <?php if ($details['order_status_id'] == 4): ?>
                                                                    <?php foreach ($getCartDeliveryShipmentTotalPrice as $totalPrice) : ?>
                                                                        <?php if($totalPrice['order_id'] == $details['id']):?>
                                                                            <tr class="table-active mb-0">
                                                                                <td scope="col" class="p-0">
                                                                                    <center>
                                                                                        <span class="badge badge-outline-success m-0"><?= ucwords($details['type']); ?></span>
                                                                                    </center>
                                                                                </td>
                                                                                <td scope="col" class="p-0">
                                                                                    <center>
                                                                                        <span class="badge badge-outline-secondary m-0"><b>Order#<?= $details['number'] ?>&nbsp|&nbsp<?= (empty($details['total_amount']))? '<span class="badge bg-danger">Not Paid<span>':'<span class="badge bg-success">Paid<span>' ?></b></span>
                                                                                    </center>
                                                                                </td>
                                                                                <td scope="col" class="pb-0">
                                                                                    <center>
                                                                                        <p class="mt-0"><b>Change:</b>&nbsp₱&nbsp<?= number_format($totalPrice['c_balance']);?></p>
                                                                                    </center>
                                                                                </td>
                                                                                <td scope="col" class="pb-0">
                                                                                    <center>
                                                                                        <p class="mt-0"><b>Cash:</b>&nbsp₱&nbsp<?= number_format($totalPrice['c_cash']);?></p>
                                                                                    </center>
                                                                                </td>
                                                                                <td scope="col" class="pb-0">
                                                                                    <center>
                                                                                        <p class="mt-0"><b>Total:</b>&nbsp₱&nbsp<?= number_format($totalPrice['total_price']);?></p>
                                                                                    </center>
                                                                                </td>
                                                                            </tr>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; ?>
                                                                <?php else: ?>
                                                                    -
                                                                <?php endif; ?>
                                                            </tbody>
                                                        </table>
                                                        <div class="row p-0 m-0">
                                                            <!-- chat area -->
                                                            <div class="col-md-6 p-0 m-0">
                                                                <div class="card p-0 m-0">
                                                                    <div class="card-body p-2 m-1">
                                                                        <div class="card-title">Customer Details: </div>
                                                                        <div class="mt-0">
                                                                            <div class="row">
                                                                                <?php foreach ($userLists as $value):?>
                                                                                    <?php if ($value['id'] == $details['user_id']):?>
                                                                                        <div class="col-6">
                                                                                            <p class="mt-0 mb-0"><strong><i class='uil uil-at'></i> Email:</strong></p>
                                                                                            <p><?= $value['email_address'];?></p>
                                                                                        </div>
                                                                                        <div class="col-6">
                                                                                            <p class="mt-0 mb-0"><strong><i class='uil uil-phone'></i> Phone Number:</strong></p>
                                                                                            <p><?= $value['contact_number'];?></p>
                                                                                        </div>
                                                                                        <div class="col-12">
                                                                                            <p class="mt-0 mb-0"><strong><i class='uil uil-location'></i> Location:</strong></p>
                                                                                            <p>
                                                                                                <?php
                                                                                                    $full_address = '';
                                                                                                    foreach ($cities as $city) {
                                                                                                        if($city['city_code'] == $value['city_id']){
                                                                                                            $full_address .= $value['addtl_address'].', '.$city['city_name'];
                                                                                                        }
                                                                                                    }
                                                                                                    foreach ($provinces as $province) {
                                                                                                        if($province['province_code'] == $value['province_id']){
                                                                                                            $full_address .= ', '.$province['province_name'];
                                                                                                        }
                                                                                                    }
                                                                                                    foreach ($regions as $region) {
                                                                                                        if($region['region_code'] == $value['region_id']){
                                                                                                            $full_address .= ', '.$region['region_name'];
                                                                                                        }
                                                                                                    }
                                                                                                    echo $full_address;
                                                                                                ?>
                                                                                            </p>
                                                                                        </div>
                                                                                    <?php endif;?>
                                                                                <?php endforeach;?>
                                                                            </div>
                                                                        </div>
                                                                    </div> <!-- end card-body -->
                                                                </div> <!-- end card -->
                                                            </div>
                                                            <!-- end chat area-->
                                                            <div class="col-md-6 d-print-none">
                                                                <div class="card m-0">
                                                                    <div class="card-body p-1 m-1">
                                                                        <ul class="conversation-list p-1" data-simplebar style="max-height: 200px">
                                                                            <div id="getmsg<?=$details['id']?>">
                                                                            </div>
                                                                        </ul>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="mt-0 bg-light p-2 rounded">
                                                                                    <form method="POST" class="needs-validation" novalidate="" name="chat-form"
                                                                                        id="chat-form">
                                                                                        <div class="row">
                                                                                            <div class="col mb-2 mb-sm-0">
                                                                                                <input type="hidden" name="order_id" id="orderId<?=$details['id']?>" value="<?=$details['id']?>">
                                                                                                <input type="text" name="message" id="msg<?=$details['id']?>" class="form-control" placeholder="Enter your message" required=""/>
                                                                                                <span id="msg_err<?=$details['id']?>"></span>
                                                                                                <div class="invalid-feedback">
                                                                                                    Please enter your messsage
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-auto">
                                                                                                <div class="btn-group">
                                                                                                    <div class="d-grid">
                                                                                                        <button type="submit" id="send<?=$details['id']?>" class="btn btn-success chat-send"><i class='uil uil-message'></i></button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div> <!-- end col -->
                                                                                        </div> <!-- end row-->
                                                                                    </form>
                                                                                </div> 
                                                                            </div> <!-- end col-->
                                                                        </div>
                                                                        <!-- end row -->
                                                                    </div> <!-- end card-body -->
                                                                </div> <!-- end card -->
                                                            </div>
                                                        </div>
                                                        <script>
                                                            $(document).ready(function(){
                                                                setInterval(function(){
                                                                    showmsg();
                                                                }, 1000);
                                                                
                                                                showmsg();
                                                                function showmsg(){
                                                                    $.ajax({
                                                                        type: "GET",
                                                                        url: '/delivery/get-message/<?=$details['id']?>',
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
                                                                                hours = hours ? hours : 12; // the hour '0' should be '12'
                                                                                minutes = minutes < 10 ? '0'+minutes : minutes;
                                                                                var strTime = hours + ':' + minutes + ' ' + ampm;
                                                                                if(data[i].user_id == <?=session()->get('id')?>){
                                                                                    odd = 'odd';
                                                                                }else{
                                                                                    odd = '';
                                                                                }
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
                                                                                                data[i].message +
                                                                                            "</p>"+
                                                                                        "</div>"+
                                                                                    "</div>"+
                                                                                "</li>";
                                                                            }
                                                                            $("#getmsg<?=$details['id']?>").html(html);
                                                                        },
                                                                        error: function(err)
                                                                        {
                                                                            console.log(err);
                                                                        }
                                                                    });
                                                                }
                                                                $("#send<?=$details['id']?>").on('click', function(e){
                                                                    e.preventDefault();
                                                                    var msg = $("#msg<?=$details['id']?>").val();
                                                                    var orderId = $("#orderId<?=$details['id']?>").val();
                                                                    $.ajax({
                                                                        type: "POST",
                                                                        url: '/delivery/add-chat',
                                                                        dataType: 'JSON',
                                                                        data: {
                                                                            message: msg,
                                                                            order_id: orderId,
                                                                        },
                                                                        success: function(data){
                                                                            console.log('sent');
                                                                            $("#msg<?=$details['id']?>").val("");
                                                                            $("#orderId<?=$details['id']?>").val("");
                                                                            showmsg();
                                                                        },
                                                                        error: function(err){
                                                                            $("#msg_err<?=$details['id']?>").text(err.responseJSON.messages.message);
                                                                            $("#msg_err<?=$details['id']?>").addClass('text-danger');
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
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                        No order for shipment
                        <?php endif; ?>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div>
        </div>
    </div><!-- end col-->
</div>
<!-- end row-->
