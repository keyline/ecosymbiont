<?php
  use App\Models\PropertyType;
  use App\Models\Property;
  use App\Models\PropertyImage;
  use App\Helpers\Helper;
  $controllerRoute = $module['controller_route'];
?>
<script>
  // This sample uses the Places Autocomplete widget to:
  // 1. Help the user select a place
  // 2. Retrieve the address components associated with that place
  // 3. Populate the form fields with those address components.
  // This sample requires the Places library, Maps JavaScript API.
  // Include the libraries=places parameter when you first load the API.
  // For example: <script
  // src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
  let autocomplete;
  let address1Field;
  let address2Field;
  let postalField;
  
  function initAutocomplete() {
  address1Field = document.querySelector("#address");
  address2Field = document.querySelector("#street_no");
  postalField = document.querySelector("#zipcode");
  // Create the autocomplete object, restricting the search predictions to
  // addresses in the US and Canada.
  autocomplete = new google.maps.places.Autocomplete(address1Field, {
  componentRestrictions: { country: ["us", "ca"] },
  fields: ["address_components", "geometry", "formatted_address"],
  types: ["address"],
  });
  address1Field.focus();
  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener("place_changed", fillInAddress);
  }
  
  function fillInAddress() {
  // Get the place details from the autocomplete object.
  const place = autocomplete.getPlace();
  let address1 = "";
  let postcode = "";
  console.log(place);
  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  // place.address_components are google.maps.GeocoderAddressComponent objects
  // which are documented at http://goo.gle/3l5i5Mr
  for (const component of place.address_components) {
  // @ts-ignore remove once typings fixed
  const componentType = component.types[0];
  
  switch (componentType) {
    // case "street_number": {
    //   address1 = `${component.long_name} ${address1}`;
    //   break;
    // }
  
    // case "route": {
    //   address1 += component.short_name;
    //   break;
    // }
  
    case "postal_code": {
      postcode = `${component.long_name}${postcode}`;
      break;
    }
  
    case "postal_code_suffix": {
      postcode = `${postcode}-${component.long_name}`;
      break;
    }
    case "street_number": {
      document.querySelector("#street_no").value = component.long_name;
      break;
    }
    case "route": {
      document.querySelector("#locality").value = component.long_name;
      break;
    }
    case "locality": {
      document.querySelector("#city").value = component.long_name;
      break;
    }
    case "administrative_area_level_1": {
      document.querySelector("#state").value = component.short_name;
      break;
    }
    case "country":
      document.querySelector("#country").value = component.short_name;
      break;
  }
  }
  
  address1Field.value = place.formatted_address;
  postalField.value = postcode;
  document.querySelector("#latitude").value = place.geometry.location.lat();
  document.querySelector("#longitude").value = place.geometry.location.lng();
  // After filling the form with address components from the Autocomplete
  // prediction, set cursor focus on the second address line to encourage
  // entry of subpremise information such as apartment, unit, or floor number.
  address2Field.focus();
  }
  
  window.initAutocomplete = initAutocomplete;
</script>
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
        $property_id            = $row->id;
        $name                   = $row->name;
        $address                = $row->address;
        $country                = $row->country;
        $state                  = $row->state;
        $city                   = $row->city;
        $locality               = $row->locality;
        $street_no              = $row->street_no;
        $zipcode                = $row->zipcode;
        $latitude               = $row->latitude;
        $longitude              = $row->longitude;
        $no_unit                = $row->no_unit;
        $property_type          = $row->property_type;
        $floorings              = $row->floorings;
        $water_avl              = $row->water_avl;
        $electricities          = $row->electricities;
        $bathroom               = $row->bathroom;
        $fenced                 = $row->fenced;
        $is_pets                = $row->is_pets;
        $is_smoking             = $row->is_smoking;
        $is_couple              = $row->is_couple;
        $is_children            = $row->is_children;
        $no_of_floor            = $row->no_of_floor;
        $no_of_lift             = $row->no_of_lift;
        $total_sper_built_area  = $row->total_sper_built_area;
        $description            = $row->description;
        $cover_image            = $row->cover_image;
      } else {
        $property_id            = 0;
        $name                   = '';
        $address                = '';
        $country                = '';
        $state                  = '';
        $city                   = '';
        $locality               = '';
        $street_no              = '';
        $zipcode                = '';
        $latitude               = '';
        $longitude              = '';
        $no_unit                = '';
        $property_type          = '';
        $floorings              = '';
        $water_avl              = '';
        $electricities          = '';
        $bathroom               = '';
        $fenced                 = '';
        $is_pets                = 0;
        $is_smoking             = 0;
        $is_couple              = 0;
        $is_children            = 0;
        $no_of_floor            = '';
        $no_of_lift             = '';
        $total_sper_built_area  = '';
        $description            = '';
        $cover_image            = '';
      }
      ?>
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body pt-3">
          <form method="POST" action="" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" id="counter" value="0">
            <h6 class="text-danger">Star (*) marks fields are mandatory</h6>
            <div class="row mb-3" id="address-info">
              <label for="name" class="col-md-2 col-lg-2 col-form-label fw-bold">Name <span class="text-danger">*</span></label>
              <div class="col-md-10 col-lg-10 mb-3">
                <input type="text" name="name" class="form-control" id="name" value="<?=$name?>" required>
              </div>

              <label for="address" class="col-md-2 col-lg-2 col-form-label fw-bold">Address <span class="text-danger">*</span></label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="address" class="form-control" id="address" value="<?=$address?>" required>
                <input type="hidden" name="country" id="country" value="<?=$country?>">
                <input type="hidden" name="state" id="state" value="<?=$state?>">
                <input type="hidden" name="city" id="city" value="<?=$city?>">
                <input type="hidden" name="locality" id="locality" value="<?=$locality?>">
                <input type="hidden" name="street_no" id="street_no" value="<?=$street_no?>">
                <input type="hidden" name="zipcode" id="zipcode" value="<?=$zipcode?>">
                <input type="hidden" name="latitude" id="latitude" value="<?=$latitude?>">
                <input type="hidden" name="longitude" id="longitude" value="<?=$longitude?>">
              </div>
            </div>

            <div class="row mb-3" id="unit-info" style="display: none;">

              <div class="row mb-3">
                <label for="no_unit" class="col-md-2 col-lg-2 col-form-label fw-bold">No. Of Units <span class="text-danger">*</span></label>
                <div class="col-md-10 col-lg-10">
                  <select name="no_unit" class="form-control" id="no_unit" required>
                    <option value="" selected>Select No. Of Units</option>
                    <?php for($p=1;$p<=20;$p++){?>
                    <option value="<?=$p?>" <?=(($p == $no_unit)?'selected':'')?>><?=$p?></option>
                    <?php }?>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="no_of_floor" class="col-md-2 col-lg-2 col-form-label fw-bold">No. Of Floors <span class="text-danger">*</span></label>
                <div class="col-md-10 col-lg-10">
                  <input type="text" name="no_of_floor" class="form-control" id="no_of_floor" value="<?=$no_of_floor?>" required onkeypress="return isNumber(event)">
                </div>
              </div>

              <div class="row mb-3">
                <label for="no_of_lift" class="col-md-2 col-lg-2 col-form-label fw-bold">No. Of Lift <span class="text-danger">*</span></label>
                <div class="col-md-10 col-lg-10">
                  <input type="text" name="no_of_lift" class="form-control" id="no_of_lift" value="<?=$no_of_lift?>" required onkeypress="return isNumber(event)">
                </div>
              </div>

              <div class="row mb-3">
                <label for="total_sper_built_area" class="col-md-2 col-lg-2 col-form-label fw-bold">Total Super Built Area <span class="text-danger">*</span></label>
                <div class="col-md-10 col-lg-10">
                  <input type="text" name="total_sper_built_area" class="form-control" id="total_sper_built_area" value="<?=$total_sper_built_area?>" required onkeypress="return isNumber(event)">
                </div>
              </div>

            </div>

            <div class="mb-3" id="propertytype-info" style="display: none;">

              <div class="row mb-3">
                <label for="property_type" class="col-md-2 col-lg-2 col-form-label fw-bold">Property Types <span class="text-danger">*</span></label>
                <div class="col-md-10 col-lg-10">
                  <select name="property_type" class="form-control" id="property_type" required>
                    <option value="" selected>Select Property Types</option>
                    <?php if($property_types){ foreach($property_types as $property_types){?>
                    <option value="<?=$property_types->id?>" <?=(($property_types->id == $property_type)?'selected':'')?>><?=$property_types->name?></option>
                    <?php } }?>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="floorings" class="col-md-2 col-lg-2 col-form-label fw-bold">Floorings <span class="text-danger">*</span></label>
                <div class="col-md-10 col-lg-10">
                  <select name="floorings" class="form-control" id="floorings" required>
                    <option value="" selected>Select Floorings</option>
                    <?php if($floors){ foreach($floors as $row){?>
                    <option value="<?=$row->name?>" <?=(($row->name == $floorings)?'selected':'')?>><?=$row->name?></option>
                    <?php } }?>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="water_avl" class="col-md-2 col-lg-2 col-form-label fw-bold">Water Availabilities <span class="text-danger">*</span></label>
                <div class="col-md-10 col-lg-10">
                  <select name="water_avl" class="form-control" id="water_avl" required>
                    <option value="" selected>Select Water Availabilities</option>
                    <?php if($waters){ foreach($waters as $row){?>
                    <option value="<?=$row->name?>" <?=(($row->name == $water_avl)?'selected':'')?>><?=$row->name?></option>
                    <?php } }?>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="electricities" class="col-md-2 col-lg-2 col-form-label fw-bold">Electricities <span class="text-danger">*</span></label>
                <div class="col-md-10 col-lg-10">
                  <select name="electricities" class="form-control" id="electricities" required>
                    <option value="" selected>Select Electricities</option>
                    <?php if($electrics){ foreach($electrics as $row){?>
                    <option value="<?=$row->name?>" <?=(($row->name == $electricities)?'selected':'')?>><?=$row->name?></option>
                    <?php } }?>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="bathroom" class="col-md-2 col-lg-2 col-form-label fw-bold">Bathroom <span class="text-danger">*</span></label>
                <div class="col-md-10 col-lg-10">
                  <select name="bathroom" class="form-control" id="bathroom" required>
                    <option value="" selected>Select Bathroom</option>
                    <option value="Shared" <?=(($bathroom == 'Shared')?'selected':'')?>>Shared</option>
                    <option value="Personal" <?=(($bathroom == 'Personal')?'selected':'')?>>Personal</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="fenced" class="col-md-2 col-lg-2 col-form-label fw-bold">Fenced <span class="text-danger">*</span></label>
                <div class="col-md-10 col-lg-10">
                  <select name="fenced" class="form-control" id="fenced" required>
                    <option value="" selected>Select Fenced</option>
                    <option value="Fenced" <?=(($fenced == 'Fenced')?'selected':'')?>>Fenced</option>
                    <option value="Open" <?=(($fenced == 'Open')?'selected':'')?>>Open</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="is_pets" class="col-md-2 col-lg-2 col-form-label fw-bold">Pets <span class="text-danger">*</span></label>
                <div class="col-md-10 col-lg-10">
                  <select name="is_pets" class="form-control" id="is_pets" required>
                    <option value="" selected>Select Pets</option>
                    <option value="1" <?=(($is_pets == 1)?'selected':'')?>>ALLOWED</option>
                    <option value="0" <?=(($is_pets == 0)?'selected':'')?>>NOT ALLOWED</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="is_smoking" class="col-md-2 col-lg-2 col-form-label fw-bold">Smoking <span class="text-danger">*</span></label>
                <div class="col-md-10 col-lg-10">
                  <select name="is_smoking" class="form-control" id="is_smoking" required>
                    <option value="" selected>Select Smoking</option>
                    <option value="1" <?=(($is_smoking == 1)?'selected':'')?>>ALLOWED</option>
                    <option value="0" <?=(($is_smoking == 0)?'selected':'')?>>NOT ALLOWED</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="is_couple" class="col-md-2 col-lg-2 col-form-label fw-bold">Couples <span class="text-danger">*</span></label>
                <div class="col-md-10 col-lg-10">
                  <select name="is_couple" class="form-control" id="is_couple" required>
                    <option value="" selected>Select Couples</option>
                    <option value="1" <?=(($is_couple == 1)?'selected':'')?>>ALLOWED</option>
                    <option value="0" <?=(($is_couple == 0)?'selected':'')?>>NOT ALLOWED</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="is_children" class="col-md-2 col-lg-2 col-form-label fw-bold">Children <span class="text-danger">*</span></label>
                <div class="col-md-10 col-lg-10">
                  <select name="is_children" class="form-control" id="is_children" required>
                    <option value="" selected>Select Children</option>
                    <option value="1" <?=(($is_children == 1)?'selected':'')?>>ALLOWED</option>
                    <option value="0" <?=(($is_children == 0)?'selected':'')?>>NOT ALLOWED</option>
                  </select>
                </div>
              </div>

            </div>

            <div class="row mb-3" id="description-info" style="display: none;">
              <label for="description" class="col-md-2 col-lg-2 col-form-label fw-bold">Description <span class="text-danger">*</span></label>
              <div class="col-md-10 col-lg-10">
                <textarea name="description" class="form-control" id="description" required><?=$description?></textarea>
              </div>
            </div>

            <div class="row mb-3" id="coverimage-info" style="display: none;">
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

            <div class="row mb-3" id="otherimage-info" style="display: none;">
              <label for="property_image" class="col-md-2 col-lg-2 col-form-label fw-bold">Other Images</label>
              <div class="col-md-10 col-lg-10">
                <input type="file" name="property_image[]" class="form-control" id="property_image" multiple>
                <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed</small><br>
                <?php if($property_id > 0){?>
                  <div class="row">
                    <?php
                    $propertyImages = PropertyImage::select('id', 'property_id', 'property_image')->where('status', '=', 1)->where('property_id', '=', $property_id)->get();
                    if($propertyImages){ foreach($propertyImages as $propertyImg){
                    ?>
                      <div class="col-md-2">
                        <?php if($propertyImg->property_image != ''){?>
                          <img src="<?=env('UPLOADS_URL').'property/'.$propertyImg->property_image?>" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                          <a href="<?=url('admin/' . $controllerRoute . '/delete-single-image/'.Helper::encoded($propertyImg->id).'/'.Helper::encoded($propertyImg->property_id))?>" class="btn btn-danger btn-sm" onclick="return confirm('Do You Want To Delete This Property Image ?');"><i class="fa fa-trash"></i> Remove</a>
                        <?php } else {?>
                          <img src="<?=env('NO_IMAGE')?>" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                        <?php }?>
                      </div>
                    <?php } }?>
                  </div>
                <?php }?>
              </div>
            </div>

            <div class="text-center">
              <button type="button" id="next-btn" class="btn btn-primary"><i class="fa fa-arrow-right"></i> Next</button>
              <button type="submit" id="submit-btn" class="btn btn-success" style="display: none;"><i class="fa fa-paper-plane"></i> Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMbNCogNokCwVmJCRfefB6iCYUWv28LjQ&libraries=places&callback=initAutocomplete&libraries=places&v=weekly"></script>
<script type="text/javascript">
  $(function(){
    var counter = $('#counter').val();
    $('#next-btn').on('click', function(){
      counter++;
      $('#counter').val(counter);
      if(counter == 1){
        $('#address-info').hide();
        $('#unit-info').show();
        $('#propertytype-info').hide();
        $('#description-info').hide();
        $('#coverimage-info').hide();
        $('#otherimage-info').hide();
      } else if(counter == 2){
        $('#address-info').hide();
        $('#unit-info').hide();
        $('#propertytype-info').show();
        $('#description-info').hide();
        $('#coverimage-info').hide();
        $('#otherimage-info').hide();
      } else if(counter == 3){
        $('#address-info').hide();
        $('#unit-info').hide();
        $('#propertytype-info').hide();
        $('#description-info').show();
        $('#coverimage-info').hide();
        $('#otherimage-info').hide();
      } else if(counter == 4){
        $('#address-info').hide();
        $('#unit-info').hide();
        $('#propertytype-info').hide();
        $('#description-info').hide();
        $('#coverimage-info').show();
        $('#otherimage-info').hide();
      } else if(counter == 5){
        $('#address-info').hide();
        $('#unit-info').hide();
        $('#propertytype-info').hide();
        $('#description-info').hide();
        $('#coverimage-info').hide();
        $('#otherimage-info').show();

        $('#next-btn').hide();
        $('#submit-btn').show();
      }
    });
  })

  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
  }
</script><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/admin/maincontents/property/add-edit.blade.php ENDPATH**/ ?>