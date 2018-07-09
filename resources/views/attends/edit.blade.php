@extends('layouts.app')

@section('content')
    <h1>{{$attend->created_at}}:{{ $user->nickname }} のステータス</h1>
    <h2>Nickname : {{ $user->nickname }}</h2>
    <h2>Status   : {{ $attend->status }}</h2>
    <h2>Time     : {{ $attend->updated_at }}</h2>
    <br>
    <h2>edit</h2>
    
    {!! Form::model($attend, ['route' => ['attends.update', $attend->id], 'method' => 'put']) !!}

        {!! Form::label('status', 'ステータス:') !!}
　　　　　{!! form::select('status', array('Attend'=>'Attend', 'Late'=>'Late', 'Absent'=>'Absent')); !!}
 
        {!! Form::submit('更新') !!}

    {!! Form::close() !!}
    

@endsection
