<?php
use App\Models\NewsCategory;
use App\Models\NewsContent;
use App\Models\NewsContentImage;
use App\Models\Country;
use App\Models\EcosystemAffiliation;
use App\Models\Article;
use App\Models\Title;
use App\Models\Pronoun;
use App\Helpers\Helper;
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- block-wrapper-section ================================================== -->
    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8 content-blocker">
                    <?php if($rowContent){?>
                        <!-- block content -->
                        <div class="block-content">
                            <!-- single-post box -->
                            <div class="single-post-box">
                                <div class="title-post">
                                    <h1><?=$rowContent->new_title?></h1>
                                    <ul class="post-tags">
                                        <li><i class="fa fa-clock-o"></i><?=date_format(date_create($rowContent->created_at), "d M Y")?></li>
                                        <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?=$rowContent->author_name?> | <?=$rowContent->creative_work_DOI?></a></li>
                                        <!-- <li><a href="#"><i class="fa fa-comments-o"></i><span>0</span></a></li>
                                        <li><i class="fa fa-eye"></i>872</li> -->
                                    </ul>
                                    <h5><?=$rowContent->sub_title?></h5>
                                </div>
                                <div class="share-post-box">
                                    <ul class="share-box">
                                        <li><i class="fa fa-share-alt"></i><span>Share Post</span></li>
                                        <li><a class="facebook" href="{{ $facebookShareUrl }}" target="_blank"><i class="fa fa-facebook"></i><span>Share on Facebook</span></a></li>
                                        <li><a class="twitter" href="{{ $twitterShareUrl }}" target="_blank"><i class="fa fa-twitter"></i><span>Share on Twitter</span></a></li>
                                        <!-- <li><a class="google" href="#"><i class="fa fa-google-plus"></i><span></span></a></li> -->
                                        <li><a class="linkedin" href="{{ $linkdinShareUrl }}" target="_blank"><i class="fa fa-linkedin"></i><span>&nbsp;&nbsp;&nbsp;Share on Linkedin</span></a></li>
                                    </ul>
                                </div>
                                <div class="post-gallery">
                                    <img src="<?=env('UPLOADS_URL').'newcontent/'.$rowContent->cover_image?>" alt="<?=$rowContent->new_title?>">
                                    <span class="image-caption" style="color:skyblue;"><?=$rowContent->cover_image_caption?></span>
                                </div>
                                <div class="post-content">
                                    <!-- <p><?=$rowContent->short_desc?></p> -->
                                </div>
                                <div class="article-inpost">
                                    <div class="row">
                                        <?php
                                        $news_id = $rowContent->news_id;
                                        $contentOtherImages = NewsContentImage::select('image_file')->where('status', '=', 1)->where('news_id', '=', $news_id)->get();
                                        if($contentOtherImages){ foreach($contentOtherImages as $contentOtherImage){
                                        ?>
                                            <div class="col-md-6">
                                                <div class="image-content">
                                                    <div class="image-place">
                                                        <img src="<?=env('UPLOADS_URL').'newcontent/'.$contentOtherImage->image_file?>" alt="<?=$rowContent->new_title?>">
                                                        <div class="hover-image">
                                                            <a class="zoom" href="<?=env('UPLOADS_URL').'newcontent/'.$contentOtherImage->image_file?>"><i class="fa fa-arrows-alt"></i></a>
                                                        </div>
                                                    </div>
                                                    <!-- <span class="image-caption">Cras eget sem nec dui volutpat ultrices.</span> -->
                                                </div>
                                            </div>
                                        <?php } }?>
                                    </div>
                                </div>
                                <div class="post-content">
                                    <?php if(session('is_user_login')){?>
                                        <p><?=$rowContent->long_desc?></p>
                                    <?php } else {?>
                                        <!-- <p>?=substr($rowContent->long_desc,0,100)?> ...</p> -->
                                        <p>
                                            <?php // Split the long description into an array of words
                                            $words = explode(' ', $rowContent->long_desc);
                                        
                                        // Get the first 40 words
                                        $short_desc = implode(' ', array_slice($words, 0, 50));
                                        
                                        // Display the shortened description
                                        echo $short_desc;
                                        ?>
                                    </p>
                                        <?php
                                        // Check if HTTPS is enabled
                                        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

                                        // Get the host name
                                        $host = $_SERVER['HTTP_HOST'];

                                        // Get the URI (Uniform Resource Identifier)
                                        $uri = $_SERVER['REQUEST_URI'];

                                        // Combine to get the full URL
                                        $current_url = $protocol . $host . $uri;

                                        // Output the current URL
                                        // echo $current_url;
                                        ?>
                                        <p class="text-center"><a href="<?=url('sign-in/' . Helper::encoded($current_url))?>" class="text-primary">Read More</a></p>
                                    <?php }?>
                                    
                                </div>
                                <div class="post-tags-box">
                                    <ul class="tags-box">
                                        <li><i class="fa fa-tags"></i><span>Tags:</span></li>
                                        <?php
                                        $keywords = explode(",", $rowContent->keywords);
                                        if(!empty($keywords)){ for($k=0;$k<count($keywords);$k++){
                                        ?>
                                            <li><a href="javascript:void(0);"><?=$keywords[$k]?></a></li>
                                        <?php } }?>
                                    </ul>
                                </div>
                                <div class="share-post-box">
                                    <ul class="share-box">
                                        <li><i class="fa fa-share-alt"></i><span>Share Post</span></li>                                        
                                        <li><a class="facebook" href="{{ $facebookShareUrl }}" target="_blank"><i class="fa fa-facebook"></i><span>Share on Facebook</span></a></li>
                                        <li><a class="twitter" href="{{ $twitterShareUrl }}" target="_blank"><i class="fa fa-twitter"></i><span>Share on Twitter</span></a></li>
                                        <!-- <li><a class="google" href="#"><i class="fa fa-google-plus"></i><span></span></a></li> -->
                                        <li><a class="linkedin" href="{{ $linkdinShareUrl }}" target="_blank"><i class="fa fa-linkedin"></i><span>&nbsp;&nbsp;&nbsp;Share on Linkedin</span></a></li>
                                    </ul>
                                </div>
                                <div class="about-more-autor">
                                    <ul class="nav nav-tabs">
                                        <li class="active" style="width: 100%;">
                                            <a href="#about-autor" data-toggle="tab">About The Author</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="about-autor">
                                            <div class="autor-box">
                                                <?php
                                                $getArticle = Article::where('article_no', '=', $rowContent->creative_work_SRN)->first();
                                                $titleId = (($getArticle)?$getArticle->titleId:'');
                                                $getTitle = Title::select('name')->where('id', '=', $titleId)->first();
                                                $pronounId = $rowContent->author_pronoun;
                                                $getPronoun = Pronoun::select('name')->where('id', '=', $pronounId)->first();
                                                ?>
                                                <div class="autor-content">
                                                    <div class="autor-title">
                                                        <span>
                                                            <img src="<?=env('UPLOADS_URL').'icon/author.png'?>" alt="author">
                                                            <!-- <span><?=$rowContent->author_name?>  (<?=(($getTitle)?$getTitle->name:'')?>/<?=(($getPronoun)?$getPronoun->name:'')?>) <?=$rowContent->author_short_bio?>.</span> -->
                                                            <span><?=$rowContent->author_short_bio?>.</span>
                                                            <!-- <a href="javascript:void(0);"><?=$authorPostCount?> Posts</a> -->
                                                        </span>
                                                    </div>
                                                    <div class="autor-title">
                                                        <span>
                                                            <img src="<?=env('UPLOADS_URL').'icon/ancestral.png'?>" alt="author_affiliation">
                                                            <?php
                                                            $author_affiliation = json_decode($rowContent->author_affiliation);
                                                            $affiliations       = [];
                                                            if(!empty($author_affiliation)){ for($k=0;$k<count($author_affiliation);$k++){
                                                                $getAffiliation = EcosystemAffiliation::select('name')->where('id', '=', $author_affiliation[$k])->first();
                                                                $affiliations[]       = $getAffiliation->name;
                                                            } }?>
                                                            <span><?=implode(", ", $affiliations)?> | <?=$rowContent->indigenous_affiliation?></span>
                                                        </span>
                                                    </div>
                                                    <div class="autor-title">
                                                        <span>
                                                            <img src="<?=env('UPLOADS_URL').'icon/residence.png'?>" alt="residence">
                                                            <?php
                                                            $getCountry = Country::select('name')->where('id', '=', $rowContent->country)->first();
                                                            ?>
                                                            <span><?=(($getCountry)?$getCountry->name:'')?></span>
                                                        </span>
                                                    </div>
                                                    <div class="autor-title">
                                                        <span>
                                                            <img src="<?=env('UPLOADS_URL').'icon/organizational.png'?>" alt="organizational">
                                                            <span><?=$rowContent->organization_name?></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="tab-pane" id="more-autor">
                                            <div class="more-autor-posts">
                                                <div class="news-post image-post3">
                                                    <img src="upload/news-posts/im4.jpg" alt="">
                                                    <div class="hover-box">
                                                        <h2><a href="single-post.html">Donec odio. Quisque volutpat mattis eros.</a></h2>
                                                        <ul class="post-tags">
                                                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="news-post image-post3">
                                                    <img src="upload/news-posts/im5.jpg" alt="">
                                                    <div class="hover-box">
                                                        <h2><a href="single-post.html">Nullam malesuada erat ut turpis. </a></h2>
                                                        <ul class="post-tags">
                                                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="news-post image-post3">
                                                    <img src="upload/news-posts/im6.jpg" alt="">
                                                    <div class="hover-box">
                                                        <h2><a href="single-post.html">Suspendisse urna nibh.</a></h2>
                                                        <ul class="post-tags">
                                                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <!-- carousel box -->
                                <div class="carousel-box owl-wrapper">
                                    <div class="title-section">
                                        <h1><span>You may also like</span></h1>
                                    </div>
                                    <div class="owl-carousel" data-num="3">
                                        <?php if($alsoLikeContents){ foreach($alsoLikeContents as $alsoLikeContent){?>
                                            <div class="item news-post image-post3">
                                                <img src="<?=env('UPLOADS_URL').'newcontent/'.$alsoLikeContent->cover_image?>" alt="<?=$alsoLikeContent->new_title?>">
                                                <div class="hover-box">
                                                    <a href="<?=url('subcategory/' . $alsoLikeContent->sub_category_slug)?>"><?=$alsoLikeContent->sub_category_name?></a>
                                                    <h2><a href="<?=url('content/' . $alsoLikeContent->slug)?>"><?=$alsoLikeContent->new_title?></a></h2>
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-clock-o"></i><?=date_format(date_create($alsoLikeContent->created_at), "d M Y")?></li>
                                                        <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?=$alsoLikeContent->author_name?></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php } }?>
                                    </div>
                                </div>
                                <!-- End carousel box -->
                            </div>
                            <!-- End single-post box -->
                        </div>
                        <!-- End block content -->
                    <?php }?>
                </div>
                <div class="col-md-3 col-sm-4 sidebar-sticky">
                    <!-- sidebar -->
                    <div class="sidebar large-sidebar theiaStickySidebar">
                        <div class="widget features-slide-widget">
                            <div class="title-section">
                                <h1><span>Featured Posts</span></h1>
                            </div>
                            <ul class="list-posts">
                                <?php
                                $popularContents = NewsContent::join('news_category', 'news_contents.parent_category', '=', 'news_category.id')
                                                   ->select('news_contents.id', 'news_contents.new_title', 'news_contents.sub_title', 'news_contents.slug', 'news_contents.author_name', 'news_contents.cover_image', 'news_contents.created_at', 'news_category.sub_category as category_name', 'news_category.slug as category_slug')
                                                   ->where('news_contents.status', '=', 1)
                                                   ->where('news_contents.is_popular', '=', 1)
                                                   ->inRandomOrder()
                                                   ->limit(6)
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
                                                           ->limit(6)
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
                                                           ->limit(6)
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
