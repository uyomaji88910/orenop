<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// add by Ryo Nakajima
use App\User;
use App\Attend;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    
     
    protected $redirectTo = '/'; // Mod by  Ryo Nakajima 06/07 7.2

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }

    public function username()
    {
        return 'nickname';
    }
    //REDIRECTTO($USER_ID = 1)
    protected function redirectTo()   
    {
        //タイムスタンプを取得
        $timestamp = time();
        // date()で日時を出力
        $date = date( "Y-m-d" , $timestamp ) ;
        $time = date( "H:i:s" , $timestamp ) ;

        // add attends table to record
        $id = \Auth::id();
        $status=$_REQUEST['status']; 
        $nickname=$_REQUEST['nickname'];
        $attend = new Attend;
        $exist = $attend->confirm($id, $date);
        $_REQUEST['status']=(integer)$_REQUEST['status'];
        
            if($status == 4) {
                $date = $_REQUEST['startdate']; // 2018/08/21 start day Validate
                $end_date = $_REQUEST['enddate']; // 2018/08/21 end day
                var_dump($_REQUEST);
                do {
                    $exist1 = $attend->confirm($id, $date);
                    if($exist1 == true){
                    } else {
                        $attend1 = new Attend;
                        $attend1->status = 'Paid Holiday';
                        $attend1->created_at = $date; // Date ex. 2018-07-05         
                        $attend1->updated_at = $time; 
                        $attend1->user_id = \Auth::id(); // user id   
                        $attend1->reason = $_REQUEST['reason'];
                        $attend1->save(); 
                    }
                    $date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
	            } while (strtotime($date) <= strtotime($end_date));
                //return '/logout';
                $text = '/paidlog/' . $id; // edit byu Ryo Nakajima 2018/09/10
                return $text;

            } else if($exist == true){
                $user_id= $attend->today_id($id, $date);
                $attend->user_id = \Auth::id(); // user id     
                $text = '/attends/' . $attend->user_id . '/edit/'; // edit byu Ryo Nakajima 2018/07/13
                return $text;
                
            } else if($nickname == 'GHR') {
                return '/ghr/absent';
                
            
            
            } else{
                $attend = new Attend;
                if ($status == 1){
                    $attend->status = 'Attend'; // attend or late or absent
                }else if($status == 2){
                    $attend->status = 'Late';
                    $attend->reason = $_REQUEST['reason'];
                }else if($status == 3){
                    $attend->status = 'Absent';
                    $attend->reason = $_REQUEST['reason'];
                }
            
            $attend->user_id = \Auth::id(); // user id        
            $attend->created_at = $date; // Date ex. 2018-07-05         
            $attend->updated_at = $time;// Time ex. 13:05:22
            $attend->save();
            
            $text = '/attends/' . $attend->user_id; // edit byu Ryo Nakajima 2018/07/13
            return $text;
        };
    }
}
