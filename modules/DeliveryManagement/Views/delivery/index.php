<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active"><?= $title ?></li>
                </ol>
            </div>
            <h4 class="page-title"><?=$title?></h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Orders To Deliver</h4>
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
                                                <?php if(user_link('orders/place-order/u', session()->get('userPermissionView'))):?>
                                                    <a onclick="confirmPlaceOrder('/orders/place-order/u/',<?=$details['id']?>,'/3')" title="Serve Food" animation="true" class="btn btn-sm btn-success d-flex d-print-none">
                                                        Serve&nbspFood <i class="dripicons-arrow-thin-right"></i> 
                                                    </a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </h5>
                                    </div>
                                    <div id="collapseFour<?=$details['id']?>" class="collapse show p-0 m-0" aria-labelledby="headingFour<?=$details['id']?>"
                                        data-bs-parent="#custom-accordion-one<?=$details['id']?>">
                                        <div class="card-body  p-0 m-0">
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
                                                                                <div class="row">
                                                                                    <div class="col-8">
                                                                                        <?php if(user_link('orders/admin/cart/qty', session()->get('userPermissionView'))):?>
                                                                                            <form method="POST" action="/orders/admin/cart/qty/<?= $carts['id']; ?>/<?=$carts['menu_id']?>/<?=$carts['order_id']?>/<?=$carts['quantity']?>/2" enctype="multipart/form-data">
                                                                                                <div class="input-group">
                                                                                                    <input type="number" name="quantity" value="<?= $carts['quantity'] ?>" class="form-control" placeholder="Quantity" aria-label="Quantity" aria-describedby="button-addon2">
                                                                                                    <button class="btn btn-sm btn-outline-secondary" animation="true" type="submit" id="button-addon2" title="Change Quantity">Edit Qty</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        <?php else: ?>
                                                                                            -
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                    <div class="col-4">
                                                                                        <?php if(user_link('orders/cart/d', session()->get('userPermissionView'))):?>
                                                                                            <a onclick="confirmDeleteCart('/orders/cart/d/',<?=$carts['id']?>,<?=$carts['menu_id']?>,<?=$carts['order_id']?>,<?=$carts['quantity']?>)" title="Remove Order" class="btn btn-sm btn-default rounded-pill txt-lg">
                                                                                                <i class="dripicons-trash"></i>
                                                                                            </a>
                                                                                        <?php else: ?>
                                                                                            -
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                </div>
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
                                                                            <td scope="col">
                                                                                <center>
                                                                                    <?php foreach ($orderType as $type) : ?>
                                                                                        <?php if($details['order_type'] == $type['id']): ?>
                                                                                            <h4><span class="badge bg-success"><?= ucfirst($type['type']); ?></span></h4>
                                                                                        <?php endif; ?>
                                                                                    <?php endforeach; ?>
                                                                                </center>
                                                                            </td>
                                                                            <td scope="col">
                                                                                <center>
                                                                                    <p><b>Order#<?= $details['number'] ?>&nbsp | &nbsp<?= (empty($details['total_amount']))? '<span class="badge bg-danger">Not Paid<span>':'<span class="badge bg-success">Paid<span>' ?></b></p>
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
                                                            <?=$details['order_status_id']; ?>
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

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->