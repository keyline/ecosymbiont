<?php
use App\Models\User;
use App\Models\Property;
use App\Models\Unit;
use App\Models\EnquiryLead;
use App\Helpers\Helper;
$controllerRoute = $module['controller_route'];

$property     = Property::select('name')->where('id', '=', $row->property_id)->first();
$propertyUnit = Unit::select('name', 'price')->where('id', '=', $row->unit_id)->first();
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
                <th>Enquiry No.</th>
                <td><?=$row->enquiry_no?></td>
              </tr>
              <tr>
                <th>Name</th>
                <td><?=$row->first_name.' '.$row->last_name?></td>
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
                <th>Address</th>
                <td><?=$row->address?></td>
              </tr>
              <tr>
                <th>Country</th>
                <td><?=$row->country?></td>
              </tr>
              <tr>
                <th>State</th>
                <td><?=$row->state?></td>
              </tr>
              <tr>
                <th>City</th>
                <td><?=$row->city?></td>
              </tr>
              <!-- <tr>
                <th>Locality</th>
                <td><?=$row->locality?></td>
              </tr>
              <tr>
                <th>Street No.</th>
                <td><?=$row->street_no?></td>
              </tr>
              <tr>
                <th>Zipcode</th>
                <td><?=$row->zipcode?></td>
              </tr>
              <tr>
                <th>Latitude</th>
                <td><?=$row->latitude?></td>
              </tr>
              <tr>
                <th>Longitude</th>
                <td><?=$row->longitude?></td>
              </tr> -->
              <tr>
                <th>Property Type</th>
                <td><?=$row->property_type?></td>
              </tr>
              <tr>
                <th>Status</th>
                <td><?=$row->lead_status?></td>
              </tr>
              <tr>
                <th>Enquiry Date/Time</th>
                <td><?=date_format(date_create($row->created_at), "M d, Y h:i A")?></td>
              </tr>
            </table>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
</section><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/admin/maincontents/lead/landlord-lead-details.blade.php ENDPATH**/ ?>