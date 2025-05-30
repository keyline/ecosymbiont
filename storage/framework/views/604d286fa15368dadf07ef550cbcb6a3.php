<style type="text/css">
    .choices__list--multiple .choices__item {
        background-color: #d81636;
        border: 1px solid #d81636;
    }
    .error { color: red; }
</style>
<!-- block content -->
    <div class="block-content">
        <!-- single-post box -->
        <div class="row">
            <div class="col-xl-12">
                <?php if(session('success_message')): ?>
                    <div class="alert alert-success bg-success text-dark border-0 alert-dismissible show autohide" role="alert">
                        <?php echo e(session('success_message')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                <?php endif; ?>
                <?php if(session('error_message')): ?>
                    <div class="alert alert-danger bg-danger text-dark border-0 alert-dismissible show autohide" role="alert">
                        <?php echo e(session('error_message')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                <?php endif; ?>
            </div>
            <?php
            // $setting = GeneralSetting::where('id', '=', 1)->first();
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data" oninput="validateForm()">
                            <?php echo csrf_field(); ?>
                            <div class="row mb-3">
                                <label for="email" class="col-md-2 col-lg-4 col-form-label">0) Email address</label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="email" name="email" class="form-control" id="email"
                                        value="<?= $email ?>" required>
                                </div>
                            </div> 
                            <div class="row mb-3">
                                <label for="first_name" class="col-md-2 col-lg-4 col-form-label">1) Legal first name (if you are an ecoweb-rooted community or movement, enter the name here)</label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="text" name="first_name" class="form-control" id="first_name"
                                        value="<?= $first_name ?>" required>
                                </div>
                            </div>                         
                            <div class="row mb-3">
                                <label for="middle_name" class="col-md-2 col-lg-4 col-form-label">2) Legal middle name(s)/ initial(s)</label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="text" name="middle_name" class="form-control" id="middle_name"
                                        value="<?= $middle_name ?>">
                                </div>
                            </div> 
                            <div class="row mb-3">
                                <label for="last_name" class="col-md-2 col-lg-4 col-form-label">3) Legal surname (last name) (if you are an ecoweb-rooted community or movement, enter N/A)</label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="text" name="last_name" class="form-control" id="last_name"
                                        value="<?= $last_name ?>" required>
                                </div>
                            </div>  
                            <div class="row mb-3">
                                <label for="for_publication_name" class="col-md-2 col-lg-4 col-form-label">3A) Preferred name for publication (if you wish to use your Legal Name, enter N/A)</label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="text" name="for_publication_name" class="form-control" id="for_publication_name"
                                        value="<?= $for_publication_name ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="title" class="col-md-2 col-lg-4 col-form-label">4) Title
                                </label>
                                <div class="col-md-10 col-lg-8">                                
                                    <?php if($user_title): ?>
                                        <?php $__currentLoopData = $user_title; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <!-- <option value="<?php echo e($data->id); ?>" <?php if($data->id == $titleId): echo 'selected'; endif; ?>> -->
                                            <input type="radio" id="yes" name="title" value="<?php echo e($data->id); ?>"  >
                                            <label for="yes"><?php echo e($data->name); ?></label>
                                                <!-- <?php echo e($data->name); ?></option> -->
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>                                
                                </div>
                            </div>   
                            <div class="row mb-3">
                                <label for="pronoun" class="col-md-2 col-lg-4 col-form-label">5) Pronoun(s) (select all that apply)</label>
                                <div class="col-md-10 col-lg-8">                                                                
                                    <?php if($pronoun): ?>
                                        <?php $__currentLoopData = $pronoun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <!-- <option value="<?php echo e($data->id); ?>" <?php if($data->id == $pronounId): echo 'selected'; endif; ?>> -->
                                            <input type="radio" id="yes" name="pronoun" value="<?php echo e($data->id); ?>"  >
                                            <label for="yes"><?php echo e($data->name); ?></label>
                                                <!-- <?php echo e($data->name); ?></option> -->
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>                                
                                </div>
                            </div> 
                            <div class="row mb-3">
                                <label for="orginal_work" class="col-md-2 col-lg-4 col-form-label">6) Are all components of this Creative-Work your original work?
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="radio" id="yes" name="orginal_work" value="Yes" >
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="no" name="orginal_work" value="No" >
                                    <label for="no">No</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="copyright" class="col-md-2 col-lg-4 col-form-label">7) Do you own the copyright and licensing rights to all components of your Creative-Work?
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="radio" id="yes" name="copyright" value="Yes" >
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="no" name="copyright" value="No" >
                                    <label for="no">No</label>
                                </div>
                            </div>  
                            <div class="row mb-3">
                                <label for="invited" class="col-md-2 col-lg-4 col-form-label">8) Were you invited to submit a Creative-Work to ERT?</label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="radio" id="invited_yes" name="invited" value="Yes" <?php if(old('invited', $invited) == 'Yes'): echo 'checked'; endif; ?>>
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="invited_no" name="invited" value="No" <?php if(old('invited', $invited) == 'No'): echo 'checked'; endif; ?>>
                                    <label for="no">No</label>
                                </div>
                            </div>  
                            <div id="invitedDetails" style="display: none;">
                                <div class="row mb-3">
                                    <label for="invited_by" class="col-md-2 col-lg-4 col-form-label">8A) Full name of person who invited you to submit a Creative-Work to ERT</label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="invited_by" class="form-control" id="invited_by"
                                            value="<?= $invited_by ?>">
                                    </div>
                                </div> 
                                <div class="row mb-3">
                                    <label for="invited_by_email" class="col-md-2 col-lg-4 col-form-label">8B) Email address of person who invited you to submit a Creative-Work to ERT
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="email" name="invited_by_email" class="form-control" id="invited_by_email"
                                            value="<?= $invited_by_email ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="participated" class="col-md-2 col-lg-4 col-form-label">9) Have you participated as a strategist at an in-person ER Synergy Meeting?
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
                                    <label for="participated_info" class="col-md-2 col-lg-4 col-form-label">9A) Provide date and location of most recent in-person ER Synergy Meeting in which you participated</label>
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
                                    <label for="explanation" class="col-md-2 col-lg-4 col-form-label">10) Explain why you are a grassroots changemaker, innovator, and/or knowledge-holder (max. 100 words)</label>
                                    <div class="col-md-10 col-lg-8">
                                        <textarea class="form-control" id="explanation" name="explanation" rows="4" cols="50" placeholder="Your explanation here..." required><?= $explanation ?></textarea>
                                        <div id="explanationError" class="error"></div>
                                    </div>
                                </div>  
                                <div class="row mb-3">
                                    <label for="explanation_submission" class="col-md-2 col-lg-4 col-form-label">11) Explain why and how your Creative-Work relates to regenerating systems that restore, preserve, and foster the mutually beneficial interconnectivity and interdependence (symbiosis) of human communities within and to natural ecological webs (ecowebs) (max. 150 words)</label>
                                    <div class="col-md-10 col-lg-8">
                                        <textarea class="form-control" id="explanation_submission" name="explanation_submission" rows="4" cols="50" placeholder="Your explanation here..." required><?= $explanation_submission ?></textarea>
                                        <div id="explanation_submissionError" class="error"></div>
                                    </div>
                                </div> 
                                <div class="row mb-3">
                                    <label for="section_ert" class="col-md-2 col-lg-4 col-form-label">12) For which section and sub-section of ERT would you like your Creative-Work to be considered?
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <?php if($section_ert): ?>
                                            <?php $__currentLoopData = $section_ert; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <input type="checkbox" name="section_ert[]" value="<?php echo e($data->id); ?>" <?php if(in_array($data->id, old('section_ert', $section_ertId))): ?> checked <?php endif; ?>> <?php echo e($data->name); ?><br>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>                                         
                                    </div>
                                </div>     
                                <div class="row mb-3">
                                    <label for="creative_Work" class="col-md-2 col-lg-4 col-form-label">13) Title of your Creative-Work (max. 10 words)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <textarea class="form-control" id="creative_Work" name="creative_Work" rows="4" cols="50" placeholder="Your creative_Work here..." required><?= $creative_Work ?></textarea>
                                        <div id="creative_WorkError" class="error"></div>
                                    </div>
                                </div>                                            
                                <div class="row mb-3">
                                    <label for="subtitle" class="col-md-2 col-lg-4 col-form-label">14) Subtitle - brief engaging summary of your Creative-Work (this is what readers will be able to read before logging on to ERT, if your Creative-Work is published on ERT as Content) (max. 40 words)</label>
                                    <div class="col-md-10 col-lg-8">
                                        <textarea name="subtitle" class="form-control" id="subtitle" rows="3"><?= $subtitle ?></textarea>
                                        <div id="subtitleError" class="error"></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="submission_types" class="col-md-2 col-lg-4 col-form-label">15) Select the type of your Creative-Work
                                    </label>
                                    <div class="col-md-10 col-lg-8">                                
                                    <?php if($submission_type): ?>
                                        <?php for($i = 0; $i < count($submission_type); $i++): ?>
                                            <?php
                                                $data = $submission_type[$i];
                                            ?>
                                            <!-- Use Blade's templating syntax instead of echo inside @php block -->                                        
                                            <input type="radio" name="submission_types" value="<?php echo $data->id ?>" id="submission_types<?php echo $data->id ?>">
                                            <label for="submission_types<?php echo $data->id ?>"><?php echo $data->name?></label>
                                        <?php endfor; ?>
                                    <?php endif; ?>                            
                                    </div>
                                </div>                           
                                <div class="row mb-3">
                                    <label for="narrative_file" class="col-md-2 col-lg-4 col-form-label">15A1) TYPE A: word narrative (no embedded images) (500-1000 words for prose, 100-250 words for poetry)</label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="file" name="narrative_file" class="form-control" id="narrative_file" required>
                                        <small class="text-info">* Only DOC & DOCX files are allowed</small><br>
                                        <span id="narrative_file_error" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="first_image_file" class="col-md-2 col-lg-4 col-form-label">15A2) TYPE A: First image/photograph accompanying word narrative</label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="file" name="first_image_file" class="form-control" id="first_image_file">
                                        <small class="text-info">* Only JPG, JPEG, SVG, PNG files are allowed</small><br>
                                        <span id="first_image_file_error" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="second_image_file" class="col-md-2 col-lg-4 col-form-label">15A3) TYPE A: Second image/photograph accompanying word narrative</label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="file" name="second_image_file" class="form-control" id="second_image_file">
                                        <small class="text-info">* Only JPG, JPEG, SVG, PNG files are allowed</small><br>
                                        <span id="second_image_file_error" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="art_image_file" class="col-md-2 col-lg-4 col-form-label">15B1) TYPE B: Art image + descriptive narrative | art image</label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="file" name="art_image_file" class="form-control" id="art_image_file">
                                        <small class="text-info">* Only JPG, JPEG, SVG, PNG files are allowed</small><br>    
                                        <span id="art_image_file_error" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="art_image_desc" class="col-md-2 col-lg-4 col-form-label">15B2) TYPE B: Art image + descriptive narrative | descriptive narrative (100-250 words)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <textarea class="form-control" id="art_image_desc" name="art_image_desc" rows="4" cols="50" placeholder="Your art_image_desc here..." required><?= $art_image_desc ?></textarea>
                                        <div id="art_image_descError" class="error"></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="art_video_file" class="col-md-2 col-lg-4 col-form-label">15C1) TYPE C: Video + descriptive narrative | audiovisual media (3-10 min.)</label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="file" name="art_video_file" class="form-control" id="art_video_file">
                                        <small class="text-info">* Only MP4, AVI, MOV, MKV, WEBM files are allowed</small><br>  
                                        <span id="art_video_file_error" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="art_video_desc" class="col-md-2 col-lg-4 col-form-label">15C2) TYPE C: Video + narrative | descriptive narrative (100-250 words)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <textarea class="form-control" id="art_video_desc" name="art_video_desc" rows="4" cols="50" placeholder="Your art_video_desc here..." required><?= $art_video_desc ?></textarea>
                                        <div id="art_video_descError" class="error"></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="country" class="col-md-2 col-lg-4 col-form-label">16) Nation/country of residence</label>
                                    <div class="col-md-10 col-lg-8">
                                        <select name="country" class="form-control" id="country" required>
                                            <option value="" selected disabled>Select</option>
                                            <?php if($country): ?>
                                                <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($data->id); ?>" <?php if($data->id == $countryId): echo 'selected'; endif; ?>>
                                                        <?php echo e($data->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="state" class="col-md-2 col-lg-4 col-form-label">17) State/province of residence</label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="state" class="form-control" id="state"
                                            value="<?= $state ?>" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="city" class="col-md-2 col-lg-4 col-form-label">18) Village/town/city of residence</label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="city" class="form-control" id="city"
                                            value="<?= $city ?>" required>
                                    </div>
                                </div> 
                                <div class="row mb-3">
                                    <label for="organization_name" class="col-md-2 col-lg-4 col-form-label">19) Grassroots organization name (if no grassroots affiliation, type N/A)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="organization_name" class="form-control" id="organization_name"
                                            value="<?= $organization_name ?>" required>
                                    </div>
                                </div> 
                                <div class="row mb-3">
                                    <label for="organization_website" class="col-md-2 col-lg-4 col-form-label">20) Grassroots organization website  (if no website, type N/A)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="organization_website" class="form-control" id="organization_website"
                                            value="<?= $organization_website ?>" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="ecosystem_affiliation" class="col-md-2 col-lg-4 col-form-label">21) Ancestral continental ecoweb affiliation (continental ethnicity) (select all that apply)
                                    </label>
                                    <div class="col-md-10 col-lg-8">                                                                                                
                                        <?php if($ecosystem_affiliation): ?>
                                            <?php $__currentLoopData = $ecosystem_affiliation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <input type="checkbox" name="ecosystem_affiliation[]" value="<?php echo e($data->id); ?>" <?php if(in_array($data->id, old('ecosystem_affiliation', $ecosystem_affiliationId))): ?> checked <?php endif; ?>> <?php echo e($data->name); ?><br>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>                                
                                    </div>
                                </div>   
                                <div class="row mb-3">
                                    <label for="Indigenous_affiliation" class="col-md-2 col-lg-4 col-form-label">22) Ancestral regional ecoweb affiliation (please further define your ethnicity, e.g., region of South Asia and/or Indigenous tribe/nation)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="indigenous_affiliation" class="form-control" id="indigenous_affiliation"
                                        value="<?= $indigenous_affiliation ?>" required>
                                    </div>
                                </div> 
                                <div class="row mb-3">
                                    <label for="expertise_area" class="col-md-2 col-lg-4 col-form-label">23) Your expertise area (select all that apply)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <?php if($expertise_area): ?>
                                            <?php $__currentLoopData = $expertise_area; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <input type="checkbox" name="expertise_area[]" value="<?php echo e($data->id); ?>" <?php if(in_array($data->id, old('expertise_area', $expertise_areaId))): ?> checked <?php endif; ?>> <?php echo e($data->name); ?><br>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div> 
                                <div class="row mb-3">
                                    <label for="bio_short" class="col-md-2 col-lg-4 col-form-label">24) 1-sentence biography (max. 40 words)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <textarea class="form-control" id="bio_short" name="bio_short" rows="4" cols="50" placeholder="Your explanation here..." required><?= $bio_short ?></textarea>
                                        <div id="bio_shortError" class="error"></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="bio_long" class="col-md-2 col-lg-4 col-form-label">25) 1-paragraph biography (150-250 words)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <textarea class="form-control" id="bio_long" name="bio_long" rows="4" cols="50" placeholder="Your explanation here..." required><?= $bio_long ?></textarea>
                                        <div id="bio_longError" class="error"></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="bio_long" class="col-md-2 col-lg-4 col-form-label">26) Instructions for initial submission of Creative-Work for eligibility screening:
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <p>Once you have completed this form and uploaded all required files, click on the "submit" button below.</p>
                                        <p>If you meet the eligibility criteria, you will receive an Eligibility E-mail with a Submission Reference Number ("SRN") and accompanying Non-Exclusive License to Publish ("NELP").</p>
                                    </div>
                                    <label for="bio_long" class="col-md-2 col-lg-4 col-form-label">27) Instructions for final submission of Creative-Work for consideration of publication:
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <p>The substance of your Creative-Work will not be further reviewed by the editor(s) until you upload a completed and signed digital copy of the NELP, according to the process described in your Eligibility E-mail.</p>                                
                                        <input type="checkbox" id="acknowledge" name="acknowledge" value="1" required>
                                        <label for="acknowledge">I Understand</label>
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
        <!-- End single-post box -->
    </div>
<!-- End block content -->
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
<!-- Add real-time size validation script -->
<script>
    document.getElementById('narrative_file').addEventListener('change', function() {
        validateFileSize(this, 'narrative_file_error');
    });
    
    document.getElementById('first_image_file').addEventListener('change', function() {
        validateFileSize(this, 'first_image_file_error');
    });

    document.getElementById('second_image_file').addEventListener('change', function() {
        validateFileSize(this, 'second_image_file_error');
    });

    document.getElementById('art_image_file').addEventListener('change', function() {
        validateFileSize(this, 'art_image_file_error');
    });    
    
    document.getElementById('art_video_file').addEventListener('change', function() {
        validateVideoFile(this, 'art_video_file_error');
    });

    // Add similar event listeners for other file inputs

    function validateFileSize(input, errorElementId) {
        var file = input.files[0];
        var maxSize = 5 * 1024 * 1024; // 5MB in bytes

    if (file.size > maxSize) {
        alert('File size exceeds 5MB. Please upload a smaller file.');
        input.value = ''; // Clear the input if validation fails
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

            // Clear any previous error
            document.getElementById(errorElementId).innerText = '';
        }
    }
</script><?php /**PATH G:\xampp8.2\htdocs\ecosymbiont\resources\views/front/pages/user/submit-new-article.blade.php ENDPATH**/ ?>