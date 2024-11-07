<?php
use App\Models\PropertyType;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\Unit;
use App\Models\UnitImage;
use App\Models\Amenity;

use App\Helpers\Helper;
$getProperty           = Property::select('name')->where('id', '=', $getLead->property_id)->first();
$getUnit               = Unit::select('name', 'price')->where('id', '=', $getLead->unit_id)->first();
?>
<div class="inner-banner">
    <h3><?=$page_header?></h3>
</div>
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
<div class="common-inner new-property-listing">
    <div class="container-fluid p-0">
        <div class="row mt-3 mb-3">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 property-right-blog">
                <table class="table table-striped">
                    <tr>
                        <th colspan="2">
                            <h5 class="alert alert-success text-center">Thank you for your enquiry. We will get back to you soon !!!</h5>
                        </th>
                    </tr>
                    <tr>
                        <th>Enquiry No.</th>
                        <td><?=$getLead->enquiry_no?></td>
                    </tr>
                    <tr>
                        <th>Property</th>
                        <td><?=(($getProperty)?$getProperty->name:'')?></td>
                    </tr>
                    <tr>
                        <th>Unit</th>
                        <td><?=(($getUnit)?$getUnit->name:'')?></td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><?=$getLead->first_name.' '.$getLead->last_name?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?=$getLead->email?></td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td><?=$getLead->phone?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><?=$getLead->address?> <?=$getLead->street_no?> <?=$getLead->locality?> <?=$getLead->city?> <?=$getLead->zipcode?> <?=$getLead->state?> <?=$getLead->country?></td>
                    </tr>
                    <tr>
                        <th>Estimated Price / Month</th>
                        <td>$<?=$getLead->price_estimate_val?></td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</div><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/pages/enquiry-success.blade.php ENDPATH**/ ?>