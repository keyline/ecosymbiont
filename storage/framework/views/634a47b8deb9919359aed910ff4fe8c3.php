<div class="row mt-3">
   <div class="col-lg-12">
      <?php if(session('success_message')): ?>
         <h6 class="alert alert-success autohide"><?php echo e(session('success_message')); ?></h6>
      <?php endif; ?>
      <?php if(session('error_message')): ?>
         <h6 class="alert alert-danger autohide"><?php echo e(session('error_message')); ?></h6>
      <?php endif; ?>
   </div>
</div>
<form method="POST" action="">
   <?php echo csrf_field(); ?>
   <div class="row mt-4">
      <div class="row mt-3">
         <div class="col-12 col-sm-12 ">
            <label for="old_password">Existing Password</label>
            <input class="multisteps-form__input form-control" name="old_password" id="old_password" type="password" placeholder="******" onfocus="focused(this)" onfocusout="defocused(this)">
         </div>
      </div>
      <div class="row mt-3 ">
         <div class="col-12 col-sm-12">
            <label for="new_password">New Password</label>
            <input class="multisteps-form__input form-control" name="new_password" id="new_password" type="password" placeholder="******" onfocus="focused(this)" onfocusout="defocused(this)">
         </div>
      </div>
      <div class="row mt-3 ">
         <div class="col-12 col-sm-12">
            <label for="confirm_password">Confirm Password</label>
            <input class="multisteps-form__input form-control" name="confirm_password" id="confirm_password" type="password" placeholder="******" onfocus="focused(this)" onfocusout="defocused(this)">
         </div>
      </div>
      <div class="col-lg-12 mt-3">
         <button type="submit" class="btn bg-gradient-dark">Submit Now</button>
         <div></div>
      </div>
   </div>
</form><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/front/pages/user/change-password.blade.php ENDPATH**/ ?>