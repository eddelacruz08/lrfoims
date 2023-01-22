<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <form method="POST" action="/order-reports/date-filter" class="d-flex">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-light" value="<?=session()->get('dateYear')?>" id="dateYearPicker" name="date" autocomplete="off">
                        <button type="submit" class="input-group-text bg-primary border-primary text-white">
                            <i class="mdi mdi-calendar-range font-13"></i>
                        </button>
                    </div>
                    <a href="/order-reports" class="btn btn-primary ms-2" title="Reset Filter">
                        <i class="mdi mdi-autorenew"></i>
                    </a>
                </form>
            </div>
            <h4 class="page-title"><?=$title;?></h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-3 col-lg-3 col-sm-3 col-md-3">

        <div class="row">
            <div class="col">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-cart-plus widget-icon bg-success-lighten text-success"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Total Orders</h5>
                        <?php foreach(session()->get('totalOrderPerYears') as $data):?>
                            <h3 class="mt-3 mb-3"><?= $data['total_orders'];?></h3>
                        <?php endforeach;?>
                    </div>
                </div>

                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-currency-php widget-icon bg-success-lighten text-success"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Average Amount Sold">Total Orders Amount</h5>
                        <?php foreach(session()->get('totalAmountOrdersUsed')as $data):?>
                            <h3 class="mt-3 mb-3">₱ <?=number_format($data['total_amount_per_month']);?></h3>
                        <?php endforeach;?>
                    </div> 
                </div> 
            </div>
        </div>

    </div>

    <div class="col-xl-9 col-lg-9 col-sm-9 col-md-9">
        <!-- Chart-->
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-7">
                        <h4 class="header-title mb-3">Order Analytics</h4>
                    </div>
                </div>
                <div class="table-responsive">
                    hahah
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
        <!-- Chart-->
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-7">
                        <h4 class="header-title mb-3"><?=$title;?></h4>
                    </div>
                    <?php if(user_link('order-reports/generate-report', session()->get('userPermissionView'))):?>
                        <div class="col-sm-5">
                            <form method="POST" action="/order-reports/generate-report" target="_blank">
                                <div class="input-group">
                                    <input type="hidden" name="date_status" value="0">
                                    <input type="text" class="form-control form-control-light form-control-sm date" id="singledaterange" data-toggle="date-picker" data-cancel-class="btn-warning" name="date" autocomplete="off">
                                    <button type="submit" class="input-group-text btn btn-sm bg-primary border-primary text-white">
                                        <i class="mdi mdi-calendar-range font-13"></i> &nbspRange Report
                                    </button>
                                </div>       
                            </form>
                        </div>
                    <?php else: ?>
                        <div class="col-sm-5">
                            <button type="button" class="btn btn-sm btn-secondary float-end">Need Permission to generate order report!</button>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="table-responsive">
                    <table id="order-reports-data-table" class="table table-sm table-centered mb-0 text-center">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>Order#</th>
                                <th>Status</th>
                                <th>Type</th>
                                <th>Amount Due</th>
                                <th>Total Bill</th>
                                <th>Less (12%) Vat</th>
                                <th>Payment</th>
                                <th>Invoice</th>
                                <th>Date&Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($getOrderDetails as $row):?>
                                <tr>
                                    <td>Order#<?=$row['number']?></td>
                                    <td><span class="badge bg-primary"><?=$row['order_status']?></span></td>
                                    <td>
                                        <?php if($row['order_type'] == 1):?>
                                            <span class="badge bg-success"><?=$row['type']?></span>
                                        <?php elseif($row['order_type'] == 2): ?>
                                            <span class="badge bg-warning"><?=$row['type']?></span>
                                        <?php elseif($row['order_type'] == 3): ?>
                                            <span class="badge bg-danger"><?=$row['type']?></span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary"><?=$row['type']?></span>
                                        <?php endif;?>
                                    </td>
                                    <td>₱ <?=number_format($row['total_amount_order'])?></td>
                                    <td>₱ <?=number_format($row['total_amount'])?></td>
                                    <td>₱ <?=number_format($row['total_amount_vat'])?></td>
                                    <?php foreach ($getPaymentMethod as $method) : ?>
                                        <?php if($method['id'] == $row['payment_method_id']):?>
                                            <td><?= ucwords($method['payment_method']);?></td>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <td>
                                        <?php if($row['order_status_id'] == 1):?>
                                            <?php $order_status = ucwords($row['order_status'])?>
                                        <?php elseif($row['order_status_id'] == 2): ?>
                                            <?php $order_status = ucwords($row['order_status'])?>
                                        <?php elseif($row['order_status_id'] == 3): ?>
                                            <?php $order_status = ucwords($row['order_status'])?>
                                        <?php elseif($row['order_status_id'] == 4): ?>
                                            <?php $order_status = ucwords($row['order_status'])?>
                                        <?php else: ?>
                                            <?php $order_status = ucwords($row['order_status'])?>
                                        <?php endif;?>
                                        <button onclick="printOrders(
                                                <?=$row['id']?>, <?=$row['number']?>, '<?=ucwords($row['type'])?>',
                                                '<?= date('M d, Y h:i a',strtotime($row['created_at']));?>', '<?=$order_status;?>',<?=$row['order_user_discount_id'];?>
                                            );" title="Print" class="btn btn-sm btn-outline-dark me-1" type="button">
                                            Print
                                        </button>
                                    </td>
                                    <td>
                                        <?= Date('M d, Y h:i a', strtotime($row['created_at']))?>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                    <script>
                        $(document).ready(function () {
                            $('#order-reports-data-table').DataTable({
                                order: [[8, 'desc']],
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Total Orders in <?= session()->get('dateYear')?></h4>
                <div dir="ltr">
                    <div style="height: 260px;" class="chartjs-chart">
                        <canvas id="orders-bar-chart-example" data-colors="#fa5c7c,#35b8e0"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div class="col-xl-6 col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Total Orders Amount in <?= session()->get('dateYear')?>
                    <div style="height: 260px;" class="chartjs-chart">
                        <canvas id="orders-revenue-bar-chart-example" data-colors="#fa5c7c,green"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div> 

</div>
