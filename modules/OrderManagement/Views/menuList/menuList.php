<div class="row">
    <?php if(empty($getCreatedOrderNumber)):?>
        <div class="col-md-12 col-lg-12 col-xxl-12 d-grid gap-2 d-md-block">
            <button onclick="createOrderNumber('<?=base_url()?>/orders/create-order-number');" title="Start add to cart" type="button" class="btn btn-lg btn-outline-dark m-2">
                Start add to cart!
            </button>
        </div>
    <?php else: ?>             
        <?php foreach ($getCreatedOrderNumber as $orderDetails) : ?>
            <div class="special-menu text-center">
                <div class="button-group filter-button-group m-0 mb-2">
                    <button class="active" data-filter="*">All</button>
                    <?php foreach($menuCategory as $category):?>
                        <button data-filter=".<?=$category['id']?>"><?=$category['name']?></button>
                    <?php endforeach; ?>
                </div>
            </div>      
            <?php if(!empty($menuCategory)):?>
                <div class="row special-list">
                    <?php foreach ($menuCategory as $category) : ?> 
                        <?php if(!empty($menuLists)):?>
                            <?php foreach ($menuLists as $row) : ?>
                                <?php if($category['id'] == $row['menu_category_id']): ?>
                                    <div class="col-sm-12 col-md-6 col-lg-3 col-xxl-3 special-grid <?=$category['id']?>" id="resize-card-contents">
                                        <div type="button" onclick="addToCartAdminMenu('<?=base_url()?>/orders/admin-menu/add-to-cart/a', <?=$row['id']?>, <?=$orderDetails['id'];?>,'<?=base_url()?>/orders/admin-menu/order-cart-list-data');" class="card h-70 rounded shadow p-1" id="menu-list-hover">
                                            <img src="<?=base_url()?>/assets/uploads/menu/<?=$row['image'] ?>" height="150" class="card-img-top mb-2" style="max-height: 300px;" id="image-resize-height" alt="...">
                                            <div class="card-body p-0" id="menuCardBodyResize">
                                                <p class="card-title h5" id="menuCartTitle"><?= ucfirst($row['menu']); ?></p>
                                                <p class="card-text">₱ <?= number_format($row['price']); ?></p> 
                                            </div>
                                            <div class="card-footer p-0">                          
                                                <?php if($row['menu_status'] == 'u'): ?>
                                                    <div class="d-flex flex-column mt-0">
                                                        <button class="btn m-1 btn-sm btn-danger" animation="true" type="button" title="Unavailable" disabled>Unavailable</button>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="d-flex flex-column mt-0">
                                                        <input type="hidden" data-toggle="touchspin" id="quantity<?=$row['id']?>" min="1" max="10" onkeydown="if(event.key==='.'){event.preventDefault();}"  
                                                            oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');" name="quantity" value="1" class="form-control inputQuantityValue" placeholder="Quantity" required>
                                                    </div>                    
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            No menu list
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                No menu category
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<script src="<?=base_url()?>/assets/lamon-js/jquery.superslides.min.js"></script>
<script src="<?=base_url()?>/assets/lamon-js/images-loded.min.js"></script>
<script src="<?=base_url()?>/assets/lamon-js/isotope.min.js"></script>
<script src="<?=base_url()?>/assets/lamon-js/custom.js"></script>