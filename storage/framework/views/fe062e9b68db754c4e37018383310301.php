<div class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h3>Quick Links</h3>
                    <ul class="links-list">
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
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h3>Services</h3>
                    <ul class="links-list">
                        <?php
                        $footer_link_name2 = json_decode($generalSetting->footer_link_name2);
                        $footer_link2 = json_decode($generalSetting->footer_link2);
                        if(!empty($footer_link_name2)){ for($k=0;$k<count($footer_link_name2);$k++){
                        ?>
                            <li>
                                <a href="<?=$footer_link2[$k]?>"><?=$footer_link_name2[$k]?></a>
                            </li>
                        <?php } }?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h3>Useful Links</h3>
                    <ul class="links-list">
                        <?php
                        $footer_link_name3 = json_decode($generalSetting->footer_link_name3);
                        $footer_link3 = json_decode($generalSetting->footer_link3);
                        if(!empty($footer_link_name3)){ for($k=0;$k<count($footer_link_name3);$k++){
                        ?>
                            <li>
                                <a href="<?=$footer_link3[$k]?>"><?=$footer_link_name3[$k]?></a>
                            </li>
                        <?php } }?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <div class="footer-logo">
                        <a href="<?=url('/')?>">
                        <img src="<?=env('UPLOADS_URL').$generalSetting->site_footer_logo?>" alt="<?=$generalSetting->site_name?>">
                        </a>
                    </div>
                    <p><?=$generalSetting->copyright_statement?></p>
                </div>
            </div>
        </div>
        <div class="social-icons">
            <ul class="footer-social">
                <li><a href="<?=$generalSetting->facebook_profile?>"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li><a href="<?=$generalSetting->twitter_profile?>"><i class="fa-brands fa-twitter"></i></a></li>
                <li><a href="<?=$generalSetting->linkedin_profile?>"><i class="fa-brands fa-linkedin-in"></i></a></li>
            </ul>
        </div>
        <div class="address-bar">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="address-bar-box">
                        <span>
                        <img src="<?=env('FRONT_ASSETS_URL')?>assets/img/address-icon.png">
                        </span>
                        <h5>our Address</h5>
                        <a href="javascript:void(0)"><?=$generalSetting->description?></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="address-bar-box">
                        <span>
                        <img src="<?=env('FRONT_ASSETS_URL')?>assets/img/envelop-icon.png">
                        </span>
                        <h5>Email</h5>
                        <a href="mailto:<?=$generalSetting->site_mail?>"><?=$generalSetting->site_mail?></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="address-bar-box">
                        <span>
                        <img src="<?=env('FRONT_ASSETS_URL')?>assets/img/phone-icon.png">
                        </span>
                        <h5>Office/Bookings</h5>
                        <a href="tel:<?=$generalSetting->site_phone?>"><?=$generalSetting->site_phone?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right">
        <?=$generalSetting->footer_text?>
    </div>
</div><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/elements/beforefooter.blade.php ENDPATH**/ ?>