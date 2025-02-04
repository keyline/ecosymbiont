<?php
use App\Helpers\Helper;
use App\Models\SectionErt;
use App\Models\EcosystemAffiliation;
use App\Models\Country;
use App\Models\ExpertiseArea;
// $controllerRoute = $module['controller_route'];
?>
<div class="block-content">
  <div class="row">
    <div class="col-xl-12">
      @if(session('success_message'))
        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show autohide" role="alert">
          {{ session('success_message') }}
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      @if(session('error_message'))
        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show autohide" role="alert">
          {{ session('error_message') }}
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
    </div>
    <?php
    if ($row) {      
      $author_classification = $row->author_classification;
      $co_authors = $row->co_authors;
      $co_authors_position = $row->co_authors_position;
      $co_author_name = json_decode($row->co_author_names);    
      $co_author_bios = json_decode($row->co_author_bios);
      $co_author_countries =json_decode($row->co_author_countries);
      $co_author_organizations = json_decode($row->co_author_organizations);
      $co_ecosystem_affiliations = json_decode($row->co_ecosystem_affiliations);
      $co_indigenous_affiliations = json_decode($row->co_indigenous_affiliations);
      $co_author_classification = json_decode($row->co_author_classification);
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
      $invited_by = $row->invited_by;  
      $explanation = $row->explanation;  
      $explanation_submission = $row->explanation_submission;  
      $section_ertId = isset($selected_section_ertId) ? $selected_section_ertId : ''; 
      $titleId = $row->user_title;  
      $pronounId = $row->pronounId;
      $subtitle = $row->subtitle;
      $submission_types = $row->submission_types;
      $narrative_images = $row->narrative_images;
      $narrative_file = $row->narrative_file;
      $image_files = json_decode($row->image_files);
      $narrative_image_desc = json_decode($row->narrative_image_desc);
      $art_images = $row->art_images;
      $art_image_file = json_decode($row->art_image_file);
      $art_image_desc = json_decode($row->art_image_desc);    
      $art_desc = $row->art_desc;
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
    }
    ?>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">   
          <div class="d-flex justify-content-between">
            <h4 class="card-title"><?=$page_header?></h4>       
          </div>
          <table class="table table-striped table-bordered nowrap">
            <thead>
              <tr>                                     
                <th scope="col">Label</th>                  
                <th scope="col">Value</th>                                      
              </tr>
            </thead>
            <tbody>                
                <tr>   
                  <td>1) Email address</td>                   
                  <td><?= $email ?></td>                                                                  
                </tr>  
                <tr>
                  <td>2) Author Classification</td>
                  <td><?=$author_classification?></td>
                </tr>
                <tr>
                  <td>3) How many co-authors do you have?</td>
                  <td><?= $co_authors ?></td>
                </tr>
                <tr>
                  <td>3A) (- if answer to (3) is 1 or 2) Indicate in which position your name should appear in the list of authors (the Lead Author, i.e., the first author listed, must be a human individual)</td>
                  <td><?= $co_authors_position ?></td>
                </tr>
                @for ($i = 1; $i <= $co_authors; $i++)
                @php
                  // Decode the JSON field only once
                  $co_ecosystem_affiliations = json_decode($row->co_ecosystem_affiliations);

                  // Initialize affiliations array
                  $affiliations = [];

                  // Check if $co_ecosystem_affiliations is not null and has the current index
                  if (!empty($co_ecosystem_affiliations) && isset($co_ecosystem_affiliations[$i-1])) {
                    $affiliation_ids = $co_ecosystem_affiliations[$i-1]; // Get the specific co-author's affiliations

                    // Loop through the affiliation IDs and fetch names
                    foreach ($affiliation_ids as $affiliation_id) {
                      $getCoAffiliation = EcosystemAffiliation::select('name')->where('id', '=', $affiliation_id)->first();
                      
                      // Check if the affiliation was found and add it to the array
                      if ($getCoAffiliation) {
                        $affiliations[] = $getCoAffiliation->name;
                      }
                    }
                  }
                  $county_ids = $co_author_countries[$i-1];
                  $getCoCountry = Country::select('name')->where('id', '=', $county_ids)->first();

                @endphp                   
                  <tr>
                    <td>3B{{$i}}) Co-Author Name</td> 
                    <td>{{ $co_author_name[$i - 1] }}</td>                       
                  </tr>
                    <tr>
                    <td>3C{{$i}}) Co-Author Short Bio</td>
                    <td>{{ $co_author_bios[$i - 1] }}</td>
                  </tr>
                  <tr>
                    <td>3D{{$i}}) Co-Author country/nation</td>
                    <td>{{ $getCoCountry->name }}</td>
                  </tr>
                  <tr>
                    <td>3E{{$i}}) Co-Author grassroots organization/ ecoweb-rooted community/ movement</td>
                    <td>{{ $co_author_organizations[$i - 1] }}</td>
                  </tr>
                  <tr>
                    <td>3F{{$i}}) What continent are Co-Author ancestors originally from?</td>
                    <td>{{ implode(', ', $affiliations) }}</td>
                  </tr>
                  <tr>
                    <td>3G{{$i}}) What specific region are Co-author ancestors originally from OR what is the name of your Indigenous community?</td>
                    <td>{{ $co_indigenous_affiliations[$i - 1] }}</td>
                  </tr>
                  <tr>
                    <td>3H{{$i}}) Co-Author Classification</td>
                    <td>{{ $co_author_classification[$i - 1] }}</td>
                  </tr>
                @endfor
                <tr>
                  <td>4) Full Legal Name (exactly as it appears on your government-issued identification documents, e.g., passport and/or driver's license)</td>
                  <td><?= $first_name ?></td>
                </tr>                
                <tr>
                  <td>5) Preferred name for publication (if different from full legal name)</td>
                  <td><?= $for_publication_name ?></td>
                </tr>
                <tr>
                  <td>6) Title</td>
                  <td>
                    <?php
                      $title_id = $row->titleId;
                      $title = DB::table('titles')->where('id', '=', $title_id)->get();                          
                      foreach($title as $titles){
                    ?>
                    <?=$titles->name?>
                    <?php } ?>
                  </td>
                </tr>
                <tr>
                  <td>7) Pronoun(s) (select all that apply)</td>
                  <td>
                  <?php
                      $pronoun_id = $row->pronounId;
                      $pronoun = DB::table('pronouns')->where('id', '=', $pronoun_id)->get();                          
                      foreach($pronoun as $pronouns){
                    ?>
                    <?=$pronouns->name?>
                    <?php } ?>
                  </td>
                </tr>
                <tr>
                  <td>8) Are all components of this Creative-Work your original work?</td>
                  <td><?=$orginal_work?></td>
                </tr>
                <tr>
                  <td>9) Do you own the copyright and licensing rights to all components of your Creative-Work?</td>
                  <td><?= $copyright ?></td>
                </tr>
                <tr>
                  <td>10) Were you invited to submit a Creative-Work to ERT?</td>
                  <td><?= $invited ?></td>
                </tr>
                <tr>
                  <td>10A) Full name of person who invited you to submit a Creative-Work to ERT</td>
                  <td><?= $invited_by ?></td>
                </tr>                    
                <tr>
                  <td>10B) Email address of person who invited you to submit a Creative-Work to ERT</td>
                  <td><?= $invited_by_email ?></td>
                </tr>
                <tr>
                  <td>11) Have you participated as a strategist at an in-person ER Synergy Meeting?</td>
                  <td><?= $participated ?></td>
                </tr>
                <tr>
                  <td>11A) Provide date and location of most recent in-person ER Synergy Meeting in which you participated</td>
                  <td><?= $participated_info ?></td>
                </tr>
                <tr>
                  <td>12) Explain why you are a grassroots changemaker, innovator, and/or knowledge-holder (max. 100 words)</td>
                  <td><?= $explanation ?></td>
                </tr>
                <tr>
                  <td>13) Explain why and how your Creative-Work relates to regenerating systems that restore, preserve, and foster the mutually beneficial interconnectivity and interdependence (symbiosis) of human communities within and to natural ecological webs (ecowebs) (max. 150 words)</td>
                  <td><?= $explanation_submission ?></td>
                </tr>
                <tr>
                  <td>14) For which CATEGORY and sub-category of ERT would you like your Creative-Work to be considered?</td>
                  <td>
                    
                    <?php
                      $section_ertId = $row->section_ertId;
                      $section_ert = DB::table('news_category')->where('id', '=', $section_ertId)->get();                          
                      foreach($section_ert as $section_erts){
                    ?>
                    <?=$section_erts->sub_category?>
                    <?php } ?>
                  </td>
                </tr>
                <tr>
                  <td>15) Title of your Creative-Work (max. 10 words)</td>
                  <td><?= $creative_Work ?></td>
                </tr>
                <tr>
                  <td>16) Subtitle - brief engaging summary of your Creative-Work (this is what readers will be able to read before logging on to ERT, if your Creative-Work is published on ERT as Content) (max. 40 words)</td>
                  <td><?= $subtitle ?></td>
                </tr>
                <tr>
                  <td>17) Select the type of your Creative-Work</td>
                  <td>
                  <?php
                      $submission_types_id = $row->submission_types;
                      $submission_types = DB::table('submission_types')->where('id', '=', $submission_types_id)->get();
                      foreach($submission_types as $submission_type){
                    ?>
                    <?=$submission_type->name?>
                    <?php } ?>
                  </td>
                </tr>
                <tr>
                  <td>17A1) TYPE A: word narrative (no embedded images) (500-1000 words for prose, 100-250 words for poetry)</td>
                  <td>
                  <?php if($narrative_file != ''){?>
                    <a href="<?= env('UPLOADS_URL') . 'narrative/' . $narrative_file ?>" target="_blank"
                        class="badge bg-primary">View File</a>
                        <br><a href="<?= env('UPLOADS_URL') . 'narrative/' . $narrative_file ?>" download="<?=$art_video_file?>" class="btn btn-outline-success btn-sm"><?=$narrative_file?> <i class="fa fa-download"></i></a>
                    <?php }?>                      
                  </td>
                </tr>
                <tr>
                  <td>17A2) TYPE A: how many images accompany your word narrative?</td>
                  <td><?=$narrative_images;?></td>
                </tr>
                @for ($i = 1; $i <= $narrative_images; $i++)                    
                <tr>
                  <td>17A3a{{$i}}) TYPE A: image {{ $i }} accompanying word narrative</td>
                  <td>
                  <?php if($image_files[$i-1] != ''){?>
                    <img src="<?=env('UPLOADS_URL').'narrative/'.$image_files[$i-1]?>" alt="first_image_file" style="width: 150px; height: 150px; margin-top: 10px;">
                    <br><a href="<?=env('UPLOADS_URL').'narrative/'.$image_files[$i-1]?>" download="<?=$art_video_file?>" class="btn btn-outline-success btn-sm"><?=$image_files[$i-1]?> <i class="fa fa-download"></i></a>
                    <?php } else {?>
                    <img src="<?=env('NO_IMAGE')?>" alt="first_image_file" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                    <?php }?>
                  </td>
                </tr>
                <tr>
                  <td>17A3b{{$i}}) TYPE A: short caption for image {{ $i }} (max. 50 words)</td>
                  <td><?= $narrative_image_desc[$i-1]?></td>
                </tr>
                @endfor
                <tr>
                  <td>17B1) TYPE B: How many images related to the same art are you uploading?</td>
                  <td><?=$art_images?></td>
                </tr>
                @for ($i = 1; $i <= $art_images; $i++)                    
                <tr>
                  <td>17B2a{{$i}}) TYPE B: image {{ $i }} of art</td>
                  <td>
                  <?php if($art_image_file[$i-1] != ''){?>
                    <img src="<?=env('UPLOADS_URL').'art_image/'.$art_image_file[$i-1]?>" alt="first_image_file" style="width: 150px; height: 150px; margin-top: 10px;">
                    <br><a href="<?=env('UPLOADS_URL').'art_image/'.$art_image_file[$i-1]?>" download="<?=$art_video_file?>" class="btn btn-outline-success btn-sm"><?=$art_image_file[$i-1]?> <i class="fa fa-download"></i></a>
                    <?php } else {?>
                    <img src="<?=env('NO_IMAGE')?>" alt="first_image_file" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                    <?php }?>
                  </td>
                </tr>
                <tr>
                  <td>17B2b{{$i}}) TYPE B: short caption for image {{ $i }} (max. 50 words)</td>
                  <td><?= $art_image_desc[$i-1]?></td>
                </tr>
                @endfor
                <tr>
                  <td>17B3) TYPE B: descriptive narrative for art (100-250 words)</td>
                  <td><?=$art_desc?></td>
                </tr>
                <tr>
                  <td>17C1) TYPE C: Video (3-10 minutes)</td>
                  <td>
                  <?php if($art_video_file != ''){?>
                      <video width="350" height="250" controls>
                          <source src="<?=env('UPLOADS_URL').'art_video/'.$art_video_file?>" type="video/mp4">
                          Your browser does not support the video tag.
                      </video>                                                
                  <br><a href="<?=env('UPLOADS_URL').'art_video/'.$art_video_file?>" download="<?=$art_video_file?>" class="btn btn-outline-success btn-sm"><?=$art_video_file?> <i class="fa fa-download"></i></a>
                  <?php }?>                      
                  </td>
                </tr>
                <tr>
                  <td>17C2) TYPE C: descriptive narrative for video (100-250 words)</td>
                  <td><?= $art_video_desc ?></td>
                </tr>
                <tr>
                  <td>18) What country/nation do you live in? (Country of Residence)</td>
                  <td>
                  <?php
                      $country_id = $row->country;
                      $country = DB::table('countries')->where('id', '=', $country_id)->get();
                      foreach($country as $countries){
                    ?>
                    <?=$countries->name?>
                    <?php } ?>
                  </td>
                </tr>
                <tr>
                  <td>19) State/province of residence</td>
                  <td><?= $state ?></td>
                </tr>              
                <tr>
                  <td>20) Village/town/city of residence</td>
                  <td><?= $city ?></td>
                </tr>      
                <tr>
                  <td>21) Name of your grassroots organization/ ecoweb-rooted community/ movement (if no grassroots affiliation, type N/A)</td>
                  <td><?= $organization_name ?></td>
                </tr>
                <tr>
                  <td>22) Website of grassroots organization/ ecoweb-rooted community/ movement (if no website, type N/A)</td>
                  <td><?= $organization_website ?></td>
                </tr>
                <tr>
                  <td>23) What continent are your ancestors originally from?</td>
                  <td>
                  <?php
                    $ecosystem_affiliation = json_decode($row->ecosystem_affiliationId);
                    $ecosystem_affiliations = [];
                    if(!empty($ecosystem_affiliation)){
                      for($k=0;$k<count($ecosystem_affiliation);$k++){
                        $getecosystem_affiliation = EcosystemAffiliation::select('name')->where('id', '=', $ecosystem_affiliation[$k])->first();
                        $ecosystem_affiliations[] = (($getecosystem_affiliation)?$getecosystem_affiliation->name:'');
                      }
                    }
                    echo implode(', ', $ecosystem_affiliations);
                    ?>
                  </td>
                </tr>
                <tr>
                  <td>24) What specific region are your ancestors originally from OR what is the name of your Indigenous community? (example of specific region = Bengal; example of Indigenous community name = Lisjan Ohlone)</td>
                  <td><?= $indigenous_affiliation ?></td>
                </tr>
                <tr>
                  <td>25) Your expertise area (select all that apply)</td>
                  <td>
                  <?php
                    $expertise_area = json_decode($row->expertise_areaId);
                    $expertise_areas = [];
                    if(!empty($expertise_area)){
                      for($k=0;$k<count($expertise_area);$k++){
                        $getexpertise_area = ExpertiseArea::select('name')->where('id', '=', $expertise_area[$k])->first();
                        $expertise_areas[] = (($getexpertise_area)?$getexpertise_area->name:'');
                      }
                    }
                    echo implode(', ', $expertise_areas);
                    ?>
                  </td>
                </tr>
                <tr>
                  <td>26) 1-sentence biography (max. 40 words)</td>
                  <td><?= $bio_short ?></td>
                </tr>
                <tr>
                  <td>27) 1-paragraph biography (150-250 words)</td>
                  <td><?= $bio_long ?></td>
                </tr>
            </tbody>
          </table>          
        </div>
      </div>
    </div>
  </div>
</div>