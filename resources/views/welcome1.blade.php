
<header>        
    <ul class="nav navbar-nav navbar-right" id="pointer">
    <li><a href="{{ route('login') }}" class="attendance"><img src="images/nav-att.png" class='nav-login'>  Attendance</a></li> <!edit by Den 7/4>
    <li><a href="{{ route('signup.get') }}" class="nav-signup"><img src="images/signup-white.png" class='nav-signup'>Sign Up</a></li>
    <li><a href="{{ route('logout.get') }}" class="nav-logout"><img src="images/nav-logout.png" class='nav-logout'> Logout</a></li>

　           </ul>
</header> 

    <div class="holder">
            <div class="first"></div>
            <div class="second"></div>
            <div class="third"></div>
    
             <div class="txt">
                <body class="allscreen">
                <center><a href="/" style="text-decoration:none;"><img src="images/egg-white.png" class="top-logo hvr-buzz-out">
                        <span class="title button">orenop</span>
                        </a>
                </center>
                
             <div class="col-xs-offset-3 col-xs-6">
                {!! Form::open(['route' => 'login.post']) !!}
                    <div class="form-group welcome">
                        {!! form::label('nickname', 'NickName') !!}
                        {!! form::text('nickname', old('nickname'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group welcome">
                        {!! form::label('password', 'PassWord') !!}
                        {!! form::password('password', ['class' => 'form-control']) !!}
                    </div>
                    <div class="hidden">
                         {!! form::select('status', array('1'=>'Attend')); !!} <!add hidden-form by chee 7/6>
                    </div>     
                    <div class="text-center">
                        {!! form::submit('Attendance', ['class' => 'btn']) !!}
                        
                    </div>
                {!! form::close() !!}
                </body>
                </div>
              </div>
            </div>
        
     @section('content')
       
<div class="row">
    <div class="col-xs-offset-3 col-xs-6">
        <center><img src='images/att.png' class="att"></center><br>
        <div class="panel panel-default">
            <center class="panel-primary"><p class='string'>Attendance</p></center>
            <div class="panel-body">
{!! Form::open(['route' => 'login.post']) !!}
                    <div class="form-group">
                        {!! form::label('nickname', 'NickName') !!}
                        {!! form::text('nickname', old('nickname'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! form::label('password', 'PassWord') !!}
                        {!! form::password('password', ['class' => 'form-control']) !!}
                    </div>
                    <div class="hidden">
                         {!! form::select('status', array('1'=>'Attend')); !!} <!add hidden-form by chee 7/6>
                    </div>     
                    <div class="text-center">
                        {!! form::submit('', ['class' => 'btn btn-success']) !!}
                    </div>
                {!! form::close() !!}
            </div>
        </div>
         {!! link_to_route('others.get', '欠席遅刻の方はこちら') !!}
    </div>
</div>
@endsection




  @extends('layouts.app1') <! edit by Tiny 20180709>
