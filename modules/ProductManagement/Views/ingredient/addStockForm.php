<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12">
        <div class="page-title-box p-0 m-0">
            <h4 class="float-start pb-1 ps-1 pe-1 border-bottom border-primary"><?= $title ?></h4>
            <button type="button" onclick="displayIngredients('/ingredients/ingredient-list-data',<?=$category_id?>);" class="btn btn-sm btn-outline-dark float-end">Go back</button>
        </div>
    </div>
</div>

<div class="row mt-2 mb-2">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12">
        <form id="stockForm">
            <input type="hidden" value="<?=$id?>" name="id" id="ingredient_id<?=$id?>">
            <input type="hidden" value="<?=$category_id?>" name="category_id" id="category_id<?=$id?>">
            <div class="row mb-1">
                <div class="col-sm-6 mb-1">
                    <label for="unit_quantity" class="form-label">Unit of Quantity: <span class="text-danger">*</span></label>
                    <input type="number" id="unit_quantity<?=$id?>" name="unit_quantity" value="" placeholder="Enter unit of quantity" class="form-control form-control-sm" step=".001">
                    <small class="text-danger"></small>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-sm-6 mb-1">
                    <label for="price" class="form-label">Enter current price per measurement: <span class="text-danger">*</span></label>
                    <input type="number" id="price<?=$id?>" value="" name="price" placeholder="Enter current price" class="form-control form-control-sm" step=".001">
                    <small class="text-danger"></small>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-sm-6 mb-1">
                    <label for="date_expiration" class="form-label">Expiration Date: <span class="text-danger">*</span></label>
                    <input type="date" id="date_expiration<?=$id?>" value="" name="date_expiration" class="form-control form-control-sm">
                    <small class="text-danger"></small>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-sm-6 mb-1">
                    <!-- <input type="submit" class="btn btn-sm btn-success float-end" value="Submit"> -->
                    <button type="button" onclick="submitAddStockForm(
                            '/ingredients/stocks/a',
                            $('#ingredient_id<?=$id?>').val(),
                            $('#category_id<?=$id?>').val(),
                            $('#unit_quantity<?=$id?>').val(),
                            $('#price<?=$id?>').val(),
                            $('#date_expiration<?=$id?>').val(),
                            $('#unit_quantity<?=$id?>'),
                            $('#price<?=$id?>'),
                            $('#date_expiration<?=$id?>'),
                            '/ingredients/ingredient-list-data',
                            <?=$category_id?>
                        );" class="btn btn-sm btn-success float-end">Add Stock</button>
                </div>
            </div>
        </form>
    </div>
</div> 
