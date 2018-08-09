@extends('layouts.app')

@section('content')
 <div class="col-xs-offset-0 col-xs-12 col-md-offset-3 col-md-6">
<h1><span class="label label-primary"> Today({{$attend->created_at}}) {{ $user->nickname }} 's Status  </span></h1>
    
    <h2 class="text-left"><b>Nickname</b> : {{ $user->nickname }}</h2>
    <h2 class="text-left"><b>Status</b>   : {{ $attend->status }}</h2>
    <h2 class="text-left"><b>Time</b>     : {{ $attend->updated_at }}</h2>
    
    @if ($attend->status == 'Late' or $attend->status == 'Absent')
        <h2 class="text-left"><b>Reason</b>   : {{ $attend->reason }}</h2>
        @isset($attend->confirm)
        <h2 class="text-left"><b>Confirm</b>   : {{ $attend->confirm }}</h2>
        @else
        <h2 class="text-left"><b>Confirm</b>   : GHR確認中</h2>
        @endisset
    @endif
    <br>
    <p class="label edit">Edit</p><br>
    <div class="panel-body">
           <div class="form-group">
            　{!! Form::model($attend, ['route' => ['attends.update', $attend->id], 'method' => 'put']) !!}
            　{!! Form::label('status', 'Status:') !!}
        　　　　　{!! Form::select('status', array('Attend'=>'Attend', 'Late'=>'Late', 'Absent'=>'Absent')); !!}
        　　<div>
            　{!! form::label('reason', 'Reason　(遅刻欠席の方は記入してください)') !!}{!! form::text('reason', old('reason'), ['class' => 'form-control']) !!}
            </div>
            <br>
              {!! Form::submit('UPDATE') !!}
            {!! Form::close() !!}
        </div>
        </div>
 </div>   

@endsection
