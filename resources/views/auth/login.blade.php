@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-offset-0 col-xs-5">
        <body class="main">
                <body>
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
            <center><a herf="/"><img src="/images/egg-bk.png" class="att hvr-buzz-out"></a></center>
                
            <center class="bkmoji">orenop</center><br>
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
                                {!! form::submit('P', ['class' => 'btn_img']) !!}
                            </div>
                        {!! form::close() !!}
                    </div>
        </body>
    </div>    
</div>
         {!! link_to_route('others.get', '欠席/遅刻の方はこちら') !!}


@endsection