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

class DonationController extends Controller
{
    public function donation(Request $request)
    {
        $data['search_keyword']         = '';
        $data['countries']              = Country::select('id', 'name')->where('status', 1)->orderBy('name', 'ASC')->get();
        $title                          = 'Donation';
        $page_name                      = 'donation';
        if ($request->isMethod('post')) {
            $postData     = $request->all();
            $payment_mode = $postData['payment_mode'] ?? '';

            if ($payment_mode === 'INR') {
                $rules = [
                    'is_indian_citizen'   => 'required',
                    'is_donating_inr'     => 'required',
                    'full_legal_name'     => 'required',
                    'pan_number'          => 'required',
                    'address'             => 'required',
                    'email'               => 'required|email',
                    'mobile_number'       => 'required',
                    'bank_name'           => 'required',
                    'bank_account_number' => 'required',
                    'payment_mode'        => 'required',
                    'payable_amount'      => 'required',
                ];
            } else {
                $rules = [
                    'first_name'        => 'required',
                    'last_name'         => 'required',
                    'email'             => 'required',
                    'address'           => 'required',
                    'country'           => 'required',
                    'payment_mode'      => 'required',
                    'payable_amount'    => 'required',
                ];
            }

            if ($this->validate($request, $rules)) {
                $country            = $request->country;
                $getCountry         = Country::select('id', 'name', 'ISO')->where('id', $country)->first();
                $getLastDonation    = Donation::orderBy('id', 'DESC')->first();
                if($getLastDonation){
                    $sl_no              = $getLastDonation->sl_no;
                    $next_sl_no         = $sl_no + 1;
                    $next_sl_no_string  = str_pad($next_sl_no, 5, 0, STR_PAD_LEFT);
                    $donation_number    = 'SRM-web'.date('Y').'-'.$next_sl_no_string;
                } else {
                    $next_sl_no         = 1;
                    $next_sl_no_string  = str_pad($next_sl_no, 5, 0, STR_PAD_LEFT);
                    $donation_number    = 'SRM-web'.date('Y').'-'.$next_sl_no_string;
                }

                if ($payment_mode === 'INR') {
                    $fields = [
                        'sl_no'                => $next_sl_no,
                        'donation_number'      => $donation_number,
                        'first_name'           => $postData['full_legal_name'],
                        'last_name'            => '',
                        'email'                => $postData['email'],
                        'address'              => $postData['address'],
                        'country'              => 97, // India
                        'payment_mode'         => 'INR',
                        'payable_amount'       => $postData['payable_amount'],
                        'payment_status'       => 1,
                        'payment_amount'        => $postData['payable_amount'],
                        'pan_number'           => $postData['pan_number'] ?? null,
                        'mobile_number'        => $postData['mobile_number'] ?? null,
                        'bank_name'            => $postData['bank_name'] ?? null,
                        'bank_account_number'  => $postData['bank_account_number'] ?? null,
                        'is_indian_citizen'    => $postData['is_indian_citizen'] ?? null,
                        'is_donating_inr'      => $postData['is_donating_inr'] ?? null,
                        'created_at'           => date('Y-m-d H:i:s'),
                        'updated_at'           => date('Y-m-d H:i:s'),
                    ];
                } else {
                    $fields = [
                        'sl_no'           => $next_sl_no,
                        'donation_number' => $donation_number,
                        'first_name'      => $postData['first_name'],
                        'last_name'       => $postData['last_name'],
                        'email'           => $postData['email'],
                        'address'         => $postData['address'],
                        'country'         => $postData['country'],
                        'payment_mode'    => $postData['payment_mode'],
                        'payable_amount'  => $postData['payable_amount'],
                        'created_at'      => date('Y-m-d H:i:s'),
                        'updated_at'      => date('Y-m-d H:i:s'),
                    ];
                }
                // Helper::pr($fields);
                $donation_id    = Donation::insertGetId($fields);
                $generalSetting = GeneralSetting::find('1');
                if ($payment_mode === 'INR') {
                    $donor_name = $postData['full_legal_name'] ?? 'Donor';
                } else {
                    $donor_name = (trim(($postData['first_name'] ?? '') . ' ' . ($postData['last_name'] ?? '')) ?: 'Donor');
                }
                $donor_email    = $postData['email'] ?? '';
                $payment_mode   = $postData['payment_mode'] ?? '';
                $amount         = $postData['payable_amount'] ?? '0';
                $currency       = ($payment_mode === 'INR') ? 'INR' : 'USD';
                $admin_email    = ($generalSetting->site_mail ?: ($generalSetting->system_email ?: null));

                // Mail to donor
                $user_subject = 'Thank You for Your Donation to the Śramani Institute';
                $user_message = "
                    <table width='100%' border='0' cellspacing='0' cellpadding='0' style='padding:10px;background:#fff;max-width:600px;font-family:Arial,sans-serif;font-size:14px;color:#333;'>
                        <tr><td style='padding:8px 15px'>Dear " . htmlspecialchars($donor_name) . ",</td></tr>
                        <tr><td style='padding:8px 15px'>Thank you for your tax-exempt donation to the Śramani Institute (80G/12A tax-exempt). Please find below the details for NEFT transfer of your donation.</td></tr>
                        <tr><td style='padding:8px 15px'>&nbsp;</td></tr>
                        <tr><td style='padding:8px 15px'><strong>Beneficiary Name:</strong> Sramani Institute</td></tr>
                        <tr><td style='padding:8px 15px'><strong>Checking Account number:</strong> 00087620000109</td></tr>
                        <tr><td style='padding:8px 15px'><strong>IFSC Code:</strong> HDFC0000008</td></tr>
                        <tr><td style='padding:8px 15px'><strong>Bank Name:</strong> HDFC Bank</td></tr>
                        <tr><td style='padding:8px 15px'><strong>Bank address:</strong> Stephen House, 4BBD Bag East Kolkata 700001</td></tr>
                        <tr><td style='padding:8px 15px'>&nbsp;</td></tr>
                        <tr><td style='padding:8px 15px'>Once you have donated, please e-mail us (<a href='mailto:Support@sramani.org'>Support@sramani.org</a>) with the date, time, and amount of your NEFT transfer and we will e-mail you a donation receipt.</td></tr>
                        <tr><td style='padding:8px 15px'>&nbsp;</td></tr>
                        <tr><td style='padding:8px 15px'>Thank you and best wishes,</td></tr>
                        <tr><td style='padding:8px 15px'><strong>Śramani Institute</strong></td></tr>
                    </table>";
                if (!empty($donor_email)) {
                    $this->sendMail($donor_email, $user_subject, $user_message);
                }

                // Mail to admin
                $admin_subject = 'New Donation Received — ' . $donation_number;
                $admin_message = "
                    <table width='100%' border='0' cellspacing='0' cellpadding='0' style='padding:10px;background:#fff;max-width:600px;font-family:Arial,sans-serif;font-size:14px;color:#333;'>
                        <tr><td style='padding:8px 15px'>Dear Administrator,</td></tr>
                        <tr><td style='padding:8px 15px'>A new donation has been submitted. Please find the details below.</td></tr>
                        <tr><td style='padding:8px 15px'>&nbsp;</td></tr>
                        <tr><td style='padding:8px 15px'><strong>Donation Number:</strong> " . htmlspecialchars($donation_number) . "</td></tr>
                        <tr><td style='padding:8px 15px'><strong>Donor Name:</strong> " . htmlspecialchars($donor_name) . "</td></tr>
                        <tr><td style='padding:8px 15px'><strong>Email:</strong> " . htmlspecialchars($donor_email) . "</td></tr>
                        <tr><td style='padding:8px 15px'><strong>Payment Mode:</strong> " . htmlspecialchars($payment_mode) . "</td></tr>
                        <tr><td style='padding:8px 15px'><strong>Amount:</strong> " . htmlspecialchars($currency) . " " . htmlspecialchars($amount) . "</td></tr>
                        <tr><td style='padding:8px 15px'>&nbsp;</td></tr>
                        <tr><td style='padding:8px 15px'>Auto-generated from the Ecosymbiont Website.</td></tr>
                    </table>";
                if (!empty($admin_email)) {
                    $this->sendMail($admin_email, $admin_subject, $admin_message);
                }

                return redirect(url('donation-preview/' . Helper::encoded($donation_id)))->with('success_message', 'Thank you! Your donation details have been submitted successfully.');
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
