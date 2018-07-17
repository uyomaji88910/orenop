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
                 ->select('users.nickname','attends.updated_at', 'attends.created_at')
                 ->where('status','=','Attend')->where('attends.created_at','=',$date)
                 ->orderBy('attends.updated_at', 'DESC')->get();
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
               ->select('users.nickname','attends.updated_at', 'attends.created_at', 'attends.reason')
               ->where('status','=','Late')->where('attends.created_at','=',$date)
               ->orderBy('attends.updated_at', 'DESC')->get();
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
                 ->select('users.nickname','attends.updated_at', 'attends.created_at', 'attends.reason') //add attends.reason by chee 7/17
                 ->where('status','=','Absent')->where('attends.created_at','=',$date)
                 ->orderBy('attends.updated_at', 'DESC')->get();
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
                 ->select('users.nickname')
                 ->leftJoin('attends as today', function($query){ //Today listのためのdate()
                    $timestamp = time();
                    $date = date( "Y-m-d" , $timestamp ) ;
                    $query->on('users.id', '=', 'today.user_id')
                          ->where('today.created_at','=',$date);
                 })
                 ->whereNull('status')
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

}
