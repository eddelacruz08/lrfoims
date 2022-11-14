<?php

if (! function_exists('user_link')) {
    function user_link(string $slugs, array $array_permissions){
        $isValidSlug = 0;

        if(!empty($array_permissions)){
            // die(print_r($array_permissions));
            foreach($array_permissions as $permission){
                if($slugs == $permission['slug']){
                    return 1;
                }
            }

            if($isValidSlug == 0){
                return 0;
            }

        }
    }
}

if (! function_exists('ingredient_batch_upload')) {
	function ingredient_batch_upload($link) {
        echo'<form method="post" action="'.base_url($link).'" enctype="multipart/form-data">';
        echo'<div class="form-group mb-1">';
        echo'<input type="file" name="upload_file" class="form-control" placeholder="Enter Name" id="upload_file" required>';
        echo'</div>';
        echo'<div class="form-group">';
        echo'<button type="submit" class="btn btn-primary btn-sm float-end"> Batch Upload</button>';
        echo'</div>';
        echo'</form>';
	}
}
