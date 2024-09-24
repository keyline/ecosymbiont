<?php
use App\Models\NewsCategory;
use App\Models\NewsContent;
use App\Helpers\Helper;
?>
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
                                            <div class="post-gallery">
                                                <img src="<?=env('UPLOADS_URL').'newcontent/'.$rowContent->cover_image?>" alt="<?=$rowContent->new_title?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="post-content">
                                                <a href="<?=url('subcategory/' . $rowContent->sub_category_slug)?>"><?=$rowContent->sub_category_name?></a>
                                                <h2><a href="<?=url('content/' . $rowContent->slug)?>"><?=$rowContent->new_title?></a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i><?=date_format(date_create($rowContent->created_at), "d M Y")?></li>
                                                    <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?=$rowContent->author_name?></a></li>
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
<!-- End block-wrapper-section -->
