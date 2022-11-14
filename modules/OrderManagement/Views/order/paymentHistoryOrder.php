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
                                    <span class="badge badge-dark">
                                        <?= date('Y-m-d H:i:s', strtotime($details['updated_at']));?>
                                    </span> 
                                </p>
                            </a>
                            <?php if ($details['order_status_id'] == 5): ?>
                                <?php if(user_link('orders/print-order-invoice', session()->get('userPermissionView'))):?>
                                    <a onclick="printOrders('<?= $details['id'] ?><?= $details['number'] ?>')" class="btn btn-sm btn-info d-print-none"><i class="dripicons-print"></i>&nbspInvoice</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </h5>
                    </div>

                    <div id="collapseFour<?=$details['id']?>" class="collapse hide p-0 m-0"
                        aria-labelledby="headingFour<?=$details['id']?>"
                        data-bs-parent="#custom-accordion-one<?=$details['id']?>">
                        <div class="card-body  p-0 m-0">
                        
                        <div class="table-responsive-sm" id="<?= $details['id'] ?><?= $details['number'] ?>">
                            <table class="table-responsive table table-sm m-0 p-0" width="100%">
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
                                    <?php foreach ($getCarts as $carts) : ?>
                                        <?php if($carts['order_id'] == $details['id']):?>
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
                                                    <center><?= $carts['quantity']; ?>X</center>
                                                </td>
                                                <td class="table-active">
                                                    <center>₱ <?= number_format($carts['subTotal']);?></center>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <?php if ($details['order_status_id'] == 5): ?>
                                        <?php foreach ($getCartTotalPrice as $totalPrice) : ?>
                                            <?php if($totalPrice['order_id'] == $details['id']):?>
                                                <tr class="table-active mb-0">
                                                    <td scope="col" class="pb-0">
                                                        <center>
                                                            <span class="badge badge-outline-success m-0"><?= ucwords($details['type']); ?></span>
                                                        </center>
                                                    </td>
                                                    <td scope="col" class="pb-0">
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
        <?php endforeach; ?>
    </div>
<?php else: ?>
  No Orders
<?php endif; ?>
