<?php
use App\Helpers\Helper;
$controllerRoute = $module['controller_route'];
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
      @if(session('success_message'))
        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show autohide" role="alert">
          {{ session('success_message') }}
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      @if(session('error_message'))
        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show autohide" role="alert">
          {{ session('error_message') }}
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
    </div>
    <?php
    if($row){
      $page_name            = $row->title;
      $page_url             = $row->url;
      $page_description     = $row->description;
      $page_keyword         = $row->keyword;      
    } else {
      $page_name            = '';
      $page_url             = '';
      $page_description     = '';
      $page_keyword         = '';      
    }
    ?>
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body pt-3">
          <form method="POST" action="" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
              <label for="page_url" class="col-md-2 col-lg-2 col-form-label">Page Url</label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="page_url" class="form-control" id="page_url" rows="5" value="<?=$page_url?>" >
              </div>
            </div>
            <div class="row mb-3">
              <label for="page_name" class="col-md-2 col-lg-2 col-form-label">Page Title</label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="page_name" class="form-control" id="page_name" rows="5" value="<?=$page_name?>" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="ckeditor1" class="col-md-2 col-lg-2 col-form-label">Page Description</label>
              <div class="col-md-10 col-lg-10">
                <textarea type="text" name="page_description" class="form-control" id="ckeditor1" rows="5"><?=$page_description?></textarea>
              </div>
            </div>            
            <div class="row mb-3">
              <label for="page_keyword" class="col-md-2 col-lg-2 col-form-label">Page Keyword</label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="page_keyword" class="form-control" id="page_keyword" rows="5" value="<?=$page_keyword?>" required>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>