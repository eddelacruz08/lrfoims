
<div class="col-6">
    <p class="text-center mb-2 h3">Preparing</p>
    <div class="table-responsive">
        <table class="table-sm table-centered table-nowrap table-hover text-center w-100 mb-0 h3">
            <tbody>
                <?php if(!empty($preparingOrders)):?>
                    <?php foreach ($preparingOrders as $row): ?> 
                        <?php if($row['order_type'] == 1 || $row['order_type'] == 2):?>
                            <tr class="border-bottom">
                                <th>Order#<?=$row['number']?></th>
                                <td>
                                    <span class="badge badge-outline-dark">
                                        <?php if($row['order_type'] == 1):?>
                                            Dine In
                                        <?php elseif($row['order_type'] == 2):?>
                                            Take Out
                                        <?php else: ?>
                                        <?php endif; ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr class="border-bottom">
                        <td colspan="2">
                            No Data
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="col-6">
    <p class="text-center mb-2 h3">Serving</p>
    <div class="table-responsive">
        <table class="table-sm table-centered table-nowrap table-hover text-center w-100 mb-0 h3">
            <tbody>
                <?php if(!empty($servingOrders)):?>
                    <?php foreach ($servingOrders as $row): ?> 
                        <?php if($row['order_type'] == 1 || $row['order_type'] == 2):?>
                            <tr class="border-bottom">
                                <th>Order#<?=$row['number']?></th>
                                <td>
                                    <span class="badge badge-outline-dark">
                                        <?php if($row['order_type'] == 1):?>
                                            Dine In
                                        <?php elseif($row['order_type'] == 2):?>
                                            Take Out
                                        <?php else: ?>
                                        <?php endif; ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr class="border-bottom">
                        <td colspan="2">
                            No Data
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>