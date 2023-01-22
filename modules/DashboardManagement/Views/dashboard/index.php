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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="col-xl-9 col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">Confirmation for Expired Ingredients</h4>
                <div class="table-responsive">
                    <table id="expiring-ingredients-data-table" class="table-sm table-centered table-nowrap table-hover text-center w-100 mb-0">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>Ingredient Name</th>
                                <th>Unit Quantity</th>
                                <th>Action</th>
                                <th>Expiry Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ingredientStockIn as $stockIn) : ?>
                                <?php foreach ($ingredients as $ingredient) : ?>
                                    <?php if ($ingredient['id'] == $stockIn['ingredient_id']) : ?>
                                        <tr>
                                            <td>
                                                <center><?= ucfirst($ingredient['product_name']) ?></center>
                                            </td>
                                            <td>
                                                <center><?= number_format($stockIn['unit_quantity'],2) ?></center>
                                            </td>
                                            <td>
                                                <button type="button" onclick="confirmationStockIngredients('/ingredients/expire-date/u', <?=$stockIn['id']?>, <?=$stockIn['unit_quantity']?>, <?=$ingredient['id']?> );" class="btn btn-info btn-sm">Confirm this expired ingredient</button>
                                                <button type="button" onclick="confirmCancelExpiredStocks('/ingredients/expire-date/d', <?=$stockIn['id']?>);" class="btn btn-danger btn-sm">Cancel</button>
                                            </td>
                                            <td>
                                                <center><?= date('M d, Y',strtotime($stockIn['date_expiration'])); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ($stockIn['status'] == 'a' ? "<span class='badge bg-success'>Ongoing</span>":"<span class='badge bg-danger'>Expired</span>") ?></center>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <script>
                        $(document).ready(function () {
                            $('#expiring-ingredients-data-table').DataTable({
                                order: [[3, 'asc']],
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-1 mb-3">Running Out Ingredients Quantity</h4>

                <div class="table-responsive">
                    <table id="running-out-ingredients-data-table" class="table-sm table-hover dt-responsive nowrap w-100">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>Name</th>
                                <th>Unit Quantity</th>
                                <th style="width: 40%;"> Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($getIngredientLowQuantityStatus as $row): ?> 
                                <tr class="border-bottom">
                                    <td><?= ucfirst($row['product_name']) ?></td>
                                    <td><?= number_format($row['unit_quantity'], 2) ?></td>
                                    <td>
                                        <div class="progress" style="height: 10px;">
                                            <div class="progress-bar bg-primary <?= $row['unit_quantity'] <= 50 ? 'bg-danger': $row['unit_quantity'] <= 100 ? 'bg-warning' : '' ?>" role="progressbar"
                                                style="width: <?= $row['unit_quantity'] <= 50 ? '45': $row['unit_quantity'] <= 100 ? '75' : '100' ?>%; height: 20px;" aria-valuenow="<?= $row['unit_quantity'] <= 50 ? '45': $row['unit_quantity'] <= 100 ? '75' : '100' ?>"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <script>
                        $(document).ready(function () {
                            $('#running-out-ingredients-data-table').DataTable({
                                order: [[1, 'asc']],
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">Pending Orders</h4>
                <div class="table-responsive">
                    <div id="display-pending-orders-table" onload="displayPendingOrders();"></div>
                    <div class="display-pending-orders-table-next-page" id="display-pending-orders-table-next-page"></div>
                </div>
            </div>
        </div>
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
                                    <td><?= number_format($row['star_rate'], 2) ?></td>
                                    <?php foreach ($getTotaBestFoods as $total) : ?>
                                        <?php if ($total['menu_id'] == $row['id']) : ?>
                                            <td><?= ucfirst($total['count_per_best_food']) ?></td>
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
