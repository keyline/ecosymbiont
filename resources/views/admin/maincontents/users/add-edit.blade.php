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
            $name = $row->name;            
            $email = $row->email;          
            $phone = $row->phone;          
            $countryId = $row->country;          
            $roleId = $row->role;          
            $password = $row->password;          
            $invited_by = $row->invited_by; 
            $invited_by_email = $row->invited_by_email;  
            $explanation = $row->explanation;  
            $explanation_submission = $row->explanation_submission;  
            $section_ertId = $row->section_ertId;   
        } else {
            $name = '';            
            $email = '';           
            $phone = '';           
            $countryId = '';           
            $roleId = '';           
            $password = ''; 
            $invited_by = ''; 
            $invited_by_email = '';  
            $explanation = '';  
            $explanation_submission = '';     
            $section_ertId = '';
        }
        ?>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body pt-3">
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="role" class="col-md-2 col-lg-2 col-form-label">User Type</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="role" class="form-control" id="role" required>
                                    <option value="" selected disabled>Select</option>
                                    @if ($role)
                                        @foreach ($role as $data)
                                            <option value="{{ $data->id }}" @selected($data->id == $roleId)>
                                                {{ $data->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-2 col-lg-2 col-form-label">Name</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="name" class="form-control" id="name"
                                    value="<?= $name ?>" required>
                            </div>
                        </div>   
                        <div class="row mb-3">
                            <label for="email" class="col-md-2 col-lg-2 col-form-label">Email</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="email" name="email" class="form-control" id="email"
                                    value="<?= $email ?>" required>
                            </div>
                        </div>  
                        <div class="row mb-3">
                            <label for="phone" class="col-md-2 col-lg-2 col-form-label">Phone</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="phone" name="phone" maxlength="10" class="form-control" id="phone"
                                    value="<?= $phone ?>" required>
                            </div>
                        </div>   
                        <div class="row mb-3">
                            <label for="password" class="col-md-2 col-lg-2 col-form-label">Password</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="password" name="password" class="form-control" id="password">
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
                            <label for="invited" class="col-md-2 col-lg-4 col-form-label">Were you invited to make a Submission to ERT?</label>
                            <div class="col-md-10 col-lg-8">
                                <input type="radio" id="yes" name="invited" value="Yes">
                                <label for="yes">Yes</label>
                                <input type="radio" id="no" name="invited" value="No">
                                <label for="no">No</label>
                            </div>
                        </div>  
                        <div class="row mb-3">
                            <label for="invited_by" class="col-md-2 col-lg-4 col-form-label">Full name of person who invited you to make a Submission to ERT </label>
                            <div class="col-md-10 col-lg-8">
                                <input type="text" name="invited_by" class="form-control" id="invited_by"
                                    value="<?= $invited_by ?>" required>
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="invited_by_email" class="col-md-2 col-lg-2 col-form-label">Email address of person who invited you to make a Submission to ERT
                            </label>
                            <div class="col-md-10 col-lg-10">
                                <input type="email" name="invited_by_email" class="form-control" id="invited_by_email"
                                    value="<?= $invited_by_email ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="participated" class="col-md-2 col-lg-4 col-form-label">Have you participated as a strategist at an in-person ER Synergy Meeting?</label>
                            <div class="col-md-10 col-lg-8">
                                <input type="radio" id="yes" name="participated" value="Yes">
                                <label for="yes">Yes</label>
                                <input type="radio" id="no" name="participated" value="No">
                                <label for="no">No</label>
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="participated_info" class="col-md-2 col-lg-4 col-form-label">Provide date and location of most recent in-person ER Synergy Meeting you participated in.</label>
                            <div class="col-md-10 col-lg-8">
                                <input type="radio" id="yes" name="participated_info" value="Yes">
                                <label for="yes">Yes</label>
                                <input type="radio" id="no" name="participated_info" value="No">
                                <label for="no">No</label>
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="explanation" class="col-md-2 col-lg-4 col-form-label">Explain why you are a grassroots changemaker, knowledge-holder, and/or innovator (max. 100 words)</label>
                            <div class="col-md-10 col-lg-8">
                                <textarea id="explanation" name="explanation" rows="4" cols="50" maxlength="100" placeholder="Your explanation here..." required><?= $explanation ?></textarea>
                            </div>
                        </div>  
                        <div class="row mb-3">
                            <label for="explanation_submission" class="col-md-2 col-lg-4 col-form-label">Explain why and how your Submission relates to restoring, preserving, and/or promoting human-ecological interconnectivity (symbiosis) (max. 150 words)</label>
                            <div class="col-md-10 col-lg-8">
                                <textarea id="explanation_submission" name="explanation_submission" rows="4" cols="50" maxlength="150" placeholder="Your explanation here..." required><?= $explanation_submission ?></textarea>
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="country" class="col-md-2 col-lg-2 col-form-label">For which section of ERT would you like your Submission to be considered?
                            </label>
                            <div class="col-md-10 col-lg-10">
                                <select name="section_ert" class="form-control" id="section_ert" required>
                                    <option value="" selected disabled>Select</option>
                                    @if ($section_ert)
                                        @foreach ($section_ert as $data)
                                            <option value="{{ $data->id }}" @selected($data->id == $section_ertId)>
                                                {{ $data->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="explanation_submission" class="col-md-2 col-lg-4 col-form-label">Explain why and how your Submission relates to restoring, preserving, and/or promoting human-ecological interconnectivity (symbiosis) (max. 150 words)</label>
                            <div class="col-md-10 col-lg-8">
                                <textarea id="explanation_submission" name="explanation_submission" rows="4" cols="50" maxlength="10" placeholder="Your explanation here..." required><?= $explanation_submission ?></textarea>
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
