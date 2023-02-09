
<div class="row">
   <div class="col-sm-3 mb-2 mb-sm-0">
       <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <?php foreach($ingredientCategory as $category):?>
                <a class="nav-link show" onclick="displayIngredients('<?=base_url()?>/ingredients/ingredient-list-data', <?=$category['id']?>);" id="ingredientsTab-tab-<?=$category['id']?>" data-bs-toggle="pill" href="#ingredientsTab-<?=$category['id']?>" role="tab" aria-controls="v-pills-home" aria-selected="true">
                    <span class=" d-md-none d-block"><?=$category['product_name']?></span>
                    <span class="d-none d-md-block"><?=$category['product_name']?></span>
                </a>
            <?php endforeach; ?>
       </div>
   </div>
   <div class="col-sm-9">
       <div class="tab-content">
            <?php foreach($ingredientCategory as $category):?>
                <div class="tab-pane fade show" id="ingredientsTab-<?=$category['id']?>" role="tabpanel" aria-labelledby="ingredientsTab-tab-<?=$category['id']?>">
                    <div class="table-responsive table-responsive-sm">
                        <table class="table text-center table-sm table-hover dt-responsive nowrap w-100">
                            <thead class="bg-secondary text-white">
                                <tr>
                                    <th>Name</th>
                                    <th>Unit of measure</th>
                                    <th>Current Price</th>
                                    <th>Status</th>
                                    <th>Stock In</th>
                                    <th>View Stocks</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="v-pills-tabContent-ingredients" onload="getIngredientData();"></tbody>
                        </table>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
   </div>
</div>