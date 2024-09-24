<?php
use App\Models\User;
use App\Models\Property;
use App\Models\Unit;
use App\Models\EnquiryLead;
use App\Models\UserAssignPropertyUnit;
use App\Models\EmailLog;
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
                <th scope="col">Property<br>Unit</th>
                <th scope="col">Name<br>Email<br>Phone</th>
                <th scope="col">Estimated Price / Month</th>
                <th scope="col">Preferred Call Date<br>Preferred Call Time</th>
                <th scope="col">Enquiry Date/Time</th>
                <th scope="col">Status</th>
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
                    $property     = Property::select('name')->where('id', '=', $row->property_id)->first();
                    $propertyUnit = Unit::select('name', 'price')->where('id', '=', $row->unit_id)->first();
                    echo (($property)?$property->name:'').'<br>';
                    echo (($propertyUnit)?$propertyUnit->name:'');
                    ?>
                  </td>
                  <td>
                    <?=$row->first_name.' '.$row->last_name?><br>
                    <?=$row->email?><br>
                    <?=$row->phone?>
                  </td>
                  <td>$<?=number_format($row->price_estimate_val,2)?></td>
                  <td>
                    <?=date_format(date_create($row->preferred_date), "M d, Y")?><br>
                    <?=date_format(date_create($row->preferred_time), "h:i A")?>
                  </td>
                  <td><?=date_format(date_create($row->created_at), "M d, Y h:i A")?></td>
                  <td>
                    <p class="mb-3">
                      <?php if($row->status == 1){?>
                        <span class="badge bg-primary">Under Process</span>
                      <?php } else if($row->status == 2){?>
                        <span class="badge bg-warning">Hot Prospect</span>
                        <?php
                        $checlAlreadyTenant = UserAssignPropertyUnit::where('lead_id', '=', $row->id)->count();
                        if($checlAlreadyTenant <= 0){
                        ?>
                          <!-- <p><a href="<?=url('admin/leads/mark-as-tenant/'.Helper::encoded($row->id))?>" class="btn btn-outline-primary btn-sm">Mark As Tenant</a></p> -->
                        <?php } else {?>
                          <!-- <p class="badge bg-primary">Already Marked As Tenant</p> -->
                        <?php }?>
                      <?php } else if($row->status == 3){?>
                        <span class="badge bg-success">Completed</span>
                      <?php } else if($row->status == 4){?>
                        <span class="badge bg-info">Cold Prospect</span>
                      <?php } else if($row->status == 5){?>
                        <span class="badge bg-danger">Rejected</span>
                      <?php }?>
                    </p>
                    <?php if($row->status != 3){?>
                      <form method="GET" action="<?=url('admin/leads/change-status/'.Helper::encoded($row->id))?>">
                        <select class="form-control" name="status" onchange="this.form.submit();">
                          <option value="1" <?=(($row->status == 1)?'selected':'')?>>Under Process</option>
                          <option value="2" <?=(($row->status == 2)?'selected':'')?>>Hot Prospect</option>
                          <option value="3" <?=(($row->status == 3)?'selected':'')?>>Completed</option>
                          <option value="4" <?=(($row->status == 4)?'selected':'')?>>Cold Prospect</option>
                          <option value="5" <?=(($row->status == 5)?'selected':'')?>>Rejected</option>
                        </select>
                      </form>
                    <?php } ?>
                  </td>
                  <td>
                    <a href="<?=url('admin/' . $controllerRoute . '/view-details/'.Helper::encoded($row->id))?>" class="btn btn-outline-info btn-sm" title="View <?=$module['title']?>"><i class="fa fa-eye"></i> View Details</a>
                    <?php if($row->status == 3){ 
                      $checlAlreadyTenant = UserAssignPropertyUnit::where('lead_id', '=', $row->id)->count();
                      if($checlAlreadyTenant <= 0){?>
                      <br><br>
                      <a href="<?=url('admin/' . $controllerRoute . '/tenant-signup/'.Helper::encoded($row->id))?>" class="btn btn-outline-primary btn-sm" title="Signup <?=$module['title']?>" onclick="return confirm('Do you want to signup this lead & send credentials to this stakeholder ?');"><i class="fa fa-envelope"></i> Signup & Send Credentials</a>
                    <?php } }?>
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
</section><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/admin/maincontents/lead/list.blade.php ENDPATH**/ ?>