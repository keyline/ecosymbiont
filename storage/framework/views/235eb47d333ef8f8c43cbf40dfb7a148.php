<?php
use App\Models\User;
use App\Models\Property;
use App\Models\Unit;
use App\Models\EnquiryLead;
use App\Models\UserAssignPropertyUnit;
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
          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Enquiry No.</th>
                <th scope="col">Property</th>
                <th scope="col">Unit</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if($rows){ $sl=1; foreach($rows as $row){?>
                <tr>
                  <th scope="row"><?=$sl++?></th>
                  <td><?=$row->enquiry_no?></td>
                  <td>
                    <?php
                    $property     = Property::select('address')->where('id', '=', $row->property_id)->first();
                    echo (($property)?$property->address:'');
                    ?>
                  </td>
                  <td>
                    <?php
                    $propertyUnit = Unit::select('name', 'price')->where('id', '=', $row->unit_id)->first();
                    echo (($propertyUnit)?$propertyUnit->name:'');
                    ?>
                  </td>
                  <td>
                    <?php if($row->access_personal_info){?>
                      <span class="badge bg-success"><i class="fa fa-check-circle"></i> Access Given</span>
                    <?php } else {?>
                      <a href="<?=url('admin/' . $controllerRoute . '/give-access-documents/'.Helper::encoded($row->id).'/'.Helper::encoded('access_personal_info').'/'.Helper::encoded($row->user_id))?>" class="btn btn-info btn-sm" title="Edit <?=$module['title']?>"><i class="fa fa-key"></i> Given Access For Personal Info</a>
                    <?php } ?>
                    <br><br>
                    <?php if($row->access_kin_indemnity){?>
                      <span class="badge bg-success"><i class="fa fa-check-circle"></i> Access Given</span>
                    <?php } else {?>
                      <a href="<?=url('admin/' . $controllerRoute . '/give-access-documents/'.Helper::encoded($row->id).'/'.Helper::encoded('access_kin_indemnity').'/'.Helper::encoded($row->user_id))?>" class="btn btn-info btn-sm" title="Edit <?=$module['title']?>"><i class="fa fa-key"></i> Given Access For Kin Indemnity</a>
                    <?php } ?>
                  </td>
                </tr>
              <?php } }?>
            </tbody>
          </table>
          <!-- End Table with stripped rows -->
        </div>
      </div>
    </div>
  </div>
</section><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/admin/maincontents/tenant/assign-list.blade.php ENDPATH**/ ?>