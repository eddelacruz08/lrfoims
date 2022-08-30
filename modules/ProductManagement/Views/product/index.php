        <div class="row">
            <div class="col-md-9">
                <h3 class="mt-2"><?= $title ?></h3>
            </div>
            <div class="col-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?= $title ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <?php if(isset($_SESSION['success'])):?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $_SESSION['success'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif;?>
        <div class="card shadow-sm bg-white rounded mb-3" id="main-holder">
            <div class="card-header">
                <a class="btn btn-primary float-right" href="/products/a" role="button">
                    <i class="fas fa-plus"></i> add
                </a>
            </div>
            <?php $id = 1;
            foreach ($productSortByCategory as $category) : ?>
            <div class="card-body p-1">
                <center>
                    <h5 class="bg-dark text-white p-2 rounded"><?= ucfirst($category['product_name']); ?></h5>
                </center>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover" id="table" width="100%">
                                <thead class="thead-white">
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
                                    foreach ($products as $row) : ?>
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
                                                <center><?= ($row['product_status_id'] == 1) ? '<span class="badge badge-spill badge-dark">'.ucfirst($row['name']).'</span>': '<span class="badge badge-spill badge-secondary">'.ucfirst($row['name']).'</span>'; ?></span></center>
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
                                                        <form method="POST" action="/products/status/<?= $row['id']; ?>" enctype="multipart/form-data">
                                                                <input type="hidden" name="status" value="d">
                                                                <button class="btn m-1 btn-sm btn-danger" animation="true" type="submit" title="Disable">Disable</button>

                                                        </form>  
                                                    <?php else: ?>
                                                        <form method="POST" action="/products/status/<?= $row['id']; ?>" enctype="multipart/form-data">
                                                                <input type="hidden" name="status" value="a">
                                                                <button class="btn m-1 btn-sm btn-success" animation="true" type="submit" title="Enable">Enable</button>
                                      
                                                        </form>  
                                                    <?php endif; ?> -->
                                                    <a href="/products/u/<?= $row['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true" class="btn m-1 btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                    <a onclick="confirmDelete('/products/d/',<?=$row['id']?>)" data-toggle="tooltip" data-placement="bottom" title="Delete" animation="true" class="btn m-1 btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
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
                </div>
            </div>
            <?php $id++;
            endforeach; ?>
        </div>