<?php foreach($ingredientCategory as $category):?>
    <div class="tab-pane fade show" id="ingredientsTab-<?=$category['id']?>" role="tabpanel" aria-labelledby="ingredientsTab-tab-<?=$category['id']?>">
        <div class="table-responsive table-responsive-sm">
            <table class="table text-center table-sm table-hover dt-responsive nowrap w-100">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th>Name</th>
                        <th>Unit of measure</th>
                        <th>Current Price</th>
                        <th>Status</th>
                        <th>Stock In</th>
                        <th>View Stocks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php foreach($getIngredients as $ingredient):?>
                        <?php if($ingredient['product_category_id'] == $category['id']):?>
                            <tr class="border-bottom">
                                <td><?=$ingredient['product_name']?></td>
                                <td><?=$ingredient['unit_quantity'].' '.$ingredient['description']?></td>
                                <td>₱ <?=$ingredient['price']?></td>
                                <td><?=$ingredient['product_name'] == 1 ? '<span class="badge badge-spill bg-secondary">'.$ingredient['name'].'</span>' : '<span class="badge badge-spill bg-dark">'.$ingredient['name'].'</span>' ?> </td>
                                <td><a href="/ingredients/stocks/<?=$ingredient['id']?>" title="Add" class="btn btn-sm btn-primary">Add</a></td>
                                <td><a href="/ingredients/v/<?=$ingredient['id']?>" title="View" class="btn btn-sm btn-info">Show</a></td>
                                <td><a href="/ingredients/u/<?=$ingredient['id']?>" title="Edit" class="btn btn-sm btn-warning">Edit</a></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $('.table').DataTable();
    </script>
<?php endforeach; ?>