<?php
use App\Models\Manufacturer;
use App\Models\ListingAd;
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
                  <th scope="col">Title</th>
                  <th scope="col">Type</th>
                  <th scope="col">Manufacturer</th>
                  <th scope="col">Video Preview</th>
                  <th scope="col">Machine Ids</th>
                  <th scope="col">Cover Image</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(count($rows)>0){ $sl=1; foreach($rows as $row){?>
                  <tr>
                    <th scope="row"><?=$sl++?></th>
                    <td><?=$row->title?></td>
                    <td><?=$row->video_type?></td>
                    <td>
                      <?php
                      $cat                 = Manufacturer::select('name')->where('id', '=', $row->manufacturer_id)->first();
                      echo (($cat)?$cat->name:'');
                      ?>
                    </td>
                    <td>
                      <?php if($row->video_type == 'YOUTUBE'){?>
                        <iframe width="350" height="175" src="https://www.youtube.com/embed/<?=$row->video_code?>" title="<?=$row->title?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                      <?php } else {?>
                        <iframe src="https://player.vimeo.com/video/<?=$row->video_code?>?h=86f5b1ebe6" width="350" height="175" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                      <?php }?>
                    </td>
                    <td>
                      <ul>
                        <?php
                        $machine_ids      = (($row->machine_ids)?json_decode($row->machine_ids):[]);
                        if(!empty($machine_ids)){ for($c=0;$c<count($machine_ids);$c++){
                          $getMachine               = ListingAd::select('model', 'machine_id')->where('id', '=', $machine_ids[$c])->first();
                        ?>
                          <li><?=(($getMachine)?'<b>'.$getMachine->machine_id.'</b> - '.$getMachine->model:'')?></li>
                        <?php } }?>
                      </ul>
                    </td>
                    <td>
                      <?php if($row->cover_image != ''){?>
                        <img src="<?=env('UPLOADS_URL').'video/'.$row->cover_image?>" alt="<?=$row->title?>" style="width: 100px; height: 100px; margin-top: 10px;">
                      <?php } else {?>
                        <img src="<?=env('NO_IMAGE')?>" alt="<?=$row->title?>" class="img-thumbnail" style="width: 100px; height: 100px; margin-top: 10px;">
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
                    </td>
                  </tr>
                <?php } } else {?>
                  <tr>
                    <td colspan="6" style="text-align: center;color: red;">No Records Found !!!</td>
                  </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/admin/maincontents/video-library/list.blade.php ENDPATH**/ ?>