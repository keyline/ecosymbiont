<div class="banner">
    <div class="banner-slider" id="bannerslider">
        <?php if($banners){ foreach($banners as $row){?>
        <div class="item">
            <div class="row">
                <div class="col-md-6">
                    <div class="banner-content">
                        <h2><span><?=$row->heading1?></span>
                            <?=$row->heading2?>
                        </h2>
                        <h5><?=$row->banner_text?></h5>
                        <p><?=$row->banner_text2?></p>
                        <a href="<?=url('get-a-free-rental-analysis')?>">Get a Free Quote</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="banner-img">
                        <img src="<?=env('UPLOADS_URL').'banner/'.$row->banner_image?>" alt="<?=$row->banner_text?>">
                    </div>
                </div>
            </div>
        </div>
        <?php } }?>
    </div>
</div>
<div class="category-section">
    <div class="container">
        <div class="category-inner">
            <div class="row">
                <?php if($section2){ foreach($section2 as $row){?>
                <div class="col-lg-3 col-md-3 col-6">
                    <div class="category-box">
                        <a href="<?=$row->link?>" target="_blank">
                            <img src="<?=env('UPLOADS_URL').'home_page/'.$row->icon?>">
                            <h5><?=$row->name?></h5>
                        </a>
                    </div>
                </div>
                <?php } }?>
            </div>
        </div>
    </div>
</div>
<div class="about-sec">
    <div class="container">
        <div class="page-title">
            <h2><img src="<?=env('FRONT_ASSETS_URL')?>assets/img/title-icon.png"> Welcome to
                <span><?=$generalSetting->site_name?></span>
            </h2>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="about-left">
                    <img src="<?=env('UPLOADS_URL').'home_page/'.$content->sec3_image?>">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="about-right">
                    <h3><?=$content->sec3_title?></span></h3>
                    <p><?=$content->sec3_short_description?></p>
                    <a href="<?=$content->sec3_link?>" class="theme-btn">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <img src="<?=env('FRONT_ASSETS_URL')?>assets/img/texture-left.png" class="left-img">
    <img src="<?=env('FRONT_ASSETS_URL')?>assets/img/texture-right.png" class="right-img">
</div>
<div class="property-management">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-7">
                <div class="property-management-content">
                    <div class="page-title">
                        <h2><img src="<?=env('FRONT_ASSETS_URL')?>assets/img/title-icon.png"> Welcome to
                            <span><?=$generalSetting->site_name?></span>
                        </h2>
                    </div>
                    <h5><?=$content->sec4_title1?></h5>
                    <h3><?=$content->sec4_title2?></h3>
                    <p><?=$content->sec4_description?></p>
                    <ul>
                        <li>
                            <a href="<?=$content->sec4_link1_url?>" class="theme-btn"><?=$content->sec4_link1_name?></a>
                        </li>
                        <li>
                            <a href="<?=$content->sec4_link2_url?>" class="theme-btn"><?=$content->sec4_link2_name?></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-5">
                <div class="property-management-img">
                    <img src="<?=env('FRONT_ASSETS_URL')?>assets/img/property-img.png">
                    <img src="<?=env('FRONT_ASSETS_URL')?>assets/img/p-cloude-1.png" class="p-cloude-1">
                    <img src="<?=env('FRONT_ASSETS_URL')?>assets/img/p-cloude-2.png" class="p-cloude-2">
                </div>
            </div>
        </div>
    </div>
    <img src="<?=env('FRONT_ASSETS_URL')?>assets/img/property-shape.png" class="p-shape">
</div>
<div class="our-services">
    <div class="container">
        <?php if($section5){ $i=1; foreach($section5 as $row){?>
        <?php
            $parts = explode(' ', $row->name);
            ?>
        <?php if($i % 2 != 0){?>
        <div class="row order-row">
            <div class="col-lg-6 col-md-6">
                <div class="our-services-content">
                    <div class="page-title">
                        <h2><img src="<?=env('FRONT_ASSETS_URL')?>assets/img/title-icon.png"> <?=$parts[0]?>
                            <span><?=$parts[1]?></span>
                        </h2>
                    </div>
                    <p><?=$row->short_description?></p>
                    <a href="#" class="theme-btn">read more</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="our-services-img">
                    <img src="<?=env('UPLOADS_URL').'home_page/'.$row->icon?>">
                </div>
            </div>
        </div>
        <?php } else {?>
        <div class="row order-row">
            <div class="col-lg-6 col-md-6">
                <div class="our-services-content">
                    <div class="page-title">
                        <h2><img src="<?=env('FRONT_ASSETS_URL')?>assets/img/title-icon.png"> <?=$parts[0]?>
                            <span><?=$parts[1]?></span>
                        </h2>
                    </div>
                    <p><?=$row->short_description?></p>
                    <a href="#" class="theme-btn">read more</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="our-services-img">
                    <img src="<?=env('UPLOADS_URL').'home_page/'.$row->icon?>">
                </div>
            </div>
        </div>
        <?php }?>
        <?php $i++; } }?>
    </div>
    <img src="<?=env('FRONT_ASSETS_URL')?>assets/img/texture-left.png" class="left-img">
    <img src="<?=env('FRONT_ASSETS_URL')?>assets/img/texture-right.png" class="right-img">
</div>
<div class="call-sec">
    <div class="container">
        <img src="<?=env('UPLOADS_URL').$generalSetting->site_footer_logo?>">
        <h3><?=$content->sec6_title?></h3>
        <h2>Call Us: <?=$content->sec6_call_us?></h2>
    </div>
</div>
<div class="review-sec">
    <div class="container">
        <div class="page-title">
            <h2><img src="<?=env('FRONT_ASSETS_URL')?>assets/img/title-icon.png"> top <span>reviews</span> </h2>
        </div>
        <div class="review-slider" id="r-slider">
            <?php if($testimonials){ foreach($testimonials as $row){?>
            <div class="item">
                <div class="review-box">
                    <div class="review-box-top">
                        <div class="review-box-top-img">
                            <img src="<?=env('UPLOADS_URL').'testimonial/'.$row->image?>">
                        </div>
                        <div class="review-box-top-content">
                            <h3><?=$row->name?></h3>
                            <h5><?=$row->designation?>, <?=$row->company_name?></h5>
                            <?php for($a=1;$a<=$row->rate;$a++){?>
                            <i class="fa-solid fa-star"></i>
                            <?php }?>
                            <?php for($a=1;$a<=(5 - $row->rate);$a++){?>
                            <i class="fa-solid fa-star disable"></i>
                            <?php }?>
                        </div>
                    </div>
                    <p><?=$row->review?></p>
                </div>
            </div>
            <?php } }?>
        </div>
    </div>
</div><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/pages/home.blade.php ENDPATH**/ ?>