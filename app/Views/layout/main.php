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
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
        <script src="https://kit.fontawesome.com/9cef9fee62.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.all.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.0/sweetalert2.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
        <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
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
        <!-- third party js ends -->

        <!-- Datatable Init js -->
        <script src="/assets/js/pages/demo.datatable-init.js"></script>

        <!-- Typehead -->
        <script src="/assets/js/vendor/handlebars.min.js"></script>
        <script src="/assets/js/vendor/typeahead.bundle.min.js"></script>

        <!-- Demo -->
        <script src="/assets/js/pages/demo.typehead.js"></script>

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
        </script>
    </body>
</html>
    <?= $this->include('templates/notifications'); ?>