<div class="container">
    <div class="content">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Order Status List</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Order Status List</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-2">Preparing</h4>
                        <div class="table-responsive">
                            <table class="table-sm table-centered table-nowrap table-hover text-center w-100 mb-0">
                                <thead>
                                    <tr>
                                        <th>Order#</th>
                                        <th>Status</th>
                                        <th>Order Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($preparingOrders as $row): ?> 
                                        <tr>
                                            <td>Order#<?=$row['number']?></td>
                                            <td><span class="badge bg-warning">preparing</span></td>
                                            <td><span class="badge bg-primary">
                                                <?php if($row['order_type'] == 1):?>
                                                    Take Out
                                                <?php elseif($row['order_type'] == 2):?>
                                                    Dine In
                                                <?php else: ?>
                                                    Delivery
                                                <?php endif; ?>
                                            </span></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-2">Ready to serve</h4>
                        <div class="table-responsive">
                            <table class="table-sm table-centered table-nowrap table-hover text-center w-100 mb-0">
                                <thead>
                                    <tr>
                                        <th>Order#</th>
                                        <th>Status</th>
                                        <th>Order Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($servingOrders as $row): ?> 
                                        <tr>
                                            <td>Order#<?=$row['number']?></td>
                                            <td><span class="badge bg-warning">serving</span></td>
                                            <td><span class="badge bg-primary">
                                                <?php if($row['order_type'] == 1):?>
                                                    Take Out
                                                <?php elseif($row['order_type'] == 2):?>
                                                    Dine In
                                                <?php else: ?>
                                                    Delivery
                                                <?php endif; ?>
                                            </span></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->  

    </div> <!-- End Content -->
</div> <!-- End Content -->