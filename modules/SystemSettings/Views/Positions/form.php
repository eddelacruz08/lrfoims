                <div class="row">
                    <div class="col-md-8">
                        <h3><?= $edit?'Edit ':'Add '?><?= $title ?></h3>
                    </div>
                    <div class="col-md-4">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="/positions"><?= $title?></a></li>
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
                                <form method="POST" action="/positions/<?= $edit?'u/'.esc($id):'a'?>">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Position <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control <?= isset($errors['position']) ? 'is-invalid':'is-valid' ?>" name="position" placeholder="Position" value="<?= isset($value['position']) ? esc($value['position']) : '' ?>">
                                            <?php if(isset($errors['position'])):?>
                                                <small class="text-danger"><?=esc($errors['position'])?></small>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Description <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control <?= isset($errors['description']) ? 'is-invalid':'is-valid' ?>" name="description" placeholder="Description" value="<?= isset($value['description']) ? esc($value['description']) : '' ?>">
                                            <?php if(isset($errors['description'])):?>
                                                <small class="text-danger"><?=esc($errors['description'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-plus"></i> <?=$action?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>