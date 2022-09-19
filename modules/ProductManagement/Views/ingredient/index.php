<div class="row">
    <div class="col-xxl-12">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
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
                <a class="btn btn-primary btn-sm float-end" href="/ingredients/a" role="button">  Add </a>
                <h5 class="card-title mb-0"><?= $title ?></h5>
                                
                <div id="cardCollpase1" class="collapse pt-1 show">
                    
                    <?php foreach ($productSortByCategory as $category) : ?>
                        <div class="card-body p-0">
                            <center>
                                <h5 class="bg-dark text-white p-1 mt-2 rounded"><?= ucfirst($category['product_name']); ?></h5>
                            </center>
                            <div class="table-responsive">
                                <table id="basic-datatable" class="table table-hover dt-responsive nowrap w-100">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">
                                                <center>Name</center>
                                            </th>
                                            <th scope="col">
                                                <center>Unit of Measure</center>
                                            </th>
                                            <th scope="col">
                                                <center>Quantity</center>
                                            </th>
                                            <th scope="col">
                                                <center>Unit Price</center>
                                            </th>
                                            <th scope="col">
                                                <center>Status</center>
                                            </th>
                                            <!-- <th scope="col">
                                                <center>Exp. Date</center>
                                            </th> -->
                                            <th scope="col">
                                                <center>Action</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ingredients as $row) : ?>
                                            <?php if($category['id'] == $row['product_category_id']): ?>
                                                <tr>
                                                    <td>
                                                        <center><?= ucfirst($row['product_name']); ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?= ($row['unit'] > 1) ? $row['unit'].' '.$row['description'].'s ' : $row['unit'].' '.$row['description'] ?></center>
                                                    </td>
                                                    <td>
                                                        <center>x<?= $row['quantity'];?></center>
                                                    </td>
                                                    <td>
                                                        <center>₱ <?= number_format($row['price']); ?></center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <?= ($row['product_status_id'] == 1) ? '<span class="badge badge-spill bg-dark">'.ucfirst($row['name']).'</span>': '<span class="badge badge-spill bg-secondary">'.ucfirst($row['name']).'</span>'; ?></span>
                                                            <!-- <?= ($row['status'] == 'a') ? '<span class="badge badge-spill bg-success">Showed</span>': '<span class="badge badge-spill badge-secondary">Not showed</span>'; ?> -->
                                                        </center>
                                                    </td>
                                                    <!-- <td>
                                                        <center>Unavailable</center>
                                                    </td> -->
                                                    <td>
                                                        <center> 
                                                            <!-- <?php if($row['status'] == 'a'): ?>
                                                                <form method="POST" action="/ingredients/status/<?= $row['id']; ?>" enctype="multipart/form-data">
                                                                        <input type="hidden" name="status" value="d">
                                                                        <button class="btn m-1 btn-sm btn-danger" animation="true" type="submit" title="Disable">Disable</button>

                                                                </form>  
                                                            <?php else: ?>
                                                                <form method="POST" action="/ingredients/status/<?= $row['id']; ?>" enctype="multipart/form-data">
                                                                        <input type="hidden" name="status" value="a">
                                                                        <button class="btn m-1 btn-sm btn-success" animation="true" type="submit" title="Enable">Enable</button>
                                                
                                                                </form>  
                                                            <?php endif; ?> -->
                                                            <?php if(Date('Y-m-d', strtotime($row['stock_out_date'])) == $date): ?>
                                                            <?php else: ?>
                                                                <a onclick="addIngredientReportClick('/ingredients/apply-report/',<?=$row['id']?>,'/<?=$row['quantity']?>')" data-toggle="tooltip" data-placement="bottom" title="Add Report" animation="true" class="btn btn-sm btn-success"><i class="mdi mdi-book-arrow-right-outline"></i></a>
                                                            <?php endif; ?>
                                                            <!-- <a href="/ingredients/v/<?= $row['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="View" animation="true" class="btn btn-sm btn-info"><i class="mdi mdi-eye"></i></a> -->
                                                            <!-- Info Header Modal -->
                                                            <button  type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" title="View" data-bs-target="#ingredientReports<?=$row['id']?>"><i class="mdi mdi-file-eye-outline"></i></button>
                                                            <div id="ingredientReports<?=$row['id']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header modal-colored-header bg-primary">
                                                                            <h4 class="modal-title" id="primary-header-modalLabel"><?= ucfirst($row['product_name']); ?></h4>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <table class="table table-centered mb-0">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th><center>Ingredient Name</center></th>
                                                                                        <th><center>Quantity</center></th>
                                                                                        <th><center>Unit Price</center></th>
                                                                                        <th><center>Total Price</center></th>
                                                                                        <th><center>Date & Time</center></th>
                                                                                        <th><center>Action</center></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php foreach ($ingredientReports as $reports) : ?>
                                                                                        <?php if($reports['ingredient_id'] == $row['id']): ?>
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <center><?= ucfirst($row['product_name']); ?></center>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <center>x<?= $reports['quantity'];?></center>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <center>₱ <?= number_format($reports['unit_price']); ?></center>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <center>₱ <?= number_format($reports['total_unit_price']); ?></center>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <center><?= Date('F d, Y - h:i a', strtotime($reports['created_at'])); ?></center>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <a onclick="updateIngredientReportClick('/ingredients/update-report/',<?=$row['id']?>,'/<?=$reports['id']?>')" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true" class="btn btn-sm btn-warning"><i class=" dripicons-pencil"></i></a>
                                                                                                </td>
                                                                                            </tr>
                                                                                        <?php endif; ?>
                                                                                    <?php endforeach; ?>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->
                                                            <a href="/ingredients/u/<?= $row['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true" class="btn btn-sm btn-warning"><i class=" dripicons-pencil"></i></a>
                                                            <!-- <a onclick="confirmDelete('/ingredients/d/',<?=$row['id']?>)" data-toggle="tooltip" data-placement="bottom" title="Delete" animation="true" class="btn btn-sm btn-danger"><i class=" dripicons-trash"></i></a> -->
                                                        </center>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div> <!-- end card-->
    </div><!-- end col -->
</div> 