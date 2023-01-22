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



