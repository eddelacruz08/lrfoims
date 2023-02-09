<div class="row">
    <div class="col-xxl-12">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?=base_url()?>/ingredient-measures"><?= $title ?></a></li>
                            <li class="breadcrumb-item active"><?= $edit?'Edit ':'Add '?><?= $title ?></li>
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
                <h5 class="card-title mb-0"><?= $edit?'Edit ':'Add '?><?= $title ?></h5>
                                
                <div id="cardCollpase1" class="collapse pt-3 show">
                    <form method="POST" action="<?=base_url()?>/ingredient-measures/<?= $edit ? 'u/'.esc($id) : 'a' ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputEmail4">Measurement Name <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['name']) ? 'is-invalid':'is-valid' ?>" id="inputEmail4" name="name" placeholder="Product Status Name" value="<?= isset($value['name']) ? $value['name'] : '' ?>">
                                <?php if(isset($errors['name'])):?>
                                    <small class="text-danger"><?=esc($errors['name'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputAddress2">Description <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['description']) ? 'is-invalid':'is-valid' ?>" id="inputAddress2" name="description" placeholder="Product Status Description" value="<?= isset($value['description']) ? $value['description'] : '' ?>">
                                <?php if(isset($errors['description'])):?>
                                    <small class="text-danger"><?=esc($errors['description'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputAddress2">Low Stock Minimum Limit (Need for notification when low ingredients) <small class="text-danger">*</small></label>
                                <input type="number" step=".001" class="form-control <?= isset($errors['low_stock_minimum_limit']) ? 'is-invalid':'is-valid' ?>" id="inputAddress2" name="low_stock_minimum_limit" placeholder="Enter minimum value limit for ingredients" value="<?= isset($value['low_stock_minimum_limit']) ? $value['low_stock_minimum_limit'] : '' ?>">
                                <?php if(isset($errors['low_stock_minimum_limit'])):?>
                                    <small class="text-danger"><?=esc($errors['low_stock_minimum_limit'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success float-end mt-2"><?= $action ?></button>
                    </form>
                </div>
            </div>
        </div> <!-- end card-->
    </div><!-- end col -->
</div>   