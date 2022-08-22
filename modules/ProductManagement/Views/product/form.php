                <div class="row">
                    <div class="col-md-8">
                        <h3><?= $edit?'Edit ':'Add '?><?= $title ?></h3>
                    </div>
                    <div class="col-md-4">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="/ingredients"><?= $title?></a></li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            <?= $edit? 'Edit' : 'Add' ?>
                                        </li>
                                    </ol>
                                </nav>
                    </div>
                </div>
                <div class="card shadow-sm rounded" id="main-holder">
                <div class="card-header"></div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="/products/<?= $edit ? 'u/'.$id : 'a' ?>" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Product Name <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control  <?= isset($errors['product_name']) ? 'is-invalid':'is-valid' ?>" id="inputEmail4" name="product_name" placeholder="Product Name" value="<?= isset($value['product_name']) ? $value['product_name'] : '' ?>">
                                            <?php if(isset($errors['product_name'])):?>
                                                <small class="text-danger"><?=esc($errors['product_name'])?></small>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Product Category <small class="text-danger">*</small></label>
                                            <select class="custom-select  <?= isset($errors['product_category_id']) ? 'is-invalid':'is-valid' ?>" name="product_category_id">
                                                <option value="x" <?= isset($validation) ? null : 'selected' ?>>-- select --</option>
                                                <?php foreach ($productCategory as $option) : ?>
                                                    <?php $selected = false; ?>
                                                    <?php if(isset($value['product_category_id'])):?>
                                                        <?php if($value['product_category_id'] == $option['id']): ?>
                                                            <?php $selected = true; ?>
                                                        <?php endif; ?>
                                                    <?php endif;?>
                                                    <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= $option['product_name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if(isset($errors['product_category_id'])):?>
                                                <small class="text-danger"><?=esc($errors['product_category_id'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Product Quantity Description <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control  <?= isset($errors['product_quantity_description']) ? 'is-invalid':'is-valid' ?>" id="inputAddress2" name="product_quantity_description" placeholder="Product Quantity Description" value="<?= isset($value['product_quantity_description']) ? $value['product_quantity_description'] : '' ?>">
                                            <?php if(isset($errors['product_quantity_description'])):?>
                                                <small class="text-danger"><?=esc($errors['product_quantity_description'])?></small>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Product Status <small class="text-danger">*</small></label>
                                            <select class="custom-select  <?= isset($errors['product_status_id']) ? 'is-invalid':'is-valid' ?>" name="product_status_id">
                                                <option value="x" <?= isset($validation) ? null : 'selected' ?>>-- select --</option>
                                                <?php foreach ($productCategoryStatus as $option) : ?>
                                                    <?php $selected = false; ?>
                                                    <?php if(isset($value['product_status_id'])):?>
                                                        <?php if($value['product_status_id'] == $option['id']): ?>
                                                            <?php $selected = true; ?>
                                                        <?php endif; ?>
                                                    <?php endif;?>
                                                    <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= $option['equipment_status'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if(isset($errors['product_status_id'])):?>
                                                <small class="text-danger"><?=esc($errors['product_status_id'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success float-right">Add Product</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>