<?php
use App\Helpers\Helper;
$controllerRoute = $module['controller_route'];
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<style type="text/css">
  .choices__list--multiple .choices__item {
    background-color: #132144;
    border: 1px solid #132144;
  }
</style>
<div class="pagetitle">
  <h1><?=$page_header?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=url('admin/dashboard')?>">Home</a></li>
      <li class="breadcrumb-item active"><a href="<?=url('admin/' . $controllerRoute . '/list/')?>"><?=$module['title']?> List</a></li>
      <li class="breadcrumb-item active"><?=$page_header?></li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section profile">
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
    <?php
    if($row){
      $title                    = $row->title;
      $video_type               = $row->video_type;
      $video_link               = $row->video_link;
      $video_code               = $row->video_code;
      $manufacturer_id          = $row->manufacturer_id;
      $cover_image              = $row->cover_image;
      $machine_ids              = (($row->machine_ids != '')?json_decode($row->machine_ids):[]);
    } else {
      $title                    = '';
      $video_type               = '';
      $video_link               = '';
      $video_code               = '';
      $manufacturer_id          = '';
      $cover_image              = '';
      $machine_ids              = [];
    }
    ?>
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body pt-3">
          <form method="POST" action="" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row mb-3">
              <label for="title" class="col-md-2 col-lg-2 col-form-label">Title</label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="title" class="form-control" id="title" value="<?=$title?>" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="manufacturer_id" class="col-md-2 col-lg-2 col-form-label">Manufacturer</label>
              <div class="col-md-10 col-lg-10">
                  <select name="manufacturer_id" class="form-control" id="manufacturer_id" required>
                    <option value="" selected>Select Manufacturer</option>
                    <?php if($manufacturers){ foreach($manufacturers as $manufacturer){?>
                    <option value="<?=$manufacturer->id?>" <?=(($manufacturer->id == $manufacturer_id)?'selected':'')?>><?=$manufacturer->name?></option>
                    <?php } }?>
                  </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="video_type" class="col-md-2 col-lg-2 col-form-label">Video Type</label>
              <div class="col-md-10 col-lg-10">
                  <select name="video_type" class="form-control" id="video_type" required>
                    <option value="" selected>Select Video Type</option>
                    <option value="YOUTUBE" <?=(($video_type == 'YOUTUBE')?'selected':'')?>>YOUTUBE</option>
                    <option value="VIMEO" <?=(($video_type == 'VIMEO')?'selected':'')?>>VIMEO</option>
                  </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="video_link" class="col-md-2 col-lg-2 col-form-label">Video Link</label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="video_link" class="form-control" id="video_link" value="<?=$video_link?>" required>
                <?php if($video_type == 'YOUTUBE'){?>
                  <iframe width="350" height="175" src="https://www.youtube.com/embed/<?=$video_code?>" title="<?=$title?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <?php } else {?>
                  <iframe src="https://player.vimeo.com/video/<?=$video_code?>?h=86f5b1ebe6" width="350" height="175" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                <?php }?>
              </div>
            </div>
            <div class="row mb-3">
              <label for="choices-multiple-remove-button" class="col-md-2 col-lg-2 col-form-label">Machines</label>
              <div class="col-md-10 col-lg-10">
                  <select name="machine_ids[]" class="form-control" id="choices-multiple-remove-button" multiple required>
                    <?php if($machines){ foreach($machines as $machine){?>
                      <option value="<?=$machine->id?>" <?=((in_array($machine->id, $machine_ids))?'selected':'')?>><?=$machine->machine_id?> (<?=$machine->model?>)</option>
                    <?php } }?>
                  </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="cover_image" class="col-md-2 col-lg-2 col-form-label">Cover Image</label>
              <div class="col-md-10 col-lg-10">
                <input type="file" name="cover_image" class="form-control" id="cover_image">
                <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed</small><br>
                <?php if($cover_image != ''){?>
                  <img src="<?=env('UPLOADS_URL').'video/'.$cover_image?>" alt="<?=$title?>" style="width: 150px; height: 150px; margin-top: 10px;">
                <?php } else {?>
                  <img src="<?=env('NO_IMAGE')?>" alt="<?=$title?>" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                <?php }?>
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary"><?=(($row)?'Save':'Add')?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
      removeItemButton: true,
      maxItemCount:30,
      searchResultLimit:30,
      renderChoiceLimit:30
    });
  });
</script><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/admin/maincontents/video-library/add-edit.blade.php ENDPATH**/ ?>