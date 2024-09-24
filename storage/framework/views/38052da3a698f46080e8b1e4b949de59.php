<?php
use Illuminate\Support\Facades\Route;
$routeName = Route::current();
$pageName = explode('/', $routeName->uri());
$pageSegment = $pageName[1];
$pageFunction = count($pageName) > 2 ? $pageName[2] : '';
// dd($routeName);
if (!empty($parameters)) {
    if (array_key_exists('id1', $parameters)) {
        $pId1 = Helper::decoded($parameters['id1']);
    } else {
        $pId1 = Helper::decoded($parameters['id']);
    }
    if (count($parameters) > 1) {
        $pId2 = Helper::decoded($parameters['id2']);
    }
}
?>
<div class="navbar-vertical-container">
    <div class="navbar-vertical-footer-offset">
        <!-- Logo -->
        <a class="navbar-brand" href="<?= url('admin/dashboard') ?>" aria-label="Front">
            <img class="navbar-brand-logo" src="<?= env('UPLOADS_URL') . $generalSetting->site_logo ?>"
                alt="<?= $generalSetting->site_name ?>" data-hs-theme-appearance="default" style="margin: 0 auto;">
            <img class="navbar-brand-logo" src="<?= env('UPLOADS_URL') . $generalSetting->site_logo ?>"
                alt="<?= $generalSetting->site_name ?>" data-hs-theme-appearance="dark" style="margin: 0 auto;">
            <img class="navbar-brand-logo-mini" src="<?= env('UPLOADS_URL') . $generalSetting->site_logo ?>"
                alt="<?= $generalSetting->site_name ?>" data-hs-theme-appearance="default" style="margin: 0 auto;">
            <img class="navbar-brand-logo-mini" src="<?= env('UPLOADS_URL') . $generalSetting->site_logo ?>"
                alt="<?= $generalSetting->site_name ?>" data-hs-theme-appearance="dark" style="margin: 0 auto;">
        </a>
        <!-- End Logo -->
        <!-- Navbar Vertical Toggle -->
        <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
            <i class="bi-arrow-bar-left navbar-toggler-short-align"
                data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
            <i class="bi-arrow-bar-right navbar-toggler-full-align"
                data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
        </button>
        <!-- End Navbar Vertical Toggle -->
        <!-- Content -->
        <div class="navbar-vertical-content">
            <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">
                <!-- dashboard -->
                <div class="nav-item">
                    <a class="nav-link <?= $pageSegment == 'dashboard' ? 'active' : '' ?>"
                        href="<?= url('admin/dashboard') ?>" data-placement="left">
                        <i class="fa fa-home nav-icon"></i>
                        <span class="nav-link-title">Dashboard</span>
                    </a>
                </div>
                <!-- End dashboard -->
                <!-- Notices -->
                <div class="nav-item">
                    <a class="nav-link <?= $pageSegment == 'notice' ? 'active' : '' ?>"
                        href="<?= url('admin/notice/list') ?>" data-placement="left">
                        <i class="fa fa-bell nav-icon"></i>
                        <span class="nav-link-title">Journals</span>
                    </a>
                </div>
                <!-- End Notices -->
                 <!-- news_category -->
                <div class="nav-item">
                    <a class="nav-link <?= $pageSegment == 'news_category' ? 'active' : '' ?>"
                        href="<?= url('admin/news_category/list') ?>" data-placement="left">
                        <i class="fa fa-bell nav-icon"></i>
                        <span class="nav-link-title">News Categories</span>
                    </a>
                </div>
                <!-- End news_category -->
                <!-- Notices -->
                <div class="nav-item">
                    <a class="nav-link <?= $pageSegment == 'manuscript' ? 'active' : '' ?>"
                        href="<?= url('admin/manuscript/list') ?>" data-placement="left">
                        <i class="fa fa-file-text nav-icon"></i>
                        <span class="nav-link-title">Manuscripts</span>
                    </a>
                </div>
                <!-- End Notices -->

                <!-- Scroll Notice  -->
                <div class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('scroll-notice.*') ? 'active' : ''); ?>"
                        href="<?php echo e(route('scroll-notice.create')); ?>" data-placement="left">
                        <i class="fa fa-file-text nav-icon"></i>
                        <span class="nav-link-title">Scroll Notice</span>
                    </a>
                </div>
                <!-- End Scroll Notice  -->
            </div>
        </div>
        <!-- End Content -->
        <!-- Footer -->
        <div class="navbar-vertical-footer">
            <ul class="navbar-vertical-footer-list">
                <li class="navbar-vertical-footer-list-item">
                    <!-- Style Switcher -->
                    <div class="dropdown dropup">
                        <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle"
                            id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                            data-bs-dropdown-animation>
                        </button>
                        <div class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless"
                            aria-labelledby="selectThemeDropdown">
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
            </ul>
        </div>
        <!-- End Footer -->
    </div>
</div>
<?php /**PATH /home/keyline1/public_html/ecosymbiont.keylines.net.in/resources/views/admin/elements/sidebar.blade.php ENDPATH**/ ?>