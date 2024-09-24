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
      $title          = $row->title;
      $description    = $row->description;
      $attachment     = $row->attachment;
      $to_users       = $row->to_users;
      $users          = json_decode($row->users);
    } else {
      $title          = '';
      $description    = '';
      $attachment     = '';
      $to_users       = [];
      $users          = [];
    }
    ?>
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body pt-3">
          <form method="POST" action="" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row mb-3">
              <label for="faq_category_id" class="col-md-2 col-lg-2 col-form-label">User Type</label>
              <div class="col-md-10 col-lg-10">
                  <select class="form-control" name="to_users" id="to_users" onchange="getUsers(this.value);">
                    <option value="" selected>Select User Type</option>
                    <option value="0" <?=(($to_users == 0)?'selected':'')?>>All</option>
                    <option value="1" <?=(($to_users == 1)?'selected':'')?>>Subscriber</option>
                    <option value="2" <?=(($to_users == 2)?'selected':'')?>>User</option>
                  </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="user_list" class="col-md-2 col-lg-2 col-form-label">Users</label>
              <div class="col-md-10 col-lg-10">
                  <select class="form-control user_list" name="users[]" id="choices-multiple-remove-button" multiple>
                    <?php if($allUsers){ foreach($allUsers as $allUser){?>
                      <option value="<?=$allUser->email?>" <?=((in_array($allUser->email, $users))?'selected':'')?> class="all user-type2"><?=$allUser->email?></option>
                    <?php } }?>
                    <?php if($subscribers){ foreach($subscribers as $subscriber){?>
                      <option value="<?=$subscriber->subscribers_email?>" <?=((in_array($subscriber->subscribers_email, $users))?'selected':'')?> class="all user-type1"><?=$subscriber->subscribers_email?></option>
                    <?php } }?>
                  </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="title" class="col-md-2 col-lg-2 col-form-label">Title</label>
              <div class="col-md-10 col-lg-10">
                <textarea name="title" class="form-control" id="title" rows="5" required><?=$title?></textarea>
              </div>
            </div>
            <div class="row mb-3">
              <label for="description" class="col-md-2 col-lg-2 col-form-label">Description</label>
              <div class="col-md-10 col-lg-10">
                <textarea name="description" class="form-control" id="description" rows="5" required><?=$description?></textarea>
              </div>
            </div>
            <div class="row mb-3">
              <label for="attachment" class="col-md-2 col-lg-2 col-form-label">Attachment</label>
              <div class="col-md-10 col-lg-10">
                <input type="file" name="attachment" class="form-control" id="attachment">
                <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed</small><br>
                <?php if($attachment != ''){?>
                  <img src="<?=env('UPLOADS_URL').'newsletter/'.$attachment?>" class="img-thumbnail" alt="<?=$title?>" style="width: 150px; height: 150px; margin-top: 10px;">
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
  function getUsers(param){
    console.log(param);
    if(param == 0){
      $('.user_list .all').show();
    } else if(param == 1){
      $('.user_list .subscriber').show();
      $('.user_list .user').hide();
    } else if(param == 2){
      $('.user_list .user').show();
      $('.user_list .subscriber').hide();
    }
  }
</script><?php /**PATH G:\xampp8.2\htdocs\ecosymbiont\resources\views/admin/maincontents/newsletter/add-edit.blade.php ENDPATH**/ ?>