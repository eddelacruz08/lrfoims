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
                <!-- <a class="btn btn-primary btn-sm float-end" href="/menu-ingredients/a" role="button">  Add </a> -->
                <h5 class="card-title mb-0"><?= $title ?>s</h5>

                <?php foreach ($menuCategory as $category) : ?>
                    <p class="h4 bg-default text-dark p-1 left-rounded text-center m-0 text-bold mt-1"><?= ucfirst($category['name']); ?> Category</p>
                    <?php foreach ($menuName as $name) : ?>
                        <?php if ($name['menu_category_id'] == $category['id']) : ?>
                            <button type="button" class="btn btn-dark text-bold h5 w-100 btn-sm accordionMenuIngredients mb-0 mt-1" id="activeMenuIngredients<?=$name['id'];?>">
                                <div class="float-start mt-1"><?= ucwords($name['menu']); ?> Ingredients</div>
                                <a href="/menu-ingredients/a/<?=$name['id'];?>" type="button" class="btn btn-warning float-end btn-sm m-0">Add ingredient</a>
                            </button>
                            <div class="card-body panel p-0" style="display:none;" id="activeMenuIngredients<?=$name['id'];?>">
                                <div class="row text-center mt-0 mb-1 bg-secondary text-white p-0">
                                    <div class="col-md-4"><p class="p-0 m-0">Ingredient Name</p></div>
                                    <div class="col-md-3"><p class="p-0 m-0">Unit of Measure</p></div>
                                    <div class="col-md-2"><p class="p-0 m-0">Amount</p></div>
                                    <div class="col-md-3"><p class="p-0 m-0">Action</p></div>
                                </div>
                                <?php foreach ($menuIngredient as $row) : ?>
                                    <?php if ($name['id'] == $row['menu_id']) : ?>
                                        <?php if ($category['id'] == $row['menu_category_id']) : ?>
                                            <div class="row text-center">
                                                <div class="col-md-4"><p class="p-0 m-0"><?= ucwords($row['ingredient_name']); ?></p></div>
                                                <div class="col-md-3"><p class="p-0 m-0"><?= number_format($row['unit_quantity'],3).' '.$row['description'] ?></p></div>
                                                <div class="col-md-2"><p class="p-0 m-0">₱ <?= number_format($row['price'],2); ?></p></div>
                                                <div class="col-md-3"><p class="p-0 m-0">
                                                    <a href="/menu-ingredients/u/<?= $row['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true" class="btn btn-sm btn-default"><i class=" dripicons-pencil"></i></a>
                                                    <a onclick="confirmDelete('/menu-ingredients/d/',<?=$row['id']?>)" data-toggle="tooltip" data-placement="bottom" title="Delete" animation="true" class="btn btn-sm btn-default"><i class=" dripicons-trash"></i></a>
                                                </p></div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
        </div> <!-- end card-->
    </div><!-- end col -->
</div>
               