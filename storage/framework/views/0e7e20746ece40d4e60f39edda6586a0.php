<section class="login-section section-padding">
    <div class="container-xxl container-xl container-lg container-md container-sm container">
        <div class="row align-items-center">
            <div class="login-wrapper">
                <div class="page-title">
                    <h2><?=$page_header?></h2>
                </div>
                <form method="POST" action="">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" class="form-control" name="type" value="1">
                    <div class="login-form-list">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" value class="input form-control" id="password"
                                placeholder="" required="true" aria-label="password" aria-describedby="basic-addon1" />
                            <div class="input-group-append">
                                <span class="input-group-text" onclick="password_show_hide();">
                                <i class="fas fa-eye" id="show_eye"></i>
                                <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="theme-btn">Sign In</button>
                        </div>
                        <div class="form-group">
                            <h6>You have not account ? <a href="<?=url('signup')?>">Click Here</a></h6>
                        </div>
                        <div class="form-group">
                            <h6>Forgot password ? <a href="<?=url('forgot-password')?>">Click Here</a></h6>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/front/pages/signin.blade.php ENDPATH**/ ?>