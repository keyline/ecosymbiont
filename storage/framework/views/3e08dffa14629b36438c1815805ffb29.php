<?php
  use App\Helpers\Helper;
  $controllerRoute = $module['controller_route'];
  use App\Models\DayOfWeeks;
?>
<div class="pagetitle">
  <h1><?=$page_header?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=url('admin/dashboard')?>">Home</a></li>
      <li class="breadcrumb-item active"><?=$page_header?></li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-xl-12">
      <?php if(session('success_message')): ?>
        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show autohide" role="alert">
          <?php echo e(session('success_message')); ?>

          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>
      <?php if(session('error_message')): ?>
        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show autohide" role="alert">
          <?php echo e(session('error_message')); ?>

          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>
    </div>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body pt-3">
          <?php if($getSlotAvailability){ foreach($getSlotAvailability as $slot){ 
            $getName = DayOfWeeks::where('id', '=', $slot->day_of_week_id)->first();
            // Helper::pr($getName);
             ?>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                <p style="font-weight:bold;"><?=$getName->day;?></p>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                <p class="text-success"><?= date('h:i:s A', strtotime($slot->avail_from));?></p>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                <p class="text-success"><?= date('h:i:s A', strtotime($slot->avail_to));?></p>
              </div>
            </div>
          <hr>
          <?php } }else{  ?>
            
          <?php } ?>
         
          
          <!-- <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
              <p style="font-weight:bold;">Saturday</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
              <p class="text-danger">Unavailable</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
              <p class="text-danger">Unavailable</p>
            </div>
          </div>
          <hr> -->
         
        </div>
      </div>

    </div>
  </div>
</sectionPM<?php /**PATH E:\xampp8.2\htdocs\stumento\resources\views/admin/maincontents/mentor/availability.blade.php ENDPATH**/ ?>