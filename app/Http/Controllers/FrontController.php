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

    public function signIn(Request $request)
    {
        if($request->isMethod('post')){
            $postData = $request->all();
            // dd($postData);
            $rules = [
                        'email'     => 'required|email|max:255',
                        'password'  => 'required|max:30',
                    ];
            if($this->validate($request, $rules)){
                
                if(Auth::guard('web')->attempt(['email' => $postData['email'], 'password' => $postData['password'], 'status' => 1])){
                    // Helper::pr(Auth::guard('web')->user());
                    $sessionData = Auth::guard('web')->user();
                    $request->session()->put('user_id', $sessionData->id);
                    $request->session()->put('first_name', $sessionData->first_name);
                    $request->session()->put('middle_name', $sessionData->middle_name);
                    $request->session()->put('last_name', $sessionData->last_name);
                    $request->session()->put('role', $sessionData->role);
                    $request->session()->put('email', $sessionData->email);
                    // $request->session()->put('is_admin_login', 1);
                                        
                    return redirect('profile');
                } else {                    
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

    public function profile()
    {        
        $data                           = [];
        $title                          = 'Profile';
        $page_name                      = 'profile';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }

    public function signUp(Request $request)
    {
        $data['countries']              = Country::select('id', 'name')->where('status', '=', 1)->get();
        $title                          = 'Sign Up';
        $page_name                      = 'signup';
        if ($request->isMethod('post')) {
            $postData = $request->all();
            //  dd($postData);
            $rules = [                                 
                'first_name'                => 'required',            
                'last_name'                 => 'required',                                    
                'email'                     => 'required',           
                'phone'                     => 'required',           
                'country'                   => 'required',                                     
                'password'                  => 'required',                         
            ];
            if ($this->validate($request, $rules)) {
                //   dd($postData);
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
                    //  dd($fields);
                    //   Helper::pr($fields);
                    User::insert($fields);
                    return redirect()->back()->with('success_message', 'Sign Up Successfully !!!');
                } else {
                    return redirect()->back()->with('error_message', 'User Already Inserted !!!');
                }
            } else {
                return redirect()->back()->with('error_message', 'All Fields Required !!!');
            }
        }
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
}
