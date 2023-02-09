<div class="topnav shadow-sm">
    <div class="container">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    <?php if(user_link('dashboard', session()->get('userPermissionView'))):?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="<?=base_url()?>/dashboard">
                                <i class="uil-dashboard me-1"></i>Dashboard <div class="arrow-down" style="display:none;"></div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(user_link('ingredients', session()->get('userPermissionView'))):?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="<?=base_url()?>/ingredients">
                                <i class="uil-list-ul me-1"></i>Ingredients <div class="arrow-down" style="display:none;"></div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(user_link('order-reports', session()->get('userPermissionView'))):?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="<?=base_url()?>/order-reports">
                                <i class="uil-document-layout-center me-1"></i>Sales | Order Reports <div class="arrow-down" style="display:none;"></div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(user_link('ingredient-reports', session()->get('userPermissionView'))):?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="<?=base_url()?>/ingredient-reports">
                                <i class="uil-document-layout-left me-1"></i>Ingredient Reports <div class="arrow-down" style="display:none;"></div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(user_link('orders', session()->get('userPermissionView'))):?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="<?=base_url()?>/orders">
                                <i class="uil-list-ul me-1"></i>Orders <div class="arrow-down" style="display:none;"></div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(user_link('orders/admin-menu', session()->get('userPermissionView'))):?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="<?=base_url()?>/orders/admin-menu">
                                <i class="mdi mdi-cart-plus me-1"></i>Order Menu <div class="arrow-down" style="display:none;"></div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(user_link('users', session()->get('userPermissionView'))):?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="uil-users-alt me-1"></i>User Management <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-apps">
                                <?php if(user_link('users', session()->get('userPermissionView'))):?>
                                    <a href="<?=base_url()?>/users" class="dropdown-item">Users</a>
                                <?php endif; ?>
                                <?php if(user_link('roles', session()->get('userPermissionView'))):?>
                                    <a href="<?=base_url()?>/roles" class="dropdown-item">Roles</a>
                                <?php endif; ?>
                                <?php if(user_link('roles-permissions', session()->get('userPermissionView'))):?>
                                    <a href="<?=base_url()?>/roles-permissions" class="dropdown-item">Role Permissions</a>
                                <?php endif; ?>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if(user_link('modules', session()->get('userPermissionView'))):?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="uil-bookmark-full me-1"></i>Module Management <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-apps">
                                <?php if(user_link('modules', session()->get('userPermissionView'))):?>
                                    <a href="<?=base_url()?>/modules" class="dropdown-item">Modules</a>
                                <?php endif; ?>
                                <?php if(user_link('permissions', session()->get('userPermissionView'))):?>
                                    <a href="<?=base_url()?>/permissions" class="dropdown-item">Permissions</a>
                                <?php endif; ?>
                                <?php if(user_link('permission-types', session()->get('userPermissionView'))):?>
                                    <a href="<?=base_url()?>/permission-types" class="dropdown-item">Permission Types</a>
                                <?php endif; ?>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if(user_link('home-details', session()->get('userPermissionView'))):?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="uil-cog me-1"></i>Maintenances <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-apps">
                                <?php if(user_link('home-details', session()->get('userPermissionView'))):?>
                                    <a href="<?=base_url()?>/home-details" class="dropdown-item">Restaurant Details</a>
                                <?php endif; ?>
                                <?php if(user_link('generate-qrcode-link', session()->get('userPermissionView'))):?>
                                    <a href="<?=base_url()?>/generate-qrcode-link" class="dropdown-item">Generate Qrcode Link</a>
                                <?php endif; ?>
                                <?php if(user_link('extensions', session()->get('userPermissionView'))):?>
                                    <a href="<?=base_url()?>/extensions" class="dropdown-item">Extension Names</a>
                                <?php endif; ?>
                                <?php if(user_link('notifications', session()->get('userPermissionView'))):?>
                                    <a href="<?=base_url()?>/notifications" class="dropdown-item">Notifications</a>
                                <?php endif; ?>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-order" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Order <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-order">
                                        <?php if(user_link('order-status', session()->get('userPermissionView'))):?>
                                            <a href="<?=base_url()?>/order-status" class="dropdown-item">Order Status</a>
                                        <?php endif; ?>
                                        <?php if(user_link('order-max-limit', session()->get('userPermissionView'))):?>
                                            <a href="<?=base_url()?>/order-max-limit" class="dropdown-item">Order Limit</a>
                                        <?php endif; ?>
                                        <?php if(user_link('order-user-discounts', session()->get('userPermissionView'))):?>
                                            <a href="<?=base_url()?>/order-user-discounts" class="dropdown-item">User Type Discounts</a>
                                        <?php endif; ?>
                                        <?php if(user_link('coupons', session()->get('userPermissionView'))):?>
                                            <a href="<?=base_url()?>/coupons" class="dropdown-item">Coupons</a>
                                        <?php endif; ?>
                                        <?php if(user_link('delivery-fee', session()->get('userPermissionView'))):?>
                                            <a href="<?=base_url()?>/delivery-fee" class="dropdown-item">Delivery Fee</a>
                                        <?php endif; ?>
                                        <?php if(user_link('payment-methods', session()->get('userPermissionView'))):?>
                                            <a href="<?=base_url()?>/payment-methods" class="dropdown-item">Payment Method</a>
                                        <?php endif; ?>
                                        <?php if(user_link('vat', session()->get('userPermissionView'))):?>
                                            <a href="<?=base_url()?>/vat" class="dropdown-item">Value-Added Tax (VAT)</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-ingredient" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Ingredient <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-ingredient">
                                        <?php if(user_link('ingredient-categories', session()->get('userPermissionView'))):?>
                                            <a href="<?=base_url()?>/ingredient-categories" class="dropdown-item">Ingredient Category</a>
                                        <?php endif; ?>
                                        <?php if(user_link('ingredient-measures', session()->get('userPermissionView'))):?>
                                            <a href="<?=base_url()?>/ingredient-measures" class="dropdown-item">Ingredient Measurement</a>
                                        <?php endif; ?>
                                        <?php if(user_link('ingredient-status', session()->get('userPermissionView'))):?>
                                            <a href="<?=base_url()?>/ingredient-status" class="dropdown-item">Ingredient Status</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-menu" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Menu <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-menu">
                                        <?php if(user_link('menu-list', session()->get('userPermissionView'))):?>
                                            <a href="<?=base_url()?>/menu-list" class="dropdown-item">Menu List</a>
                                        <?php endif; ?>
                                        <?php if(user_link('menu-categories', session()->get('userPermissionView'))):?>
                                            <a href="<?=base_url()?>/menu-categories" class="dropdown-item">Menu Category</a>
                                        <?php endif; ?>
                                        <?php if(user_link('menu-ingredients', session()->get('userPermissionView'))):?>
                                            <a href="<?=base_url()?>/menu-ingredients" class="dropdown-item">Menu Ingredients</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-menu" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Location <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-menu">
                                        <?php if(user_link('regions', session()->get('userPermissionView'))):?>
                                            <a href="<?=base_url()?>/regions" class="dropdown-item">Region</a>
                                        <?php endif; ?>
                                        <?php if(user_link('provinces', session()->get('userPermissionView'))):?>
                                            <a href="<?=base_url()?>/provinces" class="dropdown-item">Province</a>
                                        <?php endif; ?>
                                        <?php if(user_link('cities', session()->get('userPermissionView'))):?>
                                            <a href="<?=base_url()?>/cities" class="dropdown-item">City</a>
                                        <?php endif; ?>
                                        <?php if(user_link('barangay', session()->get('userPermissionView'))):?>
                                            <a href="<?=base_url()?>/barangay" class="dropdown-item">Barangay</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </div>
</div>