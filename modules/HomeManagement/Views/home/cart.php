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

        <?php if (!empty($getCustomerCartDetails)):?>
            <?php foreach ($getCustomerOrderDetails as $details):?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-centered mb-0">
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
                                                                    <form method="POST" action="/cart/qty/<?= $row['id']; ?>" enctype="multipart/form-data">
                                                                        <div class="input-group">
                                                                            <input type="number" name="quantity" value="<?=$row['quantity'] ?>" class="form-control" placeholder="Quantity" aria-label="Quantity" aria-describedby="button-addon2">
                                                                            <button class="btn btn-sm btn-outline-secondary" animation="true" type="submit" id="button-addon2" title="Change Quantity"><i class="fas fa-plus-circle"></i>Change</button>
                                                                        </div>
                                                                    </form>
                                                                </td>
                                                                <td>
                                                                    ₱ <?= number_format($row['sub_total_price']); ?>
                                                                </td>
                                                                <td>
                                                                    <a onclick="confirmDelete('/cart/d/',<?=$row['id']?>)" data-toggle="tooltip" data-placement="bottom" title="Remove Order" animation="true"  class="btn action-icon text-danger">
                                                                        <i class="mdi mdi-delete"></i>
                                                                    </a>
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
                                        <div class="border p-3 mt-4 mt-lg-0 rounded">
                                            <h4 class="header-title mb-3">Order Summary</h4>

                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>Order Number:</td>
                                                            <td>#<?=$details['number'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cash</td>
                                                            <td>0</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Change</td>
                                                            <td>0</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Order Total :</th>
                                                            <th>0</th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- end table-responsive -->
                                        </div>

                                        <!-- action buttons-->
                                        <div class="row mt-4">
                                            <div class="col-sm-6">
                                                <a href="/menu" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                                    <i class="mdi mdi-arrow-left"></i> Continue Shopping </a>
                                            </div> <!-- end col -->
                                            <div class="col-sm-6">
                                                <div class="text-sm-end">
                                                    <a href="" class="btn btn-danger">
                                                        <i class="mdi mdi-cart-plus me-1"></i> Checkout </a>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row-->

                                    </div> <!-- end col -->

                                </div> <!-- end row -->
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            <?php endforeach; ?>
        <?php else: ?>
            <h1>No Order</h1>            
        <?php endif; ?>

    </div> <!-- End Content -->
</div> <!-- End Content -->