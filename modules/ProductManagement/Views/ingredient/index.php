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
                <?php if(user_link('ingredients/a', session()->get('userPermissionView'))):?>
                    <a class="btn btn-primary btn-sm float-end" href="<?=base_url()?>/ingredients/a" role="button"> Add Ingredient</a>
                <?php else: ?>
                    <button type="button" class="btn btn-primary btn-sm mt-1">No Permission | add ingredient</button>
                <?php endif; ?>
            </div>
            <div class="card-body p-1">
                <div class="row">
                    <div class="col-sm-3 mb-2 mb-sm-0">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <?php foreach($ingredientCategory as $category):?>
                                <a class="nav-link show border-bottom" onclick="displayIngredients('<?=base_url()?>/ingredients/ingredient-list-data',<?=$category['id']?>);" id="ingredientsTab-tab-<?=$category['id']?>" data-bs-toggle="pill" href="#ingredientsTab-<?=$category['id']?>" role="tab" aria-controls="v-pills-home" aria-selected="true">
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
