<style>
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
            if ($row) {
                //    Helper::pr($row);
                $user_id = $row->user_id;
                $author_classification = $row->author_classification;                
                $first_name = $row->first_name;                               
                $email = $row->email;          
                $for_publication_name = $row->for_publication_name;          
                $countryId = $row->country;                                                                
                $invited = $row->invited;
                $invited_by = $row->invited_by;  
                $invited_by_email = $row->invited_by_email;  
                $explanation = $row->explanation;  
                $explanation_submission = $row->explanation_submission;              
                $titleId = $row->titleId;                  
                $pronounId = $row->pronounId;                
                $state = $row->state;
                $city = $row->city;
                $participated = $row->participated;
                $participated_info = $row->participated_info;
                $community = $row->community;
                $community_name = $row->community_name;
                $organization_name = $row->organization_name;
                $organization_website = $row->organization_website;
                $ecosystem_affiliationId = (($row->ecosystem_affiliationId != '')?json_decode($row->ecosystem_affiliationId):[]);
                $indigenous_affiliation = $row->indigenous_affiliation;
                $expertise_areaId = (($row->expertise_areaId != '')?json_decode($row->expertise_areaId):[]);
                $bio_short = $row->bio_short;
                $bio_long = $row->bio_long;                            
            } else {
                $user_id = '';
                $author_classification = '';                
                $first_name = $user->first_name;                                 
                $email = $user->email;           
                $for_publication_name = '';           
                $countryId = '';                                                                 
                $invited = '';
                $invited_by = '';
                $invited_by_email = '';  
                $explanation = '';  
                $explanation_submission = '';                 
                $titleId = '';                
                $pronounId = '';
                $state = '';
                $city = '';
                $participated = '';
                $participated_info = '';
                $community = '';
                $community_name = '';
                $organization_name = '';
                $organization_website = '';
                $ecosystem_affiliationId = [];
                $indigenous_affiliation = '';
                $expertise_areaId = [];
                $bio_short = '';
                $bio_long = '';                                        
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
                        <h3 class="heading">Form: Author Profile</h3>
                    </div>
                    <div class="card-body">
                    <p style="color: #d81636; font-weight:500;font-size: 14px;margin-bottom: 25px;"><em>**Instructions: Please note that you will have to enter all information in one sitting, as there is no save option while you work. Unless you click the "Submit" button, your information will not be entered into the system. We apologize for any inconvenience. Thank you for your contribution.</em></p>
                    <form method="POST" id="saveForm" action="" enctype="multipart/form-data" oninput="validateForm()">
                        <!-- <input type="hidden" name="form_action" id="formAction"> -->
                            @csrf
                            <div class="row mb-3">
                                <label for="email" class="col-md-2 col-lg-4 col-form-label">1) Email address</label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="email" name="email" class="form-control" id="email"
                                        value="{{ old('email', $email) }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="author_classification" class="col-md-2 col-lg-4 col-form-label">2) Author Classification
                                </label>
                                <div class="col-md-10 col-lg-8">                                                                      
                                    <input type="text" class="form-control" id="Ecoweb-rooted community" name="author_classification" value="{{ old('author_classification', $classification->name) }}" readonly>
                                </div>
                            </div>                                                          
                            <div class="row mb-3">
                                <label for="first_name" class="col-md-2 col-lg-4 col-form-label">4) Full Legal Name (exactly as it appears on your government-issued identification documents, e.g., passport and/or driver's license)</label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="text" name="first_name" class="form-control" id="first_name"
                                        value="{{ old('first_name', $first_name) }}" readonly>
                                </div>
                            </div>                                                 
                            <div class="row mb-3">
                                <label for="for_publication_name" class="col-md-2 col-lg-4 col-form-label">5) Preferred name for publication (if different from full legal name)</label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="text" name="for_publication_name" class="form-control" id="for_publication_name"
                                        value="{{ old('for_publication_name', $for_publication_name) }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="title" class="col-md-2 col-lg-4 col-form-label">6) Title
                                </label>
                                <div class="col-md-10 col-lg-8">                                
                                    @if ($user_title)
                                        @foreach ($user_title as $data)
                                            <!-- <option value="{{ $data->id }}" @selected($data->id == $titleId)> -->
                                            <input type="radio" id="yes" name="title" value="{{ $data->id }}" required @checked($data->id == $titleId) >
                                            <label for="yes">{{ $data->name }}</label>
                                                <!-- {{ $data->name }}</option> -->
                                        @endforeach
                                    @endif                                
                                </div>
                            </div>   
                            <div class="row mb-3">
                                <label for="pronoun" class="col-md-2 col-lg-4 col-form-label">7) Pronoun (note: if you use more than one pronoun, indicate this in question 19) 1-paragraph
                                biography)</label>
                                <div class="col-md-10 col-lg-8">                                                                
                                    @if ($pronoun)
                                        @foreach ($pronoun as $data)
                                            <!-- <option value="{{ $data->id }}" @selected($data->id == $pronounId)> -->
                                            <input type="radio" id="yes" name="pronoun" value="{{ $data->id }}" required @checked($data->id == $pronounId) >
                                            <label for="yes">{{ $data->name }}</label>
                                                <!-- {{ $data->name }}</option> -->
                                        @endforeach
                                    @endif                                
                                </div>
                            </div>                                                                                       
                            <div class="row mb-3">
                                <label for="invited" class="col-md-2 col-lg-4 col-form-label">10) Were you invited to submit a Creative-Work to EaRTh? (note: if you select “No” for question 7, you
                                must select “Yes” for this question; otherwise, you will not be allowed to proceed and save a profile)</label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="radio" id="invited_yes" name="invited" value="Yes" required @checked(old('invited', $invited) == 'Yes')>
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="invited_no" name="invited" value="No" required @checked(old('invited', $invited) == 'No')>
                                    <label for="no">No</label>
                                </div>
                            </div>  
                            <div id="invitedDetails" style="display: none;">
                                <div class="row mb-3">
                                    <label for="invited_by" class="col-md-2 col-lg-4 col-form-label">10A) Full name of person who invited you to submit a Creative-Work to EaRTh (note: provide the name
                                    of the specific person who invited you; if a specific person did not invite you, type in: Sramani Institute)</label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="invited_by" class="form-control" id="invited_by"
                                            value="{{ old('invited_by', $invited_by) }}">
                                    </div>
                                </div> 
                                <div class="row mb-3">
                                    <label for="invited_by_email" class="col-md-2 col-lg-4 col-form-label">10B) Email address of person who invited you to submit a Creative-Work to EaRTh (note: provide the email address of the specific person who invited you; if a specific person did not invite you, type in: media@ecosymbiont.org)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="invited_by_email" class="form-control" id="invited_by_email"
                                            value="{{ old('invited_by_email', $invited_by_email) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="participated" class="col-md-2 col-lg-4 col-form-label">11) Have you participated as a strategist at an in-person ER Synergy Meeting?
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="radio" id="participated_yes" name="participated" value="Yes" required @checked(old('participated', $participated) == 'Yes')>
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="participated_no" name="participated" value="No" required @checked(old('participated', $participated) == 'No')>
                                    <label for="no">No</label>
                                </div>
                            </div> 
                            <div id="participatedDetails" style="display: none;">
                                <div class="row mb-3">
                                    <label for="participated_info" class="col-md-2 col-lg-4 col-form-label">11A) Provide date and location of most recent in-person ER Synergy Meeting in which you participated</label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="participated_info" class="form-control" id="participated_info"
                                        value="{{ old('participated_info', $participated_info) }}">                                    
                                    </div>
                                </div> 
                            </div>
                            <div id="formDetails">
                                <div class="row mb-3">
                                    <label for="explanation" class="col-md-2 col-lg-4 col-form-label">12) Explain why you are a grassroots changemaker, innovator, and/or knowledge-holder (max. 100 words)</label>
                                    <div class="col-md-10 col-lg-8">
                                        <textarea class="form-control" id="explanation" name="explanation" rows="4" cols="50" placeholder="Your explanation here..." required>{{ old('explanation', $explanation) }}</textarea>
                                        <div id="explanationError" class="error"></div>
                                    </div>
                                </div>  
                                <div class="row mb-3">
                                    <label for="explanation_submission" class="col-md-2 col-lg-4 col-form-label">13) Explain why and how your Creative-Work relates to regenerating systems that restore, preserve, and foster the mutually beneficial interconnectivity and interdependence (symbiosis) of human communities within and to natural ecological webs (ecowebs) (max. 150 words)</label>
                                    <div class="col-md-10 col-lg-8">
                                        <textarea class="form-control" id="explanation_submission" name="explanation_submission" rows="4" cols="50" placeholder="Your explanation here..." required>{{ old('explanation_submission', $explanation_submission) }}</textarea>
                                        <div id="explanation_submissionError" class="error"></div>
                                    </div>
                                </div>                                
                                <div class="row mb-3">
                                    <label for="country" class="col-md-2 col-lg-4 col-form-label">18) What country/nation do you live in? (Country of Residence)</label>
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
                                    <label for="state" class="col-md-2 col-lg-4 col-form-label">19) State/province of residence</label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="state" class="form-control" id="state"
                                            value="{{ old('state', $state) }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="city" class="col-md-2 col-lg-4 col-form-label">20) Village/town/city of residence</label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="city" class="form-control" id="city"
                                            value="{{ old('city', $city ) }}">
                                    </div>
                                </div> 
                                <div class="row mb-3">
                                    <label for="organization_name" class="col-md-2 col-lg-4 col-form-label">21) Name of your grassroots organization/ ecoweb-rooted community/ movement (if no grassroots affiliation, type N/A)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="organization_name" class="form-control" id="organization_name"
                                            value="{{ old('organization_name', $organization_name) }}" >
                                    </div>
                                </div> 
                                <div class="row mb-3">
                                    <label for="organization_website" class="col-md-2 col-lg-4 col-form-label">22) Website of grassroots organization/ ecoweb-rooted community/ movement (if no website, type N/A)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="organization_website" class="form-control" id="organization_website"
                                            value="{{ old('organization_website', $organization_website) }}" >
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="ecosystem_affiliation" class="col-md-2 col-lg-4 col-form-label">23) What continent are your ancestors originally from? (select all that apply)
                                    </label>
                                    <div class="col-md-10 col-lg-8">                                                                                                
                                        @if ($ecosystem_affiliation)
                                            @foreach ($ecosystem_affiliation as $data)
                                            <input type="checkbox" name="ecosystem_affiliation[]" value="{{ $data->id }}" @if(in_array($data->id, old('ecosystem_affiliation', $ecosystem_affiliationId))) checked @endif>  {{ $data->name }}<br>
                                            @endforeach
                                        @endif                                
                                    </div>
                                </div>   
                                <div class="row mb-3">
                                    <label for="Indigenous_affiliation" class="col-md-2 col-lg-4 col-form-label">24) What specific region are your ancestors originally from OR what is the name of your Indigenous community? (example of specific region = Bengal; example of Indigenous community name = Lisjan Ohlone)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="text" name="indigenous_affiliation" class="form-control" id="indigenous_affiliation"
                                        value="{{ old('indigenous_affiliation', $indigenous_affiliation) }}" required>
                                    </div>
                                </div> 
                                <div class="row mb-3">
                                    <label for="expertise_area" class="col-md-2 col-lg-4 col-form-label">25) Your expertise area (select all that apply)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        @if ($expertise_area)
                                            @foreach ($expertise_area as $data)
                                            <input type="checkbox" name="expertise_area[]" value="{{ $data->id }}" @if(in_array($data->id, old('expertise_area', $expertise_areaId))) checked @endif>  {{ $data->name }}<br>
                                            @endforeach
                                        @endif
                                    </div>
                                </div> 
                                <div class="row mb-3">
                                    <label for="bio_short" class="col-md-2 col-lg-4 col-form-label">26) 1-sentence biography (max. 40 words)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <textarea class="form-control" id="bio_short" name="bio_short" rows="4" cols="50" placeholder="Your explanation here..." required>{{ old('bio_short', $bio_short) }}</textarea>
                                        <div id="bio_shortError" class="error"></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="bio_long" class="col-md-2 col-lg-4 col-form-label">27) 1-paragraph biography (150-250 words)
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <textarea class="form-control" id="bio_long" name="bio_long" rows="4" cols="50" placeholder="Your explanation here..." required>{{ old('bio_long', $bio_long) }}</textarea>
                                        <div id="bio_longError" class="error"></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="community" class="col-md-2 col-lg-4 col-form-label blue-text">28) Are you a member of an EaRTh Community?
                                    </label>
                                    <div class="col-md-10 col-lg-8">
                                        <input type="radio" id="community_yes" name="community" value="Yes" required @checked(old('community', $community) == 'Yes')>
                                        <label for="yes">Yes</label>
                                        <input type="radio" id="community_no" name="community" value="No" required @checked(old('community', $community) == 'No')>
                                        <label for="no">No</label>
                                    </div>
                                </div> 
                                <div id="communityDetails" style="display: none;">
                                    <div class="row mb-3">
                                        <label for="community_info" class="col-md-2 col-lg-4 col-form-label blue-text">28A) Select Community :</label>
                                        <div class="col-md-10 col-lg-8">
                                            <select name="community_name" class="form-control" id="community_name">
                                                <option value="" selected >Select</option>
                                                <option value="Schumacher Wild" @selected(old("community_name", $community_name ?? '') == 'Schumacher Wild') >Schumacher Wild</option>
                                                <option value="West Oakland Matters" @selected(old("community_name", $community_name ?? '') == 'West Oakland Matters') >West Oakland Matters</option>
                                            </select>
                                        </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Function to show/hide the community fields -->
<script>
    $(document).ready(function() {
        
        function toggleFields() {            
            const communityYes = $('#community_yes').is(':checked');            
            
            // Toggle individual sections            
            $('#communityDetails').toggle(communityYes);
        }

        // Trigger on change
        $('input[name="invited"], input[name="community"]').on('change', function() {
            toggleFields();
        });

        // Check initial state on page load
        toggleFields();
    });
</script>
<!-- End Function to show/hide the community fields -->

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
        allValid &= checkWordLimit(document.getElementById('subtitle'), 40, 'subtitleError');                
        allValid &= checkWordLimit(document.getElementById('bio_short'), 40, 'bio_shortError');
        allValid &= checkWordLimit(document.getElementById('bio_long'), 250, 'bio_longError');        

        document.getElementById('submitButton').disabled = !allValid;
    }
</script>
<!-- End all word count validation -->
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