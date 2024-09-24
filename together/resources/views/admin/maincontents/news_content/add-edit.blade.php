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
    .error { color: red; }
</style>
<div class="pagetitle">
    <h1><?= $page_header ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= url('admin/dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active"><a
                    href="<?= url('admin/' . $controllerRoute . '/list/') ?>"><?= $module['title'] ?> List</a></li>
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
            $sub_categoryId = $row->sub_category;            
            $parent_categoryId = $row->parent_category;  
            $new_title = $row->new_title;
            $sub_title = $row->sub_title;
            $creative_work_SRN = $row->creative_work_SRN;
            $creative_work_DOI = $row->creative_work_DOI;
            $author_name = $row->author_name; 
            $author_short_bio = $row->author_short_bio; 
            $pronounId = $row->author_pronoun;  
            $author_affiliationId = $selected_ecosystem_affiliation;
            $indigenous_affiliation = $row->indigenous_affiliation; 
            $author_email = $row->author_email;
            $countryId = $row->country;
            $organization_name = $row->organization_name;
            $cover_image = $row->cover_image;
            $cover_image_caption = $row->cover_image_caption;
            $others_image = $row->others_image;
            $long_desc = $row->long_desc;
            $keywords = $row->keywords;
            $short_desc = $row->short_desc;
            $is_feature = $row->is_feature;
            $is_popular = $row->is_popular;            
        } else {
            $sub_categoryId = '';            
            $parent_categoryId = ''; 
            $new_title = '';          
            $sub_title = '';
            $creative_work_SRN = '';
            $creative_work_DOI = '';
            $author_name = '';
            $author_short_bio = '';
            $indigenous_affiliation = '';
            $pronounId = '';
            $author_affiliationId = [];
            $author_email = '';
            $countryId = '';
            $organization_name = '';
            $cover_image = '';
            $cover_image_caption = '';
            $others_image = '';
            $long_desc = '';
            $keywords = '';
            $short_desc = '';
            $is_feature = '';
            $is_popular = '';            
        }
        ?>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body pt-3">
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
</div>
@endif
                    <form method="POST" action="" enctype="multipart/form-data" oninput="validateForm()">
                        @csrf
                        <div class="row mb-3">
                            <label for="parent_category" class="col-md-2 col-lg-2 col-form-label">Choose Parent Category</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="parent_category" class="form-control" id="parent_category" required>
                                    <option value="" selected disabled>Select</option>
                                    @if ($parent_category)
                                        @foreach ($parent_category as $data)
                                            <option value="{{ $data->id }}" @selected($data->id == $parent_categoryId)>
                                                {{ $data->sub_category }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>   
                        <div class="row mb-3">
                            <label for="sub_categories" class="col-md-2 col-lg-2 col-form-label">Choose Sub Category</label>
                            <div class="col-md-10 col-lg-10">                                
                                <select name="sub_categories" class="form-control" id="sub_categories" required>
                                    <option value="" selected disabled>Select</option> 
                                    @if ($sub_category)
                                        @foreach ($sub_category as $data)
                                            <option value="{{ $data->id }}" @selected($data->id == $sub_categoryId)>
                                                {{ $data->sub_category }}</option>
                                        @endforeach
                                    @endif                                   
                                </select>
                            </div>
                        </div>    
                        <div class="row mb-3">
                            <label for="new_title" class="col-md-2 col-lg-2 col-form-label">Title</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="new_title" class="form-control" id="new_title"
                                    value="<?= $new_title ?>" required>
                            </div>
                        </div>   
                        <div class="row mb-3">
                            <label for="sub_title" class="col-md-2 col-lg-2 col-form-label">Subtitle</label>
                            <div class="col-md-10 col-lg-10">
                            <textarea class="form-control" id="sub_title" name="sub_title" rows="4" cols="50" placeholder="Your explanation here..."><?= $sub_title ?></textarea>
                            <div id="sub_titleError" class="error"></div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="creative_work_SRN" class="col-md-2 col-lg-2 col-form-label">Creative-Work SRN</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="creative_work_SRN" class="form-control" id="creative_work_SRN" value="<?= $creative_work_SRN ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="creative_work_DOI" class="col-md-2 col-lg-2 col-form-label">Creative-Work DOI</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="creative_work_DOI" class="form-control" id="creative_work_DOI" value="<?= $creative_work_DOI ?>" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="author_name" class="col-md-2 col-lg-2 col-form-label">Author Name</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="author_name" class="form-control" id="author_name"
                                    value="<?= $author_name ?>" required>
                            </div>
                        </div>     
                        <div class="row mb-3">
                            <label for="author_short_bio" class="col-md-2 col-lg-2 col-form-label">Author Short Bio</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="author_short_bio" class="form-control" id="author_short_bio"
                                    value="<?= $author_short_bio ?>">
                            </div>
                        </div>      
                        <div class="row mb-3">
                            <label for="pronoun" class="col-md-2 col-lg-2 col-form-label">Pronoun</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="pronoun" class="form-control" id="pronoun" required>
                                    <option value="" selected disabled>Select</option>
                                    @if ($pronoun)
                                        @foreach ($pronoun as $data)
                                            <option value="{{ $data->id }}" @selected($data->id == $pronounId)>
                                                {{ $data->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>      
                        <div class="row mb-3">
                            <label for="author_affiliation" class="col-md-2 col-lg-2 col-form-label">Author Affiliation
                            </label>
                            <div class="col-md-10 col-lg-10">                                                                                                
                                @if ($author_affiliation)
                                    @foreach ($author_affiliation as $data)
                                    <input type="checkbox" name="author_affiliation[]" value="{{ $data->id }}" @if(in_array($data->id, old('author_affiliation', $author_affiliationId))) checked @endif> {{ $data->name }}<br>
                                    @endforeach
                                @endif                                
                            </div>
                        </div>
                        <div class="row mb-3">
                                <label for="Indigenous_affiliation" class="col-md-2 col-lg-2 col-form-label"> Ancestral regional ecoweb affiliation (please further define your ethnicity, e.g., region of South Asia and/or Indigenous tribe/nation)
                                </label>
                                <div class="col-md-10 col-lg-10">
                                    <input type="text" name="indigenous_affiliation" class="form-control" id="indigenous_affiliation"
                                    value="<?= $indigenous_affiliation ?>">
                                </div>
                            </div> 
                        <div class="row mb-3">
                            <label for="author_email" class="col-md-2 col-lg-2 col-form-label">Author email</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="author_email" name="author_email" class="form-control" id="author_email"
                                    value="<?= $author_email ?>" required>
                            </div>
                        </div>        
                        <div class="row mb-3">
                            <label for="country" class="col-md-2 col-lg-2 col-form-label">Country</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="country" class="form-control" id="country" required>
                                    <option value="" selected disabled>Select</option>
                                    @if ($country)
                                        @foreach ($country as $data)
                                            <option value="{{ $data->id }}" @selected($data->id == $countryId)>
                                                {{ $data->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>    
                        <div class="row mb-3">
                            <label for="organization_name" class="col-md-2 col-lg-2 col-form-label">Organization name
                            </label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="organization_name" class="form-control" id="organization_name"
                                    value="<?= $organization_name ?>">
                            </div>
                        </div>   
                        <div class="row mb-3">
                            <label for="cover_image" class="col-md-2 col-lg-2 col-form-label">Cover Image</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="file" name="cover_image" class="form-control" id="cover_image">
                                <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed</small><br>
                                <span id="cover_image_error" class="text-danger"></span>  
                                <?php if($cover_image != ''){?>
                                <img src="<?=env('UPLOADS_URL').'newcontent/'.$cover_image?>" alt="<?=$author_name?>" style="width: 150px; height: 150px; margin-top: 10px;">
                                <?php } else {?>
                                <img src="<?=env('NO_IMAGE')?>" alt="<?=$author_name?>" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                                <?php }?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="cover_image_caption" class="col-md-2 col-lg-2 col-form-label">Cover Image Caption</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="cover_image_caption" class="form-control" id="cover_image_caption" value="<?= $cover_image_caption ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="others_image" class="col-md-2 col-lg-2 col-form-label">Others Image</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="file" name="others_image[]" class="form-control" id="others_image" multiple>
                                <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed</small><br>

                                <div class="row">
                                    <?php if($news_images != ''){ foreach($news_images as $image) { ?>
                                        <div class="col-md-3">
                                            <img src="<?=env('UPLOADS_URL').'newcontent/'.$image->image_file?>" alt="<?=$author_name?>" style="width: 150px; height: 150px; margin-top: 10px;"><br>
                                            <p class="mt-2">
                                                <a href="<?=url('admin/' . $controllerRoute . '/edit_image/'.Helper::encoded($image->id))?>" class="btn btn-primary btn-sm" title="Edit <?=$module['title']?>"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="<?=url('admin/' . $controllerRoute . '/delete_image/'.Helper::encoded($image->id))?>" class="btn btn-danger btn-sm" title="Delete <?=$module['title']?>" onclick="return confirm('Do You Want To Delete This <?=$module['title']?>');"><i class="fa fa-trash"></i> Delete</a>
                                            </p>
                                        </div>
                                    <?php } } else {?>
                                        <div class="col-md-12">
                                            <img src="<?=env('NO_IMAGE')?>" alt="<?=$author_name?>" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                                        </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>                        
                        <div class="row mb-3">
                            <label for="ckeditor1" class="col-md-2 col-lg-2 col-form-label">Description</label>
                            <div class="col-md-10 col-lg-10">
                                <textarea name="long_desc" class="form-control" id="ckeditor1" rows="5"><?= $long_desc ?></textarea>
                            </div>
                        </div>                        
                        <div class="row mb-3">
                            <label for="keywords" class="col-md-2 col-lg-2 col-form-label">Keywords</label>
                            <div class="col-md-10 col-lg-10">
                                <textarea name="keywords" class="form-control" id="keywords" rows="3"><?= $keywords ?></textarea>
                                <small class="text-primary">Enter keywords with comma separated</small>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="ckeditor2" class="col-md-2 col-lg-2 col-form-label">Short Description
                            </label>
                            <div class="col-md-10 col-lg-10">
                                <textarea class="form-control" id="ckeditor2" name="short_desc" rows="5"><?= $short_desc ?></textarea>
                                <div id="short_descError" class="error"></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="is_feature" class="col-md-2 col-lg-2 col-form-label">Is Features</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="radio" id="is_feature_yes" name="is_feature" value="1" @checked(old('is_feature', $is_feature) == 1)>
                                <label for="is_feature_yes">Yes</label>
                                <input type="radio" id="is_feature_no" name="is_feature" value="0" @checked(old('is_feature', $is_feature) == 0)>
                                <label for="is_feature_no">No</label>
                            </div>
                        </div>  
                        <div class="row mb-3">
                            <label for="is_popular" class="col-md-2 col-lg-2 col-form-label">Is Popular</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="radio" id="is_popular_yes" name="is_popular" value="1" @checked(old('is_popular', $is_popular) == 1)>
                                <label for="is_popular_yes">Yes</label>
                                <input type="radio" id="is_popular_no" name="is_popular" value="0" @checked(old('is_popular', $is_popular) == 0)>
                                <label for="is_popular_no">No</label>
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
    function checkWordLimit(field, limit, errorField) {
        var words = field.value.trim().split(/\s+/).filter(word => word.length > 0).length;
        if (words > limit) {
            document.getElementById(errorField).innerText = "Exceeded word limit of " + limit + " words.";
            return false;
        } else {
            document.getElementById(errorField).innerText = "";
            return true;
        }
    }

    function validateForm() {
        let allValid = true;
        // allValid &= checkWordLimit(document.getElementById('explanation'), 100, 'explanationError');
        // allValid &= checkWordLimit(document.getElementById('explanation_submission'), 150, 'explanation_submissionError');
        allValid &= checkWordLimit(document.getElementById('sub_title'), 42, 'sub_titleError');
        allValid &= checkWordLimit(document.getElementById('short_desc'), 102, 'bio_longError');

        document.getElementById('submitButton').disabled = !allValid;
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        // When parent category changes
        $('#parent_category').on('change', function() {
            var parent_id = $(this).val();
            // alert(parent_id);

            // Clear the subcategory dropdown
            $('#sub_categories').html('<option value="">Select Sub Category</option>');

            // If a parent category is selected
            if (parent_id) {
                var url = "{{ url('admin/news_content/get-subcategories') }}/" + parent_id;
                // Make an AJAX call to fetch subcategories
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Populate the subcategory dropdown
                        $.each(data, function(key, value) {
                            $('#sub_categories').append('<option value="' + value.id + '">' + value.sub_category + '</option>');
                        });
                    }
                });
            }
        });
    });
</script>
<script>
    document.getElementById('cover_image').addEventListener('change', function() {
        validateFileSize(this, 'cover_image_error');
    });
    function validateFileSize(input, errorElementId) {
        var file = input.files[0];
        var maxSize = 1 * 1024 * 1024; // 1MB in bytes

    if (file.size > maxSize) {
        document.getElementById(errorElementId).innerText = "File size exceeds 1MB. Please upload a smaller file.";
        // alert('File size exceeds 1MB. Please upload a smaller file.');
        input.value = ''; // Clear the input if validation fails
    }
    }
</script>
