<div class="topnav shadow-sm">
    <div class="container">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    <?php if(user_link('dashboard', session()->get('userPermissionView'))):?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="/dashboard">
                                <i class="uil-dashboard me-1"></i>Dashboard <div class="arrow-down" style="display:none;"></div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(user_link('ingredients', session()->get('userPermissionView'))):?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="/ingredients">
                                <i class="uil-list-ul me-1"></i>Ingredients <div class="arrow-down" style="display:none;"></div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(user_link('order-reports', session()->get('userPermissionView'))):?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="/order-reports">
                                <i class="uil-document-layout-center me-1"></i>Sales | Order Reports <div class="arrow-down" style="display:none;"></div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(user_link('ingredient-reports', session()->get('userPermissionView'))):?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="/ingredient-reports">
                                <i class="uil-document-layout-left me-1"></i>Ingredient Reports <div class="arrow-down" style="display:none;"></div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(user_link('orders', session()->get('userPermissionView'))):?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="/orders">
                                <i class="uil-list-ul me-1"></i>Orders <div class="arrow-down" style="display:none;"></div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(user_link('delivery', session()->get('userPermissionView'))):?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="/delivery">
                                <i class="uil-dashboard me-1"></i>Delivery <div class="arrow-down" style="display:none;"></div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(user_link('orders/admin-menu', session()->get('userPermissionView'))):?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="/orders/admin-menu">
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
                                    <a href="/users" class="dropdown-item">Users</a>
                                <?php endif; ?>
                                <?php if(user_link('roles', session()->get('userPermissionView'))):?>
                                    <a href="/roles" class="dropdown-item">Roles</a>
                                <?php endif; ?>
                                <?php if(user_link('roles-permissions', session()->get('userPermissionView'))):?>
                                    <a href="/roles-permissions" class="dropdown-item">Role Permissions</a>
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
                                    <a href="/modules" class="dropdown-item">Modules</a>
                                <?php endif; ?>
                                <?php if(user_link('permissions', session()->get('userPermissionView'))):?>
                                    <a href="/permissions" class="dropdown-item">Permissions</a>
                                <?php endif; ?>
                                <?php if(user_link('permission-types', session()->get('userPermissionView'))):?>
                                    <a href="/permission-types" class="dropdown-item">Permission Types</a>
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
                                    <a href="/home-details" class="dropdown-item">Restaurant Details</a>
                                <?php endif; ?>
                                <?php if(user_link('generate-qrcode-link', session()->get('userPermissionView'))):?>
                                    <a href="/generate-qrcode-link" class="dropdown-item">Generate Qrcode Link</a>
                                <?php endif; ?>
                                <?php if(user_link('extensions', session()->get('userPermissionView'))):?>
                                    <a href="/extensions" class="dropdown-item">Extension Names</a>
                                <?php endif; ?>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-order" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Order <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-order">
                                        <?php if(user_link('order-status', session()->get('userPermissionView'))):?>
                                            <a href="/order-status" class="dropdown-item">Order Status</a>
                                        <?php endif; ?>
                                        <?php if(user_link('order-max-limit', session()->get('userPermissionView'))):?>
                                            <a href="/order-max-limit" class="dropdown-item">Order Limit</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-ingredient" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Ingredient <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-ingredient">
                                        <?php if(user_link('ingredient-categories', session()->get('userPermissionView'))):?>
                                            <a href="/ingredient-categories" class="dropdown-item">Ingredient Category</a>
                                        <?php endif; ?>
                                        <?php if(user_link('ingredient-measures', session()->get('userPermissionView'))):?>
                                            <a href="/ingredient-measures" class="dropdown-item">Ingredient Measurement</a>
                                        <?php endif; ?>
                                        <?php if(user_link('ingredient-status', session()->get('userPermissionView'))):?>
                                            <a href="/ingredient-status" class="dropdown-item">Ingredient Status</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-menu" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Menu <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-menu">
                                        <?php if(user_link('menu-list', session()->get('userPermissionView'))):?>
                                            <a href="/menu-list" class="dropdown-item">Menu List</a>
                                        <?php endif; ?>
                                        <?php if(user_link('menu-categories', session()->get('userPermissionView'))):?>
                                            <a href="/menu-categories" class="dropdown-item">Menu Category</a>
                                        <?php endif; ?>
                                        <?php if(user_link('menu-ingredients', session()->get('userPermissionView'))):?>
                                            <a href="/menu-ingredients" class="dropdown-item">Menu Ingredients</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-menu" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Location <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-menu">
                                        <?php if(user_link('regions', session()->get('userPermissionView'))):?>
                                            <a href="/regions" class="dropdown-item">Region</a>
                                        <?php endif; ?>
                                        <?php if(user_link('provinces', session()->get('userPermissionView'))):?>
                                            <a href="/provinces" class="dropdown-item">Province</a>
                                        <?php endif; ?>
                                        <?php if(user_link('cities', session()->get('userPermissionView'))):?>
                                            <a href="/cities" class="dropdown-item">City</a>
                                        <?php endif; ?>
                                        <?php if(user_link('barangay', session()->get('userPermissionView'))):?>
                                            <a href="/barangay" class="dropdown-item">Barangay</a>
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