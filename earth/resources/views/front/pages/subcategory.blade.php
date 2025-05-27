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
                        <div class="article-box" id="content-list">                    
                            <?php if ($contents->isEmpty()) { ?>
                                <div class="news-post article-post">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="post-content" style="padding-top: 0px;margin-top: -30px;">
                                                <p><?=$row->short_description?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { 
                            foreach ($contents as $rowContent) { ?>
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
                                                <img src="<?= env('UPLOADS_URL') . 'newcontent/' . $rowContent->cover_image ?>" alt="<?= $rowContent->new_title ?>">
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
                                                        <a href="<?= url('content/' . $rowContent->parent_category_slug. '/' . $rowContent->sub_category_slug . '/' . $rowContent->slug) ?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                    <!-- ?php } else {?> -->
                                                        <!-- <a href="?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a> -->
                                                    <!-- ?php }?> -->
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="post-content">
                                                <a href="<?= url('category/' . $rowContent->parent_category_slug. '/' . $rowContent->sub_category_slug) ?>"><?= $rowContent->sub_category_name ?></a>
                                                <h2><a href="<?= url('content/' . $rowContent->parent_category_slug. '/' . $rowContent->sub_category_slug . '/' . $rowContent->slug) ?>"><?= $rowContent->new_title ?></a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i><?= date_format(date_create($rowContent->created_at), "d M Y") ?></li>
                                                    <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?= $rowContent->for_publication_name ?? $rowContent->author_name ?></a></li>
                                                    <?php if($rowContent->projects_name != ''){ ?>
                                                <li><a class="btn project-btn" href="<?= url('project/' .$rowContent->projects_name)?>"><i class="fa fa-users"></i> <?=$rowContent->projects_name?></a></li>
                                                <?php } ?>
                                                </ul>
                                                <p><?= $rowContent->sub_title ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } } } ?> 
                        </div>   
                        <?php if(count($contents) >= 4) { ?>
                        <button id="load_more_btn" style="background-color: #d09c1c;border: #d09c1c;display: flex;margin: 0 auto;" class="btn btn-primary">Load More</button>
                        <?php }?>
                        <div id="loading" style="display: none;text-align: center;">
                            <svg version="1.1" id="L5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                                <circle fill="#ed1c24" stroke="none" cx="6" cy="50" r="6">
                                    <animateTransform attributeName="transform" dur="1s" type="translate" values="0 15 ; 0 -15; 0 15" repeatCount="indefinite" begin="0.1" />
                                </circle>
                                <circle fill="#ed1c24" stroke="none" cx="30" cy="50" r="6">
                                    <animateTransform attributeName="transform" dur="1s" type="translate" values="0 10 ; 0 -10; 0 10" repeatCount="indefinite" begin="0.2" />
                                </circle>
                                <circle fill="#ed1c24" stroke="none" cx="54" cy="50" r="6">
                                    <animateTransform attributeName="transform" dur="1s" type="translate" values="0 5 ; 0 -5; 0 5" repeatCount="indefinite" begin="0.3" />
                                </circle>
                            </svg>
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
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>    
    let offset = 4;
    const limit = 4;
    
    $('#load_more_btn').on('click', function () {
        $('#loading').show();
        $.ajax({
            url: '<?= url('category_load/' .$categoryname. '/' .$slug) ?>',
            type: 'POST',
            data: {
                offset: offset,
                limit: limit,
                _token: '<?= csrf_token() ?>'
            },
            success: function (response) {
                $('#loading').hide();
                contents = response.data;
                if (contents.length > 0) {
                    let contentHtml = '';
                    contents.forEach(content => {
                        contentHtml += `
                            <div class="news-post article-post">
                                <div class="row">
                                    <div class="col-sm-5">                                        
                                        ${content.media === 'image' ? `
                                            <div class="post-gallery">
                                                <img src="<?=env('UPLOADS_URL').'newcontent/'?>${content.cover_image}" alt="${content.new_title}">
                                                <span class="image-caption" style="color:skyblue;">${content.cover_image_caption}</span>
                                            </div>
                                        ` : `
                                            <div class="video-post">
                                                <img alt="" src="https://img.youtube.com/vi/${content.videoId}/hqdefault.jpg">                                                                                                   
                                                <a href="<?=url('content/')?>/${content.parent_category_slug}/${content.sub_category_slug}/${content.slug}" class="video-link">
                                                    <i class="fa fa-play-circle-o"></i>
                                                </a>            
                                            </div>
                                        `}
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="post-content">
                                            <a href="<?=url('category/')?>${content.parent_category_slug}/${content.sub_category_slug}">${content.sub_category_name}</a>
                                            <h2>
                                                <a href="<?=url('content/')?>/${content.parent_category_slug}/${content.sub_category_slug}/${content.slug}">
                                                    ${content.new_title}
                                                </a>
                                            </h2>
                                            <ul class="post-tags">
                                                <li>
                                                    <i class="fa fa-clock-o"></i> 
                                                    ${new Date(content.created_at).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' })}
                                                </li>
                                                <li>
                                                    <i class="fa fa-user"></i> by 
                                                    <a href="javascript:void(0);">${content.for_publication_name ?? content.author_name}</a>
                                                </li>   
                                                ${content.projects_name ? `
                                                    <li>
                                                        <a class="btn project-btn" href="<?= url('project/') ?>${content.projects_name}">
                                                            <i class="fa fa-users"></i> ${content.projects_name}
                                                        </a>
                                                    </li>` : ''}                                             
                                            </ul>
                                            <p>${content.sub_title}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                    });
                    $('#content-list').append(contentHtml);
                    offset += contents.length;
                    if (contents.length < limit) {
                        $('#load_more_btn').hide();
                    }
                } else {
                    $('#load_more_btn').hide();
                    if ($('#no_more_contents').length === 0) {
                        $('#content-list').after('<p id="no_more_contents" class="text-center">End of search results</p>');
                    }
                }              
            },
            error: function () {
                alert('End of search results');
                $('#loading').hide();
            }
        });
    });
</script>
