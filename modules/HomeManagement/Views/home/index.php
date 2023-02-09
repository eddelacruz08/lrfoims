
	
	<!-- Start slides -->
	<div id="slides" class="cover-slides">
		<ul class="slides-container">
			<li class="text-center">
				<img src="<?=base_url()?>/assets/lamon-images/slider-01.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Welcome To <br> Lamon - Wings and Sisig House</strong></h1>
							<p class="m-b-40">Let's roam around Mantahan and Macrohon. Let's have a trip, GALAMON! 🤗</p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Order Here</a></p>
						</div>
					</div>
				</div>
			</li>
			<li class="text-center">
				<img src="<?=base_url()?>/assets/lamon-images/slider-02.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Welcome To <br> Lamon - Wings and Sisig House</strong></h1>
							<p class="m-b-40">Let's roam around Mantahan and Macrohon. Let's have a trip, GALAMON! 🤗</p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Order Here</a></p>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
	<!-- End slides -->
	
	<!-- Start About -->
	<div class="about-section-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<img src="<?=base_url()?>/assets/lamon-images/wings-lunch.gif" alt="gif" class="rounded">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 text-center">
					<div class="inner-column">
						<h1>Welcome To <span>Lamon - Wings and Sisig House</span></h1>
						<h4>About</h4>
						<p>Catch this newest addition to our menu! Available at Lamon-Mantahan, Maasin. We are also open at Lamon-Macrohon starting 5PM. Kitakits!</p>
						<p>The place you'll love. Suroy na sa Macrohon, mga kaLAMON! 🤙🏻😉</p>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- End About -->
	
	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 p-1">
					<div class="heading-title m-2 text-center">
						<h2 id="best-seller-title">Best Seller</h2>
					</div>
				</div>
			</div>
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
                            <div class="col-lg-4 col-md-6 m-0 p-0 special-grid <?=$category['id']?>">
                                <div class="gallery-single fix rounded">
                                    <img src="<?=base_url()?>/assets/uploads/menu/<?=$row['image']?>" class="img-fluid" alt="Image">
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
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
				
			</div>
		</div>
	</div>


        
