<?php
use App\Models\Category;
use App\Models\ListingAd;
use App\Models\ListingAdsImage;
use App\Models\ListingAdDocument;
use App\Models\VideoLibrary;
use App\Models\Wishlist;
use App\Helpers\Helper;
?>
<?php
$redirectUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<section class="banner-section ">
   <div id="banner-slider" class="owl-carousel">
      <?php if($banners){ foreach($banners as $row){?>
         <div class="item">
            <img class="img-fluid w-100" src="<?=env('UPLOADS_URL').'banner/'.$row->banner_image?>" alt="<?=$row->heading1?>">
            <div class="background-overlay"></div>
            <div class="container-xxl container-xl container-lg container-md container-sm container">
               <div class="banner-description">
                  <h1><?=$row->heading1?></h1>
               </div>
            </div>
         </div>
      <?php } }?>
   </div>
   <div class="search-field">
      <div class="container-xxl container-xl container-lg container-md container-sm container">
         <div class="search-list">
            <div class="row gx-2 align-items-center">
               <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-6  col-12">
                  <select class="form-select" aria-label="Default select example">
                     <option value="" selected="">Category</option>
                     <?php if($cats){ foreach($cats as $cat){?>
                     <option value="<?=$cat->id?>"><?=$cat->category_name?></option>
                     <?php } }?>
                  </select>
               </div>
               <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6  col-12 mt-2 mt-lg-0 mt-mb-0 mt-sm-0">
                  <select class="form-select" aria-label="Default select example">
                     <option value="" selected="">Manufacturer</option>
                     <?php if($manufacturers){ foreach($manufacturers as $manufacturer){?>
                     <option value="<?=$manufacturer->id?>"><?=$manufacturer->name?></option>
                     <?php } }?>
                  </select>
               </div>
               <div class="col-xxl-5 col-xl-5 col-lg-4 col-md-3 col-sm-12  col-12 mt-2 mb-2 mt-lg-0 mt-mb-0 mb-lg-0 mb-mb-0 ">
                  <div class="input-group">
                     <input type="search" id="form1" class="form-control" placeholder="Search by Product Name">
                  </div>
               </div>
               <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-3 col-sm-12  col-12">
                  <button type="submit" class="btn"><i class="search-icon">
                     <img class="img-fluid" src="<?=env('FRONT_ASSETS_URL')?>images/search.png" alt="image"></i>Search here
                  </button>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="featured-Products-section section-padding ">
   <div class="container-xxl container-xl container-lg container-md container-sm container">
      <div class="row">
         <div class="col-xl-12 text-left p-lg-0">
            <div class="section-title">
               <h2><?=$content->sec2_title?></h2>
            </div>
         </div>
      </div>
      <div class="innovative_services_slider">
         <?php if($featuredProducts){ foreach($featuredProducts as $row){?>
            <?php
            $parentCat                 = Category::select('category_name')->where('id', '=', $row->parent_category_id)->first();
            $childCat                  = Category::select('category_name')->where('id', '=', $row->child_category_id)->first();
            $imageCount                = ListingAdsImage::where('listing_id', '=', $row->id)->count();
            $videoCount                = VideoLibrary::where('machine_ids', 'LIKE', '%'.$row->id.'%')->count();
            ?>
            <div class="innovative_service_item">
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
                  <a href="<?=url('product-details/'.Helper::encoded($row->id))?>"><img class=" img-fluid w-100 img-height " src="<?=env('UPLOADS_URL').'ads/'.$row->cover_image?>" alt="<?=$row->name?>" /></a>
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
                        <?php if(empty(session('name'))){?>
                           <p><a href="javascript:void(0);" onclick="confirmRedirect('Please signin to add products in wishlist ?', '<?=Helper::encoded($redirectUrl)?>')"><i><img class="img-fluid" src="<?=env('FRONT_ASSETS_URL')?>images/wish-list-icon.svg" alt="icon" /></i>Add wishlist</a></p>
                        <?php } else {?>
                           <?php
                           $checkWishlist = Wishlist::where('user_id', '=', $uId)->where('product_id', '=', $row->id)->first();
                           if($checkWishlist){
                           ?>
                              <p><a href="<?=url('make-wishlist/' . $row->id . '/' .Helper::encoded($redirectUrl))?>"><i class="fa-solid fa-heart"></i>Remove from wishlist</a></p>
                           <?php } else {?>
                              <p><a href="<?=url('make-wishlist/' . $row->id . '/' .Helper::encoded($redirectUrl))?>"><i><img class="img-fluid" src="<?=env('FRONT_ASSETS_URL')?>images/wish-list-icon.svg" alt="icon" /></i>Add wishlist</a></p>
                           <?php }?>
                        <?php }?>
                        <a href="<?=url('product-details/'.Helper::encoded($row->id))?>">
                           <p class="compare-tag compare-tag-bg ">Compare</p>
                        </a>
                        <p class="prices-amount">$<?=number_format($row->asking_price,0)?></p>
                     </li>
                  </ul>
               </div>
            </div>
         <?php } }?>
      </div>
   </div>
</section>
<section class="latest-Products-section  section-padding ">
   <div class="container-xxl container-xl container-lg container-md container-sm container">
      <div class="row">
         <div class="col-xl-12 text-left p-lg-0">
            <div class="section-title">
               <h2><?=$content->sec3_title?></h2>
            </div>
         </div>
      </div>
      <div class="latest-Products_slider ">
         <?php if($latestProducts){ foreach($latestProducts as $row){?>
            <?php
            $parentCat                 = Category::select('category_name')->where('id', '=', $row->parent_category_id)->first();
            $childCat                  = Category::select('category_name')->where('id', '=', $row->child_category_id)->first();
            $imageCount                = ListingAdsImage::where('listing_id', '=', $row->id)->count();
            $videoCount                = VideoLibrary::where('machine_ids', 'LIKE', '%'.$row->id.'%')->count();
            ?>
            <div class="innovative_service_item">
               <div class="double-product">
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
                     <a href="<?=url('product-details/'.Helper::encoded($row->id))?>"> <img class=" img-fluid w-100 img-height " src="<?=env('UPLOADS_URL').'ads/'.$row->cover_image?>" alt="<?=$row->name?>" /></a>
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
                           <?php if(empty(session('name'))){?>
                              <p><a href="javascript:void(0);" onclick="confirmRedirect('Please signin to add products in wishlist ?', '<?=Helper::encoded($redirectUrl)?>')"><i><img class="img-fluid" src="<?=env('FRONT_ASSETS_URL')?>images/wish-list-icon.svg" alt="icon" /></i>Add wishlist</a></p>
                           <?php } else {?>
                              <?php
                              $checkWishlist = Wishlist::where('user_id', '=', $uId)->where('product_id', '=', $row->id)->first();
                              if($checkWishlist){
                              ?>
                                 <p><a href="<?=url('make-wishlist/' . $row->id . '/' .Helper::encoded($redirectUrl))?>"><i class="fa-solid fa-heart"></i>Remove from wishlist</a></p>
                              <?php } else {?>
                                 <p><a href="<?=url('make-wishlist/' . $row->id . '/' .Helper::encoded($redirectUrl))?>"><i><img class="img-fluid" src="<?=env('FRONT_ASSETS_URL')?>images/wish-list-icon.svg" alt="icon" /></i>Add wishlist</a></p>
                              <?php }?>
                           <?php }?>
                           <a href="<?=url('product-details/'.Helper::encoded($row->id))?>">
                              <p class="compare-tag compare-tag-bg ">Compare</p>
                           </a>
                           <p class="prices-amount">$<?=number_format($row->asking_price,0)?></p>
                        </li>
                     </ul>
                  </div>
               </div>
               <!-- <div class="double-product">
                  <div class="img-wrapper">
                     <ul class="image-action-btn">
                        <li>
                           <div class="new-tag used">Used</div>
                        </li>
                        <li class="photo-video-view">
                           <a href=""><i><img class=" img-fluid w-auto" src="<?=env('FRONT_ASSETS_URL')?>images/picture.png"
                                    alt="image" /></i>55</a>
                           <a href=""><i><img class=" img-fluid w-auto" src="<?=env('FRONT_ASSETS_URL')?>images/play.png" alt="image" /></i>14</a>
                        </li>
                     </ul>
                     <a href="#"> <img class=" img-fluid w-100 img-height " src="<?=env('FRONT_ASSETS_URL')?>images/product-2.png"
                           alt="image" /></a>
                  </div>
                  <div class="innovative_service_des">
                     <a href="#">
                        <h4 class="sub-title">Metos HP5</h4>
                     </a>
                     <ul>
                        <li>
                           <p>Crushers - Jaws</p>
                           <div>
                              <p><strong>Hours</strong>150</p>
                           </div>
                           <div>
                              <p><strong>Serial#</strong>33742</p>
                           </div>
                           <div>
                              <p><strong>ID#</strong>1021</p>
                           </div>
                        </li>
                        <li>
                           <p>+ Wishlist</p>
                           <p class="compare-tag  ">Compare</p>
                           <p class="prices-amount">$120,000</p>
                        </li>
                     </ul>
                  </div>
               </div> -->
            </div>
         <?php } }?>
      </div>
   </div>
</section>
<section class="industries-applications-section  section-padding ">
   <div class="container-xxl container-xl container-lg container-md container-sm container">
      <div class="row">
         <div class="col-xl-12 text-left">
            <div class="section-title">
               <h2><?=$content->sec4_title?></h2>
            </div>
         </div>
      </div>
      <div class="row justify-content-center mt-4">
         <?php if($parentCats){ foreach($parentCats as $parentCat){?>
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-6  col-12">
               <a href="<?=url('new-products-list')?>">
                  <div class="industries-list">
                     <div class="ins-icon">
                        <img class="img-fluid" src="<?=env('UPLOADS_URL').'category/'.$parentCat->cover_image?>" alt="<?=$parentCat->category_name?>" />
                     </div>
                     <h2><?=$parentCat->category_name?></h2>
                  </div>
               </a>
            </div>
         <?php } }?>
      </div>
   </div>
</section>
<section class="video-section  section-padding pt-0">
   <div class="container-xxl container-xl container-lg container-md container-sm container">
      <div class="row">
         <div class="col-xl-12 text-center">
            <div class="section-title">
               <h2><?=$content->sec5_title?></h2>
               <p><?=$content->sec5_description?></p>
            </div>
         </div>
         <div class="col-xl-12">
            <div class="video-item">
               <img class=" img-fluid " src="<?=env('UPLOADS_URL').'home_page/'.$content->sec5_video_cover_image?>" alt="<?=$content->sec5_title?>" />
               <a href="https://youtu.be/<?=$content->sec5_video_code?>" class="glightbox play-btn dtr-video-button" tabindex="-1"></a>
            </div>
         </div>
         <div class="col-xl-12 ">
            <p class="text-left video-description"><?=$content->sec5_description2?></p>
         </div>
      </div>
   </div>
</section>
<script type="text/javascript">
   function confirmRedirect(param, redirectLink) {
      var userConfirmation = confirm(param);
      if (userConfirmation) {
         var url = '<?=url('/signin/')?>' + '/' + redirectLink;
         // alert(url);
         window.location.href = url;
      }
   }
</script><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/front/pages/home.blade.php ENDPATH**/ ?>