<div class="row">
    <div class="col-xxl-8">

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

    <!-- task details -->
    <div class="col-xxl-4">
        <!-- Portlet card -->
        <div class="card mb-md-0 mb-3">
            <div class="card-body">
                <a class="btn btn-primary btn-sm float-end" href="/ingredients/a" role="button">  Add </a>
                <h5 class="card-title mb-0"><?= $title ?></h5>
                                
                <div id="cardCollpase1" class="collapse pt-1 show">
                    
                    <?php foreach ($productSortByCategory as $category) : ?>
                        <div class="card-body p-1">
                            <center>
                                <h5 class="bg-dark text-white p-1 rounded"><?= ucfirst($category['product_name']); ?></h5>
                            </center>
                            <div class="table-responsive">
                                <table id="basic-datatable" class="table table-hover dt-responsive nowrap w-100">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">
                                                <center>#</center>
                                            </th>
                                            <th scope="col">
                                                <center>Product Name</center>
                                            </th>
                                            <th scope="col">
                                                <center>Unit of Measure</center>
                                            </th>
                                            <th scope="col">
                                                <center>Unit Price</center>
                                            </th>
                                            <th scope="col">
                                                <center>Product Status</center>
                                            </th>
                                            <th scope="col">
                                                <center>Exp. Date</center>
                                            </th>
                                            <!-- <th scope="col">
                                                <center>Display Status</center>
                                            </th> -->
                                            <th scope="col">
                                                <center>Actions</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id = 1;
                                        foreach ($ingredients as $row) : ?>
                                            <?php if($category['id'] == $row['product_category_id']): ?>
                                            <tr>
                                                <th scope="row">
                                                    <center><?= $id ?></center>
                                                </th>
                                                <td>
                                                    <center><?= ucfirst($row['product_name']); ?></center>
                                                </td>
                                                <td>
                                                    <center><?= ($row['quantity'] >= 2) ? $row['quantity'].' '.$row['description'].'s ' : $row['quantity'].' '.$row['description'] ?></center>
                                                </td>
                                                <td>
                                                    <center>₱ <?= number_format($row['price']); ?></center>
                                                </td>
                                                <td>
                                                    <center><?= ($row['product_status_id'] == 1) ? '<span class="badge badge-spill bg-dark">'.ucfirst($row['name']).'</span>': '<span class="badge badge-spill bg-secondary">'.ucfirst($row['name']).'</span>'; ?></span></center>
                                                </td>
                                                <td>
                                                    <center>Unavailable</center>
                                                </td>
                                                <!-- <td>
                                                    <center><?= ($row['status'] == 'a') ? '<span class="badge badge-spill badge-success">Showed</span>': '<span class="badge badge-spill badge-secondary">Not showed</span>'; ?></span></center>
                                                </td> -->
                                                <td>
                                                    <center class="d-flex"> 
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
                                                        <a href="/ingredients/u/<?= $row['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true" class="btn btn-sm btn-default"><i class=" dripicons-pencil"></i></a>
                                                        <a onclick="confirmDelete('/ingredients/d/',<?=$row['id']?>)" data-toggle="tooltip" data-placement="bottom" title="Delete" animation="true" class="btn btn-sm btn-default"><i class=" dripicons-trash"></i></a>
                                                    </center>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php $id++;
                                        endforeach; ?>
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