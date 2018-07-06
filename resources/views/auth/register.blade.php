@extends('layouts.app')

    @section('content')
<div class="row">
    <div class="col-xs-offset-3 col-xs-6">
        <center><img src='/images/signup-logo.png' class=signup></center>    <!add by chee 7/5>   <!add by chee 7/5>
        <div class="panel panel-default">
            <center class="panel-primary"><p class='string'>Sign Up</p></center>
            <div class="panel-body">
{!! Form::open(['route' => 'signup.post']) !!}
                    <div class="form-group">
                    {!! Form::label('nickname', 'Nickname') !!}
                        {!! Form::text('nickname', old('nickname'), ['class' => 'form-control']) !!} <!edit by hayato 7/4>
                    </div>

　　　　　　　　　　　<div class="form-group"> <!プルダウンにしたい>
                    {!! Form::label('team_number', 'number') !!}
                        {!! Form::text('team_number', old('team_number'), ['class' => 'form-control']) !!}
                    </div>
                    
　　　　　　　　　　　<div class="form-group"> <!プルダウンしたい>
                    {!! Form::label('team_class', 'Team Alphabet') !!}
                        {!! Form::text('team_class', old('team_class'), ['class' => 'form-control']) !!}
                    </div>

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
@endsection
