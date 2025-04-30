<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\JournalFrequency;
use Illuminate\Http\Request;
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
use DB;

class DonationController extends Controller
{
    public function __construct()
    {
        $this->data = array(
            'title'             => 'Donation',
            'controller'        => 'DonationController',
            'controller_route'  => 'donation',
            'primary_key'       => 'id',
        );
    }
    /* list */
        public function list()
        {
            $data['module']                 = $this->data;
            $title                          = $this->data['title'] . ' List';
            $page_name                      = 'donation.list';
            $data['rows']                   = DB::table('donations')
                                                ->join('countries', 'donations.country', '=', 'countries.id')
                                                ->select('donations.*', 'countries.name as country_name')
                                                ->where('donations.status', '=', 1)
                                                ->orderBy('donations.id', 'DESC')
                                                ->get();
            echo $this->admin_after_login_layout($title, $page_name, $data);
        }
    /* list */   
}
