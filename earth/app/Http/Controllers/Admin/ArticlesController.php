<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper as HelpersHelper;
use App\Http\Controllers\Controller;
use App\Models\Admin\JournalFrequency;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\GeneralSetting;
use App\Rules\MaxWords;
use App\Models\Article;
use App\Models\SectionErt;
use App\Models\NewsCategory;
use App\Models\Title;
use App\Models\Pronoun;
use App\Models\EcosystemAffiliation;
use App\Models\ExpertiseArea;
use App\Models\SubmissionType;
use App\Models\Country;
use App\Models\EmailLog;

use Auth;
use Session;
use Helper;
use Hash;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->data = array(
            'title'             => 'Creative-Works',
            'controller'        => 'ArticlesController',
            'controller_route'  => 'article',
            'primary_key'       => 'id',
        );
    }
    /* list */
    public function list($slug)
    {
        $getArticleStatus               = $this->get_article_status($slug);
        // Helper::pr($getArticleStatus);
        $data['module']                 = $this->data;
        $title                          = $this->data['title'] . ' List';
        $page_name                      = 'article.list';
        $data['rows']                   = Article::where('status', '!=', 3)->where('is_published', '=', $getArticleStatus)->orderBy('id', 'DESC')->get();

        echo $this->admin_after_login_layout($title, $page_name, $data);
    }    
    /* list */
    /* add */
    public function add(Request $request)
    {
        $data['module']           = $this->data;
        if ($request->isMethod('post')) {
            $postData = $request->all();
                    //  dd($postData);
            if ($postData['invited'] == 'No' && $postData['participated'] == 'No') {
                // echo "this section"; die;
                $rules = [
                    'first_name'                => 'required',                                                                
                    'email'                     => 'required',                                      
                    'for_publication_name'      => 'required',                                      
                    'orginal_work'              => 'required',                                     
                    'copyright'                 => 'required',                     
                    'title'                     => 'required',
                    'pronoun'                   => 'required',                   
                ];
                $participatedInfo = isset($postData['participated_info']) ? $postData['participated_info'] : '';
                $invited_byInfo = isset($postData['invited_by']) ? $postData['invited_by'] : '';
                $invited_emailInfo = isset($postData['invited_by_email']) ? $postData['invited_by_email'] : '';                    

                /* co-author details */
                // Define the number of co-authors you want to handle (e.g., 3 in this case)
                $coAuthorsCount = $postData['co_authors'];
                // Initialize empty arrays to hold the co-author data
                $coAuthorNames = [];
                $coAuthorBios = [];
                $coAuthorCountries = [];
                $coAuthorOrganizations = [];
                $coecosystemAffiliations = [];
                $coindigenousAffiliations = [];
                $coauthorClassification = [];

                // Loop through the number of co-authors and collect the data into arrays
                for ($i = 1; $i <= $coAuthorsCount; $i++) {
                    // Check if co-author name exists, to avoid null entries
                    if ($request->input("co_author_name_{$i}") !== null) {
                        $coAuthorNames[] = $request->input("co_author_name_{$i}");
                        $coAuthorBios[] = $request->input("co_author_short_bio_{$i}");
                        $coAuthorCountries[] = $request->input("co_author_country_{$i}");
                        $coAuthorOrganizations[] = $request->input("co_authororganization_name_{$i}");
                        $coecosystemAffiliations[] = $request->input("co_ecosystem_affiliation_{$i}", []);
                        $coindigenousAffiliations[] = $request->input("co_indigenous_affiliation_{$i}");
                        $coauthorClassification[] = $request->input("co_author_classification_{$i}");
                    }
                }                
                // Example of saving it to a database as a serialized array (optional, depends on your schema)
                // $authorData = [
                //     'co_author_names' => json_encode($coAuthorNames),  // Storing as JSON string
                //     'co_author_bios' => json_encode($coAuthorBios),
                //     'co_author_countries' => json_encode($coAuthorCountries),
                //     'co_author_organizations' => json_encode($coAuthorOrganizations),
                //     'co_ecosystem_affiliations' => json_encode($coecosystemAffiliations),
                //     'co_indigenous_affiliations' => json_encode($coindigenousAffiliations),
                //     'co_author_classification' => json_encode($coauthorClassification),
                // ];
                // dd($authorData);
                /* co-author details */

                if($postData['co_authors'] == '0'){
                    
                    //save to database//
                    if ($this->validate($request, $rules)) {                
                        $fields = [
                            'user_id'                      => 0,           
                            'email'                     => $postData['email'],
                            'author_classification'     => $postData['author_classification'],
                            'co_authors'                => $postData['co_authors'],                            
                            'first_name'                => $postData['first_name'],                                                                             
                            'for_publication_name'      => $postData['for_publication_name'], 
                            'titleId'                   => $postData['title'],             
                            'pronounId'                 => $postData['pronoun'],
                            'orginal_work'              => $postData['orginal_work'],           
                            'copyright'                 => $postData['copyright'],
                            'invited'                   => $postData['invited'],
                            'invited_by'                => $invited_byInfo, 
                            'invited_by_email'          => $invited_emailInfo,
                            'participated'              => $postData['participated'],
                            'participated_info'         => $participatedInfo                       
                        ];
                        // Helper::pr($fields);
                        Article::insert($fields);
                        return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' inserted successfully');                    
                    } else {
                        return redirect()->back()->with('error_message', 'All fields required');
                    }
                } else{                    
                    //save to database//
                    if ($this->validate($request, $rules)) {                
                        $fields = [
                            'user_id'                      => 0,           
                            'email'                     => $postData['email'],
                            'author_classification'     => $postData['author_classification'],
                            'co_authors'                => $postData['co_authors'],
                            'co_authors_position'       => $postData['co_authors_position'],
                            'co_author_names'           => json_encode($coAuthorNames),  // Storing as JSON string
                            'co_author_bios'            => json_encode($coAuthorBios),
                            'co_author_countries'       => json_encode($coAuthorCountries),
                            'co_author_organizations'   => json_encode($coAuthorOrganizations),
                            'co_ecosystem_affiliations' => json_encode($coecosystemAffiliations),
                            'co_indigenous_affiliations'=> json_encode($coindigenousAffiliations),
                            'co_author_classification'  => json_encode($coauthorClassification),
                            'first_name'                => $postData['first_name'],                                                                             
                            'for_publication_name'      => $postData['for_publication_name'], 
                            'titleId'                   => $postData['title'],             
                            'pronounId'                 => $postData['pronoun'],
                            'orginal_work'              => $postData['orginal_work'],           
                            'copyright'                 => $postData['copyright'],
                            'invited'                   => $postData['invited'],
                            'invited_by'                => $invited_byInfo, 
                            'invited_by_email'          => $invited_emailInfo,
                            'participated'              => $postData['participated'],
                            'participated_info'         => $participatedInfo                       
                        ];
                        // Helper::pr($fields);
                        Article::insert($fields);
                        return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' inserted successfully');                    
                    } else {
                        return redirect()->back()->with('error_message', 'All fields required');
                    }
                }
            } else{
                $rules = [
                    'author_classification'     => 'required',
                    'first_name'                => 'required',                                                               
                    'email'                     => 'required',                                      
                    'country'                   => 'required',                                     
                    'for_publication_name'      => 'required', 
                    'orginal_work'              => 'required', 
                    'copyright'                 => 'required', 
                    'submission_types'          => 'required',                
                    'state'                     => 'required', 
                    'city'                      => 'required', 
                    // 'acknowledge'               => 'required',                                                      
                    'section_ert'               => 'required',
                    'title'                     => 'required',
                    'pronoun'                   => 'required',                
                    'organization_name'         => 'required',
                    'organization_website'      => 'required',
                    'ecosystem_affiliation'     => 'required',               
                    'expertise_area'            => 'required',                
                    'explanation'               => ['required', 'string', new MaxWords(100)],
                    'explanation_submission'    => ['required', 'string', new MaxWords(150)],                
                    'creative_Work'             => ['required', 'string', new MaxWords(10)],
                    'subtitle'                  => ['required', 'string', new MaxWords(40)],                
                    'bio_short'                 => ['required', 'string', new MaxWords(40)],
                    'bio_long'                  => ['required', 'string', new MaxWords(250)], 
                    ];                                                                                    
                    $participatedInfo = isset($postData['participated_info']) ? $postData['participated_info'] : '';
                    $invited_byInfo = isset($postData['invited_by']) ? $postData['invited_by'] : '';
                    $invited_emailInfo = isset($postData['invited_by_email']) ? $postData['invited_by_email'] : '';
                    $section_ertInfo = isset($postData['section_ert']) ? ($postData['section_ert']) : '';
                    $expertise_areaInfo = isset($postData['expertise_area']) ? json_encode($postData['expertise_area']) : '';
                    $ecosystem_affiliationInfo = isset($postData['ecosystem_affiliation']) ? json_encode($postData['ecosystem_affiliation']) : '';
                    $submission_typesInfo = isset($postData['submission_types']) ? $postData['submission_types'] : '';
                    $art_video_fileInfo = isset($art_video_file) ? $art_video_file : '';    

                if($postData['co_authors'] == '0'){
                     if($postData['submission_types'] == '1'){ 
                        
                        /* narrative images details */
                        // Define the number of co-authors you want to handle (e.g., 3 in this case)
                        $narrativeImagesCount = $postData['narrative_images'];
                        // Initialize empty arrays to hold the co-author data
                        $narrativeImageDesc = [];
                        $narrativeimageFile = [];                

                        // Loop through the number of co-authors and collect the data into arrays
                        for ($i = 1; $i <= $narrativeImagesCount; $i++) {
                            // Check if co-author name exists, to avoid null entries
                            if ($request->input("narrative_image_desc_{$i}") !== null) {
                                $narrativeImageDesc[] = $request->input("narrative_image_desc_{$i}");

                            // Add image file to the array (it can be null if no file is uploaded)                        
                                $imageFile      = $request->file("image_file_{$i}");                            
                                if ($imageFile != '') {                                
                                        $imageName      = $imageFile->getClientOriginalName();                                 
                                    $uploadedFile   = $this->upload_single_file("image_file_{$i}", $imageName, 'narrative', 'image');                                
                                    if ($uploadedFile['status']) {
                                        $narrativeimageFile[] = $uploadedFile['newFilename'];                                
                                    } else {
                                        $narrativeimageFile[] = null;                                    
                                    }
                                }                                                                                        
                            } 
                        }               
                        // Example of saving it to a database as a serialized array (optional, depends on your schema)
                        // $narrativeData = [
                        //     'narrative_image_desc' => json_encode($narrativeImageDesc),  // Storing as JSON string
                        //     'image_files' => json_encode($narrativeimageFile),                    
                        // ];
                        // dd($narrativeData);
                        /* narrative images details */

                        


                        /* narrative doc file */
                            $imageFile      = $request->file('narrative_file');
                            if ($imageFile != '') {
                                $imageName      = $imageFile->getClientOriginalName();
                                $uploadedFile   = $this->upload_single_file('narrative_file', $imageName, 'narrative', 'word');
                                if ($uploadedFile['status']) {
                                    $narrative_file = $uploadedFile['newFilename'];
                                } else {
                                    return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                                }
                            } 
                            // else {
                            //     return redirect()->back()->with(['error_message' => 'Please Upload narrative File']);
                            // }
                        /* narrative doc file */
                        //save to database//
                        if ($this->validate($request, $rules)) {                
                            $fields = [
                                'user_id'                      => 0,           
                                'email'                     => $postData['email'],
                                'author_classification'     => $postData['author_classification'],
                                'co_authors'                => $postData['co_authors'],                           
                                'first_name'                => $postData['first_name'],                                                                             
                                'for_publication_name'      => $postData['for_publication_name'],           
                                'pronounId'                 => $postData['pronoun'],
                                'orginal_work'              => $postData['orginal_work'],           
                                'copyright'                 => $postData['copyright'],
                                'invited'                   => $postData['invited'],
                                'invited_by'                => $invited_byInfo, 
                                'invited_by_email'          => $invited_emailInfo,
                                'participated'              => $postData['participated'],
                                'participated_info'         => $participatedInfo,
                                'explanation'               => $postData['explanation'],  
                                'explanation_submission'    => $postData['explanation_submission'],     
                                'titleId'                   => $postData['title'],                        
                                'creative_Work'             => $postData['creative_Work'],
                                'subtitle'                  => $postData['subtitle'],
                                'submission_types'          => $submission_typesInfo,
                                'section_ertId'             => $section_ertInfo,
                                'narrative_file'            => $narrative_file,
                                'narrative_images'          => $postData['narrative_images'],
                                'narrative_image_desc'      => json_encode($narrativeImageDesc),  // Storing as JSON string
                                'image_files'               => json_encode($narrativeimageFile),
                                // 'art_image_desc'            => json_encode($artImageDesc),  // Storing as JSON string
                                // 'art_image_file'            => json_encode($artimageFile),
                                // 'art_desc'                  => $postData['art_desc'],
                                // 'art_video_file'            => $art_video_fileInfo,
                                // 'art_video_desc'            => $postData['art_video_desc'],                                                                        
                                'country'                   => $postData['country'],
                                'state'                     => $postData['state'],
                                'city'                      => $postData['city'],
                                'organization_name'         => $postData['organization_name'],
                                'organization_website'      => $postData['organization_website'],
                                'ecosystem_affiliationId'   => $ecosystem_affiliationInfo,
                                'indigenous_affiliation'    => $postData['indigenous_affiliation'],
                                'expertise_areaId'          => $expertise_areaInfo,
                                'bio_short'               => $postData['bio_short'],
                                'bio_long'               => $postData['bio_long'],  
                            ];
                            // Helper::pr($fields);
                            Article::insert($fields);
                            return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' inserted successfully');
                        
                        } else {
                            return redirect()->back()->with('error_message', 'All fields required');
                        }
                    } else if($postData['submission_types'] == '2'){
                        /* art images details */
                        // Define the number of co-authors you want to handle (e.g., 3 in this case)
                        $artImagesCount = $postData['art_images'];
                        // Initialize empty arrays to hold the co-author data
                        $artImageDesc = [];
                        $artimageFile = [];                

                        // Loop through the number of co-authors and collect the data into arrays
                        for ($i = 1; $i <= $artImagesCount; $i++) {
                            // Check if co-author name exists, to avoid null entries
                            if ($request->input("art_image_desc_{$i}") !== null) {
                                $artImageDesc[] = $request->input("art_image_desc_{$i}");

                            // Add image file to the array (it can be null if no file is uploaded)                        
                                $imageFile      = $request->file("art_image_file_{$i}");                            
                                if ($imageFile != '') {                                
                                        $imageName      = $imageFile->getClientOriginalName();                                 
                                    $uploadedFile   = $this->upload_single_file("art_image_file_{$i}", $imageName, 'art_image', 'image');                                
                                    if ($uploadedFile['status']) {
                                        $artimageFile[] = $uploadedFile['newFilename'];                                
                                    } else {
                                        $artimageFile[] = null;                                    
                                    }
                                }                                                                                        
                            } 
                        }               
                        // Example of saving it to a database as a serialized array (optional, depends on your schema)
                        // $artData = [
                        //     'art_image_desc' => json_encode($artImageDesc),  // Storing as JSON string
                        //     'art_image_file' => json_encode($artimageFile),                    
                        // ];
                        // dd($artData);
                        /* art images details */

                        if ($this->validate($request, $rules)) {                
                            $fields = [
                                'user_id'                      => 0,           
                                'email'                     => $postData['email'],
                                'author_classification'     => $postData['author_classification'],
                                'co_authors'                => $postData['co_authors'],                           
                                'first_name'                => $postData['first_name'],                                                                             
                                'for_publication_name'      => $postData['for_publication_name'],           
                                'pronounId'                 => $postData['pronoun'],
                                'orginal_work'              => $postData['orginal_work'],           
                                'copyright'                 => $postData['copyright'],
                                'invited'                   => $postData['invited'],
                                'invited_by'                => $invited_byInfo, 
                                'invited_by_email'          => $invited_emailInfo,
                                'participated'              => $postData['participated'],
                                'participated_info'         => $participatedInfo,
                                'explanation'               => $postData['explanation'],  
                                'explanation_submission'    => $postData['explanation_submission'],     
                                'titleId'                   => $postData['title'],                        
                                'creative_Work'             => $postData['creative_Work'],
                                'subtitle'                  => $postData['subtitle'],
                                'submission_types'          => $submission_typesInfo,
                                'section_ertId'             => $section_ertInfo,
                                // 'narrative_file'            => $narrative_docInfo,
                                // 'narrative_images'          => $postData['narrative_images'],
                                // 'narrative_image_desc'      => json_encode($narrativeImageDesc),  // Storing as JSON string
                                // 'image_files'               => json_encode($narrativeimageFile),
                                'art_images'                => $postData['art_images'],
                                'art_image_desc'            => json_encode($artImageDesc),  // Storing as JSON string
                                'art_image_file'            => json_encode($artimageFile),
                                'art_desc'                  => $postData['art_desc'],
                                // 'art_video_file'            => $art_video_fileInfo,
                                // 'art_video_desc'            => $postData['art_video_desc'],                                                                        
                                'country'                   => $postData['country'],
                                'state'                     => $postData['state'],
                                'city'                      => $postData['city'],
                                'organization_name'         => $postData['organization_name'],
                                'organization_website'      => $postData['organization_website'],
                                'ecosystem_affiliationId'   => $ecosystem_affiliationInfo,
                                'indigenous_affiliation'    => $postData['indigenous_affiliation'],
                                'expertise_areaId'          => $expertise_areaInfo,
                                'bio_short'               => $postData['bio_short'],
                                'bio_long'               => $postData['bio_long'],  
                            ];
                            // Helper::pr($fields);
                            Article::insert($fields);
                            return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' inserted successfully');
                        
                        } else {
                            return redirect()->back()->with('error_message', 'All fields required');
                        }
                    } else {
                        /* art_video file */
                        $imageFile      = $request->file('art_video_file');
                        if ($imageFile != '') {
                            $imageName      = $imageFile->getClientOriginalName();
                            $uploadedFile   = $this->upload_single_file('art_video_file', $imageName, 'art_video', 'video');
                            if ($uploadedFile['status']) {
                                $art_video_file = $uploadedFile['newFilename'];
                            } else {
                                return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                            }
                        } 
                        // else {
                        //     return redirect()->back()->with(['error_message' => 'Please Upload art_video File']);
                        // }
                        /* art_video file */   
                        if ($this->validate($request, $rules)) {                
                            $fields = [
                                'user_id'                      => 0,           
                                'email'                     => $postData['email'],
                                'author_classification'     => $postData['author_classification'],
                                'co_authors'                => $postData['co_authors'],                           
                                'first_name'                => $postData['first_name'],                                                                             
                                'for_publication_name'      => $postData['for_publication_name'],           
                                'pronounId'                 => $postData['pronoun'],
                                'orginal_work'              => $postData['orginal_work'],           
                                'copyright'                 => $postData['copyright'],
                                'invited'                   => $postData['invited'],
                                'invited_by'                => $invited_byInfo, 
                                'invited_by_email'          => $invited_emailInfo,
                                'participated'              => $postData['participated'],
                                'participated_info'         => $participatedInfo,
                                'explanation'               => $postData['explanation'],  
                                'explanation_submission'    => $postData['explanation_submission'],     
                                'titleId'                   => $postData['title'],                        
                                'creative_Work'             => $postData['creative_Work'],
                                'subtitle'                  => $postData['subtitle'],
                                'submission_types'          => $submission_typesInfo,
                                'section_ertId'             => $section_ertInfo,                                
                                'art_video_file'            => $art_video_fileInfo,
                                'art_video_desc'            => $postData['art_video_desc'],                                                                        
                                'country'                   => $postData['country'],
                                'state'                     => $postData['state'],
                                'city'                      => $postData['city'],
                                'organization_name'         => $postData['organization_name'],
                                'organization_website'      => $postData['organization_website'],
                                'ecosystem_affiliationId'   => $ecosystem_affiliationInfo,
                                'indigenous_affiliation'    => $postData['indigenous_affiliation'],
                                'expertise_areaId'          => $expertise_areaInfo,
                                'bio_short'               => $postData['bio_short'],
                                'bio_long'               => $postData['bio_long'],  
                            ];
                            // Helper::pr($fields);
                            Article::insert($fields);
                            return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' inserted successfully');
                        
                        } else {
                            return redirect()->back()->with('error_message', 'All fields required');
                        }
                    }                
                } else {                    
                        /* co-author details */
                        // Define the number of co-authors you want to handle (e.g., 3 in this case)
                        $coAuthorsCount = $postData['co_authors'];
                        // Initialize empty arrays to hold the co-author data
                        $coAuthorNames = [];
                        $coAuthorBios = [];
                        $coAuthorCountries = [];
                        $coAuthorOrganizations = [];
                        $coecosystemAffiliations = [];
                        $coindigenousAffiliations = [];
                        $coauthorClassification = [];

                        // Loop through the number of co-authors and collect the data into arrays
                        for ($i = 1; $i <= $coAuthorsCount; $i++) {
                            // Check if co-author name exists, to avoid null entries
                            if ($request->input("co_author_name_{$i}") !== null) {
                                $coAuthorNames[] = $request->input("co_author_name_{$i}");
                                $coAuthorBios[] = $request->input("co_author_short_bio_{$i}");
                                $coAuthorCountries[] = $request->input("co_author_country_{$i}");
                                $coAuthorOrganizations[] = $request->input("co_authororganization_name_{$i}");
                                $coecosystemAffiliations[] = $request->input("co_ecosystem_affiliation_{$i}", []);
                                $coindigenousAffiliations[] = $request->input("co_indigenous_affiliation_{$i}");
                                $coauthorClassification[] = $request->input("co_author_classification_{$i}");
                            }
                        }                
                        // Example of saving it to a database as a serialized array (optional, depends on your schema)
                        // $authorData = [
                        //     'co_author_names' => json_encode($coAuthorNames),  // Storing as JSON string
                        //     'co_author_bios' => json_encode($coAuthorBios),
                        //     'co_author_countries' => json_encode($coAuthorCountries),
                        //     'co_author_organizations' => json_encode($coAuthorOrganizations),
                        //     'co_ecosystem_affiliations' => json_encode($coecosystemAffiliations),
                        //     'co_indigenous_affiliations' => json_encode($coindigenousAffiliations),
                        //     'co_author_classification' => json_encode($coauthorClassification),
                        // ];
                        // dd($authorData);
                        /* co-author details */
                                                                    
                        $participatedInfo = isset($postData['participated_info']) ? $postData['participated_info'] : '';
                        $invited_byInfo = isset($postData['invited_by']) ? $postData['invited_by'] : '';
                        $invited_emailInfo = isset($postData['invited_by_email']) ? $postData['invited_by_email'] : '';
                        $section_ertInfo = isset($postData['section_ert']) ? ($postData['section_ert']) : '';
                        $expertise_areaInfo = isset($postData['expertise_area']) ? json_encode($postData['expertise_area']) : '';
                        $ecosystem_affiliationInfo = isset($postData['ecosystem_affiliation']) ? json_encode($postData['ecosystem_affiliation']) : '';
                        $submission_typesInfo = isset($postData['submission_types']) ? $postData['submission_types'] : '';
                        // $narrative_docInfo = isset($narrative_file) ? $narrative_file : '';                             
                        // $art_video_fileInfo = isset($art_video_file) ? $art_video_file : '';    
                        //save to database//
                        if($postData['submission_types'] == '1'){    
                            
                            /* narrative images details */
                            // Define the number of co-authors you want to handle (e.g., 3 in this case)
                            $narrativeImagesCount = $postData['narrative_images'];
                            // Initialize empty arrays to hold the co-author data
                            $narrativeImageDesc = [];
                            $narrativeimageFile = [];                

                            // Loop through the number of co-authors and collect the data into arrays
                            for ($i = 1; $i <= $narrativeImagesCount; $i++) {
                                // Check if co-author name exists, to avoid null entries
                                if ($request->input("narrative_image_desc_{$i}") !== null) {
                                    $narrativeImageDesc[] = $request->input("narrative_image_desc_{$i}");

                                // Add image file to the array (it can be null if no file is uploaded)                        
                                    $imageFile      = $request->file("image_file_{$i}");                            
                                    if ($imageFile != '') {                                
                                            $imageName      = $imageFile->getClientOriginalName();                                 
                                        $uploadedFile   = $this->upload_single_file("image_file_{$i}", $imageName, 'narrative', 'image');                                
                                        if ($uploadedFile['status']) {
                                            $narrativeimageFile[] = $uploadedFile['newFilename'];                                
                                        } else {
                                            $narrativeimageFile[] = null;                                    
                                        }
                                    }                                                                                        
                                } 
                            }               
                            // Example of saving it to a database as a serialized array (optional, depends on your schema)
                            // $narrativeData = [
                            //     'narrative_image_desc' => json_encode($narrativeImageDesc),  // Storing as JSON string
                            //     'image_files' => json_encode($narrativeimageFile),                    
                            // ];
                            // dd($narrativeData);
                            /* narrative images details */
                    

                            /* narrative doc file */
                                $imageFile      = $request->file('narrative_file');
                                if ($imageFile != '') {
                                    $imageName      = $imageFile->getClientOriginalName();
                                    $uploadedFile   = $this->upload_single_file('narrative_file', $imageName, 'narrative', 'word');
                                    if ($uploadedFile['status']) {
                                        $narrative_file = $uploadedFile['newFilename'];
                                    } else {
                                        return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                                    }
                                } 
                                // else {
                                //     return redirect()->back()->with(['error_message' => 'Please Upload narrative File']);
                                // }
                            /* narrative doc file */
                            
                            //save to database//
                            if ($this->validate($request, $rules)) {                
                                $fields = [
                                    'user_id'                      => 0,           
                                    'email'                     => $postData['email'],
                                    'author_classification'     => $postData['author_classification'],
                                    'co_authors'                => $postData['co_authors'],
                                    'co_authors_position'       => $postData['co_authors_position'],
                                    'co_author_names'           => json_encode($coAuthorNames),  // Storing as JSON string
                                    'co_author_bios'            => json_encode($coAuthorBios),
                                    'co_author_countries'       => json_encode($coAuthorCountries),
                                    'co_author_organizations'   => json_encode($coAuthorOrganizations),
                                    'co_ecosystem_affiliations' => json_encode($coecosystemAffiliations),
                                    'co_indigenous_affiliations'=> json_encode($coindigenousAffiliations),
                                    'co_author_classification'  => json_encode($coauthorClassification),                           
                                    'first_name'                => $postData['first_name'],                                                                             
                                    'for_publication_name'      => $postData['for_publication_name'],           
                                    'pronounId'                 => $postData['pronoun'],
                                    'orginal_work'              => $postData['orginal_work'],           
                                    'copyright'                 => $postData['copyright'],
                                    'invited'                   => $postData['invited'],
                                    'invited_by'                => $invited_byInfo, 
                                    'invited_by_email'          => $invited_emailInfo,
                                    'participated'              => $postData['participated'],
                                    'participated_info'         => $participatedInfo,
                                    'explanation'               => $postData['explanation'],  
                                    'explanation_submission'    => $postData['explanation_submission'],     
                                    'titleId'                   => $postData['title'],                        
                                    'creative_Work'             => $postData['creative_Work'],
                                    'subtitle'                  => $postData['subtitle'],
                                    'submission_types'          => $submission_typesInfo,
                                    'section_ertId'             => $section_ertInfo,
                                    'narrative_file'            => $narrative_docInfo,
                                    'narrative_images'          => $postData['narrative_images'],
                                    'narrative_image_desc'      => json_encode($narrativeImageDesc),  // Storing as JSON string
                                    'image_files'               => json_encode($narrativeimageFile),
                                    // 'art_image_desc'            => json_encode($artImageDesc),  // Storing as JSON string
                                    // 'art_image_file'            => json_encode($artimageFile),
                                    // 'art_desc'                  => $postData['art_desc'],
                                    // 'art_video_file'            => $art_video_fileInfo,
                                    // 'art_video_desc'            => $postData['art_video_desc'],                                                                        
                                    'country'                   => $postData['country'],
                                    'state'                     => $postData['state'],
                                    'city'                      => $postData['city'],
                                    'organization_name'         => $postData['organization_name'],
                                    'organization_website'      => $postData['organization_website'],
                                    'ecosystem_affiliationId'   => $ecosystem_affiliationInfo,
                                    'indigenous_affiliation'    => $postData['indigenous_affiliation'],
                                    'expertise_areaId'          => $expertise_areaInfo,
                                    'bio_short'               => $postData['bio_short'],
                                    'bio_long'               => $postData['bio_long'],  
                                ];
                                // Helper::pr($fields);
                                Article::insert($fields);
                                return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' inserted successfully');
                            
                            } else {
                                return redirect()->back()->with('error_message', 'All fields required');
                            }
                        } else if($postData['submission_types'] == '2'){

                            /* art images details */
                            // Define the number of co-authors you want to handle (e.g., 3 in this case)
                            $artImagesCount = $postData['art_images'];
                            // Initialize empty arrays to hold the co-author data
                            $artImageDesc = [];
                            $artimageFile = [];                

                            // Loop through the number of co-authors and collect the data into arrays
                            for ($i = 1; $i <= $artImagesCount; $i++) {
                                // Check if co-author name exists, to avoid null entries
                                if ($request->input("art_image_desc_{$i}") !== null) {
                                    $artImageDesc[] = $request->input("art_image_desc_{$i}");

                                // Add image file to the array (it can be null if no file is uploaded)                        
                                    $imageFile      = $request->file("art_image_file_{$i}");                            
                                    if ($imageFile != '') {                                
                                            $imageName      = $imageFile->getClientOriginalName();                                 
                                        $uploadedFile   = $this->upload_single_file("art_image_file_{$i}", $imageName, 'art_image', 'image');                                
                                        if ($uploadedFile['status']) {
                                            $artimageFile[] = $uploadedFile['newFilename'];                                
                                        } else {
                                            $artimageFile[] = null;                                    
                                        }
                                    }                                                                                        
                                } 
                            }               
                            // Example of saving it to a database as a serialized array (optional, depends on your schema)
                            // $artData = [
                            //     'art_image_desc' => json_encode($artImageDesc),  // Storing as JSON string
                            //     'art_image_file' => json_encode($artimageFile),                    
                            // ];
                            // dd($artData);
                            /* art images details */

                            if ($this->validate($request, $rules)) {                
                                $fields = [
                                    'user_id'                      => 0,           
                                    'email'                     => $postData['email'],
                                    'author_classification'     => $postData['author_classification'],
                                    'co_authors'                => $postData['co_authors'],
                                    'co_authors_position'       => $postData['co_authors_position'],
                                    'co_author_names'           => json_encode($coAuthorNames),  // Storing as JSON string
                                    'co_author_bios'            => json_encode($coAuthorBios),
                                    'co_author_countries'       => json_encode($coAuthorCountries),
                                    'co_author_organizations'   => json_encode($coAuthorOrganizations),
                                    'co_ecosystem_affiliations' => json_encode($coecosystemAffiliations),
                                    'co_indigenous_affiliations'=> json_encode($coindigenousAffiliations),
                                    'co_author_classification'  => json_encode($coauthorClassification),                                
                                    'first_name'                => $postData['first_name'],                                                                             
                                    'for_publication_name'      => $postData['for_publication_name'],           
                                    'pronounId'                 => $postData['pronoun'],
                                    'orginal_work'              => $postData['orginal_work'],           
                                    'copyright'                 => $postData['copyright'],
                                    'invited'                   => $postData['invited'],
                                    'invited_by'                => $invited_byInfo, 
                                    'invited_by_email'          => $invited_emailInfo,
                                    'participated'              => $postData['participated'],
                                    'participated_info'         => $participatedInfo,
                                    'explanation'               => $postData['explanation'],  
                                    'explanation_submission'    => $postData['explanation_submission'],     
                                    'titleId'                   => $postData['title'],                        
                                    'creative_Work'             => $postData['creative_Work'],
                                    'subtitle'                  => $postData['subtitle'],
                                    'submission_types'          => $submission_typesInfo,
                                    'section_ertId'             => $section_ertInfo,
                                    // 'narrative_file'            => $narrative_docInfo,
                                    // 'narrative_images'          => $postData['narrative_images'],
                                    // 'narrative_image_desc'      => json_encode($narrativeImageDesc),  // Storing as JSON string
                                    // 'image_files'               => json_encode($narrativeimageFile),
                                    'art_images'                => $postData['art_images'],
                                    'art_image_desc'            => json_encode($artImageDesc),  // Storing as JSON string
                                    'art_image_file'            => json_encode($artimageFile),
                                    'art_desc'                  => $postData['art_desc'],
                                    // 'art_video_file'            => $art_video_fileInfo,
                                    // 'art_video_desc'            => $postData['art_video_desc'],                                                                        
                                    'country'                   => $postData['country'],
                                    'state'                     => $postData['state'],
                                    'city'                      => $postData['city'],
                                    'organization_name'         => $postData['organization_name'],
                                    'organization_website'      => $postData['organization_website'],
                                    'ecosystem_affiliationId'   => $ecosystem_affiliationInfo,
                                    'indigenous_affiliation'    => $postData['indigenous_affiliation'],
                                    'expertise_areaId'          => $expertise_areaInfo,
                                    'bio_short'               => $postData['bio_short'],
                                    'bio_long'               => $postData['bio_long'],  
                                ];
                                // Helper::pr($fields);
                                Article::insert($fields);
                                return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' inserted successfully');
                            
                            } else {
                                return redirect()->back()->with('error_message', 'All fields required');
                            }
                        } else {

                            /* art_video file */
                            $imageFile      = $request->file('art_video_file');
                            if ($imageFile != '') {
                                $imageName      = $imageFile->getClientOriginalName();
                                $uploadedFile   = $this->upload_single_file('art_video_file', $imageName, 'art_video', 'video');
                                if ($uploadedFile['status']) {
                                    $art_video_file = $uploadedFile['newFilename'];
                                } else {
                                    return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                                }
                            }                             
                            /* art_video file */   

                            if ($this->validate($request, $rules)) {                
                                $fields = [
                                    'user_id'                      => 0,           
                                    'email'                     => $postData['email'],
                                    'author_classification'     => $postData['author_classification'],
                                    'co_authors'                => $postData['co_authors'],
                                    'co_authors_position'       => $postData['co_authors_position'],
                                    'co_author_names'           => json_encode($coAuthorNames),  // Storing as JSON string
                                    'co_author_bios'            => json_encode($coAuthorBios),
                                    'co_author_countries'       => json_encode($coAuthorCountries),
                                    'co_author_organizations'   => json_encode($coAuthorOrganizations),
                                    'co_ecosystem_affiliations' => json_encode($coecosystemAffiliations),
                                    'co_indigenous_affiliations'=> json_encode($coindigenousAffiliations),
                                    'co_author_classification'  => json_encode($coauthorClassification),     
                                    'first_name'                => $postData['first_name'],                                                                             
                                    'for_publication_name'      => $postData['for_publication_name'],           
                                    'pronounId'                 => $postData['pronoun'],
                                    'orginal_work'              => $postData['orginal_work'],           
                                    'copyright'                 => $postData['copyright'],
                                    'invited'                   => $postData['invited'],
                                    'invited_by'                => $invited_byInfo, 
                                    'invited_by_email'          => $invited_emailInfo,
                                    'participated'              => $postData['participated'],
                                    'participated_info'         => $participatedInfo,
                                    'explanation'               => $postData['explanation'],  
                                    'explanation_submission'    => $postData['explanation_submission'],     
                                    'titleId'                   => $postData['title'],                        
                                    'creative_Work'             => $postData['creative_Work'],
                                    'subtitle'                  => $postData['subtitle'],
                                    'submission_types'          => $submission_typesInfo,
                                    'section_ertId'             => $section_ertInfo,                                
                                    'art_video_file'            => $art_video_file,
                                    'art_video_desc'            => $postData['art_video_desc'],                                                                        
                                    'country'                   => $postData['country'],
                                    'state'                     => $postData['state'],
                                    'city'                      => $postData['city'],
                                    'organization_name'         => $postData['organization_name'],
                                    'organization_website'      => $postData['organization_website'],
                                    'ecosystem_affiliationId'   => $ecosystem_affiliationInfo,
                                    'indigenous_affiliation'    => $postData['indigenous_affiliation'],
                                    'expertise_areaId'          => $expertise_areaInfo,
                                    'bio_short'               => $postData['bio_short'],
                                    'bio_long'               => $postData['bio_long'],  
                                ];
                                //  Helper::pr($fields);
                                Article::insert($fields);
                                return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' inserted successfully');
                            
                            } else {
                                return redirect()->back()->with('error_message', 'All fields required');
                            }
                        }        
                }
            }                        
        }
        $data['module']                 = $this->data;
        $title                          = $this->data['title'] . ' Add';
        $data['section_ert']            = SectionErt::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['news_category']          = NewsCategory::where('status', '=', 1)->where('parent_category', '=', 0)->orderBy('sub_category', 'ASC')->get();        
        $data['user_title']             = Title::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['submission_type']       = SubmissionType::where('status', '=', 1)->get();
        // dd($data['submission_types']);
        $data['country']                = Country::orderBy('name', 'ASC')->get();
        // dd($data['country']);
        $data['pronoun']                = Pronoun::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['ecosystem_affiliation']  = EcosystemAffiliation::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['expertise_area']         = ExpertiseArea::where('status', '=', 1)->orderBy('name', 'ASC')->get();        
        $page_name                      = 'article.add-edit';
        $data['row']                    = [];
        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
    /* add */
    /* edit */
    public function edit(Request $request, $id)
    {
        $data['module']                 = $this->data;
        $id                             = Helper::decoded($id);
        $title                          = $this->data['title'] . ' Update';
        $page_name                      = 'article.add-edit';
        $data['row']                    = Article::where($this->data['primary_key'], '=', $id)->first();
        $data['selected_ecosystem_affiliation'] = json_decode($data['row']->ecosystem_affiliationId);
        $data['news_category']          = NewsCategory::where('status', '=', 1)->where('parent_category', '=', 0)->orderBy('sub_category', 'ASC')->get();        
        $data['selected_expertise_area'] = json_decode($data['row']->expertise_areaId);
        $data['selected_section_ertId'] = json_decode($data['row']->section_ertId);
        $data['section_ert']            = SectionErt::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['user_title']             = Title::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['submission_type']       = SubmissionType::where('status', '=', 1)->orderBy('name', 'ASC')->get();        
        $data['country']                = Country::orderBy('name', 'ASC')->get();        
        $data['pronoun']                = Pronoun::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['ecosystem_affiliation']  = EcosystemAffiliation::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['expertise_area']         = ExpertiseArea::where('status', '=', 1)->orderBy('name', 'ASC')->get();

        if ($request->isMethod('post')) {
            $postData = $request->all();
            //    dd($postData);
            if ($postData['invited'] == 'No' && $postData['participated'] == 'No') {
                // echo "this section"; die;
                $rules = [
                    'first_name'                => 'required',                                                                
                    'email'                     => 'required',                                      
                    'for_publication_name'      => 'required',                                      
                    'orginal_work'              => 'required',                                     
                    'copyright'                 => 'required',                     
                    'title'                     => 'required',
                    'pronoun'                   => 'required',                   
                ];
                $participatedInfo = isset($postData['participated_info']) ? $postData['participated_info'] : '';
                $invited_byInfo = isset($postData['invited_by']) ? $postData['invited_by'] : '';
                $invited_emailInfo = isset($postData['invited_by_email']) ? $postData['invited_by_email'] : '';                    

                /* co-author details */
                // Define the number of co-authors you want to handle (e.g., 3 in this case)
                
                $coAuthorsCount = $postData['co_authors']; 
                // Initialize empty arrays to hold the co-author data
                $coAuthorNames = [];
                $coAuthorBios = [];
                $coAuthorCountries = [];
                $coAuthorOrganizations = [];
                $coecosystemAffiliations = [];
                $coindigenousAffiliations = [];
                $coauthorClassification = [];

                // Loop through the number of co-authors and collect the data into arrays
                for ($i = 1; $i <= $coAuthorsCount; $i++) {
                    // Check if co-author name exists, to avoid null entries
                    if ($request->input("co_author_name_{$i}") !== null) {
                        $coAuthorNames[] = $request->input("co_author_name_{$i}");
                        $coAuthorBios[] = $request->input("co_author_short_bio_{$i}");
                        $coAuthorCountries[] = $request->input("co_author_country_{$i}");
                        $coAuthorOrganizations[] = $request->input("co_authororganization_name_{$i}");
                        $coecosystemAffiliations[] = $request->input("co_ecosystem_affiliation_{$i}", []);
                        $coindigenousAffiliations[] = $request->input("co_indigenous_affiliation_{$i}");
                        $coauthorClassification[] = $request->input("co_author_classification_{$i}");
                    }
                }                
                // Example of saving it to a database as a serialized array (optional, depends on your schema)
                // $authorData = [
                //     'co_author_names' => json_encode($coAuthorNames),  // Storing as JSON string
                //     'co_author_bios' => json_encode($coAuthorBios),
                //     'co_author_countries' => json_encode($coAuthorCountries),
                //     'co_author_organizations' => json_encode($coAuthorOrganizations),
                //     'co_ecosystem_affiliations' => json_encode($coecosystemAffiliations),
                //     'co_indigenous_affiliations' => json_encode($coindigenousAffiliations),
                //     'co_author_classification' => json_encode($coauthorClassification),
                // ];
                // dd($authorData);
                /* co-author details */

                if($postData['co_authors'] == '0'){
                    
                    //save to database//
                    if ($this->validate($request, $rules)) {                
                        $fields = [
                            'user_id'                      => 0,           
                            'email'                     => $postData['email'],
                            'author_classification'     => $postData['author_classification'],
                            'co_authors'                => $postData['co_authors'],                            
                            'first_name'                => $postData['first_name'],                                                                             
                            'for_publication_name'      => $postData['for_publication_name'], 
                            'titleId'                   => $postData['title'],             
                            'pronounId'                 => $postData['pronoun'],
                            'orginal_work'              => $postData['orginal_work'],           
                            'copyright'                 => $postData['copyright'],
                            'invited'                   => $postData['invited'],
                            'invited_by'                => $invited_byInfo, 
                            'invited_by_email'          => $invited_emailInfo,
                            'participated'              => $postData['participated'],
                            'participated_info'         => $participatedInfo                       
                        ];
                        // Helper::pr($fields);
                        // Article::insert($fields);
                        Article::where($this->data['primary_key'], '=', $id)->update($fields);
                        return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' updated successfully');                    
                    } else {
                        return redirect()->back()->with('error_message', 'All fields required');
                    }
                } else{                    
                    //save to database//
                    if ($this->validate($request, $rules)) {                
                        $fields = [
                            'user_id'                      => 0,           
                            'email'                     => $postData['email'],
                            'author_classification'     => $postData['author_classification'],
                            'co_authors'                => $postData['co_authors'],
                            'co_authors_position'       => $postData['co_authors_position'],
                            'co_author_names'           => json_encode($coAuthorNames),  // Storing as JSON string
                            'co_author_bios'            => json_encode($coAuthorBios),
                            'co_author_countries'       => json_encode($coAuthorCountries),
                            'co_author_organizations'   => json_encode($coAuthorOrganizations),
                            'co_ecosystem_affiliations' => json_encode($coecosystemAffiliations),
                            'co_indigenous_affiliations'=> json_encode($coindigenousAffiliations),
                            'co_author_classification'  => json_encode($coauthorClassification),
                            'first_name'                => $postData['first_name'],                                                                             
                            'for_publication_name'      => $postData['for_publication_name'], 
                            'titleId'                   => $postData['title'],             
                            'pronounId'                 => $postData['pronoun'],
                            'orginal_work'              => $postData['orginal_work'],           
                            'copyright'                 => $postData['copyright'],
                            'invited'                   => $postData['invited'],
                            'invited_by'                => $invited_byInfo, 
                            'invited_by_email'          => $invited_emailInfo,
                            'participated'              => $postData['participated'],
                            'participated_info'         => $participatedInfo                       
                        ];
                        // Helper::pr($fields);
                        // Article::insert($fields);
                        Article::where($this->data['primary_key'], '=', $id)->update($fields);
                        return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' updated successfully');                    
                    } else {
                        return redirect()->back()->with('error_message', 'All fields required');
                    }
                }
            } else{
                $rules = [
                    'author_classification'     => 'required',
                    'first_name'                => 'required',                                                               
                    'email'                     => 'required',                                      
                    'country'                   => 'required',                                     
                    'for_publication_name'      => 'required', 
                    'orginal_work'              => 'required', 
                    'copyright'                 => 'required', 
                    'submission_types'          => 'required',                
                    'state'                     => 'required', 
                    'city'                      => 'required', 
                    // 'acknowledge'               => 'required',                                                      
                    'section_ert'               => 'required',
                    'title'                     => 'required',
                    'pronoun'                   => 'required',                
                    'organization_name'         => 'required',
                    'organization_website'      => 'required',
                    'ecosystem_affiliation'     => 'required',               
                    'expertise_area'            => 'required',                
                    'explanation'               => ['required', 'string', new MaxWords(100)],
                    'explanation_submission'    => ['required', 'string', new MaxWords(150)],                
                    'creative_Work'             => ['required', 'string', new MaxWords(10)],
                    'subtitle'                  => ['required', 'string', new MaxWords(40)],                
                    'bio_short'                 => ['required', 'string', new MaxWords(40)],
                    'bio_long'                  => ['required', 'string', new MaxWords(250)], 
                    ];                                           
                    
                  /* co-author details */
                // Define the number of co-authors you want to handle (e.g., 3 in this case)
                
                $coAuthorsCount = $postData['co_authors']; 
                // Initialize empty arrays to hold the co-author data
                $coAuthorNames = [];
                $coAuthorBios = [];
                $coAuthorCountries = [];
                $coAuthorOrganizations = [];
                $coecosystemAffiliations = [];
                $coindigenousAffiliations = [];
                $coauthorClassification = [];

                // Loop through the number of co-authors and collect the data into arrays
                for ($i = 1; $i <= $coAuthorsCount; $i++) {
                    // Check if co-author name exists, to avoid null entries
                    if ($request->input("co_author_name_{$i}") !== null) {
                        $coAuthorNames[] = $request->input("co_author_name_{$i}");
                        $coAuthorBios[] = $request->input("co_author_short_bio_{$i}");
                        $coAuthorCountries[] = $request->input("co_author_country_{$i}");
                        $coAuthorOrganizations[] = $request->input("co_authororganization_name_{$i}");
                        $coecosystemAffiliations[] = $request->input("co_ecosystem_affiliation_{$i}", []);
                        $coindigenousAffiliations[] = $request->input("co_indigenous_affiliation_{$i}");
                        $coauthorClassification[] = $request->input("co_author_classification_{$i}");
                    }
                }                
                // Example of saving it to a database as a serialized array (optional, depends on your schema)
                //  $authorData = [
                //     'co_author_names' => json_encode($coAuthorNames),  // Storing as JSON string
                //     'co_author_bios' => json_encode($coAuthorBios),
                //     'co_author_countries' => json_encode($coAuthorCountries),
                //     'co_author_organizations' => json_encode($coAuthorOrganizations),
                //     'co_ecosystem_affiliations' => json_encode($coecosystemAffiliations),
                //     'co_indigenous_affiliations' => json_encode($coindigenousAffiliations),
                //     'co_author_classification' => json_encode($coauthorClassification),
                // ];
                // dd($authorData);
                /* co-author details */
                          
                    $participatedInfo = isset($postData['participated_info']) ? $postData['participated_info'] : '';
                    $invited_byInfo = isset($postData['invited_by']) ? $postData['invited_by'] : '';
                    $invited_emailInfo = isset($postData['invited_by_email']) ? $postData['invited_by_email'] : '';
                    $section_ertInfo = isset($postData['section_ert']) ? ($postData['section_ert']) : '';
                    $expertise_areaInfo = isset($postData['expertise_area']) ? json_encode($postData['expertise_area']) : '';
                    $ecosystem_affiliationInfo = isset($postData['ecosystem_affiliation']) ? json_encode($postData['ecosystem_affiliation']) : '';
                    $submission_typesInfo = isset($postData['submission_types']) ? $postData['submission_types'] : '';                    
                    

                if($postData['co_authors'] == '0'){
                     if($postData['submission_types'] == '1'){  
                        /* narrative images details */
                        // Define the number of co-authors you want to handle (e.g., 3 in this case)
                        $narrativeImagesCount = $postData['narrative_images'];
                        // Initialize empty arrays to hold the co-author data
                        $narrativeImageDesc = [];
                        $narrativeimageFile = [];    
                        $exsisting_image = [];            
                        $exsisting_image = json_decode($data['row']->image_files);
                        // Loop through the number of co-authors and collect the data into arrays
                        for ($i = 1; $i <= $narrativeImagesCount; $i++) {
                            // Check if co-author name exists, to avoid null entries
                            if ($request->input("narrative_image_desc_{$i}") !== null) {
                                $narrativeImageDesc[] = $request->input("narrative_image_desc_{$i}");

                            // Add image file to the array (it can be null if no file is uploaded)                        
                                $imageFile      = $request->file("image_file_{$i}");
                                if ($imageFile != '') {                                
                                        $imageName      = $imageFile->getClientOriginalName();                                 
                                    $uploadedFile   = $this->upload_single_file("image_file_{$i}", $imageName, 'narrative', 'image');                                
                                    if ($uploadedFile['status']) {
                                    $narrativeimageFile[] = $uploadedFile['newFilename'];                                     
                                    } else {
                                        $narrativeimageFile[] = null;                                    
                                    }
                                }  else {
                                $narrativeimageFile[] = $exsisting_image[$i-1];                                                              
                                }                                                                                         
                            } 
                        }                              
                        // Example of saving it to a database as a serialized array (optional, depends on your schema)
                        // $narrativeData = [
                        //     'narrative_image_desc' => json_encode($narrativeImageDesc),  // Storing as JSON string
                        //     'image_files' => json_encode($narrativeimageFile),                    
                        // ];
                        // dd($narrativeData);
                        /* narrative images details */                    


                        /* narrative doc file */
                            $imageFile      = $request->file('narrative_file');
                            if ($imageFile != '') {
                                $imageName      = $imageFile->getClientOriginalName();
                                $uploadedFile   = $this->upload_single_file('narrative_file', $imageName, 'narrative', 'word');
                                if ($uploadedFile['status']) {
                                    $narrative_file = $uploadedFile['newFilename'];
                                } else {
                                    return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                                }
                            } 
                            else {
                                $narrative_file = $data['row']->narrative_file;
                                // return redirect()->back()->with(['error_message' => 'Please Upload art_image File']);
                            }
                        /* narrative doc file */
                        
                        //save to database//
                        if ($this->validate($request, $rules)) {                
                            $fields = [
                                'user_id'                      => 0,           
                                'email'                     => $postData['email'],
                                'author_classification'     => $postData['author_classification'],
                                'co_authors'                => $postData['co_authors'],     
                                'co_author_names'           => json_encode($coAuthorNames),  // Storing as JSON string
                                'co_author_bios'            => json_encode($coAuthorBios),
                                'co_author_countries'       => json_encode($coAuthorCountries),
                                'co_author_organizations'   => json_encode($coAuthorOrganizations),
                                'co_ecosystem_affiliations' => json_encode($coecosystemAffiliations),
                                'co_indigenous_affiliations'=> json_encode($coindigenousAffiliations),
                                'co_author_classification'  => json_encode($coauthorClassification),                      
                                'first_name'                => $postData['first_name'],                                                                             
                                'for_publication_name'      => $postData['for_publication_name'],           
                                'pronounId'                 => $postData['pronoun'],
                                'orginal_work'              => $postData['orginal_work'],           
                                'copyright'                 => $postData['copyright'],
                                'invited'                   => $postData['invited'],
                                'invited_by'                => $invited_byInfo, 
                                'invited_by_email'          => $invited_emailInfo,
                                'participated'              => $postData['participated'],
                                'participated_info'         => $participatedInfo,
                                'explanation'               => $postData['explanation'],  
                                'explanation_submission'    => $postData['explanation_submission'],     
                                'titleId'                   => $postData['title'],                        
                                'creative_Work'             => $postData['creative_Work'],
                                'subtitle'                  => $postData['subtitle'],
                                'submission_types'          => $submission_typesInfo,
                                'section_ertId'             => $section_ertInfo,
                                'narrative_file'            => $narrative_file,
                                'narrative_images'          => $postData['narrative_images'],
                                'narrative_image_desc'      => json_encode($narrativeImageDesc),  // Storing as JSON string
                                'image_files'               => json_encode($narrativeimageFile),
                                'art_image_desc'            => null,  // Storing as JSON string
                                'art_image_file'            => null,
                                'art_desc'                  => null,
                                'art_video_file'            => null,
                                'art_video_desc'            => null,                                                                                
                                'country'                   => $postData['country'],
                                'state'                     => $postData['state'],
                                'city'                      => $postData['city'],
                                'organization_name'         => $postData['organization_name'],
                                'organization_website'      => $postData['organization_website'],
                                'ecosystem_affiliationId'   => $ecosystem_affiliationInfo,
                                'indigenous_affiliation'    => $postData['indigenous_affiliation'],
                                'expertise_areaId'          => $expertise_areaInfo,
                                'bio_short'               => $postData['bio_short'],
                                'bio_long'               => $postData['bio_long'],  
                            ];
                            // Helper::pr($fields);
                            // Article::insert($fields);
                            Article::where($this->data['primary_key'], '=', $id)->update($fields);
                            return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' updated successfully');
                        
                        } else {
                            return redirect()->back()->with('error_message', 'All fields required');
                        }
                    } else if($postData['submission_types'] == '2'){
                        /* art images details */
                        // Define the number of co-authors you want to handle (e.g., 3 in this case)
                        $artImagesCount = $postData['art_images'];
                        // Initialize empty arrays to hold the co-author data
                        $artImageDesc = [];
                        $artimageFile = [];    
                        $exsisting_artimage = [];            
                        $exsisting_artimage = json_decode($data['row']->art_image_file);            

                        // Loop through the number of co-authors and collect the data into arrays
                        for ($i = 1; $i <= $artImagesCount; $i++) {
                            // Check if co-author name exists, to avoid null entries
                            if ($request->input("art_image_desc_{$i}") !== null) {
                                $artImageDesc[] = $request->input("art_image_desc_{$i}");

                            // Add image file to the array (it can be null if no file is uploaded)                        
                                $imageFile      = $request->file("art_image_file_{$i}");                            
                                if ($imageFile != '') {                                
                                        $imageName      = $imageFile->getClientOriginalName();                                 
                                    $uploadedFile   = $this->upload_single_file("art_image_file_{$i}", $imageName, 'art_image', 'image');                                
                                    if ($uploadedFile['status']) {
                                        $artimageFile[] = $uploadedFile['newFilename'];                                
                                    } else {
                                        $artimageFile[] = null;                                    
                                    }
                                } else {
                                    $artimageFile[] = $exsisting_artimage[$i-1];
                                    // return redirect()->back()->with(['error_message' => 'Please Upload art_image File']);
                                }                                                                                       
                            } 
                        }               
                        // Example of saving it to a database as a serialized array (optional, depends on your schema)
                        // $artData = [
                        //     'art_image_desc' => json_encode($artImageDesc),  // Storing as JSON string
                        //     'art_image_file' => json_encode($artimageFile),                    
                        // ];
                        // dd($artData);
                        /* art images details */
                        
                        if ($this->validate($request, $rules)) {                
                            $fields = [
                                'user_id'                      => 0,           
                                'email'                     => $postData['email'],
                                'author_classification'     => $postData['author_classification'],
                                'co_authors'                => $postData['co_authors'],
                                'co_author_names'           => json_encode($coAuthorNames),  // Storing as JSON string
                                'co_author_bios'            => json_encode($coAuthorBios),
                                'co_author_countries'       => json_encode($coAuthorCountries),
                                'co_author_organizations'   => json_encode($coAuthorOrganizations),
                                'co_ecosystem_affiliations' => json_encode($coecosystemAffiliations),
                                'co_indigenous_affiliations'=> json_encode($coindigenousAffiliations),
                                'co_author_classification'  => json_encode($coauthorClassification),                           
                                'first_name'                => $postData['first_name'],                                                                             
                                'for_publication_name'      => $postData['for_publication_name'],           
                                'pronounId'                 => $postData['pronoun'],
                                'orginal_work'              => $postData['orginal_work'],           
                                'copyright'                 => $postData['copyright'],
                                'invited'                   => $postData['invited'],
                                'invited_by'                => $invited_byInfo, 
                                'invited_by_email'          => $invited_emailInfo,
                                'participated'              => $postData['participated'],
                                'participated_info'         => $participatedInfo,
                                'explanation'               => $postData['explanation'],  
                                'explanation_submission'    => $postData['explanation_submission'],     
                                'titleId'                   => $postData['title'],                        
                                'creative_Work'             => $postData['creative_Work'],
                                'subtitle'                  => $postData['subtitle'],
                                'submission_types'          => $submission_typesInfo,
                                'section_ertId'             => $section_ertInfo,
                                'narrative_file'            => null,
                                'narrative_images'          => null,
                                'narrative_image_desc'      => null,  // Storing as JSON string
                                'image_files'               => null,
                                'art_images'                => $postData['art_images'],
                                'art_image_desc'            => json_encode($artImageDesc),  // Storing as JSON string
                                'art_image_file'            => json_encode($artimageFile),
                                'art_desc'                  => $postData['art_desc'],
                                'art_video_file'            => null,
                                'art_video_desc'            => null,                                                                                               
                                'country'                   => $postData['country'],
                                'state'                     => $postData['state'],
                                'city'                      => $postData['city'],
                                'organization_name'         => $postData['organization_name'],
                                'organization_website'      => $postData['organization_website'],
                                'ecosystem_affiliationId'   => $ecosystem_affiliationInfo,
                                'indigenous_affiliation'    => $postData['indigenous_affiliation'],
                                'expertise_areaId'          => $expertise_areaInfo,
                                'bio_short'               => $postData['bio_short'],
                                'bio_long'               => $postData['bio_long'],  
                            ];
                            // Helper::pr($fields);
                            // Article::insert($fields);
                            Article::where($this->data['primary_key'], '=', $id)->update($fields);
                            return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' updated successfully');
                        
                        } else {
                            return redirect()->back()->with('error_message', 'All fields required');
                        }
                    } else {                        
                        /* art_video file */
                         $imageFile      = $request->file('art_video_file');
                        if ($imageFile != '') {
                             $imageName      = $imageFile->getClientOriginalName();
                            $uploadedFile   = $this->upload_single_file('art_video_file', $imageName, 'art_video', 'video');
                            if ($uploadedFile['status']) {
                                 $art_video_file = $uploadedFile['newFilename'];
                                // echo "new";
                            } else {
                                return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                            }
                        } 
                        else {
                            $art_video_file = $data['row']->art_video_file;
                            // echo "exsisting";
                            // return redirect()->back()->with(['error_message' => 'Please Upload art_image File']);
                        } 

                        // dd($art_video_fileInfo);
                        /* art_video file */  

                        if ($this->validate($request, $rules)) {                
                            $fields = [
                                'user_id'                      => 0,           
                                'email'                     => $postData['email'],
                                'author_classification'     => $postData['author_classification'],
                                'co_authors'                => $postData['co_authors'],
                                'co_author_names'           => json_encode($coAuthorNames),  // Storing as JSON string
                                'co_author_bios'            => json_encode($coAuthorBios),
                                'co_author_countries'       => json_encode($coAuthorCountries),
                                'co_author_organizations'   => json_encode($coAuthorOrganizations),
                                'co_ecosystem_affiliations' => json_encode($coecosystemAffiliations),
                                'co_indigenous_affiliations'=> json_encode($coindigenousAffiliations),
                                'co_author_classification'  => json_encode($coauthorClassification),                           
                                'first_name'                => $postData['first_name'],                                                                             
                                'for_publication_name'      => $postData['for_publication_name'],           
                                'pronounId'                 => $postData['pronoun'],
                                'orginal_work'              => $postData['orginal_work'],           
                                'copyright'                 => $postData['copyright'],
                                'invited'                   => $postData['invited'],
                                'invited_by'                => $invited_byInfo, 
                                'invited_by_email'          => $invited_emailInfo,
                                'participated'              => $postData['participated'],
                                'participated_info'         => $participatedInfo,
                                'explanation'               => $postData['explanation'],  
                                'explanation_submission'    => $postData['explanation_submission'],     
                                'titleId'                   => $postData['title'],                        
                                'creative_Work'             => $postData['creative_Work'],
                                'subtitle'                  => $postData['subtitle'],
                                'submission_types'          => $submission_typesInfo,
                                'section_ertId'             => $section_ertInfo, 
                                'narrative_file'            => null,
                                'narrative_images'          => null,
                                'narrative_image_desc'      => null,  // Storing as JSON string
                                'image_files'               => null,
                                'art_images'                => null,
                                'art_image_desc'            => null,  // Storing as JSON string
                                'art_image_file'            => null,
                                'art_desc'                  => null,                                       
                                'art_video_file'            => $art_video_file,
                                'art_video_desc'            => $postData['art_video_desc'],                                                                        
                                'country'                   => $postData['country'],
                                'state'                     => $postData['state'],
                                'city'                      => $postData['city'],
                                'organization_name'         => $postData['organization_name'],
                                'organization_website'      => $postData['organization_website'],
                                'ecosystem_affiliationId'   => $ecosystem_affiliationInfo,
                                'indigenous_affiliation'    => $postData['indigenous_affiliation'],
                                'expertise_areaId'          => $expertise_areaInfo,
                                'bio_short'               => $postData['bio_short'],
                                'bio_long'               => $postData['bio_long'],  
                            ];
                            //  Helper::pr($fields);
                            // Article::insert($fields);
                            Article::where($this->data['primary_key'], '=', $id)->update($fields);
                            return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' updated successfully');
                        
                        } else {
                            return redirect()->back()->with('error_message', 'All fields required');
                        }
                    }                
                } else {                                                                                                                    
                        // $participatedInfo = isset($postData['participated_info']) ? $postData['participated_info'] : '';
                        // $invited_byInfo = isset($postData['invited_by']) ? $postData['invited_by'] : '';
                        // $invited_emailInfo = isset($postData['invited_by_email']) ? $postData['invited_by_email'] : '';
                        // $section_ertInfo = isset($postData['section_ert']) ? ($postData['section_ert']) : '';
                        // $expertise_areaInfo = isset($postData['expertise_area']) ? json_encode($postData['expertise_area']) : '';
                        // $ecosystem_affiliationInfo = isset($postData['ecosystem_affiliation']) ? json_encode($postData['ecosystem_affiliation']) : '';
                        // $submission_typesInfo = isset($postData['submission_types']) ? $postData['submission_types'] : '';
                        // $narrative_docInfo = isset($narrative_file) ? $narrative_file : '';                                                       
                        //save to database//
                        if($postData['submission_types'] == '1'){         
                            
                            /* narrative images details */
                            // Define the number of co-authors you want to handle (e.g., 3 in this case)
                            $narrativeImagesCount = $postData['narrative_images'];
                            // Initialize empty arrays to hold the co-author data
                            $narrativeImageDesc = [];
                            $narrativeimageFile = [];    
                            $exsisting_image = [];            
                            $exsisting_image = json_decode($data['row']->image_files);
                            // Loop through the number of co-authors and collect the data into arrays
                            for ($i = 1; $i <= $narrativeImagesCount; $i++) {
                                // Check if co-author name exists, to avoid null entries
                                if ($request->input("narrative_image_desc_{$i}") !== null) {
                                    $narrativeImageDesc[] = $request->input("narrative_image_desc_{$i}");

                                // Add image file to the array (it can be null if no file is uploaded)                        
                                    $imageFile      = $request->file("image_file_{$i}");
                                    if ($imageFile != '') {                                
                                            $imageName      = $imageFile->getClientOriginalName();                                 
                                        $uploadedFile   = $this->upload_single_file("image_file_{$i}", $imageName, 'narrative', 'image');                                
                                        if ($uploadedFile['status']) {
                                        $narrativeimageFile[] = $uploadedFile['newFilename'];                                     
                                        } else {
                                            $narrativeimageFile[] = null;                                    
                                        }
                                    }  else {
                                    $narrativeimageFile[] = $exsisting_image[$i-1];                                                              
                                    }                                                                                         
                                } 
                            }                              
                            // Example of saving it to a database as a serialized array (optional, depends on your schema)
                            // $narrativeData = [
                            //     'narrative_image_desc' => json_encode($narrativeImageDesc),  // Storing as JSON string
                            //     'image_files' => json_encode($narrativeimageFile),                    
                            // ];
                            // dd($narrativeData);
                            /* narrative images details */                                            
        
                            /* narrative doc file */
                                $imageFile      = $request->file('narrative_file');
                                if ($imageFile != '') {
                                    $imageName      = $imageFile->getClientOriginalName();
                                    $uploadedFile   = $this->upload_single_file('narrative_file', $imageName, 'narrative', 'word');
                                    if ($uploadedFile['status']) {
                                        $narrative_file = $uploadedFile['newFilename'];
                                    } else {
                                        return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                                    }
                                } else {
                                    $narrative_file = $data['row']->narrative_file;
                                    // return redirect()->back()->with(['error_message' => 'Please Upload art_image File']);
                                }                            
                            /* narrative doc file */

                            //save to database//
                            if ($this->validate($request, $rules)) {                
                                $fields = [
                                    'user_id'                      => 0,           
                                    'email'                     => $postData['email'],
                                    'author_classification'     => $postData['author_classification'],
                                    'co_authors'                => $postData['co_authors'],
                                    'co_authors_position'       => $postData['co_authors_position'],
                                    'co_author_names'           => json_encode($coAuthorNames),  // Storing as JSON string
                                    'co_author_bios'            => json_encode($coAuthorBios),
                                    'co_author_countries'       => json_encode($coAuthorCountries),
                                    'co_author_organizations'   => json_encode($coAuthorOrganizations),
                                    'co_ecosystem_affiliations' => json_encode($coecosystemAffiliations),
                                    'co_indigenous_affiliations'=> json_encode($coindigenousAffiliations),
                                    'co_author_classification'  => json_encode($coauthorClassification),                           
                                    'first_name'                => $postData['first_name'],                                                                             
                                    'for_publication_name'      => $postData['for_publication_name'],           
                                    'pronounId'                 => $postData['pronoun'],
                                    'orginal_work'              => $postData['orginal_work'],           
                                    'copyright'                 => $postData['copyright'],
                                    'invited'                   => $postData['invited'],
                                    'invited_by'                => $invited_byInfo, 
                                    'invited_by_email'          => $invited_emailInfo,
                                    'participated'              => $postData['participated'],
                                    'participated_info'         => $participatedInfo,
                                    'explanation'               => $postData['explanation'],  
                                    'explanation_submission'    => $postData['explanation_submission'],     
                                    'titleId'                   => $postData['title'],                        
                                    'creative_Work'             => $postData['creative_Work'],
                                    'subtitle'                  => $postData['subtitle'],
                                    'submission_types'          => $submission_typesInfo,
                                    'section_ertId'             => $section_ertInfo,
                                    'narrative_file'            => $narrative_file,
                                    'narrative_images'          => $postData['narrative_images'],
                                    'narrative_image_desc'      => json_encode($narrativeImageDesc),  // Storing as JSON string
                                    'image_files'               => json_encode($narrativeimageFile),
                                    'art_images'                => null,
                                    'art_image_desc'            => null,  // Storing as JSON string
                                    'art_image_file'            => null,
                                    'art_desc'                  => null,
                                    'art_video_file'            => null,
                                    'art_video_desc'            => null,                                                                        
                                    'country'                   => $postData['country'],
                                    'state'                     => $postData['state'],
                                    'city'                      => $postData['city'],
                                    'organization_name'         => $postData['organization_name'],
                                    'organization_website'      => $postData['organization_website'],
                                    'ecosystem_affiliationId'   => $ecosystem_affiliationInfo,
                                    'indigenous_affiliation'    => $postData['indigenous_affiliation'],
                                    'expertise_areaId'          => $expertise_areaInfo,
                                    'bio_short'               => $postData['bio_short'],
                                    'bio_long'               => $postData['bio_long'],  
                                ];
                                //   Helper::pr($fields);
                                // Article::insert($fields);
                                Article::where($this->data['primary_key'], '=', $id)->update($fields);
                                return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' updated successfully');
                            
                            } else {
                                return redirect()->back()->with('error_message', 'All fields required');
                            }
                        } else if($postData['submission_types'] == '2'){
                            /* art images details */
                            // Define the number of co-authors you want to handle (e.g., 3 in this case)
                            $artImagesCount = $postData['art_images'];
                            // Initialize empty arrays to hold the co-author data
                            $artImageDesc = [];
                            $artimageFile = [];    
                            $exsisting_artimage = [];            
                            $exsisting_artimage = json_decode($data['row']->art_image_file);            
                            // dd($exsisting_artimage);

                            // Loop through the number of co-authors and collect the data into arrays
                            for ($i = 1; $i <= $artImagesCount; $i++) {
                                // Check if co-author name exists, to avoid null entries
                                if ($request->input("art_image_desc_{$i}") !== null) {
                                    $artImageDesc[] = $request->input("art_image_desc_{$i}");

                                // Add image file to the array (it can be null if no file is uploaded)                        
                                    $imageFile      = $request->file("art_image_file_{$i}");                            
                                    if ($imageFile != '') {                                
                                            $imageName      = $imageFile->getClientOriginalName();                                 
                                        $uploadedFile   = $this->upload_single_file("art_image_file_{$i}", $imageName, 'art_image', 'image');                                
                                        if ($uploadedFile['status']) {
                                            $artimageFile[] = $uploadedFile['newFilename'];                                
                                        } else {
                                            $artimageFile[] = null;                                    
                                        }
                                    } else {
                                        $artimageFile[] = $exsisting_artimage[$i-1];
                                        // return redirect()->back()->with(['error_message' => 'Please Upload art_image File']);
                                    }                                                                                       
                                } 
                            }               
                            // Example of saving it to a database as a serialized array (optional, depends on your schema)
                            // $artData = [
                            //     'art_image_desc' => json_encode($artImageDesc),  // Storing as JSON string
                            //     'art_image_file' => json_encode($artimageFile),                    
                            // ];
                            // dd($artData);
                            /* art images details */

                            if ($this->validate($request, $rules)) {                
                                $fields = [
                                    'user_id'                      => 0,           
                                    'email'                     => $postData['email'],
                                    'author_classification'     => $postData['author_classification'],
                                    'co_authors'                => $postData['co_authors'],
                                    'co_authors_position'       => $postData['co_authors_position'],
                                    'co_author_names'           => json_encode($coAuthorNames),  // Storing as JSON string
                                    'co_author_bios'            => json_encode($coAuthorBios),
                                    'co_author_countries'       => json_encode($coAuthorCountries),
                                    'co_author_organizations'   => json_encode($coAuthorOrganizations),
                                    'co_ecosystem_affiliations' => json_encode($coecosystemAffiliations),
                                    'co_indigenous_affiliations'=> json_encode($coindigenousAffiliations),
                                    'co_author_classification'  => json_encode($coauthorClassification),                                
                                    'first_name'                => $postData['first_name'],                                                                             
                                    'for_publication_name'      => $postData['for_publication_name'],           
                                    'pronounId'                 => $postData['pronoun'],
                                    'orginal_work'              => $postData['orginal_work'],           
                                    'copyright'                 => $postData['copyright'],
                                    'invited'                   => $postData['invited'],
                                    'invited_by'                => $invited_byInfo, 
                                    'invited_by_email'          => $invited_emailInfo,
                                    'participated'              => $postData['participated'],
                                    'participated_info'         => $participatedInfo,
                                    'explanation'               => $postData['explanation'],  
                                    'explanation_submission'    => $postData['explanation_submission'],     
                                    'titleId'                   => $postData['title'],                        
                                    'creative_Work'             => $postData['creative_Work'],
                                    'subtitle'                  => $postData['subtitle'],
                                    'submission_types'          => $submission_typesInfo,
                                    'section_ertId'             => $section_ertInfo,
                                    'narrative_file'            => null,
                                    'narrative_images'          => null,
                                    'narrative_image_desc'      => null,  // Storing as JSON string
                                    'image_files'               => null,
                                    'art_images'                => $postData['art_images'],
                                    'art_image_desc'            => json_encode($artImageDesc),  // Storing as JSON string
                                    'art_image_file'            => json_encode($artimageFile),
                                    'art_desc'                  => $postData['art_desc'],
                                    'art_video_file'            => null,
                                    'art_video_desc'            => null,                                                                        
                                    'country'                   => $postData['country'],
                                    'state'                     => $postData['state'],
                                    'city'                      => $postData['city'],
                                    'organization_name'         => $postData['organization_name'],
                                    'organization_website'      => $postData['organization_website'],
                                    'ecosystem_affiliationId'   => $ecosystem_affiliationInfo,
                                    'indigenous_affiliation'    => $postData['indigenous_affiliation'],
                                    'expertise_areaId'          => $expertise_areaInfo,
                                    'bio_short'               => $postData['bio_short'],
                                    'bio_long'               => $postData['bio_long'],  
                                ];
                                //   Helper::pr($fields);
                                //Article::insert($fields);
                                Article::where($this->data['primary_key'], '=', $id)->update($fields);
                                return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' updated successfully');
                            
                            } else {
                                return redirect()->back()->with('error_message', 'All fields required');
                            }
                        } else {

                            /* art_video file */
                            $imageFile      = $request->file('art_video_file');
                            if ($imageFile != '') {
                                $imageName      = $imageFile->getClientOriginalName();
                                $uploadedFile   = $this->upload_single_file('art_video_file', $imageName, 'art_video', 'video');
                                if ($uploadedFile['status']) {
                                    $art_video_file = $uploadedFile['newFilename'];
                                } else {
                                    return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                                }
                            }else {
                                $art_video_file = $data['row']->art_video_file;
                                // return redirect()->back()->with(['error_message' => 'Please Upload art_image File']);
                            }                       
                            /* art_video file */        

                            if ($this->validate($request, $rules)) {                
                                $fields = [
                                    'user_id'                      => 0,           
                                    'email'                     => $postData['email'],
                                    'author_classification'     => $postData['author_classification'],
                                    'co_authors'                => $postData['co_authors'],
                                    'co_authors_position'       => $postData['co_authors_position'],
                                    'co_author_names'           => json_encode($coAuthorNames),  // Storing as JSON string
                                    'co_author_bios'            => json_encode($coAuthorBios),
                                    'co_author_countries'       => json_encode($coAuthorCountries),
                                    'co_author_organizations'   => json_encode($coAuthorOrganizations),
                                    'co_ecosystem_affiliations' => json_encode($coecosystemAffiliations),
                                    'co_indigenous_affiliations'=> json_encode($coindigenousAffiliations),
                                    'co_author_classification'  => json_encode($coauthorClassification),     
                                    'first_name'                => $postData['first_name'],                                                                             
                                    'for_publication_name'      => $postData['for_publication_name'],           
                                    'pronounId'                 => $postData['pronoun'],
                                    'orginal_work'              => $postData['orginal_work'],           
                                    'copyright'                 => $postData['copyright'],
                                    'invited'                   => $postData['invited'],
                                    'invited_by'                => $invited_byInfo, 
                                    'invited_by_email'          => $invited_emailInfo,
                                    'participated'              => $postData['participated'],
                                    'participated_info'         => $participatedInfo,
                                    'explanation'               => $postData['explanation'],  
                                    'explanation_submission'    => $postData['explanation_submission'],     
                                    'titleId'                   => $postData['title'],                        
                                    'creative_Work'             => $postData['creative_Work'],
                                    'subtitle'                  => $postData['subtitle'],
                                    'submission_types'          => $submission_typesInfo,
                                    'section_ertId'             => $section_ertInfo,  
                                    'narrative_file'            => null,
                                    'narrative_images'          => null,
                                    'narrative_image_desc'      => null,  // Storing as JSON string
                                    'image_files'               => null,
                                    'art_images'                => null,
                                    'art_image_desc'            => null,  // Storing as JSON string
                                    'art_image_file'            => null,
                                    'art_desc'                  => null,                              
                                    'art_video_file'            => $art_video_file,
                                    'art_video_desc'            => $postData['art_video_desc'],                                                                        
                                    'country'                   => $postData['country'],
                                    'state'                     => $postData['state'],
                                    'city'                      => $postData['city'],
                                    'organization_name'         => $postData['organization_name'],
                                    'organization_website'      => $postData['organization_website'],
                                    'ecosystem_affiliationId'   => $ecosystem_affiliationInfo,
                                    'indigenous_affiliation'    => $postData['indigenous_affiliation'],
                                    'expertise_areaId'          => $expertise_areaInfo,
                                    'bio_short'               => $postData['bio_short'],
                                    'bio_long'               => $postData['bio_long'],  
                                ];
                                //    Helper::pr($fields);
                                // Article::insert($fields);
                                Article::where($this->data['primary_key'], '=', $id)->update($fields);
                                return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' updated successfully');
                            
                            } else {
                                return redirect()->back()->with('error_message', 'All fields required');
                            }
                        }        
                }
            }         
        }
        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
    /* edit */
    /* delete */
    public function delete(Request $request, $id)
    {
        $id                             = Helper::decoded($id);
        $fields = [
            'status'             => 3
        ];
        Article::where($this->data['primary_key'], '=', $id)->update($fields);
        return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' deleted successfully');
    }
    /* delete */
    /* change status */
    public function change_status(Request $request, $id)
    {
        $id                             = Helper::decoded($id);
        $model                          = Article::find($id);
        if ($model->status == 1) {
            $model->status  = 0;
            $msg            = 'deactivated';
        } else {
            $model->status  = 1;
            $msg            = 'activated';
        }
        $model->save();
        return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' ' . $msg . ' successfully');
    }
    /* change status */
    /* change archieve status */
    public function change_status_accept($id)
    {
        // dd($id);
        $id                             = Helper::decoded($id);
        $model                          = Article::find($id);
        $fields = [
            'is_published' => 2,
        ];
                   
        $msg            = 'accepted';        
        // $model->save();
        Article::where($this->data['primary_key'], '=', $id)->update($fields);
        return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' ' . $msg . ' successfully');
    }
    public function change_status_reject($id)
    {
        // dd($id);
        $id                             = Helper::decoded($id);
        $model                          = Article::find($id);
        $fields = [
            'is_published' => 3,
        ];
                   
        $msg            = 'rejected';        
        // $model->save();
        Article::where($this->data['primary_key'], '=', $id)->update($fields);
        return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' ' . $msg . ' successfully');
    }
    /* change archieve status */

    public function viewDetails($id)
    {
        // dd($id);
        $id                                         = Helper::decoded($id);       
        $data['module']                             = $this->data;
        
        $page_name                                  = 'article.view_details';
        $data['row']                                = Article::where('status', '!=', 3)->where('id', '=', $id)->orderBy('id', 'DESC')->first();
        // dd($data['row']);
        $data['selected_ecosystem_affiliation']     = json_decode($data['row']->ecosystem_affiliationId);
        $data['selected_expertise_area']            = json_decode($data['row']->expertise_areaId);
        $data['selected_section_ertId']             = json_decode($data['row']->section_ertId);
        $data['section_ert']                        = SectionErt::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['user_title']                         = Title::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['submission_type']                    = SubmissionType::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['country']                            = Country::orderBy('name', 'ASC')->get();
        $data['pronoun']                            = Pronoun::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['ecosystem_affiliation']              = EcosystemAffiliation::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['expertise_area']                     = ExpertiseArea::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        
        $title                                      = $this->data['title'] . ' View Details : ' . (($data['row'])?$data['row']->creative_Work. ' (' . $data['row']->article_no . ')':'');
        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
    public function generate_nelp_form($id)
    {
        $id                                 = Helper::decoded($id);       
        $data['module']                     = $this->data;
        $getArticle                         = Article::where('status', '!=', 3)->where('id', '=', $id)->orderBy('id', 'DESC')->first();
        // Helper::pr($data['row']);
        $article_no                         = (($getArticle)?$getArticle->article_no:''); 
        /* generate nelp pdf */
            $generalSetting                 = GeneralSetting::find('1');
            $subject                        = $generalSetting->site_name . '-NELP-Form-' . $article_no;
            $message                        = view('email-templates.nelp-form',$getArticle);
            $options                        = new Options();
            $options->set('defaultFont', 'Courier');
            $dompdf                         = new Dompdf($options);
            $html                           = $message;
            $dompdf->loadHtml($html);
            $dompdf->setPaper('letter', 'portrait');
            $dompdf->render();
            $output                         = $dompdf->output();
            // Output the generated PDF to browser
            // $dompdf->stream("document.pdf", array("Attachment" => false));die;
            $filename                       = $article_no.'-'.time().'.pdf';
            $pdfFilePath                    = 'public/uploads/article/' . $filename;
            // Save the PDF to a file
            file_put_contents($pdfFilePath, $output);
            // echo "PDF file has been generated and saved at: " . $pdfFilePath;die;
            Article::where($this->data['primary_key'], '=', $id)->update(['nelp_form_pdf' => $filename, 'is_published' => 2]);
        /* generate nelp pdf */
        /* email functionality */
            $message                    = 'NELP Form - ' . $article_no;                    
            $generalSetting             = GeneralSetting::find('1');
            $subject                    = $generalSetting->site_name . ' : NELP Form - ' . $article_no;
            $attchment                  = 'public/uploads/article/' . $filename;
            $this->sendMail($generalSetting->system_email, $subject, $message, $attchment);
            $this->sendMail((($getArticle)?$getArticle->email:''), $subject, $message, $attchment);
        /* email functionality */
        /* email log save */
            $postData2 = [
                'name'                  => (($getArticle)?$getArticle->first_name . '' . $getArticle->last_name:''),
                'email'                 => (($getArticle)?$getArticle->email:''),
                'subject'               => $subject,
                'message'               => $message
            ];
            EmailLog::insertGetId($postData2);
        /* email log save */
        return redirect("admin/" . $this->data['controller_route'] . "/view_details/" . Helper::encoded($id))->with('success_message', $this->data['title'] . ' NELP form generated & shared to user successfully');
    }

    public function get_article_status($slug){
        $order_status = '';
        if($slug == 'submitted'){
            $order_status = 0;
        } elseif($slug == 'editing-checking'){
            $order_status = 1;
        } elseif($slug == 'approved'){
            $order_status = 4;
        }
        return $order_status;
    }

    public function multiple_delete(Request $request)
    {
        if ($request->has('ids')) {           
            Article::whereIn('id', $request->ids)->update(['status' => 3]);
            return response()->json(['message' => 'Selected records deleted successfully.']);
        } else {
            return response()->json(['message' => 'No records selected.'], 400);
        }
    }
}
