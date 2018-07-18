@extends('layouts.app')

@section('content')
<h1><span class="label label-primary"> Today({{$attend->created_at}}) {{ $user->nickname }} 's Status  </span></h1>
    
    <h2>Nickname : {{ $user->nickname }}</h2>
    <h2>Status   : {{ $attend->status }}</h2>
    <h2>Time     : {{ $attend->updated_at }}</h2>
    <br>
    <h2>edit</h2>
        <div class="form-group col-xs-offset-3 col-xs-6">
    {!! Form::model($attend, ['route' => ['attends.update', $attend->id], 'method' => 'put']) !!}

        {!! Form::label('status', 'Status:') !!}
　　　　　{!! Form::select('status', array('Attend'=>'Attend', 'Late'=>'Late', 'Absent'=>'Absent')); !!}
　　　　　
　　　　　
　　　　　　遅刻・欠席の方は理由を登録してください。
　　　　　　
　　　　　
                    {!! form::label('reason', 'Reason') !!}
                    {!! form::text('reason', old('reason'), ['class' => 'form-control']) !!}
          </div>
 
        {!! Form::submit('UPDATE') !!}

    {!! Form::close() !!}
    

@endsection
