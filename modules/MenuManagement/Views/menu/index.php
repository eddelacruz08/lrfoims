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

    <!-- task details -->
    <div class="col-xxl-12">
        <!-- Portlet card -->
        <div class="card mb-md-0 mb-3">
            <div class="card-body">
                <a class="btn btn-primary btn-sm float-end" href="/menu-list/a" role="button">  Add </a>
                <h5 class="card-title mb-0"><?= $title ?></h5>
                                
                <div id="cardCollpase1" class="collapse pt-3 show">
                    
                <?php foreach ($menuCategory as $category) : ?>
                    <div class="card m-2 bg-dark text-white">
                        <center><h5 class="m-2"><?= ucfirst($category['name']); ?></h5></center>
                    </div>
                    <div class="table-responsive">
                        <table id="basic-datatable" class="table table-hover dt-responsive nowrap w-100">
                            <thead class="thead-dark">
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
                                                <center><?= $id ?></center>
                                            </th>
                                            <td>
                                            <center><img src="<?= '/assets/uploads/menu/'.$row['image'] ?>" class="img-fluid" height="100px" width="100px"></center>
                                            </td>
                                            <td>
                                                <center><?= ucfirst($row['menu']) ?></center>
                                            </td>
                                            <td>
                                                <center>
                                                <a href="/menu-list/u/<?= $row['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true" class="btn btn-sm btn-default"><i class=" dripicons-pencil"></i></a>
                                                <a onclick="confirmDelete('/menu-list/d/',<?=$row['id']?>)" data-toggle="tooltip" data-placement="bottom" title="Delete" animation="true" class="btn btn-sm btn-default"><i class=" dripicons-trash"></i></a>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                <?php $id++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div> <!-- end card-->
    </div><!-- end col -->
</div> 
