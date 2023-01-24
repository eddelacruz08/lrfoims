<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <form method="POST" action="/ingredient-reports/date-filter" class="d-flex">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-light" value="<?=session()->get('dateYear')?>" id="dateYearPicker" name="date" autocomplete="off">
                        <button type="submit" class="input-group-text bg-primary border-primary text-white">
                            <i class="mdi mdi-calendar-range font-13"></i>
                        </button>
                    </div>
                    <a href="/ingredient-reports" class="btn btn-primary ms-2" title="Reset Filter">
                        <i class="mdi mdi-autorenew"></i>
                    </a>
                </form>
            </div>
            <h4 class="page-title"><?=$title;?></h4>
        </div>
    </div>
</div>
<!-- end page title -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
    <li class="nav-item">
        <a href="#ingredientStatus" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
            <i class="mdi mdi-home-variant d-md-none d-block"></i>
            <span class="d-none d-md-block">Ingredient Overall Status & Reports</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#ingredientInformation" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
            <i class="mdi mdi-account-circle d-md-none d-block"></i>
            <span class="d-none d-md-block">Ingredient Information</span>
        </a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane show active" id="ingredientStatus">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-sm-3 col-md-3">
                <div class="col">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-food-variant widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Total Ingredients">Total Ingredients</h5>
                            <?php foreach(session()->get('getTotalStockIngredientPerYears') as $data):?>
                                <h3 class="mt-3 mb-0"><?= $data['total_ingredients'];?></h3>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div> 
                <div class="col">
                    <div class="card m-0 p-0">
                        <div class="card-body p-2">
                            <div class="col m-0 p-1">
                                <h4 class="m-0 p-1">Generate <?=$title;?></h4>
                            </div>
                            <?php if(user_link('ingredient-reports/generate-report', session()->get('userPermissionView'))):?>
                                <div class="col">
                                    <form method="POST" action="/ingredient-reports/generate-report" target="_blank">
                                        <div class="input-group">
                                            <input type="hidden" name="date_status" value="0">
                                            <input type="text" class="form-control form-control-light form-control-sm date" id="singledaterange" data-toggle="date-picker" data-cancel-class="btn-warning" name="date" autocomplete="off">
                                            <button type="submit" class="input-group-text btn btn-sm bg-primary border-primary text-white">
                                                <i class="mdi mdi-calendar-range font-13"></i> Report
                                            </button>
                                        </div>       
                                    </form>
                                </div>
                            <?php else: ?>
                                <div class="col">
                                    <button type="button" class="btn btn-sm btn-secondary float-end">No Permission | Generate ingredient report!</button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-sm-9 col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-2">Total Stock Ingredients Yearly | <?=$dateYear;?></h4>

                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div dir="ltr">
                                    <div class="mt-3 chartjs-chart" style="height: 320px;">
                                        <canvas id="bar-chart-total-stock-ingredients" data-colors="#fa5c7c,#35b8e0"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-2">Confirmation for Expired Ingredients</h4>
                        <div class="table-responsive">
                            <table id="expiring-ingredients-data-table" class="table-sm table-centered table-nowrap table-hover text-center w-100 mb-0">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th>Ingredient Name</th>
                                        <th>Unit Quantity</th>
                                        <th>Expiry Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ingredientStockIn as $stockIn) : ?>
                                        <?php foreach ($ingredients as $ingredient) : ?>
                                            <?php if ($ingredient['id'] == $stockIn['ingredient_id']) : ?>
                                                <tr>
                                                    <td><?= ucfirst($ingredient['product_name']) ?></td>
                                                    <td><?= number_format($stockIn['unit_quantity'],2) ?></td>
                                                    <td><?= date('M d, Y',strtotime($stockIn['date_expiration'])); ?></td>
                                                    <td>
                                                        <?= ($stockIn['stock_status'] == 3 ? "<span class='badge bg-danger'>Expired</span>":
                                                        "<span class='badge bg-success'>Ongoing</span>") ?>
                                                    </td>
                                                    <td>
                                                        <button type="button" onclick="confirmationStockIngredients('/ingredients/expire-date/u', <?=$stockIn['id']?>, 
                                                            <?=$stockIn['unit_quantity']?>, <?=$ingredient['id']?> );" class="btn btn-info btn-sm">
                                                            Confirm this expired ingredient
                                                        </button>
                                                        <button type="button" onclick="confirmCancelExpiredStocks('/ingredients/expire-date/d', <?=$stockIn['id']?>);" 
                                                            class="btn btn-danger btn-sm">
                                                            Cancel
                                                        </button>
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-1 mb-3">Running Out Ingredients Quantity</h4>

                        <div class="row">
                            <div class="col-sm-3 mb-2 mb-sm-0">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <?php foreach($getIngredientMeasures as $measures): ?>
                                        <a class="nav-link show" id="v-pills-home-tab<?=$measures['id']?>" data-bs-toggle="pill" href="#v-pills-home<?=$measures['id']?>" role="tab" aria-controls="v-pills-home<?=$measures['id']?>"
                                            aria-selected="true">
                                            <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                            <span class="d-none d-md-block"><?= ucwords($measures['description'])?></span>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="col-sm-9">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <?php foreach($getIngredientMeasures as $measures): ?>
                                        <div class="tab-pane fade show" id="v-pills-home<?=$measures['id']?>" role="tabpanel" aria-labelledby="v-pills-home-tab<?=$measures['id']?>">
                                            <div class="table-responsive">
                                                <table id="running-out-ingredients-data-table<?=$measures['id']?>" class="table-sm table-hover dt-responsive nowrap w-100">
                                                    <thead class="bg-dark text-white">
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Unit Quantity</th>
                                                            <th style="width: 40%;"> Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($getIngredientLowQuantityStatus as $row): ?> 
                                                            <?php if($measures['id'] == $row['product_description_id']): ?> 
                                                                <tr class="border-bottom">
                                                                    <td><?= ucfirst($row['product_name']) ?></td>
                                                                    <td><?= number_format($row['unit_quantity'], 2).' '.$measures['name'] ?></td>
                                                                    <td>
                                                                        <div class="progress" style="height: 10px;">
                                                                            <div class="progress-bar bg-primary <?= $row['unit_quantity'] <= 10 ? 'bg-danger': $row['unit_quantity'] <= $measures['low_stock_minimum_limit'] ? 'bg-warning' : '' ?>" role="progressbar"
                                                                                style="width: <?= $row['unit_quantity'] <= 10 ? '25': $row['unit_quantity'] <= $measures['low_stock_minimum_limit'] ? '75' : '100' ?>%; height: 20px;" aria-valuenow="<?= $row['unit_quantity'] <= 10 ? '25': $row['unit_quantity'] <= $measures['low_stock_minimum_limit'] ? '75' : '100' ?>"
                                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <script>
                                                    $(document).ready(function () {
                                                        $('#running-out-ingredients-data-table<?=$measures['id']?>').DataTable({
                                                            order: [[1, 'asc']],
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div> 
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="ingredientInformation">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php foreach ($ingredientSortByCategory as $category) : ?>
                <div class="col">
                    <div class="card m-0">
                        <div class="card-body m-0">
                            <h4 class="header-title bg-dark text-white p-1 rounded mb-2"><?=$category['product_name'];?></h4>

                            <div class="table-responsive m-0">
                                <table class="table table-bordered table-hover table-centered mb-0 text-center">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Current Price</th>
                                            <th>Total Reports</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php foreach ($ingredients as $row) : ?>
                                            <?php if($category['id'] == $row['product_category_id']): ?>
                                                <tr>
                                                    <td><?= ucfirst($row['product_name']); ?></td>
                                                    <td>₱ <?= number_format($row['price'],2); ?></td>
                                                    <?php foreach ($countIngredientReports as $reps):?>
                                                        <?= $reps['ingredient_id'] == $row['id'] ? '<td>'.$reps['countIngredientReport'].'</td>' : '' ?>
                                                    <?php endforeach; ?>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div> <!-- end table responsive-->
                        </div> <!-- end col-->
                    </div> <!-- end row-->
                </div> <!-- end col-->
            <?php endforeach; ?>
        </div> <!-- end row-->
    </div>
</div>



