@extends('layouts.app')<! edit by tiny  20180709>

@section('content')
  <div class="center jumbotron">
        <div class="text-center">
            <h1>HAVE A NICE DAY❤</h1>
    <h2>{{$user->nickname}}'s Status</h2>
    <h2><b>{{$attend->status}}</b></h2>
        </div>
    </div>
        {!! link_to_route('attends.edit', 'if you want to update your status, Click Here', ['id' => $attend->id]) !!}
@endsection
