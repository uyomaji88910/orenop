@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-offset-4 col-xs-4">
        <body class="main">
                <body>
                    <center><a herf="/"><img src="/images/orenop-toka.png" class="att"></a></center>
                        <h1 id="time"></h1>
                            <script class="col-xs-offset-6 col-xs-5">
                                time();
                                function time(){
                                    var now = new Date();
                                    document . getElementById("time") . innerHTML = now . toLocaleTimeString();
                                }
                                setInterval('time()',1000);
                            </script>
                            <div class="timestrings"><span class="timestring">Hour</span><span class="timestring"> Minute</span><span class="timestring">Second</span></div>
               </body>
                
                <br>

                    <h1 class='label label-primary string'>Attendance</h1>
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
                               
                                
                                <input type ="image" name="submit" width="30" height="auto" src="/images/egg-bk.png" class="hvr-buzz-out" alt=" 送信">

                            </div>
                        {!! form::close() !!}
                    </div>
        </body>
    </div>    
</div>
         {!! link_to_route('others.get', '欠席/遅刻の方はこちら') !!}
         <br><br>
         {!! link_to_route('ghr.login', 'GHRの方はこちら') !!}
         <br><br>


@endsection