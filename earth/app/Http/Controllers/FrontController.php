<?php
namespace App\Http\Controllers;

use App\Helpers\Helper as HelpersHelper;
use App\Http\Controllers\Controller;
use App\Services\OpenAiAuth;
use Illuminate\Http\Request;
use PHPExperts\RESTSpeaker\RESTSpeaker;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

use App\Models\NewsCategory;
use App\Models\NewsContent;
use App\Models\Notice;
use App\Models\Page;
use App\Models\User;
use App\Models\Manuscript;
use App\Models\Subscriber;
use App\Models\Country;
use App\Models\UserActivity;
use App\Models\Article;
use App\Rules\MaxWords;
use App\Models\SectionErt;
use App\Models\Title;
use App\Models\Pronoun;
use App\Models\EcosystemAffiliation;
use App\Models\ExpertiseArea;
use App\Models\SubmissionType;
use App\Models\GeneralSetting;
use App\Models\Enquiry;
use App\Models\EmailLog;
use App\Models\UserProfile;
use App\Models\UserClassification;
use App\Models\Community;

use Auth;
use Session;
use Helper;
use Hash;
use stripe;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
date_default_timezone_set("Asia/Calcutta");

class FrontController extends Controller
{
    public function home(Request $request)
    {
        $data = [];
        $title                          = 'Home';
        $page_name                      = 'home';
        if ($request->isMethod('post')) {
            $postData   = $request->all();
            $rules      = [
                'subscribe_email'        => 'required|email'
            ];

            if ($this->validate($request, $rules)) {
                $subscribe_email = $postData['subscribe_email'];
                $checkSubscribeEmail = Subscriber::where('subscribers_email', '=', $subscribe_email)->count();
                if($checkSubscribeEmail <= 0){
                    $fields = [
                        'subscribers_email'            => $subscribe_email
                    ];
                    Subscriber::insert($fields);
                    return redirect()->back()->with('success_message', 'Email subscribed successfully');
                } else {
                    return redirect()->back()->with('error_message', 'Email already subscribed');
                }
            } else {
                return redirect()->back()->with('error_message', 'All fields required');
            }
        }
        $data['search_keyword']         = '';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
    public function submissions()
    {
        $data['button_show']            = 1;
        $data['search_keyword']         = '';
        $title                          = 'Submissions';
        $page_name                      = 'submissions';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
    public function contacts(Request $request)
    {
        $data = [];
        $title                          = 'Contacts';
        $page_name                      = 'contacts';
        if ($request->isMethod('post')) {
            $postData = $request->all();
            // Helper::pr($postData);
             // Get reCAPTCHA token from form POST data
                $recaptchaResponse = $postData['g-recaptcha-response'];

                // Your Google reCAPTCHA secret key
                $secretKey = '6LclkEwqAAAAABtaRIg1Rxp8LK4dFcFyN2Si0Ygj';

                // Google reCAPTCHA verification URL
                $verifyURL = 'https://www.google.com/recaptcha/api/siteverify';

                // Prepare the POST request
                $data = array(
                    'secret' => $secretKey,
                    'response' => $recaptchaResponse,                       
                );

                // Initiate cURL
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $verifyURL);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);

                // Decode JSON response
                $responseData = json_decode($response);

                // Check if reCAPTCHA validation was successful
                if ($responseData->success && $responseData->score >= 0.5) {
                    // reCAPTCHA validation passed, proceed with form processing
                    // echo "reCAPTCHA v3 validation passed. You can process the form."; die;
                    $rules = [                                 
                        'first_name'                => 'required',            
                        'subject'                 => 'required',                                    
                        'email'                     => 'required',                                                  
                        'country'                   => 'required',                                     
                        'message'                  => 'required',                         
                    ];
                    if ($this->validate($request, $rules)) {
                        $checkValue = Enquiry::where('email', '=', $postData['email'])->count();
                        if ($checkValue <= 0) {                    
                            $fields = [                        
                                'first_name'                => $postData['first_name'],            
                                'subject'                 => json_encode($postData['subject']),         
                                'email'                     => $postData['email'],                                                          
                                'country'                   => $postData['country'],                               
                                'message'                  =>$postData['message'],                         
                            ];
                            // Helper::pr($fields);
                            Enquiry::insert($fields);
                            $generalSetting             = GeneralSetting::where('id', '=', 1)->first();
                            $subject                    = 'New Lead From Ecosymbiont Website';
                            $message                    = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='padding: 10px; background: #fff; width: 500px;'>
                                                                <tr><td style='padding: 8px 15px'>Dear Administrator,</td></tr>
                                                                <tr><td style='padding: 8px 15px'>A new lead has contacted you through the Ecosymbiont Website. Please find the details below.</td></tr>
                                                                <tr><td style='padding: 8px 15px'><strong>Name: </strong>" . htmlspecialchars($postData['first_name']) . "</td></tr>
                                                                <tr><td style='padding: 8px 15px'><strong>Email: </strong>" . htmlspecialchars($postData['email']) . "</td></tr>    
                                                                <tr><td style='padding: 8px 15px'><strong>Country: </strong>" . htmlspecialchars($postData['country']) . "</td></tr>                                         
                                                                <tr><td style='padding: 8px 15px'><strong>Message: </strong>" . htmlspecialchars($postData['message']) . "</td></tr>
                                                                <tr><td style='padding: 8px 15px'><strong>Subject: </strong>" . htmlspecialchars(implode(', ', $postData['subject'])) . "</td></tr>
                                                                <tr><td style='padding: 8px 15px'>Thank You,</td></tr>
                                                                <tr><td style='padding: 8px 15px'>Auto-generated from the Ecosymbiont Website.</td></tr>
                                                            </table>";
                            $this->sendMail($generalSetting->site_mail, $subject, $message);
                            
                            return redirect(url('contacts'))->with('success_message', 'Enquiry submitted successfully');
                        } else {
                            return redirect()->back()->with('error_message', 'Enquiry already inserted');
                        }
                    } else {
                        return redirect()->back()->with('error_message', 'All fields required');
                    }

                } else {
                    // reCAPTCHA validation failed
                    return redirect()->back()->with('error_message', 'reCAPTCHA v3 validation failed. Please try again.');                        
                }                              
        }
        $data['search_keyword']         = '';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
    public function aboutUs()
    {
        $data = [];
        $title                          = 'Communities';
        $page_name                      = 'communities';
        $data['search_keyword']         = '';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
    public function schumacherWild()
    {
        $data = [];
        $title                          = 'SchumacherWild';
        $page_name                      = 'SchumacherWild';
        $data['search_keyword']         = '';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
    public function westoakland()
    {
        $data = [];
        $title                          = 'WestOakland';
        $page_name                      = 'WestOakland';
        $data['search_keyword']         = '';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
    public function actchangemakers()
    {
        $data = [];
        $title                          = 'ACTChangemakers';
        $page_name                      = 'ACTChangemakers';
        $data['search_keyword']         = '';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
    public function ethosfellows()
    {
        $data = [];
        $title                          = 'EthosFellows';
        $page_name                      = 'EthosFellows';
        $data['search_keyword']         = '';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
    public function pageContent($slug)
    {
        $data['row']                    = Page::select('page_name', 'page_content')->where('status', '=', 1)->where('page_slug', '=', $slug)->first();
        $title                          = (($data['row'])?$data['row']->page_name:'');
        $data['button_show']            = (($slug == 'submissions')?1:0);
        $page_name                      = 'page-content';
        $data['search_keyword']         = '';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
    public function category($slug)
    {
        $data['row']                    = NewsCategory::select('id', 'sub_category')->where('status', '=', 1)->where('slug', '=', $slug)->first();
        $parent_category_id                = (($data['row'])?$data['row']->id:'');

        $data['contents']               = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id') // Join for parent category
                                                    ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id') // Join for subcategory
                                                    ->select(
                                                        'news_contents.id', 
                                                        'news_contents.new_title', 
                                                        'news_contents.sub_title', 
                                                        'news_contents.slug', 
                                                        'news_contents.author_name', 
                                                        'news_contents.for_publication_name', 
                                                        'news_contents.cover_image', 
                                                        'news_contents.created_at',
                                                        'news_contents.media',
                                                        'news_contents.videoId',
                                                        'news_contents.is_series',
                                                        'news_contents.series_article_no',
                                                        'news_contents.current_article_no',
                                                        'news_contents.other_article_part_doi_no',
                                                        'sub_category.sub_category as sub_category_name', // Corrected name to sub_category
                                                        'parent_category.sub_category as parent_category_name', // From parent_category name
                                                        'sub_category.slug as sub_category_slug', // Corrected alias to sub_category
                                                        'parent_category.slug as parent_category_slug' // Corrected alias to sub_category
                                                    )
                                                    ->where('news_contents.status', 1)
                                                    ->where('news_contents.parent_category', $parent_category_id) // Ensure $parent_category_id is defined
                                                    ->orderBy('news_contents.id', 'DESC')
                                                    ->get();
        $data['search_keyword']         = '';

        $title                          = (($data['row'])?$data['row']->sub_category:'');
        $page_name                      = 'category';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
    public function subcategory($categoryname, $slug)
    {
        $data['row']                    = NewsCategory::select('id', 'sub_category', 'short_description')->where('status', '=', 1)->where('slug', '=', $slug)->first();
        //  dd($data['row']);
        $sub_category_id                = (($data['row'])?$data['row']->id:'');
        // $sub_category_description                = (($data['row'])?$data['row']->short_description:'');

        $data['contents']               =  NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id') // Join for parent category
                                                ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id') // Join for subcategory
                                                ->select(
                                                    'news_contents.id', 
                                                    'news_contents.new_title', 
                                                    'news_contents.sub_title', 
                                                    'news_contents.slug', 
                                                    'news_contents.author_name', 
                                                    'news_contents.for_publication_name', 
                                                    'news_contents.cover_image', 
                                                    'news_contents.created_at',
                                                    'news_contents.media',
                                                    'news_contents.videoId',
                                                    'news_contents.is_series',
                                                    'news_contents.series_article_no',
                                                    'news_contents.current_article_no',
                                                    'news_contents.other_article_part_doi_no',
                                                    'sub_category.sub_category as sub_category_name', // Corrected name to sub_category
                                                    'parent_category.sub_category as parent_category_name', // From parent_category name
                                                    'sub_category.slug as sub_category_slug', // Corrected alias to sub_category
                                                    'parent_category.slug as parent_category_slug' // Corrected alias to sub_category
                                                )
                                                ->where('news_contents.status', 1)
                                                ->where('news_contents.sub_category', $sub_category_id) // Ensure $parent_category_id is defined
                                                ->orderBy('news_contents.id', 'DESC')
                                                ->get();
                                        //    dd($data['contents']);
                                        // Helper::pr($data['contents']);

        // $title                          = ($categoryname .'|'. ($data['row'])?$data['row']->sub_category:'');
        $data['search_keyword']         = '';
        $title                          = ucwords($categoryname) .' | '. $data['row']->sub_category;
        $page_name                      = 'subcategory';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
    public function newsContent($categoryname, $subcategoryname, $slug)
    {
        $data['rowContent'] = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id') // Join for parent category
                                        ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id') // Join for subcategory
                                        ->select(
                                            'news_contents.id as news_id',  // Select the ID as news_id
                                            'news_contents.*',  // Select all fields from the news_contents table
                                            'parent_category.sub_category as parent_category_name',  // Alias for subcategory name from parent_category
                                            'sub_category.sub_category as sub_category_name',  // Alias for subcategory name from sub_category
                                            'sub_category.slug as sub_category_slug'  // Alias for subcategory slug from sub_category
                                        )
                                        ->where('news_contents.status', 1)  // Fetch only active news content
                                        ->where('news_contents.slug', $slug)  // Fetch the news content matching the given slug
                                        ->first();  // Fetch a single record;
                                           
        $postUrl = env('APP_URL') . 'content/' . $slug;
        //  echo $postUrl; die;
        // <?=env('APP_URL').'content/'.$rowContent->cover_image
        $facebookShareUrl = "https://www.facebook.com/sharer/sharer.php?u=" . urlencode($postUrl);     
        $twitterShareUrl = "https://twitter.com/intent/tweet?url=" . urlencode($postUrl);     
        $linkdinShareUrl = "https://www.linkedin.com/sharing/share-offsite/?url=" . urlencode($postUrl);     
        $data['facebookShareUrl']   = $facebookShareUrl;                               
        $data['twitterShareUrl']   = $twitterShareUrl;                               
        $data['linkdinShareUrl']   = $linkdinShareUrl;                               
        // Helper::pr($data['rowContent']);
        $author_name                = (($data['rowContent'])?$data['rowContent']->author_name:'');
        $parent_category_id         = (($data['rowContent'])?$data['rowContent']->parent_category:'');
        $data['authorPostCount']    = NewsContent::where('news_contents.status', '=', 1)
                                           ->where('news_contents.author_name', 'LIKE', '%'.$author_name.'%')
                                           ->count();
        $data['alsoLikeContents'] = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id') // Join for parent category
                                           ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id') // Join for subcategory
                                           ->select(
                                               'news_contents.id as news_id',  // Alias the news ID
                                               'news_contents.*',  // Select all fields from news_contents
                                               'sub_category.sub_category as sub_category_name',  // Select subcategory name with alias
                                               'sub_category.slug as sub_category_slug',  // Select subcategory slug with alias
                                               'parent_category.slug as parent_category_slug' // Corrected alias to sub_category
                                           )
                                           ->where('news_contents.status', 1)  // Fetch only active content
                                           ->where('news_contents.parent_category', $parent_category_id)  // Filter by parent category
                                           ->where('news_contents.id', '!=', ($data['rowContent']) ? $data['rowContent']->news_id : null)  // Exclude the current content by its ID
                                           ->get();
        $data['search_keyword']         = '';

        $title                      = (($data['rowContent'])?$data['rowContent']->new_title:'');
        $page_name                  = 'news-content';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
    public function search_result(Request $request)
    {
        if($request->isMethod('get')){
            $postData           = $request->all();
            $search_keyword     = $postData['article_search'];
            $data['contents']   = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id') // Join for parent category
                                            ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id') // Join for subcategory
                                            ->select(
                                                        'news_contents.id', 
                                                        'news_contents.new_title', 
                                                        'news_contents.sub_title', 
                                                        'news_contents.slug', 
                                                        'news_contents.author_name', 
                                                        'news_contents.for_publication_name', 
                                                        'news_contents.cover_image', 
                                                        'news_contents.created_at',
                                                        'news_contents.media',
                                                        'news_contents.videoId',
                                                        'sub_category.sub_category as sub_category_name', // Corrected name to sub_category
                                                        'parent_category.sub_category as parent_category_name', // From parent_category name
                                                        'sub_category.slug as sub_category_slug', // Corrected alias to sub_category
                                                        'parent_category.slug as parent_category_slug' // Corrected alias to sub_category
                                                    )
                                            ->where(function($query) {
                                                $query->where('news_contents.status', 1);
                                             })
                                             ->where(function($query) use ($search_keyword) {
                                                $query->where('news_contents.new_title', 'LIKE', '%'.$search_keyword.'%')
                                                      ->orWhere('news_contents.sub_title', 'LIKE', '%'.$search_keyword.'%')
                                                      ->orWhere('news_contents.long_desc', 'LIKE', '%'.$search_keyword.'%')
                                                      ->orWhere('news_contents.author_name', 'LIKE', '%'.$search_keyword.'%')
                                                      ->orWhere('news_contents.organization_name', 'LIKE', '%'.$search_keyword.'%')
                                                      ->orWhere('news_contents.keywords', 'LIKE', '%'.$search_keyword.'%');
                                             })
                                             ->limit(4)
                                             ->get();
            // Helper::pr($searchResults);
            
            $data['search_keyword']         = $search_keyword;
            $title                          = 'Search result for: "' . $search_keyword . '"';
            $page_name                      = 'search-result';
            echo $this->front_before_login_layout($title, $page_name, $data);
        }
    }
    public function search_result_load(Request $request)
    {
        if($request->isMethod('post')){
            $postData           = $request->all();
            $offset = $postData['offset'];
            $limit = $postData['limit']; // Default to 4 per request
            $search_keyword     = $postData['search_keyword'];
            $contents   = NewsContent::join('news_category as parent_category', 'news_contents.parent_category', '=', 'parent_category.id') // Join for parent category
                                            ->join('news_category as sub_category', 'news_contents.sub_category', '=', 'sub_category.id') // Join for subcategory
                                            ->select(
                                                        'news_contents.id', 
                                                        'news_contents.new_title', 
                                                        'news_contents.sub_title', 
                                                        'news_contents.slug', 
                                                        'news_contents.author_name', 
                                                        'news_contents.for_publication_name', 
                                                        'news_contents.cover_image', 
                                                        'news_contents.created_at',
                                                        'news_contents.media',
                                                        'news_contents.videoId',
                                                        'sub_category.sub_category as sub_category_name', // Corrected name to sub_category
                                                        'parent_category.sub_category as parent_category_name', // From parent_category name
                                                        'sub_category.slug as sub_category_slug', // Corrected alias to sub_category
                                                        'parent_category.slug as parent_category_slug' // Corrected alias to sub_category
                                                    )
                                            ->where(function($query) {
                                                $query->where('news_contents.status', 1);
                                             })
                                             ->where(function($query) use ($search_keyword) {
                                                $query->where('news_contents.new_title', 'LIKE', '%'.$search_keyword.'%')
                                                      ->orWhere('news_contents.sub_title', 'LIKE', '%'.$search_keyword.'%')
                                                      ->orWhere('news_contents.long_desc', 'LIKE', '%'.$search_keyword.'%')
                                                      ->orWhere('news_contents.author_name', 'LIKE', '%'.$search_keyword.'%')
                                                      ->orWhere('news_contents.organization_name', 'LIKE', '%'.$search_keyword.'%')
                                                      ->orWhere('news_contents.keywords', 'LIKE', '%'.$search_keyword.'%');
                                             })
                                             ->offset($offset)
                                            ->limit($limit)
                                             ->get();
            // Helper::pr($contents);
            
            $data['search_keyword']         = $search_keyword;
            // Prepare the response
            return response()->json(['success' => true, 'data' => $contents]);
        }
    }
    public function fetch_search_suggestions(Request $request){
        $apiStatus          = TRUE;
        $apiMessage         = '';
        $apiResponse        = [];
        $apiExtraField      = '';
        $apiExtraData       = '';
        $requestData        = $request->all();
        
        $search_keyword     = $requestData['search_keyword'];
        // Helper::pr($search_keyword);
        $searchResults      = NewsContent::select('id', 'new_title', 'slug', 'parent_category', 'sub_category')->where(function($query) {
                                                $query->where('status', 1);
                                             })
                                             ->where(function($query) use ($search_keyword) {
                                                $query->where('new_title', 'LIKE', '%'.$search_keyword.'%')
                                                      ->orWhere('sub_title', 'LIKE', '%'.$search_keyword.'%')
                                                      ->orWhere('long_desc', 'LIKE', '%'.$search_keyword.'%')
                                                      ->orWhere('author_name', 'LIKE', '%'.$search_keyword.'%')
                                                      ->orWhere('organization_name', 'LIKE', '%'.$search_keyword.'%')
                                                      ->orWhere('keywords', 'LIKE', '%'.$search_keyword.'%');
                                             })
                                             ->get();
        
        if($searchResults){
            foreach ($searchResults as $searchResult) {
                $getParentCategory  = NewsCategory::select('slug')->where('id', '=', $searchResult->parent_category)->first();
                $getChildCategory   = NewsCategory::select('slug')->where('id', '=', $searchResult->sub_category)->first();
                $contentUrl         = url('content/' . (($getParentCategory)?$getParentCategory->slug:''). '/' . (($getChildCategory)?$getChildCategory->slug:'') . '/' . $searchResult->slug);
                echo '<li><a href="' . $contentUrl . '">' . htmlspecialchars($searchResult->new_title) . '</a></li>';
            }
        } else {
            echo '<li>No results found</li>';
        }
        // $this->response_to_json($apiStatus, $apiMessage, $apiResponse, $apiExtraField, $apiExtraData);
    }
    /* authentication */
        public function signIn(Request $request, $page_link = '')
        {
            if($request->isMethod('post')){
                $postData   = $request->all();
                $page_link  = Helper::decoded($postData['page_link']);
                $rules      =   [
                                    'email'     => 'required|email|max:255',
                                    'password'  => 'required|max:30',
                                ];
                if($this->validate($request, $rules)){
                    if(Auth::guard('web')->attempt(['email' => $postData['email'], 'password' => $postData['password'], 'status' => 1])){                        
                        $sessionData = Auth::guard('web')->user();
                        $request->session()->put('user_id', $sessionData->id);
                        $request->session()->put('first_name', $sessionData->first_name);
                        $request->session()->put('middle_name', $sessionData->middle_name);
                        $request->session()->put('last_name', $sessionData->last_name);
                        $request->session()->put('name', $sessionData->first_name . ' ' . $sessionData->last_name);
                        $request->session()->put('role', $sessionData->role);
                        $request->session()->put('email', $sessionData->email);
                        $request->session()->put('is_user_login', 1);

                        $exsistUser = UserActivity::where('user_email', '=', $sessionData->email)->count();
                        //   Helper::pr($exsistUser);                        
                        if($exsistUser > 0)
                        {
                            if($sessionData->role == 2)
                            {
                                if($page_link == ''){
                                    return redirect('user/dashboard');
                                } else {
                                    return redirect($page_link);
                                } 
                            }else {
                                if($page_link == ''){
                                    return redirect('user/my-profile');
                                } else {
                                    return redirect($page_link);
                                }
                            }
                        } else{
                            // Helper::pr($sessionData->role);
                            if($sessionData->role == 2)
                            {
                                if($page_link == ''){
                                    return redirect('user/add-author-classification');
                                } else {
                                    return redirect($page_link);
                                } 
                            }else {
                                if($page_link == ''){
                                    return redirect('user/dashboard');
                                } else {
                                    return redirect($page_link);
                                }
                            }
                        }

                        /* user activity */
                            $activityData = [
                                'user_email'        => $sessionData->email,
                                'user_name'         => $sessionData->name,
                                'user_type'         => 'USER',
                                'ip_address'        => $request->ip(),
                                'activity_type'     => 1,
                                'activity_details'  => 'Sign In Success !!!',
                                'platform_type'     => 'WEB',
                            ];
                            UserActivity::insert($activityData);
                        /* user activity */
                                               
                    } else {                        
                        /* user activity */
                            $activityData = [
                                'user_email'        => $postData['email'],
                                'user_name'         => 'User',
                                'user_type'         => 'USER',
                                'ip_address'        => $request->ip(),
                                'activity_type'     => 0,
                                'activity_details'  => 'Invalid Email Or Password !!!',
                                'platform_type'     => 'WEB',
                            ];
                            UserActivity::insert($activityData);
                        /* user activity */
                        return redirect()->back()->with('error_message', 'Invalid email or password');
                    }
                } else {                    
                    return redirect()->back()->with('error_message', 'All fields required');
                }
            }
            $data['page_link']              = (($page_link != '')?$page_link:'');
            $data['search_keyword']         = '';
            $title                          = 'Sign In';
            $page_name                      = 'signin';
            echo $this->front_before_login_layout($title, $page_name, $data);
        }
        public function signUp(Request $request)
        {
            $data['countries']              = Country::select('id', 'name')->where('status', '=', 1)->get();
            $title                          = 'Sign Up';
            $page_name                      = 'signup';
            $data['search_keyword']         = '';
            if ($request->isMethod('post')) {
                $postData = $request->all();
                //  Helper::pr($postData);
                 // Get reCAPTCHA token from form POST data
                    $recaptchaResponse = $postData['g-recaptcha-response'];

                    // Your Google reCAPTCHA secret key
                    $secretKey = '6LcIw04qAAAAAJCWh02op84FgNvxexQsh9LLCuqW';

                    // Google reCAPTCHA verification URL
                    $verifyURL = 'https://www.google.com/recaptcha/api/siteverify';

                    // Your Google reCAPTCHA secret key [dev]
                    // $secretKey = '6Ldum88qAAAAANVww5Xe6aHFL-g_UHLsHl7HGKs5';

                    // Prepare the POST request
                    $data = array(
                        'secret' => $secretKey,
                        'response' => $recaptchaResponse,                       
                    );

                    // Initiate cURL
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $verifyURL);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);
                    curl_close($ch);

                    // Decode JSON response
                    $responseData = json_decode($response);
                    // Helper::pr($responseData);

                    // Check if reCAPTCHA validation was successful
                    if ($responseData->success && $responseData->score >= 0.5) {
                        // reCAPTCHA validation passed, proceed with form processing
                        // echo "reCAPTCHA v3 validation passed. You can process the form."; die;
                        $rules = [                                 
                            'first_name'                => 'required',                                                                           
                            'email'                     => 'required',                                                  
                            'country'                   => 'required',                                                                                         
                        ];
                        if ($this->validate($request, $rules)) {
                            $checkValue = User::where('email', '=', $postData['email'])->count();
                            if ($checkValue <= 0) {        
                                // Generate a random alphanumeric password
                                $randomPassword = bin2hex(random_bytes(8));   

                                $fields = [                        
                                    'first_name'                => $postData['first_name'],                                                           
                                    'email'                     => $postData['email'],                                                          
                                    'country'                   => $postData['country'],
                                    'role'                      => $postData['role'],
                                    'password'                  => Hash::make($randomPassword),                         
                                ];
                                //  Helper::pr($fields);
                                User::insert($fields);
                                $generalSetting             = GeneralSetting::where('id', '=', 1)->first();
                                $subject                    = 'Subject: Your Login Credentials for Portal Access';
                                $message                    = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='padding: 10px; background: #fff; width: 500px;'>
                                                                    <tr><td style='padding: 8px 15px'>Dear " . htmlspecialchars($postData['first_name']) . ",</td></tr>
                                                                    <tr><td style='padding: 8px 15px'>Thank you for registering with us. Below are your credentials to access the portal:</td></tr>                                                                    
                                                                    <tr><td style='padding: 8px 15px'><strong>Sign-in Link: </strong><a href='" . htmlspecialchars(env('APP_URL') . "signin") . "'>" . htmlspecialchars(env('APP_URL') . "/signin") . "</a></td></tr>
                                                                    <tr><td style='padding: 8px 15px'><strong>Email: </strong>" . htmlspecialchars($postData['email']) . "</td></tr>    
                                                                    <tr><td style='padding: 8px 15px'><strong>Password: </strong>" . htmlspecialchars($randomPassword) . "</td></tr>                                         
                                                                    
                                                                    
                                                                    <tr><td style='padding: 8px 15px'>We look forward to receiving your creative-work submissions.</td></tr>
                                                                    <tr><td style='padding: 8px 15px'>The EaRTh editorial team</td></tr>
                                                                    <tr><td style='padding: 8px 15px'>This email is auto-generated from the EaRTh platform.</td></tr>
                                                                </table>";
                                $this->sendMail($postData['email'], $subject, $message);
                                return redirect(url('signin'))->with('success_message', 'Your sign-up was successful! Please check your email for your login credentials.');
                            } else {
                                return redirect()->back()->with('error_message', 'User already registered');
                            }
                        } else {
                            return redirect()->back()->with('error_message', 'All fields required');
                        }
                    } else {
                        // reCAPTCHA validation failed
                        // echo "reCAPTCHA v3 validation failed."; die;
                        return redirect()->back()->with('error_message', 'reCAPTCHA v3 validation failed. Please try again.');                        
                    }
            }
            echo $this->front_before_login_layout($title, $page_name, $data);
        }
        public function forgetPassword(Request $request)
        {            
            $title                          = 'Forgot Password';
            $page_name                      = 'forgetpassword';
            $data['search_keyword']         = '';
            if ($request->isMethod('post')) {
                $postData = $request->all();                
                 // Get reCAPTCHA token from form POST data
                    $recaptchaResponse = $postData['g-recaptcha-response'];

                    // Your Google reCAPTCHA secret key [live]
                    $secretKey = '6LcIw04qAAAAAJCWh02op84FgNvxexQsh9LLCuqW';

                    // Google reCAPTCHA verification URL [live]
                    $verifyURL = 'https://www.google.com/recaptcha/api/siteverify';

                    // Your Google reCAPTCHA secret key [dev]
                    // $secretKey = '6Ldum88qAAAAANVww5Xe6aHFL-g_UHLsHl7HGKs5';
                    

                    // Prepare the POST request
                    $data = array(
                        'secret' => $secretKey,
                        'response' => $recaptchaResponse,                       
                    );

                    // Initiate cURL
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $verifyURL);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);
                    curl_close($ch);

                    // Decode JSON response
                    $responseData = json_decode($response);

                    // Check if reCAPTCHA validation was successful
                    // if ($responseData->success && $responseData->score >= 0.5) {                        
                        $rules = [                                                                                               
                            'email'                     => 'required',                                                                                                                                                                    
                        ];
                        if ($this->validate($request, $rules)) {
                            $checkValue = User::where('email', '=', $postData['email'])->count();                              
                            $checkmail = User::where('email', '=', $postData['email'])->first();                              
                            if ($checkValue > 0) {  
                                if($checkmail->status != 1){                                    
                                    return redirect()->back()->with('error_message', 'Your account is deactivated contact with admin');
                                } else{
                                    // Generate a random 4-digit OTP
                                    $otp = rand(1000, 9999);
                                    $fields = [                                                            
                                        'otp'                  => $otp,                         
                                    ];                            
                                    User::where('email', $postData['email'])->update($fields);
                                    $generalSetting             = GeneralSetting::where('id', '=', 1)->first();
                                    $subject                    = 'Subject: OTP Verification';
                                    $message                    = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='padding: 10px; background: #fff; width: 500px;'>
                                                                        <tr><td style='padding: 8px 15px'>Your OTP code is: <strong>$otp</strong></td></tr>                                                                                                                                                                                                                                                   
                                                                        <tr><td style='padding: 8px 15px'>We look forward to receiving your creative-work submissions.</td></tr>
                                                                        <tr><td style='padding: 8px 15px'>The EaRTh editorial team</td></tr>
                                                                        <tr><td style='padding: 8px 15px'>This email is auto-generated from the EaRTh platform.</td></tr>
                                                                    </table>";
                                    $this->sendMail($postData['email'], $subject, $message);
                                    return redirect(url('otpvalidation'))->with('success_message', 'Your OTP has been successfully sent to your registered email address. Please check your email to retrieve the OTP.');
                                }                                                                      
                            } else {
                                return redirect()->back()->with('error_message', 'User not registered kindly signup first');
                            }
                        } else {
                            return redirect()->back()->with('error_message', 'All fields required');
                        }

                    // } else {                        
                    //     return redirect()->back()->with('error_message', 'reCAPTCHA v3 validation failed. Please try again.');                        
                    // }                              
            }
            echo $this->front_before_login_layout($title, $page_name, $data);
        }
        public function otpValidation(Request $request)
        {            
            $title                          = 'OTP Validation';
            $page_name                      = 'otpvalidation';
            $data['search_keyword']         = '';
            if ($request->isMethod('post')) {
                $postData = $request->all();                
                $rules = [                                                                                               
                    'otp'                     => 'required',                                                                                                                                                                    
                ];
                if ($this->validate($request, $rules)) {
                    $checkValue = User::where('otp', '=', $postData['otp'])->first();                           
                    if ($checkValue) {                                        
                        return redirect(url('resetpassword/'.Helper::encoded($checkValue->id)))->with('success_message', 'Your OTP has been successfully validated. Please reset your password to complete the sign-up process.');
                    } else {
                        return redirect()->back()->with('error_message', 'OTP is not validated');
                    }
                } else {
                    return redirect()->back()->with('error_message', 'All fields required');
                }                                                 
            }
            echo $this->front_before_login_layout($title, $page_name, $data);
        }
        public function resetPassword(Request $request, $id)
        {            
            $title                          = 'Reset Password';
            $page_name                      = 'resetpassword'; 
            $user_id                        = Helper::decoded($id);   
            $data['search_keyword']         = '';        
            if ($request->isMethod('post')) {
                $postData = $request->all();
                $rules      = [                    
                    'new_password'            => 'required',
                    'confirm_password'        => 'required',
                ];     
                if($this->validate($request, $rules)){      
                    $old_password       = User::find($user_id)->password;                    
                    $new_password       = $postData['new_password'];
                    $confirm_password   = $postData['confirm_password'];                    
                        if($new_password == $confirm_password){
                            if($new_password != $old_password){
                                $fields = [
                                    'password'            => Hash::make($new_password)
                                ];                                
                                User::where('id', '=', $user_id)->update($fields);
                                return redirect(url('signin'))->with('success_message', 'Password reset successfully');
                            } else {
                                return redirect()->back()->with('error_message', 'New & old password can\'t be same');
                            }
                        } else {
                            return redirect()->back()->with('error_message', 'New & confirm password doesn\'t matched');
                        }                    
                } else {
                    return redirect()->back()->with('error_message', 'All fields required');
                }           
                                                 
            }
            echo $this->front_before_login_layout($title, $page_name, $data);
        }
    /* authentication */
    /* after login */
        public function signout(Request $request){
            $user_email                             = $request->session()->get('email');
            $user_name                              = $request->session()->get('name');
            /* user activity */
                $activityData = [
                    'user_email'        => $user_email,
                    'user_name'         => $user_name,
                    'user_type'         => 'USER',
                    'ip_address'        => $request->ip(),
                    'activity_type'     => 2,
                    'activity_details'  => 'You are successfully signed out!',
                    'platform_type'     => 'WEB',
                ];
                UserActivity::insert($activityData);
            /* user activity */
            $request->session()->forget(['user_id', 'name', 'email', 'first_name', 'middle_name', 'last_name', 'role', 'is_user_login']);
            //  Helper::pr(session()->all());die;
            Auth::guard('web')->logout();
            return redirect(url('signin'))->with('success_message', 'You are successfully signed out!');
        }
        public function dashboard()
        {
            $user_id                        = session('user_id');
            $data['user']                   = User::find($user_id);
            $data['approved_articles']      = Article::where('is_published', '=', 4)->where('user_id', '=', $user_id)->count();
            // $data['pending_articles']       = Article::where('is_published', '=', 0)->orWhere('is_published', '=', 1)->where('user_id', '=', $user_id)->count();
            $data['pending_articles']       = Article::whereIn('is_published', [0, 1])->where('user_id', '=', $user_id)->count();

            $data['search_keyword']         = '';
            $title                          = 'Dashboard';
            $page_name                      = 'dashboard';
            echo $this->front_after_login_layout($title, $page_name, $data);
        }
        public function myProfile(Request $request)
        {
            $user_id                        = session('user_id');
            $data['user']                   = User::find($user_id);
            $data['countries']              = Country::select('id', 'name')->where('status', '=', 1)->get();
            $data['search_keyword']         = '';

            if ($request->isMethod('post')) {
                $postData = $request->all();
                // Helper::pr($postData);
                $rules = [                                 
                    'first_name'                => 'required',                                                                 
                    'email'                     => 'required',                                       
                    'country'                   => 'required',                        
                ];
                if ($this->validate($request, $rules)) {                    
                    $fields = [                        
                        'first_name'                => $postData['first_name'], 
                        'email'                     => $postData['email'],                                    
                        'country'                   => $postData['country'],                        
                    ];
                    //  Helper::pr($fields);
                    User::where('id', '=', $user_id)->update($fields);
                    UserProfile::where('user_id', '=', $user_id)->update($fields);
                    return redirect()->back()->with('success_message', 'Profile updated successfully');
                } else {
                    return redirect()->back()->with('error_message', 'All fields required');
                }
            }

            $title                          = 'My Profile';
            $page_name                      = 'my-profile';
            echo $this->front_after_login_layout($title, $page_name, $data);
        }
        public function changePassword(Request $request)
        {
            $user_id                        = session('user_id');
            $data['user']                   = User::find($user_id);
            $data['search_keyword']         = '';

            if ($request->isMethod('post')) {
                $postData   = $request->all();
                $rules      = [
                    'old_password'            => 'required',
                    'new_password'            => 'required',
                    'confirm_password'        => 'required',
                ];
                if($this->validate($request, $rules)){
                    $old_password       = $postData['old_password'];
                    $new_password       = $postData['new_password'];
                    $confirm_password   = $postData['confirm_password'];
                    if(Hash::check($old_password, $data['user']->password)){
                        if($new_password == $confirm_password){
                            if($new_password != $old_password){
                                $fields = [
                                    'password'            => Hash::make($new_password)
                                ];
                                User::where('id', '=', $user_id)->update($fields);
                                return redirect()->back()->with('success_message', 'Password changed successfully');
                            } else {
                                return redirect()->back()->with('error_message', 'New & old password can\'t be same');
                            }
                        } else {
                            return redirect()->back()->with('error_message', 'New & confirm password does not matched');
                        }
                    } else {
                        return redirect()->back()->with('error_message', 'Current password is incorrect');
                    }
                } else {
                    return redirect()->back()->with('error_message', 'All fields required');
                }
            }

            $title                          = 'Chnage Password';
            $page_name                      = 'change-password';
            echo $this->front_after_login_layout($title, $page_name, $data);
        }
        public function myArticle(Request $request)
        {
            $user_id                        = session('user_id');
            $data['user']                   = User::find($user_id);
            $data['articles']               = Article::where('user_id', '=', $user_id)->orderBy('id', 'DESC')->get();
            $data['search_keyword']         = '';
            $checkClassification            = UserClassification::where('user_id', '=', $user_id)->where('status', '!=', 3)->count();
            $checkProfile                   = UserProfile::where('user_id', '=', $user_id)->where('status', '!=', 3)->count();
            if($checkClassification <= 0){
                return redirect(url('user/add-author-classification'))->with(['error_message' => 'Create Classification First !!!']);
            }
            if($checkProfile <= 0){
                return redirect(url('user/add-profile'))->with(['error_message' => 'Create Profile First !!!']);
            }

            if ($request->isMethod('post')) {
                $postData = $request->all();
                $article_id = $postData['article_id'];
                $imageFile      = $request->file('nelp_form_scan_copy');
                if ($imageFile != '') {
                    $imageName      = $imageFile->getClientOriginalName();
                    $uploadedFile   = $this->upload_single_file('nelp_form_scan_copy', $imageName, 'article', 'pdf');
                    if ($uploadedFile['status']) {
                        $nelp_form_scan_copy = $uploadedFile['newFilename'];
                        Article::where('id', '=', $article_id)->update(['nelp_form_scan_copy' => $nelp_form_scan_copy, 'is_published' => 3]);
                        return redirect()->back()->with(['success_message' => 'Scan Copy Of NELP Form Uploaded Successfully !!!']);
                    } else {
                        return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                    }
                } else {
                    return redirect()->back()->with(['error_message' => 'Please Upload Scan Copy Of NELP Form !!!']);
                }
            }

            $title                          = 'My Creative-Works';
            $page_name                      = 'my-articles';
            echo $this->front_after_login_layout($title, $page_name, $data);
        }
        public function submitNewArticle(Request $request)
        {
            $user_id                        = session('user_id');
            $data['user']                   = User::find($user_id);
            $data['articles']               = Article::where('user_id', '=', $user_id)->get();
            $data['classification']         = UserClassification::where('user_id', '=', $user_id)->first();
            $data['profile']                = UserProfile::where('user_id', '=', $user_id)->first();
            $data['communities']            = Community::where('status', '=', 1)->orderBy('name', 'ASC')->get();
            $data['search_keyword']         = '';

            if ($request->isMethod('post')) {
                $postData                   = $request->all();

                $is_series                  = $postData['is_series'];
                if($is_series == 'Yes'){
                    $series_article_no          = $postData['series_article_no'];
                    $current_article_no         = $postData['current_article_no'];
                    $other_article_part_doi_no  = $postData['other_article_part_doi_no'];
                } else {
                    $series_article_no          = 0;
                    $current_article_no         = 0;
                    $other_article_part_doi_no  = '';
                }
                
                /* article no generate */
                    $currentMonth   = date('m');
                    $currentYear    = date('Y');
                    $currentMonthYear = $currentYear.'-'.$currentMonth;
                    $getLastArticle = Article::where('created_at', 'LIKE', '%'.$currentMonthYear.'%')->orderBy('id', 'DESC')->first();
                    if($getLastArticle){
                        $sl_no              = $getLastArticle->sl_no;
                        $next_sl_no         = $sl_no + 1;
                        $next_sl_no_string  = str_pad($next_sl_no, 3, 0, STR_PAD_LEFT);
                        $article_no         = 'SRN-EaRTh'.$currentMonth.$currentYear.'-'.$next_sl_no_string;
                    } else {
                        $next_sl_no         = 1;
                        $next_sl_no_string  = str_pad($next_sl_no, 3, 0, STR_PAD_LEFT);
                        $article_no         = 'SRN-EaRTh'.$currentMonth.$currentYear.'-'.$next_sl_no_string;
                    }
                /* article no generate */

                if ($postData['invited'] == 'No' && $postData['participated'] == 'No') {                    
                    $rules = [
                        'first_name'                => 'required',                                                                
                        'email'                     => 'required',                                                             
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
                    $coauthorPronoun = [];
    
                    // Loop through the number of co-authors and collect the data into arrays
                    for ($i = 1; $i <= $coAuthorsCount; $i++) {
                        // Check if co-author name exists, to avoid null entries
                        if ($request->input("co_author_name_{$i}") !== null) {
                            $coAuthorNames[] = $request->input("co_author_name_{$i}");
                            $coAuthorBios[] = $request->input("co_author_short_bio_{$i}");
                            $coAuthorCountries[] = $request->input("co_author_country_{$i}");
                            $coAuthorOrganizations[] = $request->input("co_authororganization_name_{$i}");
                            if($request->input("co_ecosystem_affiliation_{$i}") !== null){
                                $coecosystemAffiliations[] = $request->input("co_ecosystem_affiliation_{$i}", []);
                            } else{
                                return redirect()->back()->withInput()->with(['error_message' => 'Please select Co-Author ancestors !!!']);
                            }
                            // $coecosystemAffiliations[] = $request->input("co_ecosystem_affiliation_{$i}", []);

                            $coindigenousAffiliations[] = $request->input("co_indigenous_affiliation_{$i}");
                            if($request->input("co_author_classification_{$i}") !== null){                                        
                                $coauthorClassification[] = $request->input("co_author_classification_{$i}");
                                } else{
                                    return redirect()->back()->withInput()->with(['error_message' => 'Please select Co-Author classification !!!']);
                            }

                            if($request->input("co_author_pronoun{$i}") !== null){                                        
                                $coauthorPronoun[] = $request->input("co_author_pronoun{$i}");
                                } else{
                                    return redirect()->back()->withInput()->with(['error_message' => 'Please select Co-Author pronoun !!!']);
                            }
                        }
                    }                
                    
                    /* co-author details */
    
                    if($postData['co_authors'] == '0'){
                        
                        //save to database//
                        if ($this->validate($request, $rules)) {                                            
                            $fields = [
                                'sl_no'                     => $next_sl_no,
                                'article_no'                => $article_no,
                                'user_id'                   => $user_id,             
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
                                'participated_info'         => $participatedInfo,
                                'is_series'                 => $is_series,
                                'series_article_no'         => $series_article_no,
                                'current_article_no'        => $current_article_no,
                                'other_article_part_doi_no' => $other_article_part_doi_no,
                            ];
                            //   Helper::pr($fields);

                            /* submission email */
                            $generalSetting             = GeneralSetting::find('1');                            
                            $fullName                   = $postData['first_name'];
                            $mailData                   = [
                                'fullName'                  => $fullName,
                                'email'                     => $postData['email'],
                                'article_no'                => $article_no,
                                'creative_Work'      => $postData['creative_Work'],
                            ];
                            $subject                    = $generalSetting->site_name.': Creative-Work submitted by ' . $fullName . ' (' . $postData['email'] . ') ' . '#' . $article_no;
                            $message                    = view('email-templates.creative-work-submission',$mailData);
                            // echo $message;die;
                            $this->sendMail($postData['email'], $subject, $message);
                            $this->sendMail($generalSetting->system_email, $subject, $message);
                            /* submission email */
                            /* email log save */
                                $postData2 = [
                                    'name'                  => $fullName,
                                    'email'                 => $postData['email'],
                                    'subject'               => $subject,
                                    'message'               => $message
                                ];
                                EmailLog::insertGetId($postData2);
                            /* email log save */

                            Article::insert($fields);
                            return redirect(url('user/my-articles'))->with('success_message', 'Creative-Work submitted successfully!');
                            } else {
                                return redirect()->back()->withInput()->with('error_message', 'All fields required');
                            }
                    } else{                    
                        //save to database//
                        if ($this->validate($request, $rules)) {                
                            $fields = [
                                'sl_no'                     => $next_sl_no,
                                'article_no'                => $article_no,
                                'user_id'                   => $user_id,                
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
                                'co_author_pronoun'         => json_encode($coauthorPronoun),
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
                                'participated_info'         => $participatedInfo,
                                'is_series'                 => $is_series,
                                'series_article_no'         => $series_article_no,
                                'current_article_no'        => $current_article_no,
                                'other_article_part_doi_no' => $other_article_part_doi_no,
                            ];
                            //   Helper::pr($fields);
                            /* submission email */
                            $generalSetting             = GeneralSetting::find('1');                            
                            $fullName                   = $postData['first_name'];
                            $mailData                   = [
                                'fullName'                  => $fullName,
                                'email'                     => $postData['email'],
                                'article_no'                => $article_no,
                                'creative_Work'      => $postData['creative_Work'],
                            ];
                            $subject                    = $generalSetting->site_name.': Creative-Work submitted by ' . $fullName . ' (' . $postData['email'] . ') ' . '#' . $article_no;
                            $message                    = view('email-templates.creative-work-submission',$mailData);
                            // echo $message;die;
                            $this->sendMail($postData['email'], $subject, $message);
                            $this->sendMail($generalSetting->system_email, $subject, $message);
                            /* submission email */
                            /* email log save */
                                $postData2 = [
                                    'name'                  => $fullName,
                                    'email'                 => $postData['email'],
                                    'subject'               => $subject,
                                    'message'               => $message
                                ];
                                EmailLog::insertGetId($postData2);
                            /* email log save */

                            Article::insert($fields);
                            return redirect(url('user/my-articles'))->with('success_message', 'Creative-Work submitted successfully!');
                        } else {
                                return redirect()->back()->withInput()->with('error_message', 'All fields required');
                        }
                    }
                } else{
                    $rules = [
                    'author_classification'     => 'required',
                    'first_name'                => 'required',                                                               
                    'email'                     => 'required',                                      
                    'country'                   => 'required',                                                          
                    'orginal_work'              => 'required', 
                    'copyright'                 => 'required', 
                    'submission_types'          => 'required',
                    'additional_information'    => ['required', 'string', new MaxWords(100)], 
                    'state'                     => 'required',
                    'city'                      => 'required', 
                    'acknowledge'               => 'required',                                                      
                    'section_ert'               => 'required',
                    'title'                     => 'required',
                    'pronoun'                   => 'required',  
                    'community'                 => 'required',
                    // 'organization_name'         => 'required',
                    // 'organization_website'      => 'required',
                    'ecosystem_affiliation'     => 'required',
                    'expertise_area'            => 'required',
                    'explanation'               => ['required', 'string', new MaxWords(100)],
                    'explanation_submission'    => ['required', 'string', new MaxWords(150)],                
                    'creative_Work'             => ['required', 'string', new MaxWords(10)],
                    'creative_Work_fiction'     => 'required',
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

                            /* narrative doc file */
                            $imageFile      = $request->file('narrative_file');
                            if ($imageFile != '') {
                             $old_fileName      = $imageFile->getClientOriginalName();
                             // Save the file name in the session
                            //  session()->flash('narrative_file', $old_fileName);
                             $imageName      = $article_no;
                            // Get file extension
                              $fileExtension = pathinfo($old_fileName, PATHINFO_EXTENSION);                                 
                             $newFileName = $imageName . '.' . $fileExtension;
                                $uploadedFile   = $this->upload_single_file('narrative_file', $newFileName, 'narrative', 'word');
                                if ($uploadedFile['status']) {
                                    $narrative_file = $uploadedFile['newFilename'];
                                } else {
                                    return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                                }
                            } 
                            else {
                                return redirect()->back()->withInput()->with(['error_message' => 'Please upload complete narrative file and images !!!']);
                            }
                            /* narrative doc file */
                           
                           /* narrative images details */
                           // Define the number of co-authors you want to handle (e.g., 3 in this case)
                           
                           if (!isset($postData['narrative_images'])) {
                               return redirect()->back()->withInput()->with(['error_message' => 'Please select number of narrative image !!!']);
                           } else{
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
                                                $old_imageName      = $imageFile->getClientOriginalName();
                                                $imageName      = $article_no;
                                                // Get file extension
                                                    $fileExtension = pathinfo($old_imageName, PATHINFO_EXTENSION);
                                                    // Append the desired suffix ('a', 'b', 'c', etc.) based on $i
                                                    $suffix = chr(96 + $i); // Convert $i to a letter: 1 = 'a', 2 = 'b', 3 = 'c', etc.
                                                $newFileName = $imageName . '-' . $suffix . '.' . $fileExtension;                                        
                                            $uploadedFile   = $this->upload_single_file("image_file_{$i}", $newFileName, 'narrative', 'image');                                
                                            if ($uploadedFile['status']) {
                                                $narrativeimageFile[] = $uploadedFile['newFilename'];                                
                                            } else {
                                                $narrativeimageFile[] = null;                                    
                                            }
                                        }                                                                                                                        
                                    } else {
                                        return redirect()->back()->withInput()->with(['error_message' => 'Please upload complete narrative file and images !!!']);
                                    }   
                                }                                          
                                /* narrative images details */  
                            }                            
   
                           
                           //save to database//
                           if ($this->validate($request, $rules)) {                
                               $fields = [
                                    'sl_no'                     => $next_sl_no,
                                    'article_no'                => $article_no,
                                    'user_id'                   => $user_id,     
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
                                    'community'                 => $postData['community'],
                                    'community_name'            => $postData['community_name'],
                                    'explanation'               => $postData['explanation'],  
                                    'explanation_submission'    => $postData['explanation_submission'],     
                                    'titleId'                   => $postData['title'],                        
                                    'creative_Work'             => $postData['creative_Work'],
                                    'creative_Work_fiction'     => $postData['creative_Work_fiction'],
                                    'subtitle'                  => $postData['subtitle'],
                                    'submission_types'          => $submission_typesInfo,
                                    'additional_information'    => $postData['additional_information'],
                                    'section_ertId'             => $section_ertInfo,
                                    'narrative_file'            => $narrative_file,
                                    'narrative_images'          => $postData['narrative_images'],
                                    'narrative_image_desc'      => json_encode($narrativeImageDesc),  // Storing as JSON string
                                    'image_files'               => json_encode($narrativeimageFile),
                                    'country'                   => $postData['country'],
                                    'state'                     => $postData['state'],
                                    'city'                      => $postData['city'],
                                    'organization_name'         => $postData['organization_name'],
                                    'organization_website'      => $postData['organization_website'],
                                    'ecosystem_affiliationId'   => $ecosystem_affiliationInfo,
                                    'indigenous_affiliation'    => $postData['indigenous_affiliation'],
                                    'expertise_areaId'          => $expertise_areaInfo,
                                    'bio_short'                 => $postData['bio_short'],
                                    'bio_long'                  => $postData['bio_long'],
                                    'is_series'                 => $is_series,
                                    'series_article_no'         => $series_article_no,
                                    'current_article_no'        => $current_article_no,
                                    'other_article_part_doi_no' => $other_article_part_doi_no,
                               ];
                                    //  Helper::pr($fields);

                               /* submission email */
                                $generalSetting             = GeneralSetting::find('1');                            
                                $fullName                   = $postData['first_name'];
                                $mailData                   = [
                                    'fullName'                  => $fullName,
                                    'email'                     => $postData['email'],
                                    'article_no'                => $article_no,
                                    'creative_Work'      => $postData['creative_Work'],
                                ];
                                $subject                    = $generalSetting->site_name.': Creative-Work submitted by ' . $fullName . ' (' . $postData['email'] . ') ' . '#' . $article_no;
                                $message                    = view('email-templates.creative-work-submission',$mailData);
                                // echo $message;die;
                                $this->sendMail($postData['email'], $subject, $message);
                                $this->sendMail($generalSetting->system_email, $subject, $message);
                                /* submission email */
                                /* email log save */
                                    $postData2 = [
                                        'name'                  => $fullName,
                                        'email'                 => $postData['email'],
                                        'subject'               => $subject,
                                        'message'               => $message
                                    ];
                                    EmailLog::insertGetId($postData2);
                                /* email log save */

                                Article::insert($fields);
                                return redirect(url('user/my-articles'))->with('success_message', 'Creative-Work submitted successfully!');
                                } else {
                                    return redirect()->back()->withInput()->with('error_message', 'All fields required');
                                }                               
                       } else if($postData['submission_types'] == '2'){
                           /* art images details */
                           if (!isset($postData['art_images'])) {
                            return redirect()->back()->withInput()->with(['error_message' => 'Please select number of art image !!!']);
                        } else{
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
                                        $old_imageName      = $imageFile->getClientOriginalName();
                                           $imageName      = $article_no;
                                          // Get file extension
                                            $fileExtension = pathinfo($old_imageName, PATHINFO_EXTENSION);
                                            // Append the desired suffix ('a', 'b', 'c', etc.) based on $i
                                            $suffix = chr(96 + $i); // Convert $i to a letter: 1 = 'a', 2 = 'b', 3 = 'c', etc.
                                           $newFileName = $imageName . '-' . $suffix . '.' . $fileExtension;                         
                                        //    $imageName      = $imageFile->getClientOriginalName();                                 
                                       $uploadedFile   = $this->upload_single_file("art_image_file_{$i}", $newFileName, 'art_image', 'image');                                
                                       if ($uploadedFile['status']) {
                                           $artimageFile[] = $uploadedFile['newFilename'];                                
                                       } else {
                                           $artimageFile[] = null;                                    
                                       }
                                   }                                                                                                                      
                               } else {
                                return redirect()->back()->withInput()->with(['error_message' => 'Please upload art image File !!!']);
                            }   
                           }  
                        } 
                           if($postData['art_desc'] == ''){
                               return redirect()->back()->withInput()->with(['error_message' => 'Please upload art image, caption and with descriptive narrative !!!']);
                           }
                           /* art images details */
   
                           if ($this->validate($request, $rules)) {        
                            // Helper::pr($postData);        
                               $fields = [
                                    'sl_no'                     => $next_sl_no,
                                    'article_no'                => $article_no,
                                    'user_id'                   => $user_id,              
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
                                    'community'                 => $postData['community'],
                                    'community_name'            => $postData['community_name'],
                                    'explanation'               => $postData['explanation'],  
                                    'explanation_submission'    => $postData['explanation_submission'],     
                                    'titleId'                   => $postData['title'],                        
                                    'creative_Work'             => $postData['creative_Work'],
                                    'creative_Work_fiction'     => $postData['creative_Work_fiction'],
                                    'subtitle'                  => $postData['subtitle'],
                                    'submission_types'          => $submission_typesInfo,
                                    'additional_information'    => $postData['additional_information'],
                                    'section_ertId'             => $section_ertInfo,                                  
                                    'art_images'                => $postData['art_images'],
                                    'art_image_desc'            => json_encode($artImageDesc),  // Storing as JSON string
                                    'art_image_file'            => json_encode($artimageFile),
                                    'art_desc'                  => $postData['art_desc'],
                                    'country'                   => $postData['country'],
                                    'state'                     => $postData['state'],
                                    'city'                      => $postData['city'],
                                    'organization_name'         => $postData['organization_name'],
                                    'organization_website'      => $postData['organization_website'],
                                    'ecosystem_affiliationId'   => $ecosystem_affiliationInfo,
                                    'indigenous_affiliation'    => $postData['indigenous_affiliation'],
                                    'expertise_areaId'          => $expertise_areaInfo,
                                    'bio_short'                 => $postData['bio_short'],
                                    'bio_long'                  => $postData['bio_long'],
                                    'is_series'                 => $is_series,
                                    'series_article_no'         => $series_article_no,
                                    'current_article_no'        => $current_article_no,
                                    'other_article_part_doi_no' => $other_article_part_doi_no,
                               ];
                                    //   Helper::pr($fields);

                                /* submission email */
                                $generalSetting             = GeneralSetting::find('1');                            
                                $fullName                   = $postData['first_name'];
                                $mailData                   = [
                                    'fullName'                  => $fullName,
                                    'email'                     => $postData['email'],
                                    'article_no'                => $article_no,
                                    'creative_Work'             => $postData['creative_Work'],
                                ];
                                $subject                    = $generalSetting->site_name.': Creative-Work submitted by ' . $fullName . ' (' . $postData['email'] . ') ' . '#' . $article_no;
                                $message                    = view('email-templates.creative-work-submission',$mailData);
                                // echo $message;die;
                                $this->sendMail($postData['email'], $subject, $message);
                                $this->sendMail($generalSetting->system_email, $subject, $message);
                                /* submission email */
                                /* email log save */
                                    $postData2 = [
                                        'name'                  => $fullName,
                                        'email'                 => $postData['email'],
                                        'subject'               => $subject,
                                        'message'               => $message
                                    ];
                                    EmailLog::insertGetId($postData2);
                                /* email log save */

                                Article::insert($fields);
                                return redirect(url('user/my-articles'))->with('success_message', 'Creative-Work submitted successfully!');
                                } else {
                                    return redirect()->back()->withInput()->with('error_message', 'All fields required');
                                }                               
                       } else if($postData['submission_types'] == '3') {
                           /* art_video file */
                           $imageFile      = $request->file('art_video_file');
                           if ($imageFile != '') {
                            //    $imageName      = $imageFile->getClientOriginalName();
                               $old_imageName      = $imageFile->getClientOriginalName();
                                $imageName      = $article_no;
                                // Get file extension
                                $fileExtension = pathinfo($old_imageName, PATHINFO_EXTENSION);                                
                                $newFileName = $imageName . '.' . $fileExtension;
                               $uploadedFile   = $this->upload_single_file('art_video_file', $newFileName, 'art_video', 'video');
                               if ($uploadedFile['status']) {
                                   $art_video_file = $uploadedFile['newFilename'];
                               } else {
                                   return redirect()->back()->withInput()->with(['error_message' => $uploadedFile['message']]);
                               }
                           } 
                           else {
                               return redirect()->back()->withInput()->with(['error_message' => 'Please Upload art_video File !!!']);
                           }
                           if($postData['art_video_desc'] == ''){
                            return redirect()->back()->withInput()->with(['error_message' => 'Please upload art video and with descriptive narrative !!!']);
                        }
                           /* art_video file */   
                           if ($this->validate($request, $rules)) {  
                            // Helper::pr($postData);              
                               $fields = [
                                    'sl_no'                     => $next_sl_no,
                                    'article_no'                => $article_no,
                                    'user_id'                   => $user_id,          
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
                                    'community'                 => $postData['community'],
                                    'community_name'            => $postData['community_name'],
                                    'explanation'               => $postData['explanation'],  
                                    'explanation_submission'    => $postData['explanation_submission'],     
                                    'titleId'                   => $postData['title'],                        
                                    'creative_Work'             => $postData['creative_Work'],
                                    'creative_Work_fiction'     => $postData['creative_Work_fiction'],
                                    'subtitle'                  => $postData['subtitle'],
                                    'submission_types'          => $submission_typesInfo,
                                    'additional_information'    => $postData['additional_information'],
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
                                    'bio_short'                 => $postData['bio_short'],
                                    'bio_long'                  => $postData['bio_long'],
                                    'is_series'                 => $is_series,
                                    'series_article_no'         => $series_article_no,
                                    'current_article_no'        => $current_article_no,
                                    'other_article_part_doi_no' => $other_article_part_doi_no,
                               ];
                                    // Helper::pr($fields);

                               /* submission email */
                                $generalSetting             = GeneralSetting::find('1');                            
                                $fullName                   = $postData['first_name'];
                                $mailData                   = [
                                    'fullName'                  => $fullName,
                                    'email'                     => $postData['email'],
                                    'article_no'                => $article_no,
                                    'creative_Work'      => $postData['creative_Work'],
                                ];
                                $subject                    = $generalSetting->site_name.': Creative-Work submitted by ' . $fullName . ' (' . $postData['email'] . ') ' . '#' . $article_no;
                                $message                    = view('email-templates.creative-work-submission',$mailData);
                                // echo $message;die;
                                $this->sendMail($postData['email'], $subject, $message);
                                $this->sendMail($generalSetting->system_email, $subject, $message);
                                /* submission email */
                                /* email log save */
                                    $postData2 = [
                                        'name'                  => $fullName,
                                        'email'                 => $postData['email'],
                                        'subject'               => $subject,
                                        'message'               => $message
                                    ];
                                    EmailLog::insertGetId($postData2);
                                /* email log save */

                                Article::insert($fields);
                                return redirect(url('user/my-articles'))->with('success_message', 'Creative-Work submitted successfully!');
                            } else {
                                return redirect()->back()->withInput()->with('error_message', 'All fields required');
                            }                               
                       } else{
                           return redirect()->back()->withInput()->with(['error_message' => 'Please select submission type !!!']);
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
                            $coauthorPronoun = [];
    
                            // Loop through the number of co-authors and collect the data into arrays
                            for ($i = 1; $i <= $coAuthorsCount; $i++) {
                                // Check if co-author name exists, to avoid null entries
                                if ($request->input("co_author_name_{$i}") !== null) {                                    
                                    $coAuthorNames[] = $request->input("co_author_name_{$i}");

                                    if($request->input("co_author_short_bio_{$i}") !== null){
                                        $coAuthorBios[] = $request->input("co_author_short_bio_{$i}", []);
                                    } else{
                                        return redirect()->back()->withInput()->with(['error_message' => 'Please select Co-Author short bio !!!']);
                                    }
                                    // $coAuthorBios[] = $request->input("co_author_short_bio_{$i}");

                                    if($request->input("co_author_country_{$i}") !== null){
                                        $coAuthorCountries[] = $request->input("co_author_country_{$i}", []);
                                    } else{
                                        return redirect()->back()->withInput()->with(['error_message' => 'Please select Co-Author country !!!']);
                                    }
                                    // $coAuthorCountries[] = $request->input("co_author_country_{$i}");

                                    if($request->input("co_authororganization_name_{$i}") !== null){
                                        $coAuthorOrganizations[] = $request->input("co_authororganization_name_{$i}", []);
                                    } else{
                                        return redirect()->back()->withInput()->with(['error_message' => 'Please select Co-Author organization name !!!']);
                                    }
                                    // $coAuthorOrganizations[] = $request->input("co_authororganization_name_{$i}");

                                    if($request->input("co_ecosystem_affiliation_{$i}") !== null){
                                        $coecosystemAffiliations[] = $request->input("co_ecosystem_affiliation_{$i}", []);
                                    } else{
                                        return redirect()->back()->withInput()->with(['error_message' => 'Please select Co-Author ecosystem affiliation !!!']);
                                    }
                                    // $coecosystemAffiliations[] = $request->input("co_ecosystem_affiliation_{$i}", []);

                                    if($request->input("co_indigenous_affiliation_{$i}") !== null){
                                        $coindigenousAffiliations[] = $request->input("co_indigenous_affiliation_{$i}", []);
                                    } else{
                                        return redirect()->back()->withInput()->with(['error_message' => 'Please select Co-Author indigenous affiliation !!!']);
                                    }
                                    // $coindigenousAffiliations[] = $request->input("co_indigenous_affiliation_{$i}");

                                    if($request->input("co_author_classification_{$i}") !== null){
                                        $coauthorClassification[] = $request->input("co_author_classification_{$i}", []);
                                    } else{
                                        return redirect()->back()->withInput()->with(['error_message' => 'Please select Co-Author classification !!!']);
                                    }

                                    if($request->input("co_author_pronoun_{$i}") !== null){
                                        $coauthorPronoun[] = $request->input("co_author_pronoun_{$i}", []);
                                    } else{
                                        return redirect()->back()->withInput()->with(['error_message' => 'Please select Co-Author pronoun !!!']);
                                    }
                                }else{
                                    return redirect()->back()->withInput()->with(['error_message' => 'Please select Co-Author ancestors !!!']);
                                }
                            }                                            
                            /* co-author details */
    
                            $participatedInfo = isset($postData['participated_info']) ? $postData['participated_info'] : '';
                            $invited_byInfo = isset($postData['invited_by']) ? $postData['invited_by'] : '';
                            $invited_emailInfo = isset($postData['invited_by_email']) ? $postData['invited_by_email'] : '';
                            $section_ertInfo = isset($postData['section_ert']) ? ($postData['section_ert']) : '';
                            $expertise_areaInfo = isset($postData['expertise_area']) ? json_encode($postData['expertise_area']) : '';
                            $ecosystem_affiliationInfo = isset($postData['ecosystem_affiliation']) ? json_encode($postData['ecosystem_affiliation']) : '';
                            $submission_typesInfo = isset($postData['submission_types']) ? $postData['submission_types'] : '';

                            if($postData['submission_types'] == '1'){    
                            
                                /* narrative images details */
                                if (!isset($postData['narrative_images'])) {
                                    return redirect()->back()->withInput()->with(['error_message' => 'Please select number of narrative image !!!']);
                                } else{
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
                                                $old_imageName      = $imageFile->getClientOriginalName();
                                                $imageName      = $article_no;
                                            // Get file extension
                                                $fileExtension = pathinfo($old_imageName, PATHINFO_EXTENSION);
                                                // Append the desired suffix ('a', 'b', 'c', etc.) based on $i
                                                $suffix = chr(96 + $i); // Convert $i to a letter: 1 = 'a', 2 = 'b', 3 = 'c', etc.
                                                $newFileName = $imageName . '-' . $suffix . '.' . $fileExtension;
                                                $uploadedFile   = $this->upload_single_file("image_file_{$i}", $newFileName, 'narrative', 'image');                                
                                                if ($uploadedFile['status']) {
                                                    $narrativeimageFile[] = $uploadedFile['newFilename'];                                
                                                } else {
                                                    $narrativeimageFile[] = null;                                    
                                                }
                                            }                                                                                         
                                        } else {
                                            return redirect()->back()->withInput()->with(['error_message' => 'Please upload complete narrative file and images !!!']);
                                        }  
                                    }                                               
                                    /* narrative images details */
                                }                            
                                /* narrative doc file */
                                    $imageFile      = $request->file('narrative_file');
                                    if ($imageFile != '') {
                                        // $imageName      = $imageFile->getClientOriginalName();
                                        $old_imageName      = $imageFile->getClientOriginalName();
                                           $imageName      = $article_no;
                                          // Get file extension
                                            $fileExtension = pathinfo($old_imageName, PATHINFO_EXTENSION);                                            
                                           $newFileName = $imageName . '.' . $fileExtension;
                                        $uploadedFile   = $this->upload_single_file('narrative_file', $newFileName, 'narrative', 'word');
                                        if ($uploadedFile['status']) {
                                            $narrative_file = $uploadedFile['newFilename'];
                                        } else {
                                            return redirect()->back()->withInput()->with(['error_message' => $uploadedFile['message']]);
                                        }
                                    } 
                                    else {
                                        return redirect()->back()->withInput()->with(['error_message' => 'Please upload complete narrative file and images !!!']);
                                    }   
                                /* narrative doc file */
                                
                                //save to database//
                                if ($this->validate($request, $rules)) {                
                                    $fields = [
                                        'sl_no'                     => $next_sl_no,
                                        'article_no'                => $article_no,
                                        'user_id'                   => $user_id,           
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
                                        'co_author_pronoun'         => json_encode($coauthorPronoun),
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
                                        'community'                 => $postData['community'],
                                        'community_name'            => $postData['community_name'],
                                        'explanation'               => $postData['explanation'],  
                                        'explanation_submission'    => $postData['explanation_submission'],     
                                        'titleId'                   => $postData['title'],                        
                                        'creative_Work'             => $postData['creative_Work'],
                                        'creative_Work_fiction'     => $postData['creative_Work_fiction'],
                                        'subtitle'                  => $postData['subtitle'],
                                        'submission_types'          => $submission_typesInfo,
                                        'additional_information'    => $postData['additional_information'],
                                        'section_ertId'             => $section_ertInfo,
                                        'narrative_file'            => $narrative_file,
                                        'narrative_images'          => $postData['narrative_images'],
                                        'narrative_image_desc'      => json_encode($narrativeImageDesc),  // Storing as JSON string
                                        'image_files'               => json_encode($narrativeimageFile),  
                                        'country'                   => $postData['country'],
                                        'state'                     => $postData['state'],
                                        'city'                      => $postData['city'],
                                        'organization_name'         => $postData['organization_name'],
                                        'organization_website'      => $postData['organization_website'],
                                        'ecosystem_affiliationId'   => $ecosystem_affiliationInfo,
                                        'indigenous_affiliation'    => $postData['indigenous_affiliation'],
                                        'expertise_areaId'          => $expertise_areaInfo,
                                        'bio_short'                 => $postData['bio_short'],
                                        'bio_long'                  => $postData['bio_long'],
                                        'is_series'                 => $is_series,
                                        'series_article_no'         => $series_article_no,
                                        'current_article_no'        => $current_article_no,
                                        'other_article_part_doi_no' => $other_article_part_doi_no,  
                                    ];
                                    //    Helper::pr($fields);

                                    /* submission email */
                                    $generalSetting             = GeneralSetting::find('1');                            
                                    $fullName                   = $postData['first_name'];
                                    $mailData                   = [
                                        'fullName'                  => $fullName,
                                        'email'                     => $postData['email'],
                                        'article_no'                => $article_no,
                                        'creative_Work'      => $postData['creative_Work'],
                                    ];
                                    $subject                    = $generalSetting->site_name.': Creative-Work submitted by ' . $fullName . ' (' . $postData['email'] . ') ' . '#' . $article_no;
                                    $message                    = view('email-templates.creative-work-submission',$mailData);
                                    // echo $message;die;
                                    $this->sendMail($postData['email'], $subject, $message);
                                    $this->sendMail($generalSetting->system_email, $subject, $message);
                                    /* submission email */
                                    /* email log save */
                                        $postData2 = [
                                            'name'                  => $fullName,
                                            'email'                 => $postData['email'],
                                            'subject'               => $subject,
                                            'message'               => $message
                                        ];
                                        EmailLog::insertGetId($postData2);
                                    /* email log save */

                                    Article::insert($fields);
                                    return redirect(url('user/my-articles'))->with('success_message', 'Creative-Work submitted successfully!');
                                    } else {
                                        return redirect()->back()->withInput()->with('error_message', 'All fields required');
                                    }                                    
                            } else if($postData['submission_types'] == '2'){
    
                                /* art images details */
                                if (!isset($postData['art_images'])) {
                                    return redirect()->back()->withInput()->with(['error_message' => 'Please select number of art image !!!']);
                                }
                                else{
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
                                                $old_imageName      = $imageFile->getClientOriginalName();
                                                $imageName      = $article_no;
                                            // Get file extension
                                                $fileExtension = pathinfo($old_imageName, PATHINFO_EXTENSION);
                                                // Append the desired suffix ('a', 'b', 'c', etc.) based on $i
                                                $suffix = chr(96 + $i); // Convert $i to a letter: 1 = 'a', 2 = 'b', 3 = 'c', etc.
                                                $newFileName = $imageName . '-' . $suffix . '.' . $fileExtension;
                                                $uploadedFile   = $this->upload_single_file("art_image_file_{$i}", $newFileName, 'art_image', 'image');                                
                                                if ($uploadedFile['status']) {
                                                    $artimageFile[] = $uploadedFile['newFilename'];                                
                                                } else {
                                                    $artimageFile[] = null;                                    
                                                }
                                            }                                                                                        
                                        } else {
                                            return redirect()->back()->withInput()->with(['error_message' => 'Please upload art image File !!!']);
                                        }   
                                    }   
                                }
                                   if($postData['art_desc'] == ''){
                                       return redirect()->back()->withInput()->with(['error_message' => 'Please upload art image, caption and with descriptive narrative !!!']);
                                   }
                                    // }                                               
                                    /* art images details */
    
                                    if ($this->validate($request, $rules)) {                
                                        $fields = [
                                            'sl_no'                     => $next_sl_no,
                                            'article_no'                => $article_no,
                                            'user_id'                   => $user_id,          
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
                                            'co_author_pronoun'         => json_encode($coauthorPronoun),
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
                                            'community'                 => $postData['community'],
                                            'community_name'            => $postData['community_name'],
                                            'explanation'               => $postData['explanation'],  
                                            'explanation_submission'    => $postData['explanation_submission'],     
                                            'titleId'                   => $postData['title'],                        
                                            'creative_Work'             => $postData['creative_Work'],
                                            'creative_Work_fiction'     => $postData['creative_Work_fiction'],
                                            'subtitle'                  => $postData['subtitle'],
                                            'submission_types'          => $submission_typesInfo,
                                            'additional_information'    => $postData['additional_information'],
                                            'section_ertId'             => $section_ertInfo,                                        
                                            'art_images'                => $postData['art_images'],
                                            'art_image_desc'            => json_encode($artImageDesc),  // Storing as JSON string
                                            'art_image_file'            => json_encode($artimageFile),
                                            'art_desc'                  => $postData['art_desc'],
                                            'country'                   => $postData['country'],
                                            'state'                     => $postData['state'],
                                            'city'                      => $postData['city'],
                                            'organization_name'         => $postData['organization_name'],
                                            'organization_website'      => $postData['organization_website'],
                                            'ecosystem_affiliationId'   => $ecosystem_affiliationInfo,
                                            'indigenous_affiliation'    => $postData['indigenous_affiliation'],
                                            'expertise_areaId'          => $expertise_areaInfo,
                                            'bio_short'                 => $postData['bio_short'],
                                            'bio_long'                  => $postData['bio_long'],
                                            'is_series'                 => $is_series,
                                            'series_article_no'         => $series_article_no,
                                            'current_article_no'        => $current_article_no,
                                            'other_article_part_doi_no' => $other_article_part_doi_no,
                                        ];
                                        //    Helper::pr($fields);
                                        /* submission email */
                                        $generalSetting             = GeneralSetting::find('1');                            
                                        $fullName                   = $postData['first_name'];
                                        $mailData                   = [
                                            'fullName'                  => $fullName,
                                            'email'                     => $postData['email'],
                                            'article_no'                => $article_no,
                                            'creative_Work'      => $postData['creative_Work'],
                                        ];
                                        $subject                    = $generalSetting->site_name.': Creative-Work submitted by ' . $fullName . ' (' . $postData['email'] . ') ' . '#' . $article_no;
                                        $message                    = view('email-templates.creative-work-submission',$mailData);
                                        // echo $message;die;
                                        $this->sendMail($postData['email'], $subject, $message);
                                        $this->sendMail($generalSetting->system_email, $subject, $message);
                                        /* submission email */
                                        /* email log save */
                                        $postData2 = [
                                            'name'                  => $fullName,
                                            'email'                 => $postData['email'],
                                            'subject'               => $subject,
                                            'message'               => $message
                                        ];
                                        EmailLog::insertGetId($postData2);
                                        /* email log save */

                                        Article::insert($fields);
                                        return redirect(url('user/my-articles'))->with('success_message', 'Creative-Work submitted successfully!');
                                    } else {
                                        return redirect()->back()->withInput()->with('error_message', 'All fields required');
                                    }                                    
                            } else {
    
                                /* art_video file */
                                $imageFile      = $request->file('art_video_file');
                                if ($imageFile != '') {
                                    $old_imageName      = $imageFile->getClientOriginalName();
                                    $imageName      = $article_no;
                                    // Get file extension
                                    $fileExtension = pathinfo($old_imageName, PATHINFO_EXTENSION);                                    
                                    $newFileName = $imageName . '.' . $fileExtension;
                                    $uploadedFile   = $this->upload_single_file('art_video_file', $newFileName, 'art_video', 'video');
                                    if ($uploadedFile['status']) {
                                        $art_video_file = $uploadedFile['newFilename'];
                                    } else {
                                        return redirect()->back()->withInput()->with(['error_message' => $uploadedFile['message']]);
                                    }
                                } else {
                                    return redirect()->back()->withInput()->with(['error_message' => 'Please Upload art_video File !!!']);
                                }
                                if($postData['art_video_desc'] == ''){
                                 return redirect()->back()->withInput()->with(['error_message' => 'Please upload art video and with descriptive narrative !!!']);
                             }                            
                                /* art_video file */   
    
                                if ($this->validate($request, $rules)) {    
                                    // Helper::pr($postData);            
                                    $fields = [
                                        'sl_no'                     => $next_sl_no,
                                        'article_no'                => $article_no,
                                        'user_id'                   => $user_id,            
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
                                        'co_author_pronoun'         => json_encode($coauthorPronoun),     
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
                                        'community'                 => $postData['community'],
                                        'community_name'            => $postData['community_name'],
                                        'explanation'               => $postData['explanation'],  
                                        'explanation_submission'    => $postData['explanation_submission'],     
                                        'titleId'                   => $postData['title'],                        
                                        'creative_Work'             => $postData['creative_Work'],
                                        'creative_Work_fiction'     => $postData['creative_Work_fiction'],
                                        'subtitle'                  => $postData['subtitle'],
                                        'submission_types'          => $submission_typesInfo,
                                        'additional_information'    => $postData['additional_information'],
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
                                        'bio_short'                 => $postData['bio_short'],
                                        'bio_long'                  => $postData['bio_long'],
                                        'is_series'                 => $is_series,
                                        'series_article_no'         => $series_article_no,
                                        'current_article_no'        => $current_article_no,
                                        'other_article_part_doi_no' => $other_article_part_doi_no,
                                    ];
                                    //    Helper::pr($fields);

                                    /* submission email */
                                    $generalSetting             = GeneralSetting::find('1');                            
                                    $fullName                   = $postData['first_name'];
                                    $mailData                   = [
                                        'fullName'                  => $fullName,
                                        'email'                     => $postData['email'],
                                        'article_no'                => $article_no,
                                        'creative_Work'             => $postData['creative_Work'],
                                    ];
                                    $subject                    = $generalSetting->site_name.': Creative-Work submitted by ' . $fullName . ' (' . $postData['email'] . ') ' . '#' . $article_no;
                                    $message                    = view('email-templates.creative-work-submission',$mailData);
                                    // echo $message;die;
                                    $this->sendMail($postData['email'], $subject, $message);
                                    $this->sendMail($generalSetting->system_email, $subject, $message);
                                    /* submission email */
                                    /* email log save */
                                        $postData2 = [
                                            'name'                  => $fullName,
                                            'email'                 => $postData['email'],
                                            'subject'               => $subject,
                                            'message'               => $message
                                        ];
                                        EmailLog::insertGetId($postData2);
                                    /* email log save */

                                    Article::insert($fields);
                                    return redirect(url('user/my-articles'))->with('success_message', 'Creative-Work submitted successfully!');
                                } else {
                                    return redirect()->back()->withInput()->with('error_message', 'All fields required');
                                }                                    
                            }
                   }
                }
            }

            $title                          = 'Submit New Creative-Work';
            $page_name                      = 'submit-new-article';
            $data['section_ert']            = SectionErt::where('status', '=', 1)->orderBy('name', 'ASC')->get();
            $data['news_category']          = NewsCategory::where('status', '=', 1)->where('parent_category', '=', 0)->orderBy('sub_category', 'ASC')->get();
            $data['user_title']             = Title::where('status', '=', 1)->orderBy('name', 'ASC')->get();
            $data['submission_type']        = SubmissionType::where('status', '=', 1)->get(); 
            $data['country']                = Country::orderBy('name', 'ASC')->get();
            $data['pronoun']                = Pronoun::where('status', '=', 1)->orderBy('name', 'ASC')->get();
            $data['ecosystem_affiliation']  = EcosystemAffiliation::where('status', '=', 1)->orderBy('name', 'ASC')->get();
            $data['expertise_area']         = ExpertiseArea::where('status', '=', 1)->orderBy('name', 'ASC')->get();                               
            $data['row']                    = [];
            echo $this->front_after_login_layout($title, $page_name, $data);
        }
        public function AuthorClassification(Request $request)
        {
            $user_id                        = session('user_id');
            $data['user']                   = User::find($user_id);
            $data['classification']         = UserClassification::where('user_id', '=', $user_id)->where('status', '=', 1)->orderBy('id', 'DESC')->get();
            $data['search_keyword']         = '';
            $checkClassification            = UserClassification::where('user_id', '=', $user_id)->where('status', '!=', 3)->count();
            if($checkClassification == 0){
                return redirect(url('user/add-author-classification'))->with(['error_message' => 'Please Add Classification First !!!']);
            }
            
            $title                          = 'Classification';
            $page_name                      = 'author-classification';
            echo $this->front_after_login_layout($title, $page_name, $data);
        }
        public function addAuthorClassification(Request $request)
        {
            $user_id                        = session('user_id');
            $data['user']                   = User::find($user_id);
            $data['row']                    = [];
            $data['search_keyword']         = '';
            $authorclassification           = UserClassification::where('user_id', '=', $user_id)->where('status', '!=', 3)->count();
            if($authorclassification > 0){
                return redirect(url('user/author-classification'))->with(['error_message' => 'Classification Already Created !!!']);
            }

            if ($request->isMethod('post')) {
                $postData = $request->all();
                $rules = [                                 
                    'name'                => 'required'
                ];
                if ($this->validate($request, $rules)) {
                    $fields = [                        
                        'user_id'             => $user_id,
                        'name'                => $postData['name'],
                    ];
                    UserClassification::insert($fields);
                    return redirect(url('user/add-profile'))->with('success_message', 'Classification selected successfully');
                } else {
                    return redirect()->back()->with('error_message', 'All fields required');
                }
            }
            
            $title                          = 'Add Classification';
            $page_name                      = 'add-edit-classification';
            echo $this->front_after_login_layout($title, $page_name, $data);
        }

        public function updateAuthorClassification(Request $request, $id)
        {
            $id                             = Helper::decoded($id);
            $user_id                        = session('user_id');
            $data['user']                   = User::find($user_id);
            $data['row']                    = UserClassification::where('user_id', '=', $user_id)->where('id', '=', $id)->first();
            $data['search_keyword']         = '';
            
            if ($request->isMethod('post')) {
                $postData = $request->all();
                $rules = [                                 
                    'name'                => 'required'
                ];
                if ($this->validate($request, $rules)) {
                    $fields = [                        
                        'user_id'             => $user_id,
                        'name'                => $postData['name'],
                    ];
                    UserClassification::where('id', '=', $id)->update($fields);
                    return redirect(url('user/author-classification'))->with('success_message', 'Classification updated successfully');
                } else {
                    return redirect()->back()->with('error_message', 'All fields required');
                }
            }
            
            $title                          = 'Update Classification';
            $page_name                      = 'add-edit-classification';
            echo $this->front_after_login_layout($title, $page_name, $data);
        }
        public function profiles(Request $request)
        {
            // DB::enableQueryLog();
            $user_id                        = session('user_id');            
            $data['user']                   = User::find($user_id);            
            $data['profiles']                = UserProfile::where('user_id', '=', $user_id)->where('status', '=', 1)->orderBy('id', 'DESC')->get();
            // dd(DB::getQueryLog());   
            $checkClassification            = UserClassification::where('user_id', '=', $user_id)->where('status', '!=', 3)->count();
            if($checkClassification == 0){
                return redirect(url('user/add-author-classification'))->with(['error_message' => 'Please Add Classification First !!!']);
            }
            $checkProfile                   = UserProfile::where('user_id', '=', $user_id)->where('status', '!=', 3)->count();         
            if($checkProfile == 0){
                return redirect(url('user/add-profile'))->with(['error_message' => 'Please Add Profile First !!!']);
            }
            $data['search_keyword']         = '';
            
            $title                          = 'Profiles';
            $page_name                      = 'profiles';
            echo $this->front_after_login_layout($title, $page_name, $data);
        }

        public function addProfile(Request $request)
        {
            $user_id                        = session('user_id');
            $data['user']                   = User::find($user_id);            
            $data['classification']         = UserClassification::where('user_id', '=', $user_id)->first();
            $data['section_ert']            = SectionErt::where('status', '=', 1)->orderBy('name', 'ASC')->get();
            $data['news_category']          = NewsCategory::where('status', '=', 1)->where('parent_category', '=', 0)->orderBy('sub_category', 'ASC')->get();        
            $data['user_title']             = Title::where('status', '=', 1)->orderBy('name', 'ASC')->get();
            $data['submission_type']        = SubmissionType::where('status', '=', 1)->get(); 
            $data['country']                = Country::orderBy('name', 'ASC')->get();
            $data['pronoun']                = Pronoun::where('status', '=', 1)->orderBy('name', 'ASC')->get();
            $data['ecosystem_affiliation']  = EcosystemAffiliation::where('status', '=', 1)->orderBy('name', 'ASC')->get();
            $data['expertise_area']         = ExpertiseArea::where('status', '=', 1)->orderBy('name', 'ASC')->get();
            $data['row']                    = [];
            $data['communities']            = Community::where('status', '=', 1)->orderBy('name', 'ASC')->get();
            $data['search_keyword']         = '';
            $checkProfile                   = UserProfile::where('user_id', '=', $user_id)->where('status', '!=', 3)->count();
            if($checkProfile > 0){
                return redirect(url('user/profiles'))->with(['error_message' => 'Profile Already Created !!!']);
            }

            if ($request->isMethod('post')) {
                $postData = $request->all();
                $rules = [                                 
                    'author_classification'     => 'required',
                    'first_name'                => 'required',                                                               
                    'email'                     => 'required',                                      
                    'country'                   => 'required',                                                                                                                                            
                    'title'                     => 'required',
                    'pronoun'                   => 'required',   
                    'ecosystem_affiliation'     => 'required',               
                    'expertise_area'            => 'required',                
                    'explanation'               => ['required', 'string', new MaxWords(100)],
                    'explanation_submission'    => ['required', 'string', new MaxWords(150)],  
                    'community'                 => 'required',              
                    // 'creative_Work'             => ['required', 'string', new MaxWords(10)],                                  
                    'bio_short'                 => ['required', 'string', new MaxWords(40)],
                    'bio_long'                  => ['required', 'string', new MaxWords(250)],
                ];
                $participatedInfo = isset($postData['participated_info']) ? $postData['participated_info'] : '';
                $invited_byInfo = isset($postData['invited_by']) ? $postData['invited_by'] : '';
                $invited_emailInfo = isset($postData['invited_by_email']) ? $postData['invited_by_email'] : '';                
                $expertise_areaInfo = isset($postData['expertise_area']) ? json_encode($postData['expertise_area']) : '';
                $ecosystem_affiliationInfo = isset($postData['ecosystem_affiliation']) ? json_encode($postData['ecosystem_affiliation']) : '';
                
                if ($this->validate($request, $rules)) {
                    $fields = [                        
                        'user_id'                   => $user_id,          
                        'email'                     => $postData['email'],
                        'author_classification'     => $postData['author_classification'],
                        'first_name'                => $postData['first_name'],                                                                             
                        'for_publication_name'      => $postData['for_publication_name'],           
                        'pronounId'                 => $postData['pronoun'],                        
                        'invited'                   => $postData['invited'],
                        'invited_by'                => $invited_byInfo, 
                        'invited_by_email'          => $invited_emailInfo,
                        'participated'              => $postData['participated'],
                        'participated_info'         => $participatedInfo,
                        'community'                 => $postData['community'],
                        'community_name'            => $postData['community_name'],
                        'explanation'               => $postData['explanation'],  
                        'explanation_submission'    => $postData['explanation_submission'],     
                        'titleId'                   => $postData['title'],                              
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
                    $fields2 = [                                                          
                        'email'                     => $postData['email'],                        
                        'first_name'                => $postData['first_name'],                                                                                                          
                        'country'                   => $postData['country'],                       
                    ];
                    UserProfile::insert($fields);
                    if($data['user']->email != $postData['email']){                        
                        $generalSetting             = GeneralSetting::where('id', '=', 1)->first();
                        $subject                    = 'Subject: Your Update Login Credentials for Portal Access';
                        $message                    = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='padding: 10px; background: #fff; width: 500px;'>
                                                        <tr><td style='padding: 8px 15px'>Dear " . htmlspecialchars($postData['first_name']) . ",</td></tr>
                                                        <tr><td style='padding: 8px 15px'>You have changed the email address associated with your Contributor profile on EaRTh.</td></tr>                                                                    
                                                        <tr><td style='padding: 8px 15px'>Please note that you can no longer use your previous email address to log in. You must use your new email address, along with your old password.</td></tr>
                                                        <tr><td style='padding: 8px 15px'>If you have forgotten your password, please log in using your new email address, and click on 'Forgot Password'.</td></tr>                                                            
                                                        
                                                        
                                                        <tr><td style='padding: 8px 15px'>Sincerely,</td></tr>
                                                        <tr><td style='padding: 8px 15px'>EaRTh Team</td></tr>
                                                    </table>";
                        $this->sendMail($postData['email'], $subject, $message);                                                                    
                    } 
                    User::where('id', '=', $user_id)->update($fields2);                                       
                    return redirect(url('user/submit-new-article'))->with('success_message', 'Profile created successfully');
                } else {
                    return redirect()->back()->with('error_message', 'All fields required');
                }
            }
            
            $title                          = 'Add Profile';
            $page_name                      = 'add-edit-profile';
            echo $this->front_after_login_layout($title, $page_name, $data);
        }
        public function updateProfile(Request $request, $id)
        {
            $id                             = Helper::decoded($id);
            $user_id                        = session('user_id');
            $data['user']                   = User::find($user_id);
            $data['classification']         = UserClassification::where('user_id', '=', $user_id)->first();
            $data['section_ert']            = SectionErt::where('status', '=', 1)->orderBy('name', 'ASC')->get();
            $data['news_category']          = NewsCategory::where('status', '=', 1)->where('parent_category', '=', 0)->orderBy('sub_category', 'ASC')->get();        
            $data['user_title']             = Title::where('status', '=', 1)->orderBy('name', 'ASC')->get();
            $data['submission_type']        = SubmissionType::where('status', '=', 1)->get(); 
            $data['country']                = Country::orderBy('name', 'ASC')->get();
            $data['pronoun']                = Pronoun::where('status', '=', 1)->orderBy('name', 'ASC')->get();
            $data['ecosystem_affiliation']  = EcosystemAffiliation::where('status', '=', 1)->orderBy('name', 'ASC')->get();
            $data['expertise_area']         = ExpertiseArea::where('status', '=', 1)->orderBy('name', 'ASC')->get();
            $data['row']                    = UserProfile::where('user_id', '=', $user_id)->where('id', '=', $id)->first();
            $data['communities']            = Community::where('status', '=', 1)->orderBy('name', 'ASC')->get();
            $data['search_keyword']         = '';
            
            if ($request->isMethod('post')) {
                $postData = $request->all();
                $rules = [                                 
                    'author_classification'     => 'required',
                    'first_name'                => 'required',                                                               
                    'email'                     => 'required',                                      
                    'country'                   => 'required',                                                                                                                                            
                    'title'                     => 'required',
                    'pronoun'                   => 'required',   
                    'ecosystem_affiliation'     => 'required',               
                    'expertise_area'            => 'required',          
                    'community'                 => 'required',      
                    'explanation'               => ['required', 'string', new MaxWords(100)],
                    'explanation_submission'    => ['required', 'string', new MaxWords(150)],                
                    // 'creative_Work'             => ['required', 'string', new MaxWords(10)],                                  
                    'bio_short'                 => ['required', 'string', new MaxWords(40)],
                    'bio_long'                  => ['required', 'string', new MaxWords(250)],
                ];
                $participatedInfo = isset($postData['participated_info']) ? $postData['participated_info'] : '';
                $invited_byInfo = isset($postData['invited_by']) ? $postData['invited_by'] : '';
                $invited_emailInfo = isset($postData['invited_by_email']) ? $postData['invited_by_email'] : '';                
                $expertise_areaInfo = isset($postData['expertise_area']) ? json_encode($postData['expertise_area']) : '';
                $ecosystem_affiliationInfo = isset($postData['ecosystem_affiliation']) ? json_encode($postData['ecosystem_affiliation']) : '';
                if ($this->validate($request, $rules)) {
                    $fields = [                        
                        'user_id'                   => $user_id,          
                        'email'                     => $postData['email'],
                        'author_classification'     => $postData['author_classification'],
                        'first_name'                => $postData['first_name'],                                                                             
                        'for_publication_name'      => $postData['for_publication_name'],           
                        'pronounId'                 => $postData['pronoun'],                        
                        'invited'                   => $postData['invited'],
                        'invited_by'                => $invited_byInfo, 
                        'invited_by_email'          => $invited_emailInfo,
                        'participated'              => $postData['participated'],
                        'participated_info'         => $participatedInfo,
                        'community'                 => $postData['community'],
                        'community_name'            => $postData['community_name'],
                        'explanation'               => $postData['explanation'],  
                        'explanation_submission'    => $postData['explanation_submission'],     
                        'titleId'                   => $postData['title'],                              
                        'country'                   => $postData['country'],
                        'state'                     => $postData['state'],
                        'city'                      => $postData['city'],
                        'organization_name'         => $postData['organization_name'],
                        'organization_website'      => $postData['organization_website'],
                        'ecosystem_affiliationId'   => $ecosystem_affiliationInfo,
                        'indigenous_affiliation'    => $postData['indigenous_affiliation'],
                        'expertise_areaId'          => $expertise_areaInfo,
                        'bio_short'                 => $postData['bio_short'],
                        'bio_long'                  => $postData['bio_long'],    
                    ];
                    $fields2 = [                                                          
                        'email'                     => $postData['email'],                        
                        'first_name'                => $postData['first_name'],                                                                                                          
                        'country'                   => $postData['country'],                       
                    ];
                    // Helper::pr($fields);
                    UserProfile::where('id', '=', $id)->update($fields);
                    if($data['user']->email != $postData['email']){                        
                        $generalSetting             = GeneralSetting::where('id', '=', 1)->first();
                        $subject                    = 'Subject: Your Update Login Credentials for Portal Access';
                        $message                    = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='padding: 10px; background: #fff; width: 500px;'>
                                                        <tr><td style='padding: 8px 15px'>Dear " . htmlspecialchars($postData['first_name']) . ",</td></tr>
                                                        <tr><td style='padding: 8px 15px'>You have changed the email address associated with your Contributor profile on EaRTh.</td></tr>                                                                    
                                                        <tr><td style='padding: 8px 15px'>Please note that you can no longer use your previous email address to log in. You must use your new email address, along with your old password.</td></tr>
                                                        <tr><td style='padding: 8px 15px'>If you have forgotten your password, please log in using your new email address, and click on 'Forgot Password'.</td></tr>                                                            
                                                        
                                                        
                                                        <tr><td style='padding: 8px 15px'>Sincerely,</td></tr>
                                                        <tr><td style='padding: 8px 15px'>EaRTh Team</td></tr>
                                                    </table>";
                        $this->sendMail($postData['email'], $subject, $message);                                                                    
                    } 
                    User::where('id', '=', $user_id)->update($fields2);
                    return redirect(url('user/profiles'))->with('success_message', 'Profile updated successfully');
                } else {
                    return redirect()->back()->with('error_message', 'All fields required');
                }
            }
            
            $title                          = 'Update Profile';
            $page_name                      = 'add-edit-profile';
            echo $this->front_after_login_layout($title, $page_name, $data);
        }        
        public function articleList(Request $request, $id)
        {
            $id                             = Helper::decoded($id);
            $user_id                        = session('user_id');
            $data['profile']                = UserClassification::find($id);
            $data['articles']               = Article::where('user_id', '=', $user_id)->where('author_classification', '=', $data['profile']->name)->get();            
            // Helper::pr($data['row']); 
            $data['search_keyword']         = '';                                   
            
            $title                          = 'Article List';
            $page_name                      = 'profile-articles';
            echo $this->front_after_login_layout($title, $page_name, $data);
        }
        public function viewarticle(Request $request, $id)
        {
            $id                                         = Helper::decoded($id);                              
            $page_name                                  = 'article.view_details';
            $data['row']                                = Article::where('status', '!=', 3)->where('id', '=', $id)->orderBy('id', 'DESC')->first();
            //  dd($data['row']);
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
            $data['search_keyword']         = '';                        
            
            $title                          = ' View Details : ' . (($data['row'])?$data['row']->creative_Work. ' (' . $data['row']->article_no . ')':'');
            $page_name                      = 'view_details';
            echo $this->front_after_login_layout($title, $page_name, $data);
        }
    /* after login */
}
