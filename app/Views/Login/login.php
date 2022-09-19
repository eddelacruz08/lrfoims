
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xxl-4 col-lg-5">
            <div class="card m-2">

                <div class="card-body">
                    
                    <div class="text-center w-75 m-auto">
                        <h4 class="text-dark-50 text-center mt-0 fw-bold">Sign In</h4>
                    </div>

                    <form method="post" action="/login">

                        <?php if (isset($validation)) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $validation->listErrors(); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input class="form-control" type="text" id="username" name="username" required="" placeholder="Enter your username">
                        </div>

                        <div class="mb-3">
                            <a href="/forgot-password" class="text-muted float-end"><small>Forgot your password?</small></a>
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                                <div class="input-group-text" data-password="false">
                                    <span class="password-eye"></span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                <label class="form-check-label" for="checkbox-signin">Remember me</label>
                            </div>
                        </div>

                        <div class="mb-0 text-center">
                            <button class="btn btn-primary" type="submit"> Log In </button>
                        </div>

                    </form>
                    <hr>
                    <div class="mb-0 text-center">
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#info-alert-modal">Guest Mode</button>
                    </div>
                    <div id="info-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="row p-3 text-center">
                                        <div class="col-sm-12">
                                            <form method="post" action="/search-guest-order-number">
                                                <div class="mb-3">
                                                    <label class="form-label" for="ordernumber">Search for Order Number</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" name="ordernumber" id="ordernumber" placeholder="Enter order number . . ." aria-label="Enter order number . . .">
                                                        <button class="btn btn-dark" type="submit">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <hr class="m-0 p-0">
                                        <div class="col-sm-12">
                                            <form method="post" action="/guest-mode">
                                                <label class="form-label m-0 p-0" for="ordernumber">Or</label>
                                                <hr class="m-0 p-0">
                                                <input type="hidden" class="form-control" name="username" value="<?=$random_name;?>">
                                                <button class="btn btn-secondary mt-3" type="submit"> Guest Mode </button><br>
                                                <span class="text-muted"><em>*Click Guest Mode if you want to order anonymously.</em></span>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <div class="mb-0 text-center">
                        
                    </div>
                </div> <!-- end card-body -->
            </div>
            <!-- end card -->

            <div class="row mt-3">
                <div class="col-12 text-center">
                    <p class="text-muted">Don't have an account? <a href="/register" class="text-muted ms-1"><b>Sign Up</b></a></p>
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div>
<!-- end container -->