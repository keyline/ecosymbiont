<section class="login-section section-padding">
    <div class="container-xxl container-xl container-lg container-md container-sm container">
        <div class="row align-items-center">
            <div class="login-wrapper">
                <div class="page-title">
                    <h2><?=$page_header?></h2>
                </div>
                <?php if(session('success_message')): ?>
                    <h6 class="alert alert-success autohide"><?php echo e(session('success_message')); ?></h6>
                <?php endif; ?>
                <?php if(session('error_message')): ?>
                    <h6 class="alert alert-danger autohide"><?php echo e(session('error_message')); ?></h6>
                <?php endif; ?>
                <form method="POST" action="">
                    <?php echo csrf_field(); ?>
                    <div class="login-form-list">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="theme-btn">Submit</button>
                        </div>
                        <div class="form-group">
                            <h6>Already registered <a href="<?=url('signin')?>">SignIn Here</a></h6>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/front/pages/forgot-password.blade.php ENDPATH**/ ?>