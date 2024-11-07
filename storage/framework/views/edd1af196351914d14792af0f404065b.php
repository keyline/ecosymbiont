<div class="inner-sec">
    <div class="container">
        <div class="login-wrapper">
            <div class="page-title">
                <h2>Forgot Password </h2>
            </div>
            <?php if(session('success_message')): ?>
                <h6 class="alert alert-success autohide"><?php echo e(session('success_message')); ?></h6>
            <?php endif; ?>
            <?php if(session('error_message')): ?>
                <h6 class="alert alert-danger autohide"><?php echo e(session('error_message')); ?></h6>
            <?php endif; ?>
            <form method="POST" action="">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label>Email</label>
					<input type="email" class="form-control" name="email" required="" >
				 </div>
                <div class="form-group">
                    <button type="submit" class="theme-btn">Submit</button>
                </div>
                <div class="form-group">
                    <h6>Already Have Account ? <a href="<?=url('signin')?>">Click Here</a></h6>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/pages/forgot-password.blade.php ENDPATH**/ ?>