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
                                <!-- <h1><span><?=$page_header?></span></h1> -->
                                <h1><a href="<?=url('projects')?>" class="btn project-btn"><i class="fa fa-users"></i> PROJECTS</a> <?=$slug?></h1>
                            </div>
                        </div>
                        <!-- End article box -->
                        <!-- article box -->
                        <div class="article-box">
                            <?php if($contents){ foreach($contents as $rowContent){?>
                                <?php
                                $is_series                  = $rowContent->is_series;
                                $series_article_no          = $rowContent->series_article_no;
                                $current_article_no         = $rowContent->current_article_no;
                                $other_article_part_doi_no      = explode(",", $rowContent->other_article_part_doi_no);
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
                                                            <!-- <a href="https://www.youtube.com/watch?v=?=$rowContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a> -->
                                                            <a href="<?=url('content/' . $rowContent->parent_category_slug. '/' . $rowContent->sub_category_slug . '/' . $rowContent->slug)?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                        <!-- ?php } else {?>
                                                            <a href="?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                                        ?php }?> -->
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="post-content">
                                                <?=strtoupper($rowContent->parent_category_name).' | '.$rowContent->sub_category_name?>
                                                    <!-- <a href="<?=url('category/' . $rowContent->parent_category_slug. '/' . $rowContent->sub_category_slug)?>"><?=$rowContent->sub_category_name?></a> -->
                                                    <h2><a href="<?=url('content/' . $rowContent->parent_category_slug. '/' . $rowContent->sub_category_slug . '/' . $rowContent->slug)?>"><?=$rowContent->new_title?></a></h2>
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-clock-o"></i><?=date_format(date_create($rowContent->created_at), "d M Y")?></li>
                                                        <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?= $rowContent->for_publication_name ?? $rowContent->author_name?></a></li>
                                                        <?php if($rowContent->projects_name != ''){ ?>
                                                        <li>PROJECTS:<a class="btn project-btn" href="<?= url('project/' .$rowContent->projects_name)?>"><i class="fa fa-users"></i> <?=$rowContent->projects_name?></a></li>
                                                        <?php } ?>
                                                        <!-- <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                        <li><i class="fa fa-eye"></i>872</li> -->
                                                    </ul>
                                                    <p><?=$rowContent->sub_title?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                            <?php } }?>
                        </div>
                        <!-- End article box -->
                    </div>
                    <!-- End block content -->
                </div>
                @include('front.pages.rightsidebar')
            </div>
        </div>
    </section>
<!-- End block-wrapper-section -->
