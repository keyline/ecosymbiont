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
          <!-- <h5 class="card-title">
            <a href="<?=url('admin/' . $controllerRoute . '/add/')?>" class="btn btn-outline-success btn-sm">Add <?=$module['title']?></a>
          </h5> -->
          <div class="dt-responsive table-responsive">
            <table id="simpletable" class="table table-striped table-bordered nowrap">
              <thead>
                <tr>
                  <th scope="col">#</th>                  
                  <th scope="col">Author Info</th>                  
                  <th scope="col">Creative-Work Info</th>                  
                  <th scope="col">Submitted At</th>                  
                  <th scope="col">Published Status</th>                  
                  <th scope="col">Published Action</th>                  
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(count($rows)>0){ $sl=1; foreach($rows as $row){?>
                  <tr>
                    <th scope="row"><?=$sl++?></th>
                    <td>
                      <?=$row->first_name?> <?=$row->last_name?><br> <?=$row->email?></td>
                    <td>
                      <?=wordwrap($row->creative_Work,30,"<br>\n")?></td>                    
                    <td><?=date_format(date_create($row->created_at), "M d, Y")?></td>                                       
                    <td>
                    <?php
                      if($row->is_published == 0){
                          echo "<h6>Submitted</h6>";
                      } elseif($row->is_published == 1){
                          echo "<h6>Final Edited & Checked</h6>";
                      } elseif($row->is_published == 2){
                          echo "<h6>NELP Form Generated & Shared</h6>";
                      } elseif($row->is_published == 3){
                          echo "<h6>Scan Copy Uploaded</h6>";
                      } elseif($row->is_published == 4){
                          echo "<h6>Approved</h6>";
                      } elseif($row->is_published == 5){
                          echo "<h6>Rejected</h6>";
                      }
                      ?>
                    </td>
                    <td>
                      <?php if ($row->is_published == '0' || $row->is_published == '1') { ?>
                        <a href="<?=url('admin/' . $controllerRoute . '/change_status_accept/'.Helper::encoded($row->id))?>" class="btn btn-success btn-sm" title="Accept <?=$module['title']?>">Accept</a>
                        <a href="<?=url('admin/' . $controllerRoute . '/change_status_reject/'.Helper::encoded($row->id))?>" class="btn btn-danger btn-sm" title="Reject <?=$module['title']?>">Reject</a>
                     <?php } elseif($row->is_published == '2'){?>
                        <a href="<?=url('admin/' . $controllerRoute . '/change_status_reject/'.Helper::encoded($row->id))?>" class="btn btn-danger btn-sm" title="Reject <?=$module['title']?>">Reject</a>
                     <?php } else{ ?>
                        <a href="<?=url('admin/' . $controllerRoute . '/change_status_accept/'.Helper::encoded($row->id))?>" class="btn btn-success btn-sm" title="Accept <?=$module['title']?>">Accept</a>
                     <?php } ?>
                      
                    </td>
                    <td>
                      <!-- <a href="<?=url('admin/' . $controllerRoute . '/edit/'.Helper::encoded($row->id))?>" class="btn btn-outline-primary btn-sm" title="Edit <?=$module['title']?>"><i class="fa fa-edit"></i></a> -->
                      <a href="<?=url('admin/' . $controllerRoute . '/view_details/'.Helper::encoded($row->id))?>" class="btn btn-outline-primary btn-sm" title="ViewDetails <?=$module['title']?>">View Details</a>
                      <a href="<?=url('admin/' . $controllerRoute . '/delete/'.Helper::encoded($row->id))?>" class="btn btn-outline-danger btn-sm" title="Delete <?=$module['title']?>" onclick="return confirm('Do You Want To Delete This <?=$module['title']?>');"><i class="fa fa-trash"></i></a>
                      <!-- <?php if($row->status){?>
                        <a href="<?=url('admin/' . $controllerRoute . '/change-status/'.Helper::encoded($row->id))?>" class="btn btn-outline-success btn-sm" title="Activate <?=$module['title']?>"><i class="fa fa-check"></i></a>
                      <?php } else {?>
                        <a href="<?=url('admin/' . $controllerRoute . '/change-status/'.Helper::encoded($row->id))?>" class="btn btn-outline-warning btn-sm" title="Deactivate <?=$module['title']?>"><i class="fa fa-times"></i></a>
                      <?php }?> -->
                    </td>
                  </tr>
                <?php } } else {?>
                  <tr>
                    <td colspan="9" style="text-align: center;color: red;">No Records Found !!!</td>
                  </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><?php /**PATH G:\xampp8.2\htdocs\ecosymbiont\resources\views/admin/maincontents/article/list.blade.php ENDPATH**/ ?>