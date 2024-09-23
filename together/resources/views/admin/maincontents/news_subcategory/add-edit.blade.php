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
            $sub_category = $row->sub_category;
            $parent_categoryId = $row->parent_category;
            $short_description = $row->short_description;
        } else {
            $sub_category = '';
            $parent_categoryId = '';
            $short_description = '';
        }
        ?>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body pt-3">
                    <form method="POST" action="" enctype="multipart/form-data">
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
                            <label for="sub_category" class="col-md-2 col-lg-2 col-form-label">Sub Category Name</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="sub_category" class="form-control" id="sub_category"
                                    value="<?= $sub_category ?>" required>
                            </div>
                        </div>                                             
                        <div class="row mb-3">
                            <label for="short_description" class="col-md-2 col-lg-2 col-form-label">Short Description</label>
                            <div class="col-md-10 col-lg-10">
                                <textarea name="short_description" class="form-control" id="short_description" rows="5" required><?=$short_description ?></textarea>
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
