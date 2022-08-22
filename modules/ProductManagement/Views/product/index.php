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
                <a class="btn btn-info float-right" href="/ingredients/a" role="button">
                    <i class="fas fa-plus"></i> add
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover" id="table" width="100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">
                                            <center>#</center>
                                        </th>
                                        <th scope="col">
                                            <center>Product Name</center>
                                        </th>
                                        <th scope="col">
                                            <center>Product Category</center>
                                        </th>
                                        <th scope="col">
                                            <center>Product Quantity Description</center>
                                        </th>
                                        <th scope="col">
                                            <center>Product Status</center>
                                        </th>
                                        <th scope="col">
                                            <center>Actions</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $id = 1;
                                    foreach ($products as $row) : ?>
                                        <tr>
                                            <th scope="row">
                                                <center><?= $id ?></center>
                                            </th>
                                            <td>
                                                <center><?= ucfirst($row['product_name']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucfirst($row['product_description']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucfirst($row['product_quantity_description']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucfirst($row['equipment_status']); ?></center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a href="/products/u/<?= $row['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                    <a onclick="confirmDelete('/products/d/',<?=$row['id']?>)" data-toggle="tooltip" data-placement="bottom" title="Delete" animation="true" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php $id++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                       </div>
                </div>
            </div>
        </div>