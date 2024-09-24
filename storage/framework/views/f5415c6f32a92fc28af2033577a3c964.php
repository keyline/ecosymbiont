<?php
use App\Helpers\Helper;
$sessionType                    = Session::get('type');
$sessionHotelId                 = Session::get('hotel_id');
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
      $hotel_id         = $row->hotel_id;
      $name             = $row->name;
    } else {
      $hotel_id         = '';
      $name             = '';
    }
    ?>
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body pt-3">
          <form method="POST" action="" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php if($sessionType == 'ma'){?>
              <div class="row mb-3">
                <label for="hotel_id" class="col-md-2 col-lg-2 col-form-label">Hotel</label>
                <div class="col-md-10 col-lg-10">
                    <select name="hotel_id" class="form-control" id="hotel_id" required>
                      <option value="" selected>Select Hotel</option>
                      <?php if($hotels){ foreach($hotels as $row){?>
                      <option value="<?=$row->id?>" <?=(($row->id == $hotel_id)?'selected':'')?>><?=$row->name?></option>
                      <?php } }?>
                    </select>
                </div>
              </div>
            <?php } else {?>
              <input type="hidden" name="hotel_id" value="<?=$sessionHotelId?>">
            <?php }?>
            
            <div class="row mb-3">
              <label for="name" class="col-md-2 col-lg-2 col-form-label">Name</label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="name" class="form-control" id="name" value="<?=$name?>" required>
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
</section><?php /**PATH E:\xampp8.2\htdocs\relook\resources\views/admin/maincontents/room-type/add-edit.blade.php ENDPATH**/ ?>