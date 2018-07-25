@extends('layouts.app')
@section('content')
<div class="row">
<center class="col-xs-offset-0 col-xs-12 col-md-offset-2 col-md-8">
    <body class="main">
    <span class="glyphicon glyphicon-user" style="font-size:50px"></span><br><br>
        <div class='label label-primary string balloon1'>Create Your Accuount</div>
            <div class="panel-body">
            <div class='col-xs-offset-0 col-xs-12'>

                {!! Form::open(['route' => 'signup.post']) !!}<br>
                    <div class="form-group">
                        {!! Form::label('nickname', 'Nickname') !!}
                        {!! Form::text('nickname', old('nickname'), ['class' => 'form-control']) !!} 
                    </div><br>
                <center><b>Slect your Team</b></center>
    　　　　  　　　 <center>
    　　　　　　       　      <span class="form-group"> <!プルダウンにした>  
                            {!! Form::label('team_number', 'number') !!}
                                {!! Form::select('team_number', array('1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5', '6'=>'6', '7'=>'7', '8'=>'8', '9'=>'9', '10'=>'10', '11'=>'11', '12'=>'12', '2
                            13'=>'13', '14'=>'14', '15'=>'15')); !!}
                        </span>
                    
                      　<span class="form-group"> <!プルダウンした>
                            {!! Form::label('team_class', 'class') !!}
                               {!! Form::select('team_class', array('A'=>'A', 'B'=>'B', 'C'=>'C')); !!}
                        </span>
                </center><br>
                    <div class="form-group">
                        {!! Form::label('password', 'Password') !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password_confirmation', 'Confirmation') !!}
                            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    </div>

                    <div class="text-center">
                       <!-- {!! Form::submit('登録する', ['class' => 'btn btn-success']) !!}-->
                        <div class="hint--top" aria-label="css--button primary--border--button radius--button"><button type ="image" name="submit" class="css--button primary--border--button radius--button" alt=" 登録">Register</button></button></div>  
                      </form>
                    </div>
                {!! Form::close() !!}
            </div>
            </div>
        </div>
    </body>
</center>
</div>
@endsection
