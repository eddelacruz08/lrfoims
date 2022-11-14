<div class="row">
    <div class="col-xxl-12">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/ingredients">Ingredients</a></li>
                            <li class="breadcrumb-item active"><?= $title ?></li>
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
                <h5 class="card-title mb-0"><?= $title ?></h5>

                <div id="cardCollpase1" class="collapse pt-3 show">
                    <form method="post" action="/ingredients/batch-upload/stock-in" enctype="multipart/form-data">
                        <div class="row mb-1">
                            <div class="col">
                                <input type="file" name="upload_file" class="form-control <?= isset($errors['upload_file']) ? 'is-invalid':'is-valid' ?>" 
                                    placeholder="Enter Name" id="upload_file" required
                                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" 
                                    value="<?= isset($value['upload_file']) ? $value['upload_file'] : '' ?>">

                                <?php if(isset($errors['upload_file'])):?>
                                    <small class="text-danger"><?=esc($errors['upload_file'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-md"> Batch Upload</button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div> <!-- end card-->
    </div><!-- end col -->
</div>   
