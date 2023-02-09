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
                <a class="btn btn-primary btn-sm float-end" href="<?=base_url()?>/ingredient-measures/a" role="button">  Add </a>
                <h5 class="card-title mb-0"><?= $title ?></h5>
                                
                <div id="cardCollpase1" class="collapse pt-3 show">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover dt-responsive nowrap w-100 text-center">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Low Stock Minimum Limit (Need for notification when low ingredients)</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php $id = 1; 
                                foreach ($productMeasure as $row) : ?>
                                    <tr>
                                        <th scope="row"><?= $id++ ?></th>
                                        <td><?= strtolower($row['name']); ?></td>
                                        <td><?= strtolower($row['description']); ?></td>
                                        <td><?= strtolower($row['low_stock_minimum_limit']); ?></td>
                                        <td>
                                            <a href="<?=base_url()?>/ingredient-measures/u/<?= $row['id']; ?>" class="btn btn-sm btn-default"><i class=" dripicons-pencil"></i></a>
                                            <a onclick="confirmDelete('<?=base_url()?>/ingredient-measures/d/',<?=$row['id']?>)" class="btn btn-sm btn-default"><i class=" dripicons-trash"></i></a>
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