                <div class="row">
                    <div class="col-md-8">
                        <h3 class="mb-3"><?= $title ?></h3>
                    </div>
                    <div class="col-md-4">
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
                <div class="card shadow-sm bg-white rounded" id="main-holder">
            <div class="card-header">
                <a class="btn btn-info mb-4 float-right" href="/menu-list/a" role="button">
                    <i class="fas fa-plus"></i> add
                </a>
            </div>
            <div class="card-body">
            <?php foreach ($menuCategory as $category) : ?>
                <div class="card m-2 bg-dark text-white">
                    <center><h5 class="m-2"><?= ucfirst($category['name']); ?></h5></center>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-sm responsive" width="100%" id="table">
                                <thead>
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
                                                <center><img src="<?= '/assets/uploads/menu/'.$row['image'] ?>" class="img-fluid" height="100px" width="100px" height="150px"></center>
                                                </td>
                                                <td>
                                                    <center><?= ucfirst($row['menu']) ?></center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <a href="/menu-list/u/<?= $row['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                        <a onclick="confirmDelete('/menu-list/d/',<?=$row['id']?>)" data-toggle="tooltip" data-placement="bottom" title="Delete" animation="true" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
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
            <?php endforeach; ?>
            </div>
        </div>