<?php
use App\Helpers\Helper;
?>
<section class="subscribe-section  section-padding pt-0" id="subscribe-section">
   <div class="container-xxl container-xl container-lg container-md container-sm container">
      <div class="row ">
         <div class="col-xl-12 text-center mb-4">
            <div class="section-title">
               <h2><?=$content->sec6_title?></h2>
            </div>
         </div>
      </div>
      <form method="POST" action="<?=url('submit-subscriber')?>">
         <?php echo csrf_field(); ?>
         <?php
         $redirectUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
         ?>
         <input type="hidden" name="redirect_link" value="<?=Helper::encoded($redirectUrl)?>">
         <div class="subscribe-form">
            <div class="row justify-content-center">
               <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-6 col-sm-12  col-12 mb-3 mb-lg-o mb-md-0">
                  <input type="text" class="form-control" placeholder="Name" name="name" value="<?=session('name')?>" required>
               </div>
               <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-6 col-sm-12  col-12 mb-2 mb-lg-o mb-md-0">
                  <input type="email" class="form-control" placeholder="Email" name="email" value="<?=session('email')?>" required>
               </div>
            </div>
            <div class="row gx-2  justify-content-center">
               <div class="col-xxl-2 col-xl-2 col-lg-4 col-md-4 col-sm-12  col-12">
                  <select class="form-select" aria-label="Default select example" name="category" required>
                     <option value="" selected="">Category</option>
                     <?php if($cats){ foreach($cats as $cat){?>
                     <option value="<?=$cat->id?>"><?=$cat->category_name?></option>
                     <?php } }?>
                  </select>
               </div>
               <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-12  col-12">
                  <select class="form-select" aria-label="Default select example" name="manufacturer" required>
                     <option value="" selected="">Manufacturer</option>
                     <?php if($manufacturers){ foreach($manufacturers as $manufacturer){?>
                     <option value="<?=$manufacturer->id?>"><?=$manufacturer->name?></option>
                     <?php } }?>
                  </select>
               </div>
               <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-12  col-12">
                  <select class="form-select" aria-label="Default select example" name="frequency" required>
                     <option value="" selected="">Frequency</option>
                     <option value="DAILY">DAILY</option>
                     <option value="WEEKLY">WEEKLY</option>
                     <option value="MONTHLY">MONTHLY</option>
                     <option value="QUARTERLY">QUARTERLY</option>
                     <option value="HALF-YEARLY">HALF-YEARLY</option>
                     <option value="YEARLY">YEARLY</option>
                  </select>
               </div>
               <div class="col-lg-12 text-center">
                  <button type="submit" class="btn">Subscribe</button>
               </div>
            </div>
         </div>
      </form>
   </div>
</section>
<footer>
   <div class="container-xxl container-xl container-lg container-md container-sm container">
      <div class="row ">
         <div class="col-xl-12 text-center">
            <div class="footer-top">
               <a href="<?=url('/')?>"><img class="img-fluid" src="<?=env('UPLOADS_URL').$generalSetting->site_footer_logo?>" alt="<?=$generalSetting->site_name?>"></a>
               <ul>
                  <?php
                  $footer_link_name = json_decode($generalSetting->footer_link_name);
                  $footer_link = json_decode($generalSetting->footer_link);
                  if(!empty($footer_link_name)){ for($k=0;$k<count($footer_link_name);$k++){
                  ?>
                      <li>
                          <a href="<?=$footer_link[$k]?>"><?=$footer_link_name[$k]?></a>
                      </li>
                  <?php } }?>
               </ul>
            </div>
         </div>
         <div class="col-xl-12 ">
            <div class="footer-middle">
               <div class="row justify-content-between">
                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12  col-12">
                     <div class="footer-middle-left">
                        <div class="middle-icon"><img class="img-fluid" src="<?=env('FRONT_ASSETS_URL')?>images/location.png" alt="image"></div>
                        <div class="middle-des">
                           <h2><?=$generalSetting->site_name?></h2>
                           <p><?=$generalSetting->description?></p>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12  col-12">
                     <div class="footer-middle-right">
                        <ul>
                           <li><i><img class="img-fluid" src="<?=env('FRONT_ASSETS_URL')?>images/call-icon.png" alt="image"></i><a
                                 href="tel:<?=$generalSetting->site_phone?>"><?=$generalSetting->site_phone?></a> <span>|</span><a
                                 href="tel:<?=$generalSetting->site_phone2?>"><?=$generalSetting->site_phone2?></a></li>
                        </ul>
                        <div class="social-media-icon">
                           <ul>
                              <li><a target="_blank" href="<?=$generalSetting->facebook_profile?>"><i class="fa-brands fa-facebook-f"></i></a></li>
                              <li><a target="_blank" href="<?=$generalSetting->twitter_profile?>"><i><img class="img-fluid" src="<?=env('FRONT_ASSETS_URL')?>images/Twitter_icon-x.webp" alt="image"></i></a></li>
                              <li><a target="_blank" href="<?=$generalSetting->linkedin_profile?>"><i class="fa-brands fa-linkedin-in"></i></a></li>
                              <li><a target="_blank" href="<?=$generalSetting->youtube_profile?>"><i class="fa-brands fa-youtube"></i></a></li>
                              <li><a target="_blank" href="<?=$generalSetting->instagram_profile?>"><i class="fa-brands fa-instagram"></i></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-12 text-center">
            <div class="footer-coppy-right">
               <p><?=$generalSetting->footer_text?></p>
               <p><?=$generalSetting->footer_description?></p>
            </div>
         </div>
      </div>
   </div>
</footer><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/front/elements/beforefooter.blade.php ENDPATH**/ ?>