<div class="inner-sec">
    <div class="container">
        <div class="login-wrapper">
            <div class="page-title">
                <h2>Verify OTP</h2>
            </div>
            <?php if(session('success_message')): ?>
                <h6 class="alert alert-success autohide"><?php echo e(session('success_message')); ?></h6>
            <?php endif; ?>
            <?php if(session('error_message')): ?>
                <h6 class="alert alert-danger autohide"><?=session('error_message')?></h6>
            <?php endif; ?>
            <form method="POST" action="">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?=$id?>">
                <div class="form-group otp-input">
                    <input class="otp" type="text" name="otp1" oninput='digitValidate(this)' onkeyup='tabChange(1)' maxlength=1 required>
                    <input class="otp" type="text" name="otp2" oninput='digitValidate(this)' onkeyup='tabChange(2)' maxlength=1 required>
                    <input class="otp" type="text" name="otp3" oninput='digitValidate(this)' onkeyup='tabChange(3)' maxlength=1 required>
                    <input class="otp" type="text" name="otp4" oninput='digitValidate(this)'onkeyup='tabChange(4)' maxlength=1 required>
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
</div><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/pages/signup-validate-otp.blade.php ENDPATH**/ ?>