<?= $this->extend('layout/main') ?>
<?= $this->section('content'); ?>
<!-- Begin page -->
<div class="wrapper">
    <?= $this->include('templates/sidenav'); ?>
    <div class="content-page">
        <div class="content">
            
            <div class="row">
                <div class="col-xxl-8">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
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
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif;?>

                </div> <!-- end col -->

                <!-- task details -->
                <div class="col-xxl-4">
                    <div class="card p-0">
                        <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-3">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Users</span>
                                            <span class="info-box-number">
                                                <h3><?=$users['user']?></h3>
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card mb-2">
                                            <div class="card-header">
                                                <h3 class="card-title mt-3"><b>Monthly Recap Report</b></h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <div class="row">
                                                <div class="col-md-12">
                                                    <div id="canvas-holder">
                                                        <!-- <canvas id="canvas-month"></canvas> -->
                                                    </div>
                                                    <!-- /.chart-responsive -->
                                                </div>
                                                <!-- /.col -->
                                                <!-- <div class="col-md-4">
                                                    <div id="canvas-holder">
                                                        <canvas id="chart-facility"></canvas>
                                                    </div>
                                                </div> -->
                                                <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /.card-footer -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- TABLE: LATEST ORDERS -->
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title mt-3"><b>Activity Log</b></h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                            <th>#</th>
                                                            <th>Activity</th>
                                                            <th>Timestamp</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php $ctr=1;?>
                                                            </tbody>
                                                        </table>
                                                        </div>
                                                        <!-- /.table-responsive -->
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                            <th>#</th>
                                                            <th>Lastest Sign in</th>
                                                            <th>Timestamp</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php $ctr=1;?>
                                                            </tbody>
                                                        </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                                </div>
                                
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->

            </div>
            <!-- end row-->

            <!-- Modal -->
            <div class="modal fade" id="generate-report" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Generate Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?=base_url('reservations/r');?>" method="post" target="_blank">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4"><b>Select Facility:</b></label>
                                            <select class="custom-select form-control <?= isset($errors['event_name']) ? 'is-invalid':'is-valid' ?>" name="facility_id">
                                                <option <?= isset($validation) ? null : 'selected' ?> value="0">Select All</option>
                                            
                                            </select>
                                            <?php if(isset($errors['facility_id'])):?>
                                                <small class="text-danger"><?=esc($errors['facility_id'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity"><b>Start From:</b></label>
                                            <input type="text" class="form-control <?= isset($errors['starting_date']) ? 'is-invalid':'is-valid' ?>" id="datepicker1" placeholder="Start From" name="starting_date" value="<?= isset($value) ? $value['starting_date'] : ''?>" required>
                                            <?php if(isset($errors['starting_date'])):?>
                                                <small class="text-danger"><?=esc($errors['starting_date'])?></small>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCity"><b>End To:</b></label>
                                            <input type="text" class="form-control <?= isset($errors['ending_date']) ? 'is-invalid':'is-valid' ?>" id="datepicker2" placeholder="End to" name="ending_date" value="<?= isset($value) ? $value['ending_date'] : ''?>" required>
                                            <?php if(isset($errors['ending_date'])):?>
                                                <small class="text-danger"><?=esc($errors['ending_date'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-file-pdf"></i> Generate</button>
                    </div>
                </form>
                </div>
            </div>
            </div>

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

<?= $this->section('dashboard_data'); ?>
<?= $this->endsection('dashboard_data'); ?>

