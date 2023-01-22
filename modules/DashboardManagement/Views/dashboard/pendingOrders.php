
<table id="pending-orders-data-table" class="table-sm table-centered table-nowrap table-hover text-center w-100 mb-0">
    <thead class="bg-dark text-white">
        <tr>
            <th>Order#</th>
            <th>Status</th>
            <th>Order Type</th>
            <th>Date & Time</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($getPendingOrders as $row): ?> 
            <tr>
                <td>Order#<?=$row['number']?></td>
                <td><span class="badge bg-warning"><?=$row['order_status']?></span></td>
                <td><span class="badge bg-primary"><?=$row['type']?></span></td>
                <td><?= Date('M d, Y - h:i a', strtotime($row['created_at']))?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="row">
    <div class="col-md-6 offset-md-6">
        <?php paginater('/dashboard/get-pending-orders/v/offset', count($all_items), $limitPerTable, $offset, '#display-pending-orders-table
        -next-page'); ?>
    </div>
</div>
<!-- <script>
    $(document).ready(function () {
        $('#pending-orders-data-table').DataTable({
            order: [[3, 'desc']],
        });
    });
</script> -->
