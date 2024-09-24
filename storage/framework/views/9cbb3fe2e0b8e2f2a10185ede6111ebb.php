<div class="inner-sec">
    <div class="container">
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
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" ><a href="#tenant" aria-controls="tenant" role="tab" data-toggle="tab" class="active">Tenant</a></li>
                <li role="presentation"><a href="#landlord" aria-controls="landlord" role="tab" data-toggle="tab">Landlord</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="tenant">
                    <form method="POST" action="">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="user_type" value="2" required>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required="" style="padding-right: 28px;">
							<span class="password-toggle-icon" style="float: right;margin-top: -33px;position: relative;z-index: 2;right: 7px;"><i class="fas fa-eye"></i></span>
                        </div>
                        <!-- <div class="form-group">
                            <input type="checkbox"> Keep me logged in
                        </div> -->
                        <div class="form-group">
                            <button type="submit" class="theme-btn">Sign In</button>
                        </div>
                        <div class="form-group">
                            <h6>You have not account ? <a href="<?=url('tenant-signup')?>">Click Here</a></h6>
                        </div>
                        <div class="form-group">
                            <h6>Forgot Password ? <a href="<?=url('forgot-password')?>">Click Here</a></h6>
                        </div>
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane" id="landlord">
                    <form method="POST" action="">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="user_type" value="1" required>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <!-- <div class="form-group">
                            <input type="checkbox"> Keep me logged in
                        </div> -->
                        <div class="form-group">
                            <button type="submit" class="theme-btn">Sign In</button>
                        </div>
                        <div class="form-group">
                            <h6>You have not account ? <a href="<?=url('landlord-signup')?>">Click Here</a></h6>
                        </div>
                        <div class="form-group">
                            <h6>Forgot Password ? <a href="<?=url('forgot-password')?>">Click Here</a></h6>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/pages/signin.blade.php ENDPATH**/ ?>