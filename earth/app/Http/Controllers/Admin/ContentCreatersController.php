<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Models\Admin\Country;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Rules\MaxWords;
use App\Models\GeneralSetting;
use App\Models\User;
use App\Models\Country;
use App\Models\Role;
use App\Models\SectionErt;
use App\Models\Title;
use App\Models\Pronoun;
use App\Models\EcosystemAffiliation;
use App\Models\ExpertiseArea;
use App\Models\NewsCategory;
use App\Models\SubmissionType;
use App\Models\UserClassification;
use App\Models\UserProfile;
use Auth;
use Session;
use Helper;
use Hash;

class ContentCreatersController extends Controller
{
    public function __construct()
    {
        $this->data = array(
            'title'             => 'Content Creaters',
            'controller'        => 'ContentCreatersController',
            'controller_route'  => 'content_creaters',
            'primary_key'       => 'id',
        );
    }
    /* list */
    public function list()
    {
        $data['module']                 = $this->data;
        $title                          = $this->data['title'] . ' List';
        $page_name                      = 'content_creaters.list';
        // $data['rows']                   = User::where('status', '!=', 3)->orderBy('id', 'DESC')->get();
        $data['rows']                   = User::where('status', '!=', 3)->where('role', '=', 2)->orderBy('id', 'DESC')->with('role_id:id,name', 'country_id:id,name')->get();        
        // $data['role']                   = $data['rows']->users;
        // Helper::pr($data['rows']);
        //   dd( $data['rows'] );

        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
    /* list */
    /* add */
    public function add(Request $request)
    {
        $data['module']           = $this->data;
        if ($request->isMethod('post')) {
            $postData = $request->all();
            // dd($postData);
            $rules = [                                 
                'first_name'                => 'required',            
                'last_name'                 => 'required',                                    
                'email'                     => 'required',                                      
                'country'                   => 'required',                                     
                'password'                  => 'required', 
                // 'invited'                   => 'required',
                // 'invited_by'                => 'required', 
                // 'invited_by_email'          => 'required',                     
                // 'section_ert'               => 'required',
                // 'title'                     => 'required',
                // 'pronoun'                   => 'required',
                // 'participated'              => 'required',
                // 'participated_info'         => 'required',
                // 'organization_name'         => 'required',
                // 'organization_website'      => 'required',
                // 'ecosystem_affiliation'     => 'required',               
                // 'expertise_area'            => 'required',                
                // 'explanation'               => ['required', 'string', new MaxWords(100)],
                // 'explanation_submission'    => ['required', 'string', new MaxWords(150)],
                // 'bio_short'                 => ['required', 'string', new MaxWords(40)],
                // 'bio_long'                  => ['required', 'string', new MaxWords(250)],            
            ];
            if ($this->validate($request, $rules)) {
                //  dd($postData);
                $checkValue = User::where('first_name', '=', $postData['first_name'])->count();
                if ($checkValue <= 0) {                    
                    $fields = [                        
                        'first_name'                => $postData['first_name'],            
                        'last_name'                 => $postData['last_name'],        
                        'middle_name'               => $postData['middle_name'],            
                        'email'                     => $postData['email'],           
                        // 'phone'                     => $postData['phone'],           
                        'country'                   => $postData['country'],           
                        'role'                      => 2,           
                        'password'                  => Hash::make($postData['password']), 
                        // 'invited'                   => $postData['invited'],
                        // 'invited_by'                => $postData['invited_by'], 
                        // 'invited_by_email'          => $postData['invited_by_email'],  
                        // 'explanation'               => $postData['explanation'],  
                        // 'explanation_submission'    => $postData['explanation_submission'],     
                        // 'section_ertId'             => $postData['section_ert'],
                        // 'titleId'                   => $postData['title'],
                        // 'pronounId'                 => $postData['pronoun'],
                        // 'participated'              => $postData['participated'],
                        // 'participated_info'         => $postData['participated_info'],
                        // 'organization_name'         => $postData['organization_name'],
                        // 'organization_website'      => $postData['organization_website'],
                        // 'ecosystem_affiliationId'   => json_encode($postData['ecosystem_affiliation']),
                        // 'indigenous_affiliation'    => $postData['indigenous_affiliation'],
                        // 'expertise_areaId'          => json_encode($postData['expertise_area']),
                        // 'bio_short'               => $postData['bio_short'],
                        // 'bio_long'               => $postData['bio_long'],             
                    ];
                    //  dd($fields);
                    //  Helper::pr($fields);
                    User::insert($fields);
                    return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' Inserted Successfully !!!');
                } else {
                    return redirect()->back()->with('error_message', $this->data['title'] . ' Already Exists !!!');
                }
            } else {
                return redirect()->back()->with('error_message', 'All Fields Required !!!');
            }
        }
        $data['module']                 = $this->data;
        $title                          = $this->data['title'] . ' Add';
        $data['country']                = Country::orderBy('name', 'ASC')->get();
        $data['role']                   = Role::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['section_ert']            = SectionErt::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['user_title']             = Title::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['pronoun']                = Pronoun::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['ecosystem_affiliation']  = EcosystemAffiliation::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['expertise_area']         = ExpertiseArea::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        // Helper::pr($data['country']);
        $page_name                      = 'content_creaters.add-edit';
        $data['row']                    = [];
        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
    /* add */
    /* edit */
    public function edit(Request $request, $id)
    {
        $data['module']                 = $this->data;
        $user_id                            = Helper::decoded($id);
        $title                          = $this->data['title'] . ' Update';
        $page_name                      = 'content_creaters.add-edit';
        // $data['row']                    = User::where($this->data['primary_key'], '=', $id)->first();
        // $data['country']                = Country::orderBy('name', 'ASC')->get();
        // $data['role']                   = Role::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        // $data['section_ert']            = SectionErt::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        // $data['user_title']             = Title::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        // $data['pronoun']                = Pronoun::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        // $data['ecosystem_affiliation']  = EcosystemAffiliation::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        // $data['expertise_area']         = ExpertiseArea::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        // $data['selected_ecosystem_affiliation'] = json_decode($data['row']->ecosystem_affiliationId);
        // $data['selected_expertise_area'] = json_decode($data['row']->expertise_areaId);
        //  Helper::pr($data['selected_ecosystem_affiliation']);

        $data['classification']         = UserClassification::where('user_id', '=', $user_id)->first();
        // Helper::pr($data['classification']);
        $data['section_ert']            = SectionErt::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['news_category']          = NewsCategory::where('status', '=', 1)->where('parent_category', '=', 0)->orderBy('sub_category', 'ASC')->get();        
        $data['user_title']             = Title::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['submission_type']        = SubmissionType::where('status', '=', 1)->get(); 
        $data['country']                = Country::orderBy('name', 'ASC')->get();
        $data['pronoun']                = Pronoun::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['ecosystem_affiliation']  = EcosystemAffiliation::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['expertise_area']         = ExpertiseArea::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['row']                    = UserProfile::where('user_id', '=', $user_id)->first();



        if ($request->isMethod('post')) {
            $postData = $request->all();
            $rules = [                                 
                // 'first_name'                => 'required',            
                // 'last_name'                 => 'required',                                    
                // 'email'                     => 'required',           
                // 'phone'                     => 'required',           
                // 'country'                   => 'required',                                      
                // 'password'                  => 'required', 
                // 'invited'                   => 'required',
                // 'invited_by'                => 'required', 
                // 'invited_by_email'          => 'required',                     
                // 'section_ert'               => 'required',
                // 'title'                     => 'required',
                // 'pronoun'                   => 'required',
                // 'participated'              => 'required',
                // 'participated_info'         => 'required',
                // 'organization_name'         => 'required',
                // 'organization_website'      => 'required',
                // 'ecosystem_affiliation'     => 'required',               
                // 'expertise_area'            => 'required',                
                // 'explanation'               => ['required', 'string', new MaxWords(100)],
                // 'explanation_submission'    => ['required', 'string', new MaxWords(150)],
                // 'bio_short'                 => ['required', 'string', new MaxWords(40)],
                // 'bio_long'                  => ['required', 'string', new MaxWords(250)],   
                
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
                // $checkValue = User::where('first_name', '=', $postData['first_name'])->where('id', '!=', $id)->count();
                // if ($checkValue <= 0) {                    
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
                        'first_name'                => $postData['first_name'],            
                        'last_name'                 => $postData['last_name'],        
                        'middle_name'               => $postData['middle_name'],            
                        'email'                     => $postData['email'],                                           
                        'country'                   => $postData['country'],                                   
                        'password'                  => Hash::make($postData['password']), 
                    ];
                    User::where($this->data['primary_key'], '=', $user_id)->update($fields2);
                    UserProfile::where('user_id', '=', $user_id)->update($fields);
                    return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' Updated Successfully !!!');
                // } else {
                //     return redirect()->back()->with('error_message', $this->data['title'] . ' Already Exists !!!');
                // }
            } else {
                return redirect()->back()->with('error_message', 'All Fields Required !!!');
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
        User::where($this->data['primary_key'], '=', $id)->update($fields);
        return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' Deleted Successfully !!!');
    }
    /* delete */
    /* change status */
    public function change_status(Request $request, $id)
    {
        $id                             = Helper::decoded($id);
        $model                          = User::find($id);
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
        $model                          = User::find($id);
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
}
