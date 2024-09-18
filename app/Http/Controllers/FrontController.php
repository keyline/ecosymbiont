<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\OpenAiAuth;
use Illuminate\Http\Request;
use PHPExperts\RESTSpeaker\RESTSpeaker;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

use App\Models\Notice;
use App\Models\Manuscript;

use Auth;
use Session;
use Helper;
use Hash;
use stripe;
date_default_timezone_set("Asia/Calcutta");
class FrontController extends Controller
{
    public function home()
    {
        $data = [];
        $title                          = 'Home';
        $page_name                      = 'home';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
    public function archieve()
    {
        $data['rows']                   = Notice::with('journalFrequency')->where('status', '=', 1)->where('is_archieve', '=', 1)->orderBy('id', 'DESC')->get();
        $title                          = 'Archieve Journals';
        $page_name                      = 'archieve';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
    public function submitManuscript(Request $request)
    {
        $data                           = [];
        if ($request->isMethod('post')) {
            $postData = $request->all();

            $userType = $postData['userType'] ?? null;

            $rules = [];

            // Set validation rules based on userType
            if ($userType == 1) {
                // Only validate the first user
                $rules = [
                    'author_name.0'        => 'required|string',
                    'author_designation.0' => 'required|string',
                    'author_affiliation.0' => 'required|string',
                    'author_email.0'       => 'required|email',
                    'author_phone.0'       => 'required|string',
                    'manuscript_file'      => 'required|file',
                    'plagiarism_certificate' => 'required|file',
                    'payment_receipt'      => 'required|file',
                ];
            } elseif ($userType == 2) {
                // Validate the first two users
                $rules = [
                    'author_name.0'        => 'required|string',
                    'author_designation.0' => 'required|string',
                    'author_affiliation.0' => 'required|string',
                    'author_email.0'       => 'required|email',
                    'author_phone.0'       => 'required|string',
                    'author_name.1'        => 'required|string',
                    'author_designation.1' => 'required|string',
                    'author_affiliation.1' => 'required|string',
                    'author_email.1'       => 'required|email',
                    'author_phone.1'       => 'required|string',
                    'manuscript_file'      => 'required|file',
                    'plagiarism_certificate' => 'required|file',
                    'payment_receipt'      => 'required|file',
                ];
            }

            // Conditional validation for the third author if the name is not blank
            if (!empty($postData['author_name'][2])) {
                $rules = array_merge($rules, [
                    'author_name.2'        => 'required|string',
                    'author_designation.2' => 'required|string',
                    'author_affiliation.2' => 'required|string',
                    'author_email.2'       => 'required|email',
                    'author_phone.2'       => 'required|string',
                ]);
            }

            if ($this->validate($request, $rules)) {
                $manuscript_file = '';
                $plagiarism_certificate = '';
                $payment_receipt = '';

                // Manuscript file upload
                if ($request->hasFile('manuscript_file')) {
                    $imageFile = $request->file('manuscript_file');
                    $imageName = $imageFile->getClientOriginalName();
                    $uploadedFile = $this->upload_single_file('manuscript_file', $imageName, 'manuscript', 'word');
                    if ($uploadedFile['status']) {
                        $manuscript_file = $uploadedFile['newFilename'];
                    } else {
                        return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                    }
                } else {
                    return redirect()->back()->with(['error_message' => 'Please Upload Manuscript file !!!']);
                }

                // Plagiarism certificate file upload
                if ($request->hasFile('plagiarism_certificate')) {
                    $imageFile = $request->file('plagiarism_certificate');
                    $imageName = $imageFile->getClientOriginalName();
                    $uploadedFile = $this->upload_single_file('plagiarism_certificate', $imageName, 'manuscript', 'custom');
                    if ($uploadedFile['status']) {
                        $plagiarism_certificate = $uploadedFile['newFilename'];
                    } else {
                        return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                    }
                }

                // Payment receipt file upload
                if ($request->hasFile('payment_receipt')) {
                    $imageFile = $request->file('payment_receipt');
                    $imageName = $imageFile->getClientOriginalName();
                    $uploadedFile = $this->upload_single_file('payment_receipt', $imageName, 'manuscript', 'custom');
                    if ($uploadedFile['status']) {
                        $payment_receipt = $uploadedFile['newFilename'];
                    } else {
                        return redirect()->back()->with(['error_message' => $uploadedFile['message']]);
                    }
                }

                // Loop through each set of author data
                $authorCount = count($postData['author_name']);
                for ($i = 0; $i < $authorCount; $i++) {

                    $fields = [
                        'author_name'            => $postData['author_name'][$i],
                        'author_designation'     => $postData['author_designation'][$i],
                        'author_affiliation'     => $postData['author_affiliation'][$i],
                        'author_email'           => $postData['author_email'][$i],
                        'author_phone'           => $postData['author_phone'][$i],
                        'manuscript_file'        => $manuscript_file,
                        'plagiarism_certificate' => $plagiarism_certificate,
                        'payment_receipt'        => $payment_receipt,
                    ];

                    // Insert each author's data into the database
                    Manuscript::insert($fields);
                }

                return redirect("submit-manuscript")->with('success_message', 'Manuscript Submitted Successfully !!!');
            } else {
                return redirect()->back()->with('error_message', 'All Fields Required !!!');
            }
        }
        $title                          = 'Submit Manuscript';
        $page_name                      = 'submit-manuscript';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
}
