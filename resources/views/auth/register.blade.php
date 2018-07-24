@extends('layouts.app')

    @section('content')
<div class="row">
    <div class="col-xs-offset-0 col-xs-12 col-md-offset-3 col-md-6">
        <center><img src="{{ asset("/images/signup-logo.png") }}" class=signup></center>    <!add by chee 7/5>   <!add by chee 7/5>
            <br>
            <p class='label label-primary string'>Sign Up</p>
                    <div class="panel-body">
        {!! Form::open(['route' => 'signup.post']) !!}
                             <br>
                            <div class="form-group">
                            {!! Form::label('nickname', 'Nickname') !!}
                                {!! Form::text('nickname', old('nickname'), ['class' => 'form-control']) !!} <!edit by hayato 7/4>
                            </div>
                            <br>
                            <center><b>Slect your Team</b></center>
　　　　　　　        <center><span class="form-group"> <!プルダウンにした>  
                            {!! Form::label('team_number', 'number') !!}
                                {!! Form::select('team_number', array('1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5', '6'=>'6', '7'=>'7', '8'=>'8', '9'=>'9', '10'=>'10', '11'=>'11', '12'=>'12', '2
                            13'=>'13', '14'=>'14', '15'=>'15')); !!}
                            </span>
                            
                    　<span class="form-group"> <!プルダウンした>
                            {!! Form::label('team_class', 'class') !!}
                               {!! Form::select('team_class', array('A'=>'A', 'B'=>'B', 'C'=>'C')); !!}
                            </span>
                           </center>
                             <br>
                            <div class="form-group">
                            {!! Form::label('password', 'Password') !!}
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                            </div>
        
                            <div class="form-group">
                            {!! Form::label('password_confirmation', 'Confirmation') !!}
                                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                            </div>
        
                            <div class="text-right">
                            {!! Form::submit('登録する', ['class' => 'btn btn-success']) !!}
                            </div>
                            {!! Form::close() !!}
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
