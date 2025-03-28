<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\JournalFrequency;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\GeneralSetting;
use App\Models\Project;
use Auth;
use Session;
use Helper;
use Hash;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->data = array(
            'title'             => 'Project',
            'controller'        => 'ProjectController',
            'controller_route'  => 'projects',
            'primary_key'       => 'id',
        );
    }
    /* list */
    public function list()
    {
        $data['module']                 = $this->data;
        $title                          = $this->data['title'] . ' List';
        $page_name                      = 'projects.list';
        $data['rows']                   = Project::where('status', '!=', 3)->orderBy('id', 'DESC')->get();

        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
    /* list */
    /* add */
    public function add(Request $request)
    {
        $data['module']           = $this->data;
        if ($request->isMethod('post')) {
            $postData = $request->all();
            $rules = [
                'name'                      => 'required',               
            ];
            if ($this->validate($request, $rules)) {
                $checkValue = Project::where('name', '=', $postData['name'])->count();
                if ($checkValue <= 0) {                    
                    $fields = [
                        'name'                      => $postData['name'],
                        'created_at'                => date('Y-m-d H:i:s'),
                    ];
                    Project::insert($fields);
                    return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' inserted successfully');
                } else {
                    return redirect()->back()->with('error_message', $this->data['title'] . ' already exists');
                }
            } else {
                return redirect()->back()->with('error_message', 'All eields eequired');
            }
        }
        $data['module']                 = $this->data;
        $title                          = $this->data['title'] . ' Add';        
        $page_name                      = 'projects.add-edit';
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
        $page_name                      = 'projects.add-edit';
        $data['row']                    = Project::where($this->data['primary_key'], '=', $id)->first();        

        if ($request->isMethod('post')) {
            $postData = $request->all();
            $rules = [
                'name'                      => 'required',              
            ];
            if ($this->validate($request, $rules)) {
                $checkValue = Project::where('name', '=', $postData['name'])->where('id', '!=', $id)->count();
                if ($checkValue <= 0) {                    
                    $fields = [
                        'name'                      => $postData['name'],
                        'updated_at'                => date('Y-m-d H:i:s'),
                    ];
                    Project::where($this->data['primary_key'], '=', $id)->update($fields);
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
        Project::where($this->data['primary_key'], '=', $id)->update($fields);
        return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' deleted successfully');
    }
    /* delete */
    /* change status */
    public function change_status(Request $request, $id)
    {
        $id                             = Helper::decoded($id);
        $model                          = Project::find($id);
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
}
