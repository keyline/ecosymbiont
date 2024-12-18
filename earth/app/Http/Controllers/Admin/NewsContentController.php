<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper as HelpersHelper;
use App\Http\Controllers\Controller;
use App\Models\Admin\JournalFrequency;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Models\GeneralSetting;
use App\Rules\MaxWords;
use App\Models\NewsContent;
use App\Models\Article;
use App\Models\Title;
use App\Models\SubmissionType;
use App\Models\NewsContentImage;
use App\Models\NewsCategory;
use App\Models\Pronoun;
use App\Models\EcosystemAffiliation;
use App\Models\Country;
use App\Models\ExpertiseArea;
use App\Models\UserClassification;
use App\Models\UserProfile;
use Auth;
use Session;
use Helper;
use Hash;

class NewsContentController extends Controller
{
    public function __construct()
    {
        $this->data = array(
            'title'             => 'News Content',
            'controller'        => 'NewsContentController',
            'controller_route'  => 'news_content',
            'primary_key'       => 'id',
        );
    }
    /* list */
    public function list()
    {       
        $data['module']                 = $this->data;
        $title                          = $this->data['title'] . ' List';
        $page_name                      = 'news_content.list';
        $data['rows']                   = NewsContent::where('status', '!=', 3)->orderBy('id', 'DESC')->get();        
        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
    /* list */
    /* add */
    public function add(Request $request)
    {
        $data['module']           = $this->data;
        if ($request->isMethod('post')) {
            $postData = $request->all();     
            $parent_category                = NewsCategory::where('id', '=', $postData['section_ert'])->first();         
            // Validation rules
            $rules = [
                'section_ert'               => 'required',   
                'creative_Work'             => 'required',
                'creative_work_SRN'         => 'required',
                'creative_work_DOI'         => 'required',                
                'pronoun'                   => 'required',   
                'email'                     => 'required',   
                'country'                   => 'required',   
                'media'                     => 'required',     
                'is_feature'                => 'required',  
                'is_popular'                => 'required',  
                'subtitle'                  => 'required', 
            ];
            
            // Validate request data
            if ($this->validate($request, $rules)) {
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
                if ($postData['media'] == 'image') {   
                    /* banner image */
                    $imageFile      = $request->file('cover_image');
                        if($imageFile != ''){
                            $imageName      = $imageFile->getClientOriginalName();
                            $uploadedFile   = $this->upload_single_file('cover_image', $imageName, 'newcontent', 'image');
                            if($uploadedFile['status']){
                                $cover_image = $uploadedFile['newFilename'];
                            } else {
                                return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                            }
                        } else {
                            $cover_image = $data['row']->cover_image;
                        }
                    /* banner image */                      
                } 
                else{
                    //fetch video code form url
                    $url = $postData['video_url'];                    
                    // Regular expression to match both types of YouTube URLs
                    preg_match("/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|v\/))([a-zA-Z0-9_-]{11})/", $url, $matches1);
                    $videoId = $matches1[1]; // This will give you the part after 'v='

                }                 
                // Generate a unique slug
                $slug = Str::slug($postData['creative_Work']);
        
                // Prepare fields for NewsContent insertion
                $fields = [
                    'author_email'              => $postData['email'], 
                    'author_classification'     => $postData['author_classification'] ?? '',
                    'co_authors'                => $postData['co_authors'] ?? '',
                    'co_authors_position'       => $postData['co_authors_position'] ?? '',
                    'co_author_names'           => json_encode($coAuthorNames),  // Storing as JSON string
                    'co_author_bios'            => json_encode($coAuthorBios),
                    'co_author_countries'       => json_encode($coAuthorCountries),
                    'co_author_organizations'   => json_encode($coAuthorOrganizations),
                    'co_ecosystem_affiliations' => json_encode($coecosystemAffiliations),
                    'co_indigenous_affiliations'=> json_encode($coindigenousAffiliations),
                    'co_author_classification'  => json_encode($coauthorClassification),
                    'author_name'               => $postData['first_name'], 
                    'author_short_bio'          => $postData['author_short_bio'], 
                    'for_publication_name'      => $postData['for_publication_name'],
                    'new_title'                 => $postData['creative_Work'],
                    'sub_title'                 => $postData['subtitle'], 
                    'author_pronoun'            => $postData['pronoun'],   
                    // 'title'                     => $postData['title'],
                    'parent_category'           => $parent_category->parent_category,                                           
                    'sub_category'              => $postData['section_ert'],                                           
                    'slug'                      => $slug,
                    'country'                   => $postData['country'],  
                    'state'                     => $postData['state'],
                    'city'                      => $postData['city'],
                    'organization_name'         => $postData['organization_name'] ?? '',   
                    'organization_website'      => $postData['organization_website'],
                    'author_affiliation'        => json_encode($postData['ecosystem_affiliation'] ?? []),  
                    'indigenous_affiliation'    => $postData['indigenous_affiliation'] ?? '',   
                    'expertise_area'            => json_encode($postData['expertise_area'] ?? []),                         
                    'creative_work_SRN'         => $postData['creative_work_SRN'],
                    'creative_work_DOI'         => $postData['creative_work_DOI'],                                                                                                                                                           
                    'media'                     => $postData['media'],   
                    'cover_image'               => $cover_image ?? '',
                    'cover_image_caption'       => $postData['cover_image_caption'] ?? '',
                    'video_url'                 => $postData['video_url'],
                    'videoId'                   => $videoId ?? '',
                    'long_desc'                 => $postData['long_desc'] ?? '',     
                    'keywords'                  => $postData['keywords'] ?? '',     
                    'is_feature'                => $postData['is_feature'],  
                    'is_popular'                => $postData['is_popular'],  
                    'short_desc'                => $postData['short_desc'] ?? '',    
                ];
                //   dd($fields);                                 
                NewsContent::insert($fields);                        
        
                // Redirect after successful insertion
                return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' Inserted Successfully !!!');
                
            } else {
                return redirect()->back()->with('error_message', 'All Fields Required !!!');
            }
        }
        $data['module']                 = $this->data;
        $title                          = $this->data['title'] . ' Add';       
        $page_name                      = 'news_content.add-edit';
        $data['row']                    = [];
        // $user_id                        = $data['row']->user_id;
        $data['parent_category']        = NewsCategory::where('status', '!=', 3)->where('parent_category', '=', 0)->orderBy('id', 'DESC')->get();
        $data['sub_category']           = NewsCategory::where('status', '!=', 3)->where('parent_category', '!=', 0)->orderBy('id', 'DESC')->get();
        $data['pronoun']                = Pronoun::where('status', '!=', 3)->orderBy('id', 'ASC')->get();
        $data['author_affiliation']     = EcosystemAffiliation::where('status', '!=', 3)->orderBy('name', 'ASC')->get();
        $data['country']                = Country::where('status', '!=', 3)->orderBy('name', 'ASC')->get();
        // $data['profile']                = UserProfile::where('user_id', '=', $user_id)->first();
        $data['ecosystem_affiliation']  = EcosystemAffiliation::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['user_title']             = Title::where('status', '=', 1)->orderBy('name', 'ASC')->get();  
        $data['news_category']          = NewsCategory::where('status', '=', 1)->where('parent_category', '=', 0)->orderBy('sub_category', 'ASC')->get();        
        $data['expertise_area']         = ExpertiseArea::where('status', '=', 1)->orderBy('name', 'ASC')->get();
         $data['news_images']           = [];
        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
    /* add */
    // Method to return subcategories based on parent category
    public function getSubcategories($parent_id)
    {
        $subcategories = NewsCategory::where('parent_category', $parent_id)->get();
        $queries = \DB::getQueryLog();
        $lastQuery = end($queries);
        return response()->json($subcategories);
    }
    /* edit */
    public function edit(Request $request, $id)
    {
        $data['module']                 = $this->data;
        $id                             = Helper::decoded($id);
        $title                          = $this->data['title'] . ' Update';
        $page_name                      = 'news_content.add-edit';
        $data['row']                    = NewsContent::where($this->data['primary_key'], '=', $id)->first();        
        $data['user_title']             = Title::where('status', '=', 1)->orderBy('name', 'ASC')->get();  
        $data['news_category']          = NewsCategory::where('status', '=', 1)->where('parent_category', '=', 0)->orderBy('sub_category', 'ASC')->get();        
        $data['submission_type']        = SubmissionType::where('status', '=', 1)->orderBy('name', 'ASC')->get();  
        $data['news_images']            = NewsContentImage::where('status', '!=', 3)->where('news_id', '=', $id)->get();
        $data['parent_category']        = NewsCategory::where('status', '!=', 3)->where('parent_category', '=', 0)->orderBy('id', 'DESC')->get();
        $data['sub_category']           = NewsCategory::where('status', '!=', 3)->where('parent_category', '!=', 0)->orderBy('id', 'DESC')->get();
        $data['pronoun']                = Pronoun::where('status', '!=', 3)->orderBy('id', 'ASC')->get();
        $data['author_affiliation']     = EcosystemAffiliation::where('status', '!=', 3)->orderBy('name', 'ASC')->get();
        $data['country']                = Country::where('status', '!=', 3)->orderBy('name', 'ASC')->get();
        $data['ecosystem_affiliation']  = EcosystemAffiliation::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['expertise_area']         = ExpertiseArea::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        

        if ($request->isMethod('post')) {
            $postData = $request->all();
            // Helper::pr($postData);
            $parent_category                = NewsCategory::where('id', '=', $postData['section_ert'])->first();                            
            $rules = [
                'section_ert'            => 'required',   
                'creative_Work'                 => 'required',
                'creative_work_SRN'         => 'required',
                'creative_work_DOI'         => 'required',                
                'pronoun'                   => 'required',   
                'email'                     => 'required',   
                'country'                   => 'required',   
                'media'                     => 'required',     
                'is_feature'                => 'required',  
                'is_popular'                => 'required',  
                'subtitle'                 => 'required', 
            ];     
            if ($this->validate($request, $rules)) {
                
                    // Generate a unique slug
                    $slug = Str::slug($postData['creative_Work']);  
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
                    if ($postData['media'] == 'image') {   
                        /* banner image */
                        $imageFile      = $request->file('cover_image');
                            if($imageFile != ''){
                                $imageName      = $imageFile->getClientOriginalName();
                                $uploadedFile   = $this->upload_single_file('cover_image', $imageName, 'newcontent', 'image');
                                if($uploadedFile['status']){
                                    $cover_image = $uploadedFile['newFilename'];
                                } else {
                                    return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                                }
                            } else {
                                $cover_image = $data['row']->cover_image;
                            }
                        /* banner image */                      
                    } 
                    else{
                        //fetch video code form url
                        $url = $postData['video_url'];                        
                        // Regular expression to match both types of YouTube URLs
                        preg_match("/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|v\/))([a-zA-Z0-9_-]{11})/", $url, $matches1);
                        $videoId = $matches1[1]; // This will give you the part after 'v='

                    }                     
                    $fields = [
                    'author_email'              => $postData['email'], 
                    'author_classification'     => $postData['author_classification'] ?? '',
                    'co_authors'                => $postData['co_authors'] ?? '',
                    'co_authors_position'       => $postData['co_authors_position'] ?? '',
                    'co_author_names'           => json_encode($coAuthorNames),  // Storing as JSON string
                    'co_author_bios'            => json_encode($coAuthorBios),
                    'co_author_countries'       => json_encode($coAuthorCountries),
                    'co_author_organizations'   => json_encode($coAuthorOrganizations),
                    'co_ecosystem_affiliations' => json_encode($coecosystemAffiliations),
                    'co_indigenous_affiliations'=> json_encode($coindigenousAffiliations),
                    'co_author_classification'  => json_encode($coauthorClassification),
                    'author_name'               => $postData['first_name'], 
                    'author_short_bio'          => $postData['author_short_bio'],
                    'for_publication_name'      => $postData['for_publication_name'],
                    'new_title'                 => $postData['creative_Work'],
                    'sub_title'                 => $postData['subtitle'], 
                    'author_pronoun'            => $postData['pronoun'],                       
                    'parent_category'           => $parent_category->parent_category,                                           
                    'sub_category'              => $postData['section_ert'],                                           
                    'slug'                      => $slug,
                    'country'                   => $postData['country'],  
                    'state'                     => $postData['state'],
                    'city'                      => $postData['city'],
                    'organization_name'         => $postData['organization_name'] ?? '',   
                    'organization_website'      => $postData['organization_website'],
                    'author_affiliation'        => json_encode($postData['ecosystem_affiliation'] ?? []),  
                    'indigenous_affiliation'    => $postData['indigenous_affiliation'] ?? '',   
                    'expertise_area'            => json_encode($postData['expertise_area'] ?? []),                    
                    'creative_work_SRN'         => $postData['creative_work_SRN'],
                    'creative_work_DOI'         => $postData['creative_work_DOI'],                                                                                                                                                           
                    'media'                     => $postData['media'],   
                    'cover_image'               => $cover_image ?? '',
                    'cover_image_caption'       => $postData['cover_image_caption'] ?? '',
                    'video_url'                 => $postData['video_url'],
                    'videoId'                   => $videoId ?? '',
                    'long_desc'                 => $postData['long_desc'] ?? '',     
                    'keywords'                  => $postData['keywords'] ?? '',     
                    'is_feature'                => $postData['is_feature'],  
                    'is_popular'                => $postData['is_popular'],  
                    'short_desc'                => $postData['short_desc'] ?? '', 
                ];
                    //  dd($fields);                  
                    NewsContent::where($this->data['primary_key'], '=', $id)->update($fields);                   
                    return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' Updated Successfully !!!');                
            } else {
                return redirect()->back()->with('error_message', 'All Fields Required !!!');
            }
        }
        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
    /* edit */

    /* import */
    public function import(Request $request, $id)
    {
        $data['module']                 = $this->data;
        $id                             = Helper::decoded($id);        
        $title                          = $this->data['title'] . ' import';
        $page_name                      = 'news_content.import';
        // $data['row']                    = NewsContent::where($this->data['primary_key'], '=', $id)->first();        
        $data['row']                    = Article::where($this->data['primary_key'], '=', $id)->first();  
        //  Helper::pr($data['row']);
        $user_id                        = $data['row']->user_id;   
        $data['user_title']             = Title::where('status', '=', 1)->orderBy('name', 'ASC')->get();  
        $data['news_category']          = NewsCategory::where('status', '=', 1)->where('parent_category', '=', 0)->orderBy('sub_category', 'ASC')->get();        
        $data['submission_type']       = SubmissionType::where('status', '=', 1)->orderBy('name', 'ASC')->get();  
        $data['news_images']            = NewsContentImage::where('status', '!=', 3)->where('news_id', '=', $id)->get();
        $data['parent_category']        = NewsCategory::where('status', '!=', 3)->where('parent_category', '=', 0)->orderBy('id', 'DESC')->get();
        $data['sub_category']           = NewsCategory::where('status', '!=', 3)->where('parent_category', '!=', 0)->orderBy('id', 'DESC')->get();
        $data['pronoun']                = Pronoun::where('status', '!=', 3)->orderBy('id', 'ASC')->get();
        $data['author_affiliation']     = EcosystemAffiliation::where('status', '!=', 3)->orderBy('name', 'ASC')->get();
        $data['country']                = Country::where('status', '!=', 3)->orderBy('name', 'ASC')->get();
        $data['ecosystem_affiliation']  = EcosystemAffiliation::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['expertise_area']         = ExpertiseArea::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['classification']                = UserClassification::where('user_id', '=', $user_id)->first();
        // Helper::pr($data['classification']);
        // $data['selected_ecosystem_affiliation'] = json_decode($data['row']->author_affiliation);        

        if ($request->isMethod('post')) {
            $postData = $request->all();
            $parent_category                = NewsCategory::where('id', '=', $postData['section_ert'])->first();       
            //   dd($postData);
            $actionMode = $postData['action_mode']; // Get action mode from the form
            if ($actionMode === 'save') {
                // Generate a unique slug
                $slug = Str::slug($postData['creative_Work']);  
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
                
                if (!isset($postData['media']) || empty($postData['media'])) {
                    // Media type is not selected; skip this method and save the form
                    $cover_image = null; // Retain existing image if available                    
                    $videoId = null; // No video processing                        
                }elseif ($postData['media'] == 'image') {   
                    $cover_image_caption = $postData['cover_image_caption']; 
                    /* banner image */
                    $imageFile      = $request->file('cover_image');
                        if($imageFile != ''){
                            $imageName      = $imageFile->getClientOriginalName();
                            $uploadedFile   = $this->upload_single_file('cover_image', $imageName, 'newcontent', 'image');
                            if($uploadedFile['status']){
                                $cover_image = $uploadedFile['newFilename'];
                            } else {
                                return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                            }
                        } else {
                            $cover_image = $data['row']->cover_image;
                            // $cover_image_caption = '';
                        }
                    /* banner image */                      
                } 
                else{
                    //fetch video code form url
                    $url = $postData['video_url'];                        
                    // Regular expression to match both types of YouTube URLs
                    preg_match("/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|v\/))([a-zA-Z0-9_-]{11})/", $url, $matches1);
                    $videoId = $matches1[1]; // This will give you the part after 'v='

                }      
                 /* NELP Pdf */                    
                $imageFile      = $request->file('nelp_pdf');
                
                if ($imageFile != '') {
                    $nelp_form_number = str_replace("SRN","NELP",$postData['creative_work_SRN']);
                    $imageName      = str_replace($imageFile->getClientOriginalName(),$nelp_form_number.'.pdf',$imageFile->getClientOriginalName());
                    $uploadedFile   = $this->upload_single_file('nelp_pdf', $imageName, 'newcontent', 'pdf');                        
                    if ($uploadedFile['status']) {
                        $nelp_pdf = $uploadedFile['newFilename'];
                        // // Article::where('id', '=', $article_id)->update(['nelp_form_scan_copy' => $nelp_form_scan_copy, 'is_published' => 3]);
                        // return redirect()->back()->with(['success_message' => 'Scan Copy Of NELP Form Uploaded Successfully !!!']);
                    } else {
                        return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                    }
                } 
                // else {
                //     return redirect()->back()->with(['error_message' => 'Please Upload Scan Copy Of NELP Form !!!']);
                // }       
                 /* NELP Pdf */        
                $fields = [
                'email'                     => $postData['email'], 
                'author_classification'     => $postData['author_classification'] ?? '',
                'co_authors'                => $postData['co_authors'] ?? '',
                'co_authors_position'       => $postData['co_authors_position'] ?? '',
                'co_author_names'           => json_encode($coAuthorNames),  // Storing as JSON string
                'co_author_bios'            => json_encode($coAuthorBios),
                'co_author_countries'       => json_encode($coAuthorCountries),
                'co_author_organizations'   => json_encode($coAuthorOrganizations),
                'co_ecosystem_affiliations' => json_encode($coecosystemAffiliations),
                'co_indigenous_affiliations'=> json_encode($coindigenousAffiliations),
                'co_author_classification'  => json_encode($coauthorClassification),
                'first_name'                => $postData['first_name'], 
                'for_publication_name'      => $postData['for_publication_name'],
                'creative_Work'             => $postData['creative_Work'],
                'subtitle'                  => $postData['subtitle'], 
                'pronounId'                 => $postData['pronoun'],   
                'titleId'                   => $postData['title'],
                // 'parent_category'           => $parent_category->parent_category,                                           
                'section_ertId'              => $postData['section_ert'],                                           
                 'slug'                      => $slug,
                'country'                   => $postData['country'],  
                'state'                     => $postData['state'],
                'city'                      => $postData['city'],
                'organization_name'         => $postData['organization_name'] ?? '',   
                'organization_website'      => $postData['organization_website'],
                'ecosystem_affiliationId'   => json_encode($postData['ecosystem_affiliation'] ?? []),  
                'indigenous_affiliation'    => $postData['indigenous_affiliation'] ?? '',   
                'expertise_areaId'          => json_encode($postData['expertise_area'] ?? []),                         
                'article_no'                => $postData['creative_work_SRN'],
                'creative_work_DOI'         => $postData['creative_work_DOI'],                                                                                                                                                           
                'media'                     => $postData['media']?? '',   
                'cover_image'               => $cover_image ?? '',
                'cover_image_caption'       => $cover_image_caption ?? '',
                'video_url'                 => $url ?? '',
                'videoId'                   => $videoId ?? '',
                'long_desc'                 => $postData['long_desc'] ?? '',     
                'keywords'                  => $postData['keywords'] ?? '',     
                'is_feature'                => $postData['is_feature'],  
                'is_popular'                => $postData['is_popular'],  
                'bio_short'                => $postData['author_short_bio'] ?? '',  
                'nelp_form_number'          => $nelp_form_number ?? '',
                'nelp_form_pdf'            => $nelp_pdf ?? '', 
                'is_published'              => 1,                                                         
                ];
                //   dd();                                 
                //   Helper::pr($fields);
                 Article::where('id', '=', $id)->update($fields);
                 return redirect("admin/article/list")->with('success_message', 'Article Saved Successfully !!!');                
            }
            $rules = [                                            
                'section_ert'            => 'required',   
                'creative_Work'                 => 'required',
                'creative_work_SRN'         => 'required',
                'creative_work_DOI'         => 'required',                
                'pronoun'                   => 'required',   
                'email'                     => 'required',   
                'country'                   => 'required',   
                'media'                     => 'required',     
                'is_feature'                => 'required',  
                'is_popular'                => 'required',  
                'subtitle'                 => 'required', 
            ];     
            if ($this->validate($request, $rules)) {
                
                    // Generate a unique slug
                    $slug = Str::slug($postData['creative_Work']);  
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
                    if ($postData['media'] == 'image') {   
                        /* banner image */
                        $imageFile      = $request->file('cover_image');
                            if($imageFile != ''){
                                $imageName      = $imageFile->getClientOriginalName();
                                $uploadedFile   = $this->upload_single_file('cover_image', $imageName, 'newcontent', 'image');
                                if($uploadedFile['status']){
                                    $cover_image = $uploadedFile['newFilename'];
                                } else {
                                    return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                                }
                            } else {
                                $cover_image = $data['row']->cover_image;
                            }
                        /* banner image */                      
                    } 
                    else{
                        //fetch video code form url
                        $url = $postData['video_url'];                        
                        // Regular expression to match both types of YouTube URLs
                        preg_match("/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|v\/))([a-zA-Z0-9_-]{11})/", $url, $matches1);
                        $videoId = $matches1[1]; // This will give you the part after 'v='

                    }      
                     /* NELP Pdf */                    
                    $imageFile      = $request->file('nelp_pdf');
                    // echo $imageFile; die;

                    $nelp_form_number = str_replace("SRN","NELP",$postData['creative_work_SRN']);
                    if ($imageFile != '') {
                        $imageName      = str_replace($imageFile->getClientOriginalName(),$nelp_form_number.'.pdf',$imageFile->getClientOriginalName());
                        $uploadedFile   = $this->upload_single_file('nelp_pdf', $imageName, 'newcontent', 'pdf');                        
                        if ($uploadedFile['status']) {
                            $nelp_pdf = $uploadedFile['newFilename'];
                            // // Article::where('id', '=', $article_id)->update(['nelp_form_scan_copy' => $nelp_form_scan_copy, 'is_published' => 3]);
                            // return redirect()->back()->with(['success_message' => 'Scan Copy Of NELP Form Uploaded Successfully !!!']);
                        } else {
                            return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                        }
                    } else {
                        $nelp_pdf = $data['row']->nelp_form_pdf;
                    }
                     /* NELP Pdf */        
                    $fields = [
                    'author_email'              => $postData['email'], 
                    'author_classification'     => $postData['author_classification'] ?? '',
                    'co_authors'                => $postData['co_authors'] ?? '',
                    'co_authors_position'       => $postData['co_authors_position'] ?? '',
                    'co_author_names'           => json_encode($coAuthorNames),  // Storing as JSON string
                    'co_author_bios'            => json_encode($coAuthorBios),
                    'co_author_countries'       => json_encode($coAuthorCountries),
                    'co_author_organizations'   => json_encode($coAuthorOrganizations),
                    'co_ecosystem_affiliations' => json_encode($coecosystemAffiliations),
                    'co_indigenous_affiliations'=> json_encode($coindigenousAffiliations),
                    'co_author_classification'  => json_encode($coauthorClassification),
                    'author_name'               => $postData['first_name'], 
                    'for_publication_name'      => $postData['for_publication_name'],
                    'new_title'                 => $postData['creative_Work'],
                    'sub_title'                 => $postData['subtitle'], 
                    'author_pronoun'            => $postData['pronoun'],   
                    'title'                     => $postData['title'],
                    'parent_category'           => $parent_category->parent_category,                                           
                    'sub_category'              => $postData['section_ert'],                                           
                    'slug'                      => $slug,
                    'country'                   => $postData['country'],  
                    'state'                     => $postData['state'],
                    'city'                      => $postData['city'],
                    'organization_name'         => $postData['organization_name'] ?? '',   
                    'organization_website'      => $postData['organization_website'],
                    'author_affiliation'        => json_encode($postData['ecosystem_affiliation'] ?? []),  
                    'indigenous_affiliation'    => $postData['indigenous_affiliation'] ?? '',   
                    'expertise_area'            => json_encode($postData['expertise_area'] ?? []),                         
                    'creative_work_SRN'         => $postData['creative_work_SRN'],
                    'creative_work_DOI'         => $postData['creative_work_DOI'],                                                                                                                                                           
                    'media'                     => $postData['media'],   
                    'cover_image'               => $cover_image ?? '',
                    'cover_image_caption'       => $postData['cover_image_caption'] ?? '',
                    'video_url'                 => $postData['video_url'] ?? '',
                    'videoId'                   => $videoId ?? '',
                    'long_desc'                 => $postData['long_desc'] ?? '',     
                    'keywords'                  => $postData['keywords'] ?? '',     
                    'is_feature'                => $postData['is_feature'],  
                    'is_popular'                => $postData['is_popular'],  
                    'short_desc'                => $postData['short_desc'] ?? '',  
                    'nelp_form_number'          => $nelp_form_number,
                    'nelp_form_file'            => $nelp_pdf,                                                          
                ];
                    //  dd();                                 
                    //   Helper::pr($fields);
                    NewsContent::insert($fields);     
                    $fieldsArticle = [
                        'is_import'                 => 1,  
                        'is_published'             => 4
                    ];
                    Article::where('id', '=', $id)->update($fieldsArticle);
                    return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' Inserted Successfully !!!');                
            } else {
                return redirect()->back()->with('error_message', 'All Fields Required !!!');
            }
        }
        //  Helper::pr($data);
        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
    /* import */

    /* delete */
    public function delete(Request $request, $id)
    {
        $id                             = Helper::decoded($id);
        $fields = [
            'status'             => 3
        ];
        NewsContent::where($this->data['primary_key'], '=', $id)->update($fields);
        return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' Deleted Successfully !!!');
    }
    /* delete */
    /* change status */
    public function change_status(Request $request, $id)
    {
        $id                             = Helper::decoded($id);
        $model                          = NewsContent::find($id);
        if ($model->status == 1) {
            $model->status  = 0;
            $msg            = 'Deactivated';
        } else {
            $model->status  = 1;
            $msg            = 'Activated';
        }
        $model->save();
        return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' ' . $msg . ' Successfully !!!');
    }
    /* change status */
    /* change archieve status */
    public function change_archieve_status(Request $request, $id)
    {
        $id                             = Helper::decoded($id);
        $model                          = Notice::find($id);
        if ($model->is_archieve == 1) {
            $model->is_archieve  = 0;
            $msg            = 'Moved To Current List';
        } else {
            $model->is_archieve  = 1;
            $msg            = 'Moved To Archieve List';
        }
        $model->save();
        return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' ' . $msg . ' Successfully !!!');
    }
    /* change archieve status */
    /* image list */
    public function list_image()
    {       
        $data['module']                 = $this->data;
        $title                          = 'News Content Media List';
        $page_name                      = 'news_content_image.list';
        $data['rows']                   = NewsContentImage::where('status', '!=', 3)->orderBy('id', 'DESC')->get();        
        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
    /* image list */
    /* add */
    public function add_image(Request $request)
    {
        $data['module']           = $this->data;
        if ($request->isMethod('post')) {
            $postData = $request->all(); 
            //  Helper::pr($postData);
            // Validation rules
            $rules = [
                'others_image'           => 'required',                                                
                'image_title'                 => 'required'               
            ];
            
            // Validate request data
            if ($this->validate($request, $rules)) {                
                
                $image_title = $postData['image_title'];
                // Handle others_image upload (optional)
                $imageFile = $request->file('others_image');
                $others_image = [];
        
                if($imageFile != '') {                    
                    $uploadedFile = $this->commonFileArrayUpload('newcontent', $imageFile, 'image');
                    if(!empty($uploadedFile)) {
                        $others_image = $uploadedFile;
                    } else {
                        $others_image = [];
                    }
                }
        
                // Insert into NewsContentImage if others_image is not empty
                if(count($others_image) > 0) {
                    foreach($others_image as $image) {
                        $imageFields = [
                            'image_file' => $image,
                            'image_title' => $image_title,
                        ];
                        //  Helper::pr($imageFields);
                        NewsContentImage::insert($imageFields);
                    }
                }
        
                // Redirect after successful insertion
                return redirect("admin/news_content_image/list")->with('success_message', 'Images inserted Successfully !!!');
                
            } else {
                return redirect()->back()->with('error_message', 'All Fields Required !!!');
            }
        }
        $data['module']                 = $this->data;
        $title                          = 'News Content Media Add';       
        $page_name                      = 'news_content_image.add-edit';
        $data['row']                    = [];        
         $data['news_images']           = [];
        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
    /* add */
     /* edit image */
     public function edit_image(Request $request, $id)
     {
         $data['module']                 = $this->data;
         $id                             = Helper::decoded($id);
         $title                          = 'News Content Media Update';
         $page_name                      = 'news_content_image.add-edit';        
         $data['row']                    = NewsContentImage::where('status', '!=', 3)->where('id', '=', $id)->first();
         $data['content']                = NewsContent::where('id', '=', $data['row']->news_id)->first();          
 
         if ($request->isMethod('post')) {
             $postData = $request->all();          
             $rules = [                   
                  'others_image'              => 'required',                   
             ];           
             if ($this->validate($request, $rules)) { 
                    $image_title = $postData['image_title'];                
                     /* others image */
                     $imageFile      = $request->file('others_image');                    
                     $others_image = [];
                     if($imageFile != ''){                    
                     $uploadedFile   = $this->commonFileArrayUpload('newcontent', $imageFile, 'image');
                     if(!empty($uploadedFile)){
                         $others_image = $uploadedFile;
                     }                  
                      else {
                         return redirect()->back()->with(['error_message' => 'Please upload an image']);
                     }
                     }                                         
                     /* others image */                               
                     if(count($others_image)>0){
                         for($k=0;$k<count($others_image);$k++){
                             $fields   = [
                                                 'image_file'  => $others_image[$k],
                                                 'image_title' => $image_title,
                             ];   
                            //  Helper::pr($fields);
                             NewsContentImage::where('id', '=', $id)->update($fields);
                         }
                     }                                                                                                                        
                     
                     return redirect("admin/news_content_image/list")->with('success_message', $this->data['title'] . ' Updated Successfully !!!');                
             } else {
                 return redirect()->back()->with('error_message', 'All Fields Required !!!');
             }
         }
         echo $this->admin_after_login_layout($title, $page_name, $data);
     }
     /* edit image */
     /* delete image */
    public function delete_image(Request $request, $id)
    {
        $id                             = Helper::decoded($id);
        $fields = [
            'status'             => 3
        ];
        NewsContentImage::where('id', '=', $id)->update($fields);
        return redirect("admin/news_content_image/list")->with('success_message', 'Image Deleted Successfully !!!');
    }
    /* delete image */
    /* change image status */
    public function change_status_image(Request $request, $id)
    {
        $id                             = Helper::decoded($id);
        $model                          = NewsContentImage::find($id);
        if ($model->status == 1) {
            $model->status  = 0;
            $msg            = 'Deactivated';
        } else {
            $model->status  = 1;
            $msg            = 'Activated';
        }
        $model->save();
        return redirect("admin/news_content_image/list")->with('success_message', 'Image ' . $msg . ' Successfully !!!');
    }
    /* change image status */
}
