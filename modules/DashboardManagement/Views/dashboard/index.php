<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active"><?=$title?></li>
                </ol>
            </div>
            <h4 class="page-title"><?=$title?></h4>
        </div>
    </div>
</div>     
<!-- end page title --> 
<div class="row">
    <div class="col-xl-3 col-lg-4">
        <div class="col">
            <div class="card tilebox-one">
                <div class="card-body">
                    <i class='mdi mdi-cart-check float-end'></i>
                    <h6 class="text-uppercase mt-0">Total Orders</h6>
                    <h2 class="my-2 pt-1" id="active-views-count">
                        <?php foreach ($getTotalOrders as $totalOrders): ?>
                            <?=$totalOrders['getTotalOrders'];?>
                        <?php endforeach; ?>
                    </h2>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card tilebox-one">
                <div class="card-body">
                    <i class='mdi mdi-cart-minus float-end'></i>
                    <h6 class="text-uppercase mt-0">Total Pending Orders</h6>
                    <h2 class="my-2 pt-1" id="active-users-count">
                        <?php foreach ($getTotalPendingOrders as $totalPendingOrders): ?>
                            <?=$totalPendingOrders['getTotalPendingOrders'];?>
                        <?php endforeach; ?>
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="col-xl-9 col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">Pending Orders</h4>
                <div class="row">
                    <div class="col-md-4 offset-md-8">
                        <div class="input-group input-group-sm justify-content-end mb-1">
                            <input type="text" id="searchPendingOrders" class="form-control form-control-sm" placeholder="Search . . ." name="searchPendingOrders">
                            <button onclick="paginateTables('<?=base_url()?>/dashboard/get-pending-orders/v/offset',0,'#display-pending-orders-table', document.getElementById('searchPendingOrders').value)" class="btn btn-sm btn-outline-dark" type="button">Search</button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <div id="display-pending-orders-table" onload="displayPendingOrders();"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">Cancelled Orders</h4>
                <div class="table-responsive">
                    <table class="table table-sm table-centered table-nowrap table-hover text-center w-100 mb-0">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>Order#</th>
                                <th>Status</th>
                                <th>Date & Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($getCancelledOrders as $row): ?> 
                                <tr>
                                    <td>Order#<?=$row['number']?></td>
                                    <td><span class="badge bg-danger"><?=$row['order_status']?></span></td>
                                    <td><?= Date('M d, Y h:i a', strtotime($row['created_at']))?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">Best Foods & Sellers</h4>
                <div class="table-responsive">
                    <table id="basic-datatable" class="table table-sm text-center table-hover dt-responsive nowrap w-100">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>Menu Name</th>
                                <th>Best Foods (Ratings)</th>
                                <th>Best Sellers (Total Orders)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($menu as $row) : ?>
                                <tr>
                                    <td><?= ucfirst($row['menu']) ?></td>
                                    <td>
                                        <?php foreach($getCartsFoodRates as $rates):?>
                                            <?php if($row['id'] == $rates['menu_id']):?>
                                                <?=$rates['sum_per_rating_for_food']?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <?php foreach ($getTotalBestFoods as $total) : ?>
                                        <?php if ($total['menu_id'] == $row['id']) : ?>
                                            <td><?= $total['count_per_best_food'] ?></td>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
