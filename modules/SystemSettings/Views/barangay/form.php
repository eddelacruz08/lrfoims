<div class="row">
    <div class="col-xxl-12">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/barangay"><?= $title ?></a></li>
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
                    <form method="POST" action="/barangay/<?= $edit ? 'u/'.esc($id) : 'a' ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Barangay Name <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['barangay_name']) ? 'is-invalid':'is-valid' ?>" name="barangay_name" placeholder="Barangay Name" value="<?= isset($value['barangay_name']) ? esc($value['barangay_name']) : '' ?>">
                                <?php if(isset($errors['barangay_name'])):?>
                                    <small class="text-danger"><?=esc($errors['barangay_name'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>City Code <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['city_code']) ? 'is-invalid':'is-valid' ?>" name="city_code" placeholder="City Code" value="<?= isset($value['city_code']) ? esc($value['city_code']) : '' ?>">
                                <?php if(isset($errors['city_code'])):?>
                                    <small class="text-danger"><?=esc($errors['city_code'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col-md-6">
                                <label>Barangay Code <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['barangay_code']) ? 'is-invalid':'is-valid' ?>" name="barangay_code" placeholder="Barangay Code" value="<?= isset($value['barangay_code']) ? esc($value['barangay_code']) : '' ?>">
                                <?php if(isset($errors['barangay_code'])):?>
                                    <small class="text-danger"><?=esc($errors['barangay_code'])?></small>
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
