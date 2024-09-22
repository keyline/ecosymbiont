<?php
use App\Helpers\Helper;
use App\Models\SectionErt;
use App\Models\EcosystemAffiliation;
use App\Models\ExpertiseArea;
$controllerRoute = $module['controller_route'];
?>
<div class="pagetitle">
  <h1><?=$page_header?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=url('admin/dashboard')?>">Home</a></li>
      <li class="breadcrumb-item active"><?=$page_header?></li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
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
    }
    ?>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">          
          <ul class="nav nav-tabs nav-tabs-bordered">
            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab1">Submission Details</button>
            </li>            
            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab2">NELP PDF</button>
            </li>            
            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab3">NELP Scan Copy</button>
            </li>                               
          </ul> 
          <div class="tab-content pt-2">     
            <div class="tab-pane fade show active" id="tab1">
              <p style="float:right;">
                <?php if($row->is_final_edit){?>
                  <a href="<?=url('admin/' . $controllerRoute . '/generate-nelp-form/'.Helper::encoded($row->id))?>" class="btn btn-outline-info btn-sm" title="Generate NELP Form & Shared"><i class="fa fa-pdf"> Generate NELP Form & Shared</i></a>
                <?php }?>
                <a href="<?=url('admin/' . $controllerRoute . '/edit/'.Helper::encoded($row->id))?>" class="btn btn-outline-primary btn-sm" title="Edit <?=$module['title']?>"><i class="fa fa-edit"> Edit</i></a>
              </p>
              <table class="table table-striped table-bordered nowrap">
                <thead>
                  <tr>                                     
                    <th scope="col">Label</th>                  
                    <th scope="col">Value</th>                                      
                  </tr>
                </thead>
                <tbody>                
                    <tr>   
                      <td>0) Email address</td>                   
                      <td><?= $email ?></td>                                                                  
                    </tr>  
                    <tr>
                      <td>2) Legal first name (if you are an ecoweb-rooted community or movement, enter the name here)</td>
                      <td><?= $first_name ?></td>
                    </tr>                
                    <tr>
                      <td>3) Legal middle name(s)/ initial(s)</td>
                      <td><?= $middle_name ?></td>
                    </tr>
                    <tr>
                      <td>4) Legal surname (last name) (if you are an ecoweb-rooted community or movement, enter N/A)</td>
                      <td><?= $last_name ?></td>
                    </tr>
                    <tr>
                      <td>4A) Preferred name for publication (if you wish to use your Legal Name, enter N/A)</td>
                      <td><?= $for_publication_name ?></td>
                    </tr>
                    <tr>
                      <td>5) Title</td>
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
                      <td>6) Pronoun(s) (select all that apply)</td>
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
                      <td>7) Are all components of this Creative-Work your original work?</td>
                      <td><?=$orginal_work?></td>
                    </tr>
                    <tr>
                      <td>8) Do you own the copyright and licensing rights to all components of your Creative-Work?</td>
                      <td><?= $copyright ?></td>
                    </tr>
                    <tr>
                      <td>9) Were you invited to submit a Creative-Work to ERT?</td>
                      <td><?= $invited ?></td>
                    </tr>
                    <tr>
                      <td>9A) Full name of person who invited you to submit a Creative-Work to ERT</td>
                      <td><?= $invited_by ?></td>
                    </tr>
                    <tr>
                      <td>9B) Email address of person who invited you to submit a Creative-Work to ERT</td>
                      <td><?= $invited_by_email ?></td>
                    </tr>
                    <tr>
                      <td>10) Have you participated as a strategist at an in-person ER Synergy Meeting?</td>
                      <td><?= $participated ?></td>
                    </tr>
                    <tr>
                      <td>10A) Provide date and location of most recent in-person ER Synergy Meeting in which you participated</td>
                      <td><?= $participated_info ?></td>
                    </tr>
                    <tr>
                      <td>11) Explain why you are a grassroots changemaker, innovator, and/or knowledge-holder (max. 100 words)</td>
                      <td><?= $explanation ?></td>
                    </tr>
                    <tr>
                      <td>12) Explain why and how your Creative-Work relates to regenerating systems that restore, preserve, and foster the mutually beneficial interconnectivity and interdependence (symbiosis) of human communities within and to natural ecological webs (ecowebs) (max. 150 words)</td>
                      <td><?= $explanation_submission ?></td>
                    </tr>
                    <tr>
                      <td>13) For which section and sub-section of ERT would you like your Creative-Work to be considered?</td>
                      <td>
                        <?php
                        $section_ertId = json_decode($row->section_ertId);
                        $section_ert = [];
                        if(!empty($section_ertId)){
                          for($k=0;$k<count($section_ertId);$k++){
                            $getSectionErt = SectionErt::select('name')->where('id', '=', $section_ertId[$k])->first();
                            $section_ert[] = (($getSectionErt)?$getSectionErt->name:'');
                          }
                        }
                        echo implode(', ', $section_ert);
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td>14) Title of your Creative-Work (max. 10 words)</td>
                      <td><?= $creative_Work ?></td>
                    </tr>
                    <tr>
                      <td>15) Subtitle - brief engaging summary of your Creative-Work (this is what readers will be able to read before logging on to ERT, if your Creative-Work is published on ERT as Content) (max. 40 words)</td>
                      <td><?= $subtitle ?></td>
                    </tr>
                    <tr>
                      <td>16) Select the type of your Creative-Work</td>
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
                      <td>16A1) TYPE A: word narrative (no embedded images) (500-1000 words for prose, 100-250 words for poetry)</td>
                      <td>
                      <?php if($narrative_file != ''){?>
                        <a href="<?= env('UPLOADS_URL') . 'narrative/' . $narrative_file ?>" target="_blank"
                            class="badge bg-primary">View File</a>
                        <?php }?>                      
                      </td>
                    </tr>
                    <tr>
                      <td>16A2) TYPE A: First image/photograph accompanying word narrative</td>
                      <td>
                      <?php if($first_image_file != ''){?>
                        <img src="<?=env('UPLOADS_URL').'narrative/'.$first_image_file?>" alt="first_image_file" style="width: 150px; height: 150px; margin-top: 10px;">
                        <?php } else {?>
                        <img src="<?=env('NO_IMAGE')?>" alt="first_image_file" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                        <?php }?>
                      </td>
                    </tr>
                    <tr>
                      <td>16A3) TYPE A: Second image/photograph accompanying word narrative</td>
                      <td>
                      <?php if($second_image_file != ''){?>
                        <img src="<?=env('UPLOADS_URL').'narrative/'.$second_image_file?>" alt="second_image_file" style="width: 150px; height: 150px; margin-top: 10px;">
                        <?php } else {?>
                        <img src="<?=env('NO_IMAGE')?>" alt="second_image_file" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                        <?php }?>
                      </td>
                    </tr>
                    <tr>
                      <td>16B1) TYPE B: Art image + descriptive narrative | art image</td>
                      <td>
                      <?php if($art_image_file != ''){?>
                        <img src="<?=env('UPLOADS_URL').'art_image/'.$art_image_file?>" alt="art_image_file" style="width: 150px; height: 150px; margin-top: 10px;">
                        <?php } else {?>
                        <img src="<?=env('NO_IMAGE')?>" alt="art_image_file" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                        <?php }?>
                      </td>
                    </tr>
                    <tr>
                      <td>16B2) TYPE B: Art image + descriptive narrative | descriptive narrative (100-250 words)</td>
                      <td><?= $art_image_desc ?></td>
                    </tr>
                    <tr>
                      <td>16C1) TYPE C: Video + descriptive narrative | audiovisual media (3-10 min.)</td>
                      <td>
                      <?php if($art_video_file != ''){?>
                          <video width="350" height="250" controls>
                              <source src="<?=env('UPLOADS_URL').'art_video/'.$art_video_file?>" type="video/mp4">
                              Your browser does not support the video tag.
                          </video>                      
                      <?php } else {?>
                      <img src="<?=env('NO_IMAGE')?>" alt="art_video_file" class="img-thumbnail" style="width: 150px; height: 150px; margin-top: 10px;">
                      <?php }?>
                      </td>
                    </tr>
                    <tr>
                      <td>16C2) TYPE C: Video + narrative | descriptive narrative (100-250 words)</td>
                      <td><?= $art_video_desc ?></td>
                    </tr>
                    <tr>
                      <td>17) Nation/country of residence</td>
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
                      <td>18) State/province of residence</td>
                      <td><?= $state ?></td>
                    </tr>              
                    <tr>
                      <td>19) Village/town/city of residence</td>
                      <td><?= $city ?></td>
                    </tr>      
                    <tr>
                      <td>20) Grassroots organization name (if no grassroots affiliation, type N/A)</td>
                      <td><?= $organization_name ?></td>
                    </tr>
                    <tr>
                      <td>21) Grassroots organization website  (if no website, type N/A)</td>
                      <td><?= $organization_website ?></td>
                    </tr>
                    <tr>
                      <td>22) Ancestral continental ecoweb affiliation (continental ethnicity) (select all that apply)</td>
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
                      <td>23) Ancestral regional ecoweb affiliation (please further define your ethnicity, e.g., region of South Asia and/or Indigenous tribe/nation)</td>
                      <td><?= $indigenous_affiliation ?></td>
                    </tr>
                    <tr>
                      <td>24) Your expertise area (select all that apply)</td>
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
                      <td>25) 1-sentence biography (max. 40 words)</td>
                      <td><?= $bio_short ?></td>
                    </tr>
                    <tr>
                      <td>26) 1-paragraph biography (150-250 words)</td>
                      <td><?= $bio_long ?></td>
                    </tr>
                </tbody>
              </table>              
            </div>
            <div class="tab-pane fade pt-3" id="tab2">
                <h4>Pdf Copy</h4>        
            </div>
            <div class="tab-pane fade pt-3" id="tab3">            
                <h4>Scan Copy</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>