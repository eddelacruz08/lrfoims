<div class="row">
    <div class="col-xxl-12">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/menu-list"><?= $title ?></a></li>
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
                    <form action="/menu-list/<?= $edit ? 'u/'.esc($id) : 'a' ?>" enctype="multipart/form-data" method="POST">         
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputAddress2">Image <small class="text-danger">*</small></label>
                                <div class="custom-file">
                                    <input type="file" class="form-control <?= isset($errors['image']) ? 'is-invalid':'is-valid' ?>" name="image" id="image" accept="image/*">
                                </div>
                                <?php if(isset($errors['image'])):?>
                                    <small class="text-danger"><?=esc($errors['image'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress2">Menu Name <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['menu']) ? 'is-invalid':'is-valid' ?>" id="inputAddress2" name="menu" placeholder="Menu Name" value="<?= isset($value['menu']) ? $value['menu'] : '' ?>">
                                <?php if(isset($errors['menu'])):?>
                                    <small class="text-danger"><?=esc($errors['menu'])?></small>
                                <?php endif;?>
                            </div>
                        </div>           
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputAddress2">Price <small class="text-danger">*</small></label>
                                <input type="number" min="0" class="form-control <?= isset($errors['price']) ? 'is-invalid':'is-valid' ?>" id="inputAddress2" name="price" placeholder="Price" value="<?= isset($value['price']) ? $value['price'] : '' ?>">
                                <?php if(isset($errors['price'])):?>
                                    <small class="text-danger"><?=esc($errors['price'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress2">Menu Category <small class="text-danger">*</small></label>
                                <select class="form-select  <?= isset($errors['menu_category_id']) ? 'is-invalid':'is-valid' ?>" name="menu_category_id">
                                    <option value="" <?= isset($validation) ? null : 'selected' ?>>-- select --</option>
                                    <?php foreach ($menuCategory as $option) : ?>
                                        <?php $selected = false; ?>
                                        <?php if(isset($value['menu_category_id'])):?>
                                            <?php if($value['menu_category_id'] == $option['id']): ?>
                                                <?php $selected = true; ?>
                                            <?php endif; ?>
                                        <?php endif;?>
                                        <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= $option['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if(isset($errors['menu_category_id'])):?>
                                    <small class="text-danger"><?=esc($errors['menu_category_id'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-sm btn-success float-end mt-2" value="<?= $action ?>"/>
                        <!-- <button type="submit" class="btn btn-sm btn-success float-end mt-2"><?= $action ?></button> -->
                    </form>
                </div>
            </div>
        </div> <!-- end card-->
    </div><!-- end col -->
</div>   