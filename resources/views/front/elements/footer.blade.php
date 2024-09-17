<div class="container">
    <div class="footer-widgets-part">
        <div class="row">
            <div class="col-md-3">
                <div class="widget text-widget">
                    <h1>About</h1>
                    <p><?=$generalSetting->footer_description?></p>
                    <a href="index.html"><img src="images/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget tags-widget">
                    <h1>Popular Tags</h1>
                    <ul class="tag-list">
                        <li><a href="#">News</a></li>
                        <li><a href="#">Fashion</a></li>
                        <li><a href="#">Politics</a></li>
                        <li><a href="#">Sport</a></li>
                        <li><a href="#">Videos</a></li>
                        <li><a href="#">Business</a></li>
                        <li><a href="#">Food</a></li>
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">World</a></li>
                        <li><a href="#">Music</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget posts-widget">
                    <h1>Random Post</h1>
                    <ul class="list-posts">
                        <li>
                            <img src="<?=env('FRONT_ASSETS_URL')?>upload/news-posts/listw4.jpg" alt="">
                            <div class="post-content">
                                <a href="politics-category.html">World</a>
                                <h2><a href="single-post.html">Pellentesque odio nisi, euismod in ultricies in, diam. </a></h2>
                                <ul class="post-tags">
                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <img src="<?=env('FRONT_ASSETS_URL')?>upload/news-posts/listw1.jpg" alt="">
                            <div class="post-content">
                                <a href="politics-category.html">Election</a>
                                <h2><a href="single-post.html">Sed arcu. Cras consequat.</a></h2>
                                <ul class="post-tags">
                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <img src="<?=env('FRONT_ASSETS_URL')?>upload/news-posts/listw3.jpg" alt="">
                            <div class="post-content">
                                <a href="politics-category.html">Opinion</a>
                                <h2><a href="single-post.html">Phasellus ultrices nulla quis nibh. Quisque a lectus.</a></h2>
                                <ul class="post-tags">
                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget flickr-widget">
                    <h1>Flickr Photos</h1>
                    <ul class="flickr-list">
                        <li><a href="#"><img src="<?=env('FRONT_ASSETS_URL')?>upload/flickr/1.jpg" alt=""></a></li>
                        <li><a href="#"><img src="<?=env('FRONT_ASSETS_URL')?>upload/flickr/2.jpg" alt=""></a></li>
                        <li><a href="#"><img src="<?=env('FRONT_ASSETS_URL')?>upload/flickr/3.jpg" alt=""></a></li>
                        <li><a href="#"><img src="<?=env('FRONT_ASSETS_URL')?>upload/flickr/4.jpg" alt=""></a></li>
                        <li><a href="#"><img src="<?=env('FRONT_ASSETS_URL')?>upload/flickr/5.jpg" alt=""></a></li>
                        <li><a href="#"><img src="<?=env('FRONT_ASSETS_URL')?>upload/flickr/6.jpg" alt=""></a></li>
                    </ul>
                    <a href="#">View more photos...</a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-last-line">
        <div class="row">
            <div class="col-md-6">
                <p><?=$generalSetting->footer_text?></p>
            </div>
            <div class="col-md-6">
                <nav class="footer-nav">
                    <ul>
                        <li><a href="<?=url('/')?>">Home</a></li>
                        <li><a href="<?=url('page/about-us')?>">About</a></li>
                        <!-- <li><a href="<?=url('contact-us')?>">Contact</a></li> -->
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>