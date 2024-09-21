<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper as HelpersHelper;
use App\Http\Controllers\Controller;
use App\Models\Admin\JournalFrequency;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\GeneralSetting;
use App\Rules\MaxWords;
use App\Models\Article;
use App\Models\SectionErt;
use App\Models\Title;
use App\Models\Pronoun;
use App\Models\EcosystemAffiliation;
use App\Models\ExpertiseArea;
use App\Models\SubmissionType;
use App\Models\Country;
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
            // dd($postData);
            if ($postData['invited'] == 'No' && $postData['participated'] == 'No') {
                // echo "this section"; die;
                $rules = [
                    'first_name'                => 'required',            
                    'last_name'                 => 'required',                                    
                    'email'                     => 'required',                                      
                    'for_publication_name'      => 'required',                                      
                    'orginal_work'              => 'required',                                     
                    'copyright'                 => 'required',                     
                    'title'                     => 'required',
                    'pronoun'                   => 'required',                   
                ];
                $participatedInfo = isset($postData['participated_info']) ? $postData['participated_info'] : '';
                $invited_byInfo = isset($postData['invited_by']) ? $postData['invited_by'] : '';
                $invited_emailInfo = isset($postData['invited_by_email']) ? $postData['invited_by_email'] : '';
                $section_ertInfo = isset($postData['section_ert']) ? json_encode($postData['section_ert']) : '';
                $expertise_areaInfo = isset($postData['expertise_area']) ? json_encode($postData['expertise_area']) : '';
                $ecosystem_affiliationInfo = isset($postData['ecosystem_affiliation']) ? json_encode($postData['ecosystem_affiliation']) : '';
                $submission_typesInfo = isset($postData['submission_types']) ? $postData['submission_types'] : '';
                $narrative_fileInfo = isset($narrative_file) ? $narrative_file : '';    
                $first_image_fileInfo = isset($first_image_file) ? $first_image_file : '';    
                $second_image_fileInfo = isset($second_image_file) ? $second_image_file : '';    
                $art_image_fileInfo = isset($art_image_file) ? $art_image_file : '';    
                $art_video_fileInfo = isset($art_video_file) ? $art_video_file : ''; 
            } else{
                
                    $rules = [
                'first_name'                => 'required',            
                'last_name'                 => 'required',                                    
                'email'                     => 'required',                                      
                'country'                   => 'required',                                     
                'for_publication_name'      => 'required', 
                'orginal_work'              => 'required', 
                'copyright'                 => 'required', 
                'submission_types'          => 'required',                
                'state'                     => 'required', 
                'city'                      => 'required', 
                'acknowledge'               => 'required',                                                      
                'section_ert'               => 'required',
                'title'                     => 'required',
                'pronoun'                   => 'required',                
                'organization_name'         => 'required',
                'organization_website'      => 'required',
                'ecosystem_affiliation'     => 'required',               
                'expertise_area'            => 'required',                
                'explanation'               => ['required', 'string', new MaxWords(100)],
                'explanation_submission'    => ['required', 'string', new MaxWords(150)],
                'art_video_desc'            => ['required', 'string', new MaxWords(250)],
                'creative_Work'             => ['required', 'string', new MaxWords(10)],
                'subtitle'                  => ['required', 'string', new MaxWords(40)],
                'art_image_desc'            => ['required', 'string', new MaxWords(250)],
                'bio_short'                 => ['required', 'string', new MaxWords(40)],
                'bio_long'                  => ['required', 'string', new MaxWords(250)], 
                ];                                    
                /* narrative file */
                    $imageFile      = $request->file('narrative_file');
                    if ($imageFile != '') {
                        $imageName      = $imageFile->getClientOriginalName();
                        $uploadedFile   = $this->upload_single_file('narrative_file', $imageName, 'narrative', 'image');
                        if ($uploadedFile['status']) {
                            $narrative_file = $uploadedFile['newFilename'];
                        } else {
                            return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                        }
                    } else {
                        return redirect()->back()->with(['error_message' => 'Please Upload narrative File !!!']);
                    }
                /* narrative file */
                /* first_image file */
                    $imageFile      = $request->file('first_image_file');
                    if ($imageFile != '') {
                        $imageName      = $imageFile->getClientOriginalName();
                        $uploadedFile   = $this->upload_single_file('first_image_file', $imageName, 'narrative', 'image');
                        if ($uploadedFile['status']) {
                            $first_image_file = $uploadedFile['newFilename'];
                        } else {
                            return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                        }
                    } else {
                        return redirect()->back()->with(['error_message' => 'Please Upload first_image File !!!']);
                    }
                /* first_image file */
                /* second_image file */
                    $imageFile      = $request->file('second_image_file');
                    if ($imageFile != '') {
                        $imageName      = $imageFile->getClientOriginalName();
                        $uploadedFile   = $this->upload_single_file('second_image_file', $imageName, 'narrative', 'image');
                        if ($uploadedFile['status']) {
                            $second_image_file = $uploadedFile['newFilename'];
                        } else {
                            return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                        }
                    } else {
                        return redirect()->back()->with(['error_message' => 'Please Upload second_image File !!!']);
                    }
                /* second_image file */
                /* art_image file */
                    $imageFile      = $request->file('art_image_file');
                    if ($imageFile != '') {
                        $imageName      = $imageFile->getClientOriginalName();
                        $uploadedFile   = $this->upload_single_file('art_image_file', $imageName, 'art_image', 'image');
                        if ($uploadedFile['status']) {
                            $art_image_file = $uploadedFile['newFilename'];
                        } else {
                            return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                        }
                    } else {
                        return redirect()->back()->with(['error_message' => 'Please Upload art_image File !!!']);
                    }
                /* art_image file */
                /* art_video file */
                    $imageFile      = $request->file('art_video_file');
                    if ($imageFile != '') {
                        $imageName      = $imageFile->getClientOriginalName();
                        $uploadedFile   = $this->upload_single_file('art_video_file', $imageName, 'art_video', 'video');
                        if ($uploadedFile['status']) {
                            $art_video_file = $uploadedFile['newFilename'];
                        } else {
                            return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                        }
                    } else {
                        return redirect()->back()->with(['error_message' => 'Please Upload art_video File !!!']);
                    }
                /* art_video file */        
                $participatedInfo = isset($postData['participated_info']) ? $postData['participated_info'] : '';
                $invited_byInfo = isset($postData['invited_by']) ? $postData['invited_by'] : '';
                $invited_emailInfo = isset($postData['invited_by_email']) ? $postData['invited_by_email'] : '';
                $section_ertInfo = isset($postData['section_ert']) ? json_encode($postData['section_ert']) : '';
                $expertise_areaInfo = isset($postData['expertise_area']) ? json_encode($postData['expertise_area']) : '';
                $ecosystem_affiliationInfo = isset($postData['ecosystem_affiliation']) ? json_encode($postData['ecosystem_affiliation']) : '';
                $submission_typesInfo = isset($postData['submission_types']) ? $postData['submission_types'] : '';
                $narrative_fileInfo = isset($narrative_file) ? $narrative_file : '';    
                $first_image_fileInfo = isset($first_image_file) ? $first_image_file : '';    
                $second_image_fileInfo = isset($second_image_file) ? $second_image_file : '';    
                $art_image_fileInfo = isset($art_image_file) ? $art_image_file : '';    
                $art_video_fileInfo = isset($art_video_file) ? $art_video_file : '';    
            }            
            if ($this->validate($request, $rules)) {                
                    $fields = [
                        'email'                     => $postData['email'],   
                        'first_name'                => $postData['first_name'],            
                        'last_name'                 => $postData['last_name'],        
                        'middle_name'               => $postData['middle_name'],                                            
                        'for_publication_name'      => $postData['for_publication_name'],           
                        'orginal_work'              => $postData['orginal_work'],           
                        'user'                      => 0,           
                        'copyright'                 => $postData['copyright'],
                        'titleId'                     => $postData['title'],
                        'pronounId'                   => $postData['pronoun'], 
                        'invited'                   => $postData['invited'],
                        'invited_by'                => $invited_byInfo, 
                        'invited_by_email'          => $invited_emailInfo,
                        'explanation'               => $postData['explanation'],  
                        'explanation_submission'    => $postData['explanation_submission'],     
                        'section_ertId'             => $section_ertInfo,
                        'creative_Work'             => $postData['creative_Work'],
                        'subtitle'             => $postData['subtitle'],
                        'submission_types'             => $submission_typesInfo,
                        'titleId'                   => $postData['title'],
                        'pronounId'                 => $postData['pronoun'],
                        'participated'              => $postData['participated'],
                        'participated_info'         => $participatedInfo,
                        'narrative_file'         => $narrative_fileInfo,
                        'first_image_file'         => $first_image_fileInfo,
                        'second_image_file'         => $second_image_fileInfo,
                        'art_image_file'         => $art_image_fileInfo,
                        'art_image_desc'         => $postData['art_image_desc'],
                        'art_video_file'         => $art_video_fileInfo,
                        'art_video_desc'         => $postData['art_video_desc'],
                        'country'         => $postData['country'],
                        'state'         => $postData['state'],
                        'city'         => $postData['city'],
                        'organization_name'         => $postData['organization_name'],
                        'organization_website'      => $postData['organization_website'],
                        'ecosystem_affiliationId'   => $ecosystem_affiliationInfo,
                        'indigenous_affiliation'    => $postData['indigenous_affiliation'],
                        'expertise_areaId'          => $expertise_areaInfo,
                        'bio_short'               => $postData['bio_short'],
                        'bio_long'               => $postData['bio_long'],  
                    ];
                    //  Helper::pr($fields);
                    Article::insert($fields);
                    return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' Inserted Successfully !!!');
                // } else {
                //     return redirect()->back()->with('error_message', $this->data['title'] . ' Already Exists !!!');
                // }
            } else {
                return redirect()->back()->with('error_message', 'All Fields Required !!!');
            }
        }
        $data['module']                 = $this->data;
        $title                          = $this->data['title'] . ' Add';
        $data['section_ert']            = SectionErt::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['user_title']             = Title::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['submission_type']       = SubmissionType::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        // dd($data['submission_types']);
        $data['country']                = Country::orderBy('name', 'ASC')->get();
        // dd($data['country']);
        $data['pronoun']                = Pronoun::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['ecosystem_affiliation']  = EcosystemAffiliation::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $data['expertise_area']         = ExpertiseArea::where('status', '=', 1)->orderBy('name', 'ASC')->get();
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
            'is_published' => 2,
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
            'is_published' => 3,
        ];
                   
        $msg            = 'Reject';        
        // $model->save();
        Article::where($this->data['primary_key'], '=', $id)->update($fields);
        return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' ' . $msg . ' Successfully !!!');
    }
    /* change archieve status */

    public function viewDetails($id)
    {
        // dd($id);
        $id                             = Helper::decoded($id);       
        $data['module']                 = $this->data;
        $title                          = $this->data['title'] . ' View Details';
        $page_name                      = 'article.view_details';
        $data['rows']                   = Article::where('status', '!=', 3)->orderBy('id', 'DESC')->get();
        
        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
}
