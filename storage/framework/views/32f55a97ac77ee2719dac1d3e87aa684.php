<?php
use App\Models\User;
use App\Models\Property;
use App\Models\Unit;
use App\Models\EnquiryLead;
use App\Models\UserApplicationForm;
use App\Helpers\Helper;
?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y property-information-form">
    <h4 class="py-3 mb-1"><span class="text-muted fw-light"><h4><?=$page_header?></h4></h4>
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-4 pb-0 mb-3">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center p-0  mb-2">
                        <div class="card px-0 pt-4 pb-0 mb-3">
                            <?php if(session('success_message')): ?>
                                <h6 class="alert alert-success autohide"><?php echo e(session('success_message')); ?></h6>
                            <?php endif; ?>
                            <?php if(session('error_message')): ?>
                                <h6 class="alert alert-danger autohide"><?php echo e(session('error_message')); ?></h6>
                            <?php endif; ?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Enquiry no.</td>
                                        <td>Property</td>
                                        <td>Unit</td>
                                        <td>Preferred Date</td>
                                        <td>Preferred Time</td>
                                        <td>Estimated Rent</td>
                                        <td>Application Form</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($inquires){ $sl=1; foreach($inquires as $inquiry){?>
                                        <?php
                                        $property           = Property::select('name')->where('id', '=', $inquiry->property_id)->first();
                                        $propertyUnit       = Unit::select('name', 'price')->where('id', '=', $inquiry->unit_id)->first();
                                        $userApplication    = UserApplicationForm::select('step')->where('lead_id', '=', $inquiry->id)->first();
                                        ?>
                                        <tr>
                                            <td><?=$sl++?></td>
                                            <td><?=$inquiry->enquiry_no?></td>
                                            <td><?=(($property)?$property->name:'')?></td>
                                            <td><?=(($propertyUnit)?$propertyUnit->name:'')?></td>
                                            <td><?=date_format(date_create($inquiry->preferred_date), "M d, Y")?></td>
                                            <td><?=date_format(date_create($inquiry->preferred_time), "h:i A")?></td>
                                            <td>
                                                <?=number_format($inquiry->price_estimate_val,2)?>
                                                <?php if($inquiry->price_estimate_val <= 0){?>
                                                    <p>
                                                        <a href="<?=url('user/inquiry-form/'.Helper::encoded($inquiry->property_id).'/'.Helper::encoded($inquiry->unit_id).'/'.Helper::encoded($inquiry->id))?>" class="btn btn-primary btn-sm">Inquiry Form</a>
                                                    </p>
                                                <?php }?>
                                            </td>
                                            <td>
                                                <?php if($inquiry->price_estimate_val > 0){?>
                                                    <?php if($userApplication){?>
                                                        <?php if($userApplication->step == '9.0'){?>
                                                            <h6 class="badge bg-success text-light">Application Form Submitted</h6>
                                                        <?php } else {?>
                                                            <p>
                                                                <a href="<?=url('user/application-form/'.Helper::encoded($inquiry->id))?>" class="btn btn-info btn-sm">Application Form</a>
                                                            </p>
                                                        <?php }?>
                                                    <?php } else {?>
                                                        <p>
                                                            <a href="<?=url('user/application-form/'.Helper::encoded($inquiry->id))?>" class="btn btn-primary btn-sm">Application Form</a>
                                                        </p>
                                                    <?php }?>
                                                <?php }?>
                                            </td>
                                        </tr>
                                    <?php } }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content --><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/pages/user/inquiry-list.blade.php ENDPATH**/ ?>