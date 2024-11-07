<div class="inner-banner">
    <h3><?=$page_header?></h3>
</div>
<?php if(session('success_message')): ?>
    <h6 class="alert alert-success autohide"><?php echo e(session('success_message')); ?></h6>
<?php endif; ?>
<?php if(session('error_message')): ?>
    <h6 class="alert alert-danger autohide"><?php echo e(session('error_message')); ?></h6>
<?php endif; ?>
<div class="common-inner get-free-rental contact-page">
    <div class="container mt-3 mb-3">
        <div class="contact-bg">
            <div class="row ">
                <div class="col-md-5">
                    <div class="contect-form-left">
                        <img src="https://qarp.itiffyconsultants.com/public/uploads/property/1707214818VAST2026786_0.jpg" alt="<?=$page_header?>"/>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="contect-form-right">
                        <form method="POST" action="">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">First Name <span class="text-danger">*</span></label>
                                        <input type="text" name="fname" id="fname" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lname">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" name="lname" id="lname" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="phone">Phone <span class="text-danger">*</span></label>
                                        <input type="text" name="phone" id="phone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="subject">Subject  <span class="text-danger">*</span></label>
                                        <input type="text" name="subject" id="subject" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="message">Message  <span class="text-danger">*</span></label>
                                        <textarea rows="6" name="message" id="message" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-start">
                                    <button type="submit" class="theme-btn">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/pages/contact-us.blade.php ENDPATH**/ ?>