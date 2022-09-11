<?= $this->extend('layout/main') ?>
<?= $this->section('content'); ?>
<!-- NAVBAR START -->
<nav class="navbar navbar-expand-lg py-lg-3 navbar-dark bg-dark">
    <div class="container">

        <!-- logo -->
        <a href="/" class="navbar-brand me-lg-5 m-0">
            <img src="assets/img/lamon_logo.png" alt="" class="logo-dark" height="70" />
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="mdi mdi-menu"></i>
        </button>

        <!-- menus -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">

            <!-- left menu -->
            <ul class="navbar-nav me-auto align-items-center">
                <?php if (isset($_SESSION['modules'])): ?>
                    <?php foreach ($_SESSION['modules']as $modules): ?>
                            <?php foreach ($_SESSION['permissions'] as $permissions): ?>
                                <?php if ($permissions['module_id'] == $modules['module_id'] && $permissions['selection_id'] == 5
                                            && $permissions['permission_type'] == 11): ?>
                                    <li class="nav-item mx-lg-1">
                                        <a class="nav-link active" href="<?=$permissions['slug']?>"><?=ucwords(esc($permissions['permission']))?>
                                            <?php if (isset($_SESSION['getCustomerCountCarts'])): ?>
                                                <?php if ($permissions['slug'] == 'cart'): ?>
                                                    <?php foreach ($_SESSION['getCustomerCountCarts']as $countCarts): ?>
                                                        <span class="badge bg-warning rounded-pill"><?=$countCarts['customer_count_carts']?></span>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>

            <!-- right menu -->
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item me-0">
                    <?php if(!empty(session()->get('role_id'))):?>
                        <a href="/signout" class="nav-link d-lg-none">
                        <i class="mdi mdi-account-circle-outline me-1"></i>Logout
                        </a>
                        <a href="/signout" class="btn btn-sm btn-light rounded-pill d-none d-lg-inline-flex">
                            <i class="mdi mdi-account-circle-outline me-1"></i>Logout
                        </a>
                    <?php else: ?>
                        <a href="/login" class="nav-link d-lg-none">
                        <i class="mdi mdi-account-circle-outline me-1"></i>Login
                        </a>
                        <a href="/login" class="btn btn-sm btn-light rounded-pill d-none d-lg-inline-flex">
                            <i class="mdi mdi-account-circle-outline me-1"></i>Login
                        </a>
                    <?php endif; ?>
                </li>
            </ul>

        </div>
    </div>
</nav>
<!-- NAVBAR END -->

<?= view(esc($view)) ?>

<!-- START FOOTER -->
<footer class="bg-dark py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="assets/img/lamon_logo.png" alt="" class="logo-dark" height="68" />
                <p class="text-muted mt-4">Hyper makes it easier to build better websites with
                    <br> great speed. Save hundreds of hours of design
                    <br> and development by using it.</p>

                <ul class="social-list list-inline mt-3">
                    <li class="list-inline-item text-center">
                        <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                    </li>
                    <li class="list-inline-item text-center">
                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                    </li>
                    <li class="list-inline-item text-center">
                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                    </li>
                    <li class="list-inline-item text-center">
                        <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                    </li>
                </ul>

            </div>

            <div class="col-lg-2 mt-3 mt-lg-0">
                <h5 class="text-light">Company</h5>

                <ul class="list-unstyled ps-0 mb-0 mt-3">
                    <li class="mt-2"><a href="javascript: void(0);" class="text-muted">About Us</a></li>
                    <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Documentation</a></li>
                    <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Blog</a></li>
                    <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Affiliate Program</a></li>
                </ul>

            </div>

            <div class="col-lg-2 mt-3 mt-lg-0">
                <h5 class="text-light">Apps</h5>

                <ul class="list-unstyled ps-0 mb-0 mt-3">
                    <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Ecommerce Pages</a></li>
                    <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Email</a></li>
                    <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Social Feed</a></li>
                    <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Projects</a></li>
                    <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Tasks Management</a></li>
                </ul>
            </div>

            <div class="col-lg-2 mt-3 mt-lg-0">
                <h5 class="text-light">Discover</h5>

                <ul class="list-unstyled ps-0 mb-0 mt-3">
                    <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Help Center</a></li>
                    <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Our Products</a></li>
                    <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Privacy</a></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="mt-5">
                    <p class="text-muted mt-4 text-center mb-0">© 2018 - 2021 Hyper. Design and coded by
                        Coderthemes</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->
<?= $this->endsection('content'); ?>
