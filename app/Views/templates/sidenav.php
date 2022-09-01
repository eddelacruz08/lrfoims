<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu leftside-menu-detached">

    <div class="leftbar-user">
        <!-- <a href="javascript: void(0);">
            <img src="assets/images/users/avatar-1.jpg" alt="user-image" height="42" class="rounded-circle shadow-sm">
            <span class="leftbar-user-name"><?= session()->get('first_name');?></span>
        </a> -->
    </div>

    <!--- Sidemenu -->
    <ul class="side-nav">

        <!-- <?php if (isset($_SESSION['modules'])): ?>
            <li class="side-nav-title side-nav-item">Navigation</li>
            <?php foreach ($_SESSION['modules']as $modules): ?>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#<?=$modules['module']?>" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                        <?=$modules['icon']?>
                        <span> <?=ucwords(esc($modules['module']))?> </span>
                    </a>
                    <div class="collapse" id="<?=$modules['module']?>">
                        <ul class="side-nav-second-level">
                            <?php foreach ($_SESSION['permissions'] as $permissions): ?>
                                <?php if ($permissions['module_id'] == $modules['module_id'] && $permissions['permission_type'] == 11): ?>
                            <li>
                                <a href="<?='/'.$permissions['slug']?>"><?=ucwords($permissions['permission'])?></a>
                            </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </li>
            <?php endforeach; ?>
        <?php endif; ?> -->

        <li class="side-nav-title side-nav-item">Navigation</li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                <i class="uil-home-alt"></i>
                <span class="badge bg-info rounded-pill float-end">4</span>
                <span> Dashboards </span>
            </a>
            <div class="collapse" id="sidebarDashboards">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="/dashboard">Dashboard</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="side-nav-title side-nav-item">Apps</li>

        <li class="side-nav-item">
            <a href="/orders" class="side-nav-link">
                <i class="uil-calender"></i>
                <span> Orders </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="/orders/admin-menu" class="side-nav-link">
                <i class="uil-calender"></i>
                <span> Order Menu </span>
            </a>
        </li>
        
        <li class="side-nav-item">
            <a href="/menu-list" class="side-nav-link">
                <i class="uil-calender"></i>
                <span> Menu List </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="/ingredients" class="side-nav-link">
                <i class="uil-calender"></i>
                <span> Ingredients </span>
            </a>
        </li>

        <li class="side-nav-title side-nav-item">Management</li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarLayouts1" aria-expanded="false" aria-controls="sidebarLayouts" class="side-nav-link">
                <i class="uil-window"></i>
                <span> Module </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarLayouts1">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="/modules">Module</a>
                    </li>
                    <li>
                        <a href="/permissions">Permissions</a>
                    </li>
                    <li>
                        <a href="/permission-types">Permission Types</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarLayouts" aria-expanded="false" aria-controls="sidebarLayouts" class="side-nav-link">
                <i class="uil-window"></i>
                <span> Users </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarLayouts">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="/roles">Roles</a>
                    </li>
                    <li>
                        <a href="/roles-permissions">Role Permissions</a>
                    </li>
                    <li>
                        <a href="/users">Users</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarLayouts2" aria-expanded="false" aria-controls="sidebarLayouts" class="side-nav-link">
                <i class="uil-window"></i>
                <span> Maintenances </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarLayouts2">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="/extensions">Extention Names</a>
                    </li>
                    <li>
                        <a href="/ingredient-categories">Ingredient Categories</a>
                    </li>
                    <li>
                        <a href="/ingredient-descriptions">Ingredient Descriptions</a>
                    </li>
                    <li>
                        <a href="/ingredient-status">Ingredient Status</a>
                    </li>
                    <li>
                        <a href="/menu-categories">Menu Category</a>
                    </li>
                    <li>
                        <a href="/order-numbers">Order Numbers</a>
                    </li>
                    <li>
                        <a href="/order-status">Order Status</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    <div class="clearfix"></div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->