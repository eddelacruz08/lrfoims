<div class="container">
    <div class="content">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Cart</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Cart</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

        <?php if (!empty($getCustomerOrderDetails)):?>
            <?php if ($getCustomerCartDetails !== null):?>
                <?php foreach ($getCustomerOrderDetails as $details):?>
                    <?php if (session()->get('getCustomerCountCarts') != 0):?>
                        <?php if ($details['order_type'] == 0):?>   
                        <?php elseif ($details['order_type'] == 3):?>   
                            <?php if ($details['order_status_id'] != 1):?>   
                                <div class="row justify-content-center">
                                    <div class="col-lg-7 col-md-10 col-sm-11">
                                        <div class="horizontal-steps mt-0 mb-2 pb-4" id="tooltip-container">
                                            <div class="horizontal-steps-content">
                                                <div class="step-item <?=$details['order_status_id'] == 2 ? 'current':''?>">
                                                    <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom">Order Placed</span>
                                                </div>
                                                <div class="step-item <?=$details['order_status_id'] == 3 ? 'current':''?>">
                                                    <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom">Preparing</span>
                                                </div>
                                                <div class="step-item <?=$details['order_status_id'] == 4 ? 'current':''?>">
                                                    <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom">Shipping</span>
                                                </div>
                                                <div class="step-item <?=$details['order_status_id'] == 5 ? 'current':''?>">
                                                    <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom">Delivered</span>
                                                </div>
                                            </div>
                                            <?php if ($details['order_status_id'] == 2):?>   
                                                <div class="process-line" style="width: 0%;"></div>
                                            <?php elseif ($details['order_status_id'] == 3):?>  
                                                <div class="process-line" style="width: 33%;"></div>
                                            <?php elseif ($details['order_status_id'] == 4):?>  
                                                <div class="process-line" style="width: 66%;"></div>
                                            <?php elseif ($details['order_status_id'] == 5):?>  
                                                <div class="process-line" style="width: 99%;"></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->  
                            <?php endif; ?>
                        <?php else: ?>   
                            <div class="row justify-content-center">
                                <div class="col-lg-7 col-md-10 col-sm-11">
                                    <div class="horizontal-steps mt-0 mb-2 pb-4" id="tooltip-container">
                                        <div class="horizontal-steps-content">
                                            <div class="step-item <?=$details['order_status_id'] == 2 ? 'current':''?>">
                                                <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom">Order Placed</span>
                                            </div>
                                            <div class="step-item <?=$details['order_status_id'] == 3 ? 'current':''?>">
                                                <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom">Preparing</span>
                                            </div>
                                            <div class="step-item <?=$details['order_status_id'] == 4 ? 'current':''?>">
                                                <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom">Serving</span>
                                            </div>
                                            <div class="step-item <?=$details['order_status_id'] == 5 ? 'current':''?>">
                                                <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom">Served</span>
                                            </div>
                                        </div>
                                        <?php if ($details['order_status_id'] == 2):?>   
                                            <div class="process-line" style="width: 0%;"></div>
                                        <?php elseif ($details['order_status_id'] == 3):?>  
                                            <div class="process-line" style="width: 33%;"></div>
                                        <?php elseif ($details['order_status_id'] == 4):?>  
                                            <div class="process-line" style="width: 66%;"></div>
                                        <?php elseif ($details['order_status_id'] == 5):?>  
                                            <div class="process-line" style="width: 99%;"></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- end row --> 
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="table-responsive">
                                                    <span class="badge badge-outline-danger rounded-pill m-1 h3">*Limit of <?=$orderMaxLimit['max_limit']?> orders only.</span>
                                                    <table class="table table-borderless table-centered mb-0">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th class="text-center">Product</th>
                                                                <th class="text-center">Category</th>
                                                                <th class="text-center">Price</th>
                                                                <th class="text-center">Quantity</th>
                                                                <th class="text-center">SubTotal</th>
                                                                <?php if ($details['order_status_id'] != 1):?>
                                                                <?php else: ?>
                                                                    <th style="width: 50px;" class="text-center">Action</th>
                                                                <?php endif; ?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($getCustomerCartDetails as $row):?>
                                                                <?php if ($details['id'] == $row['order_id']):?>
                                                                    <tr>
                                                                        <td>
                                                                            <img src="<?= '/assets/uploads/menu/'.$row['image'] ?>" alt="contact-img"
                                                                                title="contact-img" class="rounded me-3" height="64" />
                                                                            <p class="m-0 d-inline-block align-middle font-16">
                                                                                <a href="javascript:void(0);"
                                                                                    class="text-body"><?=$row['menu'] ?></a>
                                                                                <br>
                                                                            </p>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <?=$row['name'] ?>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            ₱ <?= number_format($row['price']); ?>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <?php if(user_link('cart/u', session()->get('userPermissionView'))):?>
                                                                                <?php if ($details['order_status_id'] != 1):?>
                                                                                    <?=$row['quantity'] ?>
                                                                                <?php else: ?>
                                                                                    <form method="POST" action="/cart/qty/<?= $row['id']; ?>" enctype="multipart/form-data">
                                                                                        <div class="input-group">
                                                                                            <input type="number" name="quantity" value="<?=$row['quantity'] ?>" min="1" max="10" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');" 
                                                                                                value="1" class="form-control <?= isset($errors['quantity']) ? 'is-invalid':'' ?>" placeholder="Quantity" aria-label="Quantity" aria-describedby="button-addon2" required>
                                                                                            <button class="btn btn-sm btn-outline-secondary m-0 p-1" animation="true" type="submit" id="button-addon2" title="Change Quantity">Change</button>
                                                                                        </div>
                                                                                    </form> 
                                                                                <?php endif; ?>   
                                                                            <?php else: ?>
                                                                                <?=$row['quantity'] ?>
                                                                            <?php endif; ?> 
                                                                        </td>
                                                                        <td class="text-center">
                                                                            ₱ <?= number_format($row['sub_total_price']); ?>
                                                                        </td>
                                                                        <?php if ($details['order_status_id'] != 1):?>
                                                                        <?php else: ?>
                                                                            <td class="text-center">
                                                                                <?php if(user_link('cart/d', session()->get('userPermissionView'))):?>
                                                                                    <a onclick="confirmDelete('/cart/d/',<?=$row['id']?>)" data-toggle="tooltip" data-placement="bottom" title="Remove Order" animation="true"  class="btn action-icon text-danger">
                                                                                        <i class="mdi mdi-delete"></i>
                                                                                    </a>    
                                                                                <?php else: ?>
                                                                                    -
                                                                                <?php endif; ?> 
                                                                            </td>
                                                                        <?php endif; ?>
                                                                    </tr>         
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div> <!-- end table-responsive-->
                                            </div>
                                            <!-- end col -->

                                            <div class="col-lg-4">
                                                <form action="/place-order/u/<?=$details['id']?>/2" method="post">
                                                    <div class="border p-3 mt-4 mt-lg-0 rounded">
                                                        <h4 class="header-title mb-3">Order Summary</h4>
                                                        <div class="table-responsive">
                                                            <table class="table mb-0">
                                                                <tbody>
                                                                    <?php foreach ($getCartTotalPrice as $totalPrice) : ?>
                                                                        <?php if($totalPrice['order_id'] == $details['id']):?>
                                                                            <tr>
                                                                                <td>Order Number:</td>
                                                                                <td>#<?=$details['number'] ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Order Total :</th>
                                                                                <th>₱ <?= number_format($totalPrice['total_price']); ?></th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th colspan="2">
                                                                                    <?php if ($details['order_status_id'] != 1):?>
                                                                                        <label class="form-label">Order Type: </label>
                                                                                        <?php foreach ($orderType as $type) : ?>
                                                                                            <?php if ($type['id'] == $details['order_type']):?>
                                                                                                <input type="text" class="form-control" value="<?=ucfirst($type['type'])?>" disabled>
                                                                                            <?php endif;?>
                                                                                        <?php endforeach; ?>
                                                                                    <?php else: ?>
                                                                                        <label for="example-select" class="form-label">Select Order Type: </label>
                                                                                        <select class="form-select form-select-sm <?= isset($errors['order_type']) ? 'is-invalid':'is-valid' ?>" id="example-select" name="order_type">
                                                                                            <option selected disabled>-- Select Order Type --</option>
                                                                                            <option value="1">Dine-in</option>
                                                                                            <option value="2">Take Out</option>
                                                                                            <option value="3">Deliver</option>
                                                                                        </select>
                                                                                        <?php if(isset($errors['order_type'])):?>
                                                                                            <small class="text-danger"><?=esc($errors['order_type'])?></small>
                                                                                        <?php endif;?>
                                                                                    <?php endif;?>
                                                                                </th>
                                                                            </tr>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- end table-responsive -->
                                                    </div>

                                                    <?php if ($details['order_status_id'] != 1):?>
                                                        <?php if ($details['order_type'] == 3):?>
                                                            <div class="card p-0 mt-3">
                                                                <div class="card-body p-1 m-1 border-success">
                                                                    <ul class="conversation-list p-1" data-simplebar style="max-height: 200px">
                                                                        <div id="getBotmsg"></div>
                                                                        <div id="getmsg<?=$details['id']?>"></div>
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
                                                                        url: '/cart/get-message/<?=$details['id']?>',
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
                                                                                    "<img src='/assets/img/user.jpg' class='rounded-circle' alt='LAMON Restaurant' />"+
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
                                                                            $("#getmsg<?=$details['id']?>").html(html);
                                                                        }
                                                                    });
                                                                }
                                                                $("#send<?=$details['id']?>").on('click', function(e){
                                                                    e.preventDefault();
                                                                    var msg = $("#msg<?=$details['id']?>").val();
                                                                    var orderId = $("#orderId<?=$details['id']?>").val();
                                                                    $.ajax({
                                                                        type: "POST",
                                                                        url: '/cart/add-chat',
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
                                                    <?php else: ?>
                                                        <!-- action buttons-->
                                                        <div class="row mt-4">
                                                            <div class="col-sm-6">
                                                                <?php if(user_link('menu', session()->get('userPermissionView'))):?>
                                                                    <a href="/menu" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                                                        <i class="mdi mdi-arrow-left"></i> Continue Shopping </a>
                                                                <?php endif; ?>
                                                            </div> <!-- end col -->
                                                            <div class="col-sm-6">
                                                                <div class="text-sm-end">
                                                                    <?php if(user_link('orders/place-order/u', session()->get('userPermissionView'))):?>
                                                                        <button title="Place Order" type="submit" class="btn btn-sm btn-danger"><i class="mdi mdi-cart-plus me-1"></i> Place Order</button>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row-->
                                                    <?php endif;?>

                                                </form>

                                            </div> <!-- end col -->

                                        </div> <!-- end row -->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                    <?php endif; ?>
                <?php endforeach; ?>    
            <?php endif; ?>
        <?php else: ?>
            <h4 class="text-center text-dark">No Order</h4>
        <?php endif; ?>

    </div> <!-- End Content -->
</div> <!-- End Content -->