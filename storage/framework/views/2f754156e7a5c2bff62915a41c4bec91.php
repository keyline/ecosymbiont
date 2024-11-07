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
    <div class="container-fluid">
        <div class="Listing-search-container">
            <form method="GET" action="<?=url('properties-search')?>">
                <div class="Listing-search-container-left">
                    <div class="dropdown">
                        <select class="form-control" name="city" id="city">
                            <option value="" selected disabled hidden>Select City</option>
                            <?php if($cities){ foreach($cities as $city){?>
                                <option value="<?=$city->name?>"><?=$city->name?></option>
                            <?php } }?>
                        </select>
                    </div>
                    <div class="dropdown property_type">
                        <select class="form-control" name="property_type" id="property_type">
                            <option value="" selected disabled hidden>Select Room Type</option>
                            <?php if($propertyTypes){ foreach($propertyTypes as $propertyType){?>
                                <option value="<?=$propertyType->id?>"><?=$propertyType->name?></option>
                            <?php } }?>
                        </select>
                    </div>
                </div>
            </form>
            <div class="Listing-search-container-left">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownsort"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Price
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownsort">
                        <div class="product-price-input">
                            <div>
                                <span>Min price</span>
                                <input type="number" min=1.65 max="71.50" name="price_filter_from" oninput=""
                                    id="min_price" class="price-range-field" />
                            </div>
                            <div class="max-price">
                                <span>Max price</span>
                                <input type="number" min=1.65 max="71.50" name="price_filter_to" oninput=""
                                    id="max_price" class="price-range-field" />
                            </div>
                        </div>
                        <div class="product-price-range">
                            <div id="slider-range" class="price-filter-range" name="rangeInput"></div>
                        </div>
                        <div class="product-price-amount">
                            <span class="title">Price:</span>
                            <span class="amount-price">$1.65</span>
                            <span class="amount-to">-</span>
                            <span class="amount-price">$71.50</span>
                        </div>
                    </div>
                </div>
                <div class="dropdown ">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownfilter"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bathroom
                    </button>
                    <div class="dropdown-menu filter-dropdown" aria-labelledby="dropdownfilter" style="width: auto;">
                        <ul>
                            <li>
                                <input type="radio" name="beds" value="1">
                                <label for="bed1">Shared</label>
                            </li>
                            <li>
                                <input type="radio" name="beds" value="2">
                                <label for="bed2">Personal</label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="dropdown ">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownfilter"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pets
                    </button>
                    <div class="dropdown-menu filter-dropdown" aria-labelledby="dropdownfilter" style="width: auto;">
                        <ul>
                            <li>
                                <input type="radio" name="pets" value="1">
                                <label for="bed1">Allowed</label>
                            </li>
                            <li>
                                <input type="radio" name="pets" value="2">
                                <label for="bed2">Not Allowed</label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="dropdown ">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownfilter"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Couples
                    </button>
                    <div class="dropdown-menu filter-dropdown" aria-labelledby="dropdownfilter" style="width: auto;">
                        <ul>
                            <li>
                                <input type="radio" name="couples" value="1">
                                <label for="bed1">Allowed</label>
                            </li>
                            <li>
                                <input type="radio" name="couples" value="2">
                                <label for="bed2">Not Allowed</label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="dropdown ">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownfilter"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Smoking
                    </button>
                    <div class="dropdown-menu filter-dropdown" aria-labelledby="dropdownfilter" style="width: auto;">
                        <ul>
                            <li>
                                <input type="radio" name="smoking" value="1">
                                <label for="bed1">Allowed</label>
                            </li>
                            <li>
                                <input type="radio" name="smoking" value="2">
                                <label for="bed2">Not Allowed</label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="dropdown ">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownfilter"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Fenced in yard
                    </button>
                    <div class="dropdown-menu filter-dropdown" aria-labelledby="dropdownfilter" style="width: auto;">
                        <ul>
                            <li>
                                <input type="radio" name="fenced" value="1">
                                <label for="bed1">Fenced</label>
                            </li>
                            <li>
                                <input type="radio" name="fenced" value="2">
                                <label for="bed2">open</label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="dropdown ">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownfilter"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-arrow-up-wide-short"></i>
                    </button>
                    <div class="dropdown-menu filter-dropdown new-short-renge-with" aria-labelledby="dropdownfilter">
                        <ul>
                            <li>
                                <input type="radio" name="price" value="1">
                                <label for="price1">Price high to low </label>
                            </li>
                            <li>
                                <input type="radio" name="price" value="2">
                                <label for="price2">Price low to high </label>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="common-inner new-property-listing">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-5 p-0">
                <div class="map-location" id="map">
                    <!-- <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52821204.73059404!2d-161.51042398327496!3d36.094695053960145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sin!4v1706678799514!5m2!1sen!2sin"
                        width="100%" height="1000" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6449038.447275301!2d-84.70791121803009!3d37.88497933376304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x884cd670bdbcb2cd%3A0xc04e4149b746a695!2sVirginia%2C%20USA!5e0!3m2!1sen!2sin!4v1707149932456!5m2!1sen!2sin" width="100%" height="1000" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                </div>
            </div>
            <div class="col-lg-7 property-right-blog">
                <ul class="pro-listing-card pro-listing-card-new">
                    <?php if($properties){ foreach($properties as $property){?>
                        <li>
                            <a href="<?=url('/property-details/'.Helper::encoded($property->id))?>">
                                <?php
                                $minUnitPriceRange = Unit::select('price')->where('property_id', '=', $property->id)->where('status', '=', 1)->min('price');
                                $maxUnitPriceRange = Unit::select('price')->where('property_id', '=', $property->id)->where('status', '=', 1)->max('price');
                                ?>
                                <div class="product-listing-area">
                                    <div class="pro-listing-card-img">
                                        <img src="<?=env('UPLOADS_URL').'property/'.$property->cover_image?>">
                                        <!-- <div class=" ribbon ribbon-hot"><span>Occupied</span></div> -->
                                    </div>
                                    <div class="pro-listing-card-info">
                                        <h3><?=$property->name?></h3>
                                        <p class="pro-info price-list"><strong>Price:</strong>Starting at $<?=$minUnitPriceRange?></p>
                                        <p class="pro-info"><strong>Pets:</strong><?=(($property->is_pets)?'Allowed':'Not Allowed')?></p>
                                        <p class="pro-info"><strong>Smoking:</strong><?=(($property->is_smoking)?'Allowed':'Not Allowed')?></p>
                                        <p class="pro-info"><strong>Couples:</strong><?=(($property->is_couple)?'Allowed':'Not Allowed')?></p>
                                        <p class="pro-info"><strong>Children:</strong><?=(($property->is_children)?'Allowed':'Not Allowed')?></p>
                                        
                                        <div class="facility-list">
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
                                                        <img src="<?=(($getAmenity)?(($getAmenity->icon != '')?env('UPLOADS_URL').'amenity/'.$getAmenity->icon:env('NO_IMAGE')):env('NO_IMAGE'))?>"
                                                            class="img-fluid" />
                                                    </li>
                                                <?php } }?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php } }?>
                </ul>
            </div>
        </div>
    </div>
</div>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyDHeAHBftV28TQMq2iqyO730UC6O0WoE9M" type="text/javascript"></script>
<script type="text/javascript">

    //--------------------- Sample code written by vIr ------------
    var icon = new google.maps.MarkerImage("https://maps.google.com/mapfiles/ms/micons/blue.png",
               new google.maps.Size(32, 32), new google.maps.Point(0, 0),
               new google.maps.Point(16, 32));
                    var center = null;
                    var map = null;
                    var currentPopup;
                    var bounds = new google.maps.LatLngBounds();
                    function addMarker(lat, lng, info) {
                        var pt = new google.maps.LatLng(lat, lng);
                        bounds.extend(pt);
                        var marker = new google.maps.Marker({
                            position: pt,
                            icon: icon,
                            map: map
                        });
                        var popup = new google.maps.InfoWindow({
                            content: info,
                            maxWidth: 300
                        });
                        google.maps.event.addListener(marker, "click", function() {
                            if (currentPopup != null) {
                                currentPopup.close();
                                currentPopup = null;
                            }
                            popup.open(map, marker);
                            currentPopup = popup;
                        });
                        google.maps.event.addListener(popup, "closeclick", function() {
                            map.panTo(center);
                            currentPopup = null;
                        });
                    }           
                    function initMap() {
                        map = new google.maps.Map(document.getElementById("map"), {

                            center: new google.maps.LatLng(0, 0),
                            zoom: 14,
                            mapTypeId: google.maps.MapTypeId.ROADMAP,
                            mapTypeControl: true,
                            mapTypeControlOptions: {
                                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
                            },
                            navigationControl: true,
                            navigationControlOptions: {
                                style: google.maps.NavigationControlStyle.ZOOM_PAN
                            }
                        });
     <?php
     if($properties){ foreach($properties as $property){
        $name = $property->name;
        $lat = $property->latitude;
        $lon = $property->longitude;

        echo("addMarker($lat, $lon, '<b>$name</b>');\n");
    } }
  ?>
   center = bounds.getCenter();
   map.fitBounds(bounds);

   }
</script>
<script type="text/javascript">
    window.onload = (event) => {
      initMap();
    };
</script>
<?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/pages/properties.blade.php ENDPATH**/ ?>