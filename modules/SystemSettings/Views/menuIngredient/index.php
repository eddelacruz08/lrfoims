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
                <!-- <a class="btn btn-primary btn-sm float-end" href="/menu-ingredients/a" role="button">  Add </a> -->
                <h5 class="card-title mb-0"><?= $title ?>s</h5>

                <div class="accordion custom-accordion" id="custom-accordion-one">
                    <style>
                        .ingredient-container {
                            display: flex;
                            flex-wrap: wrap;
                        }
                        .ingredient-card-header {
                            flex: 1 1 150px;
                        }
                    </style>
                    <?php foreach ($menuCategory as $category) : ?>
                        <p class="h5 text-white p-1 rounded-top text-center m-0 text-bold mt-1" style="background-color: #313a46;"><?= ucfirst($category['name']); ?> Category</p>
                        <?php foreach ($menuName as $name) : ?>
                            <?php if ($name['menu_category_id'] == $category['id']) : ?>
                                <div class="ingredient-container m-0">
                                    <div class="ingredient-card-header card-header m-0 p-0" id="headingFour<?=$name['id'];?>">
                                        <h5 class="m-0 p-1">
                                            <a class="custom-accordion-title d-block m-1 accordionMenuIngredients" data-bs-toggle="collapse" id="activeMenuIngredients<?=$name['id'];?>" href="#activeMenuIngredients<?=$name['id'];?>"
                                                aria-expanded="true" aria-controls="collapseFour">
                                                <?= ucwords($name['menu']); ?> Ingredients <i class="mdi mdi-chevron-down"></i>
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="ingredient-card-header card-header m-0 p-0" id="headingFour">
                                        <h5 class="m-0 p-1">
                                            <a href="/menu-ingredients/a/<?=$name['id'];?>" type="button" class="btn btn-primary float-end btn-sm m-0">Add</a>
                                        </h5>
                                    </div>
                                </div>
                                <div id="activeMenuIngredients<?=$name['id'];?>" class="collapse" aria-labelledby="headingFour<?=$name['id'];?>" data-bs-parent="#custom-accordion-one">
                                    <div class="card p-0 rounded-bottom mb-2">    
                                        <div class="card-body m-0 pt-0 pe-2 ps-2 pb-0 rounded-bottom border-danger">
                                            <div class="row text-center mt-0 mb-1 text-white p-0" style="background-color: #db624e;">
                                                <div class="col-md-2"><p class="p-0 m-0">#</p></div>
                                                <div class="col-md-4"><p class="p-0 m-0">Ingredient Name</p></div>
                                                <div class="col-md-3"><p class="p-0 m-0">Unit of Measure</p></div>
                                                <div class="col-md-3"><p class="p-0 m-0">Action</p></div>
                                            </div>
                                            <?php if (!empty($menuIngredient)) : ?>
                                                <?php $cnt = 1; ?>
                                                <?php foreach ($menuIngredient as $row) : ?>
                                                    <?php if ($name['id'] == $row['menu_id']) : ?>
                                                        <?php if ($category['id'] == $row['menu_category_id']) : ?>
                                                            <div class="row text-center border-bottom">
                                                                <div class="col-md-2"><p class="p-0 m-0"><?= $cnt++; ?></p></div>
                                                                <div class="col-md-4"><p class="p-0 m-0"><?= ucwords($row['ingredient_name']); ?></p></div>
                                                                <div class="col-md-3"><p class="p-0 m-0"><?= number_format($row['unit_quantity'],2).' '.$row['description'] ?></p></div>
                                                                <div class="col-md-3"><p class="p-0 m-0">
                                                                    <a href="/menu-ingredients/u/<?= $row['id']; ?>/<?=$name['id'];?>" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true" class="btn btn-sm btn-default"><i class=" dripicons-pencil"></i></a>
                                                                    <a onclick="confirmDelete('/menu-ingredients/d/',<?=$row['id']?>)" data-toggle="tooltip" data-placement="bottom" title="Delete" animation="true" class="btn btn-sm btn-default"><i class=" dripicons-trash"></i></a>
                                                                </p></div>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                No ingredients
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div> <!-- end card-->
    </div><!-- end col -->
</div>
               