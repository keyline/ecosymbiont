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
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
    public function pageContent($slug)
    {
        $data['row']                    = Page::select('page_name', 'page_content')->where('status', '=', 1)->where('page_slug', '=', $slug)->first();
        $title                          = (($data['row'])?$data['row']->page_name:'');
        $data['button_show']            = (($slug == 'submissions')?1:0);
        $page_name                      = 'page-content';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
    public function category($slug)
    {
        $data['row']                    = NewsCategory::select('id', 'sub_category')->where('status', '=', 1)->where('slug', '=', $slug)->first();
        $parent_category_id                = (($data['row'])?$data['row']->id:'');

        $data['contents']               = NewsContent::join('news_category', 'news_contents.sub_category', '=', 'news_category.id')
                                           ->select('news_contents.id', 'news_contents.new_title', 'news_contents.sub_title', 'news_contents.slug', 'news_contents.author_name', 'news_contents.cover_image', 'news_contents.created_at', 'news_category.sub_category as sub_category_name', 'news_category.slug as sub_category_slug')
                                           ->where('news_contents.status', '=', 1)
                                           ->where('news_contents.parent_category', '=', $parent_category_id)
                                           ->orderBy('news_contents.id', 'DESC')
                                           ->get();

        $title                          = (($data['row'])?$data['row']->sub_category:'');
        $page_name                      = 'category';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
    public function subcategory($slug)
    {
        $data['row']                    = NewsCategory::select('id', 'sub_category')->where('status', '=', 1)->where('slug', '=', $slug)->first();
        $sub_category_id                = (($data['row'])?$data['row']->id:'');

        $data['contents']               = NewsContent::join('news_category', 'news_contents.sub_category', '=', 'news_category.id')
                                           ->select('news_contents.id', 'news_contents.new_title', 'news_contents.sub_title', 'news_contents.slug', 'news_contents.author_name', 'news_contents.cover_image', 'news_contents.created_at', 'news_category.sub_category as sub_category_name', 'news_category.slug as sub_category_slug')
                                           ->where('news_contents.status', '=', 1)
                                           ->where('news_contents.sub_category', '=', $sub_category_id)
                                           ->orderBy('news_contents.id', 'DESC')
                                           ->get();

        $title                          = (($data['row'])?$data['row']->sub_category:'');
        $page_name                      = 'subcategory';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
    public function newsContent($slug)
    {
        $data['rowContent']         = NewsContent::join('news_category', 'news_contents.sub_category', '=', 'news_category.id')
                                           ->select('news_contents.id as news_id', 'news_contents.*', 'news_category.sub_category as sub_category_name', 'news_category.slug as sub_category_slug')
                                           ->where('news_contents.status', '=', 1)
                                           ->where('news_contents.slug', '=', $slug)
                                           ->first();
        $postUrl = env('APP_URL') . '/content/' . $slug;
        // echo $postUrl; die;
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
        $data['alsoLikeContents']   = NewsContent::join('news_category', 'news_contents.sub_category', '=', 'news_category.id')
                                           ->select('news_contents.id as news_id', 'news_contents.*', 'news_category.sub_category as sub_category_name', 'news_category.slug as sub_category_slug')
                                           ->where('news_contents.status', '=', 1)
                                           ->where('news_contents.parent_category', '=', $parent_category_id)
                                           ->where('news_contents.id', '!=', (($data['rowContent'])?$data['rowContent']->news_id:''))
                                           ->get();

        $title                      = (($data['rowContent'])?$data['rowContent']->new_title:'');
        $page_name                  = 'news-content';
        echo $this->front_before_login_layout($title, $page_name, $data);
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
            $title                          = 'Sign In';
            $page_name                      = 'signin';
            echo $this->front_before_login_layout($title, $page_name, $data);
        }
        public function signUp(Request $request)
        {
            $data['countries']              = Country::select('id', 'name')->where('status', '=', 1)->get();
            $title                          = 'Sign Up';
            $page_name                      = 'signup';
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
                            'last_name'                 => 'required',                                    
                            'email'                     => 'required',           
                            'phone'                     => 'required',           
                            'country'                   => 'required',                                     
                            'password'                  => 'required',                         
                        ];
                        if ($this->validate($request, $rules)) {
                            $checkValue = User::where('email', '=', $postData['email'])->count();
                            if ($checkValue <= 0) {                    
                                $fields = [                        
                                    'first_name'                => $postData['first_name'],            
                                    'last_name'                 => $postData['last_name'],        
                                    'middle_name'               => $postData['middle_name'],            
                                    'email'                     => $postData['email'],           
                                    'phone'                     => $postData['phone'],           
                                    'country'                   => $postData['country'],
                                    'role'                      => $postData['role'],
                                    'password'                  => Hash::make($postData['password']),                         
                                ];
                                Helper::pr($fields);
                                User::insert($fields);
                                return redirect(url('signin'))->with('success_message', 'Sign Up Successfully !!!');
                            } else {
                                return redirect()->back()->with('error_message', 'User Already Registered !!!');
                            }
                        } else {
                            return redirect()->back()->with('error_message', 'All Fields Required !!!');
                        }

                    } else {
                        // reCAPTCHA validation failed
                        echo "reCAPTCHA v3 validation failed. Please try again."; die;
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

            $title                          = 'Dashboard';
            $page_name                      = 'dashboard';
            echo $this->front_after_login_layout($title, $page_name, $data);
        }
        public function myProfile(Request $request)
        {
            $user_id                        = session('user_id');
            $data['user']                   = User::find($user_id);
            $data['countries']              = Country::select('id', 'name')->where('status', '=', 1)->get();

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

            if ($request->isMethod('post')) {
                $postData = $request->all();
                if ($postData['invited'] == 'No' && $postData['participated'] == 'No') {
                    $rules = [
                        'first_name'                => 'required',            
                        'last_name'                 => 'required',                                    
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
                    $section_ertInfo = isset($postData['section_ert']) ? json_encode($postData['section_ert']) : '';
                    $expertise_areaInfo = isset($postData['expertise_area']) ? json_encode($postData['expertise_area']) : '';
                    $ecosystem_affiliationInfo = isset($postData['ecosystem_affiliation']) ? json_encode($postData['ecosystem_affiliation']) : '';
                    $submission_typesInfo = isset($postData['submission_types']) ? $postData['submission_types'] : '';
                    $narrative_fileInfo = isset($narrative_file) ? $narrative_file : '';    
                    $first_image_fileInfo = isset($first_image_file) ? $first_image_file : '';    
                    $second_image_fileInfo = isset($second_image_file) ? $second_image_file : '';    
                    $art_image_fileInfo = isset($art_image_file) ? $art_image_file : '';    
                    $art_video_fileInfo = isset($art_video_file) ? $art_video_file : ''; 
                } else{
                    $rules = [
                        'first_name'                => 'required',            
                        'last_name'                 => 'required',                                    
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
                        'art_video_desc'            => ['required', 'string', new MaxWords(250)],
                        'creative_Work'             => ['required', 'string', new MaxWords(10)],
                        'subtitle'                  => ['required', 'string', new MaxWords(40)],
                        'art_image_desc'            => ['required', 'string', new MaxWords(250)],
                        'bio_short'                 => ['required', 'string', new MaxWords(40)],
                        'bio_long'                  => ['required', 'string', new MaxWords(250)],
                    ];                                    
                    /* narrative file */
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
                            return redirect()->back()->with(['error_message' => 'Please Upload narrative File !!!']);
                        }
                    /* narrative file */
                    /* first_image file */
                        $imageFile      = $request->file('first_image_file');
                        if ($imageFile != '') {
                            $imageName      = $imageFile->getClientOriginalName();
                            $uploadedFile   = $this->upload_single_file('first_image_file', $imageName, 'narrative', 'image');
                            if ($uploadedFile['status']) {
                                $first_image_file = $uploadedFile['newFilename'];
                            } else {
                                return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                            }
                        } else {
                            return redirect()->back()->with(['error_message' => 'Please Upload first_image File !!!']);
                        }
                    /* first_image file */
                    /* second_image file */
                        $imageFile      = $request->file('second_image_file');
                        if ($imageFile != '') {
                            $imageName      = $imageFile->getClientOriginalName();
                            $uploadedFile   = $this->upload_single_file('second_image_file', $imageName, 'narrative', 'image');
                            if ($uploadedFile['status']) {
                                $second_image_file = $uploadedFile['newFilename'];
                            } else {
                                return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                            }
                        } else {
                            return redirect()->back()->with(['error_message' => 'Please Upload second_image File !!!']);
                        }
                    /* second_image file */
                    /* art_image file */
                        $imageFile      = $request->file('art_image_file');
                        if ($imageFile != '') {
                            $imageName      = $imageFile->getClientOriginalName();
                            $uploadedFile   = $this->upload_single_file('art_image_file', $imageName, 'art_image', 'image');
                            if ($uploadedFile['status']) {
                                $art_image_file = $uploadedFile['newFilename'];
                            } else {
                                return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                            }
                        } else {
                            return redirect()->back()->with(['error_message' => 'Please Upload art_image File !!!']);
                        }
                    /* art_image file */
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
                        } else {
                            return redirect()->back()->with(['error_message' => 'Please Upload art_video File !!!']);
                        }
                    /* art_video file */        
                    $participatedInfo = isset($postData['participated_info']) ? $postData['participated_info'] : '';
                    $invited_byInfo = isset($postData['invited_by']) ? $postData['invited_by'] : '';
                    $invited_emailInfo = isset($postData['invited_by_email']) ? $postData['invited_by_email'] : '';
                    $section_ertInfo = isset($postData['section_ert']) ? json_encode($postData['section_ert']) : '';
                    $expertise_areaInfo = isset($postData['expertise_area']) ? json_encode($postData['expertise_area']) : '';
                    $ecosystem_affiliationInfo = isset($postData['ecosystem_affiliation']) ? json_encode($postData['ecosystem_affiliation']) : '';
                    $submission_typesInfo = isset($postData['submission_types']) ? $postData['submission_types'] : '';
                    $narrative_fileInfo = isset($narrative_file) ? $narrative_file : '';    
                    $first_image_fileInfo = isset($first_image_file) ? $first_image_file : '';    
                    $second_image_fileInfo = isset($second_image_file) ? $second_image_file : '';    
                    $art_image_fileInfo = isset($art_image_file) ? $art_image_file : '';    
                    $art_video_fileInfo = isset($art_video_file) ? $art_video_file : '';    
                }            
                if ($this->validate($request, $rules)) {
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
                    $fields = [
                        'sl_no'                     => $next_sl_no,
                        'article_no'                => $article_no,
                        'email'                     => $postData['email'],   
                        'first_name'                => $postData['first_name'],            
                        'last_name'                 => $postData['last_name'],        
                        'middle_name'               => $postData['middle_name'],                                            
                        'for_publication_name'      => $postData['for_publication_name'],           
                        'orginal_work'              => $postData['orginal_work'],           
                        'user_id'                   => $user_id,           
                        'copyright'                 => $postData['copyright'],
                        'titleId'                   => $postData['title'],
                        'pronounId'                 => $postData['pronoun'], 
                        'invited'                   => $postData['invited'],
                        'invited_by'                => $invited_byInfo, 
                        'invited_by_email'          => $invited_emailInfo,
                        'explanation'               => $postData['explanation'],  
                        'explanation_submission'    => $postData['explanation_submission'],     
                        'section_ertId'             => $section_ertInfo,
                        'creative_Work'             => $postData['creative_Work'],
                        'subtitle'                  => $postData['subtitle'],
                        'submission_types'          => $submission_typesInfo,
                        'titleId'                   => $postData['title'],
                        'pronounId'                 => $postData['pronoun'],
                        'participated'              => $postData['participated'],
                        'participated_info'         => $participatedInfo,
                        'narrative_file'            => $narrative_fileInfo,
                        'first_image_file'          => $first_image_fileInfo,
                        'second_image_file'         => $second_image_fileInfo,
                        'art_image_file'            => $art_image_fileInfo,
                        'art_image_desc'            => $postData['art_image_desc'],
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
                        'bio_short'                 => $postData['bio_short'],
                        'bio_long'                  => $postData['bio_long'],  
                    ];
                    // Helper::pr($fields);die;
                    Article::insert($fields);
                    return redirect(url('user/my-articles'))->with('success_message', 'Creative-Work Submitted Successfully !!!');
                } else {
                    return redirect()->back()->with('error_message', 'All Fields Required !!!');
                }
            }

            $title                          = 'Submit New Creative-Work';
            $page_name                      = 'submit-new-article';
            $data['section_ert']            = SectionErt::where('status', '=', 1)->orderBy('name', 'ASC')->get();
            $data['user_title']             = Title::where('status', '=', 1)->orderBy('name', 'ASC')->get();
            $data['submission_type']        = SubmissionType::where('status', '=', 1)->orderBy('name', 'ASC')->get();
            $data['country']                = Country::orderBy('name', 'ASC')->get();
            $data['pronoun']                = Pronoun::where('status', '=', 1)->orderBy('name', 'ASC')->get();
            $data['ecosystem_affiliation']  = EcosystemAffiliation::where('status', '=', 1)->orderBy('name', 'ASC')->get();
            $data['expertise_area']         = ExpertiseArea::where('status', '=', 1)->orderBy('name', 'ASC')->get();                        
            $data['row']                    = [];
            echo $this->front_after_login_layout($title, $page_name, $data);
        }
    /* after login */
}
