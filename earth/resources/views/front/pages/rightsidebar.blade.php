<?php
use App\Models\NewsCategory;
use App\Models\NewsContent;
use App\Helpers\Helper;
?>
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
                                                    <!-- <a href="https://www.youtube.com/watch?v=?=$featuredContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a> -->
                                                    <a href="<?=url('content/' . $featuredContent->parent_category_slug. '/' . $featuredContent->category_slug . '/' . $featuredContent->slug)?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
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
                                                            ->orderBy('news_contents.created_at', 'DESC') // Latest videos first
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
                                                            <!-- <a href="https://www.youtube.com/watch?v=?=$popularContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a> -->
                                                            <a href="<?=url('content/'. $popularContent->parent_category_slug. '/' . $popularContent->category_slug . '/' .  $popularContent->slug)?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
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
                                                                        ->orderBy('news_contents.created_at', 'DESC') // Latest videos first
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
                                                            <!-- <a href="https://www.youtube.com/watch?v=<?=$recentContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a> -->
                                                            <a href="<?=url('content/' . $recentContent->parent_category_slug. '/' . $recentContent->category_slug . '/' .  $recentContent->slug)?>"class="video-link"><i class="fa fa-play-circle-o"></i></a>
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