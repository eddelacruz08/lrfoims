<div class="container">
    <div class="content">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <!-- <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Menu</li>
                        </ol>
                    </div> -->
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <!-- Start Menu -->
        <div class="menu-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="special-menu text-center">
                        <h4 id="menu-title" class="page-title">Menu</h4>
                            <div class="button-group filter-button-group">
                                <button class="active" data-filter="*">All</button>
                                <?php foreach($menuCategory as $category):?>
                                    <button data-filter=".<?=$category['id']?>"><?=$category['name']?></button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                    
                <div class="row special-list">
                    <?php foreach($menuCategory as $category):?>
                        <?php foreach($menu as $row):?>
                            <?php if($row['menu_category_id'] == $category['id']):?>
                                <div class="col-sm-3 col-lg-4 col-md-6 m-0 p-0 special-grid <?=$category['id']?>">
                                    <div class="gallery-single fix rounded">
                                        <img src="/assets/uploads/menu/<?=$row['image']?>" class="img-fluid" alt="Image">
                                        <div class="why-text">
                                            <h4 class="mb-0"><?=$row['menu']?></h4>
                                            <h4 class="mb-0">₱<?=number_format($row['price'],2)?></h4>
                                            <?php foreach($getCartsFoodRates as $rates):?>
                                                <?php if($row['id'] == $rates['menu_id']):?>
                                                    <div 
                                                        class="rateit m-0" 
                                                        data-rateit-mode="font"
                                                        data-rateit-value="<?=$rates['sum_per_rating_for_food']?>" 
                                                        data-rateit-ispreset="true"
                                                        data-rateit-readonly="true">
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <?php if($row['menu_status'] == 'a'):?>
                                                <span class="badge bg-warning float-end">Available</span>
                                            <?php else:?>
                                                <span class="badge bg-secondary float-end">Unavailable</span>
                                            <?php endif; ?>
                                            <br>
                                            <?php if(user_link('menu/a', session()->get('userPermissionView'))):?>
                                                <button class="btn btn-sm <?= $row['menu_status'] == 'a' ? 'btn-success':'btn-secondary'?>" 
                                                    onclick="addToCartCustomerMenu('/menu/customer/add-to-cart', <?=$row['id']?>);" 
                                                    type="button" title="Add to cart" <?= $row['menu_status'] == 'a' ? '':'disabled'?>>
                                                        Add&nbsp;To&nbsp;Cart
                                                </button>    
                                            <?php else: ?>
                                                -
                                            <?php endif; ?> 
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                    
                </div>
            </div>
        </div>  

    </div> <!-- End Content -->
</div> <!-- End Content -->
