<?php
use App\Helpers\Helper;
use Illuminate\Support\Facades\Route;
$currentFullURL = url()->full();
$pageName     = explode("/", $currentFullURL);
// Helper::pr($pageName);
if(count($pageName) < 4){
   $pageSegment  = '';
} elseif(count($pageName) > 4){
   $pageSegment  = $pageName[4];
} else {
   $pageSegment  = $pageName[3];
}
// echo $pageSegment;
?>
<section class="top-section">
   <div class="container-xxl container-xl container-lg container-md container-sm container">
      <div class="row align-items-center ">
         <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12">
            <div class="top-section-left">
               <a href="<?=url('/')?>"><img class="img-fluid" src="<?=env('UPLOADS_URL').$generalSetting->site_logo?>" alt="<?=$generalSetting->site_name?>"></a>
            </div>
         </div>
         <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12">
            <div class="top-section-right">
               <div class="row align-items-center ">
                  <div class="col-xxl-9 col-xl-9 col-lg-8 col-md-7 col-sm-12">
                     <div class="call-number">
                        <a href="javascript:void(0);"><i class="phone-icon"><img class="img-fluid" src="<?=env('FRONT_ASSETS_URL')?>images/call.png"
                                 alt="image"></i>
                           <?=$generalSetting->site_phone?></a>
                     </div>
                  </div>
                  <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-5 col-sm-12">
                     <div class="top-btn-group">
                        <ul>
                           <?php if(empty(session('name'))){?>
                              <li><a href="<?=url('signup')?>" class="border-btn">Sign Up</a></li>
                              <li><a href="<?=url('signin')?>" class="bg-btn">Sign In</a></li>
                           <?php } else {?>
                              <li><a href="<?=url('user/dashboard')?>" class="border-btn">Dashboard</a></li>
                              <li><a href="<?=url('user/signout')?>" class="bg-btn">SignOut</a></li>
                           <?php }?>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="navigation-section ">
   <div class="container-xxl container-xl container-lg container-md container-sm container">
      <div class="row align-items-center">
         <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12  col-12">
            <div class="stellarnav ">
               <ul>
                  <li><a href='<?=url('/')?>' <?=(($pageSegment == '')?'class="active"':'')?>>Home</a></li>
                  <li><a href='<?=url('new-products-grid')?>' <?=(($pageSegment == 'new-products-grid')?'class="active"':'')?>>New Products</a></li>
                  <li><a href='<?=url('used-products-grid')?>' <?=(($pageSegment == 'used-products-grid')?'class="active"':'')?>>Used Products</a></li>
                  <li><a href='<?=url('sell-your-machine')?>' <?=(($pageSegment == 'sell-your-machine')?'class="active"':'')?>>Sell Your Machine</a></li>
                  <li><a href='<?=url('page/about-us')?>' <?=(($pageSegment == 'about-us')?'class="active"':'')?>>About Us</a></li>
                  <li><a href='<?=url('faq')?>' <?=(($pageSegment == 'faq')?'class="active"':'')?>>FAQs</a></li>
                  <li><a href='<?=url('contact-us')?>' <?=(($pageSegment == 'contact-us')?'class="active"':'')?>>Contact Us</a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/front/elements/beforeheader.blade.php ENDPATH**/ ?>