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
                <a class="btn btn-primary btn-sm float-end" href="<?=base_url()?>/provinces/a" role="button">  Add </a>
                <h5 class="card-title mb-0"><?= $title ?></h5>
                                
                <div id="cardCollpase1" class="collapse pt-3 show">
                    <div class="table-responsive">
                        <table id="basic-datatable" class="table table-hover dt-responsive nowrap w-100">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">
                                        <center>psgcCode</center>
                                    </th>
                                    <th scope="col">
                                        <center>Province Name</center>
                                    </th>
                                    <th scope="col">
                                        <center>Region Code</center> 
                                    </th>
                                    <th scope="col">
                                        <center>Province Code</center> 
                                    </th>
                                    <th scope="col">
                                        <center>Actions</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($provinces as $row) : ?>
                                    <tr>
                                        <th scope="row">
                                            <center><?= $row['psgcCode']; ?></center>
                                        </th>
                                        <td>
                                            <center><?= $row['province_name']; ?></center>
                                        </td>
                                        <td>
                                            <center><?= $row['region_code']; ?></center>
                                        </td>
                                        <td>
                                            <center><?= $row['province_code']; ?></center>
                                        </td>
                                        <td>
                                            <center>
                                                <a href="<?=base_url()?>/provinces/u/<?= $row['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true" class="btn btn-sm btn-default"><i class=" dripicons-pencil"></i></a>
                                                <a onclick="confirmDelete('<?=base_url()?>/provinces/d/',<?=$row['id']?>)" data-toggle="tooltip" data-placement="bottom" title="Delete" animation="true" class="btn btn-sm btn-default"><i class=" dripicons-trash"></i></a>
                                            </center>
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