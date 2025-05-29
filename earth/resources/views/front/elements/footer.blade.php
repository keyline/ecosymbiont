<?php
use App\Models\NewsCategory;
use App\Models\NewsContent;
use App\Models\Country;
use App\Models\EcosystemAffiliation;
use App\Helpers\Helper;
use App\Models\Community;
use App\Models\Project;

$country                = Country::select('id', 'name')->where('status', '=', 1)->orderBy('name', 'ASC')->get();
$ecosystem_affiliation  = EcosystemAffiliation::select('id', 'name')->where('status', '=', 1)->orderBy('name', 'ASC')->get();
$community  = Community::select('id', 'name')->where('status', '=', 1)->orderBy('name', 'ASC')->get();
$projects  = Project::select('id', 'name')->where('status', '=', 1)->orderBy('name', 'ASC')->get();
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
                        <li><a href="<?=url('projects')?>" target="_blank">Projects</a></li>
                        <li><a href="<?=env('REGENERATE_URL')?>contact.php" target="_blank">Contact</a></li>
                        <li><a href="<?=$base_url?>earth/donation" target="_blank">Donate</a></li>
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
<!-- Modal -->
<div class="modal fade" id="popupModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <h4 class="modal-title">Help keep EaRTh free!</h4>
        <p>EaRTh is a vital and unique resource for grassroots changemakers across the world, especially members of frontline communities whose voices are seldom amplified.</p>
        <p>EaRTh provides the marginalized and silenced a global platform to share their challenges, solutions, and knowledge directly with all of us.</p>
        <p>How?</p>
        <p>By not censoring or gatekeeping, like so many journals and media do.</p>
        <p>And by keeping EaRTh free for the authors and free for the readers and viewers.</p>
        <p><u>But we can’t do this without your financial help.</u></p>
        <p>While EaRTh is free to use, we (a small nonprofit organization) need to pay the editorial staff, designers, software developers, and others who ensure that EaRTh runs smoothly, so we can serve those who need most to be heard.</p>
         <!-- <p>Join the fight today,<br><span class="highlight">your gift will be matched $2:$1!</span></p>  -->
        <a href="<?=url('donation')?>" target="_blank" class="btn btn-yellow">Donate to EaRTh</a><br>
        <a href="javascript:void(0);" class="continue-link" data-dismiss="modal">Continue to website →</a>
      </div>
    </div>
  </div>
</div>

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
                            <option value="" selected="selected">All Fields</option>
                            <option value="Title">Title</option>
                            <option value="Author name">Author name</option>
                            <option value="Subtitle">Subtitle</option>
                            <option value="Ancestral ecoweb">Ancestral ecoweb</option>
                            <option value="Country of residence">Country of residence</option>
                            <option value="Organization">Organization</option>
                            <option value="Community">Community</option>
                            <option value="Projects">Projects</option>
                            <option value="Tag">Tag</option>
                            <option value="Text">Text</option>
                        </select>

                        <select id="search_type_country" class="adv-search-field field-selector" name="search_keyword1" style="display: none;">
                            <option value="" selected="selected">Select Country</option>
                            <?php if($country){ foreach($country as $cnt){?>
                                <option value="<?=$cnt->id?>"><?=$cnt->name?></option>
                            <?php } }?>
                        </select>
                        <select id="search_type_affiliation" class="adv-search-field field-selector" name="search_keyword2" style="display: none;">
                            <option value="" selected="selected">Select Ecoweb Affiliation</option>
                            <?php if($ecosystem_affiliation){ foreach($ecosystem_affiliation as $ecoaff){?>
                                <option value="<?=$ecoaff->id?>"><?=$ecoaff->name?></option>
                            <?php } }?>
                        </select>
                        <select id="search_type_community" class="adv-search-field field-selector" name="search_keyword3" style="display: none;">
                            <option value="" selected="selected">Select Community</option>
                            <?php if($community){ foreach($community as $community_one){?>
                                <option value="<?=$community_one->name?>"><?=$community_one->name?></option>
                            <?php } }?>
                        </select>
                        <select id="search_type_projects" class="adv-search-field field-selector" name="search_keyword4" style="display: none;">
                            <option value="" selected="selected">Select Projects</option>
                            <?php if($projects){ foreach($projects as $projects_one){?>
                                <option value="<?=$projects_one->name?>"><?=$projects_one->name?></option>
                            <?php } }?>
                        </select>
                        <input type="text" id="search_keyword" name="search_keyword0" placeholder="Enter a search term" required>
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- stickt button --}}
<a href="<?=url('donation')?>" target="_blank" class="donate-button">Donate to EaRTh</a>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- <script>
    $(window).on('load', function () {
    $('#popupModal').modal('show');
  });
</script> -->
<script type="text/javascript">
    $(function(){
        $('#search_type').on('change', function(){
            var search_type = $("#search_type").val();
            // console.log(search_type);
            if(search_type == 'Country of residence'){
                $('input[name="search_keyword0"]').hide();
                $('input[name="search_keyword0"]').attr('required', false);
                $('select[name="search_keyword2"]').hide();
                $('select[name="search_keyword2"]').attr('required', false);
                $('select[name="search_keyword3"]').hide();
                $('select[name="search_keyword3"]').attr('required', false);
                $('select[name="search_keyword4"]').hide();
                $('select[name="search_keyword4"]').attr('required', false);

                $('select[name="search_keyword1"]').show();
                $('select[name="search_keyword1"]').attr('required', true);
            } else if(search_type == 'Ancestral ecoweb'){
                $('input[name="search_keyword0"]').hide();
                $('input[name="search_keyword0"]').attr('required', false);
                $('select[name="search_keyword1"]').hide();
                $('select[name="search_keyword1"]').attr('required', false);
                $('select[name="search_keyword3"]').hide();
                $('select[name="search_keyword3"]').attr('required', false);
                $('select[name="search_keyword4"]').hide();
                $('select[name="search_keyword4"]').attr('required', false);

                $('select[name="search_keyword2"]').show();
                $('select[name="search_keyword2"]').attr('required', true);
            } else if(search_type == 'Community'){
                $('input[name="search_keyword0"]').hide();
                $('input[name="search_keyword0"]').attr('required', false);
                $('select[name="search_keyword1"]').hide();
                $('select[name="search_keyword1"]').attr('required', false);
                $('select[name="search_keyword2"]').hide();
                $('select[name="search_keyword2"]').attr('required', false);
                $('select[name="search_keyword4"]').hide();
                $('select[name="search_keyword4"]').attr('required', false);

                $('select[name="search_keyword3"]').show();
                $('select[name="search_keyword3"]').attr('required', true);
            } else if(search_type == 'Projects'){
                $('input[name="search_keyword0"]').hide();
                $('input[name="search_keyword0"]').attr('required', false);
                $('select[name="search_keyword1"]').hide();
                $('select[name="search_keyword1"]').attr('required', false);
                $('select[name="search_keyword2"]').hide();
                $('select[name="search_keyword2"]').attr('required', false);
                $('select[name="search_keyword3"]').hide();
                $('select[name="search_keyword3"]').attr('required', false);

                $('select[name="search_keyword4"]').show();
                $('select[name="search_keyword4"]').attr('required', true);
            }else {
                $('select[name="search_keyword1"]').hide();
                $('select[name="search_keyword1"]').attr('required', false);
                $('select[name="search_keyword2"]').hide();
                $('select[name="search_keyword2"]').attr('required', false);
                $('select[name="search_keyword3"]').hide();
                $('select[name="search_keyword3"]').attr('required', false);
                $('select[name="search_keyword4"]').hide();
                $('select[name="search_keyword4"]').attr('required', false);

                $('input[name="search_keyword0"]').show();
                $('input[name="search_keyword0"]').attr('required', true);
            }
        });
    })
</script>
<!-- cookie set -->
<script>
    // function getCookie(name) {
    //     // alert(name);
    //     let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
    //     return match ? match[2] : null;
    // }

    // function setCookie(name, value, days) {
    //     let expires = "";
    //     if (days) {
    //         const date = new Date();
    //         date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    //         expires = "; expires=" + date.toUTCString();
    //     }
    //     document.cookie = name + "=" + value + expires + "; path=/";
    // }

    document.addEventListener("DOMContentLoaded", function () {
        const url = window.location.href;        
        const segments = url.split("/");        
        const pageName = segments.pop() || segments.pop(); // handles trailing slash        
        // If it's the home page (typically empty or index), show popup
        if (pageName === "earth") {
            const DelayNodelay = 5000; // Delay in milliseconds
            setTimeout(function () {
                $('#popupModal').modal('show'); // Bootstrap modal show
            }, DelayNodelay);
        }
    });
</script>