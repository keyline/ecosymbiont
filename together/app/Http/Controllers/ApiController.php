<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\Center;
use App\Models\CenterTimeSlot;
use App\Models\DocumentType;
use App\Models\Label;
use App\Models\Student;
use App\Models\GeneralSetting;
use App\Models\EmailLog;
use App\Models\Page;
use App\Models\Testimonial;
use App\Models\Banner;
use App\Models\Notice;
use App\Models\Teacher;
use App\Models\GalleryCategory;
use App\Models\Gallery;
use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\Enquiry;
use App\Models\UserActivity;
use App\Models\Source;
use App\Models\User;
use App\Models\UserDevice;

use Auth;
use Session;
use Helper;
use Hash;
use DB;
use App\Libraries\CreatorJwt;
use App\Libraries\JWT;
class ApiController extends Controller
{
    /* before login screen */
        public function getAppSetting(Request $request){
            $apiStatus          = TRUE;
            $apiMessage         = '';
            $apiResponse        = [];
            $apiExtraField      = '';
            $apiExtraData       = '';
            $requestData        = $request->all();
            $requiredFields     = ['key', 'source'];
            $headerData         = $request->header();
            if (!$this->validateArray($requiredFields, $requestData)){
                $apiStatus          = FALSE;
                $apiMessage         = 'All Data Are Not Present !!!';
            }
            if($headerData['key'][0] == env('PROJECT_KEY')){
                $generalSetting = GeneralSetting::find(1);
                if($generalSetting){
                    $apiResponse = [
                        'site_name'             => $generalSetting->site_name,
                        'site_phone'            => $generalSetting->site_phone,
                        'site_phone2'           => $generalSetting->site_phone2,
                        'site_mail'             => $generalSetting->site_mail,
                        'site_url'              => $generalSetting->site_url,
                        'site_logo'             => env('UPLOADS_URL').$generalSetting->site_logo,
                        'site_address'          => $generalSetting->description,
                        'theme_color'           => $generalSetting->theme_color,
                        'font_color'            => $generalSetting->font_color,
                        'twitter_profile'       => $generalSetting->twitter_profile,
                        'facebook_profile'      => $generalSetting->facebook_profile,
                        'instagram_profile'     => $generalSetting->instagram_profile,
                        'linkedin_profile'      => $generalSetting->linkedin_profile,
                        'youtube_profile'       => $generalSetting->youtube_profile,
                    ];
                }
                http_response_code(200);
                $apiStatus          = TRUE;
                $apiMessage         = 'Data Available !!!';
                $apiExtraField      = 'response_code';
                $apiExtraData       = http_response_code();
            } else {
                http_response_code(400);
                $apiStatus          = FALSE;
                $apiMessage         = $this->getResponseCode(http_response_code());
                $apiExtraField      = 'response_code';
                $apiExtraData       = http_response_code();
            }
            $this->response_to_json($apiStatus, $apiMessage, $apiResponse, $apiExtraField, $apiExtraData);
        }
        public function getSource(Request $request){
            $apiStatus          = TRUE;
            $apiMessage         = '';
            $apiResponse        = [];
            $apiExtraField      = '';
            $apiExtraData       = '';
            $requestData        = $request->all();
            $requiredFields     = ['key', 'source'];
            $headerData         = $request->header();
            if (!$this->validateArray($requiredFields, $requestData)){
                $apiStatus          = FALSE;
                $apiMessage         = 'All Data Are Not Present !!!';
            }
            if($headerData['key'][0] == env('PROJECT_KEY')){
                $sources = Source::select('id', 'name')->where('status', '=', 1)->orderBy('name', 'ASC')->get();
                if($sources){
                    foreach ($sources as $row) {
                        $apiResponse[] = [
                            'label'            => $row->name,
                            'value'            => $row->id
                        ];
                    }
                }
                http_response_code(200);
                $apiStatus          = TRUE;
                $apiMessage         = 'Data Available !!!';
                $apiExtraField      = 'response_code';
                $apiExtraData       = http_response_code();
            } else {
                http_response_code(400);
                $apiStatus          = FALSE;
                $apiMessage         = $this->getResponseCode(http_response_code());
                $apiExtraField      = 'response_code';
                $apiExtraData       = http_response_code();
            }
            $this->response_to_json($apiStatus, $apiMessage, $apiResponse, $apiExtraField, $apiExtraData);
        }
        public function getCenter(Request $request){
            $apiStatus          = TRUE;
            $apiMessage         = '';
            $apiResponse        = [];
            $apiExtraField      = '';
            $apiExtraData       = '';
            $requestData        = $request->all();
            $requiredFields     = ['key', 'source'];
            $headerData         = $request->header();
            if (!$this->validateArray($requiredFields, $requestData)){
                $apiStatus          = FALSE;
                $apiMessage         = 'All Data Are Not Present !!!';
            }
            if($headerData['key'][0] == env('PROJECT_KEY')){
                $centers = Center::select('id', 'name')->where('status', '=', 1)->orderBy('name', 'ASC')->get();
                if($centers){
                    foreach ($centers as $row) {
                        $apiResponse[] = [
                            'label'            => $row->name,
                            'value'            => $row->id
                        ];
                    }
                }
                http_response_code(200);
                $apiStatus          = TRUE;
                $apiMessage         = 'Data Available !!!';
                $apiExtraField      = 'response_code';
                $apiExtraData       = http_response_code();
            } else {
                http_response_code(400);
                $apiStatus          = FALSE;
                $apiMessage         = $this->getResponseCode(http_response_code());
                $apiExtraField      = 'response_code';
                $apiExtraData       = http_response_code();
            }
            $this->response_to_json($apiStatus, $apiMessage, $apiResponse, $apiExtraField, $apiExtraData);
        }
        public function getDocumentType(Request $request){
            $apiStatus          = TRUE;
            $apiMessage         = '';
            $apiResponse        = [];
            $apiExtraField      = '';
            $apiExtraData       = '';
            $requestData        = $request->all();
            $requiredFields     = ['key', 'source'];
            $headerData         = $request->header();
            if (!$this->validateArray($requiredFields, $requestData)){
                $apiStatus          = FALSE;
                $apiMessage         = 'All Data Are Not Present !!!';
            }
            if($headerData['key'][0] == env('PROJECT_KEY')){
                $docTypes = DocumentType::select('id', 'name')->where('status', '=', 1)->orderBy('name', 'ASC')->get();
                if($docTypes){
                    foreach ($docTypes as $row) {
                        $apiResponse[] = [
                            'label'            => $row->name,
                            'value'            => $row->id
                        ];
                    }
                }
                http_response_code(200);
                $apiStatus          = TRUE;
                $apiMessage         = 'Data Available !!!';
                $apiExtraField      = 'response_code';
                $apiExtraData       = http_response_code();
            } else {
                http_response_code(400);
                $apiStatus          = FALSE;
                $apiMessage         = $this->getResponseCode(http_response_code());
                $apiExtraField      = 'response_code';
                $apiExtraData       = http_response_code();
            }
            $this->response_to_json($apiStatus, $apiMessage, $apiResponse, $apiExtraField, $apiExtraData);
        }
        public function getLevel(Request $request){
            $apiStatus          = TRUE;
            $apiMessage         = '';
            $apiResponse        = [];
            $apiExtraField      = '';
            $apiExtraData       = '';
            $requestData        = $request->all();
            $requiredFields     = ['key', 'source'];
            $headerData         = $request->header();
            if (!$this->validateArray($requiredFields, $requestData)){
                $apiStatus          = FALSE;
                $apiMessage         = 'All Data Are Not Present !!!';
            }
            if($headerData['key'][0] == env('PROJECT_KEY')){
                $levels = Label::select('id', 'name')->where('status', '=', 1)->orderBy('label_no', 'ASC')->get();
                if($levels){
                    foreach ($levels as $row) {
                        $apiResponse[] = [
                            'label'            => $row->name,
                            'value'            => $row->id
                        ];
                    }
                }
                http_response_code(200);
                $apiStatus          = TRUE;
                $apiMessage         = 'Data Available !!!';
                $apiExtraField      = 'response_code';
                $apiExtraData       = http_response_code();
            } else {
                http_response_code(400);
                $apiStatus          = FALSE;
                $apiMessage         = $this->getResponseCode(http_response_code());
                $apiExtraField      = 'response_code';
                $apiExtraData       = http_response_code();
            }
            $this->response_to_json($apiStatus, $apiMessage, $apiResponse, $apiExtraField, $apiExtraData);
        }
        public function getCountry(Request $request){
            $apiStatus          = TRUE;
            $apiMessage         = '';
            $apiResponse        = [];
            $apiExtraField      = '';
            $apiExtraData       = '';
            $requestData        = $request->all();
            $requiredFields     = ['key', 'source'];
            $headerData         = $request->header();
            if (!$this->validateArray($requiredFields, $requestData)){
                $apiStatus          = FALSE;
                $apiMessage         = 'All Data Are Not Present !!!';
            }
            if($headerData['key'][0] == env('PROJECT_KEY')){
                $countries = Country::select('id', 'name')->where('status', '=', 1)->orderBy('name', 'ASC')->get();
                if($countries){
                    foreach ($countries as $row) {
                        $apiResponse[] = [
                            'label'            => $row->name,
                            'value'            => $row->id
                        ];
                    }
                }
                http_response_code(200);
                $apiStatus          = TRUE;
                $apiMessage         = 'Data Available !!!';
                $apiExtraField      = 'response_code';
                $apiExtraData       = http_response_code();
            } else {
                http_response_code(400);
                $apiStatus          = FALSE;
                $apiMessage         = $this->getResponseCode(http_response_code());
                $apiExtraField      = 'response_code';
                $apiExtraData       = http_response_code();
            }
            $this->response_to_json($apiStatus, $apiMessage, $apiResponse, $apiExtraField, $apiExtraData);
        }
        public function getState(Request $request){
            $apiStatus          = TRUE;
            $apiMessage         = '';
            $apiResponse        = [];
            $apiExtraField      = '';
            $apiExtraData       = '';
            $requestData        = $request->all();
            $requiredFields     = ['key', 'source', 'country_id'];
            $headerData         = $request->header();
            if (!$this->validateArray($requiredFields, $requestData)){
                $apiStatus          = FALSE;
                $apiMessage         = 'All Data Are Not Present !!!';
            }
            if($headerData['key'][0] == env('PROJECT_KEY')){
                $country_id = $requestData['country_id'];
                $countries  = State::select('id', 'name')->where('status', '=', 1)->where('country_id', '=', $country_id)->orderBy('name', 'ASC')->get();
                if($countries){
                    foreach ($countries as $row) {
                        $apiResponse[] = [
                            'label'            => $row->name,
                            'value'            => $row->id
                        ];
                    }
                }
                http_response_code(200);
                $apiStatus          = TRUE;
                $apiMessage         = 'Data Available !!!';
                $apiExtraField      = 'response_code';
                $apiExtraData       = http_response_code();
            } else {
                http_response_code(400);
                $apiStatus          = FALSE;
                $apiMessage         = $this->getResponseCode(http_response_code());
                $apiExtraField      = 'response_code';
                $apiExtraData       = http_response_code();
            }
            $this->response_to_json($apiStatus, $apiMessage, $apiResponse, $apiExtraField, $apiExtraData);
        }
        public function getDistrict(Request $request){
            $apiStatus          = TRUE;
            $apiMessage         = '';
            $apiResponse        = [];
            $apiExtraField      = '';
            $apiExtraData       = '';
            $requestData        = $request->all();
            $requiredFields     = ['key', 'source', 'state_id'];
            $headerData         = $request->header();
            if (!$this->validateArray($requiredFields, $requestData)){
                $apiStatus          = FALSE;
                $apiMessage         = 'All Data Are Not Present !!!';
            }
            if($headerData['key'][0] == env('PROJECT_KEY')){
                $state_id = $requestData['state_id'];
                $countries  = District::select('id', 'name')->where('status', '=', 1)->where('state_id', '=', $state_id)->orderBy('name', 'ASC')->get();
                if($countries){
                    foreach ($countries as $row) {
                        $apiResponse[] = [
                            'label'            => $row->name,
                            'value'            => $row->id
                        ];
                    }
                }
                http_response_code(200);
                $apiStatus          = TRUE;
                $apiMessage         = 'Data Available !!!';
                $apiExtraField      = 'response_code';
                $apiExtraData       = http_response_code();
            } else {
                http_response_code(400);
                $apiStatus          = FALSE;
                $apiMessage         = $this->getResponseCode(http_response_code());
                $apiExtraField      = 'response_code';
                $apiExtraData       = http_response_code();
            }
            $this->response_to_json($apiStatus, $apiMessage, $apiResponse, $apiExtraField, $apiExtraData);
        }
        public function getStaticPages(Request $request){
            $apiStatus          = TRUE;
            $apiMessage         = '';
            $apiResponse        = [];
            $apiExtraField      = '';
            $apiExtraData       = '';
            $requestData        = $request->all();
            $requiredFields     = ['key', 'source', 'page_slug'];
            $headerData         = $request->header();
            if (!$this->validateArray($requiredFields, $requestData)){
                $apiStatus          = FALSE;
                $apiMessage         = 'All Data Are Not Present !!!';
            }
            if($headerData['key'][0] == env('PROJECT_KEY')){
                $page_slug = $requestData['page_slug'];
                $pageContent  = Page::select('page_name', 'page_content')->where('status', '=', 1)->where('page_slug', '=', $page_slug)->first();
                if($pageContent){
                    $apiResponse[] = [
                        'page_name'            => $pageContent->page_name,
                        'page_content'         => $pageContent->page_content
                    ];
                }
                http_response_code(200);
                $apiStatus          = TRUE;
                $apiMessage         = 'Data Available !!!';
                $apiExtraField      = 'response_code';
                $apiExtraData       = http_response_code();
            } else {
                http_response_code(400);
                $apiStatus          = FALSE;
                $apiMessage         = $this->getResponseCode(http_response_code());
                $apiExtraField      = 'response_code';
                $apiExtraData       = http_response_code();
            }
            $this->response_to_json($apiStatus, $apiMessage, $apiResponse, $apiExtraField, $apiExtraData);
        }
        public function getNotice(Request $request){
            $apiStatus          = TRUE;
            $apiMessage         = '';
            $apiResponse        = [];
            $apiExtraField      = '';
            $apiExtraData       = '';
            $requestData        = $request->all();
            $requiredFields     = ['key', 'source'];
            $headerData         = $request->header();
            if (!$this->validateArray($requiredFields, $requestData)){
                $apiStatus          = FALSE;
                $apiMessage         = 'All Data Are Not Present !!!';
            }
            if($headerData['key'][0] == env('PROJECT_KEY')){
                $notices = Notice::select('name', 'description', 'start_date', 'expiry_date', 'uploaded_by', 'notice_date', 'notice_file')->where('status', '=', 1)->orderBy('id', 'DESC')->get();
                if($notices){
                    foreach ($notices as $row) {
                        $apiResponse[] = [
                            'name'            => $row->name,
                            'description'            => $row->description,
                            'start_date'             => date_format(date_create($row->start_date), "M d, Y"),
                            'expiry_date'            => date_format(date_create($row->expiry_date), "M d, Y"),
                            'uploaded_by'            => $row->uploaded_by,
                            'notice_date'            => date_format(date_create($row->notice_date), "M d, Y"),
                            'notice_file'            => env('UPLOADS_URL').'notice/'.$row->notice_file,
                        ];
                    }
                }
                http_response_code(200);
                $apiStatus          = TRUE;
                $apiMessage         = 'Data Available !!!';
                $apiExtraField      = 'response_code';
                $apiExtraData       = http_response_code();
            } else {
                http_response_code(400);
                $apiStatus          = FALSE;
                $apiMessage         = $this->getResponseCode(http_response_code());
                $apiExtraField      = 'response_code';
                $apiExtraData       = http_response_code();
            }
            $this->response_to_json($apiStatus, $apiMessage, $apiResponse, $apiExtraField, $apiExtraData);
        }
        public function getAllMasters(Request $request){
            $apiStatus          = TRUE;
            $apiMessage         = '';
            $apiResponse        = [];
            $apiExtraField      = '';
            $apiExtraData       = '';
            $requestData        = $request->all();
            $requiredFields     = ['key', 'source'];
            $headerData         = $request->header();
            if (!$this->validateArray($requiredFields, $requestData)){
                $apiStatus          = FALSE;
                $apiMessage         = 'All Data Are Not Present !!!';
            }
            if($headerData['key'][0] == env('PROJECT_KEY')){
                $centerData         = [];
                $sourceData         = [];
                $documentTypeData   = [];
                $levelData          = [];
                $countryData        = [];

                $centers            = Center::select('id', 'name')->where('status', '=', 1)->orderBy('name', 'ASC')->get();
                if($centers){
                    foreach ($centers as $row) {
                        $centerData[] = [
                            'label'            => $row->name,
                            'value'            => $row->id
                        ];
                    }
                }

                $sources = Source::select('id', 'name')->where('status', '=', 1)->orderBy('name', 'ASC')->get();
                if($sources){
                    foreach ($sources as $row) {
                        $sourceData[] = [
                            'label'            => $row->name,
                            'value'            => $row->id
                        ];
                    }
                }

                $docTypes = DocumentType::select('id', 'name')->where('status', '=', 1)->orderBy('name', 'ASC')->get();
                if($docTypes){
                    foreach ($docTypes as $row) {
                        $documentTypeData[] = [
                            'label'            => $row->name,
                            'value'            => $row->id
                        ];
                    }
                }

                $levels = Label::select('id', 'name')->where('status', '=', 1)->orderBy('label_no', 'ASC')->get();
                if($levels){
                    foreach ($levels as $row) {
                        $levelData[] = [
                            'label'            => $row->name,
                            'value'            => $row->id
                        ];
                    }
                }

                $countries = Country::select('id', 'name')->where('status', '=', 1)->orderBy('name', 'ASC')->get();
                if($countries){
                    foreach ($countries as $row) {
                        $apiResponse[] = [
                            'label'            => $row->name,
                            'value'            => $row->id
                        ];
                    }
                }

                $apiResponse = [
                    'centers'           => $centerData,
                    'sources'           => $sourceData,
                    'document_types'    => $documentTypeData,
                    'levels'            => $levelData,
                    'countries'         => $countryData,
                ];
                http_response_code(200);
                $apiStatus          = TRUE;
                $apiMessage         = 'Data Available !!!';
                $apiExtraField      = 'response_code';
                $apiExtraData       = http_response_code();
            } else {
                http_response_code(400);
                $apiStatus          = FALSE;
                $apiMessage         = $this->getResponseCode(http_response_code());
                $apiExtraField      = 'response_code';
                $apiExtraData       = http_response_code();
            }
            $this->response_to_json($apiStatus, $apiMessage, $apiResponse, $apiExtraField, $apiExtraData);
        }
    /* before login screen */
    /* authentication */
        public function signin(Request $request)
        {
            $apiStatus          = TRUE;
            $apiMessage         = '';
            $apiResponse        = [];
            $apiExtraField      = '';
            $apiExtraData       = '';
            $requestData        = $request->all();
            $requiredFields     = ['key', 'source', 'email', 'password', 'device_token', 'fcm_token'];
            $headerData         = $request->header();
            if (!$this->validateArray($requiredFields, $requestData)){
                $apiStatus          = FALSE;
                $apiMessage         = 'All Data Are Not Present !!!';
            }
            if($headerData['key'][0] == env('PROJECT_KEY')){
                $email                      = $requestData['email'];
                $password                   = $requestData['password'];
                $device_type                = $headerData['source'][0];
                $device_token               = $requestData['device_token'];
                $fcm_token                  = $requestData['fcm_token'];
                $checkUser                  = Teacher::where('email', '=', $email)->where('status', '=', 1)->first();
                if($checkUser){
                    if(Hash::check($password, $checkUser->password)){
                        $objOfJwt           = new CreatorJwt();
                        $app_access_token   = $objOfJwt->GenerateToken($checkUser->id, $checkUser->email, $checkUser->phone);
                        $user_id                        = $checkUser->id;
                        $fields     = [
                            'user_id'               => $user_id,
                            'device_type'           => $device_type,
                            'device_token'          => $device_token,
                            'fcm_token'             => $fcm_token,
                            'app_access_token'      => $app_access_token,
                        ];
                        $checkUserTokenExist            = UserDevice::where('user_id', '=', $user_id)->where('published', '=', 1)->where('device_type', '=', $device_type)->where('device_token', '=', $device_token)->first();
                        if(!$checkUserTokenExist){
                            UserDevice::insert($fields);
                        } else {
                            UserDevice::where('id','=',$checkUserTokenExist->id)->update($fields);
                        }
                        $apiResponse = [
                            'user_id'               => $user_id,
                            'name'                  => $checkUser->name,
                            'email'                 => $checkUser->email,
                            'phone'                 => $checkUser->phone,
                            'role'                  => 'TEACHER',
                            'device_type'           => $device_type,
                            'device_token'          => $device_token,
                            'fcm_token'             => $fcm_token,
                            'app_access_token'      => $app_access_token,
                        ];
                        $apiStatus                          = TRUE;
                        $apiMessage                         = 'SignIn Successfully !!!';
                    } else {
                        $apiStatus                          = FALSE;
                        $apiMessage                         = 'Invalid Password !!!';
                    }                   
                } else {
                    $apiStatus                              = FALSE;
                    $apiMessage                             = 'We Don\'t Recognize You !!!';
                }
            } else {
                $apiStatus          = FALSE;
                $apiMessage         = 'Unauthenticate Request !!!';
            }
            $this->response_to_json($apiStatus, $apiMessage, $apiResponse);
        }
        public function forgotPassword(Request $request){
            $apiStatus          = TRUE;
            $apiMessage         = '';
            $apiResponse        = [];
            $apiExtraField      = '';
            $apiExtraData       = '';
            $requestData        = $request->all();
            $requiredFields     = ['key', 'source', 'email'];
            $headerData         = $request->header();
            if (!$this->validateArray($requiredFields, $requestData)){
                $apiStatus          = FALSE;
                $apiMessage         = 'All Data Are Not Present !!!';
            }
            if($headerData['key'][0] == env('PROJECT_KEY')){
                $checkEmail = Teacher::where('email', '=', $requestData['email'])->first();
                if($checkEmail){
                    $remember_token  = rand(1000,9999);
                    Teacher::where('id', '=', $checkEmail->id)->update(['otp' => $remember_token]);
                    $mailData                   = [
                        'id'    => $checkEmail->id,
                        'email' => $checkEmail->email,
                        'otp'   => $remember_token,
                    ];
                    $generalSetting             = GeneralSetting::find('1');
                    $subject                    = $generalSetting->site_name.' :: Forgot Password OTP';
                    $message                    = view('email-templates.otp',$mailData);
                    // echo $message;die;
                    $this->sendMail($requestData['email'], $subject, $message);

                    $apiResponse                        = $mailData;
                    $apiStatus                          = TRUE;
                    http_response_code(200);
                    $apiMessage                         = 'OTP Sent To Email Validation !!!';
                    $apiExtraField                      = 'response_code';
                    $apiExtraData                       = http_response_code();
                } else {
                    $apiStatus          = FALSE;
                    http_response_code(400);
                    $apiMessage         = 'Email Not Registered With Us !!!';
                    $apiExtraField      = 'response_code';
                    $apiExtraData       = http_response_code();
                }
            } else {
                http_response_code(400);
                $apiStatus          = FALSE;
                $apiMessage         = $this->getResponseCode(http_response_code());
                $apiExtraField      = 'response_code';
                $apiExtraData       = http_response_code();
            }
            $this->response_to_json($apiStatus, $apiMessage, $apiResponse, $apiExtraField, $apiExtraData);
        }
        public function validateOtp(Request $request){
            $apiStatus          = TRUE;
            $apiMessage         = '';
            $apiResponse        = [];
            $apiExtraField      = '';
            $apiExtraData       = '';
            $requestData        = $request->all();
            $requiredFields     = ['key', 'source', 'id', 'otp'];
            $headerData         = $request->header();
            if (!$this->validateArray($requiredFields, $requestData)){
                $apiStatus          = FALSE;
                $apiMessage         = 'All Data Are Not Present !!!';
            }
            if($headerData['key'][0] == env('PROJECT_KEY')){
                $getUser = Teacher::where('id', '=', $requestData['id'])->first();
                if($getUser){
                    $remember_token  = $getUser->otp;
                    if($remember_token == $requestData['otp']){
                        Teacher::where('id', '=', $requestData['id'])->update(['otp' => 0]);
                        // $this->sendMail('subhomoysamanta1989@gmail.com', $requestData['subject'], $requestData['message']);
                        $apiResponse        = [
                            'id'    => $getUser->id,
                            'email' => $getUser->email
                        ];
                        $apiStatus                          = TRUE;
                        http_response_code(200);
                        $apiMessage                         = 'OTP Validated Successfully !!!';
                        $apiExtraField                      = 'response_code';
                        $apiExtraData                       = http_response_code();
                    } else {
                        $apiStatus          = FALSE;
                        http_response_code(400);
                        $apiMessage         = 'OTP Mismatched !!!';
                        $apiExtraField      = 'response_code';
                    }
                } else {
                    $apiStatus          = FALSE;
                    http_response_code(400);
                    $apiMessage         = 'Teacher Not Found !!!';
                    $apiExtraField      = 'response_code';
                    $apiExtraData       = http_response_code();
                }
            } else {
                http_response_code(400);
                $apiStatus          = FALSE;
                $apiMessage         = $this->getResponseCode(http_response_code());
                $apiExtraField      = 'response_code';
                $apiExtraData       = http_response_code();
            }
            $this->response_to_json($apiStatus, $apiMessage, $apiResponse, $apiExtraField, $apiExtraData);
        }
        public function resendOtp(Request $request){
            $apiStatus          = TRUE;
            $apiMessage         = '';
            $apiResponse        = [];
            $apiExtraField      = '';
            $apiExtraData       = '';
            $requestData        = $request->all();
            $requiredFields     = ['key', 'source', 'id'];
            $headerData         = $request->header();
            if (!$this->validateArray($requiredFields, $requestData)){
                $apiStatus          = FALSE;
                $apiMessage         = 'All Data Are Not Present !!!';
            }
            if($headerData['key'][0] == env('PROJECT_KEY')){
                $id         = $requestData['id'];
                $getUser    = Teacher::where('id', '=', $id)->first();
                if($getUser){
                    $remember_token = rand(1000,9999);
                    $postData = [
                        'otp'        => $remember_token
                    ];
                    Teacher::where('id', '=', $id)->update($postData);
                    
                    $mailData                   = [
                        'id'    => $getUser->id,
                        'email' => $getUser->email,
                        'otp'   => $remember_token,
                    ];
                    $generalSetting             = GeneralSetting::find('1');
                    $subject                    = $generalSetting->site_name.' :: Resend OTP';
                    $message                    = view('email-templates.otp',$mailData);
                    // echo $message;die;
                    $this->sendMail($getUser->email, $subject, $message);

                    $apiResponse                        = $mailData;
                    $apiStatus                          = TRUE;
                    http_response_code(200);
                    $apiMessage                         = 'OTP Resend !!!';
                    $apiExtraField                      = 'response_code';
                    $apiExtraData                       = http_response_code();
                } else {
                    $apiStatus          = FALSE;
                    http_response_code(400);
                    $apiMessage         = 'Teacher Not Found !!!';
                    $apiExtraField      = 'response_code';
                    $apiExtraData       = http_response_code();
                }
            } else {
                http_response_code(400);
                $apiStatus          = FALSE;
                $apiMessage         = $this->getResponseCode(http_response_code());
                $apiExtraField      = 'response_code';
                $apiExtraData       = http_response_code();
            }
            $this->response_to_json($apiStatus, $apiMessage, $apiResponse, $apiExtraField, $apiExtraData);
        }
        public function resetPassword(Request $request)
        {
            $apiStatus          = TRUE;
            $apiMessage         = '';
            $apiResponse        = [];
            $apiExtraField      = '';
            $apiExtraData       = '';
            $requestData        = $request->all();
            $requiredFields     = ['key', 'source', 'id', 'password', 'confirm_password'];
            $headerData         = $request->header();
            if (!$this->validateArray($requiredFields, $requestData)){
                $apiStatus          = FALSE;
                $apiMessage         = 'All Data Are Not Present !!!';
            }
            if($headerData['key'][0] == env('PROJECT_KEY')){
                $getUser = Teacher::where('id', '=', $requestData['id'])->first();
                if($getUser){
                    if($requestData['password'] == $requestData['confirm_password']){
                        Teacher::where('id', '=', $requestData['id'])->update(['password' => Hash::make($requestData['password'])]);
                        $mailData        = [
                            'id'        => $getUser->id,
                            'name'      => $getUser->first_name.' '.$getUser->last_name,
                            'email'     => $getUser->email
                        ];

                        $generalSetting             = GeneralSetting::find('1');
                        $subject                    = $generalSetting->site_name.' :: Reset Password';
                        $message                    = view('email-templates.change-password',$mailData);
                        // echo $message;die;
                        $this->sendMail($getUser->email, $subject, $message);
                        
                        $apiStatus                          = TRUE;
                        http_response_code(200);
                        $apiMessage                         = 'Password Reset Successfully !!!';
                        $apiExtraField                      = 'response_code';
                        $apiExtraData                       = http_response_code();
                    } else {
                        $apiStatus          = FALSE;
                        http_response_code(400);
                        $apiMessage         = 'Password & Confirm Password Not Matched !!!';
                        $apiExtraField      = 'response_code';
                    }
                } else {
                    $apiStatus          = FALSE;
                    http_response_code(400);
                    $apiMessage         = 'User Not Found !!!';
                    $apiExtraField      = 'response_code';
                    $apiExtraData       = http_response_code();
                }
            } else {
                http_response_code(400);
                $apiStatus          = FALSE;
                $apiMessage         = $this->getResponseCode(http_response_code());
                $apiExtraField      = 'response_code';
                $apiExtraData       = http_response_code();
            }
            $this->response_to_json($apiStatus, $apiMessage, $apiResponse, $apiExtraField, $apiExtraData);
        }
    /* authentication */
    /* after login */
        public function signout(Request $request)
        {
            $apiStatus          = TRUE;
            $apiMessage         = '';
            $apiResponse        = [];
            $apiExtraField      = '';
            $apiExtraData       = '';
            $requestData        = $request->all();
            $requiredFields     = ['key', 'source', 'email', 'password', 'device_token', 'fcm_token'];
            $headerData         = $request->header();
            // Helper::pr($headerData);
            if (!$this->validateArray($requiredFields, $requestData)){
                $apiStatus          = FALSE;
                $apiMessage         = 'All Data Are Not Present !!!';
            }
            if($headerData['key'][0] == env('PROJECT_KEY')){
                $app_access_token           = $headerData['authorization'][0];
                $checkUserTokenExist        = UserDevice::where('app_access_token', '=', $app_access_token)->where('published', '=', 1)->first();
                if($checkUserTokenExist){
                    UserDevice::where('app_access_token', '=', $app_access_token)->delete();
                    $apiStatus                      = TRUE;
                    $apiMessage                     = 'Signout Successfully !!!';
                } else {
                    $apiStatus                      = FALSE;
                    $apiMessage                     = 'Something Went Wrong !!!';
                }               
            } else {
                $apiStatus          = FALSE;
                $apiMessage         = 'Unauthenticate Request !!!';
            }
            $this->response_to_json($apiStatus, $apiMessage, $apiResponse);
        }
        public function getProfile(Request $request)
        {
            $apiStatus          = TRUE;
            $apiMessage         = '';
            $apiResponse        = [];
            $this->isJSON(file_get_contents('php://input'));
            $requestData        = $this->extract_json(file_get_contents('php://input'));        
            $requiredFields     = ['key', 'source'];
            if (!$this->validateArray($requiredFields, $requestData)){              
                $apiStatus          = FALSE;
                $apiMessage         = 'All Data Are Not Present !!!';
            }           
            if($requestData['key'] == env('PROJECT_KEY')){
                $app_access_token           = $request->header('Authorization');
                $getTokenValue              = $this->tokenAuth($app_access_token);
                if($getTokenValue['status']){
                    $uId        = $getTokenValue['data'][1];
                    $expiry     = date('d/m/Y H:i:s', $getTokenValue['data'][4]);
                    $getUser    = User::where('id', '=', $uId)->first();
                    if($getUser){
                        
                        $profileData = [
                            'first_name'            => $getUser->first_name,
                            'last_name'             => $getUser->last_name,
                            'email'                 => $getUser->email,
                            'phone'                 => $getUser->phone,
                            'profile_image'         => (($getUser->profile_image != '')?env('UPLOADS_URL').'user/'.$getUser->profile_image:env('AVATAR_NO_IMAGE')),
                        ];
                        $apiStatus          = TRUE;
                        $apiMessage         = 'Data Available !!!';
                        $apiResponse        = $profileData;
                    } else {
                        $apiStatus          = FALSE;
                        $apiMessage         = 'User Not Found !!!';
                    }
                } else {
                    $apiStatus                      = FALSE;
                    $apiMessage                     = $getTokenValue['data'];
                }                                               
            } else {
                $apiStatus          = FALSE;
                $apiMessage         = 'Unauthenticate Request !!!';
            }
            $this->response_to_json($apiStatus, $apiMessage, $apiResponse);
        }
        public function changePassword(Request $request)
        {
            $apiStatus          = TRUE;
            $apiMessage         = '';
            $apiResponse        = [];
            $this->isJSON(file_get_contents('php://input'));
            $requestData        = $this->extract_json(file_get_contents('php://input'));        
            $requiredFields     = ['key', 'source', 'old_password', 'new_password', 'confirm_password'];
            if (!$this->validateArray($requiredFields, $requestData)){              
                $apiStatus          = FALSE;
                $apiMessage         = 'All Data Are Not Present !!!';
            }           
            if($requestData['key'] == env('PROJECT_KEY')){
                $app_access_token           = $request->header('Authorization');
                $old_password               = $requestData['old_password'];
                $new_password               = $requestData['new_password'];
                $confirm_password           = $requestData['confirm_password'];
                $getTokenValue              = $this->tokenAuth($app_access_token);
                if($getTokenValue['status']){
                    $uId        = $getTokenValue['data'][1];
                    $expiry     = date('d/m/Y H:i:s', $getTokenValue['data'][4]);
                    $getUser    = User::where('id', '=', $uId)->first();
                    if($getUser){
                        if(Hash::check($old_password, $getUser->password)){
                            if($new_password == $confirm_password){
                                if($new_password != $old_password){
                                    $fields = [
                                        'password'                  => Hash::make($new_password)
                                    ];
                                    User::where('id', '=', $uId)->update($fields);
                                    // new password send mail
                                        $generalSetting                 = GeneralSetting::find('1');
                                        $subject                        = $generalSetting->site_name.' Change Password';
                                        $mailData['name']               = $getUser->first_name.' '.$getUser->last_name;
                                        $mailData['email']              = $getUser->email;
                                        $html                           = view('email-templates/change-password', $mailData);
                                        $this->sendMail($getUser->email, $subject, $html);
                                        // echo $html;die;
                                    // new password send mail
                                    $apiStatus          = TRUE;
                                    $apiMessage         = 'Password Updated Successfully !!!';
                                } else {
                                    $apiStatus          = FALSE;
                                    $apiMessage         = 'Current & New Password Should Not Be Same !!!';
                                }
                            } else {
                                $apiStatus          = FALSE;
                                $apiMessage         = 'New & Confirm Password Doesn\'t Matched !!!';
                            }
                        } else {
                            $apiStatus          = FALSE;
                            $apiMessage         = 'Current Password Doesn\'t Matched !!!';
                        }
                    } else {
                        $apiStatus          = FALSE;
                        $apiMessage         = 'User Not Found !!!';
                    }
                } else {
                    $apiStatus                      = FALSE;
                    $apiMessage                     = $getTokenValue['data'];
                }                                               
            } else {
                $apiStatus          = FALSE;
                $apiMessage         = 'Unauthenticate Request !!!';
            }
            $this->response_to_json($apiStatus, $apiMessage, $apiResponse);
        }
        public function updateProfile(Request $request)
        {
            $apiStatus          = TRUE;
            $apiMessage         = '';
            $apiResponse        = [];
            $this->isJSON(file_get_contents('php://input'));
            $requestData        = $this->extract_json(file_get_contents('php://input'));        
            $requiredFields     = ['first_name', 'last_name', 'email', 'phone'];
            if (!$this->validateArray($requiredFields, $requestData)){              
                $apiStatus          = FALSE;
                $apiMessage         = 'All Data Are Not Present !!!';
            }
            if($requestData['key'] == env('PROJECT_KEY')){
                $app_access_token           = $request->header('Authorization');
                $getTokenValue              = $this->tokenAuth($app_access_token);
                if($getTokenValue['status']){
                    $uId        = $getTokenValue['data'][1];
                    $expiry     = date('d/m/Y H:i:s', $getTokenValue['data'][4]);
                    $getUser    = User::where('id', '=', $uId)->first();
                    if($getUser){                        
                        $postData = [
                                    'first_name'            => $requestData['first_name'],
                                    'last_name'             => $requestData['last_name'],
                                    'phone'                 => $requestData['phone'],
                                ];
                        User::where('id', '=', $uId)->update($postData);
                        $apiStatus                  = TRUE;
                        $apiMessage                 = 'Profile Updated Successfully !!!';
                    } else {
                        $apiStatus          = FALSE;
                        $apiMessage         = 'User Not Found !!!';
                    }
                } else {
                    $apiStatus                      = FALSE;
                    $apiMessage                     = $getTokenValue['data'];
                }                                               
            } else {
                $apiStatus          = FALSE;
                $apiMessage         = 'Unauthenticate Request !!!';
            }
            $this->response_to_json($apiStatus, $apiMessage, $apiResponse);
        }
        public function uploadProfileImage(Request $request)
        {
            $apiStatus          = TRUE;
            $apiMessage         = '';
            $apiResponse        = [];
            // $requestData        = $request->all();
            $this->isJSON(file_get_contents('php://input'));
            $requestData        = $this->extract_json(file_get_contents('php://input'));
            // Helper::pr($requestData);
            if($requestData['key'] == env('PROJECT_KEY')){
                $app_access_token           = $request->header('Authorization');
                $getTokenValue              = $this->tokenAuth($app_access_token);
                if($getTokenValue['status']){
                    $uId        = $getTokenValue['data'][1];
                    $expiry     = date('d/m/Y H:i:s', $getTokenValue['data'][4]);
                    $getUser    = User::where('id', '=', $uId)->first();
                    if($getUser){
                        $profile_image  = $requestData['profile_image'];
                        if($profile_image != ''){
                            // $imageName      = $profile_image;
                            // $uploadedFile   = $this->upload_single_file('profile_image', $imageName, 'user', 'image', $profile_uri);
                            // Helper::pr($uploadedFile);
                            // if($uploadedFile['status']){
                            //     $profile_image = $uploadedFile['newFilename'];
                            // } else {
                            //     $profile_image = $getUser->profile_image;
                            // }
                            /* upload profile image */        
                                $upload_file    = $profile_image;        
                                // $img            = $upload_file['base64'];
                                $img            = str_replace('data:image/jpeg;base64,', '', $upload_file);
                                $img            = str_replace(' ', '+', $img);
                                $data           = base64_decode($img);
                                $fileName       = uniqid() . '.jpg';
                                $file           = 'public/uploads/user/' . $fileName;
                                $success        = file_put_contents($file, $data);
                                $profile_image  = $fileName;
                            /* upload profile image */
                        } else {
                            $profile_image = $getUser->profile_image;
                        }
                        $postData = [
                                    'profile_image'         => $profile_image
                                ];
                        // Helper::pr($postData);
                        User::where('id', '=', $uId)->update($postData);
                        $apiStatus                  = TRUE;
                        $apiMessage                 = 'Profile Image Uploaded Successfully !!!';
                    } else {
                        $apiStatus          = FALSE;
                        $apiMessage         = 'User Not Found !!!';
                    }
                } else {
                    $apiStatus                      = FALSE;
                    $apiMessage                     = $getTokenValue['data'];
                }                                               
            } else {
                $apiStatus          = FALSE;
                $apiMessage         = 'Unauthenticate Request !!!';
            }
            $this->response_to_json($apiStatus, $apiMessage, $apiResponse);
        }
    /* after login */

    /*
    Get http response code
    Author : Subhomoy
    */
    private function getResponseCode($code = NULL){
        if ($code !== NULL) {
            switch ($code) {
                case 100: $text = 'Continue'; break;
                case 101: $text = 'Switching Protocols'; break;
                case 200: $text = 'OK'; break;
                case 201: $text = 'Created'; break;
                case 202: $text = 'Accepted'; break;
                case 203: $text = 'Non-Authoritative Information'; break;
                case 204: $text = 'No Content'; break;
                case 205: $text = 'Reset Content'; break;
                case 206: $text = 'Partial Content'; break;
                case 300: $text = 'Multiple Choices'; break;
                case 301: $text = 'Moved Permanently'; break;
                case 302: $text = 'Moved Temporarily'; break;
                case 303: $text = 'See Other'; break;
                case 304: $text = 'Not Modified'; break;
                case 305: $text = 'Use Proxy'; break;
                case 400: $text = 'Unauthenticated Request !!!'; break;
                case 401: $text = 'Token Not Found !!!'; break;
                case 402: $text = 'Payment Required'; break;
                case 403: $text = 'Token Has Expired !!!'; break;
                case 404: $text = 'User Not Found !!!'; break;
                case 405: $text = 'Method Not Allowed'; break;
                case 406: $text = 'All Data Are Not Present !!!'; break;
                case 407: $text = 'Proxy Authentication Required'; break;
                case 408: $text = 'Request Time-out'; break;
                case 409: $text = 'Conflict'; break;
                case 410: $text = 'Gone'; break;
                case 411: $text = 'Length Required'; break;
                case 412: $text = 'Precondition Failed'; break;
                case 413: $text = 'Request Entity Too Large'; break;
                case 414: $text = 'Request-URI Too Large'; break;
                case 415: $text = 'Unsupported Media Type'; break;
                case 500: $text = 'Internal Server Error'; break;
                case 501: $text = 'Not Implemented'; break;
                case 502: $text = 'Bad Gateway'; break;
                case 503: $text = 'Service Unavailable'; break;
                case 504: $text = 'Gateway Time-out'; break;
                case 505: $text = 'HTTP Version not supported'; break;
                default:
                    exit('Unknown http status code "' . htmlentities($code) . '"');
                break;
            }
            $protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0');
            header($protocol . ' ' . $code . ' ' . $text);
            $GLOBALS['http_response_code'] = $code;
        } else {
            $code = (isset($GLOBALS['http_response_code']) ? $GLOBALS['http_response_code'] : 200);
            $text = '';
        }
        return $text;
    }
    /*
    Generate JWT tokens for authentication
    Author : Subhomoy
    */
    private static function generateToken($userId, $email, $phone){
        $token      = array(
            'id'                => $userId,
            'email'             => $email,
            'phone'             => $phone,
            'exp'               => time() + (30 * 24 * 60 * 60) // 30 days
        );
        // pr($token);
        return JWT::encode($token, TOKEN_SECRET, 'HS256');
    }
    /*
    Check Authentication
    Author : Subhomoy
    */
    private function tokenAuth($appAccessToken){
        $headers = apache_request_headers();
        if (isset($appAccessToken) && !empty($appAccessToken)) :
            $userdata = $this->matchToken($appAccessToken);
            // pr($userdata);
            if ($userdata['status']) :
                $checkToken =  UserDevice::where('user_id', '=', $userdata['data']->id)->where('app_access_token', '=', $appAccessToken)->first();
                // echo $this->db->last_query();
                // pr($userdata);
                if (!empty($checkToken)) :
                    if ($userdata['data']->exp && $userdata['data']->exp > time()) :
                        $tokenStatus = array(TRUE, $userdata['data']->id, $userdata['data']->email, $userdata['data']->phone, $userdata['data']->exp);
                    else :
                        $tokenStatus = array(FALSE, 'Token Has Expired 1 !!!');
                    endif;
                else :
                    $tokenStatus = array(FALSE, 'Token Has Expired 2 !!!');
                endif;
            else :
                $tokenStatus = array(FALSE, 'Token Not Found !!!');
            endif;
        else :
            $tokenStatus = array(FALSE, 'Token Not Found In Request !!!');
        endif;
        if ($tokenStatus[0]) :
            $this->userId           = $tokenStatus[1];
            $this->userEmail        = $tokenStatus[2];
            $this->userMobile       = $tokenStatus[3];
            $this->userExpiry       = $tokenStatus[4];
            // pr($tokenStatus);
            return array('status' => TRUE, 'data' => $tokenStatus);
        else :
            return array('status' => FALSE, 'data' => $tokenStatus[1]);
            // $this->response_to_json(FALSE, $tokenStatus[1]);
        endif;
    }
    /*
    Match JWT token with user token saved in database
    Author : Subhomoy
    */
    private static function matchToken($token){
        // try{
        //     // $decoded    = JWT::decode($token, TOKEN_SECRET, 'HS256');
        //     $decoded    = JWT::decode($token, new Key(TOKEN_SECRET, 'HS256'));
        //     // pr($decoded);
        // } catch (\Exception $e) {
        //     //echo 'Caught exception: ',  $e->getMessage(), "\n";
        //     return array('status' => FALSE, 'data' => '');
        // }
        
        // return array('status' => TRUE, 'data' => $decoded);


        try{
            $key = "1234567890qwertyuiopmnbvcxzasdfghjkl";
            $decoded = JWT::decode($token, $key, array('HS256'));
            // $decodedData = (array) $decoded;
        } catch (\Exception $e) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            return array('status' => FALSE, 'data' => '');
        }
        return array('status' => TRUE, 'data' => $decoded);
    }
}
