<div class="row">
    <div class="col-xxl-12 m-0 p-0">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><?= $title ?></li>
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
    <div class="col-xxl-12 m-0 p-0">
        <!-- Portlet card -->
        <div class="card mb-md-0 mb-3 p-0">
            <div class="card-body p-1 pt-2">
                <div class="row mb-1">   
                    <div class="col-9">
                        <?php if(user_link('ingredients/a', session()->get('userPermissionView'))):?>
                            <a class="btn btn-success btn-sm" href="/ingredients/a" role="button"> Add Ingredient</a>
                        <?php else: ?>
                            <button type="button" class="btn btn-primary btn-sm mt-1">No Permission | add ingredient</button>
                        <?php endif; ?>
                    </div>
                    <div class="col-3"> 
                        <!-- <?php if(user_link('ingredients/batch-upload/stock-in', session()->get('userPermissionView'))):?> 
                            <div class="ml-2 mr-2 float-end">
                                <a href="/ingredients/batch-upload/stock-in" title="Batch Upload" class="btn btn-sm btn-secondary">Batch Upload</a>
                            </div>
                        <?php else: ?>
                            <button type="button" class="btn btn-primary btn-sm mt-2">No Permission | Batch Upload!</button>
                        <?php endif; ?> 
                        <?php if(user_link('ingredients/batch-upload/export', session()->get('userPermissionView'))):?>
                            <div class="ml-2 ml-2 float-end">
                                <button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#info-alert-modal">Export</button>
                            </div>
                            <div id="info-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-body p-4">
                                            <div class="text-center">
                                                <i class="dripicons-information h1 text-info"></i>
                                                <h4 class="mt-2">Export Ingredients!</h4>
                                                <p class="mt-3">Do you want to continue?</p>
                                                <form action="/ingredients/batch-upload/export" method="post">
                                                    <button type="submit" class="btn btn-info my-2" data-bs-dismiss="modal">
                                                        Continue
                                                    </button>
                                                    <button type="button" class="btn btn-danger my-2" data-bs-dismiss="modal">
                                                        Cancel
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <button type="button" class="btn btn-primary btn-sm mt-2">No Permission | export ingredients!</button>
                        <?php endif; ?> -->
                    </div>
                </div> 

                <ul class="nav nav-tabs mb-2">
                    <?php foreach ($productSortByCategory as $category) : ?>
                        <li class="nav-item border border-bottom-0 mt-1">
                            <a href="#activeIngredientsTab<?=$category['id']; ?>" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 p-1">
                                <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                <span class="d-none d-md-block text-sm m-0"><b><?= ucfirst($category['product_name']); ?></b></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="tab-content">
                    <?php foreach ($productSortByCategory as $category) : ?>
                        <div class="tab-pane fade show" id="activeIngredientsTab<?=$category['id']; ?>">
                            <div class="table-responsive table-responsive-sm">
                                <table id="basic-datatable" class="table table-sm table-hover dt-responsive nowrap w-100">
                                    <thead class="table-active">
                                        <tr>
                                            <th scope="col">
                                                <center>Name</center>
                                            </th>
                                            <th scope="col">
                                                <center>Unit of Measure</center>
                                            </th>
                                            <th scope="col">
                                                <center>Current Price</center>
                                            </th>
                                            <th scope="col" class="table-active">
                                                <center>Status</center>
                                            </th>
                                            <th scope="col">
                                                <center>Stock In</center>
                                            </th>
                                            <th scope="col">
                                                <center>View Stocks</center>
                                            </th>
                                            <th scope="col">
                                                <center>Action</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($getIngredients as $row) : ?>
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
                                                    <td class="table-active">
                                                        <center>
                                                            <?= ($row['product_status_id'] == 1) ? '<span class="badge badge-spill bg-dark">'.ucfirst($row['name']).'</span>': '<span class="badge badge-spill bg-secondary">'.ucfirst($row['name']).'</span>'; ?></span>
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center> 
                                                            <?php if(user_link('ingredients/stocks', session()->get('userPermissionView'))):?>
                                                                <a href="/ingredients/stocks/<?= $row['id']; ?>" title="Stock In And Out" class="btn btn-sm btn-link"><u>Add Stock</u></a>
                                                            <?php else: ?>
                                                                -
                                                            <?php endif; ?>
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center> 
                                                            <?php if(user_link('ingredients/stocks', session()->get('userPermissionView'))):?>
                                                                <a href="/ingredients/v/<?= $row['id']; ?>" title="View" class="btn btn-sm btn-info"><i class="mdi mdi-eye h4"></i></a>
                                                            <?php else: ?>
                                                                -
                                                            <?php endif; ?>
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center> 
                                                            <?php if(user_link('ingredients/u', session()->get('userPermissionView'))):?>
                                                                <a href="/ingredients/u/<?= $row['id']; ?>" title="Edit" class="btn btn-sm btn-link"><u>Edit</u></a>
                                                            <?php else: ?>
                                                                -
                                                            <?php endif; ?>
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
        </div> <!-- end card-->
    </div><!-- end col -->
</div> 
