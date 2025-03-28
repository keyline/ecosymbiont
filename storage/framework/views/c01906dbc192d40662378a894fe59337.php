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
<div class="inner-banner">
    <h3><?=$page_header?></h3>
</div>
<div class="common-inner get-free-rental">
    <div class="container mt-3 mb-3">
	 <div class="row ">
            <div class="col-md-5">
				<div class="contect-form-left">
				    <img src="	https://qarp.itiffyconsultants.com/public/uploads/property/1707214818VAST2026786_0.jpg" style="height: 660px;" alt=""/>
				</div>
			</div>
            <?php if(session('success_message')): ?>
                <h6 class="alert alert-success autohide"><?php echo e(session('success_message')); ?></h6>
            <?php endif; ?>
            <?php if(session('error_message')): ?>
                <h6 class="alert alert-danger autohide"><?php echo e(session('error_message')); ?></h6>
            <?php endif; ?>
			<div class="col-md-7">
                <form method="POST" action="">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="property_id" value="<?=$property_id?>">
                    <input type="hidden" name="unit_id" value="<?=$unit_id?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">First Name <span class="text-danger">*</span></label>
                                <input type="text" name="first_name" id="first_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name">Last Name <span class="text-danger">*</span></label>
                                <input type="text" name="last_name" id="last_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone <span class="text-danger">*</span></label>
                                <input type="text" name="phone" id="phone" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="preferred_date">Preferred Date <span class="text-danger">*</span></label>
                                <input type="date" name="preferred_date" id="preferred_date" class="form-control" min="<?=date('Y-m-d')?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="preferred_time">Preferred Time <span class="text-danger">*</span></label>
                                <input type="time" name="preferred_time" id="preferred_time" class="form-control" min="<?=date('H:i:s A')?>" required>
                            </div>
                        </div>
                        
                        <input type="hidden" name="address" id="address" class="form-control">
                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longitude" id="longitude">
                        <input type="hidden" name="country" id="country" class="form-control">
                        <input type="hidden" name="state" id="state" class="form-control">
                        <input type="hidden" name="city" id="city" class="form-control">
                        <input type="hidden" name="locality" id="locality" class="form-control">
                        <input type="hidden" name="street_no" id="street_no" class="form-control">
                        <input type="hidden" name="zipcode" id="zipcode" class="form-control">
                        <input type="hidden" name="property_type" id="property_type" class="form-control">
                        <input type="hidden" name="unit_status" id="unit_status" class="form-control">

                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Address <span class="text-danger">*</span></label>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Country <span class="text-danger">*</span></label>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">State <span class="text-danger">*</span></label>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">City <span class="text-danger">*</span></label>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Locality <span class="text-danger">*</span></label>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Street No <span class="text-danger">*</span></label>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Zipcode <span class="text-danger">*</span></label>
                                
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="property_type">Property Type <span class="text-danger">*</span></label>
                                <select name="property_type" id="property_type" class="form-control" required>
                                    <option value="" selected>Select Property Type</option>
                                    <option value="Houses">Houses</option>
                                    <option value="Single Family Houses">Single Family Houses</option>
                                    <option value="Apartment">Apartment</option>
                                    <option value="Duplex">Duplex</option>
                                    <option value="Condo">Condo</option>
                                    <option value="Townhouse">Townhouse</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="unit_status">Status <span class="text-danger">*</span></label>
                                <select name="unit_status" id="unit_status" class="form-control" required>
                                    <option value="" selected>Select Status</option>
                                    <option value="Vacant">Vacant</option>
                                    <option value="Occupied by Tenant">Occupied by Tenant</option>
                                    <option value="Owner">Owner</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="col-md-12">
                            <div class="form-group d-flex align-items-start submitting-field">
                                <input type="checkbox" name="sms_text_agreement" id="sms_text_agreement" required>
                                <label for="sms_text_agreement">By submitting your mobile phone number, you are authorizing us (opting in) to send you informational and marketing related texts. Message/data rates may apply. Reply STOP to unsubscribe.</label>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2 text-start">
                            <button type="submit" class="theme-btn">Submit</button>
                        </div>
                    </div>
                </form>
	        </div>
		</div>
    </div>
</div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMbNCogNokCwVmJCRfefB6iCYUWv28LjQ&libraries=places&callback=initAutocomplete&libraries=places&v=weekly"></script><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/pages/schedule-tour.blade.php ENDPATH**/ ?>