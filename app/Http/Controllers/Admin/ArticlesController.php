<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\JournalFrequency;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\GeneralSetting;
use App\Models\Article;
use Auth;
use Session;
use Helper;
use Hash;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->data = array(
            'title'             => 'Articles',
            'controller'        => 'ArticlesController',
            'controller_route'  => 'article',
            'primary_key'       => 'id',
        );
    }
    /* list */
    public function list()
    {
        $data['module']                 = $this->data;
        $title                          = $this->data['title'] . ' List';
        $page_name                      = 'article.list';
        $data['rows']                   = Article::where('status', '!=', 3)->orderBy('id', 'DESC')->get();

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
                'article_year'               => 'required',
                'uploaded_by'               => 'required',
                'article_date'               => 'required',
                'article_file'               => 'required',
                'is_archieve'               => 'required',
            ];
            if ($this->validate($request, $rules)) {
                $checkValue = Article::where('name', '=', $postData['name'])->count();
                if ($checkValue <= 0) {
                    /* Article file */
                    $imageFile      = $request->file('article_file');
                    if ($imageFile != '') {
                        $imageName      = $imageFile->getClientOriginalName();
                        $uploadedFile   = $this->upload_single_file('article_file', $imageName, 'article', 'pdf');
                        if ($uploadedFile['status']) {
                            $article_file = $uploadedFile['newFilename'];
                        } else {
                            return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                        }
                    } else {
                        return redirect()->back()->with(['error_message' => 'Please Upload Article File !!!']);
                    }
                    /* Article file */
                    $fields = [
                        'name'                      => $postData['name'],
                        'publisher_name'            => $postData['publisher_name'],
                        'issn_no'                   => $postData['issn_no'],
                        'volume'                    => $postData['volume'],
                        'issue'                     => $postData['issue'],
                        'frequency'                 => $postData['frequency'],
                        'keywords'                  => $postData['keywords'],
                        'description'               => $postData['description'],
                        'article_year'               => $postData['article_year'],
                        'uploaded_by'               => $postData['uploaded_by'],
                        'article_date'               => date_format(date_create($postData['article_date']), "Y-m-d"),
                        'article_file'               => $article_file,
                        'is_archieve'               => $postData['is_archieve'],
                    ];
                    Article::insert($fields);
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
        $data['frequency']              = JournalFrequency::where('status', '=', 1)->orderBy('name', 'DESC')->get();
        $page_name                      = 'article.add-edit';
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
        $page_name                      = 'article.add-edit';
        $data['row']                    = Article::where($this->data['primary_key'], '=', $id)->first();
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
                'article_year'               => 'required',
                'uploaded_by'               => 'required',
                'article_date'               => 'required',
                'is_archieve'               => 'required',
            ];
            if ($this->validate($request, $rules)) {
                $checkValue = Article::where('name', '=', $postData['name'])->where('id', '!=', $id)->count();
                if ($checkValue <= 0) {
                    /* Article file */
                    $imageFile      = $request->file('article_file');
                    if ($imageFile != '') {
                        $imageName      = $imageFile->getClientOriginalName();
                        $uploadedFile   = $this->upload_single_file('article_file', $imageName, 'article', 'pdf');
                        if ($uploadedFile['status']) {
                            $article_file = $uploadedFile['newFilename'];
                        } else {
                            return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                        }
                    } else {
                        $article_file = $data['row']->article_file;
                    }
                    /* Article file */
                    $fields = [
                        'name'                      => $postData['name'],
                        'publisher_name'            => $postData['publisher_name'],
                        'issn_no'                   => $postData['issn_no'],
                        'volume'                    => $postData['volume'],
                        'issue'                     => $postData['issue'],
                        'frequency'                 => $postData['frequency'],
                        'keywords'                  => $postData['keywords'],
                        'description'               => $postData['description'],
                        'article_year'               => $postData['article_year'],
                        'uploaded_by'               => $postData['uploaded_by'],
                        'article_date'               => date_format(date_create($postData['article_date']), "Y-m-d"),
                        'article_file'               => $article_file,
                        'is_archieve'               => $postData['is_archieve'],
                    ];
                    Article::where($this->data['primary_key'], '=', $id)->update($fields);
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
        Article::where($this->data['primary_key'], '=', $id)->update($fields);
        return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' Deleted Successfully !!!');
    }
    /* delete */
    /* change status */
    public function change_status(Request $request, $id)
    {
        $id                             = Helper::decoded($id);
        $model                          = Article::find($id);
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
    public function change_status_accept($id)
    {
        // dd($id);
        $id                             = Helper::decoded($id);
        $model                          = Article::find($id);
        $fields = [
            'is_published' => 1,
        ];
                   
        $msg            = 'Accept';        
        // $model->save();
        Article::where($this->data['primary_key'], '=', $id)->update($fields);
        return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' ' . $msg . ' Successfully !!!');
    }
    public function change_status_reject($id)
    {
        // dd($id);
        $id                             = Helper::decoded($id);
        $model                          = Article::find($id);
        $fields = [
            'is_published' => 2,
        ];
                   
        $msg            = 'Reject';        
        // $model->save();
        Article::where($this->data['primary_key'], '=', $id)->update($fields);
        return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' ' . $msg . ' Successfully !!!');
    }
    /* change archieve status */
}
