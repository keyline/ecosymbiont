<?php
use Illuminate\Support\Facades\Route;
$routeName = Route::current();
$pageName = explode('/', $routeName->uri());
$pageSegment = $pageName[1];
?>
<style type="text/css">
    li.active {
        background-color: #d09c1c2e;
    }
</style>
<div class="sidebar theiaStickySidebar">
    <div class="widget review-widget">
        <div class="title-section">
            <h1><span>Welcome <?=(($user)?$user->first_name:'')?></span></h1>
        </div>
        <ul class="review-posts-list quick-link">
            <?php if(session('role') == 2){?>
                <li <?=(($pageSegment == 'dashboard')?'class="active"':'')?>>
                    <a href="<?=url('user/dashboard')?>">Dashboard</a>
                </li>
                <li <?=(($pageSegment == 'author-classification')?'class="active"':'')?>>
                    <a href="<?=url('user/author-classification')?>">Classification</a>
                </li>
                <li <?=(($pageSegment == 'profiles')?'class="active"':'')?>>
                    <a href="<?=url('user/profiles')?>">Profile</a>
                </li>
                <li <?=(($pageSegment == 'my-articles')?'class="active"':'')?>>
                    <a href="<?=url('user/my-articles')?>">My Creative-Works</a>
                </li>
            <?php }?>
            <!-- <li ?=(($pageSegment == 'my-profile')?'class="active"':'')?>>
                <a href="?=url('user/my-profile')?>">My Account</a>
            </li> -->
            <li <?=(($pageSegment == 'change-password')?'class="active"':'')?>>
                <a href="<?=url('user/change-password')?>">Change Password</a>
            </li>
            <li <?=(($pageSegment == 'signout')?'class="active"':'')?>>
                <a href="<?=url('user/signout')?>">Sign Out</a>
            </li>
        </ul>
    </div>
</div>