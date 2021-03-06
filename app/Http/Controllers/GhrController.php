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
                 ->select('users.employee_num','users.advanced_field','users.nickname','attends.updated_at', 'attends.created_at', 'users.team_number', 'users.team_class')
                 ->where('status','=','Attend')->where('attends.created_at','=',$date)->where('attends.updated_at','<=','09:00:00')
                 ->orderBy('users.advanced_field', 'ASC')->orderBy('users.employee_num', 'ASC')
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
               ->select('users.employee_num','users.advanced_field','users.nickname','attends.updated_at', 'attends.created_at', 'attends.reason', 'users.team_number', 'users.team_class', 'attends.arrival_time', 'attends.id', 'attends.confirm')
               ->where('status','=','Late')->where('attends.created_at','=',$date)
               ->orderBy('users.advanced_field', 'ASC')->orderBy('users.employee_num', 'ASC')
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
                 ->select('users.employee_num','users.advanced_field','users.nickname','attends.updated_at', 'attends.created_at', 'attends.reason', 'users.team_number', 'users.team_class', 'attends.confirm', 'attends.id') //add attends.reason by chee 7/17
                 ->where('status','=','Absent')->where('attends.created_at','=',$date)
                 ->orderBy('users.advanced_field', 'ASC')->orderBy('users.employee_num', 'ASC')
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
                 ->select('users.employee_num','users.advanced_field','users.nickname','users.team_number', 'users.team_class')
                 ->leftJoin('attends as today', function($query){ //Today listのためのdate()
                    $timestamp = time();
                    $date = date( "Y-m-d" , $timestamp ) ;
                    $query->on('users.id', '=', 'today.user_id')
                          ->where('today.created_at','=',$date);
                 })
                 ->whereNull('status')
                 ->where('users.nickname', '!=', 'GHR')
                 ->orderBy('users.advanced_field', 'ASC')->orderBy('users.employee_num', 'ASC')
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
    
    
     public function paid()
    {
         //タイムスタンプを取得
        $timestamp = time();
        // date()で日時を出力
        $date = date( "Y-m-d" , $timestamp ) ;
        $time = date( "H:i:s" , $timestamp ) ;
        
        
        //attends function
        $attends = \DB::table('users')->join('attends', 'users.id', '=', 'attends.user_id')
                 ->select('users.employee_num','users.advanced_field','users.nickname','attends.updated_at', 'attends.created_at', 'users.team_number', 'users.team_class')
                 ->where('status','=','Paid Holiday')->where('attends.created_at','=',$date)
                 ->orderBy('users.advanced_field', 'ASC')->orderBy('users.employee_num', 'ASC')
                 ->orderBy('users.team_number', 'ASC')->orderBy('users.team_class', 'ASC')->orderBy('attends.updated_at', 'DESC')->get();
        $count = $this->counts();

        
        return view('ghr.paid', [
              'attends'=>$attends,
              'count'=>$count,
              'date'=>$date,
               ]);
        
        
    }
    
    
     public function over()
    {
         //タイムスタンプを取得
        $timestamp = time();
        // date()で日時を出力
        $date = date( "Y-m-d" , $timestamp ) ;
        $time = date( "H:i:s" , $timestamp ) ;
        
        
        //attends function
        $attends = \DB::table('users')->join('attends', 'users.id', '=', 'attends.user_id')
                 ->select('users.employee_num','users.advanced_field','users.nickname','attends.updated_at', 'attends.created_at', 'users.team_number', 'users.team_class')
                 ->where('status','=','Attend')->where('attends.created_at','=',$date)->where('attends.updated_at','>=' , '09:00:00')
                 ->orderBy('users.advanced_field', 'ASC')->orderBy('users.employee_num', 'ASC')
                 ->orderBy('users.team_number', 'ASC')->orderBy('users.team_class', 'ASC')->orderBy('attends.updated_at', 'DESC')->get();
        $count = $this->counts();

        
        return view('ghr.over', [
              'attends'=>$attends,
              'count'=>$count,
              'date'=>$date,
               ]);
        
        
    }
    
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
    
    // for insert confirm button to late @auth GHR ### add by Ryo Nakajima 2018/07/19
    public function confirm(Request $request)
    {
        $id = $_REQUEST['id'];
        
        $confirm = $_REQUEST['confirm'];
        
        $attend = Attend::find($id);
        $attend -> confirm = $confirm;
        $attend -> save();
        return redirect()->back();
    }
    
        public function notconfirm(Request $request)
    {
        $id = $_REQUEST['id'];
        $attend = Attend::find($id);
        
        
        $attend -> confirm = NULL;
       // var_dump($attend);
       // exit;
        $attend -> save();
        return redirect()->back();
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
        // date()で日���を出力 //view用のdate()
        $date = date( "Y-m-d" , $timestamp ) ;
        $filename = "test.csv";
        $handle = fopen($filename, 'w+');
    
        $td_attends = \DB::table('users')->join('attends', 'users.id', '=', 'attends.user_id')
                    ->select('attends.created_at', 'users.employee_num','users.nickname','attends.status', 'attends.reason', 'attends.updated_at', 'attends.arrival_time')
                    ->where('attends.created_at','=',$date)->where('users.nickname', '!=', 'GHR')->where('attends.updated_at', '>=', '09:00:00')
                    ->orderBy('users.employee_num', 'ASC')->get()->toArray();
        
        foreach($td_attends as $row) {
            if($row->status=='Attend'){
                $row->status = mb_convert_encoding('遅刻', 'SJIS-win', 'UTF-8');
            }
            if($row->status=='Late'){
                $row->status = mb_convert_encoding('遅刻', 'SJIS-win', 'UTF-8');
            }
            if($row->status=='Absent'){
                $row->status = mb_convert_encoding('欠席', 'SJIS-win', 'UTF-8');
            }
            if($row->status=='Paid Holiday'){
                $row->status = mb_convert_encoding('有給休暇', 'SJIS-win', 'UTF-8');
            }
        }
        
        
        $td_attends_np = \DB::table('users')
                     //->select('a', 'users.nickname','users.team_number', 'users.team_class')
                     ->select('today.created_at','users.employee_num','users.nickname','today.status', 'today.reason', 'today.arrival_time') 
                     ->leftJoin('attends as today', function($query){ //Today listのためのdate()
                        $timestamp = time();
                        $date = date( "Y-m-d" , $timestamp ) ;
                        $query->on('users.id', '=', 'today.user_id')
                              ->where('today.created_at','=',$date);
                     })
                     ->whereNull('status')
                     ->where('users.nickname', '!=', 'GHR')
                     ->orderBy('users.employee_num', 'ASC')
                     ->get()->toArray();
                     
                     
                     
                     
        foreach($td_attends_np as $np_row) {
            $np_row->created_at = $date;
            $np_row->status = mb_convert_encoding('勤怠不明', 'SJIS-win', 'UTF-8');
        }
        

        $td_attends = array_merge($td_attends, $td_attends_np); // merge 
        
        /*$head = array(
            'Date',
            'Employee Number',
            'Name',
            'Status',
            'Reason',
            'Time',
            'Arrival time'
            );*/  // for English
            
        $head = array(
            mb_convert_encoding('Date', 'SJIS-win', 'UTF-8'),
            mb_convert_encoding('Employee ID', 'SJIS-win', 'UTF-8'),
            mb_convert_encoding('Name', 'SJIS-win', 'UTF-8'),
            mb_convert_encoding('Type', 'SJIS-win', 'UTF-8'),
            mb_convert_encoding('Reason', 'SJIS-win', 'UTF-8'),
            mb_convert_encoding('Time', 'SJIS-win', 'UTF-8'),
            mb_convert_encoding('備考(到着時刻)', 'SJIS-win', 'UTF-8')
            );
            
        fputcsv($handle, $head);
        
        foreach($td_attends as $row){
            $row->reason = mb_convert_encoding($row->reason, 'SJIS-win', 'UTF-8');
            $row->nickname = mb_convert_encoding($row->nickname, 'SJIS-win', 'UTF-8');
            $test = (array) $row;
            fputcsv($handle, $test);
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
        $date = date( "Y-m-01" , $timestamp ) ;
        $timestamp_next = strtotime('+1 month', $timestamp);
        $date_next = date( "Y-m-01" , $timestamp_next ) ;
        
        
        $filename = "test.csv";
        $handle = fopen($filename, 'w+');

        $td_attends = \DB::table('users')->join('attends', 'users.id', '=', 'attends.user_id')
                    ->select('attends.created_at', 'users.employee_num','users.nickname','attends.status', 'attends.reason', 'attends.arrival_time')
                    ->where('attends.created_at','>=',$date)->where('attends.created_at','<',$date_next)->where('users.nickname', '!=', 'GHR')->where('attends.updated_at', '>=', '09:00:00')
                    ->orderBy('attends.created_at', 'ASC')->orderBy('users.employee_num', 'ASC')->orderBy('attends.updated_at', 'DESC')->get()->toArray();

        foreach($td_attends as $row) {
                if($row->status=='Attend'){
                    $row->status = mb_convert_encoding('遅刻', 'SJIS-win', 'UTF-8');
                }
                if($row->status=='Late'){
                    $row->status = mb_convert_encoding('遅刻', 'SJIS-win', 'UTF-8');
                }
                if($row->status=='Absent'){
                    $row->status = mb_convert_encoding('欠席', 'SJIS-win', 'UTF-8');
                }
                if($row->status=='Paid Holiday'){
                    $row->status = mb_convert_encoding('有給休暇', 'SJIS-win', 'UTF-8');
                }
        }
        /*$head = array(
            'Date',
            'Employee Number',
            'Name',
            'Status',
            'Reason',
            'Time',
            'Arrival time'
            );*/
            
        $head = array(
            mb_convert_encoding('Date', 'SJIS-win', 'UTF-8'),
            mb_convert_encoding('Employee ID', 'SJIS-win', 'UTF-8'),
            mb_convert_encoding('Name', 'SJIS-win', 'UTF-8'),
            mb_convert_encoding('Type', 'SJIS-win', 'UTF-8'),
            mb_convert_encoding('Reason', 'SJIS-win', 'UTF-8'),
            mb_convert_encoding('Time', 'SJIS-win', 'UTF-8'),
            mb_convert_encoding('備考(到着時刻)', 'SJIS-win', 'UTF-8')
            );
        fputcsv($handle, $head);
      
        foreach($td_attends as $row){
            $row->reason = mb_convert_encoding($row->reason, 'SJIS-win', 'UTF-8');
            $row->nickname = mb_convert_encoding($row->nickname, 'SJIS-win', 'UTF-8');
            $test = (array) $row;
            fputcsv($handle, $test);
        }
        
        fclose($handle);
        $headers = array(
            'Content-Type' => 'text/csv',
        );
        return response()->download($filename, 'Attendance_info'.date("Y-m").'月分'.'.csv', $headers);
    }



}
