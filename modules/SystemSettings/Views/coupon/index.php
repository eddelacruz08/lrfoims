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
                <a class="btn btn-primary btn-sm float-end" href="/coupons/a" role="button">  Add </a>
                <h5 class="card-title mb-0"><?= $title ?></h5>
                                
                <div id="cardCollpase1" class="collapse pt-3 show">
                    <div class="table-responsive table-responsive-sm">
                        <table class="table table-sm table-hover dt-responsive nowrap w-100 text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Coupon Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Expiration Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $cnt = 1; foreach ($coupons as $row) : ?>
                                    <tr>
                                        <th scope="row"><?= $cnt++; ?></th>
                                        <th><?= $row['name']; ?></th>
                                        <td><?= $row['description']; ?></td>
                                        <td><?= $row['code']; ?></td>
                                        <td><?= $row['amount']; ?></td>
                                        <td><?= $row['expiration_date']; ?></td>
                                        <td><?= $row['status'] == 'd' ? '<span class="badge bg-danger">Not Available</span>' : '<span class="badge bg-success">Available</span>'?></td>
                                        <td>
                                            <a onclick="confirmDelete('/coupons/d/',<?=$row['id']?>)" data-toggle="tooltip" data-placement="bottom" title="Delete" animation="true" class="btn btn-sm btn-default"><i class=" dripicons-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end card-->
    </div><!-- end col -->
</div> 