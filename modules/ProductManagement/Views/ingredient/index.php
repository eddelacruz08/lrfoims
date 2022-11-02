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

        <?php if(isset($_SESSION['error'])):?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $_SESSION['error'] ?>
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
                <div class="row mb-1">   
                    <div class="col-6">
                        <h5 class="card-title"><?= $title ?></h5>
                        <?php if(user_link('ingredients/a', session()->get('userPermissionView'))):?>
                            <a class="btn btn-primary btn-sm mt-2" href="/ingredients/a" role="button"> Add Ingredient</a>
                        <?php else: ?>
                            <button type="button" class="btn btn-primary btn-sm mt-2">No Permission | add ingredient</button>
                        <?php endif; ?>
                    </div>
                    <div class="col-6">  
                        <?php if(user_link('ingredients/batch-upload/stock-in', session()->get('userPermissionView'))):?>
                            <form method="post" action="<?php echo base_url('ingredients/batch-upload/stock-in');?>" enctype="multipart/form-data">
                                <div class="form-group mb-1">
                                    <input type="file" name="upload_file" class="form-control" placeholder="Enter Name" id="upload_file" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm float-end"> Batch Upload</button>
                                </div>
                            </form> 
                        <?php else: ?>
                            <button type="button" class="btn btn-primary btn-sm mt-2">No Permission | Batch Upload!</button>
                        <?php endif; ?>
                        <?php if(user_link('ingredients/batch-upload/export', session()->get('userPermissionView'))):?>
                            <a class="btn btn-outline-dark btn-sm" href="/ingredients/batch-upload/export" role="button">Export</a>
                        <?php else: ?>
                            <button type="button" class="btn btn-primary btn-sm mt-2">No Permission | export ingredients!</button>
                        <?php endif; ?>
                    </div>
                </div>
                        
                    
                <div id="cardCollpase1" class="collapse pt-1 show">
                    
                    <?php foreach ($productSortByCategory as $category) : ?>
                        <div class="card-body p-0">
                            <center>
                                <h5 class="bg-dark text-white p-1 mt-2 rounded"><?= ucfirst($category['product_name']); ?></h5>
                            </center>
                            <div class="table-responsive table-responsive-sm">
                                <table id="basic-datatable" class="table table-sm table-hover dt-responsive nowrap w-100">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">
                                                <center>Name</center>
                                            </th>
                                            <th scope="col">
                                                <center>Unit of Measure</center>
                                            </th>
                                            <th scope="col">
                                                <center>Total Amount</center>
                                            </th>
                                            <th scope="col">
                                                <center>Status</center>
                                            </th>
                                            <th scope="col">
                                                <center>Manual Report</center>
                                            </th>
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
                                                        <center><?= number_format($row['unit_quantity'],3).' '.$row['description'] ?></center>
                                                    </td>
                                                    <td>
                                                        <center>₱ <?= number_format($row['price'],2); ?></center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <?= ($row['product_status_id'] == 1) ? '<span class="badge badge-spill bg-dark">'.ucfirst($row['name']).'</span>': '<span class="badge badge-spill bg-secondary">'.ucfirst($row['name']).'</span>'; ?></span>
                                                            <!-- <?= ($row['status'] == 'a') ? '<span class="badge badge-spill bg-success">Showed</span>': '<span class="badge badge-spill badge-secondary">Not showed</span>'; ?> -->
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <?php if(user_link('ingredients/stocks', session()->get('userPermissionView'))):?>
                                                            <div class="accordion bg-info" id="accordionIngredients<?= $row['id']; ?>">
                                                                <div class="card m-0">
                                                                    <div class="card-header bg-info" id="headingOne<?= $row['id']; ?>">
                                                                        <h6 class="m-0">
                                                                            <a class="custom-accordion-title d-block text-center"
                                                                                data-bs-toggle="collapse" href="#collapseOne<?= $row['id']; ?>"
                                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                                <u>Stock In And Out</u>
                                                                            </a>
                                                                        </h6>
                                                                    </div>

                                                                    <div id="collapseOne<?= $row['id']; ?>" class="collapse collapse-ingredients-stock"
                                                                        aria-labelledby="headingOne<?= $row['id']; ?>" data-bs-parent="#accordionIngredients<?= $row['id']; ?>">
                                                                        <div class="card-body p-1">
                                                                            <form action="/ingredients/stocks/<?=$row['id'];?>" method="post">
                                                                                <div class="mb-1">
                                                                                    <label for="stock_type" class="form-label">Stock type: </label>
                                                                                    <select class="form-select form-select-sm <?= isset($errors['stock_type']) ? 'is-invalid':'is-valid' ?>" id="stock_type" name="stock_type">
                                                                                        <option value="">-- Select --</option>
                                                                                        <option value="in">Stock In</option>
                                                                                        <option value="out">Stock Out</option>
                                                                                    </select>
                                                                                    <?php if(isset($errors['stock_type'])):?>
                                                                                        <small class="text-danger"><?=esc($errors['stock_type'])?></small>
                                                                                    <?php endif;?>
                                                                                </div>
                                                                                <div class="mb-1">
                                                                                    <label for="unit_quantity" class="form-label">Unit of Measure: </label>
                                                                                    <input type="text" id="unit_quantity" name="unit_quantity" placeholder="Enter unit of measure" class="form-control form-control-sm <?= isset($errors['unit_quantity']) ? 'is-invalid':'is-valid' ?>" value="<?= isset($value['unit_quantity']) ? $value['unit_quantity'] : '' ?>">
                                                                                    <?php if(isset($errors['unit_quantity'])):?>
                                                                                        <small class="text-danger"><?=esc($errors['unit_quantity'])?></small>
                                                                                    <?php endif;?>
                                                                                </div>
                                                                                <div class="mb-1">
                                                                                    <label for="price" class="form-label">Estimated Amount: </label>
                                                                                    <input type="text" id="price" name="price" placeholder="Enter amount" class="form-control form-control-sm <?= isset($errors['price']) ? 'is-invalid':'is-valid' ?>" value="<?= isset($value['price']) ? $value['price'] : '' ?>">
                                                                                    <?php if(isset($errors['price'])):?>
                                                                                        <small class="text-danger"><?=esc($errors['price'])?></small>
                                                                                    <?php endif;?>
                                                                                </div>
                                                                                <button type="submit" class="btn btn-sm btn-success">Submit</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php else: ?>
                                                            <button type="button" class="btn btn-primary btn-sm mt-2">No Permission | stock in and out!</button>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <center> 
                                                            <!-- Info Header Modal -->
                                                            <?php if(user_link('ingredients/stock-in-out/v', session()->get('userPermissionView'))):?>
                                                                <button  type="button" class="btn btn-sm btn-link" data-bs-toggle="modal" title="View" data-bs-target="#ingredientReports<?=$row['id']?>"><u>View</u></button>
                                                            <?php else: ?>
                                                                <button type="button" class="btn btn-primary btn-sm mt-2">No Permission | stock reports!</button>
                                                            <?php endif; ?>
                                                            <?php if(user_link('ingredients/u', session()->get('userPermissionView'))):?>
                                                                <a href="/ingredients/u/<?= $row['id']; ?>" title="Edit" class="btn btn-sm btn-link"><u>Edit</u></a>
                                                            <?php else: ?>
                                                                <button type="button" class="btn btn-primary btn-sm mt-2">No Permission | edit ingredient!</button>
                                                            <?php endif; ?>
                                                        </center>
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
                                                                                    <th><center>Unit Of Measure</center></th>
                                                                                    <th><center>Unit Price</center></th>
                                                                                    <th><center>Total Price</center></th>
                                                                                    <th><center>Status</center></th>
                                                                                    <th><center>Date & Time</center></th>
                                                                                    <!-- <th><center>Action</center></th> -->
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php foreach ($ingredientReports as $reports) : ?>
                                                                                    <?php if($reports['ingredient_id'] == $row['id']): ?>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <center><?= number_format($reports['unit_quantity'],3).' '.$reports['description'] ?></center>
                                                                                            </td>
                                                                                            <td>
                                                                                                <center>₱ <?= number_format($reports['unit_price'],2); ?></center>
                                                                                            </td>
                                                                                            <td>
                                                                                                <center>₱ <?= number_format($reports['total_unit_price'],2); ?></center>
                                                                                            </td>
                                                                                            <td>
                                                                                                <center><?= ($reports['stock_status'] == 1) ? '<span class="badge badge-spill bg-success">Stock In</span>': '<span class="badge badge-spill bg-danger">Stock Out</span>'; ?></center>
                                                                                            </td>
                                                                                            <td>
                                                                                                <center><?= Date('F d, Y - h:i a', strtotime($reports['created_at'])); ?></center>
                                                                                            </td>
                                                                                            <!-- <td>
                                                                                                <a onclick="updateIngredientReportClick('/ingredients/update-report/',<?=$row['id']?>,'/<?=$reports['id']?>')" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true" class="btn btn-sm btn-warning"><i class=" dripicons-pencil"></i></a>
                                                                                            </td> -->
                                                                                        </tr>
                                                                                    <?php endif; ?>
                                                                                <?php endforeach; ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->
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
