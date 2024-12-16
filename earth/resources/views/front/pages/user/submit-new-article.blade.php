<style type="text/css">
    .choices__list--multiple .choices__item {
        background-color: #d81636;
        border: 1px solid #d81636;
    }
    .error { color: red; }
    .heading{
        margin: 0;
        padding: 10px;
        border-radius: 5px;
        border: 2px solid #d09c1c;
        text-align: center;
        margin-bottom: 15px;
        background: #d09c1c;
        color: #fff;
    }
</style>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
<!-- <link rel="stylesheet" type="text/css" href="http://localhost/ecosymbiontgit/earth/public/material/frontend/assets/css/bootstrap.min.css" media="screen"> -->
<!-- block content -->
    <div class="block-content">
        <!-- single-post box -->
        <div class="row">
            <div class="col-xl-12">
                @if(session('success_message'))
                    <div class="alert alert-success bg-success text-dark border-0 alert-dismissible show autohide" role="alert">
                        {{ session('success_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                @endif
                @if(session('error_message'))
                    <div class="alert alert-danger bg-danger text-dark border-0 alert-dismissible show autohide" role="alert">
                        {{ session('error_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                @endif
            </div>
            <?php
            // dd($profile);
            // $setting = GeneralSetting::where('id', '=', 1)->first();
            if ($row) {
                //   Helper::pr($row);
                $user_id = $row->user_id;
                $author_classification = $row->author_classification;
                $co_authors = $row->co_authors;
                $co_authors_position = $row->co_authors_position;
                $co_author_name = json_decode($row->co_author_names);
                $co_author_short_bio = json_decode($row->co_author_bios);            
                $co_author_countries =json_decode($row->co_author_countries);
                $co_author_organizations = json_decode($row->co_author_organizations);            
                $co_ecosystem_affiliations = json_decode($row->co_ecosystem_affiliations);
                $co_indigenous_affiliations = json_decode($row->co_indigenous_affiliations);
                $co_author_classification = json_decode($row->co_author_classification);
                $first_name = $row->first_name;                               
                $email = $row->email;          
                $for_publication_name = $row->for_publication_name;          
                $countryId = $row->country;                              
                $creative_Work = $row->creative_Work;  
                $orginal_work = $row->orginal_work;        
                $copyright = $row->copyright; 
                $invited = $row->invited;
                $invited_by = $row->invited_by;  
                $invited_by_email = $row->invited_by_email;  
                $explanation = $row->explanation;  
                $explanation_submission = $row->explanation_submission;              
                $titleId = $row->titleId;  
                $news_categoryId = $row->section_ertId;
                $pronounId = $row->pronounId;
                $subtitle = $row->subtitle;
                $submission_types = $row->submission_types;
                $narrative_file = $row->narrative_file;
                $narrative_images = $row->narrative_images;
                $image_files = json_decode($row->image_files);
                $narrative_image_desc = json_decode($row->narrative_image_desc);
                $art_images = $row->art_images;
                $art_image_file = json_decode($row->art_image_file);
                $art_image_desc = json_decode($row->art_image_desc);                             
                $first_image_file = $row->first_image_file;
                $second_image_file = $row->second_image_file;                                
                $art_video_file = $row->art_video_file;
                $art_video_desc = $row->art_video_desc;
                $art_desc = $row->art_desc;
                $state = $row->state;
                $city = $row->city;
                $participated = $row->participated;
                $participated_info = $row->participated_info;
                $organization_name = $row->organization_name;
                $organization_website = $row->organization_website;
                $ecosystem_affiliationId = (($row->ecosystem_affiliationId != '')?json_decode($row->ecosystem_affiliationId):[]);
                $indigenous_affiliation = $row->indigenous_affiliation;
                $expertise_areaId = (($row->expertise_areaId != '')?json_decode($row->expertise_areaId):[]);
                $bio_short = $row->bio_short;
                $bio_long = $row->bio_long;            
                $acknowledge = $row->acknowledge;
            } else {
                $user_id = '';
                $author_classification = '';
                $co_authors = '';
                $co_authors_position = '';
                $co_author_name = '';
                $co_author_short_bio = '';
                $first_name = $profile->first_name;                                 
                $email = $profile->email;           
                $for_publication_name = $profile->for_publication_name;           
                $countryId = $profile->country;                                 
                $creative_Work = '';  
                $orginal_work = '';           
                $copyright = ''; 
                $invited = $profile->invited;
                $invited_by = $profile->invited_by;
                $invited_by_email = $profile->invited_by_email;  
                $explanation = $profile->explanation;  
                $explanation_submission = $profile->explanation_submission;                 
                $titleId = $profile->titleId;
                $news_categoryId = '';
                $pronounId = $profile->pronounId;
                $subtitle = '';
                $submission_types = '';
                $narrative_file = '';
                $narrative_images = '';
                $art_images = '';
                $first_image_file = '';
                $second_image_file = '';
                $art_image_file = '';
                $narrative_image_desc_1 = '';
                $art_image_desc = '';
                $art_video_file = '';
                $art_video_desc = '';
                $art_desc = '';
                $state = $profile->state;
                $city = $profile->city;
                $participated = $profile->participated;
                $participated_info = $profile->participated_info;
                $organization_name = $profile->organization_name;
                $organization_website = $profile->organization_website;
                $ecosystem_affiliationId = json_decode($profile->ecosystem_affiliationId);
                $indigenous_affiliation = $profile->indigenous_affiliation;
                $expertise_areaId = json_decode($profile->expertise_areaId);
                $bio_short = $profile->bio_short;
                $bio_long = $profile->bio_long;                        
                $acknowledge = '';
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
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="heading">Form: Creative-work</h3>
                    </div>
                    <div class="card-body">
                        <p style="color: #d81636; font-weight:500;">**Instructions: Please note that you will have to enter all information in one sitting, as there is no save option while you work. Unless you click the "Submit" button, your information will not be entered into the system. We apologize for any inconvenience. Thank you for your contribution.</p>
                        <form method="POST" id="saveForm" action="" enctype="multipart/form-data" oninput="validateForm()">
                        <!-- <input type="hidden" name="form_action" id="formAction"> -->
                            @csrf
                            <div class="row mb-3">
                                <label for="email" class="col-md-2 col-lg-4 col-form-label">1) Email address</label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="email" name="email" class="form-control" id="email"
                                        value="<?= $email ?>" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="author_classification" class="col-md-2 col-lg-4 col-form-label">2) Author Classification
                                </label>
                                <div class="col-md-10 col-lg-8">                                                                      
                                    <input type="text" class="form-control" id="Ecoweb-rooted community" name="author_classification" value="<?= $classification->name; ?>" readonly>
                                </div>
                            </div> 
                            <div class="row mb-3">
                                <label for="co_authors" class="col-md-2 col-lg-4 col-form-label">3) How many co-authors do you have?
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="radio" id="co_authors_0" name="co_authors" value="0" required @checked(old('co_authors', $co_authors) == '0')>
                                    <label for="0">0</label>
                                    <input type="radio" id="co_authors_1" name="co_authors" value="1" required @checked(old('co_authors', $co_authors) == '1')>
                                    <label for="1">1</label>
                                    <input type="radio" id="co_authors_2" name="co_authors" value="2" required @checked(old('co_authors', $co_authors) == '2')>
                                    <label for="2">2</label>
                                </div>
                            </div>
                            <div id="co_authors_position" style="display: none;border: 1px solid #000; padding: 10px; border-radius: 7px; margin-bottom: 20px;">
                                <div class="row mb-3">
                                    <label for="co_authors_position" class="col-md-2 col-lg-4 col-form-label">3A) (- if answer to (3) is 1 or 2) Indicate in which position your name should appear in the list of authors (the Lead Author, i.e., the first author listed, must be a human individual)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="radio" id="" name="co_authors_position" value="First position" @checked(old('co_authors_position', $co_authors_position) == 'First position')>
                                        <label for="First position">First position</label>
                                        <input type="radio" id="" name="co_authors_position" value="Second position" @checked(old('co_authors_position', $co_authors_position) == 'Second position')>
                                        <label for="Second position">Second position</label>
                                        <input type="radio" id="" name="co_authors_position" value="Third position" @checked(old('co_authors_position', $co_authors_position) == 'Third position')>
                                        <label for="Third position">Third position</label>
                                    </div>
                                </div>
                                <div id="artimageFieldsContainer">
                                    @for ($i = 1; $i <= 2; $i++)
                                    <div class="card mb-3" id="author_card_{{$i}}" style="padding: 11px;border: 1px solid black; display:none;">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <label for="co_author_name_{{$i}}" class="col-md-2 col-lg-4 col-form-label">3B{{$i}}) Co-Author Name</label>
                                                    <div class="col-md-10 col-lg-8">
                                                        <input type="text" name="co_author_name_{{$i}}" class="form-control" id="co_author_name_{{$i}}"
                                                            value="<?php if(isset($co_author_name[$i-1]) && $co_author_name[$i-1] != ''){ echo $co_author_name[$i-1]; }  ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <label for="co_author_short_bio_{{$i}}" class="col-md-2 col-lg-4 col-form-label">3C{{$i}}) Co-Author Short Bio</label>
                                                    <div class="col-md-10 col-lg-8">
                                                        <input type="text" name="co_author_short_bio_{{$i}}" class="form-control" id="co_author_short_bio_{{$i}}"
                                                            value="<?php if(isset($co_author_short_bio[$i-1]) && $co_author_short_bio[$i-1] != '') { echo $co_author_short_bio[$i-1]; } ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <label for="co_author_country_{{$i}}" class="col-md-2 col-lg-4 col-form-label">3D{{$i}}) Co-Author country/nation</label>
                                                    <div class="col-md-10 col-lg-8">
                                                        <select name="co_author_country_{{$i}}" class="form-control" id="co_author_country_{{$i}}" >
                                                            <option value="" selected disabled>Select</option>
                                                            @if ($country)
                                                                @foreach ($country as $data)
                                                                    <option value="{{ $data->id }}" @if(isset($co_author_countries[$i-1]) && $co_author_countries[$i-1] == $data->id) selected @endif>
                                                                        {{ $data->name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>                                        
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <label for="co_authororganization_name_{{$i}}" class="col-md-2 col-lg-4 col-form-label">3E{{$i}}) Co-Author grassroots organization/ ecoweb-rooted community/ movement
                                                    </label>
                                                    <div class="col-md-10 col-lg-8">
                                                        <input type="text" name="co_authororganization_name_{{$i}}" class="form-control" id="co_authororganization_name_{{$i}}"
                                                            value="<?php if(isset($co_author_organizations[$i-1]) && $co_author_organizations[$i-1] != '') { echo $co_author_organizations[$i-1]; } ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <label for="co_ecosystem_affiliation_{{$i}}" class="col-md-2 col-lg-4 col-form-label">3F{{$i}}) What continent are Co-Author ancestors originally from? (select all that apply)
                                                    </label>
                                                    <div class="col-md-10 col-lg-8">
                                                        @if ($ecosystem_affiliation)
                                                            @foreach ($ecosystem_affiliation as $data)
                                                                <input type="checkbox" 
                                                                    name="co_ecosystem_affiliation_{{$i}}[]" 
                                                                    value="{{ $data->id }}" 
                                                                    @if (isset($co_ecosystem_affiliations[$i-1]) && in_array($data->id, $co_ecosystem_affiliations[$i-1] ?? [])) checked @endif>
                                                                {{ $data->name }}<br>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <label for="co_Indigenous_affiliation_{{$i}}" class="col-md-2 col-lg-4 col-form-label">3G{{$i}}) What specific region are Co-author ancestors originally from OR what is the name of your Indigenous community? (example of specific region = Bengal; example of Indigenous community name = Lisjan Ohlone)
                                                    </label>
                                                    <div class="col-md-10 col-lg-8">
                                                        <input type="text" name="co_indigenous_affiliation_{{$i}}" class="form-control" id="indigenous_affiliation_{{$i}}"
                                                        value="<?php if(isset($co_indigenous_affiliations[$i-1]) && $co_indigenous_affiliations[$i-1] != '') { echo $co_indigenous_affiliations[$i-1]; } ?>" >
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-md-12" style="margin-top: 15px">
                                                <div class="row">
                                                    <label for="co_author_classification_{{$i}}" class="col-md-2 col-lg-4 col-form-label">3H{{$i}}) Co-Author Classification</label>
                                                    <div class="col-md-10 col-lg-8">
                                                        <input type="radio" id="Human individual" name="co_author_classification_{{$i}}" value="Human individual" 
                                                            @checked((old('co_author_classification') == 'Human individual') || 
                                                            (isset($co_author_classification[$i-1]) && $co_author_classification[$i-1] == 'Human individual'))>
                                                        <label for="Human individual">Human individual</label>

                                                        <input type="radio" id="Ecoweb-rooted community" name="co_author_classification_{{$i}}" value="Ecoweb-rooted community" 
                                                            @checked((old('co_author_classification') == 'Ecoweb-rooted community') || 
                                                            (isset($co_author_classification[$i-1]) && $co_author_classification[$i-1] == 'Ecoweb-rooted community'))>
                                                        <label for="Ecoweb-rooted community">Ecoweb-rooted community</label>

                                                        <input type="radio" id="Movement" name="co_author_classification_{{$i}}" value="Movement" 
                                                            @checked((old('co_author_classification') == 'Movement') || 
                                                            (isset($co_author_classification[$i-1]) && $co_author_classification[$i-1] == 'Movement'))>
                                                        <label for="Movement">Movement</label>
                                                    </div>
                                                </div> 
                                            </div> 
                                        </div> 
                                    </div> 
                                    @endfor
                                </div>                                                                           
                            </div> 
                            <div class="row mb-3">
                                <label for="first_name" class="col-md-2 col-lg-4 col-form-label">4) Full Legal Name (exactly as it appears on your government-issued identification documents, e.g., passport and/or driver's license)</label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="text" name="first_name" class="form-control" id="first_name"
                                        value="<?= $first_name ?>" readonly>
                                </div>
                            </div>                                                 
                            <div class="row mb-3">
                                <label for="for_publication_name" class="col-md-2 col-lg-4 col-form-label">5) Preferred name for publication (if different from full legal name)</label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="text" name="for_publication_name" class="form-control" id="for_publication_name"
                                        value="<?= $for_publication_name ?>" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="title" class="col-md-2 col-lg-4 col-form-label">6) Title
                                </label>
                                <div class="col-md-10 col-lg-8">                                
                                    @if ($user_title)
                                        @foreach ($user_title as $data)
                                            <!-- <option value="{{ $data->id }}" @selected($data->id == $titleId)> -->
                                            <input type="radio" id="yes" name="title" value="{{ $data->id }}" disabled @checked($data->id == $titleId) >
                                            <label for="yes">{{ $data->name }}</label>
                                                <!-- {{ $data->name }}</option> -->
                                        @endforeach
                                    @endif                                
                                </div>
                            </div>   
                            <div class="row mb-3">
                                <label for="pronoun" class="col-md-2 col-lg-4 col-form-label">7) Pronoun(s) (select all that apply)</label>
                                <div class="col-md-10 col-lg-8">                                                                
                                    @if ($pronoun)
                                        @foreach ($pronoun as $data)
                                            <!-- <option value="{{ $data->id }}" @selected($data->id == $pronounId)> -->
                                            <input type="radio" id="yes" name="pronoun" value="{{ $data->id }}" disabled @checked($data->id == $pronounId) >
                                            <label for="yes">{{ $data->name }}</label>
                                                <!-- {{ $data->name }}</option> -->
                                        @endforeach
                                    @endif                                
                                </div>
                            </div> 
                            <div class="row mb-3">
                                <label for="orginal_work" class="col-md-2 col-lg-4 col-form-label">8) Are all components of this Creative-Work your original work?
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="radio" id="yes" name="orginal_work" value="Yes" required @checked(old('orginal_work', $orginal_work) == 'Yes') onclick="hideModal()">
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="no" name="orginal_work" value="No" required @checked(old('orginal_work', $orginal_work) == 'No') onclick="showModal()">
                                    <label for="no">No</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="copyright" class="col-md-2 col-lg-4 col-form-label">9) Do you own the copyright and licensing rights to all components of your Creative-Work?
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="radio" id="yes" name="copyright" value="Yes" required @checked(old('copyright', $copyright) == 'Yes') onclick="hideModal()">
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="no" name="copyright" value="No" required @checked(old('copyright', $copyright) == 'No') onclick="showModal()">
                                    <label for="no">No</label>
                                </div>
                            </div>                              
                            <!-- Modal -->
                            <!-- <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="alertModalLabel"></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>   -->
                            <div class="row mb-3">
                                <label for="invited" class="col-md-2 col-lg-4 col-form-label">10) Were you invited to submit a Creative-Work to ERT?</label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="radio" id="invited_yes" name="invited" value="Yes" disabled @checked(old('invited', $invited) == 'Yes')>
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="invited_no" name="invited" value="No" disabled @checked(old('invited', $invited) == 'No')>
                                    <label for="no">No</label>
                                </div>
                            </div>  
                            <div id="invitedDetails" style="display: none;">
                                <div class="row mb-3">
                                    <label for="invited_by" class="col-md-2 col-lg-4 col-form-label">10A) Full name of person who invited you to submit a Creative-Work to ERT</label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="invited_by" class="form-control" id="invited_by"
                                            value="<?= $invited_by ?>" readonly>
                                    </div>
                                </div> 
                                <div class="row mb-3">
                                    <label for="invited_by_email" class="col-md-2 col-lg-4 col-form-label">10B) Email address of person who invited you to submit a Creative-Work to ERT
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="invited_by_email" class="form-control" id="invited_by_email"
                                            value="<?= $invited_by_email ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="participated" class="col-md-2 col-lg-4 col-form-label">11) Have you participated as a strategist at an in-person ER Synergy Meeting?
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="radio" id="participated_yes" name="participated" value="Yes" disabled @checked(old('participated', $participated) == 'Yes')>
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="participated_no" name="participated" value="No" disabled @checked(old('participated', $participated) == 'No')>
                                    <label for="no">No</label>
                                </div>
                            </div> 
                            <div id="participatedDetails" style="display: none;">
                                <div class="row mb-3">
                                    <label for="participated_info" class="col-md-2 col-lg-4 col-form-label">11A) Provide date and location of most recent in-person ER Synergy Meeting in which you participated</label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="participated_info" class="form-control" id="participated_info"
                                        value="<?= $participated_info ?>" readonly>                                    
                                    </div>
                                </div> 
                            </div>
                            <div id="formDetails">
                                <div class="row mb-3">
                                    <label for="explanation" class="col-md-2 col-lg-4 col-form-label">12) Explain why you are a grassroots changemaker, innovator, and/or knowledge-holder (max. 100 words)</label>
                                    <div class="col-md-10 col-lg-8">
                                        <textarea class="form-control" id="explanation" name="explanation" rows="4" cols="50" placeholder="Your explanation here..." readonly><?= $explanation ?></textarea>
                                        <div id="explanationError" class="error"></div>
                                    </div>
                                </div>  
                                <div class="row mb-3">
                                    <label for="explanation_submission" class="col-md-2 col-lg-4 col-form-label">13) Explain why and how your Creative-Work relates to regenerating systems that restore, preserve, and foster the mutually beneficial interconnectivity and interdependence (symbiosis) of human communities within and to natural ecological webs (ecowebs) (max. 150 words)</label>
                                    <div class="col-md-10 col-lg-8">
                                        <textarea class="form-control" id="explanation_submission" name="explanation_submission" rows="4" cols="50" placeholder="Your explanation here..." readonly><?= $explanation_submission ?></textarea>
                                        <div id="explanation_submissionError" class="error"></div>
                                    </div>
                                </div> 
                                <div class="row mb-3">
                                    <label for="section_ert" class="col-md-2 col-lg-4 col-form-label">14) For which CATEGORY and sub-category of ERT would you like your Creative-Work to be considered?
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                    @if ($news_category)
                                        @foreach ($news_category as $parent)
                                        <?php $parent_id = $parent->id; 
                                        $sub_category = DB::table('news_category')->where('parent_category', '=', $parent_id)->where('status', '=', 1)->orderBy('sub_category', 'ASC')->get();
                                        // dd($sub_category);
                                        ?>                                         
                                            @foreach ($sub_category as $sub)
                                                <!-- <option value="{{ $parent->id }}" @selected($parent->id == $titleId)> -->
                                                <input type="radio" id="yes" name="section_ert" value="{{ $sub->id }}"  @checked($sub->id == $news_categoryId) >
                                                <label for="yes">{{$parent->sub_category}}: {{ $sub->sub_category }}</label> <br>
                                                    <!-- {{ $data->name }}</option> -->
                                            @endforeach
                                        @endforeach
                                    @endif 
                                                                        
                                    </div>
                                </div>     
                                <div class="row mb-3">
                                    <label for="creative_Work" class="col-md-2 col-lg-4 col-form-label">15) Title of your Creative-Work (max. 10 words)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <textarea class="form-control" id="creative_Work" name="creative_Work" rows="4" cols="50" placeholder="Your creative_Work here..." required><?= $creative_Work ?></textarea>
                                        <div id="creative_WorkError" class="error"></div>
                                    </div>
                                </div>                                            
                                <div class="row mb-3">
                                    <label for="subtitle" class="col-md-2 col-lg-4 col-form-label">16) Subtitle - brief engaging summary of your Creative-Work (max. 40 words)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <textarea name="subtitle" class="form-control" id="subtitle" rows="3"><?= $subtitle ?></textarea>
                                        <div id="subtitleError" class="error"></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="submission_types" class="col-md-2 col-lg-4 col-form-label">17) Select the type of your Creative-Work
                                    </label>
                                    <div class="col-md-10 col-lg-8">                                
                                    @if ($submission_type)
                                        @for ($i = 0; $i < count($submission_type); $i++)
                                            @php
                                                $data = $submission_type[$i];
                                            @endphp
                                            <!-- Use Blade's templating syntax instead of echo inside @php block -->                                        
                                            <input type="radio" id="submission_types_<?=$data->id?>" name="submission_types" value="<?php echo $data->id ?>" @checked($data->id == $submission_types)>
                                            <label for="submission_types"><?php echo $data->name?></label><br>
                                        @endfor
                                    @endif                            
                                    </div>
                                </div> 
                                <div id="submission_types_a" style="display: none; border: 1px solid #000; padding: 10px; border-radius: 7px; margin-bottom: 20px">                          
                                    <div class="row mb-3">
                                        <label for="narrative_file" class="col-md-2 col-lg-4 col-form-label">17A1) TYPE A: word narrative (no embedded images) (500-1000 words for prose, 100-250 words for poetry)</label>
                                        <div class="col-md-10 col-lg-8">
                                            <input type="file" name="narrative_file" class="form-control" id="narrative_file">
                                            <small class="text-info">* Only DOC files are allowed (Max 1 MB)</small><br>
                                            <span id="narrative_file_error" class="text-danger"></span>
                                            <?php if($narrative_file != ''){?>
                                            <a href="<?= env('UPLOADS_URL') . 'narrative/' . $narrative_file ?>" target="_blank"
                                                class="badge bg-primary">View PDF</a>
                                            <?php }?>
                                            <!-- <?php if($narrative_file != ''){?>
                                            <img src="<?=env('UPLOADS_URL').'narrative/'.$narrative_file?>" alt="narrative_file" style="width: 150px; height: 150px; margin-top: 10px;">
                                            <?php } else {?>
                                            <img src="<?=env('NO_IMAGE')?>" alt="narrative_file" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                                            <?php }?> -->
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="narrative_images" class="col-md-2 col-lg-4 col-form-label">17A2) TYPE A: how many images accompany your word narrative?
                                        </label>
                                        <div class="col-md-10 col-lg-8">
                                            <input type="radio" id="narrative_images_1" name="narrative_images" value="1" 
                                            @checked((old('narrative_images') == '1') || 
                                            (isset($narrative_images) && $narrative_images == '1'))>                                        
                                            <label for="1">1</label>

                                            <input type="radio" id="narrative_images_2" name="narrative_images" value="2" 
                                            @checked((old('narrative_images') == '2') || 
                                            (isset($narrative_images) && $narrative_images == '2'))>                                         
                                            <label for="2">2</label>

                                            <input type="radio" id="narrative_images_3" name="narrative_images" value="3" 
                                            @checked((old('narrative_images') == '3') || 
                                            (isset($narrative_images) && $narrative_images == '3'))>                                         
                                            <label for="3">3</label>

                                            <input type="radio" id="narrative_images_4" name="narrative_images" value="4" 
                                            @checked((old('narrative_images') == '4') || 
                                            (isset($narrative_images) && $narrative_images == '4'))>                                        
                                            <label for="4">4</label>

                                            <input type="radio" id="narrative_images_5" name="narrative_images" value="5" 
                                            @checked((old('narrative_images') == '5') || 
                                            (isset($narrative_images) && $narrative_images == '5'))>                                        
                                            <label for="5">5</label>                                        
                                        </div>
                                    </div>
                                    <!-- Image upload and description divs (hidden initially) -->
                                    <div id="imageFieldsContainer">
                                        <!-- These divs will be dynamically shown based on the selected number -->
                                        <div class="card" id="card_1" style="padding: 11px;border: 1px solid black;display: none;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row image-upload-div" id="image_upload_1">
                                                        <label for="first_image_file" class="col-md-2 col-lg-4 col-form-label">17A3a1) TYPE A: image 1 accompanying word narrative</label>
                                                        <div class="col-md-10 col-lg-8">
                                                            <input type="file" name="image_file_1" class="form-control" id="image_file_1">
                                                            <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed</small>
                                                            <span id="image_file_1_error" class="text-danger"></span>                                                        
                                                            <?php if(isset($image_files[0]) && $image_files[0] != ''){?>
                                                            <img src="<?=env('UPLOADS_URL').'narrative/'.$image_files[0]?>" alt="narrative_file" style="width: 150px; height: 150px; margin-top: 10px;">
                                                            <?php }?>
                                                        </div>
                                                    </div>                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row description-div" id="description_1" >
                                                        <label for="narrative_image_desc_1" class="col-md-2 col-lg-4 col-form-label">17A3b1) TYPE A: short caption for image 1 (max. 50 words)</label>
                                                        <div class="col-md-10 col-lg-8">
                                                            <textarea class="form-control" id="narrative_image_desc_1" name="narrative_image_desc_1" rows="4" cols="50" placeholder="Your narrative_image_desc here..." ><?php if(isset($narrative_image_desc[0]) && $narrative_image_desc[0] != '') { echo $narrative_image_desc[0]; } ?></textarea>
                                                            <div id="narrative_image_desc_1Error" class="error"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Repeat for multiple images -->
                                        @for ($i = 2; $i <= 5; $i++)
                                        <div class="card mt-3" id="card_{{$i}}" style="padding: 11px;border: 1px solid black; display: none;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row image-upload-div" id="image_upload_{{ $i }}" >
                                                        <label for="image_file_{{ $i }}" class="col-md-2 col-lg-4 col-form-label">17A3a{{$i}}) TYPE A: image {{ $i }} accompanying word narrative</label>
                                                        <div class="col-md-10 col-lg-8">
                                                            <input type="file" name="image_file_{{ $i }}" class="form-control" id="image_file_{{ $i }}">
                                                            <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed</small>
                                                            <span id="image_file_{{ $i }}_error" class="text-danger"></span>                                                        
                                                            <?php if(isset($image_files[$i-1]) && $image_files[$i-1] != ''){?>
                                                            <img src="<?=env('UPLOADS_URL').'narrative/'.$image_files[$i-1]?>" alt="narrative_file" style="width: 150px; height: 150px; margin-top: 10px;">
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">                                            
                                                    <div class="row description-div" id="description_{{ $i }}" >
                                                        <label for="narrative_image_desc_{{ $i }}" class="col-md-2 col-lg-4 col-form-label">17A3b{{$i}}) TYPE A: short caption for image {{ $i }} (max. 50 words)</label>
                                                        <div class="col-md-10 col-lg-8">
                                                            <textarea class="form-control" id="narrative_image_desc_{{ $i }}" name="narrative_image_desc_{{ $i }}" rows="4" cols="50" placeholder="Your narrative_image_desc here..." ><?php if(isset($narrative_image_desc[$i-1]) && $narrative_image_desc[$i-1] != '') { echo $narrative_image_desc[$i-1]; }?></textarea>
                                                            <div id="narrative_image_desc_{{ $i }}Error" class="error"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endfor
                                    </div>                                
                                </div>
                                <div id="submission_types_b" style="display: none; border: 1px solid #000; padding: 10px; border-radius: 7px; margin-bottom: 20px">
                                    <div class="row mb-3">
                                        <label for="art_images" class="col-md-2 col-lg-4 col-form-label">17B1) TYPE B: How many images related to the same art are you uploading?</label>
                                        <div class="col-md-10 col-lg-8">
                                            <input type="radio" id="art_images_1" name="art_images" value="1" @checked(old('art_images', $art_images) == '1')>
                                            <label for="1">1</label>
                                            <input type="radio" id="art_images_2" name="art_images" value="2" @checked(old('art_images', $art_images) == '2')>
                                            <label for="2">2</label>
                                            <input type="radio" id="art_images_3" name="art_images" value="3" @checked(old('art_images', $art_images) == '3')>
                                            <label for="3">3</label>
                                            <input type="radio" id="art_images_4" name="art_images" value="4" @checked(old('art_images', $art_images) == '4')>
                                            <label for="4">4</label>
                                            <input type="radio" id="art_images_5" name="art_images" value="5" @checked(old('art_images', $art_images) == '5')>
                                            <label for="5">5</label>
                                        </div>
                                    </div>

                                    <!-- Image upload and description divs (hidden initially) -->
                                    <div id="artimageFieldsContainer">
                                        @for ($i = 1; $i <= 5; $i++)
                                        <div class="card mt-3" id="art_card_{{$i}}" style="padding: 11px;border: 1px solid black;display: none;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row image-upload-div" id="art_image_upload_{{ $i }}" >
                                                        <label for="art_image_file_{{ $i }}" class="col-md-2 col-lg-4 col-form-label">17B2a{{$i}}) TYPE B: image {{ $i }} of art</label>
                                                        <div class="col-md-10 col-lg-8">
                                                            <input type="file" name="art_image_file_{{ $i }}" class="form-control" id="art_image_file_{{ $i }}">
                                                            <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed</small>
                                                            <span id="art_image_file_{{ $i }}_error" class="text-danger"></span>                                                        
                                                            <?php if(isset($art_image_file[$i-1]) && $art_image_file[$i-1] != ''){?>
                                                            <img src="<?=env('UPLOADS_URL').'art_image/'.$art_image_file[$i-1]?>" alt="narrative_file" style="width: 150px; height: 150px; margin-top: 10px;">
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row description-div" id="art_description_{{ $i }}" >
                                                        <label for="art_image_desc_{{ $i }}" class="col-md-2 col-lg-4 col-form-label">17B2b{{$i}}) TYPE B: short caption for image {{ $i }} (max. 50 words)</label>
                                                        <div class="col-md-10 col-lg-8">
                                                            <textarea class="form-control" id="art_image_desc_{{ $i }}" name="art_image_desc_{{ $i }}" rows="4" cols="50" placeholder="Your art_image_desc here..." ><?php if(isset($art_image_desc[$i-1]) && $art_image_desc[$i-1] != '') { echo $art_image_desc[$i-1]; }?></textarea>
                                                            <div id="art_image_desc_{{ $i }}Error" class="error"></div>
                                                        </div>
                                                    </div>
                                                </div>                                                                                        
                                            </div>
                                        </div>                                    
                                        @endfor
                                    </div>  
                                    <div class="row mb-3">
                                        <label for="art_desc" class="col-md-2 col-lg-4 col-form-label">17B3) TYPE B: descriptive narrative for art (100-250 words)
                                        </label>
                                        <div class="col-md-10 col-lg-8">
                                            <textarea class="form-control" id="art_desc" name="art_desc" rows="4" cols="50" placeholder="Your art_desc here..." ><?= $art_desc ?></textarea>
                                            <div id="art_descError" class="error"></div>
                                        </div>
                                    </div>                           
                                </div>
                                <div id="submission_types_c" style="display: none; border: 1px solid #000; padding: 10px; border-radius: 7px; margin-bottom: 20px">
                                    <div class="row mb-3">
                                        <label for="art_video_file" class="col-md-2 col-lg-4 col-form-label">17C1) TYPE C: Video (3-10 minutes, Max 10MB)</label>
                                        <div class="col-md-10 col-lg-8">
                                            <input type="file" name="art_video_file" class="form-control" id="art_video_file">
                                            <small class="text-info">* Only MP4, AVI, MOV, MKV, WEBM files are allowed</small><br>  
                                            <span id="art_video_file_error" class="text-danger"></span>                                  
                                            <?php if($art_video_file != ''){?>
                                                <video width="350" height="250" controls>
                                                    <source src="<?=env('UPLOADS_URL').'art_video/'.$art_video_file?>" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>                                        
                                            <?php } ?>                                                                                
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="art_video_desc" class="col-md-2 col-lg-4 col-form-label">17C2) TYPE C: descriptive narrative for video (100-250 words)
                                        </label>
                                        <div class="col-md-10 col-lg-8">
                                            <textarea class="form-control" id="art_video_desc" name="art_video_desc" rows="4" cols="50" placeholder="Your art_video_desc here..." ><?= $art_video_desc ?></textarea>
                                            <div id="art_video_descError" class="error"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="country" class="col-md-2 col-lg-4 col-form-label">18) What country/nation do you live in? (Country of Residence)                                </label>
                                    <div class="col-md-10 col-lg-8">
                                        <select name="country" class="form-control" id="country" readonly>
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
                                    <label for="state" class="col-md-2 col-lg-4 col-form-label">19) State/province of residence</label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="state" class="form-control" id="state"
                                            value="<?= $state ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="city" class="col-md-2 col-lg-4 col-form-label">20) Village/town/city of residence</label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="city" class="form-control" id="city"
                                            value="<?= $city ?>" readonly>
                                    </div>
                                </div> 
                                <div class="row mb-3">
                                    <label for="organization_name" class="col-md-2 col-lg-4 col-form-label">21) Name of your grassroots organization/ ecoweb-rooted community/ movement (if no grassroots affiliation, type N/A)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="organization_name" class="form-control" id="organization_name"
                                            value="<?= $organization_name ?>" readonly>
                                    </div>
                                </div> 
                                <div class="row mb-3">
                                    <label for="organization_website" class="col-md-2 col-lg-4 col-form-label">22) Website of grassroots organization/ ecoweb-rooted community/ movement (if no website, type N/A)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="organization_website" class="form-control" id="organization_website"
                                            value="<?= $organization_website ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="ecosystem_affiliation" class="col-md-2 col-lg-4 col-form-label">23) What continent are your ancestors originally from? (select all that apply)
                                    </label>
                                    <div class="col-md-10 col-lg-8">                                                                                                
                                        @if ($ecosystem_affiliation)
                                            @foreach ($ecosystem_affiliation as $data)
                                            <input type="checkbox" name="ecosystem_affiliation[]" value="{{ $data->id }}" disabled @if(in_array($data->id, old('ecosystem_affiliation', $ecosystem_affiliationId))) checked @endif>  {{ $data->name }}<br>
                                            @endforeach
                                        @endif                                
                                    </div>
                                </div>   
                                <div class="row mb-3">
                                    <label for="Indigenous_affiliation" class="col-md-2 col-lg-4 col-form-label">24) What specific region are your ancestors originally from OR what is the name of your Indigenous community? (example of specific region = Bengal; example of Indigenous community name = Lisjan Ohlone)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="indigenous_affiliation" class="form-control" id="indigenous_affiliation"
                                        value="<?= $indigenous_affiliation ?>" readonly>
                                    </div>
                                </div> 
                                <div class="row mb-3">
                                    <label for="expertise_area" class="col-md-2 col-lg-4 col-form-label">25) Your expertise area (select all that apply)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        @if ($expertise_area)
                                            @foreach ($expertise_area as $data)
                                            <input type="checkbox" name="expertise_area[]" value="{{ $data->id }}" disabled @if(in_array($data->id, old('expertise_area', $expertise_areaId))) checked @endif>  {{ $data->name }}<br>
                                            @endforeach
                                        @endif
                                    </div>
                                </div> 
                                <div class="row mb-3">
                                    <label for="bio_short" class="col-md-2 col-lg-4 col-form-label">26) 1-sentence biography (max. 40 words)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <textarea class="form-control" id="bio_short" name="bio_short" rows="4" cols="50" placeholder="Your explanation here..." readonly><?= $bio_short ?></textarea>
                                        <div id="bio_shortError" class="error"></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="bio_long" class="col-md-2 col-lg-4 col-form-label">27) 1-paragraph biography (150-250 words)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <textarea class="form-control" id="bio_long" name="bio_long" rows="4" cols="50" placeholder="Your explanation here..." readonly><?= $bio_long ?></textarea>
                                        <div id="bio_longError" class="error"></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="bio_long" class="col-md-2 col-lg-4 col-form-label">28) Instructions for initial submission of Creative-Work for eligibility screening:
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <p>Once you have completed this form and uploaded all required files, click on the "submit" button below.</p>
                                        <p>If you meet the eligibility criteria, you will receive an Eligibility E-mail with a Submission Reference Number ("SRN") and accompanying Non-Exclusive License to Publish ("NELP").</p>
                                    </div>
                                    <label for="bio_long" class="col-md-2 col-lg-4 col-form-label">29) Instructions for final submission of Creative-Work for consideration of publication:
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <p>The substance of your Creative-Work will not be further reviewed by the editor(s) until you upload a completed and signed digital copy of the NELP, according to the process described in your Eligibility E-mail.</p>                                
                                        <input type="checkbox" id="acknowledge" name="acknowledge" value="1" required>
                                        <label for="acknowledge">I understand</label>
                                    </div>
                                </div>                                
                            </div>                  
                            <div class="text-center">
                                <button type="submit" id="submitButton" class="btn btn-primary"><?= $row ? 'Save' : 'Submit' ?></button>                                
                            </div>
                            <!-- <div class="text-center">
                                <button type="button" id="savebutton" class="btn btn-primary">Save Now</button>                                                                
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End single-post box -->
    </div>
<!-- End block content -->
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Popup Div (Initially hidden) -->
    <div id="popup">
      <h3><i class="bi bi-exclamation-triangle-fill"></i> Warning</h3>
      <p>You must submit an original Creative-Eork and you must own the copyright and licensing rights to your original Creative-Work.</p>
      <button id="closePopup">Close</button>
    </div>  
    <!-- <div id="save">
      <h3><i class="bi bi-exclamation-triangle-fill"></i> Warning</h3>
      <p>1. To finalize and submit your article, click "Submit". Please note that after submission, you will no longer be able to edit the data.  
      2. To save your article temporarily for further edits before submission, click "Save Now".</p>
      <button id="savenowclose">Close</button>      
    </div>     -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Initially hide the popup
            $('#popup').hide();

            // Disable submit button initially
            $('#submitButton').prop('disabled', false);

            // Show popup and disable submit button when "No" is selected
            $('input[name="orginal_work"], input[name="copyright"]').change(function () {
            if ($(this).val() === 'No') {
                $('#popup').fadeIn();
                $('#submitButton').prop('disabled', true); // Disable submit button
            }
            });

            // Close popup and re-enable submit button
            $('#closePopup').click(function () {
            $('#popup').fadeOut();
            $('#submitButton').prop('disabled', false); // Re-enable submit button
            });
        });

//         $(document).ready(function () {
//             // Initially hide the popup
//             $('#save').hide();
//     // Handle submit button click
//     $('#saveButton').click(function () {
//         $('#save').show; // Show the modal
//     });

//     // Close popup and re-enable submit button
//     $('#savenowclose').click(function () {
//             $('#save').fadeOut();

//             $('#saveForm')
//             .find(':input[required]')
//             .each(function () {
//                 $(this).data('required', true); // Save original required state
//                 $(this).removeAttr('required'); // Remove required temporarily
//             });

//         // Set action to draft
//         $('#formAction').val('draft');

//         // Submit the form
//         $('#saveForm').submit();
//             // $('#submitButton').prop('disabled', false); // Re-enable submit button
//             });
//             //  Restore required attributes
//         $('#saveForm')
//             .find(':input')
//             .each(function () {
//                 if ($(this).data('required')) {
//                     $(this).attr('required', true); // Restore original required state
//                 }
//             });

    
// });
        
    </script>
<!-- Popup end (Initially hidden) -->
<!-- Function to show/hide the invited and participated fields -->
<script>
    $(document).ready(function() {
        
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
                // $('#submitButton').prop('disabled', false);
                $('#invited_by_email, #invited_by, #explanation, #explanation_submission, #creative_Work, #art_image_desc, #art_video_desc, #country, #state, #city, #organization_name, #organization_website, #indigenous_affiliation, #bio_short, #bio_long, #acknowledge').removeAttr('required');
            }
            else{
                $('#formDetails').show();
                // $('#submitButton').prop('disabled', true);
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
<!-- End Function to show/hide the invited and participated fields -->
<!-- Function to toggle the co-authors position section -->
<script>
    // Function to toggle the co-authors position section
    function toggleCoAuthorsPosition() {
        var coAuthors = document.querySelector('input[name="co_authors"]:checked').value;
        var positionDiv = document.getElementById('co_authors_position');    
        
        if (coAuthors == '1' || coAuthors == '2') {
            positionDiv.style.display = 'block';
        } else {
            positionDiv.style.display = 'none';
        }        
    }

    // Add event listeners to co-author radio buttons
    document.querySelectorAll('input[name="co_authors"]').forEach(function(element) {
        element.addEventListener('change', toggleCoAuthorsPosition);
    });    

    // Run the function on page load to ensure correct state
    document.addEventListener('DOMContentLoaded', toggleCoAuthorsPosition);
</script>
<!--End Function to toggle the co-authors position section -->
<!-- Show only the number of co_authors selected -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const coAuthorsRadios = document.querySelectorAll('input[name="co_authors"]');

        // Listen for changes to the co_authors radio buttons
        coAuthorsRadios.forEach(radio => {
            radio.addEventListener('change', function () {
                const selectedValue = this.value;
                toggleCoAuthorsFields(selectedValue);
            });
        });

        function toggleCoAuthorsFields(count) {
            // Hide all co-author fields initially
            for (let i = 1; i <= 2; i++) {
                document.getElementById('author_card_' + i).style.display = 'none';
            }

            // Show only the necessary fields based on the selected number of co-authors
            for (let i = 1; i <= count; i++) {
                document.getElementById('author_card_' + i).style.display = 'block';
            }        
        }

        // Initialize the form with the correct fields displayed if a value is already selected
        const initialSelectedValue = document.querySelector('input[name="co_authors"]:checked');
        if (initialSelectedValue) {
            toggleCoAuthorsFields(initialSelectedValue.value);
        }
    });
</script>
<!--End Show only the number of co_authors selected -->
<!-- Function to toggle the submission_types position section -->
<script>    
    function togglesubmissionTypes() {        
        var submissionTypes = document.querySelector('input[name="submission_types"]:checked').value;        
        var submissionTypesADiv = document.getElementById('submission_types_a');
        var submissionTypesBDiv = document.getElementById('submission_types_b');
        var submissionTypesCDiv = document.getElementById('submission_types_c');                

        if (submissionTypes == '1') {
            submissionTypesADiv.style.display = 'block';
        } else {
            submissionTypesADiv.style.display = 'none';
        }

        if (submissionTypes == '2') {
            submissionTypesBDiv.style.display = 'block';
        } else {
            submissionTypesBDiv.style.display = 'none';
        }

        if (submissionTypes == '3') {
            submissionTypesCDiv.style.display = 'block';
        } else {
            submissionTypesCDiv.style.display = 'none';
        }
    }

    // Add event listeners to co-author radio buttons    
    document.querySelectorAll('input[name="submission_types"]').forEach(function(element) {
        element.addEventListener('change', togglesubmissionTypes);
    });

    // Run the function on page load to ensure correct state
    document.addEventListener('DOMContentLoaded', togglesubmissionTypes);
</script>
<!--End Function to toggle the submission_types position section -->
<!-- Show only the number of narrative images selected -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const imageInputs = document.querySelectorAll('input[name="narrative_images"]');
        
        imageInputs.forEach(input => {
            input.addEventListener('change', function () {
                const selectedValue = this.value;
                showImageUploadFields(selectedValue);
            });
        });
        
        function showImageUploadFields(count) {
            // Hide all image upload and description fields initially
            for (let i = 1; i <= 5; i++) {            
                document.getElementById('card_' + i).style.display = 'none';
            }

            // Show only the number of fields selected
            for (let i = 1; i <= count; i++) {            
                document.getElementById('card_' + i).style.display = 'block';
            }
        }

        // Initialize the form with the correct number of fields if needed
        const initialSelectedValue = document.querySelector('input[name="narrative_images"]:checked');
        if (initialSelectedValue) {
            showImageUploadFields(initialSelectedValue.value);
        }
    });
</script>
<!--End Show only the number of narrative images selected -->
<!-- Show only the number of art images selected -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const artImageRadios = document.querySelectorAll('input[name="art_images"]');

        // Listen for changes to the art_images radio buttons
        artImageRadios.forEach(radio => {
            radio.addEventListener('change', function () {
                const selectedValue = this.value;
                showArtImageFields(selectedValue);
            });
        });

        function showArtImageFields(count) {
            // Hide all image upload and description fields initially
            for (let i = 1; i <= 5; i++) {           
                document.getElementById('art_card_' + i).style.display = 'none';
            }

            // Show only the number of fields corresponding to the selected value
            for (let i = 1; i <= count; i++) {            
                document.getElementById('art_card_' + i).style.display = 'block';
            }
        }

        // Initialize the form with the correct number of fields if a value is already selected
        const initialSelectedValue = document.querySelector('input[name="art_images"]:checked');
        if (initialSelectedValue) {
            showArtImageFields(initialSelectedValue.value);
        }
    });
</script>
<!-- End Show only the number of art images selected -->
<!-- Add real-time size validation script -->
<script>
    document.getElementById('narrative_file').addEventListener('change', function() {
        validateFileSize(this, 'narrative_file_error');
    });
    
    document.getElementById('image_file_1').addEventListener('change', function() {
        validateFileSize(this, 'image_file_1_error');
    });

    @for ($i = 2; $i <= 5; $i++)
    document.getElementById('image_file_{{ $i }}').addEventListener('change', function() {
        validateFileSize(this, 'image_file_{{ $i }}_error');
    });
    @endfor

    document.addEventListener('change', function (event) {
        // Check if the event target is an input file with the required ID format
        if (event.target && event.target.id.startsWith('image_file_')) {
            const inputId = event.target.id;
            const errorId = inputId + '_error'; // Construct the error span ID dynamically
            validateFileSize(event.target, errorId);
        }
    });

    @for ($i = 2; $i <= 5; $i++)
    document.getElementById('art_image_file_{{ $i }}').addEventListener('change', function() {
        validateFileSize(this, 'art_image_file_{{ $i }}_error');
    });
    @endfor

    document.addEventListener('change', function (event) {
        // Check if the event target is an input file with the required ID format
        if (event.target && event.target.id.startsWith('art_image_file_')) {
            const inputId = event.target.id;
            const errorId = inputId + '_error'; // Construct the error span ID dynamically
            validateFileSize(event.target, errorId);
        }
    });      
    
    document.getElementById('art_video_file').addEventListener('change', function() {
        validateVideoFile(this, 'art_video_file_error');
    });

    // Add similar event listeners for other file inputs

    function validateFileSize(input, errorElementId) {
        var file = input.files[0];
        var maxSize = 1 * 1024 * 1024; // 1MB in bytes

        if (file.size > maxSize) {
            // alert('File size exceeds 1MB. Please upload a smaller file.');
            document.getElementById(errorElementId).innerText = "File size exceeds 1MB. Please upload a smaller file.";
            input.value = ''; // Clear the input if validation fails
        } else{
            document.getElementById(errorElementId).innerText = "";
    }
    }

    function validateVideoFile(input, errorElementId) {
        var file = input.files[0];
        var allowedExtensions = ['mp4', 'avi', 'mov', 'mkv', 'webm'];
        var fileSizeLimit = 10485760; // 10MB in bytes

        if (file) {
            var fileExtension = file.name.split('.').pop().toLowerCase();

            // Validate file type
            if (!allowedExtensions.includes(fileExtension)) {
                document.getElementById(errorElementId).innerText = "Invalid file type. Only MP4, AVI, MOV, MKV, WEBM are allowed.";
                input.value = ''; // Clear the input
                return;
            }

            // Validate file size
            if (file.size > fileSizeLimit) {
                document.getElementById(errorElementId).innerText = "File size exceeds 10 MB. Please upload a smaller file.";
                input.value = ''; // Clear the input
                return;
            }
            else{
                document.getElementById(errorElementId).innerText = "";
            }

            // Clear any previous error
            document.getElementById(errorElementId).innerText = '';
        }
    }
</script>
<!-- End real-time size validation script -->
<!-- all word count validation -->
<script>
    function checkWordLimit(field, limit, errorField) {
        //  console.log(field);
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
        allValid &= checkWordLimit(document.getElementById('narrative_image_desc_1'), 50, 'narrative_image_desc_1Error');
        // Loop through the dynamically generated textareas
        for (let i = 2; i <= 5; i++) {
            const textarea = document.getElementById(`narrative_image_desc_${i}`);
            const errorDiv = document.getElementById(`narrative_image_desc_${i}Error`);

            if (textarea) {
                // Perform word limit validation for each textarea
                allValid &= checkWordLimit(textarea, 50, `narrative_image_desc_${i}Error`);
            }
        }  
        // Loop through the dynamically generated textareas
        for (let i = 1; i <= 5; i++) {
            const textarea = document.getElementById(`art_image_desc_${i}`);
            const errorDiv = document.getElementById(`art_image_desc_${i}Error`);

            if (textarea) {
                // Perform word limit validation for each textarea
                allValid &= checkWordLimit(textarea, 50, `art_image_desc_${i}Error`);
            }
        }                
        allValid &= checkWordLimit(document.getElementById('art_desc'), 250, 'art_descError');
        allValid &= checkWordLimit(document.getElementById('art_video_desc'), 250, 'art_video_descError');
        allValid &= checkWordLimit(document.getElementById('bio_short'), 40, 'bio_shortError');
        allValid &= checkWordLimit(document.getElementById('bio_long'), 250, 'bio_longError');        

        document.getElementById('submitButton').disabled = !allValid;
    }
</script>
<!-- End all word count validation -->