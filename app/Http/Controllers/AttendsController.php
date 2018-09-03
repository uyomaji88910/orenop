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
        if (\Auth::check()){
            return redirect ('logout');
        }
        
        else{
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            //$test = \Request::ip();
            $ip_array = array ('133.237.7.64');
            
            for ($i = 65; $i <= 95 ; $i++) {
                $push_array = '133.237.7.' . $i;
                array_push ( $ip_array ,$push_array );
            }
                $judge_ip = in_array($ip, $ip_array);
                $judge1 = !$judge_ip;
    
            if ($judge1){
                // Add by Ryo Nakajima 
                return view('auth.login_ext');// (This veiw file is for extarnal)
                //return '/test1';
            }
            else {
            }
            return view('auth.login');// (This veiw file is for intarnal)
        }
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
        if (\Auth::check()) {
            $today_id= $this->edit_id();
            $attend = Attend::find($today_id);
        } else {
            $attend = 0;
        }
    

        // added by Den 07/09/2018
        //cotroller.phpで指定したやつそのままもってくることができる！！！！！！！by Tiny 20180713 
        return view('lists.attend', [
              'attends'=>$attends,
              'count'=>$count,
              'attend'=>$attend,
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
        if (\Auth::check()) {
            $today_id= $this->edit_id();
            $attend = Attend::find($today_id);
        } else {
            $attend = 0;
        }
        return view('lists.late', [
            'lates'=>$lates,
            'count'=>$count,
            'attend'=>$attend,
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
        
        if (\Auth::check()) {
            $today_id= $this->edit_id();
            $attend = Attend::find($today_id);
        } else {
            $attend = 0;
        }
        return view('lists.absent', [
            'absents'=>$absents,
            'count'=>$count,
            'attend'=>$attend,
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
        if (\Auth::check()) {
            $today_id= $this->edit_id();
            $attend = Attend::find($today_id);
        } else {
            $attend = 0;
        }
        return view('lists.notattend', [
            'notattends'=>$notattends,
            'count'=>$count,
            'attend'=>$attend,
            'date'=>$date,
        ]);
        
    }     
    public function paidlist()
    {
         //タイムスタンプを取得
        $timestamp = time();
        // date()で日時を出力
        $date = date( "Y-m-d" , $timestamp ) ;
        $time = date( "H:i:s" , $timestamp ) ;
        
        
        //attends function
        $attends = \DB::table('users')->join('attends', 'users.id', '=', 'attends.user_id')
                 ->select('users.nickname','attends.updated_at', 'attends.created_at','users.team_number', 'users.team_class')
                 ->where('status','=','Paid Holiday')->where('attends.created_at','=',$date)
                 ->orderBy('users.team_number', 'ASC')->orderBy('users.team_class', 'ASC')->orderBy('attends.updated_at', 'DESC')->get();
        $count = $this->counts();
        if (\Auth::check()) {
            $today_id= $this->edit_id();
            $attend = Attend::find($today_id);
        } else {
            $attend = 'No Status';
        }
    

        // added by Den 07/09/2018
        //cotroller.phpで指定したやつそのままもってくることができる！！！！！！！by Tiny 20180713 
        return view('lists.paid', [
              'attends'=>$attends,
              'count'=>$count,
              'attend'=>$attend,
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
        $today_id= $this->edit_id();
                //タイムスタンプを取得
        $timestamp = time();
        // date()で日時を出力 //view用のdate()
        $date = date( "Y-m-d" , $timestamp ) ;
        
        $user = User::find($id);
        
        $attend = Attend::find($today_id); 
        $user_id = $attend->user_id;
        $user = User::find($user_id);
        
        if (\Auth::user()->id == $id){ // need restrict date or time gate $date == \Attends::->date
               return view('attends.show', [
                'attend' => $attend,
                'user' => $user,
                ]);
        } else {
            return redirect()->back(); // 2018/07/10 edit by Ryo Nakajima //
        }
        
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
        
        if (\Auth::user()->id == $user_id){ // need restrict date or time gate $date == \Attends::->date
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
        
        
        if (\Auth::user()->id == $user_id){ // need restrict date or time gate
            $attend = Attend::find($today_id);
            $attend->status = $request->status;
            $attend->updated_at = $time;
            if ($request->status == 'Late' || $request->status == 'Absent') {
                $attend->reason = $request->reason;
            }
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
    public function welcome()
    {
        //タイムスタンプを取得
        $timestamp = time();
        // date()で日時を出力
        $date = date( "Y-m-d" , $timestamp ) ;
        $time = date( "H:i:s" , $timestamp ) ;
        
        
       
        if (\Auth::check()) {
            $today_id= $this->edit_id();
            $attend = Attend::find($today_id);
        } else {
            $attend = 0;
        }
        
        return view('attends.welcome', [
            'attend' => $attend,
        ]);
    }
    
    public function help_users()
    {
         //タイムスタンプを取得
        $timestamp = time();
        // date()で日時を出力
        $date = date( "Y-m-d" , $timestamp ) ;
        $time = date( "H:i:s" , $timestamp ) ;
        
        
       
        if (\Auth::check()) {
            $today_id= $this->edit_id();
            $attend = Attend::find($today_id);
        } else {
            $attend = 0;
        }
        
        return view('help_users', [
            'attend' => $attend,
        ]);
    }
    
    public function help_ghr()
    {
         //タイムスタンプを取得
        $timestamp = time();
        // date()で日時を出力
        $date = date( "Y-m-d" , $timestamp ) ;
        $time = date( "H:i:s" , $timestamp ) ;
        
        
       
        if (\Auth::check()) {
            $today_id= $this->edit_id();
            $attend = Attend::find($today_id);
        } else {
            $attend = 0;
        }
        
        return view('help_ghr', [
            'attend' => $attend,
        ]);
    }
    
    public function aboutus()
    {
         //タイムスタンプを取得
        $timestamp = time();
        // date()で日時を出力
        $date = date( "Y-m-d" , $timestamp ) ;
        $time = date( "H:i:s" , $timestamp ) ;
        
        
       
        if (\Auth::check()) {
            $today_id= $this->edit_id();
            $attend = Attend::find($today_id);
        } else {
            $attend = 0;
        }
        
        return view('aboutus', [
            'attend' => $attend,
        ]);
    }
    
    
    public function test1()
    {
         //タイムスタンプを取得
        $timestamp = time();
        // date()で日時を出力
        $date = date( "Y-m-d" , $timestamp ) ;
        $time = date( "H:i:s" , $timestamp ) ;
        
        
       
        if (\Auth::check()) {
            $today_id= $this->edit_id();
            $attend = Attend::find($today_id);
        } else {
            $attend = 0;
        }
        
        return view('auth.login', [
            'attend' => $attend,
        ]);
    }
    
    public function paid()
    {
        return view('auth.paid_holiday');
    }
    
     public function paidlog($id) //$id=userのid
    {
        $today_id= $this->edit_id();
                //タイムスタンプを取得
        $timestamp = time();
        // date()で日時を出力 //view用のdate()
        $date = date( "Y-m-d" , $timestamp ) ;
        
        $user = User::find($id);
        
        $paid = \DB::table('users')->join('attends', 'users.id', '=', 'attends.user_id')
                 ->select('users.nickname','attends.updated_at', 'attends.created_at','users.team_number', 'users.team_class')
                 ->where('status','=','Paid Holiday')->where('attends.created_at','>',$date)->where('users.nickname','=',$user->nickname)
                 ->orderBy('users.team_number', 'ASC')->orderBy('users.team_class', 'ASC')->orderBy('attends.updated_at', 'DESC')->get();
      
    if (\Auth::check()) {
            $today_id= $this->edit_id();
            $attend = Attend::find($today_id);
        } else {
            $attend = 0;
        }
        if (\Auth::user()->id == $id){ // need restrict date or time gate $date == \Attends::->date
               return view('attends.paidlog', [
                'attend' => $attend,
                'paid' => $paid,
                'user' => $user,
                ]);
        } else {
            return redirect()->back(); // 2018/07/10 edit by Ryo Nakajima //
        }
        
    }
    
    public function paid_del(Request $request)
    {
        /*$id = $_REQUEST['id'];
        $attend = Attend::find($id);
        $attend ->delete();
       // $attend -> save();*/
       return redirect()->back();
    }
}

