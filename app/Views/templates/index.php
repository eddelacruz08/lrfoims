<?= $this->extend('layout/main') ?>
<?= $this->section('content'); ?>
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
                        <script>document.write(new Date().getFullYear())</script> © Hyper - Coderthemes.com
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-md-block">
                            <a href="javascript: void(0);">About</a>
                            <a href="javascript: void(0);">Support</a>
                            <a href="javascript: void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div> 
    <!-- content-page -->
</div>
<?= $this->endsection('content'); ?>
