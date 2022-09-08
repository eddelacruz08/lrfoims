
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 offset-md-6 col-sm-4 offset-sm-4 mx-auto">
            <div class="card rounded shadow m-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="h3">User Registration</div>
                            <hr>
                        </div>
                    </div>
                    <form method="post" action="/register">
                        <div class="form-group mb-2 mt-2">
                            <label for="inputAddress2">Username</label>
                            <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username');?>" placeholder="Username">
                        </div>
                        <div class="row mb-2 mt-2">
                            <div class="col-md-6">
                                <label for="inputAddress2">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress2">Confirm Password</label>
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="form-row">
                            <?php if (isset($validation)) : ?>
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                        <?= $validation->listErrors(); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="row mb-2 mt-2">
                            <div class="col-6">
                                <a href="/login">Already have an account.</a>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary float-end">Sign in</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>