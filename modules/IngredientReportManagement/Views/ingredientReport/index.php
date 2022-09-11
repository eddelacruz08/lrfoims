<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <div class="d-flex">
                    <a onclick="filterDateClick('/ingredient-reports/filter-date')" class="btn btn-primary ms-2">
                        Filter Date <i class="mdi mdi-calendar-range"></i>
                    </a>
                </div>
            </div>
            <h4 class="page-title"><?=$title;?></h4>
        </div>
    </div>
</div>
<!-- end page title -->

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
                        <h3 class="mt-2 mb-2"><?=$totalIngredients['total_ingredients']?></h3>
                        <h4 class="text-muted fw-normal mt-0 mb-0">₱ <?=number_format($totalIngredients['total_ingredients_price'])?></h4>
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
                        <h3 class="mt-2 mb-2"><?=$totalIngredientReports['total_ingredient_report']?></h3>
                        <h4 class="text-muted fw-normal mt-0 mb-0">₱ <?=number_format($totalIngredientReports['total_ingredient_report_price'])?></h4>
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
                        <h3 class="mt-2 mb-2"><?=$totalIngredientReportToday['total_ingredient_report']?></h3>
                        <h4 class="text-muted fw-normal mt-0 mb-0">₱ <?=number_format($totalIngredientReports['total_ingredient_report_price'])?></h4>
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
                <h4 class="header-title mb-4">Bar Chart</h4>

                <div dir="ltr">
                    <div class="mt-3 chartjs-chart" style="height: 320px;">
                        <canvas id="bar-chart-example" data-colors="#fa5c7c,#35b8e0"></canvas>
                    </div>
                </div>

            </div> <!-- end card body-->
        </div> <!-- end card -->

    </div> <!-- end col -->
</div>
<!-- end row -->

<?php foreach ($ingredientSortByCategory as $category) : ?>
    
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title"><?=$category['product_name'];?></h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-12 col-lg-12">

        <div class="row">
            
            <?php foreach ($ingredients as $row) : ?>
                <?php if($category['id'] == $row['product_category_id']): ?>
                    <div class="col-3">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-food-variant widget-icon"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Number of Customers"><?= ucfirst($row['product_name']); ?></h5>
                                <?php foreach ($countIngredientReports as $reps):?>
                                    <?= $reps['ingredient_id'] == $row['id'] ? '<h3 class="mt-3">'.$reps['countIngredientReport'].'</h3>' : '' ?>
                                    <p class="mb-0 text-muted">
                                        <!-- <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 5.27%</span> -->
                                        <?= $reps['ingredient_id'] == $row['id'] ? '<span class="text-nowrap">₱ '.number_format($reps['total']).'</span>' : '' ?>
                                    </p>
                                <?php endforeach; ?>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                <?php endif; ?>
            <?php endforeach; ?>
            
        </div> <!-- end row -->

    </div> <!-- end col -->

</div>
<!-- end row -->

<?php endforeach; ?>

