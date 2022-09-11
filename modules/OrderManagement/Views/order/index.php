<div class="row">
    <div class="col-xxl-12">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?= $title ?></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?= $title ?></h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <?php if(isset($_SESSION['success'])):?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $_SESSION['success'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif;?>
        <?php if(isset($_SESSION['error_no_flash'])):?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $_SESSION['error_no_flash'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif;?>

    </div> <!-- end col -->

</div>

<div class="row">

    <!-- task details -->
    <div class="col-xxl-12">
        <div class="card p-1">
            <div class="card-body p-0 shadow">
                <ul class="nav nav-tabs mb-0 shadow" id="myTab">
                    <!-- <li class="nav-item">
                        <a href="#orders" class="nav-link active" data-bs-toggle="tab">Orders
                            <?php if(!empty($countOrders)):?>
                                <?php foreach ($countOrders as $row) : ?>
                                    <span class="badge bg-dark rounded-pill"><?=$row['order_total']?></span>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <span class="badge bg-dark rounded-pill">0</span>
                            <?php endif; ?>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a href="#placeOrders" class="nav-link" data-bs-toggle="tab">Place Orders
                            <?php if(!empty($countPlaceOrders)):?>
                                <?php foreach ($countPlaceOrders as $row) : ?>
                                    <span class="badge bg-dark rounded-pill"><?=$row['order_total']?></span>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <span class="badge bg-dark rounded-pill">0</span>
                            <?php endif; ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#serveOrder" class="nav-link" data-bs-toggle="tab">Served Orders
                            <?php if(!empty($countServeOrders)):?>
                                <?php foreach ($countServeOrders as $row) : ?>
                                    <span class="badge bg-dark rounded-pill"><?=$row['order_total']?></span>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <span class="badge bg-dark rounded-pill">0</span>
                            <?php endif; ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#payments" class="nav-link" data-bs-toggle="tab">Order Payments
                            <?php if(!empty($countPaymentOrders)):?>
                                <?php foreach ($countPaymentOrders as $row) : ?>
                                    <span class="badge bg-dark rounded-pill"><?=$row['order_total']?></span>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <span class="badge bg-dark rounded-pill">0</span>
                            <?php endif; ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#history" class="nav-link" data-bs-toggle="tab">Payment History
                            <?php if(!empty($countPaymentHistoryOrders)):?>
                                <?php foreach ($countPaymentHistoryOrders as $row) : ?>
                                    <span class="badge bg-dark rounded-pill"><?=$row['order_total']?></span>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <span class="badge bg-dark rounded-pill">0</span>
                            <?php endif; ?>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="orders" class="tab-pane fade show active">
                        <?php if(!empty($orders)):?>
                            <?php foreach ($orders as $row) : ?>
                                <div class="orders-data" id="<?=$row['order_id']?>"></div>
                            <?php endforeach; ?>
                        <?php else: ?>
                                No Orders
                        <?php endif; ?>
                    </div>
                    <div id="placeOrders" class="tab-pane fade">
                        <?php if(!empty($placeOrders)):?>
                            <?php foreach ($placeOrders as $row) : ?>
                                    <div class="place-orders-data" id="<?=$row['order_id']?>"></div>
                            <?php endforeach; ?>
                        <?php else: ?>
                                No Place Orders
                        <?php endif; ?>
                    </div>
                    <div id="serveOrder" class="tab-pane fade">
                        <?php if(!empty($serveOrders)):?>
                            <?php foreach ($serveOrders as $row) : ?>
                                    <div class="serve-orders-data" id="<?=$row['order_id']?>"></div>
                            <?php endforeach; ?>
                        <?php else: ?>
                                No Served
                        <?php endif; ?>
                    </div>
                    <div id="payments" class="tab-pane fade">
                        <?php if(!empty($paymentOrders)):?>
                            <?php foreach ($paymentOrders as $row) : ?>
                                    <div class="payment-orders-data" id="<?=$row['order_id']?>"></div>
                            <?php endforeach; ?>
                        <?php else: ?>
                                No Order Payments
                        <?php endif; ?>
                    </div>
                    <div id="history" class="tab-pane fade">
                        <?php if(!empty($paymentHistoryOrders)):?>
                            <?php foreach ($paymentHistoryOrders as $row) : ?>
                                    <div class="payment-history-orders-data" id="<?=$row['order_id']?>"></div>
                            <?php endforeach; ?>
                        <?php else: ?>
                                No Payment Order History
                        <?php endif; ?>
                    </div>
                </div>
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->

</div>
<!-- end row-->
