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
                                        <h2 class="text-center"><?=$page_header?></h2>
                                        <form id="myForm" method="POST" onsubmit="return validateForm();">
                                            @csrf
                                            <div class="form-row">
                                                <div class="form-group col-6">
                                                    <label for="fullName">Full name*</label>
                                                    <input type="text" class="form-control" id="fullName" name="full_name" required>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="email">Email address*</label>
                                                    <input type="email" class="form-control" id="email" name="email" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-6">
                                                    <label class="form-check-label" for="country">Country of residence*</label>
                                                    <input type="text" class="form-control" id="country" name="country" required>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="subject">Subject*</label>
                                                    <select class="form-control" name="subject[]" id="subject" multiple onchange="console.log(Array.from(this.selectedOptions).map(x=>x.value??x.text))" multiselect-hide-x="true" required>
                                                        <option value="1">I am interested in funding the work of ER and/or ERT</option>
                                                        <option value="2">I am interested in learning more about the work of ER and/or ERT</option>
                                                        <option value="3">I am interested in submitting Creative-Work to ERT</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="message">Message (up to 250 words)*</label>
                                                <textarea class="form-control" id="message" name="message" rows="3" maxlength="250" required></textarea>
                                            </div>
                                            <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                                            <button type="submit" class="btn btn-primary">Submit</button>
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

        
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>    
    <script src="https://www.google.com/recaptcha/api.js?render=6LclkEwqAAAAAHf6rGCvLyu-B1N-eYOU8NYLL5k4"></script>
    <script>
        // Validate the form before submission
        function validateForm() {
            var fullName = document.getElementById('fullName').value;
            var email = document.getElementById('email').value;
            var country = document.getElementById('country').value;
            var message = document.getElementById('message').value;
            var subject = document.getElementById('subject').value;

            if (!fullName || !email || !country || !message || !subject) {
                alert('All fields are required.');
                return false;
            }

            // Trigger reCAPTCHA validation
            grecaptcha.ready(function () {
                grecaptcha.execute('6LclkEwqAAAAAHf6rGCvLyu-B1N-eYOU8NYLL5k4', { action: 'submit' }).then(function (token) {
                    // Set the token into the hidden input field
                    document.getElementById('recaptchaResponse').value = token;
                    document.getElementById('myForm').submit();
                });
            });

            // Prevent form from submitting immediately
            return false;
        }
    </script>