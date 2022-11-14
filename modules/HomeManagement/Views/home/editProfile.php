<div class="container">
    <div class="content">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/profile">Profile</a></li>
                            <li class="breadcrumb-item active">Edit Profile</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Profile</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 


        <div class="row">
            <div class="col-sm-12">
                <form method="POST" action="/edit-profile/<?= $edit ? 'u/'.esc($id) : 'a' ?>">
                    <?php if($edit):?>
                        <input type="hidden" name="userID" value="<?=$id?>">                             
                    <?php endif;?>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="inputEmail4">Last name <small class="text-danger">*</small></label>
                            <input type="text" class="form-control <?= isset($errors['last_name']) ? 'is-invalid':'is-valid' ?> " id="inputEmail4" name="last_name" placeholder="Last name" value="<?= isset($value['last_name']) ? esc($value['last_name']) : '' ?>">
                            <?php if(isset($errors['last_name'])):?>
                                <small class="text-danger"><?=esc($errors['last_name'])?></small>
                            <?php endif;?>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4">First name <small class="text-danger">*</small></label>
                            <input type="text" class="form-control <?= isset($errors['first_name']) ? 'is-invalid':'is-valid' ?> " id="inputPassword4" name="first_name" placeholder="First name" value="<?= isset($value['first_name']) ? esc($value['first_name']) : '' ?>">
                            <?php if(isset($errors['first_name'])):?>
                                <small class="text-danger"><?=esc($errors['first_name'])?></small>
                            <?php endif;?>   
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="inputCity">Email Address <small class="text-danger">*</small></label>
                            <input type="text" class="form-control <?= isset($errors['email_address']) ? 'is-invalid':'is-valid' ?> " id="inputCity" name="email_address" placeholder="Email Address" value="<?= isset($value['email_address']) ? esc($value['email_address']) : '' ?>">
                            <?php if(isset($errors['email_address'])):?>
                                <small class="text-danger"><?=esc($errors['email_address'])?></small>
                            <?php endif;?>    
                        </div>
                        <div class="col-md-6">
                            <input type="hidden" name="role_id" value="<?= isset($value['role_id']) ? esc($value['role_id']) : '' ?>">
                            <label for="inputAddress2">Username <small class="text-danger">*</small></label>
                            <input type="text" class="form-control <?= isset($errors['username']) ? 'is-invalid':'is-valid' ?>"  name="username" id="username" value="<?= isset($value['username']) ? esc($value['username']) : '' ?>" placeholder="Username">
                            <?php if(isset($errors['username'])):?>
                                <small class="text-danger"><?=esc($errors['username'])?></small>
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
                                <input type="text" class="form-control <?= isset($errors['addtl_address']) ? 'is-invalid':'' ?>" name="addtl_address" id="addtl_address" value="<?= isset($value['addtl_address']) ? esc($value['addtl_address']) : '' ?>" placeholder="(House #, Street & Baranggay)">
                            </div>
                            <?php if(isset($errors['addtl_address'])):?>
                                <small class="text-danger"><?=esc($errors['addtl_address'])?></small>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="inputAddress2">Password <small class="text-danger">*</small></label>
                            <input type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid':'is-valid' ?> " name="password" id="password" placeholder="Password">
                            <?php if(isset($errors['password'])):?>
                                <small class="text-danger"><?=esc($errors['password'])?></small>
                            <?php endif;?>    
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress2">Confirm Password <small class="text-danger">*</small></label>
                            <input type="password" class="form-control <?= isset($errors['confirm_password']) ? 'is-invalid':'is-valid' ?>" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                            <?php if(isset($errors['confirm_password'])):?>
                                <small class="text-danger"><?=esc($errors['confirm_password'])?></small>
                            <?php endif;?>    
                        </div>
                    </div>

                    <button type="submit" class="btn btn-sm btn-success float-end mt-2"><?= $action ?></button>
                </form>
            </div> <!-- end col-->
        </div>
        <!-- end row -->

    </div> <!-- End Content -->
</div> <!-- End Content -->