<div class="inner-sec">
    <div class="container">
        <div class="login-wrapper">
            <div class="page-title">
                <h2><?=$page_header?></h2>
            </div>
            <?php if(session('success_message')): ?>
                <h5 class="alert alert-success autohide"><?php echo e(session('success_message')); ?></h5>
            <?php endif; ?>
            <?php if(session('error_message')): ?>
                <h5 class="alert alert-danger autohide"><?php echo e(session('error_message')); ?></h5>
            <?php endif; ?>
            <form method="POST" action="">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="user_type" value="2" required>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" maxlength="15" minlength="8">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" maxlength="15" minlength="8">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="theme-btn">Submit</button>
                </div>
                <div class="form-group">
                    <h6>Already have account ? <a href="<?=url('signin')?>">Click Here</a></h6>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/pages/tenant-signup.blade.php ENDPATH**/ ?>