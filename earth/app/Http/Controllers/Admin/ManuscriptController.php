<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\GeneralSetting;
use App\Models\Manuscript;
use Auth;
use Session;
use Helper;
use Hash;
class ManuscriptController extends Controller
{
    public function __construct()
    {        
        $this->data = array(
            'title'             => 'Manuscript',
            'controller'        => 'ManuscriptController',
            'controller_route'  => 'manuscript',
            'primary_key'       => 'id',
        );
    }
    /* list */
        public function list(){
            $data['module']                 = $this->data;
            $title                          = $this->data['title'].' List';
            $page_name                      = 'manuscript.list';
            $data['rows']                   = Manuscript::where('status', '!=', 3)->orderBy('id', 'DESC')->get();
            echo $this->admin_after_login_layout($title,$page_name,$data);
        }
    /* list */
    /* delete */
        public function delete(Request $request, $id){
            $id                             = Helper::decoded($id);
            $fields = [
                'status'             => 3
            ];
            Manuscript::where($this->data['primary_key'], '=', $id)->update($fields);
            return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'].' deleted successfully');
        }
    /* delete */
    /* change status */
        public function change_status($id, $status){
            $id                             = Helper::decoded($id);
            $status                         = Helper::decoded($status);
            if($status == 1)
            {
                $updated_status     = 1;
                $msg                = 'approved';
            } else {
                $updated_status     = 2;
                $msg                = 'rejected';
            }   
            Manuscript::where('id', '=', $id)->update(['status' => $updated_status, 'approve_reject_timestamp' => date('Y-m-d H:i:s')]);
            return redirect("admin/" . $this->data['controller_route'] . "/list")->with('success_message', $this->data['title'].' '.$msg.' successfully');
        }
    /* change status */
}
