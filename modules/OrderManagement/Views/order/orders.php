
<?php if (!empty($getOrderDetails)): ?>
    <div class="card mb-2 pt-2">
        <?php foreach ($getOrderDetails as $details): ?>
        <div class="card-body mt-2 ml-2 mr-2 p-0">
            <div class="h5 float-left">Order#<?= $details['order_number'] ?> | </div>
            <span class="h4 badge badge-warning"><?= ucfirst($details['order_status']); ?></span>
            
            <button class="btn btn-primary btn-sm mb-3 float-right" data-toggle="modal" data-target="#addCartModal<?=$details['user_id']?>" type="button">
                <i class="fas fa-plus-circle"></i> add food
            </button>
            <!-- Add Cart Modal -->
            <div class="modal fade" id="addCartModal<?=$details['user_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Food</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="/carts/a" enctype="multipart/form-data">
                                <input type="hidden" name="order_id" value="<?= $details['id'] ?>">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputAddress2">Menu List <small class="text-danger">*</small></label>
                                        <select class="custom-select  <?= isset($errors['menu_id']) ? 'is-invalid':'is-valid' ?>" name="menu_id">
                                            <option value="x" <?= isset($validation) ? null : 'selected' ?>>-- select --</option>
                                            
                                        </select>
                                        <?php if(isset($errors['menu_id'])):?>
                                            <small class="text-danger"><?=esc($errors['menu_id'])?></small>
                                        <?php endif;?>
                                    </div>
                                </div>  
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputAddress2">Quantity <small class="text-danger">*</small></label>
                                        <input type="number" name="quantity" placeholder="Quantity" class="form-control">
                                        <?php if(isset($errors['quantity'])):?>
                                            <small class="text-danger"><?=esc($errors['quantity'])?></small>
                                        <?php endif;?>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success float-right">Add to cart</button>
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="mt-0">
            <div class="table-responsive">
                <table class="table table-hover responsive" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">
                                <center>#</center>
                            </th>
                            <th scope="col">
                                <center>Image</center>
                            </th>
                            <th scope="col">
                                <center>Product Name</center>
                            </th>
                            <th scope="col">
                                <center>Price</center>
                            </th>
                            <th scope="col" width="18%">
                                <center>Qty</center>
                            </th>
                            <th scope="col">
                                <center>SubTotal</center>
                            </th>
                            <th scope="col">
                                <center>Action</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id = 1;
                        foreach ($getCarts as $carts) : ?>
                            <tr>
                                <th scope="row">
                                    <center><?= $id ?></center>
                                </th>
                                <td>
                                    <center>
                                        <img src="<?= '/assets/uploads/orders/'.$carts['image'] ?>" width="80px" class="img-fluid rounded-start" alt="...">
                                    </center>
                                </td>
                                <td>
                                    <center><?= ucfirst($carts['menu']); ?></center>
                                </td>
                                <td>
                                    <center>₱ <?= number_format($carts['price']); ?></center>
                                </td>
                                <td>
                                    <form method="POST" action="/orders/qty/<?= $carts['id']; ?>" enctype="multipart/form-data">
                                        <div class="input-group mb-3">
                                            <input type="number" name="quantity" value="<?= $carts['quantity'] ?>" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <button class="btn btn-sm btn-outline-secondary" animation="true" type="submit" id="button-addon2" title="Change Quantity"><i class="fas fa-plus-circle"></i>Change</button>
                                        </div>
                                    </form>  
                                </td>
                                <td>
                                    <center>₱ <?= number_format($carts['subTotal']);?></center>
                                </td>
                                <td align="center">
                                    <a onclick="confirmDelete('/orders/d/',<?=$carts['id']?>)" data-toggle="tooltip" data-placement="bottom" title="Remove Order" animation="true" class="btn mt-1 btn-sm btn-danger txt-sm"><i class="fas fa-minus-circle"></i></a>
                                </td>
                            </tr>
                        <?php $id++;
                        endforeach; ?>
                    </tbody>
                    <tbody>
                        <?php foreach ($getCartTotalPrice as $totalPrice) : ?>
                            <tr class="m-0 p-0">
                                <td colspan="5">
                                    <p class="h6 m-0">Total Price:</p>
                                </td>
                                <td>
                                    <center> ₱ <?= number_format($totalPrice['total_price']);?></center>
                                </td>
                                <td>
                                    <center>
                                        <form method="POST" action="/orders/qty/<?= $details['order_number']; ?>" enctype="multipart/form-data">
                                            <button title="Change Quantity" animation="true" class="btn btn-sm m-1 ml-5 btn-success">
                                                <i class="fas fa-arrow-right"></i> Place Order
                                            </button>
                                        </form>
                                    </center>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endforeach; ?>
</div>
<?php else: ?>
  No Orders
<?php endif; ?>
