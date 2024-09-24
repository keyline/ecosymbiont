<?php
use App\Models\Category;
use App\Models\ListingAd;
use App\Models\ListingAdsImage;
use App\Models\ListingAdDocument;
use App\Models\VideoLibrary;
use App\Helpers\Helper;
?>
<div class="inner-banner">
   <div class="background-overlay"></div>
   <h3><?=$page_header?></h3>
</div>
<section class="sell-your-machine-section  section-padding">
   <div class="container-xxl container-xl container-lg container-md container-sm container">
      <div class="row  text-center">
         <div class="col-xxl-12">
            <ul>
               <?php if(!empty(session('name'))){?>
                  <li><a href="<?=url('user/post-listing-ad')?>">Do want to add the machine manually?</a></li>
                  <li><a href="<?=url('user/submit-listing-ad')?>">Do you want us to add it on your behalf?</a></li>
               <?php } else {?>
                  <li><a href="javascript:void(0);" onclick="confirmRedirect('Sign in require for this')">Do want to add the machine manually?</a></li>
                  <li><a href="javascript:void(0);" onclick="confirmRedirect('Sign in require for this')">Do you want us to add it on your behalf?</a></li>
               <?php }?>
            </ul>
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
<?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/front/pages/sell-your-machine.blade.php ENDPATH**/ ?>