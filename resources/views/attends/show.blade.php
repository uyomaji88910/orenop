@extends('layouts.app')<! edit by tiny  20180709>

@section('content')
<br>
  <div class="center jumbotron">
        <div class="text-center">
            @if($attend->status == 'Late' or $attend->status == 'Absent')
                <h2>GHRが確認致しますので、<br><br><b><u>09時30分頃</u></b><br>に再度ログインしてください。</h2>
                <br>
                <h4>その際、"Confirm: GHR確認中"となっている場合はメールにて直接GHRにご連絡ください。</h4>
                
            @elseif($attend->status == 'Attend')
                <h1>HAVE A NICE DAY❤</h1>
            @endif
                            <h2>{{$user->nickname}}'s Status</h2>
                <h2><b>{{$attend->status}}</b></h2>
        </div>
  </div>
        {!! link_to_route('attends.edit', 'if you want to update your status, Click Here', ['id' => $attend->id]) !!}
@endsection
