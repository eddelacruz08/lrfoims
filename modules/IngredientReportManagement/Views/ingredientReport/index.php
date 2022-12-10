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
            <div class="col-xl-12 col-lg-12">

                <div class="row">
                    <div class="col-md-3">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-food-variant widget-icon"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Total Ingredients">Total Stock Ingredients</h5>
                                <?php foreach(session()->get('getTotalStockIngredientPerYears') as $data):?>
                                    <h3 class="mt-3 mb-3"><?= $data['total_ingredients'];?></h3>
                                    <h4 class="text-muted fw-normal mt-0 mb-0">₱ <?=number_format($data['total_ingredients_price'])?></h4>
                                <?php endforeach;?>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-md-3">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-food widget-icon bg-primary-lighten text-primary"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Total Stock Out">Total of Goods Sold</h5>
                                <?php foreach(session()->get('getTotalGoodSoldIngredientPerYears') as $data):?>
                                    <h3 class="mt-3 mb-3"><?= $data['total_ingredients_report'];?></h3>
                                    <h4 class="text-muted fw-normal mt-0 mb-0">₱ <?=number_format($data['total_ingredients_report_price'])?></h4>
                                <?php endforeach;?>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-md-3">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-food widget-icon bg-success-lighten text-success"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Total Stock Out">Goods Sold Today</h5>
                                <?php foreach(session()->get('getTotalGoodSoldIngredientToday') as $data):?>
                                    <h3 class="mt-3 mb-3"><?= $data['total_ingredients_report'];?></h3>
                                    <h4 class="text-muted fw-normal mt-0 mb-0">₱ <?=number_format($data['total_ingredients_report_price'])?></h4>
                                <?php endforeach;?>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row -->

            </div> <!-- end col -->

        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-7">
                                <h4 class="header-title mt-1">Generate <?=$title;?></h4>
                            </div>
                            <?php if(user_link('ingredient-reports/generate-report', session()->get('userPermissionView'))):?>
                                <div class="col-sm-5">
                                    <!-- <form method="POST" action="/ingredient-reports/generate-report" target="_blank">
                                        <div class="input-group float-end ml-1">
                                            <input type="hidden" name="date_status" value="1">
                                            <input type="text" class="form-control form-control-light form-control-sm date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" name="date" autocomplete="off">
                                            <button type="submit" class="input-group-text btn btn-sm bg-primary border-primary text-white">
                                                <i class="mdi mdi-calendar-range font-13"></i> &nbspSingle Report
                                            </button>
                                        </div>       
                                    </form> -->
                                    
                                    <form method="POST" action="/ingredient-reports/generate-report" target="_blank">
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
                                    <button type="button" class="btn btn-sm btn-secondary float-end">No Permission | Generate ingredient report!</button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->

        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">Total Stock Ingredients Yearly | <?=$dateYear;?></h4>

                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div dir="ltr">
                            <div class="mt-3 chartjs-chart" style="height: 320px;">
                                <canvas id="bar-chart-total-stock-ingredients" data-colors="#fa5c7c,#35b8e0"></canvas>
                            </div>
                        </div>
                    </div> <!-- end col -->

                    <div class="col-xl-6 col-lg-6">
                        <div dir="ltr">
                            <div class="mt-3 chartjs-chart" style="height: 320px;">
                                <canvas id="bar-chart-total-stock-ingredients-amount" data-colors="#fa5c7c,green"></canvas>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end card body-->
        </div> <!-- end card -->

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-7">
                                <h4 class="header-title mt-1">Generate Goods Sold Report</h4>
                            </div>
                            <?php if(user_link('ingredient-reports/generate-report', session()->get('userPermissionView'))):?>
                                <div class="col-sm-5">
                                    <!-- <form method="POST" action="/ingredient-reports/generate-report" target="_blank">
                                        <div class="input-group float-end ml-1">
                                            <input type="hidden" name="date_status" value="1">
                                            <input type="text" class="form-control form-control-light form-control-sm date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" name="date" autocomplete="off">
                                            <button type="submit" class="input-group-text btn btn-sm bg-primary border-primary text-white">
                                                <i class="mdi mdi-calendar-range font-13"></i> &nbspSingle Report
                                            </button>
                                        </div>       
                                    </form> -->
                                    
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
                                    <button type="button" class="btn btn-sm btn-secondary float-end">No Permission | Good sold report!</button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->

        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">Total of Goods Sold Yearly | <?=$dateYear;?></h4>

                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div dir="ltr">
                            <div class="mt-3 chartjs-chart" style="height: 320px;">
                                <canvas id="bar-chart-total-good-sold" data-colors="#fa5c7c,#35b8e0"></canvas>
                            </div>
                        </div>
                    </div> <!-- end col -->

                    <div class="col-xl-6 col-lg-6">
                        <div dir="ltr">
                            <div class="mt-3 chartjs-chart" style="height: 320px;">
                                <canvas id="bar-chart-total-good-sold-amount" data-colors="#fa5c7c,green"></canvas>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end card body-->
        </div> <!-- end card -->
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
                                            <th>Reports</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ingredients as $row) : ?>
                                            <?php if($category['id'] == $row['product_category_id']): ?>
                                                <tr>
                                                    <td><?= ucfirst($row['product_name']); ?></td>
                                                    <?php foreach ($countIngredientReports as $reps):?>
                                                        <?= $reps['ingredient_id'] == $row['id'] ? '<td>'.$reps['countIngredientReport'].'</td>' : '' ?>
                                                        <?= $reps['ingredient_id'] == $row['id'] ? '<td>₱ '.number_format($reps['total']).'</span></td>' : '' ?>
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



