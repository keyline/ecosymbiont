<?php
use App\Models\ListingAd;
use App\Models\ReportListingReason;
use App\Helpers\Helper;
?>
<div class="row">
   <div class="col-12">
      <div class="card mb-4">
         <div class="card-header pb-0">
            
         </div>
         <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
               <table class="table align-items-center mb-0">
                  <thead>
                     <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">User Info</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Name</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Info</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Offer Price</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Message</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                        <th class="text-secondary opacity-7"></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(count($rows)>0){ $sl=1; foreach($rows as $row){?>
                     <tr>
                        <td class="align-middle text-center">
                           <span class="text-secondary text-xs font-weight-bold"><?=$sl++?></span>
                        </td>
                        <td>
                           <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                 <p class="text-xs font-weight-bold mb-0"><?=$row->fname . ' ' . $row->lname?></p>
                                 <p class="text-xs text-secondary mb-0"><?=$row->email?></p>
                                 <p class="text-xs text-secondary mb-0"><?=$row->phone?></p>
                              </div>
                           </div>
                        </td>
                        <td class="align-middle text-center">
                           <span class="text-secondary text-xs font-weight-bold">
                              <?php
                              $productEditLink = url('user/my-listing-ad-edit/' . Helper::encoded($row->product_id));
                              $getListing = ListingAd::where('id', '=', $row->product_id)->first();
                              echo (($getListing)?'<a href="' . $productEditLink . '">' . $getListing->name . '</a>':'');
                              ?>
                           </span>
                        </td>
                        <td>
                           <p class="text-xs font-weight-bold mb-0"><?=$row->product_info?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                           <span class="badge badge-sm bg-gradient-success"><?=$row->offer_price?></span>
                        </td>
                        <td class="align-middle text-center">
                           <span class="text-secondary text-xs font-weight-bold"><?=wordwrap($row->message,35,"<br>\n")?></span>
                        </td>
                        <td class="align-middle text-center">
                           <span class="text-secondary text-xs font-weight-bold"><?=date_format(date_create($row->created_at), "M d, Y h:i A")?></span>
                        </td>
                        <!-- <td class="align-middle">
                           <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                           Edit
                           </a>
                        </td> -->
                     </tr>
                     <?php } }?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/front/pages/user/my-sales-enquires.blade.php ENDPATH**/ ?>