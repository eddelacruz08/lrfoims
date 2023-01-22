<!-- <?php
if (! function_exists('paginater')) {
	function paginater($table, $list_total_item, $perpage, $offset, $divTextId) {
		$linkcount = ceil($list_total_item / $perpage);
		if($linkcount > 1) {
            $cnt = 0;
            $isActive = false;
            $active = 0;
?>
        <nav aria-label="...">
            <ul class="pagination justify-content-end">
                <?php if($offset > 0) { ?>
                    <li class="page-item">
                        <a class="page-link" type="button" onclick="paginateTables('<?=$table?>', <?=($offset - $perpage)?>,'<?=$divTextId?>');">Previous</a>
                    </li>
                <?php } else { ?>
                    <li class="page-item disabled">
                        <a class="page-link" type="button" onclick="paginateTables('<?=$table?>', <?=($offset - $perpage)?>,'<?=$divTextId?>');">Previous</a>
                    </li>
                <?php }

                    while($cnt < $linkcount) {
                        $isActive = ($offset / $perpage) == $cnt ? true : false;
                        if($isActive) {
                            $active = $cnt;
                        }
                        $cnt++;
                ?>
                            <li class="page-item <?=($isActive == true ? "active":"")?>"><a class="page-link" type="button" onclick="paginateTables('<?=$table?>', <?=(($cnt-1)*$perpage)?>,'<?=$divTextId?>');"><?=$cnt?></a></li>
                <?php }
                    if($active == ($linkcount -1)) { ?>
                        <li class="page-item disabled">
                            <a class="page-link" type="button" onclick="paginateTables('<?=$table?>', <?=$offset?>,'<?=$divTextId?>');">Next</a>
                        </li>
                <?php } else { ?>
                        <li class="page-item">
                            <a class="page-link" type="button" onclick="paginateTables('<?=$table?>', <?=(($active+1)*$perpage)?>,'<?=$divTextId?>');">Next</a>
                        </li>
                <?php } ?>
            </ul>
        </nav>
<?php
		}
	}
}
?> -->