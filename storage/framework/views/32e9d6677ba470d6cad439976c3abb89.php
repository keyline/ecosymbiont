<div class="container">
  <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
          <div class="d-flex justify-content-center py-4">
            <a href="<?=url('admin')?>" class="d-flex align-items-center w-auto">
              <img src="<?=env('UPLOADS_URL').$generalSetting->site_logo?>" alt="<?=$generalSetting->site_name?>">
              <!-- <span class="d-none d-lg-block"><?=$generalSetting->site_name?></span> -->
            </a>
          </div><!-- End Logo -->
          <div class="card mb-3">
            <div class="card-body">
              <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Reset Your Account</h5>
              </div>
              <?php if(session('success_message')): ?>
                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show autohide" role="alert">
                  <?php echo e(session('success_message')); ?>

                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif; ?>
              <?php if(session('error_message')): ?>
                <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show autohide" role="alert">
                  <?php echo e(session('error_message')); ?>

                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif; ?>
              <form method="POST" action="" class="row g-3">
                <?php echo csrf_field(); ?>
                <div class="col-12">
                  <label for="email" class="form-label">Email</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control" id="email" required>
                    <div class="invalid-feedback">Please enter your email.</div>
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="submit">Retrieve Password</button>
                </div>
              </form>
            </div>
          </div>
          <div class="credits">
            Designed by <a target="_blank" href="https://keylines.net/">Keylines Digitech Pvt. Ltd.</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/admin/maincontents/forgot-password.blade.php ENDPATH**/ ?>