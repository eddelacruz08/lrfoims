<?php header("Refresh: 10"); ?>
<?php if (!empty($getOrderDetails)): ?>
    <div class="card mb-2 p-0">
        <?php foreach ($getOrderDetails as $details): ?>
            <div class="accordion" id="accordionExample<?= $details['number'] ?>">
                <div class="card">
                    <div class="card p-0" id="headingOne">
                        <h2 class="mb-0 d-flex">
                            <button class="btn btn-dark btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne<?= $details['number'] ?>" aria-expanded="true" aria-controls="collapseOne">
                                    Order#<?= $details['number'] ?>
                                <span class="badge badge-spill badge-warning"><?= ucfirst($details['order_status']); ?></span>
                            </button>
                            <button class="btn btn-sm btn-default d-flex ml-1 p-2" data-toggle="modal" data-target="#addPaymentServeOrdersModal<?=$details['id']?>" type="button" <?= (empty($details['total_amount']))? '':'disabled' ?>>
                                <?= (empty($details['total_amount']))? '<i class="fas fa-plus-circle mt-1 mr-1"></i>Add&nbspPayment':'Already&nbspPaid&nbsp<i class="fas fa-check text-success mt-1 mr-1"></i>' ?>
                            </button>
                            <a class="btn btn-sm btn-primary d-flex ml-1 p-2"><i class="fas fa-file-invoice mt-1"></i>&nbspInvoice</a>
                            <a onclick="confirmPlaceOrder('/orders/place-order/',<?=$details['id']?>,'/4')" title="Serve Food" animation="true" class="btn btn-sm btn-success d-flex ml-1 p-2">
                                Served&nbsp&&nbspSubmit&nbspfor&nbsppayments <i class="fas fa-arrow-right mt-1 ml-1"></i> </a>
                        </h2>
                    </div>
                    <div id="collapseOne<?= $details['number'] ?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample<?= $details['number'] ?>">
                        <div class="card-body p-0">
                        
                            <!-- <?php if ($details['order_status_id'] == 3): ?> -->
                                <!-- Add Payment Modal -->
                                <div class="modal fade" id="addPaymentServeOrdersModal<?=$details['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Payment For Order#<?= $details['number'] ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body pt-1">
                                                <form method="POST" enctype="multipart/form-data">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputAddress2">Customer Cash <small class="text-danger">*</small></label>
                                                            <input type="number" id="serve_payment_customer_cash" name="c_cash" min="0" placeholder="Cash" class="form-control  <?= isset($errors['c_cash']) ? 'is-invalid':'is-valid' ?>">
                                                            <input type="hidden" id="serve_payment_modal_id" value="<?=$details['id']?>">
                                                            <?php foreach ($getCartTotalPrice as $totalPrice) : ?>
                                                                    <?php if($totalPrice['order_id'] == $details['id']):?>
                                                                        <input type="hidden" id="serve_payment_total_amount" name="total_amount" value="<?=$totalPrice['total_price']?>">
                                                                    <?php endif; ?>
                                                            <?php endforeach; ?>
                                                            <?php if(isset($errors['c_cash'])):?>
                                                                <small class="text-danger"><?=esc($errors['c_cash'])?></small>
                                                            <?php endif;?>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a onclick="applyPaymentServeOrders('/orders/admin/add-payment/u/<?=$details['id']?>')" class="btn btn-success float-right">
                                                        <i class="fas fa-check"></i> Apply Payment
                                                    </a>
                                                </form>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Add Payment Modal -->
                            <?php endif; ?>

                        <div class="table-responsive-sm">
                            <table class="table table-hover responsive table-sm mb-0 pb-0" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col">
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
                                        <?php if ($details['order_status_id'] == 1): ?>
                                            <th scope="col" width="15%">
                                                <center>Action</center>
                                            </th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($getCarts as $carts) : ?>
                                        <?php if($carts['order_id'] == $details['id']):?>
                                            <tr>
                                                <td>
                                                    <center>
                                                        <img src="<?= '/assets/uploads/menu/'.$carts['image'] ?>" width="80px" class="img-fluid rounded-start" alt="...">
                                                    </center>
                                                </td>
                                                <td>
                                                    <center><?= ucfirst($carts['menu']); ?></center>
                                                </td>
                                                <td>
                                                    <center>₱ <?= number_format($carts['price']); ?></center>
                                                </td>
                                                <?php if ($details['order_status_id'] == 1): ?>
                                                    <td>
                                                        <form method="POST" action="/orders/qty/<?= $carts['id']; ?>" enctype="multipart/form-data">
                                                            <div class="input-group mb-3">
                                                                <input type="number" name="quantity" value="<?= $carts['quantity'] ?>" class="form-control" placeholder="Quantity" aria-label="Quantity" aria-describedby="button-addon2">
                                                                <button class="btn btn-sm btn-outline-secondary" animation="true" type="submit" id="button-addon2" title="Change Quantity"><i class="fas fa-plus-circle"></i>Change</button>
                                                            </div>
                                                        </form>  
                                                    </td>
                                                <?php else: ?>
                                                    <td>
                                                        <center>x<?= $carts['quantity']; ?></center>
                                                    </td>
                                                <?php endif; ?>
                                                <td>
                                                    <center>₱ <?= number_format($carts['subTotal']);?></center>
                                                </td>
                                                <?php if ($details['order_status_id'] == 1): ?>
                                                    <td align="center">
                                                        <a onclick="confirmDelete('/orders/d/cart/',<?=$carts['id']?>)" data-toggle="tooltip" data-placement="bottom" title="Remove Order" animation="true" class="btn mt-1 btn-sm btn-danger txt-sm"><i class="fas fa-minus-circle"></i></a>
                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <?php foreach ($getCartTotalPrice as $totalPrice) : ?>
                                        <?php if($totalPrice['order_id'] == $details['id']):?>
                                            <tr>
                                                <th scope="col" colspan="4">
                                                    <p class="h6 float-right"><b>Total Price:</b></p>
                                                </th>
                                                <td scope="col">
                                                    <center> ₱ <?= number_format($totalPrice['total_price']);?></center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col" colspan="4">
                                                    <p class="h6 float-right"><b>Cash:</b></p>
                                                </th>
                                                <td scope="col">
                                                    <center> ₱ <?= number_format($totalPrice['c_cash']);?></center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col" colspan="4">
                                                    <p class="h6 float-right"><b>Change:</b></p>
                                                </th>
                                                <td scope="col">
                                                    <center> ₱ <?= number_format($totalPrice['c_balance']);?></center>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    <?php endforeach; ?>
</div>
<?php else: ?>
  No Orders
<?php endif; ?>
