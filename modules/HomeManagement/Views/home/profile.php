<div class="container">
    <div class="content">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Profile</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 


        <div class="row">
            <div class="col-sm-12">
                <!-- Profile -->
                <div class="card bg-primary">
                    <div class="card-body profile-user-box">

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="avatar-lg">
                                            <img src="/assets/img/user.jpg" alt="" class="rounded-circle img-thumbnail">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div>
                                            <h4 class="mt-1 mb-1 text-white"><?= session()->get('first_name').' '.session()->get('last_name');?></h4>
                                            <p class="font-13 text-white-50"><?= session()->get('role_name')?></p>

                                            <ul class="mb-0 list-inline text-light">
                                                <li class="list-inline-item">
                                                    <h5 class="mb-1">
                                                        <?php foreach (session()->get('getOrderCounts') as $getOrderCounts):?>
                                                            <?= ($getOrderCounts)? $getOrderCounts : '0'?>
                                                        <?php endforeach;?>
                                                    </h5>
                                                    <p class="mb-0 font-13 text-white-50">Number of Orders</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div>
                                            <h4 class="header-title mt-0 mb-3 text-white">Customer Information: </h4>
                                            <div class="text-start font-13 text-white">
                                                <p class=" text-white"><strong>Contact Number :</strong><span class="ms-2"><?= session()->get('contact_number');?></span></p>
                                                <p class=" text-white"><strong>Email :</strong> <span class="ms-2"><?= session()->get('email_address');?></span></p>
                                                <p class="text-white"><strong>Location :</strong> 
                                                    <span class="ms-2">
                                                        <?php
                                                            $full_address = '';
                                                            foreach ($cities as $city) {
                                                                if($city['city_code'] == session()->get('city_id')){
                                                                    $full_address .= session()->get('addtl_address').', '.$city['city_name'];
                                                                }
                                                            }
                                                            foreach ($provinces as $province) {
                                                                if($province['province_code'] == session()->get('province_id')){
                                                                    $full_address .= ', '.$province['province_name'];
                                                                }
                                                            }
                                                            foreach ($regions as $region) {
                                                                if($region['region_code'] == session()->get('region_id')){
                                                                    $full_address .= ', '.$region['region_name'];
                                                                }
                                                            }
                                                            echo $full_address;
                                                        ?>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-sm-4">
                                <div class="text-center mt-sm-0 mt-3 text-sm-end">
                                    <a href="/edit-profile/u/<?= session()->get('id')?>" type="button" class="btn btn-light">
                                        <i class="mdi mdi-account-edit me-1"></i> Edit Profile
                                    </a>
                                </div>
                            </div> <!-- end col-->
                        </div> <!-- end row -->

                    </div> <!-- end card-body/ profile-user-box-->
                </div><!--end profile/ card -->
                <div class="card">
                    <div class="card-title m-3 mb-0 h4">Order History</div>
                        <div class="card-body">
                            <table class="table table-sm table-centered mb-0 text-center">
                                <thead>
                                    <tr>
                                        <th>Order#</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                        <th>Cash</th>
                                        <th>Change</th>
                                        <th>Date & Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($getOrderDetails as $row):?>
                                        <tr>
                                            <td>Order#<?=$row['number']?></td>
                                            <td><span class="badge bg-primary"><?=$row['order_status']?></span></td>
                                            <td>₱ <?=number_format($row['total_amount'])?></td>
                                            <td>₱ <?=number_format($row['c_cash'])?></td>
                                            <td>₱ <?=number_format($row['c_balance'])?></td>
                                            <td><?= Date('F d, Y - h:i a', strtotime($row['created_at']))?></td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col-->
        </div>
        <!-- end row -->

    </div> <!-- End Content -->
</div> <!-- End Content -->