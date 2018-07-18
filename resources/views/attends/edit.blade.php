@extends('layouts.app')

@section('content')
<div class="col-xs-offset-3 col-xs-6">
<h1><span class="label label-primary"> Today({{$attend->created_at}}) {{ $user->nickname }} 's Status  </span></h1>
    
    <h2 class="text-center">Nickname : {{ $user->nickname }}</h2>
    <h2>Status   : {{ $attend->status }}</h2>
    <h2>Time     : {{ $attend->updated_at }}</h2>
    <br>
    <p class="label edit">Edit</p><br>
    <div class="panel-body">
            

        <div class="form-group">
            {!! Form::model($attend, ['route' => ['attends.update', $attend->id], 'method' => 'put']) !!}
        
                {!! Form::label('status', 'Status:') !!}
        　　　　　{!! Form::select('status', array('Attend'=>'Attend', 'Late'=>'Late', 'Absent'=>'Absent')); !!}
        　　　　　<div>
                            {!! form::label('reason', 'Reason') !!}{!! form::text('reason', old('reason'), ['class' => 'form-control']) !!}
                  </div>
                  <br>
         
                  {!! Form::submit('UPDATE') !!}
                
            {!! Form::close() !!}
            
        </div>
        </div>
 </div>   

@endsection
