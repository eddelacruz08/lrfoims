<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 m-0 p-0">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><?= $title ?></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?= $title ?></h4>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <!-- task details -->
    <div class="col-xxl-12 m-0 p-0">
        <!-- Portlet card -->
        <div class="card mb-md-0 mb-3 p-0">
            <div class="card-header m-0 p-1">
                <p class="float-start h5 m-0 mt-1 ms-2">Categories:</p>
                <div class="d-flex justify-content-end">
                    <?php if(user_link('ingredients/a', session()->get('userPermissionView'))):?>
                        <div class="ps-2"><a class="btn btn-primary btn-sm" href="/ingredients/a" role="button"> Add Ingredient</a></div>
                    <?php else: ?>
                        <div class="ps-2"><button type="button" class="btn btn-primary btn-sm mt-1">No Permission | add ingredient</button></div>
                    <?php endif; ?>
                    <div class="ms-2">
                        <!-- <button type="button" class="btn btn-info btn-sm m-0" data-bs-toggle="modal" data-bs-target="#info-alert-modal-import-ingredients">Import</button> -->
                        <button type="button" class="btn btn-info btn-sm m-0" data-bs-toggle="modal" data-bs-target="#info-alert-modal-export-ingredients">Export</button>
                    </div>
                    <!-- <div class="ps-2">
                        <input type="file" id="file" name="students" class="form-control form-control-sm" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                    </div>
                    <div class="ps-2">
                        <button onclick="insertSpreadsheet('/ingredients/insert-batch-spreadsheet')" class="btn btn-sm btn-upload btn-success">Upload</button>
                    </div> -->
                    
                    <div id="info-alert-modal-export-ingredients" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="ri-information-line h1 text-info"></i>
                                        <h4 class="mt-2">Backup Ingredients!</h4>
                                        <p class="mt-3">Export a backup data for ingredients.</p>
                                        <a class="btn btn-info btn-sm my-2" href="/ingredients/batch-upload/export" role="button"> Export</a>
                                        <button class="btn btn-danger btn-sm my-2" data-bs-dismiss="modal" type="button"> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="info-alert-modal-import-ingredients" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="ri-information-line h1 text-info"></i>
                                        <h4 class="mt-2">Import backup ingredients!</h4>
                                        <p class="mt-3">Import backup data to ingredients.</p>
                                        <input type="file" id="file" name="students" class="form-control form-control-sm" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                                        <button class="btn btn-info btn-sm my-2" onclick="importIngredientsBackupSpreadsheet('/ingredients/import-backup-ingredients')" type="button"> Import</button>
                                        <button class="btn btn-danger btn-sm my-2" data-bs-dismiss="modal"> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-1">
                <div class="row">
                    <div class="col-sm-3 mb-2 mb-sm-0">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <?php foreach($ingredientCategory as $category):?>
                                <a class="nav-link show border-bottom" onclick="displayIngredients('/ingredients/ingredient-list-data',<?=$category['id']?>);" id="ingredientsTab-tab-<?=$category['id']?>" data-bs-toggle="pill" href="#ingredientsTab-<?=$category['id']?>" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                    <span class=" d-md-none d-block"><?=$category['product_name']?></span>
                                    <span class="d-none d-md-block"><?=$category['product_name']?></span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="tab-content">
                            <div class="v-pills-tabContent-ingredients" id="v-pills-tabContent-ingredients">
                                <div class="card" style="border: 3px dashed gray; height: 200px;">
                                    <div class="card-body text-center h3 pt-5">
                                        Ingredient Display
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end card-->
    </div><!-- end col -->
</div> 
