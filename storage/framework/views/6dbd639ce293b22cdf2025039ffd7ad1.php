<?php
use App\Models\UserAssignPropertyUnit;
use Illuminate\Support\Facades\Route;;
$routeName    = Route::current();
$pageName     = explode("/", $routeName->uri());
$pageSegment  = $pageName[1];
$pageFunction = ((count($pageName)>2)?$pageName[2]:'');

$uId            = session('user_id');
$getAccessedProperty = UserAssignPropertyUnit::where('user_id', '=', $uId)->orderBy('id', 'DESC')->first();
if($getAccessedProperty){
    $access_personal_info = $getAccessedProperty->access_personal_info;
    $access_kin_indemnity = $getAccessedProperty->access_kin_indemnity;
} else {
    $access_personal_info = 0;
    $access_kin_indemnity = 0;
}
?>
<div class="app-brand demo ">
    <a href="index-2.html" class="app-brand-link">
        <span class="app-brand-logo demo">
            <a href="<?=url('/')?>"><img id="logo" src="<?=env('UPLOADS_URL').$generalSetting->site_logo?>" alt="<?=$generalSetting->site_name?>"></a>
        </span>
        <!-- <span class="app-brand-text demo menu-text fw-bold ms-2">Sneat</span> -->
    </a>
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
    <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
</div>
<div class="menu-inner-shadow"></div>
<ul class="menu-inner py-1">
    <li class="menu-item">
        <a href="<?=url('user/dashboard')?>" class="menu-link">
            <i class="fa fa-dashboard me-2"></i>
            <div data-i18n="Support">Dashboard</div>
        </a>
    </li>
    <li class="menu-item">
        <a href="<?=url('user/inquiry-list')?>" class="menu-link">
            <i class="fas fa-users me-2"></i>
            <div data-i18n="Support">Inquiry List</div>
        </a>
    </li>
    <li class="menu-item">
        <a href="<?=url('user/upload-documents')?>" class="menu-link">
            <i class="fas fa-users me-2"></i>
            <div data-i18n="Support">Documents</div>
        </a>
    </li>
    <li class="menu-item">
        <a href="<?=url('user/pay-rent')?>" class="menu-link">
            <i class="fas fa-users me-2"></i>
            <div data-i18n="Support">Pay Rent</div>
        </a>
    </li>
    <li class="menu-item">
        <a href="<?=url('user/payment-history')?>" class="menu-link">
            <i class="fas fa-users me-2"></i>
            <div data-i18n="Support">Payment History</div>
        </a>
    </li>
    <li class="menu-item">
        <a href="<?=url('user/service-maintenance-request')?>" class="menu-link">
            <i class="fas fa-users me-2"></i>
            <div data-i18n="Support">Service Maintenance</div>
        </a>
    </li>
</ul><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/elements/sidebar.blade.php ENDPATH**/ ?>