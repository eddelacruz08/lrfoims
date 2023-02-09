<!DOCTYPE html>
<html lang="en" id="order_menu_fullscreen_display">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="shortcut icon" type="image/png" href="<?=base_url()?>/assets/img/lamon_logo.png" />
        <title><?= $page_title ?></title>
        <!-- third party css -->
        <link href="<?=base_url()?>/assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->
        
        <!-- third party css -->
        <link href="<?=base_url()?>/assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>/assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>/assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>/assets/css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->


        <!-- Quill css -->
        <link href="<?=base_url()?>/assets/css/vendor/quill.bubble.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>/assets/css/vendor/quill.core.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>/assets/css/vendor/quill.snow.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="<?=base_url()?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>/assets/css/app-creative.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="<?=base_url()?>/assets/css/app-creative-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

        <link href="<?=base_url()?>/assets/css/style.css" rel="stylesheet" type="text/css" />

        <link href="<?=base_url()?>/assets/lamon-css/custom.css" rel="stylesheet" type="text/css" />
        
        <!-- Site CSS -->
        <link rel="stylesheet" href="<?=base_url()?>/assets/lamon-css/style.css">    
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="<?=base_url()?>/assets/lamon-css/responsive.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?=base_url()?>/assets/lamon-css/custom.css">

    </head>

    <body class="loading" data-layout="topnav">
  
        <?= $this->rendersection('content_order_status_list') ?>
        
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
        <script src="<?=base_url()?>/assets/js/vendor.min.js"></script>
        <script src="<?=base_url()?>/assets/js/app.min.js"></script>
        <!-- third party js -->
        <!-- <script src="/assets/js/vendor/apexcharts.min.js"></script> -->
        <script src="<?=base_url()?>/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?=base_url()?>/assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
        <script src="<?=base_url()?>/assets/js/vendor/jquery.dataTables.min.js"></script>
        <script src="<?=base_url()?>/assets/js/vendor/dataTables.bootstrap5.js"></script>
        <script src="<?=base_url()?>/assets/js/vendor/dataTables.responsive.min.js"></script>
        <script src="<?=base_url()?>/assets/js/vendor/responsive.bootstrap5.min.js"></script>
        <script src="<?=base_url()?>/assets/js/vendor/dataTables.buttons.min.js"></script>
        <script src="<?=base_url()?>/assets/js/vendor/buttons.bootstrap5.min.js"></script>
        <script src="<?=base_url()?>/assets/js/vendor/buttons.html5.min.js"></script>
        <script src="<?=base_url()?>/assets/js/vendor/buttons.flash.min.js"></script>
        <script src="<?=base_url()?>/assets/js/vendor/buttons.print.min.js"></script>
        <script src="<?=base_url()?>/assets/js/vendor/dataTables.keyTable.min.js"></script>
        <script src="<?=base_url()?>/assets/js/vendor/dataTables.select.min.js"></script>
        <script src="<?=base_url()?>/assets/js/vendor/Chart.bundle.min.js"></script>
        <!-- third party js ends -->

        <!-- Datatable Init js -->
        <script src="<?=base_url()?>/assets/js/pages/demo.datatable-init.js"></script>

        <!-- Typehead -->
        <script src="<?=base_url()?>/assets/js/vendor/handlebars.min.js"></script>
        <script src="<?=base_url()?>/assets/js/vendor/typeahead.bundle.min.js"></script>

        <!-- Demo -->
        <!-- <script src="/assets/js/pages/demo.typehead.js"></script> -->

        <!-- demo app -->
        <!-- <script src="/assets/js/pages/demo.dashboard.js"></script> -->
        <!-- <script src="assets/js/pages/demo.chartjs.js"></script> -->
        <script>
            var element = $('#order-update-status-list');
            setInterval(function(){
                $.ajax({
                    url: "<?=base_url()?>/order-status-list/order-update-status-list",
                    type: 'GET',
                    data: {},
                    success: function (html) {
                        element.html(html);
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        console.log(xhr.responseText);
                        console.log(thrownError);
                    }
                })
            }, 1000);
        </script>
        <!-- end demo js-->
	
        <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

        <!-- ALL JS FILES -->
        <!-- <script src="/assets/lamon-js/jquery-3.2.1.min.js"></script>
        <script src="/assets/lamon-js/popper.min.js"></script>
        <script src="/assets/lamon-js/bootstrap.min.js"></script> -->
        <!-- ALL PLUGINS -->
        <script src="<?=base_url()?>/assets/lamon-js/jquery.superslides.min.js"></script>
        <script src="<?=base_url()?>/assets/lamon-js/images-loded.min.js"></script>
        <script src="<?=base_url()?>/assets/lamon-js/isotope.min.js"></script>
        <script src="<?=base_url()?>/assets/lamon-js/baguetteBox.min.js"></script>
        <script src="<?=base_url()?>/assets/lamon-js/form-validator.min.js"></script>
        <script src="<?=base_url()?>/assets/lamon-js/contact-form-script.js"></script>
        <script src="<?=base_url()?>/assets/lamon-js/custom.js"></script>

        <!-- <script src="/assets/lamon-js/popper.min.js"></script> -->
        <!-- <script src="/assets/lamon-js/main.js"></script> -->
    </body>
</html>
    <?= $this->include('templates/notifications'); ?>