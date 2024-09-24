<?php
use App\Helpers\Helper;
$controllerRoute = $module['controller_route'];
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<style type="text/css">
    .choices__list--multiple .choices__item {
        background-color: #d81636;
        border: 1px solid #d81636;
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
      $name                   = $row->name;
      $author_name            = $row->author_name;
      $author_designation     = $row->author_designation;
      $author_affiliation     = $row->author_affiliation;
      $author_email           = $row->author_email;
      $keywords               = $row->keywords;
      $description            = $row->description;
      $notice_year            = $row->notice_year;
      $uploaded_by            = $row->uploaded_by;
      $notice_date            = $row->notice_date;
      $notice_file            = $row->notice_file;
      $is_archieve            = $row->is_archieve;
    } else {
      $name                   = '';
      $author_name            = '';
      $author_designation     = '';
      $author_affiliation     = '';
      $author_email           = '';
      $keywords               = '';
      $description            = '';
      $notice_year            = '';
      $uploaded_by            = 'Admin';
      $notice_date            = '';
      $notice_file            = '';
      $is_archieve            = 0;
    }
    ?>
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body pt-3">
          <form method="POST" action="" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row mb-3">
              <label for="name" class="col-md-2 col-lg-2 col-form-label">Name</label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="name" class="form-control" id="name" value="<?=$name?>" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="author_name" class="col-md-2 col-lg-2 col-form-label">Author Name</label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="author_name" class="form-control" id="author_name" value="<?=$author_name?>" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="author_designation" class="col-md-2 col-lg-2 col-form-label">Author Designation</label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="author_designation" class="form-control" id="author_designation" value="<?=$author_designation?>" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="author_affiliation" class="col-md-2 col-lg-2 col-form-label">Author Affiliation</label>
              <div class="col-md-10 col-lg-10">
                <textarea name="author_affiliation" class="form-control" id="author_affiliation" rows="3"><?=$author_affiliation?></textarea>
              </div>
            </div>
            <div class="row mb-3">
              <label for="author_email" class="col-md-2 col-lg-2 col-form-label">Author Email</label>
              <div class="col-md-10 col-lg-10">
                <input type="email" name="author_email" class="form-control" id="author_email" value="<?=$author_email?>" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="keywords" class="col-md-2 col-lg-2 col-form-label">Keywords</label>
              <div class="col-md-10 col-lg-10">
                <textarea name="keywords" class="form-control" id="keywords" rows="3"><?=$keywords?></textarea>
                <small class="text-primary">Enter keywords with comma separated</small>
              </div>
            </div>
            <div class="row mb-3">
              <label for="description" class="col-md-2 col-lg-2 col-form-label">Abstract/Summary</label>
              <div class="col-md-10 col-lg-10">
                <textarea name="description" class="form-control" id="description" rows="3"><?=$description?></textarea>
              </div>
            </div>
            <div class="row mb-3">
              <label for="notice_year" class="col-md-2 col-lg-2 col-form-label">Journal Month/Year</label>
              <div class="col-md-10 col-lg-10">
                <input type="month" name="notice_year" class="form-control" id="notice_year" value="<?=$notice_year?>" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="uploaded_by" class="col-md-2 col-lg-2 col-form-label">Uploaded By</label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="uploaded_by" class="form-control" id="uploaded_by" value="<?=$uploaded_by?>" readonly required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="notice_date" class="col-md-2 col-lg-2 col-form-label">Journal Date</label>
              <div class="col-md-10 col-lg-10">
                <input type="date" name="notice_date" class="form-control" id="notice_date" value="<?=$notice_date?>" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="notice_file" class="col-md-2 col-lg-2 col-form-label">Journal File</label>
              <div class="col-md-10 col-lg-10">
                <input type="file" name="notice_file" class="form-control" id="notice_file">
                <small class="text-info">* Only PDF files are allowed</small><br>
                <?php if($notice_file != ''){?>
                  <a href="<?=env('UPLOADS_URL').'notice/'.$notice_file?>" target="_blank" class="badge bg-primary">View Journal</a>
                <?php }?>
              </div>
            </div>
            <div class="row mb-3">
              <label for="is_archieve" class="col-md-2 col-lg-2 col-form-label">Achieve</label>
              <div class="col-md-10 col-lg-10">
                <select name="is_archieve" class="form-control" id="is_archieve" required>
                  <option value="" selected>Select Archieve</option>
                  <option value="1" <?=(($is_archieve == 1)?'selected':'')?>>Archieve</option>
                  <option value="0" <?=(($is_archieve == 0)?'selected':'')?>>Current</option>
                </select>
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
</script><?php /**PATH G:\xampp8.2\htdocs\aliah-journal\resources\views/admin/maincontents/notice/add-edit.blade.php ENDPATH**/ ?>