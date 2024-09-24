<?php
    use App\Models\PropertyType;
    use App\Models\Property;
    use App\Models\PropertyImage;
    use App\Models\Unit;
    use App\Models\UnitImage;
    use App\Models\Amenity;
    use App\Models\Sink;
    use App\Models\Tub;
    use App\Models\Shower;
    use App\Models\Balcony;
    use App\Models\UserAssignPropertyUnit;
    use App\Helpers\Helper;
?>
<div class="row">
    <div class="col-xl-12">
        <?php if(session('success_message')){?>
        <div class="alert alert-success fade show autohide" role="alert">
            <?=session('success_message')?>
        </div>
        <?php }?>
        <?php if(session('error_message')){?>
        <div class="alert alert-danger fade show autohide" role="alert">
            <?=session('error_message')?>
        </div>
        <?php }?>
    </div>
</div>
<!-- <div class="inner-banner">
    <h3><?=$page_header?></h3>
</div> -->
<?php
$minUnitPriceRange  = Unit::select('price')->where('property_id', '=', $propertyDetail->id)->where('status', '=', 1)->min('price');
$maxUnitPriceRange  = Unit::select('price')->where('property_id', '=', $propertyDetail->id)->where('status', '=', 1)->max('price');
$getPropertyType    = PropertyType::select('name')->where('id', '=', $propertyDetail->property_type)->first();
?>
  <div class="property-details">
   <div class="container">
      <div class="details-top">
         <div>
            <h3><?=$propertyDetail->name?></h3>
         </div>
      </div>
	  <div class="section-nav">
     <a class="active" href="#gallery"> Gallery</a>
       <a class=""  href="#overview">Overview</a>
        <a class=""  href="#features">Features</a>
        <a class="" href="#amenities">Amenities</a>
        <a class="" href="#map-distance">Map & Distance Calculator</a>
        <a class="" href="#units">Units</a>
  
	  </div>
      
      <div class="details-image" id="gallery">
         <div class="row">
            <div class="col-lg-6">
               <div class="imageBox bigimg">
                  <a data-fancybox="gallery" data-src="<?=env('UPLOADS_URL').'property/'.$propertyDetail->cover_image?>">
                     <img src="<?=env('UPLOADS_URL').'property/'.$propertyDetail->cover_image?>" />
                  </a>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="row">
                  <?php
                  $propertyImages = PropertyImage::select('property_image')->where('property_id', '=', $propertyDetail->id)->where('status', '=', 1)->limit(4)->get();
                  if($propertyImages){ $i=1; foreach($propertyImages as $propertyImg){
                  ?>
                     <div class="col-lg-6">
                        <div class="imageBox">
                           <a data-fancybox="gallery" data-src="<?=env('UPLOADS_URL').'property/'.$propertyImg->property_image?>">
                               <img src="<?=env('UPLOADS_URL').'property/'.$propertyImg->property_image?>" />
                           </a>
                           <?php if($i==4){?>
                              <a data-fancybox="gallery" data-src="<?=env('UPLOADS_URL').'property/'.$propertyImg->property_image?>" class="Allphotos">
                              See All Photos
                              </a>
                           <?php }?>
                        </div>
                     </div>
                  <?php $i++; } }?>
               </div>
               <?php
               $propertyImages = PropertyImage::select('property_image')->where('property_id', '=', $propertyDetail->id)->where('status', '=', 1)->get();
               if($propertyImages){ $j=1; foreach($propertyImages as $propertyImg){
               ?>
                  <div class="imageBox" style="display:none;">
                     <a data-fancybox="gallery" data-src="<?=env('UPLOADS_URL').'property/'.$propertyImg->property_image?>">
                        <img src="<?=env('UPLOADS_URL').'property/'.$propertyImg->property_image?>" />
                     </a>
                  </div>
               <?php $j++; } }?>
            </div>
         </div>
      </div>
      <div class="property-info">
	    <div class="overview-new-section" id="overview">
         <h4>Overview</h4>
         <p><?=$propertyDetail->description?></p>
          </div>
	<div class="features-new-section" id="features">
         <table class="property-info-table" width="100%" cellspacing="0" cellpadding="10">
            <!-- <tr>
               <th>Address</th>
               <td><?=$propertyDetail->address?></td>
            </tr>
            <tr>
               <th>Landmark</th>
               <td><?=$propertyDetail->city?></td>
            </tr>
            <tr>
               <th>State</th>
               <td><?=$propertyDetail->state?></td>
            </tr>
            <tr>
               <th>Country</th>
               <td><?=$propertyDetail->country?></td>
            </tr> -->
            <tr>
               <th>Furnishing</th>
               <td><?=(($getPropertyType)?$getPropertyType->name:'')?></td>
            </tr>
            <tr>
               <th>Floorings</th>
               <td><?=$propertyDetail->floorings?></td>
            </tr>
            <tr>
               <th>Water Availability</th>
               <td><?=$propertyDetail->water_avl?></td>
            </tr>
            <tr>
               <th>Status Of Electricity</th>
               <td><?=$propertyDetail->electricities?></td>
            </tr>
            <tr>
               <th>Number of Floor</th>
               <td><?=$propertyDetail->no_of_floor?></td>
            </tr>
            <tr>
               <th>Number of Lift</th>
               <td><?=$propertyDetail->no_of_lift?></td>
            </tr>
         </table>
		</div>

         <div class="popular-amenities" id="amenities">
            <h4>Most Popular Amenities</h4>
            <div class="pro-listing-card-info">
               <ul>
                    <?php
                    $amenityArray = [];
                    $units = Unit::select('amenities')->where('property_id', '=', $propertyDetail->id)->get();
                    if($units){ foreach($units as $unit){
                       $amenities = json_decode($unit->amenities);
                       if(!empty($amenities)){ for($a=0;$a<count($amenities);$a++){
                           if(!in_array($amenities[$a], $amenityArray)){
                               $amenityArray[] = $amenities[$a];
                           }
                       } }?>
                    <?php } }?>
                    <?php
                    if(!empty($amenityArray)){ for($a=0;$a<count($amenityArray);$a++){
                        $getAmenity = Amenity::select('name', 'icon')->where('id', '=', $amenityArray[$a])->first();
                    ?>
                        <li>
                            <img src="<?=(($getAmenity)?(($getAmenity->icon != '')?env('UPLOADS_URL').'amenity/'.$getAmenity->icon:env('NO_IMAGE')):env('NO_IMAGE'))?>"
                            style="width:20px; height: 20px;background-color: #FFF;">
                            <span><?=(($getAmenity)?$getAmenity->name:'')?></span>
                        </li>
                    <?php } }?>
               </ul>
            </div>
         </div>
     <div class="map-distance-calculator" id="map-distance">
         <div class="row mt-3 mb-3">
            <div class="col-md-4">
               <div class="Miles-away">
                  <input type="text" class="form-control" placeholder="Enter Location To Calculate Distances">
                  <ul>
                     <li>
                        <div class="triggericon">
                           <i class="fas fa-walking"></i>
                        </div>
                        <div>
                           <button type="button" class="triggerText">Walk Time</button>
                           <div class="trigger-des"><p class="hrfydd-tit">Distance:<span class=" hrfydd">18.3 km.</span></p>
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="triggericon">
                           <i class="fa fa-car" aria-hidden="true"></i>
                         </div>
                        <div>
                           <button type="button" class="triggerText">Driving Time</button>
                           <div class="trigger-des"><p class="hrfydd-tit">Distance:<span class=" hrfydd">2.3 km.</span></p>
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="triggericon">
                        <i class="fa-solid fa-bus"></i>
                        </div>
                        <div>
                           <button type="button" class="triggerText">Bus Time</button>
                           <div class="trigger-des"><p class="hrfydd-tit">Distance:<span class=" hrfydd">4.3 km.</span></p>
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="triggericon">
                        <i class="fa fa-train" aria-hidden="true"></i>
                        </div>
                        <div>
                           <button type="button" class="triggerText">Train Time</button>
                           <div class="trigger-des"><p class="hrfydd-tit">Distance:<span class=" hrfydd">5.3 km.</span></p>
                           </div>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="col-md-8">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6449038.447275301!2d-84.70791121803009!3d37.88497933376304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x884cd670bdbcb2cd%3A0xc04e4149b746a695!2sVirginia%2C%20USA!5e0!3m2!1sen!2sin!4v1707149932456!5m2!1sen!2sin" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
         </div>
		 </div>

         
         <?php
         $propertyUnits = Unit::where('property_id', '=', $propertyDetail->id)->where('status', '=', 1)->get();
         if($propertyUnits){ foreach($propertyUnits as $propertyUnit){
            $checkBookedUnit = UserAssignPropertyUnit::where('property_id', '=', $propertyDetail->id)->where('unit_id', '=', $propertyUnit->id)->where('is_booked', '=', 1)->first();            
         ?>
            <div class="room-list <?=(($checkBookedUnit)?'property-unavailable':'')?>" id="units">
			      <?php if($checkBookedUnit){?><div class="unavailable-tag"><p>unavailable</p></div><?php }?>
               <div class="row">
                  <div class="col-lg-5">
                     <div class="room-image">
                        <ul>
                           <li>
                              <div class="room-slice-image">
                                 <a data-fancybox="gallery" data-src="<?=env('UPLOADS_URL').'property/'.$propertyUnit->cover_image?>">
                                    <img src="<?=env('UPLOADS_URL').'property/'.$propertyUnit->cover_image?>" style="height: 464px;border-radius: 0px;" />
                                 </a>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-7">
                     <div class="room-info-details">
      					   <div class="room-name-available-date">
                           <h5><?=$propertyUnit->name?></h5>
      						   <p class="available-date">Available on Date: <span>23/2/2024</span></p>
      						   <p class="devider" style="color:#ccc;">|</p>
      						   <p class="rent-start">Rent Starting From: <span>$<?=$propertyUnit->price?></span></p>
      						</div>
                        <ul class="room-info-l-t">
                           <li>
                              <span>Base Rent</span>
                              <b>$ <?=$propertyUnit->price?></b>
                           </li>
                           <li>
                              <span>Bath Type</span>
                              <b><?=$propertyUnit->bath_type?></b>
                           </li>
                           <li>
                              <span>Closet</span>
                              <b><?=$propertyUnit->closet?></b>
                           </li>
                           <li>
                              <span>Sink</span>
                              <b><?=$propertyUnit->sinks?></b>
                           </li>
                           <li>
                              <span>Tub</span>
                              <b><?=$propertyUnit->tubs?></b>
                           </li>
                           <li>
                              <span>Shower</span>
                              <b><?=$propertyUnit->showers?></b>
                           </li>
                           <li>
                              <span>Balcony</span>
                              <b><?=$propertyUnit->no_of_balcony?></b>
                           </li>
                           <li>
                              <span>Pets</span>
                              <b><?=$propertyUnit->is_pets?></b>
                           </li>
                           <li>
                              <span>Couples</span>
                              <b><?=$propertyUnit->is_couple?></b>
                           </li>
                           <li>
                              <span>Smoking</span>
                              <b><?=$propertyUnit->is_smoking?></b>
                           </li>
                           <li>
                              <span>Children</span>
                              <b><?=$propertyUnit->is_children?></b>
                           </li>
                           <li>
                              <span>Separate Entry</span>
                              <b><?=$propertyUnit->separate_entry?></b>
                           </li>
                           <li>
                              <span>Kitchenette</span>
                              <b><?=$propertyUnit->kitchenette?></b>
                           </li>
                           <li>
                              <span>Spare Room/Area</span>
                              <b><?=$propertyUnit->total_super_built_area?> sqft.</b>
                           </li>
                           <li>
                              <span># of Bedrooms</span>
                              <b><?=$propertyUnit->no_of_bed?></b>
                           </li>
                           <li>
                              <span>Additional Storage Space</span>
                              <b><?=$propertyUnit->additional_storage_space?></b>
                           </li>
                        </ul>
                        <a href="<?=url('/unit-details/'.Helper::encoded($propertyUnit->id))?>" target="_blank"><button
                           class="theme-btn">View Details</button></a>
                     </div>
                  </div>
               </div>
            </div>
         <?php } }?>
      </div>
   </div>
</div>
<?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/pages/property-details.blade.php ENDPATH**/ ?>