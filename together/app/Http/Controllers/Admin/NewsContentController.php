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
use App\Rules\MaxWords;
use App\Models\NewsContent;
use App\Models\NewsContentImage;
use App\Models\NewsCategory;
use App\Models\Pronoun;
use App\Models\EcosystemAffiliation;
use App\Models\Country;
use Auth;
use Session;
use Helper;
use Hash;

class NewsContentController extends Controller
{
    public function __construct()
    {
        $this->data = array(
            'title'             => 'News Content',
            'controller'        => 'NewsContentController',
            'controller_route'  => 'news_content',
            'primary_key'       => 'id',
        );
    }
    /* list */
    public function list()
    {       
        $data['module']                 = $this->data;
        $title                          = $this->data['title'] . ' List';
        $page_name                      = 'news_content.list';
        $data['rows']                   = NewsContent::where('status', '!=', 3)->orderBy('id', 'DESC')->get();        
        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
    /* list */
    /* add */
    public function add(Request $request)
    {
        $data['module']           = $this->data;
        if ($request->isMethod('post')) {
            $postData = $request->all();            
            // Validation rules
            $rules = [
                'parent_category'           => 'required',                               
                'sub_categories'            => 'required',   
                'new_title'                 => 'required',
                'creative_work_SRN'         => 'required',
                'creative_work_DOI'         => 'required',
                'author_name'               => 'required',
                'pronoun'                   => 'required',   
                'author_email'              => 'required',   
                'country'                   => 'required',   
                'cover_image'               => 'required',     
                'is_feature'                => 'required',  
                'is_popular'                => 'required',  
                'sub_title'                 => ['required', 'string', new MaxWords(50)], 
            ];
            
            // Validate request data
            if ($this->validate($request, $rules)) {
                // dd($postData);
                // Handle cover image upload
                $imageFile = $request->file('cover_image');
                $cover_image = $data['row']->cover_image ?? ''; // Fallback to existing image if not uploaded
                if($imageFile != '') {
                    $imageName = $imageFile->getClientOriginalName();
                    $uploadedFile = $this->upload_single_file('cover_image', $imageName, 'newcontent', 'image');
                    if ($uploadedFile['status']) {
                        $cover_image = $uploadedFile['newFilename'];
                    } else {
                        return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                    }
                }
        
                // Generate a unique slug
                $slug = Str::slug($postData['new_title']);
        
                // Prepare fields for NewsContent insertion
                $fields = [
                    'sub_category'              => $postData['sub_categories'],                       
                    'parent_category'           => $postData['parent_category'], 
                    'slug'                      => $slug,
                    'new_title'                 => $postData['new_title'],
                    'creative_work_SRN'         => $postData['creative_work_SRN'],
                    'creative_work_DOI'         => $postData['creative_work_DOI'],
                    'author_name'               => $postData['author_name'],   
                    'author_short_bio'          => $postData['author_short_bio'] ?? '',   
                    'author_pronoun'            => $postData['pronoun'],   
                    'author_affiliation'        => json_encode($postData['author_affiliation'] ?? []),   
                    'indigenous_affiliation'    => $postData['indigenous_affiliation'] ?? '',   
                    'author_email'              => $postData['author_email'],   
                    'country'                   => $postData['country'],   
                    'organization_name'         => $postData['organization_name'] ?? '',   
                    'cover_image'               => $cover_image,
                    'cover_image_caption'       => $postData['cover_image_caption'] ?? '',
                    'long_desc'                 => $postData['long_desc'] ?? '',     
                    'keywords'                  => $postData['keywords'] ?? '',     
                    'is_feature'                => $postData['is_feature'],  
                    'is_popular'                => $postData['is_popular'],  
                    'short_desc'                => $postData['short_desc'] ?? '',    
                    'sub_title'                 => $postData['sub_title'], 
                ];
        
                // Insert NewsContent and get the last inserted ID
                $lastInsertedId = NewsContent::insertGetId($fields);
        
                // Handle others_image upload (optional)
                $imageFile = $request->file('others_image');
                $others_image = [];
        
                if($imageFile != '') {                    
                    $uploadedFile = $this->commonFileArrayUpload('newcontent', $imageFile, 'image');
                    if(!empty($uploadedFile)) {
                        $others_image = $uploadedFile;
                    } else {
                        $others_image = [];
                    }
                }
        
                // Insert into NewsContentImage if others_image is not empty
                if(count($others_image) > 0) {
                    foreach($others_image as $image) {
                        $imageFields = [
                            'image_file' => $image,
                            'news_id' => $lastInsertedId,
                        ];
                        NewsContentImage::insert($imageFields);
                    }
                }
        
                // Redirect after successful insertion
                return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' Inserted Successfully !!!');
                
            } else {
                return redirect()->back()->with('error_message', 'All Fields Required !!!');
            }
        }
        $data['module']                 = $this->data;
        $title                          = $this->data['title'] . ' Add';       
        $page_name                      = 'news_content.add-edit';
        $data['row']                    = [];
        $data['parent_category']        = NewsCategory::where('status', '!=', 3)->where('parent_category', '=', 0)->orderBy('id', 'DESC')->get();
        $data['sub_category']           = NewsCategory::where('status', '!=', 3)->where('parent_category', '!=', 0)->orderBy('id', 'DESC')->get();
        $data['pronoun']                = Pronoun::where('status', '!=', 3)->orderBy('id', 'ASC')->get();
        $data['author_affiliation']     = EcosystemAffiliation::where('status', '!=', 3)->orderBy('name', 'ASC')->get();
        $data['country']                = Country::where('status', '!=', 3)->orderBy('name', 'ASC')->get();
         $data['news_images']           = [];
        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
    /* add */
    // Method to return subcategories based on parent category
    public function getSubcategories($parent_id)
    {
        $subcategories = NewsCategory::where('parent_category', $parent_id)->get();
        $queries = \DB::getQueryLog();
        $lastQuery = end($queries);
        return response()->json($subcategories);
    }
    /* edit */
    public function edit(Request $request, $id)
    {
        $data['module']                 = $this->data;
        $id                             = Helper::decoded($id);
        $title                          = $this->data['title'] . ' Update';
        $page_name                      = 'news_content.add-edit';
        $data['row']                    = NewsContent::where($this->data['primary_key'], '=', $id)->first();        
        $data['news_images']            = NewsContentImage::where('status', '!=', 3)->where('news_id', '=', $id)->get();
        $data['parent_category']        = NewsCategory::where('status', '!=', 3)->where('parent_category', '=', 0)->orderBy('id', 'DESC')->get();
        $data['sub_category']           = NewsCategory::where('status', '!=', 3)->where('parent_category', '!=', 0)->orderBy('id', 'DESC')->get();
        $data['pronoun']                = Pronoun::where('status', '!=', 3)->orderBy('id', 'ASC')->get();
        $data['author_affiliation']     = EcosystemAffiliation::where('status', '!=', 3)->orderBy('name', 'ASC')->get();
        $data['country']                = Country::where('status', '!=', 3)->orderBy('name', 'ASC')->get();
        $data['selected_ecosystem_affiliation'] = json_decode($data['row']->author_affiliation);        

        if ($request->isMethod('post')) {
            $postData = $request->all();          
            $rules = [
                'parent_category'           => 'required',                               
                'sub_categories'            => 'required',   
                'new_title'                 => 'required',
                'creative_work_SRN'         => 'required',
                'creative_work_DOI'         => 'required',
                'author_name'               => 'required',   
                'pronoun'                   => 'required',   
                'author_affiliation'        => 'required',   
                'author_email'              => 'required',   
                'country'                   => 'required',   
                'organization_name'         => 'required',   
                // 'cover_image'               => 'required',     
                // 'others_image'              => 'required',     
                'long_desc'                 => 'required',     
                'keywords'                  => 'required',     
                'is_feature'                => 'required',  
                'is_popular'                => 'required',  
                'short_desc'                => ['required', 'string', new MaxWords(102)],    
                'sub_title'                  => ['required', 'string', new MaxWords(42)], 
            ];           
            if ($this->validate($request, $rules)) {
                // $checkValue = NewsContent::where('sub_category', '=', $postData['sub_category'])->count();
                // if ($checkValue <= 0) { 
                    // Generate a unique slug
                    $slug = Str::slug($postData['new_title']);   
                    /* banner image */
                    $imageFile      = $request->file('cover_image');
                        if($imageFile != ''){
                            $imageName      = $imageFile->getClientOriginalName();
                            $uploadedFile   = $this->upload_single_file('cover_image', $imageName, 'newcontent', 'image');
                            if($uploadedFile['status']){
                                $cover_image = $uploadedFile['newFilename'];
                            } else {
                                return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                            }
                        } else {
                            $cover_image = $data['row']->cover_image;
                        }
                    /* banner image */                      
                                                
                    $fields = [
                        'sub_category'              => $postData['sub_categories'],                       
                        'parent_category'           => $postData['parent_category'], 
                        'slug'                      => $slug,
                        'new_title'                 => $postData['new_title'],
                        'creative_work_SRN'         => $postData['creative_work_SRN'],
                        'creative_work_DOI'         => $postData['creative_work_DOI'],
                        'author_name'               => $postData['author_name'],   
                        'author_pronoun'            => $postData['pronoun'],   
                        'author_affiliation'       => json_encode($postData['author_affiliation']),   
                        'author_email'              => $postData['author_email'],   
                        'country'                   => $postData['country'],   
                        'organization_name'         => $postData['organization_name'],   
                        'cover_image'               => $cover_image,
                        'cover_image_caption'       => $postData['cover_image_caption'],
                        // 'others_image'              => $others_image,
                        'long_desc'                 => $postData['long_desc'],     
                        'keywords'                  => $postData['keywords'],     
                        'is_feature'                => $postData['is_feature'],  
                        'is_popular'                => $postData['is_popular'],  
                        'short_desc'                => $postData['short_desc'],    
                        'sub_title'                  => $postData['sub_title'], 
                    ];                    
                    NewsContent::where($this->data['primary_key'], '=', $id)->update($fields);
                    /* others image */
                    $imageFile      = $request->file('others_image');                    
                    $others_image = [];
                    if($imageFile != ''){                    
                    $uploadedFile   = $this->commonFileArrayUpload('newcontent', $imageFile, 'image');
                    if(!empty($uploadedFile)){
                        $others_image = $uploadedFile;
                    }                  
                     else {
                        $others_image = [];
                    }
                    }                                         
                    /* others image */                               
                    if(count($others_image)>0){
                        for($k=0;$k<count($others_image);$k++){
                            $fields   = [
                                                'image_file'                => $others_image[$k],
                                                'news_id'                   => $id ,
                            ];                            
                            NewsContentImage::insert($fields);                        
                        }
                    }     
                    return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' Updated Successfully !!!');                
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
        NewsContent::where($this->data['primary_key'], '=', $id)->update($fields);
        return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' Deleted Successfully !!!');
    }
    /* delete */
    /* change status */
    public function change_status(Request $request, $id)
    {
        $id                             = Helper::decoded($id);
        $model                          = NewsContent::find($id);
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
     /* edit image */
     public function edit_image(Request $request, $id)
     {
         $data['module']                 = $this->data;
         $id                             = Helper::decoded($id);
         $title                          = $this->data['title'] . ' Update';
         $page_name                      = 'news_content_image.add-edit';        
         $data['row']            = NewsContentImage::where('status', '!=', 3)->where('id', '=', $id)->first();
         $data['content']                    = NewsContent::where('id', '=', $data['row']->news_id)->first();          
 
         if ($request->isMethod('post')) {
             $postData = $request->all();          
             $rules = [                   
                  'others_image'              => 'required',                   
             ];           
             if ($this->validate($request, $rules)) {                 
                     /* others image */
                     $imageFile      = $request->file('others_image');                    
                     $others_image = [];
                     if($imageFile != ''){                    
                     $uploadedFile   = $this->commonFileArrayUpload('newcontent', $imageFile, 'image');
                     if(!empty($uploadedFile)){
                         $others_image = $uploadedFile;
                     }                  
                      else {
                         return redirect()->back()->with(['error_message' => 'Please upload an image']);
                     }
                     }                                         
                     /* others image */                               
                     if(count($others_image)>0){
                         for($k=0;$k<count($others_image);$k++){
                             $fields   = [
                                                 'image_file'                => $others_image[$k],
                                                 'news_id'                   => $data['content']->id ,
                             ];   
                            //  Helper::pr($fields);
                             NewsContentImage::where('id', '=', $id)->update($fields);
                         }
                     }                                                                                                                        
                     
                     return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' Updated Successfully !!!');                
             } else {
                 return redirect()->back()->with('error_message', 'All Fields Required !!!');
             }
         }
         echo $this->admin_after_login_layout($title, $page_name, $data);
     }
     /* edit image */
     /* delete image */
    public function delete_image(Request $request, $id)
    {
        $id                             = Helper::decoded($id);
        $fields = [
            'status'             => 3
        ];
        NewsContentImage::where('id', '=', $id)->update($fields);
        return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'] . ' Deleted Successfully !!!');
    }
    /* delete image */
}
