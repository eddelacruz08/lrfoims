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
                <a class="btn btn-primary btn-sm float-end" href="/menu-ingredients/a" role="button">  Add </a>
                <h5 class="card-title mb-0"><?= $title ?></h5>
                                
                <div id="cardCollpase1" class="collapse pt-3 show">
                        <div class="table-responsive">
                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">
                                            <center>Ingredient Name</center>
                                        </th>
                                        <th scope="col">
                                            <center>Unit of Measure</center>
                                        </th>
                                        <th scope="col">
                                            <center>Amount</center>
                                        </th>
                                        <th scope="col">
                                            <center>Action</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($menuCategory as $category) : ?>
                                        <tr>
                                            <td class="table-secondary" colspan="4">
                                                <center><?= ucfirst($category['name']); ?></center>
                                            </td>
                                        </tr>
                                        <?php foreach ($menuName as $name) : ?>
                                            <?php if ($name['menu_category_id'] == $category['id']) : ?>
                                                <tr>
                                                    <td class="table-primary" colspan="4">
                                                        <center><?= ucwords($name['menu']); ?></center>
                                                    </td>
                                                </tr>
                                                <?php foreach ($menuIngredient as $row) : ?>
                                                    <?php if ($name['id'] == $row['menu_id']) : ?>
                                                        <tr>
                                                            <?php if ($category['id'] == $row['menu_category_id']) : ?>
                                                                <td>
                                                                    <center><?= ucwords($row['ingredient_name']); ?></center>
                                                                </td>
                                                                <td>
                                                                    <center><?= number_format($row['unit_quantity'],3).' '.$row['description'] ?></center>
                                                                </td>
                                                                <td>
                                                                    <center>₱ <?= number_format($row['price'],2); ?></center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <a href="/menu-ingredients/u/<?= $row['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true" class="btn btn-sm btn-default"><i class=" dripicons-pencil"></i></a>
                                                                        <a onclick="confirmDelete('/menu-ingredients/d/',<?=$row['id']?>)" data-toggle="tooltip" data-placement="bottom" title="Delete" animation="true" class="btn btn-sm btn-default"><i class=" dripicons-trash"></i></a>
                                                                    </center>
                                                                </td>
                                                            <?php endif; ?>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div> <!-- end card-->
    </div><!-- end col -->
</div>
               