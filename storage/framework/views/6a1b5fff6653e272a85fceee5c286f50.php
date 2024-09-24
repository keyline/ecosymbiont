<?php
use App\Models\Category;
use App\Models\ListingAd;
use App\Models\ListingAdsImage;
use App\Models\ListingAdDocument;
use App\Models\VideoLibrary;
use App\Helpers\Helper;
?>
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
<section class="login-section section-padding">
   <div class="container-xxl container-xl container-lg container-md container-sm container">
      <div class="row align-items-center">
         <div class="login-wrapper">
            <div class="page-title">
               <h2><?=$page_header?></h2>
               <small class="text-danger">All fields are mandatory</small>
            </div>
            <form method="POST" action="">
               <?php echo csrf_field(); ?>
               <input type="hidden" name="product_id" value="<?=$product->id?>">
               <input type="hidden" name="listing_owner_type" value="<?=$product->listing_owner_type?>">
               <input type="hidden" name="listing_owner_id" value="<?=$product->listing_owner_id?>">
               <div class="login-form-list">
                  <div class="row gx-3">
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label for="fname">First Name</label>
                           <input type="text" class="form-control" name="fname" id="fname" value="<?=(($getUser)?$getUser->first_name:'')?>" required>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label for="lname">Last Name</label>
                           <input type="text" class="form-control" name="lname" id="lname" value="<?=(($getUser)?$getUser->first_name:'')?>" required>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label for="company_name">Company Name</label>
                           <input type="text" class="form-control" name="company_name" id="company_name" required>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label for="phone">Phone Number</label>
                           <input class="form-control" type="number" name="phone" id="phone" value="<?=(($getUser)?$getUser->phone:'')?>" required>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label for="email">Email Address</label>
                           <input type="email" class="form-control" name="email" id="email" value="<?=(($getUser)?$getUser->email:'')?>" required>
                        </div>
                     </div>

                     <div class="col-lg-6">
                        <div class="form-group">
                           <label for="product_info">Product Name & Model</label>
                           <input class="form-control" type="text" name="product_info" id="product_info" required>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="form-group">
                           <label for="offer_price">Offer Price</label>
                           <input type="text" class="form-control" name="offer_price" id="offer_price" required>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="message">Message </label>
                           <textarea rows="4" name="message" id="message" class="form-control" required></textarea>
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
</section>
<script type="text/javascript">
   function confirmRedirect(param) {
      var userConfirmation = confirm(param);
      if (userConfirmation) {
         var url = '<?=url('/signin')?>';
         // alert(url);
         window.location.href = url;
      }
   }
</script>
<?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/front/pages/contact-for-sales-inquiry.blade.php ENDPATH**/ ?>