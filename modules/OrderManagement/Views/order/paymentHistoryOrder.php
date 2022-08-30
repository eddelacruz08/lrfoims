<?php header("Refresh: 10"); ?>
<?php if (!empty($getOrderDetails)): ?>
    <div class="card mb-2 p-0">
        <?php foreach ($getOrderDetails as $details): ?>
            <div class="accordion mb-1" id="accordionExample<?= $details['number'] ?>">
                <div class="card">
                    <div class="card p-0" id="headingOne">
                        <h2 class="mb-0 d-flex">
                            <button class="btn btn-dark btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne<?= $details['number'] ?>" aria-expanded="true" aria-controls="collapseOne">
                                    Order#<?= $details['number'] ?>
                                <span class="badge badge-spill badge-warning"><?= ucfirst($details['order_status']); ?></span>
                            </button>
                            <button class="btn btn-sm btn-primary ml-1 d-flex p-2"><i class="fas fa-file-invoice mt-1"></i>&nbspInvoice</button>
                        </h2>
                    </div>

                    <div id="collapseOne<?= $details['number'] ?>" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordionExample<?= $details['number'] ?>">
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-hover responsive table-sm" width="100%">
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
                                                        <center><?= $carts['quantity']; ?>X</center>
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
                                        <?php foreach ($getCartPrice as $cartPrice) : ?>
                                            <?php if($cartPrice['order_id'] == $details['id']):?>
                                                <tr>
                                                    <th scope="col" colspan="4">
                                                        <p class="h5 float-right"><b>Total Price:</b></p>
                                                    </th>
                                                    <td scope="col">
                                                        <center> ₱ <?= number_format($totalPrice['total_price']);?></center>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
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
