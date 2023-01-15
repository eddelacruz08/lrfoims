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

    <!-- task details -->
    <div class="col-xxl-12">
        <!-- Portlet card -->
        <div class="card mb-md-0 mb-3">
            <div class="card-body">
                <a class="btn btn-primary btn-sm float-end" href="/menu-list/a" role="button">  Add </a>
                <h5 class="card-title mb-0"><?= $title ?></h5>
                                
                <div id="cardCollpase1" class="collapse pt-3 show">
                    
                    <?php foreach ($menuCategory as $category) : ?>
                        <div class="card mt-1 mb-1 bg-dark text-white">
                            <center><h5 class="m-1"><?= ucfirst($category['name']); ?></h5></center>
                        </div>
                        <div class="table-responsive">
                            <table id="table-basic" class="table table-sm table-hover dt-responsive nowrap w-100">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">
                                            <center>#</center>
                                        </th>
                                        <th scope="col">
                                            <center>Image</center>
                                        </th>
                                        <th scope="col">
                                            <center>Menu</center>
                                        </th>
                                        <th scope="col">
                                            <center>Show Status</center>
                                        </th>
                                        <th scope="col">
                                            <center>Action</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $id = 1;
                                    foreach ($menu as $row) : ?>
                                        <?php if($category['id'] == $row['menu_category_id']): ?>
                                            <tr>
                                                <th scope="row">
                                                    <center><?= $id++; ?></center>
                                                </th>
                                                <td>
                                                <center><img src="<?= '/assets/uploads/menu/'.$row['image'] ?>" class="img-fluid" style="height: 80px; width: 80px;"></center>
                                                </td>
                                                <td>
                                                    <center><?= ucfirst($row['menu']) ?></center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <form action="/menu-list/menu-status/u/<?=$row['id']?>" method="POST">
                                                            <input type="checkbox" onclick="if(this.checked){this.form.submit()}else{this.form.submit()}" name="menu_status" id="switch<?=$row['id']?>" <?=$row['menu_status']=='a'?'checked value="'.$row['menu_status'].'"':'value="'.$row['menu_status'].'"' ?> data-switch="success"/>
                                                            <label for="switch<?=$row['id']?>" data-on-label="Yes" data-off-label="No"></label>
                                                        </form>
                                                    </center>
                                                </td>
                                                <td>
                                                    <center>
                                                    <a href="/menu-list/u/<?= $row['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true" class="btn btn-sm btn-default"><i class=" dripicons-pencil"></i></a>
                                                    <a onclick="confirmDelete('/menu-list/d/',<?=$row['id']?>)" data-toggle="tooltip" data-placement="bottom" title="Delete" animation="true" class="btn btn-sm btn-default"><i class=" dripicons-trash"></i></a>
                                                </center>
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div> <!-- end card-->
    </div><!-- end col -->
</div> 
