<div class="row">
    <div class="col-xxl-12">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active"><?= $title ?></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?= $title ?></h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <?php if(isset($_SESSION['success'])):?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $_SESSION['success'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif;?>

    </div> <!-- end col -->

</div>

<div class="row">

    <!-- task details -->
    <div class="col-xxl-12">
        <!-- Portlet card -->
        <div class="card mb-md-0 mb-3">
            <div class="card-body">
                <h5 class="card-title mb-0"><?= $title ?></h5>
                                
                <div id="cardCollpase1" class="collapse pt-3 show">
                    <?php foreach ($homeDetails as $row) : ?>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="inputEmail4">Logo</label><br>
                                <img src="<?=base_url()?>/assets/img/<?= isset($row['image']) ? $row['image'] : '' ?>" alt="restaurant logo" class="img-fluid" width="100" height="200"/><br>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="inputEmail4">Restaurant Name</label>
                                <textarea disabled type="text" class="form-control" id="inputEmail4" name="restaurant_name" rows="4" cols="50"><?= isset($row['restaurant_name']) ? $row['restaurant_name'] : 'Restaurant Name' ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="inputEmail4">Body Description</label>
                                <textarea disabled type="text" class="form-control" id="inputEmail4" name="body_desc" rows="4" cols="50"><?= isset($row['body_desc']) ? $row['body_desc'] : 'Body Description' ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="inputEmail4">Footer Description</label>
                                <textarea disabled type="text" class="form-control" id="inputEmail4" name="footer_desc" rows="4" cols="50"><?= isset($row['footer_desc']) ? $row['footer_desc'] : 'Footer Description' ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="inputEmail4">Full Address</label>
                                <?php
                                    $full_address = '';
                                    foreach ($cities as $city) {
                                        if($city['city_code'] == $row['city_id']){
                                            $full_address .= $row['addtl_address'].', '.$city['city_name'];
                                        }
                                    }
                                    foreach ($provinces as $province) {
                                        if($province['province_code'] == $row['province_id']){
                                            $full_address .= ', '.$province['province_name'];
                                        }
                                    }
                                    foreach ($regions as $region) {
                                        if($region['region_code'] == $row['region_id']){
                                            $full_address .= ', '.$region['region_name'];
                                        }
                                    }
                                    $str = strtolower($full_address);
                                ?>
                                <input disabled type="text" class="form-control" id="inputEmail4" name="location" placeholder="Full address" value="<?=ucwords($str)?>">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="inputEmail4">Contact Number</label>
                                <input disabled type="text" class="form-control" id="inputEmail4" name="contact" placeholder="Contact Number" value="<?=$row['contact']?>">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="inputEmail4">Email Address</label>
                                <input disabled type="text" class="form-control" id="inputEmail4" name="email_address" placeholder="Email Address" value="<?=$row['email_address']?>">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="inputEmail4">Facebook Link</label>
                                <input disabled type="text" class="form-control" id="inputEmail4" name="fb_link" placeholder="Facebook Link" value="<?=$row['fb_link']?>">
                            </div>
                        </div>
                        <a href="<?=base_url()?>/home-details/u/<?= $row['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true" class="btn btn-sm btn-warning float-end">Edit Details <i class=" dripicons-pencil"></i></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div> <!-- end card-->
    </div><!-- end col -->
</div>
               