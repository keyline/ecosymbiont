<?php
use App\Models\Category;
use App\Models\ListingAdsVisit;
use App\Helpers\Helper;
$controllerRoute = $module['controller_route'];
?>
<div class="pagetitle">
  <h1><?=$page_header?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=url('admin/dashboard')?>">Home</a></li>
      <li class="breadcrumb-item active"><?=$page_header?></li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-xl-12">
      <?php if(session('success_message')): ?>
        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show autohide" role="alert">
          <?php echo e(session('success_message')); ?>

          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>
      <?php if(session('error_message')): ?>
        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show autohide" role="alert">
          <?php echo e(session('error_message')); ?>

          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>
    </div>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">
            <a href="<?=url('admin/' . $controllerRoute . '/add/')?>" class="btn btn-outline-success btn-sm">Add <?=$module['title']?></a>
          </h5>
          <div class="dt-responsive table-responsive">
            <table id="simpletable" class="table table-striped table-bordered nowrap">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Manufacturer<br></th>
                  <th scope="col">Parent Category<br></th>
                  <th scope="col">Model</th>
                  <th scope="col">Serial Number</th>
                  <th scope="col">Hours<br>Year</th>
                  <th scope="col">Asking Price</th>
                  <th scope="col">Machine ID</th>
                  <th scope="col">Is Price Show</th>
                  <th scope="col">Is Feature</th>
                  <th scope="col">Is New</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(count($rows)>0){ $sl=1; foreach($rows as $row){?>
                  <tr>
                    <th scope="row"><?=$sl++?></th>
                    <td><?=$row->name?></td>
                    <td><?=$row->manufacturer_name?><br><?=$row->source_name?></td>
                    <td>
                      <?=$row->parent_cat_name?><br>
                      <?php
                      $cat                 = Category::select('category_name')->where('id', '=', $row->child_category_id)->first();
                      echo (($cat)?$cat->category_name:'');
                      ?>
                    </td>
                    <td><?=$row->model?></td>
                    <td><?=$row->serial_number?></td>
                    <td><?=$row->hours?><br><?=$row->year?></td>
                    <td><?=$row->asking_price?></td>
                    <td><?=$row->machine_id?></td>
                    <td>
                      <?php if($row->is_price_show == 'Yes'){?>
                        <a href="<?=url('admin/' . $controllerRoute . '/change-price/'.Helper::encoded($row->id))?>" class="badge bg-success" title="Dont Show <?=$module['title']?>"><i class="fa fa-check"></i> Show Price</a>
                      <?php } else {?>
                        <a href="<?=url('admin/' . $controllerRoute . '/change-price/'.Helper::encoded($row->id))?>" class="badge bg-danger" title="Show <?=$module['title']?>"><i class="fa fa-times"></i> Not Show</a>
                      <?php }?>
                    </td>
                    <td>
                      <?php if($row->is_feature == 'Yes'){?>
                        <a href="<?=url('admin/' . $controllerRoute . '/change-feature/'.Helper::encoded($row->id))?>" class="badge bg-success" title="Dont Show <?=$module['title']?>"><i class="fa fa-check"></i> Featured</a>
                      <?php } else {?>
                        <a href="<?=url('admin/' . $controllerRoute . '/change-feature/'.Helper::encoded($row->id))?>" class="badge bg-danger" title="Show <?=$module['title']?>"><i class="fa fa-times"></i> Non-Featured</a>
                      <?php }?>
                    </td>
                    <td>
                      <?php if($row->is_new == 'Yes'){?>
                        <a href="<?=url('admin/' . $controllerRoute . '/change-new/'.Helper::encoded($row->id))?>" class="badge bg-success" title="Dont Show <?=$module['title']?>"><i class="fa fa-check"></i> New</a>
                      <?php } else {?>
                        <a href="<?=url('admin/' . $controllerRoute . '/change-new/'.Helper::encoded($row->id))?>" class="badge bg-danger" title="Show <?=$module['title']?>"><i class="fa fa-times"></i> Not-New</a>
                      <?php }?>
                    </td>
                    <td>
                      <a href="<?=url('admin/' . $controllerRoute . '/edit/'.Helper::encoded($row->id))?>" class="btn btn-outline-primary btn-sm" title="Edit <?=$module['title']?>"><i class="fa fa-edit"></i></a>
                      <a href="<?=url('admin/' . $controllerRoute . '/delete/'.Helper::encoded($row->id))?>" class="btn btn-outline-danger btn-sm" title="Delete <?=$module['title']?>" onclick="return confirm('Do You Want To Delete This <?=$module['title']?>');"><i class="fa fa-trash"></i></a>
                      <?php if($row->status){?>
                        <a href="<?=url('admin/' . $controllerRoute . '/change-status/'.Helper::encoded($row->id))?>" class="btn btn-outline-success btn-sm" title="Activate <?=$module['title']?>"><i class="fa fa-check"></i></a>
                      <?php } else {?>
                        <a href="<?=url('admin/' . $controllerRoute . '/change-status/'.Helper::encoded($row->id))?>" class="btn btn-outline-warning btn-sm" title="Deactivate <?=$module['title']?>"><i class="fa fa-times"></i></a>
                      <?php }?>
                      <br><br>
                      <?php
                      $visitCount                 = ListingAdsVisit::select('user_mac_address', 'created_at')->where('status', '=', 1)->where('listing_id', '=', $row->id)->count();
                      ?>
                      <a target="_blank" href="<?=url('admin/' . $controllerRoute . '/visit-info/'.Helper::encoded($row->id))?>" class="btn btn-outline-info btn-sm" title="Visit <?=$module['title']?>"><i class="fa fa-info-circle"></i> Visit Info (<?=$visitCount?>)</a>
                    </td>
                  </tr>
                <?php } } else {?>
                  <tr>
                    <td colspan="11" style="text-align: center;color: red;">No Records Found !!!</td>
                  </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
          <!-- End Table with stripped rows -->
        </div>
      </div>
    </div>
  </div>
</section><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/admin/maincontents/listing-ad/list.blade.php ENDPATH**/ ?>