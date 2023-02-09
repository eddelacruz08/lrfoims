<?= $this->extend('layout/main') ?>
<?= $this->section('content'); ?>

<!-- Start header -->
<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?=base_url()?>/">
                <img src="<?=base_url()?>/assets/img/<?= isset($homeDetails['image']) ? $homeDetails['image'] : 'image'?>" height="49" alt="restaurant logo" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbars-rs-food">
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['modules'])): ?>
                        <?php foreach ($_SESSION['modules']as $modules): ?>
                            <?php foreach ($_SESSION['permissions'] as $permissions): ?>
                                <?php if ($permissions['module_id'] == $modules['module_id'] && $permissions['selection_id'] == 5
                                            && $permissions['permission_type'] == 16): ?>
                                    <?php if ($permissions['slug'] == '/'): ?>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="<?=base_url()?>/<?=$permissions['slug']?>"><?=ucwords(esc($permissions['permission']))?>
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
                                    <?php if ($permissions['slug'] == 'menu'): ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url()?>/<?=$permissions['slug']?>"><?=ucwords(esc($permissions['permission']))?>
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
                                    <?php if ($permissions['slug'] == 'cart'): ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url()?>/<?=$permissions['slug']?>"><?=ucwords(esc($permissions['permission']))?>
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
                                    <?php if ($permissions['slug'] == 'profile'): ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url()?>/<?=$permissions['slug']?>"><?=ucwords(esc($permissions['permission']))?>
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
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                        <li class="nav-item"><a class="nav-link" href="<?=base_url()?>/order-status-list">Order Status List</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=base_url()?>/signout"><i class="mdi mdi-logout me-1"></i> Logout</a></li>
                    <?php else: ?>
                        <li class="nav-item active"><a class="nav-link" href="<?=base_url()?>/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=base_url()?>/register">Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=base_url()?>/register">Cart</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=base_url()?>/register">Profile</a></li>

                        <li class="nav-item"><a class="nav-link" href="<?=base_url()?>/order-status-list">Order Status List</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=base_url()?>/login">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- End header -->

<?= view(esc($view)) ?>

<!-- Start Contact info -->
<div class="contact-imfo-box">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <i class="fa fa-volume-control-phone"></i>
                <div class="overflow-hidden">
                    <h4>Phone</h4>
                    <p class="lead">
                        <?= isset($homeDetails['contact']) ? $homeDetails['contact'] : 'contact'?>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <i class="fa fa-envelope"></i>
                <div class="overflow-hidden">
                    <h4>Email</h4>
                    <p class="lead">
                        <?= isset($homeDetails['email_address']) ? $homeDetails['email_address'] : 'email address'?>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <i class="fa fa-map-marker"></i>
                <div class="overflow-hidden">
                    <h4>Location</h4>
                    <p class="lead">
                        <?php
                            $full_address = '';
                            foreach ($cities as $city) {
                                if($city['city_code'] == $homeDetails['city_id']){
                                    $full_address .= $homeDetails['addtl_address'].', '.$city['city_name'];
                                }
                            }
                            foreach ($provinces as $province) {
                                if($province['province_code'] == $homeDetails['province_id']){
                                    $full_address .= ', '.$province['province_name'];
                                }
                            }
                            foreach ($regions as $region) {
                                if($region['region_code'] == $homeDetails['region_id']){
                                    $full_address .= ', '.$region['region_name'];
                                }
                            }
                            if($full_address != ''){
                                $str = strtolower($full_address);
                                echo ucwords($str);
                            } else {
                                echo 'Location';
                            }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Contact info -->

<!-- Start Footer -->
<footer class="footer-area bg-f">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <h3>About Us</h3>
                <p>Integer cursus scelerisque ipsum id efficitur. Donec a dui fringilla, gravida lorem ac, semper magna. Aenean rhoncus ac lectus a interdum. Vivamus semper posuere dui, at ornare turpis ultrices sit amet. Nulla cursus lorem ut nisi porta, ac eleifend arcu ultrices.</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3>Opening hours</h3>
                <p><span class="text-color">Monday: </span>Closed</p>
                <p><span class="text-color">Tue-Wed :</span> 9:Am - 10PM</p>
                <p><span class="text-color">Thu-Fri :</span> 9:Am - 10PM</p>
                <p><span class="text-color">Sat-Sun :</span> 5:PM - 10PM</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3>Contact information</h3>
                <p class="lead">
                    <?php
                        $full_address = '';
                        foreach ($cities as $city) {
                            if($city['city_code'] == $homeDetails['city_id']){
                                $full_address .= $homeDetails['addtl_address'].', '.$city['city_name'];
                            }
                        }
                        foreach ($provinces as $province) {
                            if($province['province_code'] == $homeDetails['province_id']){
                                $full_address .= ', '.$province['province_name'];
                            }
                        }
                        foreach ($regions as $region) {
                            if($region['region_code'] == $homeDetails['region_id']){
                                $full_address .= ', '.$region['region_name'];
                            }
                        }
                        if($full_address != ''){
                            $str = strtolower($full_address);
                            echo ucwords($str);
                        } else {
                            echo 'Location';
                        }
                    ?>
                </p>
                <p class="lead"><a href="javascript: void(0);"><?= isset($homeDetails['contact']) ? $homeDetails['contact'] : 'contact'?></a></p>
                <p><a href="javascript: void(0);"> <?= isset($homeDetails['email_address']) ? $homeDetails['email_address'] : 'email address'?></a></p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3>Subscribe</h3>
                <div class="subscribe_form">
                    <form class="subscribe_form">
                        <input name="EMAIL" id="subs-email" class="form_input" placeholder="Email Address..." type="email">
                        <button type="submit" class="submit">SUBSCRIBE</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <ul class="list-inline f-social">
                    <li class="list-inline-item"><a href="javascript: void(0);"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li class="list-inline-item"><a href="javascript: void(0);"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li class="list-inline-item"><a href="javascript: void(0);"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    <li class="list-inline-item"><a href="javascript: void(0);"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    <li class="list-inline-item"><a href="javascript: void(0);"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="company-name">All Rights Reserved. &copy; 2023 <a href="#">Lamon - Wings and Sisig House</a> 
                </div>
            </div>
        </div>
    </div>
    
</footer>
<?= $this->endsection('content'); ?>
