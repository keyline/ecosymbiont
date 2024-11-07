<?php
use App\Helpers\Helper;
$controllerRoute = $module['controller_route'];
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
          <div class="row">
            <?php for($i=1;$i<=8;$i++){?>
              <div class="col-lg-3">
                <!-- Card with an image on top -->
                <div class="card">
                  <img src="http://localhost/stumento/public/uploads/1690805871logo.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h class="card-title">ONE TO ONE session ON mental health</h>
                    <p class="card-text">Service Type : Discovery Call</p>
                    <p class="card-text">Service : Career Counselling</p>
                    <span style="float: left;">Price : 1000.00</span>
                    <span style="float: right;">Duration : 60 mins</span>
                  </div>
                </div><!-- End Card with an image on top -->
              </div>
            <?php }?>
          </div>
        </div>
      </div>

    </div>
  </div>
</section><?php /**PATH E:\xampp8.2\htdocs\stumento\resources\views/admin/maincontents/mentor/assigned-services.blade.php ENDPATH**/ ?>