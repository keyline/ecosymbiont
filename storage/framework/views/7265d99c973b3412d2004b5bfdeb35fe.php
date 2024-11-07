<div class="main-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 col-lg-3 col-6">
                <div class="logo">
                    <a href="<?=url('/')?>"><img id="logo" src="<?=env('UPLOADS_URL').$generalSetting->site_logo?>"
                            alt="<?=$generalSetting->site_name?>"></a>
                </div>
            </div>
            <div class="col-md-8 col-lg-9 col-6">
                <div class="stellarnav">
                    <ul>
                        <li><a href="<?=url('/')?>">Home</a></li>
                        <li><a href="javascript:void(0);">Landlords</a>
                            <ul>
                                <li><a href="<?=url('page/landlord-how-it-works')?>">How it works</a>
                                <li><a href="<?=url('page/start-renting-your-home-today')?>">Start Renting Your Home Today</a>
                                <li><a href="<?=url('page/renting-reasons-video')?>">Renting Reasons Video</a></a>
                                <li><a href="<?=url('get-a-free-rental-analysis')?>">Get a Free Rental Analysis </a>
                                <!-- <li><a href="<?=url('properties')?>">Properties</a> -->
                                <?php if(empty(session('user_id'))){?>
                                    <li><a href="<?=url('signin')?>">Landlord Portal</a>
                                <?php } else {?>
                                    <?php if(session('user_type') == 1){?>
                                        <li><a href="<?=url('user/dashboard')?>">Landlord Dashboard</a>
                                    <?php } else {?>
                                        <li><a href="<?=url('signin')?>">Landlord Portal</a>
                                    <?php }?>
                                <?php }?>
                            </ul>
                        </li>
                        <!-- <li><a href="<?=url('services')?>">Services</a></li> -->
                        <!-- <li><a href="<?=url('properties')?>">Properties</a></li> -->
                        <li><a href="javascript:void(0);">For Rent</a>
                            <ul>
                                <li><a href="<?=url('properties')?>">Properties</a></li>
                                <li><a href="<?=url('units')?>">Units</a>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0);">Tenants</a>
                            <ul>
                                <li><a href="<?=url('properties')?>">Properties</a>
                                <li><a href="<?=url('page/tenant-how-it-works')?>">How it works</a>
                                <?php if(empty(session('user_id'))){?>
                                    <li><a href="<?=url('signin')?>">Tenant Portal</a>
                                <?php } else {?>
                                    <?php if(session('user_type') == 2){?>
                                        <li><a href="<?=url('user/dashboard')?>">Tenant Dashboard</a>
                                    <?php } else {?>
                                        <li><a href="<?=url('signin')?>">Tenant Portal</a>
                                    <?php }?>
                                <?php }?>
                            </ul>
                        </li>
                        <!-- <li><a href="<?=url('faq')?>">FAQs</a></li> -->
                        <li><a href="<?=url('contact-us')?>">Contact Us</a></li>
                        <?php if(empty(session('user_id'))){?>
                            <li class="login-btn">
                                <a href="<?=url('signin')?>">
                                    <span>
                                        <img src="<?=env('FRONT_ASSETS_URL')?>assets/img/user-icon.png">
                                    </span>
                                    Sign In
                                </a>
                            </li>
                        <?php } else {?>
                            <li class="drop-btn">
                                <a href="<?=url('user/notifications')?>">
                                    <i class="fa fa-bell"></i>
                                </a>
                            </li>
                            <li class="drop-btn">
                                <div class="dropdown">
                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php if($user->profile_image != ''){?>
                                        <img src="<?=env('UPLOADS_URL').'user/'.$user->profile_image?>">
                                        <?php } else {?>
                                        <img src="<?=env('NO_IMAGE')?>">
                                        <?php }?>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="<?=url('user/dashboard')?>">Dashboard</a>
                                        <a class="dropdown-item" href="<?=url('user/update-profile')?>">Update Profile</a>
                                        <a class="dropdown-item" href="<?=url('user/change-password')?>">Change Password</a>
                                        <!-- <a class="dropdown-item" href="#">Login Log</a> -->
                                        <a class="dropdown-item" href="<?=url('user/signout')?>">Sign Out</a>
                                    </div>
                                </div>
                            </li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/elements/header.blade.php ENDPATH**/ ?>