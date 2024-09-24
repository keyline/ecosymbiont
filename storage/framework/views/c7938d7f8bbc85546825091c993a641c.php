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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="row mt-2">
   <div class="col-xl-12">
      <?php if(session('success_message')): ?>
        <!-- <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show autohide" role="alert">
          <?php echo e(session('success_message')); ?>

          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> -->
        <script>
          $(function(){
              Swal.fire({
                  title: 'Success!',
                  text: '<?=session('success_message')?>',
                  icon: 'error',
                  confirmButtonText: 'Ok'
              });
          });
      </script>
      <?php endif; ?>
      <?php if(session('error_message')): ?>
        <!-- <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show autohide" role="alert">
          <?php echo e(session('error_message')); ?>

          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> -->
        <script>
          $(function(){
              Swal.fire({
                  title: 'Error!',
                  text: '<?=session('error_message')?>',
                  icon: 'error',
                  confirmButtonText: 'Ok'
              });
          });
      </script>
      <?php endif; ?>
   </div>
   <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12  col-12">
      <?php
      if($listingAds){ foreach($listingAds as $row){
      ?>
         <?php
         $parentCat                 = Category::select('category_name')->where('id', '=', $row->parent_category_id)->first();
         $childCat                  = Category::select('category_name')->where('id', '=', $row->child_category_id)->first();
         $imageCount                = ListingAdsImage::where('listing_id', '=', $row->id)->count();
         ?>
         <div class="innovative_service_item double-product products_item list-view-grid">
            <div class="img-wrapper">
               <a href="<?=url('product-details/'.Helper::encoded($row->id))?>"> <img class="img-fluid w-100 img-height" src="<?=env('FRONT_THEME_ASSETS_URL')?>img/product-1.png" alt="image"></a>
            </div>
            <div class="innovative_service_des">
               <div class="product-name-dropdown-item">
                  <a href="<?=url('product-details/'.Helper::encoded($row->id))?>">
                     <h4 class="sub-title"><?=$row->name?></h4>
                  </a>
                  <div class="dropdown ">
                     <a href="javascript:void(0);" class="text-secondary ps-4" id="dropdownCam" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php if($row->sale_availability == 'Available'){?>
                           <span class="badge bg-success">AVAILABLE</span>
                        <?php } else {?>
                           <span class="badge bg-danger">SOLD</span>
                        <?php } ?>
                        <i class="fas fa-ellipsis-v" aria-hidden="true"></i>
                     </a>
                     <ul class="dropdown-menu dropdown-menu-end me-sm-n4 px-2 py-3" aria-labelledby="dropdownCam">
                        <li><a class="dropdown-item border-radius-md" href="<?=url('user/my-listing-ad-edit/' . Helper::encoded($row->id))?>" onclick="return confirm('Do you want to edit this listing ads ?');">Edit Listing </a></li>

                        <li><a class="dropdown-item border-radius-md" href="<?=url('user/my-listing-ad-delete/' . Helper::encoded($row->id))?>" onclick="return confirm('Do you want to delete this listing ads ?');">Delete Listing </a></li>

                        <?php if($row->sale_availability == 'Available'){?>
                           <li><a class="dropdown-item border-radius-md" href="<?=url('user/my-listing-ad-change-availability/' . Helper::encoded($row->id))?>" onclick="return confirm('Do you want to mark as sold this listing ads ?');">Mark the listing ad as sold</a></li>
                        <?php } else {?>
                           <li><a class="dropdown-item border-radius-md" href="<?=url('user/my-listing-ad-change-availability/' . Helper::encoded($row->id))?>" onclick="return confirm('Do you want to mark as available this listing ads ?');">Mark the listing ad as available</a></li>
                        <?php } ?>

                        <?php if($row->status){?>
                           <li><a class="dropdown-item border-radius-md" href="<?=url('user/my-listing-ad-change-status/' . Helper::encoded($row->id))?>" onclick="return confirm('Do you want to mark as inactive this listing ads ?');">Mark the listing ad as Inactive</a> </li>
                        <?php } else {?>
                           <li><a class="dropdown-item border-radius-md" href="<?=url('user/my-listing-ad-change-status/' . Helper::encoded($row->id))?>" onclick="return confirm('Do you want to mark as active this listing ads ?');">Mark the listing ad as Active</a> </li>
                        <?php }?>
                     </ul>
                  </div>
               </div>
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
                        <p><a href="javascript:void(0);" onclick="confirmRedirect('Please signin to add products in wishlist ?', '<?=Helper::encoded($redirectUrl)?>')"><i><img class="img-fluid" src="<?=env('FRONT_ASSETS_URL')?>images/wish-list-icon.svg" alt="icon" /></i> Add to wishlist</a></p>
                     <?php } else {?>
                        <?php
                        $checkWishlist = Wishlist::where('user_id', '=', $uId)->where('product_id', '=', $row->id)->first();
                        if($checkWishlist){
                        ?>
                           <p><a href="<?=url('make-wishlist/' . $row->id . '/' .Helper::encoded($redirectUrl))?>"><i class="fa fa-heart"></i> Remove from wishlist</a></p>
                        <?php } else {?>
                           <p><a href="<?=url('make-wishlist/' . $row->id . '/' .Helper::encoded($redirectUrl))?>"><i><img class="img-fluid" src="<?=env('FRONT_ASSETS_URL')?>images/wish-list-icon.svg" alt="icon" /></i> Add to wishlist</a></p>
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
<script type="text/javascript">
   function confirmRedirect(param, redirectLink) {
      var userConfirmation = confirm(param);
      if (userConfirmation) {
         var url = '<?=url('/signin/')?>' + '/' + redirectLink;
         // alert(url);
         window.location.href = url;
      }
   }
</script><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/front/pages/user/my-listing-ad.blade.php ENDPATH**/ ?>