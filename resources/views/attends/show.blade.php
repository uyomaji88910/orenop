@extends('layouts.app')<! edit by tiny  20180709>

@section('content')
  <div class="center jumbotron">
        <div class="text-center">
            @if($attend->status == 'Late' or $attend->status == 'Absent')
                <h1><b>GHRが確認致しますので、10時30分頃に再度ログインしてください。</b></h1>
            @elseif($attend->status == 'Attend')
                <h1>HAVE A NICE DAY❤</h1>
            @endif
                            <h2>{{$user->nickname}}'s Status</h2>
                <h2><b>{{$attend->status}}</b></h2>
        </div>
  </div>
        {!! link_to_route('attends.edit', 'if you want to update your status, Click Here', ['id' => $attend->id]) !!}
@endsection
