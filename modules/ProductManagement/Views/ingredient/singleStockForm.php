<div class="row">
    <div class="col-xxl-12">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/ingredients">Ingredients</a></li>
                            <li class="breadcrumb-item active"><?= $title ?></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?= $title ?></h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

    </div> <!-- end col -->

</div>

<div class="row">

    <!-- task details -->
    <div class="col-xxl-12">
        <!-- Portlet card -->
        <div class="card mb-md-0 mb-3">
            <div class="card-body">
                <h5 class="card-title mb-0"><?= $title ?></h5>

                <div id="cardCollpase1" class="collapse pt-3 show">
                    <form action="/ingredients/stocks/<?= esc($id)?>" method="post">
                        <div class="row">
                            <div class="col-sm-12 mb-1">
                                <label for="stock_type" class="form-label">Stock type: </label>
                                <select class="form-select form-select-sm <?= isset($errors['stock_type']) ? 'is-invalid':'is-valid' ?>" id="stock_type" name="stock_type">
                                    <option value="">-- Select --</option>
                                    <option value="in">Stock In</option>
                                    <option value="out">Stock Out</option>
                                </select>
                                <?php if(isset($errors['stock_type'])):?>
                                    <small class="text-danger"><?=esc($errors['stock_type'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-sm-6 mb-1">
                                <label for="unit_quantity" class="form-label">Unit of Measure: </label>
                                <input type="text" id="unit_quantity" name="unit_quantity" placeholder="Enter unit of measure" class="form-control form-control-sm <?= isset($errors['unit_quantity']) ? 'is-invalid':'is-valid' ?>" value="<?= isset($value['unit_quantity']) ? $value['unit_quantity'] : '' ?>">
                                <?php if(isset($errors['unit_quantity'])):?>
                                    <small class="text-danger"><?=esc($errors['unit_quantity'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col-sm-6 mb-1">
                                <label for="price" class="form-label">Estimated Amount: </label>
                                <input type="text" id="price" name="price" placeholder="Enter amount" class="form-control form-control-sm <?= isset($errors['price']) ? 'is-invalid':'is-valid' ?>" value="<?= isset($value['price']) ? $value['price'] : '' ?>">
                                <?php if(isset($errors['price'])):?>
                                    <small class="text-danger"><?=esc($errors['price'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success float-end">Submit</button>
                    </form>
                </div>
            </div>
        </div> <!-- end card-->
    </div><!-- end col -->
</div>   
