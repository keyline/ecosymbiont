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
            $first_name = $row->first_name;            
            $last_name = $row->last_name;            
            $middle_name = $row->middle_name;            
            $email = $row->email;          
            $for_publication_name = $row->for_publication_name;          
            $countryId = $row->country;          
            $roleId = $row->role;          
            $creative_Work = $row->creative_Work;  
            $orginal_work = $row->orginal_work;        
            $copyright = $row->copyright; 
            $invited = $row->invited;
            $invited_by_email = $row->invited_by_email;  
            $explanation = $row->explanation;  
            $explanation_submission = $row->explanation_submission;  
            $section_ertId = $row->section_ertId; 
            $titleId = $row->user_title;  
            $pronounId = $row->pronounId;
            $subtitle = $row->subtitle;
            $submission_types = $row->submission_types;
            $narrative_file = $row->narrative_file;
            $first_image_file = $row->first_image_file;
            $second_image_file = $row->second_image_file;
            $art_image_file = $row->art_image_file;
            $art_image_desc = $row->art_image_desc;
            $art_video_file = $row->art_video_file;
            $art_video_desc = $row->art_video_desc;
            $state = $row->state;
            $city = $row->city;
            $participated = $row->participated;
            $participated_info = $row->participated_info;
            $organization_name = $row->organization_name;
            $organization_website = $row->organization_website;
            $ecosystem_affiliationId = $selected_ecosystem_affiliation;
            $indigenous_affiliation = $row->indigenous_affiliation;
            $expertise_areaId = $selected_expertise_area;
            $bio_short = $row->bio_short;
            $bio_long = $row->bio_long;            
            $acknowledge = $row->acknowledge;
        } else {
            $first_name = '';            
            $last_name =  '';          
            $middle_name = '';            
            $email = '';           
            $for_publication_name = '';           
            $countryId = '';           
            $roleId = '';           
            $creative_Work = ''; 
            $invited = '';
            $copyright = ''; 
            $invited = '';
            $invited_by = '';
            $invited_by_email = '';  
            $explanation = '';  
            $explanation_submission = '';     
            $section_ertId = [];
            $titleId = '';
            $pronounId = '';
            $subtitle = '';
            $submission_types = '';
            $narrative_file = '';
            $first_image_file = '';
            $second_image_file = '';
            $art_image_file = '';
            $art_image_desc = '';
            $art_video_file = '';
            $art_video_desc = '';
            $state = '';
            $city = '';
            $participated = '';
            $participated_info = '';
            $organization_name = '';
            $organization_website = '';
            $ecosystem_affiliationId = [];
            $indigenous_affiliation = '';
            $expertise_areaId = [];
            $bio_short = '';
            $bio_long = '';            
            $acknowledge = '';
        }
        ?>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body pt-3">
                    <form method="POST" action="" enctype="multipart/form-data" oninput="validateForm()">
                        @csrf
                        <div class="row mb-3">
                            <label for="email" class="col-md-2 col-lg-4 col-form-label">0) Email address</label>
                            <div class="col-md-10 col-lg-8">
                                <input type="email" name="email" class="form-control" id="email"
                                    value="<?= $email ?>" required>
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="first_name" class="col-md-2 col-lg-4 col-form-label">2) Legal first name (if you are an ecoweb-rooted community or movement, enter the name here)</label>
                            <div class="col-md-10 col-lg-8">
                                <input type="text" name="first_name" class="form-control" id="first_name"
                                    value="<?= $first_name ?>" required>
                            </div>
                        </div>                         
                        <div class="row mb-3">
                            <label for="middle_name" class="col-md-2 col-lg-4 col-form-label">3) Legal middle name(s)/ initial(s)</label>
                            <div class="col-md-10 col-lg-8">
                                <input type="text" name="middle_name" class="form-control" id="middle_name"
                                    value="<?= $middle_name ?>">
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="last_name" class="col-md-2 col-lg-4 col-form-label">4) Legal surname (last name) (if you are an ecoweb-rooted community or movement, enter N/A)</label>
                            <div class="col-md-10 col-lg-8">
                                <input type="text" name="last_name" class="form-control" id="last_name"
                                    value="<?= $last_name ?>" required>
                            </div>
                        </div>  
                        <div class="row mb-3">
                            <label for="for_publication_name" class="col-md-2 col-lg-4 col-form-label">4A) Preferred name for publication (if you wish to use your Legal Name, enter N/A)</label>
                            <div class="col-md-10 col-lg-8">
                                <input type="text" name="for_publication_name" class="form-control" id="for_publication_name"
                                    value="<?= $for_publication_name ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="title" class="col-md-2 col-lg-4 col-form-label">5) Title
                            </label>
                            <div class="col-md-10 col-lg-8">                                
                                @if ($user_title)
                                    @foreach ($user_title as $data)
                                        <!-- <option value="{{ $data->id }}" @selected($data->id == $titleId)> -->
                                        <input type="radio" id="yes" name="title" value="{{ $data->id }}"  >
                                        <label for="yes">{{ $data->name }}</label>
                                            <!-- {{ $data->name }}</option> -->
                                    @endforeach
                                @endif                                
                            </div>
                        </div>   
                        <div class="row mb-3">
                            <label for="pronoun" class="col-md-2 col-lg-4 col-form-label">6) Pronoun(s) (select all that apply)</label>
                            <div class="col-md-10 col-lg-8">                                                                
                                @if ($pronoun)
                                    @foreach ($pronoun as $data)
                                        <!-- <option value="{{ $data->id }}" @selected($data->id == $pronounId)> -->
                                        <input type="radio" id="yes" name="pronoun" value="{{ $data->id }}"  >
                                        <label for="yes">{{ $data->name }}</label>
                                            <!-- {{ $data->name }}</option> -->
                                    @endforeach
                                @endif                                
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="orginal_work" class="col-md-2 col-lg-4 col-form-label">7) Are all components of this Creative-Work your original work?
                            </label>
                            <div class="col-md-10 col-lg-8">
                                <input type="radio" id="yes" name="orginal_work" value="Yes" >
                                <label for="yes">Yes</label>
                                <input type="radio" id="no" name="orginal_work" value="No" >
                                <label for="no">No</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="copyright" class="col-md-2 col-lg-4 col-form-label">8) Do you own the copyright and licensing rights to all components of your Creative-Work?
                            </label>
                            <div class="col-md-10 col-lg-8">
                                <input type="radio" id="yes" name="copyright" value="Yes" >
                                <label for="yes">Yes</label>
                                <input type="radio" id="no" name="copyright" value="No" >
                                <label for="no">No</label>
                            </div>
                        </div>  
                        <div class="row mb-3">
                            <label for="invited" class="col-md-2 col-lg-4 col-form-label">9) Were you invited to submit a Creative-Work to ERT?</label>
                            <div class="col-md-10 col-lg-8">
                                <input type="radio" id="invited_yes" name="invited" value="Yes" @checked(old('invited', $invited) == 'Yes')>
                                <label for="yes">Yes</label>
                                <input type="radio" id="invited_no" name="invited" value="No" @checked(old('invited', $invited) == 'No')>
                                <label for="no">No</label>
                            </div>
                        </div>  
                        <div id="invitedDetails" style="display: none;">
                            <div class="row mb-3">
                                <label for="invited_by" class="col-md-2 col-lg-4 col-form-label">9A) Full name of person who invited you to submit a Creative-Work to ERT</label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="text" name="invited_by" class="form-control" id="invited_by"
                                        value="<?= $invited_by ?>" required>
                                </div>
                            </div> 
                            <div class="row mb-3">
                                <label for="invited_by_email" class="col-md-2 col-lg-4 col-form-label">9B) Email address of person who invited you to submit a Creative-Work to ERT
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="email" name="invited_by_email" class="form-control" id="invited_by_email"
                                        value="<?= $invited_by_email ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="participated" class="col-md-2 col-lg-4 col-form-label">10) Have you participated as a strategist at an in-person ER Synergy Meeting?
                            </label>
                            <div class="col-md-10 col-lg-8">
                                <input type="radio" id="participated_yes" name="participated" value="Yes" >
                                <label for="yes">Yes</label>
                                <input type="radio" id="participated_no" name="participated" value="No" >
                                <label for="no">No</label>
                            </div>
                        </div> 
                        <div id="participatedDetails" style="display: none;">
                            <div class="row mb-3">
                                <label for="participated_info" class="col-md-2 col-lg-4 col-form-label">10A) Provide date and location of most recent in-person ER Synergy Meeting in which you participated</label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="radio" id="yes" name="participated_info" value="Yes">
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="no" name="participated_info" value="No">
                                    <label for="no">No</label>
                                </div>
                            </div> 
                        </div>
                        <div id="formDetails">
                            <div class="row mb-3">
                                <label for="explanation" class="col-md-2 col-lg-4 col-form-label">11) Explain why you are a grassroots changemaker, innovator, and/or knowledge-holder (max. 100 words)</label>
                                <div class="col-md-10 col-lg-8">
                                    <textarea class="form-control" id="explanation" name="explanation" rows="4" cols="50" placeholder="Your explanation here..." required><?= $explanation ?></textarea>
                                    <div id="explanationError" class="error"></div>
                                </div>
                            </div>  
                            <div class="row mb-3">
                                <label for="explanation_submission" class="col-md-2 col-lg-4 col-form-label">12) Explain why and how your Creative-Work relates to regenerating systems that restore, preserve, and foster the mutually beneficial interconnectivity and interdependence (symbiosis) of human communities within and to natural ecological webs (ecowebs) (max. 150 words)</label>
                                <div class="col-md-10 col-lg-8">
                                    <textarea class="form-control" id="explanation_submission" name="explanation_submission" rows="4" cols="50" placeholder="Your explanation here..." required><?= $explanation_submission ?></textarea>
                                    <div id="explanation_submissionError" class="error"></div>
                                </div>
                            </div> 
                            <div class="row mb-3">
                                <label for="section_ert" class="col-md-2 col-lg-4 col-form-label">13) For which section and sub-section of ERT would you like your Creative-Work to be considered?
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    @if ($section_ert)
                                        @foreach ($section_ert as $data)
                                        <input type="checkbox" name="section_ert[]" value="{{ $data->id }}" @if(in_array($data->id, old('section_ert', $section_ertId))) checked @endif>{{ $data->name }}<br>
                                        @endforeach
                                    @endif 
                                    <!-- <select name="section_ert" class="form-control" id="section_ert" required>
                                        <option value="" selected disabled>Select</option>
                                        @if ($section_ert)
                                            @foreach ($section_ert as $data)
                                                <option value="{{ $data->id }}" @selected($data->id == $section_ertId)>
                                                    {{ $data->name }}</option>
                                            @endforeach
                                        @endif
                                    </select> -->
                                </div>
                            </div>     
                            <div class="row mb-3">
                                <label for="creative_Work" class="col-md-2 col-lg-4 col-form-label">14) Title of your Creative-Work (max. 10 words)
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    <textarea class="form-control" id="creative_Work" name="creative_Work" rows="4" cols="50" placeholder="Your creative_Work here..." required><?= $creative_Work ?></textarea>
                                    <div id="creative_WorkError" class="error"></div>
                                </div>
                            </div>                                            
                            <div class="row mb-3">
                                <label for="subtitle" class="col-md-2 col-lg-4 col-form-label">15) Subtitle - brief engaging summary of your Creative-Work (this is what readers will be able to read before logging on to ERT, if your Creative-Work is published on ERT as Content) (max. 40 words)</label>
                                <div class="col-md-10 col-lg-8">
                                    <textarea name="subtitle" class="form-control" id="subtitle" rows="3"><?= $subtitle ?></textarea>
                                    <div id="subtitleError" class="error"></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="submission_types" class="col-md-2 col-lg-4 col-form-label">16) Select the type of your Creative-Work
                                </label>
                                <div class="col-md-10 col-lg-8">                                
                                    @if ($submission_types)
                                    <!-- dd($submission_types); -->
                                        @foreach ($submission_types as $data)
                                            <!-- <option value="{{ $data->id }}" @selected($data->id == $titleId)> -->
                                            <input type="radio"  name="submission_types" value="{{ $data->id }}"  >
                                            <label for="yes">{{ $data->name }}</label>
                                                <!-- {{ $data->name }}</option> -->
                                        @endforeach
                                    @endif                                
                                </div>
                            </div>                           
                            <div class="row mb-3">
                                <label for="narrative_file" class="col-md-2 col-lg-4 col-form-label">16A1) TYPE A: word narrative (no embedded images) (500-1000 words for prose, 100-250 words for poetry)</label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="file" name="narrative_file" class="form-control" id="narrative_file">
                                    <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed</small><br>
                                    <?php if($narrative_file != ''){?>
                                    <a href="<?= env('UPLOADS_URL') . 'narrative/' . $narrative_file ?>" target="_blank"
                                        class="badge bg-primary">View Journal</a>
                                    <?php }?>
                                    <?php if($narrative_file != ''){?>
                                    <img src="<?=env('UPLOADS_URL').'narrative/'.$narrative_file?>" alt="narrative_file" style="width: 150px; height: 150px; margin-top: 10px;">
                                    <?php } else {?>
                                    <img src="<?=env('NO_IMAGE')?>" alt="narrative_file" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                                    <?php }?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="first_image_file" class="col-md-2 col-lg-4 col-form-label">16A2) TYPE A: First image/photograph accompanying word narrative</label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="file" name="first_image_file" class="form-control" id="first_image_file">
                                    <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed</small><br>                                    
                                    <?php if($first_image_file != ''){?>
                                    <img src="<?=env('UPLOADS_URL').'narrative/'.$first_image_file?>" alt="first_image_file" style="width: 150px; height: 150px; margin-top: 10px;">
                                    <?php } else {?>
                                    <img src="<?=env('NO_IMAGE')?>" alt="first_image_file" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                                    <?php }?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="second_image_file" class="col-md-2 col-lg-4 col-form-label">16A3) TYPE A: Second image/photograph accompanying word narrative</label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="file" name="second_image_file" class="form-control" id="second_image_file">
                                    <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed</small><br>                                    
                                    <?php if($second_image_file != ''){?>
                                    <img src="<?=env('UPLOADS_URL').'narrative/'.$second_image_file?>" alt="second_image_file" style="width: 150px; height: 150px; margin-top: 10px;">
                                    <?php } else {?>
                                    <img src="<?=env('NO_IMAGE')?>" alt="second_image_file" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                                    <?php }?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="art_image_file" class="col-md-2 col-lg-4 col-form-label">16B1) TYPE B: Art image + descriptive narrative | art image</label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="file" name="art_image_file" class="form-control" id="art_image_file">
                                    <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed</small><br>                                    
                                    <?php if($art_image_file != ''){?>
                                    <img src="<?=env('UPLOADS_URL').'art_image/'.$art_image_file?>" alt="art_image_file" style="width: 150px; height: 150px; margin-top: 10px;">
                                    <?php } else {?>
                                    <img src="<?=env('NO_IMAGE')?>" alt="art_image_file" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                                    <?php }?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="art_image_desc" class="col-md-2 col-lg-4 col-form-label">16B2) TYPE B: Art image + descriptive narrative | descriptive narrative (100-250 words)
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    <textarea class="form-control" id="art_image_desc" name="art_image_desc" rows="4" cols="50" placeholder="Your art_image_desc here..." required><?= $art_image_desc ?></textarea>
                                    <div id="art_image_descError" class="error"></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="art_video_file" class="col-md-2 col-lg-4 col-form-label">16C1) TYPE C: Video + descriptive narrative | audiovisual media (3-10 min.)</label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="file" name="art_video_file" class="form-control" id="art_video_file">
                                    <small class="text-info">* Only MP4, AVI, MOV, MKV, WEBM files are allowed</small><br>                                    
                                    <?php if($art_video_file != ''){?>
                                    <img src="<?=env('UPLOADS_URL').'art_video/'.$art_video_file?>" alt="art_video_file" style="width: 150px; height: 150px; margin-top: 10px;">
                                    <?php } else {?>
                                    <img src="<?=env('NO_IMAGE')?>" alt="art_video_file" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                                    <?php }?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="art_video_desc" class="col-md-2 col-lg-4 col-form-label">16C2) TYPE C: Video + narrative | descriptive narrative (100-250 words)
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    <textarea class="form-control" id="art_video_desc" name="art_video_desc" rows="4" cols="50" placeholder="Your art_video_desc here..." required><?= $art_video_desc ?></textarea>
                                    <div id="art_video_descError" class="error"></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="country" class="col-md-2 col-lg-4 col-form-label">17) Nation/country of residence</label>
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
                            <div class="row mb-3">
                                <label for="state" class="col-md-2 col-lg-4 col-form-label">18) State/province of residence</label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="text" name="state" class="form-control" id="state"
                                        value="<?= $state ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="city" class="col-md-2 col-lg-4 col-form-label">19) Village/town/city of residence</label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="text" name="city" class="form-control" id="city"
                                        value="<?= $city ?>" required>
                                </div>
                            </div> 
                            <div class="row mb-3">
                                <label for="organization_name" class="col-md-2 col-lg-4 col-form-label">20) Grassroots organization name (if no grassroots affiliation, type N/A)
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="text" name="organization_name" class="form-control" id="organization_name"
                                        value="<?= $organization_name ?>" required>
                                </div>
                            </div> 
                            <div class="row mb-3">
                                <label for="organization_website" class="col-md-2 col-lg-4 col-form-label">21) Grassroots organization website  (if no website, type N/A)
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="text" name="organization_website" class="form-control" id="organization_website"
                                        value="<?= $organization_website ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="ecosystem_affiliation" class="col-md-2 col-lg-4 col-form-label">22) Ancestral continental ecoweb affiliation (continental ethnicity) (select all that apply)
                                </label>
                                <div class="col-md-10 col-lg-8">                                                                                                
                                    @if ($ecosystem_affiliation)
                                        @foreach ($ecosystem_affiliation as $data)
                                        <input type="checkbox" name="ecosystem_affiliation[]" value="{{ $data->id }}" @if(in_array($data->id, old('ecosystem_affiliation', $ecosystem_affiliationId))) checked @endif>{{ $data->name }}<br>
                                        @endforeach
                                    @endif                                
                                </div>
                            </div>   
                            <div class="row mb-3">
                                <label for="Indigenous_affiliation" class="col-md-2 col-lg-4 col-form-label">23) Ancestral regional ecoweb affiliation (please further define your ethnicity, e.g., region of South Asia and/or Indigenous tribe/nation)
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="text" name="indigenous_affiliation" class="form-control" id="indigenous_affiliation"
                                    value="<?= $indigenous_affiliation ?>" required>
                                </div>
                            </div> 
                            <div class="row mb-3">
                                <label for="expertise_area" class="col-md-2 col-lg-4 col-form-label">24) Your expertise area (select all that apply)
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    @if ($expertise_area)
                                        @foreach ($expertise_area as $data)
                                        <input type="checkbox" name="expertise_area[]" value="{{ $data->id }}" @if(in_array($data->id, old('expertise_area', $expertise_areaId))) checked @endif>{{ $data->name }}<br>
                                        @endforeach
                                    @endif
                                </div>
                            </div> 
                            <div class="row mb-3">
                                <label for="bio_short" class="col-md-2 col-lg-4 col-form-label">25) 1-sentence biography (max. 40 words)
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    <textarea class="form-control" id="bio_short" name="bio_short" rows="4" cols="50" placeholder="Your explanation here..." required><?= $bio_short ?></textarea>
                                    <div id="bio_shortError" class="error"></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="bio_long" class="col-md-2 col-lg-4 col-form-label">26) 1-paragraph biography (150-250 words)
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    <textarea class="form-control" id="bio_long" name="bio_long" rows="4" cols="50" placeholder="Your explanation here..." required><?= $bio_long ?></textarea>
                                    <div id="bio_longError" class="error"></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="bio_long" class="col-md-2 col-lg-4 col-form-label">27) Instructions for initial submission of Creative-Work for eligibility screening:
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    <p>Once you have completed this form and uploaded all required files, click on the "submit" button below.</p>
                                    <p>If you meet the eligibility criteria, you will receive an Eligibility E-mail with a Submission Reference Number ("SRN") and accompanying Non-Exclusive License to Publish ("NELP").</p>
                                </div>
                                <label for="bio_long" class="col-md-2 col-lg-4 col-form-label">28) Instructions for final submission of Creative-Work for consideration of publication:
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    <p>The substance of your Creative-Work will not be further reviewed by the editor(s) until you upload a completed and signed digital copy of the NELP, according to the process described in your Eligibility E-mail.</p>                                
                                    <input type="checkbox" id="acknowledge" name="acknowledge" value="1" required>
                                    <label for="acknowledge">I understand</label>
                                </div>
                            </div>     
                        </div>                   
                        <div class="text-center">
                            <button type="submit" id="submitButton" class="btn btn-primary" disabled><?= $row ? 'Save' : 'Add' ?></button>
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
    $(document).ready(function() {
        // Function to show/hide the invited and participated fields
        function toggleFields() {
            const invitedYes = $('#invited_yes').is(':checked');
            const participatedYes = $('#participated_yes').is(':checked');
            
            // Toggle individual sections
            $('#invitedDetails').toggle(invitedYes);
            $('#participatedDetails').toggle(participatedYes);

            // Check if both are "No" and hide the rest of the form
            const invitedNo = $('#invited_no').is(':checked');
            const participatedNo = $('#participated_no').is(':checked');

            if (invitedNo && participatedNo) {
                $('#formDetails').hide();
                $('#submitButton').prop('disabled', false);
                $('#invited_by_email, #invited_by, #explanation, #explanation_submission, #creative_Work, #art_image_desc, #art_video_desc, #country, #state, #city, #organization_name, #organization_website, #indigenous_affiliation, #bio_short, #bio_long, #acknowledge').removeAttr('required');
            }
            else{
                $('#formDetails').show();
                $('#submitButton').prop('disabled', true);
            }
        }

        // Trigger on change
        $('input[name="invited"], input[name="participated"]').on('change', function() {
            toggleFields();
        });

        // Check initial state on page load
        toggleFields();
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
        allValid &= checkWordLimit(document.getElementById('creative_Work'), 10, 'creative_WorkError');
        allValid &= checkWordLimit(document.getElementById('subtitle'), 40, 'subtitleError');
        allValid &= checkWordLimit(document.getElementById('art_image_desc'), 250, 'art_image_descError');
        allValid &= checkWordLimit(document.getElementById('art_video_desc'), 250, 'art_video_descError');
        allValid &= checkWordLimit(document.getElementById('bio_short'), 40, 'bio_shortError');
        allValid &= checkWordLimit(document.getElementById('bio_long'), 250, 'bio_longError');        

        document.getElementById('submitButton').disabled = !allValid;
    }
</script>
