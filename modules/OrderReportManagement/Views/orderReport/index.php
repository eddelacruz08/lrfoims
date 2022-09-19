<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <form method="POST" action="/order-reports/date-filter" class="d-flex">
                    <div class="input-group">
                        <!-- <input type="text" class="form-control form-control-light" id="dash-daterange" name="date"> -->
                        <input type="text" class="form-control form-control-light" value="<?=session()->get('dateYear')?>" id="dateYearPicker" name="date" autocomplete="off">
                        <button type="submit" class="input-group-text bg-primary border-primary text-white">
                            <i class="mdi mdi-calendar-range font-13"></i>
                        </button>
                    </div>
                    <a href="/order-reports" class="btn btn-primary ms-2" title="Reset Filter">
                        <i class="mdi mdi-autorenew"></i>
                    </a>
                    <!-- <a href="javascript: void(0);" class="btn btn-primary ms-1">
                        <i class="mdi mdi-filter-variant"></i>
                    </a> -->
                </form>
            </div>
            <h4 class="page-title"><?=$title;?></h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-12 col-lg-12">

        <div class="row">
            <div class="col-lg-3">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-cart-plus widget-icon bg-success-lighten text-success"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Overall Orders</h5>
                        <?php foreach(session()->get('totalOrderPerYears') as $data):?>
                            <h3 class="mt-3 mb-3"><?= $data['total_orders'];?></h3>
                        <?php endforeach;?>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-3">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-currency-usd widget-icon bg-success-lighten text-success"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Average Amount Sold">Overall Amount Sold</h5>
                        <?php foreach(session()->get('totalAmountOrdersUsed')as $data):?>
                            <h3 class="mt-3 mb-3">₱ <?=number_format($data['total_amount_per_month']);?></h3>
                        <?php endforeach;?>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-3">
            </div> <!-- end col-->

            <div class="col-lg-3">
            </div> <!-- end col-->
        </div> <!-- end row -->

    </div> <!-- end col -->

    <div class="col-xl-6 col-lg-6">
        <!-- Chart-->
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Orders Yearly | <?= session()->get('dateYear')?></h4>
                <div dir="ltr">
                    <div style="height: 260px;" class="chartjs-chart">
                        <canvas id="orders-bar-chart-example" data-colors="#fa5c7c,#35b8e0"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Chart-->

    </div> <!-- end col -->

    <div class="col-xl-6 col-lg-6">
        <!-- Chart-->
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Amount Sold Yearly | <?= session()->get('dateYear')?>
                    <div style="height: 260px;" class="chartjs-chart">
                        <canvas id="orders-revenue-bar-chart-example" data-colors="#fa5c7c,green"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Chart-->

    </div> <!-- end col -->

    <div class="col-xl-12 col-lg-12">
        <!-- Chart-->
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-5">
                        <h4 class="header-title mb-3">Orders</h4>
                    </div>
                    <div class="col-sm-7 d-flex">
                        <form method="POST" action="/order-reports/generate-report" target="_blank">
                            <div class="input-group float-end ml-1">
                                <input type="hidden" name="date_status" value="1">
                                <input type="text" class="form-control form-control-light form-control-sm date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" name="date" autocomplete="off">
                                <button type="submit" class="input-group-text btn btn-sm bg-primary border-primary text-white">
                                    <i class="mdi mdi-calendar-range font-13"></i> &nbspSingle Report
                                </button>
                            </div>       
                        </form>
                        
                        <form method="POST" action="/order-reports/generate-report" target="_blank">
                            <div class="input-group float-end">
                                <input type="hidden" name="date_status" value="0">
                                <input type="text" class="form-control form-control-light form-control-sm date" id="singledaterange" data-toggle="date-picker" data-cancel-class="btn-warning" name="date" autocomplete="off">
                                <button type="submit" class="input-group-text btn btn-sm bg-primary border-primary text-white">
                                    <i class="mdi mdi-calendar-range font-13"></i> &nbspMultiple Report
                                </button>
                            </div>       
                        </form>
                    </div>
                </div>
                <table class="table table-sm table-centered mb-0 text-center">
                    <thead>
                        <tr>
                            <th>Order#</th>
                            <th>Status</th>
                            <th>Amount</th>
                            <th>Cash</th>
                            <th>Change</th>
                            <th>Date & Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getOrderDetails as $row):?>
                            <tr>
                                <td>Order#<?=$row['number']?></td>
                                <td><span class="badge bg-primary"><?=$row['order_status']?></span></td>
                                <td>₱ <?=number_format($row['total_amount'])?></td>
                                <td>₱ <?=number_format($row['c_cash'])?></td>
                                <td>₱ <?=number_format($row['c_balance'])?></td>
                                <td><?= Date('F d, Y - h:i a', strtotime($row['created_at']))?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End Chart-->

    </div> <!-- end col -->

</div>
<!-- end row -->
