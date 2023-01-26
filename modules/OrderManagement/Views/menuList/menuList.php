
<div class="row">
    <?php if(empty($getCreatedOrderNumber)):?>
        <div class="col-md-12 col-lg-12 col-xxl-12 d-grid gap-2 d-md-block">
            <button onclick="createOrderNumber('/orders/create-order-number');" title="Start add to cart" type="button" class="btn btn-lg btn-outline-dark m-2">
                Start add to cart!
            </button>
        </div>
    <?php else: ?>
        <?php foreach ($getCreatedOrderNumber as $orderDetails) : ?>
            <?php if(!empty($menuCategory)):?>
                <?php foreach ($menuCategory as $category) : ?> 
                    <div class="col-md-12 col-lg-12 col-xxl-12">
                        <div class="card border-secondary bg-dark text-white border rounded mb-2 p-0">
                            <div class="card-body m-0 p-2">
                                <h5 class="card-title m-0 p-0"><?= ucfirst($category['name']); ?></h5>
                            </div>
                        </div>
                    </div>
                    <?php if(!empty($menuLists)):?>
                        <?php foreach ($menuLists as $row) : ?>
                            <?php if($category['id'] == $row['menu_category_id']): ?>
                                <div class="col-sm-12 col-md-6 col-lg-3 col-xxl-3" id="resize-card-contents">
                                    <div type="button" button onclick="addToCartAdminMenu('/orders/admin-menu/add-to-cart/a', <?=$row['id']?>, <?=$orderDetails['id'];?>,'/orders/admin-menu/order-cart-list-data');" class="card h-70 rounded shadow p-1" id="menu-list-hover">
                                        <img src="/assets/uploads/menu/<?=$row['image'] ?>" height="150" class="card-img-top mb-2" style="max-height: 300px;" id="image-resize-height" alt="...">
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
                                                    <!-- <button onclick="addToCartAdminMenu('/orders/admin-menu/add-to-cart/a', <?=$row['id']?>, <?=$orderDetails['id'];?>,'/orders/admin-menu/order-cart-list-data');" class="btn btn-sm btn-success mt-1" type="submit" id="addToCartButton">Add&nbsp;To&nbsp;Cart</button> -->
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
            <?php else: ?>
                No menu category
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</div>