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
                    <input type="hidden" class="form-control" name="type" value="1">
                    <div class="login-form-list">
                        <div class="row gx-3">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="first_name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="last_name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="password" type="password" value class="input form-control" id="password"
                                        placeholder="" required="true" aria-label="password" aria-describedby="basic-addon1" minlength="6" />
                                    <div class="input-group-append">
                                        <span class="input-group-text" onclick="password_show_hide();">
                                        <i class="fas fa-eye" id="show_eye"></i>
                                        <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input name="confirm_password" type="password" value class="input form-control" id="password"
                                        placeholder="" required="true" aria-label="password" aria-describedby="basic-addon1" minlength="6" />
                                    <div class="input-group-append">
                                        <span class="input-group-text" onclick="password_show_hide();">
                                        <i class="fas fa-eye" id="show_eye"></i>
                                        <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <h6>Already registered <a href="<?=url('signin')?>">SignIn Here</a></h6>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="theme-btn">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/front/pages/signup.blade.php ENDPATH**/ ?>