<?php
use App\Models\GeneralSetting;
use App\Helpers\Helper;
$controllerRoute = $module['controller_route'];
// echo $page_header; die;

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<style type="text/css">
    .choices__list--multiple .choices__item {
        background-color: #d81636;
        border: 1px solid #d81636;
    }
    .error { color: red; }
    .badge {
        display: inline-flex;
        align-items: center;
        margin: 2px;
        background-color: #132144;
    }
    .badge .remove {
        cursor: pointer;
        margin-left: 5px;
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
            // Helper::pr($row);

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
            $first_name = $row->author_name;                               
            $email = $row->author_email;          
            $for_publication_name = $row->for_publication_name;          
            $titleId = $row->title;  
            $pronounId = $row->author_pronoun;
            $news_categoryId = $row->sub_category;
            $creative_Work = $row->new_title;  
            $orginal_work = $row->orginal_work;        
            $copyright = $row->copyright; 
            $subtitle = $row->sub_title;           
            $state = $row->state;
            $city = $row->city;
            $organization_name = $row->organization_name;
            $organization_website = $row->organization_website;
            $ecosystem_affiliationId = (($row->author_affiliation != '')?json_decode($row->author_affiliation):[]);
            $indigenous_affiliation = $row->indigenous_affiliation;
            $expertise_areaId = (($row->expertise_area != '')?json_decode($row->expertise_area):[]);
            $author_short_bio = $row->author_short_bio;
            $bio_long = $row->bio_long;            
            $new_title = $row->new_title;            
            $creative_work_SRN = $row->creative_work_SRN;
            $creative_work_DOI = $row->creative_work_DOI;
            $author_name = $row->author_name; 
            $author_short_bio = $row->author_short_bio; 
            // $pronounId = $row->author_pronoun;  
            // $author_affiliationId = $selected_ecosystem_affiliation;
            $indigenous_affiliation = $row->indigenous_affiliation;            
            $countryId = $row->country;
            $organization_name = $row->organization_name;
            $cover_image = $row->cover_image;
            $cover_image_caption = $row->cover_image_caption;
            $others_image = $row->others_image;
            $long_desc = $row->long_desc;
            $keywords = $row->keywords;
            $short_desc = $row->short_desc;
            $is_feature = $row->is_feature;
            $is_popular = $row->is_popular;            
            $media = $row->media;     
            $video_url = $row->video_url;  
            $videoId = $row->videoId;     
        } else {
            $author_classification ='';
            $co_authors = '';
            $co_authors_position = '';
            $co_author_name = '';
            $co_author_short_bio = '';
            $ecosystem_affiliationId = [];
            $first_name = '';
            $for_publication_name = '';  
            $titleId = '';
            $news_categoryId = '';
            $creative_Work = '';
            $subtitle = '';
            $state = '';
            $city = '';
            $organization_website = '';
            $expertise_areaId = [];            
            $new_title = '';                  
            $creative_work_SRN = '';
            $creative_work_DOI = '';
            // $author_name = '';
            $author_short_bio = '';
            $indigenous_affiliation = '';
            $pronounId = '';
            $author_affiliationId = [];
            $email = '';
            $countryId = '';
            $organization_name = '';
            $cover_image = '';
            $cover_image_caption = '';
            // $others_image = '';
            $long_desc = '';
            $keywords = '';
            $short_desc = '';
            $is_feature = '';
            $is_popular = '';            
            $media = '';    
            $video_url = '';        
            $videoId = '';
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
                    <form method="POST" action="" enctype="multipart/form-data" oninput="validateForm()">
                        @csrf
                        <div class="row mb-3">
                            <label for="email" class="col-md-2 col-lg-4 col-form-label">1) Email address</label>
                            <div class="col-md-10 col-lg-8">
                                <input type="email" name="email" class="form-control" id="email"
                                    value="<?= $email ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="author_classification" class="col-md-2 col-lg-4 col-form-label">2) Author Classification
                            </label>           
                            <div class="col-md-10 col-lg-8">                 
                                <?php if($page_header == "News Content Add" || $page_header == "News Content Update") {?>                                    
                                <input type="radio" id="Human individual" name="author_classification" value="Human individual" @checked(old('author_classification', $author_classification) == 'Human individual')>
                                <label for="Human individual">Human individual</label>
                                <input type="radio" id="Ecoweb-rooted community" name="author_classification" value="Ecoweb-rooted community" @checked(old('author_classification', $author_classification) == 'Ecoweb-rooted community')>
                                <label for="Ecoweb-rooted community">Ecoweb-rooted community</label>
                                <input type="radio" id="Movement" name="author_classification" value="Movement" @checked(old('author_classification', $author_classification) == 'Movement')>
                                <label for="Movement">Movement</label>                            
                                <?php } else { ?>                                                                                                       
                                    <input type="text" class="form-control" id="Ecoweb-rooted community" name="author_classification" value="<?= $profile->name?>" readonly>                                
                                <?php } ?>
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="co_authors" class="col-md-2 col-lg-4 col-form-label">3) How many co-authors do you have?
                            </label>
                            <div class="col-md-10 col-lg-8">
                                <input type="radio" id="co_authors_0" name="co_authors" value="0" @checked(old('co_authors', $co_authors) == '0')>
                                <label for="0">0</label>
                                <input type="radio" id="co_authors_1" name="co_authors" value="1" @checked(old('co_authors', $co_authors) == '1')>
                                <label for="1">1</label>
                                <input type="radio" id="co_authors_2" name="co_authors" value="2" @checked(old('co_authors', $co_authors) == '2')>
                                <label for="2">2</label>
                            </div>
                        </div>
                        <div id="co_authors_position" style="display: none;border: 1px solid #000; padding: 10px; border-radius: 7px;">
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
                                        <div class="col-md-6">
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
                                    value="<?= $first_name ?>" required>
                            </div>
                        </div>                                                 
                        <div class="row mb-3">
                            <label for="for_publication_name" class="col-md-2 col-lg-4 col-form-label">5) Preferred name for publication (if different from full legal name)</label>
                            <div class="col-md-10 col-lg-8">
                                <input type="text" name="for_publication_name" class="form-control" id="for_publication_name"
                                    value="<?= $for_publication_name ?>" >
                            </div>
                        </div>                        
                        <div class="row mb-3">
                            <label for="pronoun" class="col-md-2 col-lg-4 col-form-label">7) Pronoun(s) (select all that apply)</label>
                            <div class="col-md-10 col-lg-8">                                                                
                                @if ($pronoun)
                                    @foreach ($pronoun as $data)
                                        <!-- <option value="{{ $data->id }}" @selected($data->id == $pronounId)> -->
                                        <input type="radio" id="yes" name="pronoun" value="{{ $data->id }}" @checked($data->id == $pronounId) >
                                        <label for="yes">{{ $data->name }}</label>
                                            <!-- {{ $data->name }}</option> -->
                                    @endforeach
                                @endif                                
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
                            <label for="creative_work_SRN" class="col-md-2 col-lg-2 col-form-label">Creative-Work SRN</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="creative_work_SRN" class="form-control" id="creative_work_SRN" value="<?= $creative_work_SRN ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="creative_work_DOI" class="col-md-2 col-lg-2 col-form-label">Creative-Work DOI</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="creative_work_DOI" class="form-control" id="creative_work_DOI" value="<?= $creative_work_DOI ?>" required>
                            </div>
                        </div>
                                          
                            <div class="row mb-3">
                                <label for="subtitle" class="col-md-2 col-lg-4 col-form-label">16) Subtitle - brief engaging summary of your Creative-Work (max. 40 words)
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    <textarea name="subtitle" class="form-control ckeditor" id="subtitle" rows="3"><?= $subtitle ?></textarea>
                                    <div id="subtitleError" class="error"></div>
                                </div>
                            </div>                            
                            <div class="row mb-3">
                                <label for="country" class="col-md-2 col-lg-4 col-form-label">18) What country/nation do you live in? (Country of Residence)                                </label>
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
                                        value="<?= $state ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="city" class="col-md-2 col-lg-4 col-form-label">20) Village/town/city of residence</label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="text" name="city" class="form-control" id="city"
                                        value="<?= $city ?>" >
                                </div>
                            </div> 
                            <div class="row mb-3">
                                <label for="organization_name" class="col-md-2 col-lg-4 col-form-label">21) Name of your grassroots organization/ ecoweb-rooted community/ movement (if no grassroots affiliation, type N/A)
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="text" name="organization_name" class="form-control" id="organization_name"
                                        value="<?= $organization_name ?>" >
                                </div>
                            </div> 
                            <div class="row mb-3">
                                <label for="organization_website" class="col-md-2 col-lg-4 col-form-label">22) Website of grassroots organization/ ecoweb-rooted community/ movement (if no website, type N/A)
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    <input type="text" name="organization_website" class="form-control" id="organization_website"
                                        value="<?= $organization_website ?>" >
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
                                    value="<?= $indigenous_affiliation ?>" required>
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
                                <label for="author_short_bio" class="col-md-2 col-lg-4 col-form-label">26) 1-sentence biography (max. 40 words)
                                </label>
                                <div class="col-md-10 col-lg-8">
                                    <textarea class="form-control" id="author_short_bio" name="author_short_bio" rows="4" cols="50" placeholder="Your explanation here..." required><?= $author_short_bio ?></textarea>
                                    <div id="bio_shortError" class="error"></div>
                                </div>
                            </div>
                         
                        <div class="row mb-3">
                            <label for="media" class="col-md-2 col-lg-2 col-form-label">Media Type</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="radio" id="media_image" name="media" value="image" @checked(old('media', $media) == 'image')>
                                <label for="media_image">Image</label>
                                <input type="radio" id="media_video" name="media" value="video" @checked(old('media', $media) == 'video')>
                                <label for="media_video">Video</label>
                            </div>
                        </div>
                        <div id="imageDetails" style="display: none;">  
                            <div class="row mb-3">
                                <label for="cover_image" class="col-md-2 col-lg-2 col-form-label">Cover Image</label>
                                <div class="col-md-10 col-lg-10">
                                    <input type="file" name="cover_image" class="form-control" id="cover_image">
                                    <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed</small><br>
                                    <span id="cover_image_error" class="text-danger"></span>  
                                    <?php if($cover_image != ''){?>
                                    <img src="<?=env('UPLOADS_URL').'newcontent/'.$cover_image?>" alt="<?=$author_name?>" style="width: 150px; height: 150px; margin-top: 10px;">
                                    <?php } ?>                                    
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="cover_image_caption" class="col-md-2 col-lg-2 col-form-label">Cover Image Caption</label>
                                <div class="col-md-10 col-lg-10">
                                    <input type="text" name="cover_image_caption" class="form-control" id="cover_image_caption" value="<?= $cover_image_caption ?>">
                                </div>
                            </div>

                            <!-- <div class="row mb-3">
                                <label for="others_image" class="col-md-2 col-lg-2 col-form-label">Others Image</label>
                                <div class="col-md-10 col-lg-10">
                                    <input type="file" name="others_image[]" class="form-control" id="others_image" multiple>
                                    <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed</small><br>

                                    <div class="row">
                                        <?php if($news_images != ''){ foreach($news_images as $image) { ?>
                                            <div class="col-md-3">
                                                <img src="<?=env('UPLOADS_URL').'newcontent/'.$image->image_file?>" alt="<?=$author_name?>" style="width: 150px; height: 150px; margin-top: 10px;"><br>
                                                <p class="mt-2">
                                                    <a href="<?=url('admin/' . $controllerRoute . '/edit_image/'.Helper::encoded($image->id))?>" class="btn btn-primary btn-sm" title="Edit <?=$module['title']?>"><i class="fa fa-edit"></i> Edit</a>
                                                    <a href="<?=url('admin/' . $controllerRoute . '/delete_image/'.Helper::encoded($image->id))?>" class="btn btn-danger btn-sm" title="Delete <?=$module['title']?>" onclick="return confirm('Do You Want To Delete This <?=$module['title']?>');"><i class="fa fa-trash"></i> Delete</a>
                                                </p>
                                            </div>
                                        <?php } } else {?>
                                            <div class="col-md-12">
                                                <img src="<?=env('NO_IMAGE')?>" alt="<?=$author_name?>" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                                            </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>       -->
                        </div>
                        <div id="videoDetails" style="display: none;">
                            <div class="row mb-3">
                                <label for="video_url" class="col-md-2 col-lg-2 col-form-label">Video Url
                                </label>
                                <div class="col-md-10 col-lg-10">
                                    <input type="text" name="video_url" class="form-control" id="video_url"
                                        value="<?= $video_url ?>">
                                    <?php if($video_url != ''){?>
                                        <iframe width="350" height="250" src="https://www.youtube.com/embed/<?= $videoId ?>" 
                                                title="YouTube video player" frameborder="0" 
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                                allowfullscreen>
                                        </iframe>                                   
                                    <?php } ?>                                    
                                </div>
                            </div> 
                        </div>
                        <div class="row mb-3">
                            <label for="ckeditor1" class="col-md-2 col-lg-2 col-form-label">Description</label>
                            <div class="col-md-10 col-lg-10">
                                <textarea name="long_desc" class="form-control ckeditor" id="long_desc"  rows="5"><?= $long_desc ?></textarea>
                            </div>
                        </div>                        
                        <div class="row mb-3">
                            <label for="keywords" class="col-md-2 col-lg-2 col-form-label">Keywords</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" id="input-tags" class="form-control" placeholder="Enter Keywords">
                                <textarea class="form-control" name="keywords" id="keywords" style="display:none;"><?=$keywords?></textarea>
                                <small class="text-primary">Enter keywords with comma separated</small>
                                <div id="badge-container">
                                    <?php
                                    if($keywords != ''){
                                        $deal_keywords = explode(",", $keywords);
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
                            <label for="ckeditor2" class="col-md-2 col-lg-2 col-form-label">Short Description
                            </label>
                            <div class="col-md-10 col-lg-10">
                                <textarea class="form-control" id="ckeditor2" name="short_desc" rows="5"><?= $short_desc ?></textarea>
                                <div id="short_descError" class="error"></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="is_feature" class="col-md-2 col-lg-2 col-form-label">Is Features</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="radio" id="is_feature_yes" name="is_feature" value="1" @checked(old('is_feature', $is_feature) == 1)>
                                <label for="is_feature_yes">Yes</label>
                                <input type="radio" id="is_feature_no" name="is_feature" value="0" @checked(old('is_feature', $is_feature) == 0)>
                                <label for="is_feature_no">No</label>
                            </div>
                        </div>  
                        <div class="row mb-3">
                            <label for="is_popular" class="col-md-2 col-lg-2 col-form-label">Is Popular</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="radio" id="is_popular_yes" name="is_popular" value="1" @checked(old('is_popular', $is_popular) == 1)>
                                <label for="is_popular_yes">Yes</label>
                                <input type="radio" id="is_popular_no" name="is_popular" value="0" @checked(old('is_popular', $is_popular) == 0)>
                                <label for="is_popular_no">No</label>
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
    CKEDITOR.replace('long_desc', {
        allowedContent: true,
    stylesSet: [        
        { name: 'others_image_colour', element: 'em', attributes: { 'style': 'display: inline-block; color: #87ceeb;font-size: 16px;font-family: "proximanova_regular", sans-serif;font-style: italic;margin: 0;text-align: left !important;width: 100%;' } },        
    ]
});
</script>
<script>
    $(document).ready(function() {
        // Function to show/hide the invited and participated fields
        function toggleFields() {
            const imageYes = $('#media_image').is(':checked');
             const videoYes = $('#media_video').is(':checked');            
            // Toggle individual sections
            $('#imageDetails').toggle(imageYes);
             $('#videoDetails').toggle(videoYes);            
            if (imageYes) {
                $('#imageDetails').show();
                $('#videoDetails').hide();                            
            }
            else if(videoYes){
                $('#imageDetails').hide();
                $('#videoDetails').show();
            }
            else{
                $('#imageDetails').hide();
                $('#videoDetails').hide();                
            }
        }
        // Trigger on change
        $('input[name="media"]').on('change', function() {
            toggleFields();
        });
        // Check initial state on page load
        toggleFields();
    });
</script>
<script>
    function checkWordLimit(field, limit, errorField) {
        var words = field.value.trim().split(/\s+/).filter(word => word.length > 0).length;
        // alert(words);die;
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
        // allValid &= checkWordLimit(document.getElementById('explanation_submission'), 150, 'explanation_submissionError');        
        allValid &= checkWordLimit(document.getElementById('short_desc'), 102, 'short_descError');
        allValid &= checkWordLimit(document.getElementById('subtitle'), 50, 'subtitleError');
        allValid &= checkWordLimit(document.getElementById('creative_Work'), 10, 'creative_WorkError');

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
                var url = "{{ url('admin/news_content/get-subcategories') }}/" + parent_id;
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
<script>
    document.getElementById('cover_image').addEventListener('change', function() {
        validateFileSize(this, 'cover_image_error');
    });
    function validateFileSize(input, errorElementId) {
        var file = input.files[0];
        var maxSize = 1 * 1024 * 1024; // 1MB in bytes

    if (file.size > maxSize) {
        document.getElementById(errorElementId).innerText = "File size exceeds 1MB. Please upload a smaller file.";
        // alert('File size exceeds 1MB. Please upload a smaller file.');
        input.value = ''; // Clear the input if validation fails
    }
    }
</script>
<script type="text/javascript">
  $(document).ready(function() {
    var tagsArray = [];
    var beforeData = $('#keywords').val();
    if(beforeData.length > 0){
      tagsArray = beforeData.split(',');
    }
    $('#input-tags').on('input', function() {
        var input = $(this).val();
        if (input.includes(',')) {
            var tags = input.split(',');
            tags.forEach(function(tag) {
                tag = tag.trim();
                if (tag.length > 0 && !tagsArray.includes(tag)) {
                    tagsArray.push(tag);
                    $('#badge-container').append(
                        '<span class="badge">' + tag + ' <span class="remove" data-tag="' + tag + '">&times;</span></span>'
                    );
                }
            });
            $('#keywords').val(tagsArray);
            // console.log(tagsArray);
            $(this).val('');
        }
    });
    // console.log(tagsArray);
    $(document).on('click', '.remove', function() {
        var tag = $(this).data('tag');
        tagsArray = tagsArray.filter(function(item) {
            return item !== tag;
        });
        $(this).parent().remove();
        $('#keywords').val(tagsArray);
        // console.log(tagsArray);
    });
  });
</script>
<!-- import -->
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
<script>
    // Function to toggle the co-authors position section
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