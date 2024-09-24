<?php
  use App\Models\PropertyType;
  use App\Models\Property;
  use App\Models\PropertyImage;
  use App\Models\Unit;
  use App\Models\UnitImage;
  use App\Models\Amenity;
  use App\Models\EnquiryLead;
  use App\Models\UserAssignPropertyUnit;
  use App\Helpers\Helper;

  use Illuminate\Support\Facades\Route;
  $current_link       = url()->current();
  $getPropertyType    = PropertyType::select('name')->where('id', '=', $propertyDetail->property_type)->first();
?>
<div class="property-details unit-details-main">
   <div class="container">
      <div class="details-top">
         <div>
            <h3><?=$page_header?></h3>
         </div>
         <b>$<?=$unitDetail->price?> <span>/Month</span></b>
      </div>
      <div class="details-image">
         <div class="row">
            <div class="col-lg-6">
               <div class="imageBox bigimg">
                  <a data-fancybox="gallery" data-src="<?=env('UPLOADS_URL').'property/'.$unitDetail->cover_image?>">
                  <img src="<?=env('UPLOADS_URL').'property/'.$unitDetail->cover_image?>">
                  </a>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="row">
                  <?php
                  $unitImages = UnitImage::select('unit_image')->where('property_id', '=', $unitDetail->id)->where('status', '=', 1)->limit(4)->get();
                  if($unitImages){ $i=1; foreach($unitImages as $unitImg){
                  ?>
                    <div class="col-lg-6">
                       <div class="imageBox">
                          <a data-fancybox="gallery" data-src="<?=env('UPLOADS_URL').'property/'.$unitImg->unit_image?>">
                          <img src="<?=env('UPLOADS_URL').'property/'.$unitImg->unit_image?>">
                          </a>
                       </div>
                    </div>
                  <?php $i++; } }?>
               </div>
                <?php
                $unitImages = UnitImage::select('unit_image')->where('property_id', '=', $propertyDetail->id)->where('status', '=', 1)->get();
                if($unitImages){ $j=1; foreach($unitImages as $unitImg){
                ?>
                 <div class="imageBox" style="display:none;">
                    <a data-fancybox="gallery" data-src="<?=env('UPLOADS_URL').'property/'.$unitImg->unit_image?>">
                    <img src="<?=env('UPLOADS_URL').'property/'.$unitImg->unit_image?>">
                    </a>
                 </div>
               <?php $j++; } }?>
            </div>
         </div>
      </div>
      <div class="property-info">
         <h4>Overview</h4>
         <p><?=$unitDetail->description?></p>
         <div class="unit-room-overview">
            <ul class="room-info-l-t">
               <li>
                  <span>Base Rent:</span>
                  <b>$ <?=$unitDetail->price?></b>
               </li>
               <li>
                  <span>Bath Type:</span>
                  <b><?=$unitDetail->bath_type?></b>
               </li>
               <li>
                  <span>Closet:</span>
                  <b><?=$unitDetail->closet?></b>
               </li>
               <li>
                  <span>Sink:</span>
                  <b><?=$unitDetail->sinks?></b>
               </li>
               <li>
                  <span>Tub:</span>
                  <b><?=$unitDetail->tubs?></b>
               </li>
               <li>
                  <span>Shower:</span>
                  <b><?=$unitDetail->showers?></b>
               </li>
               <li>
                  <span>Balcony:</span>
                  <b><?=$unitDetail->no_of_balcony?></b>
               </li>
               <li>
                  <span>Pets:</span>
                  <b><?=$unitDetail->is_pets?></b>
               </li>
               <li>
                  <span>Couples:</span>
                  <b><?=$unitDetail->is_couple?></b>
               </li>
               <li>
                  <span>Smoking:</span>
                  <b><?=$unitDetail->is_smoking?></b>
               </li>
               <li>
                  <span>Children:</span>
                  <b><?=$unitDetail->is_children?></b>
               </li>
               <li>
                  <span>Separate Entry:</span>
                  <b><?=$unitDetail->separate_entry?></b>
               </li>
               <li>
                  <span>Kitchenette:</span>
                  <b><?=$unitDetail->kitchenette?></b>
               </li>
               <li>
                  <span>Spare Room/Area:</span>
                  <b><?=$unitDetail->total_super_built_area?> sqft.</b>
               </li>
               <li>
                  <span># of Bedrooms:</span>
                  <b><?=$unitDetail->no_of_bed?></b>
               </li>
               <li>
                  <span>Additional Storage Space:</span>
                  <b><?=$unitDetail->additional_storage_space?></b>
               </li>
            </ul>
         </div>
         <div class="popular-amenities">
            <h4>Most Popular Facilities</h4>
            <div class="pro-listing-card-info">
              <?php
              $amenityArray = [];
              $units = Unit::select('amenities')->where('id', '=', $unitDetail->id)->get();
              if($units){ foreach($units as $unit){
                  $amenities = json_decode($unit->amenities);
                  if(!empty($amenities)){ for($a=0;$a<count($amenities);$a++){
                      if(!in_array($amenities[$a], $amenityArray)){
                          $amenityArray[] = $amenities[$a];
                      }
                  } }?>
                <?php } }?>
               <ul>
                  <?php
                  if(!empty($amenityArray)){ for($a=0;$a<count($amenityArray);$a++){
                      $getAmenity = Amenity::select('name', 'icon')->where('id', '=', $amenityArray[$a])->first();
                  ?>
                    <li>
                       <img src="<?=(($getAmenity)?(($getAmenity->icon != '')?env('UPLOADS_URL').'amenity/'.$getAmenity->icon:env('NO_IMAGE')):env('NO_IMAGE'))?>" style="filter: brightness(0) invert(1);width:35px; height: 35px;">
                       <span><?=(($getAmenity)?$getAmenity->name:'')?></span>
                    </li>
                  <?php } }?>
               </ul>
            </div>
         </div>
         <div class="similar-rooms">
            <div class="container">
    			    <div class="row ">
                <h4>Similar Rooms You May Like</h4>
                <div class="similar-rooms-slider" id="room-slider">
                  <?php
                  if($similarRooms) { foreach($similarRooms as $similarRoom){
                    $propertyDetail         = Property::select('name')->where('id', '=', $similarRoom->property_id)->first();
                  ?>
                    <div class="item">
                       <div class="similar-rooms-list">
                          <img src="<?=env('UPLOADS_URL').'property/'.$similarRoom->cover_image?>">
                          <div class="similar-rooms-details">
                            <h2><?=$similarRoom->name?></h2>
                            <h6 class="text-light"><?=(($propertyDetail)?$propertyDetail->name:'')?></h6>
                            <p><?=$similarRoom->no_of_bed?></p>
                          </div>
                       </div>
                    </div>
                  <?php } }?>
                </div>
              </div>
  			    </div>
         </div>
         <div class="pro-listing-card-info btn-new-group">
            <div class="text-center">
               <!-- <?php if(session('user_id') != ''){?>
                  <a href="<?=url('apply-now/'.Helper::encoded($unitDetail->property_id).'/'.Helper::encoded($unitDetail->id))?>" class="theme-btn btn-bg">Apply Now</a>
               <?php } else {?>
                  <a href="<?=url('/signin/'.Helper::encoded($current_link))?>" class="theme-btn btn-bg">Apply Now</a>
               <?php }?> -->
               <!-- <a href="<?=url('apply-now/'.Helper::encoded($unitDetail->property_id).'/'.Helper::encoded($unitDetail->id))?>" class="theme-btn btn-bg" target="_blank">Apply Now</a> -->
               <a href="<?=url('schedule-tour/'.Helper::encoded($unitDetail->property_id).'/'.Helper::encoded($unitDetail->id))?>" class="theme-btn">Schedule a Tour Now</a>
            </div>
         </div>
      </div>
   </div>
</div><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/pages/unit-details.blade.php ENDPATH**/ ?>