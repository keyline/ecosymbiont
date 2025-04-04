<!-- block-wrapper-section ================================================== -->
    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8 content-blocker">
                    <!-- block content -->
                    <div class="block-content">
                        <!-- single-post box -->
                        <div class="row">
                          <div class="col-xl-12">
                              @if(session('success_message'))
                                <div class="alert alert-success bg-success text-dark border-0 alert-dismissible show autohide" role="alert">
                                  {{ session('success_message') }}
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                              @endif
                              @if(session('error_message'))
                                <div class="alert alert-danger bg-danger text-dark border-0 alert-dismissible show autohide" role="alert">
                                  {{ session('error_message') }}
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                              @endif
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-header">
                                            <h3 class="text-center">Sign into your account</h3>
                                            <p class="text-center">Enter your email & password for login</p>
                                        </div>
                                        <form method="POST" action="">
                                            @csrf
                                            <input type="hidden" name="page_link" value="<?=$page_link?>">
                                            <div class="row" style="margin-bottom: 15px;">
                                              <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                              <div class="col-md-8 col-lg-9">
                                                <input type="text" name="email" class="form-control" id="email" value="">
                                              </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                              <label for="password" class="col-md-4 col-lg-3 col-form-label">Password</label>
                                              <div class="col-md-8 col-lg-9">
                                                <input type="password" name="password" class="form-control" id="password">
                                              </div>
                                            </div>
                                            <div class="text-center">
                                              <button type="submit" class="btn btn-primary">Sign In</button>
                                            </div>
                                            <div class="text-center" style="margin-bottom: 15px;">
                                            Not registered yet? <a href="<?=url('signup')?>">Sign Up</a>
                                            </div>
                                            <div class="text-center" style="margin-bottom: 15px;">
                                            <a href="<?=url('forgetpassword')?>">Forgot Password</a>
                                            </div>
                                          </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End single-post box -->
                    </div>
                    <!-- End block content -->
                </div>
            </div>
        </div>
    </section>
<!-- End block-wrapper-section -->