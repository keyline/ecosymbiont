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
      $hotel_id         = $row->hotel_id;
      $name             = $row->name;
      $tat              = $row->tat;
      $max_allowed_qty  = $row->max_allowed_qty;
    } else {
      $hotel_id         = '';
      $name             = '';
      $tat              = '';
      $max_allowed_qty  = '';
    }
    ?>
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body pt-3">
          <form method="POST" action="" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row mb-3">
              <label for="hotel_id" class="col-md-2 col-lg-2 col-form-label">Location</label>
              <div class="col-md-10 col-lg-10">
                <select name="hotel_id" class="form-control" id="hotel_id" required>
                  <option value="" selected>Select Hotel</option>
                  <?php if($hotels){ foreach($hotels as $row){?>
                  <option value="<?=$row->id?>" <?=(($row->id == $hotel_id)?'selected':'')?>><?=$row->name?></option>
                  <?php } }?>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="name" class="col-md-2 col-lg-2 col-form-label">Name</label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="name" class="form-control" id="name" value="<?=$name?>" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="tat" class="col-md-2 col-lg-2 col-form-label">TAT (Turn Around Time) [In Minutes]</label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="tat" class="form-control" id="tat" value="<?=$tat?>" required onkeypress="return isNumber(event)">
              </div>
            </div>
            <div class="row mb-3">
              <label for="max_allowed_qty" class="col-md-2 col-lg-2 col-form-label">Max Allowed Qty Per Room</label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="max_allowed_qty" class="form-control" id="max_allowed_qty" value="<?=$max_allowed_qty?>" required onkeypress="return isNumber(event)">
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
<script type="text/javascript">
  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
  }
</script><?php /**PATH E:\xampp8.2\htdocs\relook\resources\views/admin/maincontents/housekeeping-item/add-edit.blade.php ENDPATH**/ ?>