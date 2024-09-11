<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\JournalFrequency;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\GeneralSetting;
use App\Models\ExpertiseArea;
use Auth;
use Session;
use Helper;
use Hash;

class ExpertiseAreaController extends Controller
{
    public function __construct()
    {
        $this->data = array(
            'title'             => 'Expertise Area',
            'controller'        => 'ExpertiseAreaController',
            'controller_route'  => 'expertise_area',
            'primary_key'       => 'id',
        );
    }
    /* list */
    public function list()
    {
        $data['module']                 = $this->data;
        $title                          = $this->data['title'] . ' List';
        $page_name                      = 'expertise_area.list';
        $data['rows']                   = ExpertiseArea::where('status', '!=', 3)->orderBy('id', 'DESC')->get();

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
                $checkValue = ExpertiseArea::where('name', '=', $postData['name'])->count();
                if ($checkValue <= 0) {                    
                    $fields = [
                        'name'                      => $postData['name'],                        
                    ];
                    ExpertiseArea::insert($fields);
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
        $page_name                      = 'expertise_area.add-edit';
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
        $page_name                      = 'expertise_area.add-edit';
        $data['row']                    = ExpertiseArea::where($this->data['primary_key'], '=', $id)->first();        

        if ($request->isMethod('post')) {
            $postData = $request->all();
            $rules = [
                'name'                      => 'required',              
            ];
            if ($this->validate($request, $rules)) {
                $checkValue = ExpertiseArea::where('name', '=', $postData['name'])->where('id', '!=', $id)->count();
                if ($checkValue <= 0) {                    
                    $fields = [
                        'name'                      => $postData['name'],                        
                    ];
                    ExpertiseArea::where($this->data['primary_key'], '=', $id)->update($fields);
                    return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' Updated Successfully !!!');
                } else {
                    return redirect()->back()->with('error_message', $this->data['title'] . ' Already Exists !!!');
                }
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
        ExpertiseArea::where($this->data['primary_key'], '=', $id)->update($fields);
        return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' Deleted Successfully !!!');
    }
    /* delete */
    /* change status */
    public function change_status(Request $request, $id)
    {
        $id                             = Helper::decoded($id);
        $model                          = ExpertiseArea::find($id);
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
}
