<?php
use App\Models\Notice;
?>
<section class="journal_layout_system">
   <div class="container">
      <div class="row">
           <div class="col-md-12 mb-3">
               <div class="text-center">
                   <h1>Journal of Educare</h1>
                   <h3>Published by Department of Education</h3>
               </div>
           </div>
      </div>
      <div class="row">
           <div class="col-md-12 mb-3">
               <div class="about-left">
                   <h2>Archieve Journals</h2>
                   <a href="<?=url('submit-manuscript')?>" class="achive">Submit Manuscript</a>
                   <a href="<?=url('/')?>" class="achive">Recent</a>
               </div>
           </div>
      </div>
      <div class="row">
         <?php if($rows){ foreach($rows as $row){?>
            <div class="col-md-6 col-lg-4">
               <div class="journal_items">
                   <div class="jourl_title">
                       <h3><?=$row->name?></h3>
                       <div class="datebox"> <?=date_format(date_create($row->notice_date), "M d, Y")?></div>
                   </div>
                   <div class="summary"><?=$row->description?></div>
                   <div class="author_info">
                       <p>Publisher Name: <strong><?=$row->publisher_name?></strong></p>
                       <p>ISSN No: <strong><?=$row->issn_no?></strong></p>
                       <p>Volume: <strong><?=$row->volume?></strong></p>
                       <p>Issue: <strong><?=$row->issue?></strong></p>
                       <p>Frequency: <strong> <?php echo e($row->journalFrequency->name); ?> </strong></p>
                       <br>
                       <!--<p><?=$row->author_email?></p>-->
                   </div>
                   <div class="postdate_pdf">
                       <div class="journal_pdf"><a target="_blank" href="<?=env('UPLOADS_URL').'notice/'.$row->notice_file?>">View <i class="fa-solid fa-file-pdf"></i></a></div>
                   </div>
                   <div class="keyword">Keyword:
                     <?php
                     $keywords = explode(",", $row->keywords);
                     if(!empty($keywords)){ for($k=0;$k<count($keywords);$k++){
                     ?>
                     <!-- <a href="#">test</a>, -->
                     <span><?=$keywords[$k]?></span>
                     <?php } }?>
                  </div>
               </div>
            </div>
        <?php } }?>
      </div>
   </div>
</section>
<?php /**PATH /home/keyline1/public_html/ecosymbiont.keylines.net.in/resources/views/front/pages/archieve.blade.php ENDPATH**/ ?>