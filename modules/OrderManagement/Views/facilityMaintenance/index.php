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
                <a class="btn btn-info mb-4" href="/facility-maintenances/a" role="button">
                    <i class="fas fa-plus-circle"></i> add 
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
                                            <center>Facility</center>
                                        </th>
                                        <th scope="col">
                                            <center>Maintenance Date</center>
                                        </th>
                                        <th scope="col">
                                            <center>Scheduled Time</center>
                                        </th>
                                        <th scope="col">
                                            <center>Description</center>
                                        </th>
                                        <th scope="col">
                                            <center>Actions</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $id = 1;
                                    foreach ($facilityMaintenance as $row) : ?>
                                        <tr>
                                            <th scope="row">
                                                <center><?= $id ?></center>
                                            </th>
                                            <td>
                                                <center><?= ucfirst($row['facility_name']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucfirst($row['maintenance_date']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= date('h:i: A', strtotime(($row['scheduled_starting_time']))) . ' - ' . date('h:i: A', strtotime(($row['scheduled_end_time']))) ; ?></center>
                                            </td>
                                            </td>
                                            <td>
                                                <center><?= ucfirst($row['description']); ?></center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a href="/facility-maintenances/u/<?= $row['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                    <a onclick="confirmDelete('/facility-maintenances/d/',<?=$row['id']?>)" data-toggle="tooltip" data-placement="bottom" title="Delete" animation="true" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
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