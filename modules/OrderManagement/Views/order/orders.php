<?php header("Refresh: 10"); ?> 
<?php if (!empty($getOrderDetails)): ?>
    <div class="card p-0">
        <?php foreach ($getOrderDetails as $details): ?>
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
                            <?php if ($details['order_status_id'] == 2): ?>
                                <?php if(user_link('orders/a', session()->get('userPermissionView'))):?> 
                                    <?php if (empty($details['total_amount'])): ?>
                                        <a class="btn btn-primary btn-sm d-print-none" data-bs-toggle="modal" data-bs-target="#addCartModal<?=$details['id']?>" type="button">
                                            <i class="dripicons-plus"></i> Add&nbspfood
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if(user_link('orders/d', session()->get('userPermissionView'))):?>
                                    <button onclick="confirmDelete('/orders/d/',<?=$details['id']?>)" type="button" title="Cancel Order" animation="true" class="btn btn-sm btn-danger d-print-none">
                                        <i class="dripicons-trash"></i> Remove
                                    </button>
                                <?php endif; ?>
                                <?php if(user_link('orders/print-order-invoice', session()->get('userPermissionView'))):?>
                                    <a onclick="printOrders('<?= $details['id'] ?><?= $details['number'] ?>')" class="btn btn-sm btn-info d-print-none"><i class="dripicons-print"></i>&nbspInvoice</a>
                                <?php endif; ?>
                                <?php if(user_link('orders/place-order/u', session()->get('userPermissionView'))):?>
                                    <a onclick="confirmPlaceOrder('/orders/place-order/u/',<?=$details['id']?>,'/3')" title="Serve Food" animation="true" class="btn btn-sm btn-success d-flex d-print-none">
                                        Serve&nbspFood <i class="dripicons-arrow-thin-right"></i> 
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </h5>
                    </div>
                        
                    <div id="collapseFour<?=$details['id']?>" class="collapse show p-0 m-0"
                        aria-labelledby="headingFour<?=$details['id']?>"
                        data-bs-parent="#custom-accordion-one<?=$details['id']?>">
                        <div class="card-body  p-0 m-0">
                            <!-- Add Cart Modal -->
                            <div class="modal fade" id="addCartModal<?=$details['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Add Food For Order#<?= $details['number'] ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body pt-2">
                                            <form class="needs-validation" action="/orders/a" method="post" novalidate>
                                                <input type="hidden" name="order_id" value="<?= $details['id'] ?>">
                                                <div class="form-row mb-2 mt-2">
                                                    <div class="form-group col-md-12">
                                                        <label for="menu_id">Menu List <small class="text-danger">*</small></label>
                                                        <select class="form-control select2" data-toggle="select2" id="menu_id" required name="menu_id">
                                                            <option disabled value="" <?= isset($validation) ? null : 'selected' ?>>-- Select Food --</option>
                                                            <?php foreach ($menuCategory as $category) : ?>
                                                                <optgroup label="<?= $category['name'] ?>">
                                                                    <?php foreach ($menuLists as $option) : ?>
                                                                        <?php if ($option['menu_category_id'] == $category['id']) : ?>
                                                                            <?php if ($option['menu_status'] == 'a') : ?>
                                                                                <?php $selected = false; ?>
                                                                                <?php if(isset($value['menu_id'])):?>
                                                                                    <?php if($value['menu_id'] == $option['id']): ?>
                                                                                        <?php $selected = true; ?>
                                                                                    <?php endif; ?>
                                                                                <?php endif;?>
                                                                                <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= $option['menu'] ?></option>
                                                                            <?php else:?>
                                                                                <option disabled class="text-danger"><s><?= $option['menu'] ?> (unavailable)</s></option>
                                                                            <?php endif;?>
                                                                        <?php endif;?>
                                                                    <?php endforeach; ?>
                                                                </optgroup>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please select an order.
                                                        </div>
                                                    </div>
                                                </div>  
                                                <div class="form-row mb-2">
                                                    <div class="form-group col-md-12">
                                                        <label for="quantity">Quantity <small class="text-danger">*(Limit of <?=$orderMaxLimit['max_limit']?> orders only.)</small></label>
                                                        <input type="number" id="quantity" min="1" max="10" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');" name="quantity" placeholder="Quantity" required class="form-control">
                                                        <div class="invalid-feedback">
                                                            Please input quantity.
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-success float-end" id="addToOrder">Add To Order</button>
                                            </form>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Add Cart Modal -->
                            <script>
                                // Example starter JavaScript for disabling form submissions if there are invalid fields
                                (function () {
                                'use strict'
                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                var forms = document.querySelectorAll('.needs-validation')
                                // Loop over them and prevent submission
                                Array.prototype.slice.call(forms)
                                    .forEach(function (form) {
                                        form.addEventListener('submit', function (event) {
                                            if (!form.checkValidity()) {
                                            event.preventDefault()
                                            event.stopPropagation()
                                            }
                                            form.classList.add('was-validated')
                                        }, false)
                                    })
                                })()
                            </script>

                            <div class="table-responsive-sm p-0 m-0" id="<?= $details['id'] ?><?= $details['number'] ?>">
                                <table class="table-responsive table table-sm table-centered m-0 p-0" width="100%">
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
                                            <?php if (empty($details['total_amount'])): ?>
                                                <th scope="col" class="d-print-none">
                                                    <center>Action</center>
                                                </th>
                                            <?php endif; ?>
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
                                                        <?php if (empty($details['total_amount'])): ?>
                                                            <td class="d-print-none" style="max-width: 80%;">
                                                                <center>
                                                                    <div class="row">
                                                                        <div class="col-sm-10">
                                                                            <?php if(user_link('orders/admin/cart/qty', session()->get('userPermissionView'))):?>
                                                                                <form method="POST" action="/orders/admin/cart/qty/<?= $carts['id']; ?>/<?=$carts['menu_id']?>/<?=$carts['order_id']?>/<?=$carts['quantity']?>/2" enctype="multipart/form-data">
                                                                                    <div class="input-group" style="max-width: 70%;">
                                                                                        <input type="number" name="quantity" min="1" max="10" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');" value="<?= $carts['quantity'] ?>" class="form-control" placeholder="Quantity" aria-label="Quantity" aria-describedby="button-addon2" required>
                                                                                        <button class="btn btn-sm btn-outline-secondary" animation="true" type="submit" id="button-addon2" title="Change Quantity">Edit Qty</button>
                                                                                    </div>
                                                                                </form>
                                                                            <?php else: ?>
                                                                                -
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <?php if(user_link('orders/cart/d', session()->get('userPermissionView'))):?>
                                                                                <a onclick="confirmDeleteCart('/orders/cart/d/',<?=$carts['id']?>,<?=$carts['menu_id']?>,<?=$carts['order_id']?>,<?=$carts['quantity']?>)" title="Remove Order" class="btn btn-sm btn-default rounded-pill txt-lg">
                                                                                    <i class="dripicons-trash"></i>
                                                                                </a>
                                                                            <?php else: ?>
                                                                                -
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                </center>
                                                            </td>
                                                        <?php endif; ?>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            No Data
                                        <?php endif; ?>
                                        <?php if ($details['order_status_id'] == 2): ?>
                                            <?php foreach ($getCartTotalPrice as $totalPrice) : ?>
                                                <?php if($totalPrice['order_id'] == $details['id']):?>
                                                    <tr class="table-active mb-0">
                                                        <td scope="col" class="p-0">
                                                            <center>
                                                                <span class="badge badge-outline-success m-0"><?= ucwords($details['type']); ?></span>
                                                            </center>
                                                        </td>
                                                        <td scope="col" class="p-0">
                                                            <center>
                                                                <span class="badge badge-outline-secondary m-0"><b>#<?= $details['number'] ?>&nbsp|&nbsp<?= (empty($details['total_amount']))? '<span class="badge bg-danger">Not Paid<span>':'<span class="badge bg-success">Paid<span>' ?></b></span>
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
                                                        <?php if (empty($details['total_amount'])): ?>
                                                            <td scope="col" class="d-print-none">
                                                            </td>
                                                        <?php endif; ?>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                        </tbody>
                                </table>
                            </div>
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
