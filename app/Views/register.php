<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 offset-md-6 col-sm-4 offset-sm-12 mx-auto">
            <div class="card rounded shadow m-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="h3">User Registration</div>
                            <hr>
                        </div>
                    </div>
                    <form method="post" action="/register">
                        <div class="row mb-1">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="inputAddress2">First Name: <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control <?= isset($errors['first_name']) ? 'is-invalid':'' ?>" name="first_name" id="first_name" value="<?= set_value('first_name');?>" placeholder="Enter first name">
                                </div>
                                <?php if(isset($errors['first_name'])):?>
                                    <small class="text-danger"><?=esc($errors['first_name'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="inputAddress2">Last Name: <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control <?= isset($errors['last_name']) ? 'is-invalid':'' ?>" name="last_name" id="last_name" value="<?= set_value('last_name');?>" placeholder="Enter last name">
                                </div>
                                <?php if(isset($errors['last_name'])):?>
                                    <small class="text-danger"><?=esc($errors['last_name'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="inputAddress2">Username: <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control <?= isset($errors['username']) ? 'is-invalid':'' ?>" name="username" id="username" value="<?= set_value('username');?>" placeholder="Enter username">
                                </div>
                                <?php if(isset($errors['username'])):?>
                                    <small class="text-danger"><?=esc($errors['username'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="inputAddress2">Email Address: <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control <?= isset($errors['email_address']) ? 'is-invalid':'' ?>" name="email_address" id="email_address" value="<?= set_value('email_address');?>" placeholder="Enter email address">
                                </div>
                                <?php if(isset($errors['email_address'])):?>
                                    <small class="text-danger"><?=esc($errors['email_address'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-sm-12">
                                <label for="inputAddress2">Region: <small class="text-danger">*</small></label>
                                <select class="js-example-basic-single <?= isset($errors['region_id']) ? 'is-invalid':'' ?> form-select" name="region_id" id="region_id">
                                    <option disabled value="" <?= isset($validation) ? null : 'selected' ?>>-- select region --</option>
                                    <?php foreach ($regions as $option) : ?>
                                        <?php $selected = false; ?>
                                        <?php if(isset($value['region_id'])):?>
                                            <?php if($value['region_id'] == $option['id']): ?>
                                                <?php $selected = true; ?>
                                            <?php endif; ?>
                                        <?php endif;?>
                                        <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= ucwords($option['region_name']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if(isset($errors['region_id'])):?>
                                    <small class="text-danger"><?=esc($errors['region_id'])?></small>
                                <?php endif;?><br>
                                <label for="inputAddress2">Province: <small class="text-danger">*</small></label>
                                <select class="js-example-basic-single <?= isset($errors['province_id']) ? 'is-invalid':'' ?> form-select" data-toggle="select2" name="province_id" id="province_id">
                                    <option disabled value="" <?= isset($validation) ? null : 'selected' ?>>-- select province --</option>
                                    <?php foreach ($province as $option) : ?>
                                        <?php $selected = false; ?>
                                        <?php if(isset($value['province_id'])):?>
                                            <?php if($value['province_id'] == $option['id']): ?>
                                                <?php $selected = true; ?>
                                            <?php endif; ?>
                                        <?php endif;?>
                                        <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= ucwords($option['province_name']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if(isset($errors['province_id'])):?>
                                    <small class="text-danger"><?=esc($errors['province_id'])?></small>
                                <?php endif;?><br>
                                <label for="inputAddress2">City: <small class="text-danger">*</small></label>
                                <select class="js-example-basic-single <?= isset($errors['city_id']) ? 'is-invalid':'' ?> form-select" data-toggle="select2" name="city_id" id="city_id">
                                    <option disabled value="" <?= isset($validation) ? null : 'selected' ?>>-- select city --</option>
                                    <?php foreach ($city as $option) : ?>
                                        <?php $selected = false; ?>
                                        <?php if(isset($value['city_id'])):?>
                                            <?php if($value['city_id'] == $option['id']): ?>
                                                <?php $selected = true; ?>
                                            <?php endif; ?>
                                        <?php endif;?>
                                        <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= ucwords($option['city_name']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if(isset($errors['city_id'])):?>
                                    <small class="text-danger"><?=esc($errors['city_id'])?></small>
                                <?php endif;?><br>
                                <div class="form-group mb-2">
                                    <label for="inputAddress2">House #, Street & Baranggay: <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control <?= isset($errors['addtl_address']) ? 'is-invalid':'' ?>" name="addtl_address" id="addtl_address" value="<?= set_value('addtl_address');?>" placeholder="(House #, Street & Baranggay)">
                                </div>
                                <?php if(isset($errors['addtl_address'])):?>
                                    <small class="text-danger"><?=esc($errors['addtl_address'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row mb-2 mt-2">
                            <div class="col-md-6">
                                <label for="inputAddress2">Password: <small class="text-danger">*</small></label>
                                <input type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid':'' ?>" name="password" id="password" placeholder="Password">
                                <?php if(isset($errors['password'])):?>
                                    <small class="text-danger"><?=esc($errors['password'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress2">Confirm Password: <small class="text-danger">*</small></label>
                                <input type="password" class="form-control <?= isset($errors['confirm_password']) ? 'is-invalid':'' ?>" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                                <?php if(isset($errors['confirm_password'])):?>
                                    <small class="text-danger"><?=esc($errors['confirm_password'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row mb-2 mt-2">
                            <div class="col-6">
                                <a href="/login">Already have an account.</a>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary float-end">Sign Up</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>