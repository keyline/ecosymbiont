<div class="inner-banner">
    <div class="background-overlay"></div>
    <h3><?=$page_header?></h3>
</div>
<section class="about-us-section section-padding">
    <div class="container-xxl container-xl container-lg container-md container-sm container">
        <div class="row ">
            <div class="col-xl-5">
                <img class="img-fluid about-left " src="<?=(($page->page_image != '')?env('UPLOADS_URL').'page/'.$page->page_image:env('NO_IMAGE'))?>" alt="<?=$page_header?>">
            </div>
            <div class="col-xl-7">
                <p class="mb-4"><?=(($page)?$page->page_content:'')?></p>
            </div>
        </div>
    </div>
    </div>
</section><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/front/pages/page-content.blade.php ENDPATH**/ ?>