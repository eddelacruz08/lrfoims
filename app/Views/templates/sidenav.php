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
        <!-- <li class="side-nav-title side-nav-item">Navigation</li> -->

        <?php if (isset($_SESSION['modules'])): ?>
            <?php foreach ($_SESSION['modules']as $modules): ?>
                    <?php foreach ($_SESSION['permissions'] as $permissions): ?>
                        <?php if ($permissions['module_id'] == $modules['module_id'] && $permissions['selection_id'] == 3
                                    && $permissions['permission_type'] == 11): ?>
                            <li class="side-nav-item">
                                <a href="/<?=$permissions['slug']?>" class="side-nav-link">
                                    <?=$permissions['icon']?>
                                    <span> <?=ucwords(esc($modules['module']))?> </span>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <hr>
        <!-- <li class="side-nav-title side-nav-item">Navigation</li> -->

        <?php if (isset($_SESSION['modules'])): ?>
            <?php foreach ($_SESSION['modules']as $modules): ?>
                    <?php foreach ($_SESSION['permissions'] as $permissions): ?>
                        <?php if ($permissions['module_id'] == $modules['module_id'] && $permissions['selection_id'] == 1
                                    && $permissions['permission_type'] == 11): ?>
                            <li class="side-nav-item">
                                <a href="/<?=$permissions['slug']?>" class="side-nav-link">
                                    <?=$permissions['icon']?>
                                    <span> <?=ucwords(esc($modules['module']))?> </span>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <hr>
        <!-- <li class="side-nav-title side-nav-item">Navigation</li> -->

        <?php if (isset($_SESSION['modules'])): ?>
            <?php foreach ($_SESSION['modules']as $modules): ?>
                    <?php foreach ($_SESSION['permissions'] as $permissions): ?>
                        <?php if ($permissions['module_id'] == $modules['module_id'] && $permissions['selection_id'] == 4
                                    && $permissions['permission_type'] == 11): ?>
                            <li class="side-nav-item">
                                <a href="/<?=$permissions['slug']?>" class="side-nav-link">
                                    <?=$permissions['icon']?>
                                    <span> <?=ucwords(esc($modules['module']))?> </span>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <hr>

        <!-- <li class="side-nav-title side-nav-item">Apps</li> -->
        <!-- <li class="side-nav-title side-nav-item">Management</li> -->

        <?php if (isset($_SESSION['modules'])): ?>
            <?php foreach ($_SESSION['modules']as $modules): ?>
                    <li class="side-nav-item">
                        <?php if ($modules['module'] == 'users' || $modules['module'] == 'maintenances' || $modules['module'] == 'modules'): ?>
                            <a data-bs-toggle="collapse" href="#sidebarLayouts3<?=$modules['module_id']?>" aria-expanded="false" aria-controls="sidebarLayouts" class="side-nav-link">
                                <?=$modules['icon']?>
                                <span> <?=ucwords(esc($modules['module']))?> </span>
                                <span class="menu-arrow"></span>
                            </a>
                        <?php endif; ?>
                        <div class="collapse" id="sidebarLayouts3<?=$modules['module_id']?>">
                            <ul class="side-nav-second-level">
                                <?php foreach ($_SESSION['permissions'] as $permissions): ?>
                                    <?php if ($permissions['module_id'] == $modules['module_id'] 
                                        && $permissions['permission_type'] == 11
                                        && $permissions['selection_id'] == 2
                                     ): ?>
                                        <li>
                                            <a href="/<?=$permissions['slug']?>">
                                                <span> <?=ucwords(esc($permissions['permission']))?> </span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </li>
            <?php endforeach; ?>
        <?php endif; ?>
        
    </ul>
    <div class="clearfix"></div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->