@extends('layouts.app')
@section('content')

<div class="row row-eq-height">
    <center class="col-xs-offset-0 col-xs-12 col-md-offset-3 col-md-6">
        <body class="main">
                <body>
                    <center><a herf="/"><img src="/images/logo_egg.png" class="att"></a></center>
                    <h1 id="time"></h1>
                    <!--<script class="col-xs-offset-6 col-xs-5">-->
                    <script>
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
            <h1 class='label label-primary string balloon1'>Are you absent or late?</h1>
            <div class="panel-body">
                <div class='col-xs-offset-0 col-xs-12'>
                     {!! Form::open(['route' => 'login.post']) !!}
                    <div class="form-group">
                    {!! form::label('nickname', 'Name') !!}
                        {!! form::text('nickname', old('nickname'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                    {!! form::label('password', 'PassWord') !!}
                        {!! form::password('password', ['class' => 'form-control']) !!}
                    </div>
                    
                    
                    <div>
                    {!! form::label('status', 'absent') !!}
                    {!! form::radio('status',3, array('3'=>'absent')); !!}
                    {!! form::label('status', 'late') !!}
                    {!! form::radio('status',2, array('2'=>'late')); !!}
                    </div>
                    
                    
                    <div class="form-group">
                    {!! form::label('reason', 'Reason') !!}
                        {!! form::text('reason', old('reason'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="text-center">
                    <div class="hint--top" aria-label="css--button primary--border--button radius--button"><button type ="image" name="submit" class="css--button primary--border--button radius--button" alt=" 送信">Submit</button></div>  
                    </div>
                    </form>
                    {!! form::close() !!}
                </div>
            </div>    
        </body>
    </center>    
</div>
  <center>
         <span class="links string-login">
            <a href="{{ route('second.get') }}" class="link underline"  style="text-decoration: none;" ><h4>Re:Login</h4></a>
        </span>
 
    </font>
  </center>
        
    

@endsection