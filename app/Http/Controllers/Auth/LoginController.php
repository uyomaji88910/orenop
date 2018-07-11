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
    
    protected function redirectTo()   //REDIRECTTO($USER_ID = 1)
    {

        
    
        //タイムスタンプを取得
        $timestamp = time();
        // date()で日時を出力
        $date = date( "Y-m-d" , $timestamp ) ;
        $time = date( "H:i:s" , $timestamp ) ;


        // add attends table to record
        $attend = new Attend;
        $id = \Auth::id();
        $exist = $attend->confirm($id, $date);
        
        $status=$_REQUEST['status'];        
        
        if($exist == true){
            return '/attends'; // 今後変更する可能性あり。7/6 edit by tiny
        } else{
            if ($status == 1){
                $attend->status = 'attend'; // attend or late or absent
            }else if($status == 2){
                $attend->status = 'late';    
            }else if($status == 3){
                $attend->status = 'absent';
            }
            
            $attend->user_id = \Auth::id(); // user id        
            $attend->created_at = $date; // Date ex. 2018-07-05         
            $attend->updated_at = $time;// Time ex. 13:05:22
            
            $attend->save();
            
            $attend_id = $attend->id;
            $text = '/attends/'. $attend_id;
            return $text;
        };
    }
}
