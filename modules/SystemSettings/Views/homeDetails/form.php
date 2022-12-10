<div class="row">
    <div class="col-xxl-12">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/home-details"><?= $title ?></a></li>
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
                    <form method="POST" action="/home-details/<?= $edit ? 'u/'.esc($id) : 'a' ?>" enctype="multipart/form-data">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="inputEmail4">Change Logo <small class="text-danger">*</small></label>
                                <input type="file" class="form-control <?= isset($errors['image']) ? 'is-invalid':'is-valid' ?>"  value="<?= isset($value['image']) ? $value['image'] : '' ?>" name="image" accept="image/*">
                            </div>
                            <div class="col-md-6">
                                <img src="/assets/img/<?= isset($value['image']) ? $value['image'] : '' ?>" alt="restaurant logo" class="img-fluid" width="100" height="100"/>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="inputEmail4">Restaurant Name <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['restaurant_name']) ? 'is-invalid':'is-valid' ?>" id="inputEmail4" name="restaurant_name" placeholder="Restaurant Name" value="<?= isset($value['restaurant_name']) ? $value['restaurant_name'] : '' ?>">
                                <?php if(isset($errors['restaurant_name'])):?>
                                    <small class="text-danger"><?=esc($errors['restaurant_name'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="inputEmail4">Body Description <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['body_desc']) ? 'is-invalid':'is-valid' ?>" id="inputEmail4" name="body_desc" placeholder="Body Description" value="<?= isset($value['body_desc']) ? $value['body_desc'] : '' ?>">
                                <?php if(isset($errors['body_desc'])):?>
                                    <small class="text-danger"><?=esc($errors['body_desc'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="inputEmail4">Footer Description <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['footer_desc']) ? 'is-invalid':'is-valid' ?>" id="inputEmail4" name="footer_desc" placeholder="Footer Description" value="<?= isset($value['footer_desc']) ? $value['footer_desc'] : '' ?>">
                                <?php if(isset($errors['footer_desc'])):?>
                                    <small class="text-danger"><?=esc($errors['footer_desc'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="inputEmail4">Full Address <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['location']) ? 'is-invalid':'is-valid' ?>" id="inputEmail4" name="location" placeholder="Full address" value="<?= isset($value['location']) ? $value['location'] : '' ?>">
                                <?php if(isset($errors['location'])):?>
                                    <small class="text-danger"><?=esc($errors['location'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4">Contact Number <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['contact']) ? 'is-invalid':'is-valid' ?>" id="inputEmail4" name="contact" placeholder="Contact Number" value="<?= isset($value['contact']) ? $value['contact'] : '' ?>">
                                <?php if(isset($errors['contact'])):?>
                                    <small class="text-danger"><?=esc($errors['contact'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="inputEmail4">Email Address <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['email_address']) ? 'is-invalid':'is-valid' ?>" id="inputEmail4" name="email_address" placeholder="Email Address" value="<?= isset($value['email_address']) ? $value['email_address'] : '' ?>">
                                <?php if(isset($errors['email_address'])):?>
                                    <small class="text-danger"><?=esc($errors['email_address'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4">Facebook Link <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['fb_link']) ? 'is-invalid':'is-valid' ?>" id="inputEmail4" name="fb_link" placeholder="Facebook Link" value="<?= isset($value['fb_link']) ? $value['fb_link'] : '' ?>">
                                <?php if(isset($errors['fb_link'])):?>
                                    <small class="text-danger"><?=esc($errors['fb_link'])?></small>
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
