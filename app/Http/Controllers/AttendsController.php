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
    
    //late function
         $lates = \DB::table('users')->join('attends', 'users.id', '=', 'attends.user_id')
                                      ->select('users.nickname','attends.updated_at', 'attends.created_at')
                                      ->where('status','=','late')->where('attends.created_at','=',$date)
                                      ->orderBy('attends.updated_at', 'DESC')->get();
    //absent function
         $absents = \DB::table('users')->join('attends', 'users.id', '=', 'attends.user_id')
                                      ->select('users.nickname','attends.updated_at', 'attends.created_at')
                                      ->where('status','=','absent')->where('attends.created_at','=',$date)
                                      ->orderBy('attends.updated_at', 'DESC')->get();
    //notattends list        
        $notattends = \DB::select("SELECT users.nickname FROM users LEFT JOIN (SELECT user_id, status, created_at FROM attends where created_at = CURDATE()) AS today ON users.id = today.user_id WHERE status IS NULL;");



   // added by Den 07/09/2018
   
   return view('attends.index', [
              'lates'=>$lates,]);

   
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
    public function show($id)
    {
        $attend = Attend::find($id);
        $user_id = $attend->user_id;
        $user = User::find($user_id);

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
        $attend = Attend::find($id);
        $user_id = $attend->user_id;
        $user = User::find($user_id);

        return view('attends.edit', [
            'attend' => $attend,
            'user' => $user,
        ]);
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
        // 後で直します。　kazumi 7/6/2018
        $attend = Attend::find($id);
        $attend->status = $request->status;
        $attend->updated_at = $time;
        $attend->save();

        return redirect()->back();
    
        
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
