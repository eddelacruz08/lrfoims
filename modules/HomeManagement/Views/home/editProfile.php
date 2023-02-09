<div class="container">
    <div class="content">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?=base_url()?>/">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?=base_url()?>/profile">Profile</a></li>
                            <li class="breadcrumb-item active">Edit Profile</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Profile</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 


        <div class="row">
            <div class="col-sm-12">
                <form method="POST" action="<?=base_url()?>/edit-profile/<?= $edit ? 'u/'.esc($id) : 'a' ?>" id="formId">
                    <?php if($edit):?>
                        <input type="hidden" name="userID" value="<?=$id?>">                             
                    <?php endif;?>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="inputEmail4">Last name <small class="text-danger">*</small></label>
                            <input type="text" class="form-control <?= isset($errors['last_name']) ? 'is-invalid':'is-valid' ?> " id="inputEmail4" name="last_name" placeholder="Last name" value="<?= isset($value['last_name']) ? esc($value['last_name']) : '' ?>">
                            <?php if(isset($errors['last_name'])):?>
                                <small class="text-danger"><?=esc($errors['last_name'])?></small>
                            <?php endif;?>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4">First name <small class="text-danger">*</small></label>
                            <input type="text" class="form-control <?= isset($errors['first_name']) ? 'is-invalid':'is-valid' ?> " id="inputPassword4" name="first_name" placeholder="First name" value="<?= isset($value['first_name']) ? esc($value['first_name']) : '' ?>">
                            <?php if(isset($errors['first_name'])):?>
                                <small class="text-danger"><?=esc($errors['first_name'])?></small>
                            <?php endif;?>   
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="inputCity">Email Address <small class="text-danger">*</small></label>
                            <input type="text" class="form-control <?= isset($errors['email_address']) ? 'is-invalid':'is-valid' ?> " id="inputCity" name="email_address" placeholder="Email Address" value="<?= isset($value['email_address']) ? esc($value['email_address']) : '' ?>">
                            <?php if(isset($errors['email_address'])):?>
                                <small class="text-danger"><?=esc($errors['email_address'])?></small>
                            <?php endif;?>    
                        </div>
                        <div class="col-md-6">
                            <input type="hidden" name="role_id" value="<?= isset($value['role_id']) ? esc($value['role_id']) : '' ?>">
                            <label for="inputAddress2">Username <small class="text-danger">*</small></label>
                            <input type="text" class="form-control <?= isset($errors['username']) ? 'is-invalid':'is-valid' ?>"  name="username" id="username" value="<?= isset($value['username']) ? esc($value['username']) : '' ?>" placeholder="Username">
                            <?php if(isset($errors['username'])):?>
                                <small class="text-danger"><?=esc($errors['username'])?></small>
                            <?php endif;?>    
                        </div>
                    </div>
                    <div class="row mb-2 mt-2">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="inputAddress2">Contact Number: <small class="text-danger">* (ex.09*********)</small></label>
                                <input type="text" class="form-control <?= isset($errors['contact_number']) ? 'is-invalid':'' ?>" name="contact_number" id="contact_number" value="<?= isset($value['contact_number']) ? esc($value['contact_number']) : '' ?>" placeholder="Enter contact number">
                            </div>
                            <?php if(isset($errors['contact_number'])):?>
                                <small class="text-danger"><?=esc($errors['contact_number'])?></small>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-sm-12">
                            <label for="inputAddress2">Region: <small class="text-danger">*</small></label>
                            <select class="form-select <?= isset($errors['region_id']) ? 'is-invalid':'' ?>" name="region_id" id="region_id" value="<?= isset($value['region_id']) ? esc($value['region_id']) : '' ?>">
                                <option selected disabled>-- select region --</option>
                            </select>
                            <?php if(isset($errors['region_id'])):?>
                                <small class="text-danger"><?=esc($errors['region_id'])?></small>
                            <?php endif;?>
                        </div>
                        <div class="col-sm-12 mt-1">
                            <label for="inputAddress2">Province: <small class="text-danger">*</small></label>
                            <select class="form-select <?= isset($errors['province_id']) ? 'is-invalid':'' ?>" name="province_id" id="province_id" value="<?= isset($value['province_id']) ? esc($value['province_id']) : '' ?>">
                                <option selected disabled>-- select province --</option>
                            </select>
                            <?php if(isset($errors['province_id'])):?>
                                <small class="text-danger"><?=esc($errors['province_id'])?></small>
                            <?php endif;?>
                        </div>
                        <div class="col-sm-12 mt-1">
                            <label for="inputAddress2">City: <small class="text-danger">*</small></label>
                            <select class="form-select <?= isset($errors['city_id']) ? 'is-invalid':'' ?>" name="city_id" id="city_id" value="<?= isset($value['city_id']) ? esc($value['city_id']) : '' ?>"> 
                                <option selected disabled>-- select city --</option>
                            </select>
                            <?php if(isset($errors['city_id'])):?>
                                <small class="text-danger"><?=esc($errors['city_id'])?></small>
                            <?php endif;?>
                        </div>
                        <div class="col-sm-12 mt-1">
                            <label for="inputAddress2">House #, Street & Barangay: <small class="text-danger">*</small></label>
                            <input type="text" class="form-control <?= isset($errors['addtl_address']) ? 'is-invalid':'' ?>" name="addtl_address" id="addtl_address" value="<?= isset($value['addtl_address']) ? esc($value['addtl_address']) : '' ?>" placeholder="(House #, Street & Barangay)">
                            <?php if(isset($errors['addtl_address'])):?>
                                <small class="text-danger"><?=esc($errors['addtl_address'])?></small>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="inputAddress2">Password <small class="text-danger">*</small></label>
                            <input type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid':'is-valid' ?> " name="password" id="password" placeholder="Password" valu="<?= isset($value['password']) ? esc($value['password']) : '' ?>">
                            <?php if(isset($errors['password'])):?>
                                <small class="text-danger"><?=esc($errors['password'])?></small>
                            <?php endif;?>    
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress2">Confirm Password <small class="text-danger">*</small></label>
                            <input type="password" class="form-control <?= isset($errors['confirm_password']) ? 'is-invalid':'is-valid' ?>" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                            <?php if(isset($errors['confirm_password'])):?>
                                <small class="text-danger"><?=esc($errors['confirm_password'])?></small>
                            <?php endif;?>    
                        </div>
                    </div>

                    <button type="submit" id="submitButton" class="btn btn-sm btn-success float-end mt-2"><?= $action ?></button>
                </form>
            </div> <!-- end col-->
        </div>
        <!-- end row -->

    </div> <!-- End Content -->
</div> <!-- End Content -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            showRegion();
            function showRegion() {
                $.ajax({
                    type: "GET",
                    url: '<?=base_url()?>/get-regions',
                    async: true,
                    dataType: 'JSON',
                    success: function(data) {
                        for(i=0; i<data.length; i++){
                            $('#region_id').append($('<option>', {value: data[i].region_code, text: data[i].region_name}));
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }
            $("select[name='region_id']").change(function(){
                var regionCode = $(this).val();
                $.ajax({
                    type: "GET",
                    url: '<?=base_url()?>/get-provinces/'+ regionCode ,
                    async: true,
                    dataType: 'JSON',
                    success: function(data){
                            $('#province_id').find('option').remove();
                            $('#province_id').append($('<option>', {selected: true, disabled: true, value: null, text:'-- select province --'}));
                        for(i=0; i<data.length; i++){
                            $('#province_id').append($('<option>', {value: data[i].province_code, text:data[i].province_name}));
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });
            $("select[name='province_id']").change(function(){
                var provinceCode = $(this).val();
                $.ajax({
                    type: "GET",
                    url: '<?=base_url()?>/get-cities/'+provinceCode,
                    async: true,
                    dataType: 'JSON',
                    success: function(data){
                        $('#city_id').find('option').remove();
                            $('#city_id').append($('<option>', {selected: true, disabled: true, value: null, text:'-- select city --'}));
                        for(i=0; i<data.length; i++){
                            $('#city_id').append($('<option>', {value: data[i].city_code, text:data[i].city_name}));
                        }
                    },
                    error: function(err) {
                        console.log(err);
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
                        success: function(data) {
                            window.location.href = '/profile';
                        },
                        error: function(data) {
                            alert("some Error");
                        }
                    });
                });
            });
        });
    </script>