                <div class="row">
                    <div class="col-md-9">
                        <h3 class="mb-3"><?= $title ?></h3>
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
                <div class="card shadow-sm bg-white rounded" id="main-holder">
            <div class="card-header">
                <a class="btn btn-info mb-4" href="/faculties/a" role="button">
                    <i class="fas fa-plus-circle"></i> add 
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <form action="/faculties/i" method="post" enctype="multipart/form-data">
                                <label><b>Add faculties from CSV </b><small class="text-danger">*</small></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input " name="uploadFile" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                        </div>
                                        <div class="input-group-prepend ml-1">
                                            <button class="btn btn-primary" type="submit" id="inputGroupFileAddon03"><i class="fas fa-file-upload"></i> Upload</button>
                                        </div>
                                    </div>
                                    <?php if(isset($errors['uploadFile'])):?>
                                        <small class="text-danger"><?=esc($errors['uploadFile'])?></small>
                                    <?php else:?>
                                        <small class="text-secondary"><i>Only upload CSV files. The maximum accepted file size is 3mb.</i></small>
                                    <?php endif;?>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-hover" id="table" width="100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">
                                            <center>#</center>
                                        </th>
                                        <th scope="col">
                                            <center>Employee Number</center>
                                        </th>
                                        <th scope="col">
                                            <center>Name of Faculty</center>
                                        </th>
                                        <th scope="col">
                                            <center>Department</center>
                                        </th>
                                        <th scope="col">
                                            <center>Position </center>
                                        </th>
                                        <th scope="col">
                                            <center>Actions</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $id = 1;
                                    foreach ($faculties as $row) : ?>
                                        <tr>
                                            <th scope="row">
                                                <center><?= $id ?></center>
                                            </th>
                                            <td>
                                                <center><?= ucwords($row['employee_number']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucfirst($row['first_name']).' '.ucfirst($row['last_name']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucfirst($row['department']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucfirst($row['position']); ?></center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a href="/faculties/v/<?= $row['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="View" animation="true" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                                    <a href="/faculties/u/<?= $row['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                    <a onclick="confirmDelete('/faculties/d/',<?=$row['id']?>)" data-toggle="tooltip" data-placement="bottom" title="Delete" animation="true" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
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