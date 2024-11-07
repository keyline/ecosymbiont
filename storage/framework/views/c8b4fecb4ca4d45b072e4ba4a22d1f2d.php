<?php
use App\Models\Category;
use App\Models\ListingAd;
use App\Models\ListingAdsImage;
use App\Models\ListingAdDocument;
use App\Helpers\Helper;
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="row mt-2">
   <div class="col-xl-12">
      <?php if(session('success_message')): ?>
        <!-- <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show autohide" role="alert">
          <?php echo e(session('success_message')); ?>

          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> -->
        <script>
          $(function(){
              Swal.fire({
                  title: 'Success!',
                  text: '<?=session('success_message')?>',
                  icon: 'success',
                  confirmButtonText: 'Ok'
              });
          });
      </script>
      <?php endif; ?>
      <?php if(session('error_message')): ?>
        <!-- <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show autohide" role="alert">
          <?php echo e(session('error_message')); ?>

          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> -->
        <script>
          $(function(){
              Swal.fire({
                  title: 'Error!',
                  text: '<?=session('error_message')?>',
                  icon: 'error',
                  confirmButtonText: 'Ok'
              });
          });
      </script>
      <?php endif; ?>
   </div>
   <?php
    if($row){
      $name                             = $row->name;
      $manufacturer_id                  = $row->manufacturer_id;
      $cover_image                      = $row->cover_image;
      $model                            = $row->model;
      $serial_number                    = $row->serial_number;
      $hours                            = $row->hours;
      $year                             = $row->year;
      $asking_price                     = $row->asking_price;
      $source_id                        = $row->source_id;
      $parent_category_id               = $row->parent_category_id;
      $child_category_id                = $row->child_category_id;
      $overall_condition                = $row->overall_condition;
      $engine_burns_oil                 = $row->engine_burns_oil;
      $engine_oil_leaks                 = $row->engine_oil_leaks;
      $conveyor_belt_condition          = $row->conveyor_belt_condition;
      $engine_parts_condition           = $row->engine_parts_condition;
      $engine_condition                 = $row->engine_condition;
      $rollers                          = $row->rollers;
      $tracks                           = $row->tracks;
      $tracks_condition                 = $row->tracks_condition;
      $wheels                           = $row->wheels;
      $wheels_condition                 = $row->wheels_condition;
      $pumps_motors_leaks               = $row->pumps_motors_leaks;
      $hose_leaks                       = $row->hose_leaks;
      $hydraulic_system_condition       = $row->hydraulic_system_condition;
      $physical_damage                  = $row->physical_damage;
      $paint_condition                  = $row->paint_condition;
      $overall_appearance               = $row->overall_appearance;
      $addl_info                        = $row->addl_info;
      $sale_availability                = $row->sale_availability;
      $is_price_show                    = $row->is_price_show;
      $is_feature                       = $row->is_feature;
      $is_new                           = $row->is_new;
    } else {
      $name                             = '';
      $manufacturer_id                  = '';
      $cover_image                      = '';
      $model                            = '';
      $serial_number                    = '';
      $hours                            = '';
      $year                             = '';
      $asking_price                     = '';
      $source_id                        = '';
      $parent_category_id               = '';
      $child_category_id                = '';
      $overall_condition                = '';
      $engine_burns_oil                 = '';
      $engine_oil_leaks                 = '';
      $conveyor_belt_condition          = '';
      $engine_parts_condition           = '';
      $engine_condition                 = '';
      $rollers                          = '';
      $tracks                           = '';
      $tracks_condition                 = '';
      $wheels                           = '';
      $wheels_condition                 = '';
      $pumps_motors_leaks               = '';
      $hose_leaks                       = '';
      $hydraulic_system_condition       = '';
      $physical_damage                  = '';
      $paint_condition                  = '';
      $overall_appearance               = '';
      $addl_info                        = '';
      $sale_availability                = '';
      $is_price_show                    = '';
      $is_feature                       = '';
      $is_new                           = '';
    }
   ?>
   <div class="col-xl-12">
      <div class="card">
        <div class="card-body pt-3">
          <form method="POST" action="" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row mb-3">
              <div class="col-md-12 col-lg-12">
                <label for="name">Listing Ads Name</label>
                <input type="text" name="name" class="form-control" id="name" value="<?=$name?>" required>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="font-weight-bolder mb-2 title-border-bottom">Basic Information</h4>
                  </div>
                  <div class="card-body">
                    <div class="row mb-3">
                      <div class="col-md-6 col-lg-6">
                        <label for="manufacturer_id">Manufacturer</label>
                        <select name="manufacturer_id" class="form-control" id="manufacturer_id" required>
                          <option value="" selected>Select Manufacturer</option>
                          <?php if($manufacturers){ foreach($manufacturers as $manufacturer){?>
                          <option value="<?=$manufacturer->id?>" <?=(($manufacturer->id == $manufacturer_id)?'selected':'')?>><?=$manufacturer->name?></option>
                          <?php } }?>
                        </select>
                      </div>
                      <div class="col-md-6 col-lg-6">
                        <label for="source_id">Source</label>
                        <select name="source_id" class="form-control" id="source_id" required>
                          <option value="" selected>Select Source</option>
                          <?php if($sources){ foreach($sources as $source){?>
                          <option value="<?=$source->id?>" <?=(($source->id == $source_id)?'selected':'')?>><?=$source->name?></option>
                          <?php } }?>
                        </select>
                      </div>

                      <div class="col-md-6 col-lg-6">
                        <label for="parent_category_id" class="col-md-2 col-lg-2 col-form-label">Parent Category</label>
                        <select name="parent_category_id" class="form-control" id="parent_category_id" required>
                          <option value="" selected>Select Parent Category</option>
                          <?php if($parentCats){ foreach($parentCats as $parentCat){?>
                          <option value="<?=$parentCat->id?>" <?=(($parentCat->id == $parent_category_id)?'selected':'')?>><?=$parentCat->category_name?></option>
                          <?php } }?>
                        </select>
                      </div>
                      <div class="col-md-6 col-lg-6">
                        <label for="child_category_id" class="col-md-2 col-lg-2 col-form-label">Child Category</label>
                        <select name="child_category_id" class="form-control" id="child_category_id" required>
                          <option value="" selected>Select Child Category</option>
                          <?php if($childCats){ foreach($childCats as $childCat){?>
                          <option value="<?=$childCat->id?>" <?=(($childCat->id == $child_category_id)?'selected':'')?>><?=$childCat->category_name?></option>
                          <?php } }?>
                        </select>
                      </div>

                      <div class="col-md-6 col-lg-6">
                        <label for="model">Model</label>
                        <select name="model" class="form-control" id="model" required>
                          <option value="" selected>Select Model</option>
                          <?php if($modelNumbers){ foreach($modelNumbers as $modelNumber){?>
                          <option value="<?=$modelNumber->name?>" <?=(($modelNumber->name == $model)?'selected':'')?>><?=$modelNumber->name?></option>
                          <?php } }?>
                        </select>
                      </div>
                      <div class="col-md-6 col-lg-6">
                        <label for="serial_number">Serial Number</label>
                        <input type="text" name="serial_number" class="form-control" id="serial_number" value="<?=$serial_number?>" required>
                      </div>

                      <div class="col-md-6 col-lg-6">
                        <label for="hours">Hours</label>
                        <input type="text" name="hours" class="form-control" id="hours" value="<?=$hours?>" required>
                      </div>

                      <div class="col-md-6 col-lg-6">
                        <label for="year">Year</label>
                        <select name="year" class="form-control" id="year" required>
                          <option value="" selected>Select Year </option>
                          <?php for($y=1950;$y<=date('Y');$y++){?>
                            <option value="<?=$y?>" <?=(($year == $y)?'selected':'')?>><?=$y?></option>
                          <?php }?>
                        </select>
                      </div>
                      <div class="col-md-6 col-lg-6">
                        <label for="asking_price">Asking Price</label>
                        <input type="text" name="asking_price" class="form-control" id="asking_price" value="<?=$asking_price?>" required>
                      </div>

                      <div class="col-md-6 col-lg-6">
                        <label for="overall_condition">Overall Condition </label>
                        <select name="overall_condition" class="form-control" id="overall_condition" required>
                          <option value="" selected>Select Overall Condition </option>
                          <option value="Excellent" <?=(($overall_condition == 'Excellent')?'selected':'')?>>Excellent</option>
                          <option value="Good" <?=(($overall_condition == 'Good')?'selected':'')?>>Good</option>
                          <option value="Moderate" <?=(($overall_condition == 'Moderate')?'selected':'')?>>Moderate</option>
                          <option value="Below Average" <?=(($overall_condition == 'Below Average')?'selected':'')?>>Below Average</option>
                          <option value="Poor" <?=(($overall_condition == 'Poor')?'selected':'')?>>Poor</option>
                          <option value="Not Applicable" <?=(($overall_condition == 'Not Applicable')?'selected':'')?>>Not Applicable</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="font-weight-bolder mb-2 title-border-bottom">Engine and Components (Non-mandatory for scraping)</h4>
                  </div>
                  <div class="card-body">
                    <div class="row mb-3">
                      <div class="col-md-6 col-lg-6">
                        <label for="engine_burns_oil">Engine Burns Oil </label>
                        <select name="engine_burns_oil" class="form-control" id="engine_burns_oil" required>
                          <option value="" selected>Select Engine Burns Oil </option>
                          <option value="Yes" <?=(($engine_burns_oil == 'Yes')?'selected':'')?>>Yes</option>
                          <option value="No" <?=(($engine_burns_oil == 'No')?'selected':'')?>>No</option>
                        </select>
                      </div>

                      <div class="col-md-6 col-lg-6">
                        <label for="engine_oil_leaks">Engine Oil Leaks </label>
                        <select name="engine_oil_leaks" class="form-control" id="engine_oil_leaks" required>
                          <option value="" selected>Select Engine Oil Leaks </option>
                          <option value="Yes" <?=(($engine_oil_leaks == 'Yes')?'selected':'')?>>Yes</option>
                          <option value="No" <?=(($engine_oil_leaks == 'No')?'selected':'')?>>No</option>
                        </select>
                      </div>
                      <div class="col-md-6 col-lg-6">
                        <label for="conveyor_belt_condition">Conveyor Belts Condition </label>
                        <select name="conveyor_belt_condition" class="form-control" id="conveyor_belt_condition" required>
                          <option value="" selected>Select Conveyor Belts Condition </option>
                          <option value="Excellent" <?=(($conveyor_belt_condition == 'Excellent')?'selected':'')?>>Excellent</option>
                          <option value="Good" <?=(($conveyor_belt_condition == 'Good')?'selected':'')?>>Good</option>
                          <option value="Moderate" <?=(($conveyor_belt_condition == 'Moderate')?'selected':'')?>>Moderate</option>
                          <option value="Below Average" <?=(($conveyor_belt_condition == 'Below Average')?'selected':'')?>>Below Average</option>
                          <option value="Poor" <?=(($conveyor_belt_condition == 'Poor')?'selected':'')?>>Poor</option>
                          <option value="Not Applicable" <?=(($conveyor_belt_condition == 'Not Applicable')?'selected':'')?>>Not Applicable</option>
                        </select>
                      </div>

                      <div class="col-md-6 col-lg-6">
                        <label for="engine_parts_condition">Engine Parts Condition </label>
                        <select name="engine_parts_condition" class="form-control" id="engine_parts_condition" required>
                          <option value="" selected>Select Engine Parts Condition </option>
                          <option value="Excellent" <?=(($engine_parts_condition == 'Excellent')?'selected':'')?>>Excellent</option>
                          <option value="Good" <?=(($engine_parts_condition == 'Good')?'selected':'')?>>Good</option>
                          <option value="Moderate" <?=(($engine_parts_condition == 'Moderate')?'selected':'')?>>Moderate</option>
                          <option value="Below Average" <?=(($engine_parts_condition == 'Below Average')?'selected':'')?>>Below Average</option>
                          <option value="Poor" <?=(($engine_parts_condition == 'Poor')?'selected':'')?>>Poor</option>
                          <option value="Not Applicable" <?=(($engine_parts_condition == 'Not Applicable')?'selected':'')?>>Not Applicable</option>
                        </select>
                      </div>
                      <div class="col-md-6 col-lg-6">
                        <label for="engine_condition">Engine Condition </label>
                        <select name="engine_condition" class="form-control" id="engine_condition" required>
                          <option value="" selected>Select Engine Condition </option>
                          <option value="Excellent" <?=(($engine_condition == 'Excellent')?'selected':'')?>>Excellent</option>
                          <option value="Good" <?=(($engine_condition == 'Good')?'selected':'')?>>Good</option>
                          <option value="Moderate" <?=(($engine_condition == 'Moderate')?'selected':'')?>>Moderate</option>
                          <option value="Below Average" <?=(($engine_condition == 'Below Average')?'selected':'')?>>Below Average</option>
                          <option value="Poor" <?=(($engine_condition == 'Poor')?'selected':'')?>>Poor</option>
                          <option value="Not Applicable" <?=(($engine_condition == 'Not Applicable')?'selected':'')?>>Not Applicable</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="font-weight-bolder mb-2 title-border-bottom">Drivetrain and Mechanical (Non-mandatory for scraping)</h4>
                  </div>
                  <div class="card-body">
                    <div class="row mb-3">
                      <div class="col-md-6 col-lg-6">
                        <label for="rollers">Rollers </label>
                        <select name="rollers" class="form-control" id="rollers" required>
                          <option value="" selected>Select Rollers </option>
                          <option value="Excellent" <?=(($rollers == 'Excellent')?'selected':'')?>>Excellent</option>
                          <option value="Good" <?=(($rollers == 'Good')?'selected':'')?>>Good</option>
                          <option value="Moderate" <?=(($rollers == 'Moderate')?'selected':'')?>>Moderate</option>
                          <option value="Below Average" <?=(($rollers == 'Below Average')?'selected':'')?>>Below Average</option>
                          <option value="Poor" <?=(($rollers == 'Poor')?'selected':'')?>>Poor</option>
                          <option value="Not Applicable" <?=(($rollers == 'Not Applicable')?'selected':'')?>>Not Applicable</option>
                        </select>
                      </div>
                      <div class="col-md-6 col-lg-6">
                        <label for="tracks">Tracks </label>
                        <select name="tracks" class="form-control" id="tracks" required>
                          <option value="" selected>Select Tracks </option>
                          <option value="Yes" <?=(($tracks == 'Yes')?'selected':'')?>>Yes</option>
                          <option value="No" <?=(($tracks == 'No')?'selected':'')?>>No</option>
                        </select>
                      </div>
                      <div class="col-md-6 col-lg-6">
                        <label for="tracks_condition">Tracks Condition</label>
                        <select name="tracks_condition" class="form-control" id="tracks_condition" required>
                          <option value="" selected>Select Tracks Condition</option>
                          <option value="Excellent" <?=(($tracks_condition == 'Excellent')?'selected':'')?>>Excellent</option>
                          <option value="Good" <?=(($tracks_condition == 'Good')?'selected':'')?>>Good</option>
                          <option value="Moderate" <?=(($tracks_condition == 'Moderate')?'selected':'')?>>Moderate</option>
                          <option value="Below Average" <?=(($tracks_condition == 'Below Average')?'selected':'')?>>Below Average</option>
                          <option value="Poor" <?=(($tracks_condition == 'Poor')?'selected':'')?>>Poor</option>
                          <option value="Not Applicable" <?=(($tracks_condition == 'Not Applicable')?'selected':'')?>>Not Applicable</option>
                        </select>
                      </div>
                      <div class="col-md-6 col-lg-6">
                        <label for="wheels">Wheels</label>
                        <select name="wheels" class="form-control" id="wheels" required>
                          <option value="" selected>Select Wheels</option>
                          <option value="Yes" <?=(($wheels == 'Yes')?'selected':'')?>>Yes</option>
                          <option value="No" <?=(($wheels == 'No')?'selected':'')?>>No</option>
                        </select>
                      </div>
                      <div class="col-md-6 col-lg-6">
                        <label for="wheels_condition">Wheels Condition</label>
                        <select name="wheels_condition" class="form-control" id="wheels_condition" required>
                          <option value="" selected>Select Wheels Condition</option>
                          <option value="Excellent" <?=(($wheels_condition == 'Excellent')?'selected':'')?>>Excellent</option>
                          <option value="Good" <?=(($wheels_condition == 'Good')?'selected':'')?>>Good</option>
                          <option value="Moderate" <?=(($wheels_condition == 'Moderate')?'selected':'')?>>Moderate</option>
                          <option value="Below Average" <?=(($wheels_condition == 'Below Average')?'selected':'')?>>Below Average</option>
                          <option value="Poor" <?=(($wheels_condition == 'Poor')?'selected':'')?>>Poor</option>
                          <option value="Not Applicable" <?=(($wheels_condition == 'Not Applicable')?'selected':'')?>>Not Applicable</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="font-weight-bolder mb-2 title-border-bottom">Hydraulics (Non-mandatory for scraping)</h4>
                  </div>
                  <div class="card-body">
                    <div class="row mb-3">
                      <div class="col-md-6 col-lg-6">
                        <label for="pumps_motors_leaks">Pumps and Motor Leaks </label>
                        <select name="pumps_motors_leaks" class="form-control" id="pumps_motors_leaks" required>
                          <option value="" selected>Select Pumps and Motor Leaks </option>
                          <option value="Yes" <?=(($pumps_motors_leaks == 'Yes')?'selected':'')?>>Yes</option>
                          <option value="No" <?=(($pumps_motors_leaks == 'No')?'selected':'')?>>No</option>
                        </select>
                      </div>

                      <div class="col-md-6 col-lg-6">
                        <label for="hose_leaks">Hose Leaks </label>
                        <select name="hose_leaks" class="form-control" id="hose_leaks" required>
                          <option value="" selected>Select Hose Leaks </option>
                          <option value="Yes" <?=(($hose_leaks == 'Yes')?'selected':'')?>>Yes</option>
                          <option value="No" <?=(($hose_leaks == 'No')?'selected':'')?>>No</option>
                        </select>
                      </div>
                      <div class="col-md-6 col-lg-6">
                        <label for="hydraulic_system_condition">Hydraulic System Condition </label>
                        <select name="hydraulic_system_condition" class="form-control" id="hydraulic_system_condition" required>
                          <option value="" selected>Select Hydraulic System Condition </option>
                          <option value="Excellent" <?=(($hydraulic_system_condition == 'Excellent')?'selected':'')?>>Excellent</option>
                          <option value="Good" <?=(($hydraulic_system_condition == 'Good')?'selected':'')?>>Good</option>
                          <option value="Moderate" <?=(($hydraulic_system_condition == 'Moderate')?'selected':'')?>>Moderate</option>
                          <option value="Below Average" <?=(($hydraulic_system_condition == 'Below Average')?'selected':'')?>>Below Average</option>
                          <option value="Poor" <?=(($hydraulic_system_condition == 'Poor')?'selected':'')?>>Poor</option>
                          <option value="Not Applicable" <?=(($hydraulic_system_condition == 'Not Applicable')?'selected':'')?>>Not Applicable</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="font-weight-bolder mb-2 title-border-bottom">Body (Non-mandatory for scraping)</h4>
                  </div>
                  <div class="card-body">
                    <div class="row mb-3">
                      <div class="col-md-6 col-lg-6">
                        <label for="physical_damage">Physical Damage  </label>
                        <select name="physical_damage" class="form-control" id="physical_damage" required>
                          <option value="" selected>Select Physical Damage </option>
                          <option value="Yes" <?=(($physical_damage == 'Yes')?'selected':'')?>>Yes</option>
                          <option value="No" <?=(($physical_damage == 'No')?'selected':'')?>>No</option>
                        </select>
                      </div>
                      <div class="col-md-6 col-lg-6">
                        <label for="paint_condition">Paint Condition  </label>
                        <select name="paint_condition" class="form-control" id="paint_condition" required>
                          <option value="" selected>Select Paint Condition  </option>
                          <option value="Excellent" <?=(($paint_condition == 'Excellent')?'selected':'')?>>Excellent</option>
                          <option value="Good" <?=(($paint_condition == 'Good')?'selected':'')?>>Good</option>
                          <option value="Moderate" <?=(($paint_condition == 'Moderate')?'selected':'')?>>Moderate</option>
                          <option value="Below Average" <?=(($paint_condition == 'Below Average')?'selected':'')?>>Below Average</option>
                          <option value="Poor" <?=(($paint_condition == 'Poor')?'selected':'')?>>Poor</option>
                          <option value="Not Applicable" <?=(($paint_condition == 'Not Applicable')?'selected':'')?>>Not Applicable</option>
                        </select>
                      </div>
                      <div class="col-md-6 col-lg-6">
                        <label for="overall_appearance">Overall Appearance  </label>
                        <select name="overall_appearance" class="form-control" id="overall_appearance" required>
                          <option value="" selected>Select Overall Appearance  </option>
                          <option value="Excellent" <?=(($overall_appearance == 'Excellent')?'selected':'')?>>Excellent</option>
                          <option value="Good" <?=(($overall_appearance == 'Good')?'selected':'')?>>Good</option>
                          <option value="Moderate" <?=(($overall_appearance == 'Moderate')?'selected':'')?>>Moderate</option>
                          <option value="Below Average" <?=(($overall_appearance == 'Below Average')?'selected':'')?>>Below Average</option>
                          <option value="Poor" <?=(($overall_appearance == 'Poor')?'selected':'')?>>Poor</option>
                          <option value="Not Applicable" <?=(($overall_appearance == 'Not Applicable')?'selected':'')?>>Not Applicable</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="font-weight-bolder mb-2 title-border-bottom">Other Information</h4>
                  </div>
                  <div class="card-body">
                    <div class="row mb-3">
                      <div class="col-md-12 col-lg-12">
                        <label for="addl_info">Additional Information </label>
                        <textarea name="addl_info" class="form-control" rows="5" id="addl_info" required rows="5"><?=$addl_info?></textarea>
                      </div>
                      <div class="col-md-6 col-lg-6">
                        <label for="sale_availability">Availability For Sale   </label>
                        <select name="sale_availability" class="form-control" id="sale_availability" required>
                          <option value="" selected>Select Availability For Sale  </option>
                          <option value="Available" <?=(($sale_availability == 'Available')?'selected':'')?>>Available</option>
                          <option value="Sold" <?=(($sale_availability == 'Sold')?'selected':'')?>>Sold</option>
                        </select>
                      </div>
                      <div class="col-md-6 col-lg-6">
                        <label for="is_price_show">Price Show  </label>
                        <select name="is_price_show" class="form-control" id="is_price_show" required>
                          <option value="" selected>Select Price Show </option>
                          <option value="Yes" <?=(($is_price_show == 'Yes')?'selected':'')?>>Yes</option>
                          <option value="No" <?=(($is_price_show == 'No')?'selected':'')?>>No</option>
                        </select>
                      </div>
                      <div class="col-md-6 col-lg-6">
                        <label for="is_feature">Feature  </label>
                        <select name="is_feature" class="form-control" id="is_feature" required>
                          <option value="" selected>Select Feature </option>
                          <option value="Yes" <?=(($is_feature == 'Yes')?'selected':'')?>>Yes</option>
                          <option value="No" <?=(($is_feature == 'No')?'selected':'')?>>No</option>
                        </select>
                      </div>
                      <div class="col-md-6 col-lg-6">
                        <label for="is_new">New  </label>
                        <select name="is_new" class="form-control" id="is_new" required>
                          <option value="" selected>Select New </option>
                          <option value="Yes" <?=(($is_new == 'Yes')?'selected':'')?>>Yes</option>
                          <option value="No" <?=(($is_new == 'No')?'selected':'')?>>No</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="font-weight-bolder mb-2 title-border-bottom">Images</h4>
                  </div>
                  <div class="card-body">
                    <div class="row mb-3">
                      <div class="col-md-6 col-lg-6">
                        <label for="image_link">Cover Image</label>
                        <input type="file" name="cover_image" class="form-control" id="cover_image">
                        <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed</small><br>
                      </div>
                      <div class="col-md-6 col-lg-6">
                        <?php if($cover_image != ''){?>
                          <img src="<?=env('UPLOADS_URL').'ads/'.$cover_image?>" alt="<?=$model?>" style="width: 150px; height: 150px; margin-top: 10px;border-radius: 50%;">
                        <?php } else {?>
                          <img src="<?=env('NO_IMAGE')?>" alt="<?=$model?>" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                        <?php }?>
                      </div>
                      <div class="col-md-12 col-lg-12">
                        <label for="other_images">Other Images</label>
                        <input type="file" name="other_images[]" class="form-control" id="other_images" multiple>
                        <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed</small><br>
                        <small class="text-info">* CTRL + select images to multiple images</small><br>
                        <div class="row">
                          <?php if($listing_id > 0){?>
                            <?php
                            $product_other_images = ListingAdsImage::where('listing_id', '=', $listing_id)->where('status', '=', 1)->get();
                            if($product_other_images){ foreach($product_other_images as $product_other_image){
                            ?>
                              <div class="col-md-2">
                                <img src="<?=env('UPLOADS_URL').'ads/'.$product_other_image->image_link?>" alt="<?=$model?>" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;"><br>
                                <a href="<?=url('user/my-listing-ad-delete-single-image/'.Helper::encoded($product_other_image->id).'/'.Helper::encoded($listing_id))?>" class="btn btn-danger btn-sm" onclick="return confirm('Do You Want To Delete This Image ?')"><i class="fa fa-trash"></i> Delete</a>
                              </div>
                            <?php } } else {?>
                              <img src="<?=env('NO_IMAGE')?>" alt="<?=$model?>" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                            <?php }?>
                          <?php }?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="font-weight-bolder mb-2 title-border-bottom">Related Documents</h4>
                  </div>
                  <div class="card-body">
                    <div class="field_wrapper1" style="padding: 10px;margin-bottom: 10px;">
                      <?php
                      $product_related_docs = ListingAdDocument::where('listing_id', '=', $listing_id)->where('status', '=', 1)->get();
                      if($product_related_docs){ foreach($product_related_docs as $product_related_doc){
                      ?>
                        <div class="row mt-3">
                          <div class="col-md-5">
                            <label for="other_images">Document Name</label>
                            <input type="text" class="form-control" name="doc_name[]" autocomplete="off" value="<?=$product_related_doc->doc_name?>">
                          </div>
                          <div class="col-md-5">
                            <label for="other_images">Document File</label>
                            <input type="file" class="form-control" name="doc_file[]" autocomplete="off" accept="application/pdf">
                            <small class="text-info">* Only PDF files are allowed</small><br>
                            <?php if($product_related_doc->doc_file != ''){?>
                              <a href="<?=env('UPLOADS_URL').'ads/'.$product_related_doc->doc_file?>" class="badge bg-info" target="_blank"><i class="fa fa-eye"></i> View Document</a>
                            <?php }?>
                          </div>
                          <div class="col-md-2" style="margin-top: 25px;">
                            <a href="javascript:void(0);" class="remove_button1" title="Remove field"><i class="fa fa-minus-circle fa-2x text-danger"></i></a>
                          </div>                                    
                        </div>
                      <?php } }?>
                      <div class="row mt-3">
                        <div class="col-md-5">
                          <label for="other_images">Document Name</label>
                          <input type="text" class="form-control" name="doc_name[]" autocomplete="off">
                        </div>
                        <div class="col-md-5">
                          <label for="other_images">Document File</label>
                          <input type="file" class="form-control" name="doc_file[]" autocomplete="off" accept="application/pdf">
                          <small class="text-info">* Only PDF files are allowed</small><br>
                        </div>
                        <div class="col-md-2" style="margin-top: 25px;">
                          <a href="javascript:void(0);" class="add_button1" title="Add field"><i class="fa fa-plus-circle fa-2x text-success"></i></a>
                        </div>                                    
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="text-center">
              <button type="submit" class="btn bg-gradient-dark mb-0"><?=(($row)?'Save':'Add')?></button>
            </div>
          </form>
        </div>
      </div>
   </div>
</div>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){    
    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
        removeItemButton: true,
        maxItemCount:30,
        searchResultLimit:30,
        renderChoiceLimit:30
    });     
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){        
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button1'); //Add button selector
    var wrapper = $('.field_wrapper1'); //Input field wrapper
    var fieldHTML = '<div class="row mt-3">\
                        <div class="col-md-5">\
                          <label>Document Name</label>\
                          <input type="text" class="form-control" name="doc_name[]" autocomplete="off" required>\
                        </div>\
                        <div class="col-md-5">\
                          <label>Document File</label>\
                          <input type="file" class="form-control" name="doc_file[]" autocomplete="off" required accept="application/pdf">\
                          <small class="text-info">* Only PDF files are allowed</small><br>\
                        </div>\
                        <div class="col-md-2" style="margin-top: 25px;">\
                          <a href="javascript:void(0);" class="remove_button1" title="Remove field"><i class="fa fa-minus-circle fa-2x text-danger"></i></a>\
                        </div>\
                    </div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button1', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
  });
</script><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/front/pages/user/post-listing-ad.blade.php ENDPATH**/ ?>