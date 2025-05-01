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
    .blue-text{
        color: #6187ce;
    }
    .badge {
        display: inline-block;
        min-width: 10px;
        padding: 3px 7px;
        font-size: 12px;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        background-color: #d09c1c;
        border-radius: 10px;
        margin-right: 3px;
    }
</style>
<?php
function numberToOrdinal($number) {
    $ordinals = [
        1 => 'First',
        2 => 'Second',
        3 => 'Third',
        4 => 'Fourth',
        5 => 'Fifth',
        6 => 'Sixth',
        7 => 'Seventh',
        8 => 'Eighth',
        9 => 'Ninth',
        10 => 'Tenth'
    ];
    
    return $ordinals[$number] ?? $number;
}
?>
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

use Illuminate\Support\Facades\DB;

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
                $co_author_pronoun = json_decode($row->co_author_pronoun);
                // dd($co_author_pronoun);
                $first_name = $row->first_name;
                $email = $row->email;
                $for_publication_name = $row->for_publication_name;
                $countryId = $row->country;
                $creative_Work = $row->creative_Work;
                $creative_Work_fiction = $row->creative_Work_fiction;
                $orginal_work = $row->orginal_work;
                $copyright = $row->copyright; 
                $invited = $row->invited;
                $invited_by = $row->invited_by;  
                $invited_by_email = $row->invited_by_email;  
                $explanation = $row->explanation;  
                $explanation_submission = $row->explanation_submission;              
                $titleId = $row->titleId;  
                // $news_categoryId = $row->section_ertId;
                $news_categoryId = $row->section_ertId ?? '';
                $pronounId = $row->pronounId;
                $subtitle = $row->subtitle;
                $submission_types = $row->submission_types;
                $additional_information = $row->additional_information;
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
                $community = $row->community;
                $community_name = $row->community_name;
                $projects = $row->projects;
                $projects_name = $row->projects_name;
                $organization_name = $row->organization_name;
                $organization_website = $row->organization_website;
                $ecosystem_affiliationId = (($row->ecosystem_affiliationId != '')?json_decode($row->ecosystem_affiliationId):[]);
                $indigenous_affiliation = $row->indigenous_affiliation;
                $expertise_areaId = (($row->expertise_areaId != '')?json_decode($row->expertise_areaId):[]);
                $bio_short = $row->bio_short;
                $bio_long = $row->bio_long;            
                $acknowledge = $row->acknowledge;

                $is_series                  = $row->is_series;
                $series_article_no          = $row->series_article_no;
                $current_article_no         = $row->current_article_no;
                $other_article_part_doi_no  = $row->other_article_part_doi_no;
            } else {
                $user_id = '';
                $author_classification = '';
                $co_authors = '';
                $co_authors_position = '';
                $co_author_name = '';
                $co_author_short_bio = '';
                $co_author_countries = '';
                $co_author_organizations = '';
                $co_ecosystem_affiliations = '';
                $co_indigenous_affiliations = '';
                $co_author_classification = '';
                $co_author_pronoun = '';

                $first_name = $profile->first_name;                                 
                $email = $profile->email;           
                $for_publication_name = $profile->for_publication_name;           
                $countryId = $profile->country;                                 
                $creative_Work = '';
                $creative_Work_fiction = '';
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
                $additional_information = '';
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
                $community = $profile->community;
                $community_name = $profile->community_name;  
                $projects_name = '';                              
                $organization_name = $profile->organization_name;
                $organization_website = $profile->organization_website;
                $ecosystem_affiliationId = json_decode($profile->ecosystem_affiliationId);
                $indigenous_affiliation = $profile->indigenous_affiliation;
                $expertise_areaId = json_decode($profile->expertise_areaId);
                $bio_short = $profile->bio_short;
                $bio_long = $profile->bio_long;                        
                $acknowledge = '';

                $is_series                  = '';
                $series_article_no          = '';
                $current_article_no         = '';
                $other_article_part_doi_no  = '';
            }
            ?>
             @if ($errors->any())
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                       
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
            @endif
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="heading">Form: Creative-Work</h3>
                    </div>
                    <div class="card-body">
                        <p style="color: #d81636; font-weight:500;font-size: 14px;margin-bottom: 25px;"><em>**Instructions: <b>Please make sure you have completed your Profile (click on Profile tab on the left to go there, if you haven't) before filling out this form.</b> All questions in BLUE must be answered. Please note that you will have to enter all information in one sitting, as there is no save option while you work. Unless you click the "Submit" button, your information will not be entered into the system. We apologize for any inconvenience. Thank you for your contribution.</em></p>
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
                                <label for="co_authors" class="col-md-2 col-lg-4 col-form-label blue-text">3) How many co-authors do you have?
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="radio" id="co_authors_0" name="co_authors" value="0" required @checked(old('co_authors', $co_authors ?? '') == '0')>
                                    <label for="0">0</label>
                                    <input type="radio" id="co_authors_1" name="co_authors" value="1" required @checked(old('co_authors', $co_authors ?? '') == '1')>
                                    <label for="1">1</label>
                                    <input type="radio" id="co_authors_2" name="co_authors" value="2" required @checked(old('co_authors', $co_authors ?? '') == '2')>
                                    <label for="2">2</label>
                                    <div id="co_authors-error" class="error" style="display: none;"></div>
                                </div>
                                
                            </div>
                            <div id="co_authors_position" style="display: none;border: 1px solid #000; padding: 10px; border-radius: 7px; margin-bottom: 20px;">
                                <div class="row mb-3">
                                    <label for="co_authors_position" class="col-md-2 col-lg-4 col-form-label">3A) If you have co-author(s), indicate in which position your name should appear in the list of authors (the Lead Author, i.e., the first author listed, must be a human individual)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="radio" id="" name="co_authors_position" value="First position" @checked(old('co_authors_position', $co_authors_position ?? '') == 'First position')>
                                        <label for="First position">First position</label>
                                        <input type="radio" id="" name="co_authors_position" value="Second position" @checked(old('co_authors_position', $co_authors_position ?? '') == 'Second position')>
                                        <label for="Second position">Second position</label>
                                        <input type="radio" id="" name="co_authors_position" value="Third position" @checked(old('co_authors_position', $co_authors_position ?? '') == 'Third position')>
                                        <label for="Third position">Third position</label>
                                        <div id="co_authors_position-error" class="error"></div>
                                    </div>
                                </div>                                
                                <div id="artimageFieldsContainer">
                                    @for ($i = 1; $i <= 2; $i++)
                                    <div class="card mb-3" id="author_card_{{$i}}" style="padding: 11px;border: 1px solid black; display:none;">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <label for="co_author_name_{{$i}}" class="col-md-2 col-lg-4 col-form-label">3B{{$i}}) <?=numberToOrdinal($i)?> co-author’s name</label>
                                                    <div class="col-md-10 col-lg-8">
                                                        <input type="text" name="co_author_name_{{$i}}" class="form-control" id="co_author_name_{{$i}}"
                                                        value="{{ old("co_author_name_$i", $co_author_name[$i - 1] ?? '') }}">
                                                        <div id="co_author_name_{{$i}}-error" class="error"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <label for="co_author_short_bio_{{$i}}" class="col-md-2 col-lg-4 col-form-label">3C{{$i}}) <?=numberToOrdinal($i)?> co-author’s short bio (30-40 words)</label>
                                                    <div class="col-md-10 col-lg-8">
                                                        <input type="text" name="co_author_short_bio_{{$i}}" class="form-control" id="co_author_short_bio_{{$i}}"
                                                        value="{{ old("co_author_short_bio_$i", $co_author_short_bio[$i - 1] ?? '') }}">
                                                        <div id="co_author_short_bio_{{$i}}Error" class="error"></div>
                                                        <div id="co_author_short_bio_{{$i}}-error" class="error"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <label for="co_author_country_{{$i}}" class="col-md-2 col-lg-4 col-form-label">3D{{$i}}) <?=numberToOrdinal($i)?> co-author’s country of residence</label>
                                                    <div class="col-md-10 col-lg-8">
                                                        <select name="co_author_country_{{$i}}" class="form-control" id="co_author_country_{{$i}}" >
                                                            <option value="" selected>Select</option>
                                                            @if ($country)
                                                                @foreach ($country as $data)
                                                                    <option value="{{ $data->id }}" @selected(old("co_author_country_$i", $co_author_countries[$i - 1] ?? '') == $data->id)>
                                                                        {{ $data->name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        <div id="co_author_country_{{$i}}-error" class="error"></div>
                                                    </div>
                                                </div>                                        
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <label for="co_authororganization_name_{{$i}}" class="col-md-2 col-lg-4 col-form-label">3E{{$i}}) <?=numberToOrdinal($i)?> co-author’s grassroots organization/ ecoweb-rooted community/ movement
                                                    </label>
                                                    <div class="col-md-10 col-lg-8">
                                                        <input type="text" name="co_authororganization_name_{{$i}}" class="form-control" id="co_authororganization_name_{{$i}}"
                                                        value="{{ old("co_authororganization_name_$i", $co_authororganization_name[$i - 1] ?? '') }}">
                                                        <div id="co_authororganization_name_{{$i}}-error" class="error"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <label for="co_ecosystem_affiliation_{{$i}}" class="col-md-2 col-lg-4 col-form-label">3F{{$i}}) What continent are <?=numberToOrdinal($i)?> co-author’s ancestors originally from? (select all that apply)
                                                    </label>
                                                    <div class="col-md-10 col-lg-8">
                                                        @if ($ecosystem_affiliation)
                                                            @foreach ($ecosystem_affiliation as $data)
                                                                <input type="checkbox" 
                                                                    name="co_ecosystem_affiliation_{{$i}}[]"
                                                                    value="{{ $data->id }}" 
                                                                    @if (in_array($data->id, old("co_ecosystem_affiliation_{$i}", $co_ecosystem_affiliations[$i - 1] ?? []))) checked @endif>
                                                                {{ $data->name }}<br>
                                                            @endforeach
                                                        @endif
                                                        <div id="co_ecosystem_affiliation_{{$i}}-error" class="error"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <label for="co_Indigenous_affiliation_{{$i}}" class="col-md-2 col-lg-4 col-form-label">3G{{$i}}) What specific region are <?=numberToOrdinal($i)?> co-author’s ancestors originally from OR what is the name of first co-author’s Indigenous community? (example of specific region = Bengal; example of Indigenous community name = Lisjan Ohlone)
                                                    </label>
                                                    <div class="col-md-10 col-lg-8">
                                                        <input type="text" name="co_indigenous_affiliation_{{$i}}" class="form-control" id="co_indigenous_affiliation_{{$i}}"
                                                        value="{{ old("co_indigenous_affiliation_$i", $co_indigenous_affiliation[$i - 1] ?? '') }}" >
                                                        <div id="co_indigenous_affiliation_{{$i}}-error" class="error"></div>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-md-12" style="margin-top: 15px">
                                                <div class="row">
                                                    <label for="co_author_classification_{{$i}}" class="col-md-2 col-lg-4 col-form-label">3H{{$i}}) <?=numberToOrdinal($i)?> co-author’s classification</label>
                                                    <div class="col-md-10 col-lg-8">
                                                        <input type="radio" id="Human individual" name="co_author_classification_{{$i}}" value="Human individual" 
                                                            @checked(old("co_author_classification_{$i}", $co_author_classification[$i - 1] ?? '') == 'Human individual')>
                                                        <label for="Human individual">Human individual</label>

                                                        <input type="radio" id="Ecoweb-rooted community" name="co_author_classification_{{$i}}" value="Ecoweb-rooted community" 
                                                            @checked(old("co_author_classification_{$i}", $co_author_classification[$i - 1] ?? '') == 'Ecoweb-rooted community')>
                                                        <label for="Ecoweb-rooted community">Ecoweb-rooted community</label>

                                                        <input type="radio" id="Movement" name="co_author_classification_{{$i}}" value="Movement" 
                                                            @checked(old("co_author_classification_{$i}", $co_author_classification[$i - 1] ?? '') == 'Movement')>
                                                        <label for="Movement">Movement</label>
                                                        <div id="co_author_classification_{{$i}}-error" class="error"></div>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="col-md-12" style="margin-top: 15px">
                                                <div class="row">
                                                    <label for="pronoun" class="col-md-2 col-lg-4 col-form-label">3I{{$i}}) <?=numberToOrdinal($i)?> co-author’s pronoun</label>
                                                    <div class="col-md-10 col-lg-8">
                                                        
                                                        @if ($pronoun)
                                                            @foreach ($pronoun as $data)
                                                                <input type="radio" name="co_author_pronoun_{{$i}}" value="{{ $data->id }}" @checked(old("co_author_pronoun_{$i}") == $data->id)>
                                                                <label>{{ $data->name }}</label>
                                                            @endforeach
                                                        @endif 
                                                        <div id="co_author_pronoun_{{$i}}-error" class="error"></div>                              
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
                                            <input type="radio" class="readonly-input" id="yes" name="title" value="{{ $data->id }}" @checked($data->id == $titleId) >
                                            <label for="yes">{{ $data->name }}</label>
                                                <!-- {{ $data->name }}</option> -->
                                        @endforeach
                                    @endif                                
                                </div>
                            </div>   
                            <div class="row mb-3">
                                <label for="pronoun" class="col-md-2 col-lg-4 col-form-label">7) Pronoun</label>
                                <div class="col-md-10 col-lg-8">                                                                
                                    @if ($pronoun)
                                        @foreach ($pronoun as $data)
                                            <!-- <option value="{{ $data->id }}" @selected($data->id == $pronounId)> -->
                                            <input type="radio" class="readonly-input" id="yes" name="pronoun" value="{{ $data->id }}" @checked($data->id == $pronounId) >
                                            <label for="yes">{{ $data->name }}</label>
                                                <!-- {{ $data->name }}</option> -->
                                        @endforeach
                                    @endif                                
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="orginal_work" class="col-md-2 col-lg-4 col-form-label blue-text">8) Are all components of this Creative-Work your original work?
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="radio" id="yes" name="orginal_work" value="Yes" required @checked(old('orginal_work', $orginal_work ?? '') == 'Yes') onclick="hideModal()">
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="no" name="orginal_work" value="No" required @checked(old('orginal_work', $orginal_work ?? '') == 'No') onclick="showModal()">
                                    <label for="no">No</label>
                                    <div id="orginal_work-error" class="error" style="display: none;"></div>
                                </div>
                                
                            </div>
                            <div class="row mb-3">
                                <label for="copyright" class="col-md-2 col-lg-4 col-form-label blue-text">9) Do you own the copyright and licensing rights to all components of your Creative-Work?
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="radio" id="yes" name="copyright" value="Yes" required @checked(old('copyright', $copyright ?? '') == 'Yes') onclick="hideModal()">
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="no" name="copyright" value="No" required @checked(old('copyright', $copyright ?? '') == 'No') onclick="showModal()">
                                    <label for="no">No</label>
                                    <div id="copyright-error" class="error" style="display: none;"></div>
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
                                <label for="invited" class="col-md-2 col-lg-4 col-form-label">10) Were you invited to submit a Creative-Work to EaRTh?</label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="radio" class="readonly-input" id="invited_yes" name="invited" value="Yes"  @checked(old('invited', $invited) == 'Yes')>
                                    <label for="yes">Yes</label>
                                    <input type="radio" class="readonly-input" id="invited_no" name="invited" value="No"  @checked(old('invited', $invited) == 'No')>
                                    <label for="no">No</label>                                    
                                </div>
                            </div>  
                            <div id="invitedDetails" style="display: none;">
                                <div class="row mb-3">
                                    <label for="invited_by" class="col-md-2 col-lg-4 col-form-label">10A) Full name of person who invited you to submit a Creative-Work to EaRTh</label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="invited_by" class="form-control" id="invited_by"
                                            value="<?= $invited_by ?>" readonly>
                                    </div>
                                </div> 
                                <div class="row mb-3">
                                    <label for="invited_by_email" class="col-md-2 col-lg-4 col-form-label">10B) Email address of person who invited you to submit a Creative-Work to EaRTh
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
                                    <input type="radio" id="participated_yes" class="readonly-input" name="participated" value="Yes"  @checked(old('participated', $participated) == 'Yes')>
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="participated_no" class="readonly-input" name="participated" value="No"  @checked(old('participated', $participated) == 'No')>
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
                                        <textarea class="form-control" id="explanation" name="explanation" rows="4" cols="50"  readonly><?= $explanation ?></textarea>
                                        <div id="explanationError" class="error"></div>
                                    </div>
                                </div>  
                                <div class="row mb-3">
                                    <label for="explanation_submission" class="col-md-2 col-lg-4 col-form-label">13) Explain why and how your Creative-Work relates to regenerating systems that restore, preserve, and foster the mutually beneficial interconnectivity and interdependence (symbiosis) of human communities within and to natural ecological webs (ecowebs) (max. 150 words)</label>
                                    <div class="col-md-10 col-lg-8">
                                        <textarea class="form-control" id="explanation_submission" name="explanation_submission" rows="4" cols="50" readonly><?= $explanation_submission ?></textarea>
                                        <div id="explanation_submissionError" class="error"></div>
                                    </div>
                                </div> 
                                <div class="row mb-3">
                                    <label for="section_ert" class="col-md-2 col-lg-4 col-form-label blue-text">14) For which CATEGORY and sub-category of EaRTh would you like your Creative-Work to be considered?
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
                                                <input type="radio" id="yes" name="section_ert" value="{{ $sub->id }}" required  @checked(old('section_ert') == $sub->id) >
                                                <label for="yes">{{$parent->sub_category}}: {{ $sub->sub_category }}</label> <br>
                                                    <!-- {{ $data->name }}</option> -->
                                            @endforeach
                                        @endforeach
                                    @endif 
                                    <div id="section_ert-error" class="error" style="display: none;"></div>
                                                                        
                                    </div>
                                </div>     
                                <div class="row mb-3">
                                    <label for="creative_Work" class="col-md-2 col-lg-4 col-form-label blue-text">15) Title of your Creative-Work (max. 10 words)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <textarea class="form-control" id="creative_Work" name="creative_Work" rows="4" cols="50"  required>{{ old('creative_Work', $creative_Work ?? '') }}</textarea>
                                        <div id="creative_WorkError" class="error"></div>
                                        <div id="creative_Work-error" class="error"></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="creative_Work" class="col-md-2 col-lg-4 col-form-label blue-text">15a) Is your Creative-Work fiction?
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="radio" id="fiction_yes" name="creative_Work_fiction" value="Yes" required @checked(old('creative_Work_fiction', $creative_Work_fiction) == 'Yes')>
                                        <label for="fiction_yes">Yes</label>
                                        <input type="radio" id="fiction_no" name="creative_Work_fiction" value="No" required @checked(old('creative_Work_fiction', $creative_Work_fiction) == 'No')>
                                        <label for="fiction_no">No</label>
                                        <div id="creative_Work_fiction-error" class="error"></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="subtitle" class="col-md-2 col-lg-4 col-form-label blue-text">16) Subtitle — brief engaging summary of your Creative-Work (30-40 words)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <textarea name="subtitle" class="form-control" id="subtitle" rows="3" required>{{ old('subtitle', $subtitle ?? '') }}</textarea>
                                        <div id="subtitleError" class="error"></div>
                                        <div id="subtitle-error" class="error"></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="submission_types" class="col-md-2 col-lg-4 col-form-label blue-text">17) Select the type of your Creative-Work
                                    </label>
                                    <div class="col-md-10 col-lg-8">                                
                                    @if ($submission_type)
                                        @for ($i = 0; $i < count($submission_type); $i++)
                                            @php
                                                $data = $submission_type[$i];
                                            @endphp
                                            <!-- Use Blade's templating syntax instead of echo inside @php block -->                                        
                                            <input type="radio" id="submission_types_<?=$data->id?>" name="submission_types" value="<?php echo $data->id ?>" required @checked(old('submission_types') == $data->id)>
                                            <label for="submission_types"><?php echo $data->name?></label><br>
                                        @endfor
                                    @endif       
                                    <div id="submission_types-error" class="error"></div>                     
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
                                            <span id="narrative_file-error" class="error"></span>
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
                                            <div id="narrative_images-error" class="error"></div>                                      
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
                                                            <input type="file" name="image_file_1" class="form-control" id="image_file_1" value="{{ old('image_file_1', $image_file_0 ?? '') }}">
                                                            <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed (max. 1 MB)</small>
                                                            <span id="image_file_1_error" class="text-danger"></span>                                                        
                                                            <?php if(isset($image_files[0]) && $image_files[0] != ''){?>
                                                            <img src="<?=env('UPLOADS_URL').'narrative/'.$image_files[0]?>" alt="narrative_file" style="width: 150px; height: 150px; margin-top: 10px;">
                                                            <?php }?>
                                                            <div id="image_file_1-error" class="error"></div>
                                                        </div>
                                                    </div>                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row description-div" id="description_1" >
                                                        <label for="narrative_image_desc_1" class="col-md-2 col-lg-4 col-form-label">17A3b1) TYPE A: short caption for image 1 (max. 50 words)</label>
                                                        <div class="col-md-10 col-lg-8">
                                                            <textarea class="form-control" id="narrative_image_desc_1" name="narrative_image_desc_1" rows="4" cols="50"><?php if(isset($narrative_image_desc[0]) && $narrative_image_desc[0] != '') { echo $narrative_image_desc[0]; } ?></textarea>
                                                            <div id="narrative_image_desc_1Error" class="error"></div>
                                                            <div id="narrative_image_desc_1-error" class="error"></div>
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
                                                            <input type="file" name="image_file_{{ $i }}" class="form-control" id="image_file_{{ $i }}" value="{{ old('image_file_'.$i, $image_files[$i-1] ?? '') }}">
                                                            <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed (max. 1 MB)</small>
                                                            <span id="image_file_{{ $i }}_error" class="text-danger"></span>                                                        
                                                            <?php if(isset($image_files[$i-1]) && $image_files[$i-1] != ''){?>
                                                            <img src="<?=env('UPLOADS_URL').'narrative/'.$image_files[$i-1]?>" alt="narrative_file" style="width: 150px; height: 150px; margin-top: 10px;">
                                                            <?php }?>
                                                            <div id="image_file_{{ $i }}-error" class="error"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">                                            
                                                    <div class="row description-div" id="description_{{ $i }}" >
                                                        <label for="narrative_image_desc_{{ $i }}" class="col-md-2 col-lg-4 col-form-label">17A3b{{$i}}) TYPE A: short caption for image {{ $i }} (max. 50 words)</label>
                                                        <div class="col-md-10 col-lg-8">
                                                            <textarea class="form-control" id="narrative_image_desc_{{ $i }}" name="narrative_image_desc_{{ $i }}" rows="4" cols="50"><?php if(isset($narrative_image_desc[$i-1]) && $narrative_image_desc[$i-1] != '') { echo $narrative_image_desc[$i-1]; }?></textarea>
                                                            <div id="narrative_image_desc_{{ $i }}Error" class="error"></div>
                                                            <div id="narrative_image_desc_{{ $i }}-error" class="error"></div>
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
                                        <div id="image-error-msg" class="error" style="display:none; color:red;"></div>
                                        <div id="art_images-error" class="error"></div>
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
                                                            <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed (max. 1 MB)</small>
                                                            <span id="art_image_file_{{ $i }}_error" class="text-danger"></span>     
                                                            <div id="art_image_file_{{ $i }}-error" class="error"></div>                                                   
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
                                                            <textarea style="resize: none; height: 180px;" class="form-control" id="art_image_desc_{{ $i }}" name="art_image_desc_{{ $i }}" rows="4" cols="50">{{ old('art_image_desc_{{ $i }}', $art_image_desc[$i-1] ?? '') }}</textarea>
                                                            <div id="art_image_desc_{{ $i }}Error" class="error"></div>
                                                            <div id="art_image_desc_{{ $i }}-error" class="error"></div>
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
                                            <textarea class="form-control" id="art_desc" name="art_desc" rows="4" cols="50">{{ old('art_desc', $art_desc ?? '') }}</textarea>
                                            <div id="art_descError" class="error"></div>
                                            <div id="art_desc-error" class="error"></div>
                                        </div>
                                    </div>                           
                                </div>
                                <div id="submission_types_c" style="display: none; border: 1px solid #000; padding: 10px; border-radius: 7px; margin-bottom: 20px">
                                    <div class="row mb-3">
                                        <label for="art_video_file" class="col-md-2 col-lg-4 col-form-label">17C1) TYPE C: Video (5-10 minutes, Max 1 GB)</label>
                                        <div class="col-md-10 col-lg-8">
                                            <input type="file" name="art_video_file" class="form-control" id="art_video_file">
                                            <small class="text-info">* Only MP4, AVI, MOV, MKV, WEBM files are allowed (max. 1GB)</small><br>  
                                            <span id="art_video_file_error" class="text-danger"></span>                                  
                                            <?php if($art_video_file != ''){?>
                                                <video width="350" height="250" controls>
                                                    <source src="<?=env('UPLOADS_URL').'art_video/'.$art_video_file?>" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>                                        
                                            <?php } ?> 
                                            <div id="art_video_file-error" class="error"></div>                                                                               
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="art_video_desc" class="col-md-2 col-lg-4 col-form-label">17C2) TYPE C: descriptive narrative for video (100-250 words)
                                        </label>
                                        <div class="col-md-10 col-lg-8">
                                            <textarea class="form-control" id="art_video_desc" name="art_video_desc" rows="4" cols="50">{{ old('art_video_desc', $art_video_desc ?? '') }}</textarea>
                                            <div id="art_video_descError" class="error"></div>
                                            <div id="art_video_desc-error" class="error"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="additional_information" class="col-md-2 col-lg-4 col-form-label" style="color: grey;">17a) (Optional: max. 100 words) Please share your instagram, facebook, and twitter (x) handles and any comments for the Editor(s).
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <textarea class="form-control" id="additional_information" name="additional_information" rows="4" cols="50">{{ old('additional_information', $additional_information) }}</textarea>
                                        <div id="additional_informationError" class="error"></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="country" class="col-md-2 col-lg-4 col-form-label">18) What country/nation do you live in? (Country of Residence)</label>
                                    <div class="col-md-10 col-lg-8">
                                        <select name="country" class="form-control" id="country">
                                            <option value="" selected >Select</option>
                                            @if ($country)
                                                @foreach ($country as $data)
                                                    <option value="{{ $data->id }}" disabled @selected($data->id == $countryId)>
                                                        {{ $data->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <!-- Hidden input to submit the selected value -->
                                    <input type="hidden" name="country" value="{{ $countryId }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="state" class="col-md-2 col-lg-4 col-form-label">19) State/province of residence</label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="state" class="form-control" id="state" value="<?= $state ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="city" class="col-md-2 col-lg-4 col-form-label">20) Village/town/city of residence</label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="city" class="form-control" id="city" value="<?= $city ?>" readonly>
                                    </div>
                                </div> 
                                <div class="row mb-3">
                                    <label for="organization_name" class="col-md-2 col-lg-4 col-form-label">21) Name of your grassroots organization/ ecoweb-rooted community/ movement (if no grassroots affiliation, type N/A)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="organization_name" class="form-control" id="organization_name" value="<?= $organization_name ?>" readonly>
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
                                            <input type="checkbox" class="readonly-input" name="ecosystem_affiliation[]" value="{{ $data->id }}"  @if(in_array($data->id, old('ecosystem_affiliation', $ecosystem_affiliationId))) checked @endif>  {{ $data->name }}<br>
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
                                            <input type="checkbox" class="readonly-input" name="expertise_area[]" value="{{ $data->id }}" @if(in_array($data->id, old('expertise_area', $expertise_areaId))) checked @endif>  {{ $data->name }}<br>
                                            @endforeach
                                        @endif
                                    </div>
                                </div> 
                                <div class="row mb-3">
                                    <label for="bio_short" class="col-md-2 col-lg-4 col-form-label">26) 1-sentence biography (max. 40 words)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <textarea class="form-control" id="bio_short" name="bio_short" rows="4" cols="50"  readonly><?= $bio_short ?></textarea>
                                        <div id="bio_shortError" class="error"></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="bio_long" class="col-md-2 col-lg-4 col-form-label">27) 1-paragraph biography (150-250 words)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <textarea class="form-control" id="bio_long" name="bio_long" rows="4" cols="50"  readonly><?= $bio_long ?></textarea>
                                        <div id="bio_longError" class="error"></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="community" class="col-md-2 col-lg-4 col-form-label">28) Are you a member of an EaRTh Community?
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="radio" class="readonly-input" id="community_yes" name="community" value="Yes" required @checked(old('community', $community) == 'Yes')>
                                        <label for="yes">Yes</label>
                                        <input type="radio" class="readonly-input" id="community_no" name="community" value="No" required @checked(old('community', $community) == 'No')>
                                        <label for="no">No</label>
                                    </div>
                                </div>
                                <div id="communityDetails" style="display: none;">
                                    <div class="row mb-3">
                                        <label for="community_info" class="col-md-2 col-lg-4 col-form-label">28A) Select Community</label>
                                        <div class="col-md-10 col-lg-8">
                                            <select name="community_name" class="form-control" id="community_name">                                              

                                                @if ($communities)
                                                @foreach ($communities as $data)
                                                    <option value="{{ $data->name }}" disabled @selected($data->name == $community_name)>
                                                        {{ $data->name }}</option>
                                                @endforeach
                                            @endif
                                            </select>
                                            <input type="hidden" name="community_name" value="{{ $community_name }}">
                                        </div>
                                    </div> 
                                </div>
                                <div class="row mb-3">
                                    <label for="projects" class="col-md-2 col-lg-4 col-form-label blue-text">29) Is this a special EaRTh Project?
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="radio" id="projects_yes" name="projects" value="Yes" required @checked(old('projects', $projects) == 'Yes')>
                                        <label for="yes">Yes</label>
                                        <input type="radio" id="projects_no" name="projects" value="No" required @checked(old('projects', $projects) == 'No')>
                                        <label for="no">No</label>
                                        <div id="projects-error" class="error"></div>
                                    </div>
                                </div>
                                <!-- ?php dd($projects); ?> -->
                                <div id="projectsDetails" style="display: {{ old('projects', $projects ?? '') == 'Yes' ? 'block' : 'none' }};">
                                    <div class="row mb-3">
                                        <label for="projects_info" class="col-md-2 col-lg-4 col-form-label blue-text">29A) Select Projects</label>
                                        <div class="col-md-10 col-lg-8">
                                            <select name="projects_name" class="form-control" id="projects_name">
                                                <option value="" selected>Select</option>
                                                <?php if($projects){ foreach($projects as $proj){?>
                                                    <option value="<?=$proj->name?>" @selected(old("projects_name", $projects_name ?? '') == $proj->name)><?=$proj->name?></option>
                                                <?php } }?>
                                            </select>
                                            <div id="projects_name-error" class="error"></div>
                                            <!-- <input type="hidden" name="projects_name" value="{{ $projects_name }}"> -->
                                        </div>
                                    </div> 
                                </div>
                                <div class="row mb-3">
                                    <label for="bio_long" class="col-md-2 col-lg-4 col-form-label blue-text">30) Instructions for initial submission of Creative-Work for eligibility screening
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <p>Once you have completed this form and uploaded all required files, click on the "Submit" button below. If you meet the eligibility criteria <span style="color: red !important">(determined in part by your response to question 12); also, you
                                        must have selected “Yes” for at least one of questions 10) and 11))</span>, you will receive an Eligibility E-mail with a Submission Reference Number ("SRN").</p>                                        
                                    </div>
                                    <!-- <label for="bio_long" class="col-md-2 col-lg-4 col-form-label blue-text">29) Instructions for final submission of Creative-Work for consideration of publication:
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <p>If your Creative-Work is accepted for publication (most likely, upon editorial revision), the editor(s) will e-mail you a Non-Exclusive License to Publish ("NELP"). Your Creative-Work will not be published until you e-mail back a completed and signed digital copy of the NELP.</p>                                                                        
                                    </div> -->
                                </div>
                                <div class="row mb-3">
                                    <label for="bio_long" class="col-md-2 col-lg-4 col-form-label blue-text">31) If you are submitting a video
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <p>Please note that it may take several minutes for your video to upload. Please do not click on the “Submit” button more than once and do not navigate away from this page, until you are re-directed to a page that tells you: “Creative-Work submitted successfully!”</p>                                        
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="is_series" class="col-md-2 col-lg-4 col-form-label blue-text">32) Is this part of a series?
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="radio" id="series_yes" name="is_series" value="Yes" @checked(old('is_series', $is_series) == 'Yes') required>
                                        <label for="series_yes">Yes</label>
                                        <input type="radio" id="series_no" name="is_series" value="No" @checked(old('is_series', $is_series) == 'No') required>
                                        <label for="series_no">No</label>
                                        <div id="is_series-error" class="error"></div>
                                    </div>
                                </div>
                                <div class="row series_yes mb-3">
                                    <label for="series_article_no" class="col-md-2 col-lg-4 col-form-label blue-text">32a) How many total creative-works in this series?
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="number" name="series_article_no" class="form-control" id="series_article_no" min="1" value="{{ old("series_article_no", $series_article_no ?? '') }}">
                                        <div id="series_article_no-error" class="error"></div>
                                    </div>
                                </div>
                                <div class="row series_yes mb-3">
                                    <label for="current_article_no" class="col-md-2 col-lg-4 col-form-label blue-text">32b) What number in the series is this creative-work?
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="current_article_no" class="form-control" id="current_article_no" value="{{ old("current_article_no", $current_article_no ?? '') }}">
                                        <div id="current_article_no-error" class="error"></div>
                                    </div>
                                </div>
                                <div class="row series_yes mb-3">
                                    <label for="other_article_part_doi_no" class="col-md-2 col-lg-4 col-form-label blue-text">32c) List (in order is submission) the SRNs of each previously submitted creative-work in series (enter a comma after each SRN)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="input-tags" class="form-control" id="input-tags">
                                        <div id="validation-msg" style="color:red; font-size: 0.9em;"></div>
                                        <div id="input-tags-error" class="error"></div>
                                        <textarea class="form-control" name="other_article_part_doi_no" id="other_article_part_doi_no" style="display:none;">{{ old("other_article_part_doi_no", $other_article_part_doi_no ?? '') }}</textarea>
                                        <small class="text-primary">Type a comma after each SRN</small>
                                        <div id="badge-container">
                                            <?php
                                            if($other_article_part_doi_no != ''){
                                                $deal_keywords = explode(",", $other_article_part_doi_no);
                                                if(!empty($deal_keywords)){
                                                for($k=0;$k<count($deal_keywords);$k++){
                                            ?>
                                                <span class="badge"><?=$deal_keywords[$k]?> <span class="remove" data-tag="<?=$deal_keywords[$k]?>">&times;</span></span>
                                            <?php } }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="bio_long" class="col-md-2 col-lg-4 col-form-label blue-text">33) Non-Exclusive License to Publish (NELP)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <p>In the scrollable window below is the text of the Non-Exclusive License to Publish (NELP). Please note that for your Creative-Work to be published on EaRTh, you must sign this NELP (which you do by clicking the small box below the scrollable window). In essence, by signing the NELP, you declare among other things that: (a) all components of this Creative-Work are your (and, if applicable, your co-authors’) own original creation and not anyone else’s; (b) you (and, if applicable, your co-authors) have not used Artificial Intelligence (AI) to generate any of the components of this Creative-Work; and (c) you (and, if applicable, your co-authors) own the copyright to this Creative-Work and have the authority to grant the NELP. Please note that upon signing this NELP, you retain the copyright to your Creative-Work and the right to publish this Creative-Work on other platforms/in other publications, as long as such platforms/publications do not require an exclusive right to publish.</p>                                        
                                        <!-- NELP form content -->
                                        <div style="border: 1px solid #686d72c2; padding: 7px; margin-bottom: 10px; border-radius: 5px;height: 150px;overflow-y: auto;">
                                        <p><strong>NON-EXCLUSIVE LICENSE TO PUBLISH (&ldquo;NELP&rdquo;)</strong></p>                                        
                                        <p>This NELP records the terms under which the Creative-Work (also known as the Contribution) specified in the submission form and below will be published online only on <strong>EaRTh (Ecosymbionts all Regenerate Together)&nbsp;</strong>(the &ldquo;<strong>Platform</strong>&rdquo;). The Platform is published by <strong>Ecosymbionts Regenerate</strong> (the &ldquo;<strong>Publisher</strong>&rdquo;). The Platform is owned by the Śramani Institute (the &ldquo;<strong>Proprietor</strong>&rdquo;).</p>                                        
                                        <p>The <strong>Submission Reference Number (&ldquo;SRN&rdquo;)&nbsp;</strong>associated with this Creative-Work (Contribution) will be sent to the Lead Author once the Creative-Work has been submitted.</p>                                        
                                        <p><strong>Supplementary Material</strong></p>
                                        <p>One of the following is true: (1) Supplementary Materials which have been entirely created by the Author (&ldquo;Original SM&rdquo;) have been submitted to the Publisher for publication/uploading in connection with the Contribution; OR (2) Supplementary Materials which contain third-party materials (&ldquo;Third-party SM&rdquo;) will be submitted to the Publisher for publication/uploading in connection with the Contribution and the Author shall include a prominent notice stating the license terms under which those additional materials can be made available.</p>                                        
                                        <p><strong>1.&nbsp;</strong><strong><span style="width:7pt; display:inline-block;">&nbsp;</span></strong><strong>STANDARD TERMS AND CONDITIONS&nbsp;</strong></p>
                                        <p>1.1 <span style="width:10.59pt; display:inline-block;">&nbsp;</span>The Author hereby agrees to be bound by all terms and conditions in this NELP.</p>                                        
                                        <p><strong>2.&nbsp;</strong><strong><span style="width:7pt; display:inline-block;">&nbsp;</span></strong><strong>LICENSE&nbsp;</strong></p>
                                        <p style="margin-top:0pt; margin-left:27pt; margin-bottom:0pt; text-indent:-27pt; line-height:normal;">2.1<span style="width:13.07pt; text-indent:0pt; display:inline-block;">&nbsp;</span>The term &ldquo;<strong>Contribution</strong>&rdquo; means the Creative-Work created by the Author as identified on page one of this NELP and includes, without exception, all the following versions of the Creative-Work:</p>
                                        <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; text-indent:-36pt; line-height:normal;"><strong>2.1.1.</strong><strong><span style="width:10.46pt; text-indent:0pt; display:inline-block;">&nbsp;</span></strong><strong>Submitted Creative-Work Under Review (&ldquo;SCWUR&rdquo;)</strong>: any version of the Contribution that is under formal review for inclusion on the Platform.</p>
                                        <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; text-indent:-36pt; line-height:normal;"><strong>2.1.2.&nbsp;</strong><strong><span style="width:7.97pt; text-indent:0pt; display:inline-block;">&nbsp;</span></strong><strong>Accepted Creative-Work (&ldquo;ACW&rdquo;)</strong>: the version of the Contribution that has been accepted for publication. This version may include revisions resulting from editor review but may be subject to further editorial input by the Publisher.</p>
                                        <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; text-indent:-36pt; line-height:normal;"><strong>2.1.3.&nbsp;</strong><strong><span style="width:7.97pt; text-indent:0pt; display:inline-block;">&nbsp;</span></strong><strong>Content of Record (&ldquo;CoR&rdquo;)</strong>: the version of the Contribution that is formally published on the Platform and is citable via a permanent identifying Digital Object Identifier (&ldquo;<strong>DOI</strong>&rdquo;). This does not include any &lsquo;early release Creative-Work&rsquo; that has not yet been fixed by processes that are still to be applied, such as copy-editing, proof corrections, layout, and typesetting. The CoR includes any corrected or enhanced CoR.</p>
                                        <p style="margin-top:0pt; margin-left:27pt; margin-bottom:0pt; text-indent:-27pt; line-height:normal;">2.2. <span style="width:7.81pt; text-indent:0pt; display:inline-block;">&nbsp;</span>The term &ldquo;<strong>Supplementary Material</strong>&rdquo; means any additional written, illustrative, image, photographic, audio, and/or video materials submitted or uploaded to the Platform by the Author for publication in connection with the Contribution. Supplementary Material forms part of the Contribution and will be made available in association with the Contribution. Supplementary Material may be original content created by the Author (&ldquo;<strong>Original SM</strong>&rdquo;) or it may be third-party material sourced and cleared in accordance with Clause 4 below by the Author (&ldquo;<strong>Third-party SM</strong>&rdquo;).</p>
                                        <p style="margin-top:0pt; margin-left:27pt; margin-bottom:0pt; text-indent:-27pt; line-height:normal;">2.3.<span style="width:10.3pt; text-indent:0pt; display:inline-block;">&nbsp;</span>In consideration of publication of the Contribution, the Author hereby grants to the Proprietor:</p>
                                        <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; text-indent:-36pt; line-height:normal;">2.3.1. <span style="width:8.46pt; text-indent:0pt; display:inline-block;">&nbsp;</span>a non-exclusive license to publish, reproduce, and distribute the Author&rsquo;s Preferred Name, ancestral continental ecosystem affiliation, ancestral regional ecosystem affiliation, organizational affiliation, and country of residence and the Contribution or any part of it in all forms and media throughout the world, whether print, digital / electronic, whether now known or hereinafter invented, and to grant sublicenses of all subsidiary rights, wherein the Author retains the copyright to the Contribution; and</p>
                                        <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; text-indent:-36pt; line-height:normal;">2.3.2. <span style="width:8.46pt; text-indent:0pt; display:inline-block;">&nbsp;</span>a non-exclusive license to publish, reproduce, and distribute the Author&rsquo;s Preferred Name, ancestral continental ecosystem affiliation, ancestral regional ecosystem affiliation, organizational affiliation, and country of residence and any Supplementary Material or any part of it in all forms and media throughout the world, whether print, digital / electronic, whether now known or hereinafter invented, and to grant sublicenses of all subsidiary rights, wherein the Author retains the copyright to the Supplementary Material.</p>
                                        <p style="margin-top:0pt; margin-left:27pt; margin-bottom:0pt; text-indent:-27pt; line-height:normal;">2.4. <span style="width:7.81pt; text-indent:0pt; display:inline-block;">&nbsp;</span>The licenses described in Clause 2.3 above shall, throughout this NELP, be referred to collectively as the &ldquo;<strong>License</strong>&rdquo;.</p>
                                        <p style="margin-top:0pt; margin-left:27pt; margin-bottom:0pt; text-indent:-27pt; line-height:normal;">2.5. <span style="width:7.81pt; text-indent:0pt; display:inline-block;">&nbsp;</span>The License shall commence upon the Proprietor&rsquo;s formal acceptance to publish the Contribution and shall endure for the legal term of copyright in the Contribution.</p>
                                        <p style="margin-top:0pt; margin-left:27pt; margin-bottom:0pt; text-indent:-27pt; line-height:normal;">2.6. <span style="width:7.81pt; text-indent:0pt; display:inline-block;">&nbsp;</span>The Author hereby asserts his/her/their moral right always to be identified as the author of the Contribution in accordance with the provisions of applicable national and international copyright laws.</p>
                                        <p style="margin-top:0pt; margin-left:18pt; margin-bottom:0pt; text-indent:-18pt; line-height:normal;">&nbsp;</p>
                                        <p><strong>3.&nbsp;</strong><strong><span style="width:7pt; display:inline-block;">&nbsp;</span></strong><strong>UNDERTAKINGS AND REPRESENTATIONS&nbsp;</strong></p>
                                        <p style="margin-top:0pt; margin-left:27pt; margin-bottom:0pt; text-indent:-27pt; line-height:normal;">3.1. <span style="width:7.81pt; text-indent:0pt; display:inline-block;">&nbsp;</span>The Author hereby undertakes and represents that:</p>
                                        <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; text-indent:-36pt; line-height:normal;">3.1.1. <span style="width:8.46pt; text-indent:0pt; display:inline-block;">&nbsp;</span>each named Author has full authority and power to agree to this NELP;</p>
                                        <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; text-indent:-36pt; line-height:normal;">3.1.2. <span style="width:8.46pt; text-indent:0pt; display:inline-block;">&nbsp;</span>the Lead Author has full authority to execute this NELP on behalf of the Author;</p>
                                        <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; text-indent:-36pt; line-height:normal;">3.1.3. <span style="width:8.46pt; text-indent:0pt; display:inline-block;">&nbsp;</span>the Contribution is original and has not been previously published in whole or in part in any medium that has an exclusive license to publish the Contribution;</p>
                                        <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; text-indent:-36pt; line-height:normal;">3.1.4. <span style="width:8.46pt; text-indent:0pt; display:inline-block;">&nbsp;</span>the Contribution and any Supplementary Material contain nothing that infringes any existing copyright or license or any other intellectual property right of any third party;</p>
                                        <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; text-indent:-36pt; line-height:normal;">3.1.5. <span style="width:8.46pt; text-indent:0pt; display:inline-block;">&nbsp;</span>the Contribution and any Supplementary Material contain nothing that breaches a duty of confidentiality or discloses any private or personal information of any person without that person&rsquo;s written consent;</p>
                                        <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; text-indent:-36pt; line-height:normal;">3.1.6. <span style="width:8.46pt; text-indent:0pt; display:inline-block;">&nbsp;</span>all statements contained in the Contribution and any Original SM purporting to be facts are true and any formula, instruction or equivalent contained therein will not, if followed accurately, cause any injury or damage to the user;</p>
                                        <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; text-indent:-36pt; line-height:normal;">3.1.7. <span style="width:8.46pt; text-indent:0pt; display:inline-block;">&nbsp;</span>the Contribution and any Supplementary Material do not contain any libelous or otherwise unlawful material, or any material which would harm the reputation of the Platform or the Publisher or the Proprietor;</p>
                                        <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; text-indent:-36pt; line-height:normal;">3.1.8. <span style="width:8.46pt; text-indent:0pt; display:inline-block;">&nbsp;</span>there are no actual or apparent conflicts of interest connected to the Contribution that have not previously been declared. A conflict of interest is understood to exist if an interest (financial or otherwise) exerts or appears to exert undue influence on the analysis or conclusions in the Contribution, the choice of subject matter, or in any other way that impedes or appears to impede the Author&rsquo;s objectivity or independence;</p>
                                        <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; text-indent:-36pt; line-height:normal;">3.1.9.<span style="width:10.94pt; text-indent:0pt; display:inline-block;">&nbsp;</span>if the Contribution is in a vernacular language that is not English, an accurate English translation has been submitted and, if applicable, accurate English subtitles have been submitted;</p>
                                        <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; text-indent:-36pt; line-height:normal;">3.1.10.<span style="width:5.37pt; text-indent:0pt; display:inline-block;">&nbsp;</span>if a named Author is a representative of an ecoweb-rooted community or a movement, then that named Author is an authorized and accepted representative of the ecoweb-rooted community or the movement;</p>
                                        <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; text-indent:-36pt; line-height:normal;">3.1.11.<span style="width:5.37pt; text-indent:0pt; display:inline-block;">&nbsp;</span>if a named Author has listed a Preferred Name that is different from the named Author&rsquo;s Legal Name, then that named Author authorizes the use of the Preferred Name for publication in association with the Contribution;</p>
                                        <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; text-indent:-36pt; line-height:normal;">3.1.12.<span style="width:5.37pt; text-indent:0pt; display:inline-block;">&nbsp;</span>the Contribution and any Supplementary Material, in part or in whole, have not been generated using Artificial Intelligence (AI).&nbsp;</p>
                                        <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; text-indent:-36pt; line-height:normal;">3.2 <span style="width:19.59pt; text-indent:0pt; display:inline-block;">&nbsp;</span>In the event that the Author is in breach of any of these undertakings the Platform, Proprietor, and/or Publisher shall have the right to cease making the Contribution and/or any Supplementary Material available and/or to require that the Author makes any necessary revisions to the Contribution and/or any Supplementary Material (including any factual information). Any such revisions shall be governed by this NELP.</p>
                                        <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; text-indent:-36pt; line-height:normal;">&nbsp;</p>
                                        <p><strong>4.&nbsp;</strong><strong><span style="width:7pt; display:inline-block;">&nbsp;</span></strong><strong>THIRD-PARTY MATERIALS&nbsp;</strong></p>
                                        <p style="margin-top:0pt; margin-left:27pt; margin-bottom:0pt; text-indent:-27pt; line-height:normal;">4.1. <span style="width:7.81pt; text-indent:0pt; display:inline-block;">&nbsp;</span>The Author further confirms that for (i) any Third-party SM and (ii) any other third-party material within the Contribution:</p>
                                        <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; text-indent:-36pt; line-height:normal;">4.1.1. <span style="width:8.46pt; text-indent:0pt; display:inline-block;">&nbsp;</span>licenses to re-use said content throughout the world in all languages and in all forms and media have or will be obtained from the rights-holders;</p>
                                        <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; text-indent:-36pt; line-height:normal;">4.1.2. <span style="width:8.46pt; text-indent:0pt; display:inline-block;">&nbsp;</span>appropriate acknowledgement to the original source of all such materials has been made; and</p>
                                        <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; text-indent:-36pt; line-height:normal;">4.1.3. <span style="width:8.46pt; text-indent:0pt; display:inline-block;">&nbsp;</span>in the case of photographic/audio/video material, appropriate release forms have been obtained from the individual(s) whose likenesses are represented in the Contribution and/or Third-party SM, as applicable.</p>
                                        <p style="margin-top:0pt; margin-left:27pt; margin-bottom:0pt; text-indent:-27pt; line-height:normal;">4.2.<span style="width:10.3pt; text-indent:0pt; display:inline-block;">&nbsp;</span>Copies of all licenses and/or release documentation acquired in accordance with Clause 4.1 above will, on request, be forwarded to the Platform&rsquo;s editor prior to publication of the Contribution.</p>
                                        <p style="margin-top:0pt; margin-left:18pt; margin-bottom:0pt; text-indent:-18pt; line-height:normal;">&nbsp;</p>
                                        <p style="margin-top:0pt; margin-left:18pt; margin-bottom:0pt; text-indent:-18pt; line-height:normal;"><strong>5.&nbsp;</strong><strong><span style="width:7pt; text-indent:0pt; display:inline-block;">&nbsp;</span></strong><strong>MISCELLANEOUS&nbsp;</strong></p>
                                        <p style="margin-top:0pt; margin-left:27pt; margin-bottom:0pt; text-indent:-27pt; line-height:normal;">5.1. <span style="width:7.81pt; text-indent:0pt; display:inline-block;">&nbsp;</span>If this NELP, and/or any other document provided in connection with this NELP, is or has been translated into any language other than English, the English language version shall prevail.</p>
                                        <p style="margin-top:0pt; margin-left:27pt; margin-bottom:0pt; text-indent:-27pt; line-height:normal;">5.2. <span style="width:7.81pt; text-indent:0pt; display:inline-block;">&nbsp;</span>The information contained in this NELP will be held for record-keeping purposes. The names of the Author may be reproduced on the Platform and provided to print and online indexing and abstracting services and bibliographic databases. The Proprietor and the Publisher comply with applicable data protection and privacy laws in the collection, retention, storage, and use of personal data.</p>
                                        <p style="margin-top:0pt; margin-left:27pt; margin-bottom:0pt; text-indent:-27pt; line-height:normal;">&nbsp;</p>
                                        <p style="margin-top:0pt; margin-left:18pt; margin-bottom:0pt; text-indent:-18pt; line-height:normal;"><strong>6.&nbsp;</strong><strong><span style="width:7pt; text-indent:0pt; display:inline-block;">&nbsp;</span></strong><strong>ENTIRE AGREEMENT&nbsp;</strong></p>
                                        <p style="margin-top:0pt; margin-left:27pt; margin-bottom:0pt; text-indent:-27pt; line-height:normal;">6.1. <span style="width:7.81pt; text-indent:0pt; display:inline-block;">&nbsp;</span>This NELP is made between, and contains the entire agreement between, the Proprietor and the Author concerning the Contribution and supersedes all related prior agreements, arrangements and understandings (whether written or oral). No addition to or modification of any provision of this NELP shall be binding unless it is in writing and signed on behalf of the Publisher and the Author.</p>
                                        <p style="margin-top:0pt; margin-left:27pt; margin-bottom:0pt; text-indent:-27pt; line-height:normal;">6.2. <span style="width:7.81pt; text-indent:0pt; display:inline-block;">&nbsp;</span>The Author acknowledges and agrees that the Proprietor is responsible, at its discretion, for appointing &lsquo;publisher(s)&rsquo; to fulfil all or part of the Proprietor&rsquo;s and Publisher&rsquo;s obligations under this NELP, provided that any new &lsquo;publisher&rsquo; appointed by the Proprietor shall comply with the terms of this NELP.</p>
                                        <p style="margin-top:0pt; margin-left:27pt; margin-bottom:0pt; text-indent:-27pt; line-height:normal;">6.3. <span style="width:7.81pt; text-indent:0pt; display:inline-block;">&nbsp;</span>This NELP is governed by the laws of the United States of America or the country of residence of the Lead Author and is subject to the jurisdiction of the courts of the United States of America or the country of residence of the Lead Author.</p>                                        
                                        <p><strong>Declaration by the Lead Author:</strong></p>
                                        <p>By signing this NELP, I confirm and agree that:</p>
                                        <p>i. <span style="width:10.21pt; text-indent:0pt; display:inline-block;">&nbsp;</span>All information that I have entered into this NELP is correct at the time of signature.</p>
                                        <p>ii. <span style="width:7.69pt; text-indent:0pt; display:inline-block;">&nbsp;</span><strong>EITHER</strong>, I am the sole author and owner of the copyright in the Contribution and I agree to the terms and conditions in this NELP.</p>
                                        <p>iii. <span style="width:5.16pt; text-indent:0pt; display:inline-block;">&nbsp;</span><strong>OR</strong>, the copyright in the Contribution is jointly owned by me and the Author(s) <em>mentioned in the submission form&nbsp;</em>and I agree to (and am authorized by each Author to agree to) the terms of this NELP on behalf of all Authors;</p>
                                        <p>iv. <span style="width:5.24pt; text-indent:0pt; display:inline-block;">&nbsp;</span>AND, no other person nor entity has any copyright interest in the Contribution.</p>                                        
                                        </div>
                                        <!-- NELP form content -->
                                        <input type="checkbox" id="acknowledge" name="acknowledge" value="1" required>                                        
                                        <!-- <label for="acknowledge">I understand</label> -->                                         
                                        <label for="acknowledge">By clicking this box I sign the NELP provided directly above.</label>
                                        <div id="acknowledge-error" class="error"></div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<!-- Popup Div (Initially hidden) -->
    <div id="popup">
      <h3><i class="bi bi-exclamation-triangle-fill"></i> Warning</h3>
      <p>You must submit an original Creative-Work and you must own the copyright and licensing rights to your original Creative-Work.</p>
      <button id="closePopup">Close</button>
    </div>     
     
    
    <!-- Popup end (Initially hidden) --> 

    <!-- all field that is required show error message  -->    
    <script>
    $(document).ready(function () {
        $('#saveForm #submitButton').on('click', function (e) {
            let isValid = true;
              // Clear previous group validation flags
                $('input[type="checkbox"]').removeData('validated');

            $('#saveForm [required]:not(:disabled):not([type="hidden"])').each(function () {
                const field = $(this);
                const type = field.attr('type');
                const tag = field.prop('tagName').toLowerCase();
                let rawName = field.attr('name') || field.attr('id');
                let name = rawName;
                let hasError = false;

                // Normalize name for checkbox groups (remove [])
                if (rawName && rawName.endsWith('[]')) {
                    name = rawName.slice(0, -2);
                }

                const errorId = name + '-error';

                if (name === 'community_name') return true; // Skip

                // ✅ Checkbox group validation
                // if (type === 'checkbox' && rawName.endsWith('[]')) {
                //     if (field.data('validated')) return true;

                //     const group = $('input[name="' + rawName + '"]');
                //     group.data('validated', true);

                //     if (group.filter(':checked').length === 0) {
                //         $('#' + errorId).text('Please select at least one option.').show();
                //         isValid = false;
                //         return false;
                //     } else {
                //         $('#' + errorId).hide();
                //         return true;
                //     }
                // }

                // ✅ Radio group validation
                else if (type === 'radio') {
                    if ($('input[name="' + rawName + '"]:checked').length === 0) {
                        hasError = true;
                    }
                }

                // ✅ Other inputs
                else if (
                    type === 'text' || type === 'number' || type === 'file' ||
                    tag === 'textarea' || tag === 'select'
                ) {
                    if ($.trim(field.val()) === '' || field.val() === null) {
                        hasError = true;
                    }
                }

                if (hasError) {
                    $('#' + errorId).text('This field is required.').show();
                    field.focus();
                    isValid = false;
                    return false; // stop loop
                } else {
                    $('#' + errorId).hide();
                }
            });

            if (!isValid) e.preventDefault(); // block submit
        });

        // ✅ Hide error on change
        $('#saveForm').on('change input', 'input, select, textarea', function () {
            const field = $(this);
            const type = field.attr('type');
            let rawName = field.attr('name') || field.attr('id');
            let name = rawName;

            if (rawName && rawName.endsWith('[]')) {
                name = rawName.slice(0, -2);
            }

            const errorId = name + '-error';

            if ((type === 'checkbox' || type === 'radio') && rawName) {
                if ($('input[name="' + rawName + '"]:checked').length > 0) {
                    $('#' + errorId).hide();
                }
            } else {
                if ($.trim(field.val()) !== '') {
                    $('#' + errorId).hide();
                }
            }
        });
    });
</script>


    <!--end all field that is required show error message  -->
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
    </script>
    <!-- Function to show/hide the invited and participated fields -->
    <script>
        $(document).ready(function() {
            
            function toggleFields() {
                const invitedYes = $('#invited_yes').is(':checked');
                const participatedYes = $('#participated_yes').is(':checked');  
                const projectsYes = $('#projects_yes').is(':checked');   
                const communityYes = $('#community_yes').is(':checked'); 
                
                // Handle required for community_name
                if (communityYes) {
                    $('#community_name').attr('required', true);
                } else {
                    $('#community_name').removeAttr('required');
                }
                
                // Handle required for invited_by and invited_by_email
                if (invitedYes) {
                    $('#invited_by, #invited_by_email').attr('required', true);
                } else {
                    $('#invited_by, #invited_by_email').removeAttr('required');
                }
                // Handle required for participated_info
                if (participatedYes) {
                    $('#participated_info').attr('required', true);
                } else {
                    $('#participated_info').removeAttr('required');
                }           

                // Handle required for projects_name
                if (projectsYes) {
                    $('#projects_name').attr('required', true);
                } else {
                    $('#projects_name').removeAttr('required');
                }
                
                // Toggle individual sections
                $('#invitedDetails').toggle(invitedYes);
                $('#participatedDetails').toggle(participatedYes);
                $('#communityDetails').toggle(communityYes);
                $('#projectsDetails').toggle(projectsYes);

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
            $('input[name="invited"], input[name="participated"], input[name="community"], input[name="projects"]').on('change', function() {
                toggleFields();
            });

            // Check initial state on page load
            toggleFields();
        });
    </script>
    <!-- End Function to show/hide the invited and participated fields -->

    <!--Function to toggle co-authors position details section -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const coAuthorsRadios = document.querySelectorAll('input[name="co_authors"]');
            const positionDiv = document.getElementById('co_authors_position');   
            const positionInputs = document.querySelectorAll('input[name="co_authors_position"]');

            function toggleCoAuthorsFields(count) {
                // Show/hide and set/remove required on author cards
                for (let i = 1; i <= 2; i++) {
                    const card = document.getElementById('author_card_' + i);
                    const inputs = card.querySelectorAll('input, select');

                    if (i <= count) {
                        card.style.display = 'block';
                        // inputs.forEach(input => input.setAttribute('required', 'required'));
                        inputs.forEach(input => {
                            if (input.name !== 'co_ecosystem_affiliation_' + i + '[]') {
                                input.setAttribute('required', 'required');
                            }
                        });
                        // input.removeAttribute('disabled'); // Ensure not disabled
                    } else {
                        card.style.display = 'none';
                        inputs.forEach(input => input.removeAttribute('required'));
                        // input.setAttribute('disabled', 'disabled'); // Avoid validation
                    }
                }

                // Show/hide and manage required for co-author positions
                if (count === 1 || count === 2) {
                    positionDiv.style.display = 'block';
                    positionInputs.forEach(input => input.setAttribute('required', 'required'));
                } else {
                    positionDiv.style.display = 'none';
                    positionInputs.forEach(input => input.removeAttribute('required'));
                }
            }

            // Attach listener to co-author radio buttons
            coAuthorsRadios.forEach(radio => {
                radio.addEventListener('change', function () {
                    toggleCoAuthorsFields(parseInt(this.value));
                });
            });

            // Initialize on page load
            const initialSelectedValue = document.querySelector('input[name="co_authors"]:checked');
            if (initialSelectedValue) {
                toggleCoAuthorsFields(parseInt(initialSelectedValue.value));
            }
        });
    </script>
    <!--End Function to toggle co-authors details section -->
   
    <!-- Function to toggle the submission_types position section -->
    <script>    
        function togglesubmissionTypes() {        
            var submissionTypes = document.querySelector('input[name="submission_types"]:checked').value;        
            var submissionTypesADiv = document.getElementById('submission_types_a');
            var submissionTypesBDiv = document.getElementById('submission_types_b');
            var submissionTypesCDiv = document.getElementById('submission_types_c');                

            if (submissionTypes == '1') {
                submissionTypesADiv.style.display = 'block';
                $('#narrative_file').attr('required', true);
                $('#narrative_images_1').attr('required', true);            
            } else {
                submissionTypesADiv.style.display = 'none';
            }

            if (submissionTypes == '2') {
                submissionTypesBDiv.style.display = 'block';
                $('#art_images_1').attr('required', true);
                $('#art_desc').attr('required', true);            
            } else {
                submissionTypesBDiv.style.display = 'none';
            }

            if (submissionTypes == '3') {
                submissionTypesCDiv.style.display = 'block';
                $('#art_video_file').attr('required', true);
                $('#art_video_desc').attr('required', true);
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

            //  // Handle radio change
            //  $('input[name="submission_types"]').on('change', togglesubmissionTypes);

            // // Run once on load
            // togglesubmissionTypes();    
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
                    $('#image_file_' +i).attr('required', true);
                    $('#narrative_image_desc_' +i).attr('required', true);
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
                    $('#art_image_file_' +i).attr('required', true);
                    $('#art_image_desc_' +i).attr('required', true);
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

    <!-- Add real-time size and file type validation script -->
    <script>
        document.getElementById('narrative_file').addEventListener('change', function() {
            // validateFileSize(this, 'narrative_file_error');
            validateFileType(this, 'narrative_file_error');
        });
        
        document.getElementById('image_file_1').addEventListener('change', function() {
            validateFileType(this, 'image_file_1_error');
        });

        @for ($i = 2; $i <= 5; $i++)
        document.getElementById('image_file_{{ $i }}').addEventListener('change', function() {
            validateFileType(this, 'image_file_{{ $i }}_error');
        });
        @endfor        

        @for ($i = 1; $i <= 5; $i++)
        document.getElementById('art_image_file_{{ $i }}').addEventListener('change', function() {
            validateFileType(this, 'art_image_file_{{ $i }}_error');
        });
        @endfor
    
        document.getElementById('art_video_file').addEventListener('change', function() {
            validateVideoFile(this, 'art_video_file_error');
        });        

        function validateVideoFile(input, errorElementId) {
            var file = input.files[0];
            // console.log(file);
            var allowedExtensions = ['mp4', 'avi', 'mov', 'mkv', 'webm'];
            var fileSizeLimit = 1073741824; // 1GB in bytes

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
                    document.getElementById(errorElementId).innerText = "File size exceeds 1 GB. Please upload a smaller file.";
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

        
        function validateFileType(input, errorElementId) {
            const file = input.files[0];
            const inputName = input.getAttribute('name');            
            const errorElement = document.getElementById(errorElementId);
            
            // Define allowed types
            const docExtensions = ['.doc', '.docx'];
            const imageExtensions = ['.jpg', '.jpeg', '.png', '.svg', '.ico'];

            if (!file) {
                errorElement.innerText = '';
                return;
            }

            const fileName = file.name.toLowerCase();
            const fileExtension = fileName.substring(fileName.lastIndexOf('.'));
            const fileSize = file.size;
            let allowedExtensions = [];
            let errorMsg = '';

            // Determine type of file field
            if (inputName === 'narrative_file') {
                allowedExtensions = docExtensions;
                errorMsg = "❌ Only DOC or DOCX files are allowed (Max 1 MB).";
            } else if (/^image_file_[1-5]$/.test(inputName)) {
                allowedExtensions = imageExtensions;
                errorMsg = "❌ Only image files (JPG, PNG, etc.) are allowed (Max 1 MB).";
            } else if (/^art_image_file_[1-5]$/.test(inputName)) {
                allowedExtensions = imageExtensions;
                errorMsg = "❌ Only image files (JPG, PNG, etc.) are allowed (Max 1 MB).";
            } else {
                errorElement.innerText = "❌ Invalid input field.";
                input.value = '';
                return;
            }

            // Check extension
            if (!allowedExtensions.includes(fileExtension)) {
                errorElement.innerText = errorMsg;
                input.value = '';
                return;
            }

            // Check size
            if (fileSize > 1 * 1024 * 1024) {
                errorElement.innerText = "❌ File size exceeds 1 MB.";
                input.value = '';
                return;
            }

            // All good
            errorElement.innerText = '';
        }                                
    </script>
    <!-- End real-time size and file type validation script -->

    <!-- all word count validation -->
    <script>
        function checkWordLimit(field, limit, errorField) {
            //  console.log(field);
            var words = field.value.trim().split(/\s+/).filter(word => word.length > 0).length;
            if (words > limit) {
                document.getElementById(errorField).innerText = "Exceeded word limit of " + limit + " words.";
                // Truncate the input field's value to the last valid word limit
                let truncatedValue = field.value.trim().split(/\s+/).slice(0, limit).join(' ');
                field.value = truncatedValue;
                // ✅ Fade out after 3 seconds
                $('#' + errorField).show().delay(3000).fadeOut(1000, function () {
                    $(this).text('').show(); // Reset and keep element visible
                });
                event.preventDefault();
                return false;
            } else {
                document.getElementById(errorField).innerText = "";
                return true;
            }
        }

        function validateForm() {
            let allValid = true;            
            allValid &= checkWordLimit(document.getElementById('creative_Work'), 10, 'creative_WorkError');
            allValid &= checkWordLimit(document.getElementById('subtitle'), 40, 'subtitleError');
            allValid &= checkWordLimit(document.getElementById('additional_information'), 100, 'additional_informationError');
            allValid &= checkWordLimit(document.getElementById('narrative_image_desc_1'), 50, 'narrative_image_desc_1Error');
            // Loop through the dynamically generated textareas
            for (let i = 1; i <= 3; i++) {
                const textarea = document.getElementById(`co_author_short_bio_${i}`);
                const errorDiv = document.getElementById(`co_author_short_bio_${i}Error`);

                if (textarea) {
                    // Perform word limit validation for each textarea
                    allValid &= checkWordLimit(textarea, 40, `co_author_short_bio_${i}Error`);
                }
            } 
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

            // document.getElementById('submitButton').disabled = !allValid;
        }
    </script>
    <!-- End all word count validation -->

    <!-- prefill radio button value -->
    <script>
        // Prevent changes to the radio buttons
        document.querySelectorAll('.readonly-input').forEach(input => {
            input.addEventListener('click', function(e) {
                e.preventDefault(); // Block any change
            });
        });
    </script>

    <!-- series toggle vlaue show and hide  -->
    <!-- <script type="text/javascript">
        $(document).ready(function() {
            $(".series_yes").hide();
            var is_series= '<?=$is_series?>';
            if (is_series === "Yes") {
                $(".series_yes").show();
                $('#series_article_no').attr('required', true);
                $('#current_article_no').attr('required', true);
                $('#input-tags').attr('required', true);
            } else {
                $(".series_yes").hide();
                $('#series_article_no').attr('required', false);
                $('#current_article_no').attr('required', false);
                $('#input-tags').attr('required', false);
            }
            
            $('input[name="is_series"]').change(function() {
                if ($(this).val() === "Yes") {
                    $(".series_yes").show();
                    $('#series_article_no').attr('required', true);
                    $('#current_article_no').attr('required', true);
                    $('#input-tags').attr('required', true);
                } else {
                    $(".series_yes").hide();
                    $('#series_article_no').attr('required', false);
                    $('#current_article_no').attr('required', false);
                    $('#input-tags').attr('required', false);
                }
            });
            $('#current_article_no').on('input', function(){
                var current_article_no = parseInt($('#current_article_no').val());
                if(current_article_no <= 1){
                    $('#current_article_no').attr('required', false);
                    $('#input-tags').attr('required', false);
                } else {
                    $('#current_article_no').attr('required', true);
                    $('#input-tags').attr('required', true);
                }
            });            
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            var tagsArray = [];
            var beforeData = $('#other_article_part_doi_no').val();
            if (beforeData.length > 0) {
                tagsArray = beforeData.split(',');
            }

            $('#input-tags').on('input', function () {
                var input = $(this).val().trim();
                if (input.length > 0) {
                    $(this).removeAttr('required'); // remove required
                    // $('#input-tags-error').hide();  // hide any previous error
                }
                $('#validation-msg').text('').hide();  // 🛠️ Hide old error immediately
                // When comma is typed
                if (input.includes(',')) {
                    var tags = input.split(',');
                    tags.forEach(function (tag) {
                        tag = tag.trim();
                        if (tag.length > 0) {
                            // const result = getValidationMessage(tag);
                            const pattern = /^SRN-EaRTh\d{6}-\d{3}$/;
                            if (!pattern.test(tag)) {
                                $('#validation-msg').text("❌ Invalid format: Must match SRN-EaRThMMYYYY-xxx,").css('color', 'red').fadeIn()
                        .delay(3000)
                        .fadeOut();
                                return;
                            } else{
                                $('#validation-msg').text("✅ Valid: SRN-EaRThMMYYYY-xxx,").css('color', 'green').fadeIn()
                        .delay(3000)
                        .fadeOut();
                            }                        
                            if (!tagsArray.includes(tag)) {
                                tagsArray.push(tag);
                                $('#badge-container').append(
                                    '<span class="badge">' + tag + ' <span class="remove" data-tag="' + tag + '">&times;</span></span>'
                                );
                            }
                        }
                    });
                    $('#other_article_part_doi_no').val(tagsArray.join(','));
                    $(this).val('');
                }
            });

            // Remove tag handler
            $(document).on('click', '.remove', function () {
                var tag = $(this).data('tag');
                tagsArray = tagsArray.filter(function (item) {
                    return item !== tag;
                });
                $(this).parent().remove();
                $('#other_article_part_doi_no').val(tagsArray.join(','));
            });
        });
    </script> -->

<script type="text/javascript">
    $(document).ready(function () {
        var tagsArray = [];

        // Handle initial display of series fields
        var is_series = '<?= old('is_series', $is_series ?? '') ?>';
        if (is_series === "Yes") {
            $(".series_yes").show();
            $('#series_article_no').attr('required', true);
            $('#current_article_no').attr('required', true);

            var currentVal = parseInt($('#current_article_no').val());
            if (currentVal > 1 || isNaN(currentVal)) {
                $('#input-tags').attr('required', true);
            } else {
                $('#input-tags').attr('required', false);
            }
        } else {
            $(".series_yes").hide();
            $('#series_article_no, #current_article_no, #input-tags').attr('required', false);
        }

        // Show/hide based on is_series radio buttons
        $('input[name="is_series"]').change(function () {
            if ($(this).val() === "Yes") {
                $(".series_yes").show();
                $('#series_article_no').attr('required', true);
                $('#current_article_no').attr('required', true);
                $('#input-tags').attr('required', true);
            } else {
                $(".series_yes").hide();
                $('#series_article_no, #current_article_no, #input-tags').attr('required', false);
            }
        });

        // Adjust required based on current article number
        $('#current_article_no').on('input', function () {
            var val = parseInt($(this).val());
            if (val <= 1 || isNaN(val)) {
                $('#input-tags').attr('required', false);
            } else {
                $('#input-tags').attr('required', true);
            }
        });

        // Tag management logic
        // var beforeData = $('#other_article_part_doi_no').val();
        // if (beforeData.length > 0) {
        //     tagsArray = beforeData.split(',');
        //     tagsArray.forEach(function (tag) {
        //         tag = tag.trim();
        //         if (tag.length > 0) {
        //             $('#badge-container').append(
        //                 '<span class="badge">' + tag + ' <span class="remove" data-tag="' + tag + '">&times;</span></span>'
        //             );
        //         }
        //     });
        // }

        var beforeData = $('#other_article_part_doi_no').val();
            if (beforeData.length > 0) {
                tagsArray = beforeData.split(',');
                tagsArray.forEach(function (tag) {
                    tag = tag.trim();
                    if (tag.length > 0) {
                        $('#badge-container').append(
                            '<span class="badge">' + tag + ' <span class="remove" data-tag="' + tag + '">&times;</span></span>'
                        );
                    }
                });
            }

            // ✅ Check if tags are missing and conditionally set required
            var currentVal = parseInt($('#current_article_no').val());
            if (is_series === "Yes" && (isNaN(currentVal) || currentVal > 1) && tagsArray.length === 0) {
                $('#input-tags').attr('required', true);
            } else {
                $('#input-tags').attr('required', false);
            }

        $('#input-tags').on('input', function () {
            var input = $(this).val().trim();
            if (input.includes(',')) {
                var tags = input.split(',');
                tags.forEach(function (tag) {
                    tag = tag.trim();
                    if (tag.length > 0) {
                        const pattern = /^SRN-EaRTh\d{6}-\d{3}$/;
                        if (!pattern.test(tag)) {
                            $('#validation-msg').text("❌ Invalid format: Must match SRN-EaRThMMYYYY-xxx,").css('color', 'red').fadeIn().delay(3000).fadeOut();
                            return;
                        } else {
                            $('#validation-msg').text("✅ Valid: SRN-EaRThMMYYYY-xxx,").css('color', 'green').fadeIn().delay(3000).fadeOut();
                        }

                        if (!tagsArray.includes(tag)) {
                            tagsArray.push(tag);
                            $('#badge-container').append(
                                '<span class="badge">' + tag + ' <span class="remove" data-tag="' + tag + '">&times;</span></span>'
                            );
                        }
                    }
                });
                $('#other_article_part_doi_no').val(tagsArray.join(','));
                $(this).val('');
            }
        });

        $(document).on('click', '.remove', function () {
            var tag = $(this).data('tag');
            tagsArray = tagsArray.filter(function (item) {
                return item !== tag;
            });
            $(this).parent().remove();
            $('#other_article_part_doi_no').val(tagsArray.join(','));
        });
    });
</script>




    <!-- series toggle value show and hide end -->

