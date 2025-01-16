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
                                            <h3 class="text-center">Reset Your Password</h3>                                            
                                        </div>
                                        <form method="POST" action="">
                                            @csrf                                                                                        
                                            <div class="row" style="margin-bottom: 15px;">
                                              <label for="new_password" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                              <div class="col-md-8 col-lg-9">
                                                <input type="password" name="new_password" class="form-control" id="new_password" minlength="8" maxlength="15">
                                              </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                              <label for="confirm_password" class="col-md-4 col-lg-3 col-form-label">Confirm New Password</label>
                                              <div class="col-md-8 col-lg-9">
                                                <input type="password" name="confirm_password" class="form-control" id="confirm_password" minlength="8" maxlength="15">
                                              </div>
                                            </div>
                                            <div class="text-center">
                                              <button type="submit" class="btn btn-primary">Submit</button>
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