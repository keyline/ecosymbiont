<?php
use App\Models\NewsCategory;
use App\Models\NewsContent;
use App\Helpers\Helper;
?>
<div class="container">
    <div class="footer-widgets-part">
        <div class="row">
            <div class="col-md-6">
                <div class="widget text-widget">
                    <h1>About</h1>
                    <p><?=$generalSetting->footer_description?></p>
                    <a href="index.html"><img src="images/logo.png" alt=""></a>
                </div>
            </div>
            <!-- <div class="col-md-3">
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
            </div> -->
            <div class="col-md-6">
                <div class="widget posts-widget">
                    <h1>Random Post</h1>
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
            <!-- <div class="col-md-3">
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
            </div> -->
        </div>
    </div>
    <div class="footer-last-line">
        <div class="row">
            <div class="col-md-6">
                <p><?=$generalSetting->footer_text?></p>
            </div>
            <div class="col-md-6">
                <nav class="footer-nav">
                    <ul>
                        <li><a href="<?=url('/')?>">Home</a></li>
                        <li><a href="<?=url('page/about-us')?>">About</a></li>
                        <!-- <li><a href="<?=url('contact-us')?>">Contact</a></li> -->
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div><?php /**PATH G:\xampp8.2\htdocs\ecosymbiont\resources\views/front/elements/footer.blade.php ENDPATH**/ ?>