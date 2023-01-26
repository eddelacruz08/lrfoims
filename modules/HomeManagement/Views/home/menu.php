<div class="container">
    <div class="content">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Menu</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Menu</h4>
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
                                <div class="col-lg-4 col-md-6 special-grid <?=$category['id']?>">
                                    <div class="gallery-single fix">
                                        <form method="POST" action="/menu/customer/add-to-cart">
                                            <img src="/assets/uploads/menu/<?=$row['image']?>" class="img-fluid" alt="Image">
                                            <div class="why-text">
                                                <h4 class="mb-1"><?=$row['menu']?></h4>
                                                <?= $row['menu_status'] == 'a' ? '<span class="badge bg-warning">Available</span>' : '<span class="badge bg-secondary">Unavailable</span>'?>
                                                <span class="text-warning mdi mdi-star"></span>
                                                <span class="text-warning mdi mdi-star"></span>
                                                <span class="text-warning mdi mdi-star"></span>
                                                <span class="text-warning mdi mdi-star"></span>
                                                <span class="text-warning mdi mdi-star"></span>
                                                <br>
                                                <!-- <?= ucfirst($row['description']); ?> -->
                                                <h5>₱ <?=$row['price']?></h5>
                                                <input type="hidden" name="quantity" min="1" max="10" required onkeydown="if(event.key==='.'){event.preventDefault();}"  
                                                    oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');" value="1" class="form-control <?= isset($errors['quantity']) ? 'is-invalid':'' ?>" placeholder="Quantity">
                                                
                                                <input type="hidden" name="menu_id" value="<?=$row['id']?>">
                                                <?php if(user_link('menu/a', session()->get('userPermissionView'))):?>
                                                    <button class="btn btn-sm <?= $row['menu_status'] == 'a' ? 'btn-success':'btn-secondary'?>" animation="true" type="submit" title="Add to cart"<?= $row['menu_status'] == 'a' ? '':'disabled'?>>Add&nbspTo&nbspCart</button>    
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?> 
                                            </div>
                                        </form>
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
