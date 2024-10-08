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
                <?php if(user_link('modules/a', session()->get('userPermissionView'))):?>
                    <a class="btn btn-primary btn-sm float-end" href="<?=base_url()?>/modules/a" role="button">  Add </a>
                <?php else: ?>
                    <button type="button" class="btn btn-secondary btn-sm">No Permission | Add Button</button>
                <?php endif; ?>
                <h5 class="card-title mb-0"><?= $title ?></h5>
                                
                <div id="cardCollpase1" class="collapse pt-3 show">
                    <div class="table-responsive">
                        <table id="basic-datatable" class="table table-sm table-hover dt-responsive nowrap w-100">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">
                                        <center>#</center>
                                    </th>
                                    <th scope="col">
                                        <center>Module</center>
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
                                foreach ($modules as $module) : ?>
                                    <tr>
                                        <th scope="row">
                                            <center><?= $id ?></center>
                                        </th>
                                        <td>
                                            <center><?= strtolower($module['module']); ?></center>
                                        </td>
                                        <td>
                                            <center><?= strtolower($module['description']); ?></center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php if(user_link('modules/u', session()->get('userPermissionView'))):?>
                                                    <a href="<?=base_url()?>/modules/u/<?= $module['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true" class="btn btn-sm btn-default"><i class=" dripicons-pencil"></i></a>
                                                <?php else: ?>
                                                    <button type="button" class="btn btn-secondary btn-sm">No Permission | Edit Button</button>
                                                <?php endif; ?>
                                                <?php if(user_link('modules/d', session()->get('userPermissionView'))):?>
                                                    <a onclick="confirmDelete('<?=base_url()?>/modules/d/',<?=$module['id']?>)" data-toggle="tooltip" data-placement="bottom" title="Delete" animation="true" class="btn btn-sm btn-default"><i class=" dripicons-trash"></i></a>
                                                <?php else: ?>
                                                    <button type="button" class="btn btn-secondary btn-sm">No Permission | Delete Button</button>
                                                <?php endif; ?>
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
        </div> <!-- end card-->
    </div><!-- end col -->
</div>              
               