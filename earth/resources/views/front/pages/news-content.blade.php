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
                    <?php if($rowContent){?>
                        <!-- block content -->
                        <div class="block-content">
                            <!-- article box -->
                            <div class="article-box">
                                <div class="title-section">
                                    <h1><span><?=$rowContent->parent_category_name .' | '. $rowContent->sub_category_name?></span></h1>
                                </div>
                            </div>
                            <!-- single-post box -->
                            <div class="single-post-box">
                                <div class="title-post">
                                    <h1><?=$rowContent->new_title?></h1>
                                    <ul class="post-tags">
                                        <li><i class="fa fa-clock-o"></i><?=date_format(date_create($rowContent->created_at), "d M Y")?></li>
                                        <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?= $rowContent->for_publication_name ?? $rowContent->author_name ?> | <?=$rowContent->creative_work_DOI?></a></li>
                                        <!-- <li><a href="#"><i class="fa fa-comments-o"></i><span>0</span></a></li>
                                        <li><i class="fa fa-eye"></i>872</li> -->
                                    </ul>
                                    <h5><?=$rowContent->sub_title?></h5>
                                    <?php
                                    $is_series                  = $rowContent->is_series;
                                    $series_article_no          = $rowContent->series_article_no;
                                    $current_article_no         = $rowContent->current_article_no;
                                    $other_article_part_doi_no      = explode(",", $rowContent->other_article_part_doi_no);
                                    // Helper::pr($other_article_part_doi_no,0);
                                    $other_articles_in_this_series_ids = [];
                                    $other_articles_in_this_series = [];
                                    if($is_series == 'Yes'){
                                        if($current_article_no == 1){
                                            $other_articles_in_this_series_ids[] = $rowContent->creative_work_DOI;
                                            $getOtherArticles = NewsContent::select('creative_work_DOI')->where('status', '=', 1)->where('other_article_part_doi_no', 'LIKE', '%'.$rowContent->creative_work_DOI.'%')->orderBy('current_article_no', 'ASC')->get();
                                            if($getOtherArticles){
                                                foreach($getOtherArticles as $getOtherArticle){
                                                    $other_articles_in_this_series_ids[] = $getOtherArticle->creative_work_DOI;
                                                }
                                            }
                                        } elseif($current_article_no == $series_article_no){
                                            if(!empty($other_article_part_doi_no)){
                                                for($k=0;$k<count($other_article_part_doi_no);$k++){
                                                    $other_articles_in_this_series_ids[] = $other_article_part_doi_no[$k];
                                                }
                                            }
                                            // $other_articles_in_this_series_ids[] = $rowContent->creative_work_DOI;
                                        } else {
                                            if(!empty($other_article_part_doi_no)){
                                                for($k=0;$k<count($other_article_part_doi_no);$k++){
                                                    $other_articles_in_this_series_ids[] = $other_article_part_doi_no[$k];
                                                }
                                            }
                                            $other_articles_in_this_series_ids[] = $rowContent->creative_work_DOI;
                                            $getOtherArticles = NewsContent::select('creative_work_DOI')->where('status', '=', 1)->where('other_article_part_doi_no', 'LIKE', '%'.$rowContent->creative_work_DOI.'%')->orderBy('current_article_no', 'ASC')->get();
                                            if($getOtherArticles){
                                                foreach($getOtherArticles as $getOtherArticle){
                                                    $other_articles_in_this_series_ids[] = $getOtherArticle->creative_work_DOI;
                                                }
                                            }
                                        }

                                        if(!empty($other_articles_in_this_series_ids)){
                                            for($m=0;$m<count($other_articles_in_this_series_ids);$m++){
                                                $getContent = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id')
                                                                ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id')
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
                                                                    'sub_category.sub_category as category_name',
                                                                    'sub_category.slug as category_slug',
                                                                    'parent_category.slug as parent_category_slug',
                                                                    'news_contents.creative_work_DOI',
                                                                    'news_contents.current_article_no',
                                                                )
                                                                ->where('news_contents.status', 1)
                                                                ->where('news_contents.creative_work_DOI', $other_articles_in_this_series_ids[$m])
                                                                ->first();
                                                if($getContent){
                                                    // $other_articles_in_this_series[] = [
                                                    //     'new_title'             => $getContent->new_title,
                                                    //     'slug'                  => $getContent->slug,
                                                    //     'parent_category_slug'  => $getContent->parent_category_slug,
                                                    //     'category_slug'         => $getContent->category_slug,
                                                    // ];
                                                    $other_articles_in_this_series[] = $getContent;
                                                }
                                            }
                                        }

                                    }
                                    ?>
                                    <?php if($is_series == 'Yes'){?>
                                        <!-- <ul>
                                            <?php if($other_articles_in_this_series){ foreach($other_articles_in_this_series as $other_articles_in_this_series_row){?>
                                                <li>
                                                    <a href="<?=url('content/' . $other_articles_in_this_series_row['parent_category_slug']. '/' . $other_articles_in_this_series_row['category_slug'] . '/' . $other_articles_in_this_series_row['slug'])?>"><?=$other_articles_in_this_series_row['new_title']?></a>
                                                </li>
                                            <?php } } ?>
                                        </ul> -->
                                    <?php }?>
                                </div>
                                <div class="share-post-box">
                                    <ul class="share-box">
                                        <li><button class="btn btn-primary" id="cite">
                                            <i class="fa fa-quote-left"></i> Cite</button>
                                        </li>
                                        <li><button class="btn btn-primary" id="permalink_button">
                                            <i class="fa fa-share-alt"></i> Permalink</button>
                                        </li>
                                        
                                    </ul>
                                </div>                                                              
                                <?php if($rowContent->media == 'image'){?>
                                    <div class="post-gallery">
                                        <img src="<?=env('UPLOADS_URL').'newcontent/'.$rowContent->cover_image?>" alt="<?=$rowContent->new_title?>">
                                        <span class="image-caption" style="color:skyblue;"><?=$rowContent->cover_image_caption?></span>
                                    </div>
                                <?php } else {?>
                                    <div class="post-gallery video-post">
                                        <img alt="" src="https://img.youtube.com/vi/<?=$rowContent->videoId?>/hqdefault.jpg">
                                        <!-- <?php if(session('is_user_login')){?>
                                            <a href="https://www.youtube.com/watch?v=<?=$rowContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                        <?php } else {?>
                                            <a href="<?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                        <?php }?> -->
                                        <!-- ?php if(session('is_user_login')){?>
                                            <a href="https://www.youtube.com/watch?v=?=$featuredContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                        ?php } else {?>
                                            <a href="?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                        ?php }?> -->
                                        <a href="https://www.youtube.com/watch?v=<?=$rowContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                    </div>
                                <?php } ?>
                                <div class="post-content">
                                    <?=$rowContent->short_desc?>
                                </div>
                                <!-- <div class="article-inpost">
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
                                                </div>
                                            </div>
                                        <?php } }?>
                                    </div>
                                </div> -->
                                <div class="post-content">
                                    <?php //if(session('is_user_login')){?>
                                        <!-- <div><?=$rowContent->long_desc?></div> -->
                                    <?php //} else {?>
                                        <!-- <p>?=substr($rowContent->long_desc,0,100)?> ...</p> -->
                                        <div><?=$rowContent->long_desc?></div>
                                        <div>
                                            <?php // Split the long description into an array of words
                                            // $words = explode(' ', $rowContent->long_desc);
                                        
                                            // // Get the first 40 words
                                            // $short_desc = implode(' ', array_slice($words, 0, 50));
                                        
                                            // // Display the shortened description
                                            // echo $short_desc;
                                            ?>
                                        </div>
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
                                        <!-- <p class="text-center"><a href="<?=url('sign-in/' . Helper::encoded($current_url))?>" class="text-primary">Read More</a></p> -->
                                    <?php //}?>
                                    
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
                                <div class="about-more-autor">
                                    <ul class="nav nav-tabs">
                                        <li class="active" style="width: 100%;">
                                            <a href="#about-autor" data-toggle="tab">
                                            <?php echo 'About The Lead Author'; ?>
                                            </a>
                                        </li>
                                    </ul>                                    
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="about-autor">
                                            <div class="autor-box">                                                
                                                <div class="autor-content postdetails-icon">
                                                    <div class="autor-title">
                                                        <span>
                                                            <img src="<?=env('UPLOADS_URL').'icon/author.png'?>" alt="author" title="Author Bio" data-toogle="tooltip">                                                            
                                                            <span><?=$rowContent->author_short_bio?></span>
                                                            
                                                            <!-- <a href="javascript:void(0);"><?=$authorPostCount?> Posts</a> -->
                                                        </span>
                                                    </div>
                                                    <div class="autor-title">
                                                        <span>
                                                            <img src="<?=env('UPLOADS_URL').'icon/ancestral.png'?>" alt="author_affiliation" title="Ancestral Ecoweb" data-toogle="tooltip">
                                                            <?php
                                                            $author_affiliation = json_decode($rowContent->author_affiliation);
                                                            $affiliations       = [];
                                                            if(!empty($author_affiliation)){ for($k=0;$k<count($author_affiliation);$k++){
                                                                $getAffiliation = EcosystemAffiliation::select('name')->where('id', '=', $author_affiliation[$k])->first();
                                                                $affiliations[]       = $getAffiliation->name;
                                                            } }?>
                                                            
                                                            <?php
                                                                $indigenous_affiliation = (isset($rowContent->indigenous_affiliation) && !empty($rowContent->indigenous_affiliation)) ? trim($rowContent->indigenous_affiliation) : trim($rowContent->indigenous_affiliation);
                                                            ?>
                                                            <span><?= implode(", ", $affiliations) ?><?= !empty($indigenous_affiliation) ? ' | ' . $indigenous_affiliation : ''; ?></span>
                                                        </span>
                                                    </div>
                                                    <div class="autor-title">
                                                        <span>
                                                            <img src="<?=env('UPLOADS_URL').'icon/residence.png'?>" alt="residence" title="Residence" data-toogle="tooltip">
                                                            <?php
                                                            $getCountry = Country::select('name')->where('id', '=', $rowContent->country)->first();
                                                            ?>
                                                            <span><?=(($getCountry)?$getCountry->name:'')?></span>
                                                        </span>
                                                    </div>
                                                    <div class="autor-title">
                                                        <span>
                                                            <img src="<?=env('UPLOADS_URL').'icon/organizational.png'?>" alt="organizational" title="Organizational Affiliation" data-toogle="tooltip">                                                                    
                                                            <span><?= $organization_name = (isset($rowContent->organization_name) > 0) ? trim($rowContent->organization_name) : ''; ?></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                                
                                    </div>
                                </div>
                                <?php  // Split the string into two parts using the '#' as a delimiter
                                $co_authors = $rowContent->co_authors;
                                // $co_author_name = json_decode($row->co_author_names);
                                // dd($co_author_name[0]); die;
                                $co_author_bios = json_decode($rowContent->co_author_bios);
                                $co_author_countries =json_decode($rowContent->co_author_countries);
                                $co_author_organizations = json_decode($rowContent->co_author_organizations);
                                $co_ecosystem_affiliations = json_decode($rowContent->co_ecosystem_affiliations);
                                $co_indigenous_affiliations = json_decode($rowContent->co_indigenous_affiliations);
                                $co_author_classification = json_decode($rowContent->co_author_classification);
                                    // $paragraphs = explode('#', $rowContent->author_short_bio);  
                                    // $indigenous = explode('#',$rowContent->indigenous_affiliation);
                                    // $organization = explode('#',$rowContent->organization_name);                                      
                                    for($i = 1; $i <= $co_authors; $i++)
                                    {
                                        // Decode the JSON field only once
                                        $co_ecosystem_affiliations = json_decode($rowContent->co_ecosystem_affiliations);

                                        // Initialize affiliations array
                                        $affiliations = [];

                                        // Check if $co_ecosystem_affiliations is not null and has the current index
                                        if (!empty($co_ecosystem_affiliations) && isset($co_ecosystem_affiliations[$i-1])) {
                                            $affiliation_ids = $co_ecosystem_affiliations[$i-1]; // Get the specific co-author's affiliations

                                            // Loop through the affiliation IDs and fetch names
                                            foreach ($affiliation_ids as $affiliation_id) {
                                            $getCoAffiliation = EcosystemAffiliation::select('name')->where('id', '=', $affiliation_id)->first();
                                            
                                            // Check if the affiliation was found and add it to the array
                                            if ($getCoAffiliation) {
                                                $affiliations[] = $getCoAffiliation->name;
                                            }
                                            }
                                        }
                                        $county_ids = $co_author_countries[$i-1];
                                        $getCoCountry = Country::select('name')->where('id', '=', $county_ids)->first();
                                        ?>
                                        <div class="about-more-autor">
                                            <ul class="nav nav-tabs">
                                                <li class="active" style="width: 100%;">
                                                    <a href="#about-autor" data-toggle="tab">
                                                    <?php 
                                                        if ($i == 1) {
                                                            echo 'About The Second Author';
                                                        } elseif ($i == 2) {
                                                            echo 'About The Third Author';
                                                        }
                                                    ?>
                                                    </a>
                                                </li>
                                            </ul>                                    
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="about-autor">
                                                    <div class="autor-box">                                                
                                                        <div class="autor-content postdetails-icon">
                                                            <div class="autor-title">
                                                                <span>
                                                                    <img src="<?=env('UPLOADS_URL').'icon/author.png'?>" alt="author" title="Author Bio" data-toogle="tooltip">                                                            
                                                                    <!-- <span>?=$author_short_bio = trim($paragraphs[$i])?></span> -->
                                                                    <span><?=$co_author_bios[$i - 1]?></span>
                                                                    
                                                                    <!-- <a href="javascript:void(0);"><?=$authorPostCount?> Posts</a> -->
                                                                </span>
                                                            </div>
                                                            <div class="autor-title">
                                                                <span>
                                                                    <img src="<?=env('UPLOADS_URL').'icon/ancestral.png'?>" alt="author_affiliation" title="Ancestral Ecoweb" data-toogle="tooltip">                                                                                                                                        
                                                                    <?php
                                                                        // $indigenous_affiliation = (isset($indigenous[$i]) && !empty($indigenous[$i])) ? trim($indigenous[$i]) : trim($indigenous[0]);
                                                                        $indigenous_affiliation = $co_indigenous_affiliations[$i - 1];
                                                                    ?>
                                                                    <span><?= implode(", ", $affiliations) ?><?= !empty($indigenous_affiliation) ? ' | ' . $indigenous_affiliation : ''; ?></span>
                                                                </span>
                                                            </div>
                                                            <div class="autor-title">
                                                                <span>
                                                                    <img src="<?=env('UPLOADS_URL').'icon/residence.png'?>" alt="residence" title="Residence" data-toogle="tooltip">                                                                    
                                                                    <!-- <span>?=(($getCountry)?$getCountry->name:'')?></span> -->
                                                                    <span><?=$getCoCountry->name?></span>
                                                                </span>
                                                            </div>
                                                            <div class="autor-title">
                                                                <span>
                                                                    <img src="<?=env('UPLOADS_URL').'icon/organizational.png'?>" alt="organizational" title="Organizational Affiliation" data-toogle="tooltip">                                                                    
                                                                    <!-- <span><?= $organization_name = (isset($organization[$i]) > 0) ? trim($organization[$i]) : ''; ?></span> -->
                                                                    <span><?= $co_author_organizations[$i - 1] ?></span>
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
                                    <?php }
                                      ?>                                  

                                
                                <!-- carousel box -->
                                <div class="carousel-box owl-wrapper">
                                    <div class="title-section">
                                        <?php if($is_series == 'Yes'){?>
                                            <?php if(count($other_articles_in_this_series) > 1){?>
                                                <h1><span>Other parts of this series</span></h1>
                                            <?php }?>
                                        <?php } else {?>
                                            <h1><span>You may also like</span></h1>
                                        <?php } ?>
                                    </div>
                                    <div class="owl-carousel" data-num="3">
                                        <?php if($is_series != 'Yes'){?>
                                            <?php if($alsoLikeContents){ foreach($alsoLikeContents as $alsoLikeContent){?>
                                                <div class="item news-post video-post video_post_text">
                                                    <!-- <img src="<?=env('UPLOADS_URL').'newcontent/'.$alsoLikeContent->cover_image?>" alt="<?=$alsoLikeContent->new_title?>"> -->
                                                    <?php if($alsoLikeContent->media == 'image'){?>
                                                        <!-- <div class="post-gallery"> -->
                                                            <img src="<?=env('UPLOADS_URL').'newcontent/'.$alsoLikeContent->cover_image?>" alt="<?=$alsoLikeContent->new_title?>">
                                                        <!-- </div> -->
                                                    <?php } else {?>
                                                        <div class="video-post">
                                                            <img alt="" src="https://img.youtube.com/vi/<?=$alsoLikeContent->videoId?>/hqdefault.jpg">
                                                            <!-- <?php if(session('is_user_login')){?>
                                                                <a href="https://www.youtube.com/watch?v=<?=$alsoLikeContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                            <?php } else {?>
                                                                <a href="<?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                                            <?php }?> -->
                                                            <!-- ?php if(session('is_user_login')){?>
                                                                <a href="https://www.youtube.com/watch?v=?=$featuredContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                            ?php } else {?>
                                                                <a href="?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                                            ?php }?> -->
                                                            <a href="https://www.youtube.com/watch?v=<?=$rowContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="hover-box">
                                                        <a href="<?=url('category/' . $alsoLikeContent->parent_category_slug. '/' . $alsoLikeContent->sub_category_slug)?>"><?=$alsoLikeContent->sub_category_name?></a>
                                                        <h2><a href="<?=url('content/' . $alsoLikeContent->parent_category_slug. '/' . $alsoLikeContent->sub_category_slug . '/' . $alsoLikeContent->slug)?>"><?=$alsoLikeContent->new_title?></a></h2>
                                                        <ul class="post-tags">
                                                            <li><i class="fa fa-clock-o"></i><?=date_format(date_create($alsoLikeContent->created_at), "d M Y")?></li>
                                                            <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?=$alsoLikeContent->author_name?></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            <?php } }?>
                                        <?php } else {?>
                                            <?php
                                            // Helper::pr($other_articles_in_this_series);
                                            ?>
                                            <?php if($other_articles_in_this_series){ foreach($other_articles_in_this_series as $other_articles_in_this_series_row){?>
                                                <?php if($current_article_no != $other_articles_in_this_series_row->current_article_no){?>
                                                    <div class="item news-post video-post video_post_text">
                                                        <!-- <img src="<?=env('UPLOADS_URL').'newcontent/'.$other_articles_in_this_series_row->cover_image?>" alt="<?=$other_articles_in_this_series_row->new_title?>"> -->
                                                        <?php if($other_articles_in_this_series_row->media == 'image'){?>
                                                            <!-- <div class="post-gallery"> -->
                                                                <img src="<?=env('UPLOADS_URL').'newcontent/'.$other_articles_in_this_series_row->cover_image?>" alt="<?=$other_articles_in_this_series_row->new_title?>">
                                                            <!-- </div> -->
                                                        <?php } else {?>
                                                            <div class="video-post">
                                                                <img alt="" src="https://img.youtube.com/vi/<?=$other_articles_in_this_series_row->videoId?>/hqdefault.jpg">
                                                                <!-- <?php if(session('is_user_login')){?>
                                                                    <a href="https://www.youtube.com/watch?v=<?=$other_articles_in_this_series_row->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                                <?php } else {?>
                                                                    <a href="<?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                                                <?php }?> -->
                                                                <!-- ?php if(session('is_user_login')){?>
                                                                    <a href="https://www.youtube.com/watch?v=?=$featuredContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                                ?php } else {?>
                                                                    <a href="?=url('sign-in/' . Helper::encoded($current_url))?>" class="video-link-without-signin"><i class="fa fa-play-circle-o"></i></a>
                                                                ?php }?> -->
                                                                <a href="https://www.youtube.com/watch?v=<?=$other_articles_in_this_series_row->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="hover-box">
                                                            <a href="<?=url('category/' . $other_articles_in_this_series_row->parent_category_slug. '/' . $other_articles_in_this_series_row->sub_category_slug)?>"><?=$other_articles_in_this_series_row->sub_category_name?></a>
                                                            <h2 style="font-size: 10px;"><a href="<?=url('content/' . $other_articles_in_this_series_row->parent_category_slug. '/' . $other_articles_in_this_series_row->category_slug . '/' . $other_articles_in_this_series_row->slug)?>"><?=$other_articles_in_this_series_row->new_title?></a></h2>
                                                            <ul class="post-tags">
                                                                <li><i class="fa fa-clock-o"></i><?=date_format(date_create($other_articles_in_this_series_row->created_at), "d M Y")?></li>
                                                                <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?=$other_articles_in_this_series_row->author_name?></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                <?php }?>
                                            <?php } }?>
                                        <?php } ?>
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
    <!-- Modal -->     
    <div id="popup">
        <h3>CITE</h3>  
        <div>                                  
            <p><?php
            //  Helper::pr($rowContent->co_authors); 
            
             
            //  Helper::pr($co_author_class); 
            $author_name = $rowContent->author_name;
            $new_title = $rowContent->new_title;
            $doi = $rowContent->creative_work_DOI;
            $co_authors = $rowContent->co_authors;
            $publish_date = date_format(date_create($rowContent->created_at), "d M, Y");
            $url = $current_url;
            
            function getInitials($author_name) {
                $words = explode(" ", $author_name); // Split the name into words
                $initials = strtoupper($words[0][0]) . ".";
            
                // foreach ($words as $word) {
                //     $initials .= strtoupper($word[0]); // Get the first letter of each word
                // }
            
                return $initials;
            }
            // Extract initials and last name
            $name_parts = explode(" ", $author_name);    
            $initials = getInitials($author_name);
            $last_name = end($name_parts); // Get the last name
            for($i = 1; $i <= $co_authors; $i++)
            {
                $co_author_name = json_decode($rowContent->co_author_names);
                $co_author_class = json_decode($rowContent->co_author_classification) ;
                $co_authorclassification = $co_author_class[$i-1];
                $co_author = $co_author_name[$i-1];
                $co_author_nameparts = explode(" ", $co_author);
                $co_author_initials = getInitials($co_author);
                $co_author_last_name = end($co_author_nameparts);
                $co_author_name = $co_author_initials . ". " . $co_author_last_name;
                // Helper::pr($co_authorclassification);                
            }     
            //  echo $co_authorclassification; die;

                if($rowContent->co_authors == 1){
                    // $co_author_class = json_decode($rowContent->co_author_classification) ;
                    if($co_authorclassification == 'Movement'){
                        echo "$initials $last_name & $co_author_name, <em>$new_title</em>, <b>Ecosymbionts all Regenerate Together (EaRTh):</b> $doi ($publish_date). 
                        $url";
                    } elseif($co_authorclassification == 'Ecoweb-rooted community'){
                        echo "$initials $last_name & $co_author_name, <em>$new_title</em>, <b>Ecosymbionts all Regenerate Together (EaRTh):</b> $doi ($publish_date). 
                        $url";
                    } else{
                        echo "$initials $last_name & $co_author_initials $co_author_last_name, <em>$new_title</em>, <b>Ecosymbionts all Regenerate Together (EaRTh):</b> $doi ($publish_date). 
                        $url";
                    }
                } elseif($rowContent->co_authors > 1){ 
                    echo "$initials $last_name, <em>et al.</em>, <em>$new_title</em>, <b>Ecosymbionts all Regenerate Together (EaRTh):</b> $doi ($publish_date). 
                    $url";
                } else {
                    echo "$initials $last_name, <em>$new_title</em>, <b>Ecosymbionts all Regenerate Together (EaRTh):</b> $doi ($publish_date). 
                    $url";
                    // echo "$initials. $words[1], <em>$new_title</em>, <b>Ecosymbionts all Regenerate Together (EaRTh):</b> DOI:$doi. <a href="$rowContent->parent_category_name/$rowContent->sub_category_slug/$rowContent->slug">$new_title</a>";
                }
                ?></p>  
        </div>
        <div class="cite_button">
            <button class="btn btn-primary" onclick="copyText()"><i class="fa fa-copy"></i> Copy</button>                                  
            <button id="closePopup">Close</button>
        </div>                                    
        <h3 id="copyMessage">Copied successfully!</h3>
    </div>
    <div id="permalink">
        <h3>PERMALINK</h3>  
        <div>                                  
            <p><?php echo $current_url;  ?></p>  
        </div>
        <div class="cite_button">
            <button class="btn btn-primary" onclick="copyText2()"><i class="fa fa-copy"></i> Copy</button>                                  
            <button id="closepermalink">Close</button>
        </div>                                   
        <h3 id="copyMessage2">Copied successfully!</h3>
    </div>  
<!-- End block-wrapper-section -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script>
    $(document).ready(function() {
    $('#popup').hide();
    // Trigger popup on button click
    $('#cite').click(function() {
        $('#popup').fadeIn();
        $('#copyMessage').hide();
    });

    // Close the popup
    $('#closePopup').click(function() {
        $('#popup').fadeOut();
    });
    });
</script> -->
<script>
    function copyText() {
        // Get text inside the popup
        let textToCopy = $('#popup p').map(function() {
            return $(this).text().trim();
        }).get().join("\n"); // Join text with new lines

        // Create a temporary textarea to copy text
        let tempTextArea = $('<textarea>');
        $('body').append(tempTextArea);
        tempTextArea.val(textToCopy).select();
        document.execCommand('copy');
        tempTextArea.remove();

        // Show copied message
        $('#copyMessage').fadeIn();

        // Hide message after 3 seconds
        setTimeout(function() {
            $('#copyMessage').fadeOut();
        }, 3000);

        // alert("Copied: " + textToCopy);
    }
</script>
<script>
    $(document).ready(function () {
        // Hide popups initially
        $('#popup, #permalink').hide();
        $('#copyMessage, #copyMessage2').hide();

        // Open Cite popup
        $('#cite').click(function () {
            $('#popup').fadeIn();
            $('#copyMessage').hide();
        });

        // Close Cite popup
        $('#closePopup').click(function () {
            $('#popup').fadeOut();
        });

        // Open Permalink popup
        $('#permalink_button').click(function () {
            $('#permalink').fadeIn();
            $('#copyMessage2').hide();
        });

        // Close Permalink popup
        $('#closepermalink').click(function () {
            $('#permalink').fadeOut();
        });
    });
</script>
<script>
    function copyText2() {
        // Get text inside the popup
        let textToCopy = $('#permalink p').map(function() {
            return $(this).text().trim();
        }).get().join("\n"); // Join text with new lines

        // Create a temporary textarea to copy text
        let tempTextArea = $('<textarea>');
        $('body').append(tempTextArea);
        tempTextArea.val(textToCopy).select();
        document.execCommand('copy');
        tempTextArea.remove();

        // Show copied message
        $('#copyMessage2').fadeIn();

        // Hide message after 3 seconds
        setTimeout(function() {
            $('#copyMessage2').fadeOut();
        }, 3000);

        // alert("Copied: " + textToCopy);
    }
</script>