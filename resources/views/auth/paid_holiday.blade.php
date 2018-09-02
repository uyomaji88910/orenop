@extends('layouts.app')

@section('content')
<div class="row">
    <center class="col-xs-offset-0 col-xs-12 col-md-offset-3 col-md-6">
        <body class="main">

            <h1 class='label label-primary string balloon1'>Input Your Paid Holiday</h1>
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
                        
                        <div class="form-group">
                            {!! form::label('startdate', 'Start Date') !!}
                            {!! form::date('startdate', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! form::label('enddate', 'End Date') !!}
                            {!! form::date('enddate', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                        </div>
                        
                        <div class="form-group">
                            {!! form::label('reason', 'Reason') !!}
                            {!! form::text('reason', old('reason'), ['class' => 'form-control']) !!}
                        </div>
                        
                        <div class="hidden">
                            {!! form::select('status', array('4'=>'Paid')); !!} <!add hidden-form by chee 7/6>
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
            <a class="link underline" href="{{ route('ghr.login') }}" style="text-decoration: none;"><h4>For GHR</h4></a>
        </span>
    </font>
  </center>
        
    

@endsection