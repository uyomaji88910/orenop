<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attend;
use App\User;

class GhrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    // route ~/lists/attend 2018/07/11
    public function attend()
    {
         //タイムスタンプを取得
        $timestamp = time();
        // date()で日時を出力
        $date = date( "Y-m-d" , $timestamp ) ;
        $time = date( "H:i:s" , $timestamp ) ;
        
        
        //attends function
        $attends = \DB::table('users')->join('attends', 'users.id', '=', 'attends.user_id')
                 ->select('users.nickname','attends.updated_at', 'attends.created_at', 'users.team_number', 'users.team_class')
                 ->where('status','=','Attend')->where('attends.created_at','=',$date)
                 ->orderBy('users.team_number', 'ASC')->orderBy('users.team_class', 'ASC')->orderBy('attends.updated_at', 'DESC')->get();
        $count = $this->counts();

        
        return view('ghr.attend', [
              'attends'=>$attends,
              'count'=>$count,
              'date'=>$date,
               ]);
        
        
    }

    // route ~/lists/late 2018/07/11    
    public function late()
    {
        //タイムスタンプを取得
        $timestamp = time();
        // date()で日時を出力
        $date = date( "Y-m-d" , $timestamp ) ;
        $time = date( "H:i:s" , $timestamp ) ;
        
        //late function
        $lates = \DB::table('users')->join('attends', 'users.id', '=', 'attends.user_id')
               ->select('users.nickname','attends.updated_at', 'attends.created_at', 'attends.reason', 'users.team_number', 'users.team_class', 'attends.arrival_time', 'attends.id')
               ->where('status','=','Late')->where('attends.created_at','=',$date)
               ->orderBy('users.team_number', 'ASC')->orderBy('users.team_class', 'ASC')->orderBy('attends.updated_at', 'DESC')->get();
        $count = $this->counts();
 
        return view('ghr.late', [
            
            'lates'=>$lates,
            'count'=>$count,
            'date'=>$date,
       
        ]);
        
        
    }   
    
 
    public function absent()
    {
        //タイムスタンプを取得
        $timestamp = time();
        // date()で日時を出力
        $date = date( "Y-m-d" , $timestamp ) ;
        $time = date( "H:i:s" , $timestamp ) ;
        
        
        $absents = \DB::table('users')->join('attends', 'users.id', '=', 'attends.user_id')
                 ->select('users.nickname','attends.updated_at', 'attends.created_at', 'attends.reason', 'users.team_number', 'users.team_class') //add attends.reason by chee 7/17
                 ->where('status','=','Absent')->where('attends.created_at','=',$date)
                 ->orderBy('users.team_number', 'ASC')->orderBy('users.team_class', 'ASC')->orderBy('attends.updated_at', 'DESC')->get();
        $count = $this->counts();
        

        
        return view('ghr.absent', [
            'absents'=>$absents,
            'count'=>$count,
            'date'=>$date,
        ]);
        
        
    }  
    public function notattend()
    {
        //タイムスタンプを取得
        $timestamp = time();
        // date()で日時を出力 //view用のdate()
        $date = date( "Y-m-d" , $timestamp ) ;

                  
        //notattends list        
        
        $notattends = \DB::table('users')
                 ->select('users.nickname','users.team_number', 'users.team_class')
                 ->leftJoin('attends as today', function($query){ //Today listのためのdate()
                    $timestamp = time();
                    $date = date( "Y-m-d" , $timestamp ) ;
                    $query->on('users.id', '=', 'today.user_id')
                          ->where('today.created_at','=',$date);
                 })
                 ->whereNull('status')
                 ->where('users.nickname', '!=', 'GHR')
                 ->orderBy('users.team_number', 'ASC')->orderBy('users.team_class', 'ASC')
                 ->get();


                                            
        
                                  //  "SELECT users.nickname FROM users 
                                    //LEFT JOIN (SELECT user_id, status, created_at 
                                    //FROM attends where created_at = CURDATE()) AS today 
                                    //ON users.id = today.user_id WHERE status IS NULL;"       
        $count = $this->counts();

        // added by Den 07/09/2018
        return view('ghr.notattend', [
            'notattends'=>$notattends,
            'count'=>$count,
            'date'=>$date,
        ]);
        
    }     
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function create()
    {
        //
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //*********************** Add by Ryo Nakajima 2018/07/05 for attend function *********************//
        //*********************** End *********************//
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //$id=userのid
    {

    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    // for viewing GHR login Form    /// add by Ryo Nakajima 2018/07/17
    public function login() 
    {
        return view('ghr.ghr');
    }
    
    // for insert arrival_time to late @auth GHR ### add by Ryo Nakajima 2018/07/19
    public function arrival(Request $request)
    {
        $id = $_REQUEST['id'];
        $attend = Attend::find($id);
        
        //タイムスタンプを取得
        $timestamp = time();
        // date()で日時を出力
        $time = date( "H:i:s" , $timestamp ) ;
        
        $attend -> arrival_time = $time;
        $attend -> save();
        return redirect()->back();
    }
    
        public function notarrival(Request $request)
    {
        $id = $_REQUEST['id'];
        $attend = Attend::find($id);
        
        
        $attend -> arrival_time = NULL;
       // var_dump($attend);
       // exit;
        $attend -> save();
        return redirect()->back();
    }
    
    
    public function csv() // to downlord attends' info 2018/07/18 Kaede
    {
       //タイムスタンプを取得
        $timestamp = time();
        // date()で日時を出力 //view用のdate()
        $date = date( "Y-m-d" , $timestamp ) ;
        
        $filename = "test.csv";
        $handle = fopen($filename, 'w+');
    
        $td_attends = \DB::table('users')->join('attends', 'users.id', '=', 'attends.user_id')
                    ->select('attends.created_at', 'attends.updated_at', 'users.team_number', 'users.team_class', 'users.nickname', 'attends.status', 'attends.reason', 'attends.arrival_time')
                    ->where('attends.created_at','=',$date)->where('users.nickname', '!=', 'GHR')
                    ->orderBy('attends.status', 'ASC')->orderBy('users.team_number', 'ASC')->orderBy('users.team_class', 'ASC')->orderBy('attends.updated_at', 'DESC')->get()->toArray();
       
       
        $head = array(
            'Date',
            'Time',
            'Team Number',
            'Team Class',
            'Nickname',
            'Status',
            'Reason',
            'Arrival time'
            );
        fputcsv($handle, $head);
        //var_dump($absents);
      
        foreach($td_attends as $row){
            $row->reason = mb_convert_encoding($row->reason, 'SJIS-win', 'UTF-8');
            $row->nickname = mb_convert_encoding($row->nickname, 'SJIS-win', 'UTF-8');
            $test = (array) $row;
            //var_dump($test);
            fputcsv($handle, $test);
            //exit;
        }
        
       
            
        
        fclose($handle);
        $headers = array(
            'Content-Type' => 'text/csv',
        );
        return response()->download($filename, 'Attendance_info'.date("d-m-Y").'.csv', $headers);
    }


    public function csv_month() // to downlord attends' info 2018/07/19 Tiny yeeeeeeeyyyyyy
    {
  //タイムスタンプを取得
        $timestamp = time();
        // date()で日時を出力 //view用のdate()
        $date = date( "Y-m-00" , $timestamp ) ;

        $filename = "test.csv";
        $handle = fopen($filename, 'w+');
    
        $td_attends = \DB::table('users')->join('attends', 'users.id', '=', 'attends.user_id')
                    ->select('attends.created_at', 'attends.updated_at', 'users.team_number', 'users.team_class', 'users.nickname', 'attends.status', 'attends.reason', 'attends.arrival_time')
                    ->where('attends.created_at','>=',$date)->where('users.nickname', '!=', 'GHR')
                    ->orderBy('attends.status', 'ASC')->orderBy('attends.created_at', 'ASC')->orderBy('users.team_number', 'ASC')->orderBy('users.team_class', 'ASC')->orderBy('attends.updated_at', 'DESC')->get()->toArray();
       
       
        $head = array(
            'Date',
            'Time',
            'Team Number',
            'Team Class',
            'Nickname',
            'Status',
            'Reason',
            'Arrival time'
            );
        fputcsv($handle, $head);
        //var_dump($absents);
      
        foreach($td_attends as $row){
            $row->reason = mb_convert_encoding($row->reason, 'SJIS-win', 'UTF-8');
            $row->nickname = mb_convert_encoding($row->nickname, 'SJIS-win', 'UTF-8');
            $test = (array) $row;
            //var_dump($test);
            fputcsv($handle, $test);
            //exit;
        }
        
       
            
        
        fclose($handle);
        $headers = array(
            'Content-Type' => 'text/csv',
        );
        return response()->download($filename, 'Attendance_info'.date("Y-m").'月分'.'.csv', $headers);
    }



}
