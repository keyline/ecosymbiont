<?php
namespace App\Http\Controllers;

use App\Helpers\Helper as HelpersHelper;
use App\Http\Controllers\Controller;
use App\Services\OpenAiAuth;
use Illuminate\Http\Request;
use PHPExperts\RESTSpeaker\RESTSpeaker;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

use App\Models\NewsCategory;
use App\Models\NewsContent;
use App\Models\Notice;
use App\Models\Page;
use App\Models\User;
use App\Models\Manuscript;
use App\Models\Subscriber;
use App\Models\Country;
use App\Models\UserActivity;
use App\Models\Article;
use App\Rules\MaxWords;
use App\Models\SectionErt;
use App\Models\Title;
use App\Models\Pronoun;
use App\Models\EcosystemAffiliation;
use App\Models\ExpertiseArea;
use App\Models\SubmissionType;
use App\Models\GeneralSetting;
use App\Models\Enquiry;
use App\Models\EmailLog;
use App\Models\UserProfile;
use App\Models\UserClassification;
use App\Models\Community;
use App\Models\Project;
use App\Models\Donation;
use Auth;
use Session;
use Helper;
use Hash;
use stripe;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
date_default_timezone_set("Asia/Calcutta");

class DonationController extends Controller
{
    public function donation(Request $request)
    {
        $data['countries']              = Country::select('id', 'name')->where('status', 1)->orderBy('name', 'ASC')->get();
        $title                          = 'Donation';
        $page_name                      = 'donation';
        if ($request->isMethod('post')) {
            $postData = $request->all();
            $rules = [
                'first_name'                    => 'required',
                'last_name'                     => 'required',
                'email'                         => 'required',
                'address'                       => 'required',
                'country'                       => 'required',
                'payment_mode'                  => 'required',
                'payable_amount'                => 'required',
            ];
            if ($this->validate($request, $rules)) {
                $country            = $request->country;
                $getCountry         = Country::select('id', 'name', 'ISO')->where('id', $country)->first();
                $getLastDonation    = Donation::orderBy('id', 'DESC')->first();
                // SRM-US-web2025-00123
                if($getLastDonation){
                    $sl_no              = $getLastDonation->sl_no;
                    $next_sl_no         = $sl_no + 1;
                    $next_sl_no_string  = str_pad($next_sl_no, 5, 0, STR_PAD_LEFT);
                    $donation_number    = 'SRM-'.(($getCountry)?$getCountry->ISO:'').'-web'.date('Y').'-'.$next_sl_no_string;
                } else {
                    $next_sl_no         = 1;
                    $next_sl_no_string  = str_pad($next_sl_no, 5, 0, STR_PAD_LEFT);
                    $donation_number    = 'SRM-'.(($getCountry)?$getCountry->ISO:'').'-web'.date('Y').'-'.$next_sl_no_string;
                }
                $fields = [
                    'sl_no'                                 => $postData['name'],
                    'donation_number'                       => $postData['name'],
                    'first_name'                            => $postData['first_name'],
                    'last_name'                             => $postData['last_name'],
                    'email'                                 => $postData['email'],
                    'address'                               => $postData['address'],
                    'country'                               => $postData['country'],
                    'payment_mode'                          => $postData['payment_mode'],
                    'payable_amount'                        => $postData['payable_amount'],
                ];
                Helper::pr($fields);
                $donation_id = Donation::insertGetId($fields);
                return redirect(url('donation-preview/' . Helper::encoded($donation_id)))->with('success_message', 'Basic info inserted for donation');
            } else {
                return redirect()->back()->with('error_message', 'All fields required');
            }
        }
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
    public function donationPreview($donation_id)
    {
        $donation_id                    = Helper::decoded($donation_id);
        $data['donation']               = Donation::where('id', $donation_id)->first();
        $title                          = 'Donation Preview';
        $page_name                      = 'donation-preview';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
    public function thankyou()
    {
        $data = [];
        $title                          = 'Thankyou';
        $page_name                      = 'thankyou';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
    public function donationreceipt()
    {
        $data = [];
        $title                          = 'Donationreceipt';
        $page_name                      = 'donationreceipt';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
}
