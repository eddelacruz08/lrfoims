<div class="row">
    <div class="col-xxl-12">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/order-max-limit"><?= $title ?></a></li>
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
                    <form method="POST" action="/order-max-limit/<?= $edit ? 'u/'.esc($id) : 'a' ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Maximum Limit Order: <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['max_limit']) ? 'is-invalid':'is-valid' ?>" name="max_limit" placeholder="Maximum Limit Order" value="<?= isset($value['max_limit']) ? esc($value['max_limit']) : '' ?>">
                                <?php if(isset($errors['max_limit'])):?>
                                    <small class="text-danger"><?=esc($errors['max_limit'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col-md-6">
                                <label>Order Type: <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['order_type']) ? 'is-invalid':'is-valid' ?>" name="order_type" placeholder="Order Type" value="<?= isset($value['order_type']) ? esc($value['order_type']) : '' ?>">
                                <?php if(isset($errors['order_type'])):?>
                                    <small class="text-danger"><?=esc($errors['order_type'])?></small>
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
