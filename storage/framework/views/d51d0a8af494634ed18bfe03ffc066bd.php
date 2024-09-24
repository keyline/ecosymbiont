<div class="inner-banner">
    <h3><?=$page_header?></h3>
</div>
<div class="common-inner">
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-md-3">
                <?php if($page){?>
                    <img src="<?=(($page->page_image != '')?env('UPLOADS_URL').'page/'.$page->page_image:env('NO_IMAGE'))?>">
                <?php }?>
            </div>
            <div class="col-md-9">
                <?=(($page)?$page->page_content:'')?>
            </div>
        </div>
    </div>
</div><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/pages/page-content.blade.php ENDPATH**/ ?>