<?php
//  use Illuminate\Support\Facades\Route;
//  $routeName = Route::current();
//  $pageName = explode('/', $routeName->uri());
//  $pageSegment = $pageName[1];
?>
<!-- block-wrapper-section ================================================== -->
<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 content-blocker">
                <!-- block content -->
                <div class="block-content">
                    <div class="article-box">                            
                        <div class="titleto-box">
                            <h1>COMMUNITIES</h1>  
                            <p class="black">As part of its <a target="_blank" href="<?=env('REGENERATE_URL')?>" style="color: #d09c1c;">Ecosymbionts Regenerate</a> initiative, the Śramani Institute provides several communities (whether formed through geography or like-minded collaboration) a <strong><em>Virtual Community Center</em></strong> dedicated to the specific needs of each community.</p>
                            <p class="black">We appreciate your patience as we develop this feature.</p>
                            <p class="black">Currently, we are working with the communities below.</p>
                            <div class="titleto-inner">
                                <ul>
                                    <li><a target="_blank" href="<?=url('communities/schumacher-Wild')?>" style="color: #d09c1c;"><em>Schumacher Wild</em></a> (global)</li>
                                    <li><a target="_blank" href="<?=url('communities/west-oakland-matters')?>" style="color: #d09c1c;"><em>West Oakland Matters</em></a> (United States)</li>
                                </ul>
                            </div>
                            <p class="black">If your community is interested in having a <em>Virtual Community Center</em>, please <a href="<?=env('REGENERATE_URL')?>contact.php" style="color: #d09c1c;">contact us.</a></p>
                        </div>                          
                    </div>
                </div>
                <!-- End block content -->
            </div>
        </div>
    </div>
</section>
<!-- End block-wrapper-section -->