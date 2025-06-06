<?php
use Illuminate\Support\Facades\Route;;
$routeName    = Route::current();
$pageName     = explode("/", $routeName->uri());
$pageSegment  = $pageName[1];
$pageFunction = ((count($pageName)>2)?$pageName[2]:'');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?=$head?>
  <style type="text/css">
    #simpletable_filter{
      float: right;
    }
    .simpletable_length label {
      display: inline-flex;
      padding: 10px;
    }
    .dt-buttons button{
      padding: 2px 20px;
      background-color: <?=$generalSetting->theme_color?>;
      color: <?=$generalSetting->font_color?>;
      border-radius: 50px;
      border:2px solid <?=$generalSetting->theme_color?>;
      transition: all .3s ease-in-out;
      box-shadow: 0 9px 20px -10px #a5a5a5;
    }
    .dt-buttons button:hover{
      background: transparent;
      color: <?=$generalSetting->theme_color?>;
      border:2px solid <?=$generalSetting->theme_color?>;
    }
    .dataTables_length label,
    .dataTables_filter label{
      display: inline-flex;
      align-items: center;
      margin-bottom: 10px;
    }
    .dataTables_length label select{
      margin: 0 10px;
    }
    .dataTables_filter label input{
      margin-left: 10px;
    }
    .pagination{
      justify-content: end;
    }
    .sidebar-nav .nav-content a:hover, .sidebar-nav .nav-content a.active{
      color: #dc3545
    }
    .passeye {
      position: absolute;
      right: 6px;
      top: 50%;
      transform: translate(0, -50%);
    }
  </style>
</head>
<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl   footer-offset">
  <script src="<?=env('ADMIN_ASSETS_URL')?>assets/js/hs.theme-appearance.js"></script>
  <script src="<?=env('ADMIN_ASSETS_URL')?>assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js"></script>
  <!-- ========== HEADER ========== -->
  <header id="header" class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-container navbar-bordered bg-white">
    <?=$header?>
  </header>
  <!-- ========== END HEADER ========== -->
  <!-- ========== MAIN CONTENT ========== -->
  <!-- Navbar Vertical -->
  <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white  ">
    <?=$sidebar?>
  </aside>
  <!-- End Navbar Vertical -->
  <main id="content" role="main" class="main">
    <div class="content container-fluid">
      <?=$maincontent?>
    </div>
    <!-- Footer -->
    <div class="footer">
      <?=$footer?>
    </div>
    <!-- End Footer -->
  </main>
  <!-- ========== END MAIN CONTENT ========== -->
  <!-- ONLY DEV -->
  <!-- Builder -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasBuilder" aria-labelledby="offcanvasBuilderLabel">
    <div class="offcanvas-header align-items-start">
      <div>
        <h3 id="offcanvasBuilderLabel">Front Builder</h3>
        <p class="mb-0">Customize the overview page layout.</p>
      </div>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <h4 class="mb-1">Theme Appearance Mode</h4>
      <p>Check out all <a href="documentation/layout.html">Layout Options here</a></p>
      <div class="row gx-3">
        <!-- Check -->
        <div class="col-6">
          <div class="form-check form-check-label-highlighter text-center">
            <input type="radio" class="form-check-input" name="layoutSkinsRadio" id="layoutSkinsRadio1" checked value="default">
            <label class="form-check-label mb-2" for="layoutSkinsRadio1">
              <img class="form-check-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/img/415x310/img1.jpg" alt="Image Description">
            </label>
            <span class="form-check-text">Default</span>
          </div>
        </div>
        <!-- End Check -->
        <!-- Check -->
        <div class="col-6">
          <div class="form-check form-check-label-highlighter text-center">
            <input type="radio" class="form-check-input" name="layoutSkinsRadio" id="layoutSkinsRadio2" value="dark">
            <label class="form-check-label mb-2" for="layoutSkinsRadio2">
              <img class="form-check-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/img/415x310/img2.jpg" alt="Image Description">
            </label>
            <span class="form-check-text">Dark Mode</span>
          </div>
        </div>
        <!-- End Check -->
      </div>
      <!-- End Row -->
      <hr>
      <div class="row gx-3">
        <!-- Check -->
        <div class="col-6">
          <div class="form-check form-check-label-highlighter text-center">
            <input type="radio" class="form-check-input" name="layout" id="navbarLayoutSkinsRadio1" checked value="default">
            <label class="form-check-label mb-2" for="navbarLayoutSkinsRadio1">
              <img class="form-check-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/layouts-light/sidebar-default.svg" alt="Image Description" data-hs-theme-appearance="dark">
              <img class="form-check-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/layouts/sidebar-default.svg" alt="Image Description" data-hs-theme-appearance="default">
            </label>
            <span class="form-check-text">Default</span>
          </div>
        </div>
        <!-- End Check -->
        <!-- Check -->
        <div class="col-6">
          <div class="form-check form-check-label-highlighter text-center">
            <input type="radio" class="form-check-input" name="layout" id="navbarLayoutSkinsRadio2" value="navbar-dark">
            <label class="form-check-label mb-2" for="navbarLayoutSkinsRadio2">
              <img class="form-check-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/layouts-light/sidebar-dark.svg" alt="Image Description" data-hs-theme-appearance="dark">
              <img class="form-check-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/layouts/sidebar-dark.svg" alt="Image Description" data-hs-theme-appearance="default">
            </label>
            <span class="form-check-text">Dark</span>
          </div>
        </div>
        <!-- End Check -->
      </div>
      <!-- End Row -->
      <hr>
      <h4 class="mb-1">Sidebar Nav</h4>
      <p>Check out all <a href="documentation/layout.html">Layout Options here</a></p>
      <div class="row gx-3">
        <!-- Check -->
        <div class="col-6">
          <div class="form-check form-check-label-highlighter text-center">
            <input type="radio" class="form-check-input" name="sidebarNavOptions" id="sidebarNavOptions1" value="pills" checked>
            <label class="form-check-label mb-2" for="sidebarNavOptions1">
              <img class="form-check-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/layouts-light/demo-layouts-default-classic.svg" alt="Image Description" data-hs-theme-appearance="dark">
              <img class="form-check-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/layouts/demo-layouts-default-classic.svg" alt="Image Description" data-hs-theme-appearance="default">
            </label>
            <span class="form-check-text">Pills</span>
          </div>
        </div>
        <!-- End Check -->
        <!-- Check -->
        <div class="col-6">
          <div class="form-check form-check-label-highlighter text-center">
            <input type="radio" class="form-check-input" name="sidebarNavOptions" id="sidebarNavOptions2" value="tabs">
            <label class="form-check-label mb-2" for="sidebarNavOptions2">
              <img class="form-check-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/layouts-light/demo-layouts-nav-tabs.svg" alt="Image Description" data-hs-theme-appearance="dark">
              <img class="form-check-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/layouts/demo-layouts-nav-tabs.svg" alt="Image Description" data-hs-theme-appearance="default">
            </label>
            <span class="form-check-text">Tabs</span>
          </div>
        </div>
        <!-- End Check -->
      </div>
      <!-- End Row -->
      <hr>
      <!-- Form Switch -->
      <label class="row form-check form-switch mb-3" for="builderFluidSwitch">
        <span class="col-10 ms-0">
          <span class="d-block h4 mb-1">Header Layout Options</span>
          <span class="d-block fs-5">Toggle to container-fluid layout</span>
        </span>
        <span class="col-2 text-end">
          <input type="checkbox" class="form-check-input" id="builderFluidSwitch">
        </span>
      </label>
      <!-- End Form Switch -->
      <div class="row gx-3">
        <!-- Check -->
        <div class="col-6">
          <div class="form-check form-check-label-highlighter text-center">
            <input type="radio" class="form-check-input" name="layout" id="headerLayoutOptions1" value="single-header">
            <label class="form-check-label mb-2" for="headerLayoutOptions1">
              <img class="form-check-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/layouts/header-default-container.svg" alt="Image Description" data-hs-theme-appearance="default">
              <img class="form-check-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/layouts-light/header-default-container.svg" alt="Image Description" data-hs-theme-appearance="dark">
            </label>
            <span class="form-check-text">Default</span>
          </div>
        </div>
        <!-- End Check -->
        <!-- Check -->
        <div class="col-6">
          <div class="form-check form-check-label-highlighter text-center">
            <input type="radio" class="form-check-input" name="layout" id="headerLayoutOptions2" value="double-header">
            <label class="form-check-label mb-2" for="headerLayoutOptions2">
              <img class="form-check-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/layouts/header-double-line-container.svg" alt="Image Description" data-hs-theme-appearance="default">
              <img class="form-check-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/layouts-light/header-double-line-container.svg" alt="Image Description" data-hs-theme-appearance="dark">
            </label>
            <span class="form-check-text">Double line</span>
          </div>
        </div>
        <!-- End Check -->
      </div>
      <!-- End Row -->
    </div>
    <!-- Footer -->
    <div class="offcanvas-footer">
      <div class="row gx-3">
        <div class="col">
          <div class="d-grid">
            <button type="button" id="js-builder-reset" class="btn btn-white btn-lg">
              <i class="bi-arrow-counterclockwise"></i> Reset
            </button>
          </div>
        </div>
        <!-- End Col -->
        <div class="col">
          <div class="d-grid">
            <button type="button" id="js-builder-preview" class="btn btn-primary btn-lg">
              <i class="eye-visible"></i> Preview
            </button>
          </div>
        </div>
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>
    <!-- End Footer -->
  </div>
  <!-- End Builder -->
  <!-- Builder Toggle -->
  <!-- <div id="builderOffcanvas" class="position-fixed bottom-0 end-0 me-5 mb-5" style="z-index: 3;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBuilder" aria-controls="offcanvasBuilder">
    <a class="btn btn-dark btn-lg" href="javascript:;">
      <i class="bi-sliders fs-6 me-2"></i> Customize
    </a>
  </div> -->
  <!-- End Builder Toggle -->
  <div class="d-none js-build-layouts">
    <div class="js-build-layout-header-default">
      <!-- Single Header -->
      <header id="header" class="navbar navbar-expand-lg navbar-bordered bg-white  ">
        <div class="container">
          <nav class="js-mega-menu navbar-nav-wrap">
            <!-- Logo -->
            <a class="navbar-brand" href="index.html" aria-label="Front">
              <img class="navbar-brand-logo" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/logos/logo.svg" alt="Logo" data-hs-theme-appearance="default">
              <img class="navbar-brand-logo" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/logos-light/logo.svg" alt="Logo" data-hs-theme-appearance="dark">
            </a>
            <!-- End Logo -->
            <!-- Secondary Content -->
            <div class="navbar-nav-wrap-secondary-content">
              <!-- Navbar -->
              <ul class="navbar-nav">
                <li class="nav-item d-none d-md-inline-block">
                  <!-- Notification -->
                  <div class="dropdown">
                    <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                      <i class="bi-bell"></i>
                      <span class="btn-status btn-sm-status btn-status-danger"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 25rem;">
                      <div class="card">
                        <!-- Header -->
                        <div class="card-header card-header-content-between">
                          <h4 class="card-title mb-0">Notifications</h4>
                          <!-- Unfold -->
                          <div class="dropdown">
                            <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary rounded-circle" id="navbarNotificationsDropdownSettings" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi-three-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdownSettings">
                              <span class="dropdown-header">Settings</span>
                              <a class="dropdown-item" href="#">
                                <i class="bi-archive dropdown-item-icon"></i> Archive all
                              </a>
                              <a class="dropdown-item" href="#">
                                <i class="bi-check2-all dropdown-item-icon"></i> Mark all as read
                              </a>
                              <a class="dropdown-item" href="#">
                                <i class="bi-toggle-off dropdown-item-icon"></i> Disable notifications
                              </a>
                              <a class="dropdown-item" href="#">
                                <i class="bi-gift dropdown-item-icon"></i> What's new?
                              </a>
                              <div class="dropdown-divider"></div>
                              <span class="dropdown-header">Feedback</span>
                              <a class="dropdown-item" href="#">
                                <i class="bi-chat-left-dots dropdown-item-icon"></i> Report
                              </a>
                            </div>
                          </div>
                          <!-- End Unfold -->
                        </div>
                        <!-- End Header -->
                        <!-- Nav -->
                        <ul class="nav nav-tabs nav-justified" id="notificationTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" href="#notificationNavOne" id="notificationNavOne-tab" data-bs-toggle="tab" data-bs-target="#notificationNavOne" role="tab" aria-controls="notificationNavOne" aria-selected="true">Messages (3)</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#notificationNavTwo" id="notificationNavTwo-tab" data-bs-toggle="tab" data-bs-target="#notificationNavTwo" role="tab" aria-controls="notificationNavTwo" aria-selected="false">Archived</a>
                          </li>
                        </ul>
                        <!-- End Nav -->
                        <!-- Body -->
                        <div class="card-body-height">
                          <!-- Tab Content -->
                          <div class="tab-content" id="notificationTabContent">
                            <div class="tab-pane fade show active" id="notificationNavOne" role="tabpanel" aria-labelledby="notificationNavOne-tab">
                              <!-- List Group -->
                              <ul class="list-group list-group-flush navbar-card-list-group">
                                <!-- Item -->
                                <li class="list-group-item form-check-select">
                                  <div class="row">
                                    <div class="col-auto">
                                      <div class="d-flex align-items-center">
                                        <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value="" id="notificationCheck1" checked>
                                          <label class="form-check-label" for="notificationCheck1"></label>
                                          <span class="form-check-stretched-bg"></span>
                                        </div>
                                        <img class="avatar avatar-sm avatar-circle" src="<?=env('ADMIN_ASSETS_URL')?>assets/img/160x160/img3.jpg" alt="Image Description">
                                      </div>
                                    </div>
                                    <!-- End Col -->
                                    <div class="col ms-n2">
                                      <h5 class="mb-1">Brian Warner</h5>
                                      <p class="text-body fs-5">changed an issue from "In Progress" to <span class="badge bg-success">Review</span></p>
                                    </div>
                                    <!-- End Col -->
                                    <small class="col-auto text-muted text-cap">2hr</small>
                                    <!-- End Col -->
                                  </div>
                                  <!-- End Row -->
                                  <a class="stretched-link" href="#"></a>
                                </li>
                                <!-- End Item -->
                                <!-- Item -->
                                <li class="list-group-item form-check-select">
                                  <div class="row">
                                    <div class="col-auto">
                                      <div class="d-flex align-items-center">
                                        <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value="" id="notificationCheck2" checked>
                                          <label class="form-check-label" for="notificationCheck2"></label>
                                          <span class="form-check-stretched-bg"></span>
                                        </div>
                                        <div class="avatar avatar-sm avatar-soft-dark avatar-circle">
                                          <span class="avatar-initials">K</span>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- End Col -->
                                    <div class="col ms-n2">
                                      <h5 class="mb-1">Klara Hampton</h5>
                                      <p class="text-body fs-5">mentioned you in a comment</p>
                                      <blockquote class="blockquote blockquote-sm">
                                        Nice work, love! You really nailed it. Keep it up!
                                      </blockquote>
                                    </div>
                                    <!-- End Col -->
                                    <small class="col-auto text-muted text-cap">10hr</small>
                                    <!-- End Col -->
                                  </div>
                                  <!-- End Row -->
                                  <a class="stretched-link" href="#"></a>
                                </li>
                                <!-- End Item -->
                                <!-- Item -->
                                <li class="list-group-item form-check-select">
                                  <div class="row">
                                    <div class="col-auto">
                                      <div class="d-flex align-items-center">
                                        <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value="" id="notificationCheck3" checked>
                                          <label class="form-check-label" for="notificationCheck3"></label>
                                          <span class="form-check-stretched-bg"></span>
                                        </div>
                                        <div class="avatar avatar-sm avatar-circle">
                                          <img class="avatar-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/img/160x160/img10.jpg" alt="Image Description">
                                        </div>
                                      </div>
                                    </div>
                                    <!-- End Col -->
                                    <div class="col ms-n2">
                                      <h5 class="mb-1">Ruby Walter</h5>
                                      <p class="text-body fs-5">joined the Slack group HS Team</p>
                                    </div>
                                    <!-- End Col -->
                                    <small class="col-auto text-muted text-cap">3dy</small>
                                    <!-- End Col -->
                                  </div>
                                  <!-- End Row -->
                                  <a class="stretched-link" href="#"></a>
                                </li>
                                <!-- End Item -->
                                <!-- Item -->
                                <li class="list-group-item form-check-select">
                                  <div class="row">
                                    <div class="col-auto">
                                      <div class="d-flex align-items-center">
                                        <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value="" id="notificationCheck4">
                                          <label class="form-check-label" for="notificationCheck4"></label>
                                          <span class="form-check-stretched-bg"></span>
                                        </div>
                                        <div class="avatar avatar-sm avatar-circle">
                                          <img class="avatar-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/brands/google-icon.svg" alt="Image Description">
                                        </div>
                                      </div>
                                    </div>
                                    <!-- End Col -->
                                    <div class="col ms-n2">
                                      <h5 class="mb-1">from Google</h5>
                                      <p class="text-body fs-5">Start using forms to capture the information of prospects visiting your Google website</p>
                                    </div>
                                    <!-- End Col -->
                                    <small class="col-auto text-muted text-cap">17dy</small>
                                    <!-- End Col -->
                                  </div>
                                  <!-- End Row -->
                                  <a class="stretched-link" href="#"></a>
                                </li>
                                <!-- End Item -->
                                <!-- Item -->
                                <li class="list-group-item form-check-select">
                                  <div class="row">
                                    <div class="col-auto">
                                      <div class="d-flex align-items-center">
                                        <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value="" id="notificationCheck5">
                                          <label class="form-check-label" for="notificationCheck5"></label>
                                          <span class="form-check-stretched-bg"></span>
                                        </div>
                                        <div class="avatar avatar-sm avatar-circle">
                                          <img class="avatar-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/img/160x160/img7.jpg" alt="Image Description">
                                        </div>
                                      </div>
                                    </div>
                                    <!-- End Col -->
                                    <div class="col ms-n2">
                                      <h5 class="mb-1">Sara Villar</h5>
                                      <p class="text-body fs-5">completed <i class="bi-journal-bookmark-fill text-primary"></i> FD-7 task</p>
                                    </div>
                                    <!-- End Col -->
                                    <small class="col-auto text-muted text-cap">2mn</small>
                                    <!-- End Col -->
                                  </div>
                                  <!-- End Row -->
                                  <a class="stretched-link" href="#"></a>
                                </li>
                                <!-- End Item -->
                              </ul>
                              <!-- End List Group -->
                            </div>
                            <div class="tab-pane fade" id="notificationNavTwo" role="tabpanel" aria-labelledby="notificationNavTwo-tab">
                              <!-- List Group -->
                              <ul class="list-group list-group-flush navbar-card-list-group">
                                <!-- Item -->
                                <li class="list-group-item form-check-select">
                                  <div class="row">
                                    <div class="col-auto">
                                      <div class="d-flex align-items-center">
                                        <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value="" id="notificationCheck6">
                                          <label class="form-check-label" for="notificationCheck6"></label>
                                          <span class="form-check-stretched-bg"></span>
                                        </div>
                                        <div class="avatar avatar-sm avatar-soft-dark avatar-circle">
                                          <span class="avatar-initials">A</span>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- End Col -->
                                    <div class="col ms-n2">
                                      <h5 class="mb-1">Anne Richard</h5>
                                      <p class="text-body fs-5">accepted your invitation to join Notion</p>
                                    </div>
                                    <!-- End Col -->
                                    <small class="col-auto text-muted text-cap">1dy</small>
                                    <!-- End Col -->
                                  </div>
                                  <!-- End Row -->
                                  <a class="stretched-link" href="#"></a>
                                </li>
                                <!-- End Item -->
                                <!-- Item -->
                                <li class="list-group-item form-check-select">
                                  <div class="row">
                                    <div class="col-auto">
                                      <div class="d-flex align-items-center">
                                        <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value="" id="notificationCheck7">
                                          <label class="form-check-label" for="notificationCheck7"></label>
                                          <span class="form-check-stretched-bg"></span>
                                        </div>
                                        <div class="avatar avatar-sm avatar-circle">
                                          <img class="avatar-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/img/160x160/img5.jpg" alt="Image Description">
                                        </div>
                                      </div>
                                    </div>
                                    <!-- End Col -->
                                    <div class="col ms-n2">
                                      <h5 class="mb-1">Finch Hoot</h5>
                                      <p class="text-body fs-5">left Slack group HS projects</p>
                                    </div>
                                    <!-- End Col -->
                                    <small class="col-auto text-muted text-cap">1dy</small>
                                    <!-- End Col -->
                                  </div>
                                  <!-- End Row -->
                                  <a class="stretched-link" href="#"></a>
                                </li>
                                <!-- End Item -->
                                <!-- Item -->
                                <li class="list-group-item form-check-select">
                                  <div class="row">
                                    <div class="col-auto">
                                      <div class="d-flex align-items-center">
                                        <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value="" id="notificationCheck8">
                                          <label class="form-check-label" for="notificationCheck8"></label>
                                          <span class="form-check-stretched-bg"></span>
                                        </div>
                                        <div class="avatar avatar-sm avatar-dark avatar-circle">
                                          <span class="avatar-initials">HS</span>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- End Col -->
                                    <div class="col ms-n2">
                                      <h5 class="mb-1">Htmlstream</h5>
                                      <p class="text-body fs-5">you earned a "Top endorsed" <i class="bi-patch-check-fill text-primary"></i> badge</p>
                                    </div>
                                    <!-- End Col -->
                                    <small class="col-auto text-muted text-cap">6dy</small>
                                    <!-- End Col -->
                                  </div>
                                  <!-- End Row -->
                                  <a class="stretched-link" href="#"></a>
                                </li>
                                <!-- End Item -->
                                <!-- Item -->
                                <li class="list-group-item form-check-select">
                                  <div class="row">
                                    <div class="col-auto">
                                      <div class="d-flex align-items-center">
                                        <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value="" id="notificationCheck9">
                                          <label class="form-check-label" for="notificationCheck9"></label>
                                          <span class="form-check-stretched-bg"></span>
                                        </div>
                                        <div class="avatar avatar-sm avatar-circle">
                                          <img class="avatar-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/img/160x160/img8.jpg" alt="Image Description">
                                        </div>
                                      </div>
                                    </div>
                                    <!-- End Col -->
                                    <div class="col ms-n2">
                                      <h5 class="mb-1">Linda Bates</h5>
                                      <p class="text-body fs-5">Accepted your connection</p>
                                    </div>
                                    <!-- End Col -->
                                    <small class="col-auto text-muted text-cap">17dy</small>
                                    <!-- End Col -->
                                  </div>
                                  <!-- End Row -->
                                  <a class="stretched-link" href="#"></a>
                                </li>
                                <!-- End Item -->
                                <!-- Item -->
                                <li class="list-group-item form-check-select">
                                  <div class="row">
                                    <div class="col-auto">
                                      <div class="d-flex align-items-center">
                                        <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value="" id="notificationCheck10">
                                          <label class="form-check-label" for="notificationCheck10"></label>
                                          <span class="form-check-stretched-bg"></span>
                                        </div>
                                        <div class="avatar avatar-sm avatar-soft-dark avatar-circle">
                                          <span class="avatar-initials">L</span>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- End Col -->
                                    <div class="col ms-n2">
                                      <h5 class="mb-1">Lewis Clarke</h5>
                                      <p class="text-body fs-5">completed <i class="bi-journal-bookmark-fill text-primary"></i> FD-134 task</p>
                                    </div>
                                    <!-- End Col -->
                                    <small class="col-auto text-muted text-cap">2mts</small>
                                    <!-- End Col -->
                                  </div>
                                  <!-- End Row -->
                                  <a class="stretched-link" href="#"></a>
                                </li>
                                <!-- End Item -->
                              </ul>
                              <!-- End List Group -->
                            </div>
                          </div>
                          <!-- End Tab Content -->
                        </div>
                        <!-- End Body -->
                        <!-- Card Footer -->
                        <a class="card-footer text-center" href="#">
                          View all notifications <i class="bi-chevron-right"></i>
                        </a>
                        <!-- End Card Footer -->
                      </div>
                    </div>
                  </div>
                  <!-- End Notification -->
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                  <!-- Apps -->
                  <div class="dropdown">
                    <button type="button" class="btn btn-icon btn-ghost-secondary rounded-circle" id="navbarAppsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                      <i class="bi-app-indicator"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarAppsDropdown" style="width: 25rem;">
                      <div class="card">
                        <!-- Header -->
                        <div class="card-header">
                          <h4 class="card-title">Web apps &amp; services</h4>
                        </div>
                        <!-- End Header -->
                        <!-- Body -->
                        <div class="card-body card-body-height">
                          <a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                              <div class="flex-shrink-0">
                                <img class="avatar avatar-xs avatar-4x3" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/brands/atlassian-icon.svg" alt="Image Description">
                              </div>
                              <div class="flex-grow-1 text-truncate ms-3">
                                <h5 class="mb-0">Atlassian</h5>
                                <p class="card-text text-body">Security and control across Cloud</p>
                              </div>
                            </div>
                          </a>
                          <a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                              <div class="flex-shrink-0">
                                <img class="avatar avatar-xs avatar-4x3" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/brands/slack-icon.svg" alt="Image Description">
                              </div>
                              <div class="flex-grow-1 text-truncate ms-3">
                                <h5 class="mb-0">Slack <span class="badge bg-primary rounded-pill text-uppercase ms-1">Try</span></h5>
                                <p class="card-text text-body">Email collaboration software</p>
                              </div>
                            </div>
                          </a>
                          <a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                              <div class="flex-shrink-0">
                                <img class="avatar avatar-xs avatar-4x3" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/brands/google-webdev-icon.svg" alt="Image Description">
                              </div>
                              <div class="flex-grow-1 text-truncate ms-3">
                                <h5 class="mb-0">Google webdev</h5>
                                <p class="card-text text-body">Work involved in developing a website</p>
                              </div>
                            </div>
                          </a>
                          <a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                              <div class="flex-shrink-0">
                                <img class="avatar avatar-xs avatar-4x3" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/brands/frontapp-icon.svg" alt="Image Description">
                              </div>
                              <div class="flex-grow-1 text-truncate ms-3">
                                <h5 class="mb-0">Frontapp</h5>
                                <p class="card-text text-body">The inbox for teams</p>
                              </div>
                            </div>
                          </a>
                          <a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                              <div class="flex-shrink-0">
                                <img class="avatar avatar-xs avatar-4x3" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/illustrations/review-rating-shield.svg" alt="Image Description">
                              </div>
                              <div class="flex-grow-1 text-truncate ms-3">
                                <h5 class="mb-0">HS Support</h5>
                                <p class="card-text text-body">Customer service and support</p>
                              </div>
                            </div>
                          </a>
                          <a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                              <div class="flex-shrink-0">
                                <div class="avatar avatar-sm avatar-soft-dark">
                                  <span class="avatar-initials"><i class="bi-grid"></i></span>
                                </div>
                              </div>
                              <div class="flex-grow-1 text-truncate ms-3">
                                <h5 class="mb-0">More Front products</h5>
                                <p class="card-text text-body">Check out more HS products</p>
                              </div>
                            </div>
                          </a>
                        </div>
                        <!-- End Body -->
                        <!-- Footer -->
                        <a class="card-footer text-center" href="#">
                          View all apps <i class="bi-chevron-right"></i>
                        </a>
                        <!-- End Footer -->
                      </div>
                    </div>
                  </div>
                  <!-- End Apps -->
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                  <!-- Activity -->
                  <button class="btn btn-ghost-secondary btn-icon rounded-circle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasActivityStream" aria-controls="offcanvasActivityStream">
                    <i class="bi-x-diamond"></i>
                  </button>
                  <!-- Activity -->
                </li>
                <li class="nav-item">
                  <!-- Style Switcher -->
                  <div class="dropdown ">
                    <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectThemeDropdown">
                      <a class="dropdown-item" href="#" data-icon="bi-moon-stars" data-value="auto">
                        <i class="bi-moon-stars me-2"></i>
                        <span class="text-truncate" title="Auto (system default)">Auto (system default)</span>
                      </a>
                      <a class="dropdown-item" href="#" data-icon="bi-brightness-high" data-value="default">
                        <i class="bi-brightness-high me-2"></i>
                        <span class="text-truncate" title="Default (light mode)">Default (light mode)</span>
                      </a>
                      <a class="dropdown-item active" href="#" data-icon="bi-moon" data-value="dark">
                        <i class="bi-moon me-2"></i>
                        <span class="text-truncate" title="Dark">Dark</span>
                      </a>
                    </div>
                  </div>
                  <!-- End Style Switcher -->
                </li>
                <li class="nav-item">
                  <!-- Account -->
                  <div class="dropdown">
                    <a class="navbar-dropdown-account-wrapper" href="javascript:;" id="accountNavbarDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                      <div class="avatar avatar-sm avatar-circle">
                        <img class="avatar-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/img/160x160/img6.jpg" alt="Image Description">
                        <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                      </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                      <div class="dropdown-item-text">
                        <div class="d-flex align-items-center">
                          <div class="avatar avatar-sm avatar-circle">
                            <img class="avatar-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/img/160x160/img6.jpg" alt="Image Description">
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <h5 class="mb-0">Mark Williams</h5>
                            <p class="card-text text-body">mark@site.com</p>
                          </div>
                        </div>
                      </div>
                      <div class="dropdown-divider"></div>
                      <!-- Dropdown -->
                      <div class="dropdown">
                        <a class="navbar-dropdown-submenu-item dropdown-item dropdown-toggle" href="javascript:;" id="navSubmenuPagesAccountDropdown1" data-bs-toggle="dropdown" aria-expanded="false">Set status</a>
                        <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-sub-menu" aria-labelledby="navSubmenuPagesAccountDropdown1">
                          <a class="dropdown-item" href="#">
                            <span class="legend-indicator bg-success me-1"></span> Available
                          </a>
                          <a class="dropdown-item" href="#">
                            <span class="legend-indicator bg-danger me-1"></span> Busy
                          </a>
                          <a class="dropdown-item" href="#">
                            <span class="legend-indicator bg-warning me-1"></span> Away
                          </a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#"> Reset status
                          </a>
                        </div>
                      </div>
                      <!-- End Dropdown -->
                      <a class="dropdown-item" href="#">Profile &amp; account</a>
                      <a class="dropdown-item" href="#">Settings</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0">
                            <div class="avatar avatar-sm avatar-dark avatar-circle">
                              <span class="avatar-initials">HS</span>
                            </div>
                          </div>
                          <div class="flex-grow-1 ms-2">
                            <h5 class="mb-0">Htmlstream <span class="badge bg-primary rounded-pill text-uppercase ms-1">PRO</span></h5>
                            <span class="card-text">hs.example.com</span>
                          </div>
                        </div>
                      </a>
                      <div class="dropdown-divider"></div>
                      <!-- Dropdown -->
                      <div class="dropdown">
                        <a class="navbar-dropdown-submenu-item dropdown-item dropdown-toggle" href="javascript:;" id="navSubmenuPagesAccountDropdown2" data-bs-toggle="dropdown" aria-expanded="false">Customization</a>
                        <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-sub-menu" aria-labelledby="navSubmenuPagesAccountDropdown2">
                          <a class="dropdown-item" href="#">
                            Invite people
                          </a>
                          <a class="dropdown-item" href="#">
                            Analytics
                            <i class="bi-box-arrow-in-up-right"></i>
                          </a>
                          <a class="dropdown-item" href="#">
                            Customize Front
                            <i class="bi-box-arrow-in-up-right"></i>
                          </a>
                        </div>
                      </div>
                      <!-- End Dropdown -->
                      <a class="dropdown-item" href="#">Manage team</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Sign out</a>
                    </div>
                  </div>
                  <!-- End Account -->
                </li>
              </ul>
              <!-- End Navbar -->
            </div>
            <!-- End Secondary Content -->
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContainerNavDropdown" aria-controls="navbarContainerNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-default">
                <i class="bi-list"></i>
              </span>
              <span class="navbar-toggler-toggled">
                <i class="bi-x"></i>
              </span>
            </button>
            <!-- End Toggler -->
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarContainerNavDropdown">
              <ul class="navbar-nav">
                <!-- Dashboards -->
                <li class="hs-has-sub-menu nav-item">
                  <a id="dashboardsMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle active" href="#" role="button"><i class="bi-house-door dropdown-item-icon"></i> Dashboards</a>
                  <!-- Mega Menu -->
                  <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="dashboardsMegaMenu" style="min-width: 14rem;">
                    <a class="dropdown-item active" href="index.html">Default</a>
                    <a class="dropdown-item " href="dashboard-alternative.html">Alternative</a>
                  </div>
                  <!-- End Mega Menu -->
                </li>
                <!-- End Dashboards -->
                <!-- Pages -->
                <li class="hs-has-sub-menu nav-item">
                  <a id="pagesMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle " href="#" role="button"><i class="bi-files-alt dropdown-item-icon"></i> Pages</a>
                  <!-- Mega Menu -->
                  <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="pagesMegaMenu" style="min-width: 14rem;">
                    <!-- Users -->
                    <div class="hs-has-sub-menu nav-item">
                      <a id="usersMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">Users</a>
                      <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="usersMegaMenu" style="min-width: 14rem;">
                        <a class="dropdown-item " href="users.html">Overview</a>
                        <a class="dropdown-item " href="users-leaderboard.html">Leaderboard</a>
                        <a class="dropdown-item " href="users-add-user.html">Add User <span class="badge bg-info rounded-pill ms-1">Hot</span></a>
                      </div>
                    </div>
                    <!-- End Users -->
                    <!-- User Profile -->
                    <div class="hs-has-sub-menu nav-item">
                      <a id="userProfileMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">User Profile <span class="badge bg-primary rounded-pill ms-1">5</span></a>
                      <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="userProfileMegaMenu" style="min-width: 14rem;">
                        <a class="dropdown-item " href="user-profile.html">Profile</a>
                        <a class="dropdown-item " href="user-profile-teams.html">Teams</a>
                        <a class="dropdown-item " href="user-profile-projects.html">Projects</a>
                        <a class="dropdown-item " href="user-profile-connections.html">Connections</a>
                        <a class="dropdown-item " href="user-profile-my-profile.html">My Profile</a>
                      </div>
                    </div>
                    <!-- End User Profile -->
                    <!-- Account -->
                    <div class="hs-has-sub-menu nav-item">
                      <a id="accountMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">Account</a>
                      <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="accountMegaMenu" style="min-width: 14rem;">
                        <a class="dropdown-item " href="account-settings.html">Settings</a>
                        <a class="dropdown-item " href="account-billing.html">Billing</a>
                        <a class="dropdown-item " href="account-invoice.html">Invoice</a>
                      </div>
                    </div>
                    <!-- End Account -->
                    <!-- E-commerce -->
                    <div class="hs-has-sub-menu nav-item">
                      <a id="ecommerceMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">E-commerce</a>
                      <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="ecommerceMegaMenu" style="min-width: 14rem;">
                        <a class="dropdown-item " href="ecommerce.html">Overview</a>
                        <!-- Products -->
                        <div class="hs-has-sub-menu nav-item">
                          <a id="productsMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">Products</a>
                          <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="productsMegaMenu" style="min-width: 14rem;">
                            <a class="dropdown-item " href="ecommerce-products.html">Products</a>
                            <a class="dropdown-item " href="ecommerce-product-details.html">Product Details</a>
                            <a class="dropdown-item " href="ecommerce-add-product.html">Add Product</a>
                          </div>
                        </div>
                        <!-- End Products -->
                        <!-- Products -->
                        <div class="hs-has-sub-menu nav-item">
                          <a id="ordersMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">Orders</a>
                          <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="ordersMegaMenu" style="min-width: 14rem;">
                            <a class="dropdown-item " href="ecommerce-orders.html">Orders</a>
                            <a class="dropdown-item " href="ecommerce-order-details.html">Order Details</a>
                          </div>
                        </div>
                        <!-- End Products -->
                        <!-- Customers -->
                        <div class="hs-has-sub-menu nav-item">
                          <a id="customersMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">Customers</a>
                          <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="customersMegaMenu" style="min-width: 14rem;">
                            <a class="dropdown-item " href="ecommerce-customers.html">Customers</a>
                            <a class="dropdown-item " href="ecommerce-customer-details.html">Customer Details</a>
                            <a class="dropdown-item " href="ecommerce-add-customers.html">Add Customers</a>
                          </div>
                        </div>
                        <!-- End Customers -->
                        <a class="dropdown-item " href="ecommerce-referrals.html">Referrals</a>
                        <a class="dropdown-item " href="ecommerce-manage-reviews.html">Manage Reviews</a>
                        <a class="dropdown-item " href="ecommerce-checkout.html">Checkout</a>
                      </div>
                    </div>
                    <!-- End E-commerce -->
                    <!-- Projects -->
                    <div class="hs-has-sub-menu nav-item">
                      <a id="projectsMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">Projects</a>
                      <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="projectsMegaMenu" style="min-width: 14rem;">
                        <a class="dropdown-item " href="projects.html">Overview</a>
                        <a class="dropdown-item " href="projects-timeline.html">Timeline</a>
                      </div>
                    </div>
                    <!-- End Projects -->
                    <!-- Project -->
                    <div class="hs-has-sub-menu nav-item">
                      <a id="projectMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">Project</a>
                      <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="projectMegaMenu" style="min-width: 14rem;">
                        <a class="dropdown-item " href="project.html">Overview</a>
                        <a class="dropdown-item " href="project-files.html">Files</a>
                        <a class="dropdown-item " href="project-activity.html">Activity</a>
                        <a class="dropdown-item " href="project-teams.html">Teams</a>
                        <a class="dropdown-item " href="project-settings.html">Settings</a>
                      </div>
                    </div>
                    <!-- End Project -->
                    <!-- Authentication -->
                    <div class="hs-has-sub-menu nav-item">
                      <a id="authenticationMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">Authentication</a>
                      <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="authenticationMegaMenu" style="min-width: 14rem;">
                        <!-- Log In -->
                        <div class="hs-has-sub-menu nav-item">
                          <a id="loginMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">Log In</a>
                          <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="loginMegaMenu" style="min-width: 14rem;">
                            <a class="dropdown-item " href="authentication-login-basic.html">Basic</a>
                            <a class="dropdown-item " href="authentication-login-cover.html">Cover</a>
                          </div>
                        </div>
                        <!-- End Log In -->
                        <!-- Sign Up -->
                        <div class="hs-has-sub-menu nav-item">
                          <a id="signupMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">Sign Up</a>
                          <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="signupMegaMenu" style="min-width: 14rem;">
                            <a class="dropdown-item " href="authentication-signup-basic.html">Basic</a>
                            <a class="dropdown-item " href="authentication-signup-cover.html">Cover</a>
                          </div>
                        </div>
                        <!-- End Sign Up -->
                        <!-- Reset Password -->
                        <div class="hs-has-sub-menu nav-item">
                          <a id="resetPasswordMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">Reset Password</a>
                          <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="resetPasswordMegaMenu" style="min-width: 14rem;">
                            <a class="dropdown-item " href="authentication-reset-password-basic.html">Basic</a>
                            <a class="dropdown-item " href="authentication-reset-password-cover.html">Cover</a>
                          </div>
                        </div>
                        <!-- End Reset Password -->
                        <!-- Email Verification -->
                        <div class="hs-has-sub-menu nav-item">
                          <a id="emailVerificationMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">Email Verification</a>
                          <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="emailVerificationMegaMenu" style="min-width: 14rem;">
                            <a class="dropdown-item " href="authentication-email-verification-basic.html">Basic</a>
                            <a class="dropdown-item " href="authentication-email-verification-cover.html">Cover</a>
                          </div>
                        </div>
                        <!-- End Email Verification -->
                        <!-- 2-step Verification -->
                        <div class="hs-has-sub-menu nav-item">
                          <a id="2stepVerificationMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">2-step Verification</a>
                          <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="2stepVerificationMegaMenu" style="min-width: 14rem;">
                            <a class="dropdown-item " href="authentication-2-step-verification-basic.html">Basic</a>
                            <a class="dropdown-item " href="authentication-2-step-verification-cover.html">Cover</a>
                          </div>
                        </div>
                        <!-- End 2-step Verification -->
                        <a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#welcomeMessageModal">Welcome Message</a>
                        <a class="dropdown-item " href="error-404.html">Error 404</a>
                        <a class="dropdown-item " href="error-500.html">Error 500</a>
                      </div>
                    </div>
                    <!-- End Authentication -->
                    <a class="dropdown-item " href="api-keys.html" data-placement="left">API Keys</a>
                    <a class="dropdown-item " href="welcome-page.html" data-placement="left">Welcome Page</a>
                    <a class="dropdown-item " href="landing.html" data-placement="left">Landing Page <span class="badge bg-info rounded-pill ms-1">New</span></a>
                  </div>
                  <!-- End Mega Menu -->
                </li>
                <!-- End Pages -->
                <!-- Apps -->
                <li class="hs-has-sub-menu nav-item">
                  <a id="appsMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle " href="#" role="button"><i class="bi-app-indicator dropdown-item-icon"></i> Apps</a>
                  <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="appsMegaMenu" style="min-width: 14rem;">
                    <a class="dropdown-item " href="apps-kanban.html">Kanban</a>
                    <a class="dropdown-item " href="apps-calendar.html">Calendar</a>
                    <a class="dropdown-item " href="apps-invoice-generator.html">Invoice Generator</a>
                    <a class="dropdown-item " href="apps-file-manager.html">File Manager</a>
                  </div>
                </li>
                <!-- End Apps -->
                <li class="nav-item">
                  <a class="nav-link " href="layouts/index.html">
                    <i class="bi-grid-1x2 dropdown-item-icon"></i> Layouts
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="documentation/index.html" data-placement="left">
                    <i class="bi-book dropdown-item-icon"></i> Docs
                  </a>
                </li>
              </ul>
            </div>
            <!-- End Collapse -->
          </nav>
        </div>
      </header>
      <!-- End Single Header -->
    </div>
    <div class="js-build-layout-header-double">
      <!-- Double Header -->
      <header id="header" class="navbar navbar-expand-lg navbar-bordered navbar-spacer-y-0 flex-lg-column">
        <div class="navbar-dark w-100 bg-dark py-2">
          <div class="container">
            <div class="navbar-nav-wrap">
              <!-- Logo -->
              <a class="navbar-brand" href="index.html" aria-label="Front">
                <img class="navbar-brand-logo" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/logos/logo-white.svg" alt="Logo">
              </a>
              <!-- End Logo -->
              <!-- Content Start -->
              <div class="navbar-nav-wrap-content-start">
                <!-- Search Form -->
                <div class="d-none d-lg-block">
                  <div class="dropdown ms-2">
                    <!-- Input Group -->
                    <div class="d-none d-lg-block">
                      <div class="input-group input-group-merge input-group-borderless input-group-hover-light navbar-input-group">
                        <div class="input-group-prepend input-group-text">
                          <i class="bi-search"></i>
                        </div>
                        <input type="search" class="js-form-search form-control" placeholder="Search in front" aria-label="Search in front" data-hs-form-search-options='{
                                 "clearIcon": "#clearSearchResultsIcon",
                                 "dropMenuElement": "#searchDropdownMenu",
                                 "dropMenuOffset": 20,
                                 "toggleIconOnFocus": true,
                                 "activeClass": "focus"
                               }'>
                        <a class="input-group-append input-group-text" href="javascript:;">
                          <i id="clearSearchResultsIcon" class="bi-x-lg" style="display: none;"></i>
                        </a>
                      </div>
                    </div>
                    <button class="js-form-search js-form-search-mobile-toggle btn btn-ghost-secondary btn-icon rounded-circle d-lg-none" type="button" data-hs-form-search-options='{
                                 "clearIcon": "#clearSearchResultsIcon",
                                 "dropMenuElement": "#searchDropdownMenu",
                                 "dropMenuOffset": 20,
                                 "toggleIconOnFocus": true,
                                 "activeClass": "focus"
                               }'>
                      <i class="bi-search"></i>
                    </button>
                    <!-- End Input Group -->
                    <!-- Card Search Content -->
                    <div id="searchDropdownMenu" class="hs-form-search-menu-content dropdown-menu dropdown-menu-form-search navbar-dropdown-menu-borderless">
                      <div class="card">
                        <!-- Body -->
                        <div class="card-body-height">
                          <div class="d-lg-none">
                            <div class="input-group input-group-merge navbar-input-group mb-5">
                              <div class="input-group-prepend input-group-text">
                                <i class="bi-search"></i>
                              </div>
                              <input type="search" class="form-control" placeholder="Search in front" aria-label="Search in front">
                              <a class="input-group-append input-group-text" href="javascript:;">
                                <i class="bi-x-lg"></i>
                              </a>
                            </div>
                          </div>
                          <span class="dropdown-header">Recent searches</span>
                          <div class="dropdown-item bg-transparent text-wrap">
                            <a class="btn btn-soft-dark btn-xs rounded-pill" href="index.html">
                              Gulp <i class="bi-search ms-1"></i>
                            </a>
                            <a class="btn btn-soft-dark btn-xs rounded-pill" href="index.html">
                              Notification panel <i class="bi-search ms-1"></i>
                            </a>
                          </div>
                          <div class="dropdown-divider"></div>
                          <span class="dropdown-header">Tutorials</span>
                          <a class="dropdown-item" href="index.html">
                            <div class="d-flex align-items-center">
                              <div class="flex-shrink-0">
                                <span class="icon icon-soft-dark icon-xs icon-circle">
                                  <i class="bi-sliders"></i>
                                </span>
                              </div>
                              <div class="flex-grow-1 text-truncate ms-2">
                                <span>How to set up Gulp?</span>
                              </div>
                            </div>
                          </a>
                          <a class="dropdown-item" href="index.html">
                            <div class="d-flex align-items-center">
                              <div class="flex-shrink-0">
                                <span class="icon icon-soft-dark icon-xs icon-circle">
                                  <i class="bi-paint-bucket"></i>
                                </span>
                              </div>
                              <div class="flex-grow-1 text-truncate ms-2">
                                <span>How to change theme color?</span>
                              </div>
                            </div>
                          </a>
                          <div class="dropdown-divider"></div>
                          <span class="dropdown-header">Members</span>
                          <a class="dropdown-item" href="index.html">
                            <div class="d-flex align-items-center">
                              <div class="flex-shrink-0">
                                <img class="avatar avatar-xs avatar-circle" src="<?=env('ADMIN_ASSETS_URL')?>assets/img/160x160/img10.jpg" alt="Image Description">
                              </div>
                              <div class="flex-grow-1 text-truncate ms-2">
                                <span>Amanda Harvey <i class="tio-verified text-primary" data-toggle="tooltip" data-placement="top" title="Top endorsed"></i></span>
                              </div>
                            </div>
                          </a>
                          <a class="dropdown-item" href="index.html">
                            <div class="d-flex align-items-center">
                              <div class="flex-shrink-0">
                                <img class="avatar avatar-xs avatar-circle" src="<?=env('ADMIN_ASSETS_URL')?>assets/img/160x160/img3.jpg" alt="Image Description">
                              </div>
                              <div class="flex-grow-1 text-truncate ms-2">
                                <span>David Harrison</span>
                              </div>
                            </div>
                          </a>
                          <a class="dropdown-item" href="index.html">
                            <div class="d-flex align-items-center">
                              <div class="flex-shrink-0">
                                <div class="avatar avatar-xs avatar-soft-info avatar-circle">
                                  <span class="avatar-initials">A</span>
                                </div>
                              </div>
                              <div class="flex-grow-1 text-truncate ms-2">
                                <span>Anne Richard</span>
                              </div>
                            </div>
                          </a>
                        </div>
                        <!-- End Body -->
                        <!-- Footer -->
                        <a class="card-footer text-center" href="index.html">
                          See all results <i class="bi-chevron-right small"></i>
                        </a>
                        <!-- End Footer -->
                      </div>
                    </div>
                    <!-- End Card Search Content -->
                  </div>
                </div>
                <!-- End Search Form -->
              </div>
              <!-- End Content Start -->
              <!-- Content End -->
              <div class="navbar-nav-wrap-content-end">
                <!-- Navbar -->
                <ul class="navbar-nav">
                  <li class="nav-item d-none d-md-inline-block">
                    <!-- Notification -->
                    <div class="dropdown">
                      <button type="button" class="btn btn-ghost-light btn-icon rounded-circle" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                        <i class="bi-bell"></i>
                        <span class="btn-status btn-sm-status btn-status-danger"></span>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 25rem;">
                        <div class="card">
                          <!-- Header -->
                          <div class="card-header card-header-content-between">
                            <h4 class="card-title mb-0">Notifications</h4>
                            <!-- Unfold -->
                            <div class="dropdown">
                              <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary rounded-circle" id="navbarNotificationsDropdownSettings" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi-three-dots-vertical"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdownSettings">
                                <span class="dropdown-header">Settings</span>
                                <a class="dropdown-item" href="#">
                                  <i class="bi-archive dropdown-item-icon"></i> Archive all
                                </a>
                                <a class="dropdown-item" href="#">
                                  <i class="bi-check2-all dropdown-item-icon"></i> Mark all as read
                                </a>
                                <a class="dropdown-item" href="#">
                                  <i class="bi-toggle-off dropdown-item-icon"></i> Disable notifications
                                </a>
                                <a class="dropdown-item" href="#">
                                  <i class="bi-gift dropdown-item-icon"></i> What's new?
                                </a>
                                <div class="dropdown-divider"></div>
                                <span class="dropdown-header">Feedback</span>
                                <a class="dropdown-item" href="#">
                                  <i class="bi-chat-left-dots dropdown-item-icon"></i> Report
                                </a>
                              </div>
                            </div>
                            <!-- End Unfold -->
                          </div>
                          <!-- End Header -->
                          <!-- Nav -->
                          <ul class="nav nav-tabs nav-justified" id="notificationTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" href="#notificationNavOne" id="notificationNavOne-tab" data-bs-toggle="tab" data-bs-target="#notificationNavOne" role="tab" aria-controls="notificationNavOne" aria-selected="true">Messages (3)</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#notificationNavTwo" id="notificationNavTwo-tab" data-bs-toggle="tab" data-bs-target="#notificationNavTwo" role="tab" aria-controls="notificationNavTwo" aria-selected="false">Archived</a>
                            </li>
                          </ul>
                          <!-- End Nav -->
                          <!-- Body -->
                          <div class="card-body-height">
                            <!-- Tab Content -->
                            <div class="tab-content" id="notificationTabContent">
                              <div class="tab-pane fade show active" id="notificationNavOne" role="tabpanel" aria-labelledby="notificationNavOne-tab">
                                <!-- List Group -->
                                <ul class="list-group list-group-flush navbar-card-list-group">
                                  <!-- Item -->
                                  <li class="list-group-item form-check-select">
                                    <div class="row">
                                      <div class="col-auto">
                                        <div class="d-flex align-items-center">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="notificationCheck1" checked>
                                            <label class="form-check-label" for="notificationCheck1"></label>
                                            <span class="form-check-stretched-bg"></span>
                                          </div>
                                          <img class="avatar avatar-sm avatar-circle" src="<?=env('ADMIN_ASSETS_URL')?>assets/img/160x160/img3.jpg" alt="Image Description">
                                        </div>
                                      </div>
                                      <!-- End Col -->
                                      <div class="col ms-n2">
                                        <h5 class="mb-1">Brian Warner</h5>
                                        <p class="text-body fs-5">changed an issue from "In Progress" to <span class="badge bg-success">Review</span></p>
                                      </div>
                                      <!-- End Col -->
                                      <small class="col-auto text-muted text-cap">2hr</small>
                                      <!-- End Col -->
                                    </div>
                                    <!-- End Row -->
                                    <a class="stretched-link" href="#"></a>
                                  </li>
                                  <!-- End Item -->
                                  <!-- Item -->
                                  <li class="list-group-item form-check-select">
                                    <div class="row">
                                      <div class="col-auto">
                                        <div class="d-flex align-items-center">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="notificationCheck2" checked>
                                            <label class="form-check-label" for="notificationCheck2"></label>
                                            <span class="form-check-stretched-bg"></span>
                                          </div>
                                          <div class="avatar avatar-sm avatar-soft-dark avatar-circle">
                                            <span class="avatar-initials">K</span>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- End Col -->
                                      <div class="col ms-n2">
                                        <h5 class="mb-1">Klara Hampton</h5>
                                        <p class="text-body fs-5">mentioned you in a comment</p>
                                        <blockquote class="blockquote blockquote-sm">
                                          Nice work, love! You really nailed it. Keep it up!
                                        </blockquote>
                                      </div>
                                      <!-- End Col -->
                                      <small class="col-auto text-muted text-cap">10hr</small>
                                      <!-- End Col -->
                                    </div>
                                    <!-- End Row -->
                                    <a class="stretched-link" href="#"></a>
                                  </li>
                                  <!-- End Item -->
                                  <!-- Item -->
                                  <li class="list-group-item form-check-select">
                                    <div class="row">
                                      <div class="col-auto">
                                        <div class="d-flex align-items-center">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="notificationCheck3" checked>
                                            <label class="form-check-label" for="notificationCheck3"></label>
                                            <span class="form-check-stretched-bg"></span>
                                          </div>
                                          <div class="avatar avatar-sm avatar-circle">
                                            <img class="avatar-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/img/160x160/img10.jpg" alt="Image Description">
                                          </div>
                                        </div>
                                      </div>
                                      <!-- End Col -->
                                      <div class="col ms-n2">
                                        <h5 class="mb-1">Ruby Walter</h5>
                                        <p class="text-body fs-5">joined the Slack group HS Team</p>
                                      </div>
                                      <!-- End Col -->
                                      <small class="col-auto text-muted text-cap">3dy</small>
                                      <!-- End Col -->
                                    </div>
                                    <!-- End Row -->
                                    <a class="stretched-link" href="#"></a>
                                  </li>
                                  <!-- End Item -->
                                  <!-- Item -->
                                  <li class="list-group-item form-check-select">
                                    <div class="row">
                                      <div class="col-auto">
                                        <div class="d-flex align-items-center">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="notificationCheck4">
                                            <label class="form-check-label" for="notificationCheck4"></label>
                                            <span class="form-check-stretched-bg"></span>
                                          </div>
                                          <div class="avatar avatar-sm avatar-circle">
                                            <img class="avatar-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/brands/google-icon.svg" alt="Image Description">
                                          </div>
                                        </div>
                                      </div>
                                      <!-- End Col -->
                                      <div class="col ms-n2">
                                        <h5 class="mb-1">from Google</h5>
                                        <p class="text-body fs-5">Start using forms to capture the information of prospects visiting your Google website</p>
                                      </div>
                                      <!-- End Col -->
                                      <small class="col-auto text-muted text-cap">17dy</small>
                                      <!-- End Col -->
                                    </div>
                                    <!-- End Row -->
                                    <a class="stretched-link" href="#"></a>
                                  </li>
                                  <!-- End Item -->
                                  <!-- Item -->
                                  <li class="list-group-item form-check-select">
                                    <div class="row">
                                      <div class="col-auto">
                                        <div class="d-flex align-items-center">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="notificationCheck5">
                                            <label class="form-check-label" for="notificationCheck5"></label>
                                            <span class="form-check-stretched-bg"></span>
                                          </div>
                                          <div class="avatar avatar-sm avatar-circle">
                                            <img class="avatar-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/img/160x160/img7.jpg" alt="Image Description">
                                          </div>
                                        </div>
                                      </div>
                                      <!-- End Col -->
                                      <div class="col ms-n2">
                                        <h5 class="mb-1">Sara Villar</h5>
                                        <p class="text-body fs-5">completed <i class="bi-journal-bookmark-fill text-primary"></i> FD-7 task</p>
                                      </div>
                                      <!-- End Col -->
                                      <small class="col-auto text-muted text-cap">2mn</small>
                                      <!-- End Col -->
                                    </div>
                                    <!-- End Row -->
                                    <a class="stretched-link" href="#"></a>
                                  </li>
                                  <!-- End Item -->
                                </ul>
                                <!-- End List Group -->
                              </div>
                              <div class="tab-pane fade" id="notificationNavTwo" role="tabpanel" aria-labelledby="notificationNavTwo-tab">
                                <!-- List Group -->
                                <ul class="list-group list-group-flush navbar-card-list-group">
                                  <!-- Item -->
                                  <li class="list-group-item form-check-select">
                                    <div class="row">
                                      <div class="col-auto">
                                        <div class="d-flex align-items-center">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="notificationCheck6">
                                            <label class="form-check-label" for="notificationCheck6"></label>
                                            <span class="form-check-stretched-bg"></span>
                                          </div>
                                          <div class="avatar avatar-sm avatar-soft-dark avatar-circle">
                                            <span class="avatar-initials">A</span>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- End Col -->
                                      <div class="col ms-n2">
                                        <h5 class="mb-1">Anne Richard</h5>
                                        <p class="text-body fs-5">accepted your invitation to join Notion</p>
                                      </div>
                                      <!-- End Col -->
                                      <small class="col-auto text-muted text-cap">1dy</small>
                                      <!-- End Col -->
                                    </div>
                                    <!-- End Row -->
                                    <a class="stretched-link" href="#"></a>
                                  </li>
                                  <!-- End Item -->
                                  <!-- Item -->
                                  <li class="list-group-item form-check-select">
                                    <div class="row">
                                      <div class="col-auto">
                                        <div class="d-flex align-items-center">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="notificationCheck7">
                                            <label class="form-check-label" for="notificationCheck7"></label>
                                            <span class="form-check-stretched-bg"></span>
                                          </div>
                                          <div class="avatar avatar-sm avatar-circle">
                                            <img class="avatar-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/img/160x160/img5.jpg" alt="Image Description">
                                          </div>
                                        </div>
                                      </div>
                                      <!-- End Col -->
                                      <div class="col ms-n2">
                                        <h5 class="mb-1">Finch Hoot</h5>
                                        <p class="text-body fs-5">left Slack group HS projects</p>
                                      </div>
                                      <!-- End Col -->
                                      <small class="col-auto text-muted text-cap">1dy</small>
                                      <!-- End Col -->
                                    </div>
                                    <!-- End Row -->
                                    <a class="stretched-link" href="#"></a>
                                  </li>
                                  <!-- End Item -->
                                  <!-- Item -->
                                  <li class="list-group-item form-check-select">
                                    <div class="row">
                                      <div class="col-auto">
                                        <div class="d-flex align-items-center">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="notificationCheck8">
                                            <label class="form-check-label" for="notificationCheck8"></label>
                                            <span class="form-check-stretched-bg"></span>
                                          </div>
                                          <div class="avatar avatar-sm avatar-dark avatar-circle">
                                            <span class="avatar-initials">HS</span>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- End Col -->
                                      <div class="col ms-n2">
                                        <h5 class="mb-1">Htmlstream</h5>
                                        <p class="text-body fs-5">you earned a "Top endorsed" <i class="bi-patch-check-fill text-primary"></i> badge</p>
                                      </div>
                                      <!-- End Col -->
                                      <small class="col-auto text-muted text-cap">6dy</small>
                                      <!-- End Col -->
                                    </div>
                                    <!-- End Row -->
                                    <a class="stretched-link" href="#"></a>
                                  </li>
                                  <!-- End Item -->
                                  <!-- Item -->
                                  <li class="list-group-item form-check-select">
                                    <div class="row">
                                      <div class="col-auto">
                                        <div class="d-flex align-items-center">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="notificationCheck9">
                                            <label class="form-check-label" for="notificationCheck9"></label>
                                            <span class="form-check-stretched-bg"></span>
                                          </div>
                                          <div class="avatar avatar-sm avatar-circle">
                                            <img class="avatar-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/img/160x160/img8.jpg" alt="Image Description">
                                          </div>
                                        </div>
                                      </div>
                                      <!-- End Col -->
                                      <div class="col ms-n2">
                                        <h5 class="mb-1">Linda Bates</h5>
                                        <p class="text-body fs-5">Accepted your connection</p>
                                      </div>
                                      <!-- End Col -->
                                      <small class="col-auto text-muted text-cap">17dy</small>
                                      <!-- End Col -->
                                    </div>
                                    <!-- End Row -->
                                    <a class="stretched-link" href="#"></a>
                                  </li>
                                  <!-- End Item -->
                                  <!-- Item -->
                                  <li class="list-group-item form-check-select">
                                    <div class="row">
                                      <div class="col-auto">
                                        <div class="d-flex align-items-center">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="notificationCheck10">
                                            <label class="form-check-label" for="notificationCheck10"></label>
                                            <span class="form-check-stretched-bg"></span>
                                          </div>
                                          <div class="avatar avatar-sm avatar-soft-dark avatar-circle">
                                            <span class="avatar-initials">L</span>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- End Col -->
                                      <div class="col ms-n2">
                                        <h5 class="mb-1">Lewis Clarke</h5>
                                        <p class="text-body fs-5">completed <i class="bi-journal-bookmark-fill text-primary"></i> FD-134 task</p>
                                      </div>
                                      <!-- End Col -->
                                      <small class="col-auto text-muted text-cap">2mts</small>
                                      <!-- End Col -->
                                    </div>
                                    <!-- End Row -->
                                    <a class="stretched-link" href="#"></a>
                                  </li>
                                  <!-- End Item -->
                                </ul>
                                <!-- End List Group -->
                              </div>
                            </div>
                            <!-- End Tab Content -->
                          </div>
                          <!-- End Body -->
                          <!-- Card Footer -->
                          <a class="card-footer text-center" href="#">
                            View all notifications <i class="bi-chevron-right"></i>
                          </a>
                          <!-- End Card Footer -->
                        </div>
                      </div>
                    </div>
                    <!-- End Notification -->
                  </li>
                  <li class="nav-item d-none d-sm-inline-block">
                    <!-- Apps -->
                    <div class="dropdown">
                      <button type="button" class="btn btn-icon btn-ghost-light rounded-circle" id="navbarAppsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                        <i class="bi-app-indicator"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarAppsDropdown" style="width: 25rem;">
                        <div class="card">
                          <!-- Header -->
                          <div class="card-header">
                            <h4 class="card-title">Web apps &amp; services</h4>
                          </div>
                          <!-- End Header -->
                          <!-- Body -->
                          <div class="card-body card-body-height">
                            <a class="dropdown-item" href="#">
                              <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                  <img class="avatar avatar-xs avatar-4x3" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/brands/atlassian-icon.svg" alt="Image Description">
                                </div>
                                <div class="flex-grow-1 text-truncate ms-3">
                                  <h5 class="mb-0">Atlassian</h5>
                                  <p class="card-text text-body">Security and control across Cloud</p>
                                </div>
                              </div>
                            </a>
                            <a class="dropdown-item" href="#">
                              <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                  <img class="avatar avatar-xs avatar-4x3" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/brands/slack-icon.svg" alt="Image Description">
                                </div>
                                <div class="flex-grow-1 text-truncate ms-3">
                                  <h5 class="mb-0">Slack <span class="badge bg-primary rounded-pill text-uppercase ms-1">Try</span></h5>
                                  <p class="card-text text-body">Email collaboration software</p>
                                </div>
                              </div>
                            </a>
                            <a class="dropdown-item" href="#">
                              <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                  <img class="avatar avatar-xs avatar-4x3" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/brands/google-webdev-icon.svg" alt="Image Description">
                                </div>
                                <div class="flex-grow-1 text-truncate ms-3">
                                  <h5 class="mb-0">Google webdev</h5>
                                  <p class="card-text text-body">Work involved in developing a website</p>
                                </div>
                              </div>
                            </a>
                            <a class="dropdown-item" href="#">
                              <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                  <img class="avatar avatar-xs avatar-4x3" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/brands/frontapp-icon.svg" alt="Image Description">
                                </div>
                                <div class="flex-grow-1 text-truncate ms-3">
                                  <h5 class="mb-0">Frontapp</h5>
                                  <p class="card-text text-body">The inbox for teams</p>
                                </div>
                              </div>
                            </a>
                            <a class="dropdown-item" href="#">
                              <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                  <img class="avatar avatar-xs avatar-4x3" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/illustrations/review-rating-shield.svg" alt="Image Description">
                                </div>
                                <div class="flex-grow-1 text-truncate ms-3">
                                  <h5 class="mb-0">HS Support</h5>
                                  <p class="card-text text-body">Customer service and support</p>
                                </div>
                              </div>
                            </a>
                            <a class="dropdown-item" href="#">
                              <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                  <div class="avatar avatar-sm avatar-soft-dark">
                                    <span class="avatar-initials"><i class="bi-grid"></i></span>
                                  </div>
                                </div>
                                <div class="flex-grow-1 text-truncate ms-3">
                                  <h5 class="mb-0">More Front products</h5>
                                  <p class="card-text text-body">Check out more HS products</p>
                                </div>
                              </div>
                            </a>
                          </div>
                          <!-- End Body -->
                          <!-- Footer -->
                          <a class="card-footer text-center" href="#">
                            View all apps <i class="bi-chevron-right"></i>
                          </a>
                          <!-- End Footer -->
                        </div>
                      </div>
                    </div>
                    <!-- End Apps -->
                  </li>
                  <li class="nav-item d-none d-sm-inline-block">
                    <!-- Activity -->
                    <button class="btn btn-ghost-light btn-icon rounded-circle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasActivityStream" aria-controls="offcanvasActivityStream">
                      <i class="bi-x-diamond"></i>
                    </button>
                    <!-- Activity -->
                  </li>
                  <li class="nav-item">
                    <!-- Style Switcher -->
                    <div class="dropdown ">
                      <button type="button" class="btn btn-ghost-light btn-icon rounded-circle" id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectThemeDropdown">
                        <a class="dropdown-item" href="#" data-icon="bi-moon-stars" data-value="auto">
                          <i class="bi-moon-stars me-2"></i>
                          <span class="text-truncate" title="Auto (system default)">Auto (system default)</span>
                        </a>
                        <a class="dropdown-item" href="#" data-icon="bi-brightness-high" data-value="default">
                          <i class="bi-brightness-high me-2"></i>
                          <span class="text-truncate" title="Default (light mode)">Default (light mode)</span>
                        </a>
                        <a class="dropdown-item active" href="#" data-icon="bi-moon" data-value="dark">
                          <i class="bi-moon me-2"></i>
                          <span class="text-truncate" title="Dark">Dark</span>
                        </a>
                      </div>
                    </div>
                    <!-- End Style Switcher -->
                  </li>
                  <li class="nav-item">
                    <!-- Account -->
                    <div class="dropdown">
                      <a class="navbar-dropdown-account-wrapper" href="javascript:;" id="accountNavbarDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                        <div class="avatar avatar-sm avatar-circle">
                          <img class="avatar-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/img/160x160/img6.jpg" alt="Image Description">
                          <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                        </div>
                      </a>
                      <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                        <div class="dropdown-item-text">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-sm avatar-circle">
                              <img class="avatar-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/img/160x160/img6.jpg" alt="Image Description">
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <h5 class="mb-0">Mark Williams</h5>
                              <p class="card-text text-body">mark@site.com</p>
                            </div>
                          </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a class="navbar-dropdown-submenu-item dropdown-item dropdown-toggle" href="javascript:;" id="navSubmenuPagesAccountDropdown1" data-bs-toggle="dropdown" aria-expanded="false">Set status</a>
                          <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-sub-menu" aria-labelledby="navSubmenuPagesAccountDropdown1">
                            <a class="dropdown-item" href="#">
                              <span class="legend-indicator bg-success me-1"></span> Available
                            </a>
                            <a class="dropdown-item" href="#">
                              <span class="legend-indicator bg-danger me-1"></span> Busy
                            </a>
                            <a class="dropdown-item" href="#">
                              <span class="legend-indicator bg-warning me-1"></span> Away
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"> Reset status
                            </a>
                          </div>
                        </div>
                        <!-- End Dropdown -->
                        <a class="dropdown-item" href="#">Profile &amp; account</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                          <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                              <div class="avatar avatar-sm avatar-dark avatar-circle">
                                <span class="avatar-initials">HS</span>
                              </div>
                            </div>
                            <div class="flex-grow-1 ms-2">
                              <h5 class="mb-0">Htmlstream <span class="badge bg-primary rounded-pill text-uppercase ms-1">PRO</span></h5>
                              <span class="card-text">hs.example.com</span>
                            </div>
                          </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a class="navbar-dropdown-submenu-item dropdown-item dropdown-toggle" href="javascript:;" id="navSubmenuPagesAccountDropdown2" data-bs-toggle="dropdown" aria-expanded="false">Customization</a>
                          <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-sub-menu" aria-labelledby="navSubmenuPagesAccountDropdown2">
                            <a class="dropdown-item" href="#">
                              Invite people
                            </a>
                            <a class="dropdown-item" href="#">
                              Analytics
                              <i class="bi-box-arrow-in-up-right"></i>
                            </a>
                            <a class="dropdown-item" href="#">
                              Customize Front
                              <i class="bi-box-arrow-in-up-right"></i>
                            </a>
                          </div>
                        </div>
                        <!-- End Dropdown -->
                        <a class="dropdown-item" href="#">Manage team</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Sign out</a>
                      </div>
                    </div>
                    <!-- End Account -->
                  </li>
                  <li class="nav-item">
                    <!-- Toggler -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDoubleLineContainerNavDropdown" aria-controls="navbarDoubleLineContainerNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-default">
                        <i class="bi-list"></i>
                      </span>
                      <span class="navbar-toggler-toggled">
                        <i class="bi-x"></i>
                      </span>
                    </button>
                    <!-- End Toggler -->
                  </li>
                </ul>
                <!-- End Navbar -->
              </div>
              <!-- End Content End -->
            </div>
          </div>
        </div>
        <div class="container">
          <nav class="js-mega-menu flex-grow-1">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarDoubleLineContainerNavDropdown">
              <ul class="navbar-nav">
                <!-- Dashboards -->
                <li class="hs-has-sub-menu nav-item">
                  <a id="dashboardsMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle active" href="#" role="button"><i class="bi-house-door dropdown-item-icon"></i> Dashboards</a>
                  <!-- Mega Menu -->
                  <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="dashboardsMegaMenu" style="min-width: 14rem;">
                    <a class="dropdown-item active" href="index.html">Default</a>
                    <a class="dropdown-item " href="dashboard-alternative.html">Alternative</a>
                  </div>
                  <!-- End Mega Menu -->
                </li>
                <!-- End Dashboards -->
                <!-- Pages -->
                <li class="hs-has-sub-menu nav-item">
                  <a id="pagesMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle " href="#" role="button"><i class="bi-files-alt dropdown-item-icon"></i> Pages</a>
                  <!-- Mega Menu -->
                  <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="pagesMegaMenu" style="min-width: 14rem;">
                    <!-- Users -->
                    <div class="hs-has-sub-menu nav-item">
                      <a id="usersMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">Users</a>
                      <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="usersMegaMenu" style="min-width: 14rem;">
                        <a class="dropdown-item " href="users.html">Overview</a>
                        <a class="dropdown-item " href="users-leaderboard.html">Leaderboard</a>
                        <a class="dropdown-item " href="users-add-user.html">Add User <span class="badge bg-info rounded-pill ms-1">Hot</span></a>
                      </div>
                    </div>
                    <!-- End Users -->
                    <!-- User Profile -->
                    <div class="hs-has-sub-menu nav-item">
                      <a id="userProfileMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">User Profile <span class="badge bg-primary rounded-pill ms-1">5</span></a>
                      <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="userProfileMegaMenu" style="min-width: 14rem;">
                        <a class="dropdown-item " href="user-profile.html">Profile</a>
                        <a class="dropdown-item " href="user-profile-teams.html">Teams</a>
                        <a class="dropdown-item " href="user-profile-projects.html">Projects</a>
                        <a class="dropdown-item " href="user-profile-connections.html">Connections</a>
                        <a class="dropdown-item " href="user-profile-my-profile.html">My Profile</a>
                      </div>
                    </div>
                    <!-- End User Profile -->
                    <!-- Account -->
                    <div class="hs-has-sub-menu nav-item">
                      <a id="accountMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">Account</a>
                      <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="accountMegaMenu" style="min-width: 14rem;">
                        <a class="dropdown-item " href="account-settings.html">Settings</a>
                        <a class="dropdown-item " href="account-billing.html">Billing</a>
                        <a class="dropdown-item " href="account-invoice.html">Invoice</a>
                      </div>
                    </div>
                    <!-- End Account -->
                    <!-- E-commerce -->
                    <div class="hs-has-sub-menu nav-item">
                      <a id="ecommerceMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">E-commerce</a>
                      <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="ecommerceMegaMenu" style="min-width: 14rem;">
                        <a class="dropdown-item " href="ecommerce.html">Overview</a>
                        <!-- Products -->
                        <div class="hs-has-sub-menu nav-item">
                          <a id="productsMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">Products</a>
                          <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="productsMegaMenu" style="min-width: 14rem;">
                            <a class="dropdown-item " href="ecommerce-products.html">Products</a>
                            <a class="dropdown-item " href="ecommerce-product-details.html">Product Details</a>
                            <a class="dropdown-item " href="ecommerce-add-product.html">Add Product</a>
                          </div>
                        </div>
                        <!-- End Products -->
                        <!-- Products -->
                        <div class="hs-has-sub-menu nav-item">
                          <a id="ordersMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">Orders</a>
                          <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="ordersMegaMenu" style="min-width: 14rem;">
                            <a class="dropdown-item " href="ecommerce-orders.html">Orders</a>
                            <a class="dropdown-item " href="ecommerce-order-details.html">Order Details</a>
                          </div>
                        </div>
                        <!-- End Products -->
                        <!-- Customers -->
                        <div class="hs-has-sub-menu nav-item">
                          <a id="customersMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">Customers</a>
                          <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="customersMegaMenu" style="min-width: 14rem;">
                            <a class="dropdown-item " href="ecommerce-customers.html">Customers</a>
                            <a class="dropdown-item " href="ecommerce-customer-details.html">Customer Details</a>
                            <a class="dropdown-item " href="ecommerce-add-customers.html">Add Customers</a>
                          </div>
                        </div>
                        <!-- End Customers -->
                        <a class="dropdown-item " href="ecommerce-referrals.html">Referrals</a>
                        <a class="dropdown-item " href="ecommerce-manage-reviews.html">Manage Reviews</a>
                        <a class="dropdown-item " href="ecommerce-checkout.html">Checkout</a>
                      </div>
                    </div>
                    <!-- End E-commerce -->
                    <!-- Projects -->
                    <div class="hs-has-sub-menu nav-item">
                      <a id="projectsMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">Projects</a>
                      <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="projectsMegaMenu" style="min-width: 14rem;">
                        <a class="dropdown-item " href="projects.html">Overview</a>
                        <a class="dropdown-item " href="projects-timeline.html">Timeline</a>
                      </div>
                    </div>
                    <!-- End Projects -->
                    <!-- Project -->
                    <div class="hs-has-sub-menu nav-item">
                      <a id="projectMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">Project</a>
                      <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="projectMegaMenu" style="min-width: 14rem;">
                        <a class="dropdown-item " href="project.html">Overview</a>
                        <a class="dropdown-item " href="project-files.html">Files</a>
                        <a class="dropdown-item " href="project-activity.html">Activity</a>
                        <a class="dropdown-item " href="project-teams.html">Teams</a>
                        <a class="dropdown-item " href="project-settings.html">Settings</a>
                      </div>
                    </div>
                    <!-- End Project -->
                    <!-- Authentication -->
                    <div class="hs-has-sub-menu nav-item">
                      <a id="authenticationMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">Authentication</a>
                      <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="authenticationMegaMenu" style="min-width: 14rem;">
                        <!-- Log In -->
                        <div class="hs-has-sub-menu nav-item">
                          <a id="loginMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">Log In</a>
                          <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="loginMegaMenu" style="min-width: 14rem;">
                            <a class="dropdown-item " href="authentication-login-basic.html">Basic</a>
                            <a class="dropdown-item " href="authentication-login-cover.html">Cover</a>
                          </div>
                        </div>
                        <!-- End Log In -->
                        <!-- Sign Up -->
                        <div class="hs-has-sub-menu nav-item">
                          <a id="signupMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">Sign Up</a>
                          <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="signupMegaMenu" style="min-width: 14rem;">
                            <a class="dropdown-item " href="authentication-signup-basic.html">Basic</a>
                            <a class="dropdown-item " href="authentication-signup-cover.html">Cover</a>
                          </div>
                        </div>
                        <!-- End Sign Up -->
                        <!-- Reset Password -->
                        <div class="hs-has-sub-menu nav-item">
                          <a id="resetPasswordMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">Reset Password</a>
                          <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="resetPasswordMegaMenu" style="min-width: 14rem;">
                            <a class="dropdown-item " href="authentication-reset-password-basic.html">Basic</a>
                            <a class="dropdown-item " href="authentication-reset-password-cover.html">Cover</a>
                          </div>
                        </div>
                        <!-- End Reset Password -->
                        <!-- Email Verification -->
                        <div class="hs-has-sub-menu nav-item">
                          <a id="emailVerificationMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">Email Verification</a>
                          <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="emailVerificationMegaMenu" style="min-width: 14rem;">
                            <a class="dropdown-item " href="authentication-email-verification-basic.html">Basic</a>
                            <a class="dropdown-item " href="authentication-email-verification-cover.html">Cover</a>
                          </div>
                        </div>
                        <!-- End Email Verification -->
                        <!-- 2-step Verification -->
                        <div class="hs-has-sub-menu nav-item">
                          <a id="2stepVerificationMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button">2-step Verification</a>
                          <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="2stepVerificationMegaMenu" style="min-width: 14rem;">
                            <a class="dropdown-item " href="authentication-2-step-verification-basic.html">Basic</a>
                            <a class="dropdown-item " href="authentication-2-step-verification-cover.html">Cover</a>
                          </div>
                        </div>
                        <!-- End 2-step Verification -->
                        <a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#welcomeMessageModal">Welcome Message</a>
                        <a class="dropdown-item " href="error-404.html">Error 404</a>
                        <a class="dropdown-item " href="error-500.html">Error 500</a>
                      </div>
                    </div>
                    <!-- End Authentication -->
                    <a class="dropdown-item " href="api-keys.html" data-placement="left">API Keys</a>
                    <a class="dropdown-item " href="welcome-page.html" data-placement="left">Welcome Page</a>
                    <a class="dropdown-item " href="landing.html" data-placement="left">Landing Page <span class="badge bg-info rounded-pill ms-1">New</span></a>
                  </div>
                  <!-- End Mega Menu -->
                </li>
                <!-- End Pages -->
                <!-- Apps -->
                <li class="hs-has-sub-menu nav-item">
                  <a id="appsMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle " href="#" role="button"><i class="bi-app-indicator dropdown-item-icon"></i> Apps</a>
                  <div class="hs-sub-menu dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="appsMegaMenu" style="min-width: 14rem;">
                    <a class="dropdown-item " href="apps-kanban.html">Kanban</a>
                    <a class="dropdown-item " href="apps-calendar.html">Calendar</a>
                    <a class="dropdown-item " href="apps-invoice-generator.html">Invoice Generator</a>
                    <a class="dropdown-item " href="apps-file-manager.html">File Manager</a>
                  </div>
                </li>
                <!-- End Apps -->
                <li class="nav-item">
                  <a class="nav-link " href="layouts/index.html">
                    <i class="bi-grid-1x2 dropdown-item-icon"></i> Layouts
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="documentation/index.html" data-placement="left">
                    <i class="bi-book dropdown-item-icon"></i> Docs
                  </a>
                </li>
              </ul>
            </div>
            <!-- End Collapse -->
          </nav>
        </div>
      </header>
      <!-- End Double Header -->
    </div>
  </div>
  <script src="<?=env('ADMIN_ASSETS_URL')?>assets/js/demo.js"></script>
  <!-- END ONLY DEV -->
  <!-- ========== SECONDARY CONTENTS ========== -->
  <!-- Keyboard Shortcuts -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasKeyboardShortcuts" aria-labelledby="offcanvasKeyboardShortcutsLabel">
    <div class="offcanvas-header">
      <h4 id="offcanvasKeyboardShortcutsLabel" class="mb-0">Keyboard shortcuts</h4>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="list-group list-group-sm list-group-flush list-group-no-gutters mb-5">
        <div class="list-group-item">
          <h5 class="mb-1">Formatting</h5>
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <span class="fw-semibold">Bold</span>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">b</kbd>
            </div>
          </div>
          <!-- End Row -->
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <em>italic</em>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">i</kbd>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <u>Underline</u>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">u</kbd>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <s>Strikethrough</s>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">Alt</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">s</kbd>
              <!-- End Col -->
            </div>
          </div>
          <!-- End Row -->
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <span class="small">Small text</span>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">s</kbd>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <mark>Highlight</mark>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">e</kbd>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
      </div>
      <div class="list-group list-group-sm list-group-flush list-group-no-gutters mb-5">
        <div class="list-group-item">
          <h5 class="mb-1">Insert</h5>
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <span>Mention person <a href="#">(@Brian)</a></span>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">@</kbd>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <span>Link to doc <a href="#">(+Meeting notes)</a></span>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">+</kbd>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <a href="#">#hashtag</a>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">#hashtag</kbd>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <span>Date</span>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">/date</kbd>
              <kbd class="d-inline-block mb-1">Space</kbd>
              <kbd class="d-inline-block mb-1">/datetime</kbd>
              <kbd class="d-inline-block mb-1">/datetime</kbd>
              <kbd class="d-inline-block mb-1">Space</kbd>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <span>Time</span>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">/time</kbd>
              <kbd class="d-inline-block mb-1">Space</kbd>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <span>Note box</span>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">/note</kbd>
              <kbd class="d-inline-block mb-1">Enter</kbd>
              <kbd class="d-inline-block mb-1">/note red</kbd>
              <kbd class="d-inline-block mb-1">/note red</kbd>
              <kbd class="d-inline-block mb-1">Enter</kbd>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
      </div>
      <div class="list-group list-group-sm list-group-flush list-group-no-gutters mb-5">
        <div class="list-group-item">
          <h5 class="mb-1">Editing</h5>
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <span>Find and replace</span>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">r</kbd>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <span>Find next</span>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">n</kbd>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <span>Find previous</span>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">p</kbd>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <span>Indent</span>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">Tab</kbd>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <span>Un-indent</span>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">Shift</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">Tab</kbd>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <span>Move line up</span>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">Shift</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1"><i class="bi-arrow-up-short"></i></kbd>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <span>Move line down</span>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">Shift</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1"><i class="bi-arrow-down-short fs-5"></i></kbd>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <span>Add a comment</span>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">Alt</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">m</kbd>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <span>Undo</span>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">z</kbd>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <span>Redo</span>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">y</kbd>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
      </div>
      <div class="list-group list-group-sm list-group-flush list-group-no-gutters">
        <div class="list-group-item">
          <h5 class="mb-1">Application</h5>
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <span>Create new doc</span>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">Alt</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">n</kbd>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <span>Present</span>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">Shift</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">p</kbd>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <span>Share</span>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">Shift</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">s</kbd>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <span>Search docs</span>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">Shift</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">o</kbd>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-5">
              <span>Keyboard shortcuts</span>
            </div>
            <!-- End Col -->
            <div class="col-7 text-end">
              <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">Shift</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">/</kbd>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Keyboard Shortcuts -->
  <!-- Activity -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasActivityStream" aria-labelledby="offcanvasActivityStreamLabel">
    <div class="offcanvas-header">
      <h4 id="offcanvasActivityStreamLabel" class="mb-0">Activity stream</h4>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <!-- Step -->
      <ul class="step step-icon-sm step-avatar-sm">
        <!-- Step Item -->
        <li class="step-item">
          <div class="step-content-wrapper">
            <div class="step-avatar">
              <img class="step-avatar" src="<?=env('ADMIN_ASSETS_URL')?>assets/img/160x160/img9.jpg" alt="Image Description">
            </div>
            <div class="step-content">
              <h5 class="mb-1">Iana Robinson</h5>
              <p class="fs-5 mb-1">Added 2 files to task <a class="text-uppercase" href="#"><i class="bi-journal-bookmark-fill"></i> Fd-7</a></p>
              <ul class="list-group list-group-sm">
                <!-- List Item -->
                <li class="list-group-item list-group-item-light">
                  <div class="row gx-1">
                    <div class="col-6">
                      <!-- Media -->
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <img class="avatar avatar-xs" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/brands/excel-icon.svg" alt="Image Description">
                        </div>
                        <div class="flex-grow-1 text-truncate ms-2">
                          <span class="d-block fs-6 text-dark text-truncate" title="weekly-reports.xls">weekly-reports.xls</span>
                          <span class="d-block small text-muted">12kb</span>
                        </div>
                      </div>
                      <!-- End Media -->
                    </div>
                    <!-- End Col -->
                    <div class="col-6">
                      <!-- Media -->
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <img class="avatar avatar-xs" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/brands/word-icon.svg" alt="Image Description">
                        </div>
                        <div class="flex-grow-1 text-truncate ms-2">
                          <span class="d-block fs-6 text-dark text-truncate" title="weekly-reports.xls">weekly-reports.xls</span>
                          <span class="d-block small text-muted">4kb</span>
                        </div>
                      </div>
                      <!-- End Media -->
                    </div>
                    <!-- End Col -->
                  </div>
                  <!-- End Row -->
                </li>
                <!-- End List Item -->
              </ul>
              <span class="small text-muted text-uppercase">Now</span>
            </div>
          </div>
        </li>
        <!-- End Step Item -->
        <!-- Step Item -->
        <li class="step-item">
          <div class="step-content-wrapper">
            <span class="step-icon step-icon-soft-dark">B</span>
            <div class="step-content">
              <h5 class="mb-1">Bob Dean</h5>
              <p class="fs-5 mb-1">Marked <a class="text-uppercase" href="#"><i class="bi-journal-bookmark-fill"></i> Fr-6</a> as <span class="badge bg-soft-success text-success rounded-pill"><span class="legend-indicator bg-success"></span>"Completed"</span></p>
              <span class="small text-muted text-uppercase">Today</span>
            </div>
          </div>
        </li>
        <!-- End Step Item -->
        <!-- Step Item -->
        <li class="step-item">
          <div class="step-content-wrapper">
            <div class="step-avatar">
              <img class="step-avatar-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/img/160x160/img3.jpg" alt="Image Description">
            </div>
            <div class="step-content">
              <h5 class="h5 mb-1">Crane</h5>
              <p class="fs-5 mb-1">Added 5 card to <a href="#">Payments</a></p>
              <ul class="list-group list-group-sm">
                <li class="list-group-item list-group-item-light">
                  <div class="row gx-1">
                    <div class="col">
                      <img class="img-fluid rounded" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/components/card-1.svg" alt="Image Description">
                    </div>
                    <div class="col">
                      <img class="img-fluid rounded" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/components/card-2.svg" alt="Image Description">
                    </div>
                    <div class="col">
                      <img class="img-fluid rounded" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/components/card-3.svg" alt="Image Description">
                    </div>
                    <div class="col-auto align-self-center">
                      <div class="text-center">
                        <a href="#">+2</a>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
              <span class="small text-muted text-uppercase">May 12</span>
            </div>
          </div>
        </li>
        <!-- End Step Item -->
        <!-- Step Item -->
        <li class="step-item">
          <div class="step-content-wrapper">
            <span class="step-icon step-icon-soft-info">D</span>
            <div class="step-content">
              <h5 class="mb-1">David Lidell</h5>
              <p class="fs-5 mb-1">Added a new member to Front Dashboard</p>
              <span class="small text-muted text-uppercase">May 15</span>
            </div>
          </div>
        </li>
        <!-- End Step Item -->
        <!-- Step Item -->
        <li class="step-item">
          <div class="step-content-wrapper">
            <div class="step-avatar">
              <img class="step-avatar-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/img/160x160/img7.jpg" alt="Image Description">
            </div>
            <div class="step-content">
              <h5 class="mb-1">Rachel King</h5>
              <p class="fs-5 mb-1">Marked <a class="text-uppercase" href="#"><i class="bi-journal-bookmark-fill"></i> Fr-3</a> as <span class="badge bg-soft-success text-success rounded-pill"><span class="legend-indicator bg-success"></span>"Completed"</span></p>
              <span class="small text-muted text-uppercase">Apr 29</span>
            </div>
          </div>
        </li>
        <!-- End Step Item -->
        <!-- Step Item -->
        <li class="step-item">
          <div class="step-content-wrapper">
            <div class="step-avatar">
              <img class="step-avatar-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/img/160x160/img5.jpg" alt="Image Description">
            </div>
            <div class="step-content">
              <h5 class="mb-1">Finch Hoot</h5>
              <p class="fs-5 mb-1">Earned a "Top endorsed" <i class="bi-patch-check-fill text-primary"></i> badge</p>
              <span class="small text-muted text-uppercase">Apr 06</span>
            </div>
          </div>
        </li>
        <!-- End Step Item -->
        <!-- Step Item -->
        <li class="step-item">
          <div class="step-content-wrapper">
            <span class="step-icon step-icon-soft-primary">
              <i class="bi-person-fill"></i>
            </span>
            <div class="step-content">
              <h5 class="mb-1">Project status updated</h5>
              <p class="fs-5 mb-1">Marked <a class="text-uppercase" href="#"><i class="bi-journal-bookmark-fill"></i> Fr-3</a> as <span class="badge bg-soft-primary text-primary rounded-pill"><span class="legend-indicator bg-primary"></span>"In progress"</span></p>
              <span class="small text-muted text-uppercase">Feb 10</span>
            </div>
          </div>
        </li>
        <!-- End Step Item -->
      </ul>
      <!-- End Step -->
      <div class="d-grid">
        <a class="btn btn-white" href="javascript:;">View all <i class="bi-chevron-right"></i></a>
      </div>
    </div>
  </div>
  <!-- End Activity -->
  <!-- Welcome Message Modal -->
  <div class="modal fade" id="welcomeMessageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <!-- Header -->
        <div class="modal-close">
          <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm" data-bs-dismiss="modal" aria-label="Close">
            <i class="bi-x-lg"></i>
          </button>
        </div>
        <!-- End Header -->
        <!-- Body -->
        <div class="modal-body p-sm-5">
          <div class="text-center">
            <div class="w-75 w-sm-50 mx-auto mb-4">
              <img class="img-fluid" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/illustrations/oc-collaboration.svg" alt="Image Description" data-hs-theme-appearance="default">
              <img class="img-fluid" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/illustrations-light/oc-collaboration.svg" alt="Image Description" data-hs-theme-appearance="dark">
            </div>
            <h4 class="h1">Welcome to Front</h4>
            <p>We're happy to see you in our community.</p>
          </div>
        </div>
        <!-- End Body -->
        <!-- Footer -->
        <div class="modal-footer d-block text-center py-sm-5">
          <small class="text-cap text-muted">Trusted by the world's best teams</small>
          <div class="w-85 mx-auto">
            <div class="row justify-content-between">
              <div class="col">
                <img class="img-fluid" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/brands/gitlab-gray.svg" alt="Image Description">
              </div>
              <div class="col">
                <img class="img-fluid" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/brands/fitbit-gray.svg" alt="Image Description">
              </div>
              <div class="col">
                <img class="img-fluid" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/brands/flow-xo-gray.svg" alt="Image Description">
              </div>
              <div class="col">
                <img class="img-fluid" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/brands/layar-gray.svg" alt="Image Description">
              </div>
            </div>
          </div>
        </div>
        <!-- End Footer -->
      </div>
    </div>
  </div>
  <!-- End Welcome Message Modal -->
  <!-- Create a new user Modal -->
  <div class="modal fade" id="inviteUserModal" tabindex="-1" aria-labelledby="inviteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="inviteUserModalLabel">Invite users</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- Body -->
        <div class="modal-body">
          <!-- Form -->
          <div class="mb-4">
            <div class="input-group mb-2 mb-sm-0">
              <input type="text" class="form-control" name="fullName" placeholder="Search name or emails" aria-label="Search name or emails">
              <div class="input-group-append input-group-append-last-sm-down-none">
                <!-- Select -->
                <div class="tom-select-custom tom-select-custom-end">
                  <select class="js-select form-select" autocomplete="off" data-hs-tom-select-options='{
                            "searchInDropdown": false,
                            "hideSearch": true,
                            "dropdownWidth": "11rem"
                          }'>
                    <option value="guest" selected>Guest</option>
                    <option value="can edit">Can edit</option>
                    <option value="can comment">Can comment</option>
                    <option value="full access">Full access</option>
                  </select>
                </div>
                <!-- End Select -->
                <a class="btn btn-primary d-none d-sm-inline-block" href="javascript:;">Invite</a>
              </div>
            </div>
            <a class="btn btn-primary w-100 d-sm-none" href="javascript:;">Invite</a>
          </div>
          <!-- End Form -->
          <div class="row">
            <h5 class="col modal-title">Invite users</h5>
            <div class="col-auto">
              <a class="d-flex align-items-center small text-body" href="#">
                <img class="avatar avatar-xss avatar-4x3 me-2" src="<?=env('ADMIN_ASSETS_URL')?>assets/svg/brands/gmail-icon.svg" alt="Image Description">
                Import contacts
              </a>
            </div>
          </div>
          <hr class="mt-2">
          <ul class="list-unstyled list-py-2 mb-0">
            <!-- List Group Item -->
            <li>
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="avatar avatar-sm avatar-circle">
                    <img class="avatar-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/img/160x160/img10.jpg" alt="Image Description">
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <div class="row align-items-center">
                    <div class="col-sm">
                      <h5 class="mb-0">Amanda Harvey <i class="bi-patch-check-fill text-primary" data-toggle="tooltip" data-placement="top" title="Top endorsed"></i></h5>
                      <span class="d-block small">amanda@site.com</span>
                    </div>
                    <div class="col-sm-auto">
                      <!-- Select -->
                      <div class="tom-select-custom tom-select-custom-sm-end">
                        <select class="js-select form-select form-select-borderless tom-select-custom-form-select-invite-user tom-select-form-select-ps-0" autocomplete="off" data-hs-tom-select-options='{
                                  "searchInDropdown": false,
                                  "hideSearch": true,
                                  "dropdownWidth": "11rem"
                                }'>
                          <option value="guest" selected>Guest</option>
                          <option value="can edit">Can edit</option>
                          <option value="can comment">Can comment</option>
                          <option value="full access">Full access</option>
                          <option value="remove" data-option-template='<div class="text-danger">Remove</div>'>Remove</option>
                        </select>
                      </div>
                      <!-- End Select -->
                    </div>
                  </div>
                  <!-- End Row -->
                </div>
              </div>
            </li>
            <!-- End List Group Item -->
            <!-- List Group Item -->
            <li>
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="avatar avatar-sm avatar-circle">
                    <img class="avatar-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/img/160x160/img3.jpg" alt="Image Description">
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <div class="row align-items-center">
                    <div class="col-sm">
                      <h5 class="mb-0">David Harrison</h5>
                      <span class="d-block small">david@site.com</span>
                    </div>
                    <div class="col-sm-auto">
                      <!-- Select -->
                      <div class="tom-select-custom tom-select-custom-sm-end">
                        <select class="js-select form-select form-select-borderless tom-select-custom-form-select-invite-user tom-select-form-select-ps-0" autocomplete="off" data-hs-tom-select-options='{
                                  "searchInDropdown": false,
                                  "hideSearch": true,
                                  "dropdownWidth": "11rem"
                                }'>
                          <option value="guest" selected>Guest</option>
                          <option value="can edit">Can edit</option>
                          <option value="can comment">Can comment</option>
                          <option value="full access">Full access</option>
                          <option value="remove" data-option-template='<div class="text-danger">Remove</div>'>Remove</option>
                        </select>
                      </div>
                      <!-- End Select -->
                    </div>
                  </div>
                  <!-- End Row -->
                </div>
              </div>
            </li>
            <!-- End List Group Item -->
            <!-- List Group Item -->
            <li>
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="avatar avatar-sm avatar-circle">
                    <img class="avatar-img" src="<?=env('ADMIN_ASSETS_URL')?>assets/img/160x160/img9.jpg" alt="Image Description">
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <div class="row align-items-center">
                    <div class="col-sm">
                      <h5 class="mb-0">Ella Lauda <i class="bi-patch-check-fill text-primary" data-toggle="tooltip" data-placement="top" title="Top endorsed"></i></h5>
                      <span class="d-block small">Markvt@site.com</span>
                    </div>
                    <div class="col-sm-auto">
                      <!-- Select -->
                      <div class="tom-select-custom tom-select-custom-sm-end">
                        <select class="js-select form-select form-select-borderless tom-select-custom-form-select-invite-user tom-select-form-select-ps-0" autocomplete="off" data-hs-tom-select-options='{
                                  "searchInDropdown": false,
                                  "hideSearch": true,
                                  "dropdownWidth": "11rem"
                                }'>
                          <option value="guest" selected>Guest</option>
                          <option value="can edit">Can edit</option>
                          <option value="can comment">Can comment</option>
                          <option value="full access">Full access</option>
                          <option value="remove" data-option-template='<div class="text-danger">Remove</div>'>Remove</option>
                        </select>
                      </div>
                      <!-- End Select -->
                    </div>
                  </div>
                  <!-- End Row -->
                </div>
              </div>
            </li>
            <!-- End List Group Item -->
            <!-- List Group Item -->
            <li>
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="avatar avatar-sm avatar-soft-dark avatar-circle">
                    <span class="avatar-initials">B</span>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <div class="row align-items-center">
                    <div class="col-sm">
                      <h5 class="mb-0">Bob Dean</h5>
                      <span class="d-block small">bob@site.com</span>
                    </div>
                    <div class="col-sm-auto">
                      <!-- Select -->
                      <div class="tom-select-custom tom-select-custom-sm-end">
                        <select class="js-select form-select form-select-borderless tom-select-custom-form-select-invite-user tom-select-form-select-ps-0" autocomplete="off" data-hs-tom-select-options='{
                                  "searchInDropdown": false,
                                  "hideSearch": true,
                                  "dropdownWidth": "11rem"
                                }'>
                          <option value="guest" selected>Guest</option>
                          <option value="can edit">Can edit</option>
                          <option value="can comment">Can comment</option>
                          <option value="full access">Full access</option>
                          <option value="remove" data-option-template='<div class="text-danger">Remove</div>'>Remove</option>
                        </select>
                      </div>
                      <!-- End Select -->
                    </div>
                  </div>
                  <!-- End Row -->
                </div>
              </div>
            </li>
            <!-- End List Group Item -->
          </ul>
        </div>
        <!-- End Body -->
        <!-- Footer -->
        <div class="modal-footer">
          <div class="row align-items-center flex-grow-1 mx-n2">
            <div class="col-sm-9 mb-2 mb-sm-0">
              <input type="hidden" id="inviteUserPublicClipboard" value="https://themes.getbootstrap.com/product/front-multipurpose-responsive-template/">
              <p class="modal-footer-text">The public share <a href="#">link settings</a>
                <i class="bi-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="The public share link allows people to view the project without giving access to full collaboration features."></i>
              </p>
            </div>
            <div class="col-sm-3 text-sm-end">
              <a class="js-clipboard btn btn-white btn-sm text-nowrap" href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy to clipboard!" data-hs-clipboard-options='{
                  "type": "tooltip",
                  "successText": "Copied!",
                  "contentTarget": "#inviteUserPublicClipboard",
                  "container": "#inviteUserModal"
                 }'>
                <i class="bi-link-45deg me-1"></i> Copy link</a>
            </div>
          </div>
        </div>
        <!-- End Footer -->
      </div>
    </div>
  </div>
  <!-- End Create a new user Modal -->
  <!-- ========== END SECONDARY CONTENTS ========== -->
  <!-- JS Implementing Plugins -->
  <script src="<?=env('ADMIN_ASSETS_URL')?>assets/js/vendor.min.js"></script>
  <script src="<?=env('ADMIN_ASSETS_URL')?>assets/vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js"></script>
  <!-- JS Front -->
  <script src="<?=env('ADMIN_ASSETS_URL')?>assets/js/theme.min.js"></script>
  <script src="<?=env('ADMIN_ASSETS_URL')?>assets/js/hs.theme-appearance-charts.js"></script>

  <script src="<?=env('ADMIN_ASSETS_URL')?>assets/js/main.js"></script>
  <script src="<?=env('ADMIN_ASSETS_URL')?>assets/js/jquery.min.js"></script>
  <script src="<?=env('ADMIN_ASSETS_URL')?>assets/js/pages/data-basic-custom.js"></script>

  <link href="https://cdn.datatables.net/v/dt/dt-2.0.3/datatables.min.css" rel="stylesheet">
  <script src="https://cdn.datatables.net/v/dt/dt-2.0.3/datatables.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>

  <!-- JS Plugins Init. -->
  <script>
    $(function(){
      $('.autohide').delay(5000).fadeOut('slow');
    })
    $(document).on('ready', function () {
      // INITIALIZATION OF DATERANGEPICKER
      // =======================================================
      $('.js-daterangepicker').daterangepicker();
      $('.js-daterangepicker-times').daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
          format: 'M/DD hh:mm A'
        }
      });
      var start = moment();
      var end = moment();
      function cb(start, end) {
        $('#js-daterangepicker-predefined .js-daterangepicker-predefined-preview').html(start.format('MMM D') + ' - ' + end.format('MMM D, YYYY'));
      }
      $('#js-daterangepicker-predefined').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      }, cb);
      cb(start, end);
    });
    // INITIALIZATION OF DATATABLES
    // =======================================================
    HSCore.components.HSDatatables.init($('#datatable'), {
      select: {
        style: 'multi',
        selector: 'td:first-child input[type="checkbox"]',
        classMap: {
          checkAll: '#datatableCheckAll',
          counter: '#datatableCounter',
          counterInfo: '#datatableCounterInfo'
        }
      },
      language: {
        zeroRecords: `<div class="text-center p-4">
              <img class="mb-3" src="./<?=env('ADMIN_ASSETS_URL')?>assets/svg/illustrations/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">
              <img class="mb-3" src="./<?=env('ADMIN_ASSETS_URL')?>assets/svg/illustrations-light/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="dark">
            <p class="mb-0">No data to show</p>
            </div>`
      }
    });
    const datatable = HSCore.components.HSDatatables.getItem(0)
    document.querySelectorAll('.js-datatable-filter').forEach(function (item) {
      item.addEventListener('change',function(e) {
        const elVal = e.target.value,
    targetColumnIndex = e.target.getAttribute('data-target-column-index'),
    targetTable = e.target.getAttribute('data-target-table');
    HSCore.components.HSDatatables.getItem(targetTable).column(targetColumnIndex).search(elVal !== 'null' ? elVal : '').draw()
      })
    })
  </script>
  <!-- JS Plugins Init. -->
  <script>
    (function() {
      localStorage.removeItem('hs_theme')
      window.onload = function () {
        
        // INITIALIZATION OF NAVBAR VERTICAL ASIDE
        // =======================================================
        new HSSideNav('.js-navbar-vertical-aside').init()
        // INITIALIZATION OF FORM SEARCH
        // =======================================================
        const HSFormSearchInstance = new HSFormSearch('.js-form-search')
        if (HSFormSearchInstance.collection.length) {
          HSFormSearchInstance.getItem(1).on('close', function (el) {
            el.classList.remove('top-0')
          })
          document.querySelector('.js-form-search-mobile-toggle').addEventListener('click', e => {
            let dataOptions = JSON.parse(e.currentTarget.getAttribute('data-hs-form-search-options')),
              $menu = document.querySelector(dataOptions.dropMenuElement)
            $menu.classList.add('top-0')
            $menu.style.left = 0
          })
        }
        // INITIALIZATION OF BOOTSTRAP DROPDOWN
        // =======================================================
        HSBsDropdown.init()
        // INITIALIZATION OF CHARTJS
        // =======================================================
        HSCore.components.HSChartJS.init('.js-chart')
        // INITIALIZATION OF CHARTJS
        // =======================================================
        HSCore.components.HSChartJS.init('#updatingBarChart')
        const updatingBarChart = HSCore.components.HSChartJS.getItem('updatingBarChart')
        // Call when tab is clicked
        document.querySelectorAll('[data-bs-toggle="chart-bar"]').forEach(item => {
          item.addEventListener('click', e => {
            let keyDataset = e.currentTarget.getAttribute('data-datasets')
            const styles = HSCore.components.HSChartJS.getTheme('updatingBarChart', HSThemeAppearance.getAppearance())
            if (keyDataset === 'lastWeek') {
              updatingBarChart.data.labels = ["Apr 22", "Apr 23", "Apr 24", "Apr 25", "Apr 26", "Apr 27", "Apr 28", "Apr 29", "Apr 30", "Apr 31"];
              updatingBarChart.data.datasets = [
                {
                  "data": [120, 250, 300, 200, 300, 290, 350, 100, 125, 320],
                  "backgroundColor": styles.data.datasets[0].backgroundColor,
                  "hoverBackgroundColor": styles.data.datasets[0].hoverBackgroundColor,
                  "borderColor": styles.data.datasets[0].borderColor,
                  "maxBarThickness": 10
                },
                {
                  "data": [250, 130, 322, 144, 129, 300, 260, 120, 260, 245, 110],
                  "backgroundColor": styles.data.datasets[1].backgroundColor,
                  "borderColor": styles.data.datasets[1].borderColor,
                  "maxBarThickness": 10
                }
              ];
              updatingBarChart.update();
            } else {
              updatingBarChart.data.labels = ["May 1", "May 2", "May 3", "May 4", "May 5", "May 6", "May 7", "May 8", "May 9", "May 10"];
              updatingBarChart.data.datasets = [
                {
                  "data": [200, 300, 290, 350, 150, 350, 300, 100, 125, 220],
                  "backgroundColor": styles.data.datasets[0].backgroundColor,
                  "hoverBackgroundColor": styles.data.datasets[0].hoverBackgroundColor,
                  "borderColor": styles.data.datasets[0].borderColor,
                  "maxBarThickness": 10
                },
                {
                  "data": [150, 230, 382, 204, 169, 290, 300, 100, 300, 225, 120],
                  "backgroundColor": styles.data.datasets[1].backgroundColor,
                  "borderColor": styles.data.datasets[1].borderColor,
                  "maxBarThickness": 10
                }
              ]
              updatingBarChart.update();
            }
          })
        })
        // INITIALIZATION OF CHARTJS
        // =======================================================
        HSCore.components.HSChartJS.init('.js-chart-datalabels', {
          plugins: [ChartDataLabels],
          options: {
            plugins: {
              datalabels: {
                anchor: function (context) {
                  var value = context.dataset.data[context.dataIndex];
                  return value.r < 20 ? 'end' : 'center';
                },
                align: function (context) {
                  var value = context.dataset.data[context.dataIndex];
                  return value.r < 20 ? 'end' : 'center';
                },
                color: function (context) {
                  var value = context.dataset.data[context.dataIndex];
                  return value.r < 20 ? context.dataset.backgroundColor : context.dataset.color;
                },
                font: function (context) {
                  var value = context.dataset.data[context.dataIndex],
                    fontSize = 25;
                  if (value.r > 50) {
                    fontSize = 35;
                  }
                  if (value.r > 70) {
                    fontSize = 55;
                  }
                  return {
                    weight: 'lighter',
                    size: fontSize
                  };
                },
                formatter: function (value) {
                  return value.r
                },
                offset: 2,
                padding: 0
              }
            },
          }
        })
        // INITIALIZATION OF SELECT
        // =======================================================
        HSCore.components.HSTomSelect.init('.js-select')
        // INITIALIZATION OF CLIPBOARD
        // =======================================================
        HSCore.components.HSClipboard.init('.js-clipboard')
      }
    })()
  </script>
  <!-- Style Switcher JS -->
  <script>
      (function () {
        // STYLE SWITCHER
        // =======================================================
        const $dropdownBtn = document.getElementById('selectThemeDropdown') // Dropdowon trigger
        const $variants = document.querySelectorAll(`[aria-labelledby="selectThemeDropdown"] [data-icon]`) // All items of the dropdown
        // Function to set active style in the dorpdown menu and set icon for dropdown trigger
        const setActiveStyle = function () {
          $variants.forEach($item => {
            if ($item.getAttribute('data-value') === HSThemeAppearance.getOriginalAppearance()) {
              $dropdownBtn.innerHTML = `<i class="${$item.getAttribute('data-icon')}" />`
              return $item.classList.add('active')
            }
            $item.classList.remove('active')
          })
        }
        // Add a click event to all items of the dropdown to set the style
        $variants.forEach(function ($item) {
          $item.addEventListener('click', function () {
            HSThemeAppearance.setAppearance($item.getAttribute('data-value'))
          })
        })
        // Call the setActiveStyle on load page
        setActiveStyle()
        // Add event listener on change style to call the setActiveStyle function
        window.addEventListener('on-hs-appearance-change', function () {
          setActiveStyle()
        })
      })()
    </script>
  <!-- End Style Switcher JS -->
</body>
</html><?php /**PATH /home/keyline1/public_html/dev/aliahjournal.keylines.net.in/resources/views/admin/layout-after-login.blade.php ENDPATH**/ ?>