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
    public function donation()
    {
        $data['countries']              = Country::select('id', 'name')->where('status', 1)->orderBy('name', 'ASC')->get();
        $title                          = 'Donation';
        $page_name                      = 'donation';
        $data['search_keyword']         = '';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
    public function thankyou()
    {
        $data = [];
        $title                          = 'Thankyou';
        $page_name                      = 'thankyou';
        $data['search_keyword']         = '';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
    public function donationreceipt()
    {
        $data = [];
        $title                          = 'Donationreceipt';
        $page_name                      = 'donationreceipt';
        $data['search_keyword']         = '';
        echo $this->front_before_login_layout($title, $page_name, $data);
    }
}
