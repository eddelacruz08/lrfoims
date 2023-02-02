<!DOCTYPE html>
<html lang="en" id="order_menu_fullscreen_display">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="shortcut icon" type="image/png" href="/assets/img/lamon_logo.png" />
        <title><?= $page_title ?></title>
        <!-- third party css -->
        <link href="/assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->
        
        <!-- third party css -->
        <link href="/assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->


        <!-- Quill css -->
        <link href="/assets/css/vendor/quill.bubble.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/vendor/quill.core.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/vendor/quill.snow.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/app-creative.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="/assets/css/app-creative-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

        <link href="/assets/css/style.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="loading" data-layout="topnav">
  
        <?= $this->rendersection('content') ?>
        
        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> -->
        <!-- <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
        <script src="https://kit.fontawesome.com/9cef9fee62.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.all.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.0/sweetalert2.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
        <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <!-- bundle -->
        <script src="/assets/js/vendor.min.js"></script>
        <script src="/assets/js/app.min.js"></script>
        <!-- third party js -->
        <!-- <script src="/assets/js/vendor/apexcharts.min.js"></script> -->
        <script src="/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="/assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
        <script src="/assets/js/vendor/jquery.dataTables.min.js"></script>
        <script src="/assets/js/vendor/dataTables.bootstrap5.js"></script>
        <script src="/assets/js/vendor/dataTables.responsive.min.js"></script>
        <script src="/assets/js/vendor/responsive.bootstrap5.min.js"></script>
        <script src="/assets/js/vendor/dataTables.buttons.min.js"></script>
        <script src="/assets/js/vendor/buttons.bootstrap5.min.js"></script>
        <script src="/assets/js/vendor/buttons.html5.min.js"></script>
        <script src="/assets/js/vendor/buttons.flash.min.js"></script>
        <script src="/assets/js/vendor/buttons.print.min.js"></script>
        <script src="/assets/js/vendor/dataTables.keyTable.min.js"></script>
        <script src="/assets/js/vendor/dataTables.select.min.js"></script>
        <script src="/assets/js/vendor/Chart.bundle.min.js"></script>
        <script src="/assets/js/vendor/d3.min.js"></script>
        <script src="/assets/js/vendor/britecharts.min.js"></script>
        <!-- third party js ends -->

        <!-- Datatable Init js -->
        <!-- <script src="/assets/js/pages/demo.datatable-init.js"></script> -->

        <!-- Typehead -->
        <!-- <script src="/assets/js/vendor/handlebars.min.js"></script>
        <script src="/assets/js/vendor/typeahead.bundle.min.js"></script> -->

        <!-- Demo -->
        <!-- <script src="/assets/js/pages/demo.typehead.js"></script> -->

        <!-- Timepicker -->
        <script src="/assets/js/pages/demo.timepicker.js"></script>
        <!-- demo app -->
        <!-- <script src="/assets/js/pages/demo.dashboard.js"></script> -->
        <!-- <script src="assets/js/pages/demo.chartjs.js"></script> -->
        <?= $this->rendersection('ingredientReportCharts'); ?>
        <?= $this->rendersection('ordersReportCharts'); ?>
        <!-- end demo js-->

        <script src="/assets/js/myAlerts.js"></script>
        <script src="/assets/js/permissions.js"></script>
        <script src="/assets/js/orders.js"></script>
        <script src="/assets/js/ingredients.js"></script>
        <script src="/assets/js/printer.js"></script>
        <script src="/assets/js/menu_order.js"></script>
        <script src="/assets/js/dashboard.js"></script>
        <!-- <script src="/assets/js/invoiceOrders.js"></script> -->
        
        <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });
            // <!-- orders tabs -->
            $(document).ready(function(){
                $('a[data-bs-toggle="tab"]').on('show.bs.tab', function(e) {
                    localStorage.setItem('activeTab', $(e.target).attr('href'));
                });
                var activeTab = localStorage.getItem('activeTab');
                if(activeTab){
                    $('#orderTypeTab a[href="' + activeTab + '"]').tab('show');
                }
            });

            $("#dateYearPicker").datepicker({
                format: "yyyy",
                viewMode: "years", 
                minViewMode: "years",
                autoclose:true
            });

        // <!-- maintenance/menu-ingredients accordion collapse -->
            $(document).ready(function(){
                var acc = document.getElementsByClassName("accordionMenuIngredients");
                var i;
                for (i = 0; i < acc.length; i++) {
                    acc[i].addEventListener("click", function(e) {
                        localStorage.setItem('activePanelMenuIngredients', $(e.target).attr('id'));
                    });
                }
                var activePanelMenuIngredients = localStorage.getItem('activePanelMenuIngredients');
                if(activePanelMenuIngredients){
                    $('div[id="' + activePanelMenuIngredients + '"]').collapse('show');
                }else{
                    $('div[id="' + activePanelMenuIngredients + '"]').collapse('hide');
                }
            });
            // modal hide and show
            $(document).ready(function(){
                $('a[data-bs-toggle="modal"]').on('shown.bs.modal', function(e) {
                    localStorage.setItem('activeModal', $(e.target).attr('data-bs-target'));
                });
                $('a[data-bs-toggle="modal"]').on('hidden.bs.modal', function(e) {
                    localStorage.setItem('notActiveModal', $(e.target).attr('data-bs-target'));
                    localStorage.removeItem("activeModal");
                });
                var activeModal = localStorage.getItem('activeModal');
                var notActiveModal = localStorage.getItem('notActiveModal');
                if(activeModal){
                    $('div[id="' + notActiveModal + '"]').modal('show');
                }else{
                    $('div[id="' + notActiveModal + '"]').modal('hide');
                }
            });
            // start get stocks expiration ingredients
            setInterval(
                getStockIngredients()
            , 1000);

            function getStockIngredients() {
                $.ajax({
                    type: "GET",
                    url: '/ingredient-reports/get-stock-ingredients',
                    async: true,
                    dataType: 'JSON',
                    success: function(data) {
                        for(let i = 0; i < data.getStockIngredients.length; i++){ 
                            setInterval(
                                getExpirationDate(
                                    data.getStockIngredients[i]['date_expiration'], data.getStockIngredients[i]['status'], 
                                    data.getStockIngredients[i]['updated_at'], 0, data.getStockIngredients[i]['product_name'], 
                                    data.getStockIngredients[i]['unit_quantity'], data.getStockIngredients[i]['ingredient_id'], 
                                    data.getStockIngredients[i]['id'], data.getStockIngredients[i]['stock_status']
                                )
                            , 1000);
                        }
                    }
                });
            }

            function getExpirationDate(date_expiration, status, updated_at_date, user_id, title, unit_quantity, ingredient_id, demoId, stock_status){
                var countDownDate = new Date(date_expiration).getTime();
                setInterval(function(){
                    // console.log('reload');
                    var now = new Date().getTime();
                    var distance = countDownDate - now;
                    
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    
                    var dateNow = new Date();

                    var element = $('#demo'+demoId);
                    if(days >= 4 && status === 'a' && stock_status == 1){
                        var message = "<button class='btn btn-sm btn-outline-dark'>"+days + "d " + hours + "h "+ minutes + "m " + seconds + "s </button>";
                    }else{
                        var message = "<button class='btn btn-sm btn-outline-danger'>"+days + "d " + hours + "h "+ minutes + "m " + seconds + "s </button>";
                    }
                    element.html(message);

                    if (distance < 0) {
                        if(status == 'd'){
                            var el = $('#demo'+demoId);
                            var expiredMsg = "<button class='btn btn-sm btn-danger' disabled>EXPIRED</button>";
                            el.html(expiredMsg);
                        }else{
                            $.ajax({
                                url: "/ingredients/expire-date/set-stock-status",
                                type: "POST",
                                data:{
                                    id: demoId,
                                },
                                cache: false,
                                success: function (response) {
                                    localStorage.removeItem('Stock Id: '+demoId);
                                    var el = $('#demo'+demoId);
                                    var expiredMsg = "<button class='btn btn-sm btn-danger' disabled>EXPIRED</button>";
                                    el.html(expiredMsg);
                                }
                            });
                        }
                    }
                    if(days <= 3 && status == 'a'){
                        const updated_at = moment(updated_at_date).format('YYYY-MM-DD');
                        const currentDate = moment(dateNow).format('YYYY-MM-DD');
                        if(updated_at != currentDate){
                            var routeType = 1;
                            $.ajax({
                                url: "/ingredients/notification/a/"+demoId+"/"+routeType,
                                type: "POST",
                                data:{
                                    user_id: user_id,
                                    name: title,
                                    description: 'Expiring after '+days+' days!',
                                    link: "ingredient-reports",
                                },
                                cache: false,
                                success: function () {
                                    console.log("Notified!");
                                }
                            });
                        }
                    }
                }, 1000);
            }
            // end get stocks expiration ingredients

            // start get low quantity ingredients
            setInterval(
                getLowQuantityIngredients()
            , 1000);
            
            function getLowQuantityIngredients() {
                $.ajax({
                    type: "GET",
                    url: '/ingredients/notif-low-quantity-ingredients',
                    async: true,
                    dataType: 'JSON',
                    success: function(data) {
                        for(let i = 0; i < data.getIngredients.length; i++){ 
                            if(data.getIngredients[i]['unit_quantity'] <= data.getIngredients[i]['limit'] && data.getIngredients[i]['product_status_id'] == 1){
                                sendLowQuantityIngredients(
                                    data.getIngredients[i]['id'], 0, data.getIngredients[i]['product_name'], 
                                    data.getIngredients[i]['product_status_id'], data.getIngredients[i]['unit_quantity'],
                                    data.getIngredients[i]['updated_at']
                                )
                            }
                        }
                    }
                });
            }

            function sendLowQuantityIngredients(id, user_id, title, stock_status, quantity, updated_at_date){
                setInterval(function(){
                    if(stock_status == 1){
                        var dateNow = new Date();
                        const updated_at = moment(updated_at_date).format('YYYY-MM-DD');
                        const currentDate = moment(dateNow).format('YYYY-MM-DD');
                        if(updated_at != currentDate){
                            var routeType = 2;
                            $.ajax({
                                url: "/ingredients/notification/a/"+id+"/"+routeType,
                                type: "POST",
                                data:{
                                    user_id: user_id,
                                    name: title,
                                    description: 'This ingredient has low quantity!',
                                    link: "ingredient-reports",
                                },
                                cache: false,
                                success: function () {
                                    console.log(title + 'has low quantity!');
                                }
                            });
                        }
                    }
                    if(stock_status == 1 && quantity <= 1){
                        $.ajax({
                            url: "/ingredients/update-ingredients-out-of-stock/u/"+id,
                            type: "GET",
                            data:{},
                            cache: false,
                            success: function () {
                                console.log("Out of stock!");
                            }
                        });
                    }
                }, 1000);
            }

            $(document).ready(function(){
                showNotification();
                function showNotification() {
                    setInterval(function() {
                        $.ajax({
                            type: "GET",
                            url: '/notifications/get-notifications',
                            async: true,
                            dataType: 'JSON',
                            success: function(response) {
                                    // console.log(response);
                                var element = $('#notifications');
                                var html = "";
                                for(var z = 0; z <= response.getNotifications.length; z++){
                                    html +="<form id='notifFormId' method='post' action='/ingredients/notify-marked/u/"+response.getNotifications[z].id+"'>";
                                    html +="    <button type='submit' id='submitNotifButton' class='dropdown-item notify-item text-break'>";
                                    html +="        <div class='notify-icon "+(response.getNotifications[z].status == "a" ? "bg-primary" : "bg-secondary")+"'>";
                                    html +="            <i class='mdi mdi-email-outline'></i>";
                                    html +="        </div>";
                                    html +="        <input type='hidden' value='"+response.getNotifications[z].link+"' name='marked_link'/>";
                                    html +="        <p class='notify-details text-break'>"+response.getNotifications[z].name+"";
                                    html +="           <small class='text-muted'>"+response.getNotifications[z].description+"</small>";
                                    html +="           <small class='text-muted'>"+moment(response.getNotifications[z].created_at).startOf("minute").fromNow()+"</small>";
                                    html +="        </p>";
                                    html +="    </button>";
                                    html +="</form>";
                                    html +="<hr class='m-0 p-0'/>";
                                    element.html(html);
                                }
                            }
                        })
                    }, 1000)
                }
                $(() => {
                    $("#submitNotifButton").click(function(ev) {
                        var form = $("#notifFormId");
                        var url = form.attr('action');
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: form.serialize(),
                            cache: false,
                            // success: function(data) {
                            //     viewStocks('/ingredients/v',);
                            // }
                        });
                    });
                });
            });
        </script>
    </body>
</html>
    <?= $this->include('templates/notifications'); ?>