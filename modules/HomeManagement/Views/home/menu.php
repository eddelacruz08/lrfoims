<div class="container">
    <div class="content">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Menu</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Menu</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-centered dt-responsive w-100 nowrap"> 
                                <?php foreach($menuCategory as $category):?>
                                    <thead class="table-light">
                                        <tr>
                                            <th class="table-dark" colspan="7"><center><?=$category['name']?></center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="all">Menu</th>
                                            <th>Added Date</th>
                                            <th>Price</th>
                                            <th style="width: 85px;">Quantity</th>
                                            <th>Status</th>
                                            <th style="width: 85px;">Action</th>
                                        </tr>
                                        <?php foreach($menu as $row):?>
                                            <?php if($category['id'] == $row['menu_category_id']):?>
                                                <form method="POST" action="/menu/customer/add-to-cart">
                                                    <tr>
                                                        <td>
                                                            <img src="<?= '/assets/uploads/menu/'.$row['image'] ?>" alt="contact-img" title="contact-img" class="rounded me-3" height="48" />
                                                            <p class="m-0 d-inline-block align-middle font-16">
                                                                <a href="javascript:void(0);" class="text-body"><?=$row['menu']?></a>
                                                                <br/>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <?= Date('F d, Y', strtotime($row['created_at'])); ?>
                                                        </td>
                                                        <td>
                                                            ₱ <?= number_format($row['price']); ?>
                                                        </td>
                                                        <td>
                                                            <input type="number" min="1" name="quantity" value="1" class="form-control" placeholder="Quantity">
                                                        </td>
                                                        <td>
                                                            <?= $row['status'] == 'a' ? '<span class="badge bg-warning">Available</span>' : '<span class="badge bg-secondary">Unavailable</span>'?>
                                                        </td>
                                                        <td class="table-action">
                                                            <input type="hidden" name="menu_id" value="<?=$row['id']?>">
                                                            <button class="btn btn-sm <?= $row['status'] == 'a' ? 'btn-success':'btn-secondary'?>" animation="true" type="submit" title="Add to cart"<?= $row['status'] == 'a' ? '':'disabled'?>>Add&nbspTo&nbspCart</button>
                                                        </td>
                                                    </tr>
                                                </form>     
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </tbody>
                                <?php endforeach;?>
                            </table>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->  

    </div> <!-- End Content -->
</div> <!-- End Content -->