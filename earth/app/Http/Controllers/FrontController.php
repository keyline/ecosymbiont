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
                    return redirect()->back()->with('success_message', 'Email Subscribed Successfully !!!');
                } else {
                    return redirect()->back()->with('error_message', 'Email Already Subscribed !!!');
                }
            } else {
                return redirect()->back()->with('error_message', 'All Fields Required !!!');
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
                            
                            return redirect(url('contacts'))->with('success_message', 'Enquiry submitted Successfully !!!');
                        } else {
                            return redirect()->back()->with('error_message', 'Enquiry Already Inserted !!!');
                        }
                    } else {
                        return redirect()->back()->with('error_message', 'All Fields Required !!!');
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
        $title                          = 'About Us';
        $page_name                      = 'aboutus';
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
                                                        'news_contents.cover_image', 
                                                        'news_contents.created_at',
                                                        'news_contents.media',
                                                        'news_contents.videoId',
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
                                                    'news_contents.cover_image', 
                                                    'news_contents.created_at',
                                                    'news_contents.media',
                                                    'news_contents.videoId',
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
        $title                          = $categoryname .' | '. $data['row']->sub_category;
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
                                                      ->orWhere('news_contents.keywords', 'LIKE', '%'.$search_keyword.'%');
                                             })
                                             ->get();
            // Helper::pr($searchResults);
            
            $data['search_keyword']         = $search_keyword;
            $title                          = 'Search Result For : "' . $search_keyword . '"';
            $page_name                      = 'search-result';
            echo $this->front_before_login_layout($title, $page_name, $data);
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
        $searchResults      = NewsContent::select('id', 'new_title', 'slug', 'parent_category', 'sub_category')->where(function($query) {
                                                $query->where('status', 1);
                                             })
                                             ->where(function($query) use ($search_keyword) {
                                                $query->where('new_title', 'LIKE', '%'.$search_keyword.'%')
                                                      ->orWhere('sub_title', 'LIKE', '%'.$search_keyword.'%')
                                                      ->orWhere('long_desc', 'LIKE', '%'.$search_keyword.'%')
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
                        if($sessionData->role == 1){
                            if($page_link == ''){
                                return redirect('user/my-profile');
                            } else {
                                return redirect($page_link);
                            }
                        } else {
                            if($page_link == ''){
                                return redirect('user/dashboard');
                            } else {
                                return redirect($page_link);
                            }
                        }
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
                        return redirect()->back()->with('error_message', 'Invalid Email Or Password !!!');
                    }
                } else {
                    return redirect()->back()->with('error_message', 'All Fields Required !!!');
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
                // Helper::pr($postData);
                 // Get reCAPTCHA token from form POST data
                    $recaptchaResponse = $postData['g-recaptcha-response'];

                    // Your Google reCAPTCHA secret key
                    $secretKey = '6LcIw04qAAAAAJCWh02op84FgNvxexQsh9LLCuqW';

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
                            'last_name'                 => 'required',                                    
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
                                    'last_name'                 => $postData['last_name'],        
                                    'middle_name'               => $postData['middle_name'],            
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
                                                                    
                                                                    
                                                                    <tr><td style='padding: 8px 15px'>Thank You,</td></tr>
                                                                    <tr><td style='padding: 8px 15px'>Auto-generated from the Ecosymbiont Website.</td></tr>
                                                                </table>";
                                $this->sendMail($postData['email'], $subject, $message);
                                return redirect(url('signin'))->with('success_message', 'Your sign-up was successful! Please check your email for your login credentials.');
                            } else {
                                return redirect()->back()->with('error_message', 'User Already Registered !!!');
                            }
                        } else {
                            return redirect()->back()->with('error_message', 'All Fields Required !!!');
                        }

                    } else {
                        // reCAPTCHA validation failed
                        return redirect()->back()->with('error_message', 'reCAPTCHA v3 validation failed. Please try again.');                        
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
                    'activity_details'  => 'You Are Successfully Sign Out !!!',
                    'platform_type'     => 'WEB',
                ];
                UserActivity::insert($activityData);
            /* user activity */
            $request->session()->forget(['user_id', 'name', 'email', 'first_name', 'middle_name', 'last_name', 'role', 'is_user_login']);
            // Helper::pr(session()->all());die;
            Auth::guard('web')->logout();
            return redirect(url('signin'))->with('success_message', 'You Are Successfully Sign Out !!!');
        }
        public function dashboard()
        {
            $user_id                        = session('user_id');
            $data['user']                   = User::find($user_id);
            $data['approved_articles']      = Article::where('is_published', '=', 1)->where('user_id', '=', $user_id)->count();
            $data['pending_articles']       = Article::where('is_published', '=', 0)->where('user_id', '=', $user_id)->count();

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
                $rules = [                                 
                    'first_name'                => 'required',            
                    'last_name'                 => 'required',                                    
                    'email'                     => 'required',           
                    'phone'                     => 'required',           
                    'country'                   => 'required',                        
                ];
                if ($this->validate($request, $rules)) {
                    /* profile image */
                        $imageFile      = $request->file('profile_image');
                        if($imageFile != ''){
                            $imageName      = $imageFile->getClientOriginalName();
                            $uploadedFile   = $this->upload_single_file('profile_image', $imageName, 'user', 'image');
                            if($uploadedFile['status']){
                                $profile_image = $uploadedFile['newFilename'];
                            } else {
                                return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                            }
                        } else {
                            $profile_image = $data['user']->profile_image;
                        }
                    /* profile image */
                    $fields = [                        
                        'first_name'                => $postData['first_name'],
                        'last_name'                 => $postData['last_name'],
                        'middle_name'               => $postData['middle_name'],
                        'phone'                     => $postData['phone'],           
                        'country'                   => $postData['country'],
                        'profile_image'             => $profile_image,
                    ];
                    // Helper::pr($fields);
                    User::where('id', '=', $user_id)->update($fields);
                    return redirect()->back()->with('success_message', 'Profile Updated Successfully !!!');
                } else {
                    return redirect()->back()->with('error_message', 'All Fields Required !!!');
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
                                return redirect()->back()->with('success_message', 'Password Changed Successfully !!!');
                            } else {
                                return redirect()->back()->with('error_message', 'New & Old Password Can\'t Be Same !!!');
                            }
                        } else {
                            return redirect()->back()->with('error_message', 'New & Confirm Password Does Not Matched !!!');
                        }
                    } else {
                        return redirect()->back()->with('error_message', 'Current Password Is Incorrect !!!');
                    }
                } else {
                    return redirect()->back()->with('error_message', 'All Fields Required !!!');
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
            $checkProfile                   = UserProfile::where('user_id', '=', $user_id)->where('status', '!=', 3)->count();
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
            $data['profile']                = UserProfile::where('user_id', '=', $user_id)->first();
            $data['search_keyword']         = '';

            if ($request->isMethod('post')) {
                $postData = $request->all();
                //  dd($postData);
                /* article no generate */
                    $currentMonth   = date('m');
                    $currentYear    = date('Y');
                    $currentMonthYear = $currentYear.'-'.$currentMonth;
                    $getLastArticle = Article::where('created_at', 'LIKE', '%'.$currentMonthYear.'%')->orderBy('id', 'DESC')->first();
                    if($getLastArticle){
                        $sl_no              = $getLastArticle->sl_no;
                        $next_sl_no         = $sl_no + 1;
                        $next_sl_no_string  = str_pad($next_sl_no, 3, 0, STR_PAD_LEFT);
                        $article_no         = 'SRN-'.$currentMonth.$currentYear.'-'.$next_sl_no_string;
                    } else {
                        $next_sl_no         = 1;
                        $next_sl_no_string  = str_pad($next_sl_no, 3, 0, STR_PAD_LEFT);
                        $article_no         = 'SRN-'.$currentMonth.$currentYear.'-'.$next_sl_no_string;
                    }
                /* article no generate */

                if ($postData['invited'] == 'No' && $postData['participated'] == 'No') {                    
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
                                'participated_info'         => $participatedInfo                       
                            ];
                            //  Helper::pr($fields);

                            /* submission email */
                            $generalSetting             = GeneralSetting::find('1');                            
                            $fullName                   = $postData['first_name'];
                            $mailData                   = [
                                'fullName'                  => $fullName,
                                'email'                     => $postData['email'],
                                'article_no'                => $article_no,
                                'for_publication_name'      => $postData['for_publication_name'],
                            ];
                            $subject                    = $generalSetting->site_name.' :: Creative-Work Submitted From ' . $fullName . ' (' . $postData['email'] . ') ' . '#' . $article_no;
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
                            return redirect(url('user/my-articles'))->with('success_message', 'Creative-Work Submitted Successfully !!!');
                            } else {
                                return redirect()->back()->with('error_message', 'All Fields Required !!!');
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
                            //  Helper::pr($fields);
                            /* submission email */
                            $generalSetting             = GeneralSetting::find('1');                            
                            $fullName                   = $postData['first_name'];
                            $mailData                   = [
                                'fullName'                  => $fullName,
                                'email'                     => $postData['email'],
                                'article_no'                => $article_no,
                                'for_publication_name'      => $postData['for_publication_name'],
                            ];
                            $subject                    = $generalSetting->site_name.' :: Creative-Work Submitted From ' . $fullName . ' (' . $postData['email'] . ') ' . '#' . $article_no;
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
                            return redirect(url('user/my-articles'))->with('success_message', 'Creative-Work Submitted Successfully !!!');
                        } else {
                                return redirect()->back()->with('error_message', 'All Fields Required !!!');
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
                    'acknowledge'               => 'required',                                                      
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
                                   return redirect()->back()->with(['error_message' => 'Please Upload narrative File !!!']);
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

                               /* submission email */
                                $generalSetting             = GeneralSetting::find('1');                            
                                $fullName                   = $postData['first_name'];
                                $mailData                   = [
                                    'fullName'                  => $fullName,
                                    'email'                     => $postData['email'],
                                    'article_no'                => $article_no,
                                    'for_publication_name'      => $postData['for_publication_name'],
                                ];
                                $subject                    = $generalSetting->site_name.' :: Creative-Work Submitted From ' . $fullName . ' (' . $postData['email'] . ') ' . '#' . $article_no;
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
                                return redirect(url('user/my-articles'))->with('success_message', 'Creative-Work Submitted Successfully !!!');
                                } else {
                                    return redirect()->back()->with('error_message', 'All Fields Required !!!');
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
                           /* art images details */
   
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
                                   'explanation'               => $postData['explanation'],  
                                   'explanation_submission'    => $postData['explanation_submission'],     
                                   'titleId'                   => $postData['title'],                        
                                   'creative_Work'             => $postData['creative_Work'],
                                   'subtitle'                  => $postData['subtitle'],
                                   'submission_types'          => $submission_typesInfo,
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
                                   'bio_short'               => $postData['bio_short'],
                                   'bio_long'               => $postData['bio_long'],  
                               ];
                                // Helper::pr($fields);

                                /* submission email */
                                $generalSetting             = GeneralSetting::find('1');                            
                                $fullName                   = $postData['first_name'];
                                $mailData                   = [
                                    'fullName'                  => $fullName,
                                    'email'                     => $postData['email'],
                                    'article_no'                => $article_no,
                                    'for_publication_name'      => $postData['for_publication_name'],
                                ];
                                $subject                    = $generalSetting->site_name.' :: Creative-Work Submitted From ' . $fullName . ' (' . $postData['email'] . ') ' . '#' . $article_no;
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
                                return redirect(url('user/my-articles'))->with('success_message', 'Creative-Work Submitted Successfully !!!');
                                } else {
                                    return redirect()->back()->with('error_message', 'All Fields Required !!!');
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
                           else {
                               return redirect()->back()->with(['error_message' => 'Please Upload art_video File !!!']);
                           }
                           /* art_video file */   
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

                               /* submission email */
                                $generalSetting             = GeneralSetting::find('1');                            
                                $fullName                   = $postData['first_name'];
                                $mailData                   = [
                                    'fullName'                  => $fullName,
                                    'email'                     => $postData['email'],
                                    'article_no'                => $article_no,
                                    'for_publication_name'      => $postData['for_publication_name'],
                                ];
                                $subject                    = $generalSetting->site_name.' :: Creative-Work Submitted From ' . $fullName . ' (' . $postData['email'] . ') ' . '#' . $article_no;
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
                                return redirect(url('user/my-articles'))->with('success_message', 'Creative-Work Submitted Successfully !!!');
                            } else {
                                return redirect()->back()->with('error_message', 'All Fields Required !!!');
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
                                        return redirect()->back()->with(['error_message' => 'Please Upload narrative File !!!']);
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

                                    /* submission email */
                                    $generalSetting             = GeneralSetting::find('1');                            
                                    $fullName                   = $postData['first_name'];
                                    $mailData                   = [
                                        'fullName'                  => $fullName,
                                        'email'                     => $postData['email'],
                                        'article_no'                => $article_no,
                                        'for_publication_name'      => $postData['for_publication_name'],
                                    ];
                                    $subject                    = $generalSetting->site_name.' :: Creative-Work Submitted From ' . $fullName . ' (' . $postData['email'] . ') ' . '#' . $article_no;
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
                                    return redirect(url('user/my-articles'))->with('success_message', 'Creative-Work Submitted Successfully !!!');
                                    } else {
                                        return redirect()->back()->with('error_message', 'All Fields Required !!!');
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
                                        'bio_short'               => $postData['bio_short'],
                                        'bio_long'               => $postData['bio_long'],  
                                    ];
                                    //  Helper::pr($fields);
                                    /* submission email */
                                    $generalSetting             = GeneralSetting::find('1');                            
                                    $fullName                   = $postData['first_name'];
                                    $mailData                   = [
                                        'fullName'                  => $fullName,
                                        'email'                     => $postData['email'],
                                        'article_no'                => $article_no,
                                        'for_publication_name'      => $postData['for_publication_name'],
                                    ];
                                    $subject                    = $generalSetting->site_name.' :: Creative-Work Submitted From ' . $fullName . ' (' . $postData['email'] . ') ' . '#' . $article_no;
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
                                    return redirect(url('user/my-articles'))->with('success_message', 'Creative-Work Submitted Successfully !!!');
                                    } else {
                                        return redirect()->back()->with('error_message', 'All Fields Required !!!');
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

                                    /* submission email */
                                    $generalSetting             = GeneralSetting::find('1');                            
                                    $fullName                   = $postData['first_name'];
                                    $mailData                   = [
                                        'fullName'                  => $fullName,
                                        'email'                     => $postData['email'],
                                        'article_no'                => $article_no,
                                        'for_publication_name'      => $postData['for_publication_name'],
                                    ];
                                    $subject                    = $generalSetting->site_name.' :: Creative-Work Submitted From ' . $fullName . ' (' . $postData['email'] . ') ' . '#' . $article_no;
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
                                    return redirect(url('user/my-articles'))->with('success_message', 'Creative-Work Submitted Successfully !!!');
                                } else {
                                    return redirect()->back()->with('error_message', 'All Fields Required !!!');
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
            $data['submission_type']       = SubmissionType::where('status', '=', 1)->get(); 
            $data['country']                = Country::orderBy('name', 'ASC')->get();
            $data['pronoun']                = Pronoun::where('status', '=', 1)->orderBy('name', 'ASC')->get();
            $data['ecosystem_affiliation']  = EcosystemAffiliation::where('status', '=', 1)->orderBy('name', 'ASC')->get();
            $data['expertise_area']         = ExpertiseArea::where('status', '=', 1)->orderBy('name', 'ASC')->get();                               
            $data['row']                    = [];
            echo $this->front_after_login_layout($title, $page_name, $data);
        }
        public function profiles(Request $request)
        {
            $user_id                        = session('user_id');
            $data['user']                   = User::find($user_id);
            $data['profiles']               = UserProfile::where('user_id', '=', $user_id)->where('status', '=', 1)->orderBy('id', 'DESC')->get();
            $data['search_keyword']         = '';
            
            $title                          = 'Profiles';
            $page_name                      = 'profiles';
            echo $this->front_after_login_layout($title, $page_name, $data);
        }
        public function addProfile(Request $request)
        {
            $user_id                        = session('user_id');
            $data['user']                   = User::find($user_id);
            $data['row']                    = [];
            $data['search_keyword']         = '';
            $checkProfile                   = UserProfile::where('user_id', '=', $user_id)->where('status', '!=', 3)->count();
            if($checkProfile > 0){
                return redirect(url('user/profiles'))->with(['error_message' => 'Profile Already Created !!!']);
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
                    UserProfile::insert($fields);
                    return redirect(url('user/profiles'))->with('success_message', 'Profile Created Successfully !!!');
                } else {
                    return redirect()->back()->with('error_message', 'All Fields Required !!!');
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
            $data['row']                    = UserProfile::where('user_id', '=', $user_id)->where('id', '=', $id)->first();
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
                    UserProfile::where('id', '=', $id)->update($fields);
                    return redirect(url('user/profiles'))->with('success_message', 'Profile Updated Successfully !!!');
                } else {
                    return redirect()->back()->with('error_message', 'All Fields Required !!!');
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
            $data['profile']                = UserProfile::find($id);
            $data['articles']               = Article::where('user_id', '=', $user_id)->where('author_classification', '=', $data['profile']->name)->get();            
            // Helper::pr($data['row']); 
            $data['search_keyword']         = '';                                   
            
            $title                          = 'Article List';
            $page_name                      = 'profile-articles';
            echo $this->front_after_login_layout($title, $page_name, $data);
        }
    /* after login */
}
