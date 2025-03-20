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
<style>
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
            $first_name = $row->first_name;            
            $last_name = $row->last_name;            
            $middle_name = $row->middle_name;            
            $email = $row->email;          
            $phone = $row->phone;          
            $countryId = $row->country;          
            $roleId = $row->role;          
            $password = $row->password;  
            // $invited = $row->invited;        
            // $invited_by = $row->invited_by; 
            // $invited_by_email = $row->invited_by_email;  
            // $explanation = $row->explanation;  
            // $explanation_submission = $row->explanation_submission;  
            // $section_ertId = $row->section_ertId; 
            $titleId = $row->titleId;  
            $pronounId = $row->pronounId;
            // $participated = $row->participated;
            // $participated_info = $row->participated_info;
            // $organization_name = $row->organization_name;
            // $organization_website = $row->organization_website;
            // $ecosystem_affiliationId = $selected_ecosystem_affiliation;
            // $indigenous_affiliation = $row->indigenous_affiliation;
            // $expertise_areaId = $selected_expertise_area;
            // $bio_short = $row->bio_short;
            // $bio_long = $row->bio_long;
        } else {
            $first_name = '';            
            $last_name =  '';          
            $middle_name = '';            
            $email = '';           
            $phone = '';           
            $countryId = '';           
            $roleId = '';   
            $role = '';        
            $password = ''; 
            // $invited = '';
            // $invited_by = ''; 
            // $invited_by_email = '';  
            // $explanation = '';  
            // $explanation_submission = '';     
            // $section_ertId = '';
            $titleId = '';
            $pronounId = '';
            // $participated = '';
            // $participated_info = '';
            // $organization_name = '';
            // $organization_website = '';
            // $ecosystem_affiliationId = [];
            // $indigenous_affiliation = '';
            // $expertise_areaId = [];
            // $bio_short = '';
            // $bio_long = '';
        }
        ?>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body pt-3">
                    <form method="POST" action="" enctype="multipart/form-data" oninput="validateForm()">
                        @csrf
                        <!-- <div class="row mb-3">
                            <label for="invited" class="col-md-2 col-lg-4 col-form-label">Were you invited to make a Submission to ERT?</label>
                            <div class="col-md-10 col-lg-8">
                                <input type="radio" id="yes" name="invited" value="Yes" )>
                                <label for="yes">Yes</label>
                                <input type="radio" id="no" name="invited" value="No" )>
                                <label for="no">No</label>
                            </div>
                        </div>  
                        <div class="row mb-3">
                            <label for="invited_by" class="col-md-2 col-lg-4 col-form-label">Full name of person who invited you to make a Submission to ERT </label>
                            <div class="col-md-10 col-lg-8">
                                <input type="text" name="invited_by" class="form-control" id="invited_by"
                                    value="?= $invited_by ?>" required>
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="invited_by_email" class="col-md-2 col-lg-4 col-form-label">Email address of person who invited you to make a Submission to ERT
                            </label>
                            <div class="col-md-10 col-lg-8">
                                <input type="email" name="invited_by_email" class="form-control" id="invited_by_email"
                                    value="?= $invited_by_email ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="participated" class="col-md-2 col-lg-4 col-form-label">Have you participated as a strategist at an in-person ER Synergy Meeting?</label>
                            <div class="col-md-10 col-lg-8">
                                <input type="radio" id="yes" name="participated" value="Yes" )>
                                <label for="yes">Yes</label>
                                <input type="radio" id="no" name="participated" value="No" )>
                                <label for="no">No</label>
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="participated_info" class="col-md-2 col-lg-4 col-form-label">Provide date and location of most recent in-person ER Synergy Meeting you participated in.</label>
                            <div class="col-md-10 col-lg-8">
                                <input type="radio" id="yes" name="participated_info" value="Yes" )>
                                <label for="yes">Yes</label>
                                <input type="radio" id="no" name="participated_info" value="No" )>
                                <label for="no">No</label>
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="explanation" class="col-md-2 col-lg-4 col-form-label">Explain why you are a grassroots changemaker, knowledge-holder, and/or innovator (max. 100 words)</label>
                            <div class="col-md-10 col-lg-8">
                                <textarea class="form-control" id="explanation" name="explanation" rows="4" cols="50" placeholder="Your explanation here..." required>?= $explanation ?></textarea>
                                <div id="explanationError" class="error"></div>
                            </div>
                        </div>  
                        <div class="row mb-3">
                            <label for="explanation_submission" class="col-md-2 col-lg-4 col-form-label">Explain why and how your Submission relates to restoring, preserving, and/or promoting human-ecological interconnectivity (symbiosis) (max. 150 words)</label>
                            <div class="col-md-10 col-lg-8">
                                <textarea class="form-control" id="explanation_submission" name="explanation_submission" rows="4" cols="50" placeholder="Your explanation here..." required>?= $explanation_submission ?></textarea>
                                <div id="explanation_submissionError" class="error"></div>
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="section_ert" class="col-md-2 col-lg-4 col-form-label">For which section of ERT would you like your Submission to be considered?
                            </label>
                            <div class="col-md-10 col-lg-8">
                                <select name="section_ert" class="form-control" id="section_ert" required>
                                    <option value="" selected disabled>Select</option>
                                    @if ($section_ert)
                                        @foreach ($section_ert as $data)
                                            <option value="{{ $data->id }}")>
                                                {{ $data->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>   
                        <div class="row mb-3">
                            <label for="role" class="col-md-2 col-lg-4 col-form-label">User Type</label>
                            <div class="col-md-10 col-lg-8">
                                <select name="role" class="form-control" id="role" required>
                                    <option value="" selected disabled>Select</option>
                                    @if ($role)
                                        @foreach ($role as $data)
                                            <option value="{{ $data->id }}" )>
                                                {{ $data->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>-->
                        <div class="row mb-3">
                            <label for="email" class="col-md-2 col-lg-4 col-form-label">Your email address</label>
                            <div class="col-md-10 col-lg-8">
                                <input type="email" name="email" class="form-control" id="email"
                                    value="<?= $email ?>" required>
                            </div>
                        </div> 
                        <!-- <div class="row mb-3">
                            <label for="title" class="col-md-2 col-lg-4 col-form-label">Title
                            </label>
                            <div class="col-md-10 col-lg-8">
                                <select name="title" class="form-control" id="title" required>
                                    <option value="" selected disabled>Select</option>
                                    @if ($user_title)
                                        @foreach ($user_title as $data)
                                            <option value="{{ $data->id }}" >
                                                {{ $data->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>  -->
                        <div class="row mb-3">
                            <label for="first_name" class="col-md-2 col-lg-4 col-form-label">First Name</label>
                            <div class="col-md-10 col-lg-8">
                                <input type="text" name="first_name" class="form-control" id="first_name"
                                    value="<?= $first_name ?>" required>
                            </div>
                        </div>                         
                        <div class="row mb-3">
                            <label for="middle_name" class="col-md-2 col-lg-4 col-form-label">Middle name(s)/ initial(s)</label>
                            <div class="col-md-10 col-lg-8">
                                <input type="text" name="middle_name" class="form-control" id="middle_name"
                                    value="<?= $middle_name ?>">
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="last_name" class="col-md-2 col-lg-4 col-form-label">Surname (last name)</label>
                            <div class="col-md-10 col-lg-8">
                                <input type="text" name="last_name" class="form-control" id="last_name"
                                    value="<?= $last_name ?>" required>
                            </div>
                        </div>  
                        <!-- <div class="row mb-3">
                            <label for="pronoun" class="col-md-2 col-lg-4 col-form-label">Pronoun</label>
                            <div class="col-md-10 col-lg-8">
                                <select name="pronoun" class="form-control" id="pronoun" required>
                                    <option value="" selected disabled>Select</option>
                                    @if ($pronoun)
                                        @foreach ($pronoun as $data)
                                            <option value="{{ $data->id }}" >
                                                {{ $data->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div> -->
                         
                        <!-- <div class="row mb-3">
                            <label for="phone" class="col-md-2 col-lg-4 col-form-label">Phone</label>
                            <div class="col-md-10 col-lg-8">
                                <input type="phone" name="phone" maxlength="10" class="form-control" id="phone"
                                    value="?= $phone ?>" required>
                            </div>
                        </div>    -->
                        <div class="row mb-3">
                            <label for="password" class="col-md-2 col-lg-4 col-form-label">Password</label>
                            <div class="col-md-10 col-lg-8">
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                        </div>                     
                        <div class="row mb-3">
                            <label for="country" class="col-md-2 col-lg-4 col-form-label">Country</label>
                            <div class="col-md-10 col-lg-8">
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
                        <!-- <div class="row mb-3">
                            <label for="organization_name" class="col-md-2 col-lg-4 col-form-label">Organization name (if no affiliation, type N/A)
                            </label>
                            <div class="col-md-10 col-lg-8">
                                <input type="text" name="organization_name" class="form-control" id="organization_name"
                                    value="?= $organization_name ?>" required>
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="organization_website" class="col-md-2 col-lg-4 col-form-label">Organization website (if no affiliation, type N/A)
                            </label>
                            <div class="col-md-10 col-lg-8">
                                <input type="text" name="organization_website" class="form-control" id="organization_website"
                                    value="?= $organization_website ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="ecosystem_affiliation" class="col-md-2 col-lg-4 col-form-label"> Ecosystem affiliation (ethnicity) (select all that apply)
                            </label>
                            <div class="col-md-10 col-lg-8">                                                                                                
                                @if ($ecosystem_affiliation)
                                    @foreach ($ecosystem_affiliation as $data)
                                    <input type="checkbox" name="ecosystem_affiliation[]" value="{{ $data->id }}" >{{ $data->name }}<br>
                                    @endforeach
                                @endif                                
                            </div>
                        </div>   
                        <div class="row mb-3">
                            <label for="Indigenous_affiliation" class="col-md-2 col-lg-4 col-form-label">Indigenous affiliation (if you would like to further define your ethnicity, e.g., region of South Asia or Indigenous tribe/nation)
                            </label>
                            <div class="col-md-10 col-lg-8">
                                <input type="text" name="indigenous_affiliation" class="form-control" id="indigenous_affiliation"
                                value="?= $indigenous_affiliation ?>" required>
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="expertise_area" class="col-md-2 col-lg-4 col-form-label"> Your expertise area (select all that apply)
                            </label>
                            <div class="col-md-10 col-lg-8">
                                @if ($expertise_area)
                                    @foreach ($expertise_area as $data)
                                    <input type="checkbox" name="expertise_area[]" value="{{ $data->id }}" >{{ $data->name }}<br>                                          
                                    @endforeach
                                @endif
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="bio_short" class="col-md-2 col-lg-4 col-form-label">1-sentence biography (max. 40 words)
                            </label>
                            <div class="col-md-10 col-lg-8">
                                <textarea class="form-control" id="bio_short" name="bio_short" rows="4" cols="50" placeholder="Your explanation here..." required>?= $bio_short ?></textarea>
                                <div id="bio_shortError" class="error"></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="bio_long" class="col-md-2 col-lg-4 col-form-label">1-paragraph biography (150-250 words)
                            </label>
                            <div class="col-md-10 col-lg-8">
                                <textarea class="form-control" id="bio_long" name="bio_long" rows="4" cols="50" placeholder="Your explanation here..." required>?= $bio_long ?></textarea>
                                <div id="bio_longError" class="error"></div>
                            </div>
                        </div>   --> 
                        <div class="text-center">
                            <button type="submit" id="submitButton" class="btn btn-primary"><?= $row ? 'Save' : 'Add' ?></button>
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
        allValid &= checkWordLimit(document.getElementById('explanation'), 100, 'explanationError');
        allValid &= checkWordLimit(document.getElementById('explanation_submission'), 150, 'explanation_submissionError');
        allValid &= checkWordLimit(document.getElementById('bio_short'), 40, 'bio_shortError');
        allValid &= checkWordLimit(document.getElementById('bio_long'), 250, 'bio_longError');

        document.getElementById('submitButton').disabled = !allValid;
    }
</script>