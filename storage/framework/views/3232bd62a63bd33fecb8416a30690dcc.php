<div class="header-top" style="background-color: #043467;">
   <div class="container">
      <div class="row">
         <div class="col-xl-auto header-top-left align-self-center text-center text-xl-start">
            <ul class="element contact-info">
               <li class="contact-phone"><i class="fa fa-phone font-icon sm-display-block"></i> Tel: <?=$generalSetting->site_phone?></li>
               <li class="contact-email"><i class="fa fa-envelope font-icon sm-display-block"></i> <a href="mailto:<?=$generalSetting->site_mail?>"><?=$generalSetting->site_mail?></a></li>
               <li class="contact-address"><i class="fa fa-map font-icon sm-display-block"></i> <?=$generalSetting->description?></li>
            </ul>
         </div>
         <div class="col-xl-auto ms-xl-auto header-top-right align-self-center text-center text-xl-end">
            <div class="element pt-0 pb-0">
               <ul class="styled-icons icon-dark icon-theme-colored1 icon-circled clearfix">
                  <li><a class="social-link" href="<?=$generalSetting->facebook_profile?>"><i class="fab fa-facebook"></i></a></li>
                  <li><a class="social-link" href="<?=$generalSetting->twitter_profile?>"><i class="fab fa-twitter"></i></a></li>
                  <li><a class="social-link" href="<?=$generalSetting->youtube_profile?>"><i class="fab fa-youtube"></i></a></li>
               </ul>
            </div>
            <div class="element pt-0 pt-lg-10 pb-0">
               <!-- <a href="ajax-load/form-appointment.html" class="btn btn-theme-colored2 btn-sm ajaxload-popup">Make an Appointment</a> -->
            </div>
         </div>
      </div>
   </div>
</div>
<div class="header-nav tm-enable-navbar-hide-on-scroll">
   <div class="header-nav-wrapper navbar-scrolltofixed">
      <div class="menuzord-container header-nav-container">
         <div class="container position-relative">
            <div class="row header-nav-col-row">
               <div class="col-sm-auto align-self-center">
                  <a class="menuzord-brand site-brand" href="<?=url('/')?>">
                  <img class="logo-default logo-1x" src="<?=env('UPLOADS_URL').$generalSetting->site_logo?>" alt="<?=$generalSetting->site_name?>">
                  <img class="logo-default logo-2x retina" src="<?=env('UPLOADS_URL').$generalSetting->site_logo?>" alt="<?=$generalSetting->site_name?>">
                  </a>
               </div>
               <div class="col-sm-auto ms-auto pr-0 align-self-center">
                  <nav id="top-primary-nav" class="menuzord theme-color1" data-effect="fade" data-animation="none" data-align="right">
                     <ul id="main-nav" class="menuzord-menu onepage-nav">
                        <li class="active"><a href="#home">Home</a> </li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#courses">Centers</a></li>
                        <li><a href="#gallery">Gallery</a></li>
                        <li><a href="#team">Teachers</a></li>
                        <li><a href="#testimonials">Testimonials</a></li>
                        <li><a href="#news">Contact</a></li>
                     </ul>
                  </nav>
               </div>
               <!-- <div class="col-sm-auto align-self-center nav-side-icon-parent">
                  <ul class="list-inline nav-side-icon-list">
                     <li class="hidden-mobile-mode"><a href="#" id="top-nav-search-btn"><i class="search-icon fa fa-search"></i></a></li>
                     <li class="hidden-mobile-mode">
                        <div class="top-nav-mini-cart-icon-container">
                           <div class="top-nav-mini-cart-icon-contents">
                              <a class="mini-cart-icon" href="shop-cart.html" title="View your shopping cart">
                              <img src="<?=env('FRONT_ASSETS_URL')?>images/shopping-cart.png" width="25" alt="cart"><span class="items-count">1</span> <span class="cart-quick-info">1 item - <span class="amount"><span class="currencySymbol">&pound;</span>18.00</span></span>
                              </a>
                              <div class="dropdown-content">
                                 <ul class="cart_list product_list_widget">
                                    <li class="mini_cart_item">
                                       <a href="#" class="remove remove_from_cart_button" aria-label="Remove this item" data-product_id="18832" data-cart_item_key="#" data-product_sku="woo-beanie">&times;</a>
                                       <a href="#"> <img class="attachment-thumbnail" src="<?=env('FRONT_ASSETS_URL')?>images/shop/product.jpg" width="300" height="300" alt />Beanie</a>
                                       <span class="quantity">1 &times; <span class="amount">
                                       <span class="currencySymbol">&pound;</span>18.00</span></span>
                                    </li>
                                 </ul>
                                 <p class="total"> <strong>Subtotal:</strong> <span class="woocommerce-Price-amount amount"><span class="currencySymbol">&pound;</span>18.00</span> </p>
                                 <div class="buttons cart-action-buttons">
                                    <div class="row">
                                       <div class="col-6 pe-0"><a href="shop-cart.html" class="btn btn-theme-colored2 btn-block btn-sm wc-forward">View Cart</a></div>
                                       <div class="col-6 ps-1"><a href="shop-checkout.html" class="btn btn-theme-colored1 btn-block btn-sm checkout wc-forward">Checkout</a></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li class="hidden-mobile-mode">
                        <div id="side-panel-trigger" class="side-panel-trigger">
                           <a href="#">
                              <div class="hamburger-box">
                                 <div class="hamburger-inner"></div>
                              </div>
                           </a>
                        </div>
                     </li>
                  </ul>
                  <div id="top-nav-search-form" class="clearfix">
                     <form action="#" method="GET">
                        <input type="text" name="s" value placeholder="Type and Press Enter..." autocomplete="off" />
                     </form>
                     <a href="#" id="close-search-btn"><i class="fa fa-times"></i></a>
                  </div>
               </div> -->
            </div>
            <!-- <div class="row d-block d-xl-none">
               <div class="col-12">
                  <nav id="top-primary-nav-clone" class="menuzord d-block d-xl-none default menuzord-color-default menuzord-border-boxed menuzord-responsive" data-effect="slide" data-animation="none" data-align="right">
                     <ul id="main-nav-clone" class="menuzord-menu menuzord-right menuzord-indented scrollable"></ul>
                  </nav>
               </div>
            </div> -->
         </div>
      </div>
   </div>
</div><?php /**PATH G:\xampp8.2\htdocs\kids-zone\resources\views/front/elements/beforeheader.blade.php ENDPATH**/ ?>