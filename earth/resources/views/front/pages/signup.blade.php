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
                              {{-- <p style="color:red; font-style: italic;font-size: 14px;text-align: justify;">
                                We are experiencing some technical difficulties; if you see an error message after entering your information and clicking the "Submit" button, please refresh your screen and try a second time to enter your information and hit "Submit." We apologize for the inconvenience.
                              </p> --}}
                              <div class="card">
                                <div class="card-body">
                                    <h2 class="text-center"><?=$page_header?></h2>
                                    <form method="POST" action="">
                                        @csrf
                                        <div class="row" style="margin-bottom: 15px;">
                                          <label for="first_name" class="col-md-4 col-lg-3 col-form-label">User Type</label>
                                          <div class="col-md-8 col-lg-9">
                                            <input type="radio" name="role" id="role1" value="1" required> <label for="role1">Reader</label>
                                            <input type="radio" name="role" id="role2" value="2" required> <label for="role2">Content Creator (Contributor)</label>
                                          </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                          <label for="first_name" class="col-md-4 col-lg-3 col-form-label">Full Legal Name (exactly as it appears on your government-issued identification documents, e.g., passport and/or driver's license)*</label>
                                          <div class="col-md-8 col-lg-9">
                                            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="" required autocomplete="off">
                                          </div>
                                        </div>
                                        <!-- <div class="row" style="margin-bottom: 15px;">
                                          <label for="middle_name" class="col-md-4 col-lg-3 col-form-label">Middle Name</label>
                                          <div class="col-md-8 col-lg-9">
                                            <input type="text" name="middle_name" class="form-control" id="middle_name" placeholder="Enter Middle Name" autocomplete="off">
                                          </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                          <label for="last_name" class="col-md-4 col-lg-3 col-form-label">Surname*</label>
                                          <div class="col-md-8 col-lg-9">
                                            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter Surname" required autocomplete="off">
                                          </div>
                                        </div> -->
                                        <div class="row" style="margin-bottom: 15px;">
                                          <label for="email" class="col-md-4 col-lg-3 col-form-label">Email*</label>
                                          <div class="col-md-8 col-lg-9">
                                            <input type="email" name="email" class="form-control" id="email" placeholder="" required autocomplete="off">
                                          </div>
                                        </div>
                                        <!-- <div class="row" style="margin-bottom: 15px;">
                                          <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                          <div class="col-md-8 col-lg-9">
                                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone" required autocomplete="off">
                                          </div>
                                        </div> -->
                                        <!-- <div class="row" style="margin-bottom: 15px;">
                                          <label for="password" class="col-md-4 col-lg-3 col-form-label">Password*</label>
                                          <div class="col-md-8 col-lg-9">
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" minlength="8" maxlength="15" required autocomplete="off">
                                          </div>
                                        </div> -->
                                        <div class="row" style="margin-bottom: 15px;">
                                          <label for="country" class="col-md-4 col-lg-3 col-form-label">Country of Residence*</label>
                                          <div class="col-md-8 col-lg-9">
                                            <select name="country" class="form-control" required>
                                                <option value="" selected>Select Country of Residence</option>
                                                <?php if($countries){ foreach($countries as $country){?>
                                                    <option value="<?=$country->id?>"><?=$country->name?></option>
                                                <?php } }?>
                                            </select>
                                          </div>
                                        </div> 
                                        <!-- Add hidden input for reCAPTCHA token -->
                                        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">                                           
                                        <div class="text-center" style="margin-bottom: 15px;">
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                        <div class="text-center" style="margin-bottom: 15px;">
                                        Already registered? <a href="<?=url('signin')?>">Sign In</a>
                                        <br>Having technical problems? <a href="<?=env('REGENERATE_URL')?>contact.php">Contact us</a>.
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

    <!-- Popup Div (Initially hidden) -->
    <div id="popup">
      <h3>Submissions Eligibility Criteria</h3>
      <!-- <p>At this time, you must:<br>
      (A) be invited to submit a Creative-Work to EaRTh (if you have not been invited, follow the directions for question 6 when completing your profile); and/or <br>
      (B) have participated as a strategist at an in-person ER Synergy Meeting.</p> -->
      <p>If you would like to submit creative-works to EaRTh, you must:</p>
      <ul>
        <li>be a grassroots human individual, ecoweb-rooted community, or movement; and</li>
        <li>submit creative-works related to any aspect of human-ecological connectivity</li>
      </ul>
      <button id="closePopup">Close</button>
    </div>    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#popup').hide();
        // Trigger popup on radio button change
        $('input[name="role"]').change(function() {
            if ($(this).is(':checked')) {
              if($(this).val() == 2){
                $('#popup').fadeIn();
              }
            }
        });

        // Close the popup
        $('#closePopup').click(function() {
            $('#popup').fadeOut();
        });
      });
    </script>
<!-- End block-wrapper-section -->

<?php
//  Get the host (domain name)
 $host = $_SERVER['HTTP_HOST']; // e.g., localhost or example.com
if($host == 'ecosymbiont.keylines.in'){
    $site_key = '6Ldum88qAAAAAGgaGIGZqvD0cZP_KzBWgN9CRUYO';
} elseif($host == 'ecosymbiont-uat.keylines.in'){
    $site_key = '6Lco6wQrAAAAAA6CUefDtu4VFOND-y_vJvvsGJTj';
} else{ 
    $site_key = '6LcIw04qAAAAAGBE5JP7v7i3gYEa4OPNSWqBlvbH';
}
 ?>


<script src="https://www.google.com/recaptcha/api.js?render=<?=$site_key?>"></script>
 <script>
grecaptcha.ready(function() {
    grecaptcha.execute('<?=$site_key?>', {action: 'submit'}).then(function(token) {
        // Add the token to your form submission
        document.getElementById('g-recaptcha-response').value = token;
    });
});
</script>
<!-- site key [dev] -->
<!--<script src="https://www.google.com/recaptcha/api.js?render=6Ldum88qAAAAAGgaGIGZqvD0cZP_KzBWgN9CRUYO"></script>
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