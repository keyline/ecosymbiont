<?php
use App\Models\Category;
use App\Models\ListingAd;
use App\Models\ListingAdsImage;
use App\Models\ListingAdDocument;
use App\Models\VideoLibrary;
use App\Helpers\Helper;
?>
<div class="row mt-3">
   <div class="col-lg-12">
      <?php if(session('success_message')): ?>
         <h6 class="alert alert-success autohide"><?php echo e(session('success_message')); ?></h6>
      <?php endif; ?>
      <?php if(session('error_message')): ?>
         <h6 class="alert alert-danger autohide"><?php echo e(session('error_message')); ?></h6>
      <?php endif; ?>
   </div>
</div>
<div class="row mt-2">
   <?php if(count($products) > 0){ foreach($products as $row){?>
      <?php
      $parentCat                 = Category::select('category_name')->where('id', '=', $row->parent_category_id)->first();
      $childCat                  = Category::select('category_name')->where('id', '=', $row->child_category_id)->first();
      $imageCount                = ListingAdsImage::where('listing_id', '=', $row->id)->count();
      $videoCount                = VideoLibrary::where('machine_ids', 'LIKE', '%'.$row->id.'%')->count();
      ?>
      <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6  col-12">
         <div class="innovative_service_item double-product products_item">
            <div class="img-wrapper">
               <ul class="image-action-btn">
                  <li>
                     <?php if($row->is_new == 'Yes'){?>
                        <div class="new-tag">New</div>
                     <?php } else {?>
                        <div class="new-tag used">Used</div>
                     <?php }?>
                  </li>
                  <li class="photo-video-view">
                     <a href="<?=url('product-details/'.Helper::encoded($row->id))?>"><i><img class=" img-fluid w-auto" src="<?=env('FRONT_ASSETS_URL')?>images/picture.png" alt="image" /></i><?=$imageCount?></a>
                     <a href="<?=url('product-details/'.Helper::encoded($row->id))?>"><i><img class=" img-fluid w-auto" src="<?=env('FRONT_ASSETS_URL')?>images/play.png" alt="image" /></i><?=$videoCount?></a>
                  </li>
               </ul>
               <a href="<?=url('product-details/'.Helper::encoded($row->id))?>"> <img class="img-fluid w-100 img-height" src="<?=env('UPLOADS_URL').'ads/'.$row->cover_image?>" alt="<?=$row->name?>" /></a>
            </div>
            <div class="innovative_service_des">
               <a href="<?=url('product-details/'.Helper::encoded($row->id))?>">
                  <h4 class="sub-title"><?=$row->name?></h4>
               </a>
               <ul>
                  <li>
                     <p><?=(($parentCat)?$parentCat->category_name:'')?></p>
                     <p><small><?=(($childCat)?$childCat->category_name:'')?></small></p>
                     <div>
                        <p><strong>Hours</strong><small><?=$row->hours?></small></p>
                     </div>
                     <div>
                        <p><strong>Serial#</strong><small><?=$row->serial_number?></small></p>
                     </div>
                     <div>
                        <p><strong>ID#</strong><small><?=$row->machine_id?></small></p>
                     </div>
                  </li>
                  <li>
                     <p>+ Wishlist</p>
                     <p class="compare-tag compare-tag-bg">Compare</p>
                     <p class="prices-amount">$<?=number_format($row->asking_price,0)?></p>
                     <a href="<?=url('user/remove-wishlist/' . Helper::encoded($row->wishlist_id))?>" onclick="return confirm('Do you want to remove this product from wishlist ?');"><p class="compare-tag compare-tag-bg">Remove From Wishlist</p></a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   <?php } } else {?>
      <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6  col-12">
         <h5 class="text-danger">No products are available in wishlist !!!</h5>
      </div>
   <?php }?>
</div><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/front/pages/user/wishlist.blade.php ENDPATH**/ ?>