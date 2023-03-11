<!DOCTYPE html>
<html lang="en">
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

        <link href="/assets/lamon-css/custom.css" rel="stylesheet" type="text/css" />
        
        <!-- Site CSS -->
        <link rel="stylesheet" href="/assets/lamon-css/style.css">    
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="/assets/lamon-css/responsive.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="/assets/lamon-css/custom.css">
        <style>
            #loader {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: #fff;
                z-index: 9999;
                text-align: center;
            }

            #loader img {
                margin-top: 10%;
            }
        </style>
    </head>

    <body class="loading" data-layout="topnav" style="background-color: #fff">
  
        <div id="loader">
            <img src="https://i.pinimg.com/originals/f1/d1/75/f1d175885a9c26d93aaafbeaa8f6e204.gif">
            <p>Loading...</p>
        </div>

        <?= $this->rendersection('content_order_status_list') ?>
        
        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
           var xhr = new XMLHttpRequest();
            var start = new Date().getTime();
            
            xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    var end = new Date().getTime();
                    var duration = end - start;
                    
                    setTimeout(function() {
                        document.getElementById("loader").style.display = "none";
                    }, duration);
                }
            };
            var currentUrl = window.location.href;
            xhr.open("GET", currentUrl, true);
            xhr.send();

            document.getElementById("loader").style.display = "block";
        </script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
        <script src="https://kit.fontawesome.com/9cef9fee62.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.all.min.js"></script>
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

        <script>
            var element = $('#order-update-status-list');
            setInterval(function(){
                $.ajax({
                    url: "/order-status-list/order-update-status-list",
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

        <!-- ALL PLUGINS -->
        <script src="/assets/lamon-js/jquery.superslides.min.js"></script>
        <script src="/assets/lamon-js/images-loded.min.js"></script>
        <script src="/assets/lamon-js/isotope.min.js"></script>
        <script src="/assets/lamon-js/baguetteBox.min.js"></script>
        <script src="/assets/lamon-js/form-validator.min.js"></script>
        <script src="/assets/lamon-js/contact-form-script.js"></script>
        <script src="/assets/lamon-js/custom.js"></script>
    </body>
</html>
    <?= $this->include('templates/notifications'); ?>