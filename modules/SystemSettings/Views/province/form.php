<div class="row">
    <div class="col-xxl-12">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?=base_url()?>/provinces"><?= $title ?></a></li>
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
                    <form method="POST" action="<?=base_url()?>/provinces/<?= $edit ? 'u/'.esc($id) : 'a' ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <label>psgcCode <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['psgcCode']) ? 'is-invalid':'is-valid' ?>" name="psgcCode" placeholder="psgcCode" value="<?= isset($value['psgcCode']) ? esc($value['psgcCode']) : '' ?>">
                                <?php if(isset($errors['psgcCode'])):?>
                                    <small class="text-danger"><?=esc($errors['psgcCode'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Province Name <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['province_name']) ? 'is-invalid':'is-valid' ?>" name="province_name" placeholder="Province Name" value="<?= isset($value['province_name']) ? esc($value['province_name']) : '' ?>">
                                <?php if(isset($errors['province_name'])):?>
                                    <small class="text-danger"><?=esc($errors['province_name'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Region Code <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['region_code']) ? 'is-invalid':'is-valid' ?>" name="region_code" placeholder="Region Code" value="<?= isset($value['region_code']) ? esc($value['region_code']) : '' ?>">
                                <?php if(isset($errors['region_code'])):?>
                                    <small class="text-danger"><?=esc($errors['region_code'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col-md-6">
                                <label>Province Code <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['province_code']) ? 'is-invalid':'is-valid' ?>" name="province_code" placeholder="Province Code" value="<?= isset($value['province_code']) ? esc($value['province_code']) : '' ?>">
                                <?php if(isset($errors['province_code'])):?>
                                    <small class="text-danger"><?=esc($errors['province_code'])?></small>
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
