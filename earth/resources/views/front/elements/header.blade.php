<?php
use App\Models\NewsCategory;
use App\Models\NewsContent;
use App\Helpers\Helper;
// Get the IP address of the user
// $ip = $_SERVER['REMOTE_ADDR']; // This gets the user's IP address
// $APP_URL = $_SERVER['APP_URL'];

// Use ipinfo.io API to get location details
//$details = file_get_contents("http://ipinfo.io/{$ip}/json");
//$details = json_decode($details);
// Helper::pr($details);
// Display the city and country
// echo "City: " . $details->city . "<br>";
// echo "Country: " . $details->country . "<br>";
?>
<!-- Bootstrap navbar -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
        <!-- Top line -->
        <div class="top-line">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <ul class="top-line-list">
                            <!-- <li>
                                <?php //if($APP_URL != 'http://localhost/ecosymbiont/'){?>
                                    <span class="city-weather">?=$details->city?>, ?=$details->region?>, ?=$details->country?></span>
                                <?php //}?>
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="24px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                                    <path fill="#777777" d="M208,64c8.833,0,16-7.167,16-16V16c0-8.833-7.167-16-16-16s-16,7.167-16,16v32
                                        C192,56.833,199.167,64,208,64z M332.438,106.167l22.625-22.625c6.249-6.25,6.249-16.375,0-22.625
                                        c-6.25-6.25-16.375-6.25-22.625,0l-22.625,22.625c-6.25,6.25-6.25,16.375,0,22.625
                                        C316.062,112.417,326.188,112.417,332.438,106.167z M16,224h32c8.833,0,16-7.167,16-16s-7.167-16-16-16H16
                                        c-8.833,0-16,7.167-16,16S7.167,224,16,224z M352,208c0,8.833,7.167,16,16,16h32c8.833,0,16-7.167,16-16s-7.167-16-16-16h-32
                                        C359.167,192,352,199.167,352,208z M83.541,106.167c6.251,6.25,16.376,6.25,22.625,0c6.251-6.25,6.251-16.375,0-22.625
                                        L83.541,60.917c-6.25-6.25-16.374-6.25-22.625,0c-6.25,6.25-6.25,16.375,0,22.625L83.541,106.167z M400,256
                                        c-5.312,0-10.562,0.375-15.792,1.125c-16.771-22.875-39.124-40.333-64.458-51.5C318.459,145,268.938,96,208,96
                                        c-61.75,0-112,50.25-112,112c0,17.438,4.334,33.75,11.5,48.438C47.875,258.875,0,307.812,0,368c0,61.75,50.25,112,112,112
                                        c13.688,0,27.084-2.5,39.709-7.333C180.666,497.917,217.5,512,256,512c38.542,0,75.333-14.083,104.291-39.333
                                        C372.916,477.5,386.312,480,400,480c61.75,0,112-50.25,112-112S461.75,256,400,256z M208,128c39.812,0,72.562,29.167,78.708,67.25
                                        c-10.021-2-20.249-3.25-30.708-3.25c-45.938,0-88.5,19.812-118.375,53.25C131.688,234.083,128,221.542,128,208
                                        C128,163.812,163.812,128,208,128z M400,448c-17.125,0-32.916-5.5-45.938-14.667C330.584,461.625,295.624,480,256,480
                                        c-39.625,0-74.584-18.375-98.062-46.667C144.938,442.5,129.125,448,112,448c-44.188,0-80-35.812-80-80s35.812-80,80-80
                                        c7.75,0,15.062,1.458,22.125,3.541c2.812,0.792,5.667,1.417,8.312,2.521c4.375-8.562,9.875-16.396,15.979-23.75
                                        C181.792,242.188,216.562,224,256,224c10.125,0,19.834,1.458,29.25,3.709c10.562,2.499,20.542,6.291,29.834,11.291
                                        c23.291,12.375,42.416,31.542,54.457,55.063C378.938,290.188,389.209,288,400,288c44.188,0,80,35.812,80,80S444.188,448,400,448z"
                                    />
                                </svg>
                                <span class="cel-temperature">+7</span>
                            </li> -->
                            <!-- <li><span class="time-now"><//?=date('l d F Y')?> / <//?=date('H:i')?></span></li> -->
                            <li><span class="time-now"><?= date('d F Y') ?> / <?= date('H:i T') ?></span></li>
                            <!-- <li><a href="#">Log In</a></li> -->
                            <!-- <li><a href="<?=url('contact-us')?>">Contact</a></li> -->
                            <?php if(session('is_user_login')){?>
                                <li>
                                    <!-- <img src="<?=(($user)?(($user->profile_image != '')?env('UPLOADS_URL').'user/'.$user->profile_image:env('NO_USER_IMAGE')):env('NO_USER_IMAGE'))?>" alt="<?=(($user)?$user->first_name . ' ' . $user->last_name:'')?>" class="img-responsive img-circle" style="width: 35px;height: 35px;"> -->
                                    <a href="<?=url('user/dashboard')?>">Welcome <?=(($user)?$user->first_name:'')?></a></li>
                                <li><a href="<?=url('user/signout')?>">Sign Out</a></li>
                            <?php } else {?>
                                <li><a href="<?=url('signin')?>">Sign In</a></li> 
                                <li><a href="<?=url('signup')?>">Sign Up</a></li>
                            <?php }?>
                        </ul>
                    </div>  
                    <div class="col-md-3">
                        <ul class="social-icons">
                            <li><a target="_blank" class="facebook" href="<?=$generalSetting->facebook_profile?>"><i class="fa fa-facebook"></i></a></li>
                            <li><a target="_blank" class="twitter" href="<?=$generalSetting->twitter_profile?>"><i class="fa fa-twitter"></i></a></li>
                            <!-- <li><a class="rss" href="#"><i class="fa fa-rss"></i></a></li> -->
                            <!-- <li><a class="google" href="<?=$generalSetting->youtube_profile?>"><i class="fa fa-youtube"></i></a></li> -->
                            <!-- <li><a class="linkedin" href="<?=$generalSetting->linkedin_profile?>"><i class="fa fa-linkedin"></i></a></li> -->
                            <li><a target="_blank" class="pinterest" href="<?=$generalSetting->instagram_profile?>"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>  
                </div>
            </div>
        </div>
        <!-- End Top line -->
        <!-- Logo & advertisement -->
        <div class="logo-advertisement">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?=url('/')?>"><img src="<?=env('UPLOADS_URL').$generalSetting->site_logo?>" alt="<?=$generalSetting->site_name?>"></a>
                    <div id="cssmenu">
                        <!-- mobile -->
                        <ul>
                            <!-- <li><a href="<?=url('about-us')?>">ABOUT</a></li> -->
                            <li><a href="<?=url('communities')?>" style="color: black !important;">COMMUNITIES</a></li>
                            <?php if($parentCats){ foreach($parentCats as $parentCat){?>
                                <li><a href="<?=url('category/' . $parentCat->slug)?>"><?=$parentCat->sub_category?></a>
                                    
                                    <ul class="filter-posts">
                                        <?php
                                        
                                        $childCats = NewsCategory::select('id', 'sub_category', 'slug')->where('status', '=', 1)->where('parent_category', '=', $parentCat->id)->orderBy('sub_category', 'asc')->get();                                                                                                        
                                        if($childCats){ $sl=1; foreach($childCats as $childCat){
                                        ?>
                                            <li><a <?=(($sl == 1)?'class="active"':'')?> href="<?=url('category/' . $parentCat->slug .'/'. $childCat->slug)?>"><?=$childCat->sub_category?></a></li>
                                        <?php $sl++; } }?>
                                    </ul>
                                </li>
                            <?php } }?>
                            <li><a href="<?=url('submissions')?>"  style="color: black !important;">SUBMISSIONS</a></li>
                            <li><a href="<?=env('REGENERATE_URL')?>contact.php"  style="color: black !important;">CONTACT</a></li>
                        </ul>
                        <!-- mobile -->
                    </div>
                    <!-- <div class="search_holder">
                        <form class="navbar-form navbar-right d-md-none" method="GET" action="<?=url('search-result')?>" role="search">
                            @csrf
                            <input type="text" name="article_search" id="article-search" placeholder="Search here" value="?=$search_keyword?>" onkeyup="getSuggestions(this.value);" style="text-transform: lowercase;" required>
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                        <ul id="suggestions"></ul>
                    </div> -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                
            </div>
        </div>
        <!-- End Logo & advertisement -->
        <!-- list line posts -->
        <div class="list-line-posts">
            <div class="container">
                <div class="owl-wrapper">
                    <div class="owl-carousel" data-num="3">
                        <?php
                        // DB::enableQueryLog(); // Enable query log

                        $hotNewsContents = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id') // Join for parent category
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
                                                            'sub_category.sub_category as sub_category_name', // From sub_category name
                                                            'parent_category.sub_category as parent_category_name', // From parent_category name
                                                            'sub_category.slug as sub_category_slug', // From sub_category alias
                                                            'parent_category.slug as parent_category_slug' // Corrected alias to sub_category
                                                        )
                                                        ->where('news_contents.status', 1)
                                                        ->where('news_contents.is_hot', 1)
                                                        ->orderBy('news_contents.id', 'DESC')
                                                        ->get();
                                           // dd(DB::getQueryLog());
                        if($hotNewsContents){ foreach($hotNewsContents as $rowContent){ 
                        ?>
                            <?php
                            $is_series                  = $rowContent->is_series;
                            $series_article_no          = $rowContent->series_article_no;
                            $current_article_no         = $rowContent->current_article_no;
                            $other_article_part_doi_no  = explode(",", $rowContent->other_article_part_doi_no);
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
                                <div class="item list-post">
                                    
                                    <?php if($rowContent->media == 'image'){?>
                                        <!-- <div class="post-gallery"> -->
                                            <img src="<?=env('UPLOADS_URL').'newcontent/'.$rowContent->cover_image?>" alt="<?=$rowContent->new_title?>">
                                        <!-- </div> -->
                                    <?php } else {?>
                                        <div class="video-post">
                                            <img alt="" src="https://img.youtube.com/vi/<?=$rowContent->videoId?>/hqdefault.jpg">
                                            <a href="https://www.youtube.com/watch?v=<?=$rowContent->videoId?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                        </div>
                                    <?php } ?>


                                    <div class="post-content">
                                        <a href="<?=url('category/' . $rowContent->parent_category_slug. '/' . $rowContent->sub_category_slug)?>"><?=$rowContent->sub_category_name?></a>
                                        <!-- <a href="?=url('subcategory/' . $rowContent->sub_category_slug)?>">?=$rowContent->sub_category_name?></a> -->
                                        <h2><a href="<?=url('content/' . $rowContent->parent_category_slug. '/' . $rowContent->sub_category_slug . '/' . $rowContent->slug)?>"><?=$rowContent->new_title?></a></h2>
                                        <ul class="post-tags">
                                            <!-- <li><i class="fa fa-clock-o"></i><?=date_format(date_create($rowContent->created_at), "d M Y")?></li> -->
                                            <!-- <li><i class="fa fa-user"></i>by <a href="javascript:void(0);"><?=(count(explode(' ', $rowContent->for_publication_name ?? $rowContent->author_name)) > 2) ? implode(' ', array_slice(explode(' ', $rowContent->author_name), 0, 2)) . ' ...' : $rowContent->author_name; ?></a></li> -->
                                            <li>
                                                <i class="fa fa-user"></i>
                                                by 
                                                <a href="javascript:void(0);">
                                                    <?php
                                                    $name = $rowContent->for_publication_name ?? $rowContent->author_name;
                                                    if (count(explode(' ', $name)) > 2) {
                                                        echo implode(' ', array_slice(explode(' ', $name), 0, 2)) . ' ...';
                                                    } else {
                                                        echo $name;
                                                    }
                                                    ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            <?php }?>
                        <?php } }?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End list line posts -->
        <!-- navbar list container -->
        <div class="nav-list-container">
            <div class="container">
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="d-flex align-items-center">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <!-- desktop -->
                        <ul class="nav navbar-nav navbar-left">
                            <!-- <li><a class="active" href="<?=url('/')?>">Home</a></li> -->
                            <li><a href="<?=url('communities')?>" style="color: black !important;">COMMUNITIES</a></li>
                            <?php if($parentCats){ foreach($parentCats as $parentCat){?>
                                <li class="drop-arrow"><a href="<?=url('category/' . $parentCat->slug)?>"><?=$parentCat->sub_category?></a>
                                    <div class="megadropdown">
                                        <div>
                                            <div class="inner-megadropdown world-dropdown">
                                                <div class="filter-block">
                                                    <ul class="filter-posts">
                                                        <?php
                                                        
                                                        $childCats = NewsCategory::select('id', 'sub_category', 'slug')->where('status', '=', 1)->where('parent_category', '=', $parentCat->id)->orderBy('sub_category', 'asc')->get();                                                                                                        
                                                        if($childCats){ $sl=1; foreach($childCats as $childCat){
                                                        ?>
                                                            <li><a <?=(($sl == 1)?'class="active"':'')?> href="<?=url('category/' . $parentCat->slug .'/'. $childCat->slug)?>"><?=$childCat->sub_category?></a></li>
                                                        <?php $sl++; } }?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php } }?>
                            <li><a href="<?=url('submissions')?>" style="color: black !important;">SUBMISSIONS</a></li>
                            {{-- <li><a href="?=env('REGENERATE_URL')?>contact.php" style="color: black !important;">CONTACT</a></li> --}}
                            <li><a href="<?=url('projects')?>" style="color: black !important;">PROJECTS</a></li>
                        </ul>
                        <!-- desktop -->
                    </div>
                    <div class="seach_holder">
                        <form class="navbar-form" method="GET" action="<?=url('search-result')?>" role="search">
                            <!-- @csrf -->
                            <input type="text" name="article_search" id="article-search" placeholder="search by title, author name, or content" value="<?=$search_keyword?>" onkeyup="getSuggestions(this.value);" style="text-transform: lowercase;" required>
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                        <div class="search_suggestion">
                            <ul id="suggestions"></ul>
                        </div>
                        <a href="#flipFlop" data-toggle="modal" data-target="#flipFlop" class="advserach_btn">Advanced Search</a>
                    </div>
                </div>
                
                <!-- /.navbar-collapse -->
            </div>
        </div>
        <!-- End navbar list container -->
    </nav>
    <!-- End Bootstrap navbar -->

<script>
    function getSuggestions() {
        let search_keyword = $('#article-search').val();
        // Check for HTML tags using a regular expression
        if (/<[a-z][\s\S]*>/i.test(search_keyword)) {
            alert("HTML tags are not allowed.");
            $('#article-search').val(''); // Clear the field if invalid input is detected
            return;
        }
        if (search_keyword.length >= 3) {
            var url = '<?=url('/')?>';
            $.ajax({
                url: url + '/fetch-search-suggestions',
                type: 'POST',
                data: { search_keyword: search_keyword, "_token": "{{ csrf_token() }}" },
                success: function (data) {
                    $('#suggestions').html(data);
                }
            });
        } else {
            $('#suggestions').html('');
        }
    }
</script>

