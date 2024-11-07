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
            <?php if(session('success_message')): ?>
                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show autohide"
                    role="alert">
                    <?php echo e(session('success_message')); ?>

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <?php if(session('error_message')): ?>
                <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show autohide"
                    role="alert">
                    <?php echo e(session('error_message')); ?>

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>
        <?php
        $setting = GeneralSetting::where('id', '=', 1)->first();
        if ($row) {
            // $sub_categoryId = $row->sub_category;            
            // $parent_categoryId = $row->parent_category;  
            // $new_title = $row->new_title;   
            // $sub_title = $row->sub_title;  
            // $author_name = $row->author_name; 
            // $pronounId = $row->author_pronoun;  
            // $author_affiliationId = $selected_ecosystem_affiliation;
            // $author_email = $row->author_email;
            // $countryId = $row->country;
            // $organization_name = $row->organization_name;
            // $cover_image = $row->cover_image;
            $others_image = $row->image_file;
            // $long_desc = $row->long_desc;
            // $keywords = $row->keywords;
            // $short_desc = $row->short_desc;
            // $is_feature = $row->is_feature;
            // $is_popular = $row->is_popular;            
        } else {
            // $sub_categoryId = '';            
            // $parent_categoryId = ''; 
            // $new_title = '';          
            // $sub_title = '';
            // $author_name = '';
            // $pronounId = '';
            // $author_affiliationId = [];
            // $author_email = '';
            // $countryId = '';
            // $organization_name = '';
            // $cover_image = '';
            $others_image = '';
            // $long_desc = '';
            // $keywords = '';
            // $short_desc = '';
            // $is_feature = '';
            // $is_popular = '';            
        }
        ?>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body pt-3">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>                        
                        <div class="row mb-3">
                            <label for="others_image" class="col-md-4 col-lg-3 col-form-label">Others Image</label>
                            <div class="col-md-8 col-lg-9">
                                <input type="file" name="others_image[]" class="form-control" id="others_image" multiple>
                                <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed</small><br>
                                <?php if($others_image != ''){                                                                          
                                    ?>
                                <img src="<?=env('UPLOADS_URL').'newcontent/'.$others_image?>"  style="width: 150px; height: 150px; margin-top: 10px;">                                
                                <?php }  else {?>
                                <img src="<?=env('NO_IMAGE')?>"  class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                                <?php }?>                                
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
        allValid &= checkWordLimit(document.getElementById('sub_title'), 40, 'sub_titleError');
        allValid &= checkWordLimit(document.getElementById('short_desc'), 100, 'bio_longError');

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
                var url = "<?php echo e(url('admin/news_content/get-subcategories')); ?>/" + parent_id;
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
<?php /**PATH G:\xampp8.2\htdocs\ecosymbiont\resources\views/admin/maincontents/news_content_image/add-edit.blade.php ENDPATH**/ ?>