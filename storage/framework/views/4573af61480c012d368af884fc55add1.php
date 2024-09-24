<style type="text/css">
    * {
    margin: 0;
    padding: 0
    }
    html {
    height: 100%
    }
    p {
    color: grey
    }
    #heading {
    text-transform: uppercase;
    color: #c1272d;
    font-weight: normal
    }
    .msform {
    text-align: center;
    position: relative;
    margin-top: 20px
    }
    .msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative
    }
    .form-card {
    text-align: left
    }
    .msform fieldset:not(:first-of-type) {
    display: none
    }
    .msform input, .msform textarea {
    padding: 8px 15px 8px 15px;
    border: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 10px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    background-color: #ECEFF1;
    font-size: 16px;
    letter-spacing: 1px;
    }
    .msform input:focus,
    .msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #c1272d;
    outline-width: 0
    }
    .msform .action-button-previous {
	width: auto;
	background: #616161;
	font-weight: bold;
	color: white;
	border: 0 none;
	border-radius: 0px;
	cursor: pointer;
	padding: 10px 5px;
	margin: 10px 5px 10px 0px;
	text-align: center;
	display: inline-block;
	padding: 10px 31px;
	font-size: 16px;
	border-radius: 30px;
	margin-top: 0px;
	float: right;
    }
    .msform .action-button:hover,
    .msform .action-button:focus {
    background-color: #311B92
    }
    .msform .action-button-previous {
	width: auto;
	background: #616161;
	font-weight: bold;
	color: white;
	border: 0 none;
	border-radius: 0px;
	cursor: pointer;
	padding: 10px 5px;
	margin:0px;
	text-align: center;
	display: inline-block;
	padding: 10px 31px;
	font-size: 16px;
	border-radius: 30px;
    }
    .msform .action-button-previous:hover,
    .msform .action-button-previous:focus {
    background-color: #000000
    }
    .card {
    z-index: 0;
    border: none;
    position: relative
    }
    .fs-title {
    font-size: 25px;
    color: #c1272d;
    margin-bottom: 15px;
    font-weight: normal;
    text-align: left
    }
    .purple-text {
    color: #c1272d;
    font-weight: normal
    }
    .steps {
    font-size: 25px;
    color: gray;
    margin-bottom: 10px;
    font-weight: normal;
    text-align: right
    }
    .fieldlabels {
    color: gray;
    text-align: left
    }
    #progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    }
    .sidebar_new_horzi {
    display: flex;
    margin-bottom: 25px;
    background: #2e3192;
    border-radius: 5px;
    }
    .side-panel .sidebar_new_horzi li a {
    color: #fff;
    padding: 10px 15px;
    }
    .side-panel .sidebar_new_horzi li a i{
    padding-right:8px;
    }
    #progressbar .active {
    color: #c1272d
    }
    #progressbar li {
    list-style-type: none;
    font-size: 11px;
    width: 10%;
    float: left;
    position: relative;
    font-weight: 400;
    margin-bottom: 15px;
    padding: 0 5px;
    }
    #progressbar #form1:before {
    font-family: FontAwesome;
    content: "\f13e"
    }
    #progressbar #form2:before {
    font-family: FontAwesome;
    content: "\f007"
    }
    #progressbar #form3:before {
    font-family: FontAwesome;
    content: "\f030"
    }
    #progressbar #form4:before {
    font-family: FontAwesome;
    content: "\f00c"
    }
    #progressbar #form5:before {
    font-family: FontAwesome;
    content: "\f00c"
    }
    #progressbar #form6:before {
    font-family: FontAwesome;
    content: "\f00c"
    }
    #progressbar #form7:before {
    font-family: FontAwesome;
    content: "\f00c"
    }
    #progressbar #form8:before {
    font-family: FontAwesome;
    content: "\f00c"
    }
    #progressbar #form9:before {
    font-family: FontAwesome;
    content: "\f00c"
    }
    #progressbar #form10:before {
    font-family: FontAwesome;
    content: "\f00c"
    }
    #progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px
    }
    #progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1
    }
    #progressbar li.active:before,
    #progressbar li.active:after {
    background: #c1272d
    }
    .progress {
    height: 20px
    }
    .progress-bar {
    background-color: #c1272d
    }
    .fit-image {
    width: 100%;
    object-fit: cover
    }
    @media screen and (max-width: 767px) {
    #progressbar {
    display: flex;
    flex-wrap: unset;
    justify-content: start;
    overflow: scroll;
    }
    #progressbar li::before {
    width: 40px;
    height: 40px;
    line-height: 37px;
    font-size: 15px;
    }
    #progressbar li {
    width: auto;
    }
    }
</style>
<style>
    #signature{
        width: 300px; height: 200px;
        border: 1px solid black;
    	margin: 0 auto;
    }
    .btn-group {
    	display: flex;
    	justify-content: space-between;
    	align-items: end;
    	float: right;
    	position: absolute;
    	bottom: 20px;
    	left: 0;
    }
    .msform .theme-btn {
    	margin-top: 30px !important;
    	color: #ffff;
    	background: #c1272c;
    	float: right;
    }
    .msform .theme-btn:hover {
    	background: #2e3192;
    }
    .msform input {
    margin-top: 4px;	
    }
    .preloder{
      height: 100vh;
      width: 100%;
      position: fixed;
      top: 0;
      left: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #111;
      z-index:9999;
    }


    .loder{
      width: 100px;
      height: 100px;
      border-radius: 50%;
      border: 5px solid #D1DFFF;
      border-top: 8px solid #3775FF;
      animation: spinner 1s linear infinite;
    }

    @keyframes spinner{
      0%{
        transform: rotate(0deg);

      }
      50%{
        border-top-width: 5px;
      }
      100%{
        transform: rotate(360deg);
      }
    }

    @media screen and (max-width: 668px){
      .loder{
        height: 60px;
        width: 60px;
        border-top: 6px solid #3775FF;
      }
    }

    @font-face {
        font-family: 'willow bloom';
        src: url('https://qarp.itiffyconsultants.com/public/material/frontend/assets/fonts/willowbloom-Regular.woff2') format('woff2'),
            url('https://qarp.itiffyconsultants.com/public/material/frontend/assets/fonts/willowbloom-Regular.woff') format('woff');
        font-weight: normal;
        font-style: normal;
        font-display: swap;
    }

    @font-face {
        font-family: 'willow bloom';
        src: url('https://qarp.itiffyconsultants.com/public/material/frontend/assets/fonts/willowbloom-Regular.woff2') format('woff2'),
            url('https://qarp.itiffyconsultants.com/public/material/frontend/assets/fonts/willowbloom-Regular.woff') format('woff');
        font-weight: normal;
        font-style: normal;
        font-display: swap;
    }
    .signature{
        font-family: 'willow bloom';
    }
</style>
<?php
if($application){
    $step = $application->step;
    $first_name = json_decode($application->first_name);
    $last_name = json_decode($application->last_name);
    $dob = json_decode($application->dob);
    $ssn = json_decode($application->ssn);
    $email = json_decode($application->email);
    $phone = json_decode($application->phone);
    $alternate_phone = json_decode($application->alternate_phone);
    $current_address = $application->current_address;
    $current_street_name = $application->current_street_name;
    $current_city = $application->current_city;
    $current_state = $application->current_state;
    $current_zipcode = $application->current_zipcode;
    $current_residence_duration = $application->current_residence_duration;
    $current_landlord_name = $application->current_landlord_name;
    $current_landlord_phone = $application->current_landlord_phone;
    $previous_address = $application->previous_address;
    $previous_street_name = $application->previous_street_name;
    $previous_city = $application->previous_city;
    $previous_state = $application->previous_state;
    $previous_zipcode = $application->previous_zipcode;
    $previous_residence_duration = $application->previous_residence_duration;
    $previous_landlord_name = $application->previous_landlord_name;
    $previous_landlord_phone = $application->previous_landlord_phone;
    $employer_name = $application->employer_name;
    $employer_address = $application->employer_address;
    $job_title = $application->job_title;
    $employment_duration = $application->employment_duration;
    $supervisor_name = $application->supervisor_name;
    $work_phone = $application->work_phone;

    $previous_employer_name = $application->previous_employer_name;
    $previous_employer_address = $application->previous_employer_address;
    $previous_job_title = $application->previous_job_title;
    $previous_employment_duration = $application->previous_employment_duration;
    $previous_supervisor_name = $application->previous_supervisor_name;
    $previous_work_phone = $application->previous_work_phone;

    $is_vehicle = $application->is_vehicle;
    $vehicle_make = json_decode($application->vehicle_make);
    $vehicle_model = json_decode($application->vehicle_model);
    $vehicle_year = json_decode($application->vehicle_year);
    $vehicle_license_plate = json_decode($application->vehicle_license_plate);
    $vehicle_registration_state = json_decode($application->vehicle_registration_state);
    $vehicle_color = json_decode($application->vehicle_color);
    $is_pet = $application->is_pet;
    $type_of_pet = json_decode($application->type_of_pet);
    $pet_breed = json_decode($application->pet_breed);
    $pet_age = json_decode($application->pet_age);
    $pet_name = json_decode($application->pet_name);
    $drivers_license = $application->drivers_license;
    $drivers_license_number = $application->drivers_license_number;
    $drivers_license_state = $application->drivers_license_state;
    $drivers_license_expiry = $application->drivers_license_expiry;
    $paystubs = $application->paystubs;
    $emergency_contact_fname = $application->emergency_contact_fname;
    $emergency_contact_lname = $application->emergency_contact_lname;
    $emergency_contact_address = $application->emergency_contact_address;
    $emergency_contact_street_name = $application->emergency_contact_street_name;
    $emergency_contact_state = $application->emergency_contact_state;
    $emergency_contact_zipcode = $application->emergency_contact_zipcode;
    $emergency_contact_relation = $application->emergency_contact_relation;
    $emergency_contact_other_relation = $application->emergency_contact_other_relation;
    $signing_declaration = $application->signing_declaration;
    $signing_name = $application->signing_name;
    $signing_initials = $application->signing_initials;
    $signing_last4_ssn = $application->signing_last4_ssn;
    $signature_type = $application->signature_type;
    $signature = $application->signature;
    $initials = $application->initials;
    $signing_documents1 = $application->signing_documents1;
    $signing_documents2 = $application->signing_documents2;
    $signing_documents3 = $application->signing_documents3;
    $signing_documents4 = $application->signing_documents4;
    $signing_documents5 = $application->signing_documents5;
} else {
    $step = 1;
    $first_name = [];
    $last_name = [];
    $dob = [];
    $ssn = [];
    $email = [];
    $phone = [];
    $alternate_phone = [];
    $current_address = '';
    $current_street_name = '';
    $current_city = '';
    $current_state = '';
    $current_zipcode = '';
    $current_residence_duration = '';
    $current_landlord_name = '';
    $current_landlord_phone = '';
    $previous_address = '';
    $previous_street_name = '';
    $previous_city = '';
    $previous_state = '';
    $previous_zipcode = '';
    $previous_residence_duration = '';
    $previous_landlord_name = '';
    $previous_landlord_phone = '';
    $employer_name = '';
    $employer_address = '';
    $job_title = '';
    $employment_duration = '';
    $supervisor_name = '';
    $work_phone = '';

    $previous_employer_name = '';
    $previous_employer_address = '';
    $previous_job_title = '';
    $previous_employment_duration = '';
    $previous_supervisor_name = '';
    $previous_work_phone = '';

    $is_vehicle = $application->is_vehicle;
    $vehicle_make = [];
    $vehicle_model = [];
    $vehicle_year = [];
    $vehicle_license_plate = [];
    $vehicle_registration_state = [];
    $vehicle_color = [];
    $is_pet = $application->is_pet;
    $type_of_pet = [];
    $pet_breed = [];
    $pet_age = [];
    $pet_name = [];
    $drivers_license = '';
    $drivers_license_number = '';
    $drivers_license_state = '';
    $drivers_license_expiry = '';
    $paystubs = '';
    $emergency_contact_fname = '';
    $emergency_contact_lname = '';
    $emergency_contact_address = '';
    $emergency_contact_street_name = '';
    $emergency_contact_state = '';
    $emergency_contact_zipcode = '';
    $emergency_contact_relation = '';
    $emergency_contact_other_relation = '';
    $signing_declaration = 0;
    $signing_name = '';
    $signing_initials = '';
    $signing_last4_ssn = '';
    $signature_type = '';
    $signature = '';
    $initials = '';
    $signing_documents1 = '';
    $signing_documents2 = '';
    $signing_documents3 = '';
    $signing_documents4 = '';
    $signing_documents5 = '';
}
$hideStyle = 'display: none; position: relative; opacity: 0;';
$showStyle = 'display: block; opacity: 1;';
?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y property-information-form">
    <h4 class="py-3 mb-1"><span class="text-muted fw-light"><h4><?=$page_header?></h4></h4>
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-4 pb-0 mb-3">
            <div class="preloder" style="display:none;">
                <div class="loder">
                  
                </div>
            </div>
            <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center p-0  mb-2">
            <div class="card px-0 pt-4 pb-0 mb-3">
                <h2 id="heading"><?=$page_header?></h2>
                <p class="text-danger">Fill all form field to go to next step</p>
                <h6 class="alert alert-success" id="succ-msg" style="display:none;"></h6>
                <div class="msform">
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li id="form1" class="active"><strong>TENANT DETAILS</strong></li>
                        <li id="form2" class="<?=(($step >= 2.0)?'active':'')?>"><strong>CURRENT RESIDENCE INFORMATION</strong></li>
                        <li id="form3" class="<?=(($step >= 3.0)?'active':'')?>"><strong>EMPLOYMENT INFORMATION</strong></li>
                        <li id="form4" class="<?=(($step >= 4.0)?'active':'')?>"><strong>VEHICLE INFORMATION</strong></li>
                        <li id="form5" class="<?=(($step >= 5.0)?'active':'')?>"><strong>PETS</strong></li>
                        <li id="form6" class="<?=(($step >= 6.0)?'active':'')?>"><strong>ADDITIONAL NOTES</strong></li>
                        <li id="form7" class="<?=(($step >= 7.0)?'active':'')?>"><strong>EMERGENCY CONTACT</strong></li>
                        <li id="form8" class="<?=(($step >= 8.0)?'active':'')?>"><strong>CREATING SIGNATURE</strong></li>
                        <li id="form9" class="<?=(($step >= 9.0)?'active':'')?>"><strong>SIGNING DOCUMENTS</strong></li>
                        <li id="form10" class="<?=(($step >= 10.0)?'active':'')?>"><strong>FINISH</strong></li>
                    </ul>
                    <!-- <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> -->
                    <br> <!-- fieldsets -->
                    <fieldset style="<?=((($step == '0.0'))?$showStyle:$hideStyle)?>">
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">TENANT DETAILS:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 1 - 10</h2>
                                </div>
                            </div>
                            <form id="applicationForm1" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="application_id" value="<?=$application_id?>">
                                <input type="hidden" name="step" value="1">
                                <?php
                                $date   = strtotime(date('Y-m-d'). ' -18 year');
                                $maxDOB = date('Y-m-d', $date);
                                ?>
                                <div class="field_wrapper">
                                    <?php if(count($first_name)){ for($i=0;$i<count($first_name);$i++){?>
                                        <div class="row mb-3" style="border: 1px solid #c1272d52;padding: 10px;border-radius: 5px;">
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                                <label class="fieldlabels" for="first_name">First Name: *</label>
                                                <input type="text" name="first_name[]" id="first_name" placeholder="First Name" value="<?=$first_name[$i]?>" required />
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                                <label class="fieldlabels" for="last_name">Last Name: *</label>
                                                <input type="text" name="last_name[]" id="last_name" placeholder="Last Name" value="<?=$last_name[$i]?>" required />
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                                                <label class="fieldlabels" for="dob">Date of Birth: *</label>
                                                <input type="date" name="dob[]" id="dob" placeholder="Date of Birth" max="<?=$maxDOB?>" value="<?=$dob[$i]?>" required />
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                                                <label class="fieldlabels" for="ssn">Social Secuirity Number: *</label>
                                                <input type="text" name="ssn[]" id="ssn" placeholder="Social Secuirity Number" minlength="9" maxlength="9" value="<?=$ssn[$i]?>" required />
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                                                <label class="fieldlabels" for="email">Email: *</label>
                                                <input type="email" name="email[]" id="primary_email" class="primary_email" placeholder="Email" value="<?=$email[$i]?>" required />
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                                <label class="fieldlabels" for="phone">Phone Number: *</label>
                                                <input type="text" name="phone[]" id="phone" placeholder="Phone Number" minlength="10" maxlength="10" onkeypress="return isNumber(event)" onblur="return formatPhone(this.value, 'phone')" value="<?=$phone[$i]?>" required />
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                                <label class="fieldlabels" for="alternate_phone">Alternate Phone:</label>
                                                <input type="text" name="alternate_phone[]" id="alternate_phone" minlength="10" maxlength="10" onkeypress="return isNumber(event)" placeholder="Alternate Phone" onblur="return formatPhone(this.value, 'alternate_phone')" value="" />
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                <a href="javascript:void(0);" class="btn btn-danger btn-sm remove_button" title="Remove Tenant"><i class="fa fa-minus-circle"></i> Remove Tenant</a>
                                            </div>
                                        </div>
                                    <?php } } else {?>
                                        <div class="row mb-3" style="border: 1px solid #c1272d52;padding: 10px;border-radius: 5px;">
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                                <label class="fieldlabels" for="first_name">First Name: *</label>
                                                <input type="text" name="first_name[]" id="first_name" placeholder="First Name" value="<?=(($getLastLead)?$getLastLead->first_name:'')?>" required />
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                                <label class="fieldlabels" for="last_name">Last Name: *</label>
                                                <input type="text" name="last_name[]" id="last_name" placeholder="Last Name" value="<?=(($getLastLead)?$getLastLead->last_name:'')?>" required />
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                                                <label class="fieldlabels" for="dob">Date of Birth: *</label>
                                                <input type="date" name="dob[]" id="dob" placeholder="Date of Birth" max="<?=$maxDOB?>" required />
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                                                <label class="fieldlabels" for="ssn">Social Secuirity Number: *</label>
                                                <input type="text" name="ssn[]" id="ssn" placeholder="Social Secuirity Number" minlength="9" maxlength="9" required />
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                                                <label class="fieldlabels" for="email">Email: *</label>
                                                <input type="email" name="email[]" id="primary_email" class="primary_email" placeholder="Email" value="<?=(($getLastLead)?$getLastLead->email:'')?>" required />
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                                <label class="fieldlabels" for="phone">Phone Number: *</label>
                                                <input type="text" name="phone[]" id="phone" placeholder="Phone Number" minlength="10" maxlength="10" onkeypress="return isNumber(event)" onblur="return formatPhone(this.value, 'phone')" value="<?=(($getLastLead)?$getLastLead->phone:'')?>" required />
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                                <label class="fieldlabels" for="alternate_phone">Alternate Phone: *</label>
                                                <input type="text" name="alternate_phone[]" id="alternate_phone" minlength="10" maxlength="10" onkeypress="return isNumber(event)" placeholder="Alternate Phone" onblur="return formatPhone(this.value, 'alternate_phone')" />
                                            </div>
                                        </div>
                                    <?php }?>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                        <a href="javascript:void(0);" class="btn btn-success btn-sm add_button" title="Add Tenant"><i class="fa fa-plus-circle"></i> Add Another Tenant</a>
                                    </div>
                                </div>
                                <button type="submit" class="btn theme-btn" style="display: flex;float: right;">Save & Next</button>
                            </form>
                        </div>
                        <div class="btn-group">
                            <input type="button" name="next" class="next action-button" value="Next" id="step1_next" style="display:none;" />
                        </div>
                    </fieldset>
                    <fieldset style="<?=(($step == '1.0')?$showStyle:$hideStyle)?>">
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">CURRENT RESIDENCE INFORMATION:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 2 - 10</h2>
                                </div>
                            </div>
                            <form id="applicationForm2" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="application_id" value="<?=$application_id?>">
                                <input type="hidden" name="step" value="2">
                                <div class="row mb-3" style="border: 1px solid #c1272d52;padding: 10px;border-radius: 5px;">
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="current_address">Street Name: *</label>
                                        <input type="text" name="current_address" id="current_address" placeholder="Street Name" value="<?=$current_address?>" required />
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="current_street_name">Apt/Ste/Unit: *</label>
                                        <input type="text" name="current_street_name" id="current_street_name" placeholder="Apt/Ste/Unit" value="<?=$current_street_name?>" required />
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="current_city">City: *</label>
                                        <input type="text" name="current_city" id="current_city" placeholder="City" value="<?=$current_city?>" required />
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="current_state">State: *</label>
                                        <select name="current_state" id="current_state" class="form-control" required>
                                            <option value="" selected>Select State</option>
                                            <?php if($states){ foreach($states as $st){?>
                                                <option value="<?=$st->name?>" <?=(($st->name == $current_state)?'selected':'')?>><?=$st->name?></option>
                                            <?php } }?>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="current_zipcode">Zipcode: *</label>
                                        <input type="text" name="current_zipcode" id="current_zipcode" placeholder="Zipcode" value="<?=$current_zipcode?>" required />
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="current_residence_duration">Duration: *</label>
                                        <select name="current_residence_duration" id="current_residence_duration" class="form-control" required>
                                            <option value="" selected>Select Duration</option>
                                            <option value="Less than one year" <?=(($current_residence_duration == 'Less than one year')?'selected':'')?>>Less than one year</option>
                                            <option value="More than one year" <?=(($current_residence_duration == 'More than one year')?'selected':'')?>>More than one year</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="current_landlord_name">Current Landlord Name: *</label>
                                        <input type="text" name="current_landlord_name" id="current_landlord_name" placeholder="Current Landlord Name" value="<?=$current_landlord_name?>" required />
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="current_landlord_phone">Current Landlord Phone: *</label>
                                        <input type="text" name="current_landlord_phone" id="current_landlord_phone" placeholder="Current Landlord Phone" minlength="10" maxlength="10" onkeypress="return isNumber(event)" onblur="return formatPhone(this.value, 'current_landlord_phone')" value="<?=$current_landlord_phone?>" required />
                                    </div>
                                </div>
                                <div class="row mb-3" id="previous_residence" style="border: 1px solid #c1272d52;padding: 10px;border-radius: 5px; display: none;">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12  mb-2">
                                        <h2 class="fs-title">PREVIOUS RESIDENCE INFORMATION:</h2>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="previous_address">Street Name: *</label>
                                        <input type="text" name="previous_address" id="previous_address" placeholder="Street Name" value="<?=$previous_address?>" required />
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="previous_street_name">Apt/Ste/Unit: *</label>
                                        <input type="text" name="previous_street_name" id="previous_street_name" placeholder="Apt/Ste/Unit" value="<?=$previous_street_name?>" required />
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="previous_city">City: *</label>
                                        <input type="text" name="previous_city" id="previous_city" placeholder="City" value="<?=$previous_city?>" required />
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="previous_state">State: *</label>
                                        <select name="previous_state" id="previous_state" class="form-control" required>
                                            <option value="" selected>Select State</option>
                                            <?php if($states){ foreach($states as $st){?>
                                                <option value="<?=$st->name?>" <?=(($st->name == $previous_state)?'selected':'')?>><?=$st->name?></option>
                                            <?php } }?>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="previous_zipcode">Zipcode: *</label>
                                        <input type="text" name="previous_zipcode" id="previous_zipcode" placeholder="Zipcode" value="<?=$previous_zipcode?>" required />
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="previous_residence_duration">Duration At previous Residence: *</label>
                                        <select name="previous_residence_duration" id="previous_residence_duration" class="form-control" required>
                                            <option value="" selected>Select Duration</option>
                                            <option value="Less than one year" <?=(($previous_residence_duration == 'Less than one year')?'selected':'')?>>Less than one year</option>
                                            <option value="More than one year" <?=(($previous_residence_duration == 'More than one year')?'selected':'')?>>More than one year</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="previous_landlord_name">Previous Landlord Name: *</label>
                                        <input type="text" name="previous_landlord_name" id="previous_landlord_name" placeholder="Previous Landlord Name" value="<?=$previous_landlord_name?>" required />
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="previous_landlord_phone">Previous Landlord Phone: *</label>
                                        <input type="text" name="previous_landlord_phone" id="previous_landlord_phone" placeholder="Previous Landlord Phone" minlength="10" maxlength="10" onkeypress="return isNumber(event)" onblur="return formatPhone(this.value, 'previous_landlord_phone')" value="<?=$previous_landlord_phone?>" required />
                                    </div>
                                </div>
                                 <button type="submit" class="btn theme-btn" style="display: flex;float: right;">Save & Next</button>
                            </form>
                        </div>
                        <div class="btn-group">
                            <input type="button" name="next" class="next action-button" value="Next" id="step2_next" style="display:none;" />
                            <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        </div>
                    </fieldset>
                    <fieldset style="<?=(($step == '2.0')?$showStyle:$hideStyle)?>">
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">EMPLOYMENT INFORMATION:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 3 - 10</h2>
                                </div>
                            </div>
                            <form id="applicationForm3" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="application_id" value="<?=$application_id?>">
                                <input type="hidden" name="step" value="3">
                                <div class="row" style="border: 1px solid #2e31924f; padding: 10px; border-radius: 10px;">
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="employer_name">Employer Name: *</label>
                                        <input type="text" name="employer_name" id="employer_name" placeholder="Employer Name" value="<?=$employer_name?>" required />
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="employer_address">Employer Address: *</label>
                                        <input type="text" name="employer_address" id="employer_address" placeholder="Employer Address" value="<?=$employer_address?>" required />
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="job_title">Job Title: *</label>
                                        <input type="text" name="job_title" id="job_title" placeholder="Job Title" value="<?=$job_title?>" required />
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="employment_duration">Employment Duration From: *</label>
                                        <select name="employment_duration" id="employment_duration" class="form-control" required>
                                            <option value="" selected>Select Duration</option>
                                            <option value="Less than 3 months" <?=(($employment_duration == 'Less than 3 months')?'selected':'')?>>Less than 3 months</option>
                                            <option value="3-6 Months" <?=(($employment_duration == '3-6 Months')?'selected':'')?>>3-6 Months</option>
                                            <option value="6-12 months" <?=(($employment_duration == '6-12 months')?'selected':'')?>>6-12 months</option>
                                            <option value="More than one year" <?=(($employment_duration == 'More than one year')?'selected':'')?>>More than one year</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="supervisor_name">Supervisor Name: *</label>
                                        <input type="text" name="supervisor_name" id="supervisor_name" placeholder="Supervisor Name" value="<?=$supervisor_name?>" required />
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="work_phone">Work Phone: *</label>
                                        <input type="text" name="work_phone" id="work_phone" placeholder="Work Phone" minlength="10" maxlength="10" onkeypress="return isNumber(event)" onblur="return formatPhone(this.value, 'work_phone')" value="<?=$work_phone?>" required />
                                    </div>
                                </div>
                                <div class="row mt-3" id="previous-employer" style="border: 1px solid #2e31924f; padding: 10px; border-radius: 10px;">
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="previous_employer_name">Employer Name: *</label>
                                        <input type="text" name="previous_employer_name" id="previous_employer_name" placeholder="Employer Name" value="<?=$previous_employer_name?>" />
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="previous_employer_address">Employer Address: *</label>
                                        <input type="text" name="previous_employer_address" id="previous_employer_address" placeholder="Employer Address" value="<?=$previous_employer_address?>" />
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="previous_job_title">Job Title: *</label>
                                        <input type="text" name="previous_job_title" id="previous_job_title" placeholder="Job Title" value="<?=$previous_job_title?>" />
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="previous_employment_duration">Employment Duration From: *</label>
                                        <select name="previous_employment_duration" id="previous_employment_duration" class="form-control">
                                            <option value="" selected>Select Duration</option>
                                            <option value="Less than 3 months" <?=(($previous_employment_duration == 'Less than 3 months')?'selected':'')?>>Less than 3 months</option>
                                            <option value="3-6 Months" <?=(($previous_employment_duration == '3-6 Months')?'selected':'')?>>3-6 Months</option>
                                            <option value="6-12 months" <?=(($previous_employment_duration == '6-12 months')?'selected':'')?>>6-12 months</option>
                                            <option value="More than one year" <?=(($previous_employment_duration == 'More than one year')?'selected':'')?>>More than one year</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="previous_supervisor_name">Supervisor Name: *</label>
                                        <input type="text" name="previous_supervisor_name" id="previous_supervisor_name" placeholder="Supervisor Name" value="<?=$previous_supervisor_name?>" />
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="previous_work_phone">Work Phone: *</label>
                                        <input type="text" name="previous_work_phone" id="previous_work_phone" placeholder="Work Phone" minlength="10" maxlength="10" onkeypress="return isNumber(event)" onblur="return formatPhone(this.value, 'previous_work_phone')" value="<?=$previous_work_phone?>" />
                                    </div>
                                </div>
                                <button type="submit" class="btn  theme-btn" style="display: flex;float: right;">Save & Next</button>
                            </form>
                        </div>
                        <div class="btn-group">
                            <input type="button" name="next" class="next action-button" value="Next" id="step3_next" style="display:none;" />
                            <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        </div>
                    </fieldset>
                    <fieldset style="<?=(($step == '3.0')?$showStyle:$hideStyle)?>">
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">VEHICLE INFORMATION:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 4 - 10</h2>
                                </div>
                            </div>
                            <form id="applicationForm4" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="application_id" value="<?=$application_id?>">
                                <input type="hidden" name="step" value="4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2" style="display: inline-flex;">
                                        <input type="checkbox" name="is_vehicle" id="is_vehicle" style="width: 20px;margin-right: 8px;">
                                        <label class="fieldlabels" for="is_vehicle" style="width: 90%;"> No Vehicle</label>
                                    </div>
                                </div>
                                <div class="field_wrapper_vehicle">
                                    <?php if(count($vehicle_make)){ for($i=0;$i<count($vehicle_make);$i++){?>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                                <label class="fieldlabels" for="vehicle_make">Make: *</label>
                                                <input type="text" name="vehicle_make[]" id="vehicle_make" placeholder="Make" value="<?=$vehicle_make[$i]?>" />
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                                <label class="fieldlabels" for="vehicle_model">Model: *</label>
                                                <input type="text" name="vehicle_model[]" id="vehicle_model" placeholder="Model" value="<?=$vehicle_model[$i]?>" />
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                                <label class="fieldlabels" for="vehicle_year">Year: *</label>
                                                <input type="text" name="vehicle_year[]" id="vehicle_year" placeholder="Year" max="<?=date('Y')?>" maxlength="4" minlength="4" onkeypress="return isNumber(event)" value="<?=$vehicle_year[$i]?>" />
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                                <label class="fieldlabels" for="vehicle_license_plate">License Plate: *</label>
                                                <input type="text" name="vehicle_license_plate[]" id="vehicle_license_plate" placeholder="License Plate" value="<?=$vehicle_license_plate[$i]?>" />
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                                <label class="fieldlabels" for="vehicle_registration_state">State Of Registration: *</label>
                                                <select name="vehicle_registration_state" id="vehicle_registration_state" class="form-control" required>
                                                    <option value="" selected>Select State</option>
                                                    <?php if($states){ foreach($states as $st){?>
                                                        <option value="<?=$st->name?>" <?=(($st->name == $vehicle_registration_state)?'selected':'')?>><?=$st->name?></option>
                                                    <?php } }?>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                                <label class="fieldlabels" for="vehicle_color">Color: *</label>
                                                <input type="text" name="vehicle_color[]" id="vehicle_color" placeholder="Color" value="<?=$vehicle_color[$i]?>" />
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                <a href="javascript:void(0);" class="btn btn-danger btn-sm remove_button_vehicle" title="Remove Vehicle"><i class="fa fa-minus-circle"></i> Remove Vehicle</a>
                                            </div>
                                        </div>
                                    <?php } } else {?>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                                <label class="fieldlabels" for="vehicle_make">Make: *</label>
                                                <input type="text" name="vehicle_make[]" id="vehicle_make" placeholder="Make" />
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                                <label class="fieldlabels" for="vehicle_model">Model: *</label>
                                                <input type="text" name="vehicle_model[]" id="vehicle_model" placeholder="Model" />
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                                <label class="fieldlabels" for="vehicle_year">Year: *</label>
                                                <input type="text" name="vehicle_year[]" id="vehicle_year" max="<?=date('Y')?>" placeholder="Year" maxlength="4" minlength="4" onkeypress="return isNumber(event)" />
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                                <label class="fieldlabels" for="vehicle_license_plate">License Plate: *</label>
                                                <input type="text" name="vehicle_license_plate[]" id="vehicle_license_plate" placeholder="License Plate" />
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                                <label class="fieldlabels" for="vehicle_registration_state">State Of Registration: *</label>
                                                <!-- <input type="text" name="vehicle_registration_state[]" id="vehicle_registration_state" placeholder="State Of Registration" /> -->
                                                <select name="vehicle_registration_state[]" id="vehicle_registration_state" class="form-control" required>
                                                    <option value="" selected>Select State</option>
                                                    <?php if($states){ foreach($states as $st){?>
                                                        <option value="<?=$st->name?>"><?=$st->name?></option>
                                                    <?php } }?>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                                <label class="fieldlabels" for="vehicle_color">Color: *</label>
                                                <input type="text" name="vehicle_color[]" id="vehicle_color" placeholder="Color" />
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                <a href="javascript:void(0);" class="btn btn-success btn-sm add_button_vehicle" title="Add Vehicle"><i class="fa fa-plus-circle"></i> Add Vehicle</a>
                                            </div>
                                        </div>
                                    <?php }?>
                                </div>
                                 <button type="submit" class="btn  theme-btn" style="display: flex;float: right;">Save & Next</button>
                            </form>
                        </div>
                        <div class="btn-group">
                            <input type="button" name="next" class="next action-button" value="Next" id="step4_next" style="display:none;" />
                            <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        </div>
                    </fieldset>
                    <fieldset style="<?=(($step == '4.0')?$showStyle:$hideStyle)?>">
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">PETS:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 5 - 10</h2>
                                </div>
                            </div>
                            <form id="applicationForm5" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="application_id" value="<?=$application_id?>">
                                <input type="hidden" name="step" value="5">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2" style="display: inline-flex;">
                                        <input type="checkbox" name="is_pet" id="is_pet" style="width: 20px;margin-right: 8px;">
                                        <label class="fieldlabels" for="is_pet" style="width: 90%;"> No pets</label>
                                    </div>
                                </div>
                                <div class="field_wrapper_pet">
                                    <?php if(count($type_of_pet)){ for($i=0;$i<count($type_of_pet);$i++){?>
                                        <div class="row mb-3" style="border: 1px solid #c1272d52;padding: 10px;border-radius: 5px;">
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                                <label class="fieldlabels" for="type_of_pet">Type Of Pet: *</label>
                                                <input type="text" name="type_of_pet[]" id="type_of_pet" placeholder="Type Of Pet" value="<?=$type_of_pet[$i]?>" />
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                                <label class="fieldlabels" for="pet_breed">Breed: *</label>
                                                <input type="text" name="pet_breed[]" id="pet_breed" placeholder="Breed" value="<?=$pet_breed[$i]?>" />
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                                <label class="fieldlabels" for="pet_age">Age: *</label>
                                                <input type="text" name="pet_age[]" id="pet_age" placeholder="Age" maxlength="2" minlength="1" onkeypress="return isNumber(event)" value="<?=$pet_age[$i]?>" />
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                                <label class="fieldlabels" for="pet_name">Name: *</label>
                                                <input type="text" name="pet_name[]" id="pet_name" placeholder="Name" value="<?=$pet_name[$i]?>" />
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                <a href="javascript:void(0);" class="btn btn-danger btn-sm remove_button_pet" title="Remove Pet"><i class="fa fa-minus-circle"></i> Remove Pet</a>
                                            </div>
                                        </div>
                                    <?php } } else {?>
                                        <div class="row mb-3" style="border: 1px solid #c1272d52;padding: 10px;border-radius: 5px;">
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                                <label class="fieldlabels" for="type_of_pet">Type Of Pet: *</label>
                                                <input type="text" name="type_of_pet[]" id="type_of_pet" placeholder="Type Of Pet" />
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                                <label class="fieldlabels" for="pet_breed">Breed: *</label>
                                                <input type="text" name="pet_breed[]" id="pet_breed" placeholder="Breed" />
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                                <label class="fieldlabels" for="pet_age">Age: *</label>
                                                <input type="text" name="pet_age[]" id="pet_age" placeholder="Age" maxlength="2" minlength="1" onkeypress="return isNumber(event)" />
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                                <label class="fieldlabels" for="pet_name">Name: *</label>
                                                <input type="text" name="pet_name[]" id="pet_name" placeholder="Name" />
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                <a href="javascript:void(0);" class="btn btn-success btn-sm add_button_pet" title="Add Pet"><i class="fa fa-plus-circle"></i> Add Pet</a>
                                            </div>
                                        </div>
                                    <?php }?>
                                </div>
                                <button type="submit" class="btn  theme-btn" style="display: flex;float: right;">Save & Next</button>
                            </form>
                        </div>
                        <div class="btn-group">
                            <input type="button" name="next" class="next action-button" value="Next" id="step5_next" style="display:none;" />
                            <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        </div>
                    </fieldset>
                    <fieldset style="<?=(($step == '5.0')?$showStyle:$hideStyle)?>">
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">ADDITIONAL NOTES:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 6 - 10</h2>
                                </div>
                            </div>
                            <form id="applicationForm6" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="application_id" value="<?=$application_id?>">
                                <input type="hidden" name="step" value="6">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                        <label class="fieldlabels">Drivers License or Other ID Card:</label>
                                        <input type="file" name="drivers_license" accept="image/*" required>
                                        <?php if($drivers_license != ''){?>
                                            <a href="<?=env('UPLOADS_URL').'user/'.$drivers_license?>" download="" class="badge badge-primary">View File</a>
                                        <?php }?>
                                    </div>
                                    <div class="col-lg-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                        <label class="fieldlabels" for="drivers_license_number">Drivers License or ID Number: *</label>
                                        <input type="text" name="drivers_license_number" id="drivers_license_number" placeholder="Drivers License or ID Number" value="<?=$drivers_license_number?>" required />
                                    </div>
                                    <div class="col-lg-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                        <label class="fieldlabels" for="drivers_license_state">Drivers License or ID State: *</label>
                                        <select name="drivers_license_state" id="drivers_license_state" class="form-control" required>
                                            <option value="" selected>Select State</option>
                                            <?php if($states){ foreach($states as $st){?>
                                                <option value="<?=$st->name?>" <?=(($st->name == $drivers_license_state)?'selected':'')?>><?=$st->name?></option>
                                            <?php } }?>
                                        </select>
                                    </div>
                                    <div class="col-lg-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                        <label class="fieldlabels" for="drivers_license_expiry">Drivers License or ID Expiration Date: *</label>
                                        <input type="date" name="drivers_license_expiry" id="drivers_license_expiry" placeholder="Drivers License or ID Expiration Date" min="<?=date('Y-m-d');?>" value="<?=$drivers_license_expiry?>" required />
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                        <label class="fieldlabels">Upload Their Paystubs For 3 months or 6 pay Periods:</label>
                                        <input type="file" name="paystubs" accept="image/*" required>
                                        <?php if($paystubs != ''){?>
                                            <a href="<?=env('UPLOADS_URL').'user/'.$paystubs?>" download="" class="badge badge-primary">View File</a>
                                        <?php }?>
                                    </div>
                                </div>
                                <button type="submit" class="btn  theme-btn" style="display: flex;float: right;">Save & Next</button>
                            </form>
                        </div>
                        <div class="btn-group">
                            <input type="button" name="next" class="next action-button" value="Next" id="step6_next" style="display:none;" />
                            <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        </div>
                    </fieldset>
                    <fieldset style="<?=(($step == '6.0')?$showStyle:$hideStyle)?>">
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">EMERGENCY CONTACT:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 7 - 10</h2>
                                </div>
                            </div>
                            <form id="applicationForm7" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="application_id" value="<?=$application_id?>">
                                <input type="hidden" name="step" value="7">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="emergency_contact_fname">Emergency Contact First Name</label>
                                        <input type="text" class="form-control" placeholder="Emergency Contact First Name" name="emergency_contact_fname" id="emergency_contact_fname" value="<?=$emergency_contact_fname?>" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="emergency_contact_lname">Emergency Contact Last Name</label>
                                        <input type="text" class="form-control" placeholder="Emergency Contact Last Name" name="emergency_contact_lname" id="emergency_contact_lname" value="<?=$emergency_contact_lname?>" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="emergency_contact_address">Emergency Contact Street Name</label>
                                        <input type="text" class="form-control" placeholder="Emergency Contact Street Name" name="emergency_contact_address" id="emergency_contact_address" value="<?=$emergency_contact_address?>" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="emergency_contact_street_name">Emergency Contact Apt/Ste/Unit</label>
                                        <input type="text" class="form-control" placeholder="Emergency Contact Apt/Ste/Unit" name="emergency_contact_street_name" id="emergency_contact_street_name" value="<?=$emergency_contact_street_name?>" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="emergency_contact_state">Emergency Contact State</label>
                                        <select name="emergency_contact_state" id="emergency_contact_state" class="form-control" required>
                                            <option value="" selected>Select State</option>
                                            <?php if($states){ foreach($states as $st){?>
                                                <option value="<?=$st->name?>" <?=(($st->name == $emergency_contact_state)?'selected':'')?>><?=$st->name?></option>
                                            <?php } }?>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="emergency_contact_zipcode">Emergency Contact Zipcode</label>
                                        <input type="text" class="form-control" placeholder="Emergency Contact Zipcode" name="emergency_contact_zipcode" id="emergency_contact_zipcode" value="<?=$emergency_contact_zipcode?>" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">
                                        <label class="fieldlabels" for="emergency_contact_relation">Emergency Contact Relation With Tenant</label>
                                        <select class="form-control" name="emergency_contact_relation" id="emergency_contact_relation" required>
                                            <option value="" selected>Emergency Contact Relation</option>
                                            <option value="Aunt" <?=(($emergency_contact_relation == 'Aunt')?'selected':'')?>>Aunt</option>
                                            <option value="Child" <?=(($emergency_contact_relation == 'Child')?'selected':'')?>>Child</option>
                                            <option value="Grandchild" <?=(($emergency_contact_relation == 'Grandchild')?'selected':'')?>>Grandchild</option>
                                            <option value="Grandparent" <?=(($emergency_contact_relation == 'Grandparent')?'selected':'')?>>Grandparent</option>
                                            <option value="Parent" <?=(($emergency_contact_relation == 'Parent')?'selected':'')?>>Parent</option>
                                            <option value="Sibling" <?=(($emergency_contact_relation == 'Sibling')?'selected':'')?>>Sibling</option>
                                            <option value="Spouse" <?=(($emergency_contact_relation == 'Spouse')?'selected':'')?>>Spouse</option>
                                            <option value="Uncle" <?=(($emergency_contact_relation == 'Uncle')?'selected':'')?>>Uncle</option>
                                            <option value="Other" <?=(($emergency_contact_relation == 'Other')?'selected':'')?>>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2" id="other-relation-section" style="display:none;">
                                        <label class="fieldlabels" for="emergency_contact_other_relation">Emergency Contact Other Relation With Tenant</label>
                                        <input type="text" class="form-control" placeholder="Emergency Contact Other Relation With Tenant" name="emergency_contact_other_relation" id="emergency_contact_other_relation" value="<?=$emergency_contact_other_relation?>">
                                    </div>
                                </div>
                               <button type="submit" class="btn  theme-btn" style="display: flex;float: right;">Save & Next</button>
                            </form>
                        </div>
                        <div class="btn-group">
                            <input type="button" name="next" class="next action-button" value="Next" id="step7_next" style="display:none;" />
                            <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        </div>
                    </fieldset>
                    <fieldset style="<?=((($step == '7.0') || ($step == '8.1') || ($step == '8.2'))?$showStyle:$hideStyle)?>">
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">CREATING SIGNATURE:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 8 - 10</h2>
                                </div>
                            </div>
                            <form id="applicationForm8_1" method="POST" style="border: 1px solid #c1272d52;padding: 10px;border-radius: 5px; margin-bottom: 10px; display: <?=(($step == '7.0')?'block':'none')?>;">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="application_id" value="<?=$application_id?>">
                                <input type="hidden" name="step" value="8.1">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                        <p>By typing your name, you are consenting to receive any communications (egally required or otherwise) and all changes to such communications electronically. In order to use the website, you must provide at your own expense an internet connected device that is compatible with the minimum requirements outlined below. You also confirm that your device will meet these specifications and requirements and will permit you to access and retain the communications electronically each time you access and use the website.</p>
                                            <p>System Requirements to Access Information</p>
                                            <p>To receive and view an electronic copy of the Communications you must have the following equipment and software:</p>
                                            <p>A personal computer or other device which is capable of accessing the Internet. Your access to this page verifies that your system/device meets these requirements</p>
                                            <p>An internet web browser which is capable of supporting 128-bit SSL. encrypted communications, JavaScript, and cookies. Your system or device must have 128-bit SSL. encryption software. Your access to this page verifies that your browser and encryption software/device meet these requirements.</p>
                                            <p>System Requirements to Retain Information</p>
                                            <p>To retain a copy, you must either have a printer connected to your personal computer or other device or, alternatively, the ability to save a copy through use of printing service or software such as Adobe Acrobat. I you would like to proceed using paper forms, please contact us.</p>
                                            <p>Withdrawal of Electronic Acceptance of Disclosures and Notices</p>
                                            <p>You can also contact us to withdraw your consent to receive any future communications electronically, Including</p>
                                            <p>If the system requirements described above change and you no longer possess the required system. If you withdraw your consent, we will terminate your use of the website and the services provided through website.</p>
                                            <p>Protecting your Signature</p>
                                            <p>To ensure that a signature is unique and to safeguard you against unauthorized use of your name, your IP address has been recorded and will be stored along with your electronic signature. All of your information will be encrypted and transmitted via our secure website. Computer technology is used to ensure that your signed documents are not altered after submission</p>
                                     </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2" style="display: inline-flex;">    
                                        <input type="checkbox" name="signing_declaration" id="signing_declaration" style="width: 3%;margin-top:20px;float:left;" <?=(($signing_declaration)?'checked':'')?> required>
                                        <label for="signing_declaration" style="margin-top: 15px;">I have read & agree to the above mentioned terms & conditions</label>
                                   </div>
                                </div>
                                <button type="submit" class="btn theme-btn" style="display: flex;margin: 0 auto;">Continue</button>
                            </form>
                            <form id="applicationForm8_2" method="POST" style="border: 1px solid #c1272d52;padding: 10px;border-radius: 5px; margin-bottom: 10px; display: <?=(($step == '8.1')?'block':'none')?>;">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="application_id" value="<?=$application_id?>">
                                <input type="hidden" name="step" value="8.2">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                                        <label class="fieldlabels">Name:</label>
                                        <input type="text" class="form-control" placeholder="Name" name="signing_name" id="signing_name" value="<?=$signing_name?>" required>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                                        <label class="fieldlabels">Initials:</label>
                                        <input type="text" class="form-control" placeholder="Initials" name="signing_initials" id="signing_initials" value="<?=$signing_initials?>" required>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                                        <label class="fieldlabels">Last 4 SSN:</label>
                                        <input type="text" class="form-control" placeholder="Last 4 SSN" name="signing_last4_ssn" id="signing_last4_ssn" value="<?=$signing_last4_ssn?>" maxlength="4" minlength="4" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn theme-btn" style="display: flex;margin: 0 auto;">Continue</button>
                            </form>
                            <form id="applicationForm8_3" method="POST" style="border: 1px solid #c1272d52;padding: 10px;border-radius: 5px; margin-bottom: 10px; display: <?=(($step >= '8.2')?'block':'none')?>;">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="application_id" value="<?=$application_id?>">
                                <input type="hidden" name="step" value="8.3">
                                <input type="hidden" name="signature_type" id="signature_type" value="AUTOIMAGE">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                        <label class="fieldlabels">Signature:</label>

                                        <div class="auto-form-element">
                                            <canvas id="myCanvas1" width="250" height="100" class="signature" style="border:1px solid #d3d3d3;">
                                            </canvas>
                                            <div id="auto-sig">
                                            </div>
                                            <input type='button' id='auto_click_sig' value='Generate' class="btn btn-warning btn-sm">
                                        </div>

                                        <!-- Signature -->
                                        <div id="signature" class="create-form-element" style='display: none;'>
                                            <canvas id="signature-pad" class="signature-pad" width="300px" height="200px"></canvas>
                                        </div><br/>

                                        <div class="upload-form-element" style='display: none;'>
                                            <input type="file" id="sigUpload" accept="image/*">
                                        </div>
                                         
                                        <input type='button' id='click' value='Preview' class="btn btn-warning btn-sm create-form-element" style="display:none;"><br/>

                                        <textarea id='output' name="signature" style="display:none;" required></textarea><br/>
                                        <!-- Preview image -->
                                        <img src='' id='sign_prev' style='display: none;' />
                                        <?php if($signature != ''){?>
                                            <img src="<?=env('UPLOADS_URL').'user/'.$signature?>" id='sign_prev' />
                                        <?php }?>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                        <label class="fieldlabels">Initials:</label>

                                        <div class="auto-form-element">
                                            <canvas id="myCanvas2" width="250" height="100" style="border:1px solid #d3d3d3;">
                                            </canvas>
                                            <div id="auto-ini">
                                            </div>
                                            <input type='button' id='auto_click_initials' value='Generate' class="btn btn-warning btn-sm">
                                        </div>

                                        <!-- Signature -->
                                        <div id="signature" class="create-form-element" style='display: none;'>
                                            <canvas id="signature-pad-initials" class="signature-pad" width="300px" height="200px"></canvas>
                                        </div><br/>

                                        <div class="upload-form-element" style='display: none;'>
                                            <input type="file" id="iniUpload" accept="image/*">
                                        </div>
                                         
                                        <input type='button' id='click_initials' value='Preview' class="btn btn-warning btn-sm create-form-element" style="display:none;"><br/>

                                        <textarea id='output_initials' name="initials" style="display:none;" required></textarea><br/>
                                        <!-- Preview image -->
                                        <img src='' id='sign_prev_initials' style='display: none;' />
                                        <?php if($initials != ''){?>
                                            <img src="<?=env('UPLOADS_URL').'user/'.$initials?>" id='sign_prev_initials' />
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mb-2">
                                        <a href="javascript:void(0);" class="btn btn-primary btn-sm" id="automaticLink" onclick="showAutomaticForm();" style="display:none;">Click For Signature & Initials Automatic</a>
                                        <a href="javascript:void(0);" class="btn btn-primary btn-sm" id="uploadLink" onclick="showUploadForm();">Click For Signature & Initials Uploads</a>
                                        <a href="javascript:void(0);" class="btn btn-primary btn-sm" id="createLink" onclick="showCreateForm();">Click For Signature & Initials Create</a>
                                    </div>
                                </div>
                                <button type="submit" class="btn theme-btn" id="btn-signature-confirm" style="display: none;margin: 0 auto;">Confirm</button>
                            </form>
                        </div>
                        <div class="btn-group">
                            <input type="button" name="next" class="next action-button" value="Next" id="step8_next" style="display:none;" />
                            <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        </div>
                    </fieldset>
                    <fieldset style="<?=(($step == '8.3')?$showStyle:$hideStyle)?>">
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">SIGNING DOCUMENTS:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 9 - 10</h2>
                                </div>
                            </div>
                            <form id="applicationForm9" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="application_id" value="<?=$application_id?>">
                                <input type="hidden" name="step" value="9">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2" style="display: inline-flex;align-items: start;">
                                        <input type="checkbox" name="signing_documents1" id="signing_documents1" style="width: 20px;height:20px;margin-right:10px" <?=(($signing_documents1)?'checked':'')?> required>
                                        <label class="fieldlabels" for="signing_documents1" style="width: 90%;"> I certify I read and understand the notice regarding background Investigation</label>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2" style="display: inline-flex;align-items: start;">
                                        <input type="checkbox" name="signing_documents2" id="signing_documents2" style="width: 20px;height:20px;margin-right:10px" <?=(($signing_documents2)?'checked':'')?> required>
                                        <label class="fieldlabels" for="signing_documents2" style="width: 90%;"> Accuracy of Information: I affirm that all information I have provided in this application is true, complete, and correct to the best of my knowledge and belief. I understand that any falsification, misrepresentation, or omission of facts may result in the denial of my application or, if discovered after approval, in the revocation of any agreements or privileges granted based on this application.</label>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2" style="display: inline-flex;align-items: start;">
                                        <input type="checkbox" name="signing_documents3" id="signing_documents3" style="width: 20px;height:20px;margin-right:10px" <?=(($signing_documents3)?'checked':'')?> required>
                                        <label class="fieldlabels" for="signing_documents3" style="width: 90%;"> Identity Confirmation: I certify that I am the individual about whom the information in this application pertains. I understand that impersonation or providing information about another individual as if it were my own is unlawful and may have legal consequences.</label>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2" style="display: inline-flex;align-items: start;">
                                        <input type="checkbox" name="signing_documents4" id="signing_documents4" style="width: 20px;height:20px;margin-right:10px" <?=(($signing_documents4)?'checked':'')?> required>
                                        <label class="fieldlabels" for="signing_documents4" style="width: 90%;"> Agreement to Terms: I agree to abide by the terms and conditions as set forth by this website and understand that these terms may be updated or changed. It is my responsibility to stay informed about any such changes</label>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2" style="display: inline-flex;align-items: start;">
                                        <input type="checkbox" name="signing_documents5" id="signing_documents5" style="width: 20px;height:20px;margin-right:10px" <?=(($signing_documents5)?'checked':'')?> required>
                                        <label class="fieldlabels" for="signing_documents5" style="width: 90%;"> Electronic Signature: I understand that typing my name below constitutes a legal signature confirming that I acknowledge and agree to the above Terms of Agreement.</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn  theme-btn" style="display: flex;float: right;">Save & Next</button>
                            </form>
                        </div>
                        <div class="btn-group">
                            <input type="button" name="next" class="next action-button" value="Submit" id="step9_next" style="display:none;" />
                            <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        </div>
                    </fieldset>
                    <fieldset style="<?=(($step == '9.0')?$showStyle:$hideStyle)?>">
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Finish:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 10 - 10</h2>
                                </div>
                            </div>
                            <br><br>
                            <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2>
                            <br>
                            <div class="row justify-content-center">
                                <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                            </div>
                            <br><br>
                            <div class="row justify-content-center">
                                <div class="col-7 text-center">
                                    <h5 class="purple-text text-center">You Have Successfully Submitted Application. We Will Contact You Soon !!!</h5>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4" style="display: flex;justify-content: center;">
                            <a href="<?=url('user/inquiry-list')?>" class="action-button-previous">Go To Inquiry List</a>
                            <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
</div>
<!-- / Content -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $('input[name="is_pet"]').click(function() {
       if($('input[name="is_pet"]:checked').val()) {
           $(".field_wrapper_pet").hide();
       } else {
           $(".field_wrapper_pet").show();
       }
    });
    $('input[name="is_vehicle"]').click(function() {
       if($('input[name="is_vehicle"]:checked').val()) {
           $(".field_wrapper_vehicle").hide();
       } else {
           $(".field_wrapper_vehicle").show();
       }
    });
    $(document).ready(function(){
        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;
    
        setProgressBar(current);
    
        $(".next").click(function(){
    
            current_fs = $(this).parent().parent();
            next_fs = $(this).parent().parent().next();
        
            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        
            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
            step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;
        
            current_fs.css({
            'display': 'none',
            'position': 'relative'
            });
            next_fs.css({'opacity': opacity});
            },
            duration: 500
            });
            setProgressBar(++current);
        });
    
        $(".previous").click(function(){
    
            current_fs = $(this).parent().parent();
            previous_fs = $(this).parent().parent().prev();
        
            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        
            //show the previous fieldset
            previous_fs.show();
        
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
            step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;
        
            current_fs.css({
            'display': 'none',
            'position': 'relative'
            });
            previous_fs.css({'opacity': opacity});
            },
            duration: 500
            });
            setProgressBar(--current);
        });
    
        function setProgressBar(curStep){
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
        .css("width",percent+"%")
        }
    
        $(".submit").click(function(){
        return false;
        })
    
    });
    $(function(){
        $('#primary_email').on('blur', function(){
            var primary_email = $('#primary_email').val();
            if(primary_email == ''){
                $('#primary_email').css("border-color", "red");
                return false;
            } else {
                if (IsEmail(primary_email) === false) {
                    $('#primary_email').css("border-color", "red");
                    return false;
                }
                else{
                    $('#primary_email').css("border-color", "green");
                    return true;
                }
            }
        });

        var current_residence_duration = $('#current_residence_duration').val();
        if(current_residence_duration == 'Less than one year'){
            $('#previous_residence').show();
            $('#previous_address').attr('required', true);
            $('#previous_street_name').attr('required', true);
            $('#previous_city').attr('required', true);
            $('#previous_state').attr('required', true);
            $('#previous_zipcode').attr('required', true);
            $('#previous_residence_duration').attr('required', true);
            $('#previous_landlord_name').attr('required', true);
            $('#previous_landlord_phone').attr('required', true);
        } else {
            $('#previous_residence').hide();
            $('#previous_address').attr('required', false);
            $('#previous_street_name').attr('required', false);
            $('#previous_city').attr('required', false);
            $('#previous_state').attr('required', false);
            $('#previous_zipcode').attr('required', false);
            $('#previous_residence_duration').attr('required', false);
            $('#previous_landlord_name').attr('required', false);
            $('#previous_landlord_phone').attr('required', false);
        }

        $('#current_residence_duration').on('change', function(){
            var current_residence_duration = $('#current_residence_duration').val();
            if(current_residence_duration == 'Less than one year'){
                $('#previous_residence').show();
                $('#previous_address').attr('required', true);
                $('#previous_street_name').attr('required', true);
                $('#previous_city').attr('required', true);
                $('#previous_state').attr('required', true);
                $('#previous_zipcode').attr('required', true);
                $('#previous_residence_duration').attr('required', true);
                $('#previous_landlord_name').attr('required', true);
                $('#previous_landlord_phone').attr('required', true);
            } else {
                $('#previous_residence').hide();
                $('#previous_address').attr('required', false);
                $('#previous_street_name').attr('required', false);
                $('#previous_city').attr('required', false);
                $('#previous_state').attr('required', false);
                $('#previous_zipcode').attr('required', false);
                $('#previous_residence_duration').attr('required', false);
                $('#previous_landlord_name').attr('required', false);
                $('#previous_landlord_phone').attr('required', false);
            }
        });


        var employment_duration = $('#employment_duration').val();
        if(employment_duration == 'Less than 3 months'){
            $('#previous-employer').show();
            $('#previous_employer_name').attr('required', true);
            $('#previous_employer_address').attr('required', true);
            $('#previous_job_title').attr('required', true);
            $('#previous_employment_duration').attr('required', true);
            $('#previous_supervisor_name').attr('required', true);
            $('#previous_work_phone').attr('required', true);
        } else {
            $('#previous-employer').hide();
            $('#previous_employer_name').attr('required', false);
            $('#previous_employer_address').attr('required', false);
            $('#previous_job_title').attr('required', false);
            $('#previous_employment_duration').attr('required', false);
            $('#previous_supervisor_name').attr('required', false);
            $('#previous_work_phone').attr('required', false);
        }

        $('#employment_duration').on('change', function(){
            var employment_duration = $('#employment_duration').val();
            if(employment_duration == 'Less than 3 months'){
                $('#previous-employer').show();
                $('#previous_employer_name').attr('required', true);
                $('#previous_employer_address').attr('required', true);
                $('#previous_job_title').attr('required', true);
                $('#previous_employment_duration').attr('required', true);
                $('#previous_supervisor_name').attr('required', true);
                $('#previous_work_phone').attr('required', true);
            } else {
                $('#previous-employer').hide();
                $('#previous_employer_name').attr('required', false);
                $('#previous_employer_address').attr('required', false);
                $('#previous_job_title').attr('required', false);
                $('#previous_employment_duration').attr('required', false);
                $('#previous_supervisor_name').attr('required', false);
                $('#previous_work_phone').attr('required', false);
            }
        });

        $('#emergency_contact_relation').on('change', function(){
            var emergency_contact_relation = $('#emergency_contact_relation').val();
            if(emergency_contact_relation == 'Other'){
                $('#other-relation-section').show();
                $('#emergency_contact_other_relation').prop('required', true);
            } else {
                $('#other-relation-section').hide();
                $('#emergency_contact_other_relation').prop('required', false);
            }
        });
    })
</script>
<script>
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var x = 1; //Initial field counter is 1
        
        // Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){
                var fieldHTML = '<div class="row mb-3" style="border: 1px solid #c1272d52;padding: 10px;border-radius: 5px;">\
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">\
                                <label class="fieldlabels" for="first_name">First Name: *</label>\
                                <input type="text" name="first_name[]" id="first_name" placeholder="First Name" required />\
                            </div>\
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">\
                                <label class="fieldlabels" for="last_name">Last Name: *</label>\
                                <input type="text" name="last_name[]" id="last_name" placeholder="Last Name" required />\
                            </div>\
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">\
                                <label class="fieldlabels" for="dob">Date of Birth: *</label>\
                                <input type="date" name="dob[]" id="dob" placeholder="Date of Birth" max="<?=$maxDOB?>" required />\
                            </div>\
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">\
                                <label class="fieldlabels" for="ssn">Social Secuirity Number: *</label>\
                                <input type="text" name="ssn[]" id="ssn" placeholder="Social Secuirity Number" minlength="9" maxlength="9" required />\
                            </div>\
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">\
                                <label class="fieldlabels" for="email">Email: *</label>\
                                <input type="email" name="email[]" id="primary_email" class="primary_email" placeholder="Email" required />\
                            </div>\
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">\
                                <label class="fieldlabels" for="phone">Phone Number: *</label>\
                                <input type="text" name="phone[]" id="phone'+x+'" placeholder="Phone Number" minlength="10" maxlength="10" onkeypress="return isNumber(event)" onblur="return formatPhone(this.value, \'phone'+x+'\')" required />\
                            </div>\
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">\
                                <label class="fieldlabels" for="alternate_phone">Alternate Phone:</label>\
                                <input type="text" name="alternate_phone[]" id="alternate_phone'+x+'" minlength="10" maxlength="10" onkeypress="return isNumber(event)" placeholder="Alternate Phone" onblur="return formatPhone(this.value, \'alternate_phone'+x+'\')" />\
                            </div>\
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">\
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm remove_button" title="Remove Tenant"><i class="fa fa-minus-circle"></i> Remove Tenant</a>\
                            </div>\
                        </div>';
                x++; //Increase field counter
                $(wrapper).append(fieldHTML); //Add field html
            }else{
                alert('A maximum of '+maxField+' fields are allowed to be added. ');
            }
        });
        
        // Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').parent('div').remove(); //Remove field html
            x--; //Decrease field counter
        });
    });
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button_pet'); //Add button selector
        var wrapper = $('.field_wrapper_pet'); //Input field wrapper
        var fieldHTML = '<div class="row mb-3" style="border: 1px solid #c1272d52;padding: 10px;border-radius: 5px;">\
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">\
                                <label class="fieldlabels" for="type_of_pet">Type Of Pet: *</label>\
                                <input type="text" name="type_of_pet[]" id="type_of_pet" placeholder="Type Of Pet" />\
                            </div>\
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">\
                                <label class="fieldlabels" for="pet_breed">Breed: *</label>\
                                <input type="text" name="pet_breed[]" id="pet_breed" placeholder="Breed" />\
                            </div>\
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">\
                                <label class="fieldlabels" for="pet_age">Age: *</label>\
                                <input type="text" name="pet_age[]" id="pet_age" placeholder="Age" maxlength="2" minlength="1" onkeypress="return isNumber(event)" />\
                            </div>\
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">\
                                <label class="fieldlabels" for="pet_name">Name: *</label>\
                                <input type="text" name="pet_name[]" id="pet_name" placeholder="Name" />\
                            </div>\
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">\
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm remove_button_pet" title="Remove Pet"><i class="fa fa-minus-circle"></i> Remove Pet</a>\
                            </div>\
                        </div>';
        var x = 1; //Initial field counter is 1
        
        // Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increase field counter
                $(wrapper).append(fieldHTML); //Add field html
            }else{
                alert('A maximum of '+maxField+' fields are allowed to be added. ');
            }
        });
        
        // Once remove button is clicked
        $(wrapper).on('click', '.remove_button_pet', function(e){
            e.preventDefault();
            $(this).parent('div').parent('div').remove(); //Remove field html
            x--; //Decrease field counter
        });
    });
    $(document).ready(function(){
        var maxYear = '<?=date('Y')?>';
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button_vehicle'); //Add button selector
        var wrapper = $('.field_wrapper_vehicle'); //Input field wrapper
        var fieldHTML = '<div class="row mb-3" style="border: 1px solid #c1272d52;padding: 10px;border-radius: 5px;">\
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">\
                                <label class="fieldlabels" for="vehicle_make">Make: *</label>\
                                <input type="text" name="vehicle_make[]" id="vehicle_make" placeholder="Make" />\
                            </div>\
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">\
                                <label class="fieldlabels" for="vehicle_model">Model: *</label>\
                                <input type="text" name="vehicle_model[]" id="vehicle_model" placeholder="Model" />\
                            </div>\
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">\
                                <label class="fieldlabels" for="vehicle_year">Year: *</label>\
                                <input type="text" name="vehicle_year[]" id="vehicle_year" max="'+maxYear+'" placeholder="Year" maxlength="4" minlength="4" onkeypress="return isNumber(event)" />\
                            </div>\
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">\
                                <label class="fieldlabels" for="vehicle_license_plate">License Plate: *</label>\
                                <input type="text" name="vehicle_license_plate[]" id="vehicle_license_plate" placeholder="License Plate" />\
                            </div>\
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">\
                                <label class="fieldlabels" for="vehicle_registration_state">State Of Registration: *</label>\
                                <select name="vehicle_registration_state" id="vehicle_registration_state" class="form-control" required>\
                                    <option value="" selected>Select State</option>\
                                    <?php if($states){ foreach($states as $st){?>
                                        <option value="<?=$st->name?>"><?=$st->name?></option>\
                                    <?php } }?>
                                </select>\
                            </div>\
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  mb-2">\
                                <label class="fieldlabels" for="vehicle_color">Color: *</label>\
                                <input type="text" name="vehicle_color[]" id="vehicle_color" placeholder="Color" />\
                            </div>\
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">\
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm remove_button_vehicle" title="Remove Vehicle"><i class="fa fa-minus-circle"></i> Remove Vehicle</a>\
                            </div>\
                        </div>';
        var x = 1; //Initial field counter is 1
        
        // Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increase field counter
                $(wrapper).append(fieldHTML); //Add field html
            }else{
                alert('A maximum of '+maxField+' fields are allowed to be added. ');
            }
        });
        
        // Once remove button is clicked
        $(wrapper).on('click', '.remove_button_vehicle', function(e){
            e.preventDefault();
            $(this).parent('div').parent('div').remove(); //Remove field html
            x--; //Decrease field counter
        });
    });
</script>
<script type="text/javascript">
    $("#applicationForm1").submit(function (e) {
        e.preventDefault();
        var base_url = '<?=url('/')?>';
        let flag = 1;
        if (flag) {
            if (flag) {
                var formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: base_url + "/user/application-form-1",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "JSON",
                    beforeSend: function () {
                        $('.preloder').show();
                    },
                    success: function (res) {
                        $('.preloder').hide();
                        $('#succ-msg').show();
                        $('#succ-msg').text(res.message);
                        $("#succ-msg").delay(3200).fadeOut(300);
                        $('#form2').addClass('active');
                        $("#step1_next").click();
                        // $("#step1_next").show();
                    }
                });
            }
        }
    });
    $("#applicationForm2").submit(function (e) {
        e.preventDefault();
        var base_url = '<?=url('/')?>';
        let flag = 1;
        if (flag) {
            if (flag) {
                var formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: base_url + "/user/application-form-2",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "JSON",
                    beforeSend: function () {
                        $('.preloder').show();
                    },
                    success: function (res) {
                        $('.preloder').hide();
                        $('#succ-msg').show();
                        $('#succ-msg').text(res.message);
                        $("#succ-msg").delay(3200).fadeOut(300);
                        $('#form3').addClass('active');
                        $("#step2_next").click();
                        // $("#step2_next").show();
                    }
                });
            }
        }
    });
    $("#applicationForm3").submit(function (e) {
        e.preventDefault();
        var base_url = '<?=url('/')?>';
        let flag = 1;
        if (flag) {
            if (flag) {
                var formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: base_url + "/user/application-form-3",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "JSON",
                    beforeSend: function () {
                        $('.preloder').show();
                    },
                    success: function (res) {
                        $('.preloder').hide();
                        $('#succ-msg').show();
                        $('#succ-msg').text(res.message);
                        $("#succ-msg").delay(3200).fadeOut(300);
                        $('#form4').addClass('active');
                        $("#step3_next").click();
                        // $("#step3_next").show();
                    }
                });
            }
        }
    });
    $("#applicationForm4").submit(function (e) {
        e.preventDefault();
        var base_url = '<?=url('/')?>';
        let flag = 1;
        if (flag) {
            if (flag) {
                var formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: base_url + "/user/application-form-4",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "JSON",
                    beforeSend: function () {
                        $('.preloder').show();
                    },
                    success: function (res) {
                        $('.preloder').hide();
                        $('#succ-msg').show();
                        $('#succ-msg').text(res.message);
                        $("#succ-msg").delay(3200).fadeOut(300);
                        $('#form5').addClass('active');
                        $("#step4_next").click();
                        // $("#step4_next").show();
                    }
                });
            }
        }
    });
    $("#applicationForm5").submit(function (e) {
        e.preventDefault();
        var base_url = '<?=url('/')?>';
        let flag = 1;
        if (flag) {
            if (flag) {
                var formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: base_url + "/user/application-form-5",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "JSON",
                    beforeSend: function () {
                        $('.preloder').show();
                    },
                    success: function (res) {
                        $('.preloder').hide();
                        $('#succ-msg').show();
                        $('#succ-msg').text(res.message);
                        $("#succ-msg").delay(3200).fadeOut(300);
                        $('#form6').addClass('active');
                        $("#step5_next").click();
                        // $("#step5_next").show();
                    }
                });
            }
        }
    });
    $("#applicationForm6").submit(function (e) {
        e.preventDefault();
        var base_url = '<?=url('/')?>';
        let flag = 1;
        if (flag) {
            if (flag) {
                var formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: base_url + "/user/application-form-6",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "JSON",
                    beforeSend: function () {
                        $('.preloder').show();
                    },
                    success: function (res) {
                        $('.preloder').hide();
                        $('#succ-msg').show();
                        $('#succ-msg').text(res.message);
                        $("#succ-msg").delay(3200).fadeOut(300);
                        $('#form7').addClass('active');
                        $("#step6_next").click();
                        // $("#step6_next").show();
                    }
                });
            }
        }
    });
    $("#applicationForm7").submit(function (e) {
        e.preventDefault();
        var base_url = '<?=url('/')?>';
        let flag = 1;
        if (flag) {
            if (flag) {
                var formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: base_url + "/user/application-form-7",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "JSON",
                    beforeSend: function () {
                        $('.preloder').show();
                    },
                    success: function (res) {
                        $('.preloder').hide();
                        $('#succ-msg').show();
                        $('#succ-msg').text(res.message);
                        $("#succ-msg").delay(3200).fadeOut(300);
                        $('#form8').addClass('active');
                        $("#step7_next").click();
                        $("#applicationForm8_1").show();
                        // $("#step7_next").show();
                    }
                });
            }
        }
    });
    $("#applicationForm8_1").submit(function (e) {
        e.preventDefault();
        var base_url = '<?=url('/')?>';
        let flag = 1;
        if (flag) {
            if (flag) {
                var formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: base_url + "/user/application-form-8-1",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "JSON",
                    beforeSend: function () {
                        $('.preloder').show();
                    },
                    success: function (res) {
                        $('.preloder').hide();
                        // $('#form9').addClass('active');
                        $('#succ-msg').show();
                        $('#succ-msg').text(res.message);
                        $("#succ-msg").delay(3200).fadeOut(300);
                        $("#applicationForm8_1").hide();
                        $("#applicationForm8_2").show();
                        $("#applicationForm8_1").hide();
                    }
                });
            }
        }
    });
    $("#applicationForm8_2").submit(function (e) {
        e.preventDefault();
        var base_url = '<?=url('/')?>';
        let flag = 1;
        if (flag) {
            if (flag) {
                var formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: base_url + "/user/application-form-8-2",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "JSON",
                    beforeSend: function () {
                        $('.preloder').show();
                    },
                    success: function (res) {
                        $('.preloder').hide();
                        // $('#form9').addClass('active');
                        $('#succ-msg').show();
                        $('#succ-msg').text(res.message);
                        $("#succ-msg").delay(3200).fadeOut(300);
                        $("#applicationForm8_1").hide();
                        $("#applicationForm8_2").hide();
                        $("#applicationForm8_3").show();
                        location.reload();
                    }
                });
            }
        }
    });
    $("#applicationForm8_3").submit(function (e) {
        e.preventDefault();
        var base_url = '<?=url('/')?>';
        let flag = 1;
        if (flag) {
            if (flag) {
                var formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: base_url + "/user/application-form-8-3",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "JSON",
                    beforeSend: function () {
                        $('.preloder').show();
                    },
                    success: function (res) {
                        $('.preloder').hide();
                        // $('#form9').addClass('active');
                        $('#succ-msg').show();
                        $('#succ-msg').text(res.message);
                        $("#succ-msg").delay(3200).fadeOut(300);
                        $("#applicationForm8_1").hide();
                        $("#applicationForm8_2").hide();
                        $("#applicationForm8_3").show();
                        $("#step8_next").click();
                    }
                });
            }
        }
    });
    $("#applicationForm9").submit(function (e) {
        e.preventDefault();
        var base_url = '<?=url('/')?>';
        let flag = 1;
        if (flag) {
            if (flag) {
                var formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: base_url + "/user/application-form-9",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "JSON",
                    beforeSend: function () {
                        $('.preloder').show();
                    },
                    success: function (res) {
                        $('.preloder').hide();
                        $('#succ-msg').show();
                        $('#succ-msg').text(res.message);
                        $("#succ-msg").delay(3200).fadeOut(300);
                        $('#form10').addClass('active');
                        $("#step9_next").click();
                        // $("#step9_next").show();
                    }
                });
            }
        }
    });
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>
<script type="text/javascript">
    function IsEmail(email) {
        if (!email.trim().includes('@') || email.trim().includes(',')) {
            return false;
        }
        else {
            return true;
        }
    }
    function formatPhone(text, id){
        text = text.replace(/(\d{3})(\d{3})(\d{4})/, "($1)-$2-$3");
        // return text;
        $('#' + id).val(text);
    }
</script>
<script src="<?=env('FRONT_ASSETS_URL')?>/signature/signature_pad.js"></script>
<script>
    $(document).ready(function() {
        var signaturePad = new SignaturePad(document.getElementById('signature-pad'));
        $('#click').click(function(){
            var data = signaturePad.toDataURL('image/png');
            $('#output').val(data);
            $("#sign_prev").show();
            $("#sign_prev").attr("src",data);
            // Open image in the browser
            //window.open(data);
            if(($('#output').val() != '') && ($('#output_initials').val() != '')){
                $('#btn-signature-confirm').show();
            }
        });

        var signaturePad2 = new SignaturePad(document.getElementById('signature-pad-initials'));
        $('#click_initials').click(function(){
            var data = signaturePad2.toDataURL('image/png');
            $('#output_initials').val(data);
            $("#sign_prev_initials").show();
            $("#sign_prev_initials").attr("src",data);
            // Open image in the browser
            //window.open(data);
            if(($('#output').val() != '') && ($('#output_initials').val() != '')){
                $('#btn-signature-confirm').show();
                $('#btn-signature-confirm').css('display', 'flex');
            }
        });
    })
</script>
<script type="text/javascript">
    function showUploadForm(){
        $('.create-form-element').hide();
        $('.upload-form-element').show();
        $('#sigUpload').prop('required', true);
        $('#iniUpload').prop('required', true);
        $('#sign_prev').show();
        $('#sign_prev_initials').show();
        $('#signature_type').val('UPLOAD');
        $('.auto-form-element').hide();

        $('#createLink').show();
        $('#uploadLink').hide();
        $('#automaticLink').show();
    }
    function showCreateForm(){
        $('.create-form-element').show();
        $('.upload-form-element').hide();
        $('#sigUpload').prop('required', false);
        $('#iniUpload').prop('required', false);
        $('#sign_prev').hide();
        $('#sign_prev_initials').hide();
        $('#signature_type').val('CREATE');
        $('.auto-form-element').hide();

        $('#uploadLink').show();
        $('#createLink').hide();
        $('#automaticLink').show();
    }
    function showAutomaticForm(){
        $('.create-form-element').hide();
        $('.upload-form-element').hide();
        $('.auto-form-element').show();
        $('#sigUpload').prop('required', false);
        $('#iniUpload').prop('required', false);
        $('#sign_prev').hide();
        $('#sign_prev_initials').hide();
        $('#signature_type').val('AUTOIMAGE');

        $('#uploadLink').hide();
        $('#createLink').show();
        $('#automaticLink').show();
    }


    function readFile1() {
        if (!this.files || !this.files[0]) return;
        const FR = new FileReader();
        FR.addEventListener("load", function(evt) {
            document.querySelector("#sign_prev").src         = evt.target.result;
            document.querySelector("#output").textContent = evt.target.result;
        });
        FR.readAsDataURL(this.files[0]);
    }
    document.querySelector("#sigUpload").addEventListener("change", readFile1);

    function readFile2() {
        if (!this.files || !this.files[0]) return;
        const FR = new FileReader();
        FR.addEventListener("load", function(evt) {
            document.querySelector("#sign_prev_initials").src         = evt.target.result;
            document.querySelector("#output_initials").textContent = evt.target.result;
        });
        FR.readAsDataURL(this.files[0]);
        $('#btn-signature-confirm').show();
    }
    document.querySelector("#iniUpload").addEventListener("change", readFile2);


    function drawHelloWorld1(canvas) {
        const ctx = canvas.getContext("2d");
        
        // Draw the background
        ctx.rect(0, 0, 500, 100);
        ctx.fillStyle = "#FFF";
        ctx.fill();

        var signing_name = $('#signing_name').val();
     
        // Draw the text
        ctx.font = "20px willow bloom";
        ctx.fillStyle = "#2e3192";
        ctx.fillText(signing_name, 50, 60);
    }
    const canvas = document.getElementById('myCanvas1');
    drawHelloWorld1(canvas);
    const imgElement = document.createElement('img');
    imgElement.src = canvas.toDataURL('image/jpeg');
    // document.getElementById('auto-sig').appendChild(imgElement);

    function drawHelloWorld2(canvas) {
        const ctx = canvas.getContext("2d");
        
        // Draw the background
        ctx.rect(0, 0, 500, 100);
        ctx.fillStyle = "#FFF";
        ctx.fill();

        var signing_initials = $('#signing_initials').val();
     
        // Draw the text
        ctx.font = "20px willow bloom";
        ctx.fillStyle = "#2e3192";
        ctx.fillText(signing_initials, 50, 60);
    }
    const canvas2 = document.getElementById('myCanvas2');
    drawHelloWorld2(canvas2);
    const imgElement2 = document.createElement('img');
    imgElement2.src = canvas2.toDataURL('image/jpeg');
    // document.getElementById('auto-sig').appendChild(imgElement2);

    $(document).ready(function() {
        const canvas11 = document.getElementById('myCanvas1');
        $('#auto_click_sig').click(function(){
            var data = canvas11.toDataURL('image/png');
            $('#output').val(data);
            if(($('#output').val() != '') && ($('#output_initials').val() != '')){
                $('#btn-signature-confirm').show();
            }
        });
        const canvas22 = document.getElementById('myCanvas2');
        $('#auto_click_initials').click(function(){
            var data = canvas22.toDataURL('image/png');
            $('#output_initials').val(data);
            if(($('#output').val() != '') && ($('#output_initials').val() != '')){
                $('#btn-signature-confirm').show();
            }
        });
    });
</script><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/pages/user/personal-info.blade.php ENDPATH**/ ?>