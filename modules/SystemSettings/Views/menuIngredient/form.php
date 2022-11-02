<div class="row">
    <div class="col-xxl-12">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/menu-ingredients"><?= $title ?></a></li>
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
                    <form method="POST" action="/menu-ingredients/<?= $edit ? 'u/'.esc($id) : 'a' ?>">
                        <div class="row mb-2">
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">Menu Name List <small class="text-danger">*</small></label>
                                <select class="form-control  <?= isset($errors['menu_id']) ? 'is-invalid':'is-valid' ?>" name="menu_id">
                                    <option value="" <?= isset($validation) ? null : 'selected' ?>>-- select --</option>
                                    <?php foreach ($menus as $option) : ?>
                                        <?php $selected = false; ?>
                                        <?php if(isset($value['menu_id'])):?>
                                            <?php if($value['menu_id'] == $option['id']): ?>
                                                <?php $selected = true; ?>
                                            <?php endif; ?>
                                        <?php endif;?>
                                        <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= $option['menu'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if(isset($errors['menu_id'])):?>
                                    <small class="text-danger"><?=esc($errors['menu_id'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">Ingredient Name List <small class="text-danger">*</small></label>
                                <select class="form-control  <?= isset($errors['ingredient_id']) ? 'is-invalid':'is-valid' ?>" name="ingredient_id">
                                    <option value="" <?= isset($validation) ? null : 'selected' ?>>-- select --</option>
                                    <?php foreach ($ingredients as $option) : ?>
                                        <?php $selected = false; ?>
                                        <?php if(isset($value['ingredient_id'])):?>
                                            <?php if($value['ingredient_id'] == $option['id']): ?>
                                                <?php $selected = true; ?>
                                            <?php endif; ?>
                                        <?php endif;?>
                                        <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= $option['product_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if(isset($errors['ingredient_id'])):?>
                                    <small class="text-danger"><?=esc($errors['ingredient_id'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputEmail4">Unit of Measure <small class="text-danger">*</small></label>
                                <div class="input-group">
                                    <input type="text" aria-describedby="basic-addon1" class="form-control <?= isset($errors['unit_quantity']) ? 'is-invalid':'is-valid' ?>" id="inputAddress2" name="unit_quantity" placeholder="Enter Unit Number" value="<?= isset($value['unit_quantity']) ? $value['unit_quantity'] : '' ?>">
                                    <select class="form-control <?= isset($errors['product_description_id']) ? 'is-invalid':'is-valid' ?>" name="product_description_id">
                                        <option value="" <?= isset($validation) ? null : 'selected' ?>>-- select measure --</option>
                                        <?php foreach ($ingredientDescription as $option) : ?>
                                            <?php $selected = false; ?>
                                            <?php if(isset($value['product_description_id'])):?>
                                                <?php if($value['product_description_id'] == $option['id']): ?>
                                                    <?php $selected = true; ?>
                                                <?php endif; ?>
                                            <?php endif;?>
                                            <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= $option['description'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <?php if(isset($errors['unit_quantity'])):?>
                                    <small class="text-danger"><?=esc($errors['unit_quantity'])?> |</small>
                                <?php endif;?>
                                <?php if(isset($errors['product_description_id'])):?>
                                    <small class="text-danger"> <?=esc($errors['product_description_id'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress2">Amount <small class="text-danger">*</small></label>
                                <input type="text" class="form-control  <?= isset($errors['price']) ? 'is-invalid':'is-valid' ?>" id="inputAddress2" name="price" placeholder="Enter Ingredient Amount" value="<?= isset($value['price']) ? $value['price'] : '' ?>">
                                <?php if(isset($errors['price'])):?>
                                    <small class="text-danger"><?=esc($errors['price'])?></small>
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
