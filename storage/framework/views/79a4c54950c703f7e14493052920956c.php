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
<form method="POST" action="" enctype="multipart/form-data">
   <?php echo csrf_field(); ?>
   <div class="row mt-4">
      <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
         <!-- <h5 class="font-weight-bolder mb-0">Update Profile</h5> -->
         <div class="multisteps-form__content">
            <div class="row mt-3">
               <div class="col-12 ">
                  <div class="profile-pic">
                     <?php if($getUser){?>
                        <?php if($getUser->profile_image != ''){?>
                           <img alt="<?=(($getUser)?$getUser->first_name.' '.$getUser->last_name:'')?>" src="<?=env('UPLOADS_URL').'user/'.$user->profile_image?>" id="profile-image1" height="200">
                        <?php } else {?>
                           <img alt="<?=(($getUser)?$getUser->first_name.' '.$getUser->last_name:'')?>" src="https://d30y9cdsu7xlg0.cloudfront.net/png/138926-200.png" id="profile-image1" height="200">
                        <?php }?>
                     <?php } else {?>
                        <img alt="<?=(($getUser)?$getUser->first_name.' '.$getUser->last_name:'')?>" src="https://d30y9cdsu7xlg0.cloudfront.net/png/138926-200.png" id="profile-image1" height="200">
                     <?php }?>
                     
                     <div class="file-input">
                        <input type="file" name="profile_image" id="file-input" class="file-input__input" />
                        <label class="file-input__label" for="file-input">
                           <svg
                              aria-hidden="true"
                              focusable="false"
                              data-prefix="fas"
                              data-icon="upload"
                              class="svg-inline--fa fa-upload fa-w-16"
                              role="img"
                              xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 512 512"
                              >
                              <path
                                 fill="currentColor"
                                 d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"
                                 ></path>
                           </svg>
                           <span>Upload Image</span>
                        </label
                           >
                     </div>
                  </div>
               </div>
               <div class="col-12 col-sm-6">
                  <label>First Name</label>
                  <input class="multisteps-form__input form-control" type="text" name="first_name" id="first_name" value="<?=(($getUser)?$getUser->first_name:'')?>" placeholder="eg. Michael" onfocus="focused(this)" onfocusout="defocused(this)">
               </div>
               <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                  <label>Last Name</label>
                  <input class="multisteps-form__input form-control" type="text" name="last_name" id="last_name" value="<?=(($getUser)?$getUser->last_name:'')?>" placeholder="eg. Prior" onfocus="focused(this)" onfocusout="defocused(this)">
               </div>
               <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                  <label>Email</label>
                  <input class="multisteps-form__input form-control" type="email" name="email" id="email" value="<?=(($getUser)?$getUser->email:'')?>" placeholder="Email" onfocus="focused(this)" onfocusout="defocused(this)" readonly>
               </div>
               <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                  <label>Phone Number</label>
                  <input class="multisteps-form__input form-control" type="number" name="phone" id="phone" value="<?=(($getUser)?$getUser->phone:'')?>" placeholder="Phone Number" onfocus="focused(this)" onfocusout="defocused(this)">
               </div>
               <!-- <div class="col-12 col-sm-12">
                  <label>Address</label>
                  <textarea class="multisteps-form__textarea form-control" rows="5" placeholder="Say a few words about who you are or what you're working on."></textarea>
               </div> -->
               <div class="col-12 col-sm-12 mt-3 ">
                  <button type="submit" class="btn bg-gradient-dark mb-0">Submit Now</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</form><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/front/pages/user/update-profile.blade.php ENDPATH**/ ?>