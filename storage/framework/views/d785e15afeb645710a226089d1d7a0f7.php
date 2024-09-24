<?php
use App\Helpers\Helper;
use App\Models\User;
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
        <div class="card-body">
          <h5 class="card-title">
            <a href="<?=url('admin/' . $controllerRoute . '/list/')?>" class="btn btn-outline-success btn-sm">Back To List</a>
          </h5>
          <?php if($row){?>
            <table class="table table-striped">
              <tr>
                <th>Name</th>
                <td><?=$row->name?></td>
              </tr>
              <tr>
                <th>Email</th>
                <td><?=$row->email?></td>
              </tr>
              <tr>
                <th>Phone</th>
                <td><?=$row->phone?></td>
              </tr>
              <tr>
                <th>Subject</th>
                <td><?=$row->subject?></td>
              </tr>
              <tr>
                <th>Enquiry Date/Time</th>
                <td><?=date_format(date_create($row->created_at), "M d, Y h:i A")?></td>
              </tr>
              <tr>
                <th>Description</th>
                <td><?=$row->description?></td>
              </tr>
            </table>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
</section><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/admin/maincontents/enquiry/details.blade.php ENDPATH**/ ?>