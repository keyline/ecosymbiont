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

use App\Models\Country;
use App\Models\GeneralSetting;
use App\Models\EmailLog;
use App\Models\Donation;

use Auth;
use Session;
use Helper;
use Hash;
use stripe;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use DateTime;
date_default_timezone_set("Asia/Calcutta");

class DonationController extends Controller
{
    public function donation(Request $request)
    {
        $data['search_keyword']         = '';
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
                    'sl_no'                                 => $next_sl_no,
                    'donation_number'                       => $donation_number,
                    'first_name'                            => $postData['first_name'],
                    'last_name'                             => $postData['last_name'],
                    'email'                                 => $postData['email'],
                    'address'                               => $postData['address'],
                    'country'                               => $postData['country'],
                    'payment_mode'                          => $postData['payment_mode'],
                    'payable_amount'                        => $postData['payable_amount'],
                    'created_at'                            => date('Y-m-d H:i:s'),
                ];
                // Helper::pr($fields);
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
        $data['search_keyword']         = '';
        $donation_id                    = Helper::decoded($donation_id);
        $data['donation']               = Donation::where('id', $donation_id)->first();
        $title                          = 'Donation Preview';
        $page_name                      = 'donation-preview';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
    public function thankyou($donation_id)
    {
        $data['search_keyword']         = '';
        $donation_id                    = Helper::decoded($donation_id);
        $data['donation']               = Donation::where('id', $donation_id)->first();
        $title                          = 'Thankyou';
        $page_name                      = 'thankyou';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
    public function donationreceipt($donation_id)
    {
        $data['search_keyword']         = '';
        $donation_id                    = Helper::decoded($donation_id);
        $data['donation']               = Donation::where('id', $donation_id)->first();
        $data['country_id']             = (($data['donation'])?$data['donation']->country:0);
        // $title                          = 'Donationreceipt';
        // $page_name                      = 'donationreceipt';
        // return view('front.pages.'.$page_name, $data);
        /* generate inspection pdf & save it to directory */
            $donation                       = $data['donation'];
            $donation_number                = (($donation)?$donation->donation_number:'');
            $generalSetting                 = GeneralSetting::find('1');
            $subject                        = $generalSetting->site_name . ' Donation Receipt' . $donation_number;
            $message                        = view('front.pages.donationreceipt',$data);
            $options                        = new Options();
            $options->set('defaultFont', 'Courier');
            $dompdf                         = new Dompdf($options);
            $html                           = $message;
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            $output                         = $dompdf->output();
            $dompdf->stream("document.pdf", array("Attachment" => false));die;
            // $filename                       = $donation_number.'-'.time().'.pdf';
            // $pdfFilePath                    = 'public/uploads/donation/' . $filename;
            // file_put_contents($pdfFilePath, $output);
            // Donation::where('id', '=', $donation_id)->update(['payment_receipt' => $filename]);
        /* generate inspection pdf & save it to directory */
    }
}
