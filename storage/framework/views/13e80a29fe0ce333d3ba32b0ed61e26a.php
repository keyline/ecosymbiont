<?php
use Illuminate\Support\Facades\Route;;
$routeName    = Route::current();
$pageName     = explode("/", $routeName->uri());
$pageSegment  = $pageName[1];
$pageFunction = ((count($pageName)>2)?$pageName[2]:'');
// dd($routeName);
if(!empty($parameters)){
  if (array_key_exists("id1",$parameters)){
    $pId1 = Helper::decoded($parameters['id1']);
  } else {
    $pId1 = Helper::decoded($parameters['id']);
  }
  if(count($parameters) > 1){
    $pId2 = Helper::decoded($parameters['id2']);
  }
}
?>
<div class="navbar-vertical-container">
  <div class="navbar-vertical-footer-offset">
    <!-- Logo -->
    <a class="navbar-brand" href="<?=url('admin/dashboard')?>" aria-label="Front">
      <img class="navbar-brand-logo" src="<?=env('UPLOADS_URL').$generalSetting->site_logo?>" alt="<?=$generalSetting->site_name?>" data-hs-theme-appearance="default" style="margin: 0 auto;">
      <img class="navbar-brand-logo" src="<?=env('UPLOADS_URL').$generalSetting->site_logo?>" alt="<?=$generalSetting->site_name?>" data-hs-theme-appearance="dark" style="margin: 0 auto;">
      <img class="navbar-brand-logo-mini" src="<?=env('UPLOADS_URL').$generalSetting->site_logo?>" alt="<?=$generalSetting->site_name?>" data-hs-theme-appearance="default" style="margin: 0 auto;">
      <img class="navbar-brand-logo-mini" src="<?=env('UPLOADS_URL').$generalSetting->site_logo?>" alt="<?=$generalSetting->site_name?>" data-hs-theme-appearance="dark" style="margin: 0 auto;">
    </a>
    <!-- End Logo -->
    <!-- Navbar Vertical Toggle -->
    <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
      <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
      <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
    </button>
    <!-- End Navbar Vertical Toggle -->
    <!-- Content -->
    <div class="navbar-vertical-content">
      <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">
        <!-- dashboard -->
          <div class="nav-item">
            <a class="nav-link <?=(($pageSegment == 'dashboard')?'active':'')?>" href="<?=url('admin/dashboard')?>" data-placement="left">
              <i class="fa fa-home nav-icon"></i>
              <span class="nav-link-title">Dashboard</span>
            </a>
          </div>
        <!-- End dashboard -->
        <!-- masters -->
          <div class="nav-item">
            <a class="nav-link dropdown-toggle active <?=(($pageSegment == 'parent-category' || $pageSegment == 'sub-category' || $pageSegment == 'state' || $pageSegment == 'manufacturer' || $pageSegment == 'model' || $pageSegment == 'report-listing-reason')?'':'collapsed')?>" href="#navbarVerticalMenuMasters" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuMasters" aria-expanded="<?=(($pageSegment == 'parent-category' || $pageSegment == 'sub-category' || $pageSegment == 'state' || $pageSegment == 'manufacturer' || $pageSegment == 'model' || $pageSegment == 'report-listing-reason')?'true':'false')?>" aria-controls="navbarVerticalMenuMasters">
              <i class="fa fa-database nav-icon"></i>
              <span class="nav-link-title">Masters</span>
            </a>
            <div id="navbarVerticalMenuMasters" class="nav-collapse collapse <?=(($pageSegment == 'parent-category' || $pageSegment == 'sub-category' || $pageSegment == 'state' || $pageSegment == 'manufacturer' || $pageSegment == 'model' || $pageSegment == 'report-listing-reason')?'show':'')?>" data-bs-parent="#navbarVerticalMenu">
              <a class="nav-link <?=(($pageSegment == 'parent-category')?'active':'')?>" href="<?=url('admin/parent-category/list')?>">Parent Categories</a>
              <a class="nav-link <?=(($pageSegment == 'sub-category')?'active':'')?>" href="<?=url('admin/sub-category/list')?>">Sub Categories</a>
              <a class="nav-link <?=(($pageSegment == 'state')?'active':'')?>" href="<?=url('admin/state/list')?>">States</a>
              <a class="nav-link <?=(($pageSegment == 'manufacturer')?'active':'')?>" href="<?=url('admin/manufacturer/list')?>">Manufacturers</a>
              <a class="nav-link <?=(($pageSegment == 'model')?'active':'')?>" href="<?=url('admin/model/list')?>">Models</a>
              <a class="nav-link <?=(($pageSegment == 'report-listing-reason')?'active':'')?>" href="<?=url('admin/report-listing-reason/list')?>">Report Listing Reasons</a>
            </div>
          </div>
        <!-- End masters -->
        <!-- sources -->
          <div class="nav-item">
            <a class="nav-link <?=(($pageSegment == 'source')?'active':'')?>" href="<?=url('admin/source/list')?>" data-placement="left">
              <i class="fa fa-history nav-icon"></i>
              <span class="nav-link-title">Sources</span>
            </a>
          </div>
        <!-- End sources -->
        <!-- Listing Ads -->
          <div class="nav-item">
            <a class="nav-link <?=(($pageSegment == 'listing-ad')?'active':'')?>" href="<?=url('admin/listing-ad/list')?>" data-placement="left">
              <i class="fa fa-list-alt nav-icon"></i>
              <span class="nav-link-title">Listings</span>
            </a>
          </div>
        <!-- End Listing Ads -->
        <!-- Listing Ads Sales Inquires -->
          <div class="nav-item">
            <a class="nav-link <?=(($pageSegment == 'listing-ad-sales-inquiry')?'active':'')?>" href="<?=url('admin/listing-ad-sales-inquiry/list')?>" data-placement="left">
              <i class="fa fa-list-alt nav-icon"></i>
              <span class="nav-link-title">Listings Sales Inquires</span>
            </a>
          </div>
        <!-- End Listing Ads Sales Inquires -->
        <!-- Listing Ads Report Inquires -->
          <div class="nav-item">
            <a class="nav-link <?=(($pageSegment == 'listing-ad-report-inquiry')?'active':'')?>" href="<?=url('admin/listing-ad-report-inquiry/list')?>" data-placement="left">
              <i class="fa fa-list-alt nav-icon"></i>
              <span class="nav-link-title">Listings Report Inquires</span>
            </a>
          </div>
        <!-- End Listing Ads Report Inquires -->
        <!-- Video Galleries -->
          <div class="nav-item">
            <a class="nav-link <?=(($pageSegment == 'video-library')?'active':'')?>" href="<?=url('admin/video-library/list')?>" data-placement="left">
              <i class="fa fa-video nav-icon"></i>
              <span class="nav-link-title">Videos</span>
            </a>
          </div>
        <!-- End Video Galleries -->
        <!-- faq -->
          <div class="nav-item">
            <a class="nav-link dropdown-toggle active <?=(($pageSegment == 'faq-category' || $pageSegment == 'faq')?'':'collapsed')?>" href="#navbarVerticalMenuFaq" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuFaq" aria-expanded="<?=(($pageSegment == 'faq-category' || $pageSegment == 'faq')?'true':'false')?>" aria-controls="navbarVerticalMenuFaq">
              <i class="fa fa-question-circle nav-icon"></i>
              <span class="nav-link-title">FAQs</span>
            </a>
            <div id="navbarVerticalMenuFaq" class="nav-collapse collapse <?=(($pageSegment == 'faq-category' || $pageSegment == 'faq')?'show':'')?>" data-bs-parent="#navbarVerticalMenu">
              <a class="nav-link <?=(($pageSegment == 'faq-category')?'active':'')?>" href="<?=url('admin/faq-category/list')?>">FAQ Categories</a>
              <a class="nav-link <?=(($pageSegment == 'faq')?'active':'')?>" href="<?=url('admin/faq/list')?>">FAQs</a>
            </div>
          </div>
        <!-- End faq -->
        <!-- access -->
          <div class="nav-item">
            <a class="nav-link dropdown-toggle active <?=(($pageSegment == 'module' || $pageSegment == 'sub-user' || $pageSegment == 'access')?'':'collapsed')?>" href="#navbarVerticalMenuAccess" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuAccess" aria-expanded="<?=(($pageSegment == 'module' || $pageSegment == 'sub-user' || $pageSegment == 'access')?'true':'false')?>" aria-controls="navbarVerticalMenuAccess">
              <i class="fa fa-lock nav-icon"></i>
              <span class="nav-link-title">Access & Permission</span>
            </a>
            <div id="navbarVerticalMenuAccess" class="nav-collapse collapse <?=(($pageSegment == 'module' || $pageSegment == 'sub-user' || $pageSegment == 'access')?'show':'')?>" data-bs-parent="#navbarVerticalMenu">
              <a class="nav-link <?=(($pageSegment == 'module')?'active':'')?>" href="<?=url('admin/module/list')?>">Modules</a>
              <a class="nav-link <?=(($pageSegment == 'sub-user')?'active':'')?>" href="<?=url('admin/sub-user/list')?>">Sub Users</a>
              <a class="nav-link <?=(($pageSegment == 'access')?'active':'')?>" href="<?=url('admin/access/list')?>">Give Access</a>
            </div>
          </div>
        <!-- End access -->
        <!-- home page -->
          <div class="nav-item">
            <a class="nav-link dropdown-toggle active <?=(($pageSegment == 'banner' || $pageSegment == 'home-page')?'':'collapsed')?>" href="#navbarVerticalHomePage" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalHomePage" aria-expanded="<?=(($pageSegment == 'banner' || $pageSegment == 'home-page')?'true':'false')?>" aria-controls="navbarVerticalHomePage">
              <i class="fa fa-home nav-icon"></i>
              <span class="nav-link-title">Home Page</span>
            </a>
            <div id="navbarVerticalHomePage" class="nav-collapse collapse <?=(($pageSegment == 'banner' || $pageSegment == 'home-page')?'show':'')?>" data-bs-parent="#navbarVerticalMenu">
              <a class="nav-link <?=(($pageSegment == 'banner')?'active':'')?>" href="<?=url('admin/banner/list')?>">Banners</a>
              <a class="nav-link <?=(($pageSegment == 'home-page')?'active':'')?>" href="<?=url('admin/home-page/list')?>">Home Page</a>
            </div>
          </div>
        <!-- End home page -->
        <!-- contact enquires -->
          <div class="nav-item">
            <a class="nav-link <?=(($pageSegment == 'enquiry')?'active':'')?>" href="<?=url('admin/enquiry/list')?>" data-placement="left">
              <i class="fa fa-envelope nav-icon"></i>
              <span class="nav-link-title">Contact Enquires</span>
            </a>
          </div>
        <!-- End contact enquires -->
        <!-- page -->
          <div class="nav-item">
            <a class="nav-link <?=(($pageSegment == 'page')?'active':'')?>" href="<?=url('admin/page/list')?>" data-placement="left">
              <i class="fa fa-envelope nav-icon"></i>
              <span class="nav-link-title">Pages</span>
            </a>
          </div>
        <!-- End page -->
        <!-- Newsletter -->
          <div class="nav-item">
            <a class="nav-link dropdown-toggle active <?=(($pageSegment == 'subscriber' || $pageSegment == 'newsletter')?'':'collapsed')?>" href="#navbarVerticalNewsletter" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalNewsletter" aria-expanded="<?=(($pageSegment == 'subscriber' || $pageSegment == 'newsletter')?'true':'false')?>" aria-controls="navbarVerticalNewsletter">
              <i class="fa fa-lock nav-icon"></i>
              <span class="nav-link-title">Newsletter</span>
            </a>
            <div id="navbarVerticalNewsletter" class="nav-collapse collapse <?=(($pageSegment == 'subscriber' || $pageSegment == 'newsletter')?'show':'')?>" data-bs-parent="#navbarVerticalMenu">
              <a class="nav-link <?=(($pageSegment == 'subscriber')?'active':'')?>" href="<?=url('admin/subscriber/list')?>">Subscribers</a>
              <a class="nav-link <?=(($pageSegment == 'newsletter')?'active':'')?>" href="<?=url('admin/newsletter/list')?>">Newsletter</a>
            </div>
          </div>
        <!-- End Newsletter -->
        <!-- email logs -->
          <div class="nav-item">
            <a class="nav-link <?=(($pageSegment == 'email-logs')?'active':'')?>" href="<?=url('admin/email-logs')?>" data-placement="left">
              <i class="fa fa-history nav-icon"></i>
              <span class="nav-link-title">Email Logs</span>
            </a>
          </div>
        <!-- End email logs -->
        <!-- login logs -->
          <div class="nav-item">
            <a class="nav-link <?=(($pageSegment == 'login-logs')?'active':'')?>" href="<?=url('admin/login-logs')?>" data-placement="left">
              <i class="fa fa-sign-in nav-icon"></i>
              <span class="nav-link-title">Login Logs</span>
            </a>
          </div>
        <!-- End login logs -->
      </div>
    </div>
    <!-- End Content -->
    <!-- Footer -->
    <div class="navbar-vertical-footer">
      <ul class="navbar-vertical-footer-list">
        <li class="navbar-vertical-footer-list-item">
          <!-- Style Switcher -->
          <div class="dropdown dropup">
            <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
            </button>
            <div class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectThemeDropdown">
              <a class="dropdown-item" href="#" data-icon="bi-moon-stars" data-value="auto">
                <i class="bi-moon-stars me-2"></i>
                <span class="text-truncate" title="Auto (system default)">Auto (system default)</span>
              </a>
              <a class="dropdown-item" href="#" data-icon="bi-brightness-high" data-value="default">
                <i class="bi-brightness-high me-2"></i>
                <span class="text-truncate" title="Default (light mode)">Default (light mode)</span>
              </a>
              <a class="dropdown-item active" href="#" data-icon="bi-moon" data-value="dark">
                <i class="bi-moon me-2"></i>
                <span class="text-truncate" title="Dark">Dark</span>
              </a>
            </div>
          </div>
          <!-- End Style Switcher -->
        </li>
      </ul>
    </div>
    <!-- End Footer -->
  </div>
</div><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/admin/elements/sidebar.blade.php ENDPATH**/ ?>