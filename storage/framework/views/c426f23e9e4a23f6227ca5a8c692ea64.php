<div class="common-inner get-free-rental">
   <div class="container ">
      <?php if(session('success_message')): ?>
          <h6 class="alert alert-success autohide"><?php echo e(session('success_message')); ?></h6>
      <?php endif; ?>
      <?php if(session('error_message')): ?>
          <h6 class="alert alert-danger autohide"><?php echo e(session('error_message')); ?></h6>
      <?php endif; ?>
      <form method="POST" action="">
         <?php echo csrf_field(); ?>
         <input type="hidden" name="lead_id" value="<?=$lead_id?>">
         <div class="application-details col-lg-12">
            <div class="row">
               <div class="col-md-12 ">
                  <h4><?=$page_header?></h4>
               </div>
               <div class="col-md-12 ">
                  <div class="application-details-left">
                     <div class="Property-name">
                        <div class="row">
                           <div class="col-md-5">
                              <p>PROPERTY NAME: <span><?=(($getProperty)?$getProperty->name:'')?></span></p>
                           </div>
                           <div class="col-md-2">
                              <p>|</p>
                           </div>
                           <div class="col-md-5">
                              <p>Unit Name:  <span><?=(($getUnit)?$getUnit->name:'')?></span></p>
                           </div>
                        </div>
                     </div>
                     <div class="Property-estimate">
                              <div class="row">
                                 <div class="col-md-12 ">
                                    <input type="hidden" name="adult_pendent_rate" id="adult_pendent_rate" value="<?=(($adultDependent)?$adultDependent->amount:0)?>">
                                    <input type="hidden" name="child_pendent_rate" id="child_pendent_rate" value="<?=(($childDependent)?$childDependent->amount:0)?>">
                                    <p class="">Base Rent:
                                       <input type="hidden" name="base_rent_val" id="base_rent_val" value="<?=(($getUnit)?$getUnit->price:0)?>">
                                       <span id="base_rent">$<?=(($getUnit)?$getUnit->price:0)?></span>
                                    </p>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="price-select">
                                       <p>Lease Term:</p>
                                       <div class="dropdown ">
                                          <select class="form-control" name="term" id="term">
                                             <option value="" selected disabled>Select</option>
                                             <?php if($leaseRates){ foreach($leaseRates as $row){?>
                                             <option value="<?=$row->term?>"><?=$row->name?></option>
                                             <?php } }?>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="price-select">
                                       <p>Move in Date:</p>
                                       <input type="date" name="movein_date" id="movein_date" class="form-control" min="<?=date('Y-m-d')?>" required>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="price-select">
                                       <p>Adult Tenants:</p>
                                       <div class="dropdown ">
                                          <select class="form-control" name="adult_tenant" id="adult_tenant">
                                             <?php for($t=1;$t<=10;$t++){?>
                                             <option value="<?=$t?>"><?=$t?></option>
                                             <?php }?>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="price-select child-tenan ">
                                       <p>Will any minors (individuals under 18) be residing at the property ?</p>
                                       <input type="radio" name="child_tenant_check" id="child_tenant_check1" value="1"> <label for="child_tenant_check1" style="margin:0;margin-left:8px;margin-right:8px;">Yes</label>
                                       <input type="radio" name="child_tenant_check" id="child_tenant_check2" value="0"> <label for="child_tenant_check2" style="margin:0;margin-left:8px;">No</label>
                                       <div class="qty-input quantity child " style="display: none;">
                                          <span>Child:</span>
                                          <button class="qty-count qty-count--minus minus" data-action="minus" type="button" onclick="decreaseChildTenant();">-</button>
                                          <input class="product-qty" type="number" name="child_tenant_qty" id="child_tenant_qty" min="0" max="10" value="0">
                                          <button class="qty-count qty-count--add plus" data-action="add" type="button" onclick="increaseChildTenant();">+</button>
                                       </div>
   								            <!-- <div id="child_tenant_age">

                                       </div> -->
                                    </div>
   							         </div>
                                 <div class="col-md-12 charges-list">
                                    <p style="display: none;">
                                       <?=(($supplyRates)?$supplyRates->name:'')?>:<span>$<strong id="supply_charge"><?=(($supplyRates)?$supplyRates->amount:'')?></strong> Per Month</span>
                                    </p>
                                    <input type="hidden" name="supply_charge_unit_val" id="supply_charge_unit_val" value="<?=(($supplyRates)?$supplyRates->amount:'')?>">
                                    <input type="hidden" name="supply_charge_val" id="supply_charge_val" value="<?=(($supplyRates)?$supplyRates->amount:'')?>">

                                    <input type="hidden" name="own_laundry" id="own_laundry" value="<?=$laundryRates[0]->amount?>">
                                    <input type="hidden" name="dependent_laundry" id="dependent_laundry" value="<?=$laundryRates[1]->amount?>">
                                    <input type="hidden" name="laundry_charge_val" id="laundry_charge_val" value="0">
                                    <p style="display: none;">Laundry Charges:<span>$<strong id="laundry_charge">0</strong> Per Month</span></p>
                                 </div>
                              </div>
                              <div class="pets-blocks">
                                 <div class="col-md-12 ">
      						            <div class=" d-flex justify-content-center align-items-center ">
                                       <h3>PETS</h3>
                                       <input type="radio" name="pet_check" id="pet_check1" value="1" style="margin-right: 8px;"> <label for="pet_check1" style="margin: 0;margin-right:8px;">Yes</label>
                                       <input type="radio" name="pet_check" id="pet_check2" value="0" style="margin-right: 8px;"> <label for="pet_check2" style="margin: 0;">No</label>

                                       <input type="hidden" name="pet_rate" id="pet_rate" value="<?=$petDependent->amount?>">
                                    </div>
      							         <div class="row pet mt-3" style="display: none;">
                                       <div class="col-md-6">
                                          <div class="qty-input quantity">
                                             <span>Dog:</span>
                                             <button class="qty-count qty-count--minus minus" data-action="minus" type="button" onclick="decreaseDogTenant();">-</button>
                                             <input class="product-qty" type="number" name="dog_qty" id="dog_qty" min="0" max="50" value="0">
                                             <button class="qty-count qty-count--add plus" data-action="add" type="button" onclick="increaseDogTenant();">+</button>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="qty-input quantity">
                                             <span>Cat:</span>
                                             <button class="qty-count qty-count--minus minus" data-action="minus" type="button" onclick="decreaseCatTenant();">-</button>
                                             <input class="product-qty" type="number" name="cat_qty" id="cat_qty" min="0" max="50" value="0">
                                             <button class="qty-count qty-count--add plus" data-action="add" type="button" onclick="increaseCatTenant();">+</button>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="pets-blocks Parking-block ">
            						  <div class="col-md-12">
            						  	   <div class="d-flex justify-content-center align-items-center ">
                                       <h3>Parking</h3>
                                       <input type="radio" name="parking_check" id="parking_check1" value="1" style="margin-right: 8px;"> <label for="parking_check1" style="margin: 0;margin-right:8px;">Yes</label>
                                       <input type="radio" name="parking_check" id="parking_check2" value="0" style="margin-right: 8px;"> <label for="parking_check2" style="margin: 0;">No</label>
                                    </div>
            						      <div class="row parking mt-3 justify-content-center align-items-center" style="display: none;">
                                       <?php if($parkingRates){ foreach($parkingRates as $row){?>
                                          <div class="col-md-3 mb-3">
                                                <span><?=$row->name?> : </span>
                                             </div>
                                             <div class="col-md-2 mb-3">
                                                <div class="qty-input quantity">
                                                   <button class="qty-count qty-count--minus minus" data-action="minus" type="button" onclick="decreaseParking(<?=$row->id?>);">-</button>
                                                   <input class="product-qty" type="number" name="parking_qty[]" id="parking_qty<?=$row->id?>" min="0" max="50" value="0">
                                                   <button class="qty-count qty-count--add plus" data-action="add" type="button" onclick="increaseParking(<?=$row->id?>);">+</button>
                                                </div>
                                                <input type="hidden" class="parking_single_charge" name="parking_single_charge" id="parking_single_charge<?=$row->id?>" value="0">
                                             </div>
                                             <div class="col-md-1 mb-3">
                                                <p style="margin:0;">$<?=$row->amount?></p>
                                                <input type="hidden" name="parking_charge[]" id="parking_charge<?=$row->id?>" value="<?=$row->id?>/<?=$row->amount?>">
                                             </div>
                                       <?php } }?>
                                       <input type="hidden" name="parking_costing" id="parking_costing" value="0">
                                    </div>
                                 </div>
            					   </div>
                        <div class="pets-blocks furnishing-section">
                              <div class="col-md-12 ">
							         <div class="d-flex justify-content-center align-items-center ">
                              <h3>Furnishing</h3>
                              <input type="radio" name="furniture_check" id="furniture_check1" value="1" style="margin-right: 8px;"> <label for="furniture_check1" style="margin: 0;margin-right:8px;">Yes</label>
                              <input type="radio" name="furniture_check" id="furniture_check2" value="0" style="margin-right: 8px;"> <label for="furniture_check2" style="margin: 0;">No</label>
                              </div>
							           <div class="row furniture mt-3" style="display: none;">
                                 <input type="hidden" name="furniture_charge_val" id="furniture_charge_val" value="0">
                                 <ul>
                                    <?php if($furnitureRates){ foreach($furnitureRates as $row){?>
                                    <li>
                                       <div class="form-check">
                                          <label class="form-check-label" for="furniture<?=$row->id?>"><?=$row->name?>:
                                          </label>
                                          <input class="form-check-input" type="checkbox" name="furniture[]" value="<?=$row->id?>/<?=$row->amount?>" id="furniture<?=$row->id?>" onclick="putFurniture(this.value);">
                                       </div>
                                    </li>
                                    <?php } }?>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="pets-blocks furnishing-section storage-section">
                           <div class="col-md-12  ">
						            <div class=" d-flex justify-content-center align-items-center ">
                                 <h3>Storage</h3>
                                 <input type="radio" name="storage_check" id="storage_check1" value="1" style="margin-right: 8px;"> <label for="storage_check1" style="margin: 0;margin-right:8px;">Yes</label>
                                 <input type="radio" name="storage_check" id="storage_check2" value="0" style="margin-right: 8px;"> <label for="storage_check2" style="margin: 0;">No</label>
                              </div>
						            <div class="row storage mt-3" style="display: none;">
                                 <input type="hidden" name="storage_charge_val" id="storage_charge_val" value="0">
                                 <ul>
                                    <?php if($storageRates){ foreach($storageRates as $row){?>
                                    <li>
                                       <div class="form-check">
                                          <label class="form-check-label" for="storage<?=$row->id?>">
                                          <?=$row->name?>:
                                          </label>
                                          <input class="form-check-input" type="checkbox" name="storage[]" value="<?=$row->id?>/<?=$row->amount?>" id="storage<?=$row->id?>" onclick="putStorage(this.value);">
                                       </div>
                                    </li>
                                    <?php } }?>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12 text-center">
                           <div class="row">
                              <div class="price-estimate">
                                 <p>Price Estimate:
                                    <input type="hidden" name="price_estimate_val" id="price_estimate_val" value="0">
                                    <span>$<strong id="price_estimate">0</strong> Per Month</span>
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12 ">
                  <div class="application-details-right">
                     <small>“Pricing and options may vary based on lease terms, move-in date, availability, and is subject to change at any time. Offered prices are for base rent only as other charges, fees, terms, and conditions may apply. Deposits may fluctuate based on credit, rental history, income, and other qualifying standards. Furnished housing and corporate leases will incur additional premiums. Restrictions may apply to special offers and do not apply to current residents or transfers. For leases starting on or after the 25th of the month, the move-in balance will include the prorated rent for the current month, plus next month’s rent. Square footage, amenities, and floor plan listed may vary between individual units and are subject to availability. Occupancy guidelines may apply. Equal housing opportunity provider.
                     This estimate is not a quote. Other fees may apply. Fees, application requirements, and leasing information are subject to change.”
                     </small>
                  </div>
               </div>
               <div class="col-md-12 mt-4 text-center">
                  <button type="submit" class="theme-btn bg-theme-btn">Submit</button>
               </div>
            </div>
         </div>
      </form>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
   $('input[name="pet_check"]').click(function() {
       if($('input[name="pet_check"]:checked').val() == 1) {
           $(".pet").show();
       } else {
           $(".pet").hide();
       }
   });
   $('input[name="parking_check"]').click(function() {
       if($('input[name="parking_check"]:checked').val() == 1) {
           $(".parking").show();
       } else {
           $(".parking").hide();
       }
   });
   $('input[name="furniture_check"]').click(function() {
       if($('input[name="furniture_check"]:checked').val() == 1) {
           $(".furniture").show();
       } else {
           $(".furniture").hide();
       }
   });
   $('input[name="storage_check"]').click(function() {
       if($('input[name="storage_check"]:checked').val() == 1) {
           $(".storage").show();
       } else {
           $(".storage").hide();
       }
   });
   $('input[name="child_tenant_check"]').click(function() {
      if($('input[name="child_tenant_check"]:checked').val() == 1) {
         $(".child").show();
      } else {
         $(".child").hide();
      }
   });
   function increaseParking(id){
      var parking_qty                  = parseInt($('#parking_qty' + id).val()) + 1;
      var parking_charge_array         = $('#parking_charge' + id).val();
      var parking_charge_split         = parking_charge_array.split('/');
      var parking_charge               = parking_charge_split[1];
      var parking_single_charge        = (parking_charge * parking_qty);
      $('#parking_single_charge' + id).val(parking_single_charge);
      var parking_costing              = 0;
      $(".parking_single_charge").each(function(){
         parking_costing += +$(this).val();
      });
      $('#parking_costing').val(parking_costing);

      var adult_tenant                 = parseInt($('#adult_tenant').val());
      let child_tenant                 = parseInt($('#child_tenant_qty').val());
      var total_tenant                 = (adult_tenant + child_tenant);
      var supply_charge_unit_val       = parseFloat($('#supply_charge_unit_val').val());
      supply_charge_unit_val           = (total_tenant * supply_charge_unit_val);
      $('#supply_charge_val').val(supply_charge_unit_val);
      $('#supply_charge').text(supply_charge_unit_val);
      
      var base_rent_val                = parseFloat($('#base_rent_val').val());
      var new_price_estimate_val       = (base_rent_val + supply_charge_unit_val);

      var adult_pendent_rate           = parseInt($('#adult_pendent_rate').val());
      var child_pendent_rate           = parseInt($('#child_pendent_rate').val());
      var adult_dependent_nos          = (adult_tenant - 1);
      var child_dependent_nos          = child_tenant;
      var adult_dependent_costing      = (adult_pendent_rate * adult_dependent_nos);
      var child_dependent_costing      = (child_pendent_rate * child_dependent_nos);
      
      var own_laundry                  = parseInt($('#own_laundry').val());
      var dependent_laundry            = parseInt($('#dependent_laundry').val());
      var own_laundry_costing          = (own_laundry * 1);
      var dependent_laundry_costing    = (dependent_laundry * (adult_dependent_nos + child_dependent_nos));
      var total_laundry_costing        = (own_laundry_costing + dependent_laundry_costing);
      $('#laundry_charge_val').val(total_laundry_costing);
      $('#laundry_charge').text(total_laundry_costing);

      var pet_rate                     = parseInt($('#pet_rate').val());
      var dog_qty                      = parseInt($('#dog_qty').val());
      var total_dog_costing            = (pet_rate * dog_qty);
      var cat_qty                      = parseInt($('#cat_qty').val());
      var total_cat_costing            = (pet_rate * cat_qty);

      var furniture_costing            = parseFloat($('#furniture_charge_val').val());
      var storage_costing              = parseFloat($('#storage_charge_val').val());

      new_price_estimate_val           += (adult_dependent_costing + child_dependent_costing + total_laundry_costing + total_dog_costing + total_cat_costing + furniture_costing + storage_costing + parking_costing);

      $('#price_estimate_val').val(new_price_estimate_val);
      $('#price_estimate').text(new_price_estimate_val);
   }
   function decreaseParking(id){
      var parking_qty                  = parseInt($('#parking_qty' + id).val()) - 1;
      var parking_charge_array         = $('#parking_charge' + id).val();
      var parking_charge_split         = parking_charge_array.split('/');
      var parking_charge               = parking_charge_split[1];
      var parking_single_charge        = (parking_charge * parking_qty);
      $('#parking_single_charge' + id).val(parking_single_charge);
      var parking_costing              = 0;
      $(".parking_single_charge").each(function(){
         parking_costing += +$(this).val();
      });
      $('#parking_costing').val(parking_costing);

      var adult_tenant                 = parseInt($('#adult_tenant').val());
      let child_tenant                 = parseInt($('#child_tenant_qty').val());
      var total_tenant                 = (adult_tenant + child_tenant);
      var supply_charge_unit_val       = parseFloat($('#supply_charge_unit_val').val());
      supply_charge_unit_val           = (total_tenant * supply_charge_unit_val);
      $('#supply_charge_val').val(supply_charge_unit_val);
      $('#supply_charge').text(supply_charge_unit_val);
      
      var base_rent_val                = parseFloat($('#base_rent_val').val());
      var new_price_estimate_val       = (base_rent_val + supply_charge_unit_val);

      var adult_pendent_rate           = parseInt($('#adult_pendent_rate').val());
      var child_pendent_rate           = parseInt($('#child_pendent_rate').val());
      var adult_dependent_nos          = (adult_tenant - 1);
      var child_dependent_nos          = child_tenant;
      var adult_dependent_costing      = (adult_pendent_rate * adult_dependent_nos);
      var child_dependent_costing      = (child_pendent_rate * child_dependent_nos);
      
      var own_laundry                  = parseInt($('#own_laundry').val());
      var dependent_laundry            = parseInt($('#dependent_laundry').val());
      var own_laundry_costing          = (own_laundry * 1);
      var dependent_laundry_costing    = (dependent_laundry * (adult_dependent_nos + child_dependent_nos));
      var total_laundry_costing        = (own_laundry_costing + dependent_laundry_costing);
      $('#laundry_charge_val').val(total_laundry_costing);
      $('#laundry_charge').text(total_laundry_costing);

      var pet_rate                     = parseInt($('#pet_rate').val());
      var dog_qty                      = parseInt($('#dog_qty').val());
      var total_dog_costing            = (pet_rate * dog_qty);
      var cat_qty                      = parseInt($('#cat_qty').val());
      var total_cat_costing            = (pet_rate * cat_qty);

      var furniture_costing            = parseFloat($('#furniture_charge_val').val());
      var storage_costing              = parseFloat($('#storage_charge_val').val());

      new_price_estimate_val           += (adult_dependent_costing + child_dependent_costing + total_laundry_costing + total_dog_costing + total_cat_costing + furniture_costing + storage_costing + parking_costing);

      $('#price_estimate_val').val(new_price_estimate_val);
      $('#price_estimate').text(new_price_estimate_val);
   }
   function putFurniture(valam){
      var furnitureArray            = [];
      var furnitureAmountArray      = [];
      $("input[name='furniture[]']:checked").each( function () {
         var furnitureVal = $(this).val();
         var furnitureValArray = furnitureVal.split('/');
         var furnitureAmt = furnitureValArray[1];
         furnitureArray.push($(this).val());
         furnitureAmountArray.push(furnitureAmt);
      });
      furniture_costing = 0;
      $.each(furnitureAmountArray, function(){furniture_costing+=parseFloat(this) || 0;});
      $('#furniture_charge_val').val(furniture_costing);

      var adult_tenant                 = parseInt($('#adult_tenant').val());
      let child_tenant                 = parseInt($('#child_tenant_qty').val());
      var total_tenant                 = (adult_tenant + child_tenant);
      var supply_charge_unit_val       = parseFloat($('#supply_charge_unit_val').val());
      supply_charge_unit_val           = (total_tenant * supply_charge_unit_val);
      $('#supply_charge_val').val(supply_charge_unit_val);
      $('#supply_charge').text(supply_charge_unit_val);
      
      var base_rent_val                = parseFloat($('#base_rent_val').val());
      var new_price_estimate_val       = (base_rent_val + supply_charge_unit_val);

      var adult_pendent_rate           = parseInt($('#adult_pendent_rate').val());
      var child_pendent_rate           = parseInt($('#child_pendent_rate').val());
      var adult_dependent_nos          = (adult_tenant - 1);
      var child_dependent_nos          = child_tenant;
      var adult_dependent_costing      = (adult_pendent_rate * adult_dependent_nos);
      var child_dependent_costing      = (child_pendent_rate * child_dependent_nos);
      
      var own_laundry                  = parseInt($('#own_laundry').val());
      var dependent_laundry            = parseInt($('#dependent_laundry').val());
      var own_laundry_costing          = (own_laundry * 1);
      var dependent_laundry_costing    = (dependent_laundry * (adult_dependent_nos + child_dependent_nos));
      var total_laundry_costing        = (own_laundry_costing + dependent_laundry_costing);
      $('#laundry_charge_val').val(total_laundry_costing);
      $('#laundry_charge').text(total_laundry_costing);

      var pet_rate                     = parseInt($('#pet_rate').val());
      var dog_qty                      = parseInt($('#dog_qty').val());
      var total_dog_costing            = (pet_rate * dog_qty);
      var cat_qty                      = parseInt($('#cat_qty').val());
      var total_cat_costing            = (pet_rate * cat_qty);

      var storage_costing              = parseFloat($('#storage_charge_val').val());

      var parking_costing              = parseFloat($('#parking_costing').val());

      new_price_estimate_val           += (adult_dependent_costing + child_dependent_costing + total_laundry_costing + total_dog_costing + total_cat_costing + furniture_costing + storage_costing + parking_costing);

      $('#price_estimate_val').val(new_price_estimate_val);
      $('#price_estimate').text(new_price_estimate_val);
   }
   function putStorage(valam){
      var storageArray            = [];
      var storageAmountArray      = [];
      $("input[name='storage[]']:checked").each( function () {
         var storageVal = $(this).val();
         var storageValArray = storageVal.split('/');
         var storageAmt = storageValArray[1];
         storageArray.push($(this).val());
         storageAmountArray.push(storageAmt);
      });
      storage_costing = 0;
      $.each(storageAmountArray, function(){storage_costing+=parseFloat(this) || 0;});
      $('#storage_charge_val').val(storage_costing);

      var adult_tenant                 = parseInt($('#adult_tenant').val());
      let child_tenant                 = parseInt($('#child_tenant_qty').val());
      var total_tenant                 = (adult_tenant + child_tenant);
      var supply_charge_unit_val       = parseFloat($('#supply_charge_unit_val').val());
      supply_charge_unit_val           = (total_tenant * supply_charge_unit_val);
      $('#supply_charge_val').val(supply_charge_unit_val);
      $('#supply_charge').text(supply_charge_unit_val);
      
      var base_rent_val                = parseFloat($('#base_rent_val').val());
      var new_price_estimate_val       = (base_rent_val + supply_charge_unit_val);

      var adult_pendent_rate           = parseInt($('#adult_pendent_rate').val());
      var child_pendent_rate           = parseInt($('#child_pendent_rate').val());
      var adult_dependent_nos          = (adult_tenant - 1);
      var child_dependent_nos          = child_tenant;
      var adult_dependent_costing      = (adult_pendent_rate * adult_dependent_nos);
      var child_dependent_costing      = (child_pendent_rate * child_dependent_nos);
      
      var own_laundry                  = parseInt($('#own_laundry').val());
      var dependent_laundry            = parseInt($('#dependent_laundry').val());
      var own_laundry_costing          = (own_laundry * 1);
      var dependent_laundry_costing    = (dependent_laundry * (adult_dependent_nos + child_dependent_nos));
      var total_laundry_costing        = (own_laundry_costing + dependent_laundry_costing);
      $('#laundry_charge_val').val(total_laundry_costing);
      $('#laundry_charge').text(total_laundry_costing);

      var pet_rate                     = parseInt($('#pet_rate').val());
      var dog_qty                      = parseInt($('#dog_qty').val());
      var total_dog_costing            = (pet_rate * dog_qty);
      var cat_qty                      = parseInt($('#cat_qty').val());
      var total_cat_costing            = (pet_rate * cat_qty);

      var furniture_costing            = parseFloat($('#furniture_charge_val').val());

      var parking_costing              = parseFloat($('#parking_costing').val());

      new_price_estimate_val           += (adult_dependent_costing + child_dependent_costing + total_laundry_costing + total_dog_costing + total_cat_costing + furniture_costing + storage_costing + parking_costing);

      $('#price_estimate_val').val(new_price_estimate_val);
      $('#price_estimate').text(new_price_estimate_val);
   }
   function increaseDogTenant(){
      let dog_tenant_qty = parseInt($('#dog_qty').val()) + 1;

      var adult_tenant                 = parseInt($('#adult_tenant').val());
      let child_tenant                 = parseInt($('#child_tenant_qty').val());
      var total_tenant                 = (adult_tenant + child_tenant);
      var supply_charge_unit_val       = parseFloat($('#supply_charge_unit_val').val());
      supply_charge_unit_val           = (total_tenant * supply_charge_unit_val);
      $('#supply_charge_val').val(supply_charge_unit_val);
      $('#supply_charge').text(supply_charge_unit_val);
      
      var base_rent_val                = parseFloat($('#base_rent_val').val());
      var new_price_estimate_val       = (base_rent_val + supply_charge_unit_val);

      var adult_pendent_rate           = parseInt($('#adult_pendent_rate').val());
      var child_pendent_rate           = parseInt($('#child_pendent_rate').val());
      var adult_dependent_nos          = (adult_tenant - 1);
      var child_dependent_nos          = child_tenant;
      var adult_dependent_costing      = (adult_pendent_rate * adult_dependent_nos);
      var child_dependent_costing      = (child_pendent_rate * child_dependent_nos);
      
      var own_laundry                  = parseInt($('#own_laundry').val());
      var dependent_laundry            = parseInt($('#dependent_laundry').val());
      var own_laundry_costing          = (own_laundry * 1);
      var dependent_laundry_costing    = (dependent_laundry * (adult_dependent_nos + child_dependent_nos));
      var total_laundry_costing        = (own_laundry_costing + dependent_laundry_costing);
      $('#laundry_charge_val').val(total_laundry_costing);
      $('#laundry_charge').text(total_laundry_costing);

      var pet_rate                     = parseInt($('#pet_rate').val());
      var dog_qty                      = dog_tenant_qty;
      var total_dog_costing            = (pet_rate * dog_qty);
      var cat_qty                      = parseInt($('#cat_qty').val());
      var total_cat_costing            = (pet_rate * cat_qty);

      var furniture_costing            = parseFloat($('#furniture_charge_val').val());
      var storage_costing              = parseFloat($('#storage_charge_val').val());

      var parking_costing              = parseFloat($('#parking_costing').val());

      new_price_estimate_val           += (adult_dependent_costing + child_dependent_costing + total_laundry_costing + total_dog_costing + total_cat_costing + furniture_costing + storage_costing + parking_costing);

      $('#price_estimate_val').val(new_price_estimate_val);
      $('#price_estimate').text(new_price_estimate_val);
   }
   function decreaseDogTenant(){
      let dog_tenant_qty = parseInt($('#dog_qty').val()) - 1;

      var adult_tenant                 = parseInt($('#adult_tenant').val());
      let child_tenant                 = parseInt($('#child_tenant_qty').val());
      var total_tenant                 = (adult_tenant + child_tenant);
      var supply_charge_unit_val       = parseFloat($('#supply_charge_unit_val').val());
      supply_charge_unit_val           = (total_tenant * supply_charge_unit_val);
      $('#supply_charge_val').val(supply_charge_unit_val);
      $('#supply_charge').text(supply_charge_unit_val);
      
      var base_rent_val                = parseFloat($('#base_rent_val').val());
      var new_price_estimate_val       = (base_rent_val + supply_charge_unit_val);

      var adult_pendent_rate           = parseInt($('#adult_pendent_rate').val());
      var child_pendent_rate           = parseInt($('#child_pendent_rate').val());
      var adult_dependent_nos          = (adult_tenant - 1);
      var child_dependent_nos          = child_tenant;
      var adult_dependent_costing      = (adult_pendent_rate * adult_dependent_nos);
      var child_dependent_costing      = (child_pendent_rate * child_dependent_nos);
      
      var own_laundry                  = parseInt($('#own_laundry').val());
      var dependent_laundry            = parseInt($('#dependent_laundry').val());
      var own_laundry_costing          = (own_laundry * 1);
      var dependent_laundry_costing    = (dependent_laundry * (adult_dependent_nos + child_dependent_nos));
      var total_laundry_costing        = (own_laundry_costing + dependent_laundry_costing);
      $('#laundry_charge_val').val(total_laundry_costing);
      $('#laundry_charge').text(total_laundry_costing);

      var pet_rate                     = parseInt($('#pet_rate').val());
      var dog_qty                      = dog_tenant_qty;
      var total_dog_costing            = (pet_rate * dog_qty);
      var cat_qty                      = parseInt($('#cat_qty').val());
      var total_cat_costing            = (pet_rate * cat_qty);

      var furniture_costing            = parseFloat($('#furniture_charge_val').val());
      var storage_costing              = parseFloat($('#storage_charge_val').val());

      var parking_costing              = parseFloat($('#parking_costing').val());

      new_price_estimate_val           += (adult_dependent_costing + child_dependent_costing + total_laundry_costing + total_dog_costing + total_cat_costing + furniture_costing + storage_costing + parking_costing);

      $('#price_estimate_val').val(new_price_estimate_val);
      $('#price_estimate').text(new_price_estimate_val);
   }
   function increaseCatTenant(){
      let cat_tenant_qty = parseInt($('#cat_qty').val()) + 1;

      var adult_tenant                 = parseInt($('#adult_tenant').val());
      let child_tenant                 = parseInt($('#child_tenant_qty').val());
      var total_tenant                 = (adult_tenant + child_tenant);
      var supply_charge_unit_val       = parseFloat($('#supply_charge_unit_val').val());
      supply_charge_unit_val           = (total_tenant * supply_charge_unit_val);
      $('#supply_charge_val').val(supply_charge_unit_val);
      $('#supply_charge').text(supply_charge_unit_val);
      
      var base_rent_val                = parseFloat($('#base_rent_val').val());
      var new_price_estimate_val       = (base_rent_val + supply_charge_unit_val);

      var adult_pendent_rate           = parseInt($('#adult_pendent_rate').val());
      var child_pendent_rate           = parseInt($('#child_pendent_rate').val());
      var adult_dependent_nos          = (adult_tenant - 1);
      var child_dependent_nos          = child_tenant;
      var adult_dependent_costing      = (adult_pendent_rate * adult_dependent_nos);
      var child_dependent_costing      = (child_pendent_rate * child_dependent_nos);
      
      var own_laundry                  = parseInt($('#own_laundry').val());
      var dependent_laundry            = parseInt($('#dependent_laundry').val());
      var own_laundry_costing          = (own_laundry * 1);
      var dependent_laundry_costing    = (dependent_laundry * (adult_dependent_nos + child_dependent_nos));
      var total_laundry_costing        = (own_laundry_costing + dependent_laundry_costing);
      $('#laundry_charge_val').val(total_laundry_costing);
      $('#laundry_charge').text(total_laundry_costing);

      var pet_rate                     = parseInt($('#pet_rate').val());
      var dog_qty                      = parseInt($('#dog_qty').val());
      var total_dog_costing            = (pet_rate * dog_qty);
      var cat_qty                      = cat_tenant_qty;
      var total_cat_costing            = (pet_rate * cat_qty);

      var furniture_costing            = parseFloat($('#furniture_charge_val').val());
      var storage_costing              = parseFloat($('#storage_charge_val').val());

      var parking_costing              = parseFloat($('#parking_costing').val());

      new_price_estimate_val           += (adult_dependent_costing + child_dependent_costing + total_laundry_costing + total_dog_costing + total_cat_costing + furniture_costing + storage_costing + parking_costing);

      $('#price_estimate_val').val(new_price_estimate_val);
      $('#price_estimate').text(new_price_estimate_val);
   }
   function decreaseCatTenant(){
      let cat_tenant_qty = parseInt($('#cat_qty').val()) - 1;

      var adult_tenant                 = parseInt($('#adult_tenant').val());
      let child_tenant                 = parseInt($('#child_tenant_qty').val());
      var total_tenant                 = (adult_tenant + child_tenant);
      var supply_charge_unit_val       = parseFloat($('#supply_charge_unit_val').val());
      supply_charge_unit_val           = (total_tenant * supply_charge_unit_val);
      $('#supply_charge_val').val(supply_charge_unit_val);
      $('#supply_charge').text(supply_charge_unit_val);
      
      var base_rent_val                = parseFloat($('#base_rent_val').val());
      var new_price_estimate_val       = (base_rent_val + supply_charge_unit_val);

      var adult_pendent_rate           = parseInt($('#adult_pendent_rate').val());
      var child_pendent_rate           = parseInt($('#child_pendent_rate').val());
      var adult_dependent_nos          = (adult_tenant - 1);
      var child_dependent_nos          = child_tenant;
      var adult_dependent_costing      = (adult_pendent_rate * adult_dependent_nos);
      var child_dependent_costing      = (child_pendent_rate * child_dependent_nos);
      
      var own_laundry                  = parseInt($('#own_laundry').val());
      var dependent_laundry            = parseInt($('#dependent_laundry').val());
      var own_laundry_costing          = (own_laundry * 1);
      var dependent_laundry_costing    = (dependent_laundry * (adult_dependent_nos + child_dependent_nos));
      var total_laundry_costing        = (own_laundry_costing + dependent_laundry_costing);
      $('#laundry_charge_val').val(total_laundry_costing);
      $('#laundry_charge').text(total_laundry_costing);

      var pet_rate                     = parseInt($('#pet_rate').val());
      var dog_qty                      = parseInt($('#dog_qty').val());
      var total_dog_costing            = (pet_rate * dog_qty);
      var cat_qty                      = cat_tenant_qty;
      var total_cat_costing            = (pet_rate * cat_qty);

      var furniture_costing            = parseFloat($('#furniture_charge_val').val());
      var storage_costing              = parseFloat($('#storage_charge_val').val());

      var parking_costing              = parseFloat($('#parking_costing').val());

      new_price_estimate_val           += (adult_dependent_costing + child_dependent_costing + total_laundry_costing + total_dog_costing + total_cat_costing + furniture_costing + storage_costing + parking_costing);

      $('#price_estimate_val').val(new_price_estimate_val);
      $('#price_estimate').text(new_price_estimate_val);
   }
   function increaseChildTenant(){
      let child_tenant_qty = parseInt($('#child_tenant_qty').val()) + 1;
      // var html = '';
      // var container = $('#child_tenant_age');
      // for(var i = 1; i <= child_tenant_qty; i++) {
      //    html +=   '<p>Child '+i+' Age:</p>\
      //             <div class="dropdown">\
      //                <select class="form-control" name="child_age">\
      //                   <option value="" selected>Select</option>\
      //                   <?php for($t=1;$t<=12;$t++){?>
      //                   <option value="<?=$t?>"><?=$t?></option>\
      //                   <?php }?>
      //                </select>\
      //             </div>';
      // }
      // container.html(html);

      var adult_tenant                 = parseInt($('#adult_tenant').val());
      var child_tenant                 = child_tenant_qty;
      var total_tenant                 = (adult_tenant + child_tenant);
      var supply_charge_unit_val       = parseFloat($('#supply_charge_unit_val').val());
      supply_charge_unit_val           = (total_tenant * supply_charge_unit_val);
      $('#supply_charge_val').val(supply_charge_unit_val);
      $('#supply_charge').text(supply_charge_unit_val);
      
      var base_rent_val                = parseFloat($('#base_rent_val').val());
      var new_price_estimate_val       = (base_rent_val + supply_charge_unit_val);

      var adult_pendent_rate           = parseInt($('#adult_pendent_rate').val());
      var child_pendent_rate           = parseInt($('#child_pendent_rate').val());
      var adult_dependent_nos          = (adult_tenant - 1);
      var child_dependent_nos          = child_tenant;
      var adult_dependent_costing      = (adult_pendent_rate * adult_dependent_nos);
      var child_dependent_costing      = (child_pendent_rate * child_dependent_nos);

      var own_laundry                  = parseInt($('#own_laundry').val());
      var dependent_laundry            = parseInt($('#dependent_laundry').val());
      var own_laundry_costing          = (own_laundry * 1);
      var dependent_laundry_costing    = (dependent_laundry * (adult_dependent_nos + child_dependent_nos));
      var total_laundry_costing        = (own_laundry_costing + dependent_laundry_costing);
      $('#laundry_charge_val').val(total_laundry_costing);
      $('#laundry_charge').text(total_laundry_costing);

      var pet_rate                     = parseInt($('#pet_rate').val());
      var dog_qty                      = parseInt($('#dog_qty').val());
      var total_dog_costing            = (pet_rate * dog_qty);
      var cat_qty                      = parseInt($('#cat_qty').val());
      var total_cat_costing            = (pet_rate * cat_qty);

      var furniture_costing            = parseFloat($('#furniture_charge_val').val());
      var storage_costing              = parseFloat($('#storage_charge_val').val());

      var parking_costing              = parseFloat($('#parking_costing').val());

      new_price_estimate_val           += (adult_dependent_costing + child_dependent_costing + total_laundry_costing + total_dog_costing + total_cat_costing + furniture_costing + storage_costing + parking_costing);

      $('#price_estimate_val').val(new_price_estimate_val);
      $('#price_estimate').text(new_price_estimate_val);
   }
   function decreaseChildTenant(){
      let child_tenant_qty = parseInt($('#child_tenant_qty').val()) - 1;
      // var html = '';
      // var container = $('#child_tenant_age');
      // for(var i = 1; i <= child_tenant_qty; i++) {
      //    html +=   '<p>Child '+i+' Age:</p>\
      //             <div class="dropdown">\
      //                <select class="form-control" name="child_age">\
      //                   <option value="" selected>Select</option>\
      //                   <?php for($t=1;$t<=12;$t++){?>
      //                   <option value="<?=$t?>"><?=$t?></option>\
      //                   <?php }?>
      //                </select>\
      //             </div>';
      // }
      // container.html(html);

      var adult_tenant                 = parseInt($('#adult_tenant').val());
      var child_tenant                 = child_tenant_qty;
      var total_tenant                 = (adult_tenant + child_tenant);
      var supply_charge_unit_val       = parseFloat($('#supply_charge_unit_val').val());
      supply_charge_unit_val           = (total_tenant * supply_charge_unit_val);
      $('#supply_charge_val').val(supply_charge_unit_val);
      $('#supply_charge').text(supply_charge_unit_val);
      
      var base_rent_val                = parseFloat($('#base_rent_val').val());
      var new_price_estimate_val       = (base_rent_val + supply_charge_unit_val);

      var adult_pendent_rate           = parseInt($('#adult_pendent_rate').val());
      var child_pendent_rate           = parseInt($('#child_pendent_rate').val());
      var adult_dependent_nos          = (adult_tenant - 1);
      var child_dependent_nos          = child_tenant;
      var adult_dependent_costing      = (adult_pendent_rate * adult_dependent_nos);
      var child_dependent_costing      = (child_pendent_rate * child_dependent_nos);
      
      var own_laundry                  = parseInt($('#own_laundry').val());
      var dependent_laundry            = parseInt($('#dependent_laundry').val());
      var own_laundry_costing          = (own_laundry * 1);
      var dependent_laundry_costing    = (dependent_laundry * (adult_dependent_nos + child_dependent_nos));
      var total_laundry_costing        = (own_laundry_costing + dependent_laundry_costing);
      $('#laundry_charge_val').val(total_laundry_costing);
      $('#laundry_charge').text(total_laundry_costing);

      var pet_rate                     = parseInt($('#pet_rate').val());
      var dog_qty                      = parseInt($('#dog_qty').val());
      var total_dog_costing            = (pet_rate * dog_qty);
      var cat_qty                      = parseInt($('#cat_qty').val());
      var total_cat_costing            = (pet_rate * cat_qty);

      var furniture_costing            = parseFloat($('#furniture_charge_val').val());
      var storage_costing              = parseFloat($('#storage_charge_val').val());

      var parking_costing              = parseFloat($('#parking_costing').val());

      new_price_estimate_val           += (adult_dependent_costing + child_dependent_costing + total_laundry_costing + total_dog_costing + total_cat_costing + furniture_costing + storage_costing + parking_costing);

      $('#price_estimate_val').val(new_price_estimate_val);
      $('#price_estimate').text(new_price_estimate_val);
   }
   $(document).ready(function(){
      $('#term').on('change', function(){
         var term = $('#term').val();
         var base_rent_val = '<?=(($getUnit)?$getUnit->price:0)?>';
         var base_url = '<?=url('')?>';
         $.ajax({
            type: "POST",
            url: base_url + "/get-lease-rate",
            data: {"_token": "<?php echo e(csrf_token()); ?>", key : '4e1c3ee6861ac425437fa8b662651cde', term : term, base_rent_val : base_rent_val},
            dataType: "JSON",
            beforeSend: function () {
                 
            },
            success: function (res) {
               if(res.status){
                  $('#base_rent_val').val(res.data.new_base_rent);
                  $('#base_rent').text(res.data.new_base_rent);

                  var adult_tenant                 = parseInt($('#adult_tenant').val());
                  let child_tenant                 = parseInt($('#child_tenant_qty').val());
                  var total_tenant                 = (adult_tenant + child_tenant);
                  var supply_charge_unit_val       = parseFloat($('#supply_charge_unit_val').val());
                  supply_charge_unit_val           = (total_tenant * supply_charge_unit_val);
                  $('#supply_charge_val').val(supply_charge_unit_val);
                  $('#supply_charge').text(supply_charge_unit_val);
                  
                  var base_rent_val                = parseFloat(res.data.new_base_rent);
                  var new_price_estimate_val       = (base_rent_val + supply_charge_unit_val);

                  var adult_pendent_rate           = parseInt($('#adult_pendent_rate').val());
                  var child_pendent_rate           = parseInt($('#child_pendent_rate').val());
                  var adult_dependent_nos          = (adult_tenant - 1);
                  var child_dependent_nos          = child_tenant;
                  var adult_dependent_costing      = (adult_pendent_rate * adult_dependent_nos);
                  var child_dependent_costing      = (child_pendent_rate * child_dependent_nos);
                  
                  var own_laundry                  = parseInt($('#own_laundry').val());
                  var dependent_laundry            = parseInt($('#dependent_laundry').val());
                  var own_laundry_costing          = (own_laundry * 1);
                  var dependent_laundry_costing    = (dependent_laundry * (adult_dependent_nos + child_dependent_nos));
                  var total_laundry_costing        = (own_laundry_costing + dependent_laundry_costing);
                  $('#laundry_charge_val').val(total_laundry_costing);
                  $('#laundry_charge').text(total_laundry_costing);

                  var pet_rate                     = parseInt($('#pet_rate').val());
                  var dog_qty                      = parseInt($('#dog_qty').val());
                  var total_dog_costing            = (pet_rate * dog_qty);
                  var cat_qty                      = parseInt($('#cat_qty').val());
                  var total_cat_costing            = (pet_rate * cat_qty);

                  var furniture_costing            = parseFloat($('#furniture_charge_val').val());
                  var storage_costing              = parseFloat($('#storage_charge_val').val());

                  var parking_costing              = parseFloat($('#parking_costing').val());

                  new_price_estimate_val           += (adult_dependent_costing + child_dependent_costing + total_laundry_costing + total_dog_costing + total_cat_costing + furniture_costing + storage_costing + parking_costing);

                  $('#price_estimate_val').val(new_price_estimate_val);
                  $('#price_estimate').text(new_price_estimate_val);
               } else {
                  
               }
            }
         });
      });
      $('#adult_tenant').on('change', function(){
         var adult_tenant                 = parseInt($('#adult_tenant').val());
         let child_tenant                 = parseInt($('#child_tenant_qty').val());
         var total_tenant                 = (adult_tenant + child_tenant);
         var supply_charge_unit_val       = parseFloat($('#supply_charge_unit_val').val());
         supply_charge_unit_val           = (total_tenant * supply_charge_unit_val);
         $('#supply_charge_val').val(supply_charge_unit_val);
         $('#supply_charge').text(supply_charge_unit_val);

         var base_rent_val                = parseFloat($('#base_rent_val').val());
         var new_price_estimate_val       = (base_rent_val + supply_charge_unit_val);

         var adult_pendent_rate           = parseInt($('#adult_pendent_rate').val());
         var child_pendent_rate           = parseInt($('#child_pendent_rate').val());
         var adult_dependent_nos          = (adult_tenant - 1);
         var child_dependent_nos          = child_tenant;
         var adult_dependent_costing      = (adult_pendent_rate * adult_dependent_nos);
         var child_dependent_costing      = (child_pendent_rate * child_dependent_nos);
         
         var own_laundry                  = parseInt($('#own_laundry').val());
         var dependent_laundry            = parseInt($('#dependent_laundry').val());
         var own_laundry_costing          = (own_laundry * 1);
         var dependent_laundry_costing    = (dependent_laundry * (adult_dependent_nos + child_dependent_nos));
         var total_laundry_costing        = (own_laundry_costing + dependent_laundry_costing);
         $('#laundry_charge_val').val(total_laundry_costing);
         $('#laundry_charge').text(total_laundry_costing);

         var pet_rate                     = parseInt($('#pet_rate').val());
         var dog_qty                      = parseInt($('#dog_qty').val());
         var total_dog_costing            = (pet_rate * dog_qty);
         var cat_qty                      = parseInt($('#cat_qty').val());
         var total_cat_costing            = (pet_rate * cat_qty);

         var furniture_costing            = parseFloat($('#furniture_charge_val').val());
         var storage_costing              = parseFloat($('#storage_charge_val').val());

         var parking_costing              = parseFloat($('#parking_costing').val());

         new_price_estimate_val           += (adult_dependent_costing + child_dependent_costing + total_laundry_costing + total_dog_costing + total_cat_costing + furniture_costing + storage_costing + parking_costing);

         $('#price_estimate_val').val(new_price_estimate_val);
         $('#price_estimate').text(new_price_estimate_val);
      });
   });
</script><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/pages/apply-now.blade.php ENDPATH**/ ?>