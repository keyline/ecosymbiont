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
                                            <h3 class="text-center">Forgot Password</h3>                                            
                                        </div>
                                        <form method="POST" action="">
                                            @csrf
                                            <!-- <input type="hidden" name="page_link" value="?=$page_link?>"> -->
                                            <div class="row" style="margin-bottom: 15px;">
                                              <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                              <div class="col-md-8 col-lg-9">
                                                <input type="text" name="email" class="form-control" id="email" value="">
                                              </div>
                                            </div>                                            
                                            <div class="text-center">
                                            <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response"> 
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
 <!-- site key [live] -->
<script src="https://www.google.com/recaptcha/api.js?render=6LcIw04qAAAAAGBE5JP7v7i3gYEa4OPNSWqBlvbH"></script>
 <script>
grecaptcha.ready(function() {
    grecaptcha.execute('6LcIw04qAAAAAGBE5JP7v7i3gYEa4OPNSWqBlvbH', {action: 'submit'}).then(function(token) {
        // Add the token to your form submission
        document.getElementById('g-recaptcha-response').value = token;
    });
});
</script>

<!-- site key [dev] -->
<!-- <script src="https://www.google.com/recaptcha/api.js?render=6Ldum88qAAAAAGgaGIGZqvD0cZP_KzBWgN9CRUYO"></script>
<script>
grecaptcha.ready(function() {
    grecaptcha.execute('6Ldum88qAAAAAGgaGIGZqvD0cZP_KzBWgN9CRUYO', {action: 'submit'}).then(function(token) {
        // Add the token to your form submission
        document.getElementById('g-recaptcha-response').value = token;
    });
});
</script> -->

<!-- site key [uat] -->
<!-- <script src="https://www.google.com/recaptcha/api.js?render=6Lco6wQrAAAAAA6CUefDtu4VFOND-y_vJvvsGJTj"></script>
<script>
grecaptcha.ready(function() {
    grecaptcha.execute('6Lco6wQrAAAAAA6CUefDtu4VFOND-y_vJvvsGJTj', {action: 'submit'}).then(function(token) {
        // Add the token to your form submission
        document.getElementById('g-recaptcha-response').value = token;
    });
});
</script> -->
