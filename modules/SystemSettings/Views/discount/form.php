<div class="row">
    <div class="col-xxl-12">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?=base_url()?>/order-user-discounts"><?= $title ?></a></li>
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
                    <form method="POST" action="<?=base_url()?>/order-user-discounts/<?= $edit ? 'u/'.esc($id) : 'a' ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Customer Type Name <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['customer_type']) ? 'is-invalid':'is-valid' ?>" name="customer_type" placeholder="customer type name" value="<?= isset($value['customer_type']) ? esc($value['customer_type']) : '' ?>">
                                <?php if(isset($errors['customer_type'])):?>
                                    <small class="text-danger"><?=esc($errors['customer_type'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Description<small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['description']) ? 'is-invalid':'is-valid' ?>" name="description" placeholder="Description" value="<?= isset($value['description']) ? esc($value['description']) : '' ?>">
                                <?php if(isset($errors['description'])):?>
                                    <small class="text-danger"><?=esc($errors['description'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Amount <small class="text-danger">* <?= $edit ? '': 'Note: Please input amount percentage of discount. The System will convert into decimal amount.' ?> </small></label>
                                <input type="number" step=".001" class="form-control <?= isset($errors['discount_amount']) ? 'is-invalid':'is-valid' ?>" name="discount_amount" placeholder="Discount Amount" value="<?= isset($value['discount_amount']) ? esc($value['discount_amount']) : '' ?>">
                                <?php if(isset($errors['discount_amount'])):?>
                                    <small class="text-danger"><?=esc($errors['discount_amount'])?></small>
                                <?php endif;?>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-sm btn-success float-end mt-2"><?= $action ?></button>
                        <a href="/order-user-discounts" class="btn btn-sm btn-warning float-end mt-2 me-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div> <!-- end card-->
    </div><!-- end col -->
</div>   
