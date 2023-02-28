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
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm <?= isset($errors['email_address']) ? 'is-invalid':'' ?>" name="email_address" value="<?= session()->get('local_email_address');?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <form method="post" action="/submit">
                                    <button type="submit" class="btn btn-sm btn-link"><u>Send&nbsp;Code</u></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <form method="post" action="/email-verification">
                        <input type="hidden" name="email_address" value="<?= session()->get('local_email_address');?>">
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
                                <button type="submit" class="btn btn-success text-center">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>
</div>

