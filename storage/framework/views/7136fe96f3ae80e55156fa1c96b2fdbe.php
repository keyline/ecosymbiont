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
               <input type="hidden" name="id" value="<?=$id?>">
               <div class="login-form-list text-center">
                  <div class="form-group otp-input">
                     <input name="otp1" class="otp" type="text" oninput='digitValidate(this)' onkeyup='tabChange(1)' maxlength=1>
                     <input name="otp2" class="otp" type="text" oninput='digitValidate(this)' onkeyup='tabChange(2)' maxlength=1>
                     <input name="otp3" class="otp" type="text" oninput='digitValidate(this)' onkeyup='tabChange(3)' maxlength=1>
                     <input name="otp4" class="otp" type="text" oninput='digitValidate(this)' onkeyup='tabChange(4)' maxlength=1>
                  </div>
                  <div class="form-group">
                     <button type="submit" class="theme-btn">Submit</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</section><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/front/pages/signup-validate-otp.blade.php ENDPATH**/ ?>