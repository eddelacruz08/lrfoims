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
                                <form method="POST" action="/product-category/<?= $edit ? 'u/'.$id : 'a' ?>" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Product Category Name <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control  <?= isset($errors['product_name']) ? 'is-invalid':'is-valid' ?>" id="inputEmail4" name="product_name" placeholder="Product Name" value="<?= isset($value['product_name']) ? $value['product_name'] : '' ?>">
                                            <?php if(isset($errors['product_name'])):?>
                                                <small class="text-danger"><?=esc($errors['product_name'])?></small>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Product Category Description <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control  <?= isset($errors['product_description']) ? 'is-invalid':'is-valid' ?>" id="inputAddress2" name="product_description" placeholder="Product Quantity Description" value="<?= isset($value['product_description']) ? $value['product_description'] : '' ?>">
                                            <?php if(isset($errors['product_description'])):?>
                                                <small class="text-danger"><?=esc($errors['product_description'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success float-right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>