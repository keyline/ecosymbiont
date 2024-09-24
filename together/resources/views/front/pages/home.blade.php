<?php
use App\Models\NewsCategory;
use App\Models\NewsContent;
use App\Helpers\Helper;
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- heading-news-section2 ================================================== -->
    <section class="heading-news2">
        <div class="container">
            <div class="iso-call heading-news-box">
                <?php
                $parentCategoryContent1 = NewsContent::join('news_category', 'news_contents.parent_category', '=', 'news_category.id')
                                   ->select('news_contents.id', 'news_contents.new_title', 'news_contents.sub_title', 'news_contents.slug', 'news_contents.author_name', 'news_contents.cover_image', 'news_contents.created_at', 'news_category.sub_category as category_name', 'news_category.slug as category_slug')
                                   ->where('news_contents.status', '=', 1)
                                //    ->where('news_contents.is_popular', '=', 1)
                                   ->where('news_contents.parent_category', '=', 1)
                                   ->orderBy('news_contents.id', 'DESC')
                                   ->first();
                //  Helper::pr($parentCategoryContent1);
                if($parentCategoryContent1){
                ?>
                    <div class="news-post image-post default-size">
                        <img src="<?=env('UPLOADS_URL').'newcontent/'.$parentCategoryContent1->cover_image?>" alt="<?=$parentCategoryContent1->new_title?>">
                        <div class="hover-box">
                            <div class="inner-hover">
                                <a class="category-post" href="<?=url('category/' . $parentCategoryContent1->category_slug)?>"><?=$parentCategoryContent1->category_name?></a>
                                <h2><a href="<?=url('content/' . $parentCategoryContent1->slug)?>"><?=$parentCategoryContent1->new_title?></a></h2>
                                <ul class="post-tags">
                                    <!-- <li><i class="fa fa-clock-o"></i><span><?=date_format(date_create($parentCategoryContent1->created_at), "d M Y")?></span></li> -->
                                    <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?=$parentCategoryContent1->author_name?></a></li>
                                </ul>
                                <p><?=$parentCategoryContent1->sub_title?></p>
                            </div>
                        </div>
                    </div>
                <?php }?>
                <div class="image-slider snd-size">
                    <span class="top-stories">TOP STORIES</span>
                    <ul class="bxslider">
                        <?php         
                        // DB::enableQueryLog(); // Enable query log               
                        $parentCategoryContents3 = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id') // Join for parent category
                                                                ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id') // Join for subcategory
                                                                ->select('news_contents.id', 
                                                                        'news_contents.new_title', 
                                                                        'news_contents.sub_title', 
                                                                        'news_contents.slug', 
                                                                        'news_contents.author_name', 
                                                                        'news_contents.cover_image', 
                                                                        'news_contents.created_at', 
                                                                        'parent_category.sub_category as parent_category_name', 
                                                                        'parent_category.slug as parent_category_slug', 
                                                                        'sub_category.sub_category as sub_category_name', 
                                                                        'sub_category.slug as sub_category_slug')
                                                                ->where('news_contents.status', '=', 1)
                                                                // ->where('news_contents.is_popular', '=', 1) // Uncomment if needed
                                                                ->where('news_contents.parent_category', '=', 3)
                                                                ->inRandomOrder()
                                                                ->get();       
                                                                // dd(DB::getQueryLog());                                                        
                        if($parentCategoryContents3){ foreach($parentCategoryContents3 as $parentCategoryContent3){
                        ?>
                            <li>
                                <div class="news-post image-post">
                                    <img src="<?=env('UPLOADS_URL').'newcontent/'.$parentCategoryContent3->cover_image?>" alt="<?=$parentCategoryContent3->new_title?>">
                                    <div class="hover-box">
                                        <div class="inner-hover">
                                            <a class="category-post" href="<?=url('category/' . $parentCategoryContent3->parent_category_slug)?>"><?=$parentCategoryContent3->parent_category_name?></a>
                                            <a class="sub-category-post" href="<?=url('category/' . $parentCategoryContent3->sub_category_slug)?>"><?=$parentCategoryContent3->sub_category_name?></a>
                                            <h2><a href="<?=url('content/' . $parentCategoryContent3->slug)?>"><?=$parentCategoryContent3->new_title?></a></h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i><?=date_format(date_create($parentCategoryContent3->created_at), "d M Y")?></li>
                                                <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?=$parentCategoryContent3->author_name?></a></li>                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php } }?>
                    </ul>
                </div>
                <?php
                $parentCategoryContent2 = NewsContent::join('news_category', 'news_contents.parent_category', '=', 'news_category.id')
                                   ->select('news_contents.id', 'news_contents.new_title', 'news_contents.sub_title', 'news_contents.slug', 'news_contents.author_name', 'news_contents.cover_image', 'news_contents.created_at', 'news_category.sub_category as category_name', 'news_category.slug as category_slug')
                                   ->where('news_contents.status', '=', 1)
                                //    ->where('news_contents.is_popular', '=', 1)
                                   ->where('news_contents.parent_category', '=', 2)
                                   ->orderBy('news_contents.id', 'DESC')
                                   ->first();
                $parentCategoryContent8 = NewsContent::join('news_category', 'news_contents.parent_category', '=', 'news_category.id')
                                   ->select('news_contents.id', 'news_contents.new_title', 'news_contents.sub_title', 'news_contents.slug', 'news_contents.author_name', 'news_contents.cover_image', 'news_contents.created_at', 'news_category.sub_category as category_name', 'news_category.slug as category_slug')
                                   ->where('news_contents.status', '=', 1)
                                //    ->where('news_contents.is_popular', '=', 1)
                                   ->where('news_contents.parent_category', '=', 8)
                                   ->orderBy('news_contents.id', 'DESC')
                                   ->first();
                $parentCategoryContent9 = NewsContent::join('news_category', 'news_contents.parent_category', '=', 'news_category.id')
                                   ->select('news_contents.id', 'news_contents.new_title', 'news_contents.sub_title', 'news_contents.slug', 'news_contents.author_name', 'news_contents.cover_image', 'news_contents.created_at', 'news_category.sub_category as category_name', 'news_category.slug as category_slug')
                                   ->where('news_contents.status', '=', 1)
                                //    ->where('news_contents.is_popular', '=', 1)
                                   ->where('news_contents.parent_category', '=', 9)
                                   ->orderBy('news_contents.id', 'DESC')
                                   ->first();
                if($parentCategoryContent2){
                ?>
                    <div class="news-post image-post">
                        <img src="<?=env('UPLOADS_URL').'newcontent/'.$parentCategoryContent2->cover_image?>" alt="<?=$parentCategoryContent2->new_title?>">
                        <div class="hover-box">
                            <div class="inner-hover">
                                <a class="category-post" href="<?=url('category/' . $parentCategoryContent2->category_slug)?>"><?=$parentCategoryContent2->category_name?></a>
                                <h2><a href="<?=url('content/' . $parentCategoryContent2->slug)?>"><?=$parentCategoryContent2->new_title?></a></h2>
                                <ul class="post-tags">
                                    <!-- <li><i class="fa fa-clock-o"></i><span><?=date_format(date_create($parentCategoryContent2->created_at), "d M Y")?></span></li> -->
                                    <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?=$parentCategoryContent2->author_name?></a></li>
                                </ul>
                                <p><?=$parentCategoryContent2->sub_title?></p>
                            </div>
                        </div>
                    </div>
                <?php }?>
                <?php if($parentCategoryContent8){?>
                    <div class="news-post image-post">
                        <img src="<?=env('UPLOADS_URL').'newcontent/'.$parentCategoryContent8->cover_image?>" alt="<?=$parentCategoryContent8->new_title?>">
                        <div class="hover-box">
                            <div class="inner-hover">
                                <a class="category-post" href="<?=url('category/' . $parentCategoryContent8->category_slug)?>"><?=$parentCategoryContent8->category_name?></a>
                                <h2><a href="<?=url('content/' . $parentCategoryContent8->slug)?>"><?=$parentCategoryContent8->new_title?></a></h2>
                                <ul class="post-tags">
                                    <!-- <li><i class="fa fa-clock-o"></i><span><?=date_format(date_create($parentCategoryContent8->created_at), "d M Y")?></span></li> -->
                                    <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?=$parentCategoryContent8->author_name?></a></li>
                                </ul>
                                <p><?=$parentCategoryContent8->sub_title?></p>
                            </div>
                        </div>
                    </div>
                <?php }?>
                <?php if($parentCategoryContent9){?>
                    <div class="news-post image-post">
                        <img src="<?=env('UPLOADS_URL').'newcontent/'.$parentCategoryContent9->cover_image?>" alt="<?=$parentCategoryContent9->new_title?>">
                        <div class="hover-box">
                            <div class="inner-hover">
                                <a class="category-post" href="<?=url('category/' . $parentCategoryContent9->category_slug)?>"><?=$parentCategoryContent9->category_name?></a>
                                <h2><a href="<?=url('content/' . $parentCategoryContent9->slug)?>"><?=$parentCategoryContent9->new_title?></a></h2>
                                <ul class="post-tags">
                                    <!-- <li><i class="fa fa-clock-o"></i><span><?=date_format(date_create($parentCategoryContent9->created_at), "d M Y")?></span></li> -->
                                    <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?=$parentCategoryContent9->author_name?></a></li>
                                </ul>
                                <p><?=$parentCategoryContent9->sub_title?></p>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </section>
    <!-- End heading-news-section -->
    <!-- block-wrapper-section ================================================== -->
    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8 content-blocker">
                    <!-- block content -->
                    <div class="block-content">
                        <!-- grid box -->
                        <div class="grid-box">
                            <div class="title-section">
                                <h1><span>Featured</span></h1>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="list-posts">
                                        <?php
                                        $featuredContents = NewsContent::join('news_category', 'news_contents.parent_category', '=', 'news_category.id')
                                                               ->select('news_contents.id', 'news_contents.new_title', 'news_contents.sub_title', 'news_contents.slug', 'news_contents.author_name', 'news_contents.cover_image', 'news_contents.created_at', 'news_category.sub_category as category_name', 'news_category.slug as category_slug')
                                                               ->where('news_contents.status', '=', 1)
                                                               ->where('news_contents.is_feature', '=', 1)
                                                               ->inRandomOrder()
                                                                ->limit(3)
                                                               ->get();
                                        if($featuredContents){ foreach($featuredContents as $featuredContent){
                                        ?>
                                        <li style="display: flex;">
                                            <img src="<?=env('UPLOADS_URL').'newcontent/'.$featuredContent->cover_image?>" alt="<?=$featuredContent->new_title?>">
                                            <div class="post-content">
                                                <h2><a href="<?=url('content/' . $featuredContent->slug)?>"><?=$featuredContent->new_title?></a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i><?=date_format(date_create($featuredContent->created_at), "d M Y")?></li>
                                                    <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?=$featuredContent->author_name?></a></li>
                                                </ul>
                                                <p><?=$featuredContent->sub_title?></p>
                                            </div>
                                        </li>
                                        <?php } }?>
                                    </ul>                                    
                                </div>
                            </div>
                            <!-- <div class="center-button">
                                <a href="#"><i class="fa fa-refresh"></i> More from featured</a>
                            </div> -->
                        </div>
                    </div>
                    <!-- End block content -->
                </div>
                <div class="col-md-3 col-sm-4 sidebar-sticky">
                    <!-- sidebar -->
                    <div class="sidebar large-sidebar theiaStickySidebar">
                        <div class="widget features-slide-widget">
                            <div class="title-section">
                                <h1><span>Highlighted</span></h1>
                            </div>
                            
                            <ul class="list-posts">
                                <?php
                                $featuredContents = NewsContent::join('news_category', 'news_contents.parent_category', '=', 'news_category.id')
                                                   ->select('news_contents.id', 'news_contents.new_title', 'news_contents.sub_title', 'news_contents.slug', 'news_contents.author_name', 'news_contents.cover_image', 'news_contents.created_at', 'news_category.sub_category as category_name', 'news_category.slug as category_slug')
                                                   ->where('news_contents.status', '=', 1)
                                                   ->where('news_contents.is_feature', '=', 1)
                                                   ->inRandomOrder()
                                                   ->limit(3)
                                                   ->get();
                                if($featuredContents){ foreach($featuredContents as $featuredContent){
                                ?>
                                    <li>
                                        <img src="<?=env('UPLOADS_URL').'newcontent/'.$featuredContent->cover_image?>" alt="<?=$featuredContent->new_title?>">
                                        <div class="post-content">
                                            <h2><a href="<?=url('content/' . $featuredContent->slug)?>"><?=$featuredContent->new_title?></a></h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i><?=date_format(date_create($featuredContent->created_at), "d M Y")?></li>
                                            </ul>
                                        </div>
                                    </li>
                                <?php } }?>
                            </ul>
                        </div>
                        <div class="widget tab-posts-widget">
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="active">
                                    <a href="#option1" data-toggle="tab">Popular</a>
                                </li>
                                <li>
                                    <a href="#option2" data-toggle="tab">Recent</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="option1">
                                    <ul class="list-posts">
                                        <?php
                                        $popularContents = NewsContent::join('news_category', 'news_contents.parent_category', '=', 'news_category.id')
                                                           ->select('news_contents.id', 'news_contents.new_title', 'news_contents.sub_title', 'news_contents.slug', 'news_contents.author_name', 'news_contents.cover_image', 'news_contents.created_at', 'news_category.sub_category as category_name', 'news_category.slug as category_slug')
                                                           ->where('news_contents.status', '=', 1)
                                                           ->where('news_contents.is_popular', '=', 1)
                                                           ->inRandomOrder()
                                                           ->limit(3)
                                                           ->get();
                                        if($popularContents){ foreach($popularContents as $popularContent){
                                        ?>
                                            <li>
                                                <img src="<?=env('UPLOADS_URL').'newcontent/'.$popularContent->cover_image?>" alt="<?=$popularContent->new_title?>">
                                                <div class="post-content">
                                                    <h2><a href="<?=url('content/' . $popularContent->slug)?>"><?=$popularContent->new_title?></a></h2>
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-clock-o"></i><?=date_format(date_create($popularContent->created_at), "d M Y")?></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        <?php } }?>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="option2">
                                    <ul class="list-posts">
                                        <?php
                                        $recentContents = NewsContent::join('news_category', 'news_contents.parent_category', '=', 'news_category.id')
                                                           ->select('news_contents.id', 'news_contents.new_title', 'news_contents.sub_title', 'news_contents.slug', 'news_contents.author_name', 'news_contents.cover_image', 'news_contents.created_at', 'news_category.sub_category as category_name', 'news_category.slug as category_slug')
                                                           ->where('news_contents.status', '=', 1)
                                                           ->orderBy('news_contents.id', 'DESC')
                                                           ->limit(3)
                                                           ->get();
                                        if($recentContents){ foreach($recentContents as $recentContent){
                                        ?>
                                            <li>
                                                <img src="<?=env('UPLOADS_URL').'newcontent/'.$recentContent->cover_image?>" alt="<?=$recentContent->new_title?>">
                                                <div class="post-content">
                                                    <h2><a href="<?=url('content/' . $recentContent->slug)?>"><?=$recentContent->new_title?></a></h2>
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-clock-o"></i><?=date_format(date_create($recentContent->created_at), "d M Y")?></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        <?php } }?>
                                    </ul>                                       
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End sidebar -->
                </div>
            </div>
        </div>
    </section>
    <!-- feature-video-section ================================================== -->
    <section class="feature-video">
        <div class="container">
            <div class="title-section white">
                <h1><span>Politics Original Videos</span></h1>
            </div>
            <div class="features-video-box owl-wrapper">
                <h2 style="color: white; text-align: center;">Coming Soon</h2>
                <!-- <div class="owl-carousel" data-num="4">
                
                    <div class="item news-post video-post">
                        <img alt="" src="<?=env('FRONT_ASSETS_URL')?>upload/news-posts/video1.jpg">
                        <a href="https://www.youtube.com/watch?v=LL59es7iy8Q" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                        <div class="hover-box">
                            <h2><a href="single-post.html">Lorem ipsum dolor sit consectetuer adipiscing elit. Donec odio. </a></h2>
                            <ul class="post-tags">
                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                            </ul>
                        </div>
                    </div>
                
                    <div class="item news-post video-post">
                        <img alt="" src="<?=env('FRONT_ASSETS_URL')?>upload/news-posts/video2.jpg">
                        <a href="https://www.youtube.com/watch?v=LL59es7iy8Q" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                        <div class="hover-box">
                            <h2><a href="single-post.html">Quisque volutpat mattis eros. </a></h2>
                            <ul class="post-tags">
                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                            </ul>
                        </div>
                    </div>
                
                    <div class="item news-post video-post">
                        <img alt="" src="<?=env('FRONT_ASSETS_URL')?>upload/news-posts/video3.jpg">
                        <a href="https://www.youtube.com/watch?v=LL59es7iy8Q" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                        <div class="hover-box">
                            <h2><a href="single-post.html">Nullam malesuada erat ut turpis. </a></h2>
                            <ul class="post-tags">
                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                            </ul>
                        </div>
                    </div>
                
                    <div class="item news-post video-post">
                        <img alt="" src="<?=env('FRONT_ASSETS_URL')?>upload/news-posts/video4.jpg">
                        <a href="https://www.youtube.com/watch?v=LL59es7iy8Q" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                        <div class="hover-box">
                            <h2><a href="single-post.html">Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</a></h2>
                            <ul class="post-tags">
                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                            </ul>
                        </div>
                    </div>
                
                    <div class="item news-post video-post">
                        <img alt="" src="<?=env('FRONT_ASSETS_URL')?>upload/news-posts/video1.jpg">
                        <a href="https://www.youtube.com/watch?v=LL59es7iy8Q" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                        <div class="hover-box">
                            <h2><a href="single-post.html">Lorem ipsum dolor sit consectetuer adipiscing elit. Donec odio. </a></h2>
                            <ul class="post-tags">
                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                            </ul>
                        </div>
                    </div>
                
                    <div class="item news-post video-post">
                        <img alt="" src="<?=env('FRONT_ASSETS_URL')?>upload/news-posts/video2.jpg">
                        <a href="https://www.youtube.com/watch?v=LL59es7iy8Q" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                        <div class="hover-box">
                            <h2><a href="single-post.html">Quisque volutpat mattis eros. </a></h2>
                            <ul class="post-tags">
                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                            </ul>
                        </div>
                    </div>
                
                    <div class="item news-post video-post">
                        <img alt="" src="<?=env('FRONT_ASSETS_URL')?>upload/news-posts/video3.jpg">
                        <a href="https://www.youtube.com/watch?v=LL59es7iy8Q" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                        <div class="hover-box">
                            <h2><a href="single-post.html">Nullam malesuada erat ut turpis. </a></h2>
                            <ul class="post-tags">
                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                            </ul>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- End feature-video-section -->
    <!-- block-wrapper-section
        ================================================== -->
    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8 content-blocker">
                    <!-- block content -->
                    <div class="block-content">
                        <!-- article box -->
                        <div class="article-box">
                            <div class="title-section">
                                <h1><span>Latest Articles</span></h1>
                            </div>
                            <?php
                            // DB::enableQueryLog(); // Enable query log
                            $recentContents = NewsContent::join('news_category', 'news_contents.parent_category', '=', 'news_category.id')
                                               ->select('news_contents.id', 'news_contents.new_title', 'news_contents.sub_title', 'news_contents.slug', 'news_contents.author_name', 'news_contents.indigenous_affiliation', 'news_contents.cover_image', 'news_contents.created_at', 'news_category.sub_category as category_name', 'news_category.slug as category_slug')
                                               ->where('news_contents.status', '=', 1)
                                               ->orderBy('news_contents.id', 'DESC')
                                               ->limit(6)
                                               ->get();
                                            //    dd(DB::getQueryLog());
                            if($recentContents){ foreach($recentContents as $recentContent){
                            ?>
                                <div class="news-post article-post">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="post-gallery">
                                                <img src="<?=env('UPLOADS_URL').'newcontent/'.$recentContent->cover_image?>" alt="<?=$recentContent->new_title?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="post-content">
                                                <a href="<?=url('category/' . $recentContent->category_slug)?>"><?=$recentContent->category_name?></a>
                                                <h2><a href="<?=url('content/' . $recentContent->slug)?>"><?=$recentContent->new_title?></a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?=$recentContent->author_name?></a></li>
                                                    <?php
                                                    if($recentContent->indigenous_affiliation != ''){                                                    
                                                     ?>
                                                    <li><i class="fa fa-map-marker"></i><a href="javascript:void(0);"><?=$recentContent->indigenous_affiliation?></a></li>
                                                <?php } ?>
                                                    <!-- <li><i class="fa fa-clock-o"></i><?=date_format(date_create($recentContent->created_at), "d M Y")?></li> -->
                                                    
                                                    <!-- <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                    <li><i class="fa fa-eye"></i>872</li> -->
                                                </ul>
                                                <p><?=$recentContent->sub_title?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } }?>
                        </div>
                    </div>
                    <!-- End block content -->
                </div>
                <?php if(session('success_message')){?>
                    <script type="text/javascript">
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: '<?=session('success_message')?>',
                            confirmButtonText: 'OK'
                        });
                    </script>
                <?php }?>
                <?php if(session('error_message')){?>
                    <script type="text/javascript">
                        Swal.fire({
                            icon: 'warning',
                            title: 'Warning!',
                            text: '<?=session('error_message')?>',
                            confirmButtonText: 'OK'
                        });
                    </script>
                <?php }?>
                <div class="col-md-3 col-sm-4 sidebar-sticky">
                    <!-- sidebar -->
                    <div class="sidebar large-sidebar theiaStickySidebar">
                        <div class="widget subscribe-widget">
                            <form class="subscribe-form" method="POST" action="">
                                <h1>Subscribe for latest content</h1>
                                @csrf
                                <input type="text" name="subscribe_email" id="subscribe_email" placeholder="Email" required />
                                <button id="submit-subscribe" type="submit"><i class="fa fa-arrow-circle-right"></i></button>
                                <p>Get all latest content delivered to your email a few times a month.</p>
                            </form>
                        </div>
                    </div>
                    <!-- End sidebar -->
                </div>
            </div>
        </div>
    </section>
    <!-- End block-wrapper-section -->
