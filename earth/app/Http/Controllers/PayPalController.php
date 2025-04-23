<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Services\OpenAiAuth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;
use PHPExperts\RESTSpeaker\RESTSpeaker;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Models\Country;
use App\Models\GeneralSetting;
use App\Models\EmailLog;
use App\Models\Donation;

use Auth;
use Session;
use Helper;
use Hash;
use stripe;
use DB;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use DateTime;

class PayPalController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('paypal');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function payment(Request $request, $order_id)
    {
        $id             = Helper::decoded($order_id);
        $getOrder       = Donation::where('id', '=', $id)->first();
        $provider       = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken    = $provider->getAccessToken();
  
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => url('paypal/payment/success/'.Helper::encoded($id)),
                "cancel_url" => url('paypal/payment/cancel/'.Helper::encoded($id)),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => round($getOrder->payable_amount)
                    ]
                ]
            ]
        ]);
        
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect(url('paypal/payment/success/'.Helper::encoded($id)))
                ->with('error', 'Something went wrong.');
        } else {
            return redirect(url('paypal/payment/success/'.Helper::encoded($id)))
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }    
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function paymentCancel($order_id)
    {
        $id             = Helper::decoded($order_id);
        $getOrder       = Donation::where('id', '=', $id)->first();
        return redirect(url('order-failure/'.Helper::encoded($id)))->with('error_message', 'Payment Failed !!!');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function paymentSuccess(Request $request, $order_id)
    {
        $id             = Helper::decoded($order_id);
        $getOrder       = Donation::where('id', '=', $id)->first();

        $provider       = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response       = $provider->capturePaymentOrder($request['token']);
        
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            $userSubscriptionData = [
                'payment_status'                => 1,
                'payment_amount'                => $getOrder->payable_amount,
                'payment_timestamp'             => date('Y-m-d H:i:s'),
                'txn_id'                        => $response['purchase_units'][0]['payments']['captures'][0]['id'],
                'payment_gateway_id'            => $response['id'],
                'customer_id'                   => $response['payment_source']['paypal']['account_id'],
                'customer_card_id'              => '',
                'currency'                      => $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'],
                'particulars'                   => 'Payment '.$getOrder->payable_amount.' for donation on '.date('Y-m-d H:i:s').' by paypal'
            ];
            Donation::where('id', '=', $id)->update($userSubscriptionData);
            /* generate inspection pdf & save it to directory */
                $data['donation']               = $getOrder;
                $donation_number                = (($data['donation'])?$data['donation']->donation_number:'');
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
                // $dompdf->stream("document.pdf", array("Attachment" => false));die;
                $filename                       = $donation_number.'.pdf';
                $pdfFilePath                    = 'public/uploads/donation/' . $filename;
                file_put_contents($pdfFilePath, $output);
                $payment_receipt = env('UPLOADS_URL').'donation/' . $filename;
                Donation::where('id', '=', $id)->update(['payment_receipt' => $payment_receipt]);
            /* generate inspection pdf & save it to directory */

            /* email functionality */
                $mailData['getOrder']       = Donation::where('id', '=', $id)->first();                   
                $generalSetting             = GeneralSetting::find('1');
                $subject                    = 'Donation Confirmation - Your Donation with '.$generalSetting->site_name.' ['.$donation_number.'] has been successfully placed!';
                $message                    = $subject;
                $attchment                  = 'public/uploads/donation/' . $filename;
                $this->sendMail($generalSetting->system_email, $subject, $message, $attchment);
                $this->sendMail((($data['donation'])?$data['donation']->email:''), $subject, $message, $attchment);
            /* email functionality */
            /* email log save */
                $postData2 = [
                    'name'                  => (($data['donation'])?$data['donation']->first_name.' '.$data['donation']->last_name:''),
                    'email'                 => (($data['donation'])?$data['donation']->email:''),
                    'subject'               => $subject,
                    'message'               => $message
                ];
                EmailLog::insertGetId($postData2);
            /* email log save */
            return redirect(url('thankyou/'.Helper::encoded($id)))->with('success_message', 'Donation Payment Completed Successfully !!!');
        } else {
            return redirect(url('thankyou/'.Helper::encoded($id)))->with('error_message', 'Payment Failed !!!');
        }
    }
}
