<?php
use App\Models\PropertyType;
use App\Models\Property;
use App\Models\PropertyImage;
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
          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">No. Of Unit<br>No. Of Floor<br>No. Of Lift<br>Total Area</th>
                <th scope="col">Property Type<br>Floorings<br>Water Availability<br>Status Of Electricities</th>
                <!-- <th scope="col">Description</th> -->
                <th scope="col">Pets<br>Smoking<br>Couples<br>Children</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if($rows){ $sl=1; foreach($rows as $row){?>
                <tr>
                  <th scope="row"><?=$sl++?></th>
                  <td><?=$row->name?></td>
                  <td>
                    <?=$row->address?><br>
                    <?=$row->country?><br>
                    <?=$row->state?><br>
                    <?=$row->city?><br>
                    <?=$row->locality?><br>
                    <?=$row->street_no?><br>
                    <?=$row->zipcode?>
                  </td>
                  <td>
                    <?=$row->no_unit?><br>
                    <?=$row->no_of_floor?><br>
                    <?=$row->no_of_lift?><br>
                    <?=$row->total_sper_built_area?> sqft
                  </td>
                  <td>
                    <?php
                    $property_type = PropertyType::select('name')->where('id', '=', $row->property_type)->first();
                    echo (($property_type)?$property_type->name:'');
                    ?>
                    <br>
                    <?=$row->floorings?><br>
                    <?=$row->water_avl?><br>
                    <?=$row->electricities?>
                  </td>
                  <!-- <td><?=wordwrap($row->description,30,"<br>\n")?></td> -->
                  <td>
                    <span class="badge <?=(($row->is_pets)?'bg-success':'bg-danger')?>"><?=(($row->is_pets)?'ALLOWED':'NOT ALLOWED')?></span><br>
                    <span class="badge <?=(($row->is_smoking)?'bg-success':'bg-danger')?>"><?=(($row->is_smoking)?'ALLOWED':'NOT ALLOWED')?></span><br>
                    <span class="badge <?=(($row->is_couple)?'bg-success':'bg-danger')?>"><?=(($row->is_couple)?'ALLOWED':'NOT ALLOWED')?></span><br>
                    <span class="badge <?=(($row->is_children)?'bg-success':'bg-danger')?>"><?=(($row->is_children)?'ALLOWED':'NOT ALLOWED')?></span>
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
          <!-- End Table with stripped rows -->
        </div>
      </div>
    </div>
  </div>
</section><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/admin/maincontents/property/list.blade.php ENDPATH**/ ?>