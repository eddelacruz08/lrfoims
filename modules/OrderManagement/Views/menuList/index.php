<div class="row">
    <div class="col-xxl-12">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><?= $title ?></li>
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
        <?php if(isset($_SESSION['error_no_flash'])):?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $_SESSION['error_no_flash'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif;?>

    </div> <!-- end col -->

</div>

<div class="row">
    
    <!-- task details -->
    <div class="col-xxl-12">
        <div class="card p-0">
            <div class="card-body p-2">
                <ul class="nav nav-tabs mb-1" id="myTab">
                    <li class="nav-item">
                        <a href="#admiMenu" class="nav-link active" data-bs-toggle="tab">Order Menu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#adminCart" class="nav-link" data-bs-toggle="tab">Cart
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
                                <a onclick="createOrderNumber('/orders/create-order-number')" title="Add an Order" animation="true" class="btn btn-lg btn-dark">
                                    Add an Order 
                                </a>
                            </div>
                        <?php else: ?>
                            <?php foreach ($getCreatedOrderNumber as $orderNumberDetails) : ?>
                                <?php if(!empty($menuCategory)):?>
                                    <?php foreach ($menuCategory as $category) : ?>
                                        <div class="card mt-2 mb-2 bg-dark text-white">
                                            <center><h5 class="m-2"><?= ucfirst($category['name']); ?></h5></center>
                                        </div>
                                        <div class="row row-cols-1 row-cols-md-5 g-4">
                                            <?php foreach ($menuLists as $row) : ?>
                                                <?php if($category['id'] == $row['menu_category_id']): ?>
                                                    <div class="col">
                                                        <div class="card h-70">
                                                            <img src="<?= '/assets/uploads/menu/'.$row['image'] ?>" height="120" class="card-img-top" alt="...">
                                                            <div class="card-body p-1">
                                                                <h5 class="card-title"><?= ucfirst($row['menu']); ?></h5>
                                                                <p class="card-text">₱ <?= number_format($row['price']); ?></p>
                                                            </div> 
                                                            <div class="card-footer p-1">                     
                                                            <?php if($row['menu_status'] == 'u'): ?>
                                                                <div class="d-flex flex-column">
                                                                    <button class="btn m-1 btn-sm btn-danger" animation="true" type="button" title="Unavailable" disabled>Unavailable</button>
                                                                </div>
                                                            <?php else: ?>
                                                                <form method="POST" action="/orders/admin-menu/add-to-cart/a" enctype="multipart/form-data">
                                                                    <div class="d-flex flex-column">
                                                                        <input type="number" min="1" max="10" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');" name="quantity" value="1" class="form-control" placeholder="Quantity" required>
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
                    <div id="adminCart" class="tab-pane fade m-0 p-0">
                        <div class="container-fluid m-0 p-0">
                            <div class="row">
                                <?php if(!empty($adminUnavailableOrders)):?>
                                    <?php foreach ($adminUnavailableOrders as $unavailableOrder) : ?>
                                        <?php if(!empty($adminCartLists)):?>
                                            <?php foreach ($adminCartLists as $adminCart) : ?>
                                                <?php if($unavailableOrder['id'] == $adminCart['order_id']):?>
                                                    <?php foreach ($menuCategory as $category) : ?>
                                                        <?php if($category['id'] == $adminCart['menu_category_id']):?>
                                                            <div class="col-6 p-2">
                                                                <div class="card p-1 m-1">
                                                                    <li class="m-0 p-1 list-group-item d-flex justify-content-between align-items-center">
                                                                        <img src="<?= '/assets/uploads/menu/'.$adminCart['image'] ?>" height="84px" width="84px" class="rounded mr-3" alt="...">
                                                                        <div class="media-body p-2">
                                                                            <span class="badge bg-dark"><?=$category['name'] ?></span>
                                                                            <h5 class="mt-0 mb-1"><?=$adminCart['menu'] ?></h5>
                                                                            <p>₱ <?=$adminCart['price'] ?></p>
                                                                        </div>
                                                                        <div class="media-body">
                                                                            <form method="POST" action="/orders/admin-menu/cart/qty/<?= $adminCart['id']; ?>/<?=$adminCart['menu_id']?>/<?=$adminCart['order_id']?>/<?=$adminCart['quantity']?>/1" enctype="multipart/form-data">
                                                                                <div class="input-group">
                                                                                    <input type="number" name="quantity" min="1"  max="10" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');" value="<?= $adminCart['quantity'] ?>" class="form-control" placeholder="Quantity" aria-label="Quantity" aria-describedby="button-addon2" required>
                                                                                    <button class="btn btn-sm btn-outline-secondary" animation="true" type="submit" id="button-addon2" title="Change Quantity"><i class="fas fa-plus-circle"></i>&nbspChange</button>
                                                                                </div>
                                                                            </form>
                                                                            <a onclick="confirmDeleteCart('/orders/admin-menu/cart/d/',<?=$adminCart['id']?>,<?=$adminCart['menu_id']?>,<?=$adminCart['order_id']?>,<?=$adminCart['quantity']?>)" data-toggle="tooltip" data-placement="bottom" title="Remove Order" animation="true" class="btn mt-1 btn-sm btn-danger txt-sm float-right">
                                                                                <i class="fas fa-minus-circle"></i> Remove Order
                                                                            </a>
                                                                        </div>
                                                                    </li>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <div class="card container-fluid p-2 m-1">
                                                <form method="POST" action="/orders/admin-menu/submit-orders/<?= $unavailableOrder['id']; ?>" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <label for="inputAddress2">Select order type: <small class="text-danger">*</small></label>
                                                            <select class="form-select <?= isset($errors['order_type']) ? 'is-invalid':'is-valid' ?>" name="order_type">
                                                                <option disabled value="" <?= isset($validation) ? null : 'selected' ?>>-- select order type --</option>
                                                                <?php foreach ($orderType as $option) : ?>
                                                                    <?php $selected = false; ?>
                                                                    <?php if(isset($value['order_type'])):?>
                                                                        <?php if($value['order_type'] == $option['id']): ?>
                                                                            <?php $selected = true; ?>
                                                                        <?php endif; ?>
                                                                    <?php endif;?>
                                                                    <?php if($option['id'] == 3): ?>
                                                                        <!-- <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?> disabled><?= ucwords($option['type']) ?></option> -->
                                                                    <?php else: ?>
                                                                        <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= ucwords($option['type']) ?></option>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <?php if(isset($errors['order_type'])):?>
                                                                <small class="text-danger"><?=esc($errors['order_type'])?></small>
                                                            <?php endif;?>
                                                        </div>
                                                        <div class="col-sm-6 p-3">
                                                            <button class="btn btn-md btn-success float-right" animation="true" type="submit" id="button-addon2" title="Submit Order">
                                                                Submit Order&nbsp<i class="fas fa-arrow-right"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        <?php else: ?>
                                            <div class="mt-5 mb-5 text-center">No Carts</div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="mt-5 mb-5 text-center">No Order</div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>