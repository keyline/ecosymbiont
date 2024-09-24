<?php
use App\Models\Category;
use App\Models\ListingAd;
use App\Models\ListingAdsImage;
use App\Models\ListingAdDocument;
use App\Models\VideoLibrary;
use App\Models\Source;
use App\Models\Manufacturer;
use App\Models\Wishlist;
use App\Helpers\Helper;
$parentCat                 = Category::select('category_name')->where('id', '=', $product->parent_category_id)->first();
$childCat                  = Category::select('category_name')->where('id', '=', $product->child_category_id)->first();
$source                    = Source::select('name')->where('id', '=', $product->source_id)->first();
$manufacturer              = Manufacturer::select('name')->where('id', '=', $product->manufacturer_id)->first();
$listingImages             = ListingAdsImage::select('image_link')->where('listing_id', '=', $product->id)->get();
$listingDocs               = ListingAdDocument::select('doc_name', 'doc_file')->where('listing_id', '=', $product->id)->get();
$listingVideos             = VideoLibrary::select('cover_image', 'video_link')->where('machine_ids', 'LIKE', '%'.$product->id.'%')->get();
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
<?php
$redirectUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<section class="product-details-section  section-padding ">
   <div class="container-xxl container-xl container-lg container-md container-sm container">
      <div class="row ">
         <div class="col-xl-12 text-center mb-3">
            <div class="top-breadcrumb">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="<?=url('/')?>">Home</a></li>
                     <li class="breadcrumb-item"><a href="javascript:void(0);">Crusher</a></li>
                     <li class="breadcrumb-item active" aria-current="page"><?=$product->name?></li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
      <div class="row ">
         <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12  col-12">
            <div class="product-details-left">

               <div class="row">
                  <div class="product-details-thumbnails">
                     <!-- MAIN SLIDES -->
                     <div class="slider-main">
                        <figure>
                           <img class="img-fluid" src="<?=env('UPLOADS_URL').'ads/'.$product->cover_image?>" alt="<?=$product->name?>">
                        </figure>
                        <?php if($listingImages){ foreach($listingImages as $listingImage){?>
                           <figure>
                              <img class="img-fluid" src="<?=env('UPLOADS_URL').'ads/'.$listingImage->image_link?>" alt="<?=$product->name?>">
                           </figure>
                        <?php } }?>
                     </div>
                     <!-- THUMBNAILS -->
                     <div class="slider-nav-thumbnails">
                        <div><img class="img-fluid" src="<?=env('UPLOADS_URL').'ads/'.$product->cover_image?>" alt="<?=$product->name?>"></div>
                        <?php if($listingImages){ foreach($listingImages as $listingImage){?>
                           <div><img class="img-fluid" src="<?=env('UPLOADS_URL').'ads/'.$listingImage->image_link?>" alt="<?=$product->name?>"></div>
                        <?php } }?>
                     </div>

                  </div>
               </div>
            </div>
         </div>
         <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12  col-12">
            <div class="product-details-right">
               <div class="repoting-wishlist">
                  <ul>
                     <li><a href="<?=url('report-listing/' . Helper::encoded($product->id))?>" data-toggle="tooltip" title="Listing Report"><i><img class="img-fluid" src="<?=env('FRONT_ASSETS_URL')?>images/tooltip-icon.svg" alt="icon" /></i>Report Listing</a></li>
                     <?php if(empty(session('name'))){?>
                        <li><a href="javascript:void(0);" onclick="confirmRedirect('Please signin to add products in wishlist ?', '<?=Helper::encoded($redirectUrl)?>')"><i><img class="img-fluid" src="<?=env('FRONT_ASSETS_URL')?>images/wish-list-icon.svg" alt="icon" /></i>Add to wishlist</a></li>
                     <?php } else {?>
                        <?php
                        $checkWishlist = Wishlist::where('user_id', '=', $uId)->where('product_id', '=', $product->id)->first();
                        if($checkWishlist){
                        ?>
                           <li><a href="<?=url('make-wishlist/' . $product->id . '/' .Helper::encoded($redirectUrl))?>"><i class="fa-solid fa-heart"></i>Remove from wishlist</a></li>
                        <?php } else {?>
                           <li><a href="<?=url('make-wishlist/' . $product->id . '/' .Helper::encoded($redirectUrl))?>"><i><img class="img-fluid" src="<?=env('FRONT_ASSETS_URL')?>images/wish-list-icon.svg" alt="icon" /></i>Add to wishlist</a></li>
                        <?php }?>
                     <?php }?>
                  </ul>
               </div>
               <div class="product-title">
                  <h1><?=$product->name?></h1>
               </div>
               <div class="single-product-information">
                  <ul>
                     <li>
                        <div>
                           <p><strong>Manufacturer:</strong><?=(($manufacturer)?$manufacturer->name:'')?></p>
                        </div>
                        <div>
                           <p><strong>Model:</strong><?=$product->model?></p>
                        </div>
                        <div>
                           <p><strong>Serial Number:</strong><?=$product->serial_number?></p>
                        </div>
                        <div>
                           <p><strong>Hours:</strong><?=$product->hours?></p>
                        </div>
                        <div>
                           <p><strong>Machine ID:</strong><?=$product->machine_id?></p>
                        </div>
                     </li>
                     <li></li>
                     <li>
                        <div>
                           <p><strong>Source ID:</strong><?=(($source)?$source->name:'')?></p>
                        </div>
                        <div>
                           <p><strong>Category:</strong><?=(($parentCat)?$parentCat->category_name:'')?></p>
                        </div>
                        <div>
                           <p><strong>Sub-Category:</strong><?=(($childCat)?$childCat->category_name:'')?></p>
                        </div>
                        <div>
                           <p><strong>Condition:</strong><?=$product->overall_condition?></p>
                        </div>
                        <div>
                           <p><strong>Year:</strong><?=$product->year?></p>
                        </div>
                     </li>
                  </ul>
               </div>
               <div class="contact-inquiry-compare-list-section">
                  <ul>
                     <li>
                        <!-- <?php if(empty(session('name'))){?>
                           <a href="javascript:void(0);" class="contact-inquiry-btn" onclick="confirmRedirect('Please signin to post for sales inquiry ?', '<?=Helper::encoded($redirectUrl)?>')">Contact For Sales Inquiry</a>
                        <?php } else {?>
                           <a href="<?=url('contact-for-sales-inquiry/' . Helper::encoded($product->id))?>" class="contact-inquiry-btn">Contact For Sales Inquiry</a>
                        <?php }?> -->
                        <a href="<?=url('contact-for-sales-inquiry/' . Helper::encoded($product->id))?>" class="contact-inquiry-btn">Contact For Sales Inquiry</a>
                     </li>
                     <li>
                        <a href="#" class="compare-list-btn"><i><img class="img-fluid" src="<?=env('FRONT_ASSETS_URL')?>images/compare-list-icon.svg" alt="icon" /></i>Add To Compare List</a>
                     </li>
                  </ul>
               </div>
               <div class="single-product-about-des">
                  <h2>About the Machine</h2>
                  <p><?=$product->addl_info?></p>
               </div>

            </div>
         </div>
      </div>
   </div>
</section>
<section class="related-video-section section-padding ">
   <div class="container-xxl container-xl container-lg container-md container-sm container">
      <div class="row">
         <div class="col-xl-12 text-left ">
            <div class="section-title">
               <h2>Related Video</h2>
            </div>
         </div>
         <div class="col-xl-12">
            <div class="related-video_slider">
               <?php if($listingVideos){ foreach($listingVideos as $listingVideo){?>
                  <div class="related-video_item">
                     <div class="video-item">
                        <img class="img-fluid" src="<?=env('UPLOADS_URL').'video/'.$listingVideo->cover_image?>" alt="<?=$product->name?>">
                        <a href="<?=$listingVideo->video_link?>" class="glightbox play-btn dtr-video-button" tabindex="-1"></a>
                     </div>
                  </div>
               <?php } } ?>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="pdf-download-section section-padding ">
   <div class="container-xxl container-xl container-lg container-md container-sm container">
      <div class="row">
         <div class="col-xl-12 text-left ">
            <div class="section-title">
               <h2>Related Documents For Download</h2>
            </div>
         </div>
         <div class="col-xl-12 ">
            <div class="pdf-download-slider">
               <?php if($listingDocs){ foreach($listingDocs as $listingDoc){?>
                  <div class="pdf-download-item">
                     <div class="pdf-icon">
                        <a href="<?=env('UPLOADS_URL').'ads/'.$listingDoc->doc_file?>" download>
                           <img class="img-fluid" src="<?=env('FRONT_ASSETS_URL')?>images/pdf.png" alt="<?=$listingDoc->doc_name?>">
                        </a>
                     </div>
                     <p> <a href="<?=env('UPLOADS_URL').'ads/'.$listingDoc->doc_file?>" download><?=$listingDoc->doc_name?></a></p>
                  </div>
               <?php } }?>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="product-specification-section section-padding ">
   <div class="container-xxl container-xl container-lg container-md container-sm container">
      <div class="row">
         <div class="col-xl-12 text-left  ">
            <div class="section-title">
               <h2>Product Specification</h2>
            </div>
         </div>

         <div class="col-lg-12">
            <div class="single-product-information product-specification-information">
               <ul>
                  <li>
                     <h2>Engine and Components</h2>
                     <div>
                        <p><strong>Engine Burns Oil:</strong><?=$product->engine_burns_oil?></p>
                     </div>
                     <div>
                        <p><strong>Engine Oil Leaks:</strong><?=$product->engine_oil_leaks?></p>
                     </div>
                     <div>
                        <p><strong>Conveyor Belts Condition:</strong><?=$product->conveyor_belt_condition?></p>
                     </div>
                     <div>
                        <p><strong>Engine Parts Condition:</strong><?=$product->engine_parts_condition?></p>
                     </div>
                     <div>
                        <p><strong>Engine Condition: </strong><?=$product->engine_condition?></p>
                     </div>
                  </li>
                  <li></li>
                  <li>
                     <h2>Body</h2>
                     <div>
                        <p><strong>Physical Damage:</strong><?=$product->physical_damage?></p>
                     </div>
                     <div>
                        <p><strong>Paint Condition:</strong><?=$product->paint_condition?></p>
                     </div>
                     <div>
                        <p><strong>Overall Appearance:</strong><?=$product->overall_appearance?></p>
                     </div>
                  </li>
                  <li></li>
                  <li>
                     <h2>Drivetrain and Mechanical</h2>
                     <div>
                        <p><strong>Rollers:</strong><?=$product->rollers?></p>
                     </div>
                     <div>
                        <p><strong>Tracks:</strong><?=$product->tracks?></p>
                     </div>
                     <div>
                        <p><strong>Tracks Condition:</strong><?=$product->tracks_condition?></p>
                     </div>
                     <div>
                        <p><strong>Wheels:</strong><?=$product->wheels?></p>
                     </div>
                     <div>
                        <p><strong>Wheels Condition:</strong><?=$product->wheels_condition?></p>
                     </div>
                  </li>
                  <li></li>
                  <li>
                     <h2>Hydraulics</h2>
                     <div>
                        <p><strong>Pumps and Motor Leaks:</strong><?=$product->pumps_motors_leaks?></p>
                     </div>
                     <div>
                        <p><strong>Hose Leaks:</strong><?=$product->hose_leaks?></p>
                     </div>
                     <div>
                        <p><strong>Hydraulic System Condition:</strong><?=$product->hydraulic_system_condition?></p>
                     </div>
                  </li>
               </ul>
            </div>
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
</script><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/front/pages/product-details.blade.php ENDPATH**/ ?>