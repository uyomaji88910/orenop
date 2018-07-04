@extends('layouts.app')

    @section('content')
<div class="row">
    <div class="col-xs-offset-3 col-xs-6">
        <div class="panel panel-default">
            <div class="panel-heading">会員登録</div>
            <div class="panel-body">
{!! Form::open(['route' => 'signup.post']) !!}
                    <div class="form-group">
                    {!! Form::label('nickname', 'お名前') !!}
                        {!! Form::text('nickname', old('nickname'), ['class' => 'form-control']) !!} //edit by hayato 7/4
                    </div>

　　　　　　　　　　　<div class="form-group"> //プルダウンにしたい
                    {!! Form::label('team_number', 'number') !!}
                        {!! Form::text('team_number', old('team_number'), ['class' => 'form-control']) !!}
                    </div>
                    
　　　　　　　　　　　<div class="form-group"> //プルダウンしたい
                    {!! Form::label('team_class', 'alpha') !!}
                        {!! Form::text('team_class', old('team_class'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワード（確認）') !!}
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
