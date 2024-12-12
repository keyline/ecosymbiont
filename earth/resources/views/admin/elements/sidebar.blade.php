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
                <!-- news -->
                    <div class="nav-item">
                        <a class="nav-link dropdown-toggle active <?=(($pageSegment == 'news_category' || $pageSegment == 'news_content' || $pageSegment == 'news_subcategory' || $pageSegment == 'news_content_image')?'':'collapsed')?>" href="#navbarVerticalMenuNews" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuNews" aria-expanded="<?=(($pageSegment == 'news_category' || $pageSegment == 'news_content' || $pageSegment == 'news_subcategory' || $pageSegment == 'news_content_image')?'true':'false')?>" aria-controls="navbarVerticalMenuNews">
                          <i class="fa fa-bell nav-icon"></i>
                          <span class="nav-link-title">News</span>
                        </a>
                        <div id="navbarVerticalMenuNews" class="nav-collapse collapse <?=(($pageSegment == 'news_category' || $pageSegment == 'news_content' || $pageSegment == 'news_subcategory' || $pageSegment == 'news_content_image')?'show':'')?>" data-bs-parent="#navbarVerticalMenu">
                          <a class="nav-link <?=(($pageSegment == 'news_category')?'active':'')?>" href="<?=url('admin/news_category/list')?>">Parent Categories</a>
                          <a class="nav-link <?=(($pageSegment == 'news_subcategory')?'active':'')?>" href="<?=url('admin/news_subcategory/list')?>">Sub Categories</a>
                          <a class="nav-link <?=(($pageSegment == 'news_content')?'active':'')?>" href="<?=url('admin/news_content/list')?>">Contents</a>
                          <a class="nav-link <?=(($pageSegment == 'news_content_image')?'active':'')?>" href="<?=url('admin/news_content_image/list')?>">Media</a>
                        </div>
                    </div>                    
                <!-- End news -->
                <!-- Submitted Articles -->
                    <div class="nav-item">
                        <a class="nav-link <?= $pageSegment == 'article' ? 'active' : '' ?>"
                            href="<?= url('admin/article/list') ?>" data-placement="left">
                            <i class="fa fa-file-text nav-icon"></i>
                            <span class="nav-link-title">Submited Creative-Work</span>
                        </a>
                    </div>
                <!-- End Submitted Articles -->                
                 <!-- users -->
                    <div class="nav-item">
                        <a class="nav-link dropdown-toggle active <?=(($pageSegment == 'content_creaters' || $pageSegment == 'editors'  || $pageSegment == 'readers')?'':'collapsed')?>" href="#navbarVerticalMenuUsers" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuUsers" aria-expanded="<?=(($pageSegment == 'content_creaters' || $pageSegment == 'editors'  || $pageSegment == 'readers')?'true':'false')?>" aria-controls="navbarVerticalMenuUsers">
                          <i class="fa fa-users nav-icon"></i>
                          <span class="nav-link-title">Users</span>
                        </a>
                        <div id="navbarVerticalMenuUsers" class="nav-collapse collapse <?=(($pageSegment == 'content_creaters' || $pageSegment == 'editors'  || $pageSegment == 'readers')?'show':'')?>" data-bs-parent="#navbarVerticalMenu">
                          <a class="nav-link <?=(($pageSegment == 'content_creaters')?'active':'')?>" href="<?=url('admin/content_creaters/list')?>">Content Creater</a>
                          <a class="nav-link <?=(($pageSegment == 'readers')?'active':'')?>" href="<?=url('admin/readers/list')?>">Readers</a>
                          <!-- <a class="nav-link <?=(($pageSegment == 'editors')?'active':'')?>" href="<?=url('admin/editors/list')?>">Editors</a> -->
                        </div>
                    </div>
                <!-- End users -->
                <!-- Newsletter -->
                    <div class="nav-item">
                        <a class="nav-link dropdown-toggle active <?=(($pageSegment == 'subscriber' || $pageSegment == 'newsletter')?'':'collapsed')?>" href="#navbarVerticalNewsletter" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalNewsletter" aria-expanded="<?=(($pageSegment == 'subscriber' || $pageSegment == 'newsletter')?'true':'false')?>" aria-controls="navbarVerticalNewsletter">
                        <i class="fa fa-envelope nav-icon"></i>
                        <span class="nav-link-title">Newsletter</span>
                        </a>
                        <div id="navbarVerticalNewsletter" class="nav-collapse collapse <?=(($pageSegment == 'subscriber' || $pageSegment == 'newsletter')?'show':'')?>" data-bs-parent="#navbarVerticalMenu">
                        <a class="nav-link <?=(($pageSegment == 'subscriber')?'active':'')?>" href="<?=url('admin/subscriber/list')?>">Subscribers</a>
                        <a class="nav-link <?=(($pageSegment == 'newsletter')?'active':'')?>" href="<?=url('admin/newsletter/list')?>">Newsletter</a>
                        </div>
                    </div>
                    <!-- End Newsletter -->
                 <!-- masters -->
                 <div class="nav-item">
                        <a class="nav-link dropdown-toggle active <?=(($pageSegment == 'expertise_area' || $pageSegment == 'ecosystem_affiliation' || $pageSegment == 'pronoun' || $pageSegment == 'title' || $pageSegment == 'role' || $pageSegment == 'section_ert' || $pageSegment == 'submission_type' || $pageSegment == 'country')?'':'collapsed')?>" href="#navbarVerticalMenuMasters2" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuMasters2" aria-expanded="<?=(($pageSegment == 'expertise_area' || $pageSegment == 'ecosystem_affiliation' || $pageSegment == 'pronoun' || $pageSegment == 'title' || $pageSegment == 'role' || $pageSegment == 'section_ert' || $pageSegment == 'submission_type' || $pageSegment == 'country')?'true':'false')?>" aria-controls="navbarVerticalMenuMasters2">
                          <i class="fa fa-database nav-icon"></i>
                          <span class="nav-link-title">Masters</span>
                        </a>
                        <div id="navbarVerticalMenuMasters2" class="nav-collapse collapse <?=(($pageSegment == 'expertise_area' || $pageSegment == 'ecosystem_affiliation' || $pageSegment == 'pronoun' || $pageSegment == 'title' || $pageSegment == 'role' || $pageSegment == 'section_ert' || $pageSegment == 'submission_type' || $pageSegment == 'country')?'show':'')?>" data-bs-parent="#navbarVerticalMenu">
                          <a class="nav-link <?=(($pageSegment == 'expertise_area')?'active':'')?>" href="<?=url('admin/expertise_area/list')?>">Expertise Area</a>
                          <a class="nav-link <?=(($pageSegment == 'ecosystem_affiliation')?'active':'')?>" href="<?=url('admin/ecosystem_affiliation/list')?>">Ecosystem Affiliation</a>
                          <a class="nav-link <?=(($pageSegment == 'pronoun')?'active':'')?>" href="<?=url('admin/pronoun/list')?>">Pronoun</a>
                          <a class="nav-link <?=(($pageSegment == 'title')?'active':'')?>" href="<?=url('admin/title/list')?>">Title</a>
                          <a class="nav-link <?=(($pageSegment == 'role')?'active':'')?>" href="<?=url('admin/role/list')?>">Role</a>
                          <a class="nav-link <?=(($pageSegment == 'section_ert')?'active':'')?>" href="<?=url('admin/section_ert/list')?>">Section ERT</a>
                          <a class="nav-link <?=(($pageSegment == 'submission_type')?'active':'')?>" href="<?=url('admin/submission_type/list')?>">Submission Type</a>
                          <a class="nav-link <?=(($pageSegment == 'country')?'active':'')?>" href="<?=url('admin/country/list')?>">Country</a>
                        </div>
                    </div>
                <!-- End masters -->
                <!-- email logs -->
                    <div class="nav-item">
                        <a class="nav-link <?= $pageSegment == 'email-logs' ? 'active' : '' ?>"
                            href="<?= url('admin/email-logs') ?>" data-placement="left">
                            <i class="fa fa-list-alt nav-icon"></i>
                            <span class="nav-link-title">Email Logs</span>
                        </a>
                    </div>
                <!-- End email logs -->
                <!-- login logs -->
                    <div class="nav-item">
                        <a class="nav-link <?= $pageSegment == 'login-logs' ? 'active' : '' ?>"
                            href="<?= url('admin/login-logs') ?>" data-placement="left">
                            <i class="fa fa-sign-in nav-icon"></i>
                            <span class="nav-link-title">Login Logs</span>
                        </a>
                    </div>
                <!-- End login logs -->
                <!-- contact enquires -->
                    <div class="nav-item">
                        <a class="nav-link <?=(($pageSegment == 'enquiry')?'active':'')?>" href="<?=url('admin/enquiry/list')?>" data-placement="left">
                        <i class="fa fa-bell nav-icon"></i>
                        <span class="nav-link-title">Contact Enquires</span>
                        </a>
                    </div>
                <!-- End contact enquires -->
                 <!-- page -->
                    <div class="nav-item">
                        <a class="nav-link <?=(($pageSegment == 'page')?'active':'')?>" href="<?=url('admin/page/list')?>" data-placement="left">
                        <i class="fa fa-file nav-icon"></i>
                        <span class="nav-link-title">Pages</span>
                        </a>
                    </div>
                <!-- End page -->
                <!-- SEO Settings -->
                <div class="nav-item">
                        <a class="nav-link <?=(($pageSegment == 'seo')?'active':'')?>" href="<?=url('admin/seo/list')?>" data-placement="left">
                        <i class="fa fa-hashtag nav-icon"></i>                        
                        <span class="nav-link-title">SEO Settings</span>
                        </a>
                    </div>
                <!-- End SEO Settings -->
                <!-- settings -->
                <div class="nav-item">
                        <a class="nav-link <?=(($pageSegment == 'settings')?'active':'')?>" href="<?=url('admin/settings')?>" data-placement="left">
                        <i class="fa fa-cogs nav-icon"></i>
                        <span class="nav-link-title">Account Settings</span>
                        </a>
                    </div>
                <!-- End settings -->
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
