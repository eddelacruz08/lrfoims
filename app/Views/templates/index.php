<?= $this->extend('layout/main') ?>
<?= $this->section('content'); ?>
<?= $this->include('templates/navbar'); ?>

<main class="page-content mt-2">
    <div class="container-sm">
        <div class="row">
            <div class="col-md-12">
                <?= view(esc($view)) ?>
            </div>
        </div>
    </div>
    <!-- <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12" id="copyright">
                    <img src="/assets/img/TIRD.png" width="50px" height="50px" alt=""> <br>
                    <span>Copyright &copy 2021 <b>TIRD Dev Team</b>. | All Rights Reserved</span>
                </div>
            </div>
        </div>
    </footer> -->
</main>
<?= $this->endsection('content'); ?>
