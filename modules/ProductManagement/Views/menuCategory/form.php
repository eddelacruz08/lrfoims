<div class="row">
                    <div class="col-md-8">
                        <h3><?= $edit?'Edit ':'Add '?><?= $title ?></h3>
                    </div>
                    <div class="col-md-4">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="/menu-category"><?= $title?></a></li>
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
                                <form method="POST" action="/menu-category/<?= $edit ? 'u/'.$id : 'a' ?>" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Menu Category Name <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control  <?= isset($errors['name']) ? 'is-invalid':'is-valid' ?>" id="inputEmail4" name="name" placeholder="Menu Category Name" value="<?= isset($value['name']) ? $value['name'] : '' ?>">
                                            <?php if(isset($errors['name'])):?>
                                                <small class="text-danger"><?=esc($errors['name'])?></small>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Description <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control  <?= isset($errors['description']) ? 'is-invalid':'is-valid' ?>" id="inputAddress2" name="description" placeholder="Description" value="<?= isset($value['description']) ? $value['description'] : '' ?>">
                                            <?php if(isset($errors['description'])):?>
                                                <small class="text-danger"><?=esc($errors['description'])?></small>
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