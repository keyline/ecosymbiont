<?php
use App\Models\PropertyType;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\Unit;
use App\Models\UnitImage;
use App\Models\Amenity;

use App\Helpers\Helper;
$controllerRoute = $module['controller_route'];
?>
<div class="pagetitle">
  <h1><?=$page_header?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=url('admin/dashboard')?>">Home</a></li>
      <li class="breadcrumb-item active"><a href="<?=url('admin/' . $controllerRoute . '/list/')?>"><?=$module['title']?> List</a></li>
      <li class="breadcrumb-item active"><?=$page_header?></li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->
<section class="section profile">
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
    <?php
      if($row){
        $unit_id                = $row->id;
        $property_id            = $row->property_id;
        $name                   = $row->name;
        $price                  = $row->price;
        $description            = $row->description;
        $amenities              = (($row->amenities)?json_decode($row->amenities):[]);
        $cover_image            = $row->cover_image;
        $total_super_built_area = $row->total_super_built_area;
        $pets                   = $row->pets;
        $floor                  = $row->floor;
        $move_status            = $row->move_status;
        $no_of_lift             = $row->no_of_lift;
        $car_parking            = $row->car_parking;
        $no_of_bed              = $row->no_of_bed;
        $no_of_bath             = $row->no_of_bath;
        $no_of_balcony          = $row->no_of_balcony;
        $pet_name               = $row->pet_name;
        $is_pets                    = $row->is_pets;
        $is_smoking                 = $row->is_smoking;
        $is_couple                  = $row->is_couple;
        $is_children                = $row->is_children;
        $closet                = $row->closet;
        $bath_type                  = $row->bath_type;
        $separate_entry             = $row->separate_entry;
        $kitchenette                = $row->kitchenette;
        $additional_storage_space               = $row->additional_storage_space;
        $sinks                  = $row->sinks;
        $tubs                   = $row->tubs;
        $showers                = $row->showers;
      } else {
        $unit_id                = 0;
        $property_id            = '';
        $name                   = '';
        $price                  = '';
        $description            = '';
        $amenities              = [];
        $cover_image            = '';
        $total_super_built_area = '';
        $pets                   = '';
        $floor                  = '';
        $move_status            = '';
        $no_of_lift             = '';
        $car_parking            = '';
        $no_of_bed              = '';
        $no_of_bath             = '';
        $no_of_balcony          = '';
        $pet_name               = '';
        $is_pets                    = '';
        $is_smoking                 = '';
        $is_couple                  = '';
        $is_children                = '';
        $closet                = '';
        $bath_type                  = '';
        $separate_entry             = '';
        $kitchenette                = '';
        $additional_storage_space               = '';
        $sinks                  = '';
        $tubs                   = '';
        $showers                = '';
      }
      ?>
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body pt-3">
          <form method="POST" action="" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" id="counter" value="0">
            <h6 class="text-danger">Star (*) marks fields are mandatory</h6>

            <div class="row mb-3">
              <label for="property_id" class="col-md-2 col-lg-2 col-form-label fw-bold">Property <span class="text-danger">*</span></label>
              <div class="col-md-10 col-lg-10">
                <select name="property_id" class="form-control" id="property_id" required>
                  <option value="" selected>Select Property</option>
                  <?php if($properties){ foreach($properties as $property){?>
                  <option value="<?=$property->id?>" <?=(($property->id == $property_id)?'selected':'')?>><?=$property->address?></option>
                  <?php } }?>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="name" class="col-md-2 col-lg-2 col-form-label fw-bold">Name <span class="text-danger">*</span></label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="name" class="form-control" id="name" value="<?=$name?>" required>
              </div>
            </div>

            <div class="row mb-3">
              <label for="price" class="col-md-2 col-lg-2 col-form-label fw-bold">Price <span class="text-danger">*</span></label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="price" class="form-control" id="price" value="<?=$price?>" required>
              </div>
            </div>
            
            <div class="row mb-3">
              <label for="description" class="col-md-2 col-lg-2 col-form-label fw-bold">Description <span class="text-danger">*</span></label>
              <div class="col-md-10 col-lg-10">
                <textarea name="description" class="form-control" id="description" rows="5" required><?=$description?></textarea>
              </div>
            </div>

            <div class="row mb-3">
              <label for="amenities" class="col-md-2 col-lg-2 col-form-label fw-bold">Amenities <span class="text-danger">*</span></label>
              <div class="col-md-10 col-lg-10">
                <div class="row">
                  <?php if($amenityList){ foreach($amenityList as $amenity){?>
                    <div class="col-md-4 col-lg-4">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="amenities[]" value="<?=$amenity->id?>" id="amenity<?=$amenity->id?>" <?=((in_array($amenity->id, $amenities))?'checked':'')?>>
                        <label class="form-check-label" for="amenity<?=$amenity->id?>"><?=$amenity->name?></label>
                      </div>
                    </div>
                  <?php } }?>
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <label for="total_super_built_area" class="col-md-2 col-lg-2 col-form-label fw-bold">Total Super Built Area <span class="text-danger">*</span></label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="total_super_built_area" class="form-control" id="total_super_built_area" value="<?=$total_super_built_area?>" required onkeypress="return isNumber(event)">
              </div>
            </div>

            <div class="row mb-3">
              <label for="pets" class="col-md-2 col-lg-2 col-form-label fw-bold">Pets <span class="text-danger">*</span></label>
              <div class="col-md-10 col-lg-10">
                <select name="pets" class="form-control" id="pets" required>
                  <option value="" selected>Select Pets</option>
                  <option value="1" <?=(($pets == 1)?'selected':'')?>>ALLOWED</option>
                  <option value="0" <?=(($pets == 0)?'selected':'')?>>NOT ALLOWED</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="floor" class="col-md-2 col-lg-2 col-form-label fw-bold">No. Of Floors <span class="text-danger">*</span></label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="floor" class="form-control" id="floor" value="<?=$floor?>" required onkeypress="return isNumber(event)">
              </div>
            </div>

            <div class="row mb-3">
              <label for="move_status" class="col-md-2 col-lg-2 col-form-label fw-bold">Shift Status <span class="text-danger">*</span></label>
              <div class="col-md-10 col-lg-10">
                <select name="move_status" class="form-control" id="move_status" required>
                  <option value="" selected>Select Pets</option>
                  <option value="Immediately" <?=(($move_status == 'Immediately')?'selected':'')?>>Immediately</option>
                  <option value="7 Days Later" <?=(($move_status == '7 Days Later')?'selected':'')?>>7 Days Later</option>
                  <option value="10 Days Later" <?=(($move_status == '10 Days Later')?'selected':'')?>>10 Days Later</option>
                  <option value="15 Days Later" <?=(($move_status == '15 Days Later')?'selected':'')?>>15 Days Later</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="no_of_lift" class="col-md-2 col-lg-2 col-form-label fw-bold">No. Of Lift <span class="text-danger">*</span></label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="no_of_lift" class="form-control" id="no_of_lift" value="<?=$no_of_lift?>" required onkeypress="return isNumber(event)">
              </div>
            </div>

            <div class="row mb-3">
              <label for="car_parking" class="col-md-2 col-lg-2 col-form-label fw-bold">Car Parking <span class="text-danger">*</span></label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="car_parking" class="form-control" id="car_parking" value="<?=$car_parking?>" required>
              </div>
            </div>

            <div class="row mb-3">
              <label for="no_of_bed" class="col-md-2 col-lg-2 col-form-label fw-bold">Beds <span class="text-danger">*</span></label>
              <div class="col-md-10 col-lg-10">
                <select name="no_of_bed" class="form-control" id="no_of_bed" required>
                  <option value="" selected>Select Beds</option>
                  <?php if($beds){ foreach($beds as $row){?>
                  <option value="<?=$row->name?>" <?=(($row->name == $no_of_bed)?'selected':'')?>><?=$row->name?></option>
                  <?php } }?>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="no_of_bath" class="col-md-2 col-lg-2 col-form-label fw-bold">Baths <span class="text-danger">*</span></label>
              <div class="col-md-10 col-lg-10">
                <select name="no_of_bath" class="form-control" id="no_of_bath" required>
                  <option value="" selected>Select Baths</option>
                  <?php if($baths){ foreach($baths as $row){?>
                  <option value="<?=$row->name?>" <?=(($row->name == $no_of_bath)?'selected':'')?>><?=$row->name?></option>
                  <?php } }?>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="no_of_balcony" class="col-md-2 col-lg-2 col-form-label fw-bold">Balconies <span class="text-danger">*</span></label>
              <div class="col-md-10 col-lg-10">
                <select name="no_of_balcony" class="form-control" id="no_of_balcony" required>
                  <option value="" selected>Select Balconies</option>
                  <?php if($balconies){ foreach($balconies as $row){?>
                  <option value="<?=$row->name?>" <?=(($row->name == $no_of_balcony)?'selected':'')?>><?=$row->name?></option>
                  <?php } }?>
                </select>
              </div>
            </div>

            <!-- <div class="row mb-3">
              <label for="pet_name" class="col-md-2 col-lg-2 col-form-label fw-bold">Pets <span class="text-danger">*</span></label>
              <div class="col-md-10 col-lg-10">
                <select name="pet_name" class="form-control" id="pet_name" required>
                  <option value="" selected>Select Pets</option>
                  <?php if($petList){ foreach($petList as $row){?>
                  <option value="<?=$row->name?>" <?=(($row->name == $pet_name)?'selected':'')?>><?=$row->name?></option>
                  <?php } }?>
                </select>
              </div>
            </div> -->

            <div class="row mb-3">
              <label for="cover_image" class="col-md-2 col-lg-2 col-form-label fw-bold">Cover Image <span class="text-danger">*</span></label>
              <div class="col-md-10 col-lg-10">
                <input type="file" name="cover_image" class="form-control" id="cover_image">
                <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed</small><br>
                <?php if($cover_image != ''){?>
                  <img src="<?=env('UPLOADS_URL').'property/'.$cover_image?>" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                <?php } else {?>
                  <img src="<?=env('NO_IMAGE')?>" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                <?php }?>
              </div>
            </div>

            <div class="row mb-3">
              <label for="unit_image" class="col-md-2 col-lg-2 col-form-label fw-bold">Other Images</label>
              <div class="col-md-10 col-lg-10">
                <input type="file" name="unit_image[]" class="form-control" id="unit_image" multiple>
                <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed</small><br>
                <?php if($unit_id > 0){?>
                  <div class="row">
                    <?php
                    $unitImages = UnitImage::select('id', 'unit_id', 'unit_id', 'unit_image')->where('status', '=', 1)->where('unit_id', '=', $unit_id)->get();
                    if($unitImages){ foreach($unitImages as $unitImg){
                    ?>
                      <div class="col-md-2">
                        <?php if($unitImg->unit_image != ''){?>
                          <img src="<?=env('UPLOADS_URL').'property/'.$unitImg->unit_image?>" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                          <a href="<?=url('admin/' . $controllerRoute . '/delete-single-image/'.Helper::encoded($unitImg->id).'/'.Helper::encoded($unitImg->unit_id))?>" class="btn btn-danger btn-sm" onclick="return confirm('Do You Want To Delete This Unit Image ?');"><i class="fa fa-trash"></i> Remove</a>
                        <?php } else {?>
                          <img src="<?=env('NO_IMAGE')?>" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                        <?php }?>
                      </div>
                    <?php } }?>
                  </div>
                <?php }?>
              </div>
            </div>

            <div class="row mb-3">
              <input type="hidden" name="pet_name" value="<?=$pet_name?>">
              <label for="is_pets" class="col-md-2 col-lg-2 col-form-label fw-bold">Pets <span class="text-danger">*</span></label>
              <div class="col-md-10 col-lg-10">
                <select name="is_pets" class="form-control" id="is_pets" required>
                  <option value="" selected>Select Pets</option>
                  <option value="Allowed" <?=(($is_pets == 'Allowed')?'selected':'')?>>Allowed</option>
                  <option value="Not Allowed" <?=(($is_pets == 'Not Allowed')?'selected':'')?>>Not Allowed</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="is_smoking" class="col-md-2 col-lg-2 col-form-label fw-bold">Smoking <span class="text-danger">*</span></label>
              <div class="col-md-10 col-lg-10">
                <select name="is_smoking" class="form-control" id="is_smoking" required>
                  <option value="" selected>Select Smoking</option>
                  <option value="Allowed" <?=(($is_smoking == 'Allowed')?'selected':'')?>>Allowed</option>
                  <option value="Not Allowed" <?=(($is_smoking == 'Not Allowed')?'selected':'')?>>Not Allowed</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="is_couple" class="col-md-2 col-lg-2 col-form-label fw-bold">Couples <span class="text-danger">*</span></label>
              <div class="col-md-10 col-lg-10">
                <select name="is_couple" class="form-control" id="is_couple" required>
                  <option value="" selected>Select Couples</option>
                  <option value="Allowed" <?=(($is_couple == 'Allowed')?'selected':'')?>>Allowed</option>
                  <option value="Not Allowed" <?=(($is_couple == 'Not Allowed')?'selected':'')?>>Not Allowed</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="is_children" class="col-md-2 col-lg-2 col-form-label fw-bold">Children <span class="text-danger">*</span></label>
              <div class="col-md-10 col-lg-10">
                <select name="is_children" class="form-control" id="is_children" required>
                  <option value="" selected>Select Children</option>
                  <option value="Allowed" <?=(($is_children == 'Allowed')?'selected':'')?>>Allowed</option>
                  <option value="Not Allowed" <?=(($is_children == 'Not Allowed')?'selected':'')?>>Not Allowed</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="closet" class="col-md-2 col-lg-2 col-form-label fw-bold">Closet</label>
              <div class="col-md-10 col-lg-10">
                <select name="closet" class="form-control" id="closet" required>
                  <option value="" selected>Select Shared Bath</option>
                  <option value="Walk-In" <?=(($closet == 'Walk-In')?'selected':'')?>>Walk-In</option>
                  <option value="Single" <?=(($closet == 'Single')?'selected':'')?>>Single</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="bath_type" class="col-md-2 col-lg-2 col-form-label fw-bold">Bath Type</label>
              <div class="col-md-10 col-lg-10">
                <select name="bath_type" class="form-control" id="bath_type" required>
                  <option value="" selected>Select Bath Type</option>
                  <option value="Shared" <?=(($bath_type == 'Shared')?'selected':'')?>>Shared</option>
                  <option value="Private" <?=(($bath_type == 'Private')?'selected':'')?>>Private</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="separate_entry" class="col-md-2 col-lg-2 col-form-label fw-bold">Separate Entry</label>
              <div class="col-md-10 col-lg-10">
                <select name="separate_entry" class="form-control" id="separate_entry" required>
                  <option value="" selected>Select Separate Entry</option>
                  <option value="Available" <?=(($separate_entry == 'Available')?'selected':'')?>>Available</option>
                  <option value="Not Available" <?=(($separate_entry == 'Not Available')?'selected':'')?>>Not Available</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="kitchenette" class="col-md-2 col-lg-2 col-form-label fw-bold">Kitchenette</label>
              <div class="col-md-10 col-lg-10">
                <select name="kitchenette" class="form-control" id="kitchenette" required>
                  <option value="" selected>Select Kitchenette</option>
                  <option value="Allowed" <?=(($kitchenette == 'Allowed')?'selected':'')?>>Allowed</option>
                  <option value="Not Allowed" <?=(($kitchenette == 'Not Allowed')?'selected':'')?>>Not Allowed</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="additional_storage_space" class="col-md-2 col-lg-2 col-form-label fw-bold">Additional Storage Space</label>
              <div class="col-md-10 col-lg-10">
                <select name="additional_storage_space" class="form-control" id="additional_storage_space" required>
                  <option value="" selected>Select Additional Storage Space</option>
                  <option value="Allowed" <?=(($additional_storage_space == 'Allowed')?'selected':'')?>>Allowed</option>
                  <option value="Not Allowed" <?=(($additional_storage_space == 'Not Allowed')?'selected':'')?>>Not Allowed</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="sinks" class="col-md-2 col-lg-2 col-form-label fw-bold">Sinks</label>
              <div class="col-md-10 col-lg-10">
                <select name="sinks" class="form-control" id="sinks" required>
                  <option value="" selected>Select Sinks</option>
                  <?php if($sinkVals){ foreach($sinkVals as $row){?>
                  <option value="<?=$row->name?>" <?=(($row->name == $sinks)?'selected':'')?>><?=$row->name?></option>
                  <?php } }?>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="tubs" class="col-md-2 col-lg-2 col-form-label fw-bold">Tubs</label>
              <div class="col-md-10 col-lg-10">
                <select name="tubs" class="form-control" id="tubs" required>
                  <option value="" selected>Select Tubs</option>
                  <?php if($tubVals){ foreach($tubVals as $row){?>
                  <option value="<?=$row->name?>" <?=(($row->name == $tubs)?'selected':'')?>><?=$row->name?></option>
                  <?php } }?>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="showers" class="col-md-2 col-lg-2 col-form-label fw-bold">Showers</label>
              <div class="col-md-10 col-lg-10">
                <select name="showers" class="form-control" id="showers" required>
                  <option value="" selected>Select Showers</option>
                  <?php if($showerVals){ foreach($showerVals as $row){?>
                  <option value="<?=$row->name?>" <?=(($row->name == $showers)?'selected':'')?>><?=$row->name?></option>
                  <?php } }?>
                </select>
              </div>
            </div>

            <div class="text-center">
              <button type="submit" id="submit-btn" class="btn btn-success"><i class="fa fa-paper-plane"></i> Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
  }
</script><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/admin/maincontents/unit/add-edit.blade.php ENDPATH**/ ?>