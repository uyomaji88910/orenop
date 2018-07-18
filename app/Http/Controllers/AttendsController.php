<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attend;
use App\User;

class AttendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // empty
    }

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
                 ->select('users.nickname','attends.updated_at', 'attends.created_at','users.team_number', 'users.team_class')
                 ->where('status','=','Attend')->where('attends.created_at','=',$date)
                 ->orderBy('users.team_number', 'ASC')->orderBy('users.team_class', 'ASC')->orderBy('attends.updated_at', 'DESC')->get();
        $count = $this->counts();
        //var_dump($count);
        //exit;
        // added by Den 07/09/2018
        //cotroller.phpで指定したやつそのままもってくることができる！！！！！！！by Tiny 20180713 
        return view('lists.attend', [
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
               ->select('users.nickname','attends.updated_at', 'attends.created_at', 'attends.reason', 'users.team_number', 'users.team_class')
               ->where('status','=','Late')->where('attends.created_at','=',$date)
               ->orderBy('users.team_number', 'ASC')->orderBy('users.team_class', 'ASC')->orderBy('attends.updated_at', 'DESC')->get();
        $count = $this->counts();
        // added by Den 07/09/2018
        
        return view('lists.late', [
            
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
                 ->select('users.nickname','attends.updated_at', 'attends.created_at', 'attends.reason', 'users.team_number', 'users.team_class')
                 ->where('status','=','Absent')->where('attends.created_at','=',$date)
                 ->orderBy('users.team_number', 'ASC')->orderBy('users.team_class', 'ASC')->orderBy('attends.updated_at', 'DESC')->get();
        $count = $this->counts();
        
        return view('lists.absent', [
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
                 ->select('users.nickname', 'users.team_number', 'users.team_class')
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
        return view('lists.notattend', [
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
                //タイムスタンプを取得
        $timestamp = time();
        // date()で日時を出力 //view用のdate()
        $date = date( "Y-m-d" , $timestamp ) ;
        
        $user = User::find($id);
        
        $today_id = $this->today_id($id,$date);
        $attend = Attend::find($today_id);        
        return view('attends.show', [
            'attend' => $attend,
            'user' => $user,
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $today_id= $this->edit_id();
        $attend = Attend::find($today_id);
        $user_id = $attend->user_id;
        $user = User::find($user_id);

        
        if (\Auth::user()->id === $user_id){ // need restrict date or time gate $date == \Attends::->date
            return view('attends.edit', [
                'attend' => $attend,
                'user' => $user,
            ]);
        } else {
            return redirect()->back(); // 2018/07/10 edit by Ryo Nakajima //
        }
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
        //タイムスタンプを取得
        $timestamp = time();
        // date()で日時を出力
        $date = date( "Y-m-d" , $timestamp ) ;
        $time = date( "H:i:s" , $timestamp ) ;

        
        $today_id= $this->edit_id();
        $attend = Attend::find($today_id);
        $user_id = $attend->user_id;
        $user = User::find($user_id);
        
        
        if (\Auth::user()->id === $user_id){ // need restrict date or time gate
            $attend = Attend::find($today_id);
            $attend->status = $request->status;
            $attend->updated_at = $time;
            $attend->save();
            return redirect()->back();
        } else {
            return redirect()->back(); // 2018/07/10 edit by Ryo Nakajima 
        }
        
    
        
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
    
    

}
