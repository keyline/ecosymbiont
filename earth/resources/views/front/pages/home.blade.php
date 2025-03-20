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
                            <!-- ACTION -->
                            <?php
                            $parentCategoryContent1 = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id')
                                                    ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id')
                                                    ->select(
                                                        'news_contents.id', 
                                                        'news_contents.new_title', 
                                                        'news_contents.sub_title', 
                                                        'news_contents.slug', 
                                                        'news_contents.author_name', 
                                                        'news_contents.for_publication_name', 
                                                        'news_contents.cover_image', 
                                                        'news_contents.created_at',
                                                        'news_contents.media',
                                                        'news_contents.videoId',
                                                        'news_contents.is_series',
                                                        'news_contents.series_article_no',
                                                        'news_contents.current_article_no',
                                                        'news_contents.other_article_part_doi_no',
                                                        'parent_category.sub_category as parent_category_name',
                                                        'sub_category.sub_category as category_name',
                                                        'sub_category.slug as category_slug',
                                                        'parent_category.slug as parent_category_slug'
                                                    )
                                                    ->where('news_contents.status', 1)
                                                    ->where('news_contents.parent_category', 1)
                                                    ->orderBy('news_contents.id', 'DESC')
                                                    ->first();
                            if($parentCategoryContent1){
                            ?>
                                <?php
                                $is_series                  = $parentCategoryContent1->is_series;
                                $series_article_no          = $parentCategoryContent1->series_article_no;
                                $current_article_no         = $parentCategoryContent1->current_article_no;
                                $other_article_part_doi_no  = explode(",", $parentCategoryContent1->other_article_part_doi_no);
                                if($is_series == 'Yes'){
                                    if($current_article_no == 1){
                                        $isShow = true;
                                    } else {
                                        $parentCategoryContent1 = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id')
                                                        ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id')
                                                        ->select(
                                                            'news_contents.id', 
                                                            'news_contents.new_title', 
                                                            'news_contents.sub_title', 
                                                            'news_contents.slug', 
                                                            'news_contents.author_name', 
                                                            'news_contents.for_publication_name', 
                                                            'news_contents.cover_image', 
                                                            'news_contents.created_at',
                                                            'news_contents.media',
                                                            'news_contents.videoId',
                                                            'news_contents.is_series',
                                                            'news_contents.series_article_no',
                                                            'news_contents.current_article_no',
                                                            'news_contents.other_article_part_doi_no',
                                                            'parent_category.sub_category as parent_category_name',
                                                            'sub_category.sub_category as category_name',
                                                            'sub_category.slug as category_slug',
                                                            'parent_category.slug as parent_category_slug'
                                                        )
                                                        ->where('news_contents.status', 1)
                                                        ->where('news_contents.parent_category', 1)
                                                        ->where('news_contents.is_series', 'Yes')
                                                        ->where('news_contents.current_article_no', 1)
                                                        ->orderBy('news_contents.id', 'DESC')
                                                        ->first();
                                        
                                        $isShow = true;
                                    }
                                } else {
                                    $isShow = true;
                                }
                                if($isShow){
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
                                                <!-- <?php if(session('is_user_login')){?>
                                                    <a href="https://www.youtube.com/watch?v=<?=$parentCategoryContent1->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                <?php } else {?>
                                                    <a href="<?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                                <?php }?> -->
                                                <a href="https://www.youtube.com/watch?v=<?=$parentCategoryContent1->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                            </div>
                                        <?php } ?>
                                        <div class="hover-box">
                                            <div class="inner-hover">
                                                <a class="category-post" href="<?=url('category/' . $parentCategoryContent1->parent_category_slug)?>"><?=$parentCategoryContent1->parent_category_name?></a>
                                                <h2><a href="<?=url('content/' . $parentCategoryContent1->parent_category_slug. '/' . $parentCategoryContent1->category_slug . '/' . $parentCategoryContent1->slug)?>"><?=$parentCategoryContent1->new_title?></a></h2>
                                                <ul class="post-tags">
                                                    <!-- <li><i class="fa fa-clock-o"></i><span><?=date_format(date_create($parentCategoryContent1->created_at), "d M Y")?></span></li> -->
                                                    <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?=$parentCategoryContent1->for_publication_name ?? $parentCategoryContent1->author_name?></a></li>
                                                </ul>
                                                <p><?=$parentCategoryContent1->sub_title?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                            <?php }?>
                            <!-- ACTION -->
                            <!-- REGENERATIVE -->
                            <?php
                            $parentCategoryContent8 = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id')
                                                    ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id')
                                                    ->select(
                                                        'news_contents.id', 
                                                        'news_contents.new_title', 
                                                        'news_contents.sub_title', 
                                                        'news_contents.slug', 
                                                        'news_contents.author_name', 
                                                        'news_contents.for_publication_name', 
                                                        'news_contents.cover_image', 
                                                        'news_contents.created_at',
                                                        'news_contents.media',
                                                        'news_contents.videoId',
                                                        'news_contents.is_series',
                                                        'news_contents.series_article_no',
                                                        'news_contents.current_article_no',
                                                        'news_contents.other_article_part_doi_no',
                                                        'parent_category.sub_category as parent_category_name',
                                                        'sub_category.sub_category as category_name',
                                                        'sub_category.slug as category_slug',
                                                        'parent_category.slug as parent_category_slug'
                                                    )
                                                    ->where('news_contents.status', 1)
                                                    ->where('news_contents.parent_category', 8)
                                                    ->orderBy('news_contents.id', 'DESC')
                                                    ->first();
                                
                            if($parentCategoryContent8){?>
                                <?php
                                $is_series                  = $parentCategoryContent8->is_series;
                                $series_article_no          = $parentCategoryContent8->series_article_no;
                                $current_article_no         = $parentCategoryContent8->current_article_no;
                                $other_article_part_doi_no  = explode(",", $parentCategoryContent8->other_article_part_doi_no);
                                if($is_series == 'Yes'){
                                    if($current_article_no == 1){
                                        $isShow = true;
                                    } else {
                                        $parentCategoryContent8 = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id')
                                                        ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id')
                                                        ->select(
                                                            'news_contents.id', 
                                                            'news_contents.new_title', 
                                                            'news_contents.sub_title', 
                                                            'news_contents.slug', 
                                                            'news_contents.author_name', 
                                                            'news_contents.for_publication_name', 
                                                            'news_contents.cover_image', 
                                                            'news_contents.created_at',
                                                            'news_contents.media',
                                                            'news_contents.videoId',
                                                            'news_contents.is_series',
                                                            'news_contents.series_article_no',
                                                            'news_contents.current_article_no',
                                                            'news_contents.other_article_part_doi_no',
                                                            'parent_category.sub_category as parent_category_name',
                                                            'sub_category.sub_category as category_name',
                                                            'sub_category.slug as category_slug',
                                                            'parent_category.slug as parent_category_slug'
                                                        )
                                                        ->where('news_contents.status', 1)
                                                        ->where('news_contents.parent_category', 8)
                                                        ->where('news_contents.is_series', 'Yes')
                                                        ->where('news_contents.current_article_no', 1)
                                                        ->orderBy('news_contents.id', 'DESC')
                                                        ->first();

                                        $isShow = true;
                                    }
                                } else {
                                    $isShow = true;
                                }
                                if($isShow){
                                ?>
                                    <div class="news-post homesmall_box image-post">
                                        <!-- <img src="<?=env('UPLOADS_URL').'newcontent/'.$parentCategoryContent8->cover_image?>" alt="<?=$parentCategoryContent8->new_title?>"> -->
                                        <?php if($parentCategoryContent8->media == 'image'){?>
                                            <!-- <div class="post-gallery"> -->
                                                <img src="<?=env('UPLOADS_URL').'newcontent/'.$parentCategoryContent8->cover_image?>" alt="<?=$parentCategoryContent8->new_title?>">
                                            <!-- </div> -->
                                        <?php } else {?>
                                            <div class="video-post">
                                                <img alt="" src="https://img.youtube.com/vi/<?=$parentCategoryContent8->videoId?>/hqdefault.jpg">
                                                <!-- <?php if(session('is_user_login')){?>
                                                    <a href="https://www.youtube.com/watch?v=<?=$parentCategoryContent8->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                <?php } else {?>
                                                    <a href="<?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                                <?php }?> -->
                                                <a href="https://www.youtube.com/watch?v=<?=$parentCategoryContent8->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                            </div>
                                        <?php } ?>
                                        <div class="hover-box">
                                            <div class="inner-hover">
                                                <a class="category-post" href="<?=url('category/' . $parentCategoryContent8->parent_category_slug)?>"><?=$parentCategoryContent8->parent_category_name?></a>
                                                <h2><a href="<?=url('content/' . $parentCategoryContent8->parent_category_slug. '/' . $parentCategoryContent8->category_slug . '/' . $parentCategoryContent8->slug)?>"><?=$parentCategoryContent8->new_title?></a></h2>
                                                <ul class="post-tags">
                                                    <!-- <li><i class="fa fa-clock-o"></i><span><?=date_format(date_create($parentCategoryContent8->created_at), "d M Y")?></span></li> -->
                                                    <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?=$parentCategoryContent8->for_publication_name ?? $parentCategoryContent8->author_name?></a></li>
                                                </ul>
                                                <p><?=$parentCategoryContent8->sub_title?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                            <?php }?>
                            <!-- REGENERATIVE -->
                        </div>
                    </div>
                    <div class="col-md-6 pl-1 pr-1">
                        <div class="image-slider snd-size">
                            <span class="top-stories">TOP STORIES</span>
                            <ul class="bxslider">
                                <?php
                                $parentCategoryContents3 = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id') // Join for parent category
                                                                        ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id') // Join for subcategory
                                                                        ->select('news_contents.id', 
                                                                                'news_contents.new_title', 
                                                                                'news_contents.sub_title', 
                                                                                'news_contents.slug', 
                                                                                'news_contents.author_name', 
                                                                                'news_contents.for_publication_name', 
                                                                                'news_contents.cover_image', 
                                                                                'news_contents.created_at',
                                                                                'news_contents.media',
                                                                                'news_contents.videoId',
                                                                                'news_contents.is_series',
                                                                                'news_contents.series_article_no',
                                                                                'news_contents.current_article_no',
                                                                                'news_contents.other_article_part_doi_no',
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
                                    <?php
                                    $is_series                  = $parentCategoryContent3->is_series;
                                    $series_article_no          = $parentCategoryContent3->series_article_no;
                                    $current_article_no         = $parentCategoryContent3->current_article_no;
                                    $other_article_part_doi_no  = explode(",", $parentCategoryContent3->other_article_part_doi_no);
                                    if($is_series == 'Yes'){
                                        if($current_article_no == 1){
                                            $isShow = true;
                                        } else {
                                            $isShow = false;
                                        }
                                    } else {
                                        $isShow = true;
                                    }
                                    if($isShow){
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
                                                        <!-- <?php if(session('is_user_login')){?>
                                                            <a href="https://www.youtube.com/watch?v=<?=$parentCategoryContent3->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                        <?php } else {?>
                                                            <a href="<?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                                        <?php }?> -->
                                                        <a href="https://www.youtube.com/watch?v=<?=$parentCategoryContent3->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                    </div>
                                                <?php } ?>
                                                <div class="hover-box">
                                                    <div class="inner-hover">
                                                        <a class="category-post" href="<?=url('category/' . $parentCategoryContent3->parent_category_slug)?>"><?=$parentCategoryContent3->parent_category_name?></a>
                                                        <a class="sub-category-post" href="<?=url('category/' . $parentCategoryContent3->parent_category_slug. '/' . $parentCategoryContent3->sub_category_slug)?>"><?=$parentCategoryContent3->sub_category_name?></a>
                                                        <h2><a href="<?=url('content/' . $parentCategoryContent3->parent_category_slug. '/' . $parentCategoryContent3->sub_category_slug. '/' . $parentCategoryContent3->slug)?>"><?=$parentCategoryContent3->new_title?></a></h2>
                                                        <ul class="post-tags">
                                                            <li><i class="fa fa-clock-o"></i><?=date_format(date_create($parentCategoryContent3->created_at), "d M Y")?></li>
                                                            <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?=$parentCategoryContent3->for_publication_name ?? $parentCategoryContent3->author_name?></a></li>                                                
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php }?>
                                <?php } }?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 pl-1 pr-1">
                        <!-- WELLBEING -->
                        <?php
                        $parentCategoryContent2 = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id')
                                                    ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id')
                                                    ->select(
                                                        'news_contents.id', 
                                                        'news_contents.new_title', 
                                                        'news_contents.sub_title', 
                                                        'news_contents.slug', 
                                                        'news_contents.author_name', 
                                                        'news_contents.for_publication_name', 
                                                        'news_contents.cover_image', 
                                                        'news_contents.created_at',
                                                        'news_contents.media',
                                                        'news_contents.videoId',
                                                        'news_contents.is_series',
                                                        'news_contents.series_article_no',
                                                        'news_contents.current_article_no',
                                                        'news_contents.other_article_part_doi_no',
                                                        'parent_category.sub_category as parent_category_name',
                                                        'sub_category.sub_category as category_name',
                                                        'sub_category.slug as category_slug',
                                                        'parent_category.slug as parent_category_slug'
                                                    )
                                                    ->where('news_contents.status', 1)
                                                    ->where('news_contents.parent_category', 2)
                                                    ->orderBy('news_contents.id', 'DESC')
                                                    ->first();
                    
                        if($parentCategoryContent2){
                        ?>
                            <?php
                            $is_series                  = $parentCategoryContent2->is_series;
                            $series_article_no          = $parentCategoryContent2->series_article_no;
                            $current_article_no         = $parentCategoryContent2->current_article_no;
                            $other_article_part_doi_no  = explode(",", $parentCategoryContent2->other_article_part_doi_no);
                            if($is_series == 'Yes'){
                                if($current_article_no == 1){
                                    $isShow = true;
                                } else {
                                    $parentCategoryContent2 = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id')
                                                        ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id')
                                                        ->select(
                                                            'news_contents.id', 
                                                            'news_contents.new_title', 
                                                            'news_contents.sub_title', 
                                                            'news_contents.slug', 
                                                            'news_contents.author_name', 
                                                            'news_contents.for_publication_name', 
                                                            'news_contents.cover_image', 
                                                            'news_contents.created_at',
                                                            'news_contents.media',
                                                            'news_contents.videoId',
                                                            'news_contents.is_series',
                                                            'news_contents.series_article_no',
                                                            'news_contents.current_article_no',
                                                            'news_contents.other_article_part_doi_no',
                                                            'parent_category.sub_category as parent_category_name',
                                                            'sub_category.sub_category as category_name',
                                                            'sub_category.slug as category_slug',
                                                            'parent_category.slug as parent_category_slug'
                                                        )
                                                        ->where('news_contents.status', 1)
                                                        ->where('news_contents.parent_category', 2)
                                                        ->where('news_contents.is_series', 'Yes')
                                                        ->where('news_contents.current_article_no', 1)
                                                        ->orderBy('news_contents.id', 'DESC')
                                                        ->first();
                                        
                                    $isShow = true;
                                }
                            } else {
                                $isShow = true;
                            }
                            if($isShow){
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
                                            <!-- <?php if(session('is_user_login')){?>
                                                <a href="https://www.youtube.com/watch?v=<?=$parentCategoryContent2->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                            <?php } else {?>
                                                <a href="<?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                            <?php }?> -->
                                            <a href="https://www.youtube.com/watch?v=<?=$parentCategoryContent2->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                        </div>
                                    <?php } ?>
                                    <div class="hover-box">
                                        <div class="inner-hover">
                                            <a class="category-post" href="<?=url('category/' . $parentCategoryContent2->parent_category_slug)?>"><?=$parentCategoryContent2->parent_category_name?></a>
                                            <h2><a href="<?=url('content/'. $parentCategoryContent2->parent_category_slug. '/' . $parentCategoryContent2->category_slug . '/' . $parentCategoryContent2->slug)?>"><?=$parentCategoryContent2->new_title?></a></h2>
                                            <ul class="post-tags">
                                                <!-- <li><i class="fa fa-clock-o"></i><span><?=date_format(date_create($parentCategoryContent2->created_at), "d M Y")?></span></li> -->
                                                <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?=$parentCategoryContent2->for_publication_name ?? $parentCategoryContent2->author_name?></a></li>
                                            </ul>
                                            <p><?=$parentCategoryContent2->sub_title?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                        <?php }?>
                        <!-- WELLBEING -->
                        <!-- SYSTEMS -->
                        <?php
                        $parentCategoryContent9 = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id')
                                                ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id')
                                                ->select(
                                                    'news_contents.id', 
                                                    'news_contents.new_title', 
                                                    'news_contents.sub_title', 
                                                    'news_contents.slug', 
                                                    'news_contents.author_name', 
                                                    'news_contents.for_publication_name', 
                                                    'news_contents.cover_image', 
                                                    'news_contents.created_at',
                                                    'news_contents.media',
                                                    'news_contents.videoId',
                                                    'news_contents.is_series',
                                                    'news_contents.series_article_no',
                                                    'news_contents.current_article_no',
                                                    'news_contents.other_article_part_doi_no',
                                                    'parent_category.sub_category as parent_category_name',
                                                    'sub_category.sub_category as category_name',
                                                    'sub_category.slug as category_slug',
                                                    'parent_category.slug as parent_category_slug'
                                                )
                                                ->where('news_contents.status', 1)
                                                ->where('news_contents.parent_category', 9)
                                                ->orderBy('news_contents.id', 'DESC')
                                                ->first();
                        ?>
                        <?php if($parentCategoryContent9){?>
                            <?php
                            $is_series                  = $parentCategoryContent9->is_series;
                            $series_article_no          = $parentCategoryContent9->series_article_no;
                            $current_article_no         = $parentCategoryContent9->current_article_no;
                            $other_article_part_doi_no  = explode(",", $parentCategoryContent9->other_article_part_doi_no);
                            if($is_series == 'Yes'){
                                if($current_article_no == 1){
                                    $isShow = true;
                                } else {
                                    $parentCategoryContent9 = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id')
                                        ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id')
                                        ->select(
                                            'news_contents.id', 
                                            'news_contents.new_title', 
                                            'news_contents.sub_title', 
                                            'news_contents.slug', 
                                            'news_contents.author_name', 
                                            'news_contents.for_publication_name', 
                                            'news_contents.cover_image', 
                                            'news_contents.created_at',
                                            'news_contents.media',
                                            'news_contents.videoId',
                                            'news_contents.is_series',
                                            'news_contents.series_article_no',
                                            'news_contents.current_article_no',
                                            'news_contents.other_article_part_doi_no',
                                            'parent_category.sub_category as parent_category_name',
                                            'sub_category.sub_category as category_name',
                                            'sub_category.slug as category_slug',
                                            'parent_category.slug as parent_category_slug'
                                        )
                                        ->where('news_contents.status', 1)
                                        ->where('news_contents.parent_category', 9)
                                        ->where('news_contents.is_series', 'Yes')
                                        ->where('news_contents.current_article_no', 1)
                                        ->orderBy('news_contents.id', 'DESC')
                                        ->first();
                                    
                                    $isShow = true;
                                }
                            } else {
                                $isShow = true;
                            }
                            if($isShow){
                            ?>
                                <div class="news-post homesmall_box image-post">
                                    <!-- <img src="<?=env('UPLOADS_URL').'newcontent/'.$parentCategoryContent9->cover_image?>" alt="<?=$parentCategoryContent9->new_title?>"> -->
                                    <?php if($parentCategoryContent9->media == 'image'){?>
                                        <!-- <div class="post-gallery"> -->
                                            <img src="<?=env('UPLOADS_URL').'newcontent/'.$parentCategoryContent9->cover_image?>" alt="<?=$parentCategoryContent9->new_title?>">
                                        <!-- </div> -->
                                    <?php } else {?>
                                        <div class="video-post">
                                            <img alt="" src="https://img.youtube.com/vi/<?=$parentCategoryContent9->videoId?>/hqdefault.jpg">
                                            <!-- <?php if(session('is_user_login')){?>
                                                <a href="https://www.youtube.com/watch?v=<?=$parentCategoryContent9->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                            <?php } else {?>
                                                <a href="<?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                            <?php }?> -->
                                            <a href="https://www.youtube.com/watch?v=<?=$parentCategoryContent9->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                        </div>
                                    <?php } ?>
                                    <div class="hover-box">
                                        <div class="inner-hover">
                                            <a class="category-post" href="<?=url('category/' . $parentCategoryContent9->parent_category_slug)?>"><?=$parentCategoryContent9->parent_category_name?></a>
                                            <h2><a href="<?=url('content/' . $parentCategoryContent9->parent_category_slug. '/' . $parentCategoryContent9->category_slug . '/' . $parentCategoryContent9->slug)?>"><?=$parentCategoryContent9->new_title?></a></h2>
                                            <ul class="post-tags">
                                                <!-- <li><i class="fa fa-clock-o"></i><span><?=date_format(date_create($parentCategoryContent9->created_at), "d M Y")?></span></li> -->
                                                <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?=$parentCategoryContent9->for_publication_name ?? $parentCategoryContent9->author_name?></a></li>
                                            </ul>
                                            <p><?=$parentCategoryContent9->sub_title?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                        <?php }?>
                        <!-- SYSTEMS -->
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
                                                                            'news_contents.for_publication_name', 
                                                                            'news_contents.cover_image', 
                                                                            'news_contents.created_at',
                                                                            'news_contents.media',
                                                                            'news_contents.videoId',
                                                                            'news_contents.is_series',
                                                                            'news_contents.series_article_no',
                                                                            'news_contents.current_article_no',
                                                                            'news_contents.other_article_part_doi_no',
                                                                            'sub_category.sub_category as category_name',  // Correct alias for subcategory name
                                                                            'sub_category.slug as category_slug',  // Correct alias for subcategory slug                                                                            
                                                                            'parent_category.slug as parent_category_slug' // Corrected alias to sub_category
                                                                        )
                                                                        ->where('news_contents.status', 1)  // Fetch only active content
                                                                        ->where('news_contents.is_feature', 1)  // Fetch only featured content
                                                                        ->orderBy('news_contents.created_at', 'DESC') // Latest videos first
                                                                        ->inRandomOrder()  // Randomize the result order
                                                                        ->limit(3)  // Limit to 3 records
                                                                        ->get();
                                        if($featuredContents){ foreach($featuredContents as $featuredContent){
                                        ?>
                                            <?php
                                            $is_series                  = $featuredContent->is_series;
                                            $series_article_no          = $featuredContent->series_article_no;
                                            $current_article_no         = $featuredContent->current_article_no;
                                            $other_article_part_doi_no  = explode(",", $featuredContent->other_article_part_doi_no);
                                            if($is_series == 'Yes'){
                                                if($current_article_no == 1){
                                                    $isShow = true;
                                                } else {
                                                    $isShow = false;
                                                }
                                            } else {
                                                $isShow = true;
                                            }
                                            if($isShow){
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
                                                                <!-- <?php if(session('is_user_login')){?>
                                                                    <a href="https://www.youtube.com/watch?v=<?=$featuredContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                                <?php } else {?>
                                                                    <a href="<?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                                                <?php }?> -->
                                                                <a href="https://www.youtube.com/watch?v=<?=$featuredContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="post-content">
                                                        <h2><a href="<?=url('content/' . $featuredContent->parent_category_slug. '/' . $featuredContent->category_slug . '/' . $featuredContent->slug)?>"><?=$featuredContent->new_title?></a></h2>
                                                        <ul class="post-tags">
                                                            <li><i class="fa fa-clock-o"></i><?=date_format(date_create($featuredContent->created_at), "d M Y")?></li>
                                                            <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?=$featuredContent->for_publication_name ?? $featuredContent->author_name?></a></li>
                                                        </ul>
                                                        <p><?=$featuredContent->sub_title?></p>
                                                    </div>
                                                </li>
                                            <?php }?>
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
                                                                    'news_contents.is_series',
                                                                    'news_contents.series_article_no',
                                                                    'news_contents.current_article_no',
                                                                    'news_contents.other_article_part_doi_no',
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
                                    <?php
                                    $is_series                  = $featuredContent->is_series;
                                    $series_article_no          = $featuredContent->series_article_no;
                                    $current_article_no         = $featuredContent->current_article_no;
                                    $other_article_part_doi_no  = explode(",", $featuredContent->other_article_part_doi_no);
                                    if($is_series == 'Yes'){
                                        if($current_article_no == 1){
                                            $isShow = true;
                                        } else {
                                            $isShow = false;
                                        }
                                    } else {
                                        $isShow = true;
                                    }
                                    if($isShow){
                                    ?>
                                        <li>
                                            <?php if($featuredContent->media == 'image'){?>
                                                <!-- <div class="post-gallery"> -->
                                                    <img src="<?=env('UPLOADS_URL').'newcontent/'.$featuredContent->cover_image?>" alt="<?=$featuredContent->new_title?>">
                                                <!-- </div> -->
                                            <?php } else {?>
                                                <div class="video-post">
                                                    <img alt="" src="https://img.youtube.com/vi/<?=$featuredContent->videoId?>/hqdefault.jpg">
                                                    <!-- <?php if(session('is_user_login')){?>
                                                        <a href="https://www.youtube.com/watch?v=<?=$featuredContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                    <?php } else {?>
                                                        <a href="<?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                                    <?php }?> -->
                                                    <a href="https://www.youtube.com/watch?v=<?=$featuredContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                </div>
                                            <?php } ?>
                                            <div class="post-content">
                                                <h2><a href="<?=url('content/' . $featuredContent->parent_category_slug. '/' . $featuredContent->category_slug . '/' . $featuredContent->slug)?>"><?=$featuredContent->new_title?></a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i><?=date_format(date_create($featuredContent->created_at), "d M Y")?></li>
                                                </ul>
                                            </div>
                                        </li>
                                    <?php }?>
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
                                                                'news_contents.is_series',
                                                                'news_contents.series_article_no',
                                                                'news_contents.current_article_no',
                                                                'news_contents.other_article_part_doi_no',
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
                                            <?php
                                            $is_series                  = $popularContent->is_series;
                                            $series_article_no          = $popularContent->series_article_no;
                                            $current_article_no         = $popularContent->current_article_no;
                                            $other_article_part_doi_no  = explode(",", $popularContent->other_article_part_doi_no);
                                            if($is_series == 'Yes'){
                                                if($current_article_no == 1){
                                                    $isShow = true;
                                                } else {
                                                    $isShow = false;
                                                }
                                            } else {
                                                $isShow = true;
                                            }
                                            if($isShow){
                                            ?>
                                                <li>
                                                    <?php if($popularContent->media == 'image'){?>
                                                        <!-- <div class="post-gallery"> -->
                                                            <img src="<?=env('UPLOADS_URL').'newcontent/'.$popularContent->cover_image?>" alt="<?=$popularContent->new_title?>">
                                                        <!-- </div> -->
                                                    <?php } else {?>
                                                        <div class="video-post">
                                                            <img alt="" src="https://img.youtube.com/vi/<?=$popularContent->videoId?>/hqdefault.jpg">
                                                            <!-- <?php if(session('is_user_login')){?>
                                                                <a href="https://www.youtube.com/watch?v=<?=$popularContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                            <?php } else {?>
                                                                <a href="<?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                                            <?php }?> -->
                                                            <a href="https://www.youtube.com/watch?v=<?=$popularContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="post-content">
                                                        <h2><a href="<?=url('content/'. $popularContent->parent_category_slug. '/' . $popularContent->category_slug . '/' .  $popularContent->slug)?>"><?=$popularContent->new_title?></a></h2>
                                                        <ul class="post-tags">
                                                            <li><i class="fa fa-clock-o"></i><?=date_format(date_create($popularContent->created_at), "d M Y")?></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            <?php }?>
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
                                                                            'news_contents.is_series',
                                                                            'news_contents.series_article_no',
                                                                            'news_contents.current_article_no',
                                                                            'news_contents.other_article_part_doi_no',
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
                                            <?php
                                            $is_series                  = $recentContent->is_series;
                                            $series_article_no          = $recentContent->series_article_no;
                                            $current_article_no         = $recentContent->current_article_no;
                                            $other_article_part_doi_no      = explode(",", $recentContent->other_article_part_doi_no);
                                            if($is_series == 'Yes'){
                                                if($current_article_no == 1){
                                                    $isShow = true;
                                                } else {
                                                    $isShow = false;
                                                }
                                            } else {
                                                $isShow = true;
                                            }
                                            if($isShow){
                                            ?>
                                                <li>
                                                    <?php if($recentContent->media == 'image'){?>
                                                        <!-- <div class="post-gallery"> -->
                                                            <img src="<?=env('UPLOADS_URL').'newcontent/'.$recentContent->cover_image?>" alt="<?=$recentContent->new_title?>">
                                                        <!-- </div> -->
                                                    <?php } else {?>
                                                        <div class="video-post">
                                                            <img alt="" src="https://img.youtube.com/vi/<?=$recentContent->videoId?>/hqdefault.jpg">
                                                            <!-- <?php if(session('is_user_login')){?>
                                                                <a href="https://www.youtube.com/watch?v=<?=$recentContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                            <?php } else {?>
                                                                <a href="<?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                                            <?php }?> -->
                                                            <a href="https://www.youtube.com/watch?v=<?=$recentContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="post-content">
                                                        <h2><a href="<?=url('content/' . $recentContent->parent_category_slug. '/' . $recentContent->category_slug . '/' .  $recentContent->slug)?>"><?=$recentContent->new_title?></a></h2>
                                                        <ul class="post-tags">
                                                            <li><i class="fa fa-clock-o"></i><?=date_format(date_create($recentContent->created_at), "d M Y")?></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            <?php }?>
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
<!-- block-wrapper-section ================================================== -->
<!-- feature-video-section ================================================== -->
    <section class="feature-video">
        <div class="container">
            <div class="title-section white">
                <h1><span>Video Content</span></h1>
            </div>
            <div class="features-video-box owl-wrapper">
                <!-- <h2 style="color: white; text-align: center;">Coming Soon</h2> -->
                <?php
                    $videoContents = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id')
                        ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id')
                        ->select(
                            'news_contents.id', 
                            'news_contents.new_title', 
                            'news_contents.sub_title', 
                            'news_contents.slug', 
                            'news_contents.author_name',
                            'news_contents.for_publication_name', 
                            'news_contents.cover_image', 
                            'news_contents.created_at',
                            'news_contents.videoId',
                            'news_contents.is_series',
                            'news_contents.series_article_no',
                            'news_contents.current_article_no',
                            'news_contents.other_article_part_doi_no',
                            'parent_category.sub_category as parent_category_name',
                            'sub_category.sub_category as category_name',
                            'sub_category.slug as category_slug',
                            'parent_category.slug as parent_category_slug'
                        )
                        ->where('news_contents.status', 1)
                        ->where('news_contents.media', 'video')
                        ->where(function($query) {
                            $query->where('news_contents.current_article_no', 1) // Include first video of each series
                                ->orWhere('news_contents.is_series', 'No');    // Include standalone videos
                        })
                        ->inRandomOrder()
                        ->orderBy('news_contents.created_at', 'DESC') // Latest videos first
                        ->limit(8)
                        ->get();
                    ?>

                    <div class="owl-carousel" data-num="2">
                        <?php if($videoContents){ foreach($videoContents as $videoContent){ ?>
                            <div class="item news-post video-post">
                                <img alt="" src="https://img.youtube.com/vi/<?=$videoContent->videoId?>/hqdefault.jpg">
                                <a href="https://www.youtube.com/watch?v=<?=$videoContent->videoId?>" class="video-link">
                                    <i class="fa fa-play-circle-o"></i>
                                </a>
                                <div class="hover-box">
                                    <a href="<?=url('category/' . $videoContent->parent_category_slug)?>"><?=$videoContent->parent_category_name?></a>
                                    <h2>
                                        <a href="<?=url('content/' . $videoContent->parent_category_slug. '/' . $videoContent->category_slug . '/' . $videoContent->slug)?>">
                                            <?=$videoContent->new_title?>
                                        </a>
                                    </h2>
                                    <ul class="post-tags">
                                        <li><i class="fa fa-user"></i>by <a href="javascript:void(0);">
                                            <?=$videoContent->for_publication_name ?? $videoContent->author_name?>
                                        </a></li>
                                        <?php if($videoContent->indigenous_affiliation != ''){ ?>
                                            <li><i class="fa fa-map-marker"></i><a href="javascript:void(0);"><?=$videoContent->indigenous_affiliation?></a></li>
                                        <?php } ?>
                                        <li><i class="fa fa-clock-o"></i><?=date_format(date_create($videoContent->created_at), "d M Y")?></li>
                                    </ul>
                                </div>
                            </div>
                        <?php } } ?>
                    </div>
            </div>
        </div>
    </section>
<!-- End feature-video-section -->
<!-- block-wrapper-section ================================================== -->
    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8 content-blocker">
                    <!-- block content -->
                    <div class="block-content">
                        <!-- article box -->
                        <div class="article-box">
                            <div class="title-section">
                                <h1><span>Latest Creative Works</span></h1>
                            </div>
                            <?php
                            // DB::enableQueryLog(); // Enable query log
                            $latestarticles = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id') // Join for parent category
                                            ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id') // Join for subcategory
                                            ->select(
                                                'news_contents.id', 
                                                'news_contents.new_title', 
                                                'news_contents.sub_title', 
                                                'news_contents.slug', 
                                                'news_contents.author_name',
                                                'news_contents.for_publication_name', 
                                                'news_contents.cover_image', 
                                                'news_contents.created_at',
                                                'news_contents.media',
                                                'news_contents.videoId',
                                                'news_contents.is_series',
                                                'news_contents.series_article_no',
                                                'news_contents.current_article_no',
                                                'news_contents.other_article_part_doi_no',
                                                'parent_category.sub_category as parent_category_name', // Corrected alias to sub_category
                                                'sub_category.sub_category as category_name',  // Correct alias for subcategory name
                                                'sub_category.slug as category_slug',  // Correct alias for subcategory slug
                                                'parent_category.slug as parent_category_slug' // Corrected alias to sub_category
                                            )
                                            ->where('news_contents.status', 1)  // Fetch only active content
                                            // ->where('news_contents.is_feature', 1)  // Fetch only featured content
                                            ->inRandomOrder()  // Randomize the result order
                                            ->orderBy('news_contents.created_at', 'DESC') // Latest videos first
                                            ->limit(6)  // Limit to 3 records
                                            ->get();
                                                        
                            if($latestarticles){ foreach($latestarticles as $latestarticle){
                            ?>
                                <?php
                                $is_series                  = $latestarticle->is_series;
                                $series_article_no          = $latestarticle->series_article_no;
                                $current_article_no         = $latestarticle->current_article_no;
                                $other_article_part_doi_no  = explode(",", $latestarticle->other_article_part_doi_no);
                                if($is_series == 'Yes'){
                                    if($current_article_no == 1){
                                        $isShow = true;
                                    } else {
                                        $isShow = false;
                                    }
                                } else {
                                    $isShow = true;
                                }
                                if($isShow){
                                ?>
                                    <div class="news-post article-post">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <!-- <div class="post-gallery">
                                                    <img src="<?=env('UPLOADS_URL').'newcontent/'.$latestarticle->cover_image?>" alt="<?=$latestarticle->new_title?>">
                                                </div> -->
                                                <?php if($latestarticle->media == 'image'){?>
                                                    <div class="post-gallery">
                                                        <img src="<?=env('UPLOADS_URL').'newcontent/'.$latestarticle->cover_image?>" alt="<?=$latestarticle->new_title?>">
                                                        <span class="image-caption" style="color:skyblue;"><?=$latestarticle->cover_image_caption?></span>
                                                    </div>
                                                <?php } else {?>
                                                    <div class="post-gallery video-post">
                                                        <img alt="" src="https://img.youtube.com/vi/<?=$latestarticle->videoId?>/hqdefault.jpg">
                                                        <!-- <?php if(session('is_user_login')){?>
                                                            <a href="https://www.youtube.com/watch?v=<?=$latestarticle->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                        <?php } else {?>
                                                            <a href="<?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                                        <?php }?> -->
                                                        <a href="https://www.youtube.com/watch?v=<?=$latestarticle->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="post-content">
                                                    <a href="<?=url('category/' . $latestarticle->parent_category_slug)?>"><?=$latestarticle->parent_category_name?></a>
                                                    <h2><a href="<?=url('content/' . $latestarticle->parent_category_slug. '/' . $latestarticle->category_slug . '/' . $latestarticle->slug)?>"><?=$latestarticle->new_title?></a></h2>
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?=$latestarticle->for_publication_name ?? $latestarticle->author_name?></a></li>
                                                        <?php
                                                        if($latestarticle->indigenous_affiliation != ''){                                                    
                                                         ?>
                                                            <li><i class="fa fa-map-marker"></i><a href="javascript:void(0);"><?=$latestarticle->indigenous_affiliation?></a></li>
                                                        <?php } ?>
                                                        <!-- <li><i class="fa fa-clock-o"></i><?=date_format(date_create($latestarticle->created_at), "d M Y")?></li> -->
                                                        
                                                        <!-- <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                        <li><i class="fa fa-eye"></i>872</li> -->
                                                    </ul>
                                                    <p><?=$latestarticle->sub_title?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
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
