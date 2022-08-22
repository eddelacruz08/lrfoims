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
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <?php $id = 1;
                    foreach ($orders as $row) : ?>
                    <div class="orders-data" id="<?=$row['id']?>"></div>
                <?php $id++;
                    endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>