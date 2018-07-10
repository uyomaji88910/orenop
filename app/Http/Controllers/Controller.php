<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    function counts() {
        //タイムスタンプを取得
        $timestamp = time();
        // date()で日時を出力
        $date = date( "Y-m-d" , $timestamp ) ;
        $time = date( "H:i:s" , $timestamp ) ;
    
    
        //attends function
         $attends = \DB::table('users')->join('attends', 'users.id', '=', 'attends.user_id')
                                      ->select('users.nickname','attends.updated_at', 'attends.created_at')
                                      ->where('status','=','attend')->where('attends.created_at','=',$date)
                                      ->orderBy('attends.updated_at', 'DESC')->get();
        $count_attend = $attends->count();
        
         //late function
         $lates = \DB::table('users')->join('attends', 'users.id', '=', 'attends.user_id')
                                      ->select('users.nickname','attends.updated_at', 'attends.created_at')
                                      ->where('status','=','late')->where('attends.created_at','=',$date)
                                      ->orderBy('attends.updated_at', 'DESC')->get();
         $count_late = $lates->count();
         
         
         $absents = \DB::table('users')->join('attends', 'users.id', '=', 'attends.user_id')
                                      ->select('users.nickname','attends.updated_at', 'attends.created_at')
                                      ->where('status','=','absent')->where('attends.created_at','=',$date)
                                      ->orderBy('attends.updated_at', 'DESC')->get();
         $count_absent = $absents->count();
         
         $all_user = \DB::table('users')->count();
        
        $count_notattend = $all_user - $count_attend - $count_late - $count_absent;
         
        //notattends list
        /*
        $notattends = \DB::select("SELECT users.nickname FROM users 
                                    LEFT JOIN (SELECT user_id, status, created_at 
                                    FROM attends where created_at = CURDATE()) AS today 
                                    ON users.id = today.user_id WHERE status IS NULL;");
        $count_notattend = $notattends->count();
        */
        return [
            'count_attend' => $count_attend,
            'count_late' => $count_late,
            'count_absent' => $count_absent,
            'count_notattend' => $count_notattend,
            ];
    }
}
