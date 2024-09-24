<?php
use Illuminate\Support\Facades\Route;;
$routeName    = Route::current();
$pageName     = explode("/", $routeName->uri());
$pageSegment  = $pageName[1];
$pageFunction = ((count($pageName)>2)?$pageName[2]:'');
// dd($routeName);
?>
<ul class="sidebar-nav" id="sidebar-nav">
  <li class="nav-item">
    <a class="nav-link <?=(($pageSegment == 'dashboard')?'active':'')?>" href="<?php echo e(url('admin/dashboard')); ?>">
      <i class="fa fa-home"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <?php
  //if($admin->type == 'ma'){?>
    <?php if((in_array(8, $module_id)) || (in_array(9, $module_id)) || (in_array(10, $module_id))){?>
    <li class="nav-item">
      <a class="nav-link <?=(($pageSegment == 'module' || $pageSegment == 'sub-user' || $pageSegment == 'access')?'':'collapsed')?> <?=(($pageSegment == 'module' || $pageSegment == 'sub-user' || $pageSegment == 'access')?'active':'')?>" data-bs-target="#permission-nav" data-bs-toggle="collapse" href="#">
        <i class="fa fa-lock"></i><span>Access & Permission</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="permission-nav" class="nav-content collapse <?=(($pageSegment == 'module' || $pageSegment == 'sub-user' || $pageSegment == 'access')?'show':'')?>" data-bs-parent="#sidebar-nav">
        <?php if(in_array(8, $module_id)){?>
        <li>
          <a class="<?=(($pageSegment == 'module')?'active':'')?>" href="<?php echo e(url('admin/module/list')); ?>">
            <i class="bi bi-arrow-right"></i><span>Modules</span>
          </a>
        </li>
        <?php }?>
        <?php if(in_array(9, $module_id)){?>
        <li>
          <a class="<?=(($pageSegment == 'sub-user')?'active':'')?>" href="<?php echo e(url('admin/sub-user/list')); ?>">
            <i class="bi bi-arrow-right"></i><span>Sub Users</span>
          </a>
        </li>
        <?php }?>
        <?php if(in_array(10, $module_id)){?>
        <li>
          <a class="<?=(($pageSegment == 'access')?'active':'')?>" href="<?php echo e(url('admin/access/list')); ?>">
            <i class="bi bi-arrow-right"></i><span>Give Access</span>
          </a>
        </li>
        <?php }?>
      </ul>
    </li><!-- End Permission Nav -->
    <?php }?>
  <?php //}?>

  <?php if((in_array(1, $module_id)) || (in_array(2, $module_id)) || (in_array(3, $module_id)) || (in_array(4, $module_id)) || (in_array(5, $module_id)) || (in_array(6, $module_id))) {?>
    <li class="nav-item">
      <a class="nav-link <?=(($pageSegment == 'landlord-document-type' || $pageSegment == 'tenant-document-type' || $pageSegment == 'city' || $pageSegment == 'amenities' || $pageSegment == 'floorings' || $pageSegment == 'water-availabilities' || $pageSegment == 'electricities' || $pageSegment == 'beds' || $pageSegment == 'baths' || $pageSegment == 'balconies' || $pageSegment == 'pets' || $pageSegment == 'sinks' || $pageSegment == 'tubs' || $pageSegment == 'showers')?'':'collapsed')?> <?=(($pageSegment == 'landlord-document-type' || $pageSegment == 'tenant-document-type' || $pageSegment == 'city' || $pageSegment == 'amenities' || $pageSegment == 'floorings' || $pageSegment == 'water-availabilities' || $pageSegment == 'electricities' || $pageSegment == 'beds' || $pageSegment == 'baths' || $pageSegment == 'balconies' || $pageSegment == 'pets' || $pageSegment == 'sinks' || $pageSegment == 'tubs' || $pageSegment == 'showers')?'active':'')?>" data-bs-target="#master-nav" data-bs-toggle="collapse" href="#">
        <i class="fa fa-database"></i><span>Masters</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="master-nav" class="nav-content collapse <?=(($pageSegment == 'landlord-document-type' || $pageSegment == 'tenant-document-type' || $pageSegment == 'city' || $pageSegment == 'amenities' || $pageSegment == 'floorings' || $pageSegment == 'water-availabilities' || $pageSegment == 'electricities' || $pageSegment == 'beds' || $pageSegment == 'baths' || $pageSegment == 'balconies' || $pageSegment == 'pets' || $pageSegment == 'sinks' || $pageSegment == 'tubs' || $pageSegment == 'showers')?'show':'')?>" data-bs-parent="#sidebar-nav">

        <?php if(in_array(2, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'landlord-document-type')?'active':'')?>" href="<?php echo e(url('admin/landlord-document-type/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Landlord Document Type</span>
            </a>
          </li>
        <?php }?>

        <?php if(in_array(2, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'tenant-document-type')?'active':'')?>" href="<?php echo e(url('admin/tenant-document-type/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Tenant Document Type</span>
            </a>
          </li>
        <?php }?>

        <?php if(in_array(2, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'city')?'active':'')?>" href="<?php echo e(url('admin/city/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>City</span>
            </a>
          </li>
        <?php }?>

        <?php if(in_array(2, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'amenities')?'active':'')?>" href="<?php echo e(url('admin/amenities/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Amenities</span>
            </a>
          </li>
        <?php }?>

        <?php if(in_array(2, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'floorings')?'active':'')?>" href="<?php echo e(url('admin/floorings/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Floorings</span>
            </a>
          </li>
        <?php }?>

        <?php if(in_array(2, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'water-availabilities')?'active':'')?>" href="<?php echo e(url('admin/water-availabilities/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Water Availabilities</span>
            </a>
          </li>
        <?php }?>

        <?php if(in_array(2, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'electricities')?'active':'')?>" href="<?php echo e(url('admin/electricities/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Electricities</span>
            </a>
          </li>
        <?php }?>

        <?php if(in_array(2, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'beds')?'active':'')?>" href="<?php echo e(url('admin/beds/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Beds</span>
            </a>
          </li>
        <?php }?>

        <?php if(in_array(2, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'baths')?'active':'')?>" href="<?php echo e(url('admin/baths/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Baths</span>
            </a>
          </li>
        <?php }?>

        <?php if(in_array(2, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'balconies')?'active':'')?>" href="<?php echo e(url('admin/balconies/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Balconies</span>
            </a>
          </li>
        <?php }?>

        <?php if(in_array(2, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'sinks')?'active':'')?>" href="<?php echo e(url('admin/sinks/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Sinks</span>
            </a>
          </li>
        <?php }?>

        <?php if(in_array(2, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'tubs')?'active':'')?>" href="<?php echo e(url('admin/tubs/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Tubs</span>
            </a>
          </li>
        <?php }?>

        <?php if(in_array(2, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'showers')?'active':'')?>" href="<?php echo e(url('admin/showers/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Showers</span>
            </a>
          </li>
        <?php }?>

        <?php if(in_array(2, $module_id)){?>
          <!-- <li>
            <a class="<?=(($pageSegment == 'pets')?'active':'')?>" href="<?php echo e(url('admin/pets/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Pets</span>
            </a>
          </li> -->
        <?php }?>
        
      </ul>
    </li><!-- End Masters Nav -->
  <?php }?>

  <?php if((in_array(1, $module_id)) || (in_array(2, $module_id)) || (in_array(3, $module_id)) || (in_array(4, $module_id)) || (in_array(5, $module_id)) || (in_array(6, $module_id))) {?>
    <li class="nav-item">
      <a class="nav-link <?=(($pageSegment == 'property-type' || $pageSegment == 'properties' || $pageSegment == 'units' || $pageSegment == 'rate-chart' || $pageSegment == 'leads')?'':'collapsed')?> <?=(($pageSegment == 'property-type' || $pageSegment == 'properties' || $pageSegment == 'units' || $pageSegment == 'rate-chart')?'active':'')?>" data-bs-target="#property-nav" data-bs-toggle="collapse" href="#">
        <i class="fa fa-database"></i><span>Properties</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="property-nav" class="nav-content collapse <?=(($pageSegment == 'property-type' || $pageSegment == 'properties' || $pageSegment == 'units' || $pageSegment == 'rate-chart')?'show':'')?>" data-bs-parent="#sidebar-nav">

        <?php if(in_array(2, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'property-type')?'active':'')?>" href="<?php echo e(url('admin/property-type/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Room Type</span>
            </a>
          </li>
        <?php }?>

        <?php if(in_array(2, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'properties')?'active':'')?>" href="<?php echo e(url('admin/properties/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Properties</span>
            </a>
          </li>
        <?php }?>

        <?php if(in_array(2, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'units')?'active':'')?>" href="<?php echo e(url('admin/units/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Units</span>
            </a>
          </li>
        <?php }?>

        <?php if(in_array(2, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'rate-chart')?'active':'')?>" href="<?php echo e(url('admin/rate-chart/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Rate Chart</span>
            </a>
          </li>
        <?php }?>
        
      </ul>
    </li><!-- End Masters Nav -->
  <?php }?>

  <?php if((in_array(11, $module_id)) || (in_array(12, $module_id))){?>
    <li class="nav-item">
      <a class="nav-link <?=(($pageSegment == 'leads')?'':'collapsed')?> <?=(($pageSegment == 'leads')?'active':'')?>" data-bs-target="#lead-nav" data-bs-toggle="collapse" href="#">
        <i class="fa fa-lock"></i><span>Leads</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="lead-nav" class="nav-content collapse <?=(($pageSegment == 'leads')?'show':'')?>" data-bs-parent="#sidebar-nav">
        <?php if(in_array(11, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'leads' && $pageFunction == 'list')?'active':'')?>" href="<?php echo e(url('admin/leads/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Tenant Leads</span>
            </a>
          </li>
        <?php }?>
        <?php if(in_array(11, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'leads' && $pageFunction == 'landlord-leads')?'active':'')?>" href="<?php echo e(url('admin/leads/landlord-leads')); ?>">
              <i class="bi bi-arrow-right"></i><span>Landlord Leads</span>
            </a>
          </li>
        <?php }?>
      </ul>
    </li><!-- End FAQ Nav -->
  <?php }?>

  <?php if((in_array(1, $module_id)) || (in_array(2, $module_id)) || (in_array(3, $module_id)) || (in_array(4, $module_id)) || (in_array(5, $module_id)) || (in_array(6, $module_id))) {?>
    <li class="nav-item">
      <a class="nav-link <?=(($pageSegment == 'banner' || $pageSegment == 'testimonial' || $pageSegment == 'home-page-section2' || $pageSegment == 'home-page-section5' || $pageSegment == 'home-page-section346')?'':'collapsed')?> <?=(($pageSegment == 'banner' || $pageSegment == 'testimonial' || $pageSegment == 'home-page-section2' || $pageSegment == 'home-page-section5' || $pageSegment == 'home-page-section346')?'active':'')?>" data-bs-target="#home-nav" data-bs-toggle="collapse" href="#">
        <i class="fa fa-home"></i><span>Home Page</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="home-nav" class="nav-content collapse <?=(($pageSegment == 'banner' || $pageSegment == 'testimonial' || $pageSegment == 'home-page-section2' || $pageSegment == 'home-page-section5' || $pageSegment == 'home-page-section346')?'show':'')?>" data-bs-parent="#sidebar-nav">
        <?php if(in_array(1, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'banner')?'active':'')?>" href="<?php echo e(url('admin/banner/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Banners <small>(Section 1)</small></span>
            </a>
          </li>
        <?php }?>
        
        <?php if(in_array(2, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'home-page-section2')?'active':'')?>" href="<?php echo e(url('admin/home-page-section2/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Home Page <small>(Section 2)</small></span>
            </a>
          </li>
        <?php }?>

        <?php if(in_array(2, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'home-page-section346')?'active':'')?>" href="<?php echo e(url('admin/home-page-section346/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Home Page <small>(Section 3-4-6)</small></span>
            </a>
          </li>
        <?php }?>

        <?php if(in_array(2, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'home-page-section5')?'active':'')?>" href="<?php echo e(url('admin/home-page-section5/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Home Page <small>(Section 5)</small></span>
            </a>
          </li>
        <?php }?>

        <?php if(in_array(2, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'testimonial')?'active':'')?>" href="<?php echo e(url('admin/testimonial/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Testimonials <small>(Section 7)</small></span>
            </a>
          </li>
        <?php }?>
        
      </ul>
    </li><!-- End Masters Nav -->
  <?php }?>

  <?php if((in_array(11, $module_id)) || (in_array(12, $module_id))){?>
    <li class="nav-item">
      <a class="nav-link <?=(($pageSegment == 'landlord-document' || $pageSegment == 'landlord')?'':'collapsed')?> <?=(($pageSegment == 'landlord-document' || $pageSegment == 'landlord')?'active':'')?>" data-bs-target="#landlord-nav" data-bs-toggle="collapse" href="#">
        <i class="fa fa-lock"></i><span>Landlord</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="landlord-nav" class="nav-content collapse <?=(($pageSegment == 'landlord-document' || $pageSegment == 'landlord')?'show':'')?>" data-bs-parent="#sidebar-nav">
        <?php if(in_array(11, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'landlord')?'active':'')?>" href="<?php echo e(url('admin/landlord/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>List</span>
            </a>
          </li>
        <?php }?>
        <?php if(in_array(11, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'landlord-document')?'active':'')?>" href="<?php echo e(url('admin/landlord-document/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Documents</span>
            </a>
          </li>
        <?php }?>
      </ul>
    </li><!-- End FAQ Nav -->
  <?php }?>

  <?php if((in_array(11, $module_id)) || (in_array(12, $module_id))){?>
    <li class="nav-item">
      <a class="nav-link <?=(($pageSegment == 'tenant-document' || $pageSegment == 'tenant')?'':'collapsed')?> <?=(($pageSegment == 'tenant-document' || $pageSegment == 'tenant')?'active':'')?>" data-bs-target="#tenant-nav" data-bs-toggle="collapse" href="#">
        <i class="fa fa-lock"></i><span>Tenant</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tenant-nav" class="nav-content collapse <?=(($pageSegment == 'tenant-document' || $pageSegment == 'tenant')?'show':'')?>" data-bs-parent="#sidebar-nav">
        <?php if(in_array(11, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'tenant')?'active':'')?>" href="<?php echo e(url('admin/tenant/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>List</span>
            </a>
          </li>
        <?php }?>
        <?php if(in_array(11, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'tenant-document')?'active':'')?>" href="<?php echo e(url('admin/tenant-document/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Documents</span>
            </a>
          </li>
        <?php }?>
      </ul>
    </li><!-- End FAQ Nav -->
  <?php }?>

  <?php if((in_array(7, $module_id))) {?>
    <li class="nav-item">
      <a class="nav-link <?=(($pageSegment == 'page')?'active':'')?>" href="<?php echo e(url('admin/page/list')); ?>">
        <i class="fa fa-file-text"></i>
        <span>CMS Pages</span>
      </a>
    </li>
  <?php }?>
  
  <?php if((in_array(11, $module_id)) || (in_array(12, $module_id))){?>
    <li class="nav-item">
      <a class="nav-link <?=(($pageSegment == 'faq' || $pageSegment == 'faq-category')?'':'collapsed')?> <?=(($pageSegment == 'faq' || $pageSegment == 'faq-category')?'active':'')?>" data-bs-target="#faq-nav" data-bs-toggle="collapse" href="#">
        <i class="fa fa-lock"></i><span>FAQ</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="faq-nav" class="nav-content collapse <?=(($pageSegment == 'faq' || $pageSegment == 'faq-category')?'show':'')?>" data-bs-parent="#sidebar-nav">
        <?php if(in_array(11, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'faq-category')?'active':'')?>" href="<?php echo e(url('admin/faq-category/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>FAQs Category</span>
            </a>
          </li>
        <?php }?>
        <?php if(in_array(11, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'faq')?'active':'')?>" href="<?php echo e(url('admin/faq/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>FAQs</span>
            </a>
          </li>
        <?php }?>
      </ul>
    </li><!-- End FAQ Nav -->
  <?php }?>

  <?php if((in_array(15, $module_id))) {?>
    <li class="nav-item">
      <a class="nav-link <?=(($pageSegment == 'landlord')?'':'collapsed')?> <?=(($pageSegment == 'landlord')?'active':'')?>" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
        <i class="fa fa-lock"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="user-nav" class="nav-content collapse <?=(($pageSegment == 'landlord')?'show':'')?>" data-bs-parent="#sidebar-nav">
        <?php if(in_array(15, $module_id)){?>
        <li>
          <a class="<?=(($pageSegment == 'landlord')?'active':'')?>" href="javascript:void(0);">
            <i class="bi bi-arrow-right"></i><span>Landlords</span>
          </a>
        </li>
        <?php }?>
      </ul>
    </li><!-- End Users Nav -->
  <?php }?>

  <?php if((in_array(29, $module_id))) {?>
    <li class="nav-item">
      <a class="nav-link <?=(($pageSegment == 'page')?'active':'')?>" href="javascript:void(0);">
        <i class="fa fa-file-text"></i>
        <span>Transactions</span>
      </a>
    </li>
  <?php }?>

  <?php if((in_array(29, $module_id))) {?>
    <li class="nav-item">
      <a class="nav-link <?=(($pageSegment == 'notification')?'active':'')?>" href="<?php echo e(url('admin/notification/list')); ?>">
        <i class="fa fa-file-text"></i>
        <span>Notifications</span>
      </a>
    </li>
  <?php }?>

  <?php if((in_array(29, $module_id))) {?>
    <li class="nav-item">
      <a class="nav-link <?=(($pageSegment == 'newsletter')?'active':'')?>" href="<?php echo e(url('admin/newsletter/list')); ?>">
        <i class="fa fa-file-text"></i>
        <span>Newsletter</span>
      </a>
    </li>
  <?php }?>

  <?php if(in_array(32, $module_id)){?>
    <li class="nav-item">
      <a class="nav-link <?=(($pageSegment == 'email-logs')?'active':'')?>" href="<?php echo e(url('admin/email-logs')); ?>">
        <i class="fa fa-envelope"></i>
        <span>Email Logs</span>
      </a>
    </li><!-- End Profile Page Nav -->
  <?php }?>

  <?php if(in_array(33, $module_id)){?>
    <li class="nav-item">
      <a class="nav-link <?=(($pageSegment == 'login-logs')?'active':'')?>" href="<?php echo e(url('admin/login-logs')); ?>">
        <i class="fa fa-list"></i>
        <span>Login Logs</span>
      </a>
    </li><!-- End Profile Page Nav -->
  <?php }?>

  <?php if(in_array(34, $module_id)){?>
    <li class="nav-item">
      <a class="nav-link <?=(($pageSegment == 'enquiry')?'active':'')?>" href="<?php echo e(url('admin/enquiry/list')); ?>">
        <i class="fa fa-envelope"></i>
        <span>Contact Enquiries</span>
      </a>
    </li><!-- End Profile Page Nav -->
  <?php }?>

  <?php if(in_array(35, $module_id)){?>
    <li class="nav-item">
      <a class="nav-link <?=(($pageSegment == 'settings')?'active':'')?>" href="<?php echo e(url('admin/settings')); ?>">
        <i class="fa fa-cogs"></i>
        <span>Account Settings</span>
      </a>
    </li><!-- End Profile Page Nav -->
  <?php }?>

</ul><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/admin/elements/sidebar.blade.php ENDPATH**/ ?>