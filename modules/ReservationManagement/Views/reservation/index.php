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
            <div class="card-header col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-info" href="/reservations/a" role="button">
                            <i class="fas fa-plus-circle"></i> Add Reservation
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">              
                <div class="row">
                    <div class="col-md-12">
                <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All Reservations</a>
                    <a class="nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">My Reservations</a>
                    <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">My Pending Reservations</a>
                    <a class="nav-link" id="nav-approved-tab" data-toggle="tab" href="#nav-approved" role="tab" aria-controls="nav-approved" aria-selected="false">My Approved Reservations</a>
                    <a class="nav-link" id="nav-rejected-tab" data-toggle="tab" href="#nav-rejected" role="tab" aria-controls="nav-rejected" aria-selected="false">My Rejected Reservations</a>
                </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="table-responsive mt-5">
                            <table class="table table-hover responsive" id="table2" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <center>#</center>
                                        </th>
                                        <th scope="col">
                                            <center>Reservation Code</center>
                                        </th>
                                        <th scope="col">
                                            <center>Event Name</center>
                                        </th>
                                        <th scope="col">
                                            <center>Reserved Facility</center>
                                        </th>
                                        <th scope="col">
                                            <center>Reservation Date</center>
                                        </th>
                                        <th scope="col">
                                            <center>Status</center>
                                        </th>
                                        <th scope="col">
                                            <center>Actions</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $id = 1;
                                    foreach (array_reverse($reservations) as $row) : ?>
                                        <tr>
                                            <th scope="row">
                                                <center><?= $id ?></center>
                                            </th>
                                            <td>
                                                <center><?= ucwords($row['reservation_code']); ?></center>
                                            </td>
                                            <td width="15%">
                                                <center><?= ucfirst($row['event_name']) ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucfirst($row['facility_name']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= strtoupper($row['reservation_date']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucwords($row['reservation_remarks']); ?></center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a href="/reservations/v/<?= $row['id']; ?>" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="bottom" title="View" animation="true"><i class="fas fa-eye"></i></a>
                                                    <?php if((session()->get('role_id') <= 2 && $row['status_id'] <= 2) || (session()->get('role_id') <= 2 && $row['status_id'] == 6)):?>
                                                        <a href="/reservations/u/<?= $row['id']; ?>" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true"><i class="fas fa-edit"></i></a>
                                                        <a onclick="confirmDelete('/reservations/d/',<?=$row['id']?>)" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Cancel" animation="true"><i class="fas fa-trash-alt"></i></a>
                                                    <?php endif;?>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php $id++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                </div>
                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    
                        <div class="table-responsive mt-5">
                            <table class="table table-hover responsive" id="table" width="100%">
                                <thead >
                                    <tr>
                                        <th scope="col">
                                            <center>#</center>
                                        </th>
                                        <th scope="col">
                                            <center>Reservation Code</center>
                                        </th>
                                        <th scope="col">
                                            <center>Event Name</center>
                                        </th>
                                        <th scope="col">
                                            <center>Reserved Facility</center>
                                        </th>
                                        <th scope="col">
                                            <center>Reservation Date</center>
                                        </th>
                                        <th scope="col">
                                            <center>Status</center>
                                        </th>
                                        <th scope="col">
                                            <center>Actions</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $id = 1;
                                    foreach (array_reverse($userReservations) as $row) : ?>
                                        <tr>
                                            <th scope="row">
                                                <center><?= $id ?></center>
                                            </th>
                                            <td>
                                                <center><?= ucwords($row['reservation_code']); ?></center>
                                            </td>
                                            <td width="15%">
                                                <center><?= ucfirst($row['event_name']) ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucfirst($row['facility_name']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= strtoupper($row['reservation_date']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucwords($row['reservation_remarks']); ?></center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a href="/reservations/v/<?= $row['id']; ?>" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="bottom" title="View" animation="true"><i class="fas fa-eye"></i></a>
                                                    <?php if(!($row['status_id'] >= 2 && $row['status_id'] < 6) || (!($row['status_id'] >= 2 && $row['status_id'] < 6) && session()->get('role_id') <= 2)):?>
                                                        <a href="/reservations/u/<?= $row['id']; ?>" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true"><i class="fas fa-edit"></i></a>
                                                        <a onclick="confirmDelete('/reservations/d/',<?=$row['id']?>)" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Cancel" animation="true"><i class="fas fa-trash-alt"></i></a>
                                                    <?php endif;?>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php $id++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>    
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="table-responsive mt-5">
                            <table class="table table-hover responsive" id="table" width="100%">
                                <thead >
                                    <tr>
                                        <th scope="col">
                                            <center>#</center>
                                        </th>
                                        <th scope="col">
                                            <center>Reservation Code</center>
                                        </th>
                                        <th scope="col">
                                            <center>Event Name</center>
                                        </th>
                                        <th scope="col">
                                            <center>Reserved Facility</center>
                                        </th>
                                        <th scope="col">
                                            <center>Reservation Date</center>
                                        </th>
                                        <th scope="col">
                                            <center>Status</center>
                                        </th>
                                        <th scope="col">
                                            <center>Actions</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $id = 1;
                                    foreach (array_reverse($userPendingReservations) as $row) : ?>
                                        <tr>
                                            <th scope="row">
                                                <center><?= $id ?></center>
                                            </th>
                                            <td>
                                                <center><?= ucwords($row['reservation_code']); ?></center>
                                            </td>
                                            <td width="15%">
                                                <center><?= ucfirst($row['event_name']) ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucfirst($row['facility_name']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= strtoupper($row['reservation_date']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucwords($row['reservation_remarks']); ?></center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a href="/reservations/v/<?= $row['id']; ?>" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="bottom" title="View" animation="true"><i class="fas fa-eye"></i></a>
                                                    <?php if(!($row['status_id'] >= 2 && $row['status_id'] < 6) || (!($row['status_id'] >= 2 && $row['status_id'] < 6) && session()->get('role_id') <= 2)):?>
                                                        <a href="/reservations/u/<?= $row['id']; ?>" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true"><i class="fas fa-edit"></i></a>
                                                        <a onclick="confirmDelete('/reservations/d/',<?=$row['id']?>)" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Cancel" animation="true"><i class="fas fa-trash-alt"></i></a>
                                                    <?php endif;?>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php $id++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div> 
                </div>
                <div class="tab-pane fade" id="nav-approved" role="tabpanel" aria-labelledby="nav-approved-tab">
                        <div class="table-responsive mt-5">
                            <table class="table table-hover responsive" id="table" width="100%">
                                <thead >
                                    <tr>
                                        <th scope="col">
                                            <center>#</center>
                                        </th>
                                        <th scope="col">
                                            <center>Reservation Code</center>
                                        </th>
                                        <th scope="col">
                                            <center>Event Name</center>
                                        </th>
                                        <th scope="col">
                                            <center>Reserved Facility</center>
                                        </th>
                                        <th scope="col">
                                            <center>Reservation Date</center>
                                        </th>
                                        <th scope="col">
                                            <center>Status</center>
                                        </th>
                                        <th scope="col">
                                            <center>Actions</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $id = 1;
                                    foreach (array_reverse($userApprovedReservations) as $row) : ?>
                                        <tr>
                                            <th scope="row">
                                                <center><?= $id ?></center>
                                            </th>
                                            <td>
                                                <center><?= ucwords($row['reservation_code']); ?></center>
                                            </td>
                                            <td width="15%">
                                                <center><?= ucfirst($row['event_name']) ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucfirst($row['facility_name']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= strtoupper($row['reservation_date']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucwords($row['reservation_remarks']); ?></center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a href="/reservations/v/<?= $row['id']; ?>" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="bottom" title="View" animation="true"><i class="fas fa-eye"></i></a>
                                                    <?php if(!($row['status_id'] >= 2 && $row['status_id'] < 6) || (!($row['status_id'] >= 2 && $row['status_id'] < 6) && session()->get('role_id') <= 2)):?>
                                                        <a href="/reservations/u/<?= $row['id']; ?>" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true"><i class="fas fa-edit"></i></a>
                                                        <a onclick="confirmDelete('/reservations/d/',<?=$row['id']?>)" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Cancel" animation="true"><i class="fas fa-trash-alt"></i></a>
                                                    <?php endif;?>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php $id++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div> 
                </div>
                <div class="tab-pane fade" id="nav-rejected" role="tabpanel" aria-labelledby="nav-rejected-tab">
                        <div class="table-responsive mt-5">
                            <table class="table table-hover responsive" id="table" width="100%">
                                <thead >
                                    <tr>
                                        <th scope="col">
                                            <center>#</center>
                                        </th>
                                        <th scope="col">
                                            <center>Reservation Code</center>
                                        </th>
                                        <th scope="col">
                                            <center>Event Name</center>
                                        </th>
                                        <th scope="col">
                                            <center>Reserved Facility</center>
                                        </th>
                                        <th scope="col">
                                            <center>Reservation Date</center>
                                        </th>
                                        <th scope="col">
                                            <center>Status</center>
                                        </th>
                                        <th scope="col">
                                            <center>Actions</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $id = 1;
                                    foreach (array_reverse($userRejectedReservations) as $row) : ?>
                                        <tr>
                                            <th scope="row">
                                                <center><?= $id ?></center>
                                            </th>
                                            <td>
                                                <center><?= ucwords($row['reservation_code']); ?></center>
                                            </td>
                                            <td width="15%">
                                                <center><?= ucfirst($row['event_name']) ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucfirst($row['facility_name']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= strtoupper($row['reservation_date']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucwords($row['reservation_remarks']); ?></center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a href="/reservations/v/<?= $row['id']; ?>" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="bottom" title="View" animation="true"><i class="fas fa-eye"></i></a>
                                                    <?php if(!($row['status_id'] >= 2 && $row['status_id'] < 6) || (!($row['status_id'] >= 2 && $row['status_id'] < 6) && session()->get('role_id') <= 2)):?>
                                                        <a href="/reservations/u/<?= $row['id']; ?>" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true"><i class="fas fa-edit"></i></a>
                                                        <a onclick="confirmDelete('/reservations/d/',<?=$row['id']?>)" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Cancel" animation="true"><i class="fas fa-trash-alt"></i></a>
                                                    <?php endif;?>
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
            </div>
            <div class="card-footer">

            </div>
        </div>
        <?php if($_SESSION['role_id'] >= 5):?>
            <div class="card shadow-sm bg-white rounded mt-3" id="main-holder">
                <div class="card-header">
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <h2><i class="fas fa-address-book"></i> For Approval</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-pending-tab" data-toggle="tab" href="#nav-pending" role="tab" aria-controls="nav-pending" aria-selected="true">Pending</a>
                                <a class="nav-item nav-link" id="nav-assessed-tab" data-toggle="tab" href="#nav-assessed" role="tab" aria-controls="nav-assessed" aria-selected="false">Assessed</a>
                            </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">
                                <div class="table-responsive mt-3">
                                    <table class="table table-hover responsive" id="table2" width="100%">
                                        <thead >
                                            <tr>
                                                <th scope="col">
                                                    <center>#</center>
                                                </th>
                                                <th scope="col">
                                                    <center>Reservation Code</center>
                                                </th>
                                                <th scope="col">
                                                    <center>Event Name</center>
                                                </th>
                                                <th scope="col">
                                                    <center>Reserved Facility</center>
                                                </th>
                                                <th scope="col">
                                                    <center>Reservation Date</center>
                                                </th>
                                                <th scope="col">
                                                    <center>status</center>
                                                </th>
                                                <th scope="col">
                                                    <center>Actions</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $id = 1;
                                            foreach (array_reverse($reservationsForApproval) as $row) : ?>
                                                <tr>
                                                    <th scope="row">
                                                        <center><?= $id ?></center>
                                                    </th>
                                                    <td>
                                                        <center><?= ucwords($row['reservation_code']); ?></center>
                                                    </td>
                                                    <td width="15%">
                                                        <center><?= ucfirst($row['event_name']) ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?= ucfirst($row['facility_name']); ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?= strtoupper($row['reservation_date']); ?></center>
                                                    </td>
                                                    <td>
                                                        <?php $assessed = false;?>
                                                        <?php if($row['president_is_checked'] == 1 && session()->get('role_id') == 6 || $row['president_is_checked'] == 2 && session()->get('role_id') == 6):?>
                                                            <?php $assessed = true;?>
                                                        <?php elseif($row['custodian_is_checked'] == 1 && session()->get('role_id') == 7 || $row['custodian_is_checked'] == 2 && session()->get('role_id') == 7):?>
                                                            <?php $assessed = true;?>
                                                        <?php elseif($row['admin_is_checked'] == 1 && session()->get('role_id') == 8 || $row['admin_is_checked'] == 2 && session()->get('role_id') == 8):?>
                                                            <?php $assessed = true;?>
                                                        <?php elseif($row['professor_is_checked'] == 1 && session()->get('role_id') == 10 || $row['professor_is_checked'] == 2 && session()->get('role_id') == 10):?>
                                                            <?php $assessed = true;?>
                                                        <?php endif;?>
                                                        <center><?= $assessed?'Assessed':'Pending' ?></center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <a href="/reservations/v/<?= $row['reservation_id']; ?>" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="bottom" title="View" animation="true"><i class="fas fa-eye"></i></a>
                                                        </center>
                                                    </td>
                                                </tr>
                                            <?php $id++;
                                            endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-assessed" role="tabpanel" aria-labelledby="nav-assessed-tab">
                                <div class="table-responsive mt-2">
                                    <table class="table table-hover responsive" id="table2" width="100%">
                                        <thead >
                                            <tr>
                                                <th scope="col">
                                                    <center>#</center>
                                                </th>
                                                <th scope="col">
                                                    <center>Reservation Code</center>
                                                </th>
                                                <th scope="col">
                                                    <center>Event Name</center>
                                                </th>
                                                <th scope="col">
                                                    <center>Reserved Facility</center>
                                                </th>
                                                <th scope="col">
                                                    <center>Reservation Date</center>
                                                </th>
                                                <th scope="col">
                                                    <center>status</center>
                                                </th>
                                                <th scope="col">
                                                    <center>Actions</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $id = 1;
                                            foreach (array_reverse($reservationsAssessed) as $row) : ?>
                                                <tr>
                                                    <th scope="row">
                                                        <center><?= $id ?></center>
                                                    </th>
                                                    <td>
                                                        <center><?= ucwords($row['reservation_code']); ?></center>
                                                    </td>
                                                    <td width="15%">
                                                        <center><?= ucfirst($row['event_name']) ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?= ucfirst($row['facility_name']); ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?= strtoupper($row['reservation_date']); ?></center>
                                                    </td>
                                                    <td>
                                                        <?php $assessed = false;?>
                                                        <?php if($row['president_is_checked'] == 1 && session()->get('role_id') == 6 || $row['president_is_checked'] == 2 && session()->get('role_id') == 6):?>
                                                            <?php $assessed = true;?>
                                                        <?php elseif($row['custodian_is_checked'] == 1 && session()->get('role_id') == 7 || $row['custodian_is_checked'] == 2 && session()->get('role_id') == 7):?>
                                                            <?php $assessed = true;?>
                                                        <?php elseif($row['admin_is_checked'] == 1 && session()->get('role_id') == 8 || $row['admin_is_checked'] == 2 && session()->get('role_id') == 8):?>
                                                            <?php $assessed = true;?>
                                                        <?php elseif($row['professor_is_checked'] == 1 && session()->get('role_id') == 10 || $row['professor_is_checked'] == 2 && session()->get('role_id') == 10):?>
                                                            <?php $assessed = true;?>
                                                        <?php endif;?>
                                                        <center><?= $assessed?'Assessed':'Pending' ?></center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <a href="/reservations/v/<?= $row['reservation_id']; ?>" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="bottom" title="View" animation="true"><i class="fas fa-eye"></i></a>
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
                </div>
            </div>
        <?php endif;?> 