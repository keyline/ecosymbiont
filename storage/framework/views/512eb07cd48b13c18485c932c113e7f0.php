<?php
use App\Helpers\Helper;
$sessionType                    = Session::get('type');
$sessionHotelId                 = Session::get('hotel_id');
$controllerRoute                = $module['controller_route'];
?>
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
      $hotel_id           = $row->hotel_id;
      $category           = $row->category;
      $name               = $row->name;
      $price              = $row->price;
      $tat                = $row->tat;
      $short_description  = $row->short_description;
      $cover_image        = $row->cover_image;
    } else {
      $hotel_id           = '';
      $category           = '';
      $name               = '';
      $price              = '';
      $tat                = '';
      $short_description  = '';
      $cover_image        = '';
    }
    ?>
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body pt-3">
          <form method="POST" action="" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php if($sessionType == 'ma'){?>
              <div class="row mb-3">
                <label for="hotel_id" class="col-md-2 col-lg-2 col-form-label">Hotel</label>
                <div class="col-md-10 col-lg-10">
                    <select name="hotel_id" class="form-control" id="hotel_id" required>
                      <option value="" selected>Select Hotel</option>
                      <?php if($hotels){ foreach($hotels as $row){?>
                      <option value="<?=$row->id?>" <?=(($row->id == $hotel_id)?'selected':'')?>><?=$row->name?></option>
                      <?php } }?>
                    </select>
                </div>
              </div>
            <?php } else {?>
              <input type="hidden" name="hotel_id" value="<?=$sessionHotelId?>">
            <?php }?>

            <div class="row mb-3">
              <label for="category" class="col-md-2 col-lg-2 col-form-label">Category</label>
              <div class="col-md-10 col-lg-10">
                  <select name="category" class="form-control" id="category" required>
                    <option value="" selected>Select Category</option>
                    <?php if($cats){ foreach($cats as $row){?>
                    <option value="<?=$row->id?>" <?=(($row->id == $category)?'selected':'')?> class="restaurant cat<?=$row->hotel_id?>"><?=$row->name?>/<?=$row->hotel_id?></option>
                    <?php } }?>
                  </select>
              </div>
            </div>
            
            <div class="row mb-3">
              <label for="name" class="col-md-2 col-lg-2 col-form-label">Name</label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="name" class="form-control" id="name" value="<?=$name?>" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="price" class="col-md-2 col-lg-2 col-form-label">Price</label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="price" class="form-control" id="price" value="<?=$price?>" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="tat" class="col-md-2 col-lg-2 col-form-label">TAT (Turn Around Time) [In Minutes]</label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="tat" class="form-control" id="tat" value="<?=$tat?>" required onkeypress="return isNumber(event)">
              </div>
            </div>
            <div class="row mb-3">
              <label for="short_description" class="col-md-2 col-lg-2 col-form-label">Short Description</label>
              <div class="col-md-10 col-lg-10">
                <textarea name="short_description" class="form-control" id="short_description"><?=$short_description?></textarea>
              </div>
            </div>
            <div class="row mb-3">
              <label for="cover_image" class="col-md-2 col-lg-2 col-form-label">Image</label>
              <div class="col-md-10 col-lg-10">
                <input type="file" name="cover_image" class="form-control" id="cover_image">
                <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed</small><br>
                <?php if($cover_image != ''){?>
                  <img src="<?=env('UPLOADS_URL').'restaurant/'.$cover_image?>" class="img-thumbnail" alt="<?=$name?>" style="width: 150px; height: 150px; margin-top: 10px;">
                <?php } else {?>
                  <img src="<?=env('NO_IMAGE')?>" alt="<?=$name?>" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                <?php }?>
                <!-- <div class="pt-2">
                  <a href="#profile_image" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                  <a href="javascript:void(0);" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                </div> -->
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript">
  $(function(){
    let hotel_id = '<?=$hotelId?>';
    $('#category .restaurant').hide();
    $('#category .cat' + hotel_id).show();

    $('#hotel_id').on('change', function(){
      let hotel_id = $('#hotel_id').val();
      $('#category .restaurant').hide();
      $('#category .cat' + hotel_id).show();
    });
  })
</script><?php /**PATH E:\xampp8.2\htdocs\relook\resources\views/admin/maincontents/restaurant-item/add-edit.blade.php ENDPATH**/ ?>