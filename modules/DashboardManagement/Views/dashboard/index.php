<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active"><?=$title?></li>
                </ol>
            </div>
            <h4 class="page-title"><?=$title?></h4>
        </div>
    </div>
</div>     
<!-- end page title --> 
<div class="row">
    <div class="col-xl-3 col-lg-4">
        <div class="card tilebox-one">
            <div class="card-body">
                <i class='mdi mdi-cart-minus float-end'></i>
                <h6 class="text-uppercase mt-0">Total Pending Orders</h6>
                <h2 class="my-2 pt-1" id="active-users-count">
                    <?php foreach ($getTotalPendingOrders as $totalPendingOrders): ?>
                        <?=$totalPendingOrders['getTotalPendingOrders'];?>
                    <?php endforeach; ?>
                </h2>
            </div>
        </div>

        <div class="card tilebox-one">
            <div class="card-body">
                <i class='mdi mdi-cart-check float-end'></i>
                <h6 class="text-uppercase mt-0">Total Orders</h6>
                <h2 class="my-2 pt-1" id="active-views-count">
                    <?php foreach ($getTotalOrders as $totalOrders): ?>
                        <?=$totalOrders['getTotalOrders'];?>
                    <?php endforeach; ?>
                </h2>
            </div>
        </div>
    </div>

    <div class="col-xl-9 col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">Expiring Ingredients</h4>
                <div class="table-responsive">
                    <table class="table table-sm table-centered table-nowrap table-hover text-center w-100 mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Ingredient Name</th>
                                <th>Unit Quantity</th>
                                <th>Current Price</th>
                                <th>Expiry Date</th>
                                <th>Expiry Status</th>
                                <th>Status</th>
                                <th>Created Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ingredientStockIn as $stockIn) : ?>
                                <?php foreach ($ingredients as $ingredient) : ?>
                                    <?php if ($ingredient['id'] == $stockIn['ingredient_id']) : ?>
                                        <tr>
                                            <td>
                                                <center><?= ucfirst($ingredient['product_name']) ?></center>
                                            </td>
                                            <td>
                                                <center><?= number_format($stockIn['unit_quantity'],2) ?></center>
                                            </td>
                                            <td>
                                                <center>₱ <?= number_format($stockIn['unit_price'],2); ?></center>
                                            </td>
                                            <td>
                                                <center><?= date('M d, Y',strtotime($stockIn['date_expiration'])); ?></center>
                                            </td>
                                            <td>
                                                <div id="demo<?=$stockIn['id'];?>"></div>
                                                <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
                                                <script>
                                                    $(document).ready(function(){
                                                        setInterval(
                                                            getExpirationDate(<?=$stockIn['ingredient_id'];?>, <?=$stockIn['id'];?>, "<?= date('M d, Y H:i:s', strtotime($stockIn['date_expiration'])) ?>")
                                                        , 1000);
                                                        function getExpirationDate(ingredient_id, demoId, date){
                                                            // Set the date we're counting down to
                                                            var countDownDate = new Date(date).getTime();
                                                            // Update the count down every 1 second
                                                            var x = setInterval(function() {

                                                                // Get today's date and time
                                                                var now = new Date().getTime();

                                                                // Find the distance between now and the count down date
                                                                var distance = countDownDate - now;
                                                                // console.log(distance);
                                                                // Time calculations for days, hours, minutes and seconds
                                                                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                                                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                                                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                                                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                                                                
                                                                if(days <= 3 && "<?=$stockIn['status']?>" === 'a'){
                                                                    // Display the result in the element with id="demo"
                                                                    document.getElementById("demo"+demoId).innerHTML = "<button class='btn btn-sm btn-outline-danger'>"+days + "d " + hours + "h "
                                                                    + minutes + "m " + seconds + "s "+"</button>";
                                                                }else{
                                                                    // Display the result in the element with id="demo"
                                                                    document.getElementById("demo"+demoId).innerHTML = "<button class='btn btn-sm btn-outline-dark'>"+days + "d " + hours + "h "
                                                                    + minutes + "m " + seconds + "s "+"</button>";
                                                                }

                                                                // Get today's date and time
                                                                var dateNow = new Date();

                                                                if(days <= 3 && "<?=$stockIn['status']?>" === 'a'){
                                                                    showNotification();
                                                                    function showNotification() {
                                                                        var getDateFromLocalStorage = localStorage.getItem('Stock Id: '+demoId);
                                                                        if(getDateFromLocalStorage == null){
                                                                            localStorage.setItem('Stock Id: '+ demoId, dateNow);
                                                                            $.ajax({
                                                                                url: "/ingredients/notification/a/",
                                                                                type: "POST",
                                                                                data:{
                                                                                    user_id: <?=session()->get('id');?>,
                                                                                    name: "<?=$title?>",
                                                                                    description: 'Expiring after '+days+' days!',
                                                                                    link: "ingredients/v/"+ingredient_id,
                                                                                },
                                                                                cache: false,
                                                                                success: function () {
                                                                                    console.log("Successfully sent a notification!");
                                                                                }
                                                                            });
                                                                        }
                                                                    }
                                                                }
                                                                // If the count down is finished, write some text
                                                                if (distance < 0) {
                                                                    clearInterval(x);
                                                                    if("<?=$stockIn['status']?>" == 'd'){
                                                                        document.getElementById("demo"+demoId).innerHTML = "<button class='btn btn-sm btn-danger' disabled>EXPIRED</button>";
                                                                    }else{
                                                                        $.ajax({
                                                                            url: "/ingredients/expire-date/u/" + ingredient_id + "/" + demoId,
                                                                            type: "POST",
                                                                            data:{
                                                                                unit_quantity: <?=$stockIn['unit_quantity']?>,
                                                                            },
                                                                            cache: false,
                                                                            success: function (response) {
                                                                                if("<?=$stockIn['status']?>" != 'd'){
                                                                                }else{

                                                                                }
                                                                                document.getElementById("demo"+demoId).innerHTML = "<button class='btn btn-sm btn-danger' disabled>EXPIRED</button>";
                                                                                window.location.reload();
                                                                            }
                                                                        });
                                                                    }
                                                                }
                                                            }, 1000);
                                                        }
                                                    });
                                                </script>
                                            </td>
                                            <td>
                                                <center><?= ($stockIn['status'] == 'a' ? "<span class='badge bg-success'>Ongoing</span>":"<span class='badge bg-danger'>Expired</span>") ?></center>
                                            </td>
                                            <td>
                                                <center><?= date('M d, Y H:i a',strtotime($stockIn['created_at'])); ?></center>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-1 mb-3">Running Out Ingredients Quantity</h4>

                <div class="table-responsive" style="overflow-y: scroll; height: 600px;">
                    <table class="table-sm table-hover dt-responsive nowrap w-100">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Unit Quantity</th>
                                <th style="width: 40%;"> Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($getIngredientLowQuantityStatus as $row): ?> 
                                <tr class="border-bottom">
                                    <td><?= ucfirst($row['product_name']) ?></td>
                                    <td><?= number_format($row['unit_quantity'], 2) ?></td>
                                    <td>
                                        <div class="progress" style="height: 10px;">
                                            <div class="progress-bar bg-primary <?= $row['unit_quantity'] <= 50 ? 'bg-danger': $row['unit_quantity'] <= 100 ? 'bg-warning' : '' ?>" role="progressbar"
                                                style="width: <?= $row['unit_quantity'] <= 50 ? '45': $row['unit_quantity'] <= 100 ? '75' : '100' ?>%; height: 20px;" aria-valuenow="<?= $row['unit_quantity'] <= 50 ? '45': $row['unit_quantity'] <= 100 ? '75' : '100' ?>"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">Pending Orders</h4>
                <div class="table-responsive">
                    <table class="table table-sm table-centered table-nowrap table-hover text-center w-100 mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Order#</th>
                                <th>Status</th>
                                <th>Order Type</th>
                                <th>Date & Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($getPendingOrders as $row): ?> 
                                <tr>
                                    <td>Order#<?=$row['number']?></td>
                                    <td><span class="badge bg-warning"><?=$row['order_status']?></span></td>
                                    <td><span class="badge bg-primary"><?=$row['type']?></span></td>
                                    <td><?= Date('M d, Y - h:i a', strtotime($row['created_at']))?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">Cancelled Orders</h4>
                <div class="table-responsive">
                    <table class="table table-sm table-centered table-nowrap table-hover text-center w-100 mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Order#</th>
                                <th>Status</th>
                                <th>Date & Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($getCancelledOrders as $row): ?> 
                                <tr>
                                    <td>Order#<?=$row['number']?></td>
                                    <td><span class="badge bg-danger"><?=$row['order_status']?></span></td>
                                    <td><?= Date('M d, Y h:i a', strtotime($row['created_at']))?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">Best Foods & Sellers</h4>
                <div class="table-responsive">
                    <table id="basic-datatable" class="table table-sm text-center table-hover dt-responsive nowrap w-100">
                        <thead class="table-light">
                            <tr>
                                <th>Menu Name</th>
                                <th>Best Foods (Ratings)</th>
                                <th>Best Sellers (Total Orders)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($menu as $row) : ?>
                                <tr>
                                    <td><?= ucfirst($row['menu']) ?></td>
                                    <td><?= number_format($row['star_rate'], 2) ?></td>
                                    <?php foreach ($getTotaBestFoods as $total) : ?>
                                        <?php if ($total['menu_id'] == $row['id']) : ?>
                                            <td><?= ucfirst($total['count_per_best_food']) ?></td>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
