<?php
use App\Models\NewsCategory;
use App\Models\NewsContent;
use App\Helpers\Helper;

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
$uri = $_SERVER['REQUEST_URI'];
$current_url = $protocol . $host . $uri;
?>
<style>
    svg {
        width: 70px;
        height: 70px;
        margin: 20px;
        display: inline-block;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                                <h1><span><?=$page_header?></span></h1>
                            </div>
                        </div>
                        <!-- End article box -->
                        <!-- article box -->
                        <div class="article-box">
                            <?php if($contents){ foreach($contents as $rowContent){?>
                                <div class="news-post article-post">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <!-- <div class="post-gallery">
                                                <img src="<?=env('UPLOADS_URL').'newcontent/'.$rowContent->cover_image?>" alt="<?=$rowContent->new_title?>">
                                            </div> -->
                                            <?php if($rowContent->media == 'image'){?>
                                                <div class="post-gallery">
                                                    <img src="<?=env('UPLOADS_URL').'newcontent/'.$rowContent->cover_image?>" alt="<?=$rowContent->new_title?>">
                                                    <span class="image-caption" style="color:skyblue;"><?=$rowContent->cover_image_caption?></span>
                                                </div>
                                            <?php } else {?>
                                                <div class="post-gallery video-post">
                                                    <img alt="" src="https://img.youtube.com/vi/<?=$rowContent->videoId?>/hqdefault.jpg">
                                                    <!-- ?php if(session('is_user_login')){?> -->
                                                        <a href="https://www.youtube.com/watch?v=<?=$rowContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                    <!-- ?php } else {?> -->
                                                        <!-- <a href="?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a> -->
                                                    <!-- ?php }?> -->
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="post-content">
                                                <a href="<?=url('category/' . $rowContent->parent_category_name. '/' . $rowContent->sub_category_slug)?>"><?=$rowContent->sub_category_name?></a>
                                                <h2><a href="<?=url('content/' . $rowContent->parent_category_slug. '/' . $rowContent->sub_category_slug . '/' . $rowContent->slug)?>"><?=$rowContent->new_title?></a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i><?=date_format(date_create($rowContent->created_at), "d M Y")?></li>
                                                    <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?=$rowContent->for_publication_name ?? $rowContent->author_name?></a></li>
                                                    <!-- <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                    <li><i class="fa fa-eye"></i>872</li> -->
                                                </ul>
                                                <p><?=$rowContent->sub_title?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } }?>
                        </div>
                        <button id="load_more_btn" style="float: right;background-color:#ed1c24;border: tomato;" class="btn btn-primary">Load More</button>
                        <div id="loading" style="display: none;text-align: center;">
                            <svg version="1.1" id="L5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                                <circle fill="#ed1c24" stroke="none" cx="6" cy="50" r="6">
                                    <animateTransform
                                        attributeName="transform"
                                        dur="1s"
                                        type="translate"
                                        values="0 15 ; 0 -15; 0 15"
                                        repeatCount="indefinite"
                                        begin="0.1" />
                                </circle>
                                <circle fill="#ed1c24" stroke="none" cx="30" cy="50" r="6">
                                    <animateTransform
                                        attributeName="transform"
                                        dur="1s"
                                        type="translate"
                                        values="0 10 ; 0 -10; 0 10"
                                        repeatCount="indefinite"
                                        begin="0.2" />
                                </circle>
                                <circle fill="#ed1c24" stroke="none" cx="54" cy="50" r="6">
                                    <animateTransform
                                        attributeName="transform"
                                        dur="1s"
                                        type="translate"
                                        values="0 5 ; 0 -5; 0 5"
                                        repeatCount="indefinite"
                                        begin="0.3" />
                                </circle>
                            </svg>
                        </div>
                        <!-- End article box -->
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
                                                                    'news_contents.for_publication_name',
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
<!-- End block-wrapper-section -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        alert('Hello');
        // _________________________ load more _________________________
        // let page = 1;
        // let loading = false;

        function loadMoreContent() {
            $('#loading').show(); // Show loading indicator            
        }

        $('#load_more_btn').on('click', loadMoreContent);
    });
</script>