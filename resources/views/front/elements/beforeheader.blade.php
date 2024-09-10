<?php $current_url = url()->current(); ?>
<div class="top-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="left-top-header">
                    <ul
                        class="d-flex justify-content-between  justify-content-s
                    m-center justify-content-lg-start">
                        <li>
                            <a href="mailto:<?= $generalSetting->site_mail ?>">
                                <i class="fa-solid fa-envelope"></i>
                                <?= $generalSetting->site_mail ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 d-flex justify-content-center justify-content-lg-end align-items-center  mt-3 mt-lg-0">
                <div class="right-top-header">
                    <ul class="d-flex justify-content-end align-items-center">

                        <div class="font-sizer d-flex">
                            <button class="zoomin">A+</button>
                            <button class="zoomout">A-</button>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mid-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 d-none d-lg-block">
                <div class="mid-header-left d-flex justify-content-center justify-content-lg-start">
                    <a href="<?= url('/') ?>"><img src="<?= env('UPLOADS_URL') . $generalSetting->site_logo ?>"
                            alt="<?= $generalSetting->site_name ?>" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-lg-9 d-flex justify-content-center justify-content-lg-end align-items-center">
                <div class="mid-header-right">
                    <div class="mid-header-inner-img">
                        <img src="<?= env('FRONT_ASSETS_URL') ?>images/ugc-info.webp" alt=""
                            class="img-fluid d-block ms-auto">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="nav-section header">
    <div class="container">
        <section class="wrapper">
            <a class="navbar-brand mobilelogo" href="#">
                <img src="<?= env('UPLOADS_URL') . $generalSetting->site_logo ?>" alt="" class="img-fluid">
            </a>
            <div class="" id="cssmenu">
                <ul>
                    <!-- <li><a class="active" href="#">Home</a></li>
                     <li><a href="#">About</a>
                        <ul>
                            <li><a href="<?= url('about') ?>/#about-aliah-uni">About the Aliah University</a></li>
                            <li><a href="<?= url('about') ?>/#about-aliah-dep">About the Department</a></li>
                            <li><a href="<?= url('about') ?>/#about-journal-educare">About the Journal of Educare</a></li>
                        </ul>
                     </li>
                    <li><a href="<?= url('author-guideline') ?>">Author Guidelines</a></li>
                    <li><a href="<?= env('UPLOADS_URL') . 'sample-format.docx' ?>"  download>Sample Format </a></li>
                    <li><a href="<?= env('UPLOADS_URL') . 'journal-educare.docx' ?>" download>Journal Of Educare</a></li>
                    <li><a href="<?= url('editorial-board') ?>">Editorial Board for Journal of Educare</a></li> -->

                    <li><a class="<?= $current_url == url('/') ? 'active' : '' ?>" href="<?= url('/') ?>">Home</a></li>
                    <li><a class="<?= $current_url == url('about/#about-aliah-uni') ? 'active' : '' ?>"
                                    href="<?= url('about') ?>/#about-aliah-uni">About</a>
                        <!--<ul>-->
                        <!--    <li><a class="<?= $current_url == url('about/#about-aliah-uni') ? 'active' : '' ?>"-->
                        <!--            href="<?= url('about') ?>/#about-aliah-uni">About the Aliah University</a></li>-->
                        <!--    <li><a class="<?= $current_url == url('about/#about-aliah-dep') ? 'active' : '' ?>"-->
                        <!--            href="<?= url('about') ?>/#about-aliah-dep">About the Department</a></li>-->
                        <!--    <li><a class="<?= $current_url == url('about/#about-journal-educare') ? 'active' : '' ?>"-->
                        <!--            href="<?= url('about') ?>/#about-journal-educare">About the Journal of Educare</a>-->
                        <!--    </li>-->
                        <!--</ul>-->
                    </li>
                    <li><a class="<?= $current_url == url('author-guideline') ? 'active' : '' ?>"
                            href="<?= url('author-guideline') ?>">Author Guidelines</a></li>
                    <!-- <li><a href="<?= env('UPLOADS_URL') . 'sample-format.docx' ?>" download>Sample Format</a></li>
                    <li><a href="<?= env('UPLOADS_URL') . 'journal-educare.docx' ?>" download>Journal Of Educare</a></li> -->
                    <li><a href="<?= url('submit-manuscript') ?>">Submit Manuscript</a></li>
                    <li><a href="<?= url('archieve') ?>">Archive</a></li>
                    <li><a class="<?= $current_url == url('editorial-board') ? 'active' : '' ?>"
                            href="<?= url('editorial-board') ?>">Editorial Board</a></li>
                    <li><a class="<?= $current_url == url('advisory-board') ? 'active' : '' ?>"
                            href="<?= url('advisory-board') ?>">Advisory Board</a></li>
                    <li><a class="<?= $current_url == url('https://aliah.ac.in/department/cms-page.php?key=education&page_key=noticeboard') ? 'active' : '' ?>"
                            href="<?= url('https://aliah.ac.in/department/cms-page.php?key=education&page_key=noticeboard') ?>" target="_blank">Notice Board</a></li>
                                                    <li>

                </ul>
            </div>

        </section>

    </div>

</div>
<marquee width="100%" behavior='scroll' direction='left' scrollamount='5' onmouseover='this.stop()' onmouseout='this.start()' style="background: #ccc;">
    {!! $scrollNotice->content !!}
</marquee>
