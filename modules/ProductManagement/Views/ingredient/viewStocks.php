<div class="row">
    <div class="col-xxl-12 m-0 p-0">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/ingredients">Ingredients</a></li>
                            <li class="breadcrumb-item"><?= $title ?></li>
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

        <?php if(isset($_SESSION['error'])):?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $_SESSION['error'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif;?>
    </div> <!-- end col -->

</div>

<div class="row">
    <!-- task details -->
    <div class="col-xxl-12 m-0 p-0">
        <!-- Portlet card -->
        <div class="card mb-md-0 mb-3 p-0">
            <div class="card-body p-2 pt-2">
                <div class="table-responsive table-responsive-sm" style="overlay-y: scroll; height: 600px;">
                    <table class="table-sm table-hover w-100 text-center">
                        <thead class="table-active">
                            <tr>
                                <th scope="col">
                                    <center>Unit of Measure</center>
                                </th>
                                <th scope="col">
                                    <center>Current Price</center>
                                </th>
                                <th scope="col">
                                    <center>Expiration Date</center>
                                </th>
                                <th scope="col">
                                    <center>Expire Status</center>
                                </th>
                                <th scope="col">
                                    <center>Stock Status</center>
                                </th>
                                <th scope="col">
                                    <center>Created Date</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ingredientStockIn as $stockIn) : ?>
                                <tr>
                                    <td>
                                        <center><?= number_format($stockIn['unit_quantity'],3) ?></center>
                                    </td>
                                    <td>
                                        <center>₱ <?= number_format($stockIn['unit_price'],2); ?></center>
                                    </td>
                                    <td>
                                        <center><?= date('F d, Y',strtotime($stockIn['date_expiration'])); ?></center>
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
                                                        
                                                        // Display the result in the element with id="demo"
                                                        document.getElementById("demo"+demoId).innerHTML = "<button class='btn btn-sm btn-outline-dark'>"+days + "d " + hours + "h "
                                                        + minutes + "m " + seconds + "s "+"</button>";

                                                        // Get today's date and time
                                                        var dateNow = new Date();

                                                        if(days <= 3 && "<?=$stockIn['status']?>" === 'a'){
                                                            showNotification();
                                                            function showNotification() {
                                                                // $.ajax({
                                                                //     type: "GET",
                                                                //     url: "/ingredients/list/v",
                                                                //     async: true,
                                                                //     dataType: 'JSON',
                                                                //     success: function(data) {
                                                                //         for(i=0; i<data.length; i++){
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
                                                                            } else {
                                                                                const updated_at = moment("<?=$stockIn['updated_at'];?>").format('YYYY-MM-DD');
                                                                                const localDate = moment(getDateFromLocalStorage).format('YYYY-MM-DD');
                                                                                const currentDate = moment(dateNow).format('YYYY-MM-DD');
                                                                                            // console.log("localdate: " + localDate+ " === updated_at: " + updated_at);
                                                                                if(updated_at == localDate && "<?=$stockIn['status'];?>" == "a"){
                                                                                    // if("<?=$stockIn['date_expiration'];?>" == currentDate){
                                                                                    //     console.log("Successfully sent notification!");
                                                                                    // }else{
                                                                                    // }
                                                                                }
                                                                                // else{
                                                                                //     $.ajax({
                                                                                //         url: "/ingredients/update-date/u/" + demoId,
                                                                                //         type: "POST",
                                                                                //         data:{},
                                                                                //         cache: false,
                                                                                //         success: function () {
                                                                                //             console.log("Successfully Updated Ingredient <?=$title?>.");
                                                                                //         }
                                                                                //     });
                                                                                // }
                                                                            }
                                                                    //     }
                                                                    // },
                                                                    // error: function(err) {
                                                                    //     console.log(err);
                                                                    // }
                                                                // });
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
                                        <center><?= date('F d, Y - H:i a',strtotime($stockIn['created_at'])); ?></center>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end card-->
    </div><!-- end col -->
</div> 