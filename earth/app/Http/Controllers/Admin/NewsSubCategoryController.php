<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\JournalFrequency;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Models\GeneralSetting;
use App\Models\NewsCategory;
use Auth;
use Session;
use Helper;
use Hash;

class NewsSubCategoryController extends Controller
{
    public function __construct()
    {
        $this->data = array(
            'title'             => 'Sub Category',
            'controller'        => 'NewsSubCategoryController',
            'controller_route'  => 'news_subcategory',
            'primary_key'       => 'id',
        );
    }
    /* list */
    public function list()
    {       
        $data['module']                 = $this->data;
        $title                          = $this->data['title'] . ' List';
        $page_name                      = 'news_subcategory.list';
        $data['rows']                   = NewsCategory::where('status', '!=', 3)->where('parent_category', '!=', 0)->orderBy('id', 'DESC')->get();        
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
                'parent_category'                   => 'required',                               
                'sub_category'                      => 'required',
                'short_description'                 => 'required',
            ];
            if ($this->validate($request, $rules)) {
                $checkValue = NewsCategory::where('sub_category', '=', $postData['sub_category'])->count();
                if ($checkValue <= 0) { 
                    // Generate a unique slug
                    $slug = Str::slug($postData['sub_category']);                   
                    $fields = [
                        'sub_category'              => $postData['sub_category'],                       
                        'parent_category'           => $postData['parent_category'],
                        'short_description'         => $postData['short_description'],
                        'slug'                      => $slug,
                    ];
                    // Helper::pr($fields);
                    NewsCategory::insert($fields);
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
        $page_name                      = 'news_subcategory.add-edit';
        $data['row']                    = [];
        $data['parent_category']        = NewsCategory::where('status', '!=', 3)->where('parent_category', '=', 0)->orderBy('id', 'DESC')->get();
        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
    /* add */
    /* edit */
    public function edit(Request $request, $id)
    {
        $data['module']                 = $this->data;
        $id                             = Helper::decoded($id);
        $title                          = $this->data['title'] . ' Update';
        $page_name                      = 'news_subcategory.add-edit';
        $data['row']                    = NewsCategory::where($this->data['primary_key'], '=', $id)->first();   
        $data['parent_category']        = NewsCategory::where('status', '!=', 3)->where('parent_category', '=', 0)->orderBy('id', 'DESC')->get();     

        if ($request->isMethod('post')) {
            $postData = $request->all();
            $rules = [
                'parent_category'                   => 'required',                               
                'sub_category'                      => 'required',
                'short_description'                 => 'required',
            ];
            if ($this->validate($request, $rules)) {
                // $checkValue = NewsCategory::where('sub_category', '=', $postData['sub_category'])->count();
                // if ($checkValue <= 0) { 
                    // Generate a unique slug
                    $slug = Str::slug($postData['sub_category']);                   
                    $fields = [
                        'sub_category'              => $postData['sub_category'],                       
                        'parent_category'           => $postData['parent_category'],
                        'short_description'         => $postData['short_description'],
                        'slug'                      => $slug,
                    ];
                    NewsCategory::where($this->data['primary_key'], '=', $id)->update($fields);
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
        NewsCategory::where($this->data['primary_key'], '=', $id)->update($fields);
        return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' Deleted Successfully !!!');
    }
    /* delete */
    /* change status */
    public function change_status(Request $request, $id)
    {
        $id                             = Helper::decoded($id);
        $model                          = NewsCategory::find($id);
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
        $model                          = Notice::find($id);
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
