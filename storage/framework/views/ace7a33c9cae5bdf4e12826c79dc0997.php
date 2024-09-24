<?php
use App\Models\Category;
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
        <div class="card-body">
          <div class="dt-responsive table-responsive">
            <table id="simpletable" class="table table-striped table-bordered nowrap">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">User Unique Address</th>
                  <th scope="col">Visit Timestamp<br></th>
                </tr>
              </thead>
              <tbody>
                <?php if(count($visits)>0){ $sl=1; foreach($visits as $visit){?>
                  <tr>
                    <th scope="row"><?=$sl++?></th>
                    <td><?=$visit->user_mac_address?></td>
                    <td><?=date_format(date_create($visit->created_at), "M d, Y h:i A")?></td>
                  </tr>
                <?php } } else {?>
                  <tr>
                    <td colspan="3" style="text-align: center;color: red;">No Records Found !!!</td>
                  </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
          <!-- End Table with stripped rows -->
        </div>
      </div>
    </div>
  </div>
</section><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/admin/maincontents/listing-ad/visit-info.blade.php ENDPATH**/ ?>