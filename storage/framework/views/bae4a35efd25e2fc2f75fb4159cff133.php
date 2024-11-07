<footer>
    <div class="footer-border"></div>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-3 col-md-6">
                <div class="footer-left-box">
                    <img src="<?=env('UPLOADS_URL').$generalSetting->site_footer_logo?>" alt="<?=$generalSetting->site_name?>" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-address-box footer-box">
                    <h2>ADDRESS</h2>
                    <div class=""> 
                        <ul>
                            <li><a href="javascript:void(0);"><i class="fa-solid fa-map-marker-alt"></i> <?=$generalSetting->description?></a></li>
                            <li><a href="<?=$generalSetting->site_url?>" target="_blank"><i class="fa-solid fa-bell"></i> <?=$generalSetting->site_url?></a></li>
                            <li><a href="mailto:<?=$generalSetting->site_mail?>"><i class="fa-solid fa-envelope"></i> <?=$generalSetting->site_mail?></a></li>
                            <!--<li><a href="tel:<?=$generalSetting->site_phone?>"><i class="fa-solid fa-phone"></i> <?=$generalSetting->site_phone?></a></li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copy-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="copy-left">
                    <p class="text-center text-md-start">All right reserved: <?=$generalSetting->site_name?> &copy; <?=date('Y')?></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="copy-right">
                    <p class="text-center text-md-end mt-md-0 mt-2">Design & Developed by <a href="https://www.keylines.net" target="_blank">Keyline</a></p>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/keyline1/public_html/ecosymbiont.keylines.net.in/resources/views/front/elements/beforefooter.blade.php ENDPATH**/ ?>