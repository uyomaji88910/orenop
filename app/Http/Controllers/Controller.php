<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Attend;

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
                                      ->where('status','=','Attend')->where('attends.created_at','=',$date)->where('attends.updated_at','<=','09:00:00')
                                      ->orderBy('attends.updated_at', 'DESC')->get();
        $count_attend = $attends->count();
        
        $paid = \DB::table('users')->join('attends', 'users.id', '=', 'attends.user_id')
                                      ->select('users.nickname','attends.updated_at', 'attends.created_at')
                                      ->where('status','=','Paid Holiday')->where('attends.created_at','=',$date)
                                      ->orderBy('attends.updated_at', 'DESC')->get();
        $count_paid = $paid->count();
        
         //late function
         $lates = \DB::table('users')->join('attends', 'users.id', '=', 'attends.user_id')
                                      ->select('users.nickname','attends.updated_at', 'attends.created_at')
                                      ->where('status','=','Late')->where('attends.created_at','=',$date)
                                      ->orderBy('attends.updated_at', 'DESC')->get();
         $count_late = $lates->count();
         
         
         $absents = \DB::table('users')->join('attends', 'users.id', '=', 'attends.user_id')
                                      ->select('users.nickname','attends.updated_at', 'attends.created_at')
                                      ->where('status','=','Absent')->where('attends.created_at','=',$date)
                                      ->orderBy('attends.updated_at', 'DESC')->get();
         $count_absent = $absents->count();
         
         $all_user = \DB::table('users')->count();
        
        $count_notattend = $all_user - $count_attend - $count_late - $count_absent - $count_paid - 1;
        
        $over = \DB::table('users')->join('attends', 'users.id', '=', 'attends.user_id')
                                      ->select('users.nickname','attends.updated_at', 'attends.created_at')
                                      ->where('status','=','Attend')->where('attends.created_at','=',$date)->where('attends.updated_at','>=','09:00:00')
                                      ->orderBy('attends.updated_at', 'DESC')->get();
        $count_over = $over->count();
        
        $all_members = \DB::table('users')->select('*')->get();
        $all = $all_members->count();
        $count_all = $all -1;
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
            'count_paid' => $count_paid,
            'count_late' => $count_late,
            'count_absent' => $count_absent,
            'count_notattend' => $count_notattend,
            'count_over' => $count_over,
            'count_all' => $count_all,
            ];
    }
    
    function today_id ($id, $date)
    {     $attend = new Attend;
          $today_id = $attend->where([
            ['user_id', $id],
            ['created_at', $date],
            ])
            ->get()[0]->id;
        return $today_id;
    }
    
    function edit_id (){
        
        $id= \Auth::user()->id;
        $timestamp = time();
        $date = date( "Y-m-d" , $timestamp ) ;
            
        $today_id= $this->today_id($id, $date);
            
           
        //added by tiny
        
            return $today_id;
            
    }
}
