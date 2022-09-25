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
                <?php else: ?>
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link active" href="javascript:void(0);">Menu</a>
                    </li>
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link active" href="javascript:void(0);">Cart</a>
                    </li>
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link active" href="javascript:void(0);">Profile</a>
                    </li>
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
<footer class="bg-dark py-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <!-- <img src="assets/img/lamon_logo.png" alt="" class="logo-dark" height="68" /> -->
                <p class="text-muted mt-2">Catch this newest addition to our menu! 👌🏻 Available at Lamon-Mantahan, Maasin.
                    <br> We are also open at Lamon-Macrohon starting 5PM.🤗
                    <br> Kitakits! 😉</p>

                <ul class="social-list list-inline mt-2">
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
                <h5 class="text-light">Location</h5>

                <ul class="list-unstyled ps-0 mb-0 mt-3">
                    <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Mantahan, Maasin, Philippines, 6600</a></li>
                </ul>

            </div>

            <div class="col-lg-2 mt-3 mt-lg-0">
                <h5 class="text-light">Contact</h5>

                <ul class="list-unstyled ps-0 mb-0 mt-3">
                    <li class="mt-2"><a href="javascript: void(0);" class="text-muted">0966 291 0632</a></li>
                </ul>
            </div>

            <div class="col-lg-2 mt-3 mt-lg-0">
                <h5 class="text-light">Email</h5>

                <ul class="list-unstyled ps-0 mb-0 mt-3">
                    <li class="mt-2"><a href="javascript: void(0);" class="text-muted">ronylee.escol16@gmail.com</a></li>
                </ul>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-lg-12">
                <div class="mt-5">
                    <p class="text-muted mt-4 text-center mb-0">© 2018 - 2021 Hyper. Design and coded by
                        Coderthemes</p>
                </div>
            </div>
        </div> -->
    </div>
</footer>
<!-- END FOOTER -->
<?= $this->endsection('content'); ?>
