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
use Auth;
use Session;
use Helper;
use Hash;

class EditorsController extends Controller
{
    public function __construct()
    {
        $this->data = array(
            'title'             => 'Editors',
            'controller'        => 'EditorsController',
            'controller_route'  => 'editors',
            'primary_key'       => 'id',
        );
    }
    /* list */
    public function list()
    {
        $data['module']                 = $this->data;
        $title                          = $this->data['title'] . ' List';
        $page_name                      = 'editors.list';
        // $data['rows']                   = User::where('status', '!=', 3)->orderBy('id', 'DESC')->get();
        $data['rows']                   = User::where('status', '!=', 3)->where('role', '=', 3)->orderBy('id', 'DESC')->with('role_id:id,name', 'country_id:id,name')->get();        
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
                'phone'                     => 'required',           
                'country'                   => 'required',                           
                'password'                  => 'required',                         
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
                        'phone'                     => $postData['phone'],           
                        'country'                   => $postData['country'],           
                        'role'                      => 3,           
                        'password'                  => Hash::make($postData['password']),                         
                    ];
                    //  dd($fields);
                    //  Helper::pr($fields);
                    User::insert($fields);
                    return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' inserted successfully');
                } else {
                    return redirect()->back()->with('error_message', $this->data['title'] . ' already exists');
                }
            } else {
                return redirect()->back()->with('error_message', 'All fields required');
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
        $page_name                      = 'editors.add-edit';
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
        $page_name                      = 'editors.add-edit';
        $data['row']                    = User::where($this->data['primary_key'], '=', $id)->first();
        $data['country']                = Country::orderBy('name', 'ASC')->get();
        $data['role']                   = Role::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['section_ert']            = SectionErt::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['user_title']             = Title::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['pronoun']                = Pronoun::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['ecosystem_affiliation']  = EcosystemAffiliation::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['expertise_area']         = ExpertiseArea::where('status', '=', 1)->orderBy('name', 'ASC')->get();

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
                $checkValue = User::where('first_name', '=', $postData['first_name'])->where('id', '!=', $id)->count();
                if ($checkValue <= 0) {                    
                    $fields = [                        
                        'first_name'                => $postData['first_name'],            
                        'last_name'                 => $postData['last_name'],        
                        'middle_name'               => $postData['middle_name'],            
                        'email'                     => $postData['email'],           
                        'phone'                     => $postData['phone'],           
                        'country'                   => $postData['country'],           
                        'role'                      => 3,           
                        'password'                  => Hash::make($postData['password']),                        
                    ];
                    User::where($this->data['primary_key'], '=', $id)->update($fields);
                    return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' updated successfully');
                } else {
                    return redirect()->back()->with('error_message', $this->data['title'] . ' already exists');
                }
            } else {
                return redirect()->back()->with('error_message', 'All fields required');
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
        return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' deleted successfully');
    }
    /* delete */
    /* change status */
    public function change_status(Request $request, $id)
    {
        $id                             = Helper::decoded($id);
        $model                          = User::find($id);
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
    public function change_archieve_status(Request $request, $id)
    {
        $id                             = Helper::decoded($id);
        $model                          = User::find($id);
        if ($model->is_archieve == 1) {
            $model->is_archieve  = 0;
            $msg            = 'moved to current list';
        } else {
            $model->is_archieve  = 1;
            $msg            = 'moved to archieve list';
        }
        $model->save();
        return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' ' . $msg . ' successfully');
    }
    /* change archieve status */
}
