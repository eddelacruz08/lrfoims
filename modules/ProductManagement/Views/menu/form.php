<div class="row">
    <div class="col-md-8">
        <h3><?= $edit?'Edit ':'Add '?><?= $title ?></h3>
    </div>
    <div class="col-md-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/menu-list"><?= $title?></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?= $edit? 'Edit' : 'Add' ?>
                </li>
            </ol>
        </nav>
    </div>
</div>
<div class="card shadow-sm rounded" id="main-holder">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="/menu-list/<?= $edit ? 'u/'.$id : 'a' ?>" enctype="multipart/form-data">            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">Image <small class="text-danger">*</small></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?= isset($errors['image']) ? 'is-invalid':'is-valid' ?>" name="image" id="customFile" accept="image/*">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    <?php if(isset($errors['image'])):?>
                                        <small class="text-danger"><?=esc($errors['image'])?></small>
                                    <?php endif;?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">Menu Name <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control <?= isset($errors['menu']) ? 'is-invalid':'is-valid' ?>" id="inputAddress2" name="menu" placeholder="Menu Name" value="<?= isset($value['menu']) ? $value['menu'] : '' ?>">
                                    <?php if(isset($errors['menu'])):?>
                                        <small class="text-danger"><?=esc($errors['menu'])?></small>
                                    <?php endif;?>
                                </div>
                            </div>           
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">Price <small class="text-danger">*</small></label>
                                    <input type="number" min="0" class="form-control <?= isset($errors['price']) ? 'is-invalid':'is-valid' ?>" id="inputAddress2" name="price" placeholder="Price" value="<?= isset($value['price']) ? $value['price'] : '' ?>">
                                    <?php if(isset($errors['price'])):?>
                                        <small class="text-danger"><?=esc($errors['price'])?></small>
                                    <?php endif;?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">Menu Category <small class="text-danger">*</small></label>
                                    <select class="custom-select  <?= isset($errors['menu_category_id']) ? 'is-invalid':'is-valid' ?>" name="menu_category_id">
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
                            <button type="submit" class="btn btn-success float-right">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>