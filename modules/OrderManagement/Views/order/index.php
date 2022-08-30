<div class="row">
    <div class="col-md-9">
        <h3 class="mb-3"><?= $title ?></h3>
    </div>
    <div class="col-md-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?= $title ?>
                </li>
            </ol>
        </nav>
    </div>
</div>
<?php if(isset($_SESSION['success'])):?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= $_SESSION['success'] ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif;?>
<div class="card p-1 mb-3 container-fluid">
    <ul class="nav nav-tabs mb-1" id="myTab">
        <li class="nav-item">
            <a href="#orders" class="nav-link active" data-toggle="tab">Orders
                <?php if(!empty($countOrders)):?>
                    <?php foreach ($countOrders as $row) : ?>
                        <span class="badge badge-primary"><?=$row['order_total']?></span>
                    <?php endforeach; ?>
                <?php else: ?>
                    <span class="badge badge-primary">0</span>
                <?php endif; ?>
            </a>
        </li>
        <li class="nav-item">
            <a href="#placeOrders" class="nav-link" data-toggle="tab">Place Orders
                <?php if(!empty($countPlaceOrders)):?>
                    <?php foreach ($countPlaceOrders as $row) : ?>
                        <span class="badge badge-primary"><?=$row['order_total']?></span>
                    <?php endforeach; ?>
                <?php else: ?>
                    <span class="badge badge-primary">0</span>
                <?php endif; ?>
            </a>
        </li>
        <li class="nav-item">
            <a href="#serveOrder" class="nav-link" data-toggle="tab">Served Orders
                <?php if(!empty($countServeOrders)):?>
                    <?php foreach ($countServeOrders as $row) : ?>
                        <span class="badge badge-primary"><?=$row['order_total']?></span>
                    <?php endforeach; ?>
                <?php else: ?>
                    <span class="badge badge-primary">0</span>
                <?php endif; ?>
            </a>
        </li>
        <li class="nav-item">
            <a href="#payments" class="nav-link" data-toggle="tab">Order Payments
                <?php if(!empty($countPaymentOrders)):?>
                    <?php foreach ($countPaymentOrders as $row) : ?>
                        <span class="badge badge-primary"><?=$row['order_total']?></span>
                    <?php endforeach; ?>
                <?php else: ?>
                    <span class="badge badge-primary">0</span>
                <?php endif; ?>
            </a>
        </li>
        <li class="nav-item">
            <a href="#history" class="nav-link" data-toggle="tab">Payment History
                <?php if(!empty($countPaymentHistoryOrders)):?>
                    <?php foreach ($countPaymentHistoryOrders as $row) : ?>
                        <span class="badge badge-primary"><?=$row['order_total']?></span>
                    <?php endforeach; ?>
                <?php else: ?>
                    <span class="badge badge-primary">0</span>
                <?php endif; ?>
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="orders" class="tab-pane fade show active">
            <?php if(!empty($orders)):?>
                <?php foreach ($orders as $row) : ?>
                    <div class="orders-data" id="<?=$row['order_number_id']?>"></div>
                <?php endforeach; ?>
            <?php else: ?>
                    No Orders
            <?php endif; ?>
        </div>
        <div id="placeOrders" class="tab-pane fade">
            <?php if(!empty($placeOrders)):?>
                <?php foreach ($placeOrders as $row) : ?>
                        <div class="place-orders-data" id="<?=$row['order_number_id']?>"></div>
                <?php endforeach; ?>
            <?php else: ?>
                    No Place Orders
            <?php endif; ?>
        </div>
        <div id="serveOrder" class="tab-pane fade">
            <?php if(!empty($serveOrders)):?>
                <?php foreach ($serveOrders as $row) : ?>
                        <div class="serve-orders-data" id="<?=$row['order_number_id']?>"></div>
                <?php endforeach; ?>
            <?php else: ?>
                    No Served
            <?php endif; ?>
        </div>
        <div id="payments" class="tab-pane fade">
            <?php if(!empty($paymentOrders)):?>
                <?php foreach ($paymentOrders as $row) : ?>
                        <div class="payment-orders-data" id="<?=$row['order_number_id']?>"></div>
                <?php endforeach; ?>
            <?php else: ?>
                    No Order Payments
            <?php endif; ?>
        </div>
        <div id="history" class="tab-pane fade">
            <?php if(!empty($paymentHistoryOrders)):?>
                <?php foreach ($paymentHistoryOrders as $row) : ?>
                        <div class="payment-history-orders-data" id="<?=$row['order_number_id']?>"></div>
                <?php endforeach; ?>
            <?php else: ?>
                    No Payment Order History
            <?php endif; ?>
        </div>
    </div>
</div>