<?php
use App\Models\PropertyType;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\Unit;
use App\Models\UnitImage;
use App\Models\Amenity;

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
<div class="inner-banner">
    <h3><?=$page_header?></h3>
</div>
<div class="Listing-search">
    <div class="container">
        <div class="Listing-search-container">
            <form method="GET" action="<?=url('properties-search')?>">
                <div class="Listing-search-container-left">
                    <div class="dropdown">
                        <!-- <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownCity" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select City
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownCity">
                            <?php if($cities){ foreach($cities as $city){?>
                                <a class="dropdown-item" href="javascript:void(0);"><?=$city->name?></a>
                            <?php } }?>
                        </div> -->
                        <select class="form-control" name="city" id="city" style="background-color: #2e3191;color: #FFF;">
                            <option value="" selected disabled hidden>Select City</option>
                            <?php if($cities){ foreach($cities as $city){?>
                                <option value="<?=$city->name?>" <?=(($selected_city == $city->name)?'selected':'')?>><?=$city->name?></option>
                            <?php } }?>
                        </select>
                    </div>
                    <div class="dropdown property_type">
                        <!-- <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownProperty" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select Property Type
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownProperty">
                            <?php if($propertyTypes){ foreach($propertyTypes as $propertyType){?>
                                <a class="dropdown-item" href="javascript:void(0);"><?=$propertyType->name?></a>
                            <?php } }?>
                        </div> -->
                        <select class="form-control" name="property_type" id="property_type" style="background-color: #2e3191;color: #FFF;">
                            <option value="" selected disabled hidden>Select Property Type</option>
                            <?php if($propertyTypes){ foreach($propertyTypes as $propertyType){?>
                                <option value="<?=$propertyType->id?>" <?=(($selected_property_type == $propertyType->id)?'selected':'')?>><?=$propertyType->name?></option>
                            <?php } }?>
                        </select>
                    </div>
                    <button class="propertysearchBtn" type="submit">Search</button>
                    <a href="<?=url('properties')?>"><button class="propertysearchBtn" type="button">Reset</button></a>
                </div>
            </form>
            <div class="Listing-search-container-left">
                <div class="dropdown">
                    <!-- <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownsort" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sort
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownsort">
                        <a class="dropdown-item" href="#">Price (Lowest First)</a>
                        <a class="dropdown-item" href="#">Price (Highest First)</a>
                    </div> -->
                    <select class="form-control" name="sort_price" id="sort_price" style="background-color: #2e3191;color: #FFF;">
                        <option value="" selected disabled hidden>Sort</option>
                        <option value="price-asc">Price (Lowest First)</option>
                        <option value="price-desc">Price (Highest First)</option>
                    </select>
                </div>
                <div class="dropdown ">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownfilter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filter
                    </button>
                    <div class="dropdown-menu filter-dropdown" aria-labelledby="dropdownfilter">
                        <div class="filter-container">
                            <h3>Price</h3>
                            <div class="price-range-slider">
  
                                <p class="range-value">
                                  <input type="text" id="amount" readonly>
                                </p>
                                <div id="slider-range" class="range-bar"></div>
                                
                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <h3>Beds</h3>
                                        <ul>
                                            <li>
                                                <input type="radio" name="beds"> Studio
                                            </li>
                                            <li>
                                                <input type="radio" name="beds"> 1 beds
                                            </li>
                                            <li>
                                                <input type="radio" name="beds"> 2 beds
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6">
                                        <h3>Bath</h3>
                                        <ul>
                                            <li>
                                                <input type="radio" name="beds"> Studio
                                            </li>
                                            <li>
                                                <input type="radio" name="beds"> 1 beds
                                            </li>
                                            <li>
                                                <input type="radio" name="beds"> 2 beds
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="common-inner">
    <div class="container">
        <h3><?=count($properties)?> Properties Found</h3>
        <?php if($properties){ foreach($properties as $property){?>
            <?php
            $getPropertyType = PropertyType::select('name')->where('id', '=', $property->property_type)->first();
            ?>
            <div class="pro-listing-card">
                <a href="javascript:void(0);">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="pro-listing-card-img">
                                <img src="<?=env('UPLOADS_URL').'property/'.$property->cover_image?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="pro-listing-card-info">
                                <h3><?=$property->address?></h3>
                                <p class="text-justify"><?=$property->description?></p>
                                <ul>
                                    <?php
                                    $amenityArray = [];
                                    $units = Unit::select('amenities')->where('property_id', '=', $property->id)->get();
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
                                            <img src="<?=(($getAmenity)?(($getAmenity->icon != '')?env('UPLOADS_URL').'amenity/'.$getAmenity->icon:env('NO_IMAGE')):env('NO_IMAGE'))?>" style="width:30px; height: 30px;">
                                            <?=(($getAmenity)?$getAmenity->name:'')?>
                                        </li>
                                    <?php } }?>
                                </ul>
                                <?php
                                $minUnitPriceRange = Unit::select('price')->where('property_id', '=', $property->id)->where('status', '=', 1)->min('price');
                                $maxUnitPriceRange = Unit::select('price')->where('property_id', '=', $property->id)->where('status', '=', 1)->max('price');
                                ?>
                                <p class="mt-3">Price : $<?=$minUnitPriceRange?> - $<?=$maxUnitPriceRange?></p>
                                <p>City : <?=$property->city?></p>
                                <p>Property Type : <?=(($getPropertyType)?$getPropertyType->name:'')?></p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php } }?>
    </div>
</div><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/pages/properties-search-result.blade.php ENDPATH**/ ?>