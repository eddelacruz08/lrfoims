<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card rounded shadow m-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="h3">Forgot Password</div>
                            <hr>
                        </div>
                    </div>
                    <?php if(!empty(session()->get('local_forgot_password_email_address'))):?>
                        <div class="row mb-2">
                            <div class="col-sm-12s">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm <?= isset($errors['email_address']) ? 'is-invalid':'' ?>" name="email_address" value="<?= session()->get('local_forgot_password_email_address');?>" disabled>
                                </div>
                            </div> 
                        </div>  
                        <div class="row"> 
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <form method="post" action="/forgot-password">
                                        <input type="hidden" name="email_address" value="<?= session()->get('local_forgot_password_email_address');?>">
                                        <button type="submit" id="sendCodeVerifyBtn" class="sendCodeVerifyBtn btn btn-sm btn-link"><u>Resend&nbspCode</u><div id="cDown"></div></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <form method="post" action="/temporary-password">
                            <input type="hidden" name="email_address" value="<?= session()->get('local_forgot_password_email_address');?>">
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="inputAddress2">Enter Code: <small class="text-danger">*</small></label>
                                        <input type="text" class="form-control <?= isset($errors['email_code']) ? 'is-invalid':'' ?>" name="email_code" value="<?= set_value('email_code');?>" placeholder="Enter code . . .">
                                        <?php if(isset($errors['email_code'])):?>
                                            <small class="text-danger"><?=esc($errors['email_code'])?></small>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2 mt-2">
                                <div class="col-6">
                                    <button type="submit" id="emailCodeButtonIdForgotPassword" class="btn btn-success text-center">Submit</button>
                                </div>
                            </div>
                        </form>
                    <?php else:?>
                        <form method="post" action="/forgot-password">
                            <div class="row mb-2">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-12">
                                    <div class="form-group">
                                        <label for="inputAddress2">Email Address: <small class="text-danger">*</small></label>
                                        <input type="text" class="form-control <?= isset($errors['email_address']) ? 'is-invalid':'' ?>" name="email_address" value="<?= set_value('email_address');?>" placeholder="Enter email address . . .">
                                        <?php if(isset($errors['email_address'])):?>
                                            <small class="text-danger"><?=esc($errors['email_address'])?></small>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-12">
                                    <button type="submit" class="btn btn-success text-center">Send Code to Verify</button>
                                </div>
                            </div>
                        </form>
                    <?php endif;?>
                </div>
            </div> 
        </div>
    </div>
</div>
    <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
    <!--<script>-->
    <!--    $(document).ready(function(){-->
    <!--        $(() => {-->
    <!--            $("#emailAddressButtonIdForgotPassword").click(function(ev) {-->
    <!--                var form = $("#emailAddressFormIdForgotPassword");-->
    <!--                var url = form.attr('action');-->
    <!--                $.ajax({-->
    <!--                    type: "POST",-->
    <!--                    url: url,-->
    <!--                    data: form.serialize(),-->
    <!--                    cache: false,-->
    <!--                });-->
    <!--            });-->
    <!--        });-->
    <!--        $(() => {-->
    <!--            $("#emailCodeButtonIdForgotPassword").click(function(ev) {-->
    <!--                var form = $("#emailCodeFormIdForgotPassword");-->
    <!--                var url = form.attr('action');-->
    <!--                $.ajax({-->
    <!--                    type: "POST",-->
    <!--                    url: url,-->
    <!--                    data: form.serialize(),-->
    <!--                    cache: false,-->
    <!--                });-->
    <!--            });-->
    <!--        });-->
    <!--    });-->
    <!--</script>-->
