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
                                <?php if (empty($details['total_amount'])): ?>
                                    <button class="btn btn-primary btn-sm d-print-none" data-bs-toggle="modal" data-bs-target="#addCartModal<?=$details['id']?>" type="button">
                                        <i class="dripicons-plus"></i> Add&nbspfood
                                    </button>
                                <?php endif; ?>
                                <a onclick="confirmDelete('/orders/d/',<?=$details['id']?>)" type="button" title="Cancel Order" animation="true" class="btn btn-sm btn-danger d-print-none">
                                    <i class="dripicons-trash"></i> Remove
                                </a>
                                <?php foreach ($getCartTotalPrice as $totalPrice) : ?>
                                    <?php if($totalPrice['order_id'] == $details['id']):?>
                                        <button onclick="applyPayment('/orders/admin/add-payment/u/',<?=$details['id']?>,'/<?=$totalPrice['total_price']?>')" class="btn btn-sm btn-outline-dark d-flex d-print-none" type="button" <?= (empty($details['total_amount']))? '':'disabled' ?>>
                                            <?= (empty($details['total_amount']))? '<i class="dripicons-plus"></i>Add&nbspPayment':'Already&nbspPaid&nbsp<i class=" dripicons-checkmark text-success"></i>' ?>
                                        </button>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <a onclick="printOrders('<?= $details['id'] ?><?= $details['number'] ?>')" class="btn btn-sm btn-info d-print-none"><i class="dripicons-print"></i>&nbspInvoice</a>
                                <a onclick="confirmPlaceOrder('/orders/place-order/',<?=$details['id']?>,'/3')" title="Serve Food" animation="true" class="btn btn-sm btn-success d-flex d-print-none">
                                    Serve&nbspFood <i class="dripicons-arrow-thin-right"></i> 
                                </a>
                            <?php endif; ?>
                        </h5>
                    </div>
                        
                    <div id="collapseFour<?=$details['id']?>" class="collapse show p-0 m-0"
                        aria-labelledby="headingFour<?=$details['id']?>"
                        data-bs-parent="#custom-accordion-one<?=$details['id']?>">
                        <div class="card-body  p-0 m-0">
                            <?php if ($details['order_status_id'] == 2): ?>
                                <!-- Add Cart Modal -->
                                <div class="modal fade" id="addCartModal<?=$details['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Add Food For Order#<?= $details['number'] ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="/orders/a" enctype="multipart/form-data">
                                                    <input type="hidden" name="order_id" value="<?= $details['id'] ?>">
                                                    <div class="form-row mb-2">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputAddress2">Menu List <small class="text-danger">*</small></label>
                                                            <select class="form-control custom-select  <?= isset($errors['menu_id']) ? 'is-invalid':'is-valid' ?>" name="menu_id">
                                                                <option value="" <?= isset($validation) ? null : 'selected' ?>>-- select --</option>
                                                                <?php foreach ($menuLists as $option) : ?>
                                                                    <?php $selected = false; ?>
                                                                    <?php if(isset($value['menu_id'])):?>
                                                                        <?php if($value['menu_id'] == $option['id']): ?>
                                                                            <?php $selected = true; ?>
                                                                        <?php endif; ?>
                                                                    <?php endif;?>
                                                                    <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= $option['menu'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <?php if(isset($errors['menu_id'])):?>
                                                                <small class="text-danger"><?=esc($errors['menu_id'])?></small>
                                                            <?php endif;?>
                                                        </div>
                                                    </div>  
                                                    <div class="form-row mb-2">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputAddress2">Quantity <small class="text-danger">*</small></label>
                                                            <input type="number" name="quantity" min="1" value="1" placeholder="Quantity" class="form-control  <?= isset($errors['quantity']) ? 'is-invalid':'is-valid' ?>">
                                                            <?php if(isset($errors['quantity'])):?>
                                                                <small class="text-danger"><?=esc($errors['quantity'])?></small>
                                                            <?php endif;?>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-success float-end">Add To Order</button>
                                                </form>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Add Cart Modal -->
                            <?php endif; ?>

                            <div class="table-responsive-sm p-0 m-0" id="<?= $details['id'] ?><?= $details['number'] ?>">
                                <table class="table responsive table-sm mb-0 pb-0 table-borderless" width="100%">
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
                                                                <img src="<?= '/assets/uploads/menu/'.$carts['image'] ?>" width="80" height="80" class="img-fluid rounded-start" alt="...">
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
                                                        <td>
                                                            <center>₱ <?= number_format($carts['subTotal']);?></center>
                                                        </td>
                                                        <?php if (empty($details['total_amount'])): ?>
                                                            <td align="center" class="d-print-none">
                                                                <a onclick="confirmDelete('/orders/cart/d/',<?=$carts['id']?>)" title="Remove Order" class="btn btn-sm btn-default rounded-pill txt-lg">
                                                                    <i class="dripicons-trash"></i>
                                                                </a>
                                                            </td>
                                                        <?php endif; ?>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            No Data
                                        <?php endif; ?>
                                    </tbody>
                                    <tfoot>
                                        <?php if ($details['order_status_id'] == 2): ?>
                                            <?php foreach ($getCartTotalPrice as $totalPrice) : ?>
                                                    <?php if($totalPrice['order_id'] == $details['id']):?>
                                                        <tr>
                                                            <td scope="col" class="d-print-none">
                                                            </td>
                                                            <td scope="col">
                                                                <center>
                                                                    <p><b>Order#<?= $details['number'] ?>&nbsp | &nbsp<?= (empty($details['total_amount']))? 'Not Paid':'Paid' ?></b></p>
                                                                </center>
                                                            </td>
                                                            <td scope="col">
                                                                <center>
                                                                    <p><b>Change:</b>&nbsp ₱ <?= number_format($totalPrice['c_balance']);?></p>
                                                                </center>
                                                            </td>
                                                            <td scope="col">
                                                                <center>
                                                                    <p><b>Cash:</b>&nbsp ₱ <?= number_format($totalPrice['c_cash']);?></p>
                                                                </center>
                                                            </td>
                                                            <td scope="col">
                                                                <center>
                                                                    <p><b>Order Total:</b>&nbsp ₱ <?= number_format($totalPrice['total_price']);?></p>
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
                                        <?php endif; ?>
                                    </tfoot>
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
