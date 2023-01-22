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

    </div> <!-- end col -->

</div>

<div class="row">

    <!-- task details -->
    <div class="col-xxl-12">
        <!-- Portlet card -->
        <div class="card mb-md-0 mb-3">
            <div class="card-body">
                <h5 class="card-title mb-0"><?= $title ?></h5>
                                
                <div id="cardCollpase1" class="collapse pt-3 show">
                    <div class="table-responsive table-responsive-sm">
                        <table id="basic-datatable" class="table table-sm table-hover dt-responsive nowrap w-100">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">
                                        <center>#</center>
                                    </th>
                                    <th scope="col">
                                        <center>Name</center>
                                    </th>
                                    <th scope="col">
                                        <center>Description</center> 
                                    </th>
                                    <th scope="col">
                                        <center>Link</center> 
                                    </th>
                                    <th scope="col">
                                        <center>Date & time</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $cnt = 1; foreach ($notif as $row) : ?>
                                    <tr>
                                        <th scope="row">
                                            <center><?= $cnt++ ?></center>
                                        </th>
                                        <td>
                                            <center><?= $row['name']; ?></center>
                                        </td>
                                        <td>
                                            <center><?= $row['description']; ?></center>
                                        </td>
                                        <td>
                                            <center><?= $row['link']; ?></center>
                                        </td>
                                        <td>
                                            <center><?= $row['created_at']; ?></center>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end card-->
    </div><!-- end col -->
</div> 