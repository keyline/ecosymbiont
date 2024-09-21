
    <!-- block-wrapper-section
        ================================================== -->
    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 content-blocker">
                    <!-- block content -->
                    <div class="block-content">
                        <div class="article-box">
                            <div class="title-section">
                                <h1><span><?=$page_header?></span></h1>
                            </div>
                            <?php if($row){?>
                                <div class="news-post article-post">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <?php if($row->page_image != ''){?>
                                                <div class="post-gallery">
                                                    <img alt="<?=$row->page_name?>" src="<?=env('UPLOADS_URL').'page/'.$row->page_image?>">
                                                </div>
                                            <?php } else {?>
                                                <img alt="<?=$row->page_name?>" src="<?=env('NO_IMAGE')?>">
                                            <?php } ?>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="post-content">
                                                <!-- <a href="politcs-category.html">Politics</a> -->
                                                <h2><a href="javascript:void(0);"><?=$row->page_name?></a></h2>
                                                <!-- <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                    <li><i class="fa fa-user"></i>by <a href="#">John Doe</a></li>
                                                    <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                    <li><i class="fa fa-eye"></i>872</li>
                                                </ul> -->
                                                <p><?=$row->page_name?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                    <!-- End block content -->
                </div>
            </div>
        </div>
    </section>
    <!-- End block-wrapper-section -->