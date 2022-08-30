<div class="row">
    <div class="col-md-9">
        <h3 class="mt-2"><?= $title ?></h3>
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
<?php if(isset($_SESSION['error_no_flash'])):?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $_SESSION['error_no_flash'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif;?>
<div class="card p-1 mb-3">
    <ul class="nav nav-tabs mb-1" id="myTab">
        <li class="nav-item">
            <a href="#admiMenu" class="nav-link active" data-toggle="tab">Menu list
            </a>
        </li>
        <li class="nav-item">
            <a href="#adminCart" class="nav-link" data-toggle="tab">Cart
                <?php if(!empty($adminCountCartLists)):?>
                    <?php foreach ($adminCountCartLists as $countCart) : ?>
                        <span class="badge badge-primary"><?= $countCart['count_unavailable_admin_carts']; ?></span>
                    <?php endforeach; ?>
                <?php else: ?>
                        <span class="badge badge-primary">0</span>
                <?php endif; ?>
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="admiMenu" class="tab-pane fade show active">
            <?php if(empty($getCreatedOrderNumber)):?>
                <div class="card p-2">
                    <form method="POST" action="/orders/admin/create-order/a" enctype="multipart/form-data">
                        <label for="inputAddress2">Select&nbspOrder&nbspNumber<small class="text-danger">*</small></label>
                        <div class="form-row">
                            <div class="form-group col-md-12 d-flex">
                                <?php foreach ($availableOrderNumbers as $option) : ?>
                                    <?php if ($option['number_status'] == 'a') : ?>
                                        <input type="hidden" value="<?= $option['id'];?>" name="order_number_id">
                                        <button type="submit" class="btn btn-lg m-2 p-4 btn-dark float-left"><h2><?= $option['number'];?></h2></button>
                                    <?php elseif ($option['number_status'] == 'u') : ?>
                                        <input type="hidden" value="<?= $option['id'];?>" name="order_number_id">
                                        <button type="submit" class="btn btn-lg m-2 p-4 btn-dark float-left disabled" disabled><h2><?= $option['number'];?></h2></button>
                                    <?php else: ?>
                                        none
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php if(isset($errors['order_number_id'])):?>
                                    <small class="text-danger"><?=esc($errors['order_number_id'])?></small>
                                <?php endif;?>
                            </div>
                        </div>  
                    </form>  
                </div>
            <?php else: ?>
                <?php foreach ($getCreatedOrderNumber as $orderNumberDetails) : ?>
                    <?php if(!empty($menuCategory)):?>
                        <?php foreach ($menuCategory as $category) : ?>
                            <div class="card m-2 bg-dark text-white">
                                <center><h5 class="m-2"><?= ucfirst($category['name']); ?></h5></center>
                            </div>
                            <div class="row row-cols-1 row-cols-md-5 p-2">
                                <?php foreach ($menuLists as $row) : ?>
                                    <?php if($category['id'] == $row['menu_category_id']): ?>
                                        <div class="col mb-1">
                                            <div class="card col-3 p-0" style="max-width:180px; min-height:300px;">
                                                <img src="<?= '/assets/uploads/menu/'.$row['image'] ?>" height="150px" class="card-img-top" alt="...">
                                                <div class="card-body p-0 mt-1">
                                                    <div class="col-12 m-0">
                                                        <div class="h5 card-title mb-1"><?= ucfirst($row['menu']); ?></div>
                                                        <div class="card-text mt-1">₱ <?= number_format($row['price']); ?></div>
                                                    </div>       
                                                    <div class="d-flex col-12">                         
                                                        <?php if($row['status'] == 'd'): ?>
                                                            <div class="d-flex flex-column">
                                                                <button class="btn m-1 btn-sm btn-danger" animation="true" type="submit" title="Unavailable" disabled>Unavailable</button>
                                                            </div>
                                                        <?php else: ?>
                                                            <form method="POST" action="/orders/admin/add-to-cart/a" enctype="multipart/form-data">
                                                                <div class="d-flex flex-column">
                                                                    <input type="number" min="1" name="quantity" value="1" class="form-control mt-2" placeholder="Quantity">
                                                                    <?php if(isset($errors['order_number_id'])):?>
                                                                        <small class="text-danger"><?=esc($errors['order_number_id'])?></small>
                                                                    <?php endif;?>
                                                                    <input type="hidden" name="order_id" value="<?=$orderNumberDetails['id'];?>">
                                                                    <input type="hidden" name="menu_id" value="<?=$row['id']?>">
                                                                    <button class="btn btn-sm btn-success mt-1" animation="true" type="submit" title="Add to cart">Add&nbspTo&nbspCart</button>
                                                                </div>
                                                            </form>                          
                                                        <?php endif; ?>
                                                    </div>      
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        No menu list
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div id="adminCart" class="tab-pane fade">
            <div class="container-fluid">
                <div class="row">
                    <?php if(!empty($adminUnavailableOrders)):?>
                        <?php foreach ($adminUnavailableOrders as $unavailableOrder) : ?>
                            <?php if(!empty($adminCartLists)):?>
                                <?php foreach ($menuCategory as $category) : ?>
                                    <?php foreach ($adminCartLists as $adminCart) : ?>
                                        <?php if($category['id'] == $adminCart['menu_category_id']):?>
                                            <?php if($unavailableOrder['id'] == $adminCart['order_id']):?>
                                                <div class="col-6 p-0">
                                                    <div class="card ml-1">
                                                        <li class="m-0 p-1 list-group-item d-flex justify-content-between align-items-center">
                                                            <img src="<?= '/assets/uploads/menu/'.$adminCart['image'] ?>" height="84px" width="84px" class="rounded mr-3" alt="...">
                                                            <div class="media-body">
                                                                <span class="badge badge-warning"><?=$category['name'] ?></span>
                                                                <h5 class="mt-0 mb-1"><?=$adminCart['menu'] ?></h5>
                                                                <p><?=$adminCart['price'] ?></p>
                                                            </div>
                                                            <div class="media-body">
                                                                <form method="POST" action="/orders/admin/cart/qty/<?= $adminCart['id']; ?>" enctype="multipart/form-data">
                                                                    <div class="input-group">
                                                                        <input type="number" name="quantity" value="<?= $adminCart['quantity'] ?>" class="form-control" placeholder="Quantity" aria-label="Quantity" aria-describedby="button-addon2">
                                                                        <button class="btn btn-sm btn-outline-secondary" animation="true" type="submit" id="button-addon2" title="Change Quantity"><i class="fas fa-plus-circle"></i>Change</button>
                                                                    </div>
                                                                </form>
                                                                <a onclick="confirmDelete('/orders/admin/cart/d/',<?=$adminCart['id']?>)" data-toggle="tooltip" data-placement="bottom" title="Remove Order" animation="true" class="btn mt-1 btn-sm btn-danger txt-sm float-right">
                                                                    <i class="fas fa-minus-circle"></i> Remove Order
                                                                </a>
                                                            </div>
                                                        </li>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                                <div class="card container-fluid p-2 m-1">
                                    <form method="POST" action="/orders/admin/submit-orders/<?= $unavailableOrder['id']; ?>" enctype="multipart/form-data">
                                            <button class="btn btn-md btn-success float-right" animation="true" type="submit" id="button-addon2" title="Submit Order">
                                                Submit Order&nbsp<i class="fas fa-arrow-right"></i>
                                            </button>
                                    </form>
                                </div>
                            <?php else: ?>
                                No Carts
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        No Orders
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>