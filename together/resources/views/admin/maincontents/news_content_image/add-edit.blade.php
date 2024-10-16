<?php
use App\Models\GeneralSetting;
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
    .image-preview {
            display: flex;
            flex-wrap: wrap;
        }
        .image-preview img {
            margin: 10px;
            width: 150px;
            height: 150px;
            object-fit: cover;
        }
</style>
<div class="pagetitle">
    <h1><?= $page_header ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= url('admin/dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active"><a
                    href="<?= url('admin/news_content_image/list/') ?>"><?= $module['title'] ?> List</a></li>
            <li class="breadcrumb-item active"><?= $page_header ?></li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section profile">
    <div class="row">
        <div class="col-xl-12">
            @if (session('success_message'))
                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show autohide"
                    role="alert">
                    {{ session('success_message') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            @endif
            @if (session('error_message'))
                <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show autohide"
                    role="alert">
                    {{ session('error_message') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            @endif
        </div>
        <?php
        $setting = GeneralSetting::where('id', '=', 1)->first();
        if ($row) {              
            $image_title = $row->image_title;               
            $others_image = $row->image_file;                       
        } else {            
            $image_title = '';                    
            $others_image = '';                 
        }
        ?>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body pt-3">
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf                        
                        <div class="row mb-3">
                            <label for="others_image" class="col-md-4 col-lg-3 col-form-label">Others Image</label>
                            <div class="col-md-8 col-lg-9">
                                <input type="file" name="others_image[]" class="form-control" id="others_image" multiple>
                                <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed</small><br>
                                <?php if($others_image != ''){                                                                          
                                    ?>
                                <img src="<?=env('UPLOADS_URL').'newcontent/'.$others_image?>"  style="width: 150px; height: 150px; margin-top: 10px;">                                
                                <?php }  else {?>
                                    <div class="image-preview" id="imagePreview"></div>
                                <!-- <img src="<?=env('NO_IMAGE')?>"  class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;"> -->
                                <?php }?>                                
                            </div>
                        </div>   
                        <div class="row mb-3">
                            <label for="image_title" class="col-md-4 col-lg-3 col-form-label">Image Title</label>
                            <div class="col-md-8 col-lg-9">
                                <input type="text" name="image_title" class="form-control" id="image_title"
                                    value="<?= $image_title ?>" required>
                            </div>
                        </div>                                              
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary"><?= $row ? 'Save' : 'Add' ?></button>
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
    $(document).ready(function() {
        var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
            removeItemButton: true,
            maxItemCount: 30,
            searchResultLimit: 30,
            renderChoiceLimit: 30
        });
    });
</script>
<script>
    document.getElementById('others_image').addEventListener('change', function(event) {
        const imagePreview = document.getElementById('imagePreview');
        imagePreview.innerHTML = ''; // Clear previous previews
        const files = event.target.files;
        
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            
            if (file && file.type.match('image.*')) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    imagePreview.appendChild(img);
                };
                
                reader.readAsDataURL(file);
            }
        }
    });
</script>

