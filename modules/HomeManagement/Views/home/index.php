<!-- START HERO -->
<section class="hero-section bg-warning">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5">
                <div class="mt-md-4">
                    <div>
                        <span class="badge bg-danger rounded-pill">Welcome</span>
                    </div>
                    <h2 class="text-black fw-normal mb-4 mt-3 hero-title">
                        <?= isset($homeDetails['restaurant_name']) ? $homeDetails['restaurant_name'] : 'Title'?>
                    </h2>

                    <p class="mb-4 font-16 text-black-50">
                        <?= isset($homeDetails['body_desc']) ? $homeDetails['body_desc'] : 'Body Description'?>
                    </p>

                    
                </div>
            </div>
            <div class="col-md-5 offset-md-2">
                <div class="text-md-end mt-3 mt-md-0">
                    <img src="assets/img/<?= isset($homeDetails['image']) ? $homeDetails['image'] : 'Image'?>" alt="Image" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END HERO -->

<!-- START FEATURES 1 -->
<section class="py-5 bg-light-lighten border-top border-bottom border-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h3>Best <span class="text-primary"> Seller</span></h3>
                    <p class="text-muted mt-2">Let's roam around Mantahan and Macrohon.
                    Let's have a trip, GALAMON! 🤗</p>
                </div>
            </div>
        </div>

        <?php foreach($menuCategory as $category):?>
            <div class="row mt-4">
                <h3 class="card-title text-center"><?=$category['name']?></h3>
                <div id="myCarousel" class="carousel slide container" data-bs-ride="carousel">
                    <div class="carousel-inner w-100">
                        <div class="carousel-item active">
                            <div class="col-md-3" style="display:none;">
                                <div class="card card-body m-2">
                                    <img class="img-fluid" src="/assets/img/lamon_logo.png"/>
                                </div>
                            </div>
                        </div>
                        <?php foreach($menu as $row):?>
                            <?php if($row['menu_category_id'] == $category['id']):?>
                                <div class="carousel-item h-70">
                                    <div class="col-md-3">
                                        <div class="card m-2 rounded">
                                            <img class="img-fluid imageCarousel" src="/assets/uploads/menu/<?=$row['image']?>"/>
                                            <div class="card-body rounded">
                                                <h5 class="card-title text-center"><?=$row['menu']?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
        
    </div>
</section>
<!-- END FEATURES 1 -->

<!-- START FEATURES 2 -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1 class="mt-0"><i class="mdi mdi-heart-multiple-outline"></i></h1>
                    <h3>The place you'll <span class="text-danger">love</span></h3>
                    <p class="text-muted mt-2">Suroy na sa Macrohon, mga kaLAMON! 🤙🏻😉
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END FEATURES 2 -->
