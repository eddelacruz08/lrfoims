                <div class="row">
                    <div class="col-md-8">
                        <h3><?= $edit?'Edit ':'Add '?><?= $title ?></h3>
                    </div>
                    <div class="col-md-4">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="/organization-officers"><?= $title?></a></li>
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
                                <form method="POST" action="/organization-officers/<?= $edit ? 'u/'.$id : 'a' ?>">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="row">
                                            <div class="col">
                                                <label class="form-label" for="permission_id">Student Name <small class="text-danger">*</small></label>
                                                <div class="input-group mb-2">
                                                <select class="js-example-basic-multiple form-control" name="student_id" id="student_id">
                                                    <option value="x" <?= isset($validation) ? null : 'selected' ?>>-- select --</option>
                                                    <?php foreach ($students as $option) : ?>
                                                        <?php $selected = false; ?>
                                                        <?php if(isset($value['student_id'])):?>
                                                            <?php if($value['student_id'] == $option['id']): ?>
                                                                <?php $selected = true; ?>
                                                            <?php endif; ?>
                                                        <?php endif;?>
                                                        <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= $option['first_name'] . ' ' . $option['last_name'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                </div>
                                                <?php if(isset($errors['student_id'])):?>
                                                    <p class="text-danger"><?=esc($errors['student_id'])?><p>
                                                <?php endif;?>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Position <small class="text-danger">*</small></label>
                                            <select class="custom-select <?= isset($errors['org_position_id']) ? 'is-invalid':'is-valid' ?>" name="org_position_id">
                                                <option value="x" <?= isset($validation) ? null : 'selected' ?>>-- select --</option>
                                                <?php foreach ($positions as $option) : ?>
                                                    <?php $selected = false; ?>
                                                    <?php if(isset($value['org_position_id'])):?>
                                                        <?php if($value['org_position_id'] == $option['id']): ?>
                                                            <?php $selected = true; ?>
                                                        <?php endif; ?>
                                                    <?php endif;?>
                                                    <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= $option['position'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if(isset($errors['org_position_id'])):?>
                                                <small class="text-danger"><?=esc($errors['org_position_id'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success float-right">Add Officer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>