<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 offset-md-6 col-sm-4 offset-sm-12 mx-auto">
            <div class="card rounded shadow m-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="h3">Registration</div>
                            <hr>
                        </div>
                    </div>
                    <form method="post" action="/register" id="formId">
                        <div class="row mb-1">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="inputAddress2">First Name: <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control <?= isset($errors['first_name']) ? 'is-invalid':'' ?>" name="first_name" id="first_name" value="<?= set_value('first_name');?>" placeholder="Enter first name">
                                </div>
                                <?php if(isset($errors['first_name'])):?>
                                    <small class="text-danger"><?=esc($errors['first_name'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="inputAddress2">Last Name: <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control <?= isset($errors['last_name']) ? 'is-invalid':'' ?>" name="last_name" id="last_name" value="<?= set_value('last_name');?>" placeholder="Enter last name">
                                </div>
                                <?php if(isset($errors['last_name'])):?>
                                    <small class="text-danger"><?=esc($errors['last_name'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="inputAddress2">Username: <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control <?= isset($errors['username']) ? 'is-invalid':'' ?>" name="username" id="username" value="<?= set_value('username');?>" placeholder="Enter username">
                                </div>
                                <?php if(isset($errors['username'])):?>
                                    <small class="text-danger"><?=esc($errors['username'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="inputAddress2">Email Address: <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control <?= isset($errors['email_address']) ? 'is-invalid':'' ?>" name="email_address" id="email_address" value="<?= set_value('email_address');?>" placeholder="Enter email address">
                                </div>
                                <?php if(isset($errors['email_address'])):?>
                                    <small class="text-danger"><?=esc($errors['email_address'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="inputAddress2">Contact Number: <small class="text-danger">* (ex.09*********)</small></label>
                                    <input type="text" class="form-control <?= isset($errors['contact_number']) ? 'is-invalid':'' ?>" name="contact_number" id="contact_number" value="<?= set_value('contact_number');?>" placeholder="Enter contact number">
                                </div>
                                <?php if(isset($errors['contact_number'])):?>
                                    <small class="text-danger"><?=esc($errors['contact_number'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-sm-12">
                                <label for="inputAddress2">Region: <small class="text-danger">*</small></label>
                                <select class="form-select <?= isset($errors['region_id']) ? 'is-invalid':'' ?>" value="<?= set_value('region_id');?>" name="region_id" id="region_id">
                                    <option selected disabled>-- select region --</option>
                                </select>
                                <?php if(isset($errors['region_id'])):?>
                                    <small class="text-danger"><?=esc($errors['region_id'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col-sm-12 mt-1">
                                <label for="inputAddress2">Province: <small class="text-danger">*</small></label>
                                <select class="form-select <?= isset($errors['province_id']) ? 'is-invalid':'' ?>" value="<?= set_value('province_id');?>" name="province_id" id="province_id">
                                    <option selected disabled>-- select province --</option>
                                </select>
                                <?php if(isset($errors['province_id'])):?>
                                    <small class="text-danger"><?=esc($errors['province_id'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col-sm-12 mt-1">
                                <label for="inputAddress2">City: <small class="text-danger">*</small></label>
                                <select class="form-select <?= isset($errors['city_id']) ? 'is-invalid':'' ?>" value="<?= set_value('city_id');?>" name="city_id" id="city_id">
                                    <option selected disabled>-- select city --</option>
                                </select>
                                <?php if(isset($errors['city_id'])):?>
                                    <small class="text-danger"><?=esc($errors['city_id'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col-sm-12 mt-1">
                                <label for="inputAddress2">House #, Street & Barangay: <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['addtl_address']) ? 'is-invalid':'' ?>" name="addtl_address" id="addtl_address" value="<?= set_value('addtl_address');?>" placeholder="(House #, Street & Barangay)">
                                <?php if(isset($errors['addtl_address'])):?>
                                    <small class="text-danger"><?=esc($errors['addtl_address'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row mb-2 mt-2">
                            <div class="col-md-6">
                                <label for="inputAddress2">Password: <small class="text-danger">*</small></label>
                                <input type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid':'' ?>" name="password" id="password" placeholder="Password">
                                <?php if(isset($errors['password'])):?>
                                    <small class="text-danger"><?=esc($errors['password'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress2">Confirm Password: <small class="text-danger">*</small></label>
                                <input type="password" class="form-control <?= isset($errors['confirm_password']) ? 'is-invalid':'' ?>" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                                <?php if(isset($errors['confirm_password'])):?>
                                    <small class="text-danger"><?=esc($errors['confirm_password'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row mb-2 mt-2">
                            <div class="col-6">
                                <a href="/login">Already have an account.</a>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-info btn-sm float-end" data-bs-toggle="modal" data-bs-target="#info-alert-modal">Sign Up</button>
                                <div id="info-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-body p-3">
                                                <div class="text-start">
                                                    <i class="ri-information-line h1 text-info"></i>
                                                    <h5 class="mt-2">Terms and Conditions</h5>
                                                </div>
                                                <div class="text-start" style="overflow-y: scroll; max-height: 500px;">
                                                    <p class="mt-2">1. INTRODUCTION</p>
                                                    <p class="mt-2">
                                                        1.1 Welcome to the Lamon Restaurant Food Ordering and Inventory System (LRFOIS) online website, the system takes its responsibilities under applicable privacy laws and regulations ("Privacy Laws") seriously and is committed to respecting the privacy rights and concerns of all Users of our website. Users refers to a user who registers for an account with us for use of the system. We recognize the importance of the personal data you have entrusted to us and believe that it is our responsibility to properly manage, protect and process your personal data. This Privacy Policy (“Privacy Policy” or “Policy”) is designed to assist you in understanding how we collect, use, disclose and/or process the personal data you have provided to us and/or we possess about you, whether now or in the future, as well as to assist you in making an informed decision before providing us with any of your personal data. 
                                                    </p>
                                                    <p class="mt-2">
                                                        1.2 "Personal Data" or "personal data" means data, whether true or not, about an individual who can be identified from that data, or from that data and other information to which an organisation has or is likely to have access. 
                                                    </p>
                                                    <p class="mt-2">
                                                        1.3 By using the system, registering for an account with us, you acknowledge and agree that you accept the requirements, and/or policies outlined in this Privacy Policy, and you hereby consent to us collecting, using, disclosing and/or processing your personal data as described herein. IF YOU DO NOT CONSENT TO THE PROCESSING OF YOUR PERSONAL DATA AS DESCRIBED IN THIS PRIVACY POLICY, PLEASE DO NOT USE OUR SYSTEM OR ACCESS OUR WEBSITE. If we change our Privacy Policy, we will notify you by posting those changes or the amended Privacy Policy on our website. We reserve the right to amend this Privacy Policy at any time. To the fullest extent permissible under applicable law, your continued use of the system, shall constitute your acknowledgment and acceptance of the changes made to this Privacy Policy.
                                                    </p>
                                                    <p class="mt-2">
                                                        1.4 This Policy applies to customers who use the system except where expressly stated otherwise.
                                                    </p>
                                                    <p class="mt-2">
                                                        2. WHEN WILL LRFOIS COLLECT PERSONAL DATA?
                                                    </p>
                                                    <p class="mt-2">
                                                        2.1 We will/may collect personal data about you:
                                                            when you register and/or use our website, or open an account with us;
                                                            when you enter into any agreement in respect of your interactions with us, or when you use our system;
                                                            when you interact with us, such as via phone calls, face-to-face meetings, social media platforms and emails;
                                                            when you use our electronic services, or interact with us via our application or use services on our system;
                                                            when you carry out transactions through our Services;
                                                            when you provide us with feedback;
                                                    </p>
                                                    <p class="mt-2">
                                                        3. WHAT PERSONAL DATA WILL LRFOIS COLLECT?
                                                    </p>
                                                    <p class="mt-2">
                                                        3.1 The personal data that the system may collect includes but is not limited to:
                                                            
                                                            name;
                                                            username;
                                                            email address;
                                                            contact number;
                                                            billing and/or delivery address;
                                                            password;
                                                    </p>
                                                </div>
                                                <div class="modal-footer p-2">
                                                    <button type="submit" id="submitButton" class="btn btn-sm btn-primary float-end my-2">I understand, continue!</button>
                                                    <button type="button" class="btn btn-sm btn-default my-2" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>
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
                            // document.getElementById("region_id").value = data[i].id;
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
    <?= $this->include('templates/notifications'); ?>
