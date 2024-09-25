<?php 
session_start();
include "include/header.php";

?>
<style>
  select {width: 20em;}
</style>
    <section class="banner-info blanktop_pages">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titleto-box">
                        <h2>Contact</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    

                    <div class="info-box"> 
                        <p>If you are interested in funding or learning more about the work of Ecosymbionts Regenerate (ER) and/or Ecosymbionts Regenerate Together (ERT) or if you would like to submit Creative-Work, please contact us.</p>
                    </div>

                    <div class="info-contact_form">
                        <?php
                        if (isset($_SESSION['mail_fail'])) {
                            ?>
                            <h4 style="color: red;"><?php echo $_SESSION['mail_fail']; ?></h4>
                            <?php
                            unset($_SESSION['mail_fail']);
                        }                    
                        if (isset($_SESSION['mail_succ'])) {
                            ?>
                            <h4 style="color: green;"><?php echo $_SESSION['mail_succ']; ?></h4>
                            <?php
                            unset($_SESSION['mail_succ']);
                        }
                        ?>
                        <!-- <form>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="exampleInputEmail1">Full name*</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group col-6">
                                    <label for="exampleInputPassword1">Email address*</label>
                                    <input type="test" class="form-control" id="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label class="form-check-label" for="exampleCheck1">Country of residence*</label>
                                    <input type="test" class="form-control" id=""> 
                                </div>
                                <div class="form-group col-6">
                                    <label class="form-check-label" for="exampleCheck1">Subject*</label>
                                    <select class="form-control" name="field1" id="field1" multiple onchange="console.log(Array.from(this.selectedOptions).map(x=>x.value??x.text))" multiselect-hide-x="true">
                                        <option value="1">I am interested in fuding the work of ER and/or ERT</option>
                                        <option value="2">I am interested in learning more about the work of ER and/or ERT</option>
                                        <option value="3">I am interested in submitting Creative-Work to ERT</option>
                                    </select> 
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="exampleCheck1">Message (up to 250 words)*</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>                               
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form> -->
                        <form id="myForm" action="db_contact.php" method="POST" onsubmit="return validateForm();">
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
                                <div class="form-group ">
                                    <label class="form-check-label" for="country">Country of residence*</label>
                                    <input type="text" class="form-control" id="country" name="country" required>
                                </div>
                                

                            <div class="form-group ">
                                    <label for="subject">Subject*</label>
                                    <select class="form-control" name="subject[]" id="subject" multiple onchange="console.log(Array.from(this.selectedOptions).map(x=>x.value??x.text))" multiselect-hide-x="true" required>
                                        <option value="1">I am interested in funding the work of ER and/or ERT</option>
                                        <option value="2">I am interested in learning more about the work of ER and/or ERT</option>
                                        <option value="3">I am interested in submitting Creative-Work to ERT</option>
                                    </select>
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
    </section>
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
<?php 
include "include/footer.php"
?>