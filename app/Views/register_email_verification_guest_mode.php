<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 offset-md-6 col-sm-4 offset-sm-12 mx-auto">
            <div class="card rounded shadow m-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="h3">Email Verification</div>
                            <hr>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm <?= isset($errors['email_address']) ? 'is-invalid':'' ?>" name="email_address" value="<?= session()->get('local_register_email_address');?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <form method="post" action="/register-submit">
                                    <input type="hidden" id="sendCodeVerifyId">
                                    <button type="submit" id="sendCodeVerifyBtn" class="sendCodeVerifyBtn btn btn-sm btn-success">Send&nbspCode <div id="cDown"></div></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <form method="post" action="/register-email-verification" id="emailformIdRegister">
                        <input type="hidden" name="email_address" value="<?= session()->get('local_register_email_address');?>">
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
                                <button type="submit" id="emailSubmitButtonRegister" class="btn btn-success text-center">Submit</button>
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
            $(() => {
                $("#emailSubmitButtonRegister").click(function(ev) {
                    var form = $("#emailformIdRegister");
                    var url = form.attr('action');
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: form.serialize(),
                        cache: false,
                    });
                });
            });
            $(() => {
                var inputValue = $("#sendCodeVerifyId").value;
                if(inputValue == null || inputValue == ''){
                    document.getElementById("sendCodeVerifyId").value = "1";
                }else{
                    var timeleft = 90;
                    var downloadTimer = setInterval(function(){
                        if(timeleft <= 0){
                            clearInterval(downloadTimer);
                            btn.prop('disabled', false);
                            document.getElementById("cDown").innerHTML = " null";
                            document.getElementById("sendCodeVerifyId").value = "1";
                        } else {
                            btn.prop('disabled', true);
                            document.getElementById("cDown").innerHTML = timeleft + " seconds remaining";
                        }
                        timeleft -= 1;
                    }, 1000);
                }
            });
        });
    </script>
