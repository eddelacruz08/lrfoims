<?= $this->extend('layout/main') ?>
<?= $this->section('content'); ?>
<?= $this->include('templates/navbar'); ?>
  <div class="container-fluid">
    <!-- Begin page -->
    <div class="wrapper">
        <?= $this->include('templates/sidenav'); ?>
        <div class="content-page">
            <div class="content mb-3">
                <?= view(esc($view)) ?>
            </div> 
            <!-- End Content -->
            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>document.write(new Date().getFullYear())</script>
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-md-block">
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->
        </div> 
        <!-- content-page -->
    </div>
</div>
<?= $this->endsection('content'); ?>
<?= $this->section('ordersReportCharts'); ?>
<?= $this->include('Modules\OrderReportManagement\Views\orderReport\orderReportCharts'); ?>
<?= $this->endsection('ordersReportCharts'); ?>
<?= $this->section('ingredientReportCharts'); ?>
<?= $this->include('Modules\IngredientReportManagement\Views\ingredientReport\ingredientReportCharts'); ?>
<?= $this->endsection('ingredientReportCharts'); ?>
<?= $this->include('templates/notifications'); ?>

