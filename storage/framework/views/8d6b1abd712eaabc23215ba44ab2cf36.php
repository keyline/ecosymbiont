<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none ">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
    <i class="bx bx-menu bx-sm"></i>
    </a>
</div>
<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <!-- Search -->
    <!-- <div class="navbar-nav align-items-center">
        <div class="nav-item d-flex align-items-center">
            <i class="bx bx-search fs-4 lh-0"></i>
            <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="Search..." aria-label="Search...">
        </div>
    </div> -->
    <!-- /Search -->
    <ul class="navbar-nav flex-row align-items-center ms-auto">
        <!-- Place this tag where you want the button to render. -->
        <li class="nav-item lh-1 me-3">
            <a href="<?=url('user/notifications')?>"><i class="fa fa-bell"></i></a>
        </li>
        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <div class="avatar avatar-online">
                    <?php if($user->profile_image != ''){?>
                        <img src="<?=env('UPLOADS_URL').'user/'.$user->profile_image?>" alt="<?=$user->first_name.' '.$user->last_name?>" class="w-px-40 h-auto rounded-circle">
                    <?php } else {?>
                        <img src="<?=env('NO_IMAGE')?>" class="w-px-40 h-auto rounded-circle">
                    <?php }?>
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="javascript:void(0);">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar avatar-online">
                                    <?php if($user->profile_image != ''){?>
                                        <img src="<?=env('UPLOADS_URL').'user/'.$user->profile_image?>" alt="<?=$user->first_name.' '.$user->last_name?>" class="w-px-40 h-auto rounded-circle">
                                    <?php } else {?>
                                        <img src="<?=env('NO_IMAGE')?>" class="w-px-40 h-auto rounded-circle">
                                    <?php }?>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <span class="fw-medium d-block"><?=$user->first_name.' '.$user->last_name?></span>
                                <small class="text-muted"><?=(($user->type == 1)?'Landlord':'Tenant')?></small>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a class="dropdown-item" href="<?=url('user/dashboard')?>">
                    <i class="fa fa-dashboard me-2"></i>
                    <span class="align-middle">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="<?=url('user/update-profile')?>">
                    <i class="fa fa-user me-2"></i>
                    <span class="align-middle">Update Profile</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="<?=url('user/change-password')?>">
                    <i class="bx bx-cog me-2"></i>
                    <span class="align-middle">Change Password</span>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a class="dropdown-item" href="<?=url('user/signout')?>">
                    <i class="bx bx-power-off me-2"></i>
                    <span class="align-middle">Sign Out</span>
                    </a>
                </li>
            </ul>
        </li>
        <!--/ User -->
    </ul>
</div><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/elements/after-header.blade.php ENDPATH**/ ?>