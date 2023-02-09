
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12">
        <div class="page-title-box p-0 m-0">
            <h4 class="float-start pb-1 ps-1 pe-1 border-bottom border-primary"><?= $title ?></h4>
            <button type="button" onclick="displayIngredients('<?=base_url()?>/ingredients/ingredient-list-data',<?=$category_id?>);" class="btn btn-sm btn-outline-dark float-end">Go back</button>
        </div>
    </div>
</div>

<div class="table-responsive table-responsive-sm">
    <table id="view-stocks-table" class="table-sm table-hover w-100 text-center">
        <thead class="bg-secondary text-white">
            <tr>
                <th scope="col">
                    <center>Unit of Measure</center>
                </th>
                <th scope="col">
                    <center>Current Price</center>
                </th>
                <th scope="col">
                    <center>Expiration Date</center>
                </th>
                <th scope="col">
                    <center>Expire Status</center>
                </th>
                <th scope="col">
                    <center>Stock Status</center>
                </th>
                <th scope="col">
                    <center>Created Date</center>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($ingredientStockIn)) : ?>
                <?php foreach ($ingredientStockIn as $stockIn) : ?>
                    <tr>
                        <td>
                            <center><?= number_format($stockIn['unit_quantity'],2) ?></center>
                        </td>
                        <td>
                            <center>₱ <?= number_format($stockIn['unit_price'],2); ?></center>
                        </td>
                        <td>
                            <center><?= date('M d, Y',strtotime($stockIn['date_expiration'])); ?></center>
                        </td>
                        <td>
                            <div id="demo<?=$stockIn['id'];?>"></div>
                        </td>
                        <td>
                            <center><?= ($stockIn['status'] == 'a' ? "<span class='badge bg-success'>Ongoing</span>":"<span class='badge bg-danger'>Expired</span>") ?></center>
                        </td>
                        <td>
                            <center><?= date('M d, Y H:i a',strtotime($stockIn['created_at'])); ?></center>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <th scope="col" colspan="6">
                    <h5 class="text-center">No data available.</h5>
                </th>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function () {
        $('#view-stocks-table').DataTable({
            order: [[2, 'desc']],
        });
    });
</script>