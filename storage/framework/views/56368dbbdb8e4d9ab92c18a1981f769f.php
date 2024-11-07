<!-- Bootstrap CSS -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php
use App\Models\Faq;
?>
<div class="inner-banner">
    <h3><?=$page_header?></h3>
</div>
<div class="common-inner">
    <div class="container">
        <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <?php if($faqCats){ $sl=1; foreach($faqCats as $faqCat){?>
                    <button class="nav-link <?=(($sl == 1)?'active':'')?>" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-<?=$sl?>" type="button" role="tab" aria-controls="v-pills-home" aria-selected="<?=(($sl == 1)?'true':'false')?>"><?=$faqCat->name?></button>
                <?php $sl++; } }?>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
                <?php if($faqCats){ $sl=1; foreach($faqCats as $faqCat){?>
                    <div class="tab-pane fade <?=(($sl == 1)?'show active':'')?>" id="v-pills-<?=$sl?>" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="accordion" id="faq">
                            <?php
                            $faqs = Faq::where('status', '=', 1)->where('faq_category_id', '=', $faqCat->id)->orderBy('rank', 'ASC')->get();
                            if($faqs){ $i=1; foreach($faqs as $faq){
                            ?>
                            <div class="card">
                                <div class="card-header" id="faqhead<?=$faq->id?>">
                                    <a href="#" class="btn btn-header-link <?=(($i == 1)?'collapsed':'')?>" data-toggle="collapse" data-target="#faq<?=$faq->id?>"
                                        aria-expanded="true" aria-controls="faq1"><?=$faq->question?></a>
                                </div>
                                <div id="faq<?=$faq->id?>" class="collapse <?=(($i == 1)?'show':'')?>" aria-labelledby="faqhead<?=$faq->id?>" data-parent="#faq">
                                    <div class="card-body">
                                        <?=$faq->answer?>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; } }?>
                        </div>
                    </div>
                <?php $sl++; } }?>
            </div>
        </div>

        
    </div>
</div><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/pages/faq.blade.php ENDPATH**/ ?>