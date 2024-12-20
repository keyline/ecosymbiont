<?php
use App\Models\NewsCategory;
use App\Models\NewsContent;
use App\Helpers\Helper;

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
$uri = $_SERVER['REQUEST_URI'];
$current_url = $protocol . $host . $uri;
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- heading-news-section2 ================================================== -->
    <section class="heading-news2">
        <div class="heading-news-box">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 pl-1 pr-1">
                        <div class="home_blog_left">
                            <?php
                                $parentCategoryContent1 = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id') // Join for parent category
                                                                        ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id') // Join for subcategory
                                                                        ->select(
                                                                            'news_contents.id', 
                                                                            'news_contents.new_title', 
                                                                            'news_contents.sub_title', 
                                                                            'news_contents.slug', 
                                                                            'news_contents.author_name', 
                                                                            'news_contents.cover_image', 
                                                                            'news_contents.created_at',
                                                                            'news_contents.media',
                                                                            'news_contents.videoId',
                                                                            'parent_category.sub_category as parent_category_name', // Corrected alias to sub_category
                                                                            'sub_category.sub_category as category_name', // Corrected alias to sub_category
                                                                            'sub_category.slug as category_slug', // Corrected alias to sub_category
                                                                            'parent_category.slug as parent_category_slug' // Corrected alias to sub_category
                                                                        )
                                                                        ->where('news_contents.status', 1) // Fetch only active content
                                                                        // ->where('news_contents.is_popular', 1) // Uncomment if you want to filter by popular content
                                                                        ->where('news_contents.parent_category', 1) // Parent category filter
                                                                        ->orderBy('news_contents.id', 'DESC') // Order by most recent
                                                                        ->first(); // Fetch single record
                                                                        //  Helper::pr($parentCategoryContent1);
                                if($parentCategoryContent1){
                                ?>
                                    <div class="news-post homesmall_box image-post default-size">
                                        <!-- <img src="<?=env('UPLOADS_URL').'newcontent/'.$parentCategoryContent1->cover_image?>" alt="<?=$parentCategoryContent1->new_title?>"> -->
                                        <?php if($parentCategoryContent1->media == 'image'){?>
                                            <!-- <div class="post-gallery"> -->
                                                <img src="<?=env('UPLOADS_URL').'newcontent/'.$parentCategoryContent1->cover_image?>" alt="<?=$parentCategoryContent1->new_title?>">
                                            <!-- </div> -->
                                        <?php } else {?>
                                            <div class="video-post">
                                                <img alt="" src="https://img.youtube.com/vi/<?=$parentCategoryContent1->videoId?>/hqdefault.jpg">
                                                <?php if(session('is_user_login')){?>
                                                    <a href="https://www.youtube.com/watch?v=<?=$parentCategoryContent1->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                <?php } else {?>
                                                    <a href="<?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                                <?php }?>
                                            </div>
                                        <?php } ?>
                                        <div class="hover-box">
                                            <div class="inner-hover">
                                                <a class="category-post" href="<?=url('category/' . $parentCategoryContent1->parent_category_slug)?>"><?=$parentCategoryContent1->parent_category_name?></a>
                                                <h2><a href="<?=url('content/' . $parentCategoryContent1->parent_category_slug. '/' . $parentCategoryContent1->category_slug . '/' . $parentCategoryContent1->slug)?>"><?=$parentCategoryContent1->new_title?></a></h2>
                                                <ul class="post-tags">
                                                    <!-- <li><i class="fa fa-clock-o"></i><span><?=date_format(date_create($parentCategoryContent1->created_at), "d M Y")?></span></li> -->
                                                    <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?=$parentCategoryContent1->author_name?></a></li>
                                                </ul>
                                                <p><?=$parentCategoryContent1->sub_title?></p>
                                            </div>
                                        </div>
                                    </div>
                            <?php }?>


                            <!--- box 2-->
                            <?php 
                            $parentCategoryContent8 = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id') // Join for parent category
                                                            ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id') // Join for subcategory
                                                            ->select(
                                                                'news_contents.id', 
                                                                'news_contents.new_title', 
                                                                'news_contents.sub_title', 
                                                                'news_contents.slug', 
                                                                'news_contents.author_name', 
                                                                'news_contents.cover_image', 
                                                                'news_contents.created_at',
                                                                'news_contents.media',
                                                                'news_contents.videoId',
                                                                'parent_category.sub_category as parent_category_name', // Corrected alias to sub_category
                                                                'sub_category.sub_category as category_name', // Corrected alias to sub_category
                                                                'sub_category.slug as category_slug', // Corrected alias to sub_category
                                                                'parent_category.slug as parent_category_slug' // Corrected alias to sub_category
                                                            )
                                                            ->where('news_contents.status', 1) // Fetch only active content
                                                            // ->where('news_contents.is_popular', 1) // Uncomment if you want to filter by popular content
                                                            ->where('news_contents.parent_category', 8) // Parent category filter
                                                            ->orderBy('news_contents.id', 'DESC') // Order by most recent
                                                            ->first(); // Fetch single record
                                
                                if($parentCategoryContent8){?>
                                    <div class="news-post homesmall_box image-post">
                                        <!-- <img src="<?=env('UPLOADS_URL').'newcontent/'.$parentCategoryContent8->cover_image?>" alt="<?=$parentCategoryContent8->new_title?>"> -->
                                        <?php if($parentCategoryContent8->media == 'image'){?>
                                            <!-- <div class="post-gallery"> -->
                                                <img src="<?=env('UPLOADS_URL').'newcontent/'.$parentCategoryContent8->cover_image?>" alt="<?=$parentCategoryContent8->new_title?>">
                                            <!-- </div> -->
                                        <?php } else {?>
                                            <div class="video-post">
                                                <img alt="" src="https://img.youtube.com/vi/<?=$parentCategoryContent8->videoId?>/hqdefault.jpg">
                                                <?php if(session('is_user_login')){?>
                                                    <a href="https://www.youtube.com/watch?v=<?=$parentCategoryContent8->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                <?php } else {?>
                                                    <a href="<?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                                <?php }?>
                                            </div>
                                        <?php } ?>
                                        <div class="hover-box">
                                            <div class="inner-hover">
                                                <a class="category-post" href="<?=url('category/' . $parentCategoryContent8->parent_category_slug)?>"><?=$parentCategoryContent8->parent_category_name?></a>
                                                <h2><a href="<?=url('content/' . $parentCategoryContent8->parent_category_slug. '/' . $parentCategoryContent8->category_slug . '/' . $parentCategoryContent8->slug)?>"><?=$parentCategoryContent8->new_title?></a></h2>
                                                <ul class="post-tags">
                                                    <!-- <li><i class="fa fa-clock-o"></i><span><?=date_format(date_create($parentCategoryContent8->created_at), "d M Y")?></span></li> -->
                                                    <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?=$parentCategoryContent8->author_name?></a></li>
                                                </ul>
                                                <p><?=$parentCategoryContent8->sub_title?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>



                        
                            <!--- box 2-->
                        </div>
                    </div>
                    <div class="col-md-6 pl-1 pr-1">
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
                                                                                'news_contents.media',
                                                                                'news_contents.videoId',
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
                                            <!-- <img src="<?=env('UPLOADS_URL').'newcontent/'.$parentCategoryContent3->cover_image?>" alt="<?=$parentCategoryContent3->new_title?>"> -->
                                            <?php if($parentCategoryContent3->media == 'image'){?>
                                                <!-- <div class="post-gallery"> -->
                                                    <img src="<?=env('UPLOADS_URL').'newcontent/'.$parentCategoryContent3->cover_image?>" alt="<?=$parentCategoryContent3->new_title?>">
                                                <!-- </div> -->
                                            <?php } else {?>
                                                <div class="video-post">
                                                    <img alt="" src="https://img.youtube.com/vi/<?=$parentCategoryContent3->videoId?>/hqdefault.jpg">
                                                    <?php if(session('is_user_login')){?>
                                                        <a href="https://www.youtube.com/watch?v=<?=$parentCategoryContent3->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                    <?php } else {?>
                                                        <a href="<?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                                    <?php }?>
                                                </div>
                                            <?php } ?>
                                            <div class="hover-box">
                                                <div class="inner-hover">
                                                    <a class="category-post" href="<?=url('category/' . $parentCategoryContent3->parent_category_slug)?>"><?=$parentCategoryContent3->parent_category_name?></a>
                                                    <a class="sub-category-post" href="<?=url('category/' . $parentCategoryContent3->parent_category_slug. '/' . $parentCategoryContent3->sub_category_slug)?>"><?=$parentCategoryContent3->sub_category_name?></a>
                                                    <h2><a href="<?=url('content/' . $parentCategoryContent3->parent_category_slug. '/' . $parentCategoryContent3->sub_category_slug. '/' . $parentCategoryContent3->slug)?>"><?=$parentCategoryContent3->new_title?></a></h2>
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
                    </div>
                    <div class="col-md-3 pl-1 pr-1">
                        <!--- box 4-->
                        <?php
                                $parentCategoryContent2 = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id') // Join for parent category
                                                            ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id') // Join for subcategory
                                                            ->select(
                                                                'news_contents.id', 
                                                                'news_contents.new_title', 
                                                                'news_contents.sub_title', 
                                                                'news_contents.slug', 
                                                                'news_contents.author_name', 
                                                                'news_contents.cover_image', 
                                                                'news_contents.created_at',
                                                                'news_contents.media',
                                                                'news_contents.videoId',
                                                                'parent_category.sub_category as parent_category_name', // Corrected alias to sub_category
                                                                'sub_category.sub_category as category_name', // Corrected alias to sub_category
                                                                'sub_category.slug as category_slug', // Corrected alias to sub_category
                                                                'parent_category.slug as parent_category_slug' // Corrected alias to sub_category
                                                            )
                                                            ->where('news_contents.status', 1) // Fetch only active content
                                                            // ->where('news_contents.is_popular', 1) // Uncomment if you want to filter by popular content
                                                            ->where('news_contents.parent_category', 2) // Parent category filter
                                                            ->orderBy('news_contents.id', 'DESC') // Order by most recent
                                                            ->first(); // Fetch single record
                            
                            if($parentCategoryContent2){
                                ?>
                                <div class="news-post homesmall_box image-post">
                                    <!-- <img src="<?=env('UPLOADS_URL').'newcontent/'.$parentCategoryContent2->cover_image?>" alt="<?=$parentCategoryContent2->new_title?>"> -->
                                    <?php if($parentCategoryContent2->media == 'image'){?>
                                        <!-- <div class="post-gallery"> -->
                                            <img src="<?=env('UPLOADS_URL').'newcontent/'.$parentCategoryContent2->cover_image?>" alt="<?=$parentCategoryContent2->new_title?>">
                                        <!-- </div> -->
                                    <?php } else {?>
                                        <div class="video-post">
                                            <img alt="" src="https://img.youtube.com/vi/<?=$parentCategoryContent2->videoId?>/hqdefault.jpg">
                                            <?php if(session('is_user_login')){?>
                                                <a href="https://www.youtube.com/watch?v=<?=$parentCategoryContent2->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                            <?php } else {?>
                                                <a href="<?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                            <?php }?>
                                        </div>
                                    <?php } ?>
                                    <div class="hover-box">
                                        <div class="inner-hover">
                                            <a class="category-post" href="<?=url('category/' . $parentCategoryContent2->parent_category_slug)?>"><?=$parentCategoryContent2->parent_category_name?></a>
                                            <h2><a href="<?=url('content/'. $parentCategoryContent2->parent_category_slug. '/' . $parentCategoryContent2->category_slug . '/' . $parentCategoryContent2->slug)?>"><?=$parentCategoryContent2->new_title?></a></h2>
                                            <ul class="post-tags">
                                                <!-- <li><i class="fa fa-clock-o"></i><span><?=date_format(date_create($parentCategoryContent2->created_at), "d M Y")?></span></li> -->
                                                <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?=$parentCategoryContent2->author_name?></a></li>
                                            </ul>
                                            <p><?=$parentCategoryContent2->sub_title?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                        <!--- box 4-->

                        <!--- box 5-->
                        <?php 
                            $parentCategoryContent9 = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id') // Join for parent category
                                                            ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id') // Join for subcategory
                                                            ->select(
                                                                'news_contents.id', 
                                                                'news_contents.new_title', 
                                                                'news_contents.sub_title', 
                                                                'news_contents.slug', 
                                                                'news_contents.author_name', 
                                                                'news_contents.cover_image', 
                                                                'news_contents.created_at',
                                                                'news_contents.media',
                                                                'news_contents.videoId',
                                                                'parent_category.sub_category as parent_category_name', // Corrected alias to sub_category
                                                                'sub_category.sub_category as category_name', // Corrected alias to sub_category
                                                                'sub_category.slug as category_slug', // Corrected alias to sub_category
                                                                'parent_category.slug as parent_category_slug' // Corrected alias to sub_category
                                                            )
                                                            ->where('news_contents.status', 1) // Fetch only active content
                                                            // ->where('news_contents.is_popular', 1) // Uncomment if you want to filter by popular content
                                                            ->where('news_contents.parent_category', 9) // Parent category filter
                                                            ->orderBy('news_contents.id', 'DESC') // Order by most recent
                                                            ->first(); // Fetch single record
                        ?>
                        <?php if($parentCategoryContent9){?>
                            <div class="news-post homesmall_box image-post">
                                <!-- <img src="<?=env('UPLOADS_URL').'newcontent/'.$parentCategoryContent9->cover_image?>" alt="<?=$parentCategoryContent9->new_title?>"> -->
                                <?php if($parentCategoryContent9->media == 'image'){?>
                                    <!-- <div class="post-gallery"> -->
                                        <img src="<?=env('UPLOADS_URL').'newcontent/'.$parentCategoryContent9->cover_image?>" alt="<?=$parentCategoryContent9->new_title?>">
                                    <!-- </div> -->
                                <?php } else {?>
                                    <div class="video-post">
                                        <img alt="" src="https://img.youtube.com/vi/<?=$parentCategoryContent9->videoId?>/hqdefault.jpg">
                                        <?php if(session('is_user_login')){?>
                                            <a href="https://www.youtube.com/watch?v=<?=$parentCategoryContent9->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                        <?php } else {?>
                                            <a href="<?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                        <?php }?>
                                    </div>
                                <?php } ?>
                                <div class="hover-box">
                                    <div class="inner-hover">
                                        <a class="category-post" href="<?=url('category/' . $parentCategoryContent9->parent_category_slug)?>"><?=$parentCategoryContent9->parent_category_name?></a>
                                        <h2><a href="<?=url('content/' . $parentCategoryContent9->parent_category_slug. '/' . $parentCategoryContent9->category_slug . '/' . $parentCategoryContent9->slug)?>"><?=$parentCategoryContent9->new_title?></a></h2>
                                        <ul class="post-tags">
                                            <!-- <li><i class="fa fa-clock-o"></i><span><?=date_format(date_create($parentCategoryContent9->created_at), "d M Y")?></span></li> -->
                                            <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?=$parentCategoryContent9->author_name?></a></li>
                                        </ul>
                                        <p><?=$parentCategoryContent9->sub_title?></p>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                        <!--- box 5-->
                    </div>
                </div>
                <!-- <div class="iso-call heading-news-box">
                </div> -->
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
                                    <ul class="list-posts home_feature_section">
                                        <?php
                                        $featuredContents = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id') // Join for parent category
                                                                        ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id') // Join for subcategory
                                                                        ->select(
                                                                            'news_contents.id', 
                                                                            'news_contents.new_title', 
                                                                            'news_contents.sub_title', 
                                                                            'news_contents.slug', 
                                                                            'news_contents.author_name', 
                                                                            'news_contents.cover_image', 
                                                                            'news_contents.created_at',
                                                                            'news_contents.media',
                                                                            'news_contents.videoId',
                                                                            'sub_category.sub_category as category_name',  // Correct alias for subcategory name
                                                                            'sub_category.slug as category_slug',  // Correct alias for subcategory slug                                                                            
                                                                            'parent_category.slug as parent_category_slug' // Corrected alias to sub_category
                                                                        )
                                                                        ->where('news_contents.status', 1)  // Fetch only active content
                                                                        ->where('news_contents.is_feature', 1)  // Fetch only featured content
                                                                        ->inRandomOrder()  // Randomize the result order
                                                                        ->limit(3)  // Limit to 3 records
                                                                        ->get();
                                        if($featuredContents){ foreach($featuredContents as $featuredContent){
                                        ?>
                                        <li style="display: flex;">
                                            <!-- <img src="<?=env('UPLOADS_URL').'newcontent/'.$featuredContent->cover_image?>" alt="<?=$featuredContent->new_title?>"> -->
                                            <?php if($featuredContent->media == 'image'){?>
                                                <!-- <div class="post-gallery"> -->
                                                    <img src="<?=env('UPLOADS_URL').'newcontent/'.$featuredContent->cover_image?>" alt="<?=$featuredContent->new_title?>">
                                                    <!-- <span class="image-caption" style="color:skyblue;"><?=$featuredContent->cover_image_caption?></span> -->
                                                <!-- </div> -->
                                            <?php } else {?>
                                                <div class="video-post">
                                                    <div class="video-holder">
                                                        <img alt="" src="https://img.youtube.com/vi/<?=$featuredContent->videoId?>/hqdefault.jpg">
                                                        <?php if(session('is_user_login')){?>
                                                            <a href="https://www.youtube.com/watch?v=<?=$featuredContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                        <?php } else {?>
                                                            <a href="<?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="post-content">
                                                <h2><a href="<?=url('content/' . $featuredContent->parent_category_slug. '/' . $featuredContent->category_slug . '/' . $featuredContent->slug)?>"><?=$featuredContent->new_title?></a></h2>
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
                                $featuredContents = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id') // Join for parent category
                                                                ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id') // Join for subcategory
                                                                ->select(
                                                                    'news_contents.id', 
                                                                    'news_contents.new_title', 
                                                                    'news_contents.sub_title', 
                                                                    'news_contents.slug', 
                                                                    'news_contents.author_name', 
                                                                    'news_contents.cover_image', 
                                                                    'news_contents.created_at',
                                                                    'news_contents.media',
                                                                    'news_contents.videoId',
                                                                    'sub_category.sub_category as category_name',  // Correct alias for subcategory name
                                                                    'sub_category.slug as category_slug',  // Correct alias for subcategory slug                                                                            
                                                                    'parent_category.slug as parent_category_slug' // Corrected alias to sub_category
                                                                )
                                                                ->where('news_contents.status', 1)  // Fetch only active content
                                                                ->where('news_contents.is_hot', 1)  // Fetch only featured content
                                                                ->inRandomOrder()  // Randomize the result order
                                                                ->limit(3)  // Limit to 3 records
                                                                ->get();
                                if($featuredContents){ foreach($featuredContents as $featuredContent){
                                ?>
                                    <li>
                                        <?php if($featuredContent->media == 'image'){?>
                                            <!-- <div class="post-gallery"> -->
                                                <img src="<?=env('UPLOADS_URL').'newcontent/'.$featuredContent->cover_image?>" alt="<?=$featuredContent->new_title?>">
                                            <!-- </div> -->
                                        <?php } else {?>
                                            <div class="video-post">
                                                <img alt="" src="https://img.youtube.com/vi/<?=$featuredContent->videoId?>/hqdefault.jpg">
                                                <?php if(session('is_user_login')){?>
                                                    <a href="https://www.youtube.com/watch?v=<?=$featuredContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                <?php } else {?>
                                                    <a href="<?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                                <?php }?>
                                            </div>
                                        <?php } ?>
                                        <div class="post-content">
                                            <h2><a href="<?=url('content/' . $featuredContent->parent_category_slug. '/' . $featuredContent->category_slug . '/' . $featuredContent->slug)?>"><?=$featuredContent->new_title?></a></h2>
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
                                        $popularContents = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id') // Join for parent category
                                                            ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id') // Join for subcategory
                                                            ->select(
                                                                'news_contents.id', 
                                                                'news_contents.new_title', 
                                                                'news_contents.sub_title', 
                                                                'news_contents.slug', 
                                                                'news_contents.author_name', 
                                                                'news_contents.cover_image', 
                                                                'news_contents.created_at',
                                                                'news_contents.media',
                                                                'news_contents.videoId',
                                                                'sub_category.sub_category as category_name',  // Correct alias for subcategory name
                                                                'sub_category.slug as category_slug',  // Correct alias for subcategory slug
                                                                'parent_category.slug as parent_category_slug' // Corrected alias to sub_category
                                                            )
                                                            ->where('news_contents.status', 1)  // Fetch only active content
                                                            ->where('news_contents.is_popular', 1)  // Fetch only featured content
                                                            ->inRandomOrder()  // Randomize the result order
                                                            ->limit(3)  // Limit to 3 records
                                                            ->get();
                                        if($popularContents){ foreach($popularContents as $popularContent){
                                        ?>
                                            <li>
                                                <?php if($popularContent->media == 'image'){?>
                                                    <!-- <div class="post-gallery"> -->
                                                        <img src="<?=env('UPLOADS_URL').'newcontent/'.$popularContent->cover_image?>" alt="<?=$popularContent->new_title?>">
                                                    <!-- </div> -->
                                                <?php } else {?>
                                                    <div class="video-post">
                                                        <img alt="" src="https://img.youtube.com/vi/<?=$popularContent->videoId?>/hqdefault.jpg">
                                                        <?php if(session('is_user_login')){?>
                                                            <a href="https://www.youtube.com/watch?v=<?=$popularContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                        <?php } else {?>
                                                            <a href="<?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                                        <?php }?>
                                                    </div>
                                                <?php } ?>
                                                <div class="post-content">
                                                    <h2><a href="<?=url('content/'. $popularContent->parent_category_slug. '/' . $popularContent->category_slug . '/' .  $popularContent->slug)?>"><?=$popularContent->new_title?></a></h2>
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
                                        $recentContents = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id') // Join for parent category
                                                                        ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id') // Join for subcategory
                                                                        ->select(
                                                                            'news_contents.id', 
                                                                            'news_contents.new_title', 
                                                                            'news_contents.sub_title', 
                                                                            'news_contents.slug', 
                                                                            'news_contents.author_name', 
                                                                            'news_contents.cover_image', 
                                                                            'news_contents.created_at',
                                                                            'news_contents.media',
                                                                            'news_contents.videoId',
                                                                            'sub_category.sub_category as category_name',  // Correct alias for subcategory name
                                                                            'sub_category.slug as category_slug',  // Correct alias for subcategory slug
                                                                            'parent_category.slug as parent_category_slug' // Corrected alias to sub_category
                                                                        )
                                                                        ->where('news_contents.status', 1)  // Fetch only active content                                                                        
                                                                        ->inRandomOrder()  // Randomize the result order
                                                                        ->limit(3)  // Limit to 3 records
                                                                        ->get();
                                        if($recentContents){ foreach($recentContents as $recentContent){
                                        ?>
                                            <li>
                                                <?php if($recentContent->media == 'image'){?>
                                                    <!-- <div class="post-gallery"> -->
                                                        <img src="<?=env('UPLOADS_URL').'newcontent/'.$recentContent->cover_image?>" alt="<?=$recentContent->new_title?>">
                                                    <!-- </div> -->
                                                <?php } else {?>
                                                    <div class="video-post">
                                                        <img alt="" src="https://img.youtube.com/vi/<?=$recentContent->videoId?>/hqdefault.jpg">
                                                        <?php if(session('is_user_login')){?>
                                                            <a href="https://www.youtube.com/watch?v=<?=$recentContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                        <?php } else {?>
                                                            <a href="<?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                                        <?php }?>
                                                    </div>
                                                <?php } ?>
                                                <div class="post-content">
                                                    <h2><a href="<?=url('content/' . $recentContent->parent_category_slug. '/' . $recentContent->category_slug . '/' .  $recentContent->slug)?>"><?=$recentContent->new_title?></a></h2>
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
                <h1><span>Video Content</span></h1>
            </div>
            <div class="features-video-box owl-wrapper">
                <!-- <h2 style="color: white; text-align: center;">Coming Soon</h2> -->
                <div class="owl-carousel" data-num="2">
                    <?php
                    $videoContents = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id')
                                                    ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id')
                                                    ->select(
                                                        'news_contents.id', 
                                                        'news_contents.new_title', 
                                                        'news_contents.sub_title', 
                                                        'news_contents.slug', 
                                                        'news_contents.author_name', 
                                                        'news_contents.cover_image', 
                                                        'news_contents.created_at',
                                                        'news_contents.videoId',
                                                        'parent_category.sub_category as parent_category_name',
                                                        'sub_category.sub_category as category_name',
                                                        'sub_category.slug as category_slug',
                                                        'parent_category.slug as parent_category_slug'
                                                    )
                                                    ->where('news_contents.status', 1)
                                                    ->where('news_contents.media', 'video')
                                                    ->inRandomOrder()
                                                    ->limit(8)
                                                    ->get();
                    if($videoContents){ foreach($videoContents as $videoContent){
                    ?>
                        <div class="item news-post video-post">
                            <img alt="" src="https://img.youtube.com/vi/<?=$videoContent->videoId?>/hqdefault.jpg">
                            <?php if(session('is_user_login')){?>
                                <a href="https://www.youtube.com/watch?v=<?=$videoContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                            <?php } else {?>
                                <a href="<?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                            <?php }?>
                            <div class="hover-box">
                                <a href="<?=url('category/' . $videoContent->parent_category_slug)?>"><?=$videoContent->parent_category_name?></a>
                                <h2><a href="<?=url('content/' . $videoContent->parent_category_slug. '/' . $videoContent->category_slug . '/' . $videoContent->slug)?>"><?=$videoContent->new_title?></a></h2>
                                <ul class="post-tags">
                                    <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?=$videoContent->author_name?></a></li>
                                    <?php if($videoContent->indigenous_affiliation != ''){ ?>
                                        <li><i class="fa fa-map-marker"></i><a href="javascript:void(0);"><?=$videoContent->indigenous_affiliation?></a></li>
                                    <?php } ?>
                                    <li><i class="fa fa-clock-o"></i><?=date_format(date_create($videoContent->created_at), "d M Y")?></li>
                                </ul>
                                <!-- <p><?=$videoContent->sub_title?></p> -->
                            </div>
                        </div>
                    <?php } }?>
                </div>
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
                            $recentContents = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id') // Join for parent category
                                                            ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id') // Join for subcategory
                                                            ->select(
                                                                'news_contents.id', 
                                                                'news_contents.new_title', 
                                                                'news_contents.sub_title', 
                                                                'news_contents.slug', 
                                                                'news_contents.author_name', 
                                                                'news_contents.cover_image', 
                                                                'news_contents.created_at',
                                                                'news_contents.media',
                                                                'news_contents.videoId',
                                                                'parent_category.sub_category as parent_category_name', // Corrected alias to sub_category
                                                                'sub_category.sub_category as category_name',  // Correct alias for subcategory name
                                                                'sub_category.slug as category_slug',  // Correct alias for subcategory slug
                                                                'parent_category.slug as parent_category_slug' // Corrected alias to sub_category
                                                            )
                                                            ->where('news_contents.status', 1)  // Fetch only active content
                                                            ->where('news_contents.is_feature', 1)  // Fetch only featured content
                                                            ->inRandomOrder()  // Randomize the result order
                                                            ->limit(6)  // Limit to 3 records
                                                            ->get();
                                            //    dd(DB::getQueryLog());
                            if($recentContents){ foreach($recentContents as $recentContent){
                            ?>
                                <div class="news-post article-post">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <!-- <div class="post-gallery">
                                                <img src="<?=env('UPLOADS_URL').'newcontent/'.$recentContent->cover_image?>" alt="<?=$recentContent->new_title?>">
                                            </div> -->
                                            <?php if($recentContent->media == 'image'){?>
                                                <div class="post-gallery">
                                                    <img src="<?=env('UPLOADS_URL').'newcontent/'.$recentContent->cover_image?>" alt="<?=$recentContent->new_title?>">
                                                    <span class="image-caption" style="color:skyblue;"><?=$recentContent->cover_image_caption?></span>
                                                </div>
                                            <?php } else {?>
                                                <div class="post-gallery video-post">
                                                    <img alt="" src="https://img.youtube.com/vi/<?=$recentContent->videoId?>/hqdefault.jpg">
                                                    <?php if(session('is_user_login')){?>
                                                        <a href="https://www.youtube.com/watch?v=<?=$recentContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                    <?php } else {?>
                                                        <a href="<?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                                    <?php }?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="post-content">
                                                <a href="<?=url('category/' . $recentContent->parent_category_slug)?>"><?=$recentContent->parent_category_name?></a>
                                                <h2><a href="<?=url('content/' . $recentContent->parent_category_slug. '/' . $recentContent->category_slug . '/' . $recentContent->slug)?>"><?=$recentContent->new_title?></a></h2>
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
