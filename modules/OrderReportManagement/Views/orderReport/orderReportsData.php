
<table class="table-sm table-centered mb-0 text-center w-100">
    <thead class="bg-dark text-white">
        <tr>
            <th>Order#</th>
            <th>Status</th>
            <th>Type</th>
            <th>Amount Due</th>
            <th>Total Bill</th>
            <th>Less (12%) Vat</th>
            <th>Payment</th>
            <th>Invoice</th>
            <th>Date&Time</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($getOrderReports as $row):?>
            <tr>
                <td>Order#<?=$row['number']?></td>
                <td><span class="badge bg-primary"><?=$row['order_status']?></span></td>
                <td>
                    <?php if($row['order_type'] == 1):?>
                        <span class="badge bg-success"><?=$row['type']?></span>
                    <?php elseif($row['order_type'] == 2): ?>
                        <span class="badge bg-warning"><?=$row['type']?></span>
                    <?php elseif($row['order_type'] == 3): ?>
                        <span class="badge bg-danger"><?=$row['type']?></span>
                    <?php else: ?>
                        <span class="badge bg-secondary"><?=$row['type']?></span>
                    <?php endif;?>
                </td>
                <td>₱ <?=number_format($row['total_amount_order'])?></td>
                <td>₱ <?=number_format($row['total_amount'])?></td>
                <td>₱ <?=number_format($row['total_amount_vat'])?></td>
                <?php foreach ($getPaymentMethod as $method) : ?>
                    <?php if($method['id'] == $row['payment_method_id']):?>
                        <td><?= ucwords($method['payment_method']);?></td>
                    <?php endif; ?>
                <?php endforeach; ?>
                <td>
                    <?php if($row['order_status_id'] == 1):?>
                        <?php $order_status = ucwords($row['order_status'])?>
                    <?php elseif($row['order_status_id'] == 2): ?>
                        <?php $order_status = ucwords($row['order_status'])?>
                    <?php elseif($row['order_status_id'] == 3): ?>
                        <?php $order_status = ucwords($row['order_status'])?>
                    <?php elseif($row['order_status_id'] == 4): ?>
                        <?php $order_status = ucwords($row['order_status'])?>
                    <?php else: ?>
                        <?php $order_status = ucwords($row['order_status'])?>
                    <?php endif;?>
                    <button onclick="printOrders(
                            <?=$row['id']?>, <?=$row['number']?>, '<?=ucwords($row['type'])?>',
                            '<?= date('M d, Y h:i a',strtotime($row['created_at']));?>', '<?=$order_status;?>',<?=$row['order_user_discount_id'];?>
                        );" title="Print" class="btn btn-sm btn-outline-dark me-1" type="button">
                        Print
                    </button>
                </td>
                <td>
                    <?= Date('M d, Y h:i a', strtotime($row['created_at']))?>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>
<div class="row">
    <div class="col-md-6 offset-md-6">
        <?php 
            $linkcount = ceil($all_items['total_order_reports'] / $limitPerTable);
            if($linkcount > 1) {
                $cnt = 0;
                $isActive = false;
                $active = 0;
            ?>
            <nav aria-label="...">
                <ul class="pagination justify-content-end">
                    <?php if($offset > 0) { ?>
                        <li class="page-item">
                            <a class="page-link" type="button" onclick="paginateTables('/order-reports/v/offset', <?=($offset - $limitPerTable)?>,'#display-order-reports-table')">Previous</a>
                        </li>
                    <?php } else { ?>
                        <li class="page-item disabled">
                            <a class="page-link" type="button" onclick="paginateTables('/order-reports/v/offset', <?=($offset - $limitPerTable)?>,'#display-order-reports-table')">Previous</a>
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
                        <a class="page-link" type="button" onclick="paginateTables('/order-reports/v/offset', <?=$cntPerPage?>,'#display-order-reports-table')"><?=$cnt?></a>
                    </li>
                    <?php 
                        }
                        if($active == ($linkcount -1)) { ?>
                            <li class="page-item disabled">
                                <a class="page-link" type="button" onclick="paginateTables('/order-reports/v/offset', <?=$offset?>,'#display-order-reports-table')">Next</a>
                            </li>
                    <?php 
                        } else { 
                            $activePerPage = (($active+1)*$limitPerTable);
                    ?>
                            <li class="page-item">
                                <a class="page-link" type="button" onclick="paginateTables('/order-reports/v/offset', <?=$activePerPage?>,'#display-order-reports-table')">Next</a>
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