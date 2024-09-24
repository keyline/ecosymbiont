<?php
use App\Models\Faq;
?>
<div class="inner-banner">
    <div class="background-overlay"></div>
    <h3><?=$page_header?></h3>
</div>
<section class="faq-section section-padding">
    <div class="container-xxl container-xl container-lg container-md container-sm container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <?php if($faqCats){ $i=1; foreach($faqCats as $faqCat){?>
                            <button class="nav-link <?=(($i == 1)?'active':'')?>" id="nav-<?=$faqCat->id?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?=$faqCat->id?>"
                            type="button" role="tab" aria-controls="nav-<?=$faqCat->id?>" aria-selected="true"><?=$faqCat->name?></button>
                        <?php $i++; } } ?>
                    </div>
                </nav>
                <div class="tab-content p-3 border bg-light bt-none" id="nav-tabContent">
                    <?php if($faqCats){ $i=1; foreach($faqCats as $faqCat){?>
                        <div class="tab-pane fade <?=(($i == 1)?'active show':'')?>" id="nav-<?=$faqCat->id?>" role="tabpanel" aria-labelledby="nav-<?=$faqCat->id?>-tab">
                            <div class="accordion" id="accordionExample<?=$faqCat->id?>">
                                <?php
                                $faqs = Faq::where('faq_category_id', '=', $faqCat->id)->where('status', '=', 1)->get();
                                if($faqs){ $k=1; foreach($faqs as $faq){
                                ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading<?=$faq->id?>">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse<?=$faq->id?>" aria-expanded="false" aria-controls="collapseTwo">
                                            <?=$faq->question?>
                                            </button>
                                        </h2>
                                        <div id="collapse<?=$faq->id?>" class="accordion-collapse collapse" aria-labelledby="heading<?=$faq->id?>"
                                            data-bs-parent="#accordionExample<?=$faqCat->id?>">
                                            <div class="accordion-body">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                        <div class="tab-description">
                                                            <div class="course-list">
                                                                <p><?=$faq->answer?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php $k++; } } ?>
                            </div>
                        </div>
                    <?php $i++; } } ?>
                </div>
            </div>
        </div>
    </div>
</section><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/front/pages/faq.blade.php ENDPATH**/ ?>