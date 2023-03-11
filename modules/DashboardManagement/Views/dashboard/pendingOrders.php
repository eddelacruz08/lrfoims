
<table id="pending-orders-data-table" class="table-sm table-centered table-nowrap table-hover text-center w-100 mb-0">
    <thead class="bg-dark text-white">
        <tr>
            <th>Order#</th>
            <th>Status</th>
            <th>Date & Time</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($getPendingOrders as $row): ?> 
            <tr class="border-bottom">
                <td>Order#<?=$row['number']?></td>
                <td><span class="badge bg-secondary"><?=$row['order_status']?></span></td>
                <td><?= Date('M d, Y - h:i a', strtotime($row['created_at']))?></td>
                <td>
                    <button onclick="returnIngredients('/dashboard/return-ingredients/', <?=$row['id']?>)" type="button" class="btn btn-warning btn-sm">Return Ingredients</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="row">
    <div class="col-md-6 offset-md-6">
        <?php 
            $linkcount = ceil(count($all_items) / $limitPerTable);
            if($linkcount > 1) {
                $cnt = 0;
                $isActive = false;
                $active = 0;
            ?>
            <nav aria-label="...">
                <ul class="pagination justify-content-end">
                    <?php if($offset > 0) { ?>
                        <li class="page-item">
                            <a class="page-link" type="button" onclick="paginateTables('/dashboard/get-pending-orders/v/offset', <?=($offset - $limitPerTable)?>,'#display-pending-orders-table')">Previous</a>
                        </li>
                    <?php } else { ?>
                        <li class="page-item disabled">
                            <a class="page-link" type="button" onclick="paginateTables('/dashboard/get-pending-orders/v/offset', <?=($offset - $limitPerTable)?>,'#display-pending-orders-table')">Previous</a>
                        </li>
                    <?php 
                        }
                        while($cnt < $linkcount) {
                            $isActive = ($offset / $limitPerTable) == $cnt ? true : false;
                            if($isActive) {
                                $active = $cnt;
                            }
                            $cnt++;
                            $cntPerPage = (($cnt-1)*$limitPerTable);
                    ?>
                    <li class="page-item <?=($isActive == true ? "active":"")?>">
                        <a class="page-link" type="button" onclick="paginateTables('/dashboard/get-pending-orders/v/offset', <?=$cntPerPage?>,'#display-pending-orders-table')"><?=$cnt?></a>
                    </li>
                    <?php 
                        }
                        if($active == ($linkcount -1)) { ?>
                            <li class="page-item disabled">
                                <a class="page-link" type="button" onclick="paginateTables('/dashboard/get-pending-orders/v/offset', <?=$offset?>,'#display-pending-orders-table')">Next</a>
                            </li>
                    <?php 
                        } else { 
                            $activePerPage = (($active+1)*$limitPerTable);
                    ?>
                            <li class="page-item">
                                <a class="page-link" type="button" onclick="paginateTables('/dashboard/get-pending-orders/v/offset', <?=$activePerPage?>,'#display-pending-orders-table')">Next</a>
                            </li>
                    <?php 
                        } 
                    ?>
                </ul>
            </nav>
        <?php
            }
        ?>
    </div>
</div>
