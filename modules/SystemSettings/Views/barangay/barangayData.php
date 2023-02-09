<table class="table-sm table-hover dt-responsive nowrap w-100 text-center">
    <thead class="bg-dark text-white">
        <tr>
            <th scope="col">Barangay Code</th>
            <th scope="col">Barangay Name</th>
            <th scope="col">Region Code</th>
            <th scope="col">Province Code</th>
            <th scope="col">City Code</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($barangay as $row) : ?>
            <tr>
                <th scope="row"><?= $row['barangay_code']; ?></th>
                <td><?= $row['barangay_name']; ?></td>
                <td><?= $row['region_code']; ?></td>
                <td><?= $row['province_code']; ?></td>
                <td><?= $row['city_code']; ?></td>
                <td>
                    <a href="<?=base_url()?>/barangay/u/<?= $row['id']; ?>" class="btn btn-sm btn-default"><i class=" dripicons-pencil"></i></a>
                    <a onclick="confirmDelete('<?=base_url()?>/barangay/d/',<?=$row['id']?>)" class="btn btn-sm btn-default"><i class=" dripicons-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="row">
    <div class="col-md-6 offset-md-6">
        <?php 
            $linkcount = ceil($all_items['total_barangay'] / $limitPerTable);
            if($linkcount > 1) {
                $cnt = 0;
                $isActive = false;
                $active = 0;
            ?>
            <nav aria-label="...">
                <ul class="pagination justify-content-end">
                    <?php if($offset > 0) { ?>
                        <li class="page-item">
                            <a class="page-link" type="button" onclick="paginateTables('<?=base_url()?>/barangay/v/offset', <?=($offset - $limitPerTable)?>,'#display-barangay-table')">Previous</a>
                        </li>
                    <?php } else { ?>
                        <li class="page-item disabled">
                            <a class="page-link" type="button" onclick="paginateTables('<?=base_url()?>/barangay/v/offset', <?=($offset - $limitPerTable)?>,'#display-barangay-table')">Previous</a>
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
                        <a class="page-link" type="button" onclick="paginateTables('<?=base_url()?>/barangay/v/offset', <?=$cntPerPage?>,'#display-barangay-table')"><?=$cnt?></a>
                    </li>
                    <?php 
                        }
                        if($active == ($linkcount -1)) { ?>
                            <li class="page-item disabled">
                                <a class="page-link" type="button" onclick="paginateTables('<?=base_url()?>/barangay/v/offset', <?=$offset?>,'#display-barangay-table')">Next</a>
                            </li>
                    <?php 
                        } else { 
                            $activePerPage = (($active+1)*$limitPerTable);
                    ?>
                            <li class="page-item">
                                <a class="page-link" type="button" onclick="paginateTables('<?=base_url()?>/barangay/v/offset', <?=$activePerPage?>,'#display-barangay-table')">Next</a>
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