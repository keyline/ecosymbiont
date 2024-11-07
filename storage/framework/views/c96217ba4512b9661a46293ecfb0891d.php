<div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <!-- <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:void(0);">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
      </ol> -->
      <h6 class="font-weight-bolder mb-0"><?=$page_header?></h6>
    </nav>
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
        <!-- <div class="input-group">
          <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
          <input type="text" class="form-control" placeholder="Type here...">
        </div> -->
      </div>
      <ul class="navbar-nav  justify-content-end">
        <li class="nav-item d-flex align-items-center">
          <!-- <a class="btn btn-outline-primary btn-sm mb-0 me-3" target="_blank"
            href="https://www.creative-tim.com/builder?ref=navbar-soft-ui-dashboard">Online Builder</a> -->
        </li>
        <li class="nav-item d-flex align-items-center">
          <a href="<?=url('user/dashboard')?>" class="nav-link text-body font-weight-bold px-0">
            <!-- <i class="fa fa-user me-sm-1"></i> -->
            <?php if($user){?>
              <?php if($user->profile_image != ''){?>
                 <img alt="<?=(($user)?$user->first_name.' '.$user->last_name:'')?>" src="<?=env('UPLOADS_URL').'user/'.$user->profile_image?>" style="border-radius: 50%; height: 50px; width: 50px;">
              <?php } else {?>
                 <img alt="<?=(($user)?$user->first_name.' '.$user->last_name:'')?>" src="https://d30y9cdsu7xlg0.cloudfront.net/png/138926-200.png" height="25">
              <?php }?>
           <?php } else {?>
              <img alt="<?=(($user)?$user->first_name.' '.$user->last_name:'')?>" src="https://d30y9cdsu7xlg0.cloudfront.net/png/138926-200.png" height="25">
           <?php }?>
            <span class="d-sm-inline d-none">Welcome <?=session('name')?></span>
          </a>
        </li>
        <li class="nav-item px-3 d-flex align-items-center">
          <a href="<?=url('user/signout')?>" class="nav-link text-body font-weight-bold px-0">
            <i class="fa fa-sign-out me-sm-1"></i>
            <span class="d-sm-inline d-none">Sign Out</span>
          </a>
        </li>
        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
          <a href="javascript:void(0);" class="nav-link text-body p-0" id="iconNavbarSidenav">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </a>
        </li>
        <!-- <li class="nav-item px-3 d-flex align-items-center">
          <a href="javascript:;" class="nav-link text-body p-0">
            <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
          </a>
        </li> -->
      </ul>
    </div>
  </div><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/front/elements/afterheader.blade.php ENDPATH**/ ?>