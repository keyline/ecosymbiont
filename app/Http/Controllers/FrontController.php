<?php
namespace App\Http\Controllers;

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

use Auth;
use Session;
use Helper;
use Hash;
use stripe;
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
        $data['row']                    = Page::select('page_name', 'page_name')->where('status', '=', 1)->where('page_slug', '=', $slug)->first();
        $title                          = (($data['row'])?$data['row']->page_name:'');
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
        public function signIn(Request $request)
        {
            if($request->isMethod('post')){
                $postData = $request->all();
                $rules = [
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

                        return redirect('user/dashboard');
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
            $data                           = [];
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
                            'role'                      => 1,           
                            'password'                  => Hash::make($postData['password']),                         
                        ];
                        User::insert($fields);
                        return redirect(url('signin'))->with('success_message', 'Sign Up Successfully !!!');
                    } else {
                        return redirect()->back()->with('error_message', 'User Already Registered !!!');
                    }
                } else {
                    return redirect()->back()->with('error_message', 'All Fields Required !!!');
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
            $data['articles']               = Article::where('user_id', '=', $user_id)->get();

            $title                          = 'My Articles';
            $page_name                      = 'my-articles';
            echo $this->front_after_login_layout($title, $page_name, $data);
        }
        public function submitNewArticle(Request $request)
        {
            $user_id                        = session('user_id');
            $data['user']                   = User::find($user_id);
            $data['articles']               = Article::where('user_id', '=', $user_id)->get();

            if ($request->isMethod('post')) {
                // article submit code goes here
            }

            $title                          = 'Submit New Articles';
            $page_name                      = 'submit-new-article';
            echo $this->front_after_login_layout($title, $page_name, $data);
        }
    /* after login */
}
