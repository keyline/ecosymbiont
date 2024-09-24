<?php
use App\Helpers\Helper;
$controllerRoute                = $module['controller_route'];
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
      $first_name         = $row->first_name;
      $last_name          = $row->last_name;
      $email              = $row->email;
      $phone              = $row->phone;
      $status             = $row->status;
    } else {
      $first_name         = '';
      $last_name          = '';
      $email              = '';
      $phone              = '';
      $status             = 0;
    }
    ?>
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body pt-3">
          <form method="POST" action="" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row mb-3">
              <label for="first_name" class="col-md-2 col-lg-2 col-form-label">First Name</label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="first_name" class="form-control" id="first_name" value="<?=$first_name?>" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="last_name" class="col-md-2 col-lg-2 col-form-label">Last Name</label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="last_name" class="form-control" id="last_name" value="<?=$last_name?>" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="email" class="col-md-2 col-lg-2 col-form-label">Email</label>
              <div class="col-md-10 col-lg-10">
                <input type="email" name="email" class="form-control" id="email" value="<?=$email?>" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="phone" class="col-md-2 col-lg-2 col-form-label">Phone</label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="phone" class="form-control" id="phone" value="<?=$phone?>" required>
              </div>
            </div>
            <!-- <div class="row mb-3">
              <label for="password" class="col-md-2 col-lg-2 col-form-label">Password</label>
              <div class="col-md-10 col-lg-10">
                <input type="password" name="password" class="form-control" id="password" value="" <?=((!empty($row))?'':'required')?>>
                <?php if($row){?><small class="text-info">* Leave blank if you don't want to change password</small><br><?php }?>
              </div>
            </div> -->
            <div class="row mb-3">
              <label for="hotel_id" class="col-md-2 col-lg-2 col-form-label">Status</label>
              <div class="col-md-10 col-lg-10">
                <input type="radio" name="status" value="1" id="status1" <?=(($status == 1)?'checked':'')?> required>
                <label for="status1">ACTIVE</label>

                <input type="radio" name="status" value="0" id="status2" <?=(($status == 0)?'checked':'')?> required>
                <label for="status2">DEACTIVE</label>
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
</section>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/admin/maincontents/tenant/add-edit.blade.php ENDPATH**/ ?>