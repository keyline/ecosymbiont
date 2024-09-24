<!DOCTYPE html>
<html dir="ltr" lang="en">
   <head>
      <?=$before_head?>
   </head>
   <body class="tm-container-1230px">
      <div class="side-panel-body-overlay"></div>
      <div id="side-panel-container" class="dark" data-tm-bg-img="images/side-push-bg.jpg">
         <div class="side-panel-wrap">
            <div id="side-panel-trigger-close" class="side-panel-trigger"><a href="#"><i class="fa fa-times side-panel-trigger-icon"></i></a></div>
            <img class="logo mb-50" src="images/logo-wide.png" alt="Logo">
            <p>Lorem ipsum is simply free text dolor sit am adipi we help you ensure everyone is in the right jobs sicing elit, sed do consulting firms Et leggings across the nation tempor.</p>
            <div class="widget">
               <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Latest News</h4>
               <div class="latest-posts">
                  <article class="post clearfix pb-0 mb-10">
                     <a class="post-thumb" href="news-details.html"><img src="images/blog/s1.jpg" alt="images"></a>
                     <div class="post-right">
                        <h5 class="post-title mt--0"><a href="news-details.html">Sustainable Construction</a></h5>
                        <p>Lorem ipsum dolor...</p>
                     </div>
                  </article>
                  <article class="post clearfix pb-0 mb-10">
                     <a class="post-thumb" href="news-details.html"><img src="images/blog/s2.jpg" alt="images"></a>
                     <div class="post-right">
                        <h5 class="post-title mt--0"><a href="news-details.html">Industrial Coatings</a></h5>
                        <p>Lorem ipsum dolor...</p>
                     </div>
                  </article>
                  <article class="post clearfix pb-0 mb-10">
                     <a class="post-thumb" href="news-details.html"><img src="images/blog/s3.jpg" alt="images"></a>
                     <div class="post-right">
                        <h5 class="post-title mt--0"><a href="news-details.html">Storefront Installations</a></h5>
                        <p>Lorem ipsum dolor...</p>
                     </div>
                  </article>
               </div>
            </div>
            <div class="widget">
               <h5 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Contact Info</h5>
               <div class="tm-widget-contact-info contact-info-style1 contact-icon-theme-colored1">
                  <ul>
                     <li class="contact-name">
                        <div class="icon"><i class="flaticon-contact-037-address"></i></div>
                        <div class="text">John Doe</div>
                     </li>
                     <li class="contact-phone">
                        <div class="icon"><i class="flaticon-contact-042-phone-1"></i></div>
                        <div class="text"><a href="tel:+510-455-6735">+510-455-6735</a></div>
                     </li>
                     <li class="contact-email">
                        <div class="icon"><i class="flaticon-contact-043-email-1"></i></div>
                        <div class="text"><a href="https://html.kodesolution.com/cdn-cgi/l/email-protection#61080f070e21180e1413050e0c00080f4f020e0c"><span class="__cf_email__" data-cfemail="e78e898188a79e88929583888a868e89c984888a">[email&#160;protected]</span></a></div>
                     </li>
                     <li class="contact-address">
                        <div class="icon"><i class="flaticon-contact-047-location"></i></div>
                        <div class="text">3982 Browning Lane Carolyns Circle, California</div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <div id="wrapper" class="clearfix">
         <header id="header" class="header header-layout-type-header-2rows">
            <?=$before_header?>
         </header>
         <div class="main-content-area">
            <?=$maincontent?>
         </div>
         <footer id="footer" class="footer divider layer-overlay overlay-dark-8" data-tm-bg-img="images/bg/bg8.jpg">
            <?=$before_footer?>
         </footer>
         <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
      </div>
      <script src="<?=env('FRONT_ASSETS_URL')?>js/custom.js"></script>
         <?php if(session('success_message')): ?>
        <script>
             $(function(){
                 Swal.fire({
                     title: 'Success!',
                     text: '<?=session('success_message')?>',
                     icon: 'success',
                     confirmButtonText: 'Ok'
                 });
             });
         </script>
      <?php endif; ?>
      <?php if(session('error_message')): ?>
           <script>
             $(function(){
                 Swal.fire({
                     title: 'Error!',
                     text: '<?=session('error_message')?>',
                     icon: 'error',
                     confirmButtonText: 'Ok'
                 });
             });
         </script>
      <?php endif; ?>
   </body>
</html><?php /**PATH G:\xampp8.2\htdocs\kids-zone\resources\views/front/layout-before-login.blade.php ENDPATH**/ ?>