<?php
use App\Models\Student;
use App\Models\CenterTimeSlot;
?>
<section id="home">
   <div class="container-fluid p-0">
      <div class="row">
         <div class="col">
            <p class="rs-p-wp-fix"></p>
            <rs-module-wrap id="rev_slider_1_1_wrapper" data-alias="firoox-revolution-slider" data-source="gallery" style="background:transparent;padding:0;margin:0px auto;margin-top:0;margin-bottom:0;">
               <rs-module id="rev_slider_1_1" style data-version="6.3.3">
                  <rs-slides>
                     <?php if($banners){ foreach($banners as $banner){?>
                        <rs-slide data-key="rs-2" data-title="Slide 1" data-thumb="<?=env('UPLOADS_URL').'banner/'.$banner->banner_image?>" data-anim="ei:d;eo:d;s:d;r:default;t:slotslide-horizontal;sl:d;">
                           <img src="<?=env('UPLOADS_URL').'banner/'.$banner->banner_image?>" title="firoox-s1" width="1920" height="1280" data-bg="p:center top;" data-parallax="off" class="rev-slidebg" data-no-retina>
                           <rs-layer id="slider-2-slide-2-layer-10" data-type="text" data-rsp_ch="on" data-xy="x:l,l,c,c;xo:50px,0,-155px,0;yo:330px,243px,235px,229px;" data-text="w:normal;s:28,22,18,18;l:36,36,36,36;ls:1px,1px,0px,1px;fw:500;a:center,center,center,center;" data-dim="w:345px,400px,330px,356px;h:auto,auto,auto,auto;" data-frame_0="y:-50,-37,-28,-17;" data-frame_1="st:500;sp:1000;sR:500;" data-frame_999="o:0;st:w;sR:7500;" style="z-index:12;" class="font-current-theme2 bg-white text-theme-colored3 border-radius-5"><?=$banner->heading1?></rs-layer>
                           <rs-layer id="slider-2-slide-2-layer-18" data-type="text" data-rsp_ch="on" data-xy="x:l,l,c,c;xo:55px,0px,8px,0;yo:388px,300px,280px,285px;" data-text="w:normal;s:90,72,62,46;l:95,90,80,48;ls:1px,0px,0px,0px;fw:900;a:left,left,left,center;" data-dim="w:1000px,743px,659px,455px;" data-frame_0="y:-50,-37,-28,-17;" data-frame_1="st:1100;sp:1000;sR:1100;" data-frame_999="o:0;st:w;sR:6900;" style="z-index:11;text-transform:capitalize;" class="font-current-theme2"><?=$banner->heading2?></span></rs-layer>
                           <!-- <rs-layer id="slider-2-slide-2-layer-22" data-type="text" data-rsp_ch="on" data-xy="x:l,l,c,c;xo:60px,0px,-225px,0px;yo:510px,410px,380px,360px;" data-text="w:normal;s:20,16,16,13;l:22,20,18,20;a:left,left,left,center;" data-frame_0="y:-50,-37,-28,-17;" data-frame_1="st:1700;sp:1000;sR:1700;" data-frame_999="o:0;st:w;sR:6300;" style="z-index:10;" class="font-current-theme1"><a href="<?=$banner->heading2?>" class="btn btn-theme-colored4">Contact Us</a></rs-layer> -->
                           <rs-layer id="slider-2-slide-2-layer-0" data-type="shape" data-rsp_ch="on" data-text="w:normal;s:20,14,10,6;l:0,18,13,8;" data-dim="w:100%;h:100%;" data-basealign="slide" data-frame_999="o:0;st:w;sR:8700;" style="z-index:8;background-color:rgba(0,10,22,0.17);"></rs-layer>
                        </rs-slide>
                     <?php } } ?>
                  </rs-slides>
                  <rs-static-layers>
                  </rs-static-layers>
                  <rs-progress class="rs-bottom" style="height: 5px; background: rgba(199,199,199,0.5);"></rs-progress>
               </rs-module>
            </rs-module-wrap>
         </div>
      </div>
   </div>
</section>
<section class="divider" data-tm-bg-img="<?=env('FRONT_ASSETS_URL')?>images/bg/b1.png" data-tm-margin-top="-34px">
   <div class="container">
      <div class="section-content">
         <div class="row">
            <div class="col-sm-6 col-md-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
               <div class="tm-sc-icon-box icon-box text-center iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate-y mb-sm-30">
                  <div class="icon-box-wrapper">
                     <div class="icon-wrapper mb-20">
                        <a class="icon icon-xl icon-dark icon-circled bg-theme-colored1">
                        <i class="fas fa-user text-white"></i>
                        </a>
                     </div>
                     <div class="icon-text">
                        <h4 class="icon-box-title">Expert Teachers</h4>
                     </div>
                     <div class="clearfix"></div>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-md-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
               <div class="tm-sc-icon-box icon-box text-center iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate-y mb-sm-30">
                  <div class="icon-box-wrapper">
                     <div class="icon-wrapper mb-20">
                        <a class="icon icon-xl icon-dark icon-circled bg-theme-colored2">
                        <i class="fas fa-graduation-cap text-white"></i>
                        </a>
                     </div>
                     <div class="icon-text">
                        <h4 class="icon-box-title">Fully Equiped</h4>
                     </div>
                     <div class="clearfix"></div>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-md-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
               <div class="tm-sc-icon-box icon-box text-center iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate-y mb-sm-30">
                  <div class="icon-box-wrapper">
                     <div class="icon-wrapper mb-20">
                        <a class="icon icon-xl icon-dark icon-circled bg-theme-colored3">
                        <i class="far fa-smile text-white"></i>
                        </a>
                     </div>
                     <div class="icon-text">
                        <h4 class="icon-box-title">Funny and Happy</h4>
                     </div>
                     <div class="clearfix"></div>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-md-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.7s">
               <div class="tm-sc-icon-box icon-box text-center iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate-y mb-sm-30">
                  <div class="icon-box-wrapper">
                     <div class="icon-wrapper mb-20">
                        <a class="icon icon-xl icon-dark icon-circled bg-theme-colored4">
                        <i class="fas fa-heart text-white"></i>
                        </a>
                     </div>
                     <div class="icon-text">
                        <h4 class="icon-box-title">Fulfill With Love</h4>
                     </div>
                     <div class="clearfix"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section id="about">
   <div class="container" data-tm-padding-bottom="220px">
      <div class="section-content">
         <div class="row">
            <div class="col-lg-7 col-xl-5 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.1s">
               <div class="about-text-content mb-md-30">
                  <h3 class="text-theme-colored2 line-bottom">Welcome To <span class="text-theme-colored3"><?=$generalSetting->site_name?></span></h3>
                  <!-- <h5 class="text-theme-colored4">Lorem ipsum dolor sit amet soluta saepe odit error, maxime praesentium sunt udiandae!</h5> -->
                  <p><?=(($about)?$about->page_content:'')?></p>
                  <!-- <a href="#" class="btn btn-sm btn-flat btn-theme-colored2 btn-outline-light mt-15 mr-15">Read More</a>
                  <a href="#" class="btn btn-sm btn-flat btn-theme-colored1 btn-outline-light mt-15">Get a Quote</a> -->
               </div>
            </div>
            <div class="col-lg-5 col-xl-5 offset-xl-1 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.1s">
               <div class="video-popup">
                  <a>
                  <img alt src="<?=env('FRONT_ASSETS_URL')?>images/about/6.png" class="img-fullwidth">
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- <div class="tm-floating-objects">
      <span class="z-index-1 bg-img-cover" data-tm-bg-img="<?=env('FRONT_ASSETS_URL')?>images/bg/f2.png" data-tm-width="100%" data-tm-height="143" data-tm-top="auto" data-tm-bottom="0" data-tm-left="0" data-tm-right="0" data-tm-opacity="-100px"></span>
   </div> -->
</section>
<section id="features" class="bg-img-cover bg-img-center" data-tm-bg-img="<?=env('FRONT_ASSETS_URL')?>images/bg/p2.jpg">
   <div class="container">
      <div class="section-title">
         <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-6">
               <div class="tm-sc-section-title section-title text-center">
                  <div class="title-wrapper">
                     <h2 class="title">Our <span class="text-theme-colored3">Features</span></h2>
                     <p>There are many variations of passages. But the majority have suffered alteration in some form, by injected humour, or randomised words.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="section-content">
         <div class="row">
            <div class="col-lg-4 col-xl-4">
               <div class="tm-sc-icon-box icon-box icon-right text-center text-lg-end iconbox-centered-in-responsive iconbox-theme-colored3 animate-icon-on-hover animate-icon-rotate-y mb-30 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.1s">
                  <div class="icon-box-wrapper">
                     <div class="icon-wrapper"> <a class="icon icon-lg icon-dark icon-circled"> <i class="far fa-edit"></i> </a></div>
                     <div class="icon-text">
                        <h5 class="icon-box-title mb-0 text-theme-colored4">Active Learning</h5>
                        <div class="content">
                           <p>Kidspro is a creative skill and a joy beyond anything found dolor.</p>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                  </div>
               </div>
               <div class="tm-sc-icon-box icon-box icon-right text-center text-lg-end iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate-y mb-30 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                  <div class="icon-box-wrapper">
                     <div class="icon-wrapper"> <a class="icon icon-lg icon-dark icon-circled"> <i class="fas fa-book"></i> </a></div>
                     <div class="icon-text">
                        <h5 class="icon-box-title mb-0 text-theme-colored2">Multimedia Class</h5>
                        <div class="content">
                           <p>Kidspro is a creative skill and a joy beyond anything found dolor.</p>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                  </div>
               </div>
               <div class="tm-sc-icon-box icon-box icon-right text-center text-lg-end iconbox-centered-in-responsive iconbox-theme-colored4 animate-icon-on-hover animate-icon-rotate-y mb-md-30 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                  <div class="icon-box-wrapper">
                     <div class="icon-wrapper"> <a class="icon icon-lg icon-dark icon-circled"> <i class="fas fa-graduation-cap"></i> </a></div>
                     <div class="icon-text">
                        <h5 class="icon-box-title mb-0 text-theme-colored3">Full Day Programs</h5>
                        <div class="content">
                           <p>Kidspro is a creative skill and a joy beyond anything found dolor.</p>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-xl-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
               <div class="feature-img-content text-center">
                  <img src="<?=env('FRONT_ASSETS_URL')?>images/about/a1.png" alt="a1.png">
               </div>
            </div>
            <div class="col-lg-4 col-xl-4">
               <div class="tm-sc-icon-box icon-box icon-left text-center text-lg-start iconbox-centered-in-responsive iconbox-theme-colored3 animate-icon-on-hover animate-icon-rotate-y mb-30 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.1s">
                  <div class="icon-box-wrapper">
                     <div class="icon-wrapper"> <a class="icon icon-lg icon-dark icon-circled"> <i class="fas fa-user-graduate"></i> </a></div>
                     <div class="icon-text">
                        <h5 class="icon-box-title mb-0 text-theme-colored4">Expert Teachers</h5>
                        <div class="content">
                           <p>Kidspro is a creative skill and a joy beyond anything found dolor.</p>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                  </div>
               </div>
               <div class="tm-sc-icon-box icon-box icon-left text-center text-lg-start iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate-y mb-30 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                  <div class="icon-box-wrapper">
                     <div class="icon-wrapper"> <a class="icon icon-lg icon-dark icon-circled"> <i class="far fa-smile"></i> </a></div>
                     <div class="icon-text">
                        <h5 class="icon-box-title mb-0 text-theme-colored2">Funny and Happy</h5>
                        <div class="content">
                           <p>Kidspro is a creative skill and a joy beyond anything found dolor.</p>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                  </div>
               </div>
               <div class="tm-sc-icon-box icon-box icon-left text-center text-lg-start iconbox-centered-in-responsive iconbox-theme-colored2 animate-icon-on-hover animate-icon-rotate-y wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                  <div class="icon-box-wrapper">
                     <div class="icon-wrapper"> <a class="icon icon-lg icon-dark icon-circled"> <i class="fab fa-gratipay"></i> </a></div>
                     <div class="icon-text">
                        <h5 class="icon-box-title mb-0 text-theme-colored3">Fulfill With Love</h5>
                        <div class="content">
                           <p>Kidspro is a creative skill and a joy beyond anything found dolor.</p>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="divider bg-img-cover bg-img-center layer-overlay overlay-theme-colored4-7" data-tm-bg-img="<?=env('FRONT_ASSETS_URL')?>images/bg/p2.jpg">
   <div class="container pt-90 pb-90">
      <div class="row">
         <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
            <div class="funfact-item text-center mb-md-30">
               <div class="icon"><span class="fas fa-user-friends"></span></div>
               <div>
                  <h2 class="counter">
                     <span data-animation-duration="2000" data-value="<?=$generalSetting->teachers?>" class="animate-number">0</span>
                  </h2>
                  <h5 class="title">Professional Teachers</h5>
               </div>
            </div>
         </div>
         <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="funfact-item text-center mb-md-30">
               <div class="icon"><span class="fas fa-graduation-cap"></span></div>
               <div>
                  <h2 class="counter">
                     <span data-animation-duration="2000" data-value="<?=$generalSetting->kids?>" class="animate-number">0</span>
                  </h2>
                  <h5 class="title">Growing Kids</h5>
               </div>
            </div>
         </div>
         <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
            <div class="funfact-item text-center mb-sm-30">
               <div class="icon"><span class="far fa-smile"></span></div>
               <div>
                  <h2 class="counter">
                     <span data-animation-duration="2000" data-value="<?=$generalSetting->parents?>" class="animate-number">0</span>
                  </h2>
                  <h5 class="title">Happy Parents</h5>
               </div>
            </div>
         </div>
         <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.7s">
            <div class="funfact-item text-center">
               <div class="icon"><span class="fas fa-medal"></span></div>
               <div>
                  <h2 class="counter">
                     <span data-animation-duration="2000" data-value="<?=$generalSetting->awards?>" class="animate-number">0</span>
                  </h2>
                  <h5 class="title">Won Awards</h5>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section id="courses" class="bg-img-cover bg-img-center" data-tm-bg-img="<?=env('FRONT_ASSETS_URL')?>images/bg/p2.jpg">
   <div class="container pb-90">
      <div class="section-title">
         <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-6">
               <div class="tm-sc-section-title section-title text-center">
                  <div class="title-wrapper">
                     <h2 class="title">Our <span class="text-theme-colored3">Centers</span></h2>
                     <p>There are many variations of passages. But the majority have suffered alteration in some form, by injected humour, or randomised words.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="section-content">
         <div class="row">
            <div class="col-lg-12">
               <div class="course-carousel owl-nav-outer">
                  <div class="owl-carousel owl-theme tm-owl-carousel-3col" data-nav="true" data-autoplay="true" data-loop="true" data-duration="6000" data-smartspeed="300" data-margin="10" data-stagepadding="0">
                     <?php if($centers){ foreach ($centers as $center) {?>
                        <?php
                        $studentCount     = Student::where('status', '=', 1)->where('center_id', '=', $center->id)->count();
                        $centerSlotCount  = CenterTimeSlot::where('status', '=', 1)->where('center_id', '=', $center->id)->count();
                        ?>
                        <div class="tm-carousel-item">
                           <div class="course">
                              <div class="thumb">
                                 <img class="img-fullwidth" src="<?=env('UPLOADS_URL').'center/'.$center->photo?>" alt="<?=$center->name?>" style="width: 100%; height: 500px;">
                                 <div class="course-overlay"></div>
                              </div>
                              <div class="course-details clearfix p-20 pt-15">
                                 <h5 class="price-tag"><i class="fa fa-mobile"></i> <a href="tel:<?=$center->phone?>"><?=$center->phone?></a></h5>
                                 <h4 class="mt-0 mb-0"><a class="text-theme-colored3" href="#"><?=$center->name?></a></h4>
                                 <ul class="review_text">
                                    <li class="list-inline-item">
                                       <div class="star-rating" title="Rated 5.00 out of 5"><span data-width="100%">5.00</span></div>
                                    </li>
                                 </ul>
                                 <p class="mb-10"><?=$center->address . ' ' . $center->locality . ' ' . $center->pincode?></p>
                                 <div class="course-details-bottom mt-15">
                                    <ul>
                                       <li class="list-inline-item">Capacity <br><?=$studentCount?> kids</li>
                                       <li class="list-inline-item">Timeslots <br><?=$centerSlotCount?> slots</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     <?php } }?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section id="gallery" data-tm-bg-color="#f9f9f9">
   <div class="container pb-90">
      <div class="section-title">
         <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-6">
               <div class="tm-sc-section-title section-title text-center">
                  <div class="title-wrapper">
                     <h2 class="title">Our <span class="text-theme-colored3">Gallery</span></h2>
                     <p>There are many variations of passages. But the majority have suffered alteration in some form, by injected humour, or randomised words.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="section-conent">
         <div class="row">
            <?php if($galleries){ foreach ($galleries as $gallery) {?>
               <div class="col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                  <div class="gallery-block">
                     <div class="gallery-thumb">
                        <img alt="gallery" src="<?=env('UPLOADS_URL').'gallery/'.$gallery->gallery_image?>" class="img-fullwidth" style="width: 100%; height:500px;">
                     </div>
                     <div class="overlay-shade red"></div>
                     <div class="icons-holder">
                        <div class="icons-holder-inner">
                           <div class="gallery-icon">
                              <a href="<?=env('UPLOADS_URL').'gallery/'.$gallery->gallery_image?>" data-lightbox-gallery="gallery"><i class="pe-7s-science"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            <?php } }?>
         </div>
      </div>
   </div>
</section>
<section id="team" class="bg-img-cover bg-img-center" data-tm-bg-img="<?=env('FRONT_ASSETS_URL')?>images/bg/p2.jpg">
   <div class="container pb-90">
      <div class="section-title">
         <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-6">
               <div class="tm-sc-section-title section-title text-center">
                  <div class="title-wrapper">
                     <h2 class="title">Our <span class="text-theme-colored3">Teachers</span></h2>
                     <p>There are many variations of passages. But the majority have suffered alteration in some form, by injected humour, or randomised words.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="section-content">
         <div class="row">
            <?php if($teachers){ foreach ($teachers as $teacher) {?>
               <div class="col-sm-6 col-xl-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                  <div class="team-member">
                     <div class="team-thumb">
                        <img class="img-fullwidth" src="<?=env('UPLOADS_URL').'teacher/'.$teacher->photo?>" alt="<?=$teacher->name?>" style="width: 100%; height:300px;">
                     </div>
                     <div class="team-details text-center bg-theme-colored1">
                        <div class="member-biography">
                           <h3 class="mt-0 text-white mb-0"><?=$teacher->name?></h3>
                           <p class="mb-0 text-white">From : <?=date_format(date_create($teacher->member_since), "M d, Y")?></p>
                        </div>
                        <!-- <ul class="styled-icons icon-dark icon-md icon-theme-colored3 icon-circled pt-3">
                           <li><a href="#"><i class="fab fa-facebook text-white"></i></a></li>
                           <li><a href="#"><i class="fab fa-twitter text-white"></i></a></li>
                           <li><a href="#"><i class="fab fa-dribbble text-white"></i></a></li>
                           <li><a href="#"><i class="fab fa-instagram text-white"></i></a></li>
                        </ul> -->
                     </div>
                  </div>
               </div>
            <?php } }?>
         </div>
      </div>
   </div>
</section>
<section>
   <div class="container" data-tm-padding-bottom="250px">
      <div class="row">
         <div class="col-lg-6 col-xl-5 m-lg-auto">
            <div class="whychose-thumb">
               <img class="img-fullwidth" src="<?=env('FRONT_ASSETS_URL')?>images/photos/3.png" alt="WhyChoseImage">
            </div>
         </div>
         <div class="col-xl-7 pl-50">
            <h2 class="title line-bottom mb-20 mt-0">Why <span class="text-theme-color-red">Choose Us</span> ?</h2>
            <p class="mb-50"><?=(($whychooseus)?$whychooseus->page_content:'')?></p>
            <!-- <div class="row">
               <div class="col-sm-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                  <div class="icon-box text-center">
                     <a href="#" class="icon bg-theme-colored3 icon-circled icon-border-effect effect-circle icon-md">
                     <i class="fas fa-bell text-white"></i>
                     </a>
                     <h5 class="icon-box-title mt-15 mb-0 letter-space-1 text-uppercase">Responsive</h5>
                  </div>
               </div>
               <div class="col-sm-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                  <div class="icon-box text-center">
                     <a href="#" class="icon bg-theme-colored2 icon-circled icon-border-effect effect-circle icon-md">
                     <i class="fas fa-pencil-alt text-white"></i>
                     </a>
                     <h5 class="icon-box-title mt-15 mb-0 letter-space-1 text-uppercase">Validation</h5>
                  </div>
               </div>
               <div class="col-sm-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                  <div class="icon-box text-center">
                     <a href="#" class="icon bg-theme-colored4 icon-circled icon-border-effect effect-circle icon-md">
                     <i class="fas fa-certificate text-white"></i>
                     </a>
                     <h5 class="icon-box-title mt-15 mb-0 letter-space-1 text-uppercase">Certification</h5>
                  </div>
               </div>
            </div> -->
         </div>
      </div>
   </div>
   <div class="tm-floating-objects">
      <span class="z-index-1 bg-img-cover" data-tm-bg-img="<?=env('FRONT_ASSETS_URL')?>images/bg/f2.png" data-tm-width="100%" data-tm-height="143" data-tm-top="auto" data-tm-bottom="0" data-tm-left="0" data-tm-right="0" data-tm-opacity="-100px"></span>
   </div>
</section>
<section id="testimonials" class="testimonials layer-overlay overlay-theme-colored4-7" data-tm-bg-img="<?=env('FRONT_ASSETS_URL')?>images/bg/b1.jpg">
   <div class="container">
      <div class="section-title">
         <div class="row justify-content-center">
            <div class="col-lg-8">
               <div class="tm-sc-section-title section-title text-center">
                  <div class="title-wrapper">
                     <h2 class="title">Happy <span class="text-theme-colored2">Parent's Say</span></h2>
                     <p data-tm-text-color="#fff">There are many variations of passages. But the majority have suffered alteration in some form, by injected humour, or randomised words.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="section-content">
         <div class="row">
            <div class="col-lg-12">
               <div class="owl-carousel owl-theme tm-owl-carousel-2col testimonial style2" data-autoplay="true" data-loop="true" data-duration="6000" data-smartspeed="300" data-margin="10" data-stagepadding="0">
                  <?php if($testimonials){ foreach ($testimonials as $testimonial) {?>
                     <div class="tm-carousel-item">
                        <div class="testimonial-wrapper">
                           <div class="content bg-theme-colored3 p-30 pb-40">
                              <p class="text-white"><?=$testimonial->review?></p>
                              <i class="fa fa-quote-right mt-10 text-white"></i>
                              <h4 class="author text-white mt-20 mb-0"><?=$testimonial->name?></h4>
                              <h6 class="title text-white mt-0 mb-15"><?=$testimonial->designation?></h6>
                              <div class="thumb mt-20"><img class="rounded-circle" alt src="<?=env('UPLOADS_URL').'testimonial/'.$testimonial->image?>"></div>
                           </div>
                        </div>
                     </div>
                  <?php } }?>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- <section id="news" class="our-blog">
   <div class="container">
      <div class="section-title">
         <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-6">
               <div class="tm-sc-section-title section-title text-center">
                  <div class="title-wrapper">
                     <h2 class="title">Contact <span class="text-theme-colored3">Us</span></h2>
                     <p>This is the place from where you can contact us via enquiry</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="section-content" data-tm-padding-bottom="450">
         <div class="row">
            
         </div>
      </div>
   </div>
   <div class="tm-floating-objects">
      <span class="z-index-0 bg-img-cover" data-tm-bg-img="<?=env('FRONT_ASSETS_URL')?>images/bg/f1.png" data-tm-width="100%" data-tm-height="550" data-tm-top="auto" data-tm-bottom="0" data-tm-left="0" data-tm-right="0" data-tm-opacity="-100px"></span>
   </div>
</section> -->
<section id="news" class="divider">
   <div class="container pt-100 pb-100">
      <div class="row pt-30">
         <div class="col-md-5 col-lg-4">
            <div class="icon-box icon-left iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate bg-white-f1 p-30 mb-30">
               <div class="icon-box-wrapper">
                  <div class="icon-wrapper">
                     <a class="icon icon-type-font-icon icon-dark icon-circled"> <i class="flaticon-contact-044-call-1"></i> </a>
                  </div>
                  <div class="icon-text">
                     <h5 class="icon-box-title mt-0">Phone</h5>
                     <div class="content"><a href="tel:<?=$generalSetting->site_phone?>"><?=$generalSetting->site_phone?></a></div>
                  </div>
                  <div class="clearfix"></div>
               </div>
            </div>
            <div class="icon-box icon-left iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate bg-white-f1 p-30 mb-30">
               <div class="icon-box-wrapper">
                  <div class="icon-wrapper">
                     <a class="icon icon-type-font-icon icon-dark icon-circled"> <i class="flaticon-contact-043-email-1"></i> </a>
                  </div>
                  <div class="icon-text">
                     <h5 class="icon-box-title mt-0">Email</h5>
                     <div class="content"><a href="mailto:<?=$generalSetting->site_mail?>"><?=$generalSetting->site_mail?></a></div>
                  </div>
                  <div class="clearfix"></div>
               </div>
            </div>
            <div class="icon-box icon-left iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate bg-white-f1 p-30 mb-30">
               <div class="icon-box-wrapper">
                  <div class="icon-wrapper">
                     <a class="icon icon-type-font-icon icon-dark icon-circled"> <i class="flaticon-contact-025-world"></i> </a>
                  </div>
                  <div class="icon-text">
                     <h5 class="icon-box-title mt-0">Address</h5>
                     <div class="content"><?=$generalSetting->description?></div>
                  </div>
                  <div class="clearfix"></div>
               </div>
            </div>
         </div>
         <div class="col-md-7 col-lg-8">
            <h2 class="mt-0 mb-0">Interested in discussing?</h2>
            <p class="font-size-20">Active & Ready to use Contact Form!</p>
            <form action="<?=url('contact-us')?>" method="post">
               <?php echo csrf_field(); ?>
               <div class="row">
                  <div class="col-lg-6">
                     <div class="mb-3">
                        <label>Name <small>*</small></label>
                        <input name="name" class="form-control" type="text" placeholder="Enter Name">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="mb-3">
                        <label>Email <small>*</small></label>
                        <input name="email" class="form-control required email" type="email" placeholder="Enter Email">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-6">
                     <div class="mb-3">
                        <label>Subject <small>*</small></label>
                        <input name="subject" class="form-control required" type="text" placeholder="Enter Subject">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="mb-3">
                        <label>Phone</label>
                        <input name="phone" class="form-control" type="text" placeholder="Enter Phone">
                     </div>
                  </div>
               </div>
               <div class="mb-3">
                  <label>Message</label>
                  <textarea name="description" class="form-control required" rows="7" placeholder="Enter Message"></textarea>
               </div>
               <div class="mb-3">
                  <button type="submit" class="btn btn-theme-colored1 text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px" data-loading-text="Please wait...">Send your message</button>
                  <button type="reset" class="btn btn-theme-colored3 text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px">Reset</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</section><?php /**PATH G:\xampp8.2\htdocs\kids-zone\resources\views/front/pages/home.blade.php ENDPATH**/ ?>