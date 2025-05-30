<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\JournalFrequency;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\GeneralSetting;
use App\Models\Subscriber;
use Auth;
use Session;
use Helper;
use Hash;

class SubscriberController extends Controller
{
    public function __construct()
    {
        $this->data = array(
            'title'             => 'Subscribers',
            'controller'        => 'SubscriberController',
            'controller_route'  => 'subscriber',
            'primary_key'       => 'id',
        );
    }
    /* list */
    public function list()
    {
        $data['module']                 = $this->data;
        $title                          = $this->data['title'] . ' List';
        $page_name                      = 'subscribers.list';
        $data['rows']                   = Subscriber::where('status', '!=', 3)->orderBy('id', 'DESC')->get();

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
                'publisher_name'            => 'required',
                'issn_no'                   => 'required',
                'volume'                    => 'required',
                'issue'                     => 'required',
                'frequency'                 => 'required',
                'keywords'                  => 'required',
                'description'               => 'required',
                'notice_year'               => 'required',
                'uploaded_by'               => 'required',
                'notice_date'               => 'required',
                'notice_file'               => 'required',
                'is_archieve'               => 'required',
            ];
            if ($this->validate($request, $rules)) {
                $checkValue = Notice::where('name', '=', $postData['name'])->count();
                if ($checkValue <= 0) {
                    /* notice file */
                    $imageFile      = $request->file('notice_file');
                    if ($imageFile != '') {
                        $imageName      = $imageFile->getClientOriginalName();
                        $uploadedFile   = $this->upload_single_file('notice_file', $imageName, 'notice', 'pdf');
                        if ($uploadedFile['status']) {
                            $notice_file = $uploadedFile['newFilename'];
                        } else {
                            return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                        }
                    } else {
                        return redirect()->back()->with(['error_message' => 'Please upload notice file']);
                    }
                    /* notice file */
                    $fields = [
                        'name'                      => $postData['name'],
                        'publisher_name'            => $postData['publisher_name'],
                        'issn_no'                   => $postData['issn_no'],
                        'volume'                    => $postData['volume'],
                        'issue'                     => $postData['issue'],
                        'frequency'                 => $postData['frequency'],
                        'keywords'                  => $postData['keywords'],
                        'description'               => $postData['description'],
                        'notice_year'               => $postData['notice_year'],
                        'uploaded_by'               => $postData['uploaded_by'],
                        'notice_date'               => date_format(date_create($postData['notice_date']), "Y-m-d"),
                        'notice_file'               => $notice_file,
                        'is_archieve'               => $postData['is_archieve'],
                    ];
                    Notice::insert($fields);
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
        $data['frequency']              = JournalFrequency::where('status', '=', 1)->orderBy('name', 'DESC')->get();
        $page_name                      = 'notice.add-edit';
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
        $page_name                      = 'notice.add-edit';
        $data['row']                    = Notice::where($this->data['primary_key'], '=', $id)->first();
        $data['frequency']              = JournalFrequency::where('status', '=', 1)->orderBy('name', 'DESC')->get();

        if ($request->isMethod('post')) {
            $postData = $request->all();
            $rules = [
                'name'                      => 'required',
                'publisher_name'            => 'required',
                'issn_no'                   => 'required',
                'volume'                    => 'required',
                'issue'                     => 'required',
                'frequency'                 => 'required',
                'keywords'                  => 'required',
                'description'               => 'required',
                'notice_year'               => 'required',
                'uploaded_by'               => 'required',
                'notice_date'               => 'required',
                'is_archieve'               => 'required',
            ];
            if ($this->validate($request, $rules)) {
                $checkValue = Notice::where('name', '=', $postData['name'])->where('id', '!=', $id)->count();
                if ($checkValue <= 0) {
                    /* notice file */
                    $imageFile      = $request->file('notice_file');
                    if ($imageFile != '') {
                        $imageName      = $imageFile->getClientOriginalName();
                        $uploadedFile   = $this->upload_single_file('notice_file', $imageName, 'notice', 'pdf');
                        if ($uploadedFile['status']) {
                            $notice_file = $uploadedFile['newFilename'];
                        } else {
                            return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                        }
                    } else {
                        $notice_file = $data['row']->notice_file;
                    }
                    /* notice file */
                    $fields = [
                        'name'                      => $postData['name'],
                        'publisher_name'            => $postData['publisher_name'],
                        'issn_no'                   => $postData['issn_no'],
                        'volume'                    => $postData['volume'],
                        'issue'                     => $postData['issue'],
                        'frequency'                 => $postData['frequency'],
                        'keywords'                  => $postData['keywords'],
                        'description'               => $postData['description'],
                        'notice_year'               => $postData['notice_year'],
                        'uploaded_by'               => $postData['uploaded_by'],
                        'notice_date'               => date_format(date_create($postData['notice_date']), "Y-m-d"),
                        'notice_file'               => $notice_file,
                        'is_archieve'               => $postData['is_archieve'],
                    ];
                    Notice::where($this->data['primary_key'], '=', $id)->update($fields);
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
        Subscriber::where($this->data['primary_key'], '=', $id)->update($fields);
        return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' deleted successfully');
    }
    /* delete */
    /* change status */
    public function change_status(Request $request, $id)
    {
        $id                             = Helper::decoded($id);
        $model                          = Subscriber::find($id);
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
        $model                          = Notice::find($id);
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
