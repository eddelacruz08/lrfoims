<div class="row">
    <div class="col-xxl-12">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active"><?= $title ?></li>
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

    </div> <!-- end col -->

</div>

<div class="row">

    <!-- task details -->
    <div class="col-xxl-12">
        <!-- Portlet card -->
        <div class="card mb-md-0 mb-3">
            <div class="card-body">
                <a class="btn btn-primary btn-sm float-end" href="/barangay/a" role="button">  Add </a>
                <h5 class="card-title mb-0"><?= $title ?></h5>
                                
                <div id="cardCollpase1" class="collapse pt-3 show">
                    <div class="row">
                        <div class="col-md-6 offset-md-6">
                            <div class="input-group input-group-sm justify-content-end mb-1">
                                <input type="text" id="searchBarangay" class="form-control form-control-sm" placeholder="Search . . ." name="searchBarangay">
                                <button onclick="paginateTables('/barangay/v/offset',0,'#display-barangay-table', document.getElementById('searchBarangay').value)" class="btn btn-sm btn-outline-dark" type="button">Search</button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div id="display-barangay-table" onload="displayBarangayData();"></div>
                    </div>
                </div>
            </div>
        </div> <!-- end card-->
    </div><!-- end col -->
</div> 