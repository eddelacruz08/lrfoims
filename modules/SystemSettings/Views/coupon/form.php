<div class="row">
    <div class="col-xxl-12">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?=base_url()?>/coupons"><?= $title ?></a></li>
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
                    <form method="POST" action="<?=base_url()?>/coupons/<?= $edit ? 'u/'.esc($id) : 'a' ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Coupon Name <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['name']) ? 'is-invalid':'is-valid' ?>" name="name" placeholder="Name" value="<?= isset($value['name']) ? esc($value['name']) : '' ?>">
                                <?php if(isset($errors['name'])):?>
                                    <small class="text-danger"><?=esc($errors['name'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Description <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['description']) ? 'is-invalid':'is-valid' ?>" name="description" placeholder="Description" value="<?= isset($value['description']) ? esc($value['description']) : '' ?>">
                                <?php if(isset($errors['description'])):?>
                                    <small class="text-danger"><?=esc($errors['description'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Amount <small class="text-danger">*</small></label>
                                <input type="number" class="form-control <?= isset($errors['amount']) ? 'is-invalid':'is-valid' ?>" name="amount" placeholder="Amount" value="<?= isset($value['amount']) ? esc($value['amount']) : '' ?>">
                                <?php if(isset($errors['amount'])):?>
                                    <small class="text-danger"><?=esc($errors['amount'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col-md-6">
                                <label>Expiration Date <small class="text-danger">*</small></label>
                                <input type="date" class="form-control <?= isset($errors['expiration_date']) ? 'is-invalid':'is-valid' ?>" name="expiration_date" placeholder="Date" value="<?= isset($value['expiration_date']) ? esc($value['expiration_date']) : '' ?>">
                                <?php if(isset($errors['expiration_date'])):?>
                                    <small class="text-danger"><?=esc($errors['expiration_date'])?></small>
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
