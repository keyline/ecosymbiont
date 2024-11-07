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
        <div class="card-body">
          <h5 class="card-title">
            <a href="<?=url('admin/' . $controllerRoute . '/add/')?>" class="btn btn-outline-success btn-sm">Add <?=$module['title']?></a>
          </h5>
          <div class="dt-responsive table-responsive">
            <table id="simpletable" class="table table-striped table-bordered nowrap">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Image</th>
                  <th scope="col">Name</th>
                  <th scope="col">Review</th>
                  <th scope="col">Rating</th>
                  <th scope="col">Company Name</th>
                  <th scope="col">Designation</th>
                  <th scope="col">Company Logo</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if($rows){ $sl=1; foreach($rows as $row){?>
                  <tr>
                    <th scope="row"><?=$sl++?></th>
                    <td>
                      <?php if($row->image != ''){?>
                        <img src="<?=env('UPLOADS_URL').'testimonial/'.$row->image?>" alt="<?=$row->name?>" style="width: 100px; height: 100px; margin-top: 10px;border-radius: 50%;">
                      <?php } else {?>
                        <img src="<?=env('NO_IMAGE')?>" alt="<?=$row->name?>" class="img-thumbnail" style="width: 100px; height: 100px; margin-top: 10px;">
                      <?php }?>
                    </td>
                    <td><?=$row->name?></td>
                    <td><?=$row->review?></td>
                    <td><?=$row->rate?></td>
                    <td><?=$row->company_name?></td>
                    <td><?=$row->designation?></td>
                    <td>
                      <?php if($row->company_logo != ''){?>
                        <img src="<?=env('UPLOADS_URL').'testimonial/'.$row->company_logo?>" alt="<?=$row->company_name?>" style="width: 100px; height: 100px; margin-top: 10px;border-radius: 50%;">
                      <?php } else {?>
                        <img src="<?=env('NO_IMAGE')?>" alt="<?=$row->company_name?>" class="img-thumbnail" style="width: 100px; height: 100px; margin-top: 10px;">
                      <?php }?>
                    </td>
                    <td>
                      <a href="<?=url('admin/' . $controllerRoute . '/edit/'.Helper::encoded($row->id))?>" class="btn btn-outline-primary btn-sm" title="Edit <?=$module['title']?>"><i class="fa fa-edit"></i></a>
                      <a href="<?=url('admin/' . $controllerRoute . '/delete/'.Helper::encoded($row->id))?>" class="btn btn-outline-danger btn-sm" title="Delete <?=$module['title']?>" onclick="return confirm('Do You Want To Delete This <?=$module['title']?>');"><i class="fa fa-trash"></i></a>
                      <?php if($row->status){?>
                        <a href="<?=url('admin/' . $controllerRoute . '/change-status/'.Helper::encoded($row->id))?>" class="btn btn-outline-success btn-sm" title="Activate <?=$module['title']?>"><i class="fa fa-check"></i></a>
                      <?php } else {?>
                        <a href="<?=url('admin/' . $controllerRoute . '/change-status/'.Helper::encoded($row->id))?>" class="btn btn-outline-warning btn-sm" title="Deactivate <?=$module['title']?>"><i class="fa fa-times"></i></a>
                      <?php }?>
                    </td>
                  </tr>
                <?php } }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</section><?php /**PATH G:\xampp8.2\htdocs\kids-zone\resources\views/admin/maincontents/testimonial/list.blade.php ENDPATH**/ ?>