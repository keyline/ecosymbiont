<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y property-information-form">
    <h4 class="py-3 mb-1">
        <span class="text-muted fw-light">
        <h4><?=$page_header?></h4>
    </h4>
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-4 pb-0 mb-3">
            <form method="POST" action="" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php if($getUser->is_change_password == 0){?>
                <h6 class="text-danger">If you are sign in for the first time you have to reset your password, to keep your password secret from anyone else.</h6>
                <?php }?>
                <h5 class="text-primary">Welcome to your account! For your security, please change your temporary password now. Follow the steps to set a new, secure password.</h5>
                <div class="row">
                    <div class="col-lg-12">
                        <?php if(session('success_message')): ?>
                        <h6 class="alert alert-success autohide"><?php echo e(session('success_message')); ?></h6>
                        <?php endif; ?>
                        <?php if(session('error_message')): ?>
                        <h6 class="alert alert-danger autohide"><?php echo e(session('error_message')); ?></h6>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Existing Password</label>
                            <input type="password" class="form-control" placeholder="********" name="old_password" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" class="form-control" placeholder="********" name="new_password" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" placeholder="********" name="confirm_password" required>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-4">
                        <div class="form-group">
                            <button type="submit" class="theme-btn">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- / Content --><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/pages/user/change-password.blade.php ENDPATH**/ ?>