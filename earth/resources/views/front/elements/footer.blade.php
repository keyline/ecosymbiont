<?php
use App\Models\NewsCategory;
use App\Models\NewsContent;
use App\Models\Country;
use App\Models\EcosystemAffiliation;
use App\Helpers\Helper;

$country                = Country::select('id', 'name')->where('status', '=', 1)->orderBy('name', 'ASC')->get();
$ecosystem_affiliation  = EcosystemAffiliation::select('id', 'name')->where('status', '=', 1)->orderBy('name', 'ASC')->get();
?>
<div class="footer_top_menu">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="footer-nav">
                    <ul>
                        <li><a href="<?=url('/') ?>" target="_blank">Home</a></li>
                        <!-- <li><a href="<?=url('about-us')?>" target="_blank">About</a></li> -->
                        <li><a href="<?=url('communities')?>" target="_blank">Communities</a></li>
                        <li><a href="<?=env('REGENERATE_URL')?>contact.php" target="_blank">Contact</a></li>
                        <li class="foot-social-icons"><a class="twitter" href="<?=$generalSetting->twitter_profile?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li class="foot-social-icons"><a class="pinterest" href="<?=$generalSetting->instagram_profile?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <li class="foot-social-icons"><a target="_blank" class="facebook" href="<?=$generalSetting->facebook_profile?>"><i class="fa fa-facebook"></i></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="footer_copy_pow">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="foot_copyinfo"><?=$generalSetting->footer_description?></div>
                <div class="kelfot">
                    <a href="https://keylines.net/" target="_blank">Powered by Keyline</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="container">
    <div class="footer-widgets-part">
        <div class="row">
            <div class="col-md-6">
                <div class="widget text-widget">
                    <h1>About</h1>
                    <p></p>
                    <a href="index.html"><img src="images/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget tags-widget">
                    <h1>Popular Tags</h1>
                    <ul class="tag-list">
                        <li><a href="#">News</a></li>
                        <li><a href="#">Fashion</a></li>
                        <li><a href="#">Politics</a></li>
                        <li><a href="#">Sport</a></li>
                        <li><a href="#">Videos</a></li>
                        <li><a href="#">Business</a></li>
                        <li><a href="#">Food</a></li>
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">World</a></li>
                        <li><a href="#">Music</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="widget posts-widget">
                    <h1>Random Content</h1>
                    <ul class="list-posts">
                        <?php
                        $randomContents = NewsContent::join('news_category', 'news_contents.sub_category', '=', 'news_category.id')
                                                ->select('news_contents.id', 'news_contents.new_title', 'news_contents.sub_title', 'news_contents.slug', 'news_contents.author_name', 'news_contents.cover_image', 'news_contents.created_at', 'news_category.sub_category as sub_category_name', 'news_category.slug as sub_category_slug')
                                                ->where('news_contents.status', '=', 1)
                                                ->inRandomOrder()
                                                ->limit(3)
                                                ->get();
                        if($randomContents){ foreach($randomContents as $randomContent){
                        ?>
                            <li>
                                <img src="<?=env('UPLOADS_URL').'newcontent/'.$randomContent->cover_image?>" alt="<?=$randomContent->new_title?>">
                                <div class="post-content">
                                    <a href="<?=url('subcategory/' . $randomContent->sub_category_slug)?>"><?=$randomContent->sub_category_name?></a>
                                    <h2><a href="<?=url('content/' . $randomContent->slug)?>"><?=$randomContent->new_title?></a></h2>
                                    <ul class="post-tags">
                                        <li><i class="fa fa-clock-o"></i><?=date_format(date_create($randomContent->created_at), "d M Y")?></li>
                                    </ul>
                                </div>
                            </li>
                        <?php } }?>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget flickr-widget">
                    <h1>Flickr Photos</h1>
                    <ul class="flickr-list">
                        <li><a href="#"><img src="<?=env('FRONT_ASSETS_URL')?>upload/flickr/1.jpg" alt=""></a></li>
                        <li><a href="#"><img src="<?=env('FRONT_ASSETS_URL')?>upload/flickr/2.jpg" alt=""></a></li>
                        <li><a href="#"><img src="<?=env('FRONT_ASSETS_URL')?>upload/flickr/3.jpg" alt=""></a></li>
                        <li><a href="#"><img src="<?=env('FRONT_ASSETS_URL')?>upload/flickr/4.jpg" alt=""></a></li>
                        <li><a href="#"><img src="<?=env('FRONT_ASSETS_URL')?>upload/flickr/5.jpg" alt=""></a></li>
                        <li><a href="#"><img src="<?=env('FRONT_ASSETS_URL')?>upload/flickr/6.jpg" alt=""></a></li>
                    </ul>
                    <a href="#">View more photos...</a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-last-line">
        <div class="row">
            <div class="col-md-6">
                <p><?=$generalSetting->footer_text?></p>
            </div>
            <div class="col-md-6">
                
                
            </div>
        </div>
    </div>
</div> -->

<!-- The modal -->
<div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-center" role="document">
        <div class="modal-content advarnseach_section">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modalLabel">Advanced Search</h4>
            </div>
            <div class="modal-body">
                <form method="GET" action="<?=url('advance-search-result')?>">
                    <div class="advance_inner_search">
                        <select id="search_type" class="adv-search-field field-selector" name="search_type" required>
                            <option value="All Fields" selected="selected">All Fields</option>
                            <option value="Title">Title</option>
                            <option value="Author name">Author name</option>
                            <option value="Subtitle">Subtitle</option>
                            <option value="Ancestral ecoweb">Ancestral ecoweb</option>
                            <option value="Country of residence">Country of residence</option>
                            <option value="Organization">Organization</option>
                            <option value="Community">Community</option>
                            <option value="Tag">Tag</option>
                            <option value="Text">Text</option>
                        </select>

                        <select id="search_type_country" class="adv-search-field field-selector" name="search_type" style="display: none;">
                            <option value="All Fields" selected="selected">Select Country</option>
                            <?php if($country){ foreach($country as $cnt){?>
                                <option value="<?=$cnt->id?>"><?=$cnt->name?></option>
                            <?php } }?>
                        </select>
                        <select id="search_type_affiliation" class="adv-search-field field-selector" name="search_type" style="display: none;">
                            <option value="All Fields" selected="selected">Select Ecoweb Affiliation</option>
                            <?php if($ecosystem_affiliation){ foreach($ecosystem_affiliation as $ecoaff){?>
                                <option value="<?=$ecoaff->id?>"><?=$ecoaff->name?></option>
                            <?php } }?>
                        </select>
                        <input type="text" id="search_keyword" name="search_keyword" placeholder="Enter a search term" required>
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
        alert('ok');
    })
</script>