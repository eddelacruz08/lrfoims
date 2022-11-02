<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active"><?=$title?></li>
                </ol>
            </div>
            <h4 class="page-title"><?=$title?></h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-12">
        <div class="card widget-inline">
            <div class="card-body p-0">
                <div class="row g-0">

                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0 border-start">
                            <div class="card-body text-center">
                                <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
                                <h3>
                                    <span>
                                        <?php foreach ($getTotalUsers as $totalUsers): ?>
                                            <?=$totalUsers['getTotalUsers'];?>
                                        <?php endforeach; ?>
                                    </span>
                                </h3>
                                <p class="text-muted font-15 mb-0">Total Users</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0 border-start">
                            <div class="card-body text-center">
                                <i class="mdi mdi-cart-outline text-muted" style="font-size: 24px;"></i>
                                <h3>
                                    <span>
                                        <?php foreach ($getTotalOrders as $totalOrders): ?>
                                            <?=$totalOrders['getTotalOrders'];?>
                                        <?php endforeach; ?>
                                    </span>
                                </h3>
                                <p class="text-muted font-15 mb-0">Total Orders</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0 border-start">
                            <div class="card-body text-center">
                                <i class="mdi mdi-food text-muted" style="font-size: 24px;"></i>
                                <h3>
                                    <span>
                                        <?php foreach ($getTotalIngredients as $totalIngredients): ?>
                                            <?=$totalIngredients['getTotalIngredients'];?>
                                        <?php endforeach; ?>
                                    </span>
                                </h3>
                                <p class="text-muted font-15 mb-0">Total Ingredients</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0 border-start">
                            <div class="card-body text-center">
                                <i class="mdi mdi-clipboard-list-outline text-muted" style="font-size: 24px;"></i>
                                <h3>
                                    <span>
                                        <?php foreach ($getTotalLogs as $totalLogs): ?>
                                            <?=$totalLogs['getTotalLogs'];?>
                                        <?php endforeach; ?>
                                    </span>
                                </h3>
                                <p class="text-muted font-15 mb-0">Total Activities</p>
                            </div>
                        </div>
                    </div>

                </div> <!-- end row -->
            </div>
        </div> <!-- end card-box-->
    </div> <!-- end col-->
</div>
<!-- end row-->


<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a type="button" class="btn btn-outline-dark btn-sm float-end m-0">Export</a>
                <h4 class="header-title mb-3">Recent Activities</h4>

                <div class="table-responsive">
                    <table class="table table-centered table-nowrap table-hover mb-0">
                        <tbody>
                            <?php if (!empty($getActivities)): ?>
                                <?php foreach ($getActivities as $activity): ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-start">
                                                <img class="me-2 rounded-circle" src="/assets/img/user.jpg" width="40" alt="Generic placeholder image">
                                                <div>
                                                    <?php foreach ($getUsers as $user): ?>
                                                        <?php if ($user['id'] == $activity['user_id']): ?>
                                                            <h5 class="mt-0 mb-1"><?=$user['first_name'].' '.$user['last_name'] ;?>
                                                                <small class="fw-normal ms-3"><?=Date('F d, Y - h:i a', strtotime($activity['created_at']))?></small>
                                                            </h5>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                    <span class="font-13"><?=ucfirst($activity['description']);?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php foreach ($getUsers as $user): ?>
                                                <?php if ($user['id'] == $activity['user_id']): ?>
                                                    <span class="text-muted font-13"><?=$user['username'];?></span> <br/>
                                                    <?php foreach ($getRoles as $role): ?>
                                                        <?php if ($role['id'] == $user['role_id']): ?>
                                                            <p class="mb-0"><?=ucwords($role['role_name']) ;?></p>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                No available data
                            <?php endif; ?>
                            
                        </tbody>
                    </table>
                    <style type="text/css"> 
                        .paginate a { 
                            padding-left: 5px; 
                            padding-right: 5px; 
                            margin-left: 5px; 
                            margin-right: 5px; 
                        } 
                        .paginate .pagination li.active{
                            background: deepskyblue;
                            color: white;
                        }
                        .paginate .pagination li.active a{
                            color: white;
                            text-decoration: none;
                        }
                    </style>
                    <!-- Pagination -->
                    <div class="d-flex justify-content-end paginate">
                        <?php if ($pager) :?>
                            <?php $pagi_path='dashboard'; ?>
                            <?php $pager->setPath($pagi_path); ?>
                            <?= $pager->links() ?>
                        <?php endif ?>
                    </div>
                </div> <!-- end table-responsive-->

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->