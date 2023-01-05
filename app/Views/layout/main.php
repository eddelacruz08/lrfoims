<!DOCTYPE html>
<html lang="en">
    
    <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" type="image/png" href="/assets/img/lamon_logo.png" />
    <title><?= $page_title ?></title>
    <!-- <link rel="stylesheet" href="/assets/css/style.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css"> -->
    <!-- <link rel="stylesheet" href="/assets/css/bootstrap-image-checkbox.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />  -->
    <link href="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.css" rel="stylesheet" /> 
    <!-- <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.25/r-2.2.9/datatables.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
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
    <link href="/assets/css/app-modern.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="/assets/css/app-modern-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

    <style>
        .select2-selection__choice {
            height: 40px;
            line-height: 40px;
            padding-right: 16px !important;
            padding-left: 16px !important;
            background-color: #CAF1FF !important;
            color: #333 !important;
            border: none !important;
            border-radius: 3px !important;
        }
        .select2-results__option[aria-selected="true"] {
            background-color: #eee !important; 
        }
        .ui-datepicker-calendar {
            display: none;
        }
        .ui-datepicker-month {
            display: none;
        }
        .ui-datepicker-next,.ui-datepicker-prev {
            display:none;
        }
        /* maintenance/menu ingredients css for accordion transition */
        .panel {
            -moz-transition: height .5s;
            -ms-transition: height .5s;
            -o-transition: height .5s;
            -webkit-transition: height .5s;
            transition: height .5s;
            /* height: 0; */
            overflow: hidden;
        }
    </style>
    <style>
        @media (max-width: 768px) {
            .carousel-inner .carousel-item > div {
                display: none;
            }
            .carousel-inner .carousel-item > div:first-child {
                display: block;
            }
            }

            .carousel-inner .carousel-item.active,
            .carousel-inner .carousel-item-start,
            .carousel-inner .carousel-item-next,
            .carousel-inner .carousel-item-prev {
                display: flex;
            /* transition-duration: 10s; */
            }

            /* display 4 */
            @media (min-width: 768px) {
            .carousel-inner .carousel-item-right.active,
            .carousel-inner .carousel-item-next,
            .carousel-item-next:not(.carousel-item-start) {
                transform: translateX(25%) !important;
            }

            .carousel-inner .carousel-item-left.active,
            .carousel-item-prev:not(.carousel-item-end),
            .active.carousel-item-start,
            .carousel-item-prev:not(.carousel-item-end) {
                transform: translateX(-25%) !important;
            }

            .carousel-item-next.carousel-item-start, .active.carousel-item-end {
                transform: translateX(0) !important;
            }

            .carousel-inner .carousel-item-prev,
            .carousel-item-prev:not(.carousel-item-end) {
                transform: translateX(-25%) !important;
            }
        }
        .imageCarousel {
            max-height: 300px;
            max-width: 300px;
            height: 300px;
            width: 300px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css"/>


</head>

<body class="loading" data-layout="detached" data-layout-config='{"leftSidebarCondensed":false,"darkMode":false, "showRightSidebarOnStart": true}'>
  
  
    <?= $this->rendersection('content') ?>
    <!-- /End-bar -->

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/9cef9fee62.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
    <script src="/assets/js/myAlerts.js"></script>
    <!-- bundle -->
    <script src="/assets/js/vendor.min.js"></script>
    <script src="/assets/js/app.min.js"></script>
    <script>
        $('.carousel .carousel-item').each(function(){
            var minPerSlide = 4;
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));
            for (var i=0;i<minPerSlide;i++) {
                next=next.next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }
                next.children(':first-child').clone().appendTo($(this));
            }
        });
    </script>
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

    <!-- demo app -->
    <!-- <script src="/assets/js/pages/demo.dashboard.js"></script> -->
    <!-- <script src="assets/js/pages/demo.chartjs.js"></script> -->
    <?= $this->rendersection('ingredientReportCharts'); ?>
    <?= $this->rendersection('ordersReportCharts'); ?>
    <!-- end demo js-->

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script> -->
    <script src="/assets/js/permissions.js"></script>
    <script src="/assets/js/orders.js"></script>
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
              $('#myTab a[href="' + activeTab + '"]').tab('show');
          }
      });
    </script>
    <!-- ingredients tabs -->
    <script>
      $(document).ready(function(){
          $('a[data-bs-toggle="tab"]').on('show.bs.tab', function(e) {
              localStorage.setItem('activeIngredientsTab', $(e.target).attr('href'));
          });
          var activeIngredientsTab = localStorage.getItem('activeIngredientsTab');
          if(activeIngredientsTab){
              $('a[href="' + activeIngredientsTab + '"]').tab('show');
          }
      });
    </script>
    <script>
		function printOrders(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;

		}
        $("#dateYearPicker").datepicker({
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years",
            autoclose:true
        });
	</script>
    <!-- ingredients accordion collapse -->
    <script>
        $(document).ready(function(){
            $('.collapse-ingredients-stock').on('shown.bs.collapse', function(e) {
                localStorage.setItem('activeAccordion', $(e.target).attr('id'));
            });
            $('.collapse-ingredients-stock').on('hidden.bs.collapse', function(e) {
                localStorage.setItem('notActiveAccordion', $(e.target).attr('id'));
                localStorage.removeItem("activeAccordion");
            });
            var activeAccordion = localStorage.getItem('activeAccordion');
            var notActiveAccordion = localStorage.getItem('notActiveAccordion');
            if(activeAccordion){
                $('.accordion div[id="' + activeAccordion + '"]').collapse('show');
            }else{
                $('.accordion div[id="' + notActiveAccordion + '"]').collapse('hide');
            }
        });
    </script>
    <!-- maintenance/menu-ingredients accordion collapse -->
    <script>
        $(document).ready(function(){
            // $('a[data-bs-toggle="collapse"]').on('shown.bs.collapse', function(e) {
            //     localStorage.setItem('activeAccordion', $(e.target).attr('id'));
            // });
            // $('a[data-bs-toggle="collapse"]').on('hidden.bs.collapse', function(e) {
            //     localStorage.setItem('notActiveAccordion', $(e.target).attr('id'));
            //     localStorage.removeItem("activeAccordion");
            // });
            // var activeAccordion = localStorage.getItem('activeAccordion');
            // var notActiveAccordion = localStorage.getItem('notActiveAccordion');
            // if(activeAccordion){
            //     $('.collapse div[id="' + activeAccordion + '"]').collapse('show');
            // }else{
            //     $('.collapse div[id="' + notActiveAccordion + '"]').collapse('hide');
            // }
        
            var acc = document.getElementsByClassName("accordionMenuIngredients");
            var i;
            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function(e) {
                    localStorage.setItem('activePanelMenuIngredients', $(e.target).attr('id'));
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    console.log(panel);
                    if (panel.style.display === "block") {
                        panel.style.display = "none";
                    } else {
                        panel.style.display = "block";
                    }
                });
            }
            var activePanelMenuIngredients = localStorage.getItem('activePanelMenuIngredients');
            if(activePanelMenuIngredients){
                $('div[id="' + activePanelMenuIngredients + '"]').collapse('show');
            }else{
                $('div[id="' + activePanelMenuIngredients + '"]').collapse('hide');
            }
        });
    </script>
    <script>
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