<?php header("Refresh: 10"); ?>
<?php if (!empty($getOrderDetails)): ?>
    <div class="card mb-2 p-0">
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
                            <?php if ($details['order_status_id'] == 4): ?>
                                <?php foreach ($getCartTotalPrice as $totalPrice) : ?>
                                    <?php if($totalPrice['order_id'] == $details['id']):?>
                                        <button onclick="applyPayment('/orders/admin/add-payment/u/',<?=$details['id']?>,'/<?=$totalPrice['total_price']?>')" class="btn btn-sm btn-outline-dark d-flex" type="button" <?= (empty($details['total_amount']))? '':'disabled' ?>>
                                            <?= (empty($details['total_amount']))? '<i class="dripicons-plus"></i>Add&nbspPayment':'Already&nbspPaid&nbsp<i class=" dripicons-checkmark text-success"></i>' ?>
                                        </button>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <a class="btn btn-sm btn-info"><i class="dripicons-print"></i>&nbspInvoice</a>
                                <a onclick="confirmPlaceOrder('/orders/place-order/',<?=$details['id']?>,'/5')" title="Serve Food" animation="true" class="btn btn-sm btn-success d-flex">
                                Done&nbsp <i class="dripicons-arrow-thin-right"></i> 
                                </a>
                            <?php endif; ?>
                        </h5>
                    </div>

                    <div id="collapseFour<?=$details['id']?>" class="collapse show p-0 m-0"
                        aria-labelledby="headingFour<?=$details['id']?>"
                        data-bs-parent="#custom-accordion-one<?=$details['id']?>">
                        <div class="card-body  p-0 m-0">
                        
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($getCarts as $carts) : ?>
                                        <?php if($carts['order_id'] == $details['id']):?>
                                            <tr>
                                                <td>
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
                                                    <center><?= $carts['quantity']; ?>X</center>
                                                </td>
                                                <td>
                                                    <center>₱ <?= number_format($carts['subTotal']);?></center>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <?php foreach ($getCartTotalPrice as $totalPrice) : ?>
                                        <?php if($totalPrice['order_id'] == $details['id']):?>
                                            <tr>
                                                <th scope="col" colspan="4">
                                                    <p class="float-end"><b>Total Price:</b></p>
                                                </th>
                                                <td scope="col">
                                                    <center> ₱ <?= number_format($totalPrice['total_price']);?></center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col" colspan="4">
                                                    <p class="float-end"><b>Cash:</b></p>
                                                </th>
                                                <td scope="col">
                                                    <center> ₱ <?= number_format($totalPrice['c_cash']);?></center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col" colspan="4">
                                                    <p class="float-end"><b>Change:</b></p>
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
