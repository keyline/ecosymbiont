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
            <i class="bi bi-arrow-right"></i><span>Branch & Staff Users</span>
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
      <a class="nav-link <?=(($pageSegment == 'banner' || $pageSegment == 'testimonial' || $pageSegment == 'hotel' || $pageSegment == 'room-type' || $pageSegment == 'amenity')?'':'collapsed')?> <?=(($pageSegment == 'banner' || $pageSegment == 'testimonial' || $pageSegment == 'hotel' || $pageSegment == 'room-type' || $pageSegment == 'amenity')?'active':'')?>" data-bs-target="#master-nav" data-bs-toggle="collapse" href="#">
        <i class="fa fa-database"></i><span>Master Management</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="master-nav" class="nav-content collapse <?=(($pageSegment == 'banner' || $pageSegment == 'testimonial' || $pageSegment == 'hotel' || $pageSegment == 'room-type' || $pageSegment == 'amenity')?'show':'')?>" data-bs-parent="#sidebar-nav">
        <?php if(in_array(1, $module_id)){?>
        <li>
          <a class="<?=(($pageSegment == 'banner')?'active':'')?>" href="<?php echo e(url('admin/banner/list')); ?>">
            <i class="bi bi-arrow-right"></i><span>Banners</span>
          </a>
        </li>
        <?php }?>
        
        <?php if(in_array(2, $module_id)){?>
        <li>
          <a class="<?=(($pageSegment == 'testimonial')?'active':'')?>" href="<?php echo e(url('admin/testimonial/list')); ?>">
            <i class="bi bi-arrow-right"></i><span>Testimonials</span>
          </a>
        </li>
        <?php }?>

        <?php if(in_array(3, $module_id)){?>
        <li>
          <a class="<?=(($pageSegment == 'hotel')?'active':'')?>" href="<?php echo e(url('admin/hotel/list')); ?>">
            <i class="bi bi-arrow-right"></i><span>Hotels</span>
          </a>
        </li>
        <?php }?>

        <?php if(in_array(4, $module_id)){?>
        <li>
          <a class="<?=(($pageSegment == 'room-type')?'active':'')?>" href="<?php echo e(url('admin/room-type/list')); ?>">
            <i class="bi bi-arrow-right"></i><span>Room Types</span>
          </a>
        </li>
        <?php }?>

        <?php if(in_array(5, $module_id)){?>
        <li>
          <a class="<?=(($pageSegment == 'amenity')?'active':'')?>" href="<?php echo e(url('admin/amenity/list')); ?>">
            <i class="bi bi-arrow-right"></i><span>Amenities</span>
          </a>
        </li>
        <?php }?>

        <?php if(in_array(6, $module_id)){?>
        <li>
          <a class="<?=(($pageSegment == 'testimonial')?'active':'')?>" href="<?php echo e(url('admin/testimonial/list')); ?>">
            <i class="bi bi-arrow-right"></i><span>Rooms</span>
          </a>
        </li>
        <?php }?>
        
      </ul>
    </li><!-- End Masters Nav -->
  <?php }?>

  <?php if((in_array(16, $module_id)) || (in_array(17, $module_id))){?>
    <li class="nav-item">
      <a class="nav-link <?=(($pageSegment == 'restaurant-category' || $pageSegment == 'restaurant-item')?'':'collapsed')?> <?=(($pageSegment == 'restaurant-category' || $pageSegment == 'restaurant-item')?'active':'')?>" data-bs-target="#restaurant-nav" data-bs-toggle="collapse" href="#">
        <i class="fa fa-lock"></i><span>Restaurants</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="restaurant-nav" class="nav-content collapse <?=(($pageSegment == 'restaurant-category' || $pageSegment == 'restaurant-item')?'show':'')?>" data-bs-parent="#sidebar-nav">
        <?php if(in_array(16, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'restaurant-category')?'active':'')?>" href="<?php echo e(url('admin/restaurant-category/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Food Categories</span>
            </a>
          </li>
        <?php }?>
        <?php if(in_array(17, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'restaurant-item')?'active':'')?>" href="<?php echo e(url('admin/restaurant-item/list')); ?>">
              <i class="bi bi-arrow-right"></i><span>Restaurant Items</span>
            </a>
          </li>
        <?php }?>
      </ul>
    </li><!-- End Restaurants Nav -->
  <?php }?>

  <?php if((in_array(18, $module_id))) {?>
    <li class="nav-item">
      <a class="nav-link <?=(($pageSegment == 'housekeeping-item')?'':'collapsed')?> <?=(($pageSegment == 'housekeeping-item')?'active':'')?>" data-bs-target="#hk-nav" data-bs-toggle="collapse" href="#">
        <i class="fa fa-lock"></i><span>House Keeping</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="hk-nav" class="nav-content collapse <?=(($pageSegment == 'housekeeping-item')?'show':'')?>" data-bs-parent="#sidebar-nav">
        <?php if(in_array(18, $module_id)){?>
        <li>
          <a class="<?=(($pageSegment == 'housekeeping-item')?'active':'')?>" href="<?php echo e(url('admin/housekeeping-item/list')); ?>">
            <i class="bi bi-arrow-right"></i><span>Items</span>
          </a>
        </li>
        <?php }?>
      </ul>
    </li><!-- End House Keeping Nav -->
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
      <a class="nav-link <?=(($pageSegment == 'faq' || $pageSegment == 'how-it-works')?'':'collapsed')?> <?=(($pageSegment == 'faq' || $pageSegment == 'how-it-works')?'active':'')?>" data-bs-target="#faq-nav" data-bs-toggle="collapse" href="#">
        <i class="fa fa-lock"></i><span>FAQ</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="faq-nav" class="nav-content collapse <?=(($pageSegment == 'faq' || $pageSegment == 'how-it-works')?'show':'')?>" data-bs-parent="#sidebar-nav">
        <?php if(in_array(11, $module_id)){?>
        <li>
          <a class="<?=(($pageSegment == 'faq')?'active':'')?>" href="<?php echo e(url('admin/faq/list')); ?>">
            <i class="bi bi-arrow-right"></i><span>FAQs</span>
          </a>
        </li>
        <?php }?>
        <?php if(in_array(12, $module_id)){?>
        <li>
          <a class="<?=(($pageSegment == 'how-it-works')?'active':'')?>" href="<?php echo e(url('admin/how-it-works/list')); ?>">
            <i class="bi bi-arrow-right"></i><span>How It Works</span>
          </a>
        </li>
        <?php }?>
      </ul>
    </li><!-- End FAQ Nav -->
  <?php }?>  

  <?php if((in_array(13, $module_id)) || (in_array(14, $module_id))) {?>
    <li class="nav-item">
      <a class="nav-link <?=(($pageSegment == 'blog-category' || $pageSegment == 'blog')?'':'collapsed')?> <?=(($pageSegment == 'blog-category' || $pageSegment == 'blog')?'active':'')?>" data-bs-target="#blog-nav" data-bs-toggle="collapse" href="#">
        <i class="fa-solid fa-blog"></i><span>Blog Management</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="blog-nav" class="nav-content collapse <?=(($pageSegment == 'blog-category' || $pageSegment == 'blog')?'show':'')?>" data-bs-parent="#sidebar-nav">
        <?php if(in_array(13, $module_id)){?>
        <li>
          <a class="<?=(($pageSegment == 'blog-category')?'active':'')?>" href="<?php echo e(url('admin/blog-category/list')); ?>">
            <i class="bi bi-arrow-right"></i><span>Category</span>
          </a>
        </li>
        <?php }?>
        <?php if(in_array(14, $module_id)){?>
        <li>
          <a class="<?=(($pageSegment == 'blog')?'active':'')?>" href="<?php echo e(url('admin/blog/list')); ?>">
            <i class="bi bi-arrow-right"></i><span>Blogs</span>
          </a>
        </li>
        <?php }?>
      </ul>
    </li><!-- End Blogs Nav -->
  <?php }?>

  <?php if((in_array(15, $module_id))) {?>
    <li class="nav-item">
      <a class="nav-link <?=(($pageSegment == 'faq')?'':'collapsed')?> <?=(($pageSegment == 'faq')?'active':'')?>" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
        <i class="fa fa-lock"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="user-nav" class="nav-content collapse <?=(($pageSegment == 'faq')?'show':'')?>" data-bs-parent="#sidebar-nav">
        <?php if(in_array(15, $module_id)){?>
        <li>
          <a class="<?=(($pageSegment == 'faq')?'active':'')?>" href="javascript:void(0);">
            <i class="bi bi-arrow-right"></i><span>User List</span>
          </a>
        </li>
        <?php }?>
      </ul>
    </li><!-- End Users Nav -->
  <?php }?>  

  <?php if((in_array(19, $module_id)) || (in_array(20, $module_id)) || (in_array(21, $module_id)) || (in_array(25, $module_id)) || (in_array(26, $module_id)) || (in_array(27, $module_id)) || (in_array(28, $module_id))){?>
    <li class="nav-item">
      <a class="nav-link <?=(($pageSegment == 'faq')?'':'collapsed')?> <?=(($pageSegment == 'faq')?'active':'')?>" data-bs-target="#booking-nav" data-bs-toggle="collapse" href="#">
        <i class="fa fa-lock"></i><span>Booking</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="booking-nav" class="nav-content collapse <?=(($pageSegment == 'faq')?'show':'')?>" data-bs-parent="#sidebar-nav">
        <?php if(in_array(19, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'faq')?'active':'')?>" href="javascript:void(0);">
              <i class="bi bi-arrow-right"></i><span>All</span>
            </a>
          </li>
        <?php }?>
        <?php if(in_array(20, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'faq')?'active':'')?>" href="javascript:void(0);">
              <i class="bi bi-arrow-right"></i><span>Ongoing</span>
            </a>
          </li>
        <?php }?>
        <?php if(in_array(21, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'faq')?'active':'')?>" href="javascript:void(0);">
              <i class="bi bi-arrow-right"></i><span>Upcoming</span>
            </a>
          </li>
        <?php }?>
        <?php if(in_array(25, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'faq')?'active':'')?>" href="javascript:void(0);">
              <i class="bi bi-arrow-right"></i><span>Past</span>
            </a>
          </li>
        <?php }?>
        <?php if(in_array(26, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'faq')?'active':'')?>" href="javascript:void(0);">
              <i class="bi bi-arrow-right"></i><span>House Keeping Service Alert</span>
            </a>
          </li>
        <?php }?>
        <?php if(in_array(27, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'faq')?'active':'')?>" href="javascript:void(0);">
              <i class="bi bi-arrow-right"></i><span>Restaurant Service Alert</span>
            </a>
          </li>
        <?php }?>
        <?php if(in_array(28, $module_id)){?>
          <li>
            <a class="<?=(($pageSegment == 'faq')?'active':'')?>" href="javascript:void(0);">
              <i class="bi bi-arrow-right"></i><span>Room Service Service Alert</span>
            </a>
          </li>
        <?php }?>
      </ul>
    </li><!-- End Booking Nav -->
  <?php }?>

  <?php if((in_array(29, $module_id))) {?>
    <li class="nav-item">
      <a class="nav-link <?=(($pageSegment == 'page')?'active':'')?>" href="javascript:void(0);">
        <i class="fa fa-file-text"></i>
        <span>Transactions</span>
      </a>
    </li>
  <?php }?>

  <?php if((in_array(30, $module_id))) {?>
    <li class="nav-item">
      <a class="nav-link <?=(($pageSegment == 'page')?'active':'')?>" href="javascript:void(0);">
        <i class="fa fa-file-text"></i>
        <span>Reviews</span>
      </a>
    </li>
  <?php }?>

  <?php if((in_array(31, $module_id))){?>
    <li class="nav-item">
      <a class="nav-link <?=(($pageSegment == 'faq')?'':'collapsed')?> <?=(($pageSegment == 'faq')?'active':'')?>" data-bs-target="#report-nav" data-bs-toggle="collapse" href="#">
        <i class="fa fa-lock"></i><span>Report</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="report-nav" class="nav-content collapse <?=(($pageSegment == 'faq')?'show':'')?>" data-bs-parent="#sidebar-nav">
        <?php if(in_array(31, $module_id)){?>
        <li>
          <a class="<?=(($pageSegment == 'faq')?'active':'')?>" href="javascript:void(0);">
            <i class="bi bi-arrow-right"></i><span>Room Booking Report</span>
          </a>
        </li>
        <?php }?>
      </ul>
    </li><!-- End House Keeping Nav -->
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

</ul><?php /**PATH E:\xampp8.2\htdocs\relook\resources\views/admin/elements/sidebar.blade.php ENDPATH**/ ?>