<div class="row">
    <div class="col-xxl-12">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/home-details"><?= $title ?></a></li>
                            <li class="breadcrumb-item active"><?= $edit?'Edit ':'Add '?><?= $title ?></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?= $title ?></h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

    </div> <!-- end col -->

</div>

<div class="row">

    <!-- task details -->
    <div class="col-xxl-12">
        <!-- Portlet card -->
        <div class="card mb-md-0 mb-3">
            <div class="card-body">
                <h5 class="card-title mb-0"><?= $edit?'Edit ':'Add '?><?= $title ?></h5>
                                
                <div id="cardCollpase1" class="collapse pt-3 show">
                    <form method="POST" id="formId" action="/home-details/<?= $edit ? 'u/'.esc($id) : 'a' ?>" enctype="multipart/form-data">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="inputEmail4">Change Logo <small class="text-danger">*</small></label>
                                <input type="file" class="form-control <?= isset($errors['image']) ? 'is-invalid':'is-valid' ?>"  value="<?= isset($value['image']) ? $value['image'] : '' ?>" name="image" accept="image/*">
                            </div>
                            <div class="col-md-6">
                                <img src="/assets/img/<?= isset($value['image']) ? $value['image'] : '' ?>" alt="restaurant logo" class="img-fluid" width="100" height="100"/>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="inputEmail4">Restaurant Name <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['restaurant_name']) ? 'is-invalid':'is-valid' ?>" id="inputEmail4" name="restaurant_name" placeholder="Restaurant Name" value="<?= isset($value['restaurant_name']) ? $value['restaurant_name'] : '' ?>">
                                <?php if(isset($errors['restaurant_name'])):?>
                                    <small class="text-danger"><?=esc($errors['restaurant_name'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="inputEmail4">Body Description <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['body_desc']) ? 'is-invalid':'is-valid' ?>" id="inputEmail4" name="body_desc" placeholder="Body Description" value="<?= isset($value['body_desc']) ? $value['body_desc'] : '' ?>">
                                <?php if(isset($errors['body_desc'])):?>
                                    <small class="text-danger"><?=esc($errors['body_desc'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="inputEmail4">Footer Description <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['footer_desc']) ? 'is-invalid':'is-valid' ?>" id="inputEmail4" name="footer_desc" placeholder="Footer Description" value="<?= isset($value['footer_desc']) ? $value['footer_desc'] : '' ?>">
                                <?php if(isset($errors['footer_desc'])):?>
                                    <small class="text-danger"><?=esc($errors['footer_desc'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <label for="inputAddress2">Region: <small class="text-danger">*</small></label>
                                <select class="form-select <?= isset($errors['region_id']) ? 'is-invalid':'' ?>" name="region_id" id="region_id">
                                    <option selected disabled>-- select region --</option>
                                </select>
                                <?php if(isset($errors['region_id'])):?>
                                    <small class="text-danger"><?=esc($errors['region_id'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col-sm-12 mt-1">
                                <label for="inputAddress2">Province: <small class="text-danger">*</small></label>
                                <select class="form-select <?= isset($errors['province_id']) ? 'is-invalid':'' ?>" name="province_id" id="province_id">
                                    <option selected disabled>-- select province --</option>
                                </select>
                                <?php if(isset($errors['province_id'])):?>
                                    <small class="text-danger"><?=esc($errors['province_id'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col-sm-12 mt-1">
                                <label for="inputAddress2">City: <small class="text-danger">*</small></label>
                                <select class="form-select <?= isset($errors['city_id']) ? 'is-invalid':'' ?>" name="city_id" id="city_id">
                                    <option selected disabled>-- select city --</option>
                                </select>
                                <?php if(isset($errors['city_id'])):?>
                                    <small class="text-danger"><?=esc($errors['city_id'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col-sm-12 mt-1">
                                <label for="inputAddress2">House #, Street & Baranggay: <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['addtl_address']) ? 'is-invalid':'' ?>" name="addtl_address" id="addtl_address" value="<?= set_value('addtl_address');?>" placeholder="(House #, Street & Baranggay)">
                                <?php if(isset($errors['addtl_address'])):?>
                                    <small class="text-danger"><?=esc($errors['addtl_address'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="inputEmail4">Contact Number <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['contact']) ? 'is-invalid':'is-valid' ?>" id="inputEmail4" name="contact" placeholder="Contact Number" value="<?= isset($value['contact']) ? $value['contact'] : '' ?>">
                                <?php if(isset($errors['contact'])):?>
                                    <small class="text-danger"><?=esc($errors['contact'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4">Email Address <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['email_address']) ? 'is-invalid':'is-valid' ?>" id="inputEmail4" name="email_address" placeholder="Email Address" value="<?= isset($value['email_address']) ? $value['email_address'] : '' ?>">
                                <?php if(isset($errors['email_address'])):?>
                                    <small class="text-danger"><?=esc($errors['email_address'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="inputEmail4">Facebook Link <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['fb_link']) ? 'is-invalid':'is-valid' ?>" id="inputEmail4" name="fb_link" placeholder="Facebook Link" value="<?= isset($value['fb_link']) ? $value['fb_link'] : '' ?>">
                                <?php if(isset($errors['fb_link'])):?>
                                    <small class="text-danger"><?=esc($errors['fb_link'])?></small>
                                <?php endif;?>
                            </div>
                        </div>

                        <button type="submit" id="submitButton" class="btn btn-sm btn-success float-end mt-2"><?= $action ?></button>
                    </form>
                </div>
            </div>
        </div> <!-- end card-->
    </div><!-- end col -->
</div>   

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            showRegion();
            function showRegion() {
                $.ajax({
                    type: "GET",
                    url: '/get-regions',
                    async: true,
                    dataType: 'JSON',
                    success: function(data) {
                        for(i=0; i<data.length; i++){
                            $('#region_id').append($('<option>', {value: data[i].region_code, text: data[i].region_name}));
                            document.getElementById("region_id").value = data[i].id;
                        }
                    }
                });
            }
            $("select[name='region_id']").change(function(){
                var regionCode = $(this).val();
                $.ajax({
                    type: "GET",
                    url: '/get-provinces/'+ regionCode ,
                    async: true,
                    dataType: 'JSON',
                    success: function(data){
                        console.log(data);
                            $('#province_id').find('option').remove();
                            $('#province_id').append($('<option>', {selected: true, disabled: true, value: null, text:'-- select province --'}));
                        for(i=0; i<data.length; i++){
                            $('#province_id').append($('<option>', {value: data[i].province_code, text:data[i].province_name}));
                            document.getElementById("province_id").value = data[i].id;
                        }
                    }
                });
            });
            $("select[name='province_id']").change(function(){
                var provinceCode = $(this).val();
                $.ajax({
                    type: "GET",
                    url: '/get-cities/'+provinceCode,
                    async: true,
                    dataType: 'JSON',
                    success: function(data){
                        console.log(data);
                        $('#city_id').find('option').remove();
                            $('#city_id').append($('<option>', {selected: true, disabled: true, value: null, text:'-- select city --'}));
                        for(i=0; i<data.length; i++){
                            $('#city_id').append($('<option>', {value: data[i].city_code, text:data[i].city_name}));
                            document.getElementById("city_id").value = data[i].id;
                        }
                    }
                });
            });
            $(() => {
                $("#submitButton").click(function(ev) {
                    var form = $("#formId");
                    var url = form.attr('action');
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: form.serialize(),
                        cache: false,
                        // success: function(data) {
                            // alert("Success");
                        // },
                        // error: function(data) {
                        //     alert("some Error");
                        // }
                    });
                });
            });
        });
    </script>