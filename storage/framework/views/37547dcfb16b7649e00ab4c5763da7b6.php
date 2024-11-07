<?php
use App\Helpers\Helper;
$controllerRoute = $module['controller_route'];
?>
<div class="pagetitle">
  <h1><?=$page_header?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=url('admin/dashboard')?>">Home</a></li>
      <li class="breadcrumb-item active"><a href="<?=url('admin/' . $controllerRoute . '/list/')?>"><?=$module['title']?> List</a></li>
      <li class="breadcrumb-item active"><?=$page_header?></li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section profile">
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
    <?php
    if($row){
      $name             = $row->name;
      $location         = $row->location;
      $checkin_time     = $row->checkin_time;
      $checkout_time    = $row->checkout_time;
      $cover_image      = $row->cover_image;
    } else {
      $name             = '';
      $location         = '';
      $checkin_time     = '';
      $checkout_time    = '';
      $cover_image      = '';
    }
    ?>
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body pt-3">
          <form method="POST" action="" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row mb-3">
              <label for="name" class="col-md-2 col-lg-2 col-form-label">Name</label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="name" class="form-control" id="name" value="<?=$name?>" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="location" class="col-md-2 col-lg-2 col-form-label">Location</label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="location" class="form-control" id="location" value="<?=$location?>" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="checkin_time" class="col-md-2 col-lg-2 col-form-label">CheckIn Time</label>
              <div class="col-md-10 col-lg-10">
                <input type="time" name="checkin_time" class="form-control" id="checkin_time" value="<?=$checkin_time?>" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="checkout_time" class="col-md-2 col-lg-2 col-form-label">CheckOut Time</label>
              <div class="col-md-10 col-lg-10">
                <input type="time" name="checkout_time" class="form-control" id="checkout_time" value="<?=$checkout_time?>" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="cover_image" class="col-md-2 col-lg-2 col-form-label">Cover Image</label>
              <div class="col-md-10 col-lg-10">
                <input type="file" name="cover_image" class="form-control" id="cover_image">
                <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed</small><br>
                <?php if($cover_image != ''){?>
                  <img src="<?=env('UPLOADS_URL').'hotel/'.$cover_image?>" class="img-thumbnail" alt="<?=$name?>" style="width: 150px; height: 150px; margin-top: 10px;">
                <?php } else {?>
                  <img src="<?=env('NO_IMAGE')?>" alt="<?=$name?>" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                <?php }?>
                
                <!-- <div class="pt-2">
                  <a href="#profile_image" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                  <a href="javascript:void(0);" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                </div> -->
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary"><?=(($row)?'Save':'Add')?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section><?php /**PATH E:\xampp8.2\htdocs\relook\resources\views/admin/maincontents/hotel/add-edit.blade.php ENDPATH**/ ?>