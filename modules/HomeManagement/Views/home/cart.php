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

        <?php if (!empty($getCustomerOrderDetails)):?>
            <?php if ($getCustomerCartDetails !== null):?>
                <?php foreach ($getCustomerOrderDetails as $details):?>
                    <?php if (session()->get('getCustomerCountCarts') != 0):?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless table-centered mb-0 text-center">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Product</th>
                                                                <th>Category</th>
                                                                <th>Price</th>
                                                                <th>Quantity</th>
                                                                <th>SubTotal</th>
                                                                <th style="width: 50px;">Action</th>
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
                                                                        <td>
                                                                            <?=$row['name'] ?>
                                                                        </td>
                                                                        <td>
                                                                            ₱ <?= number_format($row['price']); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if(user_link('cart/u', session()->get('userPermissionView'))):?>
                                                                                <form method="POST" action="/cart/qty/<?= $row['id']; ?>" enctype="multipart/form-data">
                                                                                    <div class="input-group">
                                                                                        <input type="number" name="quantity" value="<?=$row['quantity'] ?>" min="1" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');" 
                                                                                            value="1" class="form-control <?= isset($errors['quantity']) ? 'is-invalid':'' ?>" placeholder="Quantity" aria-label="Quantity" aria-describedby="button-addon2">
                                                                                        <button class="btn btn-sm btn-outline-secondary m-0 p-1" animation="true" type="submit" id="button-addon2" title="Change Quantity">Change</button>
                                                                                    </div>
                                                                                </form>    
                                                                            <?php else: ?>
                                                                                <?=$row['quantity'] ?>
                                                                            <?php endif; ?> 
                                                                        </td>
                                                                        <td>
                                                                            ₱ <?= number_format($row['sub_total_price']); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if(user_link('cart/d', session()->get('userPermissionView'))):?>
                                                                                <a onclick="confirmDelete('/cart/d/',<?=$row['id']?>)" data-toggle="tooltip" data-placement="bottom" title="Remove Order" animation="true"  class="btn action-icon text-danger">
                                                                                    <i class="mdi mdi-delete"></i>
                                                                                </a>    
                                                                            <?php else: ?>
                                                                                -
                                                                            <?php endif; ?> 
                                                                        </td>  
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
                                                                                    <label for="example-select" class="form-label">Select Order Type: </label>
                                                                                    <select class="form-select form-select-sm <?= isset($errors['order_type']) ? 'is-invalid':'is-valid' ?>" id="example-select" name="order_type">
                                                                                        <option selected disabled>-- Select Order Type --</option>
                                                                                        <option value="1">Dinning</option>
                                                                                        <option value="2">Take Out</option>
                                                                                        <option value="3">Deliver</option>
                                                                                    </select>
                                                                                    <?php if(isset($errors['order_type'])):?>
                                                                                        <small class="text-danger"><?=esc($errors['order_type'])?></small>
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